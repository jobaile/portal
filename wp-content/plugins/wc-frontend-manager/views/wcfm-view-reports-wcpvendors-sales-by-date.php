<?php
global $wp, $WCFM, $wpdb;

if( isset( $wp->query_vars['wcfm-reports-sales-by-date'] ) && !empty( $wp->query_vars['wcfm-reports-sales-by-date'] ) ) {
	$wcfm_report_type = $wp->query_vars['wcfm-reports-sales-by-date'];
}

include_once( $WCFM->plugin_path . 'includes/reports/class-wcpvendors-report-sales-by-date.php' );

$wcfm_report_sales_by_date = new WC_Product_Vendors_Vendor_Report_Sales_By_Date();

$ranges = array(
	'year'         => __( 'Year', 'wc-frontend-manager' ),
	'last_month'   => __( 'Last Month', 'wc-frontend-manager' ),
	'month'        => __( 'This Month', 'wc-frontend-manager' ),
	'7day'         => __( 'Last 7 Days', 'wc-frontend-manager' )
);

$wcfm_report_sales_by_date->chart_colors = array(
			'sales_amount'     => '#b1d4ea',
			'net_sales_amount' => '#3498db',
			'average'          => '#95a5a6',
			'order_count'      => '#dbe1e3',
			'item_count'       => '#ecf0f1',
			'shipping_amount'  => '#FF7400',
			'earned'           => '#4096EE',
			'commission'       => '#00897b',
		);

$current_range = ! empty( $_GET['range'] ) ? sanitize_text_field( $_GET['range'] ) : '7day';

if ( ! in_array( $current_range, array( 'custom', 'year', 'last_month', 'month', '7day' ) ) ) {
	$current_range = '7day';
}

$wcfm_report_sales_by_date->calculate_current_range( $current_range );

?>

<div class="collapse wcfm-collapse" id="wcfm_report_details">

  <div class="wcfm-page-headig">
		<span class="fa fa-line-chart"></span>
		<span class="wcfm-page-heading-text">
		  <?php if ( 'custom' === $current_range && isset( $_GET['start_date'], $_GET['end_date'] ) ) : ?>
			<?php _e('Sales BY Date', 'wc-frontend-manager'); ?> - <?php echo esc_html( sprintf( _x( 'From %s to %s', 'start date and end date', 'wc-frontend-manager' ), wc_clean( $_GET['start_date'] ), wc_clean( $_GET['end_date'] ) ) ); ?><span></span>
			<?php else : ?>
				<?php _e('Sales BY Date', 'wc-frontend-manager'); ?> - <?php echo esc_html( $ranges[ $current_range ] ); ?><span></span>
			<?php endif; ?>
		</span>
		<?php do_action( 'wcfm_page_heading' ); ?>
	</div>
	<div class="wcfm-collapse-content">
	  <div id="wcfm_page_load"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>
		<?php require_once( $WCFM->library->views_path . 'wcfm-view-reports-menu.php' ); ?>
		<div class="wcfm-clearfix"></div>
		<div class="wcfm-container">
			<div id="wcfm_reports_sales_by_date_expander" class="wcfm-content">
			
				<?php
					include( $WCFM->plugin_path . '/views/reports/wcfm-html-report-sales-by-date.php');
				?>
			
			</div>
		</div>
	</div>
</div>