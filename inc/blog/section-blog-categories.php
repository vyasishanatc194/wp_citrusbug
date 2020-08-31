<?php if (QS::get_post_categories()) : ?>
    <div class="category-row row">
        <div class="col-lg-12 col-md-12">
            <div class="category-filter-listing-row">
                <div class="category-ul-root">
                    <ul class="category-div">
                        <?php
                        $category = get_queried_object();
                        $cats = QS::get_post_categories();
                        foreach ($cats as $key=>$val) {
                            $activeClass = '';
                            if ($category->term_id == $key) $activeClass = 'active';
                            echo '<li><a href="javascript:void(0);" data-catid="'.$key.'" class="category-link '.$activeClass.'">'.$val.'</a></li>';
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>