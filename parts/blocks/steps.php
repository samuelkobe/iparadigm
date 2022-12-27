<?php
/**
 * Block template file: parts/blocks/steps.php
 *
 * Steps Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'steps-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-steps';
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

<section id="<?php echo $block_id ?>" class="flex flex-row items-center justify-start bg-transparent relative mb-<?php echo get_field( 'bottom_spacing' ); ?>">

    <div class="container mx-auto px-6 lg:px-4 w-full bg-white flex justify-center my-12 lg:my-28">

        <div class="w-full lg:w-2/3 2xl:w-1/2 flex flex-col items-center justify-center">
            <?php $icon = get_field( 'icon' ); ?>
            <?php if ( $icon ) : ?>
                <img class="w-32 mb-8" src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
            <?php endif; ?>
            <h2 class="font-title text-6xl text-brand-black text-center mb-12"><?php the_field( 'header' ); ?></h2>
            <h3 class="text-brand-black text-3xl"><?php the_field( 'sub_header' ); ?></h3>
        </div>

    </div>

</section>