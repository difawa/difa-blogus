<?php
/**
 * The template for displaying the content.
 * @package Blogus
 */
$layout = esc_attr(get_theme_mod('blogus_content_layout','grid-right-sidebar')) == 'grid-fullwidth' ? '3': '2'; ?> 
<div id="grid" class="bs-content-grid column<?php echo esc_attr($layout)?>">
    <div id="kolom-1"></div>
    <div id="kolom-2"></div>
    <?php $hitung=1; ?>
    <?php while(have_posts()){ the_post();  ?>
        <?php $malas = ''; if ($hitung == 1){$malas = ' dont-lazy';}?>
        <div id="post-<?php the_ID(); ?>" <?php post_class('bs-blog-post grid-blog tema-kotak'.$malas); ?>> 
            <?php   $url = blogus_get_freatured_image_url($post->ID, 'blogus-medium');
            blogus_post_image_display_type($post); 
            ?>
            <article class="small">
                <?php 
                $blogus_global_category_enable = get_theme_mod('blogus_global_category_enable','true');
                if($blogus_global_category_enable == 'true') { blogus_post_categories(); } ?>
                <h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                <?php blogus_post_meta();  
                blogus_posted_content();  
                $blogus_readmore_excerpt=get_theme_mod('blogus_blog_content','excerpt');
                if ($blogus_readmore_excerpt=="excerpt") { ?>
                <a href="<?php the_permalink();?>" class="more-link"><?php echo esc_html('Baca Selengkapnya'); ?></a>
                <?php } ?>
            </article>
        </div> 
    <?php $hitung += 1; } ?>
</div>
<script>
    var blocks = document.getElementById("grid").children;
    function pindahKeKolom() {
        let post_number = blocks.length-2;
        for (let i = 0; i < post_number; i++){
            var elementToMove = blocks[2];
            if (i % 2 == 0) {
                var destinationElement = document.getElementById("kolom-1");           
            }
            else {
                var destinationElement = document.getElementById("kolom-2");
            }
            destinationElement.appendChild(elementToMove);
        }
    }
    function checkScreenWidth() {
        var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        if (screenWidth > 768) {
                pindahKeKolom();
        } else if (blocks.length==2){location.reload()}
    }
    window.addEventListener('load', checkScreenWidth);
    window.addEventListener('resize', checkScreenWidth);
</script>
<div class="col-lg-12 text-center d-md-flex justify-content-center mt-5">
    <?php //Previous / next page navigation
        the_posts_pagination( array(
        'prev_text'          => '<span class="screen-reader-text">Halaman sebelumnya</span><i class="fa fa-angle-left"></i>',
        'next_text'          => '<span class="screen-reader-text">Halaman berikutnya</span><i class="fa fa-angle-right"></i>',
        'aria_label'         => 'navigasi',
        ) ); 
    ?>
</div>