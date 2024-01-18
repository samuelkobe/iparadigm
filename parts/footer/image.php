<div class="flex flex-row justify-start w-full md:w-1/8 order-0 mb-4 md:mb-0">
    <div class="w-full h-full lg:h-auto flex justify-center lg:justify-start items-center py-6 md:py-0">
        <?php $footer_image = get_field( 'footer_image', 'option' ); ?>
        <?php if ( $footer_image ) : ?>
            <img class="max-w-full w-48 md:w-96 h-auto relative" src="<?php echo esc_url( $footer_image['url'] ); ?>" alt="<?php echo esc_attr( $footer_image['alt'] ); ?>" />
        <?php endif; ?>
    </div>
</div>