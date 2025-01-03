<!-- Front page news -->
<?php
$classes = explode( ' ', 'solid-section widget-area fadeup-effect fadeInUp' );
$args = [
    'posts_per_page' => 5,
];
$posts_array = get_posts( $args );
if( $posts_array ){
    $classes[] = 'flexible-widgets';
    $classes[] = 'widget-halves';
} else {
    $classes[] = 'widget-centered';
}
?>
<div id="front-page-news" class="front-page-news">
    <div class="<?= implode( ' ', $classes ) ?>">
        <div class="wrap">
            <!--<section class="widget widget_text widget_custom_html">
                <div class="widget_text widget-wrap">
                    <h3 class="widgettitle widget-title">News</h3>
                </div>
            </section>-->
            <section class="widget widget_text">
                <div class="widget_text widget-wrap">
                <h3 class="title">Email Newsletter Signup</h3>
                <p class="caption">Sign up below to receive our email newsletter:</p>
                <?php
                $form_widget = new \MailPoet\Form\Widget();
                echo $form_widget->widget(array('form' => 1, 'form_type' => 'php'));
                ?>
                </div>
            </section>
            <?php
            if( $posts_array ){
            ?>
            <section class="widget widget_text">
                <div class="widget_text widget-wrap">
                    <h3>Recent Posts</h3>
                    <ul class="post-list">
                    <?php
                    foreach( $posts_array as $post ){
                    ?>
                        <li><a href="<?= get_the_permalink( $post->ID ) ?>"><?= get_the_title( $post->ID ) ?></a></li>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                    </ul>
                </div>
            </section>
            <?php } ?>
        </div>
    </div>
</div>