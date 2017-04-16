<?php

	require_once $_SERVER['DOCUMENT_ROOT'] . '/core/init.php';

	$page = 'contact';
	$pageTitle = 'Contact ' . owner;

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
	    $name = htmlspecialchars(trim($_POST["name"]));
	    $email = htmlspecialchars(trim($_POST["email"]));
	    $message = htmlspecialchars(trim($_POST["message"]));
	    $errorMessages = array();

	    if ($name == "" OR $email == "" OR $message == "")
	    {
	       $errorMessages[] = "You must specify a value for name, email address, and message.";
	    }

	    foreach( $_POST as $value )
	    {
	        if( stripos($value,'Content-Type:') !== FALSE )
	        {
	            $errorMessages[] = "There was a problem with the information you entered."; 
	        }
	    }

	    require_once phpMailer;
	    $mail = new PHPMailer();

	    if (!$mail->ValidateAddress($email))
	    {
	        $errorMessages[] = "You must specify a valid email address.";	        
	    }

	    if (count($errorMessages) == 0) 
	    {
		    $email_body = "";
		    $email_body = $email_body . "Name: " . $name . "<br>";
		    $email_body = $email_body . "Email: " . $email . "<br>";
		    $email_body = $email_body . "Message: " . $message;

		    $mail->SetFrom($email, $name);
		    $address = "orders@shirts4mike.com";
		    $mail->AddAddress($address, "Shirts 4 Mike");
		    $mail->Subject    = "Shirts 4 Mike Contact Form Submission | " . $name;
		    $mail->MsgHTML($email_body);

		    if($mail->Send()) 
		    {
		    	header("Location: contact.php?status=thanks");
		    	exit;
		    }
		    else
		    {
		    	$errorMessages[] = "There was a problem sending the email: " . $mail->ErrorInfo;
		    }
		}
	    
	}

	require_once header;

?>

<h1 class="text-center">Get in touch</h1>
<?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
    <p>Thanks for the email! I&rsquo;ll be in touch shortly!</p>
<?php } else { ?>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" role="form">
			<?php 
			if (isset($errorMessages)) 
			{				
				foreach ($errorMessages as $errorMessage) 
				{
					echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
				}
			}
			else
			{
				echo '<p class="text-center">I’d love to hear from you! Complete the form to send me an email.</p>';
			}
			?>
			<div class="form-group">
				<label for="">Name</label>
				<input type="name" class="form-control" id="" name="name" value="<?php if(isset($name)){echo $name;}?>" placeholder="Enter your name">
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control" id="" name="email" value="<?php if(isset($email)){echo $email;}?>" placeholder="Enter your email address">
			</div>
			<div class="form-group">
				<label for="message">Message</label>
				<textarea class="form-control" name="message" rows="3" id="comment"><?php 
				if(isset($message)){echo $message;}?></textarea>
			</div>

			<button type="submit" name="submit" class="btn btn-success">Send</button>
		</form>
		<?php } ?>
	</div>
	<div class="col-md-4"></div>
</div>
			
<!-- Start Footer -->
<?php require_once footer; ?>
<!-- End Footer -->