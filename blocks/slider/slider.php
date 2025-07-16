<?php

$id = 'slider-' . $block['id'] ?? uniqid();
if(!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$className = 'slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<div class="<?php echo esc_attr($className);?>">
    <div
        class="slider__content xdevlabs-slider"
        data-slick='{
            "slidesToShow": 1,
              "slidesToScroll": 1,
              "autoplay": true,
              "autoplaySpeed": 5000,
              "dots": false,
              "arrows": false,
              "fade": true,
              "infinite": true
        }'
    >
        <?php
        if( have_rows('hero_sliders') ):
            while( have_rows('hero_sliders') ) : the_row();
                $image = get_sub_field('slider_image');
                ?>
                <div class="slider__content--item">
                    <figure>
                        <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_attr($image['alt']);?>">
                    </figure>
                    <div class="slider__content--description">
                        <?php if(get_sub_field('slider_title')) : ?>
                            <div class="slider__title"><span><?= get_sub_field('slider_title'); ?></span></div>
                        <?php endif;?>
                        <div class="slider__content--text">
                            <?php if(get_sub_field('slider_title')) : ?>
                                <div class="slider__sub-heading"><?= get_sub_field('slider_subtitle'); ?></div>
                            <?php endif;?>
                            <?php if(get_sub_field('slider_title')) : ?>
                                <div class="slider__description"><?= get_sub_field('slider_description'); ?></div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
        else :
            esc_html_e('No content found', 'mapcreator');
        endif;
        ?>
    </div>

    <?php if( have_rows('hero_sliders') ):?>
        <div class="slider__thumbnails">
            <?php
            $num = 0;
            while( have_rows('hero_sliders') ) : the_row();
                $image = get_sub_field('slider_image');
                $num +=1;
                $activeClass = ($num === 1) ? ' active' : '';
                ?>
                <div class="slider__thumbnails--item <?php esc_attr_e($activeClass);?>" data-slick-index="<?= esc_attr($num - 1); ?>">
                    <figure>
                        <img src="<?=esc_url($image['sizes']['medium']);?>" alt="<?=esc_attr($image['alt']);?>">
                        <figcaption>
                            <?php echo str_pad($num, 2, '0', STR_PAD_LEFT );?>
                        </figcaption>
                    </figure>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif;?>
</div>
