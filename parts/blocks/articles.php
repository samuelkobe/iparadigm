<?php
/**
 * Block template file: parts/blocks/articles.php
 *
 * Articles Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'articles-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-articles';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<?php 
$block_id = '';
if ( have_rows( 'id' ) ) : ?>
    <?php while ( have_rows( 'id' ) ) : the_row(); ?>
        <?php if ( get_sub_field( 'block_id_toggle' ) == 1 ) : ?>
            <?php
                $block_anchor = formatAnchor(get_sub_field( 'block_id' ));
                $block_id = $block_anchor;
                ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<section id="<?php echo $block_id ?>" class="w-full mb-<?php echo get_field( 'bottom_spacing' ); ?>">
    <div class="bg-white relative flex flex-col items-center pt-16 pb-8 2xl:py-24">

        <div class="container min-h-[480px] h-auto md:h-[40vh] lg:min-h-[640px] lg:h-[55vh] flex flex-col md:flex-row md:items-center">
            <div class="container mx-auto px-6 lg:px-4 flex flex-col xl:flex-row w-full lg:w-1/2 xl:items-center">
                <div class="mb-2 xl:mb-0 xl:mr-4">
                    <?php $icon = get_field( 'icon' ); ?>
                    <?php if ( $icon ) : ?>
                        <img class="w-24 xl:w-48" src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                    <?php endif; ?>
                </div>
                
                <div>
                    <h2 class="font-title text-2xl xl:text-[28px] xl:leading-[32px] 2xl:text-[32px] 2xl:leading-[36px] text-brand-black mb-2 lg:mb-4"><?php the_field( 'articles_section_header' ); ?></h2>

                    <?php $link = get_field( 'link' ); ?>
                    <?php if ( $link ) : ?>
                        <a class="underline text-brand-third font-bold font-button text-base lg:text-xl" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="w-0 h-0 lg:h-auto lg:w-1/24"></div>

            <div class="w-full h-full lg:w-5/12 flex items-center justify-center mt-8 lg:mt-0 px-2">
                
                <?php $args = array( 
                    'posts_per_page'    => -1,
                    'post_type'         => 'post',
                    'order'             => 'ASC',
                    'orderby'           => 'meta_value',
                );
                
                $the_query = new WP_Query( $args ); ?>
                
                <div class="swiper w-full h-[400px] xl:h-[600px] articlesSwiper flex items-center">

                    <div class="relative w-1/8 h-full flex flex-col items-center justify-center">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>

                    <?php if ( $the_query->have_posts() ) : ?>
                        
                        <div class="w-7/8 swiper-wrapper flex flex-col">
                            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                                <div class="swiper-slide flex items-center">
                                    <?php the_post_thumbnail(); ?>
                                    <div class="flex flex-col mx-4">
                                        <h4 class="font-sans text-brand-darkest_grey"><?php the_date(); ?></h4>
                                        <h3 class="font-title font-medium my-1 lg:my-2"><?php the_title(); ?></h3>

                                        <?php if ( get_field( 'article_type', get_the_ID() ) == 1 ) : ?>
                                            <?php $article_url = get_field( 'external_article_url', get_the_ID() ); ?>
                                            <?php $article_url_target = '_blank'; ?>
                                        <?php else : ?>
                                            <?php $article_url = get_post_permalink(); ?>
                                            <?php $article_url_target = ''; ?>
                                        <?php endif; ?>

                                        <a class="font-button text-brand-third underline capitalize" href="<?php echo $article_url; ?>" target="<?php echo $article_url_target; ?>">read more</a>    
    
                                    </div>
                                </div>
                                
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>

                        <p>No services currently articles.</p>

                    <?php endif; wp_reset_postdata() ?>

                </div>
            
            </div>
        </div>

    </div>
</section>

<!-- Initialize Swiper -->
<script type="module" refer>
    var swiper = new Swiper(".articlesSwiper", {
        slidesPerView: 3,
        spaceBetween: 16,
        direction: "verticle",
        loop: true,
        centeredSlides: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>