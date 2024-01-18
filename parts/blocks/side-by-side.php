<?php
/**
 * Block template file: parts/blocks/side-by-side.php
 *
 * Side By Side Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'side-by-side-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-side-by-side';
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

<section id="<?php echo $block_id ?>" class="w-full min-h-[400px] lg:min-h-[800px] lg:h-[100vh] bg-gradient-to-b lg:bg-gradient-to-r from-brand-dark_gradient to-brand-third pt-[96px] lg:pt-<?php echo get_field( 'top_spacing' ); ?> pb-<?php echo get_field( 'bottom_spacing' ); ?> lg:px-8">

	<?php if ( get_field( 'image_orientation_side_by_side' ) == 1 ) :
		$image_order = 'lg:order-1';
		$content_order = 'lg:order-3';
	else :
		$image_order = 'lg:order-3';
		$content_order = 'lg:order-1';

    endif; ?>

    <div class="container h-full mx-auto flex flex-col lg:flex-row lg:gap-x-4 lg:justify-between px-6 lg:px-0 py-8 lg:py-16 2xl:pt-40 lg:pb-56">

        <div class="w-full lg:w-1/3 <?php echo $image_order; ?> mb-6 lg:mb-0 object-reveal-125">
            <?php if ( have_rows( 'image_settings' ) ) : ?>
                <?php while ( have_rows( 'image_settings' ) ) : the_row(); ?>

                    <?php 
                        $image = get_sub_field( 'image' );
                        $rounding = get_sub_field( 'image_rounding' );
                    ?>

                    <div class="w-full h-full flex items-center">
                        <?php if ( $image ) : ?>
                            <img class="max-w-full w-48 lg:w-full lg:px-4 <?php echo $rounding ?>" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="w-full lg:w-2/3 flex flex-col justify-center mt-4 lg:mt-0 pt-0 lg:pt-8 <?php echo $content_order; ?>">
            <?php if ( have_rows( 'content' ) ) : ?>
                <?php while ( have_rows( 'content' ) ) : the_row(); ?>

                    <h2 class="text-white mb-3 font-title font-semibold text-3xl sm:text-4xl md:text-5xl lg:text-6xl lg:leading-[72px] 2xl:text-7xl 2xl:leading-[96px] object-reveal-250"><?php the_sub_field( 'header' ); ?></h2>
                    <p class="text-white text-base lg:text-xl 2xl:text-2xl w-full lg:w-5/6 object-reveal-500"><?php the_sub_field( 'hero_content' ); ?></p>

                    <?php if ( get_sub_field( 'button_toggle' ) == 1 ) : ?>
                        <div class="flex flex-col space-y-3 lg:space-y-5 mt-2 lg:mt-4">
                            <?php $button_link = get_sub_field( 'button_link' ); ?>            
                            <?php if ( $button_link ) : ?>
                                <div class="flex flex-row relative">
                                    <?php $data_title = formatAnchor($button_link['url']); ?>
                                    <a class="theme-button main menu-anchor" data-title="<?php echo $data_title; ?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</section>