/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.{blade.php, js, vue}",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("flowbite/plugin")],
};
