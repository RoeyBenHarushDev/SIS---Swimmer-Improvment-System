<?php
include 'db.php';
include 'config.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `tbl_swimmerList_208` WHERE user_id=$id";
    $result = mysqli_query($connection, $sql);
    if($result){
        header('location:'. URL . 'main.php');
    }
    else{
        die(mysqli_error($connection));
    }
}

?>
<?php
mysqli_close($connection);
?>