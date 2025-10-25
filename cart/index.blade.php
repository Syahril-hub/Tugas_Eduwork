<x-layouts.app>
  <div class="container mt-5">
    <h2 class="mb-4">🛒 Keranjang Belanja</h2>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (count($cart) > 0)
      <table class="table table-bordered align-middle">
        <thead class="table-dark">
          <tr>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cart as $item)
            <tr>
              <td><img src="{{ asset($item['image']) }}" width="60" alt="{{ $item['name'] }}"></td>
              <td>{{ $item['name'] }}</td>
              <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
              <td>{{ $item['quantity'] }}</td>
              <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
              <td>
                <form method="POST" action="{{ route('cart.remove', $item['id']) }}">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p class="text-muted">Keranjang kosong 😢</p>
    @endif
  </div>
</x-layouts.app>
