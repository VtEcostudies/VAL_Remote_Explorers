<?php
/*
	Template Name: Data Explorer Species Profile
*/
?>

<?php get_header(); the_post(); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.min.css" integrity="sha512-KJRB1wUfcipHY35z9dEE+Jqd+pGCuQ2JMZmQPAjwPjXuzz9oL1pZm2cd79vyUgHQxvb9sFQ6f05DIz0IqcG1Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" crossorigin="anonymous">

<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,600,600italic,700,700italic,900,900italic|Sorts+Mill+Goudy:400,400italic' rel='stylesheet' type='text/css'>
<link href="https://<?php echo get_val_server_name(); ?>/VAL_Species_Page/css/species-page-styles.css" rel="stylesheet">
<link href="https://<?php echo get_val_server_name(); ?>/VAL_Species_Page/css/species-map-styles.css" rel="stylesheet">
<link href="https://<?php echo get_val_server_name(); ?>/VAL_Web_Utilities/css/pheno.css" rel="stylesheet">

<!-- Make sure to put Leaflet JS AFTER Leaflet CSS -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet.min.js" integrity="sha512-Io0KK/1GsMMQ8Vpa7kIJjgvOcDSwIqYuigJEYxrrObhsV4j+VTOQvxImACNJT5r9O4n+u9/58h7WjSnT5eC4hA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src='https://unpkg.com/@turf/turf/turf.min.js'></script>
<script src="https://d3js.org/d3.v6.js"></script>
<script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>

<script src="https://<?php echo get_val_server_name(); ?>/VAL_Web_Utilities/js/moment.min.js"></script>
<script src="https://<?php echo get_val_server_name(); ?>/VAL_Web_Utilities/js/purify.min.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/VAL_Data_Explorers/js/localSiteConfig.js" type="module">/*THIS SCRIPT MUST COME FIRST*/</script>
<script src="https://<?php echo get_val_server_name(); ?>/VAL_Data_Explorers/js/freshworks.js" type="module"></script>
<script src="https://<?php echo get_val_server_name(); ?>/VAL_Species_Page/js/valSpeciesPage.js" type="module"></script>

  <div class="container">
        <div class="row" id="rowTopMessage">
            <div class="col-lg-12">
                <label id="common" class="speciesCommon"></label>
                <label id="taxon" class="speciesTaxon"></label>
            </div>
        </div>
        <hr>
        <div class="row" id="rowTopContent">
            <div class="col-lg-6" id="divTopImage">
                <img src="" id="iconicImage" class="iconicImage" />
                <label id="iconicImageAttrib" class="imageAttrib"></label>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6" id="divTopStats" class="speciesStats">
                        <div class="speciesStatsBlock">
                            <label class="speciesStatsLabel"><b>S-Rank:</b></label>
                            <label id="srank" class="speciesStatsValue"></label>
                            <label id="sgcn" class="speciesStatsValue"></label>
                        </div>
                        <div class="speciesStatsBlock"><label class="speciesStatsLabel"><b>IUCN:</b></label><label id="iucn" class="speciesStatsValue"></label></div>
                        <div class="speciesStatsBlock"><b><label class="speciesStatsLabel" id="teLbl">VT List:</label></b><label id="TndE" class="speciesStatsValue"></label></div>
                    </div>
                    <div class="col-lg-6" id="divTopStats" class="speciesStats">
                        <div class="speciesStatsBlock"><b><label class="speciesStatsLabel" id="vtLbl">Vermont Records:</label></b><label id="vtRec" class="speciesStatsValue"></label></div>
                        <div class="speciesStatsBlock"><b><label class="speciesStatsLabel" id="fsLbl">First VT Record:</label></b><label id="fsRec" class="speciesStatsValue"></label></div>
                        <div class="speciesStatsBlock"><b><label class="speciesStatsLabel" id="lsLbl">Last VT Record:</label></b><label id="lsRec" class="speciesStatsValue"></label></div>
                    </div>
                </div>
                <div class="row taxonDetailBottom">
                    <div class="col-lg-12 tab">
                        <button id="phenoTab" class="tabLinksTop" onclick="openTab(event, 'Phenology', 'tabContentTop', 'tabLinksTop')">Phenology</button>
                        <button id="histoTab" class="tabLinksTop" onclick="openTab(event, 'History', 'tabContentTop', 'tabLinksTop')">History</button>
                        <button id="obsIdTab" class="tabLinksTop" onclick="openTab(event, 'NeedsId', 'tabContentTop', 'tabLinksTop')">iNaturalist</button>
                    </div>
                    <div id="Phenology" class="tabContentTop">
                        <div id="speciesCountsByWeek" class=""></div>
                    </div>
                    <div id="History" class="tabContentTop">
                        <div id="speciesCountsByYear" class=""></div>
                    </div>
                    <div id="NeedsId" class="tabContentTop">
                        <div id="inatTaxonObsDonut" class=""></div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row" id="rowMidContent">
            <div class="col-lg-12">
                <p id="wikiText"></p>
            </div>
        </div>
        <hr>
        <div class="row otherInfoTabs" id="rowBotContent">
            <div class="col-lg-auto tab">
                <button id="distrTab" class="tabLinksBot" onclick="openTab(event, 'Distr', 'tabContentBot', 'tabLinksBot')">Suitability/Distribution</button>
                <button id="aboutTab" class="tabLinksBot" onclick="openTab(event, 'About', 'tabContentBot', 'tabLinksBot')">About</button>
                <!--
                <button id="occMapTab" class="tabLinksBot" onclick="openTab(event, 'occMap', 'tabContentBot', 'tabLinksBot')">Observations</button>
                -->
            </div>
            <div id="Distr" class="col-lg-auto tabContentBot">
                <img id="speciesDistribution" class="speciesDistribution center-image"/>
                <p id="speciesDistMissing" style="display:none;"></p>
            </div>
            <div id="About" class="tabContentBot">
                <div id="wikiPageHtml" class="">
                    <div class="row" id="wikiPageRow1">
                        <div class="col-lg-auto" id="wikiPageRow1Col1"></div>
                    </div>
                    <div class="row justify-content-center" id="wikiPageRow2">
                        <div class="col-lg-8" id="wikiPageRow2Col1"></div>
                        <div class="col-lg-4 wikiSidebar mx-auto text-center" id="wikiPageRow2Col2"></div>
                    </div>
                    <div class="row" id="wikiPageRow3">
                        <div class="col-lg-auto" id="wikiPageRow3Col1"></div>
                    </div>
                    <div class="row" id="wikiPageRowLast">
                        <div class="col-lg-auto" id="wikiPageRowLastCol1"></div>
                    </div>
                </div>
            </div>
            <!--
            <div id="occMap" class="tabContentBot"style="height:600px;width:100%;overflow:hidden;">
                <button id="zoomVT" class="map-button">Zoom VT</button>
            </div>
            -->
        </div>
  </div>

<?php get_footer(); ?>

<script>
function openTab(evt, tabEleId, tabContentClass, tabLinkClass) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName(tabContentClass);
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        }
    tablinks = document.getElementsByClassName(tabLinkClass);
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
    document.getElementById(tabEleId).style.display = "block";
    if (evt.currentTarget) {
        evt.currentTarget.className += " active";
    }
    window.dispatchEvent(new Event('resize'));
}
$("#phenoTab").click(); $("#phenoTab").addClass("active");
$("#aboutTab").click(); $("#aboutTab").addClass("active");
</script>