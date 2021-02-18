<?php

/** Send Mail
 *
 * @param string $mailTo
 * @param string $subject
 * @param string $msg
 * @return void */
function sendMail($mailTo, $subject, $msg, $file = null, $mailType = 'text')
{
	$ci = &get_instance();
	$ci->load->library('email', [
		'protocol'  => 'SMTP',
		'smtp_host' => "mail.proplive.in",
		'smtp_user' => "info@proplive.in",
		'smtp_pass' => "Proplive@123",
		'smtp_port' => 587,
		'wordwrap'  => TRUE,
		'mailtype'  => $mailType
	]);
	$ci->email->from('info@proplive.in');

	$ci->email->to($mailTo);
	$ci->email->subject($subject);
	// $ci->email->message(emailTemplate($msg, [
	// 	'mail' => 'info@firstprize.in',
	// 	'url' => 'https://firstprize.in/'
	// ]));
	$ci->email->message($msg);
	isset($file) and !is_null($file) and $ci->email->attach($file);
	return $ci->email->send();
}


/** Send Message
 *
 * @param string $msg
 * @param int $mobile
 * @return string */
function shootMsg($msg, $mobile)
{
	$sender_id = 'PRPLIV';
	$key = "55E202E726F8EA";
	$routeid = "7";
	$campaign = "9417";
	$end_point_url = "http://byebyesms.com/app/smsapi/index.php";
	$url = "key=" . $key . "&campaign=" . $campaign . "&routeid=" . $routeid . "&type=text&contacts=" . $mobile . "&senderid=" . $sender_id . "&msg=" . $msg;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $end_point_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $url);
	$response = curl_exec($ch);
	curl_close($ch);
	return $response;
}

function emailTemplate($msg_data, $userInfo)
{
	return '<div style="margin: 0 !important;color: #303b41;background-color: #f3f7f8;">
				<div style="width: 100%;background: #fff;max-width: 600px;
					margin: 0 auto;border: 1px solid #e5e8e9;table-layout: fixed;overflow: hidden;">
					<!-- Logo -->
					<table style="width: 100%;max-width: 600px;margin: 0 auto;
					background-size: 100%;border-spacing: 0;font-family: sans-serif;color: #303b41;
					font-size: 16px;">
						<tr>
							<td style="width: 100%;max-width: 100%;height: auto;">
								<img src="' . SITE_URL . 'assets/img/email-template/banner.png" alt="logo-banner" height="auto" width="100%">
							</td>
						</tr>
						<tr><td style="padding: 5%;">' . $msg_data . '</td></tr>
					</table>
					<table style="width: 100%;max-width: 600px;margin: 0 auto;
					background-size: 100%;border-spacing: 0;font-family: sans-serif;color: #303b41;
					font-size: 16px;">
						<tr style="padding: 30px 30px;float: left;clear: both;width: 100%;">
							<td style="font-size: 16px;line-height: 1.5;text-align: left;">
								<p style="width: 100%;float: left;clear: both;">
									<div>
										Thank you
									</div>
									<div>
										Team ' . SITE_NAME . '
									</div>
								</p>
								<p style="width: 100%;float: left;clear: both;">
									For any query mail at <a href="mailto:' . $userInfo['mail'] . '" style="font-weight: 600;color: #085ebc;text-decoration: none;">
										' . $userInfo['mail'] . '
									</a>
								</p>
							</td>
						</tr>
					</table>

					<table style="width: 100%;max-width: 600px;background-color: #f3f7f8;border-top: 1px solid #e5e8e9;border-spacing: 0;font-family: sans-serif;color: #303b41;font-size: 16px;padding: 30px;">
						<tr>
							<td style="text-align: left;color: #303b41;font-size: 16px;padding: 0;background-color: #f3f7f8;width: 100%;max-width: 31.33%;display: inline-block;vertical-align: top; text-align: left;padding: 0px 0;">
								<h3 style="font-weight: 500;margin-top: 1px;margin-bottom: 1px;font-size: 20px;color: #000;">About</h3>
								<p style="width: 100%;float: left;clear: both;color: rgba(0,0,0,.5);font-size: 15px;line-height: 1.8;">
									' . SITE_NAME . ' will enable your child to achieve their Success Story.
								</p>

							</td>
							<td style="text-align: left;color: #303b41;font-size: 16px;padding: 0;background-color: #f3f7f8;width: 100%;max-width: 40%;display: inline-block;vertical-align: top;text-align: left;padding: 0px 10px;">
								<h3 style="font-weight: 500;margin-top: 1px;margin-bottom: 1px;font-size: 20px;color: #000;">Contact Info</h3>
								<p style="color: rgba(0,0,0,.5);font-size: 15px;line-height: 1.8;">
									<div style="color: rgba(0,0,0,.5);font-size: 15px;line-height: 1.8;"><img src="' . SITE_URL . 'assets/img/email-template/email-icon.png" alt="email"> : contact@learnoma.com</div>
									<div style="color: rgba(0,0,0,.5);font-size: 15px;line-height: 1.8;"><img src="' . SITE_URL . 'assets/img/email-template/phone-icon.png" alt="phone"> : +91 - 722-999-11-99</div>
								</p>
							</td>
							<td style="text-align: left;color: #303b41;font-size: 16px;padding: 0;background-color: #f3f7f8;width: 100%;max-width: 24%;display: inline-block;vertical-align: top;text-align: left;padding: 0px 0;">
								<h3 style="font-weight: 500;margin-top: 1px;margin-bottom: 0.7em;font-size: 20px;color: #000;">Useful Links</h3>
								<p style="width: 100%;float: left;clear: both;color: rgba(0,0,0,1);font-size: 15px;line-height: 1.8;margin-top: 0;margin-bottom: 0;">
									<a href="' . $userInfo['url'] . '" style="color: rgba(0,0,0,1);font-size: 15px;text-decoration: none;">
										Home
									</a>
								</p>
								<p style="width: 100%;float: left;clear: both;color: rgba(0,0,0,1);font-size: 15px;line-height: 1.8;margin-top: 0;margin-bottom: 0;">
									<a href="' . $userInfo['url'] . 'courses" style="color: rgba(0,0,0,1);font-size: 15px;text-decoration: none;">
										Courses
									</a>
								</p>
								<p style="width: 100%;float: left;clear: both;color: rgba(0,0,0,1);font-size: 15px;line-height: 1.8;margin-top: 0;margin-bottom: 0;">
									<a href="' . $userInfo['url'] . '" style="color: rgba(0,0,0,1);font-size: 15px;text-decoration: none;">
										' . SITE_NAME . '
									</a>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p style="width: 100%;float: left;clear: both;color: rgba(0,0,0,.4);font-size: 15px;line-height: 1.8;margin-top: 40px;margin-bottom: 0;text-align: center;">
									No longer want to receive these email? You can
									<a href="#" style="color: rgba(0,0,0,1);font-size: 15px;text-decoration: none;">
										Unsubscribe here
									</a>
								</p>
							</td>
						</tr>
					</table>
				</div>
			</div>';
}
