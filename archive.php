<?php get_header(); ?>

	<main role="main">
		<section class="bg-white">
			<div class="w-full px-6 xl:px-6 lg:container lg:mx-auto py-36 lg:py-48 relative">
				<div class="flex flex-row items-center justify-center h-auto">
					<div class="w-full xl:px-1/12">
						<?php $page_object = get_queried_object(); ?>
						<div class="flex flex-col mb-6 lg:mb-16">
							<h1 class="text-4xl lg:text-6xl font-title font-bold text-brand-black"><?php _e( 'Latest Posts', 'html5blank' ); ?>: <?php echo $page_object->cat_name; ?></h1>
						</div>

						<a class="inline-flex items-center text-brand-fourth text-lg font-bold" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><span class="text-3xl inline-flex h-full items-center mr-2 pb-1">«</span>All Posts</a>

						<div class="mt-6 lg:mt-12">
							<?php get_template_part('loop'); ?>
							<?php get_template_part('pagination'); ?>
						</div>

					</div>
				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>