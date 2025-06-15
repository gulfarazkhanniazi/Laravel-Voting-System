<nav class="navbar">
  <div class="navbar-content">
    <div class="logo">
      <a href="/">Yasir-Gul</a>
    </div>
    <ul class="menu-list">
      <div class="nav-icon nav-cancel-btn">
        <i class="fas fa-times"></i>
      </div>
      <li><a href="/">Home</a></li>
      <li><a href="/candidates">Candidates</a></li>
      <li><a href="/about">About</a></li>
      <li><a href="/contact">Contact</a></li>
      @auth
        <li class="user-menu">
          <a href="#" id="userMenuBtn">{{ auth()->user()->name }} ▾</a>
          <ul class="dropdown">
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">
                  Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
      @else
        <li><a href="/login">Login</a></li>
      @endauth

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


  /*********** DrpDown Script ***************** */
  const btn = document.getElementById('userMenuBtn');
  const dropdown = btn.nextElementSibling;

  btn.addEventListener('click', e => {
    e.preventDefault();
    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
  });

  btn.addEventListener('mouseenter', () => dropdown.style.display = 'block');
  btn.addEventListener('mouseleave', () => {
    setTimeout(() => { if (!dropdown.matches(':hover')) dropdown.style.display = 'none'; }, 200);
  });
  dropdown.addEventListener('mouseleave', () => dropdown.style.display = 'none');
  dropdown.addEventListener('mouseenter', () => dropdown.style.display = 'block');
</script>
