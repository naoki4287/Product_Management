<x-app-layout>
  <div class="ml-12">
    <div id="registerPage">
      <div id="errorList">
      </div>
      <label class="inline-block mt-4" for="name">出荷先会社名</label><br>
      <x-PMinput class="input" name="name" id="name" value="{{ old('name') }}"></x-PMinput><br>
      <label class="inline-block mt-4" for="address">出荷先住所</label><br>
      <x-PMinput class="input" name="address" id="address" value="{{ old('address') }}"></x-PMinput><br>
      <label class="inline-block mt-4" for="tel">出荷先電話番号</label><br>
      <x-PMinput class="input" name="tel" id="tel" value="{{ old('tel') }}"></x-PMinput><br>
      <x-button class="mt-8" id="registerBtn">送信</x-button>
    </div>
    <div id="confirmPage">
    </div>
    <div id="completePage">
    </div>
  </div>
  <script type="module" src="{{ asset('js/register.js') }}"></script>
</x-app-layout>
