<?php
/*
	Template Name: Data Explorer Occurrences
*/
?>

<link rel="stylesheet" href="https://www-lib.gbif.org/style.css" />
<link href="https://<?php echo get_val_server_name(); ?>/VAL_Data_Explorers/css/gbif-data-styles.css" rel="stylesheet">

<script type="module" src="<?php echo get_template_directory_uri(); ?>/VAL_Data_Explorers/js/localSiteConfig.js">/*THIS SCRIPT MUST COME FIRST*/</script>

<?php get_header(); the_post(); ?>

<section> <!-- GBIF REACT Data Widget hangs on root -->
	<div id="gbif_react" class="data-widget gbif">
		<div id="root"></div>
	</div>
</section>

<script src="https://<?php echo get_val_server_name(); ?>/VAL_Data_Explorers/js/freshworks.js" type="module"></script>
<script src="https://<?php echo get_val_server_name(); ?>/VAL_Data_Explorers/js/gbif_data_widget.js" type="module"></script>

<!-- This, combined with the gbif-data-widget, causes double scrollbars. Remove the footer until we can fix it. -->
<?php //get_footer(); ?>
