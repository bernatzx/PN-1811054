<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Kelola Pesanan</span>
    <br>
    <span class="text-gray-400">Data Pesanan</span>
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
        <th class="tracking-wider p-3 text-left">ID Pesanan</th>
        <?= ISADMIN() ? "<th class='tracking-wider p-3 text-left'>Nama Pelanggan</th>" : "" ?>
        <th class="tracking-wider p-3 text-left">Tanggal</th>
        <th class="tracking-wider p-3 text-left">Status</th>
        <th class="tracking-wider p-3 text-left">Total</th>
        <th class="tracking-wider p-3 text-center"><i class="fas fa-gear"></i></th>
      </tr>
    </thead>
    <tbody id="tbody-data">
      <template id="row">
        <tr class="odd:bg-white even:bg-gray-50">
          <td class="p-3 tracking-wider text-left font-medium text-gray-900" data-field="id"></td>
          <?= ISADMIN() ? "<td class='p-3 tracking-wider text-left font-medium text-gray-900' data-field='user'></td>" : "" ?>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900" data-field="tanggal"></td>
          <td class="p-3 tracking-wider text-left font-medium" data-field="status"></td>
          <td class="p-3 tracking-wider text-left font-medium text-gray-900" data-field="total"></td>
          <td class="p-3 tracking-wider text-center text-sm">
            <a class="py-1 px-3 border border-blue-500 text-gray-50 shadow-md hover:opacity-70 bg-blue-400 rounded-md"
              href="detail.php">Detail</i></a>
            <a class="py-1 px-3 border border-green-600 text-gray-50 shadow-md hover:opacity-70 bg-green-500 rounded-md"
              href="">Proses</i></a>
          </td>
        </tr>
      </template>
    </tbody>
  </table>
</div>

<script>
  const tbody = document.getElementById('tbody-data');
  const template = document.getElementById('row');
  function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID', {
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }).format(angka).replace(/^/, "Rp.");
  }
  (async () => {
    try {
      const res = await fetch("<?= base('/public/api/pesanan.php') ?>", {
        method: "GET",
        headers: { "Content-Type": "application/json" }
      })
      const result = await res.json();
      if (result.success && result.data) {
        result.data.forEach((row) => {
          const clone = template.content.cloneNode(true);
          clone.querySelector('[data-field="id"]').textContent = row.id;

          const $nl = clone.querySelector('[data-field="user"]');
          $nl ? $nl.textContent = row.nama_lengkap : null;

          clone.querySelector('[data-field="tanggal"]').textContent = row.tanggal_transaksi;

          const statusEl = clone.querySelector('[data-field="status"]')
          statusEl.textContent = row.status;
          switch (row.status.toLowerCase()) {
            case "pending":
              statusEl.classList.add("text-yellow-500");
              break;
            case "batal":
              statusEl.classList.add("text-red-500");
              break;
            case "selesai":
              statusEl.classList.add("text-green-600");
              break;
          }

          clone.querySelector('[data-field="total"]').textContent = formatRupiah(row.total_harga);

          tbody.appendChild(clone);
        })
      } else {
        tbody.className = "text-center";
        tbody.innerHTML = `<tr><td colspan='6' class='p-3 text-gray-400 font-medium'>${result.msg}</td></tr>`;
        return;
      }
    } catch (err) {
      console.error(err);
    }
  })()
</script>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>