<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Gaming Kai</title>
		<!-------Icon Tab------->
		<link rel="shortcut icon" type="x-icon" href="https://i.imgur.com/jsGW21W.png">

		<!-----custom-------->
		<link rel="stylesheet" href ="../css/index-styles.css">

		<!----normalize------->
		<link rel="stylesheet" href ="../css/normalize.css">
		<!----fontawesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
		 crossorigin="anonymous" referrerpolicy="no-referrer" />

	
	</head>

    <body> 
    <?php  include_once '../inc/navbar.php'; ?>

    <?php
    	require_once '../html/connect.php';

        if(isset($_SESSION['userName']))
        {
            $name =$_SESSION['userName'];
            $email =$_SESSION['userEmail'];
            $oldPass = $_SESSION['userPass'];

            if(isset($_POST['submit']))
            {
                $pass = $_POST['pass'];
                $newPass = $_POST['newPass'];
                $rePass = $_POST['rePass'];

                $passHashed = $oldPass;
                $checkPass = password_verify($pass,$passHashed);
                require_once "../inc/function.inc.php";
                if(emptyInputAddGame($oldPass,$newPass,$rePass) !== false)
                {
                    header("location: ../html/profile.php?error=emptyinput");
                    exit();
                }
                if($checkPass === false)
                {
                    header("location: ../html/profile.php?error=wrongpass");
                    exit();
                }
                if(passMatch($newPass,$rePass) !== false)
                {
                    header("location: ../html/profile.php?error=passnotmatch");
                    exit();
                }
                
                $hashedNewPass = password_hash($newPass, PASSWORD_DEFAULT);
                $query = "UPDATE `acc` SET `userPass`= '$hashedNewPass' where `userName` = '$name' ";
			    $sql = mysqli_query($connect,$query);
                    
                header("location: ../html/profile.php?error=none");
                exit();
              
            }
           
        }
    ?>
        <div class="prof-container" id="prof">
            <div class="profile">
                <h2>Th??ng tin c?? nh??n</h2>
                <form method="POST" enctype="multipart/form-data" >  
                    <div class="txt_field">
                        <input type="text" id="rOnly" required value="<?php echo $name; ?>" readonly>
                        <span></span>
                        <label for="">T??n t??i kho???n</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" id="rOnly" required value="<?php echo $email; ?>" readonly>
                        <span></span>
                        <label for="">Email</label>
                    </div>
                   
                    <div class="txt_field">
                        <input type="password" name="pass" >
                        <span></span>
                        <label for="">M???t kh???u hi???n t???i</label>
                    </div>
                    <div class="txt_field">
                        <input type="password" name="newPass">
                        <span></span>
                        <label for="">M???t kh???u m???i</label>
                    </div>
                    <div class="txt_field">
                        <input type="password" name="rePass">
                        <span></span>
                        <label for="">Nh???p l???i m???t kh???u m???i</label>
                    </div>
                    <button type="submit" name="submit">?????i m???t kh???u</button>
    
                </form>
                <?php
							if(isset($_GET["error"]))
							{
								$error = $_GET["error"];
								
								switch($error){
									case "emptyinput": echo "<script> alert('Vui l??ng ??i???n ?????y ????? th??ng tin') </script>";
										break;
                                    case "wrongpass": echo "<script> alert('M???t kh???u hi???n t???i kh??ng ch??nh x??c') </script>";
										break;
                                    case "passnotmatch": echo "<script> alert('Nh???p m???t kh???u kh??ng tr??ng kh???p') </script>";
										break;
									case "none": echo "<script> alert('?????i m???t kh???u th??nh c??ng') </script>";
										break;
								}


							}
						?>
            </div>
        </div>
        




    <!---------Footer start------->
        <footer id="footer" class="footer">
            <div class="footer-container">
                <div class="footer-link-1">
                    <img class ="logo" src="https://i.imgur.com/IIfskYh.png" >
                    <ul class="flex">
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-facebook-messenger"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-discord"></i>
                            </a>
                        </li>
                    
                    </ul>
                </div>

                <div class="footer-link-2">
                    <ul class="flex">
                        <li>
                            <a href="#">
                                C??i m???c
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Nh??n 
                            </a>	
                        </li>
                        <li>
                            <a href="#">
                                Cho
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Chuy??n Nghi???p
                            </a>
                        </li>
                    </ul>
                    <p class="text">&copy; GAMING KAI | COPYRIGHT</p>
                </div>
            </div>
        </footer>

        <!---------Footer end------->


        <!------Script------->
        <script src="../js/Script.js">  </script>
        <!------Script end------>
	</body>
</html>