</div>
</div>

<script>
  const logout = document.getElementById('logout-btn');
  logout.addEventListener('click', async (e) => {
    e.preventDefault();
    localStorage.removeItem('cart');

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