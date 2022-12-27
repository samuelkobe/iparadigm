<?php get_header(); ?>

	<main role="main">
		<section class="bg-white">
			<div class="w-full px-6 xl:px-6 lg:container lg:mx-auto py-36 lg:py-48 relative">
				<div class="flex flex-row items-center justify-center h-auto">
					<div class="w-full">
						<div class="flex flex-col lg:flex-row justify-between my-4">
							<h1 class="lg:w-1/2  text-3xl lg:text-5xl font-title text-brand-black"><?php echo sprintf( __( '(%s) Searched: ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
							<div class="lg:w-1/2 order-1 lg:order-2 mb-6 lg:mb-0">
								<?php get_template_part('searchform'); ?>
							</div>
						</div>
						<a class="inline-flex items-center text-brand-fourth text-lg mb-6 lg:mb-12 font-bold" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><span class="text-3xl inline-flex h-full items-center mr-2 pb-1">«</span>All Posts</a>
						<?php get_template_part('loop'); ?>
						<?php get_template_part('pagination'); ?>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>