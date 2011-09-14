<?php
/*
Plugin Name: Embeds
Plugin URI: http://github.com/halan/embeds
Description: Auto embed youtube and SoundCloud
Author: Halan Pinheiro
Version: 0.0.1
Author URI: http://github.com/halan*/

function embeds_youtube_post($the_content)
{
  $output = eregi_replace('http://www\.youtube\.com/watch\?v=([a-zA-Z0-9_-]+)[^ ]*',
    '<iframe src="http://www.youtube.com/embed/\1" frameborder="0" allowfullscreen></iframe>',
    $the_content);
  return $output;
}

add_filter('the_content', 'embeds_youtube_post');
add_filter('the_excerpt', 'embeds_youtube_post');


function embeds_soundcloud_post($the_content)
{
  $output = eregi_replace('(http://soundcloud\.com/[^ ]*)',
    '<object height="81" width="100%"> <param name="movie" value="http://player.soundcloud.com/player.swf?url=\1&amp;show_comments=true&amp;auto_play=false&amp;color=b1c522"></param> <param name="allowscriptaccess" value="always"></param> <embed allowscriptaccess="always" height="81" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F23249194&amp;show_comments=true&amp;auto_play=false&amp;color=b1c522" type="application/x-shockwave-flash" width="100%"></embed> </object>',
    $the_content);
  return $output;
}

add_filter('the_content', 'embeds_soundcloud_post');
add_filter('the_excerpt', 'embeds_soundcloud_post');




?>
