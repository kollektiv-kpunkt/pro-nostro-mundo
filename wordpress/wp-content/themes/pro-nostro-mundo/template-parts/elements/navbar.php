<?php
$args = wp_parse_args($args, array(
    "bg_color" => "bg-white",
    "bg_opacity" => "bg-opacity-90",
    "nav_classes" => ""
));
?>
<nav class="pnm-navbar fixed w-full top-0 z-40 <?= $args["bg_color"] ?> <?= $args["bg_opacity"] ?><?= ($args["nav_classes"] != "") ? " {$args["nav_classes"]}" : "" ?>">
    <div class="pnm-navbar-inner pnm-container alignfull py-5 justify-between hidden md:flex">
        <div class="pnm-navbar-links flex gap-x-8 lg:gap-x-16 mt-auto">
            <a class="pnm-logo-container h-12 lg:h-16" href="/">
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
                <div class="pnm-navbar-langs uppercase relative">
                    <div class="pnm-langs-current flex gap-x-2 items-center cursor-pointer">
                        <i class="icofont-globe h-fit flex"></i>
                        <span><?= pll_current_language() ?></span>
                    </div>
                    <div class="pnm-langs-switcher">
                        <?php
                            $languages = pll_the_languages(array(
                                'raw'=>1,
                                "hide_current" => 1
                            ));
                            foreach($languages as $lang) {
                                echo "<a href='" . $lang["url"] . "' class='pnm-langs-switcher-link flex items-center gap-x-2'><span>" . $lang["slug"] . "</span></a>";
                            }
                        ?>
                    </div>
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
        <a class="h-16 pnm-logo-container pnm-mobile-logo-container" href="/">
            <?php
                get_template_part( "template-parts/elements/logo-" . pll_current_language() );
            ?>
        </a>
        <div class="pnm-mobile-menu flex items-center gap-x-2">
            <button class="pnm-fries-menu flex flex-col">
                <div class="pnm-fries-menu-line"></div>
                <div class="pnm-fries-menu-line"></div>
                <div class="pnm-fries-menu-line"></div>
            </button>
        </div>
    </div>
    <div class="pnm-mobile-navmenu-outer">
        <div class="pnm-mobile-navmenu-wrapper md:hidden bg-pnm-accent-10">
            <div class="pnm-mobile-navmenu-container pnm-container alignwide pb-4 pt-3 text-pnm-accent">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary_menu',
                    "menu_class" => "pnm-mobile-navmenu",
                    'container' => false,
                    "depth" => 2,
                ) );
                ?>
                <div class="pnm-mobile-langs-switcher mt-6 uppercase">
                    <?php
                        $languages = pll_the_languages(array(
                            'raw'=>1,
                            "hide_current" => 1
                        ));
                        foreach($languages as $lang) {
                            echo "<a href='" . $lang["url"] . "' class='pnm-langs-switcher-link'><span>" . $lang["slug"] . "</span></a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</nav>