<div class="pnm-link-toggle-wrapper <?= $block["className"] ?? "" ?>">
    <div class="pnm-link-toggle-content py-4 pr-4">
        <a href="<?= get_field("link") ?>" class="flex justify-between items-center pnm-noline"<?= (in_array("newtab", get_field("new_tab"))) ? " target=\"_blank\"" : "" ?>>
            <p class="leading-none text-xl"><?= get_field("title") ?></p>
            <i class="text-xl text-pnm-red icofont-<?= (get_field("type") == "right") ? "rounded-right" : "download" ?> flex justify-center items-center"></i>
        </a>
    </div>
</div>