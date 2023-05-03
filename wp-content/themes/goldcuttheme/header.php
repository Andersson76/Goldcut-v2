<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('&raquo;','true','right'); ?> Goldcut</title>

    <?php wp_head(); ?>

</head>
<body <?php body_class('body')?>>

<header class="header-gc" id="myHeader">
    <section>
        <div class="container-fluied">
            <div class="top-bar">
                <div class="row">
                    <div class="col brand-usp">
                        <p>VI ERBJUDER ALLT INOM HÅR OCH SKÄGG I DITT HEM</p>
                    </div>
                </div>
             </div>
        </div>
    </section>

    <section>
        <div class="d-flex flex-sm-row vertical-box menu-header">
            <div class="col-3 empty-div">
            <div class="responsive_menu">
                <?php echo do_shortcode('[responsive_menu]'); ?>
            </div>
            </div>
            <div class="col-6 col-md-2 logo">
                <?php the_custom_logo(); ?>
            </div>
                <nav class="col-8 col-md-8 nav-menu" id="menu">
                    <div class="menu-wp">
                        <?php wp_nav_menu(
                            array(
                                'theme_location' => 'top-menu'
                                )
                            );
                        ?>
                    </div>

                    <div class="cart-icon-menu">
                        <a href="<?php echo wc_get_cart_url() ?>"><img src="http://goldcut.se/wp-content/uploads/2023/01/shopping-bag.svg"></a>
                    <div class="counter-menu" id="count">
                        <a href="<?php echo wc_get_cart_url() ?>" class="cart-counter"><?php echo WC()->cart->get_cart_contents_count() ?></a>
                    </div>
                </nav>   

                <div class="col-3 col-md-2 booking">
                    <div class="book-btn">
                        <a href="<?php echo esc_url( home_url( '/bokningsforfragan' ) ); ?>"class="button btn-style header">
                        Boka nu
                        </a>
                    </div>
                </div>
        </div>
    </section>
</header>
