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

<section id="<?php echo $block_id ?>" class="w-full mb-<?php echo get_field( 'bottom_spacing' ); ?>">
    <div class="bg-white relative flex flex-col items-center justify-center pt-16 pb-8 2xl:py-32">

        <div class="container pb-8 xl:pb-0 h-auto xl:min-h-[480px] xl:h-auto flex flex-col xl:flex-row px-6 xl:px-4 xl:space-x-24 xl:items-center">
          
            <div id="<?php echo esc_attr( $id ); ?>" class="w-full <?php echo esc_attr( $classes ); ?>">
              <?php if ( have_rows( 'item' ) ) : ?>
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                  <?php while ( have_rows( 'item' ) ) : the_row(); ?>
                    <?php if ( get_sub_field( 'text_or_image' ) == 1 ) : ?>
                      <div class="from-brand-black to-brand-third_dark bg-gradient-to-tl text-white w-full aspect-square object-contain flex items-center justify-center">
                        <h3 class="text-xl md:text-2xl 2xl:text-3xl font-sans"><?php the_sub_field( 'name' ); ?></h3>
                      </div>
                      <?php else : ?>
                      <div class="bg-red-300 w-full">
                        <?php $image = get_sub_field( 'image' ); ?>
                        <?php if ( $image ) : ?>
                          <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              <?php else : ?>
                <?php // No rows found ?>
              <?php endif; ?>
            </div>
            
        </div>

    </div>
</section>