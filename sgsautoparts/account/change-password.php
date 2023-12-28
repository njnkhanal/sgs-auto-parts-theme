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
                    <form id="change-password-form" method="post">
                        <div class="mb-3">
                            <label for="old-password" class="form-label">Old Password:</label>
                            <input type="password" class="form-control" name="old-password" required>
                        </div>

                        <div class="mb-3">
                            <label for="new-password" class="form-label">New Password:</label>
                            <input type="password" class="form-control" name="new-password" required>
                        </div>

                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm Password:</label>
                            <input type="password" class="form-control" name="confirm-password" required>
                        </div>

                        <button type="submit" class="button" name="change-password">Change Password</button>
                    </form>
                <?php else : ?>
                    <div class="alert alert-warning">
                        <strong >You must be logged in to change your password. <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')) ?>">Login / Register</a></strong>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php
get_footer();
?>