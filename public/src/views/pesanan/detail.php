<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-5">
  <div>
    <span class="text-xl">Kelola Pesanan</span>
    <br>
    <span class="text-gray-400">Detail Pesanan</span>
  </div>
  <div onclick="window.location='table.php'"
    class="hover:opacity-70 text-sm bg-gray-800 text-white py-2 px-3 rounded-md shadow-md cursor-pointer">
    <i class="fas fa-arrow-left fa-fw"></i>Kembali
  </div>
</div>

<div class="font-medium"><span class="text-gray-900">ID Pesanan</span> #212</div>
<table class="w-full mt-3 mb-4">
  <thead class="text-xs font-medium text-gray-900 uppercase border-b-2">
    <tr>
      <th class="tracking-wider p-3 text-left w-auto">Produk</th>
      <th class="tracking-wider p-3 text-left w-[1%]">Jumlah</th>
      <th class="tracking-wider p-3 text-left w-[1%]">Harga Satuan</th>
      <th class="tracking-wider p-3 text-left w-[1%]">Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <tr class="odd:bg-white even:bg-transparent">
      <td class="tracking-wider p-3 text-left flex gap-4">
        <div class="border-2 border-gray-300 rounded-lg overflow-hidden">
          <img src="<?= base('/public/uploads/kaos.png') ?>" alt="kaos" class="object-cover w-[80px]">
        </div>
        <div>
          <span class="font-medium">Nama Kaos</span><br><span class="text-gray-400">ID Produk: 2168712</span>
        </div>
      </td>
      <td class="tracking-wider p-3 text-left text-gray-900">2</td>
      <td class="tracking-wider p-3 text-left text-gray-900">Rp.150.000</td>
      <td class="tracking-wider p-3 text-left text-gray-900">Rp.300.000</td>
    </tr>
    <tr class="odd:bg-white even:bg-transparent">
      <td class="tracking-wider p-3 text-left flex gap-4">
        <div class="border-2 border-gray-300 rounded-lg overflow-hidden">
          <img src="<?= base('/public/uploads/celana.png') ?>" alt="celana" class="object-cover w-[80px]">
        </div>
        <div>
          <span class="font-medium">Nama Celana</span><br><span class="text-gray-400">ID Produk: 12353231</span>
        </div>
      </td>
      <td class="tracking-wider p-3 text-left text-gray-900">1</td>
      <td class="tracking-wider p-3 text-left text-gray-900">Rp.100.000</td>
      <td class="tracking-wider p-3 text-left text-gray-900">Rp.100.000</td>
    </tr>
    <tr class="odd:bg-white even:bg-transparent">
      <td class="tracking-wider p-3 text-left flex gap-4">
        <div class="border-2 border-gray-300 rounded-lg overflow-hidden">
          <img src="<?= base('/public/uploads/celana.png') ?>" alt="celana" class="object-cover w-[80px]">
        </div>
        <div>
          <span class="font-medium">Nama Celana</span><br><span class="text-gray-400">ID Produk: 12353231</span>
        </div>
      </td>
      <td class="tracking-wider p-3 text-left text-gray-900">1</td>
      <td class="tracking-wider p-3 text-left text-gray-900">Rp.100.000</td>
      <td class="tracking-wider p-3 text-left text-gray-900">Rp.100.000</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="2"></td>
      <td class="tracking-wider p-3 font-bold text-xs text-gray-900 uppercase">Total</td>
      <td class="tracking-wider p-3 text-gray-900">Rp.500.000</td>
    </tr>
  </tfoot>
</table>

<div class="bg-white rounded-lg p-3">
  <div id="cdetail-btn" class="flex items-center justify-between font-semibold text-gray-900">
    <div>
      Detail Pelanggan
    </div>
    <div>
      <i class="fas fa-angle-down"></i>
    </div>
  </div>
  <div id="dropdown" class="hidden mt-4 grid grid-cols-2 gap-x-12 gap-y-4 text-sm">
    <!-- KOLOM KIRI -->
    <div>
      <div class="flex justify-between mb-3">
        <span class="font-semibold text-gray-900">Nama</span>
        <span>Putra Nurzeha</span>
      </div>
      <div class="flex justify-between mb-3">
        <span class="font-semibold text-gray-900">Email</span>
        <span>@gmail.com</span>
      </div>
      <div class="flex justify-between">
        <span class="font-semibold text-gray-900">Alamat</span>
        <span>Jati Perumnas</span>
      </div>
    </div>
    <!-- KOLOM KANAN -->
    <div>
      <div class="flex justify-between mb-3">
        <span class="font-semibold text-gray-900">No.Handphone</span>
        <span>08123456789</span>
      </div>
      <div class="flex justify-between mb-3 items-center">
        <span class="font-semibold text-gray-900">Status Pesanan</span>
        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
          Selesai
        </span>
      </div>
    </div>
  </div>
</div>

<script>
  const btn = document.getElementById("cdetail-btn");
  const dd = document.getElementById("dropdown");

  if (btn) {
    btn.addEventListener('click', () => {
      dd.classList.toggle("hidden");
    })
  }
</script>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>