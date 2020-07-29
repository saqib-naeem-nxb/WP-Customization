<?php

class Advertisement_Header{

    public function __construct(){
        add_action( "ad_header", array($this, "action"), 10 );
    }


    public function action(){

        $html = "<img src='http://localhost/web/wordpress/wp-content/uploads/2020/07/brown-concrete-building-2283352.jpg' width='100%'  />";
        $output = '<div class="wp-cu">';
            $output .= $html;
        $output .= '</div>';
        echo $output;
    }
}
?>