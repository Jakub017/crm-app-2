import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#0C7FDA",
                "primary-dark": "#0967B3",
                "primary-light": "#E9F5FE",
                secondary: "#5D7285",
                "secondary-dark": "#3A4956",
                "secondary-light": "#E2E7EB",
                "secondary-extra-light": "#F5F7F9",
            },
        },
    },

    plugins: [forms, typography],
};
