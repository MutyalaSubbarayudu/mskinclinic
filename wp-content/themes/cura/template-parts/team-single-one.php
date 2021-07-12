<?php
/**
 * Template part for displaying team single
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cura
 */

?>

<!-- team_single -->
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team_single style-one' ); ?>>
	<!-- team-profilebuzz -->
	<div class="team-profilebuzz">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<!-- team-profilebuzz-contactcard -->
				<div class="team-profilebuzz-contactcard">
					<h2><?php the_title(); ?></h2>
					<?php
					$terms = get_the_terms( get_the_ID(), 'profession' );
					if ( ! empty( $terms ) ) {
						foreach ( $terms as $term ) {
							echo '<p>' . esc_html( $term->name ) . '</p>';
						}
					}
					?>
					<hr>
					<h3><?php echo esc_html__( 'Qualification', 'cura' ); ?></h3>
					<?php if ( get_post_meta( get_the_ID(), 'qualification', true ) ) { ?>
						<p><?php echo esc_html( get_post_meta( get_the_ID(), 'qualification', true ) ); ?></p>
					<?php } ?>
					<h3><?php echo esc_html__( 'Contact Info', 'cura' ); ?></h3>
					<!-- contact -->
					<ul class="contact">
						<?php if ( get_post_meta( get_the_ID(), 'phone', true ) ) { ?>
							<li class="phone"><i class="fa fa-phone"></i> <a href="tel:<?php echo esc_html( get_post_meta( get_the_ID(), 'phone', true ) ); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr__( 'Make a Call', 'cura' ); ?>"><?php echo esc_html( get_post_meta( get_the_ID(), 'phone', true ) ); ?></a></li>
						<?php } ?>
						<?php if ( get_post_meta( get_the_ID(), 'email', true ) ) { ?>
							<li class="email"><i class="fa fa-envelope"></i> <a href="mailto:<?php echo esc_html( get_post_meta( get_the_ID(), 'email', true ) ); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_attr__( 'Send an Email', 'cura' ); ?>"><?php echo esc_html( get_post_meta( get_the_ID(), 'email', true ) ); ?></a></li>
						<?php } ?>
					</ul>
					<!-- contact -->
					<!-- social -->
					<ul class="social">
						<?php if ( get_post_meta( get_the_ID(), 'facebook', true ) ) { ?>
							<li class="facebook"><a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'facebook', true ) ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<?php } ?>
						<?php if ( get_post_meta( get_the_ID(), 'twitter', true ) ) { ?>
							<li class="twitter"><a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'twitter', true ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<?php } ?>
						<?php if ( get_post_meta( get_the_ID(), 'gplus', true ) ) { ?>
							<li class="google-plus"><a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'gplus', true ) ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<?php } ?>
						<?php if ( get_post_meta( get_the_ID(), 'linkedin', true ) ) { ?>
							<li class="linkedin"><a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'linkedin', true ) ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<?php } ?>
					</ul>
					<!-- social -->
				</div>
				<!-- team-profilebuzz-contactcard -->
				<!-- team-profilebuzz-timingcard -->
				<?php
				$gpminvoice_group = get_post_meta( $post->ID, 'customdata_group', true );
				if ( $gpminvoice_group ) :
					?>

				<div class="team-profilebuzz-timingcard">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<?php
								foreach ( $gpminvoice_group as $field ) {
									?>
								<tr>
									<td>
									<?php
									if ( '' != $field['TitleItem'] ) {
										echo esc_attr( $field['TitleItem'] );}
									?>
									</td>
									<td>
									<?php
									if ( '' != $field['TitleDescription'] ) {
										echo esc_attr( $field['TitleDescription'] );}
									?>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php endif; ?>
				<!-- team-profilebuzz-timingcard -->
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<?php
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile; // End of the loop.
				?>
			</div>
		</div>
	</div>
	<!-- team-profilebuzz -->
</div>
<!-- team_single -->
