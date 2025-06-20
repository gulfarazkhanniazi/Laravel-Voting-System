@props(['election'])

<div class="vc-body">
  <div class="card">
    <div class="title">{{ $election->title }}</div>

    <div class="content">
      {{-- ✅ Feedback area --}}
      <div id="vote-message" style="text-align:center; margin-bottom: 10px;"></div>

      {{-- ✅ Vote Form --}}
      <form id="vote-form">
        @csrf
        <input type="hidden" name="election_id" value="{{ $election->id }}">

        @foreach($election->candidates as $candidate)
          <div class="candidate-option">
            <input 
              type="radio" 
              name="candidate_id" 
              id="candidate_{{ $candidate->id }}" 
              value="{{ $candidate->id }}" 
              required
            >
            <label for="candidate_{{ $candidate->id }}">
              {{ $candidate->name }} ({{ $candidate->party }}) - {{ $candidate->symbol }}
            </label>
          </div>
        @endforeach

        <div class="button-row">
          <button class="vote-button" type="submit">Vote</button>
        </div>
      </form>

      {{-- ✅ Admin-only Delete Form --}}
      @auth
        @if(auth()->user()->role === 'admin')
          <form action="{{ route('election.destroy', $election->id) }}" method="POST" class="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Delete Election</button>
          </form>
        @endif
      @endauth
    </div>
  </div>
</div>

{{-- ✅ AJAX Voting Script --}}
<script>
  document.getElementById('vote-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const messageBox = document.getElementById('vote-message');

    fetch("{{ route('vote.store') }}", {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
      },
      body: formData
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        messageBox.innerHTML = `<span style="color: green;">${data.success}</span>`;
        form.reset();
      } else if (data.error) {
        messageBox.innerHTML = `<span style="color: red;">${data.error}</span>`;
      }
    })
    .catch(error => {
      console.error('Voting error:', error);
      messageBox.innerHTML = `<span style="color: red;">Something went wrong.</span>`;
    });
  });
</script>
