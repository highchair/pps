<!--
PAGE NAVIGATION
-->

<?php
    the_posts_pagination( array(
    	'mid_size'  => 2,
    	'prev_text' => __( '&laquo;', 'ppsri' ),
    	'next_text' => __( '&raquo;', 'ppsri' ),
    ) );
?>