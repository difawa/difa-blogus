<?php 
/**
 * 
 * Right desk template. It includes search button, subscribe button, and switcher.
 * 
 */
?>

<div class="col-lg-2">
    <div class="desk-header right-nav pl-3 ml-auto my-2 my-lg-0 position-relative align-items-center justify-content-end">
    <?php $blogus_menu_search  = get_theme_mod('blogus_menu_search','true'); 
            $blogus_subsc_link = get_theme_mod('blogus_subsc_link', '#'); 
            $blogus_menu_subscriber  = get_theme_mod('blogus_menu_subscriber','true');
            $subsc_icon = get_theme_mod('subsc_icon_layout','bell');
            $blogus_subsc_open_in_new  = get_theme_mod('blogus_subsc_open_in_new', true);
        if($blogus_menu_search == true) {
        ?>
        <a aria-label="cari" class="msearch ml-auto bs_model" data-bs-target="#exampleModal" href="#" data-bs-toggle="modal">
        <svg width="16" height="16" fill="none" viewBox="1 1 23 23">
            <path d="M14.9536 14.9458L21 21M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        </a> 
    <?php } if($blogus_menu_subscriber == true) { ?>
    <a class="subscribe-btn" href="<?php echo esc_url($blogus_subsc_link); ?>" <?php if($blogus_subsc_open_in_new) { ?> target="_blank" <?php } ?> ><i class="fas fa-<?php echo $subsc_icon ; ?>"></i></a>
    <?php } difa_lite_dark_switcher() ?>
             
    </div>
</div>