<x-app-layout>
  <div>
    <div class="ml-4">
      <div>アカウント情報</div>
      <div>メールアドレス</div><x-PMinput type="text" name="mail" value=""></x-PMinput><br>
      <div>電話番号</div><x-PMinput type="text" name="tel" value=""></x-PMinput>
    </div>

    <div class="mt-12 ml-4">
      <div>お気に入り</div>
      <ul>
        <li>コーラ</li>
        <li>ファンタ</li>
      </ul>
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