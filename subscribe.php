<?php



$from_email ="";




$my_email = "mangirish@manmohini.com.au";
$continue = "http://manmohini.com.au/";


if(!(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) && stristr($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST'])))
{
	$errors[] = "You must enable referrer logging to use the form";
}




if(!defined("PHP_EOL"))
{
	define("PHP_EOL", strtoupper(substr(PHP_OS,0,3) == "WIN") ? "\r\n" : "\n");
}



function build_message($request_input)
{
	if(!isset($message_output))
	{
		$message_output ="        ";
	}
	if(!is_array($request_input))
	{
		$message_output = $request_input;
	}
	else
	{
		foreach($request_input as $key => $value)
		{
			if(!empty($value))
			{
				if(!is_numeric($key))
				{
					$message_output .= str_replace("_"," ",ucfirst($key)).": ".build_message($value).PHP_EOL.PHP_EOL;
				}
				else
				{
					$message_output .= build_message($value).", ";
				}
			}
		}
	}
	return rtrim($message_output,", ");
}

$message = build_message($_REQUEST);
$message='

Email Address :'.$_REQUEST["email"].'';

$message = $message . PHP_EOL.PHP_EOL."-- ".PHP_EOL."Thank you ";


$message = $message . PHP_EOL.PHP_EOL."-- ".PHP_EOL."Thank you ";

$message = stripslashes($message);

$subject = "Subscribe";
$headers="BCC: mangirish@manmohini.com.au". 


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
// More headers
$headers .= "From: wwww.manmohini.com.au" . "\r\n";  
$headers .= "BCC: mangirish@manmohini.com.au" . "\r\n";
$subject = stripslashes($subject);

mail($my_email,$subject,$message,$headers);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
 <title>Manmohini Events An organisation formed to bring Internationally renowned artists to Australia for our sheer love towards Indian Performing Arts </title>
</head>

<body>

<div>
<center>
<b>Thank you for your response, we will get back to you soon. Have a great time!</b>

<br>
<p><a href="<?php print $continue; ?>">Click here to continue</a></p>
</center>
</div>

</body>
</html>