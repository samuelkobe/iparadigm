<div class="flex flex-row justify-center w-full md:w-1/4 lg:w-1/8 py-3 md:pb-0 order-1 md:order-2">
    <?php if ( have_rows( 'social_media', 'option' ) ) : ?>

        <div class="flex flex-row w-2/3 sm:w-1/2 md:w-full h-full items-center justify-center md:justify-end space-x-4">
            <?php while ( have_rows( 'social_media', 'option' ) ) : the_row(); ?>

            <?php if ( get_row_layout() == 'social_media' ) : ?>
                <?php if ( have_rows( 'info' ) ) : ?>
                    <?php while ( have_rows( 'info' ) ) : the_row(); ?>
                        <?php
                            $social_title = get_sub_field( 'title' );
                            $social_url = get_sub_field( 'url' );
                        ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php $social_icon = get_sub_field( 'icon' ); ?>
                <?php $social_icon_fill = get_sub_field( 'icon_fill' ); ?>
            <?php endif; ?>

            <a class="flex flex-row items-center transition-colors duration-300 fill-<?php echo $social_icon_fill; ?> hover:text-brand-fourth hover:fill-brand-fourth" href="<?php echo $social_url; ?>" target="_blank" rel="noreferrer" title="<?php echo $social_title; ?>">
                <div class="fill-inherit"><?php echo $social_icon; ?></div>
            </a>

            <?php endwhile; ?>
        </div>

    <?php else : ?>
        <?php // no rows found ?>
    <?php endif; ?>
</div>

