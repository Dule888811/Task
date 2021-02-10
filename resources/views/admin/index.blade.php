
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

               @foreach($tasks as $task)
                    <div class="card-header">
                        <p>{{$task->description}}</p>
                        @if ($task->start >= \Carbon\Carbon::now()->addMinutes(60))
                        <p>Status:in progress</p>
                         @else
                            <p>Status:finish</p>
                        @endif
                    </div>
                @endforeach

                <div class="card-body">
@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
@endif
    <a class="btn btn-primary" href ="{{route('admin.create')}}">Create new task</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
