<?php get_header(); ?>

	<main role="main">

		<section class="bg-slate-100">
			<div class="w-full px-6 xl:px-6 lg:container lg:mx-auto py-36 lg:py-48 relative">
				<div class="flex flex-row items-center justify-center h-auto">
					<div class="w-full xl:px-1/12">
						<div class="flex flex-col mb-6 lg:mb-16">
							<h1 class="text-4xl lg:text-6xl font-title font-bold text-brand-black">Cybersecurity Articles</h1>
							<p class="text-lg lg:text-xl mt-2 lg:mt-4">Stay up-to-date with recent changes to the cybersecurity landscape.</p>
						</div>
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