<?php /* Template Name: Speaker List */
get_header(); ?>

    <div class="wrap">

        <?php if ( have_posts() ) : ?>
            <header class="page-header">
                <h1 class="page-title">Sessions</h1>
                <?php
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
            </header><!-- .page-header -->
        <?php endif; ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php
                if ( have_posts() ) : ?>
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <header class="entry-header">
                                <?php if ( 'post' === get_post_type() ) : ?>
                                    <div class="entry-meta">
                                        <?php
                                        echo twentyseventeen_time_link();
                                        twentyseventeen_edit_link();
                                        ?>
                                    </div><!-- .entry-meta -->
                                <?php elseif ( 'page' === get_post_type() && get_edit_post_link() ) : ?>
                                    <div class="entry-meta">
                                        <?php twentyseventeen_edit_link(); ?>
                                    </div><!-- .entry-meta -->
                                <?php endif; ?>
                                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                <h5>
                                    <?php echo ucfirst(get_field('session_type')); ?> by
                                    <?php
                                    $speakers = get_field('speakers');
                                    $i = 0;
                                    if ($speakers) {
                                        foreach($speakers as $speaker) {
                                            echo $i !== 0 ?  ' &amp ' : '';
                                            echo get_the_title($speaker->ID);
                                            $i++;
                                        }
                                    }
                                    ?>
                                </h5>
                            </header><!-- .entry-header -->

                            <div class="entry-summary">
                                <?php
                                $speakers = get_field('speakers');
                                if ($speakers) {
                                    foreach($speakers as $speaker) {
                                        if (has_post_thumbnail($speaker)) {
                                            ?>
                                            <a href="<?php echo get_permalink($speaker->ID) ?>" class="speaker-img" rel="bookmark" title="<?php echo get_the_title($speaker->ID); ?>"><?php echo get_the_post_thumbnail($speaker->ID, 'medium-thumb'); ?></a>
                                            <?php
                                        } else { ?>
                                            <p><a href="<?php echo get_permalink($speaker->ID) ?>" class="speaker-img" rel="bookmark" title="<?php echo get_the_title($speaker->ID); ?>"><?php echo get_the_title($speaker->ID); ?></a></p>
                                            <?php
                                        }
                                    }
                                    ?>
                                <?php } elseif (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium-thumb'); ?></a>
                                <?php } ?>

                                <?php the_excerpt(); ?>
                            </div><!-- .entry-summary -->

                        </article><!-- #post-## -->

                    <?php endwhile;

                    the_posts_pagination( array(
                        'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
                        'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
                    ) );

                else :

                    get_template_part( 'template-parts/post/content', 'none' );

                endif; ?>

            </main><!-- #main -->
        </div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div><!-- .wrap -->

<?php get_footer();