<?php

/**
 * Adds custom widget.
 */
class Custom_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'custom_widget', // Base ID
      __("Custom Widget - iGeek's", 'text_domain'), // Name
      array( 'description' => __( 'Widget Customizado', 'text_domain' ), ) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    // check if the repeater field has rows of data
    if( have_rows('imagens_do_carrosel', 'widget_' . $args['widget_id']) ):
      echo "<div class='widget-carrousel'>";

      // loop through the rows of data
        while ( have_rows('imagens_do_carrosel', 'widget_' . $args['widget_id']) ) : the_row();
          echo "<div class='widget-carrousel-item link-seo'>";
            // get sub fields
            $title = get_sub_field('titulo_do_item', 'widget_' . $args['widget_id']);
            $link  = get_sub_field('link_do_item', 'widget_' . $args['widget_id']);
            $image = get_sub_field('imagem_do_item', 'widget_' . $args['widget_id']);

            // widget image
            echo "<div class='widget-carrouse-image'>";
            echo "<img src='". $image['url'] ."' alt='". $image['title'] ."'/>";
            echo "</div>";

            // widtget linked title
            echo "<a href='". $link ."' title='". $title ."'>". $title ."</a>";

          echo "</div>";
        endwhile;

      echo "</div>";
    endif;

    if ( !empty($instance['title']) ) {
      //echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }

    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    if ( isset($instance['title']) ) {
      $title = $instance['title'];
    }
    else {
      $title = __( 'Novo Widget', 'text_domain' );
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <?php
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    return $instance;
  }

}; // class Custom_Widget

// register Custom_Widget widget
/*add_action( 'widgets_init', function(){
  register_widget( 'Custom_Widget' );
});*/
