<?php
// Start a session or resume existing
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        Consolidated Parking
    </div>

    <!-- Center the form on the page -->
    <div style="display: grid; place-items: center; height: 100vh;">
        <div class="form-wrapper">
            <form action="qrcreation.php" method="post">
                <!-- Site Options -->
                <div>
                <select name="site" required>
                    <option value="">-- Please select a site --</option>
                    <option value="Pointe Orlando">Pointe Orlando</option>
                    <option value="MCO">MCO</option>
                    <option value="Miami Port Authority">Miami Port Authority</option>
                </select>
                </div>

                <!-- Purchase Options -->
                <div>
                <select name="purchase_type" required>
                    <option value="">Please select a ticket type</option>
                    <option value="0">Purchase a Ticket</option>
                    <option value="1">Purchase a Validation</option>
                </select>
                </div>
                
                <!-- Date/Time Selection -->
                <div style="margin-top: 20px;">
                    <label>Start Date/Time:</label>
                    <input type="datetime-local" name="start_datetime" required>
                </div>
                <div style="margin-top: 10px;">
                    <label>End Date/Time:</label>
                    <input type="datetime-local" name="end_datetime" required>
                </div>
                
                <!-- Proceed Button -->
                <div style="margin-top: 20px;">
                    <input type="submit" value="Proceed">
                </div>
            </form>
        </div>
    </div>
</body>
</html>