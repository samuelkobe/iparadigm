<?php
/**
 * Block template file: parts/blocks/advisors.php
 *
 * Advisor Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'advisor-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-advisor';
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

<section id="<?php echo $block_id ?>" class="w-full sm:mt-16 mb-<?php echo get_field( 'bottom_spacing' ); ?>">


	<?php if ( have_rows( 'advisors' ) ) : ?>
		<?php while ( have_rows( 'advisors' ) ) : the_row(); ?>

        <div class="container mx-auto pt-0 pb-12 lg:px-1/12 object-reveal-250">
            <div class="flex flex-col sm:flex-row items-center sm:rounded-xl sm:shadow-lg relative pb-6 sm:pb-0">
                <div class="max-w-full w-full min-h-full lg:w-1/4">
                    <?php $image = get_sub_field( 'image' ); ?>
                    <?php if ( $image ) : ?>
                        <img class="min-h-full aspect-square object-cover sm:rounded-tl-xl sm:rounded-bl-xl" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                    <?php endif; ?>
                </div>
                <div class="w-full shrink mt-6 sm:mt-0 flex flex-col px-6 sm:px-0 sm:pl-12 h-full">
                    <h2 class="font-title text-2xl xl:text-[28px] xl:leading-[32px] 2xl:text-[32px] 2xl:leading-[36px] text-brand-black mb-2"><?php the_sub_field( 'name' ); ?></h2>
                    <p class="pr-4"><?php the_sub_field( 'info' ); ?></p>
                    <?php if ( get_sub_field( 'link_toggle' ) == 1 ) : ?>
                        <?php $link = get_sub_field( 'link' ); ?>
                        <?php if ( $link ) : ?>
                            <a class="font-button text-brand-third underline capitalize mt-2" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

		<?php endwhile; ?>
	<?php else : ?>
		<?php // No rows found ?>
	<?php endif; ?>

</section>