<?php
/*
Template Name: Contact Template
*/
?>

<?php 
get_header(); 
?>

<div class="contact-template">

  <!-- Optional: WordPress content -->
  <div class="fold-default">
    <div class="wrapper">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        the_content();
      endwhile;
    endif;
    ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>