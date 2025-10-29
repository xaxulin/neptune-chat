<?php
/**
 * Single post template.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>
<section class="ntv-single">
    <div class="container">
        <?php
        while ( have_posts() ) {
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'ntv-single__article' ); ?>>
                <header class="ntv-single__header">
                    <h1 class="ntv-single__title"><?php the_title(); ?></h1>
                    <p class="ntv-single__meta">
                        <?php echo esc_html( get_the_date() ); ?>
                        <?php esc_html_e( ' · ', 'neptunetv' ); ?>
                        <?php the_author(); ?>
                    </p>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ntv-single__featured-image">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </div>
                    <?php endif; ?>
                </header>
                <div class="ntv-single__content">
                    <?php the_content(); ?>
                </div>
                <footer class="ntv-single__footer">
                    <?php the_tags( '<ul class="ntv-single__tags"><li>', '</li><li>', '</li></ul>' ); ?>
                </footer>
            </article>
            <?php
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
        ?>
    </div>
</section>
<?php
get_footer();
