<div class="flex flex-wrap lg:flex-col lg:container lg:mx-auto items-center w-full h-full">
    <div class="absolute inset-0 bg-black w-full h-full visible lg:invisible pointer-events-none"></div>

    <div class="flex h-full items-center w-56 sm:w-64 lg:w-1/5 ml-4 lg:ml-0 z-20">
        <?php get_template_part('parts/brand') ?>
    </div>

    <button @click="toggle" :class="[menuOpen ? 'shadow-black shadow-inner' : 'shadow-black shadow']" class="pointer-events-auto relative self-center ml-auto bg-transparent mr-4 lg:hidden flex items-center justify-center h-10 w-10 rounded outline-none focus:outline-none z-20">
        <svg xmlns="http://www.w3.org/2000/svg" :class="[!menuOpen ? 'flex' : 'hidden']" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" :class="[menuOpen ? 'flex' : 'hidden']" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <div :class="[menuOpen ? 'translate-y-0 bg-black lg:bg-transparent h-auto border-b-4 border-brand-fourth lg:border-none lg:h-full -z-10 lg:z-20 visible' : 'bg-brand-black lg:bg-transparent -translate-y-[100vh] h-full z-20 invisible lg:visible']" 
    class="flex flex-col lg:flex-row w-full lg:w-4/5 pointer-events-auto transform transition-transform-height duration-300 lg:duration-0 lg:translate-y-0 lg:transition-none lg:justify-end">
        <?php webokstarter_nav(); ?>

        <?php if ( get_field( 'header_button_toggle', 'option' ) == 1 ) : ?>
            <div class="w-full h-auto lg:h-full lg:w-auto flex flex-col lg:flex-row items-center lg:ml-2 lg:mr-4 mb-20 lg:mb-0">
                <?php $header_button = get_field( 'header_button', 'option' ); ?>
                <?php if ( $header_button ) : ?>
                    <div class="flex flex-row relative">
                        <?php $data_title = formatAnchor(($header_button['url'] )); ?>
                        <a class="theme-button alt header menu-anchor" data-title="<?php echo $data_title; ?>" href="<?php echo esc_url( $header_button['url'] ); ?>" target="<?php echo esc_attr( $header_button['target'] ); ?>"><?php echo esc_html( $header_button['title'] ); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    
</div>