
<!DOCTYPE html>
<html>

<script type="text/javascript">
function checkconnection() {
var status = navigator.onLine;
if (status) {
alert("You are currently connected to the internet, answer will submit successfully");
} else {

alert("You have no internet connection, please connect to the internet first before submit");
return false;
}
}
</script>


<link rel="stylesheet" href="<?php echo base_url(); ?>assets/timer/compiled/flipclock.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/timer/compiled/jquery.cookie.js"></script>  
<script src="<?php echo base_url(); ?>assets/timer/compiled/flipclock.js"></script>   
</head>
</body>

  <script type="text/javascript">
  $(function(){
  // countDown = function(){
    var currentDate = Math.round(new Date() / 1000);

    var clock  = $('.clock').FlipClock({
      clockFace: 'MinuteCounter',
      autoStart: true,
      countdown: true,
            callbacks: {
                init: function() {
                    //store end date If it's not yet in cookies
                    if(!$.cookie('endDate')){
                        // end date = current date + 1 minutes
                        var endDate = Date.now() + <?php echo $totaly?>*180*1000; 

                        // store end date in cookies
                        $.cookie('endDate', Math.round(endDate / 1000)); 
                    }
                },
              stop: function() {
                //$('.message').html('The clock has stopped!');
                   alert('Time Over');
                  $.removeCookie('endDate');
                 // document.getElementById('forma').submit();
                   proses();
                
              },
             }
        });

        /* counter will be at first 1 min if the user refresh the page the counter will 
           be the difference between current and end Date, so like this counter can 
           continue the countdown normally in case of refresh. */
        var counter = $.cookie('endDate')-currentDate;

        clock.setTime(counter);
        clock.setCountdown(true);

        clock.start();
    // }

    //reset button
    $('#reset').click(function(){
        $.removeCookie('endDate'); //removing end date from cookies
        //countDown(); //launch countdown function
    });


    var sesion=$("input[name=sessionid]").val();

// alert("<?php echo base_url() ?>quizs/quiz_data/"+sesion);
    function proses(){
    $.ajax({
            url: '<?php echo base_url() ?>quizs/quiz_data',
            type: 'post',
            // dataType: 'json',
            data: $("#forma").serialize(),
            success: function(data) {
                //alert('Hebakkk');
                var seti=checkconnection();
                if(seti!=false){
                 window.location.href = "<?php echo base_url() ?>quizs/quiz_result/"+sesion;
               }

            }
    });

    }

    //Lanching count down on ready
    // countDown();
});
    
  </script>
  



       
            <section class="panel panel-default">
            <header class="panel-heading font-bold">                  
             Quiz For Module :  <?php echo $modulename->name; ?>           
            </header>
         
                    
            <div class="panel-body">
        
<!-- <div style="float:left; ">

  Time left: <div id="timer" style="display:inline;"/>
  <script type="text/javascript">window.onload = CreateTimer("timer", <?php echo $seconds;?>);</script>
  </div> -->
            <br/>
             <div class="clock" style="padding-left:600px;"></div>
            <div class="message"></div>
            <!-- <button id="reset">reset</button> -->
           

            <form method="POST" name="form-horizontal" class="form-horizontal" id="forma" onsubmit="return checkconnection()"  action="<?php echo base_url() ?>quizs/quiz_data"  >
            
            <div style="font-weight: bold" id="quiz-time-left"></div>
            <input type="hidden" name="userid" value="<?php echo $userid?>" />
            <input type="hidden" name="totaly" value="<?php echo $totaly?>" />
            <input type="hidden" name="sessionid" value="<?php echo $sessionid?>" />
            <input type="hidden" name="id" id="id" value="<?php echo $id?>">
            <input type="hidden" name="packageid" id="packageid" value="<?php echo $packageid?>">

            <?php 
            $x = 0;
            $j = 1;
            foreach ($q as $ques): ?>
                              <!-- <input type="text" name="correct" id="correct" value="<?php echo $y['correct']; ?> "> -->
            <div class="line line-dashed b-b line-lg pull-in"></div>                   
            <div class="form-group">
            <div class="col-sm-10">
            <?php echo $j;?>) <?php echo $ques->q_text?>
            <input type="hidden" name="q_id[<?php echo $x;?>]" id="q_id"  value="<?php echo $ques->q_id?>">
            </div>


                              <?php foreach ($a as $ans): 
                              if ($ques->q_id == $ans->q_id) { ?>
                              <div class="form-group">
                              <div class="col-sm-10">
                              
                              <input type="radio" name="a_id[<?php echo $x;?>]" id="a_id"  value="<?php echo $ans->a_id?>"><?php echo $ans->a_text?>
                              </div>
                              
                              <?php } endforeach; ?>
                            </div>




            <?php 
            $x++;
            $j++;
            endforeach; ?>
            </div>


            
            <input type="submit" class="btn btn-s-md btn-success" name="submit" value="Finish" />





            
</form>

 
</html>
</div>
