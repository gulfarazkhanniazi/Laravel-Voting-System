<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        return view('candidates', compact('candidates'));
    }

    public function add(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('candidates.index')->with('error', 'Unauthorized access.');
        }

        $data = $request->validate([
            'name' => 'required|string|min:3',
            'party' => 'required|string|min:3',
            'symbol' => 'required|string',
            'slogan' => 'required|string|min:3',
            'image' => 'required|string|url',
        ]);

        Candidate::create($data);

        return redirect()->route('candidates.index')->with('success', 'Candidate added successfully!');
    }

    public function destroy(Candidate $candidate)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('candidates.index')->with('error', 'Unauthorized access.');
        }

        $candidate->delete();
        return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully!');
    }
}