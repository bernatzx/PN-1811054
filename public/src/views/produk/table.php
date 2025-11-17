<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Kelola Produk</span>
    <br>
    <span class="text-gray-400">Data Produk</span>
  </div>
  <div class="flex text-sm gap-2">
    <div onclick="window.location=''"
      class="hover:opacity-70 py-2 px-3 shadow-md border border-gray-400 text-gray-400 rounded-md cursor-pointer">
      <i class="fas fa-refresh"></i>
    </div>
    <div onclick="window.location='<?= base('/public/src/views/dashboard') ?>'"
      class="hover:opacity-70 text-sm bg-gray-800 text-white py-2 px-3 rounded-md shadow-md cursor-pointer">
      <i class="fas fa-arrow-left fa-fw"></i>Kembali
    </div>
    <div onclick="window.location='form.php'"
      class="hover:opacity-70 border border-blue-600 bg-blue-500 text-white py-2 px-3 rounded-md shadow-md cursor-pointer">
      <i class="fas fa-plus fa-fw"></i>Tambah Data
    </div>
  </div>
</div>

<?php
$dd = [];
for ($i = 1; $i < 11; $i++) {
  $dd[] = [
    "ID" => rand(100, 300),
    "Nama Produk" => "Produk" . $i,
    "Harga" => "Rp." . rand(1, 3) . "00.000",
    "Stok" => rand(1, 10),
  ];
}
?>

<div class="border shadow-md rounded-lg overflow-hidden">
  <table class="w-full">
    <thead class="text-xs bg-gray-50 text-gray-700 uppercase border-b">
      <tr>
        <th class="tracking-wider p-3 text-left w-20">ID</th>
        <th class="tracking-wider p-3 text-left">Nama Produk</th>
        <th class="tracking-wider p-3 text-left">Harga</th>
        <th class="tracking-wider p-3 text-center">Stok</th>
        <th class="tracking-wider p-3 text-center"><i class="fas fa-gear"></i></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dd as $key) { ?>
        <tr class="odd:bg-white even:bg-gray-50">
          <td class="p-3 tracking-wider text-left font-medium text-sm text-gray-900"><?= $key["ID"] ?></td>
          <td class="p-3 tracking-wider text-left font-medium text-sm text-gray-900"><?= $key["Nama Produk"] ?></td>
          <td class="p-3 tracking-wider text-left font-medium text-sm text-gray-900"><?= $key["Harga"] ?></td>
          <td class="p-3 tracking-wider text-center font-medium text-sm text-gray-900"><?= $key["Stok"] ?></td>
          <td class="p-3 tracking-wider text-center text-sm">
            <a class="py-1 px-3 border border-yellow-500 text-gray-50 shadow-md hover:opacity-70 bg-yellow-400 rounded-md"
              href=""><i class="fas fa-pencil"></i></a>
            <a class="py-1 px-3 border border-red-600 text-gray-50 shadow-md hover:opacity-70 bg-red-500 rounded-md"
              href=""><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>