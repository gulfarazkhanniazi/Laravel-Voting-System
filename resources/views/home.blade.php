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

    @auth
        @if(auth()->user()->role === 'admin')
            <!-- Add Election Button -->
            <div style="text-align: center;">
                <button onclick="toggleForm()" class="add-candidate">Add New Election</button>
            </div>

            <!-- Election Add Form -->
            <div class="candidate-form-wrapper" id="candidateForm" style="display: none;">
                <form id="election-form" class="candidate-form">
                    @csrf

                    <div class="form-row-alt">
                        <div class="form-field">
                            <input type="text" name="title" required>
                            <label>Election Title</label>
                        </div>

                        <div class="form-field">
                            <input type="datetime-local" name="end_date" required>
                        </div>
                    </div>

                    <div class="form-row-alt">
                        <label style="margin-bottom: 10px;">Select Candidates</label>
                        <div style="display: flex; flex-direction: column; gap: 10px;">
                            @foreach($candidates as $candidate)
                                <div style="display: flex; align-items: center; gap: 10px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                                    <input type="checkbox" id="candidate_{{ $candidate->id }}" name="candidate_ids[]" value="{{ $candidate->id }}">
                                    <label for="candidate_{{ $candidate->id }}" style="margin: 0;">
                                        {{ $candidate->name }} ({{ $candidate->party }})
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="election-form-message" style="margin: 10px 0;"></div>

                    <div class="submit-btn-alt">
                        <button type="submit">Create Election</button>
                    </div>
                </form>
            </div>
        @endif
    @endauth

    <!-- Voting Cards -->
    <div class="elections-container" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        @foreach($elections as $election)
            <x-voting-card :election="$election" />
        @endforeach
    </div>

    <x-cards />
    <x-reviews />

    <script>
        // Intersection animations
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
        elementsToReveal.forEach(el => observer.observe(el));

        // Toggle Election Form
        function toggleForm() {
            const form = document.getElementById('candidateForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        // Handle AJAX Election Form Submission
        document.getElementById('election-form')?.addEventListener('submit', async function (e) {
            e.preventDefault();
            const form = e.target;
            const messageBox = document.getElementById('election-form-message');
            messageBox.innerHTML = ''; // Clear previous messages

            const formData = new FormData(form);

            try {
                const response = await fetch("{{ route('election.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    messageBox.innerHTML = `<span style="color: green;">${data.success}</span>`;
                    form.reset();
                    setTimeout(() => {
                    location.reload();
                }, 1000);
                } else if (response.status === 422 && data.errors) {
                    let errors = '<ul style="color: red;">';
                    for (const field in data.errors) {
                        data.errors[field].forEach(msg => {
                            errors += `<li>${msg}</li>`;
                        });
                    }
                    errors += '</ul>';
                    messageBox.innerHTML = errors;
                } else if (data.error) {
                    messageBox.innerHTML = `<span style="color: red;">${data.error}</span>`;
                }
            } catch (error) {
                console.error(error);
                messageBox.innerHTML = `<span style="color: red;">Something went wrong. Please try again.</span>`;
            }
        });
    </script>
</body>
</html>
