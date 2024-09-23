<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class PPP_REST_API {

    public static function init() {
        add_action( 'rest_api_init', array( __CLASS__, 'register_meta_fields' ) );
        add_filter( 'rest_prepare_podcast', array( __CLASS__, 'filter_podcast_rest_response' ), 10, 3 );
    }

    public static function register_meta_fields() {
        register_meta( 'post', '_podcast_rss_feed', array(
            'type'          => 'string',
            'single'        => true,
            'show_in_rest'  => true,
            'auth_callback' => '__return_true',
        ) );

        register_meta( 'post', '_podcast_audio_url', array(
            'type'          => 'string',
            'single'        => true,
            'show_in_rest'  => true,
            'auth_callback' => '__return_true',
        ) );
    }

    public static function filter_podcast_rest_response( $response, $post, $request ) {
        // Ensure this filter only runs during REST API requests
        if ( ! defined( 'REST_REQUEST' ) || ! REST_REQUEST ) {
            return $response;
        }

        // Prepare new response data
        $new_data = array(
            'id'                  => $post->ID,
            'title'               => get_the_title( $post->ID ),
            'date'                => get_post_field( 'post_date', $post->ID ),
            'status'              => get_post_status( $post->ID ),
            '_podcast_rss_feed'   => get_post_meta( $post->ID, '_podcast_rss_feed', true ),
            '_podcast_audio_url'  => get_post_meta( $post->ID, '_podcast_audio_url', true ),
        );

        // Create a new WP_REST_Response with the new data
        $new_response = new WP_REST_Response( $new_data );

        // Set the HTTP status code (optional, defaults to 200)
        $new_response->set_status( 200 );

        return $new_response;
    }
}
