<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Kelola Produk</span>
    <br>
    <span class="text-gray-400">Data Produk</span>
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
      "Tembah Data",
      "fas fa-plus",
      "form.php",
      "border border-blue-600 bg-blue-500 text-gray-50"
    );
    $btn->render();
    ?>
  </div>
</div>

<div class="border shadow-md rounded-lg overflow-hidden">
  <table class="w-full">
    <thead class="text-xs bg-gray-50 text-gray-400 uppercase border-b">
      <tr>
        <th class="tracking-wider p-3 text-left w-20">ID</th>
        <th class="tracking-wider p-3 text-left">Nama Produk</th>
        <th class="tracking-wider p-3 text-left">Harga</th>
        <th class="tracking-wider p-3 text-left">Stok</th>
        <th class="tracking-wider p-3 text-center"><i class="fas fa-gear"></i></th>
      </tr>
    </thead>
    <tbody id="tbody-data">
      <!-- <tr class="odd:bg-white even:bg-gray-50">
        <td class="p-3 tracking-wider text-left font-medium text-gray-900">233</td>
        <td class="p-3 tracking-wider text-left font-medium text-gray-900">Kaos</td>
        <td class="p-3 tracking-wider text-left font-medium text-gray-900">Rp.100.000</td>
        <td class="p-3 tracking-wider text-center font-medium text-gray-900">4</td>
        <td class="p-3 tracking-wider text-center">
          <a class="py-1 px-3 border border-yellow-500 text-gray-50 shadow-md hover:opacity-70 bg-yellow-400 rounded-md"
            href=""><i class="fas fa-pencil"></i></a>
          <a class="py-1 px-3 border border-red-600 text-gray-50 shadow-md hover:opacity-70 bg-red-500 rounded-md"
            href=""><i class="fas fa-trash"></i></a>
        </td>
      </tr> -->
    </tbody>
  </table>
</div>

<script>
  const tbody = document.getElementById('tbody-data');

  const tdClass = "p-3 tracking-wider text-left font-medium text-gray-900";
  const tdAksiClass = "p-3 tracking-wider text-center space-x-2";
  const el = (tag, className = "", text = "") => {
    const e = document.createElement(tag);
    if (className) e.className = className;
    if (text) e.textContent = text;
    return e;
  };

  function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID', {
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }).format(angka).replace(/^/, "Rp.");
  }

  (async () => {
    try {
      const res = await fetch("<?= base("/public/api/produk.php") ?>", {
        method: "GET",
        headers: { "Content-Type": "application/json" }
      })
      const result = await res.json();
      if (result.success) {
        result.data.forEach((row) => {
          const tr = el('tr', 'odd:bg-white even:bg-gray-50');
          const tdID = el("td", tdClass, row.id);
          const tdProduk = el("td", tdClass, row.nama_produk);
          const tdHarga = el("td", tdClass, formatRupiah(row.harga));
          const tdStok = el("td", tdClass, row.stok);
          const tdAksi = el("td", tdAksiClass);

          const hapus = el("a", "cursor-pointer py-1 px-3 border border-red-600 text-gray-50 shadow-md hover:opacity-70 bg-red-500 rounded-md");
          const edit = el("a", "cursor-pointer py-1 px-3 border border-yellow-500 text-gray-50 shadow-md hover:opacity-70 bg-yellow-400 rounded-md");

          hapus.innerHTML = "<i class='fas fa-trash'></i>";
          edit.innerHTML = "<i class='fas fa-pencil'></i>";

          edit.addEventListener('click', async () => {
            window.location.href = "form.php?id=" + row.id;
          })

          hapus.addEventListener("click", async () => {
            if (confirm(`Anda akan menghapus produk ${row.nama_produk}?`)) {
              const res = await fetch(`<?= base('/public/api/produk.php') ?>?id=${row.id}`, {
                method: "DELETE",
              });
              const result = await res.json();
              console.log("DEBUG DELETE:", result);
              if (result.success) {
                window.location.reload();
              } else {
                alert(result.msg);
              }
            }
          });

          tdAksi.append(edit, hapus);
          tr.append(tdID, tdProduk, tdHarga, tdStok, tdAksi);
          tbody.append(tr);
        })
      } else {
        tbody.className = "text-center";
        tbody.innerHTML = `<tr><td colspan='5' class='p-3 text-gray-400 font-medium'>${result.msg}</td></tr>`;
        return;
      }
    } catch (err) {
      console.error(err);
    }
  })()
</script>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>