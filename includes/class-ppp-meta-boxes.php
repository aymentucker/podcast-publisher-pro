<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class PPP_Meta_Boxes {

    public static function init() {
        add_action( 'add_meta_boxes', array( __CLASS__, 'add_podcast_meta_boxes' ) );
        add_action( 'save_post', array( __CLASS__, 'save_podcast_meta' ) );
        add_filter( 'manage_podcast_posts_columns', array( __CLASS__, 'set_custom_podcast_columns' ) );
        add_action( 'manage_podcast_posts_custom_column', array( __CLASS__, 'custom_podcast_column' ), 10, 2 );
    }

    public static function add_podcast_meta_boxes() {
        add_meta_box(
            'podcast_details',
            __( 'Podcast Details', 'podcast-publisher-pro' ),
            array( __CLASS__, 'podcast_meta_box_callback' ),
            'podcast',
            'normal',
            'high'
        );
    }

    public static function podcast_meta_box_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'ppp_podcast_meta_nonce' );

        $rss_feed = get_post_meta( $post->ID, '_podcast_rss_feed', true );
        $audio_url = get_post_meta( $post->ID, '_podcast_audio_url', true );

        echo '<p><label for="podcast_rss_feed">' . __( 'RSS Feed URL', 'podcast-publisher-pro' ) . '</label>';
        echo '<input type="text" name="podcast_rss_feed" id="podcast_rss_feed" value="' . esc_attr( $rss_feed ) . '" class="widefat" /></p>';

        echo '<p><label for="podcast_audio_url">' . __( 'Audio URL', 'podcast-publisher-pro' ) . '</label>';
        echo '<input type="text" name="podcast_audio_url" id="podcast_audio_url" value="' . esc_attr( $audio_url ) . '" class="widefat" /></p>';
    }

    public static function save_podcast_meta( $post_id ) {
        if ( ! isset( $_POST['ppp_podcast_meta_nonce'] ) || ! wp_verify_nonce( $_POST['ppp_podcast_meta_nonce'], basename( __FILE__ ) ) ) {
            return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        if ( isset( $_POST['podcast_rss_feed'] ) ) {
            update_post_meta( $post_id, '_podcast_rss_feed', sanitize_text_field( $_POST['podcast_rss_feed'] ) );
        }

        if ( isset( $_POST['podcast_audio_url'] ) ) {
            update_post_meta( $post_id, '_podcast_audio_url', esc_url_raw( $_POST['podcast_audio_url'] ) );
        }
    }

    public static function set_custom_podcast_columns( $columns ) {
        $columns = array(
            'cb'         => '<input type="checkbox" />',
            'title'      => __( 'Title', 'podcast-publisher-pro' ),
            'rss_feed'   => __( 'RSS Feed', 'podcast-publisher-pro' ),
            'audio_url'  => __( 'Audio URL', 'podcast-publisher-pro' ),
            'date'       => __( 'Date', 'podcast-publisher-pro' ),
        );
        return $columns;
    }

    public static function custom_podcast_column( $column, $post_id ) {
        switch ( $column ) {
            case 'rss_feed':
                echo esc_url( get_post_meta( $post_id, '_podcast_rss_feed', true ) );
                break;

            case 'audio_url':
                echo esc_url( get_post_meta( $post_id, '_podcast_audio_url', true ) );
                break;
        }
    }
}
