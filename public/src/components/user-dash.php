<div class="capitalize font-medium text-xl mb-4">dashboard</div>
<!-- cards -->
<div class="grid grid-cols-3 gap-5 mb-[50px]">
  <div onclick="window.location='<?= base('/public/src/views/pesanan') ?>'"
    class="cursor-pointer hover:opacity-70 flex gap-4 bg-white py-3 px-5 font-medium shadow-md border rounded-md">
    <div class="text-3xl text-gray-400">
      <i class="far fa-rectangle-list fa-fw"></i>
    </div>
    <div>
      <div>Pesanan Saya</div>
      <div class="text-gray-400 text-xs">Lihat pesanan Anda disini</div>
    </div>
  </div>
  <div onclick="window.location='<?= base('/public/src/views/keranjang') ?>'"
    class="cursor-pointer hover:opacity-70 flex gap-4 bg-white py-3 px-5 font-medium shadow-md border rounded-md">
    <div class="text-3xl text-gray-400">
      <i class="fas fa-cart-shopping fa-fw"></i>
    </div>
    <div>
      <div>Keranjang Belanja</div>
      <div class="text-gray-400 text-xs">Kelola produk yang Anda tambahkan disini</div>
    </div>
  </div>
  <div onclick="window.location='<?= base('/public/src/views/profil/data.php') ?>'"
    class="cursor-pointer hover:opacity-70 flex gap-4 bg-white py-3 px-5 font-medium shadow-md border rounded-md">
    <div class="text-3xl text-gray-400">
      <i class="far fa-user fa-fw"></i>
    </div>
    <div>
      <div>Profil Saya</div>
      <div class="text-gray-400 text-xs">Kelola informasi akun Anda disini</div>
    </div>
  </div>
</div>

<div class="capitalize font-medium text-xl mb-4">semua produk</div>
<div class="grid grid-cols-4 gap-4 font-medium" id="grid-body">

  <!-- CARD -->
  <template id="product-card">
    <div class="bg-white border rounded-md shadow-md p-3 space-y-2">
      <div class="border-2 border-gray-300 flex items-center h-[200px] rounded-tl-3xl rounded-br-3xl overflow-hidden">
        <img class="w-full h-full object-cover object-center">
      </div>
      <div>
        <span class="nama text-gray-800"></span>
        <br>
        <span class="harga text-gray-500"></span>
      </div>
      <div
        class="bg-gray-800 flex gap-2 justify-center items-center rounded-md shadow-md hover:shadow-lg text-gray-100 text-center px-3 py-1">
        <div>
          <i class="fas fa-fw fa-cart-plus"></i>
        </div>
        <div class="text-xs">
          Tambah ke keranjang
        </div>
      </div>
    </div>
  </template>

</div>

<script>
  const gbody = document.getElementById('grid-body');
  const temp = document.getElementById('product-card');
  function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID', {
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }).format(angka).replace(/^/, "Rp.");
  }
  (async () => {
    try {
      const res = await fetch("<?= base("/public/api/produk.php") ?>", {
        method: "GET",
        headers: { "Content-Type": "application/json" }
      })
      const result = await res.json();
      if (result.success) {
        result.data.forEach((row) => {
          let clone = temp.content.cloneNode(true);
          clone.querySelector("img").src = `<?= base('/public/uploads/') ?>${row.gambar}`;
          clone.querySelector("img").alt = row.nama_produk;
          clone.querySelector(".nama").textContent = row.nama_produk;
          clone.querySelector(".harga").textContent = formatRupiah(row.harga);

          gbody.appendChild(clone);
        })
      }
    } catch (err) {

    }
  })()
</script>