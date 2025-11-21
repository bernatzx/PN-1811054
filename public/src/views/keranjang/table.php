<?php require_once __DIR__ . '/../../partials/header.php'; ?>

<div class="flex items-center justify-between font-medium mb-4">
  <div>
    <span class="text-xl">Keranjang Belanja</span>
    <br>
    <span class="text-gray-400">Produk yang Anda Tambahkan</span>
  </div>
  <div class='flex text-sm gap-2'>
    <div onclick="checkout()"
      class="text-center hover:opacity-70 py-2 px-3 shadow-md rounded-md cursor-pointer border-blue-600 border bg-blue-500 text-gray-50">
      <i class="fas fa-bag-shopping fa-fw mr-1"></i>Checkout
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

<table class="w-full mt-3 mb-4">
  <thead class="text-xs font-medium text-gray-900 uppercase border-b-2">
    <tr>
      <th class="tracking-wider p-3 text-left w-auto">Produk</th>
      <th class="tracking-wider p-3 text-left w-[1%]">Jumlah</th>
      <th class="tracking-wider p-3 text-left w-[1%]">Harga Satuan</th>
      <th class="tracking-wider p-3 text-left w-[1%]">Subtotal</th>
    </tr>
  </thead>
  <tbody id="tbody-data">
    <template id="row-tmp">
      <tr class="odd:bg-white even:bg-transparent">
        <td class="tracking-wider p-3 text-left flex gap-4">
          <div class="border-2 border-gray-300 rounded-lg overflow-hidden">
            <img src="<?= base('/public/uploads/celana.png') ?>" alt="celana" class="object-cover w-[80px]">
          </div>
          <div>
            <span class="font-medium nama-produk"></span>
            <br>
            <span class="text-gray-400">ID Produk: </span>
            <span class="id-produk"></span>
            <br>
            <span
              class="hapus-btn text-xs cursor-pointer hover:opacity-70 font-medium px-3 py-1 border border-red-400 text-red-400">Hapus</span>
          </div>
        </td>
        <td class="tracking-wider p-3 text-left text-gray-900">
          <div class="flex items-center overflow-hidden w-[120px]">
            <button type="button" class="px-3 py-1 bg-gray-200 hover:bg-gray-300 btn-minus">-</button>
            <input type="number" min="1" value="1"
              class="w-12 text-center border-l border-r border-gray-200appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-moz-appearance:textfield]"
              required>
            <button type="button" class="px-3 py-1 bg-gray-200 hover:bg-gray-300 btn-plus">+</button>
          </div>
        </td>
        <td class="tracking-wider p-3 text-left text-gray-900 harga-satuan"></td>
        <td class="tracking-wider p-3 text-left text-gray-900 subtotal"></td>
      </tr>
    </template>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="2"></td>
      <td class="tracking-wider p-3 font-bold text-xs text-gray-900 uppercase">Total</td>
      <td id="total-harga" class="tracking-wider p-3 text-gray-900"></td>
    </tr>
  </tfoot>
</table>

<script>
  const tbody = document.getElementById('tbody-data');
  const template = document.getElementById('row-tmp');
  const totalEl = document.getElementById('total-harga');

  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID', {
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }).format(angka).replace(/^/, "Rp.");
  }

  function updateTotal() {
    const total = cart.reduce((sum, item) => sum + item.qty * item.harga, 0);
    totalEl.textContent = formatRupiah(total);
  }

  async function checkout() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];

    let total = cart.reduce((a, b) => a + (b.qty * b.harga), 0);

    const res = await fetch("<?= base('/public/api/pesanan.php') ?>", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ cart, total })
    });

    const result = await res.json();

    if (result.success) {
      alert("Transaksi berhasil!");
      localStorage.removeItem("cart");
      window.location.reload();
    } else {
      alert(result.msg);
    }
  }

  cart.forEach(item => {
    const clone = template.content.cloneNode(true);
    clone.querySelector('img').src = `<?= base('/public/uploads/') ?>${item.gambar}`;
    clone.querySelector('.id-produk').textContent = "#" + item.id;
    clone.querySelector('.nama-produk').textContent = item.nama_produk;
    clone.querySelector('.harga-satuan').textContent = formatRupiah(item.harga);

    const input = clone.querySelector('input[type="number"]');
    input.value = item.qty;
    const subtotalEl = clone.querySelector('.subtotal');

    const hapusBtn = clone.querySelector('.hapus-btn');
    hapusBtn.addEventListener('click', () => {
      if (confirm(`Hapus ${item.nama_produk} dari keranjang?`)) {
        cart = cart.filter(i => i.id !== item.id);
        localStorage.setItem('cart', JSON.stringify(cart));
        tbody.removeChild(hapusBtn.closest('tr'));
        updateTotal();
      }
    });

    function updateSubtotal() {
      subtotalEl.textContent = formatRupiah(item.qty * item.harga);
      updateTotal();
    }

    clone.querySelector('.btn-plus').addEventListener('click', () => {
      item.qty++;
      input.value = item.qty;
      updateSubtotal();
      localStorage.setItem('cart', JSON.stringify(cart));
    });

    clone.querySelector('.btn-minus').addEventListener('click', () => {
      if (item.qty > 1) {
        item.qty--;
        input.value = item.qty;
        updateSubtotal();
        localStorage.setItem('cart', JSON.stringify(cart));
      }
    });

    input.addEventListener('change', () => {
      item.qty = parseInt(input.value);
      updateSubtotal();
      localStorage.setItem('cart', JSON.stringify(cart));
    });

    tbody.appendChild(clone);
    updateSubtotal();
  });

  updateTotal();
</script>

<?php require_once __DIR__ . '/../../partials/footer.php'; ?>