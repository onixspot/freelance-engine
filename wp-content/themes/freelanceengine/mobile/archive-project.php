<?php
	et_get_mobile_header();
?>
<section class="section-wrapper section-project section-archive-project">
	<div class="list-link-tabs-page">
    	<div class="container">
            <a href="<?php echo get_post_type_archive_link(PROJECT) ?>" class="active"><?php _e("Projects", ET_DOMAIN); ?></a>
            <a href="<?php echo get_post_type_archive_link(PROFILE) ?>"><?php _e("Profiles", ET_DOMAIN); ?></a>
        </div>
    </div>
    <div class="project-wrapper">
        <div class="search-normal-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="search-wrap">
                            <span class="icon-form-search icon-search"></span>
                            <input type="text" name="s" value="" placeholder="<?php _e("Type keyword", ET_DOMAIN); ?>" class="search-normal-input keyword search">
                        </div>
                    </div>
                    <div class="col-xs-4"><a href="#" class="show-search-advance"><?php _e("Advanced", ET_DOMAIN); ?></a></div>
                    <div class="col-xs-4"><a href="#" class="hide-search-advance" style="display:none;"><?php _e("Cancel", ET_DOMAIN); ?></a></div>
                </div>
            </div>
            <div class="container" id="advance-search" style="display:none; margin-top: 5px;">
                <form class="form-search-wrapper">
                    <div class="form-group">
                        <label><?php _e("Category", ET_DOMAIN); ?></label>
                        <?php
                            fre_sub_taxonomy_dropdow( 'project_category' ,
                                  array(  'attr' => 'data-chosen-width="90%" data-chosen-disable-search="" data-placeholder="'.__("Choose categories", ET_DOMAIN).'"',
                                          'class' => 'cat-filter',
                                          'hide_empty' => true,
                                          'hierarchical' => true ,
                                          'id' => 'project_category' ,
                                          'name' => 'project_category',
                                          'show_option_all' => __("All categories", ET_DOMAIN),
                                          'value' => 'slug',
                                      )
                            );
                        ?>
                    </div>
                    <div class="form-group">
                        <label><?php _e("Project Type", ET_DOMAIN); ?></label>
                        <?php
                                $obj_project = get_query_var('project_type');
                                if($obj_project){
                                    $obj_project_type = get_term_by('slug',$obj_project,'project_type');
                                    $selected_project_type = $obj_project_type->term_id;
                                }
                                else
                                    $selected_project_type = '';
                                ae_tax_dropdown( 'project_type' ,
                                      array(  'attr' => 'data-chosen-width="90%" data-chosen-disable-search="1"  data-placeholder="'.__("All types", ET_DOMAIN).'"',
                                              'class' => 'type-filter',
                                              'hide_empty' => true,
                                              'hierarchical' => true ,
                                              'id' => 'project_type' ,
                                              'show_option_all' => __("All types", ET_DOMAIN),
                                              'value' => 'slug',
                                              'selected'    => $selected_project_type,
                                          )
                                );
                            ?>
                    </div>
                    <?php
                    $max_slider = ae_get_option('fre_slide_max_budget', 2000);
                    ?>
                    <div class="form-group">
                        <label><?php _e("Budget", ET_DOMAIN); ?></label>
                        <input id="et_budget" type="text" name="et_budget" class="slider-ranger" value="" data-slider-min="0"
                            data-slider-max="<?php echo $max_slider; ?>" data-slider-step="5"
                            data-slider-value="[0,1500]"
                        />
                        <input type="hidden" name="budget" id="budget" value= "" />
                    </div>
                    <div class="form-group">
                        <label><?php _e("Your Skill", ET_DOMAIN); ?></label>
                        <div class="skill-control">
                            <input class="form-control skill" type="text" id="skill" placeholder="<?php _e("Type and enter", ET_DOMAIN); ?>" name=""  autocomplete="off" spellcheck="false" >
                            <input type="hidden" class="skill_filter" name="filter_skill" value="1">
                            <ul class="skills-list" id="skills_list"></ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="<?php _e("HIDE ADVANCED SEARCH", ET_DOMAIN); ?>" class="hide-advance-search btn-sumary btn-search-advance">
                    </div>
                </form>
            </div>
        </div>

        <div class="list-project-wrapper">
            <?php get_template_part('mobile/list', 'projects'); ?>
        </div>
        <script type="text/template" id="project-no-result">
            <div class="col-md-12 no-result">
                <p class="alert alert-info">
                    <i class="fa fa-info-circle"></i>&nbsp;<?php _e("Sorry, no results were found.", ET_DOMAIN); ?>
                </p>
            </div>
        </script>
    </div>
</section>
<?php
	et_get_mobile_footer();
?>