<?php
require_once("header.php");
 
// Escape user inputs for security
$string=$_REQUEST['query'];
$query = mysqli_real_escape_string($db, $string);
 
if(isset($query)){
    // Attempt select query execution
    $sql = "SELECT * FROM item WHERE item_name LIKE '" . $query . "%'";
    if($result = mysqli_query($db, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<p>" . $row['item_name'] . "</p>";
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found for <b>$query</b></p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
 
require_once("footer.php");
?>