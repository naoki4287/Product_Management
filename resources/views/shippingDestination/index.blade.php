<x-app-layout>
  <div class="">
    <div class="hidden w-11/12 bg-indigo-300 absolute top-20 right-10 left-10 z-10" id="deleteModal">
      <form action="{{ route('sd.delete') }}" method="POST">
        @csrf
        <table class="w-11/12 mx-auto my-10 border-2 border-gray-300">
          <thead>
            <tr>
              <th class="border-2 border-gray-200 px-4 py-2">出荷先名</th>
              <th class="border-2 border-gray-200 px-4 py-2">出荷先住所</th>
              <th class="border-2 border-gray-200 px-4 py-2">出荷先電話番号</th>
              <th class="border-2 border-gray-200 px-4 py-2">作成日</th>
            </tr>
          </thead>
          @foreach ($shippings as $shipping)
          <tbody>
            <tr>
              <td class="border-2 border-gray-200 px-4 py-2">
                <input class="checkbox rounded-md" type="checkbox" name="shippingIds[]" value="{{ $shipping->id }}">
              </td>
              <td class="border-2 border-gray-200 px-4 py-2">{{ $shipping->name }}</td>
              <td class="border-2 border-gray-200 px-4 py-2">{{ $shipping->address }}</td>
              <td class="border-2 border-gray-200 px-4 py-2">{{ $shipping->tel }}</td>
              <td class="border-2 border-gray-200 px-4 py-2">{{ $shipping->created_at }}</td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <div class="flex justify-end">
          <x-button class="bg-red-700 hover:bg-red-600 block">削除</x-button>
          <div class="inline-block hover:bg-indigo-400 rounded-md p-1" id="cancel">キャンセル</div>
        </div>
      </form>
    </div>

    <table class="w-11/12 mx-auto my-0 mt-20 border-2 border-gray-300">
      <thead>
        <tr>
          <th class="border-2 border-gray-200 px-4 py-2">出荷先名</th>
          <th class="border-2 border-gray-200 px-4 py-2">出荷先住所</th>
          <th class="border-2 border-gray-200 px-4 py-2">出荷先電話番号</th>
          <th class="border-2 border-gray-200 px-4 py-2">作成日</th>
        </tr>
      </thead>
      @foreach ($shippings as $shipping)
      <tbody>
        <tr>
          <td class="border-2 border-gray-200 px-4 py-2">{{ $shipping->name }}</td>
          <td class="border-2 border-gray-200 px-4 py-2">{{ $shipping->address }}</td>
          <td class="border-2 border-gray-200 px-4 py-2">{{ $shipping->tel }}</td>
          <td class="border-2 border-gray-200 px-4 py-2">{{ $shipping->created_at }}</td>
        </tr>
      </tbody>
      @endforeach
    </table>
    <x-button class="bg-red-700 hover:bg-red-600 mt-8 ml-8" id="delModalOpen">削除</x-button>

    <div class="link mt-12 flex justify-center">
      {{ $shippings->links() }}
    </div>
  </div>
  <script type="module" src="{{ asset('js/shippingDestination.js') }}"></script>
  <script>
    const shippingsList = @json($shippings);
  </script>
</x-app-layout>
