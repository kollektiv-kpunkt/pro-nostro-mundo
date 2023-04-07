<?php
$args = wp_parse_args($args, array(
    "position" => "xl:absolute",
    "single" => false
));
?>
<div class="<?= $args["position"] ?> w-full !max-w-none !p-0 mb-10">
    <div class="pnm-social-share-container pnm-container alignwide w-full <?= ($args["single"]) ? " single" : "" ?>">
        <div class="pnm-social-share-inner w-full xl:w-20 flex gap-1 flex-wrap">
            <div class="pnm-social-share-link" data-type="copylink"><i class="icofont-link"></i></div>
            <div class="pnm-social-share-link" data-type="email"><i class="icofont-email"></i></div>
            <div class="pnm-social-share-link" data-type="facebook"><i class="icofont-facebook"></i></div>
            <div class="pnm-social-share-link" data-type="twitter"><i class="icofont-twitter"></i></div>
            <div class="pnm-social-share-link" data-type="linkedin"><i class="icofont-linkedin"></i></div>
        </div>
    </div>
</div>