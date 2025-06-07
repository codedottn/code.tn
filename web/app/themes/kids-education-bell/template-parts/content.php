<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kids Education Bell
 */
?>
<?php 
	$enable_category     = kids_education_bell_get_option( 'latest_category_enable' );
	$enable_author     = kids_education_bell_get_option( 'latest_author_enable' );
	$enable_comment     = kids_education_bell_get_option( 'latest_comment_enable' );
	$enable_read_more_text     = kids_education_bell_get_option( 'latest_read_more_text_enable' );
    $enable_posted_on     = kids_education_bell_get_option( 'latest_posted_on_enable' );
    $enable_video = kids_education_bell_get_option( 'latest_video_enable' );
    $header_font_size = kids_education_bell_get_option( 'latest_font_size');
	$latest_readmore_text = kids_education_bell_get_option( 'latest_readmore_text' );
	$blog_layout_content_type = kids_education_bell_get_option( 'blog_layout_content_type' );
	$content_align = kids_education_bell_get_option( 'archive_content_align' );
	$background_image_enable = kids_education_bell_get_option( 'background_image_enable' );
 ?>


<?php if ($blog_layout_content_type=='blog-four'){ ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?> style="width: 100%;">
		<div class="post-item">
			<?php if ($enable_category ==true): ?>
				<div class="entry-meta post-cat <?php echo esc_attr($content_align); ?>">
					<?php kids_education_bell_entry_meta(); ?>
				</div><!-- .entry-meta -->
			<?php endif ?>
			<header class="entry-header <?php echo esc_attr($content_align); ?>">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title" style="font-size:'. esc_attr($header_font_size).'px; ">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title" style="font-size:'. esc_attr($header_font_size).'px; "><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->
			<?php if (($enable_comment ==true) || ($enable_author ==true) || ($enable_posted_on ==true)): ?>
				<div class="entry-meta posted-on <?php echo esc_attr($content_align); ?>">
					<?php
						if ($enable_posted_on ==true):
						 	kids_education_bell_posted_on(); 
						endif; 
					?>
					<?php 
						if ($enable_comment ==true):
						 	kids_education_bell_comment(); 
						endif;
					?>
					<?php 
						if ($enable_author ==true):
						 	kids_education_bell_author(); 
						endif; 
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			<?php if ($background_image_enable==true){ ?>
				<div class="background-featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
		            <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
		        </div><!-- .featured-image -->
			<?php  } else{ ?>
				<div class="post-featured-image">
					<div class="featured-image">
				        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
					</div><!-- .featured-post-image -->
				</div>
			<?php } ?>
			<div class="entry-container <?php echo esc_attr($content_align); ?>">

				<div class="entry-content">
					<?php the_excerpt(); ?>
					<?php if (!empty ($latest_readmore_text) && $enable_read_more_text==true): ?>
						<a href="<?php the_permalink();?>" class="read-more-text"><?php echo esc_html($latest_readmore_text);?></a> 
					<?php endif ?>
				</div><!-- .entry-content -->
				
		        <?php if (!empty ($latest_readmore_text) && $enable_read_more_text==false) { ?>
		          	<div class="latest-read-more"><a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($latest_readmore_text);?></a> </div>
	        	<?php } ?>
			</div><!-- .entry-container -->
			
		</div><!-- .post-item -->
	</article><!-- #post-## -->
<?php } elseif($blog_layout_content_type=='blog-six'){ ?>
	<article id="post-<?php the_ID(); ?>">
			
		<div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
            <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
        </div><!-- .featured-image -->
		<div class="entry-container <?php echo esc_attr($content_align); ?>">
			<header class="entry-header">
				<?php if ($enable_category ==true): ?>
					<div class="entry-meta post-cat">
						<?php kids_education_bell_entry_meta(); ?>
					</div><!-- .entry-meta -->
				<?php endif ?>
				
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title" style="font-size:'. esc_attr($header_font_size).'px; ">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title" style="font-size:'. esc_attr($header_font_size).'px; "><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->
			

			<div class="entry-content">
				<?php the_excerpt(); ?>
				<?php if (!empty ($latest_readmore_text) && $enable_read_more_text==true): ?>
					<a href="<?php the_permalink();?>" class="read-more-text"><?php echo esc_html($latest_readmore_text);?></a> 
				<?php endif ?>
				<?php if (($enable_posted_on ==true || ($enable_comment ==true) || ($enable_author ==true)) ): ?>
				<div class="entry-meta posted-on">
					<?php 
						if ($enable_comment ==true):
						 	kids_education_bell_comment(); 
						endif;
					?>
					<?php 
						if ($enable_author ==true):
						 	kids_education_bell_author(); 
						endif; ?>
					<?php
						if ($enable_posted_on ==true):
						 	kids_education_bell_posted_on(); 
						endif; 
						?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			</div><!-- .entry-content -->
		</div><!-- .entry-container -->
	</article><!-- #post-## -->

<?php } else { ?>
	<article id="post-<?php the_ID(); ?>" <?php if ($blog_layout_content_type=='blog-one'){ post_class( 'grid-item clear' ); } else{post_class();} ?>>
		<div class="post-item">
			<?php 
				$video_url = get_post_meta( get_the_ID(), 'kids-education-bell-video-url', true );
	            if ( ! empty( $video_url ) && ($enable_video==true) && ($blog_layout_content_type=='blog-one'|| $blog_layout_content_type=='blog-three')) { ?>
					<div class="featured-video">
			            <?php echo do_shortcode( '[video src="' . esc_url( $video_url ) . '"]' );?>
			        </div><!-- .featured-image -->
			    <?php } else { ?>
			    		<?php if ($blog_layout_content_type=='blog-two'||$blog_layout_content_type=='blog-three'|| $blog_layout_content_type=='blog-five' || $blog_layout_content_type=='blog-six'){ ?>
			    			<div class="post-featured-image">
				    			<div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
			                        <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
			                    </div><!-- .featured-image -->
		                    </div>
			    			
			    		<?php } else{ ?>
						<div class="post-featured-image">
							<div class="featured-image">
						        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
							</div><!-- .featured-post-image -->
						</div>
					<?php } } ?>

			<div class="entry-container <?php echo esc_attr($content_align); ?>">
				<header class="entry-header">
					<?php if ($enable_category ==true): ?>
						<div class="entry-meta post-cat">
							<?php kids_education_bell_entry_meta(); ?>
						</div><!-- .entry-meta -->
					<?php endif ?>
					
					<?php
					if ( is_single() ) :
						the_title( '<h1 class="entry-title" style="font-size:'. esc_attr($header_font_size).'px; ">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title" style="font-size:'. esc_attr($header_font_size).'px; "><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif; ?>
				</header><!-- .entry-header -->
				<?php if (($enable_posted_on ==true || ($enable_comment ==true) || ($enable_author ==true)) && ($blog_layout_content_type=='blog-two' || $blog_layout_content_type=='blog-three'|| $blog_layout_content_type=='blog-five')): ?>
					<div class="entry-meta posted-on">
						<?php 
							if ($enable_comment ==true):
							 	kids_education_bell_comment(); 
							endif;
						?>
						<?php 
							if ($enable_author ==true):
							 	kids_education_bell_author(); 
							endif; ?>
						<?php
							if ($enable_posted_on ==true):
							 	kids_education_bell_posted_on(); 
							endif; 
							?>
					</div><!-- .entry-meta -->
				<?php endif; ?>

				<div class="entry-content">
					<?php the_excerpt(); ?>
					<?php if (!empty ($latest_readmore_text) && $enable_read_more_text==true): ?>
						<a href="<?php the_permalink();?>" class="read-more-text"><?php echo esc_html($latest_readmore_text);?></a> 
					<?php endif ?>
				</div><!-- .entry-content -->
				<?php if (($enable_posted_on ==true || ($enable_comment ==true) || ($enable_author ==true)) && $blog_layout_content_type=='blog-one'): ?>
					<div class="entry-meta posted-on">
						<?php 
							if ($enable_comment ==true):
							 	kids_education_bell_comment(); 
							endif;
						?>
						<?php 
							if ($enable_author ==true):
							 	kids_education_bell_author(); 
							endif; ?>
						<?php
							if ($enable_posted_on ==true):
							 	kids_education_bell_posted_on(); 
							endif; 
							?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
				
		        <?php if (!empty ($latest_readmore_text) && $enable_read_more_text==false) { ?>
		          	<div class="latest-read-more"><a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($latest_readmore_text);?></a> </div>
	        	<?php } ?>
			</div><!-- .entry-container -->
			
		</div><!-- .post-item -->
	</article><!-- #post-## -->
<?php } ?>