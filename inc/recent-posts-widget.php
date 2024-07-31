<?php
class Recent_Posts_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'recent_posts_widget',
            __('Recent Posts Widget', 'text_domain'),
            array('description' => __('Displays recent posts with thumbnail and excerpt', 'text_domain'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo '<span class="widget-title">' . apply_filters('widget_title', $instance['title']) . '</span>';
        }
        ?>

        <ul>
            <?php
            $recent_posts = new WP_Query(array(
                'posts_per_page' => !empty($instance['number']) ? $instance['number'] : 5,
                'post_status'    => 'publish',
            ));

            if ($recent_posts->have_posts()) :
                while ($recent_posts->have_posts()) : $recent_posts->the_post();
            ?>
                    <li class="recent-post-item">
                        <a href="<?php the_permalink(); ?>" class="recent-post-link">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="recent-post-thumbnail">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="recent-post-content">
                                <span class="recent-post-title"><?php the_title(); ?></span>
                            </div>
                        </a>
                    </li>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </ul>

        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('Recent Posts', 'text_domain');
        $number = !empty($instance['number']) ? $instance['number'] : 5;
        ?>
        <style>
            .recent-posts-widget {
                background: #fff;
                border: 1px solid #e0e0e0;
                border-radius: 8px;
                padding: 20px;
                margin-bottom: 20px;
            }

            .recent-posts-widget .widget-title {
                font-size: 1.5em;
                margin-bottom: 10px;
            }

            .recent-posts-widget ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .recent-post-item {
                display: flex;
                align-items: center;
                margin-bottom: 20px;
                border-bottom: 1px solid #e0e0e0;
                padding-bottom: 10px;
            }

            .recent-post-thumbnail {
                flex: 0 0 60px;
                margin-right: 10px;
            }

            .recent-post-thumbnail img {
                width: 60px;
                height: 60px;
                object-fit: cover;
                border-radius: 4px;
            }

            .recent-post-content {
                flex: 1;
            }

            .recent-post-title {
                font-size: 1em;
                font-weight: bold;
                color: #333;
            }

            .recent-post-excerpt {
                font-size: 0.9em;
                color: #666;
            }

            .recent-post-link {
                display: flex;
                align-items: center;
                text-decoration: none;
                color: inherit;
            }

            .recent-post-link:hover .recent-post-title {
                text-decoration: underline;
            }
        </style>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="number" value="<?php echo esc_attr($number); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? strip_tags($new_instance['number']) : '';
        return $instance;
    }
}

function register_recent_posts_widget()
{
    register_widget('Recent_Posts_Widget');
}
add_action('widgets_init', 'register_recent_posts_widget');
