<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTournamentRequest;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{
    public function create()
    {
        return view('pages.tournaments.create');
    }

    public function store(StoreTournamentRequest $request)
    {
        // using transaction to ensure that all data is saved or none
        DB::beginTransaction();
        try {
            // get only validated data
            $data = $request->validated();

            // create tournament and attach users
            $tournament = Tournament::create();
            $tournament->users()->createMany($data['user']);

            DB::commit();

            return redirect()->route('tournaments.show', $tournament);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Tournament $tournament)
    {
        $tournament->load('users');

        return view('pages.tournaments.show', compact('tournament'));
    }
}
