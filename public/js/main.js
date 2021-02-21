$(document).ready(function() {

var forms = $(".taskStore");
$.each(forms,(function(i,forms) {
  //  var g = forms[i];
      //  g.submit();
 //   alert( forms[i].submit(null););
    var now = new Date().getTime();
    var start = $('.taskStart').val();
    var end = new Date(start).getTime() + 60000
        * 60;
    var interval = end - now;
    var h = $(this);
    setTimeout(function () {
    alert("Didn't finish your task on time")
    }, interval)
    })
);

    function SubmitForm()
    {

        alert('hello');

    }



    /*    $(".taskStore").each(function () {
            var now = new Date().getTime();
            var start = $('.taskStart').val();
            var end = new Date(start).getTime() + 60000
                * 60;
            var interval = end - now  ; */

         /*   $(this).load(function(){
                Submit(interval);
            }); */

          //      $(this).addEventListener()

         /*   (function (interval) {
                setTimeout(function(interval){
                    // your code handling here
                    alert('hello');
                }, interval);
            })/*


          //  setTimeout(submitForm(), interval)



      //   var timeout =
      //   alert(interval);
        });


    function Submit(interval)
    {
        setTimeout(SubmitForm(), interval)
    }



            // $(this).setInterval(submitForm(), interval);
      //  $(".taskStore").each(function(){
          // setInterval( $(this).submit(),SetInterval())
       //     alert(interval)
      //  }); */











});

