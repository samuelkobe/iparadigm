<?php get_header(); ?>

	<main role="main">

		<section class="h-[90.5vh]">
				<div class="flex flex-col items-center justify-center w-full h-full">
					<h1 class="text-2xl sm:text-5xl xl:text-7xl xl:leading-snug my-4 font-title font-semibold text-white text-center"><?php _e( 'Page not found', 'web-ok-starter' ); ?></h1>
					<a class="text-lg sm:text-2xl xl:text-4xl underline text-brand-third hover:text-brand-fourth duration-200 transition-colors font-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Return home', 'web-ok-starter' ); ?></a>	
				</div>
		</section>


	</main>


<?php get_footer(); ?>
