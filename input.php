<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>

</head>
<body>
   

    <h1>Inputted Data</h1>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $lname = $_POST["lname"];
        $email = $_POST["Email"];
        $sex = $_POST["Sex"];

    
        $subjects = isset($_POST["Math"]) ? "Math, " : "";
        $subjects .= isset($_POST["Science"]) ? "Science, " : "";
        $subjects .= isset($_POST["Filipino"]) ? "Filipino, " : "";
        $subjects .= isset($_POST["English"]) ? "English" : "";

        
        echo "<p><strong>First Name:</strong> $fname</p>";
        echo "<p><strong>Middle Name:</strong> $mname</p>";
        echo "<p><strong>Last Name:</strong> $lname</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Sex:</strong> $sex</p>";
        echo "<p><strong>Subjects Taken:</strong> $subjects</p>";
    } else {
        echo "<p>Wala ka pong nilagay na data.</p>";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $lname = $_POST["lname"];
        $email = $_POST["Email"];
        $sex = $_POST["Sex"];
    
        $subjects = isset($_POST["Math"]) ? "Math" : "";
        $subjects .= isset($_POST["Science"]) ? ", Science" : "";
        $subjects .= isset($_POST["Filipino"]) ? ", Filipino" : "";
        $subjects .= isset($_POST["English"]) ? ", English" : "";
    
        // Get the absolute path to the directory
        $directory = __DIR__;
    
        // Specify the CSV file path
        $csvFilePath = $directory . "/number3.csv";
    
        // Open or create the CSV file in append mode
        $csvFile = fopen($csvFilePath, "a");
    
        if ($csvFile !== false) {
            
            $success = fputcsv($csvFile, array($fname, $mname, $lname, $email, $sex, $subjects));
    
            
            fclose($csvFile);
    
            if ($success) {
                echo "<p>Data written to CSV file</p>";
            } else {
                echo "<p>Error writing data to CSV file.</p>";
            }
        } else {
            echo "<p>Error opening CSV file.</p>";
        }
    } else {
        echo "<p>No data submitted.</p>";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Table of Data</h2>";
        echo "<style>
        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
      </style>";
      

        echo "<table>";
        echo "<tr><td>First Name</td><td>$fname</td></tr>";
        echo "<tr><td>Middle Name</td><td>$mname</td></tr>";
        echo "<tr><td>Last Name</td><td>$lname</td></tr>";
        echo "<tr><td>Email</td><td>$email</td></tr>";
        echo "<tr><td>Sex</td><td>$sex</td></tr>";
        echo "<tr><td>Subjects Taken</td><td>$subjects</td></tr>";
        echo "</table>";
    }
    ?>
    


</body>
</html>