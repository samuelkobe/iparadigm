
			<!-- footer -->
			<footer class="footer bg-brand-black text-white" role="contentinfo">

				<div class="contained">

					<div class="w-full flex flex-col md:flex-row md:justify-between md:flex-wrap py-2 md:py-4">

						<?php // footer image part ?>
						<?php get_template_part('parts/footer/image') ?>

						<?php get_template_part('parts/footer/copyright') ?>

						<?php // Footer Social Media part ?>
						<?php if ( get_field( 'social_media_toggle', 'option' ) == 1 ) : ?>
							<?php get_template_part('parts/footer/social') ?>
						<?php else : ?>
								<?php // Social Media turned off ?>
						<?php endif; ?>

					</div>

				</div>

				<?php // footer copyright bottom part ?>
				<?php get_template_part('parts/footer/developer') ?>
					
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

	</body>
</html>


