<?php
/**
 * Template for displaying the datatable block
 *
 * @package PNM
 * @since 1.0.0
 */

// Get the table data.
$file = get_field( 'csv-file' )["url"];
$csv = array_map( 'str_getcsv', file( $file ) );
$headings = array_shift( $csv );
$datatable = array();
foreach ( $csv as $row ) {
    $datatable[] = array_combine( $headings, $row );
}
?>

<div class="pnm-datatable-wrapper align<?= $block["align"] ?> hidden">
    <table class="pnm-datatable">
        <thead>
            <tr>
                <?php foreach ( $headings as $heading ) : ?>
                    <th><?= $heading ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $datatable as $row ) : ?>
                <tr>
                    <?php foreach ( $row as $cell ) : ?>
                        <td><?= $cell ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<link href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/sp-2.1.2/datatables.min.css" rel="stylesheet"/>
<script src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/sp-2.1.2/datatables.min.js"></script>
<script>
    let table = new DataTable(".pnm-datatable", {
        dom:
            "<'w-full'B>" +
            "<<l><f>>" +
            "<<tr>>" +
            "<<i><p>>",
        buttons: [
            'csv', 'excel'
        ],
        "initComplete": function(settings, json) {
            jQuery(".pnm-datatable-wrapper").removeClass("hidden");
        },
    });
</script>