<nav class="pnm-navbar">
    <div class="pnm-navbar-inner pnm-container alignfull py-5 justify-between hidden md:flex">
        <div class="pnm-navbar-links flex gap-x-8 lg:gap-x-16 mt-auto">
            <a class="w-12 lg:w-28" href="/">
                <?php
                    get_template_part( "template-parts/elements/logo-" . pll_current_language() );
                ?>
            </a>
            <div class="pnm-navbar-main-menu flex gap-x-6 mt-auto">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary_menu',
                    'container' => false,
                    'items_wrap' => '%3$s',
                    "depth" => 2,
                ) );
                ?>
            </div>
        </div>
        <div class="pnm-navbar-more flex gap-x-6 h-fit mt-auto items-center">
                <div class="pnm-navbar-langs flex gap-x-2 uppercase items-center">
                    <i class="icofont-globe h-fit flex"></i>
                    <span><?= pll_current_language() ?></span>
                </div>
                <div class="pnm-navbar-more-divider h-8 border-l-2 border-l-pnm-accent-40 hidden lg:flex"></div>
                <div class="pnm-navbar-some-icons gap-2 text-pnm-accent hidden lg:flex">
                    <?php
                        $some_items = get_nav_menu_items_by_location("some_menu");
                        foreach($some_items as $item) {
                            echo "<a href='" . $item->url . "' class='pnm-navbar-more-link flex'><i class='leading-none icofont-" . $item->title . "'></i></a>";
                        }
                    ?>
                </div>
        </div>
    </div>
    <div class="pnm-navbar-inner-mob pnm-container alignfull py-3 justify-between md:hidden flex items-center">
        <a class="w-20" href="/">
            <?php
                get_template_part( "template-parts/elements/logo-" . pll_current_language() );
            ?>
        </a>
        <div class="pnm-mobile-menu flex items-center gap-x-2">
            <div class="pnm-fries-menu flex flex-col">
                <div class="pnm-fries-menu-line"></div>
                <div class="pnm-fries-menu-line"></div>
                <div class="pnm-fries-menu-line"></div>
            </div>
        </div>
    </div>
</nav>