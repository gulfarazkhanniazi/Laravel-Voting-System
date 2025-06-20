<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\User;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'election_id' => 'required|exists:elections,id',
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        $user = Auth::user();
        $election = Election::with('candidates')->find($request->election_id);

        if (Carbon::now()->gt(Carbon::parse($election->end_date))) {
            return response()->json(['error' => 'Voting has ended for this election.']);
        }

        $hasVoted = DB::table('election_user')
            ->where('user_id', $user->id)
            ->where('election_id', $election->id)
            ->exists();

        if ($hasVoted) {
            return response()->json(['error' => 'You have already voted in this election.']);
        }

        if (!$election->candidates->contains('id', $request->candidate_id)) {
            return response()->json(['error' => 'Invalid candidate selected.']);
        }

        DB::table('election_user')->insert([
            'user_id' => $user->id,
            'election_id' => $election->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('candidate_election')
            ->where('election_id', $election->id)
            ->where('candidate_id', $request->candidate_id)
            ->increment('votes');

        return response()->json(['success' => 'Your vote has been submitted!']);
    }
}
