<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

/** Genrating PDF using `TCPDF` */
class Pdf extends TCPDF
{
	public function __construct()
	{
		parent::__construct();
	}

	//Page header
	public function Header()
	{
		// Logo
		$image_file = SITE_URL . 'assets/insti/img/insti_logo.png';

		$this->Image($image_file, 10, 10, 50, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);

		$this->Line(10, 25, 200, 25, [
			'width' => 0.5,
			'cap'   => 'round',
			'join'  => 'round',
			'dash'  => 0,
			'color' => [0, 0, 0]
		]);
	}

	// Page footer
	public function Footer()
	{
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number

		$this->Line(10, 278, 200, 278, [
			'width' => 0.5,
			'cap'   => 'round',
			'join'  => 'round',
			'dash'  => 0,
			'color' => [0, 0, 0]
		]);

		$this->Multicell(0, 15, "Address : B-311, DAV School road, Talwandi, Kota (Rajasthan) Pin Code : 324005\nWebsite : www.firstprize.in | E-mail : info@firstprize.in | Contact : +919664353157\n", 0, 'C', false, 0, '', '', true, 0, false, true, 0, 'T', false);
	}

	public function createPDF($userId, $userName, $userEmail, $userMobile, $userDate, $pdfOutput = 'I')
	{
		// Define Sender Or Compony Details
		$logo_url    = SITE_URL . "fe/img/logo.png";
		$componyName = ucwords("Team " . SITE_NAME);

		// From
		$senderName  = ucwords($componyName);
		$senderMail  = 'info@firstprize.in';
		$senderAddr  = '';
		$senderAddr2 = 'Kota, Rajasthan';

		// Define User Details
		$userName  = ucwords($userName);
		$userMail  = $userEmail;
		$userAddr  = $userMobile;
		$userAddr2 = 'Kota, Rajasthan';

		$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);

		// set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetAuthor($componyName);
		$pdf->SetTitle('Offer Letter');
		$pdf->SetSubject('Offer Letter');
		$pdf->SetKeywords('TCPDF, PDF, INVOICE');
		// add a page
		$pdf->AddPage();


		$tbl = '<style>
		* {margin: 0;padding: 0;box-sizing: border-box;line-height: 1.6;font-family: sans-serif;color: #3a4161;}a,p,h4,span,td {font-size: 14px;}.grid {display: grid;}.place-base {align-self: flex-end;}.col-2 {grid-template: "left right"1fr;}.w-75 {width: 75%;}.head>td {font-weight: bold;font-size: 22px;}.text-dark {font-weight: bolder;color: #3a416150;}.mt-3 {margin-top: 15%;}.mt-1 {margin-top: 5%;}.center {margin-left: auto;margin-right: auto;}.text-right {text-align: right;}img {width: 250px;}
	  </style>
	  <table style="width: 100%; margin: 0 auto;" align="center">
		<tr>
		  <td><img style="align-self:center" src="' . $logo_url . '" alt="" /></td>
		  <td>
			<div style="text-align: right">
			  <span class="text-dark">FROM</span>
			  <h4>' . $senderName . '</h4>
			  <span>' . $senderMail . '</span> <br />
			  <span
				>' . $senderAddr . ',<br />
				' . $senderAddr2 . '</span
			  >
			</div>
		  </td>
		</tr>
		<tr>
		  <td style="text-align: left">
			<h1 style="margin:0;padding:0">Offer Letter</h1>
		  </td>
		  <td>
			<div class="" style="text-align: right">
			  <span class="text-dark">TO</span>
			  <h4>' . $userName . '</h4>
			  <span>' . $userMail . '</span> <br />
			  <span
				>' . $userAddr . '<br />
				' . $userAddr2 . '</span
			  >
			</div>
		  </td>
		</tr>
	  </table>
	  <hr class="w-75 center" />
	  <p style="padding: 5%;text-align: justify;"><p>Keeping in mind the email proposal sent by you on dated ' . $userDate . ', your qualifications
	  documents &amp; experience, here you are appointed for technical support of the “' . SITE_NAME . '”.</p><p>Your task will be to promote the website, design and make changes from time to time and all other types of activities that can promote and propagate the website. Along with this, you will also be responsible for all types of securities e.g. online and offline of the website.</p><ul><li>Your salary will be credited or transferred to the bank account given by you on the 10th of every month.</li><li>After the completion of this MOU if your services found satisfactory will be confirmed for next session.</li><li>You are entitled for one leave per month &amp; should be pre approved.</li></ul><br/><p>Waiting for your acceptance mail wish you very good luck &amp; stay safe.</p></p>
	  <div class="grid center" style="padding: 0 5%">
		<div style="margin-top:2px">
		  <h2>Thanks,</h2>
		  <h3 style="margin-top:2px">' . $componyName . '</h3>
		</div>
	  </div>
	  ';
		$pdf->writeHTML($tbl, true, false, false, false, '');

		file_exists($_SERVER['DOCUMENT_ROOT'] . '/uploads/offer-letter/') or mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads/offer-letter/', 0777, true);
		$pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/uploads/offer-letter/' . 'offer-letter-' . $userId . '.pdf', $pdfOutput);

		return SITE_URL . 'uploads/offer-letter/' . 'offer-letter-' . $userId . '.pdf';
	}

	public function agreement(int $userId = 0, array $userDetails = [], string $senderSignature, string $userDate, string $pdfOutput = 'I')
	{
		// From
		$senderSignature = $senderSignature;

		$title = 'agreement';

		// Define User Details
		$userName        = ucwords(exists($userDetails['name']));
		$userPan         = exists($userDetails['pan']);
		$userMail        = exists($userDetails['email']);
		$userMobile      = exists($userDetails['mobile']);
		$userAddr        = exists($userDetails['currentAddress']);
		$userAddr2       = exists($userDetails['permanentAddress']);
		$userSignature   = exists($userDetails['signature']);
		$userSignature_1 = exists($userDetails['signature_1']);


		$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);

		// set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetAuthor('TWS Technology');
		$pdf->SetTitle('Faculty/Employee Agreement');
		$pdf->SetSubject('Faculty/Employee Agreement');
		$pdf->SetKeywords('TCPDF, PDF, INVOICE');
		// add a page
		$pdf->AddPage();


		$tbl = '<style>
					td {
						padding: 0.5%;
						text-align: center;
					}

					li {
						margin-bottom: .5%;
					}

					p,
					ol {
						text-align: justify;
					}

					img {
						width: 250px;
					}
				</style>

				<div>
					<h1 style="text-align: center; margin-bottom: 5%"><strong>Faculty/Employee</strong> Agreement</h1>
					<p>
						This <strong>Faculty/Employee</strong> Agreement (hereinafter “Agreement) is entered on this <b>' . $userDate . '</b> by and between, First
						Prize, Kota (Raj.) The Institue (FIRST PRIZE) incorporated undder tthe provisions of the shop and commercial establishment Act, 1958 having Registration no. <strong>SCA/2019/20/133879</strong> and having its registered office at No. B-167 In front of DAV Public School, Talwandi, Kota, Rajasthan India (hereinafter “First Prize”) and the <strong>Faculty/Employee</strong> (as defined on signature page). First Prize and Educator shall be individually referred to as “Party” and Collectively as “Parties”.</p>
					<div style="margin-top: 5%;">
						<table class="mytable" border="1" cellpadding="6">
							<tbody>
								<tr>
									<td style="width: 5%">1.</td>
									<td style="width: 10%">Service</td>
									<td style="width: 85%;">
										<p>As a <strong>Faculty/Employee</strong>, the <strong>Faculty/Employee</strong> will strive to add maximum lessons with topnotch content in any given category on www.eschoolindia.net (“Website”) and conduct live session on the First Prize platform (First Prize Platform) on mutually agreed topics.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">2.</td>
									<td style="width: 10%">Faculty</td>
									<td style="width: 85%;">
									<p style="text-align:left">
										Name : <b>' . $userName . '</b><br>
										Pan : <b>' . $userPan . '</b><br>
										Address: <b>' . $userAddr . '</b>
									</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">3.</td>
									<td style="width: 10%">Deliverables</td>
									<td style="width: 85%;">
										<p>During the terms of the Agreement the <strong>Faculty/Employee</strong> responsibility as a <strong>Faculty/Employee</strong> Shall be to</p>
										<ol type="i" class="mt-2">
											<li>
												Create Courses on the Website
											</li>
											<li>
												The Courses shall be in the language that is mutually agreed.
											</li>
											<li>Conducting special classes.</li>
											<li>Update the KPL sheet that is shared via email on daily basis.</li>
											<li>Maintain contact with the assigned First Prize point of contact (POC).</li>
											<li>Promotion of Educator courses on social media or any other platform
												unless a promotion plan is agreed with First Prize.</li>
											<li>
												Conduct Live Sessions on First Prize’s Platform.
											</li>
										</ol>
										<p>The specific details of the monthly deliverables shall be mutually agreed and
											confirmed on email and such email confirm shall be binding on both the Parties.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">4.</td>
									<td style="width: 10%">Payouts</td>
									<td style="width: 85%;">
										<p>The Educator shall receive the following payouts for the deliverables.</p>
										<ol class="mt-2">
											<li>
												Payout as agreed and confirmed on email.
											</li>
											<li>
												Additional incentives, if applicable, based on views milestones:
											</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">5.</td>
									<td style="width: 10%">Account Monitoring</td>
									<td style="width: 85%;">
										<p>During the terms of this Agreement, the <strong>Faculty/Employee</strong>’s profile will be closely monitored on monthly basis. The monitoring shall be based on the date provided by First Prize’s internal algorithm which determines the quality of the lessons based on different parameters. A weekly review feedback shall be sent to the <strong>Faculty/Employee</strong> based on the data generated by the algorithm.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">6.</td>
									<td style="width: 10%">Event of Default</td>
									<td style="width: 85%;">
										<p>First Prize shall have the right in its sole discretion to suspend/terminate this Agreement and the <strong>Faculty/Employee</strong> status of the Educator if First Prize in its sole
											opinion believes that the educator during the terms of the Agreement.</p>

										<ol class="mt-2">
											<li>
												Has uploaded lessons which contain incorrect content or infringes any third
												party copyrighted content.
											</li>
											<li>Has uploaded lesson that are of poor quality as per the data generated by
												First Prize’s internal alogorithm.</li>
											<li>Becomes unable to take any special Classes/Courses</li>
											<li>Is not able to complete the mutually agreed deliverables within the agreed
												timeline.</li>
											<li>Is not consistent in his/her performance.</li>
											<li>Is not disciplined in performing his/her deliverables.</li>
											<li>Is involved in any activities that amount to misconduct</li>
											<li>Has engaged in unethical methods to achieve his/her deliverables</li>
											<li>Does not keep the terms of this Agreement confidential</li>
											<li>Breached any terms of this agreement.</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">7.</td>
									<td style="width: 10%">Delivery Timeline & License Period</td>
									<td style="width: 85%;">
										<ol>
											<li>
												<strong>Faculty/Employee</strong> will make sure that all his/her deliverables are performed
												in timely manner and in accordance with the timelines that were agreed on email with the POC.
											</li>
											<li>
												<strong>Faculty/Employee</strong> grants First Prize an exclusive license for a period of 2
												years from the date of the live steam of Course or publication of any
												<strong>Faculty/Employee</strong> Content of the <strong>Faculty/Employee</strong> on the Platform
												during which period First Prize shall have the right to access, use, distribute
												and publish the <strong>Faculty/Employee</strong> Content on its Platform & Website, as
												the case maybe, for the access of its learners.
											</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">8.</td>
									<td style="width: 10%">Penalty</td>
									<td style="width: 85%;">
										<p>In case the <strong>Faculty/Employee</strong> fails to achieve the target then a penalty shall be applicable which shall be as communicated by email and at the sole discretion of First Prize. Further, payment shall be made on pro rata basis.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">9.</td>
									<td style="width: 10%">Payment Terms</td>
									<td style="width: 85%;">
										<p>All eligible payouts shall be made in accordance with the timelines that are communicated to the <strong>Faculty/Employee</strong> by the POC over email. All eligible payouts shall be subject to applicable statutory deductions and applicable taxes.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">10.</td>
									<td style="width: 10%">Term</td>
									<td style="width: 85%;">
										<p>This Agreement shall be effective from <b>' . $userDate . '</b> to <b>' . date('d-m-Y', strtotime($userDate) + 94608000) . '</b> unless terminated in accordance with the terms of this Agreement.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">11.</td>
									<td style="width: 10%">Termination</td>
									<td style="width: 85%;">
										<ol type="a">
											<li>
												Termination at will: Either Party can terminate this Agreement by giving the
												other Party a prior written notice of 10 days with or without providing any
												reason for such termination.
											</li>
											<li>
												Termination for Cause
												<ol>
													<li>
														First Prize can terminate this Agreement in the Event of Default as
														mentioned in clause 6 by giving 7 days prior notice to the
														<strong>Faculty/Employee</strong>.
													</li>
													<li>
														First Prize may terminate this Agreement with immediate effect, if
														in the sole opinion of First Prize the Educator has breached the
														confidentiality obligation or is involved in any unethical practices
														or misconduct.
													</li>
												</ol>
											</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">12.</td>
									<td style="width: 10%">Effect of Termination</td>
									<td style="width: 85%;">
										<p>Termination of the agreement shall not affect the payment liability of First Prize to the Educator for all the deliverables successfully performed by the Educator before the date of termination provided that such termination is not for misconduct or unethical practices, in such cases no payment shall be made to the <strong>Faculty/Employee</strong>.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">13.</td>
									<td style="width: 10%">Confidentiality</td>
									<td style="width: 85%;">
										<p><strong>Faculty/Employee</strong> agrees and understands that this Agreement, it terms and any information relating to this Agreement are highly confidential and shall not be disclosed to any third party without the prior written approval of First Prize Notwithstanding anything contained in this Agreement, breach of this clause shall amount to immediate termination of this Agreement without any prior notice.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">14.</td>
									<td style="width: 10%">Working Policies</td>
									<td style="width: 85%;">
										<ol type="i">
											<li>The <strong>Faculty/Employee</strong> agrees and understands that the class can be arranged/taken from 6:00 am to 10 : 00 pm within this time duration per day.
											</li>
											<li>In full day <strong>Faculty/Employee</strong> can take six classes and two doubt classes in a day.</li>
											<li><strong>Faculty/Employee</strong> can take maximum full day schedule as mention in sec 18 -> (ii) point and minimum one class and one doubt class in one day.</li>
											<li>Company/Institute pay minimum Rs. 1,000/- per student per subject for complete session.</li>
											<li>Company/Institute provide minimum 1,000 students in one session.</li>
											<li>Company/Institute provide online platform for your extra income. So you cannot work with another platform other than First Prize for your personal benefit.</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">15.</td>
									<td style="width: 10%">Content Ownership and removal</td>
									<td style="width: 85%;">
										<p>At all times <strong>Faculty/Employee</strong> retains ownership in the content created and provided for uploading on First Prize’s plus platform and Website, <strong>Faculty/Employee</strong> understand and agrees that First Prize incurs cost for providing the Website, conducting marketing and promotional activities. <strong>Faculty/Employee</strong> further agrees and understand that the consideration paid to <strong>Faculty/Employee</strong> under this Agreement is towards the license that <strong>Faculty/Employee</strong> gives First Prize to publish <strong>Faculty/Employee</strong> content. If during the terms of this Agreement or thereafter <strong>Faculty/Employee</strong> wishes to remove <strong>Faculty/Employee</strong> content from the Website, <strong>Faculty/Employee</strong> Agrees that First Prize shall have the right to recover and <strong>Faculty/Employee</strong> shall have the obligation to return to First Prize, and shall the amount that <strong>Faculty/Employee</strong> has received from First Prize during the term of this Agreement for the content uploaded on the Website including the milestone incentive payouts. For the purpose of clarity, content uploaded on the platform cannot be remove for the license period. <strong>Faculty/Employee</strong> understands and agree, however, that First Prize may retain, and may display, distribute, or perform, server copies of <strong>Faculty/Employee</strong> videos that have been removed or deleted.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">16.</td>
									<td style="width: 10%">Online terms & condition and Privacy Policy</td>
									<td style="width: 85%;">
										<p>First Prize’s online terms and conditions and privacy policy that is available on <a href="' . SITE_URL . '">www.firstprize.in</a> shall be applicable to the <strong>Faculty/Employee</strong> and shall become part of this Agreement by reference.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">17.</td>
									<td style="width: 10%">Condition & Policies </td>
									<td style="width: 85%;">
										<p>These all Terms & Conditions for payment applicable full day equivalent. If Faculty/Employee work partially as compare to full one day working hours then the all payments divide partially in same ratio according with company policy. If you are satisfied then sign the agreement and start your work. Full day means Six full classes and two Doubt classes and duration of one class minimum 60 minutes and maximum 90 minutes. Then for partial work divide the payment in same ratio according to work duration of Faculty/Employee.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">18.</td>
									<td style="width: 10%">Conflict</td>
									<td style="width: 85%;">
										<p>In case of any conflict between the provision of this Agreement and the online terms and conditions and privacy policy the terms of this Agreement shall prevail.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">19.</td>
									<td style="width: 10%">Individual Contractors</td>
									<td style="width: 85%;">
										<p>The <strong>Faculty/Employee</strong> agrees and understands that nothing in this Agreement shall be construed to create an employment or agency relationship. Partnership or joint venture between First Prize and the <strong>Faculty/Employee</strong>. <strong>Faculty/Employee</strong> is an independent contractor and shall have no authority to bind or represent First Prize. <strong>Faculty/Employee</strong> shall not be entitled to participate in and/or receive any benefits that may be offered to First Prize’s employees from time to time. The <strong>Faculty/Employee</strong> acknowledges that First Prize has no obligation to withhold any income or other payroll taxes on the <strong>Faculty/Employee</strong>’s behalf other that as mentioned elsewhere under this Agreement and that the <strong>Faculty/Employee</strong> will be solely responsible for compliance with all state, central and local laws pertaining to statutory compliances, payment to its employees or withholding and payment of taxes upon the compensation provided for in this Agreement. <strong>Faculty/Employee</strong> shall indemnify, defend and hold harmless First Prize from and against any losses that First Prize incurs as a result of <strong>Faculty/Employee</strong>’s breach of its obligations under this Agreement or the online terms and condition and privacy policy available on <a href="' . SITE_URL . '">www.firstprize.in</a>.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">20.</td>
									<td style="width: 10%">Target</td>
									<td style="width: 85%;">
										<p>If Your target or lead not fulfill according to your work then sallary will be hold or not paid until your target will not be completed.</p>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<br pagebreak="true"/>
					<p style="margin-top: 10%">IN WITNESS WHEROR the Parties hereto have duly executed this Agreement as of the date and year hereinabove first written</p>
					<table align="center">
						<tr>
							<td style="width: 50%;">
								For, First Prize, Kota (Raj.)<br><br>
								<img src="' . $senderSignature . '">
								<br><br>
								Name: <strong>Psatis Patel</strong><br>
								Designation : <strong>Sr. Legal/Manager</strong><br>
							</td>
							<td style="width: 10%;">

							</td>
							<td style="width: 50%;">
								For, Faculty/Employee<br><br>
								<img src="' . $userSignature . '">
								<br><br>
								<img src="' . $userSignature_1 . '">
								<br><br>
								Name : <strong>' . $userName . '</strong><br>
								Pan No. : <strong>' . $userPan . '</strong><br>
							</td>
						</tr>
					</table>

				</div>';
		$pdf->writeHTML($tbl, true, false, false, false, '');

		file_exists($_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $title . '/') or mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $title . '/', 0777, true);
		$pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $title . '/' . $title . '-' . $userId . '.pdf', $pdfOutput);

		return SITE_URL . 'uploads/' . $title . '/' . $title . '-' . $userId . '.pdf';
	}


	/** Offline Faculty Agreement */
	public function offlineAgreement($userId, $userName, $userEmail, $userMobile, $userDate, $pdfOutput = 'I')
	{
		$componyName = ucwords("Team " . SITE_NAME);

		// From
		$senderName  = ucwords($componyName);
		$senderMail  = 'info@firstprize.in';
		$senderAddr  = '';
		$senderAddr2 = 'Kota, Rajasthan';

		// Define User Details
		$userName  = ucwords($userName);
		$userMail  = $userEmail;
		$userAddr  = $userMobile;
		$userAddr2 = 'Kota, Rajasthan';

		$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);

		// set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetAuthor($componyName);
		$pdf->SetTitle('Faculty/Employee Agreement');
		$pdf->SetSubject('Faculty/Employee Agreement');
		$pdf->SetKeywords('TCPDF, PDF, INVOICE');
		// add a page
		$pdf->AddPage();


		$tbl = '<style>
					td {
						padding: 0.5%;
						text-align: center;
					}

					li {
						margin-bottom: .5%;
					}

					p,
					ol {
						text-align: justify;
					}

					img {
						width: 250px;
					}
				</style>

				<div>
					<h1 style="text-align: center; margin-bottom: 5%"><strong>Faculty/Employee</strong> Agreement</h1>
					<p>This is the written statement of the main terms and conditions of employment which is given to you by your employer, the Governing Body of First Prize Institute, , in accordance with the Employment Rights. . This statement together with the policies and proced procedures ures adopted by the Governing Body constitute your contract of employment with the Institute.</p>
					<div style="margin-top: 5%;">
						<table class="mytable" border="1" cellpadding="6">
							<tbody>
								<tr>
									<td style="width: 5%">1.</td>
									<td style="width: 42%">Name of Employee</td>
									<td style="width: 42%;">
										Krishna
									</td>
								</tr>
								<tr>
									<td style="width: 5%">2.</td>
									<td style="width: 42%">Name of The Institute</td>
									<td style="width: 42%;">
										First Prize Career Institute, Kota
									</td>
								</tr>
								<tr>
									<td style="width: 5%">3.</td>
									<td style="width: 42%">Institute’s Address</td>
									<td style="width: 42%;">
										B-311, DAV School road,<br> Talwandi, Kota (Rajasthan)<br> Pin Code : 324005
									</td>
								</tr>
								<tr>
									<td style="width: 5%">4.</td>
									<td style="width: 42%">Join Date with First Prize</td>
									<td style="width: 42%;">
										Your employment with First prize begins on ________.
									</td>
								</tr>
								<tr>
									<td style="width: 5%">5.</td>
									<td style="width: 42%">Continuous Employment</td>
									<td style="width: 42%;">
										<p>For the purposes of determining statutory entitlements, your period of
											continuous employment begins with the date of commencement of
											employment with First Prize except where:</p>
										<ul>
											<li>
												periods of previous service with Local Authorities, related
												employers, and the Governing Bodies of maintained voluntary
												aided Institutes are allowed to count as continuous employment
												for specified purposes in the Institutes Teacher/Facultys’
												Teacher/Faculty Pay and Conditions Document
											</li>
											<li>you are made redundant, in which circumstances continuous
												periods of service with Local Authorities and certain other specific
												employers may be aggregated with service at First Prize for the
												purposes of calculating redundancy payment</li>
											<li>you have statutory continuity of employment</li>
										</ul>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">6.</td>
									<td style="width: 42%">Title of Post</td>
									<td style="width: 42%;">
										<p>You are employed as a Teacher/Faculty.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">7.</td>
									<td style="width: 42%">Duration of Contract</td>
									<td style="width: 42%;">
										<p>Your employment is permanent for subject to be mentioned.</p>

										<p>Your employment is on the bases of our contract which depend on the performance of Employee.</p>

									</td>
								</tr>
								<tr>
									<td style="width: 5%">8.</td>
									<td style="width: 42%">Duties</td>
									<td style="width: 42%;">
										<ol>
											<li>
												You are to exercise the ministry and professional duties of a Teacher/Faculty
												in the Institute under the directions of the First Prize and under the
												immediate directions of the Director and in accordance with the
												following documents and their amendments from time to time:
												<ul>
													<li>
														the Education Acts and any associated regulations
													</li>
													<li>
														the conditions of employment prescribed in the Institute
														Teacher/Facultys’
														Pay and Conditions Document
													</li>
													<li>the agreement and the Instrument of Frist Prize .</li>
													<li>Institute building and location. Academic session, working hours
														and holidays etc. will be as per norms of the Directorate of First
														Prize Institute, kota. The deployed faculty will teach the above
														subject to the students as per prescribed syllabus. The
														Contractor will be entitled to one day\'s Casual Leave per month
														which is to be availed within and up to the period of contract.
														However, the leave shall be availed with prior sanction of the
														director. No other leave, whatsoever, will be admissible.</li>
												</ul>
											</li>
											<li> You are expected to be conscientious and loyal to the aims and objectives of the Institute. </li>
											<li>You will not be expected to refrain from any outside activity (whether paid or
												unpaid) unless, in the reasonable opinion of the Institute, such activity would interfere with the efficient discharge of your duties.</li>
											<li>You are to have regard to the character of the Institute and not to do anything in any way detrimental or prejudicial to that character and the interests of the Institute.</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">9.</td>
									<td style="width: 42%">Place of Work</td>
									<td style="width: 42%;">
										<p>You are employed to work at the Institute premises at such other premises
											used by the INSTITUTE within INDIA and its environs at the direction of the
											DIRECTOR.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">10.</td>
									<td style="width: 42%">remuneration</td>
									<td style="width: 42%;">
										<ol>
											<li>Your salary shall be determined in accordance with the provisions in the Institute Teacher/Facultys’ Pay and Conditions Document as amended from time to time.</li>
											<li>Your salary will be paid by monthly bank credit in arrears in accordance with the Institue Teacher/Facultys’ Pay and Conditions Document. If you do not have a bank account, it is a requirement of this employment that you open one. Any remittance of salary that you may receive must be treated as payment on account and subject at all times to adjustment to the exact amount due under the terms of the Teacher/Facultys’ Pay and Conditions Act applicable to you as a Teacher/Faculty, either by subsequent adjustment of salary or else by repayment to the Institute on demand.</li>
											<li>Your salary will be reviewed annually.</li>
											<li>In addition, the Institute shall Charge your annual General Teaching Council fee.</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">11.</td>
									<td style="width: 42%">hours of work</td>
									<td style="width: 42%;">
										<ol type="a">
											<li>
												Your hours of work shall be in accord with the provisions of the Institute Teacher/Faculty Teacher/Facultys’s Pay and Conditions Document (as amended from time to time).
											</li>
											<li>
												This post in which you are employed is Full Time
											</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">12.</td>
									<td style="width: 42%">Holidays and Leave of Absence</td>
									<td style="width: 42%;">
										<ol>
											<li>
												Subject to the working time provisions of the Institute Teacher/Facultys’ Pay and Conditions Document, holidays coincide with periods of Institute closure and public holidays, details of which will be notified by the Director from time to time.
											</li>
											<li>
												If, for any reason, you are unable to come to work, you are to contact the Institue before 8.00am on the first day of your absence and each subsequent day.
											</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">13.</td>
									<td style="width: 42%">Absence from Work</td>
									<td style="width: 42%;">
										<ol>
											<li>
												You are expected to absent yourself from work only for a serious reason and with the prior approval of the Director unless the absence is unforeseen or immediate.
											</li>
											<li>
												If, for any reason, you are unable to come to work, you are to contact the Institue before 8.00am on the first day of your absence and each subsequent day.
											</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">14.</td>
									<td style="width: 42%">Sickness Absence</td>
									<td style="width: 42%;">
										<p>Arrangements for sickness absence and pay are contained in the Institutes’ Sickness Absence Policy, a copy of which is available on request. The Policy shall comply with the relevant provisions of the Burgundy Book from time to time in force.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">15.</td>
									<td style="width: 42%">Maternity Leave</td>
									<td style="width: 42%;">
										<p>Arrangements for maternity leave and pay are contained in the Institutes’
											Maternity Leave Policy, a copy of which is available on request.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">16.</td>
									<td style="width: 42%">Paternity Leave</td>
									<td style="width: 42%;">
										<p>First Prize’s online terms and conditions and privacy policy that is available on <a href="' . SITE_URL . '">www.firstprize.in</a> shall be applicable to the <strong>Faculty/Employee</strong> and shall become part of this Agreement by reference.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">17.</td>
									<td style="width: 42%">Working Policies </td>
									<td style="width: 42%;">
										<p>All class conduct at frist prize career Institute Building. Complete all mention syllabus on time .Teacher/Faculty will not work for personal use or any organization other than First Prize. Non compliance of institute regulation as per agreement penalty may be charge.</p>

										<p>Leave without pay can be apply by the First Prize whenever requirement in future.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">18.</td>
									<td style="width: 42%">Trade Union Membership</td>
									<td style="width: 42%;">
										<ol>
											<li>You have the right to join a trade union or professional association and to
												take part in its activities including seeking and holding office provided this
												does not interfere unduly with the carrying out of your normal duties.</li>
											<li>You have the right to choose not to belong to a trade union or professional
												association.</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">19.</td>
									<td style="width: 42%">Discipline Procedure</td>
									<td style="width: 42%;">
										<p>The disciplinary policy, procedures and rules which apply to you are set out
											in the Institutes Disciplinary Policy, a copy of which is available on request.
											The Institute retains the right to amend and alter this document from time
											to time and will publish any revision.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">20.</td>
									<td style="width: 42%">Grievance Procedure</td>
									<td style="width: 42%;">
										<p>The grievance policy, procedures and rules which apply to you are set out in the Institutes Grievance Policy, a copy of which is available on request. The Governing Body retains the right to amend and alter this document from time to time and will publish any revision.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">21.</td>
									<td style="width: 42%">Capability Procedure</td>
									<td style="width: 42%;">
										<p>TThe Governing Body expects your work as a Teacher/Faculty to be of a consistently high standard. The Governors accept, however, that where a Teacher/Faculty is showing signs of not being capable of performing the duties required of him/her, disciplinary procedures may not be an appropriate response. In
											such cases, the Institute will implement the Capability Procedure, a copy of which is available on request.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">22.</td>
									<td style="width: 42%">Newly Qualified Teacher/Facultys</td>
									<td style="width: 42%;">
										<ol>
											<li>If you are a newly qualified Teacher/Faculty, your employment is subject to the satisfactory completion of an induction period in accordance with the Education (Induction Arrangements for Institute Teacher/Facultys) and any provisions of the current Institute Teacher/Facultys’ Pay and Conditions Document.</li>
											<li>If you fail to complete the induction period satisfactorily, your contract of
												employment will be terminated and the usual periods of notice will not apply. You will no longer be eligible to be employed as a Teacher/Faculty in a maintained Institute. In the event of an appeal, there are restrictions on the duties that newly qualified Teacher/Facultys may perform.</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">23.</td>
									<td style="width: 42%">Termination of Contract</td>
									<td style="width: 42%;">
										<p>You may terminate your employment by giving the Institute written notice at least one months before the termination.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">24.</td>
									<td style="width: 42%">Commencement</td>
									<td style="width: 42%;">
										<p>Your appointment is conditional upon a satisfactory disclosure being obtained from the Criminal Records Bureau now and in the future in relation to your suitability for working with children.</p>
									</td>
								</tr>
								<tr>
									<td style="width: 5%">25.</td>
									<td style="width: 42%">Interpretation</td>
									<td style="width: 42%;">
										<p>In this statement, the expressions shall have the meaning assigned to them in the appendix below.</p>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<br pagebreak="true" />
					<p style="margin-top: 10%;text-align:center">I\'m Agree all Term & Condition as described in this Agree.</p>
					<table align="center">
						<tr>
							<td style="width: 50%;">
								For, First Prize, Kota (Raj.)<br>
								_____________________________<br><br>
								<strong>Name: Psatis Patel</strong><br>
								<strong>Designation : Sr. Legal/Manager</strong><br>
							</td>
							<td style="width: 10%;">

							</td>
							<td style="width: 50%;">
								For, Faculty/Employee<br>
								_____________________________<br><br>
								<strong>Name : _____________________________</strong><br>
								<strong>Pan No. : ______________________________</strong><br>
							</td>
						</tr>
					</table>

				</div>';
		$pdf->writeHTML($tbl, true, false, false, false, '');

		file_exists($_SERVER['DOCUMENT_ROOT'] . '/uploads/agreement/') or mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads/agreement/', 0777, true);
		$pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/uploads/agreement/' . 'agreement-' . $userId . '.pdf', $pdfOutput);

		return SITE_URL . 'uploads/agreement/' . 'agreement-' . $userId . '.pdf';
	}


	/** Welcome Employee Agreement */
	public function welcomeEmployee(int $userId = 0, string $userName = '', string $userSignature = '', string $senderSignature = '', string $pdfOutput = 'I')
	{
		$senderSignature = exists($senderSignature);

		// Define User Details
		$userName  = ucwords($userName);
		$userSignature = exists($userSignature);

		$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);

		// set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetAuthor('TWS Technology');
		$pdf->SetTitle('Welcome Letter');
		$pdf->SetSubject('Welcome Letter');
		$pdf->SetKeywords('TCPDF, PDF, INVOICE');
		// add a page
		$pdf->AddPage();


		$tbl = '<style>
					td {
						padding: 0.5%;
						text-align: center;
					}

					li {
						margin-bottom: .5%;
					}

					p,
					ol {
						text-align: justify;
					}

					img {
						width: 250px;
					}
			</style>

			<div>
				<h1 style="text-align: center; margin-bottom: 5%; color: #5e1be2">POLICIES FOR EMPLOYEES</h1>
				<p><a href="' . SITE_URL . '" style="color: #5e1be2; font-weight: 900; text-decoration: none;">FIRST PRIZE CAREER INSTITUTE</a> is a pioneer in the field of education & research invention. With our values and ethics, we have made a mark for ourselves in today’s world. As an employee of this esteemed institute, we are expected to</p>
				<div style="margin-top: 5%;">
					<ul>
						<li>
							Maintaindistance with students avoid any intentional/unintentional Physical touch. Our motive might be good, but we do not know how it is perceived by students of different age groups. So it is strictly prohibited at all times.
						</li>
						<li>
							Avoid making any communication and contacts with students through any  platform and purpose other than institutional.
						</li>
						<li>
							No student is to be communicated with on call, whatsapp, sms, facebook, emails except for justifiable purpose. Moreover if at all required, then these communications must be on minimal side. Ask the students to meet your in <a href="' . SITE_URL . '" style="color: #5e1be2; font-weight: 900; text-decoration: none;">FIRST PRIZE CAREER INSTITUTE</a> the very next day.
						</li>
						<li>
							No student is to be communicated with after 9 pm except for emergency situation at the student’s end in case of emergency, please immediately inform the concerned authority.
						</li>
						<li>
							Ensure that every communication with students and parents is appropriate, strictly professional and devoid of any hidden motives, including communication via electronic media such as emails, texting, whatsapp and social communication and networking sites.
						</li>
						<li>
							Meeting students at any place other than the institution for any purpose whatsoever is strictly prohibited. We must understand our moral and professional responsibility in this context and direct all such approaches from students to concerned authorities.
						</li>
						<li>
							Our language and body language should be sober and formal at all times - our informal language and casual body language might get us misunderstood and cause us the trouble.
						</li>
						<li>
							Uphold the reputation and standing of our profession at <a href="' . SITE_URL . '" style="color: #5e1be2; font-weight: 900; text-decoration: none;">FIRST PRIZE CAREER INSTITUTE</a> even while we are not at the institute.
						</li>
						<li>
							We must be utmost careful while using social networking sites like Facebook, Remember, we are an educational institute, we are the most respected professional in the world we must stay away from exhibiting /posting tagging anything that might not be seen in a respectable light by our community and our students.
						</li>
						<li>
							Act with honestly and integrity in all aspects of our work.
						</li>
						<li>
							Avoid conflict between our professional work and private interests which could impact students negatively.
						</li>
						<li>
							Be fair, caring and committed and accountable to the best and ethical interests of students.
						</li>
					</ul>
				</div>

				<table align="center">
					<tr>
						<td style="width: 50%;">
							For, First Prize, Kota (Raj.)<br><br>
							<img src="' . $senderSignature . '">
							<br><br>
							Name: <strong>Psatis Patel</strong><br>
						</td>
						<td style="width: 10%;">

						</td>
						<td style="width: 50%;">
							For Employee<br><br>
							<img src="' . $userSignature . '">
							<br><br>
							Name : <strong>' . $userName . '</strong><br>
						</td>
					</tr>
				</table>


			</div>';
		$pdf->writeHTML($tbl, true, false, false, false, '');

		file_exists($_SERVER['DOCUMENT_ROOT'] . '/uploads/offer-letter/') or mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads/offer-letter/', 0777, true);
		$pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/uploads/offer-letter/' . 'offer-letter-' . $userId . '.pdf', $pdfOutput);

		return SITE_URL . 'uploads/offer-letter/' . 'offer-letter-' . $userId . '.pdf';
	}


	/** Welcome Employee Agreement */
	public function offerLetter(int $userId = 0, array $userDetails = [], string $senderSignature, string $userDate, string $pdfOutput = 'I')
	{
		// From
		$senderSignature = $senderSignature;

		// Define User Details
		$userName      = ucwords(exists($userDetails['name']));
		$userPan       = exists($userDetails['pan']);
		$userMail      = exists($userDetails['email']);
		$userMobile    = exists($userDetails['mobile']);
		$userSubject   = exists($userDetails['subject']);
		$userAddr      = exists($userDetails['currentAddress']);
		$userAddr2     = exists($userDetails['permanentAddress']);
		$userSignature = exists($userDetails['signature']);

		$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);

		// set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetAuthor('TWS Technology');
		$pdf->SetTitle('Offer Letter');
		$pdf->SetSubject('Offer Letter');
		$pdf->SetKeywords('TCPDF, PDF, INVOICE');
		// add a page
		$pdf->AddPage();


		$tbl = '<style>
					td {
						padding: 0.5%;
						text-align: center;
					}

					li {
						margin-bottom: .5%;
					}

					p,
					ol {
						text-align: justify;
					}

					img {
						width: 250px;
					}
				</style>

				<div>
					<h1 style="text-align: center; margin-bottom: 5%; color: #5e1be2">OFFER LETTER</h1>
					<p><a href="' . SITE_URL . '" style="color: #5e1be2; font-weight: 900; text-decoration: none;">FIRST PRIZE CAREER INSTITUTE</a> is a pioneer in the field of education & research invention. With our values and ethics, we have made a mark for ourselves in today’s world. As an employee of this esteemed institute, we are expected to</p>
					<table>
						<tr>
							<td style="width: 30%"></td>
							<td style="width: 25%">Mr./Mrs: </td>
							<td style="width: 45%"><b>' . $userName . '</b></td>
						</tr>
						<tr>
							<td style="width: 30%"></td>
							<td style="width: 25%">Current Address: </td>
							<td style="width: 45%"><b>' . $userAddr . '</b></td>
						</tr>
						<tr>
							<td style="width: 30%"></td>
							<td style="width: 25%">Permanent Address: </td>
							<td style="width: 45%"><b>' . $userAddr2 . '</b></td>
						</tr>
					</table>

					<p>With reference to your application and the subsequent model lecture and interview , we have pleasure in offering your an employment with us on the following terms and conditions with effect from <b>' . $userDate . '</b>.</p>

					<div style="margin-top: 5%;">
						<ol>
							<li>
								<h3>Designation :</h3>
								<p style="margin-bottom: 5%">You will designed as <b>' . $userSubject . '</b> (Mode of working - <b>ONLINE</b>)</p>
							</li>
							<li>
								<h3>Place of posting :</h3>
								<p style="margin-bottom: 5%">You will be initially posted at Kota HQ. However, during employment with the <a href="' . SITE_URL . '" style="color: #5e1be2; font-weight: 900; text-decoration: none;">FIRST PRIZE CAREER INSTITUTE</a>, with due notice, you may of city place in india or abroad to any of the existing or future branch of subsidiary or associated <strong>First Prize</strong> in any capacity other than the mention about in your appointment letter at the sole discretion of the management.</p>
							</li>
							<li>
								<h3>Salary : :</h3>
								<p style="margin-bottom: 5%">You will be paid per month as per your discussion with HR.</p>
							</li>
							<li>
								<h3>Termination :</h3>
								<p style="margin-bottom: 5%">In the event you wish to quit before the completion of academic session or completion of course assign to you. You will required to pay to the <strong>First Prize</strong> as some of money equivalent to two month salary calculated on the basis of the currently drawn salary as a time of leaving to meet out the expansions in cured on our training and to arrange alternative employee in your place.</p>
							</li>
							<li>
								<h3>Duties and responsibilities :</h3>
								<p style="margin-bottom: 5%">You will be required attend any work or any department. As may be assigned to you from time to time by the management, depending upon the exigencies of work. Working hours 8 hours per day. One weekly off.</p>
							</li>
							<li>
								<h3>Job Responsibilities :</h3>
								<p style="margin-bottom: 5%">
								<ul>
									<li>Preparing Daily study material sheet (DSM’S) Weekly Problem Practice Sheet (WPP’S) for each class & submit it to the computer section at least three days in advance. (IIT-JEE | NEET/AIIMS | PREFOUNDATION | OLYMPIAD etc.).</li>
									<li>Taking lectures coventing all basic concepts (Theory classes) and problem classes.</li>
									<li>Preparing error proof quality test papers for each class as per the test series schedule prepared by management and submit test paper to the management at least 4 days in advance to the test date.</li>
									<li>Final proof of the test paper is to be checked by the faculty members.</li>
									<li>Motivating the students through the course and generating confidence in the students.</li>
									<li>Start the class sharp at the specified time. Be punctual to the time table.</li>
									<li>You will not miss the class without prior information.</li>
								</ul>
								</p>
							</li>
							<li>
								<h3>Whole time Employment :</h3>
								<p style="margin-bottom: 5%">You will devote your entire time to the work of the <strong>First Prize</strong> career institute and you will not undertake any direct/indirect Business or work either honoracy or reminerative, except with the written permission of the Managing director / Director in such case.</p>
							</li>
							<li>
								<h3>Increments / Promotions :</h3>
								<p style="margin-bottom: 5%">The quantum and timing of future increments or promotions shall be based, among other things on merit and performance, exigencies of the business and shall be at the absolute discretions of the management.</p>
							</li>
							<li>
								<p style="margin-bottom: 5%">Organization holds rights of deducting TDS from your CTC.</p>
							</li>
							<li>
								<h3>Other Rules and Regulations :</h3>
								<p style="margin-bottom: 5%"> You shall work in the job/department assigned to you with a high degree of initiative, efficiency, integrity and economy. You shall faithful observe all the <strong>First Prize</strong> career Institute Rules and regulations inclusive of any circular or communication from the management of the <strong>First Prize</strong> career Institute and shall comply with all reasonable orders of your superiors and attend to your duties punctually at such place or pleas as may be required. You will be governed by all rules and regulations of the <strong>First Prize</strong> career Institute, as also any amendments or alterations there to during the course of your employment.</p>
								<p>If the above terms and conditions are accepted by you, please sign the copy of this letter of Appointment in token of your acceptance and return the same to us. We take this opportunity to extend a warm welcome to you to this organization and look forward to a long and fruitful associated.</p>
							</li>
						</ol>
					</div>

					<h2 style="text-align: center">ACKNOWLEDGMENT</h2>
					<p>I have fully read, understand the terms & conditions as described above in the appointment letter
					and I will abide them the lot of best.</p>

					<table align="center">
						<tr>
							<td style="width: 50%;">
								For, First Prize, Kota (Raj.)<br><br>
								<img src="' . $senderSignature . '">
								<br><br>
								Name: <b>Psatish Patel</b>
							</td>
							<td style="width: 10%;">

							</td>
							<td style="width: 50%;">
								For Employee<br><br>
								<img src="' . $userSignature . '">
								<br><br>
								Name: <b>' . $userName . '</b><br>
								Date: <b>' . date('d-m-Y', time()) . '</b><br>
							</td>
						</tr>
					</table>

				</div>';
		$pdf->writeHTML($tbl, true, false, false, false, '');

		file_exists($_SERVER['DOCUMENT_ROOT'] . '/uploads/offer-letter/') or mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads/offer-letter/', 0777, true);
		$pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/uploads/offer-letter/' . 'offer-letter-' . $userId . '.pdf', $pdfOutput);

		return SITE_URL . 'uploads/offer-letter/' . 'offer-letter-' . $userId . '.pdf';
	}


	/** Welcome Employee Agreement */
	public function offlineOfferLetter($userId, $userName, $userEmail, $userMobile, $userDate, $pdfOutput = 'I')
	{
		$componyName = ucwords("Team " . SITE_NAME);

		// From
		$senderName  = ucwords($componyName);
		$senderMail  = 'info@firstprize.in';
		$senderAddr  = '';
		$senderAddr2 = 'Kota, Rajasthan';

		// Define User Details
		$userName  = ucwords($userName);
		$userMail  = $userEmail;
		$userAddr  = $userMobile;
		$userAddr2 = 'Kota, Rajasthan';

		$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);

		// set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetAuthor($componyName);
		$pdf->SetTitle('Offer Letter');
		$pdf->SetSubject('Offer Letter');
		$pdf->SetKeywords('TCPDF, PDF, INVOICE');
		// add a page
		$pdf->AddPage();


		$tbl = '<style>
					td {
						padding: 0.5%;
						text-align: center;
					}

					li {
						margin-bottom: .5%;
					}

					p,
					ol {
						text-align: justify;
					}

					img {
						width: 250px;
					}
				</style>

				<div style="margin-top: 5%">
					<table align="left">
						<tr>
							<td style="width: 30%"></td>
							<td style="width: 45%"></td>
							<td style="width: 25%">Date: ' . date('d/m/Y', time()) . '</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td style="width: 15%">Mr./Mrs.: </td>
							<td style="width: 45%">------------------------------------------</td>
							<td style="width: 40%"></td>
						</tr>
						<tr>
							<td style="width: 15%">Mail ID: </td>
							<td style="width: 45%">------------------------------------------</td>
							<td style="width: 40%"></td>
						</tr>
						<tr>
							<td style="width: 15%">Contact No.: </td>
							<td style="width: 45%">------------------------------------------</td>
							<td style="width: 40%"></td>
						</tr>
					</table>
					<h1 style="text-align: center; margin-top: 20%; margin-bottom: 10%; color: #5e1be2">OFFER LETTER</h1>
					<p>Dear ___________,</p>
					<p>Congratulations for being the chosen one to join the ever-expanding First Prize family; We are Pleased to offer you an Employment with <a href="' . SITE_URL . '" style="color: #5e1be2; font-weight: 900; text-decoration: none;">FIRST PRIZE CAREER INSTITUTE</a> based on the interview discussions you had with us and your application submitted to us. Details of the terms and conditions of offer are as under :</p>


					<div style="margin-top: 5%;">
						<ol>
							<li>
								<p style="margin-bottom: 5%">You will be designated as Lecture in Subject __________________ Department and will be initially based at our Kota Center.</p>
							</li>
							<li>
								<p style="margin-bottom: 5%">Your date of commencement of Employment will be _____________ (Date).</p>
							</li>
							<li>
								<p style="margin-bottom: 5%">You are requested to report for complete session for joining formalities at our Kota Center – Corporate office First Prize, Kota (Raj.) Contact Person & Mobile No. ____________________</p>
							</li>
							<li>
								<p style="margin-bottom: 5%">Your employment will be subject to the Terms & Conditions, as per Appointment Letter/Agreement Deed, which you need to sign at the time of your joining.</p>
							</li>
							<li>
								<p style="margin-bottom: 5%">
								<p>Please bring along the below listed documents in original and 1 set of Photocopy on your of joining.</p>
								<ol type="a">
									<li>Date of Birth proof certificate (S.S.C.)</li>
									<li>Academic Certificates Semester/Year wise (all from 10 th to Highest)</li>
									<li>Resignation Letter with acknowledgement.</li>
									<li>Relieving and Experience letter from previous employer.</li>
									<li>Salary Slips of last 3 months.</li>
									<li>Six recent passport size photographs.</li>
									<li>Form 16/ Bank statement of last 6 months/form 12B.</li>
									<li>PAN Card/ Acknowledgement of Pan Application (3 copies)</li>
									<li>Aadhar (UID) Card/Aadhar Enrollment receipt (3 copies)</li>
									<li>Address Proof (Voter ID/ Driving Licence/UID/Passport) (3 copies)</li>
								</ol>
								</p>
							</li>
							<li>
								<p style="margin-bottom: 5%">Kindly sign a copy of this letter as a token of your acceptance of this offer and mail the same across to careers@firstprize.in</p>
							</li>
						</ol>
					</div>

					<p>For any queries related to joining or for any further clarifications/information, feel free to contact Mr./Ms. _____________________________ on all working days at ___________. You may also send your queries at
					careers@firstprize.in.</p>
					<p>We look forward to meet up with you on your day of joining the First Prize family.</p>
					<p>Wishing you all the best for a great career with First Prize</p>
					<p style="margin-bottom: 5%">Yours truly</p>

					<h4>For First Prize, Kota (Raj.)</h4>
					<p>Human Resources</p>

					<br pagebreak="true" />

					<h2 style="text-align: center">DOCUMENT LIST FOR JOINING</h2>
					<ol type="a">
						<li>Date of Birth proof certificate (S.S.C.)</li>
						<li>Academic Certificates Semester/Year wise (all from 10 th to Highest)</li>
						<li>Resignation Letter with acknowledgement.</li>
						<li>Relieving letter from previous employer.</li>
						<li>Experience letters from previous organizations.</li>
						<li>Salary Slips of last 3 months.</li>
						<li>Six recent passport size photographs.</li>
						<li>Form 16/ Bank statement of last 6 months/form 12B.</li>
						<li>PAN Card/ Acknowledgement of Pan Application (3 copies)</li>
						<li>Aadhar (UID) Card/Aadhar Enrollment receipt (3 copies)</li>
					</ol>

					<h2 style="text-align: center">Payout for Faculty</h2>
					<ol type="i">
						<li>Company/Institute pay minimum Rs. 1,000/- per student per subject for complete session.</li>
						<li>Company/Institute provide minimum 1,000 students in one session.</li>
						<li>Company/Institute provide online platform for your extra income. So you cannot work with another platform other than First Prize for your personal benefit.</li>
					</ol>
					<p>Note : All terms & Conditions are applied.</p>
				</div>';
		$pdf->writeHTML($tbl, true, false, false, false, '');

		file_exists($_SERVER['DOCUMENT_ROOT'] . '/uploads/offer-letter/') or mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads/offer-letter/', 0777, true);
		$pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/uploads/offer-letter/' . 'offer-letter-' . $userId . '.pdf', $pdfOutput);

		return SITE_URL . 'uploads/offer-letter/' . 'offer-letter-' . $userId . '.pdf';
	}
}

/* End of file Pdf.php */
