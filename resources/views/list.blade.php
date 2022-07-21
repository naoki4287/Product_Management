<x-app-layout>
  <div class="">
    <div class="hidden w-11/12 bg-indigo-300 absolute top-20 right-10 left-10 z-10" id="deleteModal">
      <form action="{{ route('delete') }}" method="POST">
        @csrf
        <table class="w-11/12 mx-auto my-10 border-2 border-gray-300">
          <thead>
            <tr>
              <th class="ID border-2 border-gray-200 px-4 py-2"></th>
              <th class="border-2 border-gray-200 px-4 py-2">ID</th>
              <th class="border-2 border-gray-200 px-4 py-2">商品名</th>
              <th class="border-2 border-gray-200 px-4 py-2">入荷元</th>
              <th class="border-2 border-gray-200 px-4 py-2">製造元</th>
              <th class="border-2 border-gray-200 px-4 py-2">金額</th>
              <th class="border-2 border-gray-200 px-4 py-2">作成日</th>
            </tr>
          </thead>
        @foreach ($items as $item)
        <tbody>
          <tr>
              <td class="border-2 border-gray-200 px-4 py-2"><input class="checkbox rounded-md" type="checkbox" name="itemId[]" value="{{ $item->id }}"></td>
              <td class="border-2 border-gray-200 px-4 py-2">{{ $item->id }}</td>
              <td class="border-2 border-gray-200 px-4 py-2">{{ $item->product_name }}</td>
              <td class="border-2 border-gray-200 px-4 py-2">{{ $item->arrival_source }}</td>
              <td class="border-2 border-gray-200 px-4 py-2">{{ $item->manufacturer }}</td>
              <td class="border-2 border-gray-200 px-8 py-2">{{ $item->price }}</td>
              <td class="border-2 border-gray-200 px-4 py-2">{{ $item->created_at }}</td>
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
          <th class="border-2 border-gray-200 px-4 py-2">ID</th>
          <th class="border-2 border-gray-200 px-4 py-2">商品名</th>
          <th class="border-2 border-gray-200 px-4 py-2">入荷元</th>
          <th class="border-2 border-gray-200 px-4 py-2">製造元</th>
          <th class="border-2 border-gray-200 px-4 py-2">金額</th>
          <th class="border-2 border-gray-200 px-4 py-2">作成日</th>
          <th class="border-2 border-gray-200 px-4 py-2">お気に入り</th>
        </tr>
      </thead>
    @foreach ($items as $item)
    <tbody>
      <tr>
        <td class="border-2 border-gray-200 px-4 py-2"><x-a-edit href="/edit/{{ $item->id }}">{{ $item->id }}</x-a-edit></td>
        <td class="border-2 border-gray-200 px-4 py-2"><x-a-edit href="/edit/{{ $item->id }}">{{ $item->product_name }}</x-a-edit></td>
        <td class="border-2 border-gray-200 px-4 py-2"><x-a-edit href="/edit/{{ $item->id }}">{{ $item->arrival_source }}</x-a-edit></td>
        <td class="border-2 border-gray-200 px-4 py-2"><x-a-edit href="/edit/{{ $item->id }}">{{ $item->manufacturer }}</x-a-edit></td>
        <td class="border-2 border-gray-200 px-8 py-2"><x-a-edit href="/edit/{{ $item->id }}">{{ $item->price }}</x-a-edit></td>
        <td class="border-2 border-gray-200 px-4 py-2"><x-a-edit href="/edit/{{ $item->id }}">{{ $item->created_at }}</x-a-edit></td>
        <form action="{{ route('favorite') }}" method="POST">
          @csrf
          <input type="hidden" name="favorite" value="{{ $item->id }}">
          @if ($item->product_id && $item->deleted_at === NULL)
          <td class="border-2 border-gray-200 px-4 py-2 text-center"><button class="favorite text-red-500 text-2xl" type="submit">★</button></td>
          @else
          <td class="border-2 border-gray-200 px-4 py-2 text-center"><button class="favorite text-white text-2xl" type="submit">★</button></td>
          @endif
        </form>
      </tr>
    </tbody>
    @endforeach
    </table>
    <x-button class="bg-red-700 hover:bg-red-600 mt-8 ml-8" id="delModalOpen">削除</x-button>
    <div class="link mt-12 flex justify-center">
      {{ $items->links() }}
    </div>
  </div>
  <script type="module" src="{{ asset('js/list.js') }}"></script>
</x-app-layout>