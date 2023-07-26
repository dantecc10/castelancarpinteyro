<?php
include "dynamicSecrets.php";
$data = generatePasskey('sql');

$db = new mysqli("localhost", $data[0], $data[1], $data[2]);
$email = $_POST['email'];

//Create a row in the `newsletter_subscribers` table; that has the following fields: `id_subscriber` (has auto_increment), `email_subscriber` (must be cleaned as it's an user input), and `status_subscriber`, set on 1. Don't forget to use stmt and real_escape_string fr the email
$stmt = $db->prepare("INSERT INTO `newsletter_subscribers` VALUES ('', ?, 1)");
//continue
$stmt->bind_param("s", $cleanEmail);
$cleanEmail = $db->real_escape_string($email);
$stmt->execute();
$stmt->close();
//If the row was created, show a success message
if ($stmt->affected_rows == 1) {
    echo "You have been added to the newsletter!";
} else {
    echo "Something went wrong, please try again later.";
}
