@extends('layouts.app')

@section('content')
    <h1 class="font-bold text-2xl">Tournament Details</h1>

    @php
        $winners = $tournament->users;
        $groups = $tournament->users->chunk(2);
        $round = 1;
    @endphp

    @while ($winners->count() > 1)
        @php
            $newWinners = collect();
        @endphp

        <h2 class="font-bold text-xl my-3">Round {{ $round }}</h2>

        <div class="flex gap-3">
            @foreach ($groups as $group)
                <div class="flex flex-col gap-2">
                    <h3 class="font-bold text-lg">Group {{ $loop->iteration }}</h3>
                    <p class="text-sm">{{ $group->pluck('name')->implode(', ') }}</p>

                    @php
                        $winner = $group->random();
                        $newWinners->push($winner);
                    @endphp

                    <p class="text-sm text-green-700 font-medium">
                        @if ($groups->count() == 1)
                            Final
                        @endif
                        Winner: {{ $winner->name }}
                    </p>
                </div>
            @endforeach
        </div>

        @php
            $winners = $newWinners;
            $groups = $winners->chunk(2);
            $round++;
        @endphp
    @endwhile
@endsection
