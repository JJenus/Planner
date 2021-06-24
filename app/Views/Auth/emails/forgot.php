<p>Someone requested a password reset at this email address for <?= base_url() ?>.</p>

<p>To reset the password use this code or URL and follow the instructions.</p>

<p>Your Code: <?= $hash ?></p>

<p>Visit the <a href="<?= base_url() . route_to('reset-password') . '?token=' . $hash ?>">Reset Form</a>.</p>
<?php echo base_url() . route_to('reset-password') ?>
<br>

<p>If you did not request a password reset, you can safely ignore this email.</p>
