<?php
/**
 *
*/
	et_get_mobile_header('auth');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mobile-logo-wrapper">
            <a href="<?php echo home_url(); ?>" class="logo-mobile">
                <?php fre_logo_mobile(); ?>
            </a>
        </div>
    </div>
</div>

<section class="section-wrapper section-register">
    <form class="form-mobile-wrapper signup_form_submit">
        <input type="hidden" value="<?php _e("Work", ET_DOMAIN); ?>" class="work-text" name="worktext" />
        <input type="hidden" value="<?php _e("Hire", ET_DOMAIN); ?>" class="hire-text" name="hiretext" />

    	<div class="container">
            <div class="row">
                <div class="col-xs-7">
                    <span class="text-choose">
                        <?php _e("What are you looking for?", ET_DOMAIN)?>
                    </span>
                </div>
                <div class="col-xs-5">
                    <span class="user-type hello">
                        <input type="hidden" name="role" id="role" value="employer" />
                        <input type="checkbox" class="sign-up-switch" name="modal-check" data-switchery="true" style="display: none;">
                        <span class="user-role text hire">
                            <?php _e("Hire", ET_DOMAIN); ?>
                        </span>
                    </span>

                </div>
            </div>
        </div>
        <?php
            $disable_name = apply_filters('free_register_disable_name','');
            if(!$disable_name){
                ?>
                <div class="form-group-mobile">
                    <span class="icon-form-login icon-first-name"></span>
                    <input type="text" id="first_name" name="first_name" placeholder="<?php _e("First Name", ET_DOMAIN); ?>">
                </div>
                <div class="form-group-mobile">
                    <span class="icon-form-login icon-last-name"></span>
                    <input type="text" id="last_name" name="last_name" placeholder="<?php _e("Last Name", ET_DOMAIN); ?>">
                </div>
                <?php
            }
        ?>
    	<div class="form-group-mobile">
        	<span class="icon-form-login icon-user"></span>
        	<input type="text" id="user_login" name="user_login" placeholder="<?php _e("Username", ET_DOMAIN); ?>">
        </div>
        <div class="form-group-mobile">
        	<span class="icon-form-login icon-email"></span>
        	<input type="email" id="user_email" name="user_email" placeholder="<?php _e("Your Email", ET_DOMAIN); ?>">
        </div>
        <div class="form-group-mobile">
        	<span class="icon-form-login icon-key"></span>
        	<input type="password" id="user_pass" name="user_pass" placeholder="<?php _e("Your Password", ET_DOMAIN); ?>">
        </div>
        <div class="form-group-mobile">
        	<span class="icon-form-login icon-key"></span>
        	<input type="password" id="repeat_pass" name="repeat_pass" placeholder="<?php _e("Retype Password", ET_DOMAIN); ?>">
        </div>
        <?php if(ae_get_option('gg_captcha')){ ?>
            <div class="form-group-mobile form-group-mobile-captcha">
                <div class="gg-captcha">
                    <?php ae_gg_recaptcha(); ?>
                </div>
            </div>
            <div class="clearfix"></div>
        <?php } ?>
        <?php if(get_theme_mod( 'termofuse_checkbox', false )){ ?>
        <div class="form-group policy-agreement">
            <input name="agreement" id="agreement" type="checkbox" />
            <?php printf(__('I agree with the <a href="%s" target="_Blank">Term of Use and Privacy policy</a>', ET_DOMAIN), et_get_page_link('tos') ); ?>
        </div>
        <?php } ?>
        <div class="clearfix"></div>
        <div class="form-group-mobile form-submit-btn">
            <button class="btn-sumary btn-submit"><?php _e("SIGN UP", ET_DOMAIN); ?></button>
        </div>
    </form>
    <div class="container">
    	<div class="row">
        	<div class="col-md-12">
            <?php
                /**
                 * tos agreement
                */
                $tos = et_get_page_link('tos', array() ,false);
                if(!get_theme_mod( 'termofuse_checkbox', false ) && $tos) {
            ?>
            	<p class="text-policy">
                    <?php printf(__('By creating an account, you agree to our <a href="%s" target="_Blank">Term of Use and Privacy policy</a>', ET_DOMAIN), et_get_page_link('tos') ); ?>
                </p>
            <?php
                }
            ?>
                <a href="#" class="change-link-login">
                    <?php _e("You have account ? Click here !", ET_DOMAIN); ?>
                </a>
          <?php
                if( function_exists('ae_render_social_button')){
                    $before_string = __("You can also sign in by:", ET_DOMAIN);
                    ae_render_social_button( array(), array(), $before_string );
                }
            ?>
            </div>
        </div>
    </div>
</section>

<section class="section-wrapper section-login">
    <form class="form-mobile-wrapper signin_form_submit">
    	<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="text-choose"></span>
                </div>
            </div>
        </div>

    	<div class="form-group-mobile">
        	<span class="icon-form-login icon-user"></span>
        	<input type="text" id="user_login" name="user_login" placeholder="<?php _e("Username", ET_DOMAIN); ?>">
        </div>
        <div class="form-group-mobile">
        	<span class="icon-form-login icon-key"></span>
        	<input type="password" id="user_pass" name="user_pass" placeholder="<?php _e("Your Password", ET_DOMAIN); ?>">
        </div>
        <div class="form-group-mobile form-submit-btn">
            <a href="#" class="forgot-link change-link-forgot"><?php _e("Forgot your password?", ET_DOMAIN); ?></a>
            <div class="clearfix"></div>
        	<button class="btn-sumary btn-submit"><?php _e("SIGN IN", ET_DOMAIN); ?></button>
        </div>
    </form>
    <div class="container">
    	<div class="row">
        	<div class="col-md-12 change-form">
            	<p class="text-policy"></p>
                <a href="#" class="change-link-register"><?php _e("New? Click here to become a member", ET_DOMAIN); ?></a>
                <?php
                $use_facebook = ae_get_option('facebook_login');
                $use_twitter = ae_get_option('twitter_login');
                $gplus_login = ae_get_option('gplus_login');
                $linkedin_login = ae_get_option('linkedin_login') ;
                if($linkedin_login || $use_facebook || $use_twitter || $gplus_login) {
                ?>
                    <div class="socials-head"><?php _e("You can also sign in by:", ET_DOMAIN) ?></div>
                    <ul class="list-social-login">
                        <?php if($use_facebook){ ?>
                        <li>
                            <a href="#" class="fb facebook_auth_btn">
                                <i class="fa fa-facebook"></i><?php _e("Facebook", ET_DOMAIN) ?>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($use_twitter){ ?>
                        <li>
                            <a href="<?php echo add_query_arg('action', 'twitterauth', home_url()) ?>" class="tw">
                                <i class="fa fa-twitter"></i><?php _e("Twitter", ET_DOMAIN) ?>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($gplus_login){ ?>
                        <li>
                            <a href="#" class="gplus gplus_login_btn">
                                <i class="fa fa-google-plus"></i><?php _e("Plus", ET_DOMAIN) ?>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($linkedin_login){ ?>
                        <li>
                            <a href="#" class="lkin">
                                <i class="fa fa-linkedin"></i><?php _e("Linkedin", ET_DOMAIN) ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="section-wrapper section-forgot collapse">
    <form class="form-mobile-wrapper forgot_form" id="forgot_form">
    	<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="text-choose"></span>
                </div>
            </div>
        </div>

    	<div class="form-group-mobile">
        	<span class="icon-form-login icon-email"></span>
            <input type="text" id="user_email" name="user_email" placeholder="<?php _e("Enter username or email", ET_DOMAIN) ?>">
        </div>
        <div class="form-group-mobile">
        	<a href="#" class="forgot-link change-link-login"><?php _e("Login Your Account", ET_DOMAIN); ?></a>
        </div>
        <div class="form-group-mobile form-submit-btn">
        	<button class="btn-sumary btn-submit"><?php _e("SUBMIT", ET_DOMAIN); ?></button>
        </div>
    </form>
    <div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<p class="text-policy"></p>
                <a href="#" class="change-link-register"><?php _e("New? Click here to become a member", ET_DOMAIN); ?></a>
            </div>
        </div>
    </div>
</section>

<?php
	et_get_mobile_footer();
?>