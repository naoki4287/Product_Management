<x-app-layout>
  <div>
    <form class="ml-4" action="{{ route('contactValidateSession') }}" method="POST">
      @csrf
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      <label class="inline-block mt-4" for="name">名前</label><br>
      <x-PMinput name="name" value="{{ old('name') }}"></x-PMinput><br>
      <label class="inline-block mt-4" for="mail">メールアドレス</label><br>
      <x-PMinput name="mail" value="{{ old('mail') }}"></x-PMinput><br>
      <label class="inline-block mt-4" for="tel">電話番号</label><br>
      <x-PMinput name="tel" value="{{ old('tel') }}"></x-PMinput><br>
      <label class="inline-block mt-4" for="gender">男性</label>
      <input class="mr-8 check" type="checkbox" name="male" id="male" checked>
      <label class="inline-block mt-4" for="gender">女性</label>
      <input class="check" type="checkbox" name="female" id="female"><br>
      <textarea class="w-4/12 rounded-md border-gray-300" name="syumi" rows="5" id="syumi" placeholder="趣味"></textarea><br>
      <label class="inline-block mt-4" for="contact">問い合わせ内容</label><br>
      <textarea class="w-4/12 rounded-md border-gray-300" name="contact" rows="5">{{ old('contact') }}</textarea><br>
      <x-button class="mt-8">送信</x-button>
    </form>
  </div>
  <script src="{{ asset('js/contact.js') }}"></script>
</x-app-layout>