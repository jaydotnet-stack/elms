<?php
	error_reporting(0);
	session_start();
	require_once('../../dbconn.php');
	$personalEmail = $_GET['email'];
    $sql = "SELECT * FROM member_info WHERE personal_email = '$personalEmail' || personal_email = '$workEmail'";
    $result = mysqli_query($conn, $sql) or die(mysql_error());
    
	$row = mysqli_fetch_assoc($result);  

	// print_r($row['membership_type']);
	// echo 3;
	// exit;
		
	
	
    // $emaildata = array(
    //     'smtphost'=> 'mail.jaytec.com.ng',
    //     'username'=> 'acuret@jaytec.com.ng',
    //     'password'=> 'Acuret@2024',
    //     'from'=> 'acuret@jaytec.com.ng',
    //     'organization'=> 'Acuret',
    //     'to'=> 'abimbolaoladunni8429@gmail.com',
    //     'toname'=> 'Oladunni Abimbola Johnson',
    //     'subject'=> 'Membership Form',
    //     'body'=> '<p>This is the message body</p>',
    // );
    

				
	require('fpdf.php');

  
		
	$pdf = new FPDF();	
	$pdf->AddPage();
	$pdf->SetFont('helvetica','b',14);
	$pdf->Cell(210,5,'ACURET MEMBERSHIP',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('helvetica','b',10);
	$pdf->Cell(210,5,'Application Form',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('helvetica','bu',12);
	$pdf->Cell(210,5,"London, UK",0,0,'C');
	$pdf->Ln();
	// $pdf->SetFont('helvetica','',11);
	// $pdf->Text(67,35, 'header','L');	
	
	# Watemark Image
	# -------------	
	$imageref = 'acuret-logo.png';		
	$pdf->Image($imageref,55,60,100,110); //col,row,col,row
	
	# School Logo
	# -----------
	$imageref = 'acuret-logo.jpg';				
	$pdf->Image($imageref,20,8,18,20);

	

	# Personal Information
	# --------------------	
	$pdf->Line(20,45,200,45); //Line(col,row,col,row)
	$pdf->SetFont('times','',10);
	$PrintDate="Printed on:".date('d-m-Y');	
	$pdf->Text(165,44,$PrintDate);
	$pdf->SetFont('times','b',9);
	$pdf->Text(20,44,"PERSONAL INFORMATION");	

	# Left Side
	# ---------
	$pdf->SetFont('times','b',10);	
	$pdf->Text(26,50,"Membership type:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,50,$row['membership_type']);
	
	# Full Name
	$pdf->SetFont('times','b',10);
	$pdf->Text(37,57,"Full Name:");
	$pdf->SetFont('times','',10);
	$fullname = $row['title'] . ' ' . $row['surname'] . ' ' . $row['given_name'];
	$pdf->Text(55,57,$fullname);

	# Gender/Sex
	$pdf->SetFont('times','b',10);	
	$pdf->Text(41,64,"Gender:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,64,$row['gender']);

	# Date of Birth
	$pdf->SetFont('times','b',10);
	$pdf->Text(33,71,"Date of Birth:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,71, $row['date_of_birth']);
	# Email Address
	$pdf->SetFont('times','b',10);
	$pdf->Text(36,78,"Nationality:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,78, $row['nationality']);

	# Contact Address
	$pdf->SetFont('times','b',10);
	$pdf->Text(20,85,"Country of Residence:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,85,$row['country_of_residence']);

	# Contact Address
	$pdf->SetFont('times','b',10);
	$pdf->Text(21,92,"Institution/Company:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,92,$row['institution']);

	$pdf->SetFont('times','b',10);
	$pdf->Text(40,99,"Position:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,99,$row['position']);

	$pdf->SetFont('times','b',10);
	$pdf->Text(37,106,"Address 1:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,106,$row['address1']);

	$pdf->SetFont('times','b',10);
	$pdf->Text(37,113,"Address 2:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,113,$row['address2']);

	# Right Side
	# ---------	
	# Nationality
	$pdf->SetFont('times','b',10);
	$pdf->Text(129,50,"City:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,50,$row['city']);

	# State of Origin
	$pdf->SetFont('times','b',10);
	$pdf->Text(127,57,"Town:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,57,$row['town']);

	# Local Govt. Area
	$pdf->SetFont('times','b',10);
	$pdf->Text(123,64,"Zipcode:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,64,$row['zip_code']);

	# Town of Origin
	$pdf->SetFont('times','b',10);
	$pdf->Text(122,71,"Country:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,71,$row['country']);

	# Phone Number
	$pdf->SetFont('times','b',10);
	$pdf->Text(114,78,"Mobile phone:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,78,$row['mobile']);
	# Phone Number
	$pdf->SetFont('times','b',10);
	$pdf->Text(116,85,"Home phone:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,85,$row['home']);

	$pdf->SetFont('times','b',10);
	$pdf->Text(116,92,"Work phone:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,92,$row['home']);

	$pdf->SetFont('times','b',10);
	$pdf->Text(113,99,"Personal email:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,99,$row['personal_email']);

	$pdf->SetFont('times','b',10);
	$pdf->Text(117,106,"Work email:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,106,$row['work_email']);




	# Admission Info.
	# ---------------
	$pdf->SetFont('helvetica','b',12);
	$pdf->Line(20,125,200,125); //Line(col,row,col,row)
	$pdf->SetFont('times','b',9);
	$pdf->Text(20,124,"ABOUT YOUR INTEREST IN LABORATORY ANIMAL WELFARE");	

	# Left Side
	# ---------
	$pdf->SetFont('times','b',12);	
	$pdf->Line(26,131,45,131); //Line(col,row,col,row)
	$pdf->Text(26,130,"Education");

	$pdf->SetFont('times','b',10);	
	$pdf->Text(26,137,"Institution:");
	$pdf->SetFont('times','',10);
	$institution = explode("~", $row['institution_degree_output']);
	$institution = $institution[0];
	$pdf->Text(45,137, $institution);

	$pdf->SetFont('times','b',10);	
	$pdf->Text(26,144,"Place:");
	$pdf->SetFont('times','',10);
	$place_output = explode("~", $row['place_output']);
	$place_output = $place_output[0];	
	$pdf->Text(45,144,$place_output);

	$pdf->SetFont('times','b',10);	
	$pdf->Text(26,151,"Country:");
	$pdf->SetFont('times','',10);
	$country_output = explode("~", $row['country_output']);
	$country_output = $country_output[0];	
	$pdf->Text(45,151,$country_output);

	$pdf->SetFont('times','b',10);	
	$pdf->Text(26,158,"Are you currently undertaking study/training:");
	$pdf->SetFont('times','',10);
	$pdf->Text(98,158,$row['current_undertaking_status']);

	$pdf->SetFont('times','b',10);	
	$pdf->Text(26,165,"Do you use/care for animals as part of your current daily work schedule?:");
	$animal_care_status = $row['animal_care_status'];
	$pdf->SetFont('times','',10);
	$pdf->Text(139,165,$animal_care_status);
	if($animal_care_status == 'yes'){
		$pdf->SetFont('times','b',10);	
		$pdf->Text(26,172,"Yes:");
		$pdf->SetFont('times','',10);
		$pdf->Text(42,172,$row['animal_type']);
	}else{
		$pdf->SetFont('times','b',10);	
		$pdf->Text(26,172,"No(statment):");
		$pdf->SetFont('times','',10);
		$pdf->Text(42,172,$row['statement_of_interest']);
	}
	



	$pdf->SetFont('times','b',10);	
	$pdf->Text(26,179,"Have you used/cared for laboratory animals as part of your daily work schedule in the past?:");
	$pdf->SetFont('times','',10);
	$pdf->Text(167,179,$row['care_laboratory_animals']);
	$care_laboratory_animals  = $row['care_laboratory_animals'];
	if($care_laboratory_animals == 'yes'){
		$pdf->SetFont('times','b',10);	
		$pdf->Text(26,186,"If yes, please state Institution, Place and dates");
	
		$pdf->SetFont('times','b',10);	
		$pdf->Text(26,193,"Institution:");
		$pdf->SetFont('times','',10);
		$pdf->Text(44,193,$row['animal_care_institution']);	
	
		$pdf->SetFont('times','b',10);	
		$pdf->Text(145,193,"Place:");
		$pdf->SetFont('times','',10);
		$pdf->Text(155,193,$row['animal_care_place']);	
	
		$pdf->SetFont('times','b',10);	
		$pdf->Text(26,200,"Duration:");
		$pdf->SetFont('times','',10);
		$duration = 'From: ' . $row['animal_care_from'] . ' To: ' . $row['animal_care_to'];
		$pdf->Text(43,200,$duration);	
	}else{
		$pdf->SetFont('times','b',10);	
		$pdf->Text(26,186,"No");
	
		$pdf->SetFont('times','b',10);	
		$pdf->Text(26,193,"Institution:");
		$pdf->SetFont('times','',10);
		$pdf->Text(44,193,'nill');	
	
		$pdf->SetFont('times','b',10);	
		$pdf->Text(145,193,"Place:");
		$pdf->SetFont('times','',10);
		$pdf->Text(155,193,'nill');	
	
		$pdf->SetFont('times','b',10);	
		$pdf->Text(26,200,"Duration:");
		$pdf->SetFont('times','',10);
		$duration = 'nill';
		$pdf->Text(36,200,$duration);	
	}	

	//I OMMITED THIS SECTION
	//-----------------------------------------------
// 	*Have attended any laboratory animal welfare training?
// Yes		No
// If YES, please state below and upload your Certificate as supporting document.
// •	Event
// •	Date
// •	Place


	$pdf->SetFont('times','b',10);	
	$pdf->Text(26,207,"Does your Institution have an animal facility?:");
	$pdf->SetFont('times','',10);
	$pdf->Text(98,207,$row['institution_animal_facility']);	

	# Admission Info.
	# ---------------
	$pdf->SetFont('helvetica','b',12);
	$pdf->Line(20,215,200,215); //Line(col,row,col,row)
	$pdf->SetFont('times','b',9);
	$pdf->Text(20,214,"SUPPORTING DOCUMENTS");	

	$pdf->SetFont('times','b',12);	
	$pdf->Line(26,221,43,221); //Line(col,row,col,row)
	$pdf->Text(26,220,"Referee 1");	

	$pdf->SetFont('times','b',10);	
	$pdf->Text(26,226,"Fullname:");
	$pdf->SetFont('times','',10);
	$pdf->Text(45,226,$row['full_name1']);		

	$pdf->SetFont('times','b',10);	
	$pdf->Text(26,232,"Email:");
	$pdf->SetFont('times','',10);
	$pdf->Text(45,232,$row['email_address1']);		

	$pdf->SetFont('times','b',10);	
	$pdf->Text(26,238,"Telephone:");
	$pdf->SetFont('times','',10);
	$pdf->Text(45,238,$row['telephone1']);	
	
	// $pdf->SetFont('times','b',10);	
	// $pdf->Line(26,246,37,246); //Line(col,row,col,row)
	// $pdf->Text(26,245,"PDF(s)");		

	// $pdf->SetFont('times','b',10);	
	// $pdf->Text(26,251,"Curriculum Vitae:");
	// $pdf->SetFont('times','',10);
	// $pdf->Text(55,251,'Download');		

	// $pdf->Cell(150, 250, 'Download1ss', 0, 0, 'C', false, 'https://www.nairaland.com');
	// $pdf->Cell(160, 250, 'Download1ss', 0, 0, 'C', false, 'https://www.nairaland.com');

	// $pdf->SetFont('times','b',10);	
	// $pdf->Text(26,258,"Representative publications 1:");
	// $pdf->SetFont('times','',10);
	// $pdf->Text(73,258,'Download');		

	# Right Side
	# ---------	
	$pdf->SetFont('times','b',10);
	$pdf->Text(113,137,"Year of Graduation:");
	$pdf->SetFont('times','',10);
	$pdf->Text(146,137,'Nigeria');

	$pdf->SetFont('times','b',10);
	$pdf->Text(113,144,"Degree:");
	$pdf->SetFont('times','',10);
	$degree = explode("~", $row['degree']);
	$degree = $degree[0];		
	$pdf->Text(146,144,$degree);	
	// $pdf->Cell(161, 75, 'Download1', 0, 0, 'C', false, 'https://www.nairaland.com');	

	$pdf->SetFont('times','b',10);
	$pdf->Text(113,158,"If yes, course/programme name:");
	$pdf->SetFont('times','',10);
	$pdf->Text(164,158,$row['current_undertaking_programme_mode']);

	$pdf->SetFont('times','b',12);	
	$pdf->Line(108,221,125,221); //Line(col,row,col,row)
	$pdf->Text(108,220,"Referee 2");		

	$pdf->SetFont('times','b',10);
	$pdf->Text(108,226,"Fullname:");
	$pdf->SetFont('times','',10);
	$pdf->Text(129,226,$row['full_name2']);

	$pdf->SetFont('times','b',10);
	$pdf->Text(108,232,"Email:");
	$pdf->SetFont('times','',10);
	$pdf->Text(129,232,$row['email_address2']);

	$pdf->SetFont('times','b',10);
	$pdf->Text(108,238,"Telephone:");
	$pdf->SetFont('times','',10);
	$pdf->Text(129,238,$row['telephone2']);

	// $pdf->SetFont('times','b',10);
	// $pdf->Text(108,251,"Animal welfare training:");
	// $pdf->SetFont('times','',10);
	// $pdf->Text(147,251,'Download');

	// $pdf->SetFont('times','b',10);
	// $pdf->Text(108,257,"Representative publications 2:");
	// $pdf->SetFont('times','',10);
	// $pdf->Text(155,257,'Download');

	# Left Side
	# ---------
	# Faculty/School
	// $pdf->SetFont('times','b',9);
	// $pdf->Text(33,90,"School:");
	// $pdf->SetFont('times','',9);
	// $pdf->Text(46,90,'SOC');
	// # Department
	// $pdf->SetFont('times','b',9);
	// $pdf->Text(26,95,"Department:");
	// $pdf->SetFont('times','',9);
	// $pdf->Text(46,95,'Cyber Security');	
	// # Combination
	// $pdf->SetFont('times','b',9);
	// $pdf->Text(20,100,"Course of Study:");
	// $pdf->SetFont('times','',9);
	// $pdf->Text(46,100,'Cyber Security');
	// # Course Option
	// $pdf->SetFont('times','b',9);
	// $pdf->Text(22,105,"Course Option:");
	// $pdf->SetFont('times','',9);
	// $pdf->Text(46,105,'Cyber Security');

	# Right Side
	# ---------	
	# Study Mode
	// $pdf->SetFont('times','b',9);
	// $pdf->Text(141,90,"Study Mode:");
	// $pdf->SetFont('times','',9);
	// $pdf->Text(161,90,'Full time');	
	// # Program Type 
	// $pdf->SetFont('times','b',9);
	// $pdf->Text(138,95,"Program Type:");
	// $pdf->SetFont('times','',9);
	// $pdf->Text(161,95,'Full time');	
	// # Current Level
	// $pdf->SetFont('times','b',9);
	// $pdf->Text(139,100,"Current Level:");
	// $pdf->SetFont('times','',9);
	// $pdf->Text(161,100, '500 Level');

	# Attestation
	# -----------
	// $pdf->SetFont('helvetica','b',12);
	// $pdf->Line(20,112,200,110); //Line(col,row,col,row)
	// $pdf->SetFont('times','b',9);
	// $pdf->Text(20,111,"CERTIFICATION");
	
	// $pdf->SetFont('times','',10);		
	// $pdf->Text(20,117,"I ".' Oladunni Abimbola Johnson' ." certify that the above information is complete and accurate");
	
	# Signatures
	# ----------	
	# Student:
	// $pdf->SetFont('helvetica','b',12);
	// $pdf->Line(20,270,80,270); //Line(col,row,col,row)
	// $pdf->SetFont('times','b',9);
	// $pdf->Text(28,268,"Student's Signature & Date");
	// # Registration Officer
	// $pdf->SetFont('helvetica','b',12);
	// $pdf->Line(120,270,180,270); //Line(col,row,col,row)
	// $pdf->SetFont('times','b',9);
	// $pdf->Text(124,268,"Registration Officer Signature & Date");
	
	
	// $pdf->Output();

	$pdf->Output('acuretmembershipform.pdf', 'I');

	
	
?>