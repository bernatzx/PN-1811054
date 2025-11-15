<?php
require_once __DIR__ . "/../../../app/init.php";
$valid = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penjualan DISTRO | Sistem Informasi Penjualan</title>
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

  <div class="bg-gray-100 min-h-screen">
    <div class="fixed w-full px-5 pt-2 pb-1 bg-gray-50">
      <div class="bg-white shadow-md border flex py-2 px-5 items-center justify-between font-medium">
        <div class="text-2xl">Selamat Datang <?= $valid ? "Admin" : "di DM Store" ?></div>
        <?php if ($valid) { ?>
          <div
            class="text-sm flex items-center gap-2 bg-red-500 text-gray-50 py-1 px-3 rounded-md border border-red-600 shadow-md cursor-pointer hover:opacity-70">
            <div>
              <i class="fas fa-right-from-bracket fa-fw"></i>
            </div>
            <div>Logout</div>
          </div>
        <?php } else { ?>
          <div
            class="text-sm flex items-center gap-2 bg-blue-500 text-gray-50 py-1 px-3 rounded-md border border-blue-600 shadow-md cursor-pointer hover:opacity-70">
            <div>
              <i class="fas fa-right-to-bracket fa-fw"></i>
            </div>
            <div>Login</div>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="w-full max-w-4xl m-auto pt-[100px] h-full pb-[50px]">