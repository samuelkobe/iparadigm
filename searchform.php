<!-- search -->
<form class="flex" method="get" action="<?php echo home_url(); ?>" role="search">
	<input id="searchForm" class="grow text-base xl:text-lg h-10 lg:h-12 p-4 pb-2 pt-3 text-brand-black rounded-full placeholder-brand-light_grey focus:outline-none outline-none focus:text-brand-black border-2 border-brand-light_grey focus:border-brand-fourth transition-colors duration-200" value="<?php the_search_query(); ?>" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.', 'weboksolutions' ); ?>">
	<button class="ml-4 lg:ml-8 w-fit justify-center pt-2 lg:pt-3 xl:pb-1 px-6 xl:px-8 rounded-full no-underline shadow-2xl inline-flex text-white font-sans font-semibold text-xl xl:text-2xl transition-colors duration-300 cursor-pointer bg-brand-fourth hover:bg-brand-fourth_dark" type="submit" role="button"><?php _e( 'Search', 'weboksolutions' ); ?></button>
</form>
<!-- /search -->