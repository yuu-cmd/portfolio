<?php

// Put contacting email here
$php_main_email = "inobapen.info@gmail.com";

//Fetching Values from URL
$php_name = $_POST['ajax_name'];
$php_email = $_POST['ajax_email'];
$php_message = $_POST['ajax_message'];



//Sanitizing email
$php_email = filter_var($php_email, FILTER_SANITIZE_EMAIL);


//After sanitization Validation is performed
if (filter_var($php_email, FILTER_VALIDATE_EMAIL)) {
	
	
		$php_subject = "Message from contact form";
		
		// To send HTML mail, the Content-type header must be set
		$php_headers = 'MIME-Version: 1.0' . "\r\n";
		$php_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$php_headers .= 'From:' . $php_email. "\r\n"; // Sender's Email
		$php_headers .= 'Cc:' . $php_email. "\r\n"; // Carbon copy to Sender
		
		$php_template = '<div style="padding:50px;">' . $php_name . '様<br/>'
		. 'この度はお問い合わせ頂き、ありがとうございます。<br/><br/>'
		. '<strong style="color:#f00a77;">お名前:</strong>  ' . $php_name . '様<br/>'
		. '<strong style="color:#f00a77;">Eメール:</strong>  ' . $php_email . '<br/>'
		. '<strong style="color:#f00a77;">お問い合わせ内容:</strong>  ' . $php_message . '<br/><br/>'
		. '上記の内容でお問い合わせを送信致しました。'
		. '<br/>'
		. 'お問い合わせ頂いた内容を確認後、改めてEメールにてご連絡を差し上げます。</div>';
		$php_sendmessage = "<div style=\"background-color:#f5f5f5; color:#333;\">" . $php_template . "</div>";
		
		// message lines should not exceed 70 characters (PHP rule), so wrap it
		$php_sendmessage = wordwrap($php_sendmessage, 70);
		
		// Send mail by PHP Mail Function
		mail($php_main_email, $php_subject, $php_sendmessage, $php_headers);
		echo "";
	
	
} else {
	echo "<span class='contact_error'>* Invalid email *</span>";
}

?>