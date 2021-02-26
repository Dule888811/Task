

$(document).ready(function() {

    function getInterval(start)
    {
        let now = new Date().getTime();
        let end = new Date(start).getTime() + 60000
            * 60;
        let interval = end - now;
        return interval;
    }



  /* forms.each(function(){
    let i = 0;
    let form = $(this);
    interval = getInterval(form);
    let taskID =  document.getElementsByClassName("example");
    let TaskId = $(taskID).val();
    let  userId  = $('.userId').val();
    alert(taskID);
    i++;
    t = setTimeout(function () {
        $.ajax({
            type:'POST',
            url:'/storeTask',
            data:{ taskId:taskId, userId:userId},
            success: function(data) {
                alert('Time for task is over!');
                location.reload();
            },
            error: (error) => {
                console.log(JSON.stringify(error));
            }
        });

    }  , interval )
}) */
    let forms = $(".taskStore");
    let i = 0;
    $.each(forms,(function() {
        let t;
        clearTimeout(t);
          let form = $(this);
            let taskStart =  document.getElementsByClassName("taskStart");
            let start = taskStart[i].value;
          interval = getInterval(start);
        let taskID =  document.getElementsByClassName("taskId");
       let taskId = taskID[i].value;
            let userID =  document.getElementsByClassName("userId");
            let userId = userID[i].value;
        i++;
       t = setTimeout(function () {
         $.ajax({
            type:'POST',
            url:'/storeTask',
            data:{ taskId:taskId, userId:userId},
            success: function(data) {
                alert('Time for task is over!');
                location.reload();
            },
            error: (error) => {
                console.log(JSON.stringify(error));
            }
        });

    }  , interval ) 
        })
    );


});







































