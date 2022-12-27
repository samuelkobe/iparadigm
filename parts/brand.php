<?php $brand_image = get_field( 'brand_image', 'option' ); ?>
<?php if ($brand_image != null) : ?>
    <a href="/">
        <?php if ( $brand_image ) : ?>
            <img class="w-[72px] h-auto relative aspect-square ml-6" src="<?php echo esc_url( $brand_image['url'] ); ?>" alt="<?php echo esc_attr( $brand_image['alt'] ); ?>" />
        <?php endif; ?>
    </a>
<?php else : ?>
    <div class="flex flex-col w-full h-full items-start justify-center text-sm text-white">
        <p class="h-auto lg:h-1/4"><?php bloginfo('title');?></p>
        <p class="hidden lg:h-auto lg:flex text-xs"><?php bloginfo('description');?></p>
    </div>
<?php endif; ?>