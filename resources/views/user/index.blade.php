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
                                @if(\Illuminate\Support\Facades\Auth::user()->tasks()->find($task->id) == null)

                                    <form action="{{route('storeTaskResult')}}" id="formSubmitTask" name="taskStore" enctype="multipart/form-data" method="POST">
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
                                        <input type="hidden"   id="hiddenID" name="taskId" value="{{$task->id}}"/>
                                        <input type="hidden" id="{{\Illuminate\Support\Facades\Auth::id()}}" name="userId" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                        <input type="submit" name="submit">
                                    </form>
                                    @else
                                        <p>{{$task->description}}</p>
                                        <p>{{'Done'}}</p>
                                    @endif
                                @if(\Carbon\Carbon::now()->addMinutes(60) > $task->start && \Illuminate\Support\Facades\Auth::user()->tasks()->find($task->id) == null )
                                    <script>window.location = "{{ route('storeUnfinishedTask',['taskId' => $task->id]) }}";</script>
                                    @break
                                @else
                                   @continue
                                @endif

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
  <script>
      $(document).ready(function() {
          var startTime;
          startTime = jQuery("#hiddenID");
      //    alert($('input[id ="hiddenID"]').val());
          startTime.each(function() {
              $.each(this.attributes, function() {
                  // this.attributes is not a plain object, but an array
                  // of attribute nodes, which contain both the name and value
                  if(this.specified) {
                      console.log(this.name, this.value);
                  }
              });
          });
      });
  </script>
@endsection
