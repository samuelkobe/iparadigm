<?php
/**
 * Block template file: parts/blocks/faqs.php
 *
 * Faqs Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'faqs-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-faqs';
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
    <div class="container mx-auto flex flex-col items-center px-6 lg:px-0 py-8 lg:py-16 2xl:py-32">
        
        <div class="w-full md:w-5/6 md:mx-1/12 2xl:w-2/3 2xl:mx-1/6 mb-6 xl:mb-12">
            <h3 class="font-title font-semibold text-white text-3xl lg:text-4xl text-center w-full"><?php the_field( 'faq_group_title' ); ?></h3>
        </div>
        
        <?php
        $faq_count = 0;
        if ( have_rows( 'faqs' ) ) : ?>
        <div class="flex flex-col space-y-4 lg:space-y-6 w-full md:w-5/6 md:mx-1/12 2xl:w-2/3 2xl:mx-1/6">
            <?php while ( have_rows( 'faqs' ) ) : the_row(); ?>             
                <div class="faq-item flex flex-col justify-center w-full relative p-4 pt-5 cursor-pointer rounded-md after:w-full after:absolute after:inset-0 after:bg-white after:opacity-[8%] after:rounded-md <?php if ($faq_count == 0) : echo 'open'; else : endif; ?>">
                    <h4 class="w-5/6 sm:w-11/12 text-xl font-title font-normal text-white relative leading-none h-4"><?php the_sub_field( 'question' ); ?></h4>
                    <p class="w-11/12 text-white text-base font-sans lg:leading-tight font-light"><?php the_sub_field( 'answer' ); ?></p>
                    <div class="bg-contain bg-no-repeat bg-center absolute z-10 top-4 right-4 w-4 h-4 transform duration-200"></div>
                </div>
            <?php $faq_count++;
            endwhile; ?>
        </div>
    <?php endif; ?>

    </div>
</section>