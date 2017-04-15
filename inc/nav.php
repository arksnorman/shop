<?php
	$page = 'contact';
	$pageTitle = 'Contact ' . owner;

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
	    $name = trim($_POST["name"]);
	    $email = trim($_POST["email"]);
	    $message = trim($_POST["message"]);


	    if ($name == "" OR $email == "" OR $message == "") 
	    {
	        echo "You must specify a value for name, email address, and message.";
	        exit;
	    }

	    foreach( $_POST as $value )
	    {
	        if( stripos($value,'Content-Type:') !== FALSE )
	        {
	            echo "There was a problem with the information you entered.";    
	            exit;
	        }
	    }

	    if ($_POST["address"] != "") 
	    {
	        echo "Your form submission has an error.";
	        exit;
	    }

	    require_once("inc/phpmailer/class.phpmailer.php");
	    $mail = new PHPMailer();

	    if (!$mail->ValidateAddress($email))
	    {
	        echo "You must specify a valid email address.";
	        exit;
	    }

	    $email_body = "";
	    $email_body = $email_body . "Name: " . $name . "<br>";
	    $email_body = $email_body . "Email: " . $email . "<br>";
	    $email_body = $email_body . "Message: " . $message;

	    $mail->SetFrom($email, $name);
	    $address = "orders@shirts4mike.com";
	    $mail->AddAddress($address, "Shirts 4 Mike");
	    $mail->Subject    = "Shirts 4 Mike Contact Form Submission | " . $name;
	    $mail->MsgHTML($email_body);

	    if(!$mail->Send()) 
	    {
	      echo "There was a problem sending the email: " . $mail->ErrorInfo;
	      exit;
	    }

	    header("Location: contact.php?status=thanks");
	    exit;
	}

	require_once 'inc/header.php';

?>

			<h1 class="text-center">Get in touch</h1>
			<?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
                <p>Thanks for the email! I&rsquo;ll be in touch shortly!</p>
            <?php } else { ?>
			<p class="text-center">I’d love to hear from you! Complete the form to send me an email.</p>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form action="contact.php" method="POST" role="form">
						<legend>Contact</legend>
					
						<div class="form-group">
							<label for="">Name</label>
							<input type="name" class="form-control" id="" name="name" placeholder="Enter your name">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="email" class="form-control" id="" name="email" placeholder="Enter your email address">
						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea class="form-control" rows="3" id="comment"></textarea>
						</div>

						<button type="submit" class="btn btn-success">Send</button>
					</form>
					<?php } ?>
				</div>
				<div class="col-md-4"></div>
			</div>
<!-- Start Footer -->
<?php include('inc/footer.php') ?>
<!-- End Footer -->