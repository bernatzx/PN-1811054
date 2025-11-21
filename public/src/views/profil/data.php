<?php require_once __DIR__ . '/../../partials/header.php'; ?>


<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Profil Saya</span>
    <br>
    <span class="text-gray-400">Informasi Akun Anda</span>
  </div>

  <div class='flex text-sm gap-2'>
    <?php
    $btn = new ActionButtons();
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
<form id="form-data" class="bg-white p-4 shadow-lg rounded-md">
  <div class="grid grid-cols-3 gap-4 mb-4">
    <div class="label-input font-medium">Nama Pengguna</div>
    <div class="col-span-2">
      <input required name="nama_lengkap" disabled type="text"
        class="text-gray-400 profil-input border-b py-2 px-3 border-gray-400 w-full focus:outline-none">
    </div>
    <div class="label-input font-medium">Email</div>
    <div class="col-span-2">
      <input required name="email" disabled type="text"
        class="text-gray-400 profil-input border-b py-2 px-3 border-gray-400 w-full focus:outline-none">
    </div>
    <div class="label-input font-medium">Alamat</div>
    <div class="col-span-2">
      <input required name="alamat" disabled type="text"
        class="text-gray-400 profil-input border-b py-2 px-3 border-gray-400 w-full focus:outline-none">
    </div>
    <div class="label-input font-medium">No.HP</div>
    <div class="col-span-2">
      <input required name="nohp" disabled type="text"
        class="text-gray-400 profil-input border-b py-2 px-3 border-gray-400 w-full focus:outline-none">
    </div>
  </div>
  <div id="editBtn"
    class="text-center hover:opacity-70 py-2 px-3 shadow-md rounded-md cursor-pointer border-blue-600 border bg-blue-500 text-gray-50">
    <i class="fas fa-pencil fa-fw mr-1"></i>Edit
  </div>
  <div class="flex gap-2 w-full">
    <button type="button" id="cancelBtn"
      class="w-full text-center hidden hover:opacity-70 py-2 px-3 shadow-md rounded-md cursor-pointer border-red-600 border bg-red-500 text-gray-50">
      <i class="fas fa-times mr-1"></i>Batal
    </button>
    <button id="submitBtn" type="submit"
      class="w-full hidden hover:opacity-70 py-2 px-3 shadow-md rounded-md cursor-pointer border-blue-600 border bg-blue-500 text-gray-50">
      <i class="fas fa-floppy-disk fa-fw mr-1"></i>Simpan
    </button>
  </div>
</form>

<script>
  const form = document.getElementById('form-data');
  const submitBtn = document.getElementById('submitBtn');
  const editBtn = document.getElementById('editBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const inputs = document.querySelectorAll('.profil-input');
  const labels = document.querySelectorAll('.label-input');

  (async () => {
    try {
      const res = await fetch("<?= base('/public/api/pengguna.php') ?>?id=<?= $_SESSION['userID'] ?>", {
        method: "GET",
        headers: { "Content-Type": "application/json" }
      })
      const result = await res.json();
      if (result.success) {
        const data = result.data;
        for (let key in data) {
          const input = form.querySelector(`[name="${key}"]`);
          if (!input) continue;
          input.value = data[key];
        }
      } else {
        alert(result.msg);
      }
    } catch (err) {
      console.error(err);
    }
  })()

  let isEditing = false;
  let bckpV = [];

  editBtn.addEventListener('click', () => {
    if (!isEditing) {
      isEditing = true;
      bckpV = Array.from(inputs).map(input => input.value);
      inputs.forEach(input => {
        input.disabled = false;
        input.classList.remove('text-gray-400')
      });
      labels.forEach(label => label.classList.add('text-gray-400'));
      editBtn.classList.add('hidden');
      cancelBtn.classList.remove('hidden');
      submitBtn.classList.remove('hidden');
    } else {
      isEditing = false;
      inputs.forEach(input => {
        input.disabled = true;
        input.classList.add('text-gray-400')
      });
      labels.forEach(label => label.classList.remove('text-gray-400'));
      editBtn.classList.remove('hidden');
      cancelBtn.classList.add('hidden');
      submitBtn.classList.add('hidden');
    }
  })

  cancelBtn.addEventListener('click', () => {
    isEditing = false;
    inputs.forEach((input, index) => {
      input.value = bckpV[index];
      input.disabled = true;
      input.classList.add('text-gray-400');
    })
    labels.forEach(label => label.classList.remove('text-gray-400'));
    editBtn.classList.remove('hidden');
    cancelBtn.classList.add('hidden');
    submitBtn.classList.add('hidden');
  })

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(form);
    const payload = Object.fromEntries(formData.entries());
    try {
      const res = await fetch("<?= base('/public/api/pengguna.php') ?>?id=<?= $_SESSION['userID'] ?>", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload)
      })
      const result = await res.json();
      if (result.success) {
        window.location.reload();
      } else {
        alert(result.msg);
      }
    } catch (err) {
      console.error(err);
    }
  })
</script>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>