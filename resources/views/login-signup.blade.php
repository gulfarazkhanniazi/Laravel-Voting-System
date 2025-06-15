<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Signup</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link rel="stylesheet" href="{{ asset('css/login-signup.css') }}">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body class="show-popup">
  <x-navbar />

  <div class="blur-bg-overlay"></div>

  <div class="form-popup">
    <div class="form-box login">
      <div class="form-details">
        <h2>Welcome Back</h2>
        <p>Please log in using your personal information to stay connected with us.</p>
      </div>
      <div class="form-content">
        <h2>LOGIN</h2>
        <form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="input-field">
    <input type="text" name="email" value="{{ old('email') }}" required />
    <label>Email</label>
  </div>
  <div class="input-field">
    <input type="password" name="password" required />
    <label>Password</label>
  </div>

  @if(session('login_error'))
    <p class="error">{{ session('login_error') }}</p>
  @endif

  <button type="submit">Log In</button>
</form>

        <div class="bottom-link">
          Don't have an account?
          <a href="#" id="signup-link">Signup</a>
        </div>
      </div>
    </div>

    <!-- Signup Form -->
    <div class="form-box signup">
      <div class="form-content">
        <h2>SIGNUP</h2>
        <form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="input-field">
    <input type="text" name="name" value="{{ old('name') }}" required />
    <label>Enter your name</label>
  </div>
  <div class="input-field">
    <input type="text" name="email" value="{{ old('email') }}" required />
    <label>Enter your email</label>
  </div>
  <div class="input-field">
    <input type="text" name="cnic" value="{{ old('cnic') }}" required />
    <label>Enter your cnic</label>
  </div>
  <div class="input-field">
    <input type="password" name="password" required />
    <label>Create password</label>
  </div>
  <div class="policy-text">
    <input type="checkbox" id="policy" required />
    <label for="policy">I agree the <a href="#">Terms & Conditions</a></label>
  </div>

  @if ($errors->any())
    <p class="error">{{ $errors->first() }}</p>
  @endif

  <button type="submit">Sign Up</button>
</form>

        <div class="bottom-link">
          Already have an account?
          <a href="#" id="login-link">Login</a>
        </div>
      </div>
      <div class="form-details">
        <h2>Create Account</h2>
        <p>To become a part of our community, please sign up using your personal information.</p>
      </div>
    </div>
  </div>

  <script>
    const body = document.body;
    const signupLink = document.querySelector("#signup-link");
    const loginLink = document.querySelector("#login-link");

    signupLink.onclick = (e) => {
      e.preventDefault();
      body.classList.add("show-signup");
    };

    loginLink.onclick = (e) => {
      e.preventDefault();
      body.classList.remove("show-signup");
    };
  </script>
</body>
</html>
