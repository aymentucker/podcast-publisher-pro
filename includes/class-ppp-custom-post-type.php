<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class PPP_Custom_Post_Type {

    public static function init() {
        add_action( 'init', array( __CLASS__, 'register_podcast_post_type' ) );
    }

    public static function register_podcast_post_type() {
        $labels = array(
            'name'               => __( 'Podcasts', 'podcast-publisher-pro' ),
            'singular_name'      => __( 'Podcast', 'podcast-publisher-pro' ),
            'add_new'            => __( 'Add New Podcast', 'podcast-publisher-pro' ),
            'edit_item'          => __( 'Edit Podcast', 'podcast-publisher-pro' ),
            'new_item'           => __( 'New Podcast', 'podcast-publisher-pro' ),
            'view_item'          => __( 'View Podcast', 'podcast-publisher-pro' ),
            'all_items'          => __( 'All Podcasts', 'podcast-publisher-pro' ),
            'search_items'       => __( 'Search Podcasts', 'podcast-publisher-pro' ),
            'not_found'          => __( 'No podcasts found.', 'podcast-publisher-pro' ),
            'not_found_in_trash' => __( 'No podcasts found in Trash.', 'podcast-publisher-pro' ),
            'menu_name'          => __( 'Podcasts', 'podcast-publisher-pro' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'has_archive'        => true,
            'rewrite'            => array( 'slug' => 'podcasts' ),
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
            'show_in_rest'       => true,
            'menu_icon'          => 'dashicons-microphone',
        );

        register_post_type( 'podcast', $args );
    }
}
