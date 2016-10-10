<?php
//=============================================
// Media Archive
//=============================================
Routes::map('media', function($params){
  Routes::load('archive-media.php');
});
Routes::map('media/:type', function($params){
  $url = 'http://localhost:3000/media/?utf8=%E2%9C%93&page=1&type=' . $params['type'];
  header( "Location: $url" );
});
