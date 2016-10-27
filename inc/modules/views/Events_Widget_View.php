<?php

$args = array (

    'posts_per_page' => ( !empty( $instance['scmod_events_limit'] ) ? (int)$instance['scmod_events_limit'] : -1 ),
    'post_type' => array ( 'event' ),
    'post_status' => array ( 'publish' ),
    'order' => 'DESC',
    'orderby' => 'date',
    'meta_query' => array (
        array (
            'key' => 'event_metadate',
            'value' => date( 'Y-m-d' ),
            'compare' => '>=',
            'type' => 'DATE',
        ),
    ),

);

// The Query
$events = new WP_Query( $args );

// The Loop
if ( $events->have_posts() ) : ?>

    <div class="vivita-events <?php echo isset( $instance['scmod_events_widget_width'] ) ? 'col-sm-' . $instance['scmod_events_widget_width'] : 'col-sm-12'; ?>">

        <h2 class="widget-title cpt-widget-title">
            <?php echo !empty( $instance['scmod_events_title'] ) ? esc_html( $instance['scmod_events_title'] ) : ''; ?>
        </h2>

        <div class="row">

            <?php $ctr = 0; ?>

            <?php while ( $events->have_posts() ) : ?>

                <?php $ctr++; ?>

                <?php $events->the_post(); ?>

                <div class="col-sm-6">

                    <div class="event-post">

                        <?php if ( has_post_thumbnail() ) : ?>

                            <a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>

                        <?php endif; ?>

                        <div class="event-details">

                            <h2 class="title">

                                <a target="_BLANK" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>">
                                    <?php echo the_title(); ?>
                                </a>

                            </h2>

                            <div class="location">
                                <?php echo get_post_meta( get_the_ID(), 'event_metalocation', true ); ?>
                            </div>

                            <div class="date">

                                <?php echo date( 'M jS, Y', strtotime( get_post_meta( get_the_ID(), 'event_metadate', true ) ) ); ?>

                                <?php echo date( 'g:i', strtotime( get_post_meta( get_the_ID(), 'event_metatime_start', true ) ) ); ?>
                                to <?php echo date( 'g:i a', strtotime( get_post_meta( get_the_ID(), 'event_metatime_end', true ) ) ); ?>

                            </div>

                            <div class="clear"></div>

                            <a class="apply accent-button" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>"><?php _e( 'Learn More', 'vivita') ?></a>

                        </div>

                    </div>

                </div>

            <?php endwhile; ?>

        </div>

    </div>

<?php else : ?>

    <h4 class="none-to-display"><?php _e( 'There are currently no upcoming events, please check again at a later time.', 'vivita' ); ?></h4>

<?php endif; ?>

<?php wp_reset_postdata(); ?>

<div class="clear"></div>