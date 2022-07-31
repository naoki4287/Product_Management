<x-app-layout>
  <div>
    @foreach ($items as $item)
      <div>{{ $item->product_name }}</div>
    @endforeach
  </div>
</x-app-layout>
