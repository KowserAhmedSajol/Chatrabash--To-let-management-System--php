<?php 

if (isset($_GET['remove'])) {
    if($_GET['remove'] == "gender"){
        $_SESSION['genderFilter'] = "undefined";
        //header('Location: rents.php');
        echo "hi";
        echo $_SESSION['genderFilter'];
        header('Location: rents.php');
    }
}
?>