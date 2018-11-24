<?php /* Template Name: Speaker Profile */ ?>
<?php get_header(); ?>
<div id="body-wrapper">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="content-wrapper" class="post-margin-top" itemscope itemtype="http://schema.org/Article">
		<article <?php post_class(); ?>>
			<div id="post-header">
				<?php if ( ! is_singular( 'scoreboard' )) { ?>
					<h3 class="post-cat">Speakers</h3>
				<?php } ?>
				<h1 class="story-title entry-title" itemprop="name headline"><?php the_title(); ?></h1>
			</div><!--post-header-->
			<?php $socialbox = get_option('mvp_social_box'); if ($socialbox == "true") { ?>
				<div class="social-sharing-top">
					<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>', 'facebookShare', 'width=626,height=436'); return false;" title="Share on Facebook"><div class="facebook-share"><span class="fb-but1"></span><p><?php _e( 'Share', 'mvp-text' ); ?></p></div></a>
					<a href="#" onclick="window.open('http://twitter.com/share?text=<?php the_title(); ?> -&url=<?php the_permalink() ?>', 'twitterShare', 'width=626,height=436'); return false;" title="Tweet This Post"><div class="twitter-share"><span class="twitter-but1"></span><p><?php _e( 'Tweet', 'mvp-text' ); ?></p></div></a>
					<a href="#" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumb' ); echo $thumb['0']; ?>&description=<?php the_title(); ?>', 'pinterestShare', 'width=750,height=350'); return false;" title="Pin This Post"><div class="pinterest-share"><span class="pinterest-but1"></span><p><?php _e( 'Share', 'mvp-text' ); ?></p></div></a>
					<a href="#" onclick="window.open('https://plusone.google.com/_/+1/confirm?hl=en-US&url=<?php the_permalink() ?>', 'googleShare', 'width=626,height=436'); return false;" title="Share on Google+" target="_blank"><div class="google-share"><span class="google-but1"></span><p><?php _e( 'Share', 'mvp-text' ); ?></p></div></a>
					<a href="<?php comments_link(); ?>"><div class="social-comments"><p><?php comments_number(__( '0 comments', 'mvp-text'), __('1 comment', 'mvp-text'), __('% comments', 'mvp-text'));?></p></div></a>
				</div><!--social-sharing-top-->
			<?php } ?>
			<?php $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if ($mvp_post_temp == "fullwidth") { ?>
			<?php } else { ?>
			<div id="content-main">
				<div id="content-main-inner">
			<?php } ?>
				<div id="post-area">
					<?php $mvp_featured_img = get_option('mvp_featured_img'); if ($mvp_featured_img == "true") { ?>
						<?php if(get_post_meta($post->ID, "mvp_video_embed", true)): ?>
							<div id="video-embed" class="post-section">
								<?php echo get_post_meta($post->ID, "mvp_video_embed", true); ?>
							</div><!--video-embed-->
						<?php else: ?>
							<?php $mvp_show_hide = get_post_meta($post->ID, "mvp_featured_image", true); if ($mvp_show_hide == "hide") { ?>
							<?php } else { ?>
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<div id="featured-image">
										<?php $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if ($mvp_post_temp == "fullwidth") { ?>
											<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
										<?php } else { ?>
											<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumb' ); ?>
										<?php } ?>
										<img itemprop="image" src="<?php echo $thumb['0']; ?>" />
									</div><!--featured-image-->
									<?php if(get_post_meta($post->ID, "mvp_photo_credit", true)): ?>
										<div id="featured-caption">
											<?php echo get_post_meta($post->ID, "mvp_photo_credit", true); ?>
										</div><!--featured-caption-->
									<?php endif; ?>
								<?php } ?>
							<?php } ?>
						<?php endif; ?>
					<?php } ?>
					<div id="content-area" class="post-section" itemprop="articleBody">
						<?php the_content(); ?>

                        <?php
                        $sessions = get_field('session');
                        if ($sessions): ?>
                            <span class="meta-title"><?php _e('Sessions:', 'session'); ?></span>
                            <ul>
                            <?php foreach ($sessions as $session): ?>
                                <li><a href="<?php echo get_permalink($session->ID); ?>"><?php echo get_the_title($session->ID); ?></a></li>
                            <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

						<?php wp_link_pages(); ?>
						<?php if(get_option('mvp_article_ad')) { ?>
							<div id="article-ad">
								<?php $articlead = get_option('mvp_article_ad'); if ($articlead) { echo stripslashes($articlead); } ?>
							</div><!--article-ad-->
						<?php } ?>
					</div><!--content-area-->
					<?php $socialbox = get_option('mvp_social_box'); if ($socialbox == "true") { ?>
						<div class="social-sharing-bottom post-section">
							<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>', 'facebookShare', 'width=626,height=436'); return false;" title="Share on Facebook"><div class="facebook-share"><span class="fb-but1"></span><p><?php _e( 'Share', 'mvp-text' ); ?></p></div></a>
							<a href="#" onclick="window.open('http://twitter.com/share?text=<?php the_title(); ?> -&url=<?php the_permalink() ?>', 'twitterShare', 'width=626,height=436'); return false;" title="Tweet This Post"><div class="twitter-share"><span class="twitter-but1"></span><p><?php _e( 'Tweet', 'mvp-text' ); ?></p></div></a>
							<a href="#" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumb' ); echo $thumb['0']; ?>&description=<?php the_title(); ?>', 'pinterestShare', 'width=750,height=350'); return false;" title="Pin This Post"><div class="pinterest-share"><span class="pinterest-but1"></span><p><?php _e( 'Share', 'mvp-text' ); ?></p></div></a>
							<a href="#" onclick="window.open('https://plusone.google.com/_/+1/confirm?hl=en-US&url=<?php the_permalink() ?>', 'googleShare', 'width=626,height=436'); return false;" title="Share on Google+" target="_blank"><div class="google-share"><span class="google-but1"></span><p><?php _e( 'Share', 'mvp-text' ); ?></p></div></a>
							<a href="<?php comments_link(); ?>"><div class="social-comments"><p><?php comments_number(__( '0 comments', 'mvp-text'), __('1 comment', 'mvp-text'), __('% comments', 'mvp-text'));?></p></div></a>
						</div><!--social-sharing-bottom-->
					<?php } ?>
				</div><!--post-area-->
				<?php if ( ! is_singular( 'scoreboard' )) { ?>

					<?php $author = get_option('mvp_author_box'); if ($author == "true") { ?>
						<div id="author-wrapper" class="post-section">
							<h4 class="post-header"><span class="post-header"><?php _e( 'About', 'mvp-text' ); ?> <?php the_author(); ?> </span></h4>
							<div id="author-info">
								<?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
								<div id="author-text">
									<p><?php the_author_meta('description'); ?></p>
									<ul>
										<?php $authordesc = get_the_author_meta( 'facebook' ); if ( ! empty ( $authordesc ) ) { ?>
										<li class="fb-item">
											<a href="<?php the_author_meta('facebook'); ?>" alt="Facebook" class="fb-but" target="_blank"></a>
										</li>
										<?php } ?>
										<?php $authordesc = get_the_author_meta( 'twitter' ); if ( ! empty ( $authordesc ) ) { ?>
										<li class="twitter-item">
											<a href="<?php the_author_meta('twitter'); ?>" alt="Twitter" class="twitter-but" target="_blank"></a>
										</li>
										<?php } ?>
										<?php $authordesc = get_the_author_meta( 'pinterest' ); if ( ! empty ( $authordesc ) ) { ?>
										<li class="pinterest-item">
											<a href="<?php the_author_meta('pinterest'); ?>" alt="Pinterest" class="pinterest-but" target="_blank"></a>
										</li>
										<?php } ?>
										<?php $authordesc = get_the_author_meta( 'googleplus' ); if ( ! empty ( $authordesc ) ) { ?>
										<li class="google-item">
											<a href="<?php the_author_meta('googleplus'); ?>" alt="Google Plus" class="google-but" target="_blank"></a>
										</li>
										<?php } ?>
										<?php $authordesc = get_the_author_meta( 'instagram' ); if ( ! empty ( $authordesc ) ) { ?>
										<li class="instagram-item">
											<a href="<?php the_author_meta('instagram'); ?>" alt="Instagram" class="instagram-but" target="_blank"></a>
										</li>
										<?php } ?>
										<?php $authordesc = get_the_author_meta( 'linkedin' ); if ( ! empty ( $authordesc ) ) { ?>
										<li class="linkedin-item">
											<a href="<?php the_author_meta('linkedin'); ?>" alt="Linkedin" class="linkedin-but" target="_blank"></a>
										</li>
										<?php } ?>
									</ul>
								</div><!--author-text-->
							</div><!--author-info-->
						</div><!--author-wrapper-->
					<?php } ?>
				<?php } ?>
				<?php comments_template(); ?>
			<?php $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if ($mvp_post_temp == "fullwidth") { ?>
			<?php } else { ?>
					</div><!--content-main-inner-->
				</div><!--content-main-->
			<?php } ?>
			<?php endwhile; endif; ?>
			<?php $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if ($mvp_post_temp == "fullwidth") { ?>
			<?php } else { ?>
				<?php get_sidebar(); ?>
			<?php } ?>
		</article>
	</div><!--content-wrapper-->
</div><!--body-wrapper-->
<?php get_footer(); ?>
