<?php
/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  or null if none.
 */

function my_allow_meta_query( $valid_vars ) {
  $valid_vars = array_merge( $valid_vars, array( 'meta_key', 'meta_value', 'meta_query', 'meta_compare' ) );
  return $valid_vars;
}
add_filter( 'rest_query_vars', 'my_allow_meta_query' );

function search_resources( $data ) {
  // return $data;
  // $event = array();
  //
  // $args = array(
  //   's' => $data['keyword'],
  //   'numberposts' => -1,
  //   'post_type' => 'resource',
  //   'date_query' => array(
  // 		array(
  // 			'year'  => 2016,
  // 			'month' => 5,
  // 		),
  // 	),
  //   'tax_query' => array(
  //     array(
  //       'taxonomy' => 'resource_type',
  //       'field' => 'slug',
  //       'terms' => 'article'
  //     )
  //   )
  // );
  //
  // $resources = Timber::get_posts($args);
  //
  // if ( empty( $resources ) ) {
  //   return new WP_Error('no_event', 'Error listing resources', array(
  //     'status' => 404
  //   ));
  // } else {
  //   // foreach($resources as $resource) {
  //   //
  //   // }
  //   // echo '<pre style="font-size: 13px;">' . var_export($resources, true) . '</pre>';
  //   return $resources;
  // }
}

// add_action( 'rest_api_init', function () {
//   register_rest_route( 'wp/v2', '/resources/search', array(
//     'methods' => 'GET',
//     'callback' => 'search_resources',
//   ));
// });
