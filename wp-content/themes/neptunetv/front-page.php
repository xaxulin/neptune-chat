<?php
/**
 * Front page template.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$hero_title       = get_theme_mod( 'neptune_hero_title', __( 'Neptune™ Outdoor TVs: Year-Round Entertainment Anywhere Outdoors', 'neptunetv' ) );
$hero_subtitle    = get_theme_mod( 'neptune_hero_subtitle', __( 'Engineered to thrive in every season with brilliant 4K UHD picture quality, smart connectivity, and the durability you expect from Peerless-AV®. Bring the big game, movie night, or streaming playlists to the great outdoors.', 'neptunetv' ) );
$hero_primary_cta = get_theme_mod( 'neptune_hero_primary_cta', __( 'Shop Outdoor TVs', 'neptunetv' ) );
$hero_primary_url = get_theme_mod( 'neptune_hero_primary_url', home_url( '/products/' ) );
$hero_secondary_cta = get_theme_mod( 'neptune_hero_secondary_cta', __( 'Why Neptune™', 'neptunetv' ) );
$hero_secondary_url = get_theme_mod( 'neptune_hero_secondary_url', '#neptune-differentiators' );
$hero_image_id      = (int) get_theme_mod( 'neptune_hero_image' );
$hero_image_url     = $hero_image_id ? wp_get_attachment_image_url( $hero_image_id, 'full' ) : NEPTUNE_THEME_URI . '/assets/images/hero.png';

$features = [
    [
        'title'       => __( 'Weatherproof durability', 'neptunetv' ),
        'description' => __( 'IP54 rated protection keeps your entertainment going through rain, snow, humidity, and soaring summer heat.', 'neptunetv' ),
    ],
    [
        'title'       => __( 'Smart + 4K UHD clarity', 'neptunetv' ),
        'description' => __( 'Stream, game, and mirror your favorite content with vivid brightness calibrated for outdoor viewing.', 'neptunetv' ),
    ],
    [
        'title'       => __( 'Peerless-AV® engineering', 'neptunetv' ),
        'description' => __( 'Backed by decades of display innovation, plus an industry-leading warranty and nationwide installer network.', 'neptunetv' ),
    ],
];

$cta_cards = [
    [
        'title' => __( 'Find an elite outdoor TV dealer', 'neptunetv' ),
        'text'  => __( 'Partner with certified professionals who design and install immersive outdoor entertainment spaces.', 'neptunetv' ),
        'link'  => home_url( '/dealer-locator/' ),
        'label' => __( 'Find a dealer', 'neptunetv' ),
    ],
    [
        'title' => __( 'Download the Neptune™ brochure', 'neptunetv' ),
        'text'  => __( 'Compare models, specs, and accessories to plan the perfect outdoor viewing experience.', 'neptunetv' ),
        'link'  => home_url( '/resources/neptune-outdoor-tv-brochure.pdf' ),
        'label' => __( 'Download brochure', 'neptunetv' ),
    ],
    [
        'title' => __( 'Register your Neptune™ display', 'neptunetv' ),
        'text'  => __( 'Activate warranty coverage and receive product updates, care tips, and seasonal inspiration.', 'neptunetv' ),
        'link'  => home_url( '/product-registration/' ),
        'label' => __( 'Register warranty', 'neptunetv' ),
    ],
];
?>
<section class="ntv-hero" style="<?php echo $hero_image_url ? 'background-image: url(' . esc_url( $hero_image_url ) . ');' : ''; ?>">
    <div class="ntv-hero__overlay"></div>
    <div class="container ntv-hero__container">
        <div class="ntv-hero__content">
            <span class="ntv-hero__eyebrow"><?php esc_html_e( 'All-season outdoor entertainment', 'neptunetv' ); ?></span>
            <h1><?php echo esc_html( $hero_title ); ?></h1>
            <p><?php echo esc_html( $hero_subtitle ); ?></p>
            <div class="ntv-hero__actions">
                <?php if ( $hero_primary_cta && $hero_primary_url ) : ?>
                    <a class="ntv-button ntv-button--primary" href="<?php echo esc_url( $hero_primary_url ); ?>">
                        <?php echo esc_html( $hero_primary_cta ); ?>
                    </a>
                <?php endif; ?>
                <?php if ( $hero_secondary_cta && $hero_secondary_url ) : ?>
                    <a class="ntv-button ntv-button--ghost" href="<?php echo esc_url( $hero_secondary_url ); ?>">
                        <?php echo esc_html( $hero_secondary_cta ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="neptune-differentiators" class="ntv-section ntv-section--features">
    <div class="container">
        <header class="ntv-section__header">
            <span class="ntv-section__eyebrow"><?php esc_html_e( 'Why Neptune™', 'neptunetv' ); ?></span>
            <h2><?php esc_html_e( 'Engineered to perform where other TVs can’t', 'neptunetv' ); ?></h2>
            <p><?php esc_html_e( 'Purpose-built for the outdoors, every Neptune™ display balances rugged durability with brilliant visuals, smart streaming, and effortless control.', 'neptunetv' ); ?></p>
        </header>
        <div class="ntv-feature-grid">
            <?php foreach ( $features as $feature ) : ?>
                <article class="ntv-feature-card">
                    <div class="ntv-feature-card__icon" aria-hidden="true">
                        <span></span>
                    </div>
                    <h3><?php echo esc_html( $feature['title'] ); ?></h3>
                    <p><?php echo esc_html( $feature['description'] ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ntv-section ntv-section--spotlight">
    <div class="container ntv-spotlight">
        <div class="ntv-spotlight__media" role="img" aria-label="<?php esc_attr_e( 'An outdoor seating area with a Neptune TV mounted near a pool.', 'neptunetv' ); ?>"></div>
        <div class="ntv-spotlight__content">
            <span class="ntv-section__eyebrow"><?php esc_html_e( 'Bring the indoors out', 'neptunetv' ); ?></span>
            <h2><?php esc_html_e( 'Big-screen brilliance—without hiding from the sun', 'neptunetv' ); ?></h2>
            <p><?php esc_html_e( 'Neptune™ Outdoor TVs deliver up to 700 nits of brightness, anti-glare glass, and adaptive picture tuning so family movie nights, watch parties, and streaming playlists stay vibrant—even under midday sunshine.', 'neptunetv' ); ?></p>
            <ul class="ntv-spotlight__list">
                <li><?php esc_html_e( 'Powered by webOS with hundreds of built-in streaming apps', 'neptunetv' ); ?></li>
                <li><?php esc_html_e( 'Wide temperature operating range from -22°F to 122°F (-30°C to 50°C)', 'neptunetv' ); ?></li>
                <li><?php esc_html_e( 'IP54 rated chassis resists rain, snow, dust, and insects', 'neptunetv' ); ?></li>
            </ul>
            <a class="ntv-button ntv-button--secondary" href="<?php echo esc_url( home_url( '/outdoor-tv-technology/' ) ); ?>"><?php esc_html_e( 'Explore the technology', 'neptunetv' ); ?></a>
        </div>
    </div>
</section>

<section class="ntv-section ntv-section--catalog">
    <div class="container">
        <header class="ntv-section__header">
            <span class="ntv-section__eyebrow"><?php esc_html_e( 'Product catalog', 'neptunetv' ); ?></span>
            <h2><?php esc_html_e( 'Choose the perfect Neptune™ Outdoor TV', 'neptunetv' ); ?></h2>
            <p><?php esc_html_e( 'From full-sun masterpieces to shaded patio essentials, explore the lineup purpose-built for every outdoor environment.', 'neptunetv' ); ?></p>
        </header>
        <div class="ntv-product-grid columns-3">
            <?php
            $product_query = new WP_Query(
                [
                    'post_type'      => 'ntv_product',
                    'posts_per_page' => 3,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ]
            );

            if ( $product_query->have_posts() ) {
                while ( $product_query->have_posts() ) {
                    $product_query->the_post();
                    get_template_part( 'template-parts/content', 'product-card' );
                }
                wp_reset_postdata();
            } else {
                echo '<div class="ntv-product-grid__empty">' . esc_html__( 'Add products from the WordPress dashboard to populate your outdoor TV catalog.', 'neptunetv' ) . '</div>';
            }
            ?>
        </div>
        <div class="ntv-section__actions">
            <a class="ntv-button ntv-button--primary" href="<?php echo esc_url( home_url( '/products/' ) ); ?>"><?php esc_html_e( 'View all products', 'neptunetv' ); ?></a>
            <a class="ntv-button ntv-button--ghost" href="<?php echo esc_url( home_url( '/product-category/installation-accessories/' ) ); ?>"><?php esc_html_e( 'Outdoor accessories', 'neptunetv' ); ?></a>
        </div>
    </div>
</section>

<section class="ntv-section ntv-section--reviews">
    <div class="container">
        <header class="ntv-section__header">
            <span class="ntv-section__eyebrow"><?php esc_html_e( 'Loved nationwide', 'neptunetv' ); ?></span>
            <h2><?php esc_html_e( 'Backyards, rooftops, and pool decks love Neptune™', 'neptunetv' ); ?></h2>
        </header>
        <div class="ntv-testimonial-grid">
            <blockquote class="ntv-testimonial">
                <p><?php esc_html_e( '“The Neptune™ TV is the centerpiece of our outdoor lounge. Bright, bold colors—even mid-day—and the built-in speakers carry across the patio.”', 'neptunetv' ); ?></p>
                <cite><?php esc_html_e( 'Residential customer – Scottsdale, AZ', 'neptunetv' ); ?></cite>
            </blockquote>
            <blockquote class="ntv-testimonial">
                <p><?php esc_html_e( '“Installing Neptune™ displays is effortless. They always arrive calibrated, and the weatherproof enclosure gives my clients total peace of mind.”', 'neptunetv' ); ?></p>
                <cite><?php esc_html_e( 'Custom integrator – Charleston, SC', 'neptunetv' ); ?></cite>
            </blockquote>
            <blockquote class="ntv-testimonial">
                <p><?php esc_html_e( '“Our rooftop bar streams every big game on Neptune™ TVs. Rain or shine, they deliver flawless picture quality that keeps guests coming back.”', 'neptunetv' ); ?></p>
                <cite><?php esc_html_e( 'Hospitality partner – Chicago, IL', 'neptunetv' ); ?></cite>
            </blockquote>
        </div>
    </div>
</section>

<section class="ntv-section ntv-section--cta-cards">
    <div class="container">
        <div class="ntv-cta-card-grid">
            <?php foreach ( $cta_cards as $card ) : ?>
                <article class="ntv-cta-card">
                    <h3><?php echo esc_html( $card['title'] ); ?></h3>
                    <p><?php echo esc_html( $card['text'] ); ?></p>
                    <a class="ntv-button ntv-button--ghost" href="<?php echo esc_url( $card['link'] ); ?>">
                        <?php echo esc_html( $card['label'] ); ?>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ntv-section ntv-section--final-cta">
    <div class="container">
        <h2><?php esc_html_e( 'Ready to build your outdoor oasis?', 'neptunetv' ); ?></h2>
        <p><?php esc_html_e( 'Start planning with Neptune™ experts and reimagine what entertainment can look like outside.', 'neptunetv' ); ?></p>
        <a class="ntv-button ntv-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Connect with us', 'neptunetv' ); ?></a>
    </div>
</section>

<?php
get_footer();
