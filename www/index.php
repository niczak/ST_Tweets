<?php
require_once("getTweets.php");

?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <title>Spyder Trap</title>
  <link rel="stylesheet" href="css/all.css">
  <script src="js/jquery-1.8.2.min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.colorbox-min.js"></script>
  <script src="js/my.js"></script>
  <link rel="stylesheet" href="css/shadowbox/shadowbox.css">
  <link rel="stylesheet" href="css/colorbox.css">
  <script>
$(document).ready(function() {
	var $container = $('#filter-tweet');
	$container.isotope({});
	
	$('.hashtag').click(function(){
	
	var selector = $(this).attr('data-filter');
	$container.isotope({ filter: selector });
		return false;
	});
	$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
});
  </script>
</head>
<body>
<center>
<div id="content">
	<div id="link">	
		<a href="#" class="hashtag" data-filter="*">All</a>
		<a href="#" class="hashtag" data-filter=".spydertrapoooday">SpyderOOODay</a>
		<a href="#" class="hashtag" data-filter=".goodbyeeatstreet">GoodbyeEatStreet</a>
		<a href="#" class="hashtag" data-filter=".helloloringcorners">HelloLoringCorners</a>
	</div>
	<div id="tweet-content">
<?php 
echo $html;
?>
	</div>
</div>
</center>
</body>
</html>
