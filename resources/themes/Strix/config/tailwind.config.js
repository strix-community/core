/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

const defaultTheme = require('tailwindcss/defaultTheme');

/*
** TailwindCSS Configuration File
**
** Docs: https://tailwindcss.com/docs/configuration
** Default: https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
** Version: 1.8.10
*/
module.exports = {
    purge: {
        content: ["./resources/**/*.js", "./resources/**/*.php"],
        options: {
            defaultExtractor: content =>
                content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/]
        }
    },
    theme: {
        fontFamily: {
            sans: ["Inter var", ...defaultTheme.fontFamily.sans]
        },
        extend: {
            //
            colors: {
                primary: {
                    default: "#2e8fff",
                    "050": "#f5faff",
                    "100": "#fafcff",
                    "200": "#c7e1ff",
                    "300": "#94c6ff",
                    "400": "#61abff",
                    "500": "#2e8fff",
                    "600": "#0075fa",
                    "700": "#005dc7",
                    "800": "#004594",
                    "900": "#002d61"
                },
                neutral: {
                    default: "#393947",
                    "050": "#f7f7f8",
                    "100": "#e0e0e6",
                    "200": "#b3b3c2",
                    "300": "#85859d",
                    "400": "#5d5d74",
                    "500": "#393947",
                    "600": "#292933",
                    "700": "#19191f",
                    "800": "#09090b",
                    "900": "#020203"
                },
                success: {
                    default: "#01a25a",
                    "050": "#bef8df",
                    "100": "#71febf",
                    "200": "#3efea8",
                    "300": "#0bfe91",
                    "400": "#01d576",
                    "500": "#01a25a",
                    "600": "#017e46",
                    "700": "#005c32",
                    "800": "#00381f",
                    "900": "#00140b"
                },
                danger: {
                    default: "#a20901",
                    "050": "#fda9a5",
                    "100": "#fe7871",
                    "200": "#fe483e",
                    "300": "#fe180b",
                    "400": "#d50c01",
                    "500": "#a20901",
                    "600": "#7e0801",
                    "700": "#5c0500",
                    "800": "#380300",
                    "900": "#140100"
                }
            },
            minHeight: (theme, { breakpoints }) => ({
                xs: "20rem",
                sm: "24rem",
                md: "28rem",
                lg: "32rem",
                xl: "36rem",
                "2xl": "42rem",
                "3xl": "48rem",
                "4xl": "56rem",
                "5xl": "64rem",
                "6xl": "72rem",
                ...breakpoints(theme("screens"))
            }),
            minWidth: (theme, { breakpoints }) => ({
                xs: "20rem",
                sm: "24rem",
                md: "28rem",
                lg: "32rem",
                xl: "36rem",
                "2xl": "42rem",
                "3xl": "48rem",
                "4xl": "56rem",
                "5xl": "64rem",
                "6xl": "72rem",
                ...breakpoints(theme("screens"))
            }),
            maxHeight: (theme, { breakpoints }) => ({
                xs: "20rem",
                sm: "24rem",
                md: "28rem",
                lg: "32rem",
                xl: "36rem",
                "2xl": "42rem",
                "3xl": "48rem",
                "4xl": "56rem",
                "5xl": "64rem",
                "6xl": "72rem",
                ...breakpoints(theme("screens"))
            }),
            maxWidth: (theme, { breakpoints }) => ({
                xs: "20rem",
                sm: "24rem",
                md: "28rem",
                lg: "32rem",
                xl: "36rem",
                "2xl": "42rem",
                "3xl": "48rem",
                "4xl": "56rem",
                "5xl": "64rem",
                "6xl": "72rem",
                ...breakpoints(theme("screens"))
            })
        }
    },
    variants: ["responsive", "hover", "focus", "disabled"],
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true,
    },
    experimental: {
        applyComplexClasses: true,
        uniformColorPalette: true,
        extendedSpacingScale: true,
        defaultLineHeights: true,
        extendedFontSizeScale: true
    }
};
