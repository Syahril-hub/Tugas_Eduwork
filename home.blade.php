<x-layouts.app title="Produk">
  <div class="container mt-4">

    <!-- 🔍 Form Pencarian dan Filter -->
    <form method="GET" action="{{ route('home') }}" class="row mb-4">
      <div class="col-md-4 mb-2">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari produk...">
      </div>
      <div class="col-md-3 mb-2">
        <input type="number" name="min_price" value="{{ request('min_price') }}" class="form-control" placeholder="Harga minimal">
      </div>
      <div class="col-md-3 mb-2">
        <input type="number" name="max_price" value="{{ request('max_price') }}" class="form-control" placeholder="Harga maksimal">
      </div>
      <div class="col-md-2 mb-2">
        <button type="submit" class="btn btn-primary w-100">Filter</button>
      </div>
    </form>

    <!-- 🛍️ List Produk -->
    <div class="row">
      @forelse ($products as $product)
        <x-product-card :product="$product" />
      @empty
        <p class="text-center text-muted">Produk tidak ditemukan.</p>
      @endforelse
    </div>
  </div>
</x-layouts.app>
