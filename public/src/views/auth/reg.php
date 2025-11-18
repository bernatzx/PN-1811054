<?php require_once __DIR__ . "/../../../../app/init.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi | Sistem Informasi Penjualan</title>
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
        <span class="text-4xl text-gray-800 font-bold">Registrasi DM STORE</span>
        <br>
        <span class="font-semibold text-gray-500">Buat akun baru untuk mulai berbelanja</span>
      </div>
      <form>
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Nama Lengkap</label>
          <input type="text" class="block border w-full p-2 text-sm rounded-md border-gray-500 outline-none"
            placeholder="Masukkan nama lengkap" required>
        </div>
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Email</label>
          <input type="text" class="block border w-full p-2 text-sm rounded-md border-gray-500 outline-none"
            placeholder="Masukkan email" required>
        </div>
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Password</label>
          <input type="password" class="block border w-full p-2 text-sm rounded-md border-gray-500 outline-none"
            placeholder="Masukkan password" required>
        </div>
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Konfirmasi Password</label>
          <input type="password" class="block border w-full p-2 text-sm rounded-md border-gray-500 outline-none"
            placeholder="Masukkan konfirmasi password" required>
        </div>
        <button class="bg-gray-800 rounded-md w-full p-2 text-white font-semibold mb-4" type="submit">Login</button>
      </form>
      <div class="font-semibold text-center">
        <span class="text-gray-500">
          Suda punya akun?
        </span>
        <a href="login.php" class="text-blue-500">
          Login
        </a>
      </div>
    </div>
  </div>

</body>

</html>