

$(document).ready(function() {

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


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var forms = $(".taskStore");
    $.each(forms,(function() {
    var now = new Date().getTime();
    var start = $('.taskStart').val();
    var end = new Date(start).getTime() + 60000
        * 60;
    var interval = end - now;
   var task_id =  $('.taskId').val();
     var  user_id  = $('.userId').val();
    setTimeout(function () {
        $.ajax({
            type:'POST',
            url:"/route",
            data:{task_id:task_id, user_id:user_id,_token: $('input[name=_token]').val()}
        });
    }, interval)

        })
    );


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




});






