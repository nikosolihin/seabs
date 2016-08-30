<?php
 /**
  * Template Name: Split Sidebars
  * Description: Page template for pages with split sidebars
  */
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['acf'] = get_fields();
// $context['sections'] = $context['acf']['sections'];
// $context['inherit'] = ($context['acf']['inherit'] === 'true');
//
// // Get Sidebar
// if ($context['inherit']) {
// 	$parent = $post->get_parent();
// 	$context['sidebar_sections'] = $parent->get_field('sidebar_sections');
// } else {
// 	$context['sidebar_sections'] = $post->get_field('sidebar_sections');
// }
//
// var_dump( populateList( $context['sidebar_sections'][0]['sidebar_components'][0]) );
//
// // Find root ID
// if ($post->post_parent)	{
// 	$ancestors = get_post_ancestors($post->id);
// 	$id = $ancestors[ count($ancestors)-1 ];
// } else {
// 	$id = $post->id;
// }
// // and generate hierarchy
// $args = array(
//   'child_of' => $id,
//   'echo' => false,
//   'title_li' => null
// );
// $context['hierarchy'] = wp_list_pages($args);
//
// // Generate breadcrumb. Must be last.
// $context['breadcrumb'] = array();
// while( $post->get_parent ) {
// 	$post = $post->get_parent();
// 	array_push( $context['breadcrumb'], array(
//     'title' => $post->title,
//     'link' => $post->link
//   ));
// }
// $context['breadcrumb'] = array_reverse( $context['breadcrumb'] );
//
// var_dump($context['sidebar_sections']);
//
// Timber::render( 'page/single-page-base.twig' , $context );
