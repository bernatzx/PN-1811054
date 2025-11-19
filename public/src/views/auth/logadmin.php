<?php
require_once __DIR__ . "/../../../../app/init.php";
if (VALID()) {
  header("Location:" . base("/public/src/views/dashboard"));
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login ADMIN | Sistem Informasi Penjualan</title>
  <script src="<?= base('public/assets/js/all.min.js') ?>" defer></script>
  <script src="<?= base('public/assets/js/tailwindcss.js') ?>"></script>
  <style>
    body {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
  </style>
</head>

<body>

  <div class="h-screen flex justify-center items-center">
    <div class="max-w-md bg-gray-50 w-full shadow-lg border-2 p-5 rounded-lg">
      <div class="text-center mb-5">
        <span class="text-4xl text-gray-800 font-bold">DM STORE</span>
        <br>
        <span class="font-semibold text-gray-500">Login admin</span>
      </div>
      <form id="form-data">
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Username</label>
          <input name="username" type="text"
            class="block border w-full p-2 text-sm rounded-md border-gray-500 outline-none"
            placeholder="Masukkan username" required>
        </div>
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Password</label>
          <input name="password" type="password"
            class="block border w-full p-2 text-sm rounded-md border-gray-500 outline-none"
            placeholder="Masukkan password" required>
        </div>
        <div id="errorBox"
          class="mb-4 hidden font-medium text-sm flex items-center gap-2 p-2 bg-red-400 text-red-800 rounded-md">
          <i class="fas fa-circle-info"></i>
          <span id="errorMsg" class="flex-auto"></span>
          <div id="closeErrorBoxBtn">
            <i class="cursor-pointer fas fa-times"></i>
          </div>
        </div>
        <button class="bg-gray-800 rounded-md w-full p-2 text-white font-semibold mb-4" type="submit">Login
          ADMIN</button>
      </form>
      <div class="text-center font-semibold text-sm text-gray-500 underline hover:text-blue-500 cursor-pointer">
        <a href="login.php">
          Kembali
        </a>
      </div>
    </div>
  </div>

  <script>
    const form = document.getElementById('form-data');
    const errorBox = document.getElementById('errorBox');
    const errorMsg = document.getElementById('errorMsg');
    const closeErrorBoxBtn = document.getElementById('closeErrorBoxBtn');

    if (closeErrorBoxBtn) {
      closeErrorBoxBtn.addEventListener('click', () => {
        errorBox.classList.toggle('hidden');
      });
    }

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const formData = new FormData(form);
      const payload = Object.fromEntries(formData.entries());
      try {
        const res = await fetch("<?= base("/public/api/auth.php") ?>?route=adminLN", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(payload)
        })
        const result = await res.json();
        if (result.success) {
          window.location = '<?= base() ?>';
        } else {
          errorMsg.textContent = result.msg;
          errorBox.classList.remove('hidden');
        }
      } catch (err) {
        errorMsg.textContent = 'Terjadi kesalahan.';
        errorBox.classList.remove('hidden');
      }
    })
  </script>

</body>

</html>