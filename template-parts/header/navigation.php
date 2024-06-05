<?php 
/**
 * 
 * Navigation template, primary menu section is on header.
 * 
 */
?>

<div class="col-lg-7 navbar navbar-expand-lg navbar-wp">
    <!-- Navigation -->
    <nav class="collapse navbar-collapse" id="navbar-wp">
        <?php $blogus_menu_align_setting = get_theme_mod('blogus_menu_align_setting','mx-auto');
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'  => 'nav-collapse collapse',
                'menu_class' => $blogus_menu_align_setting . ' nav navbar-nav'.(is_rtl() ? ' sm-rtl' : ''),
                'fallback_cb' => 'blogus_fallback_page_menu',
                'walker' => new blogus_nav_walker()
            ) ); ?>
    </nav>
    </div>