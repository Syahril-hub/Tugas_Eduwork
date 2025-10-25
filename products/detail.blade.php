<x-layouts.app title="{{ $product['name'] }}">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-5">
        <img src="{{ asset($product['image']) }}" class="img-fluid rounded shadow" alt="{{ $product['name'] }}">
      </div>
      <div class="col-md-7">
        <h2>{{ $product['name'] }}</h2>
        <p class="text-muted fs-5">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
        <p>{{ $product['description'] }}</p>
        <a href="#" class="btn btn-primary">Tambah ke Keranjang</a>
      </div>
    </div>
  </div>
</x-layouts.app>
