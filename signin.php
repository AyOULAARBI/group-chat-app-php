
<!doctype html>

<html lang="en"> 

 <head> 

  <meta charset="UTF-8"> 

  <title>Sign in</title> 

  <link rel="stylesheet" href="./loginstyle.css"> 

 </head> 

 <body> 

  <section>
    
   <div class="signin"> 

    <div class="content"> 
    <?php
    include("db.php");
if(isset($_POST["email"]) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if($result){

        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_assoc($result);
            
            $hashedPassword = $row['password'];
            if (!password_verify($password, $hashedPassword)) 
            {
                echo 'Invalid Password';
            }
            else
            {
                echo 'Logged In Successfully';
            }

        }else{

            echo 'Invalid Email Address';
        }
    }else{
        
        echo 'Something Went Wrong!';
    }

}
?>
     <h2>Sign in</h2> 

     <form method="POST" class="form" action=""> 
        <div class="inputBox"> 
            <input type="email"  name="email" required> <i>email</i> 
        </div> 

        <div class="inputBox"> 
            <input type="password" name="password" required> <i>Password</i> 
        </div> 

        <div class="links"> 
            <a href="#">Forgot Password</a> 
            <a href="signup.php">Sign up</a> 
        </div> 
      <div class="inputBox"> 
       <input type="submit" value="sign in"> 
      </div> 
    </div> 



    </div> 
</form> 


  </section>

 </body>

</html>