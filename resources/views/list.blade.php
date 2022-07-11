<x-app-layout>
  <div class="">
    <table class="w-11/12 mx-auto my-0 mt-20 border-2 border-gray-300">
      <thead>
        <tr>
          <th class="border-2 border-gray-300 px-4 py-2"></th>
          <th class="border-2 border-gray-300 px-4 py-2">ID</th>
          <th class="border-2 border-gray-300 px-4 py-2">商品名</th>
          <th class="border-2 border-gray-300 px-4 py-2">入荷元</th>
          <th class="border-2 border-gray-300 px-4 py-2">製造元</th>
          <th class="border-2 border-gray-300 px-4 py-2">金額</th>
          <th class="border-2 border-gray-300 px-4 py-2">作成日</th>
          <th class="border-2 border-gray-300 px-4 py-2">更新日</th>
        </tr>
      </thead>
    @foreach ($items as $item)
    <tbody>
      <tr>
        <td class="border-2 border-gray-300 px-4 py-2"><input class="rounded-md" type="checkbox" name="" id=""></td>
        <td class="border-2 border-gray-300 px-4 py-2">{{ $item->id }}</td>
        <td class="border-2 border-gray-300 px-4 py-2">{{ $item->product_name }}</td>
        <td class="border-2 border-gray-300 px-4 py-2">{{ $item->arrival_source }}</td>
        <td class="border-2 border-gray-300 px-4 py-2">{{ $item->manufacturer }}</td>
        <td class="border-2 border-gray-300 px-8 py-2">{{ $item->price }}</td>
        <td class="border-2 border-gray-300 px-4 py-2">{{ $item->created_at }}</td>
        <td class="border-2 border-gray-300 px-4 py-2">{{ $item->updated_at }}</td>
      </tr>
    </tbody>
    @endforeach
    </table>
  </div>
</x-app-layout>