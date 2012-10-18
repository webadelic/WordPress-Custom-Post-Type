<?php
/*
Template Name: Portfolio Post Type
*/
?>
<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
			
	<?php 
    $args = array(
        'post_type' => 'portfolio',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'posts_per_page' => -1
    );
    $query = new WP_Query( $args );

	while ( $query->have_posts() ) : $query->the_post(); 
	?>
	
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	
		<?php if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
		
			<div class="portfolio-hero"><a title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large-feature'); ?></a></div>
			
		<?php } ?>
	
		<header class="entry-header">
			<h2 class="entry-title"><a href="%3$s" title="Permalink to %4$s" rel="bookmark"><?php the_title(); ?></a></h2>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

	</article>	
					
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>