
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a class="btn btn-primary" href ="{{route('admin.getBastWorkers')}}">Get bast workers</a>                @if(date('D') == 'Fri')
                    <p>yes</p>
                @endif
                @if(isset($tasks))

               @foreach($tasks as $task)
                    <div class="card-header">
                        @if( \Carbon\Carbon::now()->format('D') == 'Tue')
                            <p>{{$task->description}}</p>
                        @endif
                        <p>{{$task->description}}</p>
                        @if ($task->start >= \Carbon\Carbon::now() && $task->start <= \Carbon\Carbon::now()->addMinutes(60))
                        <p>Status:in progress</p>
                         @elseif($task->start > \Carbon\Carbon::now())
                            <p>Status:do to</p>
                            @else
                            <p>Status:Finish</p>

                            <p>Success<a class="btn btn-primary marginSuccess" href ="{{route('admin.success',['taskId' => $task->id])}}" >see percent of success tasks</a></p>
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
    @if(isset($tasks))
{{$tasks->links()}}
  @endif
    <a class="btn btn-primary" href ="{{route('admin.create')}}">Create new task</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
