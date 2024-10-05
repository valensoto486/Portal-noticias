import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#3B82F6",
                secondary: "#1E40AF",
                background: "#F3F4F6",
                text: "#1F2937",
            },
            fontFamily: {
                sans: ["Inter", "sans-serif"],
            },
        },
    },

    plugins: [forms],
};
