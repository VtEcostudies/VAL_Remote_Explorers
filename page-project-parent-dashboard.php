<?php

	/*
		Template Name: Project Parent with Dashboard
	*/

?>

<?php get_header(); the_post(); ?>

<?php get_template_part('VAL_Data_Explorers/data-explorer-dashboard-hero'); ?>

<main role="main">

	<?php get_template_part( 'page-project-aside' ); ?>
	
	<article>
		
		<?php get_template_part( 'page-flexible-content' ); ?>

	</article>

	<div class="clear"></div>

</main>

<script type="module" src="<?php echo get_template_directory_uri(); ?>/VAL_Data_Explorers/js/localSiteConfig.js<?php if (get_field('atlas-sitename')): ?>?siteName=<?php the_field('atlas-sitename'); ?><?php endif; ?>">/*THIS SCRIPT MUST COME FIRST*/</script>
<script src="https://<?php echo get_val_server_name(); ?>/VAL_Data_Explorers/js/gbif_auto_complete.js" type="module"></script>
<script src="https://<?php echo get_val_server_name(); ?>/VAL_Data_Explorers/js/gbif_data_stats.js" type="module"></script>
<script src="https://<?php echo get_val_server_name(); ?>/VAL_Data_Explorers/js/gbif_species_search.js" type="module"></script>

<?php get_footer(); ?>

<script>
	//alert("<?php echo get_template_directory_uri(); ?>/MVAL_Data_Explorers/js/localSiteConfig.js");
</script>
