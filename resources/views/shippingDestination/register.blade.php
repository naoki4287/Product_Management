<x-app-layout>
  <div class="ml-12">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    <label class="inline-block mt-4" for="name">出荷先会社名</label><br>
    <x-PMinput name="name" value="{{ old('name') }}"></x-PMinput><br>
    <label class="inline-block mt-4" for="address">出荷先住所</label><br>
    <x-PMinput name="address" value="{{ old('address') }}"></x-PMinput><br>
    <label class="inline-block mt-4" for="tel">出荷先電話番号</label><br>
    <x-PMinput name="tel" value="{{ old('tel') }}"></x-PMinput><br>
    <x-button class="mt-8">送信</x-button>
  </div>
</x-app-layout>
