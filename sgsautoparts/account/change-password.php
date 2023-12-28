<?php 

/*
    Template Name: Change Password
*/

get_header();

?>


    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php  
                    if (isset($_POST['change-password'])) {
                        if (is_user_logged_in()) {
                            $user_id = get_current_user_id();
                            $user_data = get_userdata($user_id);
                            $old_password = sanitize_text_field($_POST['old-password']);
                            $new_password = sanitize_text_field($_POST['new-password']);
                            $confirm_password = sanitize_text_field($_POST['confirm-password']);
                    
                            if (wp_check_password($old_password, $user_data->user_pass, $user_id)) {
                                if ($new_password === $confirm_password) {
                                    wp_set_password($new_password, $user_id);
                                    echo '<div class="alert alert-success"><strong class="text-success">Password changed successfully!</strong></div>';
                                } else {
                                    echo '<div class="alert alert-danger"><strong class="text-danger">New Password and Confirm Password do not match. Please try again.</strong></div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger"><strong class="text-danger">Incorrect old password. Please try again.</strong></div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger"><strong class="text-danger">You must be logged in to change your password.</strong></div>';
                        }
                    }
                ?>
                <?php if (is_user_logged_in()) : ?>
                    <?php $pageTitle = get_field('title');?>
                    <?php if(!empty($pageTitle)): ?>
                        <h1><?php echo $pageTitle; ?> </h1>
                    <?php endif; ?>
                    <div class="sn-divider"></div>
                    <?php if(have_rows('fd_name')) : while (have_rows('fd_name')) : the_row(); ?>
                        <form id="change-password-form" method="post">
                            <?php $oldP = get_sub_field('current_password') ?>
                            <?php if(!empty($oldP)): ?>
                                <div class="mb-3">
                                    <label for="old-password" class="form-label"><?php echo $oldP ?> :</label>
                                    <input type="password" class="form-control" name="old-password" required>
                                </div>
                            <?php endif; ?>
                            <?php $newP = get_sub_field('new_password') ?>
                            <?php if(!empty($newP)): ?>
                                <div class="mb-3">
                                    <label for="new-password" class="form-label"><?php echo $newP; ?> :</label>
                                    <input type="password" class="form-control" name="new-password" required>
                                </div>
                            <?php endif; ?>
                            <?php $cPsd = get_sub_field('confirm_password') ?>
                            <?php if(!empty( $cPsd )): ?>
                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label"><?php echo $cPsd; ?> :</label>
                                    <input type="password" class="form-control" name="confirm-password" required>
                                </div>
                            <?php endif; ?>

                            <button type="submit" class="button" name="change-password">Change Password</button>
                        </form>
                    <?php endwhile;
                        endif; ?>
                <?php else : ?>
                    <div class="alert alert-warning">
                        <strong>
                            <?php 
                                $notLog = get_field('not_logined_message');
                                if(!empty( $notLog )){
                                    echo $notLog;
                                }
                            ?>
                        </strong>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php
get_footer();
?>