@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{$percent = 100}}
                    <p class="text-center">SuccessPercent: {{$success}}%</p>
                    <p class="text-center">unsuccessPercent: {{$percent - $success}}%</p>


                        <a class="btn btn-primary" href ="{{route('admin.main')}}">Back</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
