
<div class="candidate-main-box">
  <div class="candidate-content">
    <div class="candidate-image-box">
      <img src="{{ $candidate['image'] }}" alt="">
      <div class="candidate-about">
        <div class="candidate-details">
          <div class="candidate-name">{{ $candidate['name'] }}</div>
          <div class="candidate-job"><strong>Party:</strong> {{ $candidate['party'] }}</div>
          <div class="candidate-job"><strong>Slogan:</strong> {{ $candidate['slogan'] }}</div>
          <div class="candidate-job"><strong>Symbol:</strong> {{ $candidate['symbol'] }}</div>
        </div>
      </div>

      @auth
        @if(auth()->user()->role === 'admin')
          <form action="{{ route('candidate.destroy', $candidate['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="candidate-cancel" type="submit">Delete</button>
          </form>
        @endif
      @endauth
    </div>
  </div>
</div>
