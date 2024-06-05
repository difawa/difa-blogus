<?php 
/**
 * 
 * The header template. This file contain <header> </header>.
 * 
 */
?>

<header class="container row align-items-center">         
    <?php get_template_part('template-parts/header/site-identity'); ?>

    <!-- Mobile Header -->
    <div class="m-header align-items-center p-0">
    <!-- navbar-toggle -->
    <button class="navbar-toggler x collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbar-wp" aria-controls="navbar-wp" aria-expanded="false"
        aria-label="Toggle navigation"> 
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
        <div class="navbar-header">
            <?php the_custom_logo(); ?>
            <div class="site-branding-text <?php esc_attr_e( display_header_text() ? '' : 'd-none' ); ?> ">
                <div class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></div>
                <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
            </div>
        </div>
        <div class="right-nav"> 
        <!-- /navbar-toggle -->
        <?php $blogus_menu_search  = get_theme_mod('blogus_menu_search','true'); 
        if($blogus_menu_search == true) {
        ?>
            <a aria-label="cari" class="msearch ml-auto bs_model" data-bs-target="#exampleModal" href="#" data-bs-toggle="modal"> <i class="fa fa-search"></i> </a>
    
        <?php } ?>
        </div>
        </div>
    <!-- /Mobile Header -->

    <?php get_template_part('template-parts/header/navigation'); ?>    
    <?php get_template_part('template-parts/header/right') ?>
</header>