@extends('layouts.app')

@section('content')
    <form action="">
        <h1 class="font-bold text-xl">Create Tournament</h1>
        <div class="flex flex-col gap-2 p-2" id="userDetailsContainer">
            <div class="userDetail bg-indigo-50 p-2 flex flex-col rounded-md">
                <h2 class="font-bold">User Detail</h2>
                <div class="flex flex-col">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="border border-indigo-200 p-1">
                </div>
                  <div class="flex flex-col">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="border border-indigo-200 p-1">
                </div>
            </div>
            <button type="button" id="addUserBtn" class="text-indigo-700">+ Add More User</button>
        </div>
        <button type="submit"
            class="bg-indigo-700 text-white block w-full p-2 rounded-md hover:bg-indigo-500 hover:text-indigo-50">Start
            Tournament</button>
    </form>
@endsection

@push('internal-body-scripts')
    @vite(['resources/js/addTournament.js'])
@endpush
