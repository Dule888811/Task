
@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action ="{{route('admin.store')}}" method="POST">
        {{csrf_field()}}
        <div class="form-input-task">
            <h5>Task:</h5>
            <textarea name="task" id="task"  rows="6" cols="80" ></textarea>
        </div>

        <div class="form-input-task">
            <label for="startTask">Start at:</label>
            <input type="datetime-local" id="startTask" name="startTask">
        </div>

        <input type="submit" class="submitTask"   value="Add task"><br/>
    </form>
    <a class="backToMain" href ="{{route('admin.main')}}">Back to maintaining</a>
@endsection
