<?php
	error_reporting(0);
	session_start();
	
    $emaildata = array(
        'smtphost'=> 'mail.jaytec.com.ng',
        'username'=> 'acuret@jaytec.com.ng',
        'password'=> 'Acuret@2024',
        'from'=> 'acuret@jaytec.com.ng',
        'organization'=> 'Acuret',
        'to'=> 'abimbolaoladunni8429@gmail.com',
        'toname'=> 'Oladunni Abimbola Johnson',
        'subject'=> 'Membership Form',
        'body'=> '<p>This is the message body</p>',
    );
    

				
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
	$imageref = 'logo.png';		
	$pdf->Image($imageref,55,60,100,110); //col,row,col,row
	
	# School Logo
	# -----------
	$imageref = 'logo.jpg';				
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
	$pdf->Text(55,50,'Student');
	
	# Full Name
	$pdf->SetFont('times','b',10);
	$pdf->Text(37,57,"Full Name:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,57,"Mr. Abimbola Oladunni Johnson");

	# Gender/Sex
	$pdf->SetFont('times','b',10);	
	$pdf->Text(41,64,"Gender:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,64,'Male');

	# Date of Birth
	$pdf->SetFont('times','b',10);
	$pdf->Text(33,71,"Date of Birth:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,71, '10-12-2024');
	# Email Address
	$pdf->SetFont('times','b',10);
	$pdf->Text(36,78,"Nationality:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,78, 'Nigerian');

	# Contact Address
	$pdf->SetFont('times','b',10);
	$pdf->Text(20,85,"Country of Residence:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,85,'FUTA');

	# Contact Address
	$pdf->SetFont('times','b',10);
	$pdf->Text(21,92,"Institution/Company:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,92,'FUTA');

	$pdf->SetFont('times','b',10);
	$pdf->Text(40,99,"Position:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,99,'Software Engineer');

	$pdf->SetFont('times','b',10);
	$pdf->Text(37,106,"Address 1:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,106,'Ondo');

	$pdf->SetFont('times','b',10);
	$pdf->Text(37,113,"Address 2:");
	$pdf->SetFont('times','',10);
	$pdf->Text(55,113,'FUTA');

	# Right Side
	# ---------	
	# Nationality
	$pdf->SetFont('times','b',10);
	$pdf->Text(129,50,"City:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,50,'Ondo');

	# State of Origin
	$pdf->SetFont('times','b',10);
	$pdf->Text(127,57,"Town:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,57,'Ondo state');

	# Local Govt. Area
	$pdf->SetFont('times','b',10);
	$pdf->Text(123,64,"Zipcode:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,64,'140121');

	# Town of Origin
	$pdf->SetFont('times','b',10);
	$pdf->Text(122,71,"Country:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,71,'Nigeria');

	# Phone Number
	$pdf->SetFont('times','b',10);
	$pdf->Text(114,78,"Mobile phone:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,78,'08143737391');
	# Phone Number
	$pdf->SetFont('times','b',10);
	$pdf->Text(116,85,"Home phone:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,85,'08143737391');

	$pdf->SetFont('times','b',10);
	$pdf->Text(116,92,"Work phone:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,92,'08143737391');

	$pdf->SetFont('times','b',10);
	$pdf->Text(113,99,"Personal email:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,99,'abimbolaoladunni8429@gmail.com');

	$pdf->SetFont('times','b',10);
	$pdf->Text(117,106,"Work email:");
	$pdf->SetFont('times','',10);
	$pdf->Text(138,106,'abimbolaoladunni8429@gmail.com');

	$pdf->Cell(161, 75, 'Download', 0, 0, 'C', false, 'https://www.nairaland.com');


	# Admission Info.
	# ---------------
	$pdf->SetFont('helvetica','b',12);
	$pdf->Line(20,170,200,170); //Line(col,row,col,row)
	$pdf->SetFont('times','b',9);
	$pdf->Text(20,168,"Interest in Laboratory");	

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
	$pdf->SetFont('helvetica','b',12);
	$pdf->Line(20,200,80,200); //Line(col,row,col,row)
	$pdf->SetFont('times','b',9);
	$pdf->Text(28,198,"Student's Signature & Date");
	# Registration Officer
	$pdf->SetFont('helvetica','b',12);
	$pdf->Line(120,200,180,200); //Line(col,row,col,row)
	$pdf->SetFont('times','b',9);
	$pdf->Text(124,198,"Registration Officer Signature & Date");
	
	
	// $pdf->Output();

	$pdf->Output('acuretmembershipform.pdf', 'I');

	
	
?>