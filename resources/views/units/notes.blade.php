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
            <a href="/tasks">
                <button id="todo" onclick="hideTodo()" type="button" class="btn btn-success bg-transparent font-weight-bolder mb-2">
                OPEN TASKS
                </button>
            </a>
        </div>
        <notes-component></notes-component>
    </div>
@endsection