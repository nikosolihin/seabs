<?php
function custom_wordings(){
  if ( $GLOBALS['pagenow'] != 'upload.php' ){
    return;
  } else { $GLOBALS['title'] =  __( 'File Library' ); }
}
add_action( 'admin_head', 'custom_wordings' );

function post_type_change_title_text( $title ){
  $screen = get_current_screen();
  if( 'page' == $screen->post_type) {
    $title = "Enter page's title";
  }
  if( 'person' == $screen->post_type) {
    $title = "Enter person's name";
  }
  if( 'resource' == $screen->post_type) {
    $title = "Enter resource's title";
  }
  return $title;
}
add_filter( 'enter_title_here', 'post_type_change_title_text' );
