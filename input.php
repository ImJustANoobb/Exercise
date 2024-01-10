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

function goBack(){
    header("Location: forms.html?message=Invalid input");
 }
 function validate($input) {
    $pattern = '/[^a-zA-Z\s]/'; 

    if (empty($input) || preg_match($pattern, $input)) {
        goBack();
    }
    
}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $lname = $_POST["lname"];
        $email = $_POST["Email"];
        $sex = $_POST["Sex"];

        validate($fname);
        validate($mname);
        validate($lname);

    
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
    

        $directory = __DIR__;
    
        
        $csvFilePath = $directory . "/number3.csv";
    
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
        echo "<h2>Submitted Data</h2>";

        echo "<table border ='1' width='300' cellspacing='0'>";
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