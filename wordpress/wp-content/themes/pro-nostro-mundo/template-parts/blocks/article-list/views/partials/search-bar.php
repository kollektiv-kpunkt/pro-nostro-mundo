<div class="pnm-searchbar-outer">
    <div class="pnm-searchbar-button-container flex justify-end">
        <button class="pnm-searchbar-button flex items-center text-pnm-accent"><?= esc_html__("Filtern", "pnm") ?><i class="icofont-search-2 ml-2"></i></button>
    </div>
    <div class="pnm-searchbar-form-container max-h-0 overflow-hidden">
        <form action="#" class="pnm-searchbar-form pnm-form py-4">
            <div class="pnm-form-group !w-full">
                <label for="query" class="pnm-form-label sr-only" aria-label="<?= esc_html__("Suchbegriff", "pnm") ?>"><?= esc_html__("Suchbegriff", "pnm") ?></label>
                <input type="search" name="query" id="query" class="pnm-form-input" placeholder="<?= esc_html__("Suchbegriff", "pnm") ?>">
            </div>
            <div class="pnm-form-group !w-full">
                <label for="tags" class="pnm-form-label sr-only" aria-label="<?= esc_html__("Stichwörter", "pnm") ?>"><?= esc_html__("Stichwörter", "pnm") ?></label>
                <select multiple name="tags" class="pnm-choicesjs" data-no-choices-text="<?= esc_html__("Keine weiteren Stichwörter verfügbar", "pnm") ?>">
                    <option value=""><?= esc_html__("Stichwörter", "pnm") ?></option>
                    <?php foreach (get_terms(array("taxonomy" => "post_tag", "hide_empty" => false)) as $tag) : ?>
                        <option value="<?= $tag->term_id ?>"><?= $tag->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="pnm-form-group">
                <label for="categories" class="pnm-form-label sr-only" aria-label="<?= esc_html__("Kategorien", "pnm") ?>"><?= esc_html__("Kategorien", "pnm") ?></label>
                <select multiple name="tags" class="pnm-choicesjs" data-no-choices-text="<?= esc_html__("Keine weiteren Kategorien verfügbar", "pnm") ?>">
                    <option value=""><?= esc_html__("Kategorien", "pnm") ?></option>
                    <?php foreach (get_terms(array("taxonomy" => "category", "hide_empty" => false)) as $category) : ?>
                        <option value="<?= $category->term_id ?>"><?= $category->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="pnm-form-group">
                <label for="author" class="pnm-form-label sr-only" aria-label="<?= esc_html__("Autor*in", "pnm") ?>"><?= esc_html__("Autor*in", "pnm") ?></label>
                <select name="author" class="pnm-choicesjs" data-no-choices-text="<?= esc_html__("Kein*e Autor*in verfügbar", "pnm") ?>">
                    <option value=""><?= esc_html__("Autor*in", "pnm") ?></option>
                    <?php foreach (get_users( 'orderby=post_count&who=authors' ) as $author) : ?>
                        <option value="<?= $author->ID ?>"><?= $author->display_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="pnm-form-group !w-full justify-end">
                <button type="submit" class="pnm-button color-accent">Suchen</button>
            </div>
        </form>
    </div>
</div>