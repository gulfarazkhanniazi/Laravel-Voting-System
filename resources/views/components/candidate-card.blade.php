<div class="box fade-in">
  <i class="fas fa-quote-left quote"></i>
  <p>{{ $candidate['text'] ?? '' }}</p>
  <div class="content">
    <div class="info">
      <div class="name">{{ $candidate['name'] }}</div>
      <div class="party"><strong>Party:</strong> {{ $candidate['party'] }}</div>
      <div class="slogan"><strong>Slogan:</strong> "{{ $candidate['slogan'] }}"</div>
      <div class="symbol"><strong>Symbol:</strong> {{ $candidate['symbol'] }}</div>
    </div>
    <div class="image">
      <img src="{{ $candidate['image'] ?? 'https://via.placeholder.com/150' }}" alt="">
    </div>

    @auth
      @if(auth()->user()->role === 'admin')
        <form method="POST" action="{{ route('candidate.destroy', $candidate['id']) }}" class="delete-form">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn-delete">Delete</button>
        </form>
      @endif
    @endauth
  </div>
</div>
