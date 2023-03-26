<nav class="pnm-navbar">
    <div class="pnm-navbar-inner pnm-container alignfull py-5 flex justify-between">
        <div class="pnm-navbar-links flex gap-x-16 mt-auto">
            <?php
                get_template_part( "template-parts/elements/logo-" . pll_current_language() );
            ?>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary_menu',
                'container' => false,
                'items_wrap' => '%3$s',
            ) );
            ?>
        </div>
        <div class="pnm-navbar-more flex gap-x-6 h-fit mt-auto items-center">
                <div class="pnm-navbar-langs flex gap-x-2 uppercase">
                    <i class="icofont-globe"></i>
                    <?php
                        pll_the_languages(array(
                            'show_flags' => 0,
                            'show_names' => 0,
                            'hide_if_empty' => 0,
                            'display_names_as' => 'slug',
                            'hide_current' => 0,
                            'post_id' => $post->ID,
                            'raw' => 0
                        ));
                    ?>
                </div>
                <div class="pnm-navbar-more-divider h-8 border-l-2 border-l-pnm-accent-40"></div>
                <div class="pnm-navbar-some-icons flex gap-2 text-pnm-accent">
                    <?php
                        $some_items = get_nav_menu_items_by_location("some_menu");
                        foreach($some_items as $item) {
                            echo "<a href='" . $item->url . "' class='pnm-navbar-more-link flex'><i class='leading-none icofont-" . $item->title . "'></i></a>";
                        }
                    ?>
                </div>
        </div>
    </div>
</nav>