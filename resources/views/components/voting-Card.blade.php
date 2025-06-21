@props(['election'])

@php
    use Carbon\Carbon;

    $now = Carbon::now();
    $isElectionEnded = $now->gt($election->end_date);
    $totalVotes = $election->candidates->sum('pivot.votes');
    $userVoted = auth()->check() ? auth()->user()->hasVotedIn($election->id) : false;
@endphp

<div class="vc-body">
    <div class="card">
        <div class="title">{{ $election->title }}</div>

        <div class="election-status">
            @if ($isElectionEnded)
                <span class="ended">
                    Ended on {{ \Carbon\Carbon::parse($election->end_date)->format('M d, Y H:i') }}
                </span>
            @else
                <span class="active">
                    Ends in {{ $now->diffForHumans($election->end_date, true) }}
                </span>
            @endif
        </div>

        <div class="content">
            @if (session('success'))
                <div class="vote-message success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="vote-message error">
                    {{ session('error') }}
                </div>
            @endif

            @if (auth()->check())
                <form action="{{ route('vote') }}" method="POST" class="vote-form">
                    @csrf
                    <input type="hidden" name="election_id" value="{{ $election->id }}">

                    <div class="candidates-list">
                        @foreach ($election->candidates as $candidate)
                            @php
                                $candidateVotes = $candidate->pivot->votes ?? 0;
                                $percentage = $totalVotes > 0 ? ($candidateVotes / $totalVotes) * 100 : 0;
                            @endphp

                            <div class="candidate-option">
                                <input type="radio" name="candidate_id"
                                    id="candidate_{{ $election->id }}_{{ $candidate->id }}" value="{{ $candidate->id }}"
                                    required @if ($isElectionEnded || $userVoted) disabled @endif>
                                <label for="candidate_{{ $election->id }}_{{ $candidate->id }}">
                                    <div class="candidate-info">
                                        <span class="candidate-name">{{ $candidate->name }}</span>
                                        <span class="candidate-party">({{ $candidate->party }})</span>
                                        <span class="candidate-symbol">{{ $candidate->symbol }}</span>
                                    </div>
                                    <div class="vote-progress">
                                        <div class="progress-bar" style="width: {{ $percentage }}%"></div>
                                        <span class="vote-count">{{ $candidateVotes }} votes
                                            ({{ round($percentage, 1) }}%)
                                        </span>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="button-row">
                        <button type="submit" class="vote-button" @if ($isElectionEnded || $userVoted) disabled @endif>
                            @if ($isElectionEnded)
                                Election Ended
                            @elseif($userVoted)
                                You've Voted
                            @else
                                Vote Now
                            @endif
                        </button>
                    </div>
                </form>
            @else
                <div class="login-required">
                    Please <a href="{{ route('login') }}">login</a> to vote in this election.
                </div>
            @endif

            @auth
                @if (auth()->user()->role === 'admin')
                    <form action="{{ route('election.destroy', $election->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" onclick="return confirm('Are you sure?')">
                            Delete Election
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</div>
