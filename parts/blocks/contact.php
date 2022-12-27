<?php
/**
 * Block template file: parts/blocks/contact.php
 *
 * Contact Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-contact';
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

<section id="<?php echo $block_id ?>" class="w-full bg-brand-dark_grey md:mt-16 mb-<?php echo get_field( 'bottom_spacing' ); ?>">

    <div class="container mx-auto py-16 lg:py-32">
        <div class="w-full flex flex-col lg:flex-row">

            <div class="w-full lg:w-1/3 flex flex-col items-center justify-center mb-16 lg:mb-0">
                <div class="w-1/4 lg:w-1/2 mb-4">
                    <?php $contact_icon = get_field( 'contact_icon' ); ?>
                    <?php if ( $contact_icon ) : ?>
                        <img class="max-w-full"  src="<?php echo esc_url( $contact_icon['url'] ); ?>" alt="<?php echo esc_attr( $contact_icon['alt'] ); ?>" />
                    <?php endif; ?>
                </div>

                <p class="font-sans text-lg lg:text-3xl"><?php the_field( 'name' ); ?></p>
                <p class="font-mono text-base lg:text-xl"><?php the_field( 'title' ); ?></p>
            </div>

            <div class="w-full lg:w-2/3 flex flex-col">
                
                <div class="w-full flex items-center">
                    <div class="w-full xl:w-1/2 flex flex-col items-center justify-center lg:justify-start lg:flex-row">
                        
                        <div class="w-16 lg:w-24 mb-2 lg:mb-0">
                            <?php $form_icon = get_field( 'form_icon' ); ?>
                            <?php if ( $form_icon ) : ?>
                                <img class="max-w-full" src="<?php echo esc_url( $form_icon['url'] ); ?>" alt="<?php echo esc_attr( $form_icon['alt'] ); ?>" />
                            <?php endif; ?>
                        </div>
                        
                        <h3 class="font-title font-bold text-xl xl:text-3xl 2xl:text-4xl text-brand-black mb-2 lg:pl-8"><?php the_field( 'form_content' ); ?></h3>
                    </div>
                </div>

                <div class="w-full px-6">
                    <?php the_field( 'contact_form_embed' ); ?>
                </div>
            </div>
            
        </div>
    </div>

</section>