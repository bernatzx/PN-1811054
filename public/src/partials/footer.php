</div>

<div class="w-full px-5 py-2">
  <div class="bg-white shadow-md border py-2 px-5 text-center font-medium text-gray-400 text-xs">
    &copy; 2025 DM Store. Semua Hak Dilindungi.
  </div>
</div>

</div>

<script>
  const logout = document.getElementById('logout-btn');
  logout.addEventListener('click', async (e) => {
    e.preventDefault();

    try {
      const res = await fetch("<?= base('/public/api/auth.php') ?>?route=logout", {
        method: "POST",
        headers: { "Content-Type": "application/json" }
      });
      const result = await res.json();
      if (result.success) {
        window.location = "<?= base() ?>";
      }
    } catch (err) {
      console.error(err);
    }
  })
</script>

</body>

</html>