<?php
	/**
	 * The template for displaying comments
	 *
	 * This is the template that displays the area of the page that contains both the current comments
	 * and the comment form.
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package cura
	 */

	/*
	* If the current post is protected by a password and
	* the visitor has not yet entered the password we will
	* return early without loading the comments.
	*/

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
		// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html_e( 'One Comment', 'cura' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Comment', '%1$s Comments', $comment_count, 'comments title', 'cura' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
			</h2><!-- .comments-title -->

			<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<div class="nav-links">
					<div class="nav-previous">
						<strong><?php previous_comments_link( esc_html__( 'Older Comments', 'cura' ) ); ?></strong>
					</div>
					<div class="nav-next">
						<strong><?php next_comments_link( esc_html__( 'Newer Comments', 'cura' ) ); ?></strong>
					</div>
				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->
				<?php
				// Check for comment navigation.
			endif;
			?>

			<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 65,
					)
				);
			?>
			</ol><!-- .comment-list -->

			<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				?>
				<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
					<div class="nav-links">
						<div class="nav-previous">
							<strong><?php previous_comments_link( esc_html__( 'Older Comments', 'cura' ) ); ?></strong>
						</div>
						<div class="nav-next">
							<strong><?php next_comments_link( esc_html__( 'Newer Comments', 'cura' ) ); ?></strong>
						</div>
					</div><!-- .nav-links -->
				</nav><!-- #comment-nav-below -->
				<?php
				// Check for comment navigation.
			endif;

				endif;

				// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>

	<p class="no-comments">
		<?php esc_html_e( 'Comments are closed.', 'cura' ); ?>
	</p>
		<?php
		endif;

		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$aria_req  = ( $req ? " aria-required='true'" : '' );

		$comments_args = array(
			'fields'        => apply_filters(
				'comment_form_default_fields',
				array(
					'author' => '<p class="comment-form-author"><input id="author" placeholder="' . esc_attr__( 'Your Name *', 'cura' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
					'email'  => '<p class="comment-form-email"><input id="email" placeholder="' . esc_attr__( 'Your Email *', 'cura' ) . '" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
					'url'    => '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'cura' ) . '" type="text" value="' . esc_url( $commenter['comment_author_url'] ) . '" size="30" /></p>',
				)
			),
			'comment_field' => '<p class = "comment-form-comment"><textarea id = "comment" name = "comment" aria-required = "true" placeholder = "' . esc_attr__( 'Your Comment *', 'cura' ) . '"></textarea></p>',
		);
		comment_form( $comments_args );
		?>
</div><!-- #comments -->
