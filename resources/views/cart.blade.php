<x-app-layout>
  <div>
    @foreach ($cartInItems as $cartInItem)
      <div>{{ $cartInItem->product_name }}</div>
    @endforeach
  </div>
</x-app-layout>
