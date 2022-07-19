<x-app-layout>
  <div>
    <div class="ml-4">
      <div>アカウント情報</div>
      <div>メールアドレス</div><x-PMinput type="text" name="mail" value=""></x-PMinput><br>
      <div>電話番号</div><x-PMinput type="text" name="tel" value=""></x-PMinput>
    </div>

    <div class="mt-12 ml-4">
      <div>お気に入り</div>
      <table class="w-11/12 mx-auto my-0 mt-8 border-2 border-gray-300">
        <thead>
          <tr>
            <th class="border-2 border-gray-200 px-4 py-2">ID</th>
            <th class="border-2 border-gray-200 px-4 py-2">商品名</th>
            <th class="border-2 border-gray-200 px-4 py-2">入荷元</th>
            <th class="border-2 border-gray-200 px-4 py-2">製造元</th>
            <th class="border-2 border-gray-200 px-4 py-2">金額</th>
            <th class="border-2 border-gray-200 px-4 py-2">作成日</th>
          </tr>
        </thead>
      @foreach ($favorites as $favorite)
      <tbody>
        <tr>
          <td class="border-2 border-gray-200 px-4 py-2">{{ $favorite->product_id }}</td>
          <td class="border-2 border-gray-200 px-4 py-2">{{ $favorite->product_name }}</td>
          <td class="border-2 border-gray-200 px-4 py-2">{{ $favorite->arrival_source }}</td>
          <td class="border-2 border-gray-200 px-4 py-2">{{ $favorite->manufacturer }}</td>
          <td class="border-2 border-gray-200 px-8 py-2">{{ $favorite->price }}</td>
          <td class="border-2 border-gray-200 px-4 py-2">{{ $favorite->created_at }}</td>
        </tr>
      </tbody>
      @endforeach
      </table>
    </div>


    



    <div class="mt-12 ml-4">
      <div>操作履歴</div>
      <ul>
        <li>コーラ</li>
        <li>ファンタ</li>
      </ul>
    </div>
  </div>
</x-app-layout>