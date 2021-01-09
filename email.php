<?php

// Please specify your Mail Server - Example: mail.yourdomain.com.
ini_set("SMTP","yadavashishdhirendra@gmail.com");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
ini_set("smtp_port","25");

// Please specify the return address to use
ini_set('sendmail_from', 'yadavashishdhirendra@gmail.com');

$sub = "your subject";
$msg = "your mssg";
$rec = "ashishdhirendrayadav@gmail.com";

mail($rec, $sub, $msg);
?>