<?php
if(isset($_POST["submit"]) && isset($_FILES['image'])) {

    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    if($error == 0){
        if($image_size > 1000000){
            echo "Image size too big.";
        }
        else{
            $image_extention = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_extention_lower = strtolower($image_extention);

            $allowed_type = array("jpg", "jpeg" ,"png");

            if(in_array($image_extention_lower,$allowed_type)){
                $image_name_new = uniqid('IMG-', true).'.'.$image_extention_lower;
                $image_upload_path = 'uploads/'. $image_name_new;
                move_uploaded_file($tmp_name,$image_upload_path);
                echo "Success.";
            }
            else{
                echo "Your are not allowed to upload: .". $image_extention_lower ;
            }
        }
    }
    else{
        echo "error occured.";
    }
}
?>