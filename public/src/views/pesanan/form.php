<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Kelola Produk</span>
    <br>
    <span class="text-gray-400">Tambah Data Produk</span>
  </div>
  <div onclick="window.location='table.php'"
    class="hover:opacity-70 text-sm bg-gray-800 text-white py-2 px-3 rounded-md shadow-md cursor-pointer">
    <i class="fas fa-arrow-left fa-fw"></i>Kembali
  </div>
</div>

<div class="grid grid-cols-3 gap-2">
  <div>
    <input class="w-full border rounded-md py-1.5 px-3" type="text" placeholder="Nama Produk" required>
  </div>
  <div>
    <input class="w-full border rounded-md py-1.5 px-3" type="text" placeholder="Harga" required>
  </div>
  <div>
    <input class="w-full border rounded-md py-1.5 px-3" type="number" placeholder="Stok" required>
  </div>
  <button type="submit"
    class="w-full bg-blue-500 border border-blue-600 rounded-md text-sm shadow-md hover:opacity-70 text-gray-50 font-medium py-1.5 px-3">
    <i class="fas fa-save fa-fw"></i>Simpan
  </button>
</div>


<?php require_once __DIR__ . '/../../partials/footer.php'; ?>