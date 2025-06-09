<?php

$google_account = get_option('gmlg_google_account');
$base_url       = 'https://meet.google.com/new';

if ( ! empty($google_account)) {
    $base_url .= '?authuser=' . urlencode($google_account);
}

?>

    <form method="post">
        <input type="submit" name="generate_meet" value="Start Google Meet" class="button button-primary"/>
    </form>

<?php
if (isset($_POST['generate_meet'])) {
    echo '<p><a href="' . esc_url(
            $base_url
        ) . '" target="_blank" class="button">Click here to open Google Meet</a></p>';
}
