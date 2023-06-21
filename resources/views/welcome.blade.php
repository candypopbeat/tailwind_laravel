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