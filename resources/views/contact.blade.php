<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Laravel App</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <x-navbar />
    <div class="container">
        <div class="contact-content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">New City, Wah Cantt</div>
                    <div class="text-two">L Block</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+92 300 0000000</div>
                    <div class="text-two">+92 300 0000000</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">gulfarazkhanniazii3@gmail.com</div>
                    <div class="text-two">gulfarazniazii3@gmail.com</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Send us a message</div>
                <p>If you have any work from me or any types of quries related to my tutorial, you can send me message
                    from here. It's my pleasure to help you.</p>
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="input-box">
                        <input type="text" name="name" placeholder="Enter your name" required
                            value="{{ old('name') }}">
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Enter your email" required
                            value="{{ old('email') }}">
                    </div>
                    <div class="input-box message-box">
                        <textarea name="message" placeholder="Enter your message" required>{{ old('message') }}</textarea>
                    </div>
                    <div class="button">
                        <input type="submit" value="Send Now">
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success" style="color: green; margin-bottom: 1rem;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" style="color: red; margin-bottom: 1rem;">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" style="color: red; margin-bottom: 1rem;">
                            <ul style="margin: 0; padding-left: 1rem;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </form>

            </div>
        </div>
    </div>
</body>

</html>
