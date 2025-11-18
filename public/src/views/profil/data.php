<?php require_once __DIR__ . '/../../partials/header.php'; ?>


<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Profil Saya</span>
    <br>
    <span class="text-gray-400">Informasi Akun Anda</span>
  </div>

  <div class='flex text-sm gap-2'>
    <div id="cancelBtn"
      class="hidden hover:opacity-70 py-2 px-3 shadow-md rounded-md cursor-pointer border-red-600 border bg-red-500 text-gray-50">
      <i class="fas fa-times mr-1"></i>Batal
    </div>
    <div id="editBtn"
      class="hover:opacity-70 py-2 px-3 shadow-md rounded-md cursor-pointer border-blue-600 border bg-blue-500 text-gray-50">
      <i class="fas fa-pencil fa-fw mr-1"></i>Edit
    </div>
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
<form class="bg-white p-4 shadow-lg grid grid-cols-3 gap-4 rounded-md">
  <div class="label-input font-medium">Nama Pengguna</div>
  <div class="col-span-2">
    <input name="nama" disabled type="text" value="Andika Sukardi"
      class="text-gray-400 profil-input border-b py-2 px-3 border-gray-400 w-full focus:outline-none">
  </div>
  <div class="label-input font-medium">Email</div>
  <div class="col-span-2">
    <input name="email" disabled type="text" value="andika@gmail.com"
      class="text-gray-400 profil-input border-b py-2 px-3 border-gray-400 w-full focus:outline-none">
  </div>
  <div class="label-input font-medium">Alamat</div>
  <div class="col-span-2">
    <input name="alamat" disabled type="text" value="Ternate"
      class="text-gray-400 profil-input border-b py-2 px-3 border-gray-400 w-full focus:outline-none">
  </div>
  <div class="label-input font-medium">No.HP</div>
  <div class="col-span-2">
    <input name="nohp" disabled type="text" value="082323232"
      class="text-gray-400 profil-input border-b py-2 px-3 border-gray-400 w-full focus:outline-none">
  </div>
</form>

<script>
  const editBtn = document.getElementById('editBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const inputs = document.querySelectorAll('.profil-input')
  const labels = document.querySelectorAll('.label-input')

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
      editBtn.innerHTML = '<i class="fas fa-save mr-1 fa-fw"></i>Simpan';
      cancelBtn.classList.remove('hidden');
    } else {
      isEditing = false;
      inputs.forEach(input => {
        input.disabled = true;
        input.classList.add('text-gray-400')
      });
      labels.forEach(label => label.classList.remove('text-gray-400'));
      editBtn.innerHTML = '<i class="fas fa-pencil mr-1 fa-fw"></i> Edit';
      cancelBtn.classList.add('hidden');

      // BAGIAN INI KIRIM DATA KE API
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
    editBtn.innerHTML = '<i class="fas fa-pencil mr-1 fa-fw"></i> Edit';
    cancelBtn.classList.add('hidden');
  })
</script>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>