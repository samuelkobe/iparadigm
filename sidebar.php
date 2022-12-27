<!-- sidebar -->
<aside class="sidebar flex flex-row lg:flex-col justify-start space-x-10 lg:space-x-0" role="complementary">

	<div class="mb-6">
		<h4 class="font-title text-xl lg:text-2xl block text-brand-fourth">Latest:</h4>
		<div class="sidebar-widget">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
		</div>
	</div>

	<div class="mb-6">
		<h4 class="font-title text-xl lg:text-2xl block text-brand-fourth">Archive:</h4>
		<div class="sidebar-widget">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
		</div>
	</div>

</aside>
<!-- /sidebar -->
