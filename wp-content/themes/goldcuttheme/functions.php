<?php

// Added stylesheets
function load_stylessheets() {

    wp_enqueue_style('stylesheet', get_template_directory_uri(). '/style.css'); 
    
    wp_enqueue_style("bootstrap", get_template_directory_uri()."/css/bootstrap.css");
    wp_enqueue_style("menu", get_template_directory_uri()."/css/menu.css");
    
    wp_enqueue_style("frontpage", get_template_directory_uri()."/css/front-page.css");
    wp_enqueue_style("header", get_template_directory_uri()."/css/header.css");
    wp_enqueue_style("shoptemplate", get_template_directory_uri()."/css/shop-templare.css");
    wp_enqueue_style("404", get_template_directory_uri()."/css/404.css");


    wp_enqueue_style("footer", get_template_directory_uri()."/css/footer.css");
}

add_action('wp_enqueue_scripts', 'load_stylessheets');

function my_enqueue_scripts()
{
   /*  wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery.js', [], false, true);  */
    wp_enqueue_script('script', get_template_directory_uri().'/js/app.js', [], false, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/jquery.js', ['jquery'],null, true);
}


add_action( 'wp_enqueue_scripts', 'pe_custom_product_style' );
      function pe_custom_product_style() {
        if ( is_product() ){
        wp_register_style( 'product_css', get_stylesheet_directory_uri() . '/css/single-product.css', false, '1.0.0', 'all' );
          wp_enqueue_style('product_css');
        }
	  }

add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );

function tutsplus_burger_menu_scripts() {

	wp_enqueue_script( 'burger-menu-script', get_stylesheet_directory_uri() . '/scripts/burger-menu.js', array( 'jquery' ) );

}
add_action( 'wp_enqueue_scripts', 'tutsplus_burger_menu_scripts' );

function wpse_setup_theme() {
   add_theme_support( 'post-thumbnails' );
   add_image_size( 'team-thumb', 60, 60, true );

   // Support for woocommerce
   add_theme_support('woocommerce');

   // Support for menus 
   add_theme_support('menus');

   // Support for widets
   add_theme_support('widgets');

   /* add_theme_support('wc-product-gallery-zoom'); */

   add_theme_support('wc-product-gallery-slider');

   add_theme_support('wc-product-gallery-lightbox');
}

add_action( 'after_setup_theme', 'wpse_setup_theme' );


// Added Top-menu & footer-menu
register_nav_menus(

    array(
        'top-menu' => 'Top Menu',
        'footer-menu'  => 'Footer Menu',
    )
);

// Support admin menu 
function allow_menu_editor() {
	$arr_menu = array_filter(get_nav_menu_locations());
	if ( ! empty($arr_menu) ) {
		$obj_role = get_role('editor');
		$obj_role->add_cap('edit_theme_options');
	}
}

add_action( 'admin_menu', 'allow_menu_editor', 999);

// Added logo to theme
function nd_dosth_theme_setup() {

    add_theme_support( 'title-tag' );  
    add_theme_support( 'custom-logo' );

}
add_action( 'after_setup_theme', 'nd_dosth_theme_setup');

// Added Widgets 
function register_widget_areas() {

    register_sidebar( array(
      'name'          => 'Footer social icons',
      'id'            => 'footer-social-icons',
      'description'   => 'Widget Social Media',
      'before_widget' => '<section class="footer-widget-social">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>',


    ));

    register_sidebar( array(
        'name'          => 'Footer contact',
        'id'            => 'footer-contact',
        'description'   => 'Widget Kontakt',
        'before_widget' => '<section class="footer-widget-contact">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
  
        
      ));

      register_sidebar( array(
        'name'          => 'Footer service',
        'id'            => 'footer-service',
        'description'   => 'Widget Service',
        'before_widget' => '<section class="footer-widget-service">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
  
        
      ));
    
  }
  add_action( 'widgets_init', 'register_widget_areas'  );
  

// Support svg image 
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}

add_filter('upload_mimes', 'add_file_types_to_uploads');


// Removed tabs on product page 
function my_remove_product_tabs( $tabs ) {
  unset( $tabs['additional_information'] );
  unset( $tabs['reviews'] ); 
  return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'my_remove_product_tabs', 98 );

// Removved update cart message in cart
add_filter('woocommerce_add_message', '__return_false');

// Removed notice in cart 
add_filter( 'woocommerce_cart_item_removed_notice_type', '__return_false' );


// Translated text product page 
add_filter( 'gettext', function( $translated_text ) {
    if ( 'Delsumma' === $translated_text ) {
        $translated_text = 'Summa';
    }
    return $translated_text;
} );


// Added plus & minus on product page and cart page
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus">+</button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus">-</button>';
}
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
    
   wc_enqueue_js( "

    $(document).on( 'click', 'button.plus, button.minus', function() {
  
        var qty = $( this ).parent( '.quantity' ).find( '.qty' );
        var val = parseFloat(qty.val());
        var max = parseFloat(qty.attr( 'max' ));
        var min = parseFloat(qty.attr( 'min' ));
        var step = parseFloat(qty.attr( 'step' ));

        if ( $( this ).is( '.plus' ) ) {
           if ( max && ( max <= val ) ) {
              qty.val( max ).change();
           } else {
              qty.val( val + step ).change();
           }
        } else {
           if ( min && ( min >= val ) ) {
              qty.val( min ).change();
           } else if ( val > 1 ) {
              qty.val( val - step ).change();
           }
        }

     });

   " );
}



// Added counter to cart in header
add_filter( 'woocommerce_add_to_cart_fragments', 'counter_add_to_cart_fragment' );

function counter_add_to_cart_fragment( $fragments ) {

	$fragments[ '.cart-counter' ] = '<a href="' . wc_get_cart_url() . '" class="cart-counter">' . WC()->cart->get_cart_contents_count() . '</a>';
 	return $fragments;

 }


// Added hooks to cart 
add_action( 'woocommerce_before_cart_table', 'woo_add_continue_shopping_button_to_cart' );

function woo_add_continue_shopping_button_to_cart() {
 $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
 
 echo '<div class="continue-shopping"> <a href="'.$shop_page_url.'" class="button-continue-to-shop">Fortsätt handla →</a></div>';
}

add_action( 'woocommerce_before_cart_table', 'border_berofe_cart_woocommerce' );

function border_berofe_cart_woocommerce(){

   echo '<div class="border-cart"><h1 class="h1-cart">DIN KUNDVAGN<h1></div>';
}


/* Single product page */

remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
add_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',6 );

remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_meta',40 );

add_filter( 'woocommerce_variable_price_html', 'bbloomer_variation_price_format_min', 9999, 2 );
 
function bbloomer_variation_price_format_min( $price, $product ) {
   $prices = $product->get_variation_prices( true );
   $min_price = current( $prices['price'] );
   $max_price = end( $prices['price'] );
   $min_reg_price = current( $prices['regular_price'] );
   $max_reg_price = end( $prices['regular_price'] );
   if ( $min_price !== $max_price || ( $product->is_on_sale() && $min_reg_price === $max_reg_price ) ) {
      $price = 'Från: ' . wc_price( $min_price ) . $product->get_price_suffix();
   }
   return $price;
}

add_action( 'woocommerce_single_product_summary' , 'add_custom_text_before_product_title', 4 );
 
function add_custom_text_before_product_title() {
   echo '<h3 class="h3-brand">GoldCut</h3>';
}


// Removing title on shop page
add_filter('woocommerce_show_page_title', 'bbloomer_hide_shop_page_title');
 
function bbloomer_hide_shop_page_title($title) {
   if (is_shop()) $title = false;
   return $title;
}

add_action( 'woocommerce_before_shop_loop', function() {
   if(is_shop()){
      echo '<div class="shop-title-desc">';
      echo '<h1>Våra Produkter</h1>';
      echo '<p>Vi använder oss av högkvalitativa produkter för att säkerställa att våra kunder får det bästa resultatet. <br>Vårt sortiment består av professionella produkter från vårt egna varumärke GoldCut Home.</p>';
      echo '</div>';
   }
  
}, 18, 0 );

/* Cart & checkout */

add_action( 'woocommerce_before_checkout_form', 'add_cart_on_checkout', 5 );
 
function add_cart_on_checkout() {
 if ( is_wc_endpoint_url( 'order-received' ) ) return;
 echo do_shortcode('[woocommerce_cart]'); // Woocommerce cart page shortcode
}


add_action( 'template_redirect', function() {
  
   // Replace "cart"  and "checkout" with cart and checkout page slug if needed
       if ( is_page( 'cart' ) ) {
           wp_redirect( '/checkout/' );
           die();
       }
   } );
       

add_filter('woocommerce_checkout_fields','hj_override_checkout_fields'); 

         function hj_override_checkout_fields($fields){
            unset(
                $fields['order']['order_comments'],
                $fields['billing']['billing_company'],
                $fields['billing']['billing_address_2'],
                $fields['shipping']['shipping_company'],
                $fields['shipping']['shipping_first_name'],
                $fields['shipping']['shipping_last_name'],
                $fields['shipping']['shipping_country'],
                $fields['shipping']['shipping_address_1'],
                $fields['shipping']['shipping_address_2'],
                $fields['shipping']['shipping_postcode'],
                $fields['shipping']['shipping_city'],
               
            );
            return $fields;
        }

function wc_billing_field_strings( $translated_text, $text, $domain ) {
   switch ( $translated_text ) {
   case 'Faktureringsdetaljer' :
      $translated_text = __( 'Kontaktinformation', 'woocommerce' );
      break;
         }
         return $translated_text;
   }
add_filter( 'gettext', 'wc_billing_field_strings', 20, 3 );


add_action( 'woocommerce_after_order_notes', 'bbloomer_notice_shipping' );
 



add_action( 'woocommerce_after_add_to_cart_form', 'goldcut_before_add_to_cart_btn' );

function goldcut_before_add_to_cart_btn(){
	echo '<p>Leverans: 2-4 arbetsdagar</p>';
   echo '<img class="payment-goldcut" src="https://goldcut.se/wp-content/plugins/woocommerce/assets/images/icons/credit-cards/visa.svg">';
   echo '<img class="payment-goldcut" src="https://goldcut.se/wp-content/plugins/woocommerce/assets/images/icons/credit-cards/mastercard.svg">';
   echo '<img class="payment-goldcut" src="https://goldcut.se/wp-content/plugins/woocommerce/assets/images/icons/credit-cards/amex.svg">';
   echo '<img class="payment-goldcut" src="https://goldcut.se/wp-content/plugins/payment-gateway-stripe-and-woocommerce-integration/assets/img/apple-pay.png">';
   echo '<img class="payment-goldcut" src="https://goldcut.se/wp-content/plugins/payment-gateway-stripe-and-woocommerce-integration/assets/img/klarna.png">';

}

