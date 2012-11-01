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
  $html .= sprintf("<a href=\"http://www.twitter.com/%s\"><img style=\"width:48px; height:48px;\" src=\"%s\" /></a>\n", 
    $a['from_user'], $a['profile_image_url']);
  $html .= sprintf("%s", $a['text']);
  $html .= "</li>\n";
}

foreach($a2[results] as $a) {
  $html .= "<li class=\"goodbyeeatstreet\">\n";

  if(!empty($a['entities']['media'][0]['media_url'])) {
    $html .= sprintf("<img src=\"%s\" /><br />\n", $a['entities']['media'][0]['media_url']);
  }
  $html .= sprintf("<a href=\"http://www.twitter.com/%s\"><img style=\"width:48px; height:48px;\" src=\"%s\" /></a>\n", 
    $a['from_user'], $a['profile_image_url']);
  $html .= sprintf("%s", $a['text']);
  $html .= "</li>\n";
}

foreach($a3[results] as $a) {
  $html .= "<li class=\"helloloringcorners\">\n";

  if(!empty($a['entities']['media'][0]['media_url'])) {
    $html .= sprintf("<img src=\"%s\" /><br />\n", $a['entities']['media'][0]['media_url']);
  }
  $html .= sprintf("<a href=\"http://www.twitter.com/%s\"><img style=\"width:48px; height:48px;\" src=\"%s\" /></a>\n", 
    $a['from_user'], $a['profile_image_url']);
  $html .= sprintf("%s\n", $a['text']);
  $html .= "</li>\n";
}

$html .= "</ul>\n";

?>
