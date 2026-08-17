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

<section id="<?php echo $block_id ?>" class="w-full pt-<?php echo get_field( 'top_spacing' ); ?> pb-<?php echo get_field( 'bottom_spacing' ); ?>">
    <div class="bg-white relative flex flex-col items-center justify-center pt-12 pb-8 2xl:py-16">

        <div class="container pb-8 xl:pb-0 h-auto xl:min-h-[480px] xl:h-auto flex flex-col xl:flex-row px-6 xl:px-4 xl:space-x-24 xl:items-center">

            <?php if ( get_field( 'columns_toggle' ) == 1 ) : ?>
                
            <div class="flex flex-col xl:flex-row w-full object-reveal-250">
                <div>
                    <h2 class="font-title text-2xl lg:text-3xl 2xl:text-4xl text-brand-black mb-4 lg:mb-8 font-light"><?php echo get_field( 'column_header_1' ); ?></h2>
                    <span class="font-sans text-base font-thin lg:text-lg 2xl:text-xl text-brand-black mb-2 lg:mb-4 lg:w-5/6"><?php echo get_field( 'column_content_1'); ?></span>
                </div>
            </div>

            <?php else : ?>

            <div class="flex flex-col xl:flex-row w-full xl:w-7/12 object-reveal-250">
                <div>
                    <h2 class="font-title text-2xl lg:text-3xl 2xl:text-4xl text-brand-black mb-4 lg:mb-8 font-light"><?php echo get_field( 'column_header_1' ); ?></h2>
                    <span class="font-sans text-base font-thin lg:text-lg 2xl:text-xl text-brand-black mb-2 lg:mb-4 lg:w-5/6"><?php echo get_field( 'column_content_1'); ?></span>
                </div>
            </div>

            <div class="flex flex-col xl:flex-row w-full xl:w-5/12 object-reveal-500">
                <div class="max-w-full w-full flex xl:w-auto object-contain mt-8 xl:mt-0">
                    <?php $image = get_field( 'image' ); ?>
                    <?php if ( $image ) : ?>
                        <img class="object-contain aspect-video w-5/6 sm:w-2/3 md:w-1/2 xl:w-full" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                    <?php endif; ?>
                </div>
            </div>

            <?php endif; ?>
            
        </div>

    </div>
</section>