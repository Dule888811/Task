@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">



                        @foreach($allTask as $user)
                            <div class="card-header">

                                    <p>{{$user['name']}}</p>

                                <p>{{$user['tasks']}}</p>

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
    </div>
@endsection
