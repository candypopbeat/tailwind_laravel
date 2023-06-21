/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    // デフォルト値の継承と上書き
    extend: {
      // ブレークポイントのデフォルト値
      // screens: {
      //   sm:	"640px",
      //   md:	"768px",
      //   lg:	"1024px",
      //   xl:	"1280px",
      //   '2xl': "1536px"
      // }
    },
    // 新規ブレークポイント、デフォルトは効かなくなる
    screens: {
      sp: "400px",
      tb: "768px",
      pc: "1280px",
    },
  },
  plugins: [
    // テーマのdaisyUI読込
    require("daisyui"),
    function({addComponents}) {
      addComponents({
        // コンテナサイズのデフォルト値
        // ".container": {
        //   maxWidth: "100%",
        //   "@screen sm": {
        //     maxWidth: "640px",
        //   },
        //   "@screen md": {
        //     maxWidth: "768px",
        //   },
        //   "@screen lg": {
        //     maxWidth: "1024px",
        //   },
        //   "@screen xl": {
        //     maxWidth: "1280px",
        //   },
        //   "@screen 2xl": {
        //     maxWidth: "1536px",
        //   },
        // }

        // 新規コンテナサイズ
        ".container": {
          maxWidth: "95%",
          "@screen sp": {
            maxWidth: "80%",
          },
          "@screen tb": {
            maxWidth: "768px",
          },
          "@screen pc": {
            maxWidth: "1200px"
          }
        }
      })
    },
  ],
  daisyui: {
    themes: ["light", "dark", "cupcake", "retro"],
    darkTheme: "dark",
  },
}