<div class="pnm-searchbar-outer">
    <div class="pnm-searchbar-button-container flex justify-end">
        <button class="pnm-searchbar-button flex items-center text-pnm-accent"><?= esc_html__("Filtern", "pnm") ?><i class="icofont-search-2 ml-2"></i></button>
    </div>
    <div class="pnm-searchbar-form-container max-h-0 overflow-hidden">
        <form action="#" class="pnm-searchbar-form pnm-form py-4">
            <div class="pnm-form-group !w-full">
                <label for="s" class="pnm-form-label sr-only" aria-label="<?= esc_html__("Suchbegriff", "pnm") ?>"><?= esc_html__("Suchbegriff", "pnm") ?></label>
                <input type="text" name="s" id="s" class="pnm-form-input" placeholder="<?= esc_html__("Suchbegriff", "pnm") ?>" value="<?= $_GET["query"]["s"] ?? "" ?>">
            </div>
            <div class="pnm-form-group !w-full">
                <label for="post_tags" class="pnm-form-label sr-only" aria-label="<?= esc_html__("Stichwörter", "pnm") ?>"><?= esc_html__("Stichwörter", "pnm") ?></label>
                <select multiple name="post_tags" class="pnm-choicesjs" data-no-choices-text="<?= esc_html__("Keine weiteren Stichwörter verfügbar", "pnm") ?>">
                    <option value=""><?= esc_html__("Stichwörter", "pnm") ?></option>
                    <?php
                    $selected_tags = explode(",", $_GET["query"]["post_tags"] ?? "");
                    foreach (get_terms(array("taxonomy" => "post_tag", "hide_empty" => false)) as $tag) : ?>
                        <option value="<?= $tag->term_id ?>"<?= (in_array($tag->term_id, $selected_tags)) ? " selected" : "" ?>><?= $tag->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="pnm-form-group">
                <label for="categories" class="pnm-form-label sr-only" aria-label="<?= esc_html__("Kategorie", "pnm") ?>"><?= esc_html__("Kategorie", "pnm") ?></label>
                <select name="categories" class="pnm-choicesjs" data-no-choices-text="<?= esc_html__("Keine weiteren Kategorien verfügbar", "pnm") ?>">
                    <option value=""><?= esc_html__("Kategorie", "pnm") ?></option>
                    <?php
                    $selected_categories = explode(",", $_GET["query"]["categories"] ?? "");
                    foreach (get_terms(array("taxonomy" => "category", "hide_empty" => false)) as $category) : ?>
                        <option value="<?= $category->term_id ?>"<?= (in_array($category->term_id, $selected_categories)) ? " selected" : "" ?>><?= $category->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="pnm-form-group">
                <label for="authors" class="pnm-form-label sr-only" aria-label="<?= esc_html__("Autor*in", "pnm") ?>"><?= esc_html__("Autor*in", "pnm") ?></label>
                <select name="authors" id="authors" class="pnm-choicesjs" data-no-choices-text="<?= esc_html__("Kein*e Autor*in verfügbar", "pnm") ?>">
                    <option value=""><?= esc_html__("Autor*in", "pnm") ?></option>
                    <?php
                    $selected_authors = explode(",", $_GET["query"]["authors"] ?? "");
                    foreach (get_users( 'orderby=post_count&who=authors' ) as $author) : ?>
                        <option value="<?= $author->ID ?>"<?= (in_array($author->ID, $selected_authors)) ? " selected" : "" ?>><?= $author->display_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php
            $locales = [
                "de_CH" => "de-DE",
                "de_FR" => "fr-FR"
            ];
            $locale = $locales[pll_current_language("locale")] ?? "de-DE";
            ?>
            <div class="pnm-form-group">
                <label for="startdate" class="pnm-form-label sr-only" aria-label="<?= esc_html__("Publiziert von...", "pnm") ?>"><?= esc_html__("Publiziert von...", "pnm") ?></label>
                <input type="text" name="startdate" id="startdate" class="pnm-form-input pnm-easepick" data-lang="<?= $locale ?>" placeholder="<?= esc_html__("Publiziert von...", "pnm") ?>" value="<?= $_GET["query"]["startdate"]  ?? "" ?>">
            </div>
            <div class="pnm-form-group">
                <label for="enddate" class="pnm-form-label sr-only" aria-label="<?= esc_html__("Publiziert bis...", "pnm") ?>"><?= esc_html__("Publiziert bis...", "pnm") ?></label>
                <input type="text" name="enddate" id="enddate" class="pnm-form-input pnm-easepick"  data-lang="de-DE" placeholder="<?= esc_html__("Publiziert bis...", "pnm") ?>" value="<?= $_GET["query"]["enddate"]  ?? "" ?>">
            </div>
            <div class="pnm-form-group !w-full justify-end gap-4">
                <button type="reset" class="pnm-button w-full md:w-auto">Zurücksetzen</button>
                <button type="submit" class="pnm-button color-accent w-full md:w-auto">Suchen</button>
            </div>
        </form>
    </div>
</div>