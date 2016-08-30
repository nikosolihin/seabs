<?php
/*
 **************************
 * Custom Theme Functions *
 **************************
 */
 // Remove classes from wp_list_pages
 function remove_page_class($wp_list_pages) {
	$pattern = '/current_page_[a-z]+/';
	$replace_with = 'is-Active';
  $first_phase = preg_replace($pattern, $replace_with, $wp_list_pages);

  $pattern = '/\<li class="page_item[^>]*(?=is-Active)/';
	$replace_with = '<li class="';
  $second_phase = preg_replace($pattern, $replace_with, $first_phase);

  $pattern = '/\<li class="page_item[^>]*>/';
	$replace_with = '<li>';
  $third_phase = preg_replace($pattern, $replace_with, $second_phase);

  $pattern = "/\<ul class='children[^>]*>/";
	$replace_with = '<ul class="List">';
	return preg_replace($pattern, $replace_with, $third_phase);
}
add_filter('wp_list_pages', 'remove_page_class');

//=============================================
// List component
//=============================================
function populateList($options) {

  $tax_query = array( 'relation' => 'AND', );
  $args = array(
  	'numberposts'	=> $options['quantity'],
  	'post_type'		=> 'resource',
    'tax_query'   => $tax_query,
	);

  if ( in_array('type', $options['taxonomies']) ) {
    array_push($tax_query, array(
      'taxonomy'         => 'resource_type',
      'field'            => 'term_id',
      'terms'            => $options['type_ids'],
      'include_children' => false,
    ));
  }
  if ( in_array('topic', $options['taxonomies']) ) {
    array_push($tax_query, array(
      'taxonomy' => 'resource_topic',
      'field'    => 'term_id',
      'terms'    => $options['topic_ids'],
    ));
  }
  if ( $options['sort'] == 'date') {
    $args['orderby']  = 'date';
  } else {
    $args['meta_key'] = 'post_views_count';
    $args['orderby']  = 'meta_value_num';
  }

  return get_posts( $args );
}

//=============================================
// Get/Set view count
//=============================================
function getPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if( $count == '' ){
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, $count);
  }
  return (int)$count;
}
function setPostViews($postID) {
  session_start();
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if( $count == '' ){
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, $count);
  } else {
    if( !isset($_SESSION['post_views_count-' . $postID]) ) {
      $_SESSION['post_views_count-'. $postID] = "si";
      $count++;
      update_post_meta($postID, $count_key, $count);
    }
  }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
* Singularize a string.
* Converts a word to english singular form.
*
* Usage example:
* {singularize "people"} # person
*/
// function singularize ($params)
// {
//   if (is_string($params))
//   {
//     $word = $params;
//   } else if (!$word = $params['word']) {
//     return false;
//   }
//   $singular = array (
//     '/(quiz)zes$/i' => '\\1',
//     '/(matr)ices$/i' => '\\1ix',
//     '/(vert|ind)ices$/i' => '\\1ex',
//     '/^(ox)en/i' => '\\1',
//     '/(alias|status)es$/i' => '\\1',
//     '/([octop|vir])i$/i' => '\\1us',
//     '/(cris|ax|test)es$/i' => '\\1is',
//     '/(shoe)s$/i' => '\\1',
//     '/(o)es$/i' => '\\1',
//     '/(bus)es$/i' => '\\1',
//     '/([m|l])ice$/i' => '\\1ouse',
//     '/(x|ch|ss|sh)es$/i' => '\\1',
//     '/(m)ovies$/i' => '\\1ovie',
//     '/(s)eries$/i' => '\\1eries',
//     '/([^aeiouy]|qu)ies$/i' => '\\1y',
//     '/([lr])ves$/i' => '\\1f',
//     '/(tive)s$/i' => '\\1',
//     '/(hive)s$/i' => '\\1',
//     '/([^f])ves$/i' => '\\1fe',
//     '/(^analy)ses$/i' => '\\1sis',
//     '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\\1\\2sis',
//     '/([ti])a$/i' => '\\1um',
//     '/(n)ews$/i' => '\\1ews',
//     '/s$/i' => ''
//   );
//   $irregular = array(
//     'person' => 'people',
//     'man' => 'men',
//     'child' => 'children',
//     'sex' => 'sexes',
//     'move' => 'moves'
//   );
//   $ignore = array(
//     'equipment',
//     'information',
//     'rice',
//     'money',
//     'species',
//     'series',
//     'fish',
//     'sheep',
//     'press',
//     'sms',
//   );
//   $lower_word = strtolower($word);
//   foreach ($ignore as $ignore_word)
//   {
//     if (substr($lower_word, (-1 * strlen($ignore_word))) == $ignore_word)
//     {
//       return $word;
//     }
//   }
//   foreach ($irregular as $singular_word => $plural_word)
//   {
//     if (preg_match('/('.$plural_word.')$/i', $word, $arr))
//     {
//       return preg_replace('/('.$plural_word.')$/i', substr($arr[0],0,1).substr($singular_word,1), $word);
//     }
//   }
//   foreach ($singular as $rule => $replacement)
//   {
//     if (preg_match($rule, $word))
//     {
//       return preg_replace($rule, $replacement, $word);
//     }
//   }
//   return $word;
// }
