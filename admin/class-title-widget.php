<?php

class WPCU_Title_Widget extends WP_Widget{
    public function __construct(){
        parent::__construct(
            "title_widget", "Title Widget"
        );

        // add_action( "widgets_init", function(){
        //     register_widget( "WPCU_Title_Widget" );
        // } );
    }

    public $args = array(
        "before_title" => "<header>",
        "after_title" => "</header>",
        "before_widget" => "<p>",
        "after_widget" => "</p>"
    );
    public function widget($args, $instance){
        echo $args['before_widget'];

        if(!empty($instance['text'])){
            echo $args['before_title']." ".$instance['text']." ".$args['after_title'];
        }
        echo $args['after_widget'];
    }


    public function form($instance){
        $text = $instance['text'];
?>

<p>
    <label for=""><?= esc_html__( "Text", "WPCU" ); ?></label>
    <input type="text" 
        name="<?php echo esc_attr( $this->get_field_name('text') );?>" 
        id="<?php echo esc_attr( $this->get_field_id("text") ); ?>" 
        class="widefat" value="<?=  esc_attr( $text ); ?>">

</p>
<?php
    }
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['text'] = !empty($new_instance['text']) ?  strip_tags($new_instance['text']) : "";
        return $new_instance;
    }
}
?>