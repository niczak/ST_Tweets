<?php

function getTweets($hash_tag) {
    $url = 'http://search.twitter.com/search.json?q='.urlencode($hash_tag)."&include_entities=true";
    $ch = curl_init($url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $json = curl_exec($ch);
    curl_close ($ch);

    return $json;
}

$a1 = json_decode(getTweets('#SpyderOOODay'), true);
$a2 = json_decode(getTweets('#GoodbyeEatStreet'), true);
$a3 = json_decode(getTweets('#HelloLoringCorners'), true);

$html = "<ul id=\"filter-tweet\">\n";

foreach($a1[results] as $a) {
  $html .= "<li class=\"spydertrapoooday\">\n";

  if(!empty($a['entities']['media'][0]['media_url'])) {
    $html .= sprintf("<img src=\"%s\" /><br />\n", $a['entities']['media'][0]['media_url']);
  }
  $html .= sprintf("<a href=\"http://www.twitter.com/%s\"><img src=\"%s\" /></a>\n", 
    $a['from_user'], $a['profile_image_url']);
  $html .= sprintf("%s", $a['text']);
  $html .= "</li>\n";
}

foreach($a2[results] as $a) {
  $html .= "<li class=\"goodbyeeatstreet\">\n";

  if(!empty($a['entities']['media'][0]['media_url'])) {
    $html .= sprintf("<img src=\"%s\" /><br />\n", $a['entities']['media'][0]['media_url']);
  }
  $html .= sprintf("<a href=\"http://www.twitter.com/%s\"><img src=\"%s\" /></a>\n", 
    $a['from_user'], $a['profile_image_url']);
  $html .= sprintf("%s", $a['text']);
  $html .= "</li>\n";
}

foreach($a3[results] as $a) {
  $html .= "<li class=\"helloloringcorners\">\n";

  if(!empty($a['entities']['media'][0]['media_url'])) {
    $html .= sprintf("<img src=\"%s\" /><br />\n", $a['entities']['media'][0]['media_url']);
  }
  $html .= sprintf("<a href=\"http://www.twitter.com/%s\"><img src=\"%s\" /></a>\n", 
    $a['from_user'], $a['profile_image_url']);
  $html .= sprintf("%s\n", $a['text']);
  $html .= "</li>\n";
}

$html .= "</ul>\n";

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
<div id="content">
	<a href="#" class="hashtag" data-filter="*">All</a>
	<a href="#" class="hashtag" data-filter=".spyderooday">SpyderOOODay</a>
	<a href="#" class="hashtag" data-filter=".goodbyeeatstreet">GoodbyeEatStreet</a>
	<a href="#" class="hashtag" data-filter=".helloloringcorners">HelloLoringCorners</a>
	
	<div id="tweet-content">
<?php 
echo $html;
?>
	</div>
</div>
</body>
</html>