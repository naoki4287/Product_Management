<x-app-layout>
  <div class="">
    <div class="hidden w-11/12 bg-indigo-300 absolute top-20 right-10 left-10 z-10" id="deleteModal">
      <form action="{{ route('delete') }}" method="POST">
        @csrf
        <table class="w-11/12 mx-auto my-10 border-2 border-gray-300">
          <thead>
            <tr>
              <th class="ID border-2 border-gray-200 px-4 py-2"></th>
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
              <td class="border-2 border-gray-200 px-4 py-2">
                <input class="checkbox rounded-md" type="checkbox" name="itemId[]" value="{{ $item->id }}">
              </td>
              <td class="border-2 border-gray-200 px-4 py-2">{{ $item->product_name }}</td>
              <td class="border-2 border-gray-200 px-4 py-2">{{ $item->arrival_source }}</td>
              <td class="border-2 border-gray-200 px-4 py-2">{{ $item->manufacturer }}</td>
              <td class="border-2 border-gray-200 px- 8 py-2">{{ $item->price }}</td>
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
          <th class="ID border-2 border-gray-200 px-4 py-2"></th>
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
          <td class="border-2 border-gray-200 px-4 py-2">
            <select class="select" name="select" id="{{ $item->id }}">
              <option value="">-</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
            </select>
          </td>
          <td class="border-2 border-gray-200 px-4 py-2">
            <x-a-edit href="/edit/{{ $item->id }}">{{ $item->product_name }}</x-a-edit>
          </td>
          <td class="border-2 border-gray-200 px-4 py-2">
            <x-a-edit href="/edit/{{ $item->id }}">{{ $item->arrival_source }}</x-a-edit>
          </td>
          <td class="border-2 border-gray-200 px-4 py-2">
            <x-a-edit href="/edit/{{ $item->id }}">{{ $item->manufacturer }}</x-a-edit>
          </td>
          <td class="border-2 border-gray-200 px-8 py-2">
            <x-a-edit href="/edit/{{ $item->id }}">{{ $item->price }}</x-a-edit>
          </td>
          <td class="border-2 border-gray-200 px-4 py-2">
            <x-a-edit href="/edit/{{ $item->id }}">{{ $item->created_at }}</x-a-edit>
          </td>
          <form action="{{ route('favorite') }}" method="POST">
            @csrf
            <input type="hidden" name="favorite" value="{{ $item->id }}">
            @if ($item->deleted_at === null && $item->product_id !== null)
            <td class="border-2 border-gray-200 px-4 py-2 text-center"><button class="favorite text-red-500 text-2xl"
                type="submit">★</button></td>
            @else
            <td class="border-2 border-gray-200 px-4 py-2 text-center">
              <button class="favorite text-white text-2xl" type="submit">★</button>
            </td>
            @endif
          </form>
        </tr>
      </tbody>
      @endforeach
    </table>
    <x-button class="bg-red-700 hover:bg-red-600 mt-8 ml-8" id="delModalOpen">削除</x-button>
    <input class="cartItemId" type="hidden" name="cartItemId[]" id="cartItemId" value="">
    <x-button class="ml-8" id="cartBtn">カートに入れる</x-button>
    <x-button class="mt-8 ml-8" onclick="location.href='{{ route('cart') }}'">カートへ移動する</x-button>

    <div class="link mt-12 flex justify-center">
      {{ $items->links() }}
    </div>
  </div>
  <script type="module" src="{{ asset('js/list.js') }}"></script>
  <script>
    const itemsList = @json($items);
    // console.log(items.data[0].id);
  </script>
</x-app-layout>
