<?php
/**
 * Block template file: parts/blocks/team.php
 *
 * Team Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'team-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-team';
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

<section id="<?php echo $block_id ?>" class="w-full md:mt-16 mb-<?php echo get_field( 'bottom_spacing' ); ?>">

    <div class="md:container px-6 mx-auto py-16 xl:py-24 xl:pt-8">
        <div class="w-full lg:px-1/12 xl:px-1/6 flex flex-col md:items-center md:justify-center md:text-center">
            <h2 class="font-title font-bold text-3xl xl:text-5xl 2xl:text-6xl text-brand-black mb-2"><?php the_field( 'team_title' ); ?></h2>
            <p class="font-sans text-base xl:text-lg xl:leading-8 mt-2 xl:mt-6"><?php the_field( 'team_content' ); ?></p>
        </div>
    </div>

	<?php if ( have_rows( 'team' ) ) : ?>
		<?php while ( have_rows( 'team' ) ) : the_row(); ?>

        <div class="md:container mx-auto pt-0 pb-12 xl:pb-24 lg:px-1/12 object-reveal-250">
            <div class="flex flex-col border-2 border-brand-dark_grey md:rounded-xl md:shadow-xl relative pb-6 md:pb-0">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="max-w-full w-full min-h-full lg:w-1/2">
                        <?php $image = get_sub_field( 'image' ); ?>
                        <?php if ( $image ) : ?>
                            <img class="min-h-full w-full aspect-square object-cover md:rounded-tl-lg" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="w-full shrink mt-6 md:mt-0 flex flex-col px-6 md:px-0 md:pl-12 h-full">
                        <h3 class="font-sans text-base xl:text-lg text-brand-fourth_dark mb-1"><?php the_sub_field( 'title' ); ?></h3>
                        <h2 class="font-title font-bold text-2xl xl:text-[28px] xl:leading-[32px] 2xl:text-[32px] 2xl:leading-[36px] text-brand-black mb-2"><?php the_sub_field( 'name' ); ?></h2>
                        <p class="pr-4"><?php the_sub_field( 'info' ); ?></p>
                    </div>
                </div>
                <div class="flex flex-col px-6 pb-6">
                    <?php if ( have_rows( 'more_info' ) ) : ?>
                        <div>
                            <?php while ( have_rows( 'more_info' ) ) : the_row(); ?>
                                <p class="pt-8"><?php the_sub_field( 'paragraph' ); ?></p>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <?php // No rows found ?>
                    <?php endif; ?>
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

    <div class="md:container px-6 mx-auto py-2 lg:py-16 lg:pt-32 object-reveal-250">
        <div class="w-full lg:px-1/12 xl:px-1/6 flex flex-col md:items-center md:justify-center md:text-center">

            <h2 class="font-title font-bold text-xl xl:text-3xl 2xl:text-4xl text-brand-black mb-2"><?php the_field( 'call_to_action_title' ); ?></h2>

            <div class="flex items-center lg:justify-center w-full mt-2 lg:mt-8">
                <?php $call_to_action_link = get_field( 'call_to_action_link' ); ?>            
                <?php if ( $call_to_action_link ) : ?>
                    <div class="flex flex-row relative">
                        <?php $data_title = formatAnchor($call_to_action_link['url']); ?>
                        <a class="theme-button main menu-anchor" data-title="<?php echo $data_title; ?>" href="<?php echo esc_url( $call_to_action_link['url'] ); ?>" target="<?php echo esc_attr( $call_to_action_link['target'] ); ?>"><?php echo esc_html( $call_to_action_link['title'] ); ?></a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

</section>