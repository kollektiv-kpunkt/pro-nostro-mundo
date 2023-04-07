<div style="height: 250px" aria-hidden="true" class="wp-block-spacer"></div>

<footer id="pnm-footer" class="text-white bg-pnm-accent">
    <div class="pnm-footer-widget-container pnm-container alignwide pt-12 pb-16">
        <?php dynamic_sidebar("footer_widget"); ?>
    </div>
    <div class="pnm-footer-bottombar-container pnm-container alignfull pb-4">
        <div class="pnm-footer-bottombar-menu flex justify-between flex-wrap sm:items-end gap-x-12 md:gap-x-16 lg:gap-x-20 gap-y-6">
            <a class="h-16" href="/">
                <?php
                    get_template_part( "template-parts/elements/logo-" . pll_current_language() );
                ?>
            </a>
            <div class="pnm-footer-menu-items flex flex-col sm:flex-row gap-x-4 gap-y-1 text-xs">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer_menu',
                    'container' => false,
                    'menu_class' => 'flex flex-col sm:flex-row gap-x-4 gap-y-2 underline',
                    'menu_id' => 'footer-menu',
                    'depth' => 1,
                ) );
                ?>
                <a href="https://kpunkt.ch" target="_blank">Built with 💕 by <b class="font-black text-pnm-secondary">K.</b></a>
            </div>
        </div>
    </div>
</footer>