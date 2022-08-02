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
    <form class="inline-block" action="{{ route('update') }}" method="POST">
      @csrf
      <x-button>登録</x-button>
    </form>
      <x-button class="bg-green-600 hover:bg-green-500 mt-8 ml-8" onclick="location.href='{{ route('edit', ['id' => $sesItem['itemId']]) }}'">戻る</x-button>
  </div>
</x-app-layout>
