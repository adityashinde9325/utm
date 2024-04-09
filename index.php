<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="contactForm" action="mail.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="number">Number:</label>
        <input type="text" id="number" name="number" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>

        <!-- Hidden fields for UTM parameters and referring URL -->
        <input type="hidden" name="utm_source" value="<?php echo isset($_GET['utm_source']) ? $_GET['utm_source'] : ''; ?>">
        <input type="hidden" name="utm_medium" value="<?php echo isset($_GET['utm_medium']) ? $_GET['utm_medium'] : ''; ?>">
        <input type="hidden" name="utm_campaign" value="<?php echo isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : ''; ?>">
        <input type="hidden" name="utm_term" value="<?php echo isset($_GET['utm_term']) ? $_GET['utm_term'] : ''; ?>">
        <input type="hidden" name="utm_content" value="<?php echo isset($_GET['utm_content']) ? $_GET['utm_content'] : ''; ?>">
        <input type="hidden" name="referring_url" value="<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''; ?>">

        <input type="button" id="submitButton" value="Submit">
    </form>
<h1> new form </h1>


<form id="contactForm1" action="mail.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="number">Number:</label>
        <input type="text" id="number" name="number" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>

        <!-- Hidden fields for UTM parameters and referring URL -->
        <input type="hidden" name="utm_source" value="<?php echo isset($_GET['utm_source']) ? $_GET['utm_source'] : ''; ?>">
        <input type="hidden" name="utm_medium" value="<?php echo isset($_GET['utm_medium']) ? $_GET['utm_medium'] : ''; ?>">
        <input type="hidden" name="utm_campaign" value="<?php echo isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : ''; ?>">
        <input type="hidden" name="utm_term" value="<?php echo isset($_GET['utm_term']) ? $_GET['utm_term'] : ''; ?>">
        <input type="hidden" name="utm_content" value="<?php echo isset($_GET['utm_content']) ? $_GET['utm_content'] : ''; ?>">
        <input type="hidden" name="referring_url" value="<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''; ?>">

        <input type="button" id="submitButton" value="Submit">
    </form>


    <script>
        document.getElementById('submitButton').addEventListener('click', function(event) {
            // Prevent the default form submission
            event.preventDefault(); 

            // Disable the submit button to prevent multiple submissions
            document.getElementById('submitButton').disabled = true;

            // Get form data
            var formData = new FormData(document.getElementById('contactForm'));

            // Send form data to PHP script
            fetch('mail.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Log the response from PHP script
                
                // Redirect to thank you page after successful submission
                window.location.href = "thank_you.html";
            })
            .catch(error => {
                console.error('Error:', error);
            });

            // Send form data to Google Sheets
            fetch('https://script.google.com/macros/s/AKfycbzXPKrWSJP1R0p0qMtuh96Vte7gb16pojmfZRThWbnGH8bnoufXzWDMzGxyB0ljjHBQGQ/exec', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Log the response from Google Sheets
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>



<script>
        document.getElementById('submitButton1').addEventListener('click', function(event) {
            // Prevent the default form submission
            event.preventDefault(); 

            // Disable the submit button to prevent multiple submissions
            document.getElementById('submitButton').disabled = true;

            // Get form data
            var formData = new FormData(document.getElementById('contactForm1'));

            // Send form data to PHP script
            fetch('mail.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Log the response from PHP script
                
                // Redirect to thank you page after successful submission
                window.location.href = "thank_you.html";
            })
            .catch(error => {
                console.error('Error:', error);
            });

            // Send form data to Google Sheets
            fetch('https://script.google.com/macros/s/AKfycbzXPKrWSJP1R0p0qMtuh96Vte7gb16pojmfZRThWbnGH8bnoufXzWDMzGxyB0ljjHBQGQ/exec', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Log the response from Google Sheets
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
