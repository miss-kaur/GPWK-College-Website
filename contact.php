<!DOCTYPE html>
<html>
<head>
<title>Contact us</title>
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Home| Government Polytechnic for Women, Kandaghat</title>
<!-- Bootstrap -->
<script src="js/uisearch.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="fonts/fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/social.css" rel="stylesheet">
<link rel="stylesheet" href="news_scroll.css" type="text/css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald|Asap">
<link rel="stylesheet" type="text/css" href="plugins/font-awesome/css/font-awesome.min.css">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"> </script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
    <body>
        <section class="contact" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-area">
                            <form role="form" name="form_name" method="POST">
                                <h3 class="orange">Contact us </h3>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" onKeyPress="return keyRestrict(event,'abcdefghijklmnopqrstuvwxyz ')" pattern="[a-zA-Z\s]+" required oncopy="return false" onpaste="return false">
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Select list:</label>
                                    <select class="form-control" name="course" required>
                                        <option value="">Select Diploma</option>
                                        <option value="ece">Electronics & Comm. Engg.</option>
                                        <option value="ce">Computer Engg. </option>
                                        <option value="phar">Pharmacy </option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required oncopy="return false" onpaste="return false">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" onKeyPress="return keyRestrict(event,'1234567890')" maxlength="10" pattern="(.){10,10}" required oncopy="return false" onpaste="return false">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" type="textarea" id="message" name="message"  placeholder="Message" maxlength="140" rows="7" pattern="^[a-zA-Z0-9\s]*$" onkeypress="return alpha(event)" oncopy="return false" onpaste="return false"></textarea>
                                </div>
                                <br>
								<!-- Google Captcha code ----->
                                <div class="g-recaptcha" data-sitekey="6Ldkq0cUAAAAABmnZ9q5gqn4R98EZ1eeDxLfIgne"></div>
                                <input type="submit" value="Submit Form" name="submit" class="btn btn-primary pull-right">
                            </form>
							<!--- PHP CODE start ----->
							<?php
								if(isset($_POST['submit'])==true)
									{
										/* for testing google captcha code here */
										function post_captcha($user_response) {
											$fields_string = '';
											$fields = array(
												'secret' => '6Ldkq0cUAAAAAMIj-Lwoo7tTF2n1gn7E-yrZ2UVa',
												'response' => $user_response
											);
											foreach($fields as $key=>$value)
											$fields_string .= $key . '=' . $value . '&';
											$fields_string = rtrim($fields_string, '&');

											$ch = curl_init();
											curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
											curl_setopt($ch, CURLOPT_POST, count($fields));
											curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

											$result = curl_exec($ch);
											curl_close($ch);
										return json_decode($result, true);
									}
									// Call the function post_captcha
									$res = post_captcha($_POST['g-recaptcha-response']);

									if (!$res['success']) {
										// What happens when the CAPTCHA wasn't checked
										echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
									} else {
										// If CAPTCHA is successfully completed...

										// Paste mail function or whatever else you want to happen here!
									   
											//store the values in variables
											$date= date("m-d-y");
											$name=$_POST['name'];
											$course=$_POST['course'];
											$email=$_POST['email'];
											$mobile=$_POST['mobile'];
											$message=$_POST['message'];
											$time=time(now);

											$query="insert into contact(date,name,course,email,mobile,message,time)values('".$date."','".$name."','".$course."','".$email."','".$mobile."','".$college."','".$message."','".$time."');";

											$sql=mysqli_query($conn,$query);
											if($sql==true)
												{
													echo "<script>alert('Thank you for enquiry!! We will contact to you shortly')</script>";


												}
											else
											{
												echo "<script>alert('not inserted')</script>";


											}
											 $email_to = "pankaj.pathik@gmail.com";


											$email_subject = "Student Enquiry";
											$email_message = "Form details below.\n\n
															Student Name : "  .$name.  "\n
															Course:     " .$course. "\n
															Email-Id:   " .$email. "\n
															Mobile :    " .$mobile. " \n
															Message : " .$message. "\n ";
											//serve name //
											$email_from="s1810216@lo5.pwh-r1.com"; 
											$headers = 'From: '.$email_from."\r\n".
											'Reply-To: '.$email."\r\n" .
											'X-Mailer: PHP/' . phpversion();
											mail($email_to, $email_subject, $email_message, $headers);
										}
									}
							?>
							<?php
							if(isset($_POST['submit'])) {
								// EDIT THE 2 LINES BELOW AS REQUIRED

								$email_to = "$pankaj.pathik@gmail.com";
								$email_subject = "GPW Kandaghat";
								$email_message = "Dear  $name,
										Thank you for showing your interest in GPW, Kandaghat.

							Please write to '

							gpwkandaghat@gmail.com' for any further queries or clarifications or you can call @ 01792-256179.

							Regards,
							Team @ GPW
							Kandaghat";
							$headers = 'From: '.$email_from."\r\n".

							'Reply-To: '.$email_from."\r\n" .

							'X-Mailer: PHP/' . phpversion();

							if(mail($email_to, $email_subject, $email_message))
							{


							}
							else
							{
								echo "<script type='text/javascript'>alert('failed!')</script>";
							}

							 
							mysqli_close($conn);
							}
							?>
						<!--- PHP Code Ends -------->
				</div>
        </div>
             
</body>

</html>