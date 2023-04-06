<form action="<?= $_ENV["N8N_BASE_URL"] ?>/webhook/<?= $_ENV["N8N_NEWSLETTER_WEBHOOK"] ?>" class="pnm-form pnm-ajax-form" method="POST">
    <div class="pnm-form-message">
        <p class="pnm-form-message-text"><?= esc_html__("Danke, dass du dich für unseren Newsletter angemeldet hast!", "pnm") ?></p>
    </div>
    <div class="pnm-form-group relative !w-full">
        <label for="email" class="pnm-form-label sr-only" aria-label="Email">Email</label>
        <input type="email" name="email" id="email" class="pnm-form-input" placeholder="<?= esc_html__("E-Mail Addresse", "pnm") ?>" required>
        <button type="submit" class="absolute right-2 text-pnm-secondary top-0 h-full flex justify-center items-center"><i class="icofont-paper-plane"></i></button>
    </div>
</form>