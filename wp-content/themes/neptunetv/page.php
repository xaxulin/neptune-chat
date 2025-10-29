<?php
/**
 * Default page template.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>
<section class="ntv-page">
    <div class="container">
        <?php
        while ( have_posts() ) {
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'ntv-page__article' ); ?>>
                <header class="ntv-page__header">
                    <h1 class="ntv-page__title"><?php the_title(); ?></h1>
                    <?php if ( has_excerpt() ) : ?>
                        <p class="ntv-page__summary"><?php echo esc_html( get_the_excerpt() ); ?></p>
                    <?php endif; ?>
                </header>
                <div class="ntv-page__content">
                    <?php the_content(); ?>
                </div>
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
