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
    <tbody id="tbody-data">
      <template id="row-template">
        <tr class="odd:bg-white even:bg-gray-50">
          <td class="p-3 tracking-wider text-left font-medium text-gray-900" data-field="nama"></td>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900" data-field="email"></td>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900" data-field="alamat"></td>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900" data-field="nohp"></td>
        </tr>
      </template>
    </tbody>
  </table>
</div>

<script>
  const tbody = document.getElementById('tbody-data');
  const rowTemp = document.getElementById('row-template');
  (async () => {
    try {
      const res = await fetch("<?= base("/public/api/auth.php") ?>", {
        method: "GET",
        headers: { "Content-Type": "application/json" }
      })
      const result = await res.json();
      console.log(result);
      if (result.success) {
        result.data.forEach((row) => {
          const clone = rowTemp.content.cloneNode(true);
          clone.querySelector('[data-field="nama"]').textContent = row.nama_lengkap
          clone.querySelector('[data-field="email"]').textContent = row.email
          clone.querySelector('[data-field="alamat"]').textContent = row.alamat || "Belum ada"
          clone.querySelector('[data-field="nohp"]').textContent = row.nohp || "Belum ada"

          tbody.appendChild(clone);
        })
      } else {
        tbody.className = "text-center";
        tbody.innerHTML = `<tr><td colspan='4' class='p-3 text-gray-400 font-medium'>${result.msg}</td></tr>`;
        return;
      }
    } catch (err) {
      console.err(err);
    }
  })()
</script>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>