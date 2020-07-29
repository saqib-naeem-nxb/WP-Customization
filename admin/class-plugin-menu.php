<?php

/**
 * create admin menu page
 * status: incomplete
 */
class WPCU_Plugin_Menu{
    public function admin_menu(){
        add_menu_page( "WP Customization", "WP Customization", "manage_options", "wpcu", "page_html", "", 100 );
    }
    public function page_html(){
        if(!current_user_can( "manage_options" ))
            return;
        echo '<div class="wrap">';
        echo '<h1>'.get_admin_page_title(  ).'</h1>';
        echo '</div>';
    }
}
?>