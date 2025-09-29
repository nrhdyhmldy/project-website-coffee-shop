<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coffee Admin Dashboard</title>
  <link rel="stylesheet" href="Asset/style.css" />
</head>
<body>
  <aside class="sidebar">
    <h2 class="logo">☕ Coffee Shop Sejahtera</h2>
    <nav>
      <ul>
        <li class="nav-item active" data-page="dashboard">
          <span class="icon">🏠</span>
          <span class="text">Dashboard</span>
        </li>
        <li class="nav-item" data-page="profile">
          <span class="icon">👤</span>
          <span class="text">Admin Profile</span>
        </li>
        <!-- Ikon & teks Product Management dibuat sejajar -->
        <li class="nav-item" data-page="product">
          <span class="icon">☕</span>
          <span class="text">Product Management</span>
        </li>
        <li class="nav-item" data-page="order">
          <span class="icon">🛒</span>
          <span class="text">Order Management</span>
        </li>
        <li class="nav-item" data-page="display">
          <span class="icon">🌐</span>
          <span class="text">Display Public</span>
        </li>
      </ul>
    </nav>
  </aside>

  <main class="content">
    <header>
      <h1 id="page-title">Welcome Admin</h1>
    </header>
    <section id="page-content">
      <div class="card">
        <h2>Welcome, Admin!</h2>
        <p>Gunakan menu di samping untuk mengelola produk, pesanan, profil, dan tampilan publik coffee shop Anda.</p>
      </div>
      <br>
      <div class="card-flex">
        <h2>Total Order</h2>
      </div>
    </section>
  </main>

  <script src="Asset/script.js"></script>
</body>
</html>
