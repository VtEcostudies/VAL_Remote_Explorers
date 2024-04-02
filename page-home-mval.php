<?php
/*
	Template Name: Data Explorer Home
*/
?>

<link href="https://vtatlasoflife.org/VAL_Data_Explorers/css/data-explorer-home.css" rel="stylesheet">

<style>

#stats-nothing    { grid-area: top0; }
#stats-records    { grid-area: top1; }
#stats-datasets   { grid-area: top2; }
#stats-species    { grid-area: bot1; }
#stats-citations  { grid-area: bot2; }
#stats-contributors  { grid-area: bot3; }

.hero-stats-container-five {
	display: grid;
	grid-template-columns: auto !important; /* override style defined elsewhere */
	grid-template-areas:
		'top0 top1 top1 top2 top2 top2'
		'bot1 bot1 bot2 bot2 bot3 bot3';
	gap: 10px;
	padding: 10px;
}
	
.hero-stats-container-mval {
		display: grid;
		grid-template-columns: auto !important; /* override style defined elsewhere */
		grid-template-areas:
			'top1 top2'
			'bot1 bot3';
		gap: 10px;
		padding: 10px;
	}

.hero { 
	background: url(https://mval.biodiversityworksmv.org/wp-content/uploads/2021/09/RTHU-at-Cardinal-Flower_PGilmore_1600x700_acf_cropped-1600x700.jpg) no-repeat center !important; 
	background-size: cover !important;
}

</style>

<?php get_header(); the_post(); ?>

<section class="hero">

	<div class="content">

		<h1><?php the_field('heading-1'); ?></h1>

		<h2><?php the_field('heading-2'); ?></h2>

		<div class="hero-stats-wrap hero-stats-container-mval">
			
			<a id="stats-records" class="hero-stats-item" href="<?php site_url(); ?>gbif-explorer?view=MAP">

				<i class="stats-icon far fa-globe-americas"></i>

				<div class="stats">

					<span id="count-occurrences" class="stats-count">
						<i class="far fa-compass"></i>
					</span>

					<span class="stats-desc">records</span>

				</div>

			</a>

			<a id="stats-datasets" class="hero-stats-item" href="<?php site_url(); ?>gbif-explorer?view=DATASETS">

				<i class="stats-icon fa-regular fa-address-card"></i>

				<div class="stats">

					<span id="count-datasets" class="stats-count">
						<i class="far fa-compass"></i>
					</span>

					<span class="stats-desc">datasets</span>

				</div>

			</a>

			<a id="stats-species" class="hero-stats-item" href="<?php site_url(); ?>gbif-species-explorer">

				<i class="stats-icon fas fa-trees"></i>

				<div class="stats">

					<span id="count-species" class="stats-count">
						<i class="far fa-compass"></i>
					</span>

					<span class="stats-desc">species</span>

				</div>

			</a>

			<a id="stats-contributors" class="hero-stats-item" href="#">

				<i class="stats-icon fa-regular fa-binoculars"></i>

				<div class="stats">

					<span id="count-contributors" class="stats-count">
							<i class="far fa-compass"></i>
					</span>

					<span class="stats-desc">contributors</span>

				</div>

			</a>

		</div> <!-- end stats-wrap -->

		<form id="searchform" onsubmit="return false;" >

			<input id="species_search"
				autocomplete="off"
				list="gbif_autocomplete_list"
				class="search-field"
				type="text"
				placeholder="Search the Atlas..."
				onClick="this.setSelectionRange(0, this.value.length)"
				/>
			<datalist id="gbif_autocomplete_list"></datalist>

			<div class="searchsubmit-wrap">
				<button id="species_search_button">
					<i class="far fa-search"></i>
				</button>
			</div>
		</form>

	</div>

	<span class="overlay"></span>

</section>

<script type="module" src="<?php echo get_template_directory_uri(); ?>/VAL_Data_Explorers/js/localSiteConfig.js">/*THIS SCRIPT MUST COME FIRST*/</script>
<script src="https://vtatlasoflife.org/VAL_Data_Explorers/js/gbif_data_stats.js" type="module"></script>
<script src="https://vtatlasoflife.org/VAL_Data_Explorers/js/gbif_species_search.js" type="module"></script>
<script src="https://vtatlasoflife.org/VAL_Data_Explorers/js/gbif_auto_complete.js" type="module"></script>

<?php get_footer(); ?>

<script>
	//alert("<?php echo get_template_directory_uri(); ?>/MVAL_Data_Explorers/js/localSiteConfig.js");
</script>