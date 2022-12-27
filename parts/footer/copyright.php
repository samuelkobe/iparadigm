<div class="w-full md:w-1/2 lg:w-3/4 order-2 md:order-1 py-3 md:pb-0">

    <?php if ( have_rows( 'footer_content', 'option' ) ) : ?>
        <?php while ( have_rows( 'footer_content', 'option' ) ) : the_row(); ?>
            <?php $footer_link = get_sub_field( 'footer_link' ); ?>

            <p class="h-full flex flex-row justify-center items-center text-sm sm:text-base">
                &copy; <?php echo date('Y'); ?> <?php the_sub_field( 'footer_text' ); ?>&nbsp;
                <?php if ( $footer_link ) : ?>
                    <a class="transition-colors duration-300 text-white hover:text-brand-light_grey underline" href="<?php echo esc_url( $footer_link['url'] ); ?>" target="<?php echo esc_attr( $footer_link['target'] ); ?>"><?php echo esc_html( $footer_link['title'] ); ?></a>
                <?php endif; ?>
            </p>
        <?php endwhile; ?>
    <?php endif; ?>

</div>

