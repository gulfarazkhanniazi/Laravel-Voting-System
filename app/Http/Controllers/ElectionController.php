<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class ElectionController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized access.'], 403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:3',
            'end_date' => 'required|date|after:now',
            'candidate_ids' => 'required|array|min:1',
            'candidate_ids.*' => 'exists:candidates,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $election = Election::create([
            'title' => $request->title,
            'end_date' => $request->end_date,
        ]);

        foreach ($request->candidate_ids as $candidateId) {
            $election->candidates()->attach($candidateId, ['votes' => 0]);
        }

        return response()->json(['success' => 'Election created successfully!']);
    }

    public function destroy($id)
{
    if (Auth::user()->role !== 'admin') {
        return redirect()->back()->with('error', 'Unauthorized access.');
    }

    $election = Election::findOrFail($id);
    $election->delete();

    return redirect()->back()->with('success', 'Election deleted successfully!');
}


    public function index()
    {
        $now = Carbon::now();

        $elections = Election::with('candidates')
            ->get()
            ->sortBy(function ($election) use ($now) {
                return $election->end_date < $now ? 1 : 0;
            })->values();

        return response()->json($elections);
    }

    public function showHome()
    {
        $elections = Election::with('candidates')->get();
        $candidates = Candidate::all();

        return view('home', compact('elections', 'candidates'));
    }

}

