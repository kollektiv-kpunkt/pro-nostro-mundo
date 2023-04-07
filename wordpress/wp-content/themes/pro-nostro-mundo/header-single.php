<?php
get_template_part( "template-parts/elements/credits");
?>
<!DOCTYPE html>
<html lang="<?= get_locale() ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?= body_class() ?>>
    <?php
    get_template_part( "template-parts/elements/navbar", "", array("nav_classes" => "single-header", "bg_color" => "bg-transparent"));
    ?>
    <main id="main-content">