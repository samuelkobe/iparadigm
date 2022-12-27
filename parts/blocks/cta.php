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

<section id="<?php echo $block_id ?>" class="min-h-[320px] lg:min-h-[640px] lg:h-[50vh] flex flex-row items-center justify-start bg-transparent relative mb-<?php echo get_field( 'bottom_spacing' ); ?>">

    <div class="w-full h-full bg-gradient-to-b lg:bg-gradient-to-tr from-brand-third to-[#1C5D86] angled pt-20 lg:pt-12 pb-12">

        <div class="container px-6 lg:px-4 mx-auto h-full flex flex-col lg:flex-row lg:items-center">

            <div class="w-full h-full flex flex-col justify-center">
                <div class="flex flex-col lg:flex-row w-2/3 xl:w-1/2">
                    <?php $icon = get_field( 'icon' ); ?>
                    <?php if ( $icon ) : ?>
                        <img class="w-24 lg:w-40 aspect-square mb-4 lg:mb-0 lg:mr-8" src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                    <?php endif; ?>

                    <h2 class="text-white mb-3 font-title font-normal text-3xl lg:text-5xl 2xl:text-6xl lg:mt-8 2xl:mt-4"><?php the_field( 'header' ); ?></h2>
                </div>

                <div class="flex flex-col mt-5 lg:mt-10 lg:flex-row">
                    <div class="w-full lg:w-3/4">
                        <p class="text-base lg:text-2xl font-sans"><?php the_field( 'content' ); ?></p>
                    </div>
                    <div class="flex items-end lg:justify-end w-full lg:w-1/4 mt-8 lg:mt-0">
                        <?php $button_link = get_field( 'button' ); ?>            
                        <?php if ( $button_link ) : ?>
                            <div class="flex flex-row relative">
                                <?php $data_title = formatAnchor($button_link['url']); ?>
                                <a class="theme-button alt menu-anchor" data-title="<?php echo $data_title; ?>" href="<?php echo esc_url( $button_link['url'] ); ?>" target="<?php echo esc_attr( $button_link['target'] ); ?>"><?php echo esc_html( $button_link['title'] ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>


        </div>

    </div>

</section>