<?php 
/**
 * 
 * Mobile header template.
 * 
 */
?>

<div class="m-header align-items-center p-0">
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
        <?php $blogus_menu_search  = get_theme_mod('blogus_menu_search','true'); 
            if($blogus_menu_search == true) {  ?>
        <a aria-label="cari" class="msearch ml-auto bs_model" data-bs-target="#exampleModal" href="#" data-bs-toggle="modal">
        <svg width="16" height="16" fill="none" viewBox="1 1 23 23">
        <path d="M14.9536 14.9458L21 21M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        </a>
        <?php } ?>
    </div>
</div>