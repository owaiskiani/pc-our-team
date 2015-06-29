<?php
/*
 * Short description
 * @author pearlcore <info@pearlcore.com>
 * 
 */
$args = $this->pc_get_args($group);
$members = new WP_Query($args);
?>
<div id="pc_our_team" class="stacked">
    <?php
    if ($members->have_posts()) {

        while ($members->have_posts()) {
            $members->the_post();
            ?>
            <div itemscope="" itemtype="http://schema.org/Person" class="pc_team_member">
                <div class="pc_team_member_left">

                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title() ?>" class="pc_team_single_popup">
                        <?php
                        if (has_post_thumbnail()) {
                            $medium_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($members->ID), 'medium');
                            $sa_user_image = $medium_image_url[0];
                            echo '<img src="' . $sa_user_image . '" class="attachment-medium wp-post-image"/>';
                        } else {
                            $sa_user_image = PC_TEAM_URL . 'inc/img/noprofile.jpg';
                            echo '<img src="' . $sa_user_image . '" class="attachment-medium wp-post-image"/>';
                        }
                        ?>
                    </a>


                    <?php if ('yes' == $this->options['name']) : ?>
                        <h2 itemprop="name" class="pc_team_member_name">
                            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" rel="bookmark" class="pc_team_single_popup">                            
                                <?php the_title() ?>
                            </a>
                        </h2>
                    <?php endif; ?>
                    <?php if ('yes' == $this->options['title']) : ?>
                        <h3 itemprop="jobtitle" class="pc_team_member_jobtitle">
                            <?php echo get_post_meta(get_the_ID(), 'team_member_title', true); ?>
                        </h3>
                    <?php endif; ?>
                </div>
                <div class="pc_team_content pc_team_member_right">
                    <div class='icons <?php echo 'yes' == $this->options['social'] ? '' : 'hidden'; ?>'>
                        <?php
                        $facebook = get_post_meta(get_the_ID(), 'team_member_facebook', true);
                        $twitter = get_post_meta(get_the_ID(), 'team_member_twitter', true);
                        $linkedin = get_post_meta(get_the_ID(), 'team_member_linkedin', true);
                        $gplus = get_post_meta(get_the_ID(), 'team_member_gplus', true);
                        $email = get_post_meta(get_the_ID(), 'team_member_email', true);
                        $this->get_social($facebook, $twitter, $linkedin, $gplus, $email);
                        ?>
                    </div>                   
                    <?php the_content(); ?>
                </div>
                
                <div class="pc_team_skills">
                    <?php if (get_post_meta(get_the_ID(), 'team_member_skill1', true)) : ?>
                        <?php echo get_post_meta(get_the_ID(), 'team_member_skill1', true); ?>
                    <?php endif; ?>

                    <?php if (get_post_meta(get_the_ID(), 'team_member_skill_value1', true)) : ?>
                        <div class="progress" style="width: <?php echo get_post_meta(get_the_ID(), 'team_member_skill_value1', true); ?>0%"></div>
                    <?php endif; ?>


                    <?php if (get_post_meta(get_the_ID(), 'team_member_skill2', true)) : ?>
                        <?php echo get_post_meta(get_the_ID(), 'team_member_skill2', true); ?>
                    <?php endif; ?>

                    <?php if (get_post_meta(get_the_ID(), 'team_member_skill_value2', true)) : ?>
                        <div class="progress" style="width: <?php echo get_post_meta(get_the_ID(), 'team_member_skill_value2', true); ?>0%"></div>
                    <?php endif; ?>


                    <?php if (get_post_meta(get_the_ID(), 'team_member_skill3', true)) : ?>
                        <?php echo get_post_meta(get_the_ID(), 'team_member_skill3', true); ?>
                    <?php endif; ?>

                    <?php if (get_post_meta(get_the_ID(), 'team_member_skill_value3', true)) : ?>
                        <div class="progress" style="width: <?php echo get_post_meta(get_the_ID(), 'team_member_skill_value3', true); ?>0%"></div>
                    <?php endif; ?>


                    <?php if (get_post_meta(get_the_ID(), 'team_member_skill4', true)) : ?>
                        <?php echo get_post_meta(get_the_ID(), 'team_member_skill4', true); ?>
                    <?php endif; ?>

                    <?php if (get_post_meta(get_the_ID(), 'team_member_skill_value4', true)) : ?>
                        <div class="progress" style="width: <?php echo get_post_meta(get_the_ID(), 'team_member_skill_value4', true); ?>0%"></div>
                    <?php endif; ?>
                </div>                
            </div>

            <?php
        }
    } else {
        echo 'There are no team members to display';
    }
    ?>
</div>
