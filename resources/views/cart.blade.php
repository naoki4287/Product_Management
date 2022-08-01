<x-app-layout>
  <div>
    <div class="text-center text-2xl mt-8">ショッピングカート</div>

    <div class="">
      @foreach ($cartInItems as $cartInItem)
      <div class="border-2 border-white p-1 mt-8 w-11/12 mx-auto my-0">
        <label>商品名：</label>
        <div class="inline-block font-bold">{{ $cartInItem->product_name }}</div><br>
        <label>商品単価：</label>
        <div class="inline-block ">{{ $cartInItem->price }}</div><br>
        <label>個数：</label>
        <div class="inline-block ">{{ $cartInItem->item_num }}</div><br>
        <label>商品合計:</label>
        <div class="itemSum inline-block">{{ $cartInItem->price * $cartInItem->item_num }}</div>
        <form action="{{ route('cartDelete') }}" method="POST">
          @csrf
          <div class="flex justify-end">
            <input type="hidden" name="cartItemId" value="{{ $cartInItem->cart_id }}">
            <x-button class="bg-red-700 hover:bg-red-600 px-2 py-1">削除</x-button>
          </div>
        </form>
      </div>
      @endforeach
    </div>

    <div class="">
      <div class="border-2 border-indigo-700 text-center p-1 mt-8 w-6/12 mx-auto my-0 py-4">
        @if (count($cartInItems))
        <div>{{ count($cartInItems) }}点の商品</div>
        <div id="cartInItemSum"></div>
        <form action="{{ route('buy') }}" method="POST">
          @csrf
          <div id="sum"></div>
          <div>
            <x-button class="bg-yellow-300 hover:bg-yellow-200 text-gray-900 mt-4 px-16">購入</x-button>
          </div>
          @else
          <div>カートに商品はありません</div>
          @endif
        </form>
      </div>
    </div>

    <x-button class="mt-8 ml-8 bg-green-600 hover:bg-green-500" onclick="location.href='{{ route('list') }}'">一覧へ戻る</x-button>

  </div>
  <script type="module" src="{{ asset('js/cart.js') }}"></script>
  <script>
    const items = @json($cartInItems);
  </script>
</x-app-layout>
