<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="bg-white pt-36 lg:pt-48 pb-24">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php
					$get_author_id = get_the_author_meta('ID');
					$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));
					$get_author_description = get_the_author_meta( 'user_description', $post->post_author );
				?>

				<div class="px-6 lg:px-0 lg:container lg:mx-auto w-full flex flex-col xl:px-1/12">
					
					<?php // DATE, TITLE, AUTHOR SECTION ?>
					<div class="w-full flex flex-col lg:items-center">
						<p class="text-sm lg:text-base text-gray-500 font-sans font-semibold w-fit justify-center py-1 px-3 rounded-full bg-gray-200">Posted on <?php the_time('F j, Y'); ?></p>

						<h1 class="text-4xl lg:text-6xl 2xl:text-7xl text-brand-black font-title font-bold mt-4 lg:mt-8"><?php the_title(); ?></h1>

						<div class="flex flex-row items-center mt-2 lg:mt-1">
							<?php echo '<img src="'.$get_author_gravatar.'" class="rounded-full aspect-square w-8 lg:w-12 object-cover border-2 border-brand-black" alt="'.get_the_author().'" />';?>
							<p class="text-sm lg:text-base font-sans font-bold text-brand-darkest_grey ml-2 mt-1"><?php the_author(); ?></p>
						</div>
					</div>

					<?php // IMAGE SECTION ?>
					<div class="flex relative w-full mt-6 lg:mt-10 overflow-hidden h-auto lg:h-[30vh] min-h-[280px] md:min-h-[320px] xl:min-h-[360px] rounded-lg">
						<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
								<?php the_post_thumbnail('full', array('class' => 'absolute inset-0 w-full h-full object-cover mix-blend-normal theme-override')); // Fullsize image for the single post ?>
						<?php endif; ?>
					</div>


					<div class="my-6 lg:my-16 blog">
						<?php the_content(); // Dynamic Content ?>
					</div>

					<div class="pt-4 lg:pt-8 border-t-2 flex flex-col items-center lg:items-start lg:flex-row lg:gap-x-16">
						<div class="w-full lg:w-1/5 flex flex-row justify-center lg:justify-start items-center mt-1 mb-6 lg:mb-0">
							<?php echo '<img src="'.$get_author_gravatar.'" class="rounded-full aspect-square w-16 h-16 object-cover border-2 border-brand-black" alt="'.get_the_author().'" />';?>
							<p class="text-base lg:text-lg font-sans font-bold text-brand-darkest_grey ml-2 mt-1"><?php the_author(); ?></p>
						</div>
						<div class="w-full lg:w-4/5">
							<p class="text-base lg:text-lg text-brand-dark_grey"><?php echo $get_author_description; ?></p>
						</div>
					</div>

					<?php // EDIT SECTION ?>
					<?php if(current_user_can('editor') || current_user_can('administrator')) : ?>
						<div class="text-brand-third font-title text-lg lg:text-xl mt-8 lg:mt-16">
							<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
						</div>
					<?php endif; ?>

				</div>


				</article>
				<!-- /article -->

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'web-ok-starter' ); ?></h1>

				</article>
				<!-- /article -->

			<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
