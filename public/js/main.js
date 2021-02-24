

$(document).ready(function() {












    var forms = $(".taskStore");
    $.each(forms,(function() {
    var now = new Date().getTime();
    var start = $('.taskStart').val();
    var end = new Date(start).getTime() + 60000
        * 60;
    var interval = end - now;
   var task_id =  $('.taskId').val();
     var  user_id  = $('.userId').val();
     var token = "{!! csrf_token() !!}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


    setTimeout(function () {
         $.ajax({
            type:'POST',
            url:'/admin/store',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{ "task_id":task_id, "user_id":user_id, "_token": token},
            success: function(data) {
                alert(data.d);
            },
            error: function(data){
                alert("fail");
            }
        });

     /*   $.post('/admin/store', {task_id:task_id,user_id:user_id, _token: '{{ csrf_token() }}'}, function(data) {
            alert('yes');
        }); */
    }  , interval)
        })
    );










});


/*      $.each(forms,(function() {
       var now = new Date().getTime();
       var start = $('.taskStart').val();
       var end = new Date(start).getTime() + 60000
           * 60;
       var interval = end - now;

       setTimeout(function () {
           $(this).submit();
       }, interval)
   })
); */










/* $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });
  $.each(forms,(function() {

      var now = new Date().getTime();
      var start = $('.taskStart').val();
      var end = new Date(start).getTime() + 60000
          * 60;
      var interval = end - now;
      setTimeout(function () {
          var request = $.ajax({
              url: '/storeTask',
              method: 'post',
              data: {
                  task_id: $('.taskId').val(),
                  user_id: $('.userId').val(),
                  '_token': $('input[name=_token]').val()
              },
              success: function (data) {
                  console.log(data);
              }
          }, interval)




  );
  })

 */


      //  $.post('admin/store', { task_id:task_id, user_id:user_id,_token: $('input[name=_token]').val()}, function(response) {
       //     alert('yes');
     //   })
    /*    $.post("admin/store",
            {
                task_id: task_id,
                user_id: user_id,
                _token: token
            },
            function(){
                alert("Data");
            }); */















  /*  var myinterval;
         function submiForm()
        {
            $(this).submit();
            clearInterval(myinterval);
        }

    $.each(forms,(function() {
        var now = new Date().getTime();
        var start = $('.taskStart').val();
        var end = new Date(start).getTime() + 60000
            * 60;
        var interval = end - now;
        myinterval = setInterval(submiForm, interval);
        })
    ); */











