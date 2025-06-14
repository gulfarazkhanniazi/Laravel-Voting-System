<nav class="navbar">
  <div class="navbar-content">
    <div class="logo">
      <a href="/">Gul-Yasir</a>
    </div>
    <ul class="menu-list">
      <div class="nav-icon nav-cancel-btn">
        <i class="fas fa-times"></i>
      </div>
      <li><a href="/">Home</a></li>
      <li><a href="#">Candidates</a></li>
      <li><a href="/about">About</a></li>
      <li><a href="/contact">Contact</a></li>
      <li><a href="/login">Login</a></li>
    </ul>
    <div class="nav-icon nav-menu-btn">
      <i class="fas fa-bars"></i>
    </div>
  </div>
</nav>

<script>
  const navBody = document.body;
  const navbar = document.querySelector(".navbar");
  const menuBtn = document.querySelector(".nav-menu-btn");
  const cancelBtn = document.querySelector(".nav-cancel-btn");

  menuBtn.onclick = () => {
    navbar.classList.add("navbar-open");
    menuBtn.classList.add("nav-hide");
    navBody.classList.add("nav-disabled");
  };

  cancelBtn.onclick = () => {
    navBody.classList.remove("nav-disabled");
    navbar.classList.remove("navbar-open");
    menuBtn.classList.remove("nav-hide");
  };

  window.onscroll = () => {
    window.scrollY > 20
      ? navbar.classList.add("sticky")
      : navbar.classList.remove("sticky");
  };
</script>
