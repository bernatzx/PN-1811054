<div class="capitalize font-medium text-xl mb-4">dashboard</div>
<!-- cards -->
<div class="grid grid-cols-3 gap-5 mb-[50px]">
  <div class="cursor-pointer hover:opacity-70 flex gap-4 bg-white py-3 px-5 font-medium shadow-md border rounded-md">
    <div class="text-3xl text-gray-400">
      <i class="far fa-rectangle-list fa-fw"></i>
    </div>
    <div>
      <div>Pesanan Saya</div>
      <div class="text-gray-400 text-xs">Lihat pesanan Anda disini</div>
    </div>
  </div>
  <div class="cursor-pointer hover:opacity-70 flex gap-4 bg-white py-3 px-5 font-medium shadow-md border rounded-md">
    <div class="text-3xl text-gray-400">
      <i class="fas fa-cart-shopping fa-fw"></i>
    </div>
    <div>
      <div>Keranjang Belanja</div>
      <div class="text-gray-400 text-xs">Kelola produk yang Anda tambahkan disini</div>
    </div>
  </div>
  <div class="cursor-pointer hover:opacity-70 flex gap-4 bg-white py-3 px-5 font-medium shadow-md border rounded-md">
    <div class="text-3xl text-gray-400">
      <i class="far fa-user fa-fw"></i>
    </div>
    <div>
      <div>Profil Saya</div>
      <div class="text-gray-400 text-xs">Kelola informasi akun Anda disini</div>
    </div>
  </div>
</div>

<div class="capitalize font-medium text-xl mb-4">semua produk</div>
<div class="grid grid-cols-4 gap-4 font-medium">

  <!-- CARD -->
  <div class="bg-white border rounded-md shadow-md p-3 space-y-2">
    <div class="border-2 border-gray-300 rounded-tl-3xl rounded-br-3xl overflow-hidden">
      <img src="<?= base('/public/uploads/kaos.png') ?>" alt="kaos">
    </div>
    <div>
      <span class="text-gray-800">Kaos</span>
      <br>
      <span class="text-gray-500">Rp.100.000</span>
    </div>
    <div
      class="bg-gray-800 flex gap-2 justify-center items-center rounded-md shadow-md hover:shadow-lg text-gray-100 text-center px-3 py-1">
      <div>
        <i class="fas fa-fw fa-cart-plus"></i>
      </div>
      <div class="text-xs">
        Tambah ke keranjang
      </div>
    </div>
  </div>
  
  <div class="bg-white border rounded-md shadow-md p-3 space-y-2">
    <div class="border-2 border-gray-300 rounded-tl-3xl rounded-br-3xl overflow-hidden">
      <img src="<?= base('/public/uploads/celana.png') ?>" alt="celana">
    </div>
    <div>
      <span class="text-gray-800">Celana</span>
      <br>
      <span class="text-gray-500">Rp.300.000</span>
    </div>
    <div
      class="bg-gray-800 flex gap-2 justify-center items-center rounded-md shadow-md hover:shadow-lg text-gray-100 text-center px-3 py-1">
      <div>
        <i class="fas fa-fw fa-cart-plus"></i>
      </div>
      <div class="text-xs">
        Tambah ke keranjang
      </div>
    </div>
  </div>
  
  <div class="bg-white border rounded-md shadow-md p-3 space-y-2">
    <div class="border-2 border-gray-300 rounded-tl-3xl rounded-br-3xl overflow-hidden">
      <img src="<?= base('/public/uploads/hoodie.png') ?>" alt="hoodie">
    </div>
    <div>
      <span class="text-gray-800">Hoodie</span>
      <br>
      <span class="text-gray-500">Rp.250.000</span>
    </div>
    <div
      class="bg-gray-800 flex gap-2 justify-center items-center rounded-md shadow-md hover:shadow-lg text-gray-100 text-center px-3 py-1">
      <div>
        <i class="fas fa-fw fa-cart-plus"></i>
      </div>
      <div class="text-xs">
        Tambah ke keranjang
      </div>
    </div>
  </div>

</div>