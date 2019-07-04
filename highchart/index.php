<?php
include_once('../header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo($site_home); ?>/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo($site_home); ?>/assets/css/font-awesome.css">
	<script src="<?php echo($site_home); ?>/assets/js/jquery-1.12.0.min.js"></script>
	<script src="<?php echo($site_home); ?>/assets/js/bootstrap.js"></script>
	<link rel="stylesheet" href="<?php echo($front_css_url.'/magnific-popup.css'); ?>">
	<script src="<?php echo($front_js_url.'/jquery.magnific-popup.js'); ?>"></script>
	<style>
		.panel-body ul {
			list-style: none;
		}
	</style>
	<script>
	(function($) {
		jQuery(document).ready(function() {
			var cnt = 0;
			jQuery('.ajax-popup-link').each(function() {
				var chartLink = jQuery(this).attr('href');
				if(cnt == 1) {
					//alert(chartLink);
				}
				jQuery(this).magnificPopup({
					type: 'ajax',
					showCloseBtn: true,
					alignTop: true,
					overflowY: 'scroll',
					midClick: true,
					ajax: {
						settings: {
							url: 'chart.php',
							type: 'POST',
							data: {
								chartLink: chartLink
							}
						}
					}
				});
				cnt++;
			});
		});
	})(jQuery);
	</script>
</head>
<body>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#highcharts">HIGHCHARTS</a></li>
  <li><a data-toggle="tab" href="#highstock">HIGHSTOCK</a></li>
  <li><a data-toggle="tab" href="#highmaps">HIGHMAPS</a></li>
</ul>
<div class="tab-content">
	<div id="highcharts" class="tab-pane fade in active">
		<div class="col-md-3">
			<!-- Side Start -->
			<h1>Highcharts Examples</h1>
			<div id="accordion" class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#LineCharts">Line charts</a>
					</h4>
				</div>
				<div id="LineCharts" class="panel-collapse collapse in">
					<div class="panel-body">
						<ul>
							<li><a href="Highcharts-6.0.4/examples/line-basic/index.htm" class="ajax-popup-link">Basic line</a></li>
							<li><a href="Highcharts-6.0.4/examples/line-ajax/index.htm" class="ajax-popup-link">Ajax loaded data, clickable points</a></li>
							<li><a href="Highcharts-6.0.4/examples/line-labels/index.htm" class="ajax-popup-link">With data labels</a></li>
							<li><a href="Highcharts-6.0.4/examples/annotations/index.htm" class="ajax-popup-link">With annotations</a></li>
							<li><a href="Highcharts-6.0.4/examples/line-time-series/index.htm" class="ajax-popup-link">Time series, zoomable</a></li>
							<li><a href="Highcharts-6.0.4/examples/spline-inverted/index.htm" class="ajax-popup-link">Spline with inverted axes</a></li>
							<li><a href="Highcharts-6.0.4/examples/spline-symbols/index.htm" class="ajax-popup-link">Spline with symbols</a></li>
							<li><a href="Highcharts-6.0.4/examples/spline-plot-bands/index.htm" class="ajax-popup-link">Spline with plot bands</a></li>
							<li><a href="Highcharts-6.0.4/examples/spline-irregular-time/index.htm" class="ajax-popup-link">Time data with irregular intervals</a></li>
							<li><a href="Highcharts-6.0.4/examples/line-log-axis/index.htm" class="ajax-popup-link">Logarithmic axis</a></li>
							<li><a href="Highcharts-6.0.4/examples/line-boost/index.htm" class="ajax-popup-link">Line chart with 500k points</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#AreaCharts">Area charts</a>
					</h4>
				</div>
				<div id="AreaCharts" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="Highcharts-6.0.4/examples/area-basic/index.htm" class="ajax-popup-link">Basic area</a></li>
							<li><a href="Highcharts-6.0.4/examples/area-negative/index.htm" class="ajax-popup-link">Area with negative values</a></li>
							<li><a href="Highcharts-6.0.4/examples/area-stacked/index.htm" class="ajax-popup-link">Stacked area</a></li>
							<li><a href="Highcharts-6.0.4/examples/area-stacked-percent/index.htm" class="ajax-popup-link">Percentage area</a></li>
							<li><a href="Highcharts-6.0.4/examples/area-missing/index.htm" class="ajax-popup-link">Area with missing points</a></li>
							<li><a href="Highcharts-6.0.4/examples/area-inverted/index.htm" class="ajax-popup-link">Inverted axes</a></li>
							<li><a href="Highcharts-6.0.4/examples/areaspline/index.htm" class="ajax-popup-link">Area-spline</a></li>
							<li><a href="Highcharts-6.0.4/examples/arearange/index.htm" class="ajax-popup-link">Area range</a></li>
							<li><a href="Highcharts-6.0.4/examples/arearange-line/index.htm" class="ajax-popup-link">Area range and line</a></li>
							<li><a href="Highcharts-6.0.4/examples/sparkline/index.htm" class="ajax-popup-link">Sparkline charts</a></li>
							<li><a href="Highcharts-6.0.4/examples/streamgraph/index.htm" class="ajax-popup-link">Streamgraph</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#ColumnAndBarCharts">Column and bar charts</a>
					</h4>
				</div>
				<div id="ColumnAndBarCharts" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="Highcharts-6.0.4/examples/bar-basic/index.htm" class="ajax-popup-link">Basic bar</a></li>
							<li><a href="Highcharts-6.0.4/examples/bar-stacked/index.htm" class="ajax-popup-link">Stacked bar</a></li>
							<li><a href="Highcharts-6.0.4/examples/bar-negative-stack/index.htm" class="ajax-popup-link">Bar with negative stack</a></li>
							<li><a href="Highcharts-6.0.4/examples/column-basic/index.htm" class="ajax-popup-link">Basic column</a></li>
							<li><a href="Highcharts-6.0.4/examples/column-negative/index.htm" class="ajax-popup-link">Column with negative values</a></li>
							<li><a href="Highcharts-6.0.4/examples/column-stacked/index.htm" class="ajax-popup-link">Stacked column</a></li>
							<li><a href="Highcharts-6.0.4/examples/column-stacked-and-grouped/index.htm" class="ajax-popup-link">Stacked and grouped column</a></li>
							<li><a href="Highcharts-6.0.4/examples/column-stacked-percent/index.htm" class="ajax-popup-link">Stacked percentage column</a></li>
							<li><a href="Highcharts-6.0.4/examples/column-rotated-labels/index.htm" class="ajax-popup-link">Column with rotated labels</a></li>
							<li><a href="Highcharts-6.0.4/examples/column-drilldown/index.htm" class="ajax-popup-link">Column with drilldown</a></li>
							<li><a href="Highcharts-6.0.4/examples/column-placement/index.htm" class="ajax-popup-link">Fixed placement columns</a></li>
							<li><a href="Highcharts-6.0.4/examples/column-parsed/index.htm" class="ajax-popup-link">Data defined in a HTML table</a></li>
							<li><a href="Highcharts-6.0.4/examples/columnrange/index.htm" class="ajax-popup-link">Column range</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#PieCharts">Pie charts</a>
					</h4>
				</div>
				<div id="PieCharts" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="Highcharts-6.0.4/examples/pie-basic/index.htm" class="ajax-popup-link">Pie chart</a></li>
							<li><a href="Highcharts-6.0.4/examples/pie-legend/index.htm" class="ajax-popup-link">Pie with legend</a></li>
							<li><a href="Highcharts-6.0.4/examples/pie-donut/index.htm" class="ajax-popup-link">Donut chart</a></li>
							<li><a href="Highcharts-6.0.4/examples/pie-semi-circle/index.htm" class="ajax-popup-link">Semi circle donut</a></li>
							<li><a href="Highcharts-6.0.4/examples/pie-drilldown/index.htm" class="ajax-popup-link">Pie with drilldown</a></li>
							<li><a href="Highcharts-6.0.4/examples/pie-gradient/index.htm" class="ajax-popup-link">Pie with gradient fill</a></li>
							<li><a href="Highcharts-6.0.4/examples/pie-monochrome/index.htm" class="ajax-popup-link">Pie with monochrome fill</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#ScatterAndBubbleCharts">Scatter and bubble charts</a>
					</h4>
				</div>
				<div id="ScatterAndBubbleCharts" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="Highcharts-6.0.4/examples/scatter/index.htm" class="ajax-popup-link">Scatter plot</a></li>
							<li><a href="Highcharts-6.0.4/examples/scatter-boost/index.htm" class="ajax-popup-link">Scatter plot with 1 million points</a></li>
							<li><a href="Highcharts-6.0.4/examples/bubble/index.htm" class="ajax-popup-link">Bubble chart</a></li>
							<li><a href="Highcharts-6.0.4/examples/bubble-3d/index.htm" class="ajax-popup-link">3D bubbles</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#Combinations">Combinations</a>
					</h4>
				</div>
				<div id="Combinations" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="Highcharts-6.0.4/examples/synchronized-charts/index.htm" class="ajax-popup-link">Synchronized charts</a></li>
							<li><a href="Highcharts-6.0.4/examples/combo/index.htm" class="ajax-popup-link">Column, line and pie</a></li>
							<li><a href="Highcharts-6.0.4/examples/combo-dual-axes/index.htm" class="ajax-popup-link">Dual axes, line and column</a></li>
							<li><a href="Highcharts-6.0.4/examples/combo-multi-axes/index.htm" class="ajax-popup-link">Multiple axes</a></li>
							<li><a href="Highcharts-6.0.4/examples/combo-regression/index.htm" class="ajax-popup-link">Scatter with regression line</a></li>
							<li><a href="Highcharts-6.0.4/examples/combo-meteogram/index.htm" class="ajax-popup-link">Meteogram</a></li>
							<li><a href="Highcharts-6.0.4/examples/combo-timeline/index.htm" class="ajax-popup-link">Advanced timeline</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#StyledMode_CSSStyling">Styled mode (CSS styling)</a>
					</h4>
				</div>
				<div id="StyledMode_CSSStyling" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="Highcharts-6.0.4/examples/styled-mode-column/index.htm" class="ajax-popup-link">Styled mode column</a></li>
							<li><a href="Highcharts-6.0.4/examples/styled-mode-pie/index.htm" class="ajax-popup-link">Styled mode pie</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#DynamicCharts">Dynamic charts</a>
					</h4>
				</div>
				<div id="DynamicCharts" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="Highcharts-6.0.4/examples/dynamic-update/index.htm" class="ajax-popup-link">Spline updating each second</a></li>
							<li><a href="Highcharts-6.0.4/examples/dynamic-click-to-add/index.htm" class="ajax-popup-link">Click to add a point</a></li>
							<li><a href="Highcharts-6.0.4/examples/dynamic-master-detail/index.htm" class="ajax-popup-link">Master-detail chart</a></li>
							<li><a href="Highcharts-6.0.4/examples/chart-update/index.htm" class="ajax-popup-link">Update options after render</a></li>
							<li><a href="Highcharts-6.0.4/examples/responsive/index.htm" class="ajax-popup-link">Responsive chart</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#3DCharts">3D charts</a>
					</h4>
				</div>
				<div id="3DCharts" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="Highcharts-6.0.4/examples/3d-column-interactive/index.htm" class="ajax-popup-link">3D column</a></li>
							<li><a href="Highcharts-6.0.4/examples/3d-column-null-values/index.htm" class="ajax-popup-link">3D column with null and 0 values</a></li>
							<li><a href="Highcharts-6.0.4/examples/3d-column-stacking-grouping/index.htm" class="ajax-popup-link">3D column with stacking and grouping</a></li>
							<li><a href="Highcharts-6.0.4/examples/3d-pie/index.htm" class="ajax-popup-link">3D pie</a></li>
							<li><a href="Highcharts-6.0.4/examples/3d-pie-donut/index.htm" class="ajax-popup-link">3D donut</a></li>
							<li><a href="Highcharts-6.0.4/examples/3d-scatter-draggable/index.htm" class="ajax-popup-link">3D scatter chart</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#Gauges">Gauges</a>
					</h4>
				</div>
				<div id="Gauges" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="Highcharts-6.0.4/examples/gauge-speedometer/index.htm" class="ajax-popup-link">Gauge series</a></li>
							<li><a href="Highcharts-6.0.4/examples/gauge-solid/index.htm" class="ajax-popup-link">Solid gauge</a></li>
							<li><a href="Highcharts-6.0.4/examples/gauge-activity/index.htm" class="ajax-popup-link">Activity gauge</a></li>
							<li><a href="Highcharts-6.0.4/examples/gauge-clock/index.htm" class="ajax-popup-link">Clock</a></li>
							<li><a href="Highcharts-6.0.4/examples/gauge-dual/index.htm" class="ajax-popup-link">Gauge with dual axes</a></li>
							<li><a href="Highcharts-6.0.4/examples/gauge-vu-meter/index.htm" class="ajax-popup-link">VU meter</a></li>
							<li><a href="Highcharts-6.0.4/examples/bullet-graph/index.htm" class="ajax-popup-link">Bullet graph</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#HeatAndTreeMaps">Heat and tree maps</a>
					</h4>
				</div>
				<div id="HeatAndTreeMaps" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="Highcharts-6.0.4/examples/heatmap/index.htm" class="ajax-popup-link">Heat map</a></li>
							<li><a href="Highcharts-6.0.4/examples/heatmap-canvas/index.htm" class="ajax-popup-link">Large heat map</a></li>
							<li><a href="Highcharts-6.0.4/examples/honeycomb-usa/index.htm" class="ajax-popup-link">Tile map, honeycomb</a></li>
							<li><a href="Highcharts-6.0.4/examples/treemap-coloraxis/index.htm" class="ajax-popup-link">Tree map with color axis</a></li>
							<li><a href="Highcharts-6.0.4/examples/treemap-with-levels/index.htm" class="ajax-popup-link">Tree map with levels</a></li>
							<li><a href="Highcharts-6.0.4/examples/treemap-large-dataset/index.htm" class="ajax-popup-link">Large tree map</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#MoreChartTypes">More chart types</a>
					</h4>
				</div>
				<div id="MoreChartTypes" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="Highcharts-6.0.4/examples/polar/index.htm" class="ajax-popup-link">Polar chart</a></li>
							<li><a href="Highcharts-6.0.4/examples/polar-spider/index.htm" class="ajax-popup-link">Spiderweb</a></li>
							<li><a href="Highcharts-6.0.4/examples/sunburst/index.htm" class="ajax-popup-link">Sunburst</a></li>
							<li><a href="Highcharts-6.0.4/examples/polar-wind-rose/index.htm" class="ajax-popup-link">Wind rose</a></li>
							<li><a href="Highcharts-6.0.4/examples/parallel-coordinates/index.htm" class="ajax-popup-link">Parallel coordinates</a></li>
							<li><a href="Highcharts-6.0.4/examples/windbarb-series/index.htm" class="ajax-popup-link">Wind barb</a></li>
							<li><a href="Highcharts-6.0.4/examples/vector-plot/index.htm" class="ajax-popup-link">Vector plot</a></li>
							<li><a href="Highcharts-6.0.4/examples/box-plot/index.htm" class="ajax-popup-link">Box plot</a></li>
							<li><a href="Highcharts-6.0.4/examples/error-bar/index.htm" class="ajax-popup-link">Error bar</a></li>
							<li><a href="Highcharts-6.0.4/examples/waterfall/index.htm" class="ajax-popup-link">Waterfall</a></li>
							<li><a href="Highcharts-6.0.4/examples/variwide/index.htm" class="ajax-popup-link">Variwide</a></li>
							<li><a href="Highcharts-6.0.4/examples/variable-radius-pie/index.htm" class="ajax-popup-link">Variable radius pie</a></li>
							<li><a href="Highcharts-6.0.4/examples/histogram/index.htm" class="ajax-popup-link">Histogram</a></li>
							<li><a href="Highcharts-6.0.4/examples/bellcurve/index.htm" class="ajax-popup-link">Bell curve</a></li>
							<li><a href="Highcharts-6.0.4/examples/funnel/index.htm" class="ajax-popup-link">Funnel chart</a></li>
							<li><a href="Highcharts-6.0.4/examples/pyramid/index.htm" class="ajax-popup-link">Pyramid chart</a></li>
							<li><a href="Highcharts-6.0.4/examples/polygon/index.htm" class="ajax-popup-link">Polygon series</a></li>
							<li><a href="Highcharts-6.0.4/examples/pareto/index.htm" class="ajax-popup-link">Pareto chart</a></li>
							<li><a href="Highcharts-6.0.4/examples/sankey-diagram/index.htm" class="ajax-popup-link">Sankey diagram</a></li>
							<li><a href="Highcharts-6.0.4/examples/x-range/index.htm" class="ajax-popup-link">X-range series</a></li>
							<li><a href="Highcharts-6.0.4/examples/wordcloud/index.htm" class="ajax-popup-link">Word cloud</a></li>
							<li><a href="Highcharts-6.0.4/examples/renderer/index.htm" class="ajax-popup-link">General drawing</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div class="col-md-9">sdfsfdsfsdf</div>
		<!-- Side End -->
	</div>
	<div id="highstock" class="tab-pane fade">
		<h3>Menu 1</h3>
		<p>Some content in menu 1.</p>
	</div>
	<div id="highmaps" class="tab-pane fade">
		<h3>Menu 2</h3>
		<p>Some content in menu 2.</p>
	</div>
</div>
</body>
</html>