<x-app-layout>
  <div class="text-center text-lg mt-8">
    <div>商品の更新が完了しました</div>
    <x-button class="bg-green-600 hover:bg-green-500 mt-8 ml-8" onclick="location.href='{{ route('list') }}'">商品一覧へ</x-button>
  </div>
</x-app-layout>
