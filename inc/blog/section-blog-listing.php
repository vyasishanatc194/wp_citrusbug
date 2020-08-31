<?php
    $post = get_post(get_the_ID());
?>
<style>
	.general-blog-card-box .general-blog-card-body h3 {
		min-height: 88px;
	}
	.general-blog-card-box .general-blog-card-body p {
		min-height: 120px;
	}
</style>
<section class="blog-listing-section">  
    <div class="blog-listing-div">
        <div class="container container-lg">          
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12">          
                    <div class="blog-listing-root">
                        
                        <?php get_template_part( 'inc/blog/section', 'blog-categories'); ?>

                        <div class="blog-listing-inner-row row">
                            <div class="col-lg-12 col-md-12">                    
                                <div class="filter-ul-root" data-aos="fade-up" data-aos-duration="2000">
                                    <div class="selectbox-inline">
                                        <div class="select-box select-common select-box-group select-custom2">
                                            <select class="js-select2" id="recent-by-select-blog">
                                                <option></option>
                                                <option value="most_latest">Latest News</option>
                                                <option value="most_read">Most Read</option>
                                                <option value="most_shared">Most Shared</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                            <div class="row" id="load_posts"></div>
                        </div>
                        <input type="hidden" id="row" value="0">
                        <input type="hidden" id="selectCat" value="0">
                        <input type="hidden" id="all" value="<?php echo wp_count_posts('post')->publish; ?>">
                        <div class="view-more-btn-row row">
                            <div class="col-lg-12 col-md-12">
                                <div class="btn-submit-row">
                                    <button type="button" class="btn btn-primary-common btn-more-news load-more"> More News </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>        
        </div>
    </div>
</section>