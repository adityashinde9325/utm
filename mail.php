<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utm_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];
$message = $_POST['message'];
$utm_source = $_POST['utm_source'];
$utm_medium = $_POST['utm_medium'];
$utm_campaign = $_POST['utm_campaign'];
$utm_term = $_POST['utm_term'];
$utm_content = $_POST['utm_content'];
$referring_url = $_POST['referring_url'];

// SQL query to insert data into the database
$sql = "INSERT INTO contact_form (name, number, email, message, utm_source, utm_medium, utm_campaign, utm_term, utm_content, referring_url)
        VALUES ('$name', '$number', '$email', '$message', '$utm_source', '$utm_medium', '$utm_campaign', '$utm_term', '$utm_content', '$referring_url')";

if ($conn->query($sql) === TRUE) {
    // Data inserted into database successfully

    // Send email
    $to = "shindeap2020@gmail.com"; // Change this to your email address
    $subject = "New Form Submission";
    $message = "Name: $name\n";
    $message .= "Number: $number\n";
    $message .= "Email: $email\n";
    $message .= "Message: $message\n";
    $message .= "UTM Source: $utm_source\n";
    $message .= "UTM Medium: $utm_medium\n";
    $message .= "UTM Campaign: $utm_campaign\n";
    $message .= "UTM Term: $utm_term\n";
    $message .= "UTM Content: $utm_content\n";
    $message .= "Referring URL: $referring_url\n";

    // Send email
    if(mail($to, $subject, $message)) {
        // Email sent successfully

        // Send data to Google Sheets using Google Apps Script
        $url = 'https://script.google.com/macros/s/AKfycbyGpyzdZiyUhFNmafTMDUD9S1xo-NmLSkuSecilCT6pVljDTHAP6zCTF3yTGSkqDesZlQ/exec';
        $data = array(
            'name' => $name,
            'number' => $number,
            'email' => $email,
            'message' => $message,
            'utm_source' => $utm_source,
            'utm_medium' => $utm_medium,
            'utm_campaign' => $utm_campaign,
            'utm_term' => $utm_term,
            'utm_content' => $utm_content,
            'referring_url' => $referring_url
        );

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {
            // Handle error
            echo "Failed to send data to Google Sheets.";
        } else {
            // Redirect to thank you page
            header("Location: thank_you.html");
            exit();
        }
    } else {
        // Failed to send email
        echo "Failed to send email.";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
