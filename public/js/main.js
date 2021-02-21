$(document).ready(function() {

    function submitForm()
    {
       this.form.submit();

    }


        $(".taskStore").each(function () {
            var now = new Date().getTime();
            var start = $('.taskStart').val();
            var end = new Date(start).getTime() + 60000
                * 60;
            var interval = end - now  ;
                var form = $(this);
      /*  $(this).setTimeout(function(){
                $(this).submit();
        },end); */
         //   setTimeout(function(){ this.form.submit() }, interval);
          // setTimeout(submitForm(), interval);


        });






            // $(this).setInterval(submitForm(), interval);


      //  $(".taskStore").each(function(){
          // setInterval( $(this).submit(),SetInterval())
       //     alert(interval)
      //  });











});

