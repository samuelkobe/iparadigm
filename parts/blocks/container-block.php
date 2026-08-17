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

<section id="<?php echo $block_id ?>" class="min-h-[320px] lg:min-h-[640px] lg:h-auto flex flex-row items-center justify-start bg-transparent relative sm:mb-8 lg:mb-<?php echo get_field( 'bottom_spacing' ); ?>">

    <div class="w-full h-full container mx-auto bg-brand-dark_grey object-reveal-125 lg:my-12">

        <div class="min-h-full grid grid-cols-1 lg:grid-cols-2">

            <div class="col-span-1 mb-6 lg:mb-0 object-reveal-125">
                <?php $container_image = get_field( 'container_image' ); ?>
                <?php if ( $container_image ) : ?>
                    <img class="max-w-full w-full h-full object-cover" src="<?php echo esc_url( $container_image['url'] ); ?>" alt="<?php echo esc_attr( $container_image['alt'] ); ?>" />
                <?php endif ?>
            </div>

            <div class="col-span-1">
                <div class="flex w-full flex-col object-reveal-250 px-6 lg:px-12 py-4 lg:py-8 xl:py-16">
                    <h2 class="font-title text-2xl lg:text-3xl 2xl:text-4xl text-brand-black mb-4 lg:mb-8 font-light"><?php echo get_field( 'header' ); ?></h2>
                    <p class="font-sans text-base font-light lg:text-lg 2xl:text-xl text-brand-black mb-4"><?php echo get_field('content'); ?></p>
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

    </div>

</section>
