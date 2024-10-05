export const config = {
    target: 'es6',
    outDir: '../../public/dist',
    entry: 'src/TypeScript/iife.ts',
    watchIncludes: './src/**/**/.ts',

    stylelint: {
        include: ['./src/Scss/**/*.scss'],
        exclude: [
            /node_modules/,
        ],
    },
}

export const DDEV_HMR_PORT = 5173
