<?php 
/**
 * Site identity template. This file includes site-logo and site-branding-text.
 */
?>

<div class="col-lg-3">
    <div class="navbar-header d-none d-lg-block">
        <div class="site-logo">
            <?php if(get_theme_mod('custom_logo') !== ""){ the_custom_logo(); } ?>
        </div>
        <div class="site-branding-text <?php esc_attr_e( display_header_text() ? '' : 'd-none' ); ?> ">
            <?php if (is_front_page() || is_home()) { ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></h1>
            <?php } else { ?>
                <p class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
            <?php } ?>
                <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
        </div>
    </div>
</div>