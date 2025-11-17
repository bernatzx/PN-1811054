<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Kelola Pesanan</span>
    <br>
    <span class="text-gray-400">Data Pesanan</span>
  </div>
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
  $btn->render();
  ?>
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
    "Tanggal" => rand(1, 30) . "/" . rand(1, 12) . "/2025",
    "Status" => $statues[array_rand($statues)],
    "Total" => "Rp." . rand(3, 8) . "00.000",
  ];
}
?>

<div class="border shadow-md rounded-lg overflow-hidden">
  <table class="w-full">
    <thead class="text-xs bg-gray-50 text-gray-400 uppercase border-b">
      <tr>
        <th class="tracking-wider p-3 text-left">ID Pesanan</th>
        <th class="tracking-wider p-3 text-left">Nama Pelanggan</th>
        <th class="tracking-wider p-3 text-left">Tanggal</th>
        <th class="tracking-wider p-3 text-left">Status</th>
        <th class="tracking-wider p-3 text-left">Total</th>
        <th class="tracking-wider p-3 text-center"><i class="fas fa-gear"></i></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dd as $key) { ?>
        <tr class="odd:bg-white even:bg-gray-50">
          <td class="p-3 tracking-wider text-left font-medium text-gray-900"><?= $key["ID Pesanan"] ?></td>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900"><?= $key["Nama Pelanggan"] ?></td>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900"><?= $key["Tanggal"] ?></td>
          <td class="p-3 tracking-wider text-left">
            <span
              class="opacity-60 text-xs bg-<?= $statusColors[$key["Status"]] ?>-500 rounded-md shadow-md capitalize text-gray-50 py-1 px-2"><?= $key["Status"] ?></span>
          </td>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900"><?= $key["Total"] ?></td>
          <td class="p-3 tracking-wider text-center text-sm">
            <a class="py-1 px-3 border border-blue-500 text-gray-50 shadow-md hover:opacity-70 bg-blue-400 rounded-md"
              href="detail.php">Detail</i></a>
            <a class="py-1 px-3 border border-green-600 text-gray-50 shadow-md hover:opacity-70 bg-green-500 rounded-md"
              href="">Proses</i></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>