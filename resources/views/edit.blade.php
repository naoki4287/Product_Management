<x-app-layout>
  <div>
    <form action="{{ route('update') }}" method="POST">
      @csrf
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      <input type="hidden" name="itemId" value="{{ $item['id'] }}">
      <label class="inline-block mt-4" for="product_name">商品名</label><br>
      <x-PMinput name="product_name" value="{{ $item['product_name'] }}"></x-PMinput><br>
      <label class="inline-block mt-4" for="arrival_source">入荷元</label><br>
      <x-PMinput name="arrival_source" value="{{ $item['arrival_source'] }}"></x-PMinput><br>
      <label class="inline-block mt-4" for="manufacturer">製造元</label><br>
      <x-PMinput name="manufacturer" value="{{ $item['manufacturer'] }}"></x-PMinput><br>
      <label class="inline-block mt-4" for="price">金額</label><br>
      <x-PMinput name="price" value="{{ $item['price'] }}"></x-PMinput><br>
      <label class="inline-block mt-4" for="mail">メールアドレス</label><br>
      <x-PMinput name="mail" value="{{ $log['email'] }}"></x-PMinput><br>
      <label class="inline-block mt-4" for="tel">電話番号</label><br>
      <x-PMinput name="tel" value="{{ $log['tel'] }}"></x-PMinput><br>
      <x-button class="mt-8">送信</x-button>
    </form>
  </div>
</x-app-layout>