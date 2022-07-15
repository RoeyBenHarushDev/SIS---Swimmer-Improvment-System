<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/style.css">
    <title>SIS</title>
</head>

<body>
<?php
    include 'db.php';
    $id = $_GET['updateid'];
    $sql = "SELECT * FROM tbl_swimmerList_208 WHERE user_id = $id";
    $upResult = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($upResult);
    $name = $row['name'];
    $bDate = $row['bDate'];
    $age = $row['age'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    $swimmerType = $row['swimmerType'];


    if(isset($_POST['submit'])){
        $upName = $_POST['name'];
        $upBdate = $_POST['bDate'];
        $upAge = $_POST['age'];
        $upEmail = $_POST['email'];
        $upPhone = $_POST['phone'];
        $upAddress = $_POST['address'];
        $upSwimmerType = $_POST['swimmerType'];

        $sql = "UPDATE tbl_swimmerList_208 SET name='$upName', bDate='$upBdate', age='$upAge', email='$upEmail', phone='$upPhone', address='$upAddress', swimmerType='$upSwimmerType'
        WHERE user_id=$id";
        $upResult = mysqli_query($connection, $sql);
        if($upResult){
            header('location:main.php');
        }else{
            die(mysqli_error($connection));
        }
        
    }   
    ?>

    <div class="updateSwimmer">
        <form action="" method="post" id="updateSwimmer">
            <button id="closeUpdate"><a href="main.php"><i class="bi bi-x-circle"></i></a></button>
            <h1 class="updateTitle">Update Swimmer</h1>
            <label for="name">
                <input type="text" name="name" value=<?php echo $name ?>>
                <span>Name</span>
            </label>
            <label for="Date">
                <input type="text" name="bDate" value=<?php echo $bDate ?>>
                <span>B-Date</span>
            </label>
            <label for="Age">
                <input type="text" name="age" value=<?php echo $age ?>>
                <span>Age</span>
            </label>
            <label for="Email">
                <input type="email" name="email" value=<?php echo $email ?>>
                <span>E-Mail</span>
            </label>
            <label for="Phone">
                <input type="tel" name="phone" value=<?php echo $phone ?>>
                <span>Phone</span>
            </label>
            <label for="Address">
                <input type="text" name="address" value=<?php echo $address ?>>
                <span>Address</span>
            </label>
            <label for="SwimmerType">
                <input type="text" name="swimmerType" value=<?php echo $swimmerType ?>>
                <span>Swimmer Type</span>
            </label>
            <label for="Update" id="saveBtn">
                <input type="submit" value="UPDATE" name="submit">
            </label>
            <div class="sign-container">
                <h1>Pool Rules</h1>
                <article>
                    <section>
                        <p class="icon-second"><img src="images/no-pets.png" alt=""></p>
                        <p>No Animals</p><br>
                    </section>
                    <section>
                        <p class="icon-second"><img src="images/no-running.png" alt=""></p>
                        <p>No Running</p>
                    </section>
                    <section class="noFood">
                        <p class="icon-second"><br><img src="images/no-food.png" alt=""></p>
                        <p>No Food & Drinks</p>
                    </section>
                </article>
                <h2><br>No Lifeguard on duty</h2>
                <h3>Swim at your own risk</h3>
            </div>
    </div>
    </form>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
<?php
mysqli_close($connection);
?>