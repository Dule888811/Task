@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach($tasks as $task)
                        <div class="card-header border-dark">
                            @if(count($errors))
                                @foreach($errors->all() as $error)
                                    {{$error}}<br>
                                @endforeach
                            @endif
                            <form action="{{route('storeTaskResult')}}"enctype="multipart/form-data" method="POST">
                                {{csrf_field()}}
                                <p>{{$task->description}}</p>
                                <p>Did you do this task?</p>
                                <input type="radio" id="yesIcan" name="taskResult" value="yes">
                                <label for="yesIcan">Yes</label><br>
                                <input type="radio" id="noWay" name="taskResult" value="no">
                                <label for="noWay">No</label><br>
                                <label for="img">If you did,send image please:</label>
                                <input type="file" id="img" name="img" accept="image/*">
                                <input type="hidden" id="{{$task->id}}" name="taskId" value="{{$task->id}}">
                                <input type="hidden" id="{{\Illuminate\Support\Facades\Auth::id()}}" name="userId" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                <input type="submit" name="submitTask">
                            </form>
                        </div>
                    @endforeach
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
