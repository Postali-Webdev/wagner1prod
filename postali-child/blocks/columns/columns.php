<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $layout = get_field('column_layout');
    if ($layout == '2575') {
        $column1 = '25';
        $column2 = '75';
    }
    if ($layout == '3366') {
        $column1 = '33';
        $column2 = '66';
    }
    if ($layout == '5050') {
        $column1 = '50';
        $column2 = '50';
    }
    if ($layout == '6633') {
        $column1 = '66';
        $column2 = '33';
    }
    if ($layout == '7525') {
        $column1 = '75';
        $column2 = '25';
    }

    if ($layout == '333333') {
        $column1 = '33';
        $column2 = '33';
        $column3 = '33';
    }

    $columns_background_color = get_field('columns_background_color');
    $columns_panel_headline = get_field('columns_panel_headline');
    $column1_content = get_field('column_1_content');
    $column2_content = get_field('column_2_content');
    $column3_content = get_field('column_3_content');
?>

<section class="columns-layout <?php if ($layout == '333333') { ?>three-column<?php } ?>"  style="background:<?php echo $columns_background_color; ?>">
    <div class="container">
        <div class="columns">
            <?php if(!empty($columns_panel_headline)) { ?>
            <div class="column-full block">
                <h2><?php echo $columns_panel_headline; ?></h2>
                <div class="spacer-30"></div>
            </div>
            <?php } ?>

            <div class="column-<?php echo $column1; ?> block">
                <?php echo $column1_content; ?>
            </div>

            <div class="column-<?php echo $column2; ?> block">
                <?php echo $column2_content; ?>
            </div>

            <?php if ($layout == '333333') { ?>
            <div class="column-<?php echo $column3; ?> block">
                <?php echo $column3_content; ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>