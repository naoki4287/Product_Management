<x-app-layout>
  <div class="ml-4">
    <div class="mt-2">商品名</div>
    <div>{{ $sesItem['product_name'] }}</div>
    <div class="mt-2">入荷元</div>
    <div>{{ $sesItem['arrival_source'] }}</div>
    <div class="mt-2">製造元</div>
    <div>{{ $sesItem['manufacturer'] }}</div>
    <div class="mt-2">金額</div>
    <div>{{ $sesItem['price'] }}</div>
    <div class="mt-2">メールアドレス</div>
    <div>{{ $sesLog['mail'] }}</div>
    <div class="mt-2">電話番号</div>
    <div>{{ $sesLog['tel'] }}</div>
    <form action="{{ route('updateOrBack') }}" method="POST">
      @csrf
      <x-button>登録</x-button>
      <button class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white" type="submit" name="back" value="back">戻る</button>
    </form>
  </div>
</x-app-layout>