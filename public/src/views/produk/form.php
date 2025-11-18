<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Kelola Produk</span>
    <br>
    <span class="text-gray-400">Tambah Data Produk</span>
  </div>
  <div class="text-sm">
    <?php
    $btn = new ActionButtons();
    $btn->addButton(
      "Kembali",
      "fas fa-arrow-left",
      'table.php',
      "bg-gray-800 text-gray-50"
    );
    $btn->render();
    ?>
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