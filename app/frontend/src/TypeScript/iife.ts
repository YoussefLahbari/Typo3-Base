import './stylesheets';
import './slider';
import './brand';
import './model';
import './downloads';
import './location';
import './similar';
import './headerSearch';
window.addEventListener('load', () => {
    const modules = import.meta.glob([
        './Content/**/*.ts',
        './Extensions/**/*.ts',
    ])

    for (const path in modules) {
        new Promise((_res, _rej) => modules[path]())
    }
})

