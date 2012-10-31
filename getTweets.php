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

foreach($a1[results] as $a) {
  //var_dump($a);
  // echo "----------";
  printf("<img src=\"%s\" />\n", $a['profile_image_url']);
  printf("%s", $a['text']);
  printf("<br />");
}

?>