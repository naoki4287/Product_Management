<x-app-layout>
  <div class="ml-4">
    <div class="mt-2">商品名</div>
    <div>{{ $sesContact['name'] }}</div>
    <div class="mt-2">メールアドレス</div>
    <div>{{ $sesContact['mail'] }}</div>
    <div class="mt-2">電話番号</div>
    <div>{{ $sesContact['tel'] }}</div>
    <div class="mt-2">問い合わせ内容</div>
    <div>{{ $sesContact['contact'] }}</div>
    <form action="{{ route('sendOrBack') }}" method="POST">
      @csrf
      <x-button>送信</x-button>
      <button class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white" type="submit" name="back" value="back">戻る</button>
    </form>
  </div>
</x-app-layout>