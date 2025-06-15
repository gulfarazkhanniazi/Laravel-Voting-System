<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Laravel App</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    <x-navbar />

    <div class="img"></div>
  <div class="center">
    <div class="title">Secure & Transparent Online Voting</div>
    <div class="sub_title">Empowering organizations, institutions, and communities with a safe, real-time digital voting platform.</div>
    <div class="btns">
      <button><a href="#">Start Voting</a></button>
      <button><a href="/contact">Contact Us</a></button>
    </div>
  </div>

  <x-cards />
    <x-reviews />

    <script>
  const elementsToReveal = document.querySelectorAll('.testimonial-box, .center');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('show');
      }
    });
  }, {
    threshold: 0.2
  });

  elementsToReveal.forEach(el => {
    observer.observe(el);
  });
</script>

</body>
</html>
