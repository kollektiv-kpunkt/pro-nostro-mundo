<?php
$args = wp_parse_args($args, array(
    "position" => "xl:absolute",
    "single" => false
));
?>
<div class="pnm-social-share-outer <?= $args["position"] ?> w-fit !p-0 !mx-0 mb-10">
    <div class="pnm-social-share-container<?= ($args["single"]) ? " single" : "" ?>">
        <div class="pnm-social-share-inner w-80 xl:w-20 flex gap-1 flex-wrap" data-share-text="<?= esc_html__("Hallo 👋\nIch denke, dass dieser Link dich interessieren könnte:\n", "pnm") . get_the_title(  ) . "\n" . get_the_excerpt(  ) ?>" data-share-url="<?= get_the_permalink(  ) ?>">
            <div class="pnm-social-share-link" data-type="copylink" data-success-text="<?= esc_html__("Link erfolgreich kopiert!", "pnm") ?>"><i class="icofont-link"></i></div>
            <div class="pnm-social-share-link" data-type="email"><i class="icofont-ui-email"></i></div>
            <div class="pnm-social-share-link" data-type="facebook"><i class="icofont-facebook"></i></div>
            <div class="pnm-social-share-link" data-type="twitter"><i class="icofont-twitter"></i></div>
            <div class="pnm-social-share-link" data-type="whatsapp"><i class="icofont-whatsapp"></i></div>
            <div class="pnm-social-share-link" data-type="linkedin"><i class="icofont-linkedin"></i></div>
        </div>
    </div>
</div>