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

    <!-- Display Success or Error Message -->
    @if (session('success'))
        <div style="text-align: center; color: green; margin: 10px 0;">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div style="text-align: center; color: red; margin: 10px 0;">
            {{ session('error') }}
        </div>
    @endif

    <!-- Add Candidate Button (admin only) -->
    @auth
        @if(auth()->user()->role === 'admin')
            <div style="text-align: center;">
                <button onclick="toggleForm()" class="add-candidate">
                    Add Candidate
                </button>
            </div>
        @endif
    @endauth

    <!-- Candidate Add Form -->
    <div class="candidate-form-wrapper" id="candidateForm" style="display: none;">
        <form action="{{ route('add') }}" method="POST" class="candidate-form">
            @csrf
            <div class="form-row-alt">
                <div class="form-field">
                    <input type="text" name="name" required value="{{ old('name') }}">
                    <label>Candidate Name</label>
                    @error('name')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <input type="text" name="party" required value="{{ old('party') }}">
                    <label>Candidate Party</label>
                    @error('party')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row-alt">
                <div class="form-field">
                    <input type="text" name="symbol" required value="{{ old('symbol') }}">
                    <label>Election Symbol</label>
                    @error('symbol')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <input type="text" name="slogan" required value="{{ old('slogan') }}">
                    <label>Slogan</label>
                    @error('slogan')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row-alt">
                <div class="form-field">
                    <input type="text" name="image" required value="{{ old('image') }}">
                    <label>Image URL</label>
                    @error('image')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="submit-btn-alt">
                <button type="submit">Add Candidate</button>
            </div>
        </form>
    </div>

    <!-- Candidates Cards -->
    <div class="cardbody">
        <div class="wrapper" id="testimonial-wrapper">
            @if($candidates->count())
                @foreach ($candidates as $candidate)
                        <x-candidate-card :candidate="$candidate" />
                @endforeach
            @else
                <p style="text-align: center; color: gray;">No candidates available.</p>
            @endif
        </div>
    </div>

    <script>
        // Fade-in effect for cards
        document.addEventListener("DOMContentLoaded", () => {
            const boxes = document.querySelectorAll('.box');
            boxes.forEach((box, index) => {
                setTimeout(() => {
                    box.classList.add('fade-in');
                }, index * 200);
            });
        });

        // Toggle Add Form visibility
        function toggleForm() {
            const form = document.getElementById('candidateForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>