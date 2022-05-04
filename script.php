
<h1>Result</h1>
<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = 'root';
$db_database = '8ta';

$connection = @mysqli_connect($db_host, $db_username, $db_password, $db_database) or die("Connection error" . mysqli_connect_error());

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully \n";


if(isset($_POST["name"]))
{
    $input = $_POST["name"];
    $psw = $_POST["psw"];
    if((ctype_alpha($input)))
    {
        print_r($input);
        echo "string is valid " . $input;
        
        $query = "SELECT * FROM users WHERE name = ? and password = ?";

        $stmt = $connection->prepare($query); 
        $stmt->bind_param("ss", $input,$psw);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $result = $result->fetch_assoc(); // fetch data   
        print_r($result);


    }
    else
        echo "sneeky sneeky";

        //give 404 error
        http_response_code(404);
        
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test OUTPUT Page</title>
</head>

<body>

<div style="display:none;">
    <?php print_r($_POST);?>
</div>


<h1>Query</h1>
<?php $query_display = "SELECT * FROM users where name = '" . $_POST['name'] . "'";?>

<div><pre style="color:#00f;"><?php echo $query_display; ?></pre></div>

</body>
</html>
