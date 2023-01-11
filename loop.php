	<?php if (have_posts()): ?>

		<div class="grid grid-cols-1 gap-y-12 md:grid-cols-2 md:gap-8 xl:grid-cols-3 xl:gap-10">	

			<?php $i = 1; while (have_posts()) : the_post();
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

				if ( get_field( 'article_type' ) == 1 ) {
					$article_url = get_field( 'external_article_url' );
					$url_target = '_blank';
				} else {
					$article_url = get_permalink();
					$url_target = '_self';
				}

				if( $i == 1 && $paged == 1) { ?>

					<div class="flex flex-col lg:flex-row lg:flex-wrap w-full lg:items-center col-span-1 md:col-span-2 xl:col-span-3 object-reveal-250">
						<div class="flex flex-col lg:flex-row lg:items-center h-full w-full relative overflow-hidden rounded-lg bg-white shadow-xl">

							<div class="flex relative w-full lg:w-1/3 h-40 md:h-48 lg:h-full">
								<?php if ( has_post_thumbnail()) : ?>
									<?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover max-w-full')); ?>
								<?php endif; ?>
							</div>

							<div class="flex flex-col w-full lg:w-2/3 p-6 lg:p-8">
								<p class="text-brand-fourth text-base lg:text-lg font-sans"><?php the_time('F j, Y'); ?></p>

								<a class="my-2 lg:mb-3 lg:mt-4" href="<?php echo $article_url; ?>" target="<?php echo $url_target;?>" title="<?php the_title(); ?>">
									<h2 class="text-3xl lg:text-5xl font-title font-bold text-brand-black"><?php the_title(); ?></h2>
								</a>

								<p class="text-brand-darkest_grey text-base lg:text-lg"><?php the_field( 'article_preview_text' ); ?></p>
								<a class="w-full inline-block font-sans uppercase text-xs lg:text-sm text-brand-fourth hover:text-brand-fourth_dark transition-colors duration-200 tracking-wide mt-2 lg:mt-3" href="<?php echo $article_url; ?>" target="<?php echo $url_target;?>" title="<?php the_title(); ?>">Read more</a>
								
								<div class="flex flex-row items-center mt-4 lg:mt-8">
									<?php
										$get_author_id = get_the_author_meta('ID');
										$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));
									?>

									<?php echo '<img src="'.$get_author_gravatar.'" class="rounded-full aspect-square w-10 object-cover" alt="'.get_the_author().'" />';?>
									<p class="text-sm lg:text-base font-sans font-bold text-brand-darkest_grey ml-2 mt-1"><?php the_author(); ?></p>
								</div>
							</div>	
					
						</div>
					</div>

				<?php } else { ?>

					<div class="flex flex-col h-auto w-full relative overflow-hidden rounded-lg bg-white shadow-xl object-reveal-250">

						<div class="relative w-full h-40">
							<?php if ( has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover max-w-full')); ?>
							<?php endif; ?>
						</div>

						<div class="flex flex-col justify-between w-full h-full p-6 lg:p-8">

							<div class="flex flex-col">
								<p class="text-brand-third text-base lg:text-lg font-sans"><?php the_time('F j, Y'); ?></p>
								<a class="my-2 lg:mb-3 lg:mt-4" href="<?php echo $article_url; ?>" target="<?php echo $url_target;?>" title="<?php the_title(); ?>">
									<h2 class="text-3xl lg:text-4xl font-title font-bold text-brand-black"><?php the_title(); ?></h2>
								</a>
								<p class="text-brand-darkest_grey text-base"><?php the_field( 'article_preview_text' ); ?></p>
								<a class="w-full inline-block font-sans uppercase text-xs lg:text-sm text-brand-third hover:text-brand-third_dark transition-colors duration-200 tracking-wide mt-2 lg:mt-3" href="<?php echo $article_url; ?>" target="<?php echo $url_target;?>" title="<?php the_title(); ?>">Read more</a>
							</div>
							
							<div class="flex flex-row items-center mt-4 lg:mt-8">
								<?php
									$get_author_id = get_the_author_meta('ID');
									$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));
								?>

								<?php echo '<img src="'.$get_author_gravatar.'" class="rounded-full aspect-square w-10 object-cover" alt="'.get_the_author().'" />';?>
								<p class="text-sm lg:text-base font-sans font-bold text-brand-darkest_grey ml-2 mt-1"><?php the_author(); ?></p>
							</div>
						</div>	
				
					</div>
							
				<?php } ?>
				
			<?php $i++; endwhile; ?>

		</div>

	<?php else: ?>
		<h2 class="leading-normal text-base lg:text-xl w-full md:w-5/6 lg:w-3/4 xl:w-2/3">Oops, either you searched for something that doesn't exist or left the search field empty. Try searching again or go back to <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="border-b-2 border-brand-third hover:text-brand-third transition-colors duration-200" title="All Posts">All Posts</a> or navigate to the <a class="border-b-2 border-brand-third hover:text-brand-third transition-colors duration-200" rel="Back home" title="Home" href="<?php echo esc_url( home_url() ); ?>">Home</a> page.</h2>
	<?php endif; wp_reset_query(); ?>
