<?php
$slides = get_field("slides");
$initial = $slides[0];
?>

<div class="pnm-fp-heroine alignfull mt-10 sm:mt-5 relative">
    <div class="fp-heroine-inner">
        <div class="fp-heroine-slide-img alignwide !px-6 relative" class="flex">
            <div class="aspect-16/9 relative fp-heroine-slide-img-wrapper">
                <img src="<?= wp_get_attachment_image_url($initial["slide_image"]["ID"], "large") ?>" srcset="<?= wp_get_attachment_image_srcset($initial["slide_image"]["ID"], "large") ?>" alt="<?= $initial["title"] ?>" class="object-cover absolute top-0 left-0 w-full h-full" loading="lazy">
            </div>
            <div class="fp-heroine-slide-pagination flex gap-1 absolute bottom-0 right-6">
                <?php for($i = 0; $i < count($slides); $i++): ?>
                    <div class="fp-heroine-slide-page w-6 h-1 <?= ($i == 0) ? "bg-pnm-accent" : "bg-pnm-foreground-80" ?>" id="fp-slide-<?=$i?>"></div>
                <?php endfor ?>
            </div>
        </div>
        <div class="fp-heroine-slide-content !w-fit absolute alignfull bottom-0 pb-5">
            <div class="fp-heroine-slide-content-container bg-pnm-accent max-w-lg p-6 text-white mb-2">
                <hr class="pnm-hr-accent !mt-0 !mb-4 shadow-lg"/>
                <h2 class="text-lg sm:text-2xl md:text-3xl xl:text-4xl leading-tight mt-0">
                    <?= $initial["title"] ?>
                </h2>
            </div>
            <a href="<?= $initial["target"] ?>" class="pnm-button pnm-i-arrow-right text-sm md:text-xl"<?= (in_array("1", $initial["newtab"])) ? " target='_blank'" : "" ?>><?= esc_html__("Weiterlesen", "pnm") ?></a>
        </div>
    </div>
    <script type="text/json">
        <?php
        $i = 0;
        foreach ($slides as $slide) {
            $slide["slide_image_url"] = wp_get_attachment_image_url($slide["slide_image"]["ID"], "large");
            $slide["slide_image_srcset"] = wp_get_attachment_image_srcset($slide["slide_image"]["ID"], "large");
            $slides[$i] = $slide;
            $i++;
        }
        echo json_encode($slides);
        ?>
    </script>
</div>
