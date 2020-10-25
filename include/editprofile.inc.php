<?php 

session_start();


if (isset($_POST['save-changes'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'png', 'jpeg');

    if(!in_array($fileActualExt, $allowed)) {
        header("Location:../editprofile.php?error=wrongpic");
        exit();
    } else {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {

                $fileCheck = '../image/profile*';
                if($delfile = glob($fileCheck)) {
                    unlink($delfile[0]);

                    $fileNameNew = "profile.".$fileActualExt;
                    $fileDestination = '../image/'.$fileNameNew;
     
                    move_uploaded_file($fileTmpName, $fileDestination);
                    
     
                   
     
                    header("Location:../editprofile.php?success");
                    exit();
     

                } else {
                    $fileNameNew = "profile.".$fileActualExt;
                    $fileDestination = '../image/'.$fileNameNew;
     
                    move_uploaded_file($fileTmpName, $fileDestination);
     
                   
     
                    header("Location:../editprofile.php?success");
                    exit();
                }

              

            } else {
                header("Location:../editprofile.php?error=largepic");
                exit();
            }
        } else {
            header("Location:../editprofile.php?error=uperror");
            exit();
        }
    }
}