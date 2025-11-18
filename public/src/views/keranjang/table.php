<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Keranjang Belanja</span>
    <br>
    <span class="text-gray-400">Produk yang Anda Tambahkan</span>
  </div>
  <div class='flex text-sm gap-2'>
    <?php
    $btn = new ActionButtons();
    $btn->addButton(
      "Checkout",
      "fas fa-bag-shopping",
      "",
      "border border-blue-600 bg-blue-500 text-gray-50"
    );
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
      <td class="tracking-wider p-3 text-left text-gray-900">
        <div class="flex items-center overflow-hidden w-[120px]">
          <button type="button" class="px-3 py-1 bg-gray-200 hover:bg-gray-300" onclick="changeQty(this, -1)">-</button>
          <input type="number" min="1" value="1"
            class="w-12 text-center border-l border-r border-gray-200appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-moz-appearance:textfield]"
            required>
          <button type="button" class="px-3 py-1 bg-gray-200 hover:bg-gray-300" onclick="changeQty(this, 1)">+</button>
        </div>
      </td>
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
      <td class="tracking-wider p-3 text-left text-gray-900">
        <div class="flex items-center overflow-hidden w-[120px]">
          <button type="button" class="px-3 py-1 bg-gray-200 hover:bg-gray-300" onclick="changeQty(this, -1)">-</button>
          <input type="number" min="1" value="1"
            class="w-12 text-center border-l border-r border-gray-200appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-moz-appearance:textfield]"
            required>
          <button type="button" class="px-3 py-1 bg-gray-200 hover:bg-gray-300" onclick="changeQty(this, 1)">+</button>
        </div>
      </td>
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

<script>
  function changeQty(button, delta) {
    const input = button.parentElement.querySelector('input[type="number"]');
    let value = parseInt(input.value) + delta;
    if (value < parseInt(input.min)) value = parseInt(input.min);
    input.value = value;
    input.dispatchEvent(new Event('change'));
  }
</script>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>