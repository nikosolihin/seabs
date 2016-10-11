<?php
//=============================================
// Media Archive
//=============================================
Routes::map('media', function($params){
  Routes::load('archive-media.php');
});
Routes::map('media/:type', function($params){
  $url = get_bloginfo('url').'/media/?utf8=%E2%9C%93&page=1&types=' . $params['type'];
  header( "Location: $url" );
});
