<?php
/* ------------------------------------------------------------------------- *
 *  Tabs Widget
/* ------------------------------------------------------------------------- */

// Setup Widget
class AC_Tabs_Widget extends WP_Widget {

	function __construct() {
		// Settings
		$widget_ops = array( 'classname' => 'ac_tabs_widget', 'description' => esc_html__('Custom designed tabs for your main sidebar', 'justwrite') );

		// Create the widget
		parent::__construct( 'ac_tabs_widget', esc_html__('AC: Tabs', 'justwrite'), $widget_ops );

		// Default values
		$this->defaults = array (
				'show_popular_posts'		=> false,
				'show_featured_posts'		=> false,
				'show_recent_posts'			=> false,
				'show_recent_comments'		=> false,
				'show_tags'					=> false,
				'popular_posts_number'		=> 3,
				'featured_posts_number' 	=> 3,
				'recent_posts_number' 		=> 3,
				'recent_comments_number' 	=> 5,
				'hide_recent_thumbs' 		=> false
		);
	}

	function widget( $args, $instance ) {
		// Turn $args array into variables.
		extract( $args );

		// $instance Defaults
		$instance_defaults = $this->defaults;

		// Parse $instance
		$instance = wp_parse_args( $instance, $instance_defaults );

		// Widget Settings
		$show_popular_posts 	= ! empty( $instance['show_popular_posts'] ) ? 1 : 0;
		$show_featured_posts	= ! empty( $instance['show_featured_posts'] ) ? 1 : 0;
		$show_recent_posts		= ! empty( $instance['show_recent_posts'] ) ? 1 : 0;
		$show_recent_comments	= ! empty( $instance['show_recent_comments'] ) ? 1 : 0;
		$show_tags				= ! empty( $instance['show_tags'] ) ? 1 : 0;


		// How Many Posts Settings
		$popular_posts_number	= ! empty( $instance['popular_posts_number'] ) ? absint( $instance['popular_posts_number'] ) : 3;
		$featured_posts_number	= ! empty( $instance['featured_posts_number'] ) ? absint( $instance['featured_posts_number'] ) : 3;
		$recent_posts_number	= ! empty( $instance['recent_posts_number'] ) ? absint( $instance['recent_posts_number'] ) : 3;
		$recent_comments_number	= ! empty( $instance['recent_comments_number'] ) ? absint( $instance['recent_comments_number'] ) : 5;

		// Hide thumbnails
		$hide_recent_thumbs		= ! empty( $instance['hide_recent_thumbs'] ) ? 1 : 0;

		// Widget Front End Output
		echo '<aside class="side-box ac-tabs-init-wrap widget" id="ac-tabs-widget-' . esc_html( $this->id ) . '">';

		if( $show_popular_posts || $show_featured_posts || $show_recent_posts || $show_recent_comments || $show_tags ) {

			// Navigation
			echo '<nav class="tabs-widget-navigation clearfix">';
        	echo '<ul class="ac-tabs-init">';
        	if( $show_popular_posts )		{ echo '<li class="current"><a href="#' . esc_html( $this->id ) .'_tab-1" title="' . esc_attr__('Popular Posts', 'justwrite') . '">' . ac_icon( 'list-ol', false ) . '</a></li>'; }
        	if( $show_featured_posts )		{ echo '<li><a href="#' . esc_html( $this->id ) .'_tab-2" title="' . esc_attr__('Featured Posts', 'justwrite') . '">' . ac_icon( 'star', false ) . '</a></li>'; }
        	if( $show_recent_posts )		{ echo '<li><a href="#' . esc_html( $this->id ) .'_tab-3" title="' . esc_attr__('Latest Posts', 'justwrite') . '">' . ac_icon( 'bell', false ) . '</a></li>'; }
        	if( $show_recent_comments )		{ echo '<li><a href="#' . esc_html( $this->id ) .'_tab-4" title="' . esc_attr__('Recent Comments', 'justwrite') . '">' . ac_icon( 'comments', false ) . '</a></li>'; }
        	if( $show_tags )				{ echo '<li><a href="#' . esc_html( $this->id ) .'_tab-5" title="' . esc_attr__('Tag Cloud', 'justwrite') . '">' . ac_icon( 'tags', false ) . '</a></li>'; }
        	echo '</ul>';
        	echo '</nav>';

			// Tabs & Content
			// -- Popular Posts
			if( $show_popular_posts ) {
				?>
                	<div class="sb-content tabs-widget-tab clearfix" id="<?php echo esc_attr( $this->id ); ?>_tab-1">
                    	<?php
						$args = array(
							'orderby' => 'comment_count',
							'posts_per_page' => intval($popular_posts_number),
							'ignore_sticky_posts' => 1
						);
						$wp_query = new WP_Query();
						$wp_query->query($args);
						$count = 0;
						?>
                    	<ul class="ac-popular-posts">
                        	<?php if( $wp_query->have_posts()) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
									$count++;
                             		$mcn = get_comments_number();
									$ncn = get_comments_number();

									if( $count == 1 ) { $max_comments_number = $mcn; };

									if ( $ncn != 0 ) {
											$make_percent = number_format(100 * $ncn / $max_comments_number);
							?>
                             <li>
                            	<span class="position"><?php echo $count; ?></span>
                                <div class="details">
                        			<span class="category"><?php ac_output_first_category(); ?></span>
                                    <?php the_title( '<a href="' . esc_url( get_permalink() ) . '" class="title" rel="bookmark">', '</a>' ); ?>
                            		<div class="the-percentage" style="width: <?php echo $make_percent; ?>%"></div>
                            		<a href="<?php comments_link(); ?>" class="comments-number"><?php ac_comments_number(); ?></a>
                        		</div>
                            </li>
                            <?php }; endwhile; else : ?>
                            <li><?php _e('No popular posts available!', 'justwrite'); ?></li>
                            <?php endif; wp_reset_postdata(); ?>
                        </ul>
                    </div>
                <?php
			} // .END $show_popular_posts

			// -- Featured Posts
			if( $show_featured_posts ) {
				?>
                	<div class="sb-content tabs-widget-tab clearfix" id="<?php echo esc_attr( $this->id ); ?>_tab-2">
                    	<?php
						$args = array(
							'posts_per_page'		=> intval($featured_posts_number),
							'meta_key'				=> 'ac_featured_article',
							'meta_value'			=> 1,
							'ignore_sticky_posts'	=> 1
						);
						$wp_query = new WP_Query();
						$wp_query->query( $args );
						$count = 0;
						?>
                        <ul class="ac-featured-posts">
                        	<?php if( $wp_query->have_posts()) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); $count++; ?>
                        	<li id="featured-post-<?php echo $count; ?>">
                    			<figure class="thumbnail<?php if ( ! has_post_thumbnail() ) echo ' no-thumbnail'; ?>">
                                	<?php
									if ( has_post_thumbnail() ) :
										the_post_thumbnail( 'ac-sidebar-featured' );
									else :
										echo '<img src="' . get_template_directory_uri() . '/images/no-thumbnail.png" alt="' . esc_attr__( 'No Thumbnail', 'justwrite' ) . '" />';
									endif;
									?>
                            		<figcaption class="details">
                            			<span class="category"><?php ac_output_first_category(); ?></span>
                                        <?php the_title( '<a href="' . esc_url( get_permalink() ) . '" class="title" rel="bookmark">', '</a>' ); ?>
                                		<a href="<?php the_permalink(); ?>" title="<?php esc_attr_e('Read More', 'justwrite'); ?>" class="read-more"><?php ac_icon('ellipsis-h fa-lg') ?></a>
                            		</figcaption>
                        		</figure>
                    		</li>
                            <?php endwhile; endif; wp_reset_postdata(); ?>
                        </ul>
                    </div>
                <?php
			} // .END $show_featured_posts

			// -- Recent Posts
			if( $show_recent_posts ) {
				?>
                	<div class="sb-content tabs-widget-tab clearfix" id="<?php echo esc_attr( $this->id ); ?>_tab-3">
                    	<?php
						$args = array(
							'posts_per_page' => intval($recent_posts_number),
							'ignore_sticky_posts' => 1
						);
						$wp_query = new WP_Query();
						$wp_query->query($args);
						$count = 0;
						?>
                    	<ul class="ac-recent-posts">
                        	<?php if( $wp_query->have_posts()) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
									$count++;
							?>
                             <li class="clearfix<?php if( $hide_recent_thumbs ) { echo ' full-width'; } ?>">
                             	<?php if( !$hide_recent_thumbs ) { ?>
                            	<figure class="thumbnail">
                                	<?php
									if ( has_post_thumbnail() ) :
										the_post_thumbnail( 'ac-sidebar-small-thumbnail' );
									else :
										echo '<img src="' . get_template_directory_uri() . '/images/no-thumbnail.png" alt="' . esc_attr__( 'No Thumbnail', 'justwrite' ) . '" class="no-thumbnail" />';
									endif;
									?>
                                </figure>
                                <?php } ?>
                                <div class="details">
                        			<span class="category"><?php ac_output_first_category(); ?></span>
                                    <?php the_title( '<a href="' . esc_url( get_permalink() ) . '" class="title" rel="bookmark">', '</a>' ); ?>
                            		<a href="<?php comments_link(); ?>" class="comments-number"><?php ac_comments_number(); ?></a>
                        		</div>
                            </li>
                            <?php endwhile; else : ?>
                            <li><?php _e('No popular posts available!', 'justwrite'); ?></li>
                            <?php endif; wp_reset_postdata(); ?>
                        </ul>
                    </div>
                <?php
			} // .END $show_recent_posts

			// -- Recent Comments
			if( $show_recent_comments ) {
				?>
                	<div class="sb-content tabs-widget-tab clearfix" id="<?php echo esc_attr( $this->id ); ?>_tab-4">
                    	<?php
							$args = array(
										'before_widget'		=> '',
										'after_widget'		=> '',
										'before_title'		=> '',
										'after_title'		=> ''
									);
							$instance = array(
										'title'		=> ' ',
										'number'	=> intval($recent_comments_number)
									);
							the_widget( 'WP_Widget_Recent_Comments', $instance, $args );
						?>
                    </div>
                <?php
			} // .END $show_recent_comments

			// -- Tag Cloud
			if( $show_tags ) {
				?>
                	<div class="sb-content tabs-widget-tab clearfix" id="<?php echo esc_html( $this->id ); ?>_tab-5">
                    	<?php
							$args = array(
										'before_widget'		=> '',
										'after_widget'		=> '',
										'before_title'		=> '',
										'after_title'		=> ''
									);
							$instance = array(
										'title'		=> ' ',
										'filter'	=> 'tags'
									);
							the_widget( 'WP_Widget_Tag_Cloud', $instance, $args );
						?>
                    </div>
                <?php
			} // .END $show_tags

		} else {
			echo '<div class="sb-content">' . __('Please select some settings for this widget - Tabs', 'justwrite') . '</div>';
		}

		echo '</aside><!-- END .sidebox .widget -->';

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['show_popular_posts'] 	= ! empty($new_instance['show_popular_posts']) ? 1 : 0;
		$instance['show_featured_posts'] 	= ! empty($new_instance['show_featured_posts']) ? 1 : 0;
		$instance['show_recent_posts'] 		= ! empty($new_instance['show_recent_posts']) ? 1 : 0;
		$instance['show_recent_comments'] 	= ! empty($new_instance['show_recent_comments']) ? 1 : 0;
		$instance['show_tags'] 				= ! empty($new_instance['show_tags']) ? 1 : 0;

		$instance['popular_posts_number'] 	= absint( $new_instance['popular_posts_number'] );
		$instance['featured_posts_number'] 	= absint( $new_instance['featured_posts_number'] );
		$instance['recent_posts_number'] 	= absint( $new_instance['recent_posts_number'] );
		$instance['recent_comments_number'] = absint( $new_instance['recent_comments_number'] );

		$instance['hide_recent_thumbs']		= ! empty($new_instance['hide_recent_thumbs']) ? 1 : 0;

		return $instance;
	}

	function form( $instance ) {

		// Parse $instance
		$instance_defaults = $this->defaults;
		$instance = wp_parse_args( $instance, $instance_defaults );
		extract( $instance, EXTR_SKIP );

		// $instance Defaults
		$spp = isset( $instance['show_popular_posts'] ) ? (bool) $instance['show_popular_posts'] : false;
		$sfp = isset( $instance['show_featured_posts'] ) ? (bool) $instance['show_featured_posts'] : false;
		$srp = isset( $instance['show_recent_posts'] ) ? (bool) $instance['show_recent_posts'] : false;
		$src = isset( $instance['show_recent_comments'] ) ? (bool) $instance['show_recent_comments'] : false;
		$sta = isset( $instance['show_tags'] ) ? (bool) $instance['show_tags'] : false;
		$hrt = isset( $instance['hide_recent_thumbs'] ) ? (bool) $instance['hide_recent_thumbs'] : false;

		?>

		<p>
		<input class="checkbox" type="checkbox" <?php checked( $spp ); ?> id="<?php echo $this->get_field_id( 'show_popular_posts' ); ?>" name="<?php echo $this->get_field_name( 'show_popular_posts' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_popular_posts' ); ?>"><?php _e('Show "Popular Posts" tab.', 'justwrite'); ?></label>
		</p>

        <p>
		<input class="checkbox" type="checkbox" <?php checked( $sfp ); ?> id="<?php echo $this->get_field_id( 'show_featured_posts' ); ?>" name="<?php echo $this->get_field_name( 'show_featured_posts' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_featured_posts' ); ?>"><?php _e('Show "Featured Posts" tab.', 'justwrite'); ?></label>
		</p>

        <p>
		<input class="checkbox" type="checkbox" <?php checked( $srp ); ?> id="<?php echo $this->get_field_id( 'show_recent_posts' ); ?>" name="<?php echo $this->get_field_name( 'show_recent_posts' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_recent_posts' ); ?>"><?php _e('Show "Recent Posts" tab.', 'justwrite'); ?></label>
		</p>

        <p>
		<input class="checkbox" type="checkbox" <?php checked( $src ); ?> id="<?php echo $this->get_field_id( 'show_recent_comments' ); ?>" name="<?php echo $this->get_field_name( 'show_recent_comments' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_recent_comments' ); ?>"><?php _e('Show "Recent Comments" tab.', 'justwrite'); ?></label>
		</p>

        <p>
		<input class="checkbox" type="checkbox" <?php checked( $sta ); ?> id="<?php echo $this->get_field_id( 'show_tags' ); ?>" name="<?php echo $this->get_field_name( 'show_tags' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_tags' ); ?>"><?php _e('Show "Tag Cloud" tab.', 'justwrite'); ?></label>
		</p>

        <p class="ac_break_line"></p>

        <p><strong><?php _e('How many', 'justwrite'); ?> &not;</strong></p>

        <p class="ac_two_columns">
		<label for="<?php echo $this->get_field_id( 'popular_posts_number' ); ?>"><?php _e('Popular Posts', 'justwrite'); ?>:</label>
		<input  type="text" id="<?php echo $this->get_field_id( 'popular_posts_number' ); ?>" name="<?php echo $this->get_field_name( 'popular_posts_number' ); ?>" value="<?php echo intval($instance['popular_posts_number']); ?>" size="3" />
		</p>

        <p class="ac_two_columns">
		<label for="<?php echo $this->get_field_id( 'featured_posts_number' ); ?>"><?php _e('Featured Posts', 'justwrite'); ?>:</label>
		<input  type="text" id="<?php echo $this->get_field_id( 'featured_posts_number' ); ?>" name="<?php echo $this->get_field_name( 'featured_posts_number' ); ?>" value="<?php echo intval($instance['featured_posts_number']); ?>" size="3" />
		</p>

        <p class="ac_two_columns">
		<label for="<?php echo $this->get_field_id( 'recent_posts_number' ); ?>"><?php _e('Recent Posts', 'justwrite'); ?>:</label>
		<input  type="text" id="<?php echo $this->get_field_id( 'recent_posts_number' ); ?>" name="<?php echo $this->get_field_name( 'recent_posts_number' ); ?>" value="<?php echo intval($instance['recent_posts_number']); ?>" size="3" />
		</p>

        <p class="ac_two_columns">
		<label for="<?php echo $this->get_field_id( 'recent_comments_number' ); ?>"><?php _e('Recent Comments', 'justwrite'); ?>:</label>
		<input  type="text" id="<?php echo $this->get_field_id( 'recent_comments_number' ); ?>" name="<?php echo $this->get_field_name( 'recent_comments_number' ); ?>" value="<?php echo intval($instance['recent_comments_number']); ?>" size="3" />
		</p>

        <p class="ac_break_line"></p>

        <p><strong><?php _e('Hide post thumbnails in', 'justwrite'); ?> &not;</strong></p>

        <p>
		<input class="checkbox" type="checkbox" <?php checked( $hrt ); ?> id="<?php echo $this->get_field_id( 'hide_recent_thumbs' ); ?>" name="<?php echo $this->get_field_name( 'hide_recent_thumbs' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'hide_recent_thumbs' ); ?>"><?php _e('"Recent Posts" tab.', 'justwrite'); ?></label>
		</p>

		<?php
	}

}
?>
