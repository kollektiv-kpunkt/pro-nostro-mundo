<div class="pnm-content-toggle-wrapper">
    <details class="pnm-content-toggle text-start"<?= (get_field("default_setting")) ? " open" : "" ?>>
        <summary class="pnm-content-toggle-summary flex justify-between leading-none">
            <span class="pnm-content-toggle-title"><?= get_field("title") ?></span>
            <div class="pnm-content-toggle-icon text-center"><i class="icofont-rounded-down text-2xl"></i></div>
        </summary>
        <div class="pnm-content-toggle-content mt-4">
            <?= get_field("content") ?>
        </div>
    </details>
</div>