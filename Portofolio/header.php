<!DOCTYPE html>
<html>
    <head>
        <?php wp_head();?>
    </head>

    <body <?php body_class();?>>

    <header class="sticky-top">
        <div class="container">
            <?php wp_nav_menu (
                array(
                    'theme_location' => 'top-menu'
                )
            )?>
        </div>
    </header>
    <div>
        <ul style=" padding:0; list-style-type: none">
            <?php dynamic_sidebar( 'Project sidebar' ); ?>
        </ul>
    </div>