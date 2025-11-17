<div class="capitalize font-medium text-xl mb-4">dashboard admin</div>
<!-- cards -->
<div class="grid grid-cols-3 gap-5 mb-[50px]">
  <div class="flex items-center bg-white py-3 px-5 font-medium shadow-md border rounded-md justify-between">
    <div>
      <div>Total Pesanan</div>
      <div class="text-gray-400">10</div>
    </div>
    <div class="text-3xl text-gray-400">
      <i class="fas fa-dolly fa-fw"></i>
    </div>
  </div>
  <div class="flex items-center bg-white py-3 px-5 font-medium shadow-md border rounded-md justify-between">
    <div>
      <div>Jumlah Produk</div>
      <div class="text-gray-400">10</div>
    </div>
    <div class="text-3xl text-gray-400">
      <i class="fas fa-box-open fa-fw"></i>
    </div>
  </div>
  <div class="flex items-center bg-white py-3 px-5 font-medium shadow-md border rounded-md justify-between">
    <div>
      <div>Pengguna Terdaftar</div>
      <div class="text-gray-400">10</div>
    </div>
    <div class="text-3xl text-gray-400">
      <i class="fas fa-user-group fa-fw"></i>
    </div>
  </div>
</div>

<div class="capitalize font-medium text-xl mb-4">navigasi cepat</div>
<div class="grid grid-cols-2 gap-5 text-sm">
  <div onclick="window.location='<?= base('/public/src/views/produk') ?>'"
    class="bg-gray-800 px-5 py-3 text-gray-100 text-center font-medium rounded-md shadow-md cursor-pointer hover:opacity-70">
    Kelola Produk</div>
  <div onclick="window.location='<?= base('/public/src/views/pesanan') ?>'"
    class="bg-gray-800 px-5 py-3 text-gray-100 text-center font-medium rounded-md shadow-md cursor-pointer hover:opacity-70">
    Kelola Pesanan</div>
  <div onclick="window.location='<?= base('/public/src/views/pengguna') ?>'"
    class="bg-gray-800 px-5 py-3 text-gray-100 text-center font-medium rounded-md shadow-md cursor-pointer hover:opacity-70">
    Kelola Pengguna</div>
  <div
    class="bg-gray-800 px-5 py-3 text-gray-100 text-center font-medium rounded-md shadow-md cursor-pointer hover:opacity-70">
    Lihat Laporan</div>
</div>