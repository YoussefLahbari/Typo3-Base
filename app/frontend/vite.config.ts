import { defineConfig, loadEnv, UserConfig } from 'vite';
import { resolve } from 'path';
import { config, DDEV_HMR_PORT } from './vite.website.js'
import { existsSync, unlinkSync } from 'fs';
import colors from 'picocolors';

export default defineConfig({
    /**
     * Using /dist/ since we also serve TYPO3 inside /public
     * and using the build.emptyOutDir option, TYPO3-related files
     * might be wiped out as well during development/production builds.
     * Thus you shouldn't touch this unless you know what you're about to do.
     */
    base: '/dist/',

    build: {
        target: config.target,
        outDir: resolve(__dirname, config.outDir),
        emptyOutDir: true,
        manifest: true,
        sourcemap: true,
        rollupOptions: {
            input: config.entry,

            output: {
                inlineDynamicImports: false,
                chunkFileNames: 'chunks/[name]-[hash].js',

                manualChunks(id) {
                    if (id.includes('/app/frontend/src/TypeScript/')) {
                        return '';
                    }
                }
            }
        },
    },

    plugins: [
        {

            name: '@schommer-media/vite-frontend',
            enforce: 'post',

            config: (userConfig: UserConfig, { mode }) => {
                if (mode === 'development') {
                    const manifestPath = '../../public/dist/.vite/manifest.json';
                    if (existsSync(manifestPath)) {
                        unlinkSync(manifestPath);
                    }
                }

                const env = loadEnv(mode, '../../', '');
                userConfig.server = {
                    host: true,
                    origin: `${env.PROTOCOL_SCHEME}://${env.BASE_DOMAIN}:${DDEV_HMR_PORT}`,
                    ...userConfig?.server,
                };

                return userConfig;
            },
            configureServer: (server) => {
                const env = loadEnv('development', '../../', '');

                setTimeout(() => {
                    server.config.logger.info(`\n  ${colors.green(`${colors.bold('Schommer Media - Vite Frontend')}`)}`)
                    server.config.logger.info('')
                    server.config.logger.info(`  ${colors.green('➜')}  ${colors.bold('APP_URL')}: ${colors.cyan(`${env.PROTOCOL_SCHEME}://${env.BASE_DOMAIN}`)}`)
                }, 100);
            },
        },
    ],
});
