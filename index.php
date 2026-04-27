<?php include('layouts/header.php'); ?>

<div class="card shadow-lg p-5 text-center">

<h1 class="mb-3">🔮 Descubra seu signo</h1>

<p class="text-muted mb-4">
Digite sua data de nascimento e descubra seu signo do zodíaco
</p>

<form id="signo-form" method="POST" action="show_zodiac_sign.php">

  <div class="mb-3">
    <input type="date" name="data_nascimento" class="form-control form-control-lg text-center" required>
  </div>

  <button type="submit" class="btn btn-dark btn-lg w-100">
    Descobrir ✨
  </button>

</form>

</div>

</div>
<script src="/Project/assets/js/script.js"></script>
</body>
</html>

