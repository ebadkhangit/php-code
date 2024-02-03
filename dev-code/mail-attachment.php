<?php
if (isset($_FILES) && (bool) $_FILES) {

    $allowedExtensions = array("pdf", "doc", "docx", "gif", "jpeg", "jpg", "png");

    $files = array();
    foreach ($_FILES as $name => $file) {
        $file_name = $file['name'];
        $temp_name = $file['tmp_name'];
        $file_type = $file['type'];
        $path_parts = pathinfo($file_name);
        $ext = $path_parts['extension'];
        if (!in_array($ext, $allowedExtensions)) {
            die("File $file_name has the extensions $ext which is not allowed");
        }
        array_push($files, $file);
    }

    // email fields: to, from, subject, and so on
    $to = $_POST['email'];
    $from = "pramodkumarp6@gmail.com";
    $subject = $_POST['sub'];
    $message = $_POST['msg'];
    $headers = "From: $from";
 			
		//	$headers = "From: " . $from . "\r\n";
		//	$headers .= "Reply-To: tej123php@gmail.com\r\n";
		//	$headers .= "MIME-Version: 1.0\r\n";
		//	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = "<table>
<tr>
<td colspan='2'>Test attachment with html design mail formate.</td>
</tr>
<tr>
<td>Name</td>
<td>Tej Singh</td>
</tr>
<tr>
<td>Emailid</td>
<td>tej123php@gmail.com</td>
</tr>
<tr>
<td>Mobile No.</td>
<td>9711522294</td>
</tr>
</table>";


    // boundary 
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

    // headers for attachment 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

    // multipart boundary 
    $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
    $message .= "--{$mime_boundary}\n";

    // preparing attachments
    for ($x = 0; $x < count($files); $x++) {
        $file = fopen($files[$x]['tmp_name'], "rb");
        $data = fread($file, filesize($files[$x]['tmp_name']));
        fclose($file);
        $data = chunk_split(base64_encode($data));
        $name = $files[$x]['name'];
        $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" .
                "Content-Disposition: attachment;\n" . " filename=\"$name\"\n" .
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        $message .= "--{$mime_boundary}\n";
    }
    // send

    $ok = mail($to, $subject, $message, $headers);
    if ($ok) {
        echo "<p>mail sent to $to!</p>";
    } else {
        echo "<p>mail could not be sent!</p>";
    }
}
?>

<html>
    <body>
        <h2>Send Mail</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="text" name="email" placeholder="email"><br>
            <input type="text" name="sub" placeholder="Subject"><br>
            <textarea name="msg" placeholder="Write email message"></textarea><br>

            Attach file:<br>
            <input type="file" name="attach1"/><br><br>
            <input type="submit" value="Send Mail"/>
        </form>
    </body>
</html>