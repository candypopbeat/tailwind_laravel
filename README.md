# LaravelでのTailwindテストコード
<br>

## 使い方（下記２つのどちらか）
- クローンしてLaravelを起動させる
- クローンはせずに下記のドキュメント通りに進めてもOK
<br>

## Laravelのインストール
```bash
composer create-project laravel/laravel {tailwind_laravel}
```
<br>

## Tailwindのインストール

1. Tailwindと関連ライブラリを同時にインストール
    ```bash
    npm install -D tailwindcss postcss autoprefixer
    ```
1. Tailwindの設定ファイル tailwind.config.js を作る
    ```bash
    npx tailwindcss init -p
    ```
1. /tailwind.config.jsに監視パスを追加する
    ```diff
    /** @type {import('tailwindcss').Config} */
    module.exports = {
      content: [
    +    "./resources/**/*.blade.php",
    +    "./resources/**/*.js",
    +    "./resources/**/*.vue",
      ],
      theme: {
        extend: {},
      },
      plugins: [],
    }
    ```
1. /resources/css/app.cssにtailwind読込みを追加する
    ```diff
    /* Tailwind用 */
    @tailwind base;
    @tailwind components;
    @tailwind utilities;
      
    /* 下記はテスト用にオリジナルCSS */
      
    /* フッターを最下部固定にするために */
    html, body {
      height: 100%;
    }
    
    footer {
      position: sticky; /* フッターを最下部固定にするために */
      top: 100%; /* フッターを最下部固定にするために */
      background-color: skyblue;
      font-size: 1.3rem;
      color: white;
      padding: 1rem 0;
      text-align: center;
    }
    ```
<br>

## Bootstrap っぽくなる daisyUI をインストールする

1. daisyUIをインストール
    ```bash
    npm i -D daisyui
    ```
1. /tailwind.config.jsに読み込み記述を追加する
    ```diff
    /** @type {import('tailwindcss').Config} */
    export default {
      content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
      theme: {
        extend: {},
      },
      plugins: [
    +    require("daisyui")
      ],
    +  daisyui: {
    +    themes: ["light", "dark", "cupcake", "retro"],
    +    darkTheme: "dark",
    +  },
    }
    ```
<br>

## テストする

1. /resources/views/welcome.blade.phpにVITEでCSSを読み込んで、Tailwindのクラスを使ってみるテストの準備をする
    ```html!
    <!DOCTYPE html>

    <!-- daisyUI の retro というテーマを指定している -->
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="retro">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- app.css に Tailwind も入っている -->
      @vite('resources/css/app.css')

      <title>Tailwind CSS Test</title>
    </head>

    <body>

      <!-- コンテナ -->
      <div class="container mx-auto mb-10 pt-10">

        <!-- 見出し -->
        <h1 class="text-base sp:text-lg tb:text-2xl pc:text-4xl mb-10">Tailwind CSS Test</h1>

        <!-- ボタン -->
        <button class="btn">Button</button>
        <button class="btn btn-neutral">Neutral</button>
        <button class="btn btn-primary">Button</button>
        <button class="btn btn-secondary">Button</button>
        <button class="btn btn-accent">Button</button>
        <button class="btn btn-ghost">Button</button>
        <button class="btn btn-link">Button</button>

        <!-- 水平線 -->
        <div class="divider">Divider</div>

        <!-- モーダル -->
        <button class="btn btn-secondary" onclick="my_modal_1.showModal()">open modal</button>
        <dialog id="my_modal_1" class="modal">
          <form method="dialog" class="modal-box">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">Press ESC key or click the button below to close</p>
            <div class="modal-action">
              <button class="btn">Close</button>
            </div>
          </form>
        </dialog>

      </div>

      <!-- コンテナ -->
      <div class="container mx-auto">

        <!-- フォントサイズ -->
        <p class="text-sm ...">The quick brown fox ...</p>
        <p class="text-base ...">The quick brown fox ...</p>
        <p class="text-lg ...">The quick brown fox ...</p>
        <p class="text-xl ...">The quick brown fox ...</p>
        <p class="text-2xl ...">The quick brown fox ...</p>

      </div>

      <!-- フッター -->
      <footer class="mt-10">
        &copy; Tailwind Test.
      </footer>

    </body>

    </html>
    ```
1. /tailwind.config.js をテスト用に書き換える
    ```javascript
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
    ```
1. サーバーとコンパイラーを起動してテストを実行する
    ```bash!
    # Laravelサーバー起動
    php artisan serve

    # コンパイラー起動
    npm run dev
    ```
