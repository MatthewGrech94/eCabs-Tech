<?php
/*
Template Name: Product Template
*/
?>

<?php 
get_header(); 

$hero = get_field('hero_fold');
$product1 = get_field('feature_card_1');
$product2 = get_field('feature_card_2');
$product3 = get_field('feature_card_3');
$cta_fold = get_field('cta_fold');


$allowed_tags = array(
    'i' => array(
        'class' => true,
        'aria-hidden' => true,
        'title' => true,
    ),
);


$args = array(
    'post_type'      => 'testimonials',
    'posts_per_page' => -1, // Use -1 to get all testimonials
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
);
$testimonials_query = new WP_Query($args);

?>

<div class="product-page">

  <div class="fold-default hero-fold">
    <div class="wrapper lg padding-bottom">
      <div class="product-hero-card">
          <div class="card-title-wrap col-md-3">
            <h6 class="product-name"><?php echo sanitize_text_field(esc_html($hero['product_name'])) ?></h6>
            <h1 class="card-header"><?php echo sanitize_text_field(esc_html($hero['header'])) ?></h1>
          </div>
          <div class="card-image-wrap col-md-6">
            <img src="<?php echo sanitize_text_field($hero['image']['url']) ?>" alt="<?php echo sanitize_text_field($hero['image']['alt']) ?>" class="card-img">
          </div>
          <div class="card-desc-wrap col-md-3">
            <div class="spacer"></div>
            <div class="content">
              <p><?php echo sanitize_text_field(esc_html($hero['description'])) ?></p>
            </div>
            <div class="cta-wrap">
              <button class="button-default round yellow" scroll-to="feature-card-1">
                <i class="fa-solid fa-arrow-down"></i>
              </button>
            </div>
          </div>
      </div>
    </div>
  </div>

  <div class="fold-default feature-card-1">
    <div class="wrapper padding-bottom">
      <div class="feature-card">
        <div class="feature-card-details col-md-6">
          <div class="feature-card-icon">
            <?php echo wp_kses($product1['icon'], $allowed_tags) ?>
          </div>
          <h2 class="feature-card-title">
            <?php echo sanitize_text_field(esc_html($product1['title'])) ?>
          </h2>
          <div class="feature-card-desc">
            <p><?php echo sanitize_text_field(esc_html($product1['description'])) ?></p>
          </div>
        </div>
      </div>
      <div class="feature-card-img-wrap row center-xs col-md-6">
        <?php if($product1['image']): ?>
        <img src="<?php echo sanitize_text_field($product1['image']['url']) ?>" alt="<?php echo sanitize_text_field($product1['image']['alt']) ?>" class="card-img">
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="fold-default">
    <div class="wrapper padding-bottom">
      <div class="feature-card">
      <div class="feature-card-img-wrap row center-xs col-md-6">
        <?php if($product2['image']): ?>
        <img src="<?php echo sanitize_text_field($product2['image']['url']) ?>" alt="<?php echo sanitize_text_field($product2['image']['alt']) ?>" class="card-img">
        <?php endif; ?>
      </div>
        <div class="feature-card-details col-md-6">
          <div class="feature-card-icon">
            <?php echo wp_kses($product2['icon'], $allowed_tags) ?>
          </div>
          <h2 class="feature-card-title">
            <?php echo sanitize_text_field(esc_html($product2['title'])) ?>
          </h2>
          <div class="feature-card-desc">
            <p><?php echo sanitize_text_field(esc_html($product2['description'])) ?></p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="fold-default">
    <div class="wrapper padding-bottom">
      <div class="feature-card">
        <div class="feature-card-details col-md-6">
          <div class="feature-card-icon">
            <?php echo wp_kses($product3['icon'], $allowed_tags) ?>
          </div>
          <h2 class="feature-card-title">
            <?php echo sanitize_text_field(esc_html($product3['title'])) ?>
          </h2>
          <div class="feature-card-desc">
            <p><?php echo sanitize_text_field(esc_html($product3['description'])) ?></p>
          </div>
        </div>
      </div>
      <div class="feature-card-img-wrap row center-xs col-md-6">
        <?php if($product3['image']): ?>
        <img src="<?php echo sanitize_text_field($product3['image']['url']) ?>" alt="<?php echo sanitize_text_field($product3['image']['alt']) ?>" class="card-img">
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="fold-default testimonials">
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

  <div class="fold-default contact-fold">
    <div class="wrapper padding-bottom lg">
      <div class="cta-card" style="background-image: url(<?php echo sanitize_text_field($cta_fold['background_image']['url']) ?>);">
        <div class="cta-card-details col-md-6">
          <h6 class="subtitle">
            <?php echo sanitize_text_field(esc_html($cta_fold['overline_text'])) ?>
          </h6>
          <h2 class="title">
            <?php echo sanitize_text_field(esc_html($cta_fold['title'])) ?>
          </h2>
          <div class="desc">
            <p><?php echo sanitize_text_field(esc_html($cta_fold['description'])) ?></p>
          </div>

          <div class="button-wrap">
            <a class="button-default" href="<?php echo sanitize_text_field(esc_html($cta_fold['cta']['cta_url'])) ?>">
              <?php echo sanitize_text_field(esc_html($cta_fold['cta']['cta_text'])) ?>
              <span class="button-icon">+</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php get_footer(); ?>