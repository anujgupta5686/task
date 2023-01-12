<?php
    $error="";
    $error1="";
    $error2="";
    $error3="";
    $error4="";
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
   $connection=mysqli_connect("localhost","root","","task");
   if(isset($_POST['submit'])){
    $UName=$_POST['name'];
    $UEmail=$_POST['email'];
    $UMobile=$_POST['mobile'];
    $UImageN=$_FILES['image']['name'];
    $UImageT=$_FILES['image']['tmp_name'];
    $UImageS=$_FILES['image']['size'];
    $UAddress=$_POST['address'];
    
    if($UName!="")
    {
        if(strlen($UName)>=3)
        {
            if(preg_match($regex,$UEmail))
            {
                if(strlen($UMobile)==10)
                {
                    //Adress Start from here.
                    if($UAddress!="")
                    {
                        $ext=explode('.',$UImageN);
                        $fileext=end($ext);
                        $myextention=array("jpeg","jpg","png");
                        if(in_array($fileext,$myextention)==true){
                            $img1=move_uploaded_file($UImageT,'../Uploaded_Image/'.$UImageN);
                            $ins="INSERT INTO `details`(`name`, `email`, `mobile`, `image`, `address`) VALUES ('$UName','$UEmail','$UMobile','$UImageN','$UAddress')";
                            $query=mysqli_query($connection,$ins);
                            if($query)
                            {
                                echo "<script>alert('Data has been inserted')</script>";
                            }
                            else
                            {
                                echo "<script>alert('Data has not been inserted')</script>"; 
                            }
                        }
                        else
                        {
                            $error4="File extension should be jpg,png,jpeg";
                        }
                    }
                    else
                    {
                        $error3=" Please write something";
                    }
                    //Address end from here.
                }
                else
                {
                    $error2="Enter Valid Mobile Number";
                }
            }
            else
            {
                $error1=" Invalid Email";
            }
        }
        else
        {
            $error=" Name should be greater then 3 charecter.";
        }
    }
    else
    {
        $error="Please Enter Name.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS Link -->
    <link href="../CSS_Code/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap JavaScript Link -->
    <script src="../JavaScript/js/bootstrap.bundle.min.js"></script>
    <!-- Google Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <!-- MySelf External CSS Code -->
    <link rel="stylesheet" href="../CSS_Code/index.css">
    <!-- MySelf External JavaScript Code -->
    <script src="../JavaScript/index.js" defer></script>
    <title>businesslabs</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 gyan mx-auto mt-5  ">
                <!-- OLD -->
                <div class="row" style="padding: 8px; background-color: white; border-radius: 5px;">
                    <div class="col-sm-12 mx-auto " style="border-left:8px solid black; border-top:8px solid black;">
                        <div class="text-center">
                            <h3 class="pt-4 pb-2" style="font-weight: bold; color: rgb(75,62,62);">Get in Touch</h3>
                        </div>
                        <div class="container">
                            <div class="col-sm-11 mx-auto mb-3">
                                <div class="row">
                                    <div class="col-sm-7"
                                        style="border-radius: 5px; background-color: white; box-shadow: rgba(0, 0, 0, 0.35) 0px 0px 20px;">
                                        <h4 class="text-center pt-3 pb-2" style="color: rgb(131,131,131);">Write Us</h4>

                                        <form class="form" action="<?=$_SERVER['PHP_SELF'];?>" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="name" id="name1"
                                                   placeholder="Full Name">
                                                <span class="text-danger">
                                                    <?php echo $error; ?>
                                                </span>


                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="email" id="email"
                                                   placeholder="Email">
                                                <span class="text-danger">
                                                    <?php echo $error1; ?>
                                                </span>

                                            </div>
                                            <div class="mb-3">
                                                <input type="number" class="form-control" maxlength="10" name="mobile"
                                                    id="mobile" placeholder="tel: XXX XXX XXXX">
                                                <span class="text-danger">
                                                    <?php echo $error2; ?>
                                                </span>

                                            </div>
                                            <div class="mb-3">
                                                <input type="file" class="form-control" name="image" id="image"
                                                   placeholder="Upload Image">
                                                <span class="text-danger">
                                                    <?php echo $error4; ?>
                                                </span>

                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" name="address" id="address" rows="6"
                                                   placeholder="Your Message Here..."></textarea>
                                                <span class="text-danger">
                                                    <?php echo $error3; ?>
                                                </span>

                                            </div>
                                            <input type="submit" class="btn btn-primary mb-2" name="submit"
                                                value="Send" />
                                        </form>
                                    </div>
                                    <div class="col-sm-5"
                                        style=" background-color: rgb(0,105,247); border-radius: 5px;box-shadow: 1px 1px 5px rgb(0,105,247),-1px -1px 5px rgb(0,105,247);">
                                        <h4 class="text-center pt-3 pb-2 text-light">Contact Us</h4><br><br>
                                        <div class="Main">
                                            <div>
                                                <span class="d-block p-2 text-white mb-4"><span
                                                        class="material-symbols-outlined">
                                                        location_on
                                                    </span>
                                            </div>
                                            <div>
                                                <span><b>Address:</b>Your Address <br>
                                                    Here</span>
                                            </div>
                                        </div>
                                        <div class="Main">
                                            <div>
                                                <span class="d-block p-2 text-white mb-4"><span
                                                        class="material-symbols-outlined">
                                                        phone
                                                    </span>
                                            </div>
                                            <div style="margin-top:8px;">
                                                <span><b>Phone:</b>+1-000-000-000</span>
                                            </div>
                                        </div>
                                        <div class="Main">
                                            <div>
                                                <span class="d-block p-2 text-white mb-4"><span
                                                        class="material-symbols-outlined">
                                                        <span class="material-symbols-outlined">
                                                            <b>alternate_email</b>
                                                        </span>
                                                    </span>
                                            </div>
                                            <div>
                                                <span><b>Email:</b><br><u>example@xyz.com</u></span>
                                            </div>
                                        </div>
                                        <div class="Main" style="margin-top: 15px;">
                                            <div>
                                                <span class="d-block p-2 text-white mb-4"><span
                                                        class="material-symbols-outlined">
                                                        <span class="material-symbols-outlined">
                                                            <b>public</b>
                                                        </span>
                                                    </span>
                                            </div>
                                            <div>
                                                <span><b>Websites:</b><br><u>www.yourcompany.com</u></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>