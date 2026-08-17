<?php
/**
 * Block template file: parts/blocks/testimonials.php
 *
 * Testimonials Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-testimonials';
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

<section id="<?php echo $block_id ?>" class="w-full sm:mb-8 lg:mb-<?php echo get_field( 'bottom_spacing' ); ?>">
    <div class="bg-white relative flex flex-col items-center py-28 2xl:py-32">
        
        <div class="max-w-full w-[320px] md:w-[480px] lg:w-[640px] mx-auto mb-6 lg:mb-12">
            <h3 class="font-sans text-black text-3xl lg:text-5xl text-center w-full"><?php echo get_field( 'testimonials_group_title' ); ?></h3>
        </div>

        <div class="w-full swiperTestimonials testimonials-wrapper-div">
            <?php if ( have_rows( 'testimonials' ) ) : ?>
                <div class="w-full swiper-wrapper">
                    <?php while ( have_rows( 'testimonials' ) ) : the_row(); ?>
                        <div class="swiper-slide w-full relative flex flex-col justify-center md:justify-start rounded-xl p-8 min-h-[360px] md:min-h-[280px]">
                            <div class="absolute inset-0 bg-black opacity-[8%] rounded-xl -z-1"></div>
                            <div class="flex flex-col md:flex-row">

                                <?php if ( get_sub_field( 'image_toggle' ) == 1 ) : ?>
                                    <?php $image = get_sub_field( 'image' ); ?>
                                    <div class="w-10 h-10 aspect-square rounded-full">
                                        <?php if ( $image ) : ?>
                                            <img class="w-10 h-10 aspect-square rounded-full" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                        <?php endif; ?>
                                    </div>
                                <?php else : ?>
                                    <div class="w-10 h-10 aspect-square rounded-full">
                                        <img class="w-10 h-10 aspect-square rounded-full" src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/silouette.jpg" alt="Silouette image">
                                    </div>
                                <?php endif; ?>
                                
                                <div class="mt-2 md:mt-0 md:ml-4 w-auto flex flex-col">
                                    <h4 class="text-black font-title font-semibold text-lg lg:text-xl"><?php echo get_sub_field( 'author' ); ?></h4>
                                    <h5 class=" text-brand-dark_grey font-sans font-normal text-sm lg:text-base"><?php echo get_sub_field( 'title' ); ?></h5>
                                </div>
                            </div>
                            <p class="mt-5 text-black font-base font-normal text-base lg:text-lg w-full lg:w-11/12"><?php echo get_sub_field( 'quote' ); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <?php // No rows found ?>
            <?php endif; ?>
        </div>

        <div class="w-full absolute bottom-16">
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>