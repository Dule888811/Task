@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" onload="Submit()">

@if ($tasks != null)

                    @foreach($tasks as $task)

                        <div class="card-header border-dark">
                            @if(count($errors))
                                @foreach($errors->all() as $error)
                                    {{$error}}<br>
                                @endforeach
                            @endif
                                @if(!\Illuminate\Support\Facades\Auth::user()->tasks->contains($task->id))
                                    <form action="{{route('storeTaskResult')}}"   class="taskStore" name="taskStore" enctype="multipart/form-data" method="POST">
                                        {{csrf_field()}}
                                        <p>{{$task->description}}</p>
                                        <p>Did you do this task?</p>
                                        <input type="radio" id="yesIcan" name="taskResult" value="yes">
                                        <label for="yesIcan">Yes</label><br>
                                        <input type="radio" id="noWay" name="taskResult" value="no">
                                        <label for="noWay">No</label><br>
                                        <p>Did you do this task in 60minutes?</p>
                                        <input type="radio" id="yesFast" name="yesFast" value="yes">
                                        <label for="yesFast">Yes</label><br>
                                        <input type="radio" id="noWayFast" name="noWayFast" value="no">
                                        <label for="noWay">No</label><br>
                                        <label for="img">If you did,send image please:</label><br>
                                        <input type="file" id="img" name="img" accept="image/*">
                                        <input type="hidden"    class="taskId" name="taskId" value="{{$task->id}}"/>
                                        <input type="hidden"    class="taskStart" name="taskStart" value="{{$task->start}}"/>
                                        <input type="hidden" class="userId" name="userId" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                        <input type="submit" name="submit">
                                    </form>
                                    @else
                                        <p>{{$task->description}}</p>
                                        <p>{{'Done'}}</p>
                                    @endif
                        </div>
                    @endforeach
@endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
