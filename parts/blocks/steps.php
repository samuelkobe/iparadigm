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

<section id="<?php echo $block_id ?>" class="flex flex-row items-center justify-start bg-transparent relative sm:mb-8 lg:mb-<?php echo get_field( 'bottom_spacing' ); ?>">

    <div class="container mx-auto px-6 lg:px-4 w-full bg-white flex flex-col items-center my-12 lg:mt-28 lg:mb-20">

        <div class="w-full lg:w-2/3 2xl:w-1/2 flex flex-col items-center justify-center object-reveal-250">
            <?php $icon = get_field( 'icon' ); ?>
            <?php if ( $icon ) : ?>
                <img class="w-32 mb-8" src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
            <?php endif; ?>

            <h2 class="font-title text-3xl lg:text-5xl 2xl:text-6xl text-brand-black text-center mb-12"><?php the_field( 'header' ); ?></h2>
            <h3 class="text-brand-black text-lg lg:text-2xl 2xl:text-3xl"><?php the_field( 'sub_header' ); ?></h3>
        </div>

        <?php
			if ( get_field( 'steps_format' ) == 1 ) :
                $steps_flex = 'flex-col lg:flex-row';
                $steps_image_width = 'lg:w-5/12';
                $steps_content_width = 'lg:w-1/2';
            else :
                $steps_flex = 'flex-col-reverse lg:flex-col-reverse';
                $steps_image_width = 'lg:w-full lg:px-[10vw]';
                $steps_content_width = 'lg:w-full';
            endif;

            $step_count = 0;
            if ( have_rows( 'steps' ) ) : ?>
            <div class="flex flex-col space-y-4 lg:space-y-6 w-full md:w-5/6 md:mx-1/12 2xl:w-2/3 2xl:mx-1/12 object-reveal-250">
                <?php while ( have_rows( 'steps' ) ) : the_row(); ?>             
                    <div class="border-t-2 border-brand-dark_grey step-item flex flex-col justify-center w-full relative p-4 pt-8 lg:pt-12 mt-8 lg:mt-12 rounded-md after:w-full after:absolute after:inset-0 after:bg-white after:opacity-[8%] after:rounded-md open">
                    <!-- <div class="border-t-2 border-brand-dark_grey step-item flex flex-col justify-center w-full relative p-4 pt-8 lg:pt-12 mt-8 lg:mt-12 rounded-md after:w-full after:absolute after:inset-0 after:bg-white after:opacity-[8%] after:rounded-md <//php if ($step_count == 0) : echo 'open'; else : endif; ?>"> -->
                        <div class="relative w-full h-8 lg:h-20 step-header cursor-pointer z-10 open">
                        <!-- <div class="relative w-full h-20 step-header cursor-pointer z-10 <?//php if ($step_count == 0) : echo 'open'; else : endif; ?>"> -->
                            <h2 class="font-title text-xl lg:text-2xl 2xl:text-4xl leading-6 lg:leading-8 flex items-center align-middle text-brand-black">
                                <div class="inline-flex items-center justify-center relative text-center align-middle w-6 h-6 lg:w-8 lg:h-8 leading-6 lg:leading-8 rounded-full bg-brand-alt text-brand-black text-base lg:text-xl mr-2">
                                    <?php echo $step_count + 1; ?>
                                    <span class="absolute inset-0 border-2 border-brand-black rounded-full z-0"></span>
                                </div>
                                <?php echo get_sub_field( 'subtitle' ); ?>
                            </h2>
                            <div class="step-tag bg-contain bg-no-repeat bg-center absolute top-0 right-0 w-4 lg:w-6 h-4 lg:h-6 transform duration-200"></div>
                        </div>
                        <div class="step-inner-container z-10">

                            <div class="w-full flex <?php echo $steps_flex;?>">
                                <div class="w-full <?php echo $steps_image_width;?> pb-8 lg:pb-0 pt-4">
                                    <?php if ( get_sub_field( 'media_type' ) == 1 ) : ?>

                                        <?php if ( get_sub_field( 'step_animation' ) ) : ?>
                                            <?php $lottie = get_sub_field( 'step_animation' ); ?>
                                            <?php $step_id = 'step_id_' . $step_count; ?>

                                            <lottie-player
                                                id="<?php echo $step_id; ?>"
                                                src="<?php echo $lottie; ?>"
                                                class="min-h-[480px] lg:min-h-[max-content] transition-height duration-200"
                                            >
                                            </lottie-player>
                                        <?php endif; ?>
                                         <?php $frames = get_sub_field( 'animation_frames_count' ); ?>
                                        <script type="module">
                                            LottieInteractivity.create({
                                                player: '#<?php echo $step_id; ?>',
                                                mode: 'scroll',
                                                actions: [
                                                    {
                                                        visibility: [-0.25, 0.35],
                                                        type: 'play',
                                                        frames: [0, <?php echo $frames; ?>],
                                                    }
                                                ]
                                            });
                                        </script>

                                    <?php else : ?>

                                        <?php $step_image = get_sub_field( 'step_image' ); ?>
                                        <?php if ( $step_image ) : ?>
                                            <img class="w-full max-w-full" src="<?php echo esc_url( $step_image['url'] ); ?>" alt="<?php echo esc_attr( $step_image['alt'] ); ?>" />
                                        <?php endif; ?>

                                    <?php endif; ?>
                                </div>

                                <?php if ( get_field( 'steps_format' ) == 1 ) :?>
                                    <div class="w-0 lg:w-1/12"></div>
                                <?php endif;?>

                                <div class="w-full <?php echo $steps_content_width;?>">
                                    <h3 class="w-full font-title font-bold text-base lg:text-lg mb-2"><?php echo get_sub_field( 'header' ); ?></h3>
                                    <p class="w-full text-xs lg:text-sm"><?php echo get_sub_field( 'content' ); ?></p>
                                </div>
                            </div>

                            <?php if ( get_sub_field( 'extra_media_toggle' ) == 1 ) : ?>
                                <div class="w-full h-auto py-6 lg:p-6 relative flex flex-col">

                                    <?php if (get_sub_field( 'extra_media_header') != null ) : ?>
                                        <h4 class="self-end w-fit font-title font-light border-t-[#212121] border-t-[1px] text-[#212121] text-base lg:text-lg mt-6 lg:mt-12"><?php echo get_sub_field( 'extra_media_header' ); ?></h4>
                                    <?php endif; ?>

                                    <?php if ( get_sub_field( 'media_type_toggle' ) == 1 ) : ?>
                                        <?php $extra_step_media_image = get_sub_field( 'extra_step_media_image' ); ?>
                                        <?php if ( $extra_step_media_image ) : ?>
                                            <img class="w-full max-w-full" src="<?php echo esc_url( $extra_step_media_image['url'] ); ?>" alt="<?php echo esc_attr( $extra_step_media_image['alt'] ); ?>" />
                                        <?php endif; ?>
                                    <?php else : ?>

                                        <?php if (get_sub_field( 'extra_media_header') != null ) : ?>
                                            <div class="w-full h-fit border-2 shadow-lg mt-2 lg:mt-4">
                                        <?php else : ?>
                                            <div class="w-full h-fit border-2 shadow-lg mt-6 lg:mt-12">
                                        <?php endif; ?>

                                            <?php
                                                $extra_step_media_video = get_sub_field( 'extra_step_media_video' );
                                                $video = '<video
                                                                class="w-full h-[fit-content] object-cover aspect-video mix-blend-normal"
                                                                preload="metadata"
                                                                muted
                                                                autoplay
                                                                loop
                                                                playsinline
                                                                src="' . $extra_step_media_video . '"
                                                                type="video/mp4">
                                                                Sorry, your browser doesn\'t support embedded videos.
                                                            </video>';
                                            ?>
                                            <?php echo $video;?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php $step_count++;
                endwhile; ?>
            </div>
        <?php endif; ?>

    </div>

</section>