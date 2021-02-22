@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br class="card">



                        @foreach($allTask as $user)
                        <h5 name="SuccesUser">Name : {{$user['name']}}</h5><br>
                                <h5 name ="NumerOfTask">Number of tasks : {{$user['tasks']}}</h5>
                        @endforeach


                    </div>




@endsection
