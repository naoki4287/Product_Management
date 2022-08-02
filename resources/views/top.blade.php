<x-app-layout>
  <div class="text-center text-2xl">
    <a class="block mb-4" href="{{ route('list') }}">商品一覧</a><br>
    <a class="block mb-4" href="{{ route('add') }}">商品新規追加</a><br>
    <a class="block mb-4" href="{{ route('contact') }}">問い合わせ</a><br>
    <a class="block mb-4" href="{{ route('sd.index') }}">出荷先会社一覧</a><br>
    <a class="block mb-4" href="{{ route('sd.register') }}">出荷先会社登録</a><br>
  </div>
</x-app-layout>
