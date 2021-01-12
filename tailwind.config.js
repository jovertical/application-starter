let defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './resources/js/{Pages,Shared}/**/*.svelte',
        './resources/views/**/*.blade.php',
    ],
    darkMode: undefined,
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
