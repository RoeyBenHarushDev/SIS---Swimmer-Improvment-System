<?php
session_start();

if(!isset($_SESSION["user_id"])){
    header('Location: '. URL . 'progress.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="shortcut icon" href="#" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="Fonts-6/css/all.css">
    <title>Progress</title>
</head>

<body>
    <header>
        <div class="topHeader">
            <div class="leftIcons">
                <button class="combineIBtn" id="openAddSwim"><i class="fa-solid fa-plus" id="swimPlusBtn">
                        <i class="fa-solid fa-person-swimming" id="perSwim"></i></i>
                </button>
            </div>
            <h1>Progress</h1>
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
        <a href="main.php">
            <span class="material-symbols-outlined">
                list_alt
            </span>Feed</a>
        <a href="progress.php" class="active">
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
            <a href="#"><i class="mdi mdi-logout"></i>Logout</a>
        </div>
    </div>
    <div class="settings">
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
    <div class="addSwim" id="addSwimPop">
        <form action="#" method="get" id="addSwimmer">
            <button id="closeAddSwim"><i class="bi bi-x-circle"></i></i></button>
            <h1>Log Activity</h1>
            <label for="Title">
                <input type="text">
                <span>Title</span>
            </label>
            <label for="Course">
                <h4 id="course">Course</h4>
                <select name="Distance" id="Distance">
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="75">75</option>
                    <option value="100">100</option>
                    <option value="125">125</option>
                    <option value="150">150</option>
                </select>
                <select name="Course" id="Course">
                    <option value="Yards">Yards</option>
                    <option value="Meters">Meters</option>
                </select>
            </label>
            <br>
            <label for="swimType">
                <select name="swimType" id="swimType">
                    <option value="Buttefly">Buttefly</option>
                    <option value="Backstroke">Backstroke</option>
                    <option value="Breaststroke">Breaststroke</option>
                    <option value="Freestyle">Freestyle</option>
                    <option value="Drill">Drill</option>
                    <option value="Kick">Kick</option>
                </select>
            </label>
            <label for="Date">
                <input type="date">
                <span>Date</span>
            </label>
            <label for="Duration">
                <input type="time" id="settime" placeholder="Select">
                <span>Duration</span>
            </label>
            <label for="Description">
                <input type="text">
                <span>Description</span>
            </label>
            <button id="saveBtn" type="submit">SAVE</button>
        </form>
    </div>
    <main>
    <?php
        include 'db.php';
        $id = $_GET['userid'];
        if($id == ''){
            // echo "<script>console.log(". $id . " + '10');</script>";

            $sql = "SELECT * FROM tbl_swimmerList_208";
        }else{
            $sql = "SELECT * FROM tbl_swimmerList_208 WHERE user_id = $id";
        }
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $bDate = $row['bDate'];
        $age = $row['age'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
        $swimmerType = $row['swimmerType'];
    ?>
        
    <section class="idIsBad" style= "<?php echo ($id == '')?'display:block':'display:none'; ?>" >
        <div class="notUserChoosen">
            <h1>No swimmer selected!</h1>
        </div>
    </section>
    <section class="idIsGood" style= "<?php echo ($id == '')?'display:none':'display:block'; ?>" >

        <div class="swimmerDetailsContainer">
            <h1><?php echo $name ?></h1>
            <div class="swimmerInformation">
                <h3>Personal Information</h3>
                <ul class="leftInfo">
                    <li>
                        Name: <?php echo $name ?>
                    </li>
                    <li>
                        B-Date: <?php echo $bDate ?>
                    </li>
                    <li>
                        Age: <?php echo $age ?>
                    </li>
                    <li>
                        E-Mail: <?php echo $email ?>
                    </li>
                </ul>
                <ul class="rightInfo">
                    <li>
                        Phone: <?php echo $phone ?>
                    </li>
                    <li>
                        Address: <?php echo $address ?>
                    </li>
                    <li>
                        Level: <?php echo $swimmerType ?>
                    </li>
                    <li>
                         ID: <?php echo $id ?>
                    </li>
                </ul>

            </div>

        </div>
        <section class="circle-chart">
            <div class="circleTitle">
                <h2>Goals</h2>
            </div>
            <div class="circleAllContainer">
                <div class="circleContainer">
                    <svg viewbox="0 0 35.83098862 35.83098862" width="100" height="100"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle class="circle-chart__background" stroke="rgba(112, 112, 112, 0.1)" stroke-width="4"
                            fill="none" cx="17.91549431" cy="17.91549431" r="15.91549431" />
                        <circle class="circle-chart__circle" stroke="#00acc1" stroke-width="4" stroke-dasharray="50,100"
                            stroke-linecap="none" fill="none" cx="17.91549431" cy="17.91549431" r="15.91549431" />
                        <g class="circle-chart__info">
                            <text class="circle-chart__percent" x="19.5" y="20.5" alignment-baseline="central"
                                text-anchor="middle" font-size="8">50%</text>
                        </g>
                    </svg>
                    <h5><br>Weekly</h5>
                    <h6>0m/1,000m</h6>
                </div>
            </div>
        </section>

        </div>
        <section class="swimInfoContainer">
        <div class="swimInformation">
            <h2>Swim Information</h2>
            <div class="updatingDetails">
            <ul>
                <li>Last Training: 13/07/2022</li>
                <li>Last training duration: 45:57:36</li>
                <li>Amount of training in week: 5</li>
                <li>Next Training: 16/07/2022</li>
            </ul>
        </div>
        </div>
        </section>

        <section class="bar-chart">
            <h2>Personal Records</h2>
            <canvas id="myChart"></canvas>
        </section>
        <div class="air"></div>


    </main>
    <div class="commercial">
        <img src="images/SIS - New Icon.png" alt="">
        <h1>Getting Started With SIS.com</h1>
    </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>