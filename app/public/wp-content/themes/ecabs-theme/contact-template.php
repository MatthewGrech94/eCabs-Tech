<?php
/*
Template Name: Contact Template
*/
?>

<?php 
get_header(); 
?>

<div class="contact-page">

  <div class="fold-default">
    <div class="wrapper lg">

      <div class="contact-card">

        <div class="content-wrap col-md-6">
        <?php
        if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        endif;
        ?>
        </div>

        <div class="contact-form-wrap col-md-5">
          <?php echo do_shortcode('[contact-form-7 id="e310d2b" title="Contact Form"]'); ?>
        </div>

      </div>
    </div>
  </div>

</div>

<?php get_footer(); ?>