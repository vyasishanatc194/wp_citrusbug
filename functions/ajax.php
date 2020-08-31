<?php 

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_posts() {
    check_ajax_referer('Citrusbug', 'security');
	$insertdata = [];
    $result = [];
    // default response
	$result['success'] = false;
	$result['data'] = [
		'message' => 'Network error.',
    ];
    
    $row = 99 || $_POST['row'];
    $cat = ($_POST['cat'] == '0') ? '' : $_POST['cat'];
    $most = ($_POST['most'] == '0') ? '' : $_POST['most'];

    global $wpdb;
    if ($cat == '' && $most == '') {
        $sqlQuery = 'SELECT * FROM wp_posts WHERE post_type LIKE "post" AND post_status LIKE "publish" ORDER BY ID ASC';
        // $args = [
        //     'post_type' => 'post',
        //     'post_status' => 'publish',
        //     'posts_per_page' => $row,
        //     'orderby' => 'menu_order',
        //     'order' => 'ASC',
        // ];
    } else {
        if ($cat != '' && $most != '') {
            $sqlQuery = 'SELECT * FROM '.$wpdb->prefix.'posts P ';
            $sqlQuery .= 'LEFT JOIN '.$wpdb->prefix.'term_relationships TR ON (P.ID = TR.object_id) ';
            $sqlQuery .= 'LEFT JOIN '.$wpdb->prefix.'term_taxonomy TT ON (TR.term_taxonomy_id = TT.term_taxonomy_id) ';
            $sqlQuery .= 'LEFT JOIN '.$wpdb->prefix.'postmeta PM ON (P.ID = PM.post_id) ';
            $sqlQuery .= 'WHERE TT.term_id = '.$cat.' ';
            $sqlQuery .= 'AND PM.meta_key LIKE "'.$most.'" ';
            $sqlQuery .= 'AND post_type LIKE "post" AND post_status LIKE "publish" ';
            $sqlQuery .= 'ORDER BY PM.meta_value ASC';
            // $args = [
            //     'post_type' => 'post',
            //     'posts_per_page' => $row,
            //     'order' => 'DESC',
            //     'tax_query' => array(
            //         array(
            //             'taxonomy' => 'category',
            //             'terms' => $cat,
            //             'field' => 'IDs'
            //         )
            //     ),
            //     'meta_query' => array(
            //         'most_caluse' => array(
            //             'key' => $most,
            //             'compare' => 'EXISTS',
            //         )
            //     ),
            //     'orderby' => 'most_caluse',
            // ];
        } else if ($cat != '') {
            $sqlQuery = 'SELECT * FROM '.$wpdb->prefix.'posts P ';
            $sqlQuery .= 'LEFT JOIN '.$wpdb->prefix.'term_relationships TR ON (P.ID = TR.object_id) ';
            $sqlQuery .= 'LEFT JOIN '.$wpdb->prefix.'term_taxonomy TT ON (TR.term_taxonomy_id = TT.term_taxonomy_id) ';
            $sqlQuery .= 'WHERE TT.term_id = '.$cat.' ';
            $sqlQuery .= 'AND P.post_type LIKE "post" AND P.post_status LIKE "publish" ';
            $sqlQuery .= 'ORDER BY P.ID ASC';
            // $args = [
            //     'post_type' => 'post',
            //     'posts_per_page' => $row,
            //     'order_by' => 'ID',
            //     'order' => 'DESC',
            //     'tax_query' => array(
            //         array(
            //             'taxonomy' => 'category',
            //             'terms' => $cat,
            //             'field' => 'IDs'
            //         )
            //     ),
            // ];
        } else {
            $sqlQuery = 'SELECT * FROM '.$wpdb->prefix.'posts P ';
            $sqlQuery .= 'INNER JOIN '.$wpdb->prefix.'postmeta PM ON (P.ID = PM.post_id) ';
            $sqlQuery .= 'WHERE PM.meta_key LIKE "'.$most.'" ';
            $sqlQuery .= 'AND P.post_type LIKE "post" AND P.post_status LIKE "publish" ';
            $sqlQuery .= 'ORDER BY PM.meta_value ASC';
            // $args = [
            //     'post_type' => 'post',
            //     'posts_per_page' => $row,
            //     'order' => 'DESC',
            //     'meta_query' => array(
            //         'most_caluse' => array(
            //             'key' => $most,
            //             'compare' => 'EXISTS',
            //         )
            //     ),
            //     'orderby' => 'most_caluse',
            // ];
        }
    }
    
    $query = $wpdb->get_results($sqlQuery);
    // var_dump($query); die;
    // $query = new WP_Query($args);
    $res = [];
    try {
        foreach( $query as $key=>$val ) {
            $res[] = QS::posts_loop($val);
        }
        // wp_reset_postdata();
        wp_send_json_success( $res );
    } catch (\Exception $ex) {
        $result['success'] = false;
        $result['data'] = [
            'message' => $em->getMessage(),
            'data'	=> 'error'
        ];
        wp_send_json_error( $result );
    }
	$result = json_encode($result);
	echo $result;
}