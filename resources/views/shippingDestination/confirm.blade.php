<x-app-layout>
  <div class="ml-4">
    <div class="mt-2">出荷先会社名</div>
    <div>{{ $sesSd['name'] }}</div>
    <div class="mt-2">出荷先住所</div>
    <div>{{ $sesSd['arrival_source'] }}</div>
    <div class="mt-2">出荷先電話番号</div>
    <div>{{ $sesSd['tel'] }}</div>
    <x-button>登録</x-button>
    <button class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white"
      type="submit" name="back" value="back">戻る</button>
  </div>
</x-app-layout>
