<?php
/**
 * Block template file: parts/blocks/cta.php
 *
 * Call To Action Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'call-to-action-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-call-to-action';
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

<section id="<?php echo $block_id ?>" class="min-h-[320px] lg:min-h-[640px] lg:h-[50vh] flex flex-row items-center justify-start bg-transparent relative sm:mb-8 lg:mb-<?php echo get_field( 'bottom_spacing' ); ?>">

    <div class="w-full h-full bg-gradient-to-b lg:bg-gradient-to-r from-brand-dark_gradient to-brand-third angled pt-20 lg:pt-12 pb-12 object-reveal-125">

        <div class="container px-6 lg:px-4 mx-auto h-full flex flex-col lg:flex-row lg:items-center">

            <div class="flex flex-col object-reveal-250 pt-16 xl:pt-8">
                <h2 class="font-title text-2xl lg:text-3xl 2xl:text-4xl text-white mb-4 lg:mb-8 font-light"><?php echo get_field( 'header' ); ?></h2>
                <p class="font-sans text-base font-light lg:text-lg 2xl:text-xl text-white mb-2 lg:mb-4"><?php echo get_field('content'); ?></p>
                <?php $button_link = get_field( 'button' ); ?>            
                <?php if ( $button_link ) : ?>
                    <div class="flex w-full mt-2">
                        <div class="flex flex-row relative">
                            <?php $data_title = formatAnchor($button_link['url']); ?>
                            <a class="theme-button alt menu-anchor" data-title="<?php echo $data_title; ?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>

</section>
