@extends('layouts.app')

@section('content')

  <div class="w-100 h-100 d-flex align-items-center flex-column justify-content-center h-100 text-white" id="header">
    <h1 class="text-white display-4">deNoted App</h1>

    <form>
        <div class="form-group">
          <a href="/tasks">
          <button id="todo" onclick="hideTodo()" type="button" class="btn btn-success bg-transparent font-weight-bolder mb-2">
          OPEN TASKS
          </button>
          </a>

          <a href="/notes">
            <button id="notes" onclick="hideNotes()" type="button" class="btn btn-success bg-transparent font-weight-bolder mb-2">
            OPEN NOTES
            </button>
          </a>
        </div>
    </form>
    
    <!--
      <notes-component></notes-component>
      <todo-component></todo-component>
    -->
    
  </div>
@endsection

<script>
/*
    function hideTodo(){
      if(document.getElementById("readNotes").style.display = "block"){
      document.getElementById("readNotes").style.display = "none";
      document.getElementById("todoTask").style.display = "block";

      
    }

    function hideNotes(){
      if(document.getElementById("todoTask").style.display = "block"){
      document.getElementById("todoTask").style.display = "none";

      document.getElementById("readNotes").style.display = "block";
      }
    
    }
    function resetElement() {
      document.getElementById("todoTask").style.display = "none";
      document.getElementById("readNotes").style.display = "none";
    }
*/
  </script>