



<footer class="spacer">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h4>Xavier Internet Services Provider</h4>
                    <p><p>This Internet Services Provider is located in Philippines and offers plans and promo.  We aspire to be the service provider of choice of every Filipino family by delivering a digitally connected experience in every household. As we humanize technology, we keep families connected in a meaningful way. And by providing a compelling suite of multimedia services and solutions, we strengthen relationships within the family.
                <br> <br>
When choosing among the best high speed Internet providers, there are
several other factors that should be taken into consideration besides just the available download speeds.
<br>
 </p>
                </div>              
                 
                 <div class="col-sm-3">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Internet Plans</a></li>        
                        <li><a href="#">Internet Promo</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                 <div class="col-sm-4 subscribe">
                    <h4>Subscription</h4>
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter email id here">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Get Notify</button>
                    </span>
                    </div>
                    <div class="social">
                    <a href="#"><i class="fa fa-facebook-square" data-toggle="tooltip" data-placement="top" data-original-title="facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"  data-toggle="tooltip" data-placement="top" data-original-title="instragram"></i></a>
                    <a href="#"><i class="fa fa-twitter-square" data-toggle="tooltip" data-placement="top" data-original-title="twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest-square" data-toggle="tooltip" data-placement="top" data-original-title="pinterest"></i></a>
                    <a href="#"><i class="fa fa-tumblr-square" data-toggle="tooltip" data-placement="top" data-original-title="tumblr"></i></a>
                    <a href="#"><i class="fa fa-youtube-square" data-toggle="tooltip" data-placement="top" data-original-title="youtube"></i></a>
                    </div>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container-->    
    
    <!--/.footer-bottom--> 
</footer>

<div class="text-center copyright">Designd by <a href="">Xavier</a></div>

<a href="#home" class="toTop scroll"><i class="fa fa-angle-up"></i></a>




<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->    
</div>





<script src="assets/jquery.js"></script>
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="script.js"></script>




<!-- wow script -->
<script src="assets/wow/wow.min.js"></script>

<!-- uniform -->
<script src="assets/uniform/js/jquery.uniform.js"></script>


<!-- boostrap -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="assets/mobile/touchSwipe.min.js"></script>

<!-- jquery mobile -->
<script src="assets/respond/respond.js"></script>

<!-- gallery -->
<script src="assets/gallery/jquery.blueimp-gallery.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    // $("#strt_date").datepicker();
    // $("#end_date").datepicker();
    // Disabling the previous date apart from the present day and the future days in the datepicker
    $("#strt_date").datepicker({
  minDate: 0,
  onSelect: function(date) {
    $("#end_date").datepicker('option', 'minDate', date);
  }
});
     $("#end_date").datepicker({
  minDate: 0,
  onSelect: function(date) {
    $("#end_date").datepicker('option', 'minDate', date);
  }
});


//Xavier CODE 

$('.link').on("click", function(e) {
    e.preventDefault();
  
  var src = $(this).attr("href");

  $("#iframe_main").remove();

  
    var text = $(this).text();
    if (text=="Show") { 
    $('<iframe>', {
     src: src,
     id:  "iframe_main",
     height: "500px",
     width: "500px",
     frameborder: 0,
     scrolling: 'yes'
     })
     .appendTo('.main');/*if text inside #toggleMessage is Show...*/
    $(this).text("Hide"); 
    
 
    /*Change button text to Hide*/
        }else{
    $(this).text("Show");
    
  
    /*Change button text to Show*/
  } 
    
});

$('.link2').on("click", function(e) {
    e.preventDefault();
  
  var src = $(this).attr("href");

  $("#iframe_main2").remove();

  
    var text = $(this).text();
    if (text=="Show") { 
    $('<iframe>', {
     src: src,
     id:  "iframe_main2",
     height: "500px",
     width: "500px",
     frameborder: 0,
     scrolling: 'yes'
     })
     .appendTo('.main2');/*if text inside #toggleMessage is Show...*/
    $(this).text("Hide"); 
    
 
    /*Change button text to Hide*/
        }else{
    $(this).text("Show");
    
  
    /*Change button text to Show*/
  } 
    
});

/* CHAT CODE */

$(document).ready(function(){
 fetch_user();
 setInterval(function(){
  update_last_activity();
  fetch_user();
 }, 5000);
 function fetch_user() {
  $.ajax({
    url:"fetch_admin_only.php",
    method:"POST",
    success:function(data){
      $('#user_details').html(data);
    }
  })
 }
 function update_last_activity() {
  $.ajax({
    url:"update_last_activity.php",
    success:function(){}
  })
 }
function make_chat_dialog_box(to_user_id, to_user_name) {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" style="background-color:#bfa145" title="You have chat with Agent">';
  modal_content += '<div style="height:200px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control xd"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
  
}

  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  
  $("#user_dialog_"+to_user_id).dialog({
    autoOpen:false,
    width:400,
    height:400,
    resizable: false,
    position:{my:"right top",at:"left+600 top+205", of:"body"},
    draggable: false
    
    
  
  });
  $('#user_dialog_'+to_user_id).dialog('open');
    setInterval(function(){ // set interval for take messages for every 1 seconds and show into chat 
      refreshMsg();
    }, 1000); // <---- here 
function refreshMsg() {
  var to_user_id = $(this).data('touserid');
  var hvatajPoruke = $.ajax({
      url: "take_msg_toAdmin_only.php",
      method: "POST",
      data:{to_user_id:to_user_id},
      success: function(data) {
        $('#chat_history_'+to_user_id).html(data);
      }
   })
}

 //abort ajax call if user close chat :) 
$( ".selector" ).on( "dialogclose", function( event, ui ) {
    //alert("todo - later");
});
$(document).on('click', '.send_chat', function(){
  //$.playSound("mp3/click.mp3") // here we set MP3 SOUND FOR "send" button click
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
      url:"insert_chat_toAdmin_only.php",
      method:"POST",
      data:{to_user_id:to_user_id, chat_message:chat_message},
    success:function(data){
      $('#chat_message_'+to_user_id).val('');
      $('#chat_history_'+to_user_id).html(data);
    }
  })
 });
 
});

$(function(){
      $("#login").click(function(){
        $(this).after("<br /><br /><center><img src='images/prijava.gif' width='25px' alt='loading' />").fadeIn();
        window.open('screenleapShareSample.php');   // loader icon
      });
    });

</script>


<!-- custom script -->
<script src="assets/script.js"></script>










</body>
</html>





