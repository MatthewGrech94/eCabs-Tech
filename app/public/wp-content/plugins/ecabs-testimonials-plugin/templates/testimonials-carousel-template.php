<?php 

$args = array(
    'post_type'      => 'testimonials',
    'posts_per_page' => -1, 
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
);
$testimonials_query = new WP_Query($args);

?>

<div class="fold-default testimonials overflow-hidden">
    <div class="wrapper padding-bottom">

      <h2 class="fold-title">Testimonials</h2>

      <div class="testimonials-carousel owl-carousel">
  
        <?php 
          if ($testimonials_query->have_posts()) :
            
            while ($testimonials_query->have_posts()) : $testimonials_query->the_post(); ?>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <?php the_content(); ?>
                    </div>

                    <h3><?php the_title(); ?></h3>
                    <p><?php echo get_field('role');?></p>
                </div>
            <?php endwhile;
            wp_reset_postdata();
          else :
              echo '<p>No testimonials found.</p>';
          endif;
        ?>
      </div>
    </div>
  </div>