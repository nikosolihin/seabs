<?php
/* https://gist.github.com/JiveDig/5822fe57e5537ce6bdad#file-cpt_filter_by_taxonomy_admin-php
*/
/**
 * Display resource type dropdown in admin
 */
// add_action('restrict_manage_posts', 'gcf_filter_resources_by_type');
// function gcf_filter_resources_by_type() {
// 	global $typenow;
// 	$post_type = 'resource';
// 	$taxonomies = array('resource_type', 'resource_topic');
// 	if ($typenow == $post_type) {
//     foreach ($taxonomies as $taxonomy) {
//   		$selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
//   		$info_taxonomy = get_taxonomy($taxonomy);
//   		wp_dropdown_categories(array(
//   			'show_option_all' => __("All {$info_taxonomy->label}"),
//   			'taxonomy'        => $taxonomy,
//   			'name'            => $taxonomy,
//   			'orderby'         => 'name',
//   			'selected'        => $selected,
//   			'show_count'      => false,
//         'hierarchical'    => true,
//         'depth'           => 3,
//   			'hide_empty'      => true,
//   		));
//     }
//   }
// }
//
// /**
//  * Filter posts by resource type in admin
//  */
// add_filter('parse_query', 'gcf_convert_id_to_term_in_query');
// function gcf_convert_id_to_term_in_query($query) {
// 	global $pagenow;
// 	$post_type = 'resource';
// 	$taxonomies = array('resource_type', 'resource_topic');
// 	$q_vars = &$query->query_vars;
//   foreach ($taxonomies as $taxonomy) {
//     if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
//   		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
//   		$q_vars[$taxonomy] = $term->slug;
//   	}
//   }
// }
