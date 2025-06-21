<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>My Laravel App</title>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <x-navbar />
    <div class="container">
        <input type="radio" name="dot" id="one">
        <input type="radio" name="dot" id="two">
        <div class="main-card">
            <div class="cards">
                <div class="card">
                    <div class="content">
                        <div class="img">
                            <img src="{{ asset('images/gul.jpg') }}" alt="Image">
                        </div>
                        <div class="details">
                            <div class="name">Gul Faraz Khan</div>
                            <div class="job">Web Designer</div>
                        </div>
                        <div class="media-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="img">
                            <img src="{{ asset('images/yasir.jpeg') }}" alt="Image">
                        </div>
                        <div class="details">
                            <div class="name">Yasir Ali Khan</div>
                            <div class="job">Web Devloper</div>
                        </div>
                        <div class="media-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cards"></div>
        </div>
    </div>
</body>

</html>
