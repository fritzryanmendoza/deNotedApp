@extends('layouts.app')
@section('content')
    <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center">   
        <h1 class="text-white display-4">deNoted App</h1>

        <div>
        <a href="/">
            <button type="button" class="btn btn-success bg-transparent font-weight-bolder mb-2">
            BACK TO MENU
            </button>
        </a>
        <a href="/notes">
            <button id="notes" onclick="hideNotes()" type="button" class="btn btn-success bg-transparent font-weight-bolder mb-2">
            OPEN NOTES
            </button>
        </a>
        </div>
        
        <todo-component></todo-component>
    </div>
@endsection