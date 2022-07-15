<?php
include "db.php";
include 'config.php';
error_reporting(0);


session_start();

if(!isset($_SESSION["user_id"])){
    header('Location: '. URL . 'index.php');
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $bDate = $_POST["bDate"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $swimmerType = $_POST["swimmerType"];
    $query = "INSERT INTO tbl_swimmerList_208(`name`,`bDate`, `age`,`email`,`phone`,`address`,`swimmerType`) VALUES('$name','$bDate','$age','$email','$phone','$address','$swimmerType')";
    if(mysqli_query($connection, $query)){
    }
    else{
        echo "error: can't execute $sql.". mysqli_error($link);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    
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
    <header>
        <div class="topHeader">
            <div class="leftIcons">
                <button class="openSwimerForm"><i class="bi bi-person-plus"></i></button>
                <button id="userIconMobile"><i class="bi bi-person-circle"></i></button>
            </div>
            <h1>Feed</h1>
            <div class="rightIcons">
                <button><i class="bi bi-search"></i></button>
                <button id="openNotification"><i class="bi bi-bell-fill"></i></button>
            </div>
        </div>
        <div class="subHeader">
            <div class="subTitle" id="following" onclick="ShowHideFollowingDiv(this)">Following</div>
            <div class="subTitle" id="mine">Mine</div>
            <div class="subTitle" id="club">Club</div>
            <div class="subTitle" id="dropFilter">Filter<i class="bi bi-arrow-down-short"></i></div>
        </div>
    </header>
    <div class="navbar">
        <img src="images/SIS - New Icon.png" alt="">
        <a href="main.php" class="active">
            <span class="material-symbols-outlined">
                list_alt
            </span>Feed</a>
        <a href="progress.php">
            <span class="material-symbols-outlined">
                insights
            </span>Progress</a>
        <a href="workouts.php">
            <span class="material-symbols-outlined">
                pool
            </span>Workouts</a>
        <a href="challenges.php">
            <span class="material-symbols-outlined">
                military_tech
            </span>Challenges</a>
        <a href="#Settings">
            <span class="material-symbols-outlined" id="openSettings">
                settings
            </span>Settings</a>
            <button class="logASwim" id="logASwim">LOG A SWIM</button>
        </div>
            <div class="profileUser">
                <img src="images/user.png" alt="">
                <button class="dropbtn"><?php echo $_SESSION["name"]; ?><i class="bi bi-arrow-down-short"></i></button>
                <div class="dropdown-content">
                <a href="#">Account</a>
                <a href="#"><i class="mdi mdi-settings"></i>Settings</a>
                <a href="logout.php"><i class="mdi mdi-logout"></i>Logout</a>
                </div>
              </div>
    <div class="settings" id="settingsPop">
        <button><i class="bi bi-x-circle" id="exitSetting"></i></button>
        <ul>
            <li class="categoties">
                <h3>Profile</h3>
            </li>
            <li class="categoties">
                <h3>Account</h3>
            </li>
            <li class="categoties">
                <h3>Privacy</h3>
            </li>
            <li class="categoties">
                <h3>Notifications</h3>
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>
            </li>
            <li class="categoties">
                <h3>Tutorials</h3>
            <li class="categoties">
                <h3>Support</h3>
            </li>
            <li class="categoties">
                <h3>About</h3>
            </li>
        </ul>
        <div class="setting_Logo">
            <img src="images/SIS - New Icon.png" alt="">
        </div>
    </div>
    <div class="notification">
        <button><i class="bi bi-x-circle" id="exitNotification"></i></button>
        <h4>Nothing to see here , go for a swim!</h4>
    </div>
    <section class="hidden" id="followingPage">
        <div class="container">
            <div class="logoAndTextOnimg">
                <img src="images/SIS - New Icon.png" width="60px" alt="">
                <h1>Getting Started With SIS.com</h1>
            </div>
        </div>
        <div class="welcome">
            <p>Welcom to the <b style="color:#006685b7;">SIS.com</b> community! We're glad you joined
                and looking forward to helping you become a professional
                    swimmer!
            </p>
        </div>
        <div class="swimmerContainerFollow">
        <section class="swimmers">
            <div class="swimerDetails">
            <?php 
                    $json = file_get_contents("js/trainers.json");
                    $json = json_decode($json);
                    
                    ?>
                <div>
                    <h3><?php echo $json->trainers->swimmer2->shortName;?></h3>
                </div>
                <div>
                    <h1><?php echo $json->trainers->swimmer2->name;?></h1>
                    <span class="material-symbols-outlined" id="swimerType">
                        pool
                    </span>
                    <h6><?php echo $json->trainers->swimmer2->date;?></h6>
                </div>
            </div>
            <div class="timeAndDistance">
                <h5><?php echo $json->trainers->swimmer2->swimType;?></h5>
                <h2><?php echo $json->trainers->swimmer2->dustance;?>
                    <div class="vertical"></div>
                    <?php echo $json->trainers->swimmer2->duration;?>
                    <div class="vertical"></div>
                    <?php echo $json->trainers->swimmer2->pace;?>
                </h2>
                <div class="partName">
                    <h4>Distance</h4>
                    <h4>Duration</h4>
                    <h4>Pace</h4>
                </div>
                <div class="horizontal"></div>
                <div class="commentBtn"><button>
                        <i class="bi bi-chat-quote"></i>
                        <h5>Comment</h5>
                </div></button>
            </div>
        </section>
        <section class="swimmers">
            <div class="swimerDetails">
                <div>
                    <h3><?php echo $json->trainers->swimmer3->shortName;?></h3>
                </div>
                <div>
                    <h1><?php echo $json->trainers->swimmer3->name;?></h1>
                    <span class="material-symbols-outlined" id="swimerType">
                        pool
                    </span>
                    <h6><?php echo $json->trainers->swimmer3->date;?></h6>
                </div>
            </div>
            <div class="timeAndDistance">
                <h5><?php echo $json->trainers->swimmer3->swimType;?></h5>
                <h2><?php echo $json->trainers->swimmer3->dustance;?>
                    <div class="vertical"></div>
                    <?php echo $json->trainers->swimmer3->duration;?>
                    <div class="vertical"></div>
                    <?php echo $json->trainers->swimmer3->pace;?>
                </h2>
                <div class="partName">
                    <h4>Distance</h4>
                    <h4>Duration</h4>
                    <h4>Pace</h4>
                </div>
                <div class="horizontal"></div>
                <div class="commentBtn"><button>
                        <i class="bi bi-chat-quote"></i>
                        <h5>Comment</h5>
                </div></button>
            </div>
        </section>
        <section class="swimmers">
            <div class="swimerDetails">
            <div>
                    <h3><?php echo $json->trainers->swimmer4->shortName;?></h3>
                </div>
                <div>
                    <h1><?php echo $json->trainers->swimmer4->name;?></h1>
                    <span class="material-symbols-outlined" id="swimerType">
                        pool
                    </span>
                    <h6><?php echo $json->trainers->swimmer4->date;?></h6>
                </div>
            </div>
            <div class="timeAndDistance">
                <h5><?php echo $json->trainers->swimmer4->swimType;?></h5>
                <h2><?php echo $json->trainers->swimmer4->dustance;?>
                    <div class="vertical"></div>
                    <?php echo $json->trainers->swimmer4->duration;?>
                    <div class="vertical"></div>
                    <?php echo $json->trainers->swimmer4->pace;?>
                </h2>
                <div class="partName">
                    <h4>Distance</h4>
                    <h4>Duration</h4>
                    <h4>Pace</h4>
                </div>
                <div class="horizontal"></div>
                <div class="commentBtn"><button>
                        <i class="bi bi-chat-quote"></i>
                        <h5>Comment</h5>
                </div></button>
            </div>
        </section>
        <section class="swimmers">
            <div class="swimerDetails">
            <div>
            <h3><?php echo $json->trainers->swimmer4->shortName;?></h3>
                </div>
                <div>
                    <h1><?php echo $json->trainers->swimmer4->name;?></h1>
                    <span class="material-symbols-outlined" id="swimerType">
                        pool
                    </span>
                    <h6><?php echo $json->trainers->swimmer4->date;?></h6>
                </div>
            </div>
            <div class="timeAndDistance">
                <h5><?php echo $json->trainers->swimmer4->swimType;?></h5>
                <h2><?php echo $json->trainers->swimmer4->dustance;?>
                    <div class="vertical"></div>
                    <?php echo $json->trainers->swimmer4->duration;?>
                    <div class="vertical"></div>
                    <?php echo $json->trainers->swimmer4->pace;?>
                </h2>
                <div class="partName">
                    <h4>Distance</h4>
                    <h4>Duration</h4>
                    <h4>Pace</h4>
                </div>
                <div class="horizontal"></div>
                <div class="commentBtn"><button>
                        <i class="bi bi-chat-quote"></i>
                        <h5>Comment</h5>
                </div></button>
            </div>
        </section>
        <section class="swimmers">
            <div class="swimerDetails">
            <div>
                    <h3><?php echo $json->trainers->swimmer6->shortName;?></h3>
                </div>
                <div>
                    <h1><?php echo $json->trainers->swimmer6->name;?></h1>
                    <span class="material-symbols-outlined" id="swimerType">
                        pool
                    </span>
                    <h6><?php echo $json->trainers->swimmer6->date;?></h6>
                </div>
            </div>
            <div class="timeAndDistance">
                <h5><?php echo $json->trainers->swimmer6->swimType;?></h5>
                <h2><?php echo $json->trainers->swimmer6->dustance;?>
                    <div class="vertical"></div>
                    <?php echo $json->trainers->swimmer6->duration;?>
                    <div class="vertical"></div>
                    <?php echo $json->trainers->swimmer6->pace;?>
                </h2>
                <div class="partName">
                    <h4>Distance</h4>
                    <h4>Duration</h4>
                    <h4>Pace</h4>
                </div>
                <div class="horizontal"></div>
                <div class="commentBtn"><button>
                        <i class="bi bi-chat-quote"></i>
                        <h5>Comment</h5>
                </div></button>
            </div>
        </section>
        <section class="swimmers">
            <div class="swimerDetails">
            <div>
                    <h3><?php echo $json->trainers->swimmer1->shortName;?></h3>
                </div>
                <div>
                    <h1><?php echo $json->trainers->swimmer1->name;?></h1>
                    <span class="material-symbols-outlined" id="swimerType">
                        pool
                    </span>
                    <h6><?php echo $json->trainers->swimmer1->date;?></h6>
                </div>
            </div>
            <div class="timeAndDistance">
                <h5><?php echo $json->trainers->swimmer1->swimType;?></h5>
                <h2><?php echo $json->trainers->swimmer1->dustance;?>
                    <div class="vertical"></div>
                    <?php echo $json->trainers->swimmer1->duration;?>
                    <div class="vertical"></div>
                    <?php echo $json->trainers->swimmer1->pace;?>
                </h2>
                <div class="partName">
                    <h4>Distance</h4>
                    <h4>Duration</h4>
                    <h4>Pace</h4>
                </div>
                <div class="horizontal"></div>
                <div class="commentBtn"><button>
                        <i class="bi bi-chat-quote"></i>
                        <h5>Comment</h5>
                </div></button>
            </div>
        </section>
        </div>
    </section>
    <section>
        <div class="addSwimmer">
            <form action="#" method="post" id="addSwimmer">
                <button id="closeFormBtn"><i class="bi bi-x-circle"></i></button>
                <h1 class="addTitle">Add Swimmer</h1>
                <label for="name">
                    <input  type="text" name="name" id="name">
                    <span>Name</span>
                </label>
                <label for="Date">
                    <input  type="text" name="bDate" id="bDate">
                    <span>B-Date</span>
                </label>
                <label for="Age">
                    <input  type="text" name="age" id="age">
                    <span>Age</span>
                </label>
                <label for="Email">
                    <input  type="email" name="email" id="email">
                    <span>E-Mail</span>
                </label>
                <label for="Phone">
                    <input  type="tel" name="phone" id="phone">
                    <span>Phone</span>
                </label>
                <label for="Address">
                    <input  type="text" name = "address" id="address">
                    <span>Address</span>
                </label>
                <label for="SwimmerType">
                    <input  type="text" name="swimmerType" id="swimmerType">
                    <span>Swimmer Type</span>
                </label>
                <label for="Add" id="saveBtn" >
                    <input type="submit" value="ADD" name="submit" id="submit">
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
    </section>

    
    <section class="swimmersPage">
            <?php
            if($_SESSION["user_type"] == "admin"){
       echo '<div id="swimmerList">';
        echo '<h1>Swimmer List</h1>';
            echo '<input type="text" placeholder="Search Swimmers.." id="searchSwimmer" onkeyup="search_swimmer()">';
            echo '<ul id="swimmerUl" class="swimmerPageUl">';

                    include "db.php";
                    // get all data from DB
                    $query  = "SELECT * FROM tbl_swimmerList_208";
                    $result = mysqli_query($connection, $query);

                    if (!$result) {
                        die("DB query failed.");
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo        '<li class="swimmerLi">';
                        echo        '<div class="swimmerDetails">';
                        echo        '<button class="editSwimmer"><a href="update.php?updateid=' . $row["user_id"] .'" class="text-light"><i class="bi bi-pencil-square" id="editSwimmer"></a></i></button>';
                        echo        '<button class="deleteSwimmer"><a href="delete.php?deleteid=' . $row["user_id"] .'" class="text-light"><i class="bi bi-trash3"></i></a></button>';
                        echo        '<a href="progress.php?userid=' . $row["user_id"] .'"><h5 name="fullName" class="swimmerName">' . $row["name"] . '</h5></a>';
                        echo        '<h6 name="age">Age: ' . $row["age"] . '</h6>';
                        echo        '<h6 name="status">Status: ' . $row["swimmerType"] . '</h6>';
                        echo        '</div>';
                        echo        '</li>';
                       
                    }
                   echo '</ul>';
            echo '<div class="buttons">';
                echo '<button type="button" id="edit" onclick="ShowHideAddEditButtons(this)"><i class="bi bi-pencil-square"></i> Edit</button>';
               echo  '<button type="button" class="openSwimerForm2" id="addPerson"><i class="bi bi-person-plus-fill"></i> Add Swimmer</button>';
            echo '</div>';
                }
                else{
                    $query = 'SELECT * FROM tbl_swimmerList_208 WHERE name="'.$_SESSION['name'].'"';
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    $name = $row['name'];
                    $bDate = $row['bDate'];
                    $age = $row['age'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $address = $row['address'];
                    $swimmerType = $row['swimmerType'];
                    $id = $row['user_id'];

                    echo        '<div class="swimmerDetailsUser">';
                    echo        '<h1 class=personalUserDetails>Personal Details</h1>';
                    echo        '<div class="personalUlLi">';
                    echo '<ul class="ulLeftUserInfo">';
                    echo    '<li>';
                        echo    'Name: ' .  $name . '';
                        echo'</li>';
                        echo'<li>';
                            echo'B-Date: ' . $bDate . '';
                        echo'</li>';
                        echo'<li>';
                           echo 'Age: ' . $age .'';
                           echo'</li>';
                           echo'<li>';
                           echo'E-Mail: ' . $email . '';
                           echo'</li>';
                           echo'</ul>';
                           echo'<ul class="ulRightUserInfo">';
                           echo'<li>';
                           echo'Phone: ' . $phone . '';
                           echo'</li>';
                           echo'<li>';
                           echo'Address: ' .$address . '';
                           echo'</li>';
                           echo'<li>';
                           echo'Level: ' . $swimmerType . '';
                           echo'</li>';
                           echo'<li>';
                           echo'ID: ' .$id . '';
                           echo'</li>';
                           echo'</ul>';
    
                           echo'</div>';
                           echo'<button class="userProgBtn"><a href="progress.php?userid=' . $row["user_id"] .'" class="userProgA">Show my progress</a></button>';
                           echo'</div>';
                    echo        '</div>';
                }


                    ?>

            <section id="weeksTraining">
                <div class="weekTraining">
                    <h1 class="weekTitle">This week's training</h1>
                    <div class="allDeatails">
                        <div class="swimerDetails">
                            <div>
                            <?php 
                    $json = file_get_contents("js/trainers.json");
                    $json = json_decode($json);
                    
                    ?>
                                <h3><?php echo $json->trainers->swimmer1->shortName ;?></h3>
                            </div>
                            <div>
                                <h1 class="swimmerName"><?php echo $json->trainers->swimmer1->name ;?></h1>
                                <span class="material-symbols-outlined" id="swimerType">
                                    pool
                                </span>
                                <h6><?php echo $json->trainers->swimmer1->date ;?></h6>
                            </div>
                        </div>
                        <div class="timeAndDistance">
                            <h5><?php echo $json->trainers->swimmer1->swimType ;?></h5>
                            <h2><?php echo $json->trainers->swimmer1->dustance ;?>
                                <div class="vertical"></div>
                                <?php echo $json->trainers->swimmer1->duration ;?>
                                <div class="vertical"></div>
                                <?php echo $json->trainers->swimmer1->pace ;?>
                            </h2>
                            <div class="partName">
                                <h4>Distance</h4>
                                <h4>Duration</h4>
                                <h4>Pace</h4>
                            </div>
                            <div class="horizontal"></div>
                            <div class="commentBtn"><button>
                                    <i class="bi bi-chat-quote"></i>
                                    <h5>Comment</h5>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <div class="commercial">
        <img src="images/SIS - New Icon.png"  alt="">
        <h1>Getting Started With SIS.com</h1>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
<?php
mysqli_close($connection);
?>