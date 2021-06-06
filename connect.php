


<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['fullname']) ) {
         if( isset($_POST['comment'])){
            $fname = $_POST['fullname'];
       
            $comment = $_POST['comment'];
        
            $host = "localhost";
            $dbUsername = "root";
            $dbPassword = "123456";
            $dbName = "comment";
            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        
           
            if ($conn->connect_error) {
            die('Could not connect to the database.');
            }
            else {
           
           
            $Insert = "INSERT INTO groundzero(full_name,comment) values('$fname','$comment')";
            
                
                
                
                if ($conn->query($Insert)) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    
                    echo $stmt->error;
                }
            }}
            
    
        else {
            echo "Please enter comment";
            die();
        }
    }
    else{

        echo "please enter full name";
        die();
    }
}
  


else {
    echo "Submit button is not set";
}

?>











<!DOCTYPE HTML>
<html>
<head>
  <title>Register Form</title>
  <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
<div class="main">
<div class="register">
      <h2>Welcome to ICC comments page </h2>
 <form action="" method="POST" id="register">
   
    <label>FULLNAME :</label>
    <br>
    <input type="text" name="fullname" id="fullname" placeholder="enter your full name"     required>
 
 
<br>
</br>
    <label>COMMENT :</label>
    <br>
    <input type="textarea" name="comment" id="comment" placeholder="enter your comment"  required>
    <br>
    <br/>
   
    <input type="submit" value="Submit" name="submit">
    
    <a href="#section1">Read Comment</a>
    
 </form>
 </div>
 </div>
 <div class="main" id="section1">
  <h2>Comment Section</h2>
  <div class="scroll">
  <?php
  
    
      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "123456";
      $dbName = "comment";
      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        
       
  
 
      $Select = "SELECT full_name,comment FROM groundzero ";
      
      $result = $conn->query($Select);
      while (($row = $result->fetch_assoc())) {
          echo  "fullname: " . $row["full_name"]. " Comment: " . $row["comment"].  "<br>";
         
     
     
      
      }
  ?>
  </div>


</body>
</html>


