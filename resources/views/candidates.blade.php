<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Laravel App</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/candidates.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    <x-navbar />
    <div class="cardbody">
<div class="wrapper" id="testimonial-wrapper">
    <!-- Cards will be injected here -->
  </div>
</div>
  <script>
  const testimonials = [
    {
      name: "Alex Smith",
      party: "Future Vision Party",
      slogan: "Innovation for All",
      symbol: "Laptop",
      stars: 2,
      image: "https://t3.ftcdn.net/jpg/06/99/46/60/360_F_699466075_DaPTBNlNQTOwwjkOiFEoOvzDV0ByXR9E.jpg",
      text: "Committed to a better digital tomorrow through inclusive tech policies."
    },
    {
      name: "Steven Chris",
      party: "Voice of Youth",
      slogan: "Empowering Every Voice",
      symbol: "Microphone",
      image: "https://www.shutterstock.com/image-photo/portrait-smiling-african-american-student-600nw-1194497215.jpg",
      text: "Advocating freedom of speech and stronger digital rights for youth."
    },
    {
      name: "Kristina Bellis",
      party: "People First Alliance",
      slogan: "Unity and Prosperity",
      symbol: "Handshake",
      image: "https://www.shutterstock.com/image-photo/smiling-african-american-millennial-businessman-600nw-1437938108.jpg",
      text: "Focused on equality, small business growth, and transparent governance."
    },  
    {
      name: "Alex Smith",
      party: "Future Vision Party",
      slogan: "Innovation for All",
      symbol: "Laptop",
      stars: 2,
      image: "https://t3.ftcdn.net/jpg/06/99/46/60/360_F_699466075_DaPTBNlNQTOwwjkOiFEoOvzDV0ByXR9E.jpg",
      text: "Committed to a better digital tomorrow through inclusive tech policies."
    },
    {
      name: "Steven Chris",
      party: "Voice of Youth",
      slogan: "Empowering Every Voice",
      symbol: "Microphone",
      image: "https://www.shutterstock.com/image-photo/portrait-smiling-african-american-student-600nw-1194497215.jpg",
      text: "Advocating freedom of speech and stronger digital rights for youth."
    },
    {
      name: "Kristina Bellis",
      party: "People First Alliance",
      slogan: "Unity and Prosperity",
      symbol: "Handshake",
      image: "https://www.shutterstock.com/image-photo/smiling-african-american-millennial-businessman-600nw-1437938108.jpg",
      text: "Focused on equality, small business growth, and transparent governance."
    },
    {
      name: "Alex Smith",
      party: "Future Vision Party",
      slogan: "Innovation for All",
      symbol: "Laptop",
      stars: 2,
      image: "https://t3.ftcdn.net/jpg/06/99/46/60/360_F_699466075_DaPTBNlNQTOwwjkOiFEoOvzDV0ByXR9E.jpg",
      text: "Committed to a better digital tomorrow through inclusive tech policies."
    },
    {
      name: "Steven Chris",
      party: "Voice of Youth",
      slogan: "Empowering Every Voice",
      symbol: "Microphone",
      image: "https://www.shutterstock.com/image-photo/portrait-smiling-african-american-student-600nw-1194497215.jpg",
      text: "Advocating freedom of speech and stronger digital rights for youth."
    },
    {
      name: "Kristina Bellis",
      party: "People First Alliance",
      slogan: "Unity and Prosperity",
      symbol: "Handshake",
      image: "https://www.shutterstock.com/image-photo/smiling-african-american-millennial-businessman-600nw-1437938108.jpg",
      text: "Focused on equality, small business growth, and transparent governance."
    }
  ];

  const wrapper = document.getElementById('testimonial-wrapper');

  testimonials.forEach((t, index) => {
  const box = document.createElement('div');
  box.className = 'box';
  box.innerHTML = `
    <i class="fas fa-quote-left quote"></i>
    <p>${t.text}</p>
    <div class="content">
      <div class="info">
        <div class="name">${t.name}</div>
        <div class="party"><strong>Party:</strong> ${t.party}</div>
        <div class="slogan"><strong>Slogan:</strong> "${t.slogan}"</div>
        <div class="symbol"><strong>Intikhabi Nishaan:</strong> ${t.symbol}</div>
      </div>
      <div class="image">
        <img src="${t.image}" alt="">
      </div>
    </div>
  `;

  wrapper.appendChild(box);

  // Trigger fade-in after slight delay to allow DOM to render
  setTimeout(() => {
    box.classList.add('fade-in');
  }, 100); // You can stagger with index * 200 if needed
});

</script>

</body>
</html>
