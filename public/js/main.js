

$(document).ready(function() {












    let forms = $(".taskStore");
    $.each(forms,(function() {
         /*   $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });  */
            let now = new Date().getTime();
            let start = $('.taskStart').val();
            let end = new Date(start).getTime() + 60000
        * 60;
            let interval = end - now;
            let taskId =  $('.taskId').val();
            let  userId  = $('.userId').val();
          //  let token = '{{csrf_token()}}';


          ///   alert(interval);



    setTimeout(function () {
         $.ajax({
            type:'POST',
            url:'/storeTask',
         //   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{ taskId:taskId, userId:userId},
            success: function(data) {
                alert('Time for task is over!');
                $(this).remove();
            },
            error: (error) => {
                console.log(JSON.stringify(error));
            }
        });
//alert('Time for taks is over.');
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











