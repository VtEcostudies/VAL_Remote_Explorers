<?php
	$image_object = get_field('hero-img');
	$image_size = 'hero';
	$image_url = $image_object['sizes'][$image_size];
	$width = $image_object['sizes'][ $image_size . '-width' ];
	$height = $image_object['sizes'][ $image_size . '-height' ];
?>

<section class="hero data-explorer-dashboard" style="background-image: url(<?php echo $image_url; ?>)">

	<?php if( get_field( 'crumbs' ) ) : ?>

        <div id="crumbs-wrap">	
			<div id="crumbs">	
				<?php if(function_exists('bcn_display'))
				    {
				        bcn_display();
				    }
				?>	
			</div>
		</div>

	<?php endif; ?>

	<img src="<?php echo $image_url; ?>" alt="<?php the_field('hero-img-alt-text'); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" loading="lazy" />

	<div class="content">

		<h1><?php the_field('heading-1'); ?></h1>

		<?php if (get_field('heading-2')): ?>
			<h2><?php the_field('heading-2'); ?></h2>
		<?php endif; ?>

		<div class="hero-stats-wrap <?php the_field('stats-grid-total'); ?>">

			<?php 
				if( have_rows('stats') ):
				while( have_rows('stats') ): the_row();
			?>

				<?php if(get_sub_field('stat-type') == "records"): ?>
				
					<a id="stats-records" class="hero-stats-item" href="<?php the_sub_field('stat-link'); ?>">

						<i class="stat-icon far fa-globe-americas"></i>

						<div class="stat">

							<?php if (get_sub_field('stat-count-override')): ?>

								<span class="stat-count">
									<?php the_sub_field('stat-count-override'); ?>
								</span>

							<?php else: ?>

								<span id="count-occurrences" class="stat-count">
									<i class="far fa-compass"></i>
								</span>

							<?php endif; ?>

							<span class="stats-desc">records</span>

						</div>

					</a>

				<?php elseif(get_sub_field('stat-type') == "datasets"): ?>

					<a id="stats-datasets" class="hero-stats-item" href="<?php the_sub_field('stat-link'); ?>">

						<i class="stat-icon fa-regular fa-rectangle-list"></i>

						<div class="stat">

							<?php if (get_sub_field('stat-count-override')): ?>

								<span class="stat-count">
									<?php the_sub_field('stat-count-override'); ?>
								</span>

							<?php else: ?>

								<span id="count-datasets" class="stat-count">
									<i class="far fa-compass"></i>
								</span>

							<?php endif; ?>

							<span class="stats-desc">datasets</span>

						</div>

					</a>

				<?php elseif(get_sub_field('stat-type') == "species"): ?>

					<a id="stats-species" class="hero-stats-item" href="<?php the_sub_field('stat-link'); ?>">

						<div class="species-stat-icon">
							<?php the_sub_field('species-icon'); ?>
						</div>

						<div class="stat">

							<?php if (get_sub_field('stat-count-override')): ?>

								<span class="stat-count">
									<?php the_sub_field('stat-count-override'); ?>
								</span>

							<?php else: ?>

								<span id="count-species" class="stat-count">
									<i class="far fa-compass"></i>
								</span>

							<?php endif; ?>

							<span class="stats-desc">species</span>

						</div>

					</a>

				<?php elseif(get_sub_field('stat-type') == "citations"): ?>

					<a id="stats-citations" class="hero-stats-item" href="<?php the_sub_field('stat-link'); ?>">

						<i class="stat-icon fa-light fa-books"></i>

						<div class="stat">

							<?php if (get_sub_field('stat-count-override')): ?>

								<span class="stat-count">
									<?php the_sub_field('stat-count-override'); ?>
								</span>

							<?php else: ?>

								<span id="count-citations" class="stat-count">
									<i class="far fa-compass"></i>
								</span>

							<?php endif; ?>

							<span class="stats-desc">citations</span>

						</div>

					</a>

				<?php elseif(get_sub_field('stat-type') == "contributors"): ?>

					<a id="stats-contributors" class="hero-stats-item" href="<?php the_sub_field('stat-link'); ?>">

						<i class="stat-icon fa-regular fa-address-card"></i>

						<div class="stat">

							<?php if (get_sub_field('stat-count-override')): ?>

								<span class="stat-count">
									<?php the_sub_field('stat-count-override'); ?>
								</span>

							<?php else: ?>

								<span id="count-contributors" class="stat-count">
									<i class="far fa-compass"></i>
								</span>

							<?php endif; ?>

							<span class="stats-desc">contributors</span>

						</div>

					</a>

				<?php elseif(get_sub_field('stat-type') == "observers"): ?>

					<a id="stats-contributors" class="hero-stats-item" href="<?php the_sub_field('stat-link'); ?>">

						<i class="stat-icon fa-regular fa-binoculars"></i>

						<div class="stat">

							<?php if (get_sub_field('stat-count-override')): ?>

								<span class="stat-count">
									<?php the_sub_field('stat-count-override'); ?>
								</span>

							<?php else: ?>

								<span id="count-observers" class="stat-count">
									<i class="far fa-compass"></i>
								</span>

							<?php endif; ?>

							<span class="stats-desc">observers</span>

						</div>

					</a>

				<?php elseif(get_sub_field('stat-type') == "publishers"): ?>

					<a id="stats-publishers" class="hero-stats-item" href="<?php the_sub_field('stat-link'); ?>">

						<i class="stat-icon fa-regular fa-book-atlas"></i>

						<div class="stat">

							<?php if (get_sub_field('stat-count-override')): ?>

								<span class="stat-count">
									<?php the_sub_field('stat-count-override'); ?>
								</span>

							<?php else: ?>

								<span id="count-publishers" class="stat-count">
									<i class="far fa-compass"></i>
								</span>

							<?php endif; ?>

							<span class="stats-desc">publishers</span>

						</div>

					</a>

				<?php elseif(get_sub_field('stat-type') == "images"): ?>

					<a id="stats-images" class="hero-stats-item" href="<?php the_sub_field('stat-link'); ?>">

						<i class="stat-icon fa-regular fa-image"></i>

						<div class="stat">

							<?php if (get_sub_field('stat-count-override')): ?>

								<span class="stat-count">
									<?php the_sub_field('stat-count-override'); ?>
								</span>

							<?php else: ?>

								<span id="count-images" class="stat-count">
									<i class="far fa-compass"></i>
								</span>

							<?php endif; ?>

							<span class="stats-desc">images</span>

						</div>

					</a>

				<?php endif; ?>

			<?php endwhile; endif; ?>

		</div>

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

	<span class="overlay <?php the_field('img-darkness'); ?>"></span>

</section>