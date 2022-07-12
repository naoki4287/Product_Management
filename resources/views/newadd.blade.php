<x-app-layout>
  <div class="ml-4">
    <form action="{{ route('productRegister') }}" method="POST">
      @csrf
      <label class="inline-block mt-4" for="product_name">商品名</label><br>
      <x-PMinput name="product_name">{{ old('product_name') }}</x-PMinput><br>
      <label class="inline-block mt-4" for="arrival_source">入荷元</label><br>
      <x-PMinput name="arrival_source">{{ old('arrival_source') }}</x-PMinput><br>
      <label class="inline-block mt-4" for="manufacturer">製造元</label><br>
      <x-PMinput name="manufacturer">{{ old('manufacturer') }}</x-PMinput><br>
      <label class="inline-block mt-4" for="price">金額</label><br>
      <x-PMinput name="price">{{ old('price') }}</x-PMinput><br>
      <label class="inline-block mt-4" for="email">メールアドレス</label><br>
      <x-PMinput name="email">{{ old('email') }}</x-PMinput><br>
      <label class="inline-block mt-4" for="tel">電話番号</label><br>
      <x-PMinput name="tel">{{ old('tel') }}</x-PMinput><br>
      <x-button class="mt-8">送信</x-button>
    </form>
  </div>
</x-app-layout>