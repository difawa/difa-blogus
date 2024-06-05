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
    <?php get_template_part('template-parts/header/mobile') ?>
    <!-- /Mobile Header -->

    <?php get_template_part('template-parts/header/navigation'); ?>    
    <?php get_template_part('template-parts/header/right') ?>
</header>