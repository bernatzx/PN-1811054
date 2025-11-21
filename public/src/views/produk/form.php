<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <div class="text-xl">Kelola Produk</div>
    <div class="text-gray-400"><span id="form-title"></span> Data Produk</div>
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

<img class="mb-2 h-40 w-40 hidden object-cover rounded-md border" id="preview">
<form class="grid grid-cols-3 gap-2" id="form-data">
  <div>
    <input name="nama_produk" class="w-full border rounded-md py-1.5 px-3" type="text" placeholder="Nama Produk"
      required>
  </div>
  <div>
    <input name="harga" class="w-full border rounded-md py-1.5 px-3" type="text" placeholder="Harga" required>
  </div>
  <div>
    <input name="stok" class="w-full border rounded-md py-1.5 px-3" type="number" placeholder="Stok" required>
  </div>
  <div>
    <input class="w-full border rounded-md py-1.5 px-3 bg-white" type="file" name="gambar" accept="image/*">
  </div>
  <input type="hidden" name="gambar-lama">
  <button type="submit"
    class="w-full bg-blue-500 border border-blue-600 rounded-md text-sm shadow-md hover:opacity-70 text-gray-50 font-medium py-1.5 px-3">
    <i class="fas fa-save fa-fw"></i>Simpan
  </button>
</form>
<div id="errorBox"
  class="mt-2 hidden font-medium text-sm flex items-center gap-2 p-2 bg-red-400 text-red-800 rounded-md">
  <i class="fas fa-circle-info"></i>
  <span id="errorMsg" class="flex-auto">Produk dengan nama tersebut sudah terdaftar</span>
  <div id="closeErrorBoxBtn">
    <i class="cursor-pointer fas fa-times"></i>
  </div>
</div>

<script>
  const form = document.getElementById('form-data');
  const formTitle = document.getElementById('form-title');
  const errorBox = document.getElementById('errorBox');
  const errorMsg = document.getElementById('errorMsg');
  const closeErrorBoxBtn = document.getElementById('closeErrorBoxBtn');
  const preview = document.getElementById('preview');
  const urlParams = new URLSearchParams(window.location.search);
  const id = urlParams.get("id");

  if (closeErrorBoxBtn) {
    closeErrorBoxBtn.addEventListener('click', () => {
      errorBox.classList.toggle('hidden');
    });
  }

  (async () => {
    if (id) {
      formTitle.textContent = "Ubah";
      const res = await fetch("<?= base("/public/api/produk.php") ?>?id=" + id, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
      })
      const result = await res.json();
      if (result.success && result.data) {
        const data = result.data;

        for (let key in data) {
          const input = form.querySelector(`[name="${key}"]`);
          if (!input) continue;

          if (input.type === "file") continue;
          input.value = data[key];
        }

        if (data.gambar) {
          if (preview) {
            form.elements["gambar-lama"].value = data.gambar;
            preview.classList.remove('hidden');
            preview.src = "<?= base('/public/uploads/') ?>" + data.gambar;
          }
        }
      }
    } else {
      formTitle.textContent = "Tambah";
    }
  })()

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(form);
    if (id) formData.append('id', id);
    try {
      const res = await fetch("<?= base("/public/api/produk.php") ?>" + (id ? `?id=${id}` : ""), {
        method: "POST",
        body: formData
      })
      const result = await res.json();
      if (result.success) {
        window.location.href = "<?= base('/public/src/views/produk') ?>";
      } else {
        errorMsg.textContent = result.msg;
        errorBox.classList.remove("hidden");
      }
    } catch (err) {
      errorMsg.textContent = 'Terjadi kesalahan.';
      errorBox.classList.remove('hidden');
      console.err(err);
    }
  })
</script>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>