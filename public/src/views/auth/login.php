<?php require_once __DIR__ . "/../../../../app/init.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Sistem Informasi Penjualan</title>
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
        <span class="font-semibold text-gray-500">Sistem Informasi Penjualan Distro</span>
      </div>
      <form>
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Email</label>
          <input type="text" class="block border w-full p-2 text-sm rounded-md border-gray-500 outline-none"
            placeholder="Masukkan email" required>
        </div>
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Password</label>
          <input type="password" class="block border w-full p-2 text-sm rounded-md border-gray-500 outline-none"
            placeholder="Masukkan email" required>
        </div>
        <button class="bg-gray-800 rounded-md w-full p-2 text-white font-semibold mb-4" type="submit">Login</button>
      </form>
      <div class="font-semibold text-center">
        <span class="text-gray-500">
          Belum punya akun?
        </span>
        <a href="#" class="text-blue-500">
          Daftar
        </a>
      </div>
    </div>
  </div>

</body>

</html>