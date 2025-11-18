<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Kelola Pengguna</span>
    <br>
    <span class="text-gray-400">Data Pengguna</span>
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
    $btn->render();
    ?>
  </div>
</div>

<?php
$dd = [];
for ($i = 1; $i <= 10; $i++) {
  $dd[] = [
    "Pengguna" . $i,
    "pengguna" . $i . "@mail.com",
    "Alamat-" . $i,
    "081234567890",
  ];
}
?>

<div class="border shadow-md rounded-lg overflow-hidden">
  <table class="w-full">
    <thead class="text-xs bg-gray-50 text-gray-400 uppercase border-b">
      <tr>
        <th class="tracking-wider p-3 text-left">Nama Pengguna</th>
        <th class="tracking-wider p-3 text-left">Email</th>
        <th class="tracking-wider p-3 text-left">Alamat</th>
        <th class="tracking-wider p-3 text-left">No.HP</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dd as $key) { ?>
        <tr class="odd:bg-white even:bg-gray-50">
          <td class="p-3 tracking-wider text-left font-medium text-gray-900"><?= $key[0] ?></td>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900"><?= $key[1] ?></td>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900"><?= $key[2] ?></td>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900"><?= $key[3] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>