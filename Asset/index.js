// Mengganti konten sesuai menu yang di-klik
const navItems = document.querySelectorAll('.nav-item');
const pageTitle = document.getElementById('page-title');
const pageContent = document.getElementById('page-content');

const pages = {
  dashboard: `<div class="card"><h2>Welcome, Admin!</h2><p>Gunakan menu di samping untuk mengelola produk, pesanan, profil, dan tampilan publik coffee shop Anda.</p></div>`,
  profile: `<div class="card"><h2>Admin Profile</h2><p>Kelola informasi profil admin di sini.</p></div>`,
  product: `<div class="card"><h2>Product Management</h2><p>Tambah, ubah, atau hapus produk coffee shop Anda.</p></div>`,
  order: `<div class="card"><h2>Order Management</h2><p>Kelola pesanan pelanggan secara real time.</p></div>`,
  display: `<div class="card"><h2>Display Public</h2><p>Atur tampilan publik coffee shop yang terlihat pelanggan.</p></div>`
};

navItems.forEach(item => {
  item.addEventListener('click', () => {
    // hilangkan class active di semua item
    navItems.forEach(i => i.classList.remove('active'));
    // tambahkan class active di item yang diklik
    item.classList.add('active');

    const page = item.dataset.page;
    pageTitle.textContent = item.querySelector('.text').textContent;
    pageContent.innerHTML = pages[page];
  });
});

document.getElementById('productno').addEventListener('click', function(){
  windows.location.href="../frontend/nyoba.php";
})
