<?php
/**
 * Blog index and fallback template.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>
<section class="ntv-archive">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <header class="ntv-archive__header">
                <h1 class="ntv-archive__title"><?php single_post_title(); ?></h1>
            </header>
            <div class="ntv-archive__grid">
                <?php
                while ( have_posts() ) {
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'ntv-archive__item' ); ?>>
                        <h2 class="ntv-archive__item-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p class="ntv-archive__meta">
                            <?php echo esc_html( get_the_date() ); ?>
                            <?php esc_html_e( ' · ', 'neptunetv' ); ?>
                            <?php the_author(); ?>
                        </p>
                        <div class="ntv-archive__excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                    <?php
                }
                ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <div class="ntv-archive__empty">
                <h2><?php esc_html_e( 'No content yet', 'neptunetv' ); ?></h2>
                <p><?php esc_html_e( 'Create your first post to see it appear here.', 'neptunetv' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
