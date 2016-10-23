<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context = Timber::get_context();
$context['wp_title'] = __('Search', 'saat');

switch (get_locale()) {
	case "en_US":
		$context['gcse_id'] = get_field('search_en_id', 'option');
		break;
	case "id_ID":
		$context['gcse_id'] = get_field('search_id_id', 'option');
		break;
	case "zh_CN":
		$context['gcse_id'] = get_field('search_zh_id', 'option');
		break;
	default:
		$context['gcse_id'] = get_field('search_id_id', 'option');
}

Timber::render( 'page/search.twig', $context );
