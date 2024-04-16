
<!doctype html>

<html lang="en"> 

 <head> 

  <meta charset="UTF-8"> 

  <title>Sign up</title> 

  <link rel="stylesheet" href="./loginstyle.css"> 

 </head> 

 <body> 

  <section>
    
   <div class="signin"> 

    <div class="content"> 
    <?php
    include("db.php");
if(isset($_POST["username"]) && isset($_POST['email']) && isset($_POST['password'])){
    $username = $_POST["username"];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$hashedPassword')";
    $result = mysqli_query($conn, $query);
    if($result){
        echo 'Registration Successfull';
    }else{
        echo "error";
    }

}
?>
     <h2>Sign Up</h2> 

     <form method="POST" class="form" action=""> 

      <div class="inputBox"> 
       <input type="text"  name="username" required> <i>Username</i> 
      </div> 

    <div class="inputBox"> 
        <input type="email"  name="email" required> <i>email</i> 
    </div> 

    <div class="inputBox"> 
       <input type="password" name="password" required> <i>Password</i> 
    </div> 

    <div class="links"> 
            <a href="signin.php">alreay have an account ? Sign in</a> 
    </div> 
      <div class="inputBox"> 
  
       <input type="submit" value="sign up"> 
  
      </div> 
    


     </div> 

</form> 

   </div> 

  </section>

 </body>

</html>