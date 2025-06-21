<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web']);
    }

    public function store(Request $request)
    {
        Log::info('Vote attempt', $request->all());

        // Manual validation
        if (!$request->has(['election_id', 'candidate_id'])) {
            return redirect()->back()->with('error', 'Missing parameters');
        }

        // Verify user is authenticated
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'You must be logged in to vote.');
        }

        try {
            DB::beginTransaction();

            // Check if election exists
            $election = Election::find($request->election_id);
            if (!$election) {
                return redirect()->back()->with('error', 'Election not found');
            }

            // Check if candidate belongs to election
            $candidateExists = DB::table('candidate_election')
                ->where('election_id', $request->election_id)
                ->where('candidate_id', $request->candidate_id)
                ->exists();

            if (!$candidateExists) {
                return redirect()->back()->with('error', 'Invalid candidate');
            }

            // Check if user already voted
            $alreadyVoted = DB::table('election_user')
                ->where('user_id', auth()->id())
                ->where('election_id', $request->election_id)
                ->exists();

            if ($alreadyVoted) {
                return redirect()->back()->with('error', 'You have already voted in this election');
            }

            // Record user vote
            DB::table('election_user')->insert([
                'user_id' => auth()->id(),
                'election_id' => $request->election_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Increment candidate's vote count
            DB::table('candidate_election')
                ->where('election_id', $request->election_id)
                ->where('candidate_id', $request->candidate_id)
                ->increment('votes');

            DB::commit();

            return redirect()->back()->with('success', 'Vote counted successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Vote failed: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
