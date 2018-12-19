<?php

/**
 * Set parent theme styles
 */
function phpbnl18_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'phpbnl18_enqueue_styles' );

/**
 * Change sort order to title on archive pages
 * @param $query
 */
function phpbnl_change_sort_order($query){
    if(is_archive() && isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'sessions'):
        $query->set( 'orderby', 'meta_value');
        $query->set( 'meta_key', 'session_type');
        $query->set('order', 'ASC');
    elseif (is_archive() && isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'speaker'):
        $query->set( 'orderby', 'meta_value' );
        $query->set( 'meta_key', 'title' );
        $query->set( 'order', 'ASC' );
    endif;

    return $query;
};

/**
 * @param $query
 * @return WP_Query
 */
function phpbnl_filter_sessions($query){
    if (!isset($_GET['sessions_filter'])) {
        return $query;
    }

    if ($_GET['sessions_filter'] === 'talks') {
        $filter = 'talk';
    } else {
        $filter = 'tutorial';
    }

    if(is_archive() && isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'sessions'):
        $query->set('meta_query', [
            'relation' => 'AND',
            [
                'key' => 'session_type',
                'value' => $filter,
                'compare' => '=',
            ]
        ]);
    endif;

    return $query;
}

add_action( 'pre_get_posts', 'phpbnl_change_sort_order');
add_action( 'pre_get_posts', 'phpbnl_filter_sessions');
