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
        <?php echo ucfirst(get_field('session_type')); ?>:
        <?php if ( is_front_page() && ! is_home() ) {

            // The excerpt is being displayed within a front page section, so it's a lower hierarchy than h2.
            the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
        } else {
            the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
        } ?>
    </header><!-- .entry-header -->

    <div class="entry-summary">
        <?php
        $speakers = get_field('speakers');
        if ($speakers) {
            foreach($speakers as $speaker) {
                if (has_post_thumbnail($speaker)) {
                    ?>
                    <a href="<?php get_permalink($speaker->ID) ?>" class="speaker-img" rel="bookmark" title="<?php get_the_title($speaker->ID); ?>"><?php get_the_post_thumbnail($speaker->ID, 'medium-thumb'); ?></a>
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