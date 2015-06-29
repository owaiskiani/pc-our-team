<?php
/*
 * Short description
 * @author pearlcore <info@pearlcore.com>
 * 
 */
$args = $this->pc_get_args($group);
$members = new WP_Query($args);
?>
<div class="wapper_our_team">

    <?php if ($members->have_posts()) : ?>
        <ul id="content_our_team" class="roundabout-holder">
            <?php
            while ($members->have_posts()) :
                $members->the_post();
                ?>
                <li class="roundabout-moveable-item" style="">
                    <div class="our_team-image">
                        <?php
                        if (has_post_thumbnail()) {
                            $medium_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($members->ID), 'medium');
                            $sa_user_image = $medium_image_url[0];
                        } else {
                            $sa_user_image = PC_TEAM_URL . 'inc/img/noprofile.jpg';
                        }
                        ?>
                        <img width="234" height="300" src="<?php echo $sa_user_image; ?>" 
                             class="attachment-medium attachment-our_team wp-post-image" alt="" title="">
                    </div>
                    <div class="content_team">
                        <div class="out_team_title">
                            <h4  itemprop="name">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title() ?>"><?php the_title() ?></a>
                            </h4>
                            <div class="regency" itemprop="jobtitle">
                                <?php echo get_post_meta(get_the_ID(), 'team_member_title', true); ?>
                            </div>
                        </div>
                        <div class="hidden_child">
                            <div class="description">
                                <div class="excerpt">
                                    <?php
                                    $content = get_the_content();
                                    $pc_content = strip_tags($content);
                                    echo substr($pc_content, 0, 200);
                                    ?>
                                </div>
                            </div>
                            <ul class="social_team">
                                <?php
                                $facebook = get_post_meta(get_the_ID(), 'team_member_facebook', true);
                                $twitter = get_post_meta(get_the_ID(), 'team_member_twitter', true);
                                $linkedin = get_post_meta(get_the_ID(), 'team_member_linkedin', true);
                                $gplus = get_post_meta(get_the_ID(), 'team_member_gplus', true);
                                $email = get_post_meta(get_the_ID(), 'team_member_email', true);
                                $this->get_social($facebook, $twitter, $linkedin, $gplus, $email);
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="clear"></div>
                </li>
                <?php
            endwhile;
            ?>
        </ul>
        <div class="nav_team">
            <a href="#" class="next_team"><span class="inner_icon"><span class="icon"><i class="fa fa-angle-right"></i></span></span></a>
            <a href="#" class="prev_team"><span class="inner_icon"><span class="icon"><i class="fa fa-angle-left"></i></span></span></a>
        </div>
        <?php
    else:

    endif;
    ?>

</div>


