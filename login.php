<?php

	//session start
	session_start();

	//Checking if user is already logged in
	if(isset($_SESSION["username"])){

		//User already logged in redirects to dashboard
		header("Location: dashboard.php");
		die();
	}

  //Error Msg
  $errorMsg=null;

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){

    //connection to db
    require "assets/php/dbConnection.php";

    // prepare and bind
    $stmt = $conn->prepare("SELECT name,password FROM employee WHERE emp_id=?");
    $stmt->bind_param("s", $username);

    //Data from Form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows==0){
      $errorMsg = "Account Not Found";
    }
    else{
      $row = $result->fetch_assoc();
      if($row["password"]==$password){
        //Logged IN
        $_SESSION["username"]=$username;
        $_SESSION["empName"]=$row["name"];
        header("Location: dashboard.php");
        die();
      }
      else{
        $errorMsg = "Password Not Matched";
      }
    }

    //connection to db close
    $conn->close();
  
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Branch Login</title>

  <?php require "assets/php/head.php"; ?>

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="javascript:void(0)" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">MSA Admin</span>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body" style="padding-bottom: 30px;">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                    <?php 
                        if(isset($errorMsg)){
                    ?>
                    <div class="alert alert-danger text-center" style="padding: 1px 20px;font-weight: 600;" role="alert">
                        <i class="bi bi-exclamation-triangle"></i> <?php echo $errorMsg; ?>
                    </div>
                    <?php }?>                   

                    <form method="POST" action="login.php" class="row g-3">

                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group">
                          <input type="text" name="username" class="form-control" id="username" value="<?php if(isset($username)) echo $username; ?>" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" value="<?php if(isset($password)) echo $password; ?>" required>
                    </div>

                    
                    <div class="col-12">
                        <button class="btn btn-primary w-100" id="submit" name="submit" value="submit" type="submit">Login</button>
                    </div>
                    
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main>   
    
  <?php require "assets/php/footer.php"; ?>

</body>

</html>
