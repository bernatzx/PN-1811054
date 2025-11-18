<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Laporan Penjualan</span>
    <br>
    <span class="text-gray-400">Data Laporan Penjualan</span>
  </div>
  <div class='flex text-sm gap-2'>
    <?php
    $btn = new ActionButtons();
    $btn->addButton(
      "",
      "fas fa-refresh",
      "",
      "border-gray-400 border text-gray-400"
    );
    $btn->addButton(
      "Kembali",
      "fas fa-arrow-left",
      base('/public/src/views/dashboard'),
      "bg-gray-800 text-gray-50"
    );
    $btn->addButton(
      "Unduh Laporan",
      "fas fa-plus",
      "",
      "border border-blue-600 bg-blue-500 text-gray-50"
    );
    $btn->render();
    ?>
  </div>
</div>

<?php
$dd = [];
for ($i = 1; $i <= 10; $i++) {
  $dd[] = [
    rand(1, 12) . "/" . rand(1, 30) . "/2025",
    "Produk" . $i,
    rand(3, 10),
    "Rp." . $i . "00" . ".000",
  ];
}
?>

<div class="capitalize bg-white mb-5 p-5 shadow-md rounded-lg">
  <div class="font-semibold">ringkasan penjualan</div>
  <div class="">total penjualan: 20 produk</div>
</div>

<div class="border shadow-md rounded-lg overflow-hidden">
  <table class="w-full">
    <thead class="text-xs bg-gray-50 text-gray-400 uppercase border-b">
      <tr>
        <th class="tracking-wider p-3 text-left">Tanggal</th>
        <th class="tracking-wider p-3 text-left">Nama Produk</th>
        <th class="tracking-wider p-3 text-center">Jumlah</th>
        <th class="tracking-wider p-3 text-left">Total</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dd as $key) { ?>
        <tr class="odd:bg-white even:bg-gray-50">
          <td class="p-3 tracking-wider text-left font-medium text-gray-900"><?= $key[0] ?></td>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900"><?= $key[1] ?></td>
          <td class="p-3 tracking-wider text-center font-medium text-gray-900"><?= $key[2] ?></td>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900"><?= $key[3] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>