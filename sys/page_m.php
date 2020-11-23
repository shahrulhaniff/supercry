<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<style>
p {
  text-align: center;
  font-size: 10vw;
  color : yellow;
  font-family: "Lucida Console", Helvetica, sans-serif;
  margin-top: 0px;
}
</style>
<!-- Full Background -->
<!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
<img src="https://thumbs.gfycat.com/ImpishQueasyBoubou-size_restricted.gif" alt="Full Background" class="full-bg full-bg-bottom animation-pulseSlow">
<!-- END Full Background -->

<!-- Login Container -->
<div id="error-container">
    <!-- Lock Header -->
    <p class="text-center push-top-bottom animation-slideDown">
        <img src="img/placeholders/avatars/javidol.png" alt="avatar" class="img-circle img-thumbnail-avatar-2x">
    </p>
    <h2 class="text-center text-light push-top-bottom animation-fadeInQuick">
        <strong>Page Under Maintenance!</strong><br>
        <small><em>We will back soon, stay tuned!</em></small>
    </h2>
    <!-- END Lock Header -->
	
<p class="text-center push-top-bottom animation-slideDown" id="demo"></p>
   
    <p class="text-center animation-fadeInQuick">
        <a><small>Give us a little bit more time</small></a>
    </p>
    <!-- END Lock Form -->
</div>
<!-- END Login Container -->

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 31, 2020 23:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  
  //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance / (1000 * 60 * 60 * 24 ))*24);
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML =  hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

<?php include 'inc/template_scripts.php'; ?>
<?php include 'inc/template_end.php'; ?>