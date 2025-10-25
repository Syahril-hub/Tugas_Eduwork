<div class="col-md-3 mb-4">
  <div class="card h-100 shadow-sm">
    <img src="{{ asset($product['image']) }}" class="card-img-top" alt="{{ $product['name'] }}">
    <div class="card-body">
      <h5 class="card-title">{{ $product['name'] }}</h5>
      <p class="card-text text-muted">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
      <p class="small text-secondary">{{ Str::limit($product['description'], 50) }}</p>

      <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $product['id'] }}">
        <input type="hidden" name="name" value="{{ $product['name'] }}">
        <input type="hidden" name="price" value="{{ $product['price'] }}">
        <input type="hidden" name="image" value="{{ $product['image'] }}">
        <button type="submit" class="btn btn-sm btn-primary w-100">+ Tambah ke Keranjang</button>
      </form>
    </div>
  </div>
</div>

