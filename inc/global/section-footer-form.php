<?php
    $post = get_post(get_the_ID());
    $sectionShow = get_field('hide_or_show_section_footer');
    if ($sectionShow):
        $sectionTitle = get_field('section_title_for_footer');
        $footerForm = get_field('form_shortcode_footer');
?>
<style>
.checkbox-group.checkbox-group-color2 { padding: 25px 0 10px 0; }
.checkbox-group.checkbox-group-color2 .form-checkbox { background-color: #131727; border: 2px solid #454F79; }
.checkbox-group.checkbox-group-color2 .form-checkbox:checked::before { color: #9BA3C3 !important; }
.checkbox-group.checkbox-group-color2 label { color: #9BA3C3; font-family: 'Upgrade'; }
.checkbox-group.checkbox-group-color2 span.wpcf7-list-item {
display: inline-block;
margin: 0;
color: #9BA3C3;
font-family: 'Upgrade';
font-size: 18px;
letter-spacing: 0;
font-weight: 400;
cursor: pointer;
}
	
</style>
<section class="get-in-touch-section">
    <div class="get-in-touch-div" id="form-get-in-touch">
        <div class="container container-lg">        
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-lg-12 col-md-12">
                    <div class="heading-title-div">
                        <?php echo $sectionTitle; ?>
                    </div>
                </div>
            </div>
            
            <div class="get-in-touch-root" data-aos="fade-up" data-aos-duration="2000">
                <?php echo do_shortcode($footerForm); ?>
            </div>

            <div class="row get-in-touch-success">
                <div class="col-lg-12 col-md-12">
                    <div class="heading-title-div">
                        <?php echo get_field('get_in_touch_message', 'option'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    endif;
?>