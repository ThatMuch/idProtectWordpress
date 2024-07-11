<?php
// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];

?>
<div class="row">
	<div class="col-md-12">
		<div class="card__title">
			<h2 class="title"><span class="g-text">Intervention</span></h2>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	<?php if ( have_rows( 'intervention_card' ) ) : ?>
		<?php while ( have_rows( 'intervention_card' ) ) : the_row(); ?>
			<div class="col-auto">
				<div class="container-intervention">
					<div class="card-group operations-testimony">
						<div class="card" style="width:200px;">
								<?php $image = get_sub_field('image');  ?>
								<?php if ( !empty( $image ) ) : ?>
									<div class="zoom-centered-image">
										<img class="img-card"
										src="<?php echo esc_url($image['url']); ?>"
										alt="<?php echo esc_attr($image['alt']); ?>" />
										
										<div class="square">
											<div class="corner top-left">
												<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M3.1282 22.584C1.58733 22.584 0.338203 21.3349 0.338203 19.794L0.338204 8.63398C0.338204 4.01136 4.08558 0.263982 8.7082 0.263983L19.8682 0.263984C21.4091 0.263984 22.6582 1.51311 22.6582 3.05398C22.6582 4.59486 21.4091 5.84398 19.8682 5.84398L8.7082 5.84398C7.16733 5.84398 5.9182 7.09311 5.9182 8.63398L5.9182 19.794C5.9182 21.3349 4.66908 22.584 3.1282 22.584Z" fill="#17EB79"/>
												</svg>
											</div>
																				
											<div class="corner top-right">
												<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M0.226562 3.05398C0.226562 1.51311 1.47569 0.263985 3.01656 0.263985L14.1766 0.263984C18.7992 0.263984 22.5466 4.01136 22.5466 8.63398L22.5466 19.794C22.5466 21.3349 21.2974 22.584 19.7566 22.584C18.2157 22.584 16.9666 21.3349 16.9666 19.794L16.9666 8.63398C16.9666 7.09311 15.7174 5.84398 14.1766 5.84398L3.01656 5.84398C1.47569 5.84398 0.226562 4.59486 0.226562 3.05398Z" fill="#17EB79"/>
												</svg>
											</div>
											<div class="corner bottom-left">
												<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M23.0312 20.0564C23.0312 21.5972 21.7821 22.8464 20.2412 22.8464L9.08125 22.8464C4.45862 22.8464 0.711249 19.099 0.71125 14.4764L0.71125 3.31637C0.71125 1.77549 1.96037 0.526366 3.50125 0.526366C5.04212 0.526366 6.29125 1.77549 6.29125 3.31637L6.29125 14.4764C6.29125 16.0172 7.54037 17.2664 9.08125 17.2664L20.2412 17.2664C21.7821 17.2664 23.0312 18.5155 23.0312 20.0564Z" fill="#17EB79"/>
												</svg>
											</div>
											<div class="corner bottom-right">
												<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M19.7566 0.526367C21.2974 0.526367 22.5466 1.77549 22.5466 3.31637V14.4764C22.5466 19.099 18.7992 22.8464 14.1766 22.8464H3.01656C1.47569 22.8464 0.226562 21.5972 0.226562 20.0564C0.226562 18.5155 1.47569 17.2664 3.01656 17.2664H14.1766C15.7174 17.2664 16.9666 16.0172 16.9666 14.4764V3.31637C16.9666 1.77549 18.2157 0.526367 19.7566 0.526367Z" fill="#17EB79"/>
												</svg>
											</div>
										</div>

										<div class="triangle">
											<svg xmlns="http://www.w3.org/2000/svg" width="10" height="13" viewBox="0 0 24 27" fill="none">
												<path d="M22.2118 11.1858L4.1519 0.367709C3.76564 0.144665 3.32771 0.0266486 2.88168 0.0253997C2.43565 0.0241508 1.99706 0.139713 1.60956 0.36059C1.22206 0.581467 0.899141 0.899958 0.672941 1.28438C0.446742 1.6688 0.325139 2.10575 0.320237 2.55175L0.320236 24.1878C0.325138 24.6338 0.446741 25.0708 0.67294 25.4552C0.89914 25.8396 1.22205 26.1581 1.60956 26.379C1.99706 26.5999 2.43564 26.7154 2.88168 26.7142C3.32771 26.7129 3.76563 26.5949 4.15189 26.3719L22.2118 15.5538C22.5871 15.3262 22.8975 15.0056 23.1129 14.623C23.3283 14.2404 23.4414 13.8088 23.4414 13.3698C23.4414 12.9308 23.3283 12.4992 23.1129 12.1166C22.8975 11.734 22.5871 11.4134 22.2118 11.1858V11.1858Z" fill="white"/>
											</svg>
										</div>
									</div>
								<?php endif; ?>
								<p style="color: red;"><?php echo get_sub_field('author'); ?><p>
								<p><?php echo get_sub_field('case'); ?><p>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
