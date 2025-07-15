<?php
/**
 * Blank Theme Jetpack Plugin Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Jetpack
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankSpace;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '\WritePoetry\BlankSpace\Jetpack' ) ) :

	/**
	 * The main Jetpack class
	 */
	class Jetpack {
		const CUSTOM_POST_TYPE     = 'jetpack-portfolio';
		const CUSTOM_TAXONOMY_TYPE = 'jetpack-portfolio-type';
		const CUSTOM_TAXONOMY_TAG  = 'jetpack-portfolio-tag';


		/**
		 * Setup class.
		 *
		 * @since 0.1.4
		 */
		public function __construct() {

			// add_action( 'init', array( $this, 'register_block_bindings' ) );

			add_filter(
				'wp_loaded',
				function () {
					add_filter( 'pre_render_block', array( $this, 'projects_pre_render_block' ), 10, 2 );

					if ( post_type_exists( self::CUSTOM_POST_TYPE ) ) {
       					add_filter( 'rest_' . self::CUSTOM_POST_TYPE . '_query', array( $this, 'rest_project_date' ), 10, 2 );
					}
				},
				10,
				2
			);

			// Force the Testimonials and Portfolios CPT settings to remain visible.
			// https://jetpack.com/support/custom-content-types/#block-themes-and-custom-content-types
			add_filter( 'classic_theme_helper_should_display_testimonials', function( $should_display ) {
				return true;
			} );

			add_filter( 'classic_theme_helper_should_display_portfolios', function( $should_display ) {
				return true;
			} );
		}


		/**
		 * Adds a filter to modify the read more block.
		 *
		 * @param string $pre_render The pre-rendered block content.
		 * @param array  $parsed_block The parsed block attributes.
		 * @return string The modified block content.
		 */
		public function rest_project_date( $args, $request ) {
			
			// add same meta query arguments for rest api (backend).
			$args = $this->filter_query();
			return $args;
		}


		private function filter_query() {
			$queried_object = get_queried_object();

			if ( $queried_object instanceof WP_Term ) {
				$query['tax_query'] = array(
					'relation' => 'AND',
					array(
						'taxonomy' => get_queried_object()->taxonomy,
						'field'    => 'slug',
						'terms'    => get_queried_object()->slug,
					),
				);
			}

			$query['post_type'] = self::CUSTOM_POST_TYPE;

			// The meta key would be the writepoetry_project_year field assigned to the jetpack-portfolio CPT
			$query['meta_key'] = 'writepoetry_project_year';

			// Show all posts
			$query['nopaging'] = true;

			// Skip SQL_CALC_FOUND_ROWS for performance (no pagination).
			$query['no_found_rows'] = true;

			// $query['posts_per_page'] = 1;

			// also likely want to set order by this key in desc so more recent project are listed first.
			$query['orderby'] = 'meta_value_num';
			$query['order']   = 'desc';

			return $query;
		}

		public function projects_pre_render_block( $pre_render, $parsed_block ) {
			// Verify it's the block that should be modified using the namespace.
			if ( isset( $parsed_block['attrs']['namespace'] ) && 'jetpack/projects-list' === $parsed_block['attrs']['namespace'] ) {
				// Filters the arguments which will be passed to WP_Query for the Query Loop Block.
				add_filter(
					'query_loop_block_query_vars',
					function ( $query, $block ) use ( $parsed_block ) {
						// Retrieve the query parameters from the block attributes

						// add same meta query arguments for front-end.
						$query = $this->filter_query( $block );

						// Execute the query
						$wp_query = new \WP_Query( $query );

						// Check if the query returns any posts
						if ( ! $wp_query->have_posts() ) {

							// Modify the query to use a fallback meta key
							$query['meta_key'] = '';
						}
						return $query;
					},
					10,
					2
				);
			}

			return $pre_render;
		}

		public function register_block_bindings() {
			register_block_bindings_source(
				'blankspace/jetpack-projects-infos',
				array(
					'label'              => __( 'Project Informations', 'blankspace' ),
					'get_value_callback' => array( $this, 'get_project_types' ),
					'uses_context'       => array( 'postId', 'postType' ),
				)
			);
		}

		public function get_project_types( $source_args, $block_instance, $attribute_name ) {
			// If no key or user ID argument is set, bail early.
			if ( ! isset( $source_args['key'] ) ) {
				return null;
			}

			// Get the post ID.
			$post_id = $block_instance->context['postId'];

			// Define the taxonomy type based on the key argument.
			$taxonomy = null;

			// Return the data based on the key argument.
			switch ( $source_args['key'] ) {
				case 'types':
					$taxonomy = self::CUSTOM_TAXONOMY_TYPE;
					break;
				case 'tags':
					$taxonomy = self::CUSTOM_TAXONOMY_TAG;
					break;
				default:
					return null;
			}

			// Returns All Term Items for the specified taxonomy.
			$terms = wp_get_post_terms( $post_id, $taxonomy );

			if ( is_wp_error( $terms ) ) {
				return 'Error retrieving terms';
			}

			return implode( ', ', array_column( $terms, 'name' ) );
		}
	}
endif;
