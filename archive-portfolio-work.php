<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="workIntro">
			<div class="intro">
				<h1>Works</h1>
				<p>A collection of my featured technical projects as a front-end developer.</br>
				Stay tune for more...</p>
			</div>
			<a href="#firstwork" class="seeWork">
				<span></span>
				<span></span>
				<span></span>
			</a>
		</div>
		
		<?php
		$args = array(
			'post_type'      => 'portfolio-work',
			'posts_per_page' => -1,
			'order'          => 'DESC',
			'orderby'        => 'post_date'
		);

		$query = new WP_Query( $args );
		
		if ( $query->have_posts() ) : ?>
			<section class="works">
				<?php
				
				while ( $query -> have_posts() ) {
					$terms=get_the_term_list($post->ID,'portfolio-work-category','','');
					$query -> the_post();
					global $wp_query;
					$thePostID = $wp_query->post->ID;
					$latestID = $post->ID;
					if( $thePostID == $latestID) :?>
						<article class="single-work" id="firstwork">
					<?php
					else : ?>
						<article class="single-work">
					<?php
					endif;
					?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
						<div class="singleWorkInfo">
							<h2><?php the_title(); ?></h2>
							<?php the_excerpt();?>
							<div class="more-info-button">
							<button class="read-more-link"><a href="<?php the_permalink(); ?>"><?php _e( 'Read More' ); ?></a></button>
							</div>
						</div>
					</article>
					<?php
				}
				wp_reset_postdata();
				?>
			</section>
			<?php
		endif;
		?>
	
	</main><!-- #main -->
	
<?php
get_footer();
