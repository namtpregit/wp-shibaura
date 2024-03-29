<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Springs
 */

get_header();
?>
<!-- Slider -->
<div id="slider">
    <h3 class="text">
        <span class="pc"><?php the_field('slider_title'); ?></span>
        <span class="mobile"><?php the_field('slider_title_mobile'); ?></span>
    </h3>
    <div class="slideshow">
        <?php
        if (have_rows('slider_show')) :
            while (have_rows('slider_show')) : the_row();
        ?>
                <div class="slideshow-image" style="background-image: url('<?php
                                                                            $useragent = $_SERVER["HTTP_USER_AGENT"];
                                                                            if (stripos($useragent, "mobile") !== false) {
                                                                                the_sub_field('image_mobile');
                                                                            } else {
                                                                                the_sub_field('image');
                                                                            }
                                                                            ?>')"></div>
        <?php
            endwhile;
        else :
        endif;
        ?>
    </div>
</div>

<!-- News -->
<section id="news">
    <div class="container-c">
        <div class="box">
            <div class="left">
                <?php
                $posts = get_posts(array(
                    'post_type'         => 'news',
                    'numberposts'    => 1,
                    'orderby'    => 'date',
                    'order'        => 'DESC'
                ));
                if ($posts) : ?>
                    <?php foreach ($posts as $post) :
                        setup_postdata($post);
                    ?>
                        <a class="item" href="<?php the_permalink(); ?>">
                            <span class="date"><?php echo get_the_date('Y/m/d'); ?></span>

                            <?php
                            $taxonomies = get_object_taxonomies($post);
                            $taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names"));
                            if (!empty($taxonomy_names)) :
                                foreach ($taxonomy_names as $tax_name) : ?>
                                    <span class="cate"><?php echo $tax_name; ?> </span>
                            <?php endforeach;
                            endif;
                            ?>

                            <span class="txt"><?php the_title(); ?></span>
                        </a>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <a href="<?php echo esc_url(home_url('/news')); ?>" class="new-link">もっと見る　＞</a>
        </div>
    </div>
</section>

<!-- Sharing -->
<section id="sharing">
    <div class="container-c">
        <h3 class="sharing-title"><span class="mark">音楽</span><span>を奏でる喜びと、</span><span>聴く喜びを共に分かち合う</span></h3>
        <div class="sharing-desc"><?php the_field('sharing_desc'); ?></div>
    </div>
    <div class="sharing-img">
        <div class="left">
            <img src="<?php the_field('sharing_image_left'); ?>" alt="<?php the_field('title_image_left'); ?>" class="img" data-aos="fade-up" data-aos-duration="600">
            <p class="text"><?php the_field('title_image_left'); ?></p>
        </div>
        <div class="right">
            <img src="<?php the_field('sharing_image_right'); ?>" alt="<?php the_field('title_image_right'); ?>" class="img" data-aos="fade-up" data-aos-duration="600">
            <p class="text"><?php the_field('title_image_right'); ?></p>
        </div>
    </div>
</section>

<!-- Activity -->
<section id="activity">
    <div class="container-c">
        <div class="box">
            <div class="left" data-aos="fade-up" data-aos-duration="600">
                <img src="<?php the_field('activity_image'); ?>" alt="" class="img">
            </div>
            <div class="right" data-aos="fade-up" data-aos-duration="600">
                <div class="activity-title">
                    <h4 class="title"><?php the_field('activity_title'); ?></h4>
                    <a href="<?php echo esc_url(home_url('/activity')); ?>" class="activity-link" rel="noopener noreferrer">もっと見る　＞</a>
                </div>
                <div class="desc"><?php the_field('activity_desc'); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- Foundation -->
<section id="foundation">
    <div class="container-c">
        <div class="box">
            <div class="left">
                <a href="<?php echo esc_url(home_url('/about')); ?>">
                    <div class="foundation-box-1" data-aos="fade-up" data-aos-duration="600">
                        <div class="text">
                            財団紹介
                        </div>
                        <img src="<?php bloginfo('template_directory'); ?>/shibaura-html/imgs/building.png" alt="" class="img">
                    </div>
                </a>
            </div>
            <div class="right">
                <a href="<?php echo esc_url(home_url('/service')); ?>">
                    <div class="foundation-box-2" data-aos="fade-up" data-aos-duration="600">
                        <img src="<?php bloginfo('template_directory'); ?>/shibaura-html/imgs/img-11.png" alt="" class="img">
                        <div class="text">事業内容</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Social network -->
<section id="social-network">
    <div class="container-c">
        <div class="box">
            <a class="child" target="_blank" href="https://shibaura-group.co.jp/" data-aos="fade-up" data-aos-duration="600">
                <div class="media">
                    <div class="media-body">
                        <img src="<?php bloginfo('template_directory'); ?>/shibaura-html/imgs/img-13.png" alt="" class="media-img-2">
                        <span class="media-link">
                            <img src="<?php bloginfo('template_directory'); ?>/shibaura-html/imgs/arrow-right.png" alt="" class="arrow-img">
                        </span>
                    </div>
                </div>
            </a>
            <a class="child" target="_blank" href="https://m.facebook.com/shibauragroup.tokyo/" data-aos="fade-up" data-aos-duration="600">
                <div class="media">
                    <div class="media-body">
                        <img src="<?php bloginfo('template_directory'); ?>/shibaura-html/imgs/icon_fb.png" alt="" class="media-img">
                        <p class="media-content">芝浦グループ
                            facebook</p>
                        <span class="media-link">
                            <img src="<?php bloginfo('template_directory'); ?>/shibaura-html/imgs/arrow-right.png" alt="" class="arrow-img">
                        </span>
                    </div>
                </div>
            </a>
            <a class="child" target="_blank" href="https://www.instagram.com/shibaura_group/" data-aos="fade-up" data-aos-duration="600">
                <div class="media">
                    <div class="media-body">
                        <img src="<?php bloginfo('template_directory'); ?>/shibaura-html/imgs/icon_insta.png" alt="" class="media-img">
                        <p class="media-content">芝浦グループ
                            Instagram</p>
                        <span class="media-link">
                            <img src="<?php bloginfo('template_directory'); ?>/shibaura-html/imgs/arrow-right.png" alt="" class="arrow-img">
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<section id="social-network-v2">
    <div class="container-c">
        <div class="box">
            <a class="child" target="_blank" href="https://www.youtube.com/@blindnessRYO" data-aos="fade-up" data-aos-duration="600">
                <div class="media">
                    <div class="media-body">
                        <img src="<?php bloginfo('template_directory'); ?>/shibaura-html/imgs/icon_yt.png" alt="" class="media-img">
                        <p class="media-content">芝浦文化財団所属
                            川越亮  YouTube</p>
                        <span class="media-link">
                            <img src="<?php bloginfo('template_directory'); ?>/shibaura-html/imgs/arrow-right.png" alt="" class="arrow-img">
                        </span>
                    </div>
                </div>
            </a>
            <a class="child" target="_blank" href="https://www.instagram.com/ryokawagoe0503/" data-aos="fade-up" data-aos-duration="600">
                <div class="media">
                    <div class="media-body">
                        <img src="<?php bloginfo('template_directory'); ?>/shibaura-html/imgs/icon_insta.png" alt="" class="media-img">
                        <p class="media-content">芝浦文化財団所属
                            川越亮 Instagram</p>
                        <span class="media-link">
                            <img src="<?php bloginfo('template_directory'); ?>/shibaura-html/imgs/arrow-right.png" alt="" class="arrow-img">
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
