<?php 
/**
 * Blogus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blogus
 */

 	$blogus_theme_path = get_template_directory() . '/inc/ansar/';

	require( $blogus_theme_path . '/blogus-custom-navwalker.php' );
	require( $blogus_theme_path . '/default_menu_walker.php' );
	require( $blogus_theme_path . '/font/font.php');
	require( $blogus_theme_path . '/template-tags.php');
	require( $blogus_theme_path . '/template-functions.php');
	require( $blogus_theme_path. '/widgets/widgets-common-functions.php');
	require( $blogus_theme_path . '/custom-control/custom-control.php');
	require( $blogus_theme_path . '/custom-control/font/font-control.php');
	require_once get_template_directory() . '/inc/ansar/customizer-admin/blogus-admin-plugin-install.php';
	require_once( trailingslashit( get_template_directory() ) . 'inc/ansar/customize-pro/class-customize.php' );

	// Theme version.
	$blogus_theme = wp_get_theme();
	define( 'BLOGUS_THEME_VERSION', $blogus_theme->get( 'Version' ) );
	define ( 'BLOGUS_THEME_NAME', $blogus_theme->get( 'Name' ) );

	/*-----------------------------------------------------------------------------------*/
	/*	Enqueue scripts and styles.
	/*-----------------------------------------------------------------------------------*/
	require( $blogus_theme_path .'/enqueue.php');
	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */
	require( $blogus_theme_path . '/customize/customizer.php');

	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */

	require( $blogus_theme_path  . '/widgets/widgets-init.php');

	/* ----------------------------------------------------------------------------------- */
	/* Widget */
	/* ----------------------------------------------------------------------------------- */

	require( $blogus_theme_path  . '/hooks/hooks-init.php');

	/* custom-color file. */
	require( get_template_directory() . '/css/colors/theme-options-color.php');

	require get_template_directory().'/inc/ansar/hooks/blocks/header/header-init.php';

	/* Style For Sidebar*/
	require_once  get_template_directory()  . '/css/custom-style.php';


if ( ! function_exists( 'blogus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blogus_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on blogus, use a find and replace
	 * to change 'blogus' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'blogus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Add featured image sizes
        add_image_size('blogus-slider-full', 1280, 720, true); // width, height, crop
        add_image_size('blogus-featured', 300, 0, false ); // width, height, no crop
        add_image_size('blogus-medium', 450, 300, true); // width, height, crop

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary menu', 'blogus' ),
        'footer' => __( 'Footer menu', 'blogus' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	$args = array(
    'default-color' => '#eee',
    'default-image' => '',
	);
	add_theme_support( 'custom-background', $args );

    // Set up the woocommerce feature.
    add_theme_support( 'woocommerce');

     // Woocommerce Gallery Support
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

    // Added theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/* Add theme support for gutenberg block */
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );

	//Custom logo
	add_theme_support( 'custom-logo');
	
	// custom header Support
			$args = array(
			'width'			=> '1600',
			'height'		=> '300',
			'flex-height'		=> false,
			'flex-width'		=> false,
			'header-text'		=> true,
			'default-text-color'	=> '000',
			'wp-head-callback'       => 'blogus_header_color',
		);
		add_theme_support( 'custom-header', $args );


	/*
     * Enable support for Post Formats on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/post-formats/
     */
    add_theme_support( 'post-formats', array( 'image', 'video', 'gallery', 'audio' ) );
	

}
endif;
add_action( 'after_setup_theme', 'blogus_setup' );


	function blogus_the_custom_logo() {
	
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}

	}

	add_filter('get_custom_logo','blogus_logo_class');


	function blogus_logo_class($html)
	{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function blogus_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'blogus_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'blogus_content_width', 0 );


	/**
	 * Load Jetpack compatibility file.
	 */
	if (defined('JETPACK__VERSION')) {
	    require get_template_directory() . '/inc/jetpack.php';
	}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogus_widgets_init() {

	$blogus_footer_column_layout = esc_attr(get_theme_mod('blogus_footer_column_layout',3));
	
	$blogus_footer_column_layout = 12 / $blogus_footer_column_layout;
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area (Blogus)', 'blogus' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="bs-widget %2$s tema-kotak">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="bs-widget-title"><h2 class="title">',
		'after_title'   => '</h2></div>',
	) );


	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'blogus' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-'.$blogus_footer_column_layout.' rotateInDownLeft animated bs-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="bs-widget-title"><h2 class="title">',
		'after_title'   => '</h2></div>',
	) );

}
add_action( 'widgets_init', 'blogus_widgets_init' );

//Editor Styling 
add_editor_style( array( 'css/editor-style.css') );
  
function difawa_theme_setup() {

	//Load text domain for translation-ready
	load_theme_textdomain('blogier', get_template_directory() . '/languages');
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );

} 
add_action( 'after_setup_theme', 'difawa_theme_setup' );

add_filter( 'comment_text', 'do_shortcode' );

add_filter( 'wp_insert_post_data', function( $data, $postarr ) {
if ( ! empty( $data['post_content'] ) ) {
    $data['post_content'] = wp_encode_emoji( $data['post_content'] );
}
return $data;
}, 99, 2 );


// Menambahkan kolom baru untuk menampilkan ID post di halaman pos dashboard
function custom_post_id_column($columns) {
    $columns['post_id'] = 'ID';
    return $columns;
}
add_filter('manage_posts_columns', 'custom_post_id_column');

// Menampilkan nilai ID post di kolom yang ditambahkan
function custom_post_id_column_value($column_name, $post_id) {
    if ($column_name == 'post_id') {
        echo $post_id;
    }
}
add_action('manage_posts_custom_column', 'custom_post_id_column_value', 10, 2);

// CSS untuk mengatur lebar kolom pada daftar halaman pos di dashboard admin.
function custom_admin_styles() {
    echo '<style>
        /* Mengatur lebar kolom pada halaman pos dashboard */
        .wp-list-table th.column-title { 
            width: 15%; /* Mengatur lebar kolom judul */
        }
        .wp-list-table th.column-date { 
            width: 10%; /* Mengatur lebar kolom tanggal */
        }
		.wp-list-table th.column-categories { 
            width: 7%; /* Mengatur lebar kolom tanggal */
        }
		.wp-list-table th.column-post_id { 
            width: 3%; /* Mengatur lebar kolom tanggal */
        }
        /* Anda bisa menambahkan aturan CSS lainnya untuk kolom-kolom lainnya */
    </style>';
}
add_action('admin_head-edit.php', 'custom_admin_styles');


/* Menyembunyikan pos dari homepage, isi array dengan ID post.*/
function exclude_post_from_home($query) {
      if ($query->is_home() ) {
          $query->set('post__not_in', array(1127, 1203));
      }
}
add_action('pre_get_posts', 'exclude_post_from_home');

/* Mengganti logo login.php */
function custom_login_logo() {
    echo '
    <style type="text/css">
        #login h1 a {
            background-image: url(/wp-content/uploads/logo/logo.svg) !important;
            background-size: contain !important;
            width: 100% !important;
            height: 80px !important;
        }
    </style>';
}
add_action('login_enqueue_scripts', 'custom_login_logo');

function custom_login_logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'custom_login_logo_url');

/* Kustomisasi CSS pada halaman login */
function custom_login_css() {
    echo '
    <style type="text/css">
     input[name="wp-submit"] {
		background: #436850 !important;
		border-color: #436850 !important;
	 }
	 input[name="wp-submit"]:hover {
		background: #12372A !important;
		border-color: #12372A !important;
	 }
	 .dashicons-visibility {
	    color: #436850 !important
	 }
    </style>';
}
add_action('login_enqueue_scripts', 'custom_login_css');

/* Ganti alamat email notifikasi serta namanya */
function custom_wp_mail_from($original_email_address) {
    return 'no-reply@difamtk.com';
}
add_filter('wp_mail_from', 'custom_wp_mail_from');

function custom_wp_mail_from_name($original_email_from) {
    return 'Difa MTK';
}
add_filter('wp_mail_from_name', 'custom_wp_mail_from_name');

/* Aktifikan pengaturan padding dan margin di post editor */
function custom_block_editor_settings() {
    // Mengaktifkan pengaturan padding
    add_theme_support( 'custom-spacing' );
	add_theme_support( 'appearance-tools' );
}
add_action( 'after_setup_theme', 'custom_block_editor_settings' );


function save_user_registration_ip( $user_id ) {
    if ( ! empty( $_SERVER['REMOTE_ADDR'] ) ) {
        update_user_meta( $user_id, 'registration_ip', $_SERVER['REMOTE_ADDR'] );
    }
}
add_action( 'user_register', 'save_user_registration_ip' );

function show_user_registration_ip( $user ) {
    $registration_ip = get_user_meta( $user->ID, 'registration_ip', true );
    ?>
    <h3><?php _e('Registration IP'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="registration_ip"><?php _e('IP Address'); ?></label></th>
            <td>
                <input type="text" name="registration_ip" id="registration_ip" value="<?php echo esc_attr( $registration_ip ); ?>" class="regular-text" readonly /><br />
                <span class="description"><?php _e('This is the IP address from which the user registered.'); ?></span>
            </td>
        </tr>
    </table>
    <?php
}
add_action( 'show_user_profile', 'show_user_registration_ip' );
add_action( 'edit_user_profile', 'show_user_registration_ip' );
