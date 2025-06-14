<?php

$google_account = get_option('gmlg_google_account');
$base_url       = 'https://meet.google.com/new';

if ( ! empty($google_account)) {
    $base_url .= '?authuser=' . urlencode($google_account);
}

// Handle sending email
if (isset($_POST['gmlg_send_meet']) && isset($_POST['gmlg_recipients']) && is_array($_POST['gmlg_recipients'])) {
    $recipients = array_map('sanitize_email', $_POST['gmlg_recipients']);
    $subject    = 'Join Google Meet';
    $message    = 'Here is your Google Meet link: ' . esc_url_raw($_POST['gmlg_meet_link']);
    $headers    = ['Content-Type: text/html; charset=UTF-8'];

    foreach ($recipients as $email) {
        wp_mail($email, $subject, $message, $headers);
    }

    echo '<div class="notice notice-success"><p>Meeting link sent to selected users.</p></div>';
}
?>

<form method="post">
    <input type="submit" name="generate_meet" value="Start Google Meet" class="button button-primary"/>
</form>

<?php
if (isset($_POST['generate_meet'])): ?>
    <h3>Google Meet Link Generated</h3>
    <p>
        <a href="<?php
        echo esc_url($base_url); ?>" target="_blank" class="button">Open Google Meet</a>
    </p>

    <form method="post">
        <input type="hidden" name="gmlg_meet_link" value="<?php
        echo esc_attr($base_url); ?>"/>
        <h4>Send link to subscribers:</h4>
        <?php
        $subscribers = get_users(['role' => 'subscriber']);
        foreach ($subscribers as $user):
            ?>
            <label>
                <input type="checkbox" name="gmlg_recipients[]" value="<?php
                echo esc_attr($user->user_email); ?>"/>
                <?php
                echo esc_html($user->display_name . ' (' . $user->user_email . ')'); ?>
            </label><br/>
        <?php
        endforeach; ?>

        <br/>
        <input type="submit" name="gmlg_send_meet" value="Send Meet Link to Selected Users"
               class="button button-secondary"/>
    </form>
<?php
endif; ?>
