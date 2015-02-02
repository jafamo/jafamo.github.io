<?php
/*********************************************************************/
/*                             CcMail 1.0                            */
/*  Written by Emanuele Guadagnoli - cicoandcico[at]cicoandcico.com  */
/*      Reference page: http://www.cicoandcico.com/products.php      */
/*                            License: GPL                           */
/*             DO NOT EDIT UNLESS YOU KNOW WHAT YOU'RE DOING         */
/*********************************************************************/

//UPDATE.PHP - Updates old versions (reports new settings)
if (!function_exists('mail_array')) include ($functions_dir . "/shared.php");
$success = true;

//***********************From 1.0RC1 to 1.0RC2***********************
//New settings:
if (!file_exists($settings_dir . "/notify_user.ccmail"))
	if (!write_to_file($settings_dir . "/notify_user.ccmail", "<?php //DONT EDIT!!!\n\$notify_user = \"YES\";\n?>")) $success = false;

if (!file_exists($settings_dir . "/notify_admin.ccmail"))
	if (!write_to_file($settings_dir . "/notify_admin.ccmail", "<?php //DONT EDIT!!!\n\$notify_admin = \"YES\";\n?>")) $success = false;

//***********************From 1.0RC2 to 1.0RC3***********************
//New users format
$users_to_update = array_merge(getusers(true, true), getusers(false, true)); //get complete address filenames, without ccmail extension
$update = true;
foreach ($users_to_update as $user) if (strstr($user, "_~_")) $update = false;
if ($update){
foreach ($users_to_update as $user) {
	$filename = $addresses_dir . "/" . $user;
	$timestamp = filemtime($filename);
	$new_filename = $filename . "_~_" . $timestamp;
	if (strstr($new_filename, "~--OLD--~")) $new_filename = str_replace("~--OLD--~", "", $new_filename) . "~--OLD--~";
	if (!is_writable($filename)) @chmod($filename, 0755);
	if (!rename($filename, $new_filename)) $success = false;
}}

//New settings:
if (file_exists($settings_dir . "/MAX_DISPLAYED_RECIPIENTS.ccmail")){
	@chmod($settings_dir . "/MAX_DISPLAYED_RECIPIENTS.ccmail", 0755);
	@unlink($settings_dir . "/MAX_DISPLAYED_RECIPIENTS.ccmail");
	if (!write_to_file($settings_dir . "/max_displayed_recipients.ccmail", "<?php //DONT EDIT!!!\n\$max_displayed_recipients = \"20\";\n?>")) $success = false;
	}
	
if (!file_exists($settings_dir . "/send_method.ccmail"))
	if (!write_to_file($settings_dir . "/send_method.ccmail", "<?php //DONT EDIT!!!\n\$send_method = \"mail\";\n?>")) $success = false;

if (!file_exists($settings_dir . "/smtp_host.ccmail"))
	if (!write_to_file($settings_dir . "/smtp_host.ccmail", "<?php //DONT EDIT!!!\n\$smtp_host = \"smtp.email.com\";\n?>")) $success = false;

if (!file_exists($settings_dir . "/smtp_port.ccmail"))
	if (!write_to_file($settings_dir . "/smtp_port.ccmail", "<?php //DONT EDIT!!!\n\$smtp_port = \"25\";\n?>")) $success = false;

if (!file_exists($settings_dir . "/smtp_helo.ccmail"))
	if (!write_to_file($settings_dir . "/smtp_helo.ccmail", "<?php //DONT EDIT!!!\n\$smtp_helo = \"smtp.email.com\";\n?>")) $success = false;

if (!file_exists($settings_dir . "/smtp_auth.ccmail"))
	if (!write_to_file($settings_dir . "/smtp_auth.ccmail", "<?php //DONT EDIT!!!\n\$smtp_auth = \"\";\n?>")) $success = false;

if (!file_exists($settings_dir . "/smtp_uname.ccmail"))
	if (!write_to_file($settings_dir . "/smtp_uname.ccmail", "<?php //DONT EDIT!!!\n\$smtp_uname = \"\";\n?>")) $success = false;

if (!file_exists($settings_dir . "/smtp_passw.ccmail"))
	if (!write_to_file($settings_dir . "/smtp_passw.ccmail", "<?php //DONT EDIT!!!\n\$smtp_passw = \"\";\n?>")) $success = false;

//***********************From 1.0RC3 to 1.0.0***********************
//New settings:
if (!file_exists($settings_dir . "/mail_priority.ccmail"))
	if (!write_to_file($settings_dir . "/mail_priority.ccmail", "<?php //DONT EDIT!!!\n\$mail_priority = \"3\";\n?>")) $success = false;

if (!file_exists($settings_dir . "/pause_for.ccmail"))
	if (!write_to_file($settings_dir . "/pause_for.ccmail", "<?php //DONT EDIT!!!\n\$pause_for= \"2\";\n?>")) $success = false;

if (!file_exists($settings_dir . "/pause_every.ccmail"))
	if (!write_to_file($settings_dir . "/pause_every.ccmail", "<?php //DONT EDIT!!!\n\$pause_every = \"100\";\n?>")) $success = false;

if (!file_exists($settings_dir . "/banned_domains.ccmail"))
	if (!write_to_file($settings_dir . "/banned_domains.ccmail", "<?php //DONT EDIT!!!\n\$banned_domains = \"\";\n?>")) $success = false;

//***********************From 1.0.0 to 1.0.1***********************
//New settings:
if (!file_exists($settings_dir . "/validation_email.ccmail"))
	if (!write_to_file($settings_dir . "/validation_email.ccmail", "<?php //DONT EDIT!!!\n\$validation_email= \"\";\n?>")) $success = false;

if (!file_exists($settings_dir . "/subscription_form_url.ccmail"))
	if (!write_to_file($settings_dir . "/subscription_form_url.ccmail", "<?php //DONT EDIT!!!\n\$subscription_form_url= \"\$company_site/ccmail/index.php\";\n?>")) $success = false;
	
if (!file_exists($settings_dir . "/validation_text.ccmail"))
	if (!write_to_file($settings_dir . "/validation_text.ccmail", "<?php //DONT EDIT!!!\n\$validation_text= \"We received your subscription request, now we need the confirm that you really want to subscribe to our Mailing List.<br>To validate your subscription, just click here:<br><br>VALIDATION_LINK<br><br>No more emails will be sent to you until the account is validated.\";\n?>")) $success = false;
	
if (!file_exists($settings_dir . "/lang.ccmail"))
	if (!write_to_file($settings_dir . "/lang.ccmail", "<?php //DONT EDIT!!!\n\$lang= \"en\";\n?>")) $success = false;

//Destroying this file...
@chmod(__FILE__, 0755);
if($success) @unlink(__FILE__);
else print "<br><center><b>Update process encountered some errors!</b></center><br>";
?>
