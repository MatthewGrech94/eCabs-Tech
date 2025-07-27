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

?>

<div class="product-template">

  <div class="fold-default">
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
        <img src="" alt="">
      </div>
    </div>
  </div>

  <div class="fold-default">
    <div class="wrapper padding-bottom">
      <div class="feature-card">
      <div class="feature-card-img-wrap row center-xs col-md-6">
        <img src="" alt="">
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
        <img src="" alt="">
      </div>
    </div>
  </div>

  <!-- Optional: WordPress content -->
  <div>
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        the_content();
      endwhile;
    endif;
    ?>
  </div>

  <?php echo do_shortcode('[contact-form-7 id="e310d2b" title="Contact Form"]') ?>
</div>

<?php get_footer(); ?>