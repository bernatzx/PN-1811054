<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Kelola Pesanan</span>
    <br>
    <span class="text-gray-400">Data Pesanan</span>
  </div>
  <div class="flex text-sm gap-2">
    <div onclick="window.location=''"
      class="hover:opacity-70 py-2 px-3 shadow-md border border-gray-400 text-gray-400 rounded-md cursor-pointer">
      <i class="fas fa-refresh"></i>
    </div>
    <div onclick="window.location='form.php'"
      class="hover:opacity-70 border border-blue-600 bg-blue-500 text-white py-2 px-3 rounded-md shadow-md cursor-pointer">
      <i class="fas fa-plus fa-fw"></i>Tambah Data
    </div>
  </div>
</div>

<?php
$statues = ["pending", "selesai", "dibatalkan"];
$statusColors = [
  "pending" => "orange",
  "selesai" => "green",
  "dibatalkan" => "red"
];

$dd = [];
for ($i = 1; $i <= 10; $i++) {
  $dd[] = [
    "ID Pesanan" => rand(100, 300),
    "Nama Pelanggan" => "Pelanggan" . $i,
    "Tanggal" => rand(1, 30) . "-" . rand(1, 12) . "-2025",
    "Status" => $statues[array_rand($statues)],
    "Total" => "Rp." . rand(3, 8) . "00.000",
  ];
}
?>

<div class="border shadow-md rounded-lg overflow-hidden">
  <table class="w-full">
    <thead class="text-xs bg-gray-50 text-gray-700 uppercase border-b">
      <tr>
        <th class="tracking-wider p-3 text-left">ID Pesanan</th>
        <th class="tracking-wider p-3 text-left">Nama Pelanggan</th>
        <th class="tracking-wider p-3 text-left">Tanggal</th>
        <th class="tracking-wider p-3 text-center">Status</th>
        <th class="tracking-wider p-3 text-left">Total</th>
        <th class="tracking-wider p-3 text-center"><i class="fas fa-gear"></i></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dd as $key) { ?>
        <tr class="odd:bg-white even:bg-gray-50">
          <td class="p-3 tracking-wider text-left"><?= $key["ID Pesanan"] ?></td>
          <td class="p-3 tracking-wider text-left"><?= $key["Nama Pelanggan"] ?></td>
          <td class="p-3 tracking-wider text-left"><?= $key["Tanggal"] ?></td>
          <td class="p-3 tracking-wider text-center">
            <span class="bg-<?=$statusColors[$key["Status"]]?>-500 rounded-md shadow-md capitalize text-gray-50 py-1 px-2"><?=$key["Status"]?></span>
          </td>
          <td class="p-3 tracking-wider text-left"><?= $key["Total"] ?></td>
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