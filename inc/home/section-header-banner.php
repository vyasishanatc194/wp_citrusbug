<?php
    $post = get_post(get_the_ID());
    $bannerOptions = get_field('banner_options');
    switch ($bannerOptions){
        case 'Video File':
            $bannerVideoLink = '<video class="video-banner" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                                    <source src="'.get_field("banner__video")['url'].'" type="video/mp4">
                                </video>';
            break;
        case 'Youtube link':
            $bannerVideoLink = '<iframe class="video-banner" src="https://www.youtube.com/embed/'.explode("=", get_field("video_link"))[1].'?autoplay=1"
                                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture">
                                </iframe>';
            break;
        case 'Vimeo Link':
            $bannerVideoLink = '<iframe class="responsive-video-banner" 
                                src="'.get_field("video_link").'" frameborder="0" 
                                allow="autoplay; fullscreen" allowfullscreen></iframe>';
            break;
        default:
            $bannerVideoLink = '<img src="'.get_the_post_thumbnail_url($post->ID).'"/>';
            break;      
    }
?>
<section class="main-banner-section">
    <div class="banner-div">
        <div class="overlay-video">
            <?php echo $bannerVideoLink; ?>
        </div>
        <div class="content-banner-root">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 col-md-12 p0">              
                <div class="content-banner" data-aos="fade-up" data-aos-duration="1000">
                    <div class="text-content">
                        <?php echo apply_filters("the_content", $post->post_content); ?>
                    </div>
                    <div class="max-container-container">
                        <div class="text-downscroll">
                            <a class="scroll-to-bottom" href="#value-box-link">
                                <span class="cursor-span mouse-smart-icon"></span>
                            </a>
                        </div>    
                    </div>
                </div>                
            </div>  
            </div>        
        </div>
        </div>
    </div>
</section><!--  end of banner  -->