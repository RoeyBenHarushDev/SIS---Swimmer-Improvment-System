<?php
session_start();

if(!isset($_SESSION["user_id"])){
    header('Location: '. URL . 'challenges.php');
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
    <link rel="stylesheet" href="css/style.css">
    <title>Challenges</title>
</head>

<body>
    <header>
        <div class="challengesHeader">
            <h1><b>Challenges</b></h1>
            <div class="rightIconsCha">
                <button><i class="bi bi-search"></i></button>
            </div>
        </div>
        <div class="navbar">
            <img src="images/SIS - New Icon.png" alt="">
            <a href="main.php">
                <span class="material-symbols-outlined">
                    list_alt
                </span>Feed</a>
            <a href="progress.php" >
                <span class="material-symbols-outlined">
                    insights
                </span>Progress</a>
            <a href="workouts.php">
                <span class="material-symbols-outlined">
                    pool
                </span>Workouts</a>
            <a href="challenges.php" class="active">
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
        <div class="searchChallenges">
            <input id="searchbar" onkeyup="search_Challenges()" type="text"
            name="search" placeholder=" Search Challenges..">
        </div>
        <section class="suggestions">
            <h4>All Challenges</h4>
            <div class="container-grid">
            <div class="challanges">
                <div class="challangeImg"></div>
                <div class="challangeDetails">
                    <div class="challangeDate">Jul 01-<br>Jul 31</div>
                    <div class="challaneTime">
                        <h3><b>20 hours - Open Water Challange</b></h3>
                        <h5>120 swimmers joined</h5>
                    </div>
                </div>
                <p>Complete at least 20 hours swimming multiple activities</p>
                <button>Join</button>
            </div>
            <div class="challanges">
                <div class="challangeImg"></div>
                <div class="challangeDetails">
                    <div class="challangeDate">Jul 01-<br>Jul 31</div>
                    <div class="challaneTime">
                        <h3><b>20 hours - Open Water Challange</b></h3>
                        <h5>120 swimmers joined</h5>
                    </div>
                </div>
                <p>Complete at least 20 hours swimming multiple activities</p>
                <button>Join</button>
            </div>
            <div class="challanges">
                <div class="challangeImg"></div>
                <div class="challangeDetails">
                    <div class="challangeDate">Jul 01-<br>Jul 31</div>
                    <div class="challaneTime">
                        <h3><b>20 hours - Open Water Challange</b></h3>
                        <h5>120 swimmers joined</h5>
                    </div>
                </div>
                <p>Complete at least 20 hours swimming multiple activities</p>
                <button>Join</button>
            </div>
            <div class="challanges">
                <div class="challangeImg"></div>
                <div class="challangeDetails">
                    <div class="challangeDate">Jul 01-<br>Jul 31</div>
                    <div class="challaneTime">
                        <h3><b>20 hours - Open Water Challange</b></h3>
                        <h5>120 swimmers joined</h5>
                    </div>
                </div>
                <p>Complete at least 20 hours swimming multiple activities</p>
                <button>Join</button>
            </div>
            <div class="challanges">
                <div class="challangeImg"></div>
                <div class="challangeDetails">
                    <div class="challangeDate">Jul 01-<br>Jul 31</div>
                    <div class="challaneTime">
                        <h3><b>20 hours - Open Water Challange</b></h3>
                        <h5>120 swimmers joined</h5>
                    </div>
                </div>
                <p>Complete at least 20 hours swimming multiple activities</p>
                <button>Join</button>
            </div>
            <div class="challanges">
                <div class="challangeImg"></div>
                <div class="challangeDetails">
                    <div class="challangeDate">Jul 01-<br>Jul 31</div>
                    <div class="challaneTime">
                        <h3><b>20 hours - Open Water Challange</b></h3>
                        <h5>120 swimmers joined</h5>
                    </div>
                </div>
                <p>Complete at least 20 hours swimming multiple activities</p>
                <button>Join</button>
            </div>
            <div class="challanges">
                <div class="challangeImg"></div>
                <div class="challangeDetails">
                    <div class="challangeDate">Jul 01-<br>Jul 31</div>
                    <div class="challaneTime">
                        <h3><b>20 hours - Open Water Challange</b></h3>
                        <h5>120 swimmers joined</h5>
                    </div>
                </div>
                <p>Complete at least 20 hours swimming multiple activities</p>
                <button>Join</button>
            </div>
            <div class="challanges">
                <div class="challangeImg"></div>
                <div class="challangeDetails">
                    <div class="challangeDate">Jul 01-<br>Jul 31</div>
                    <div class="challaneTime">
                        <h3><b>20 hours - Open Water Challange</b></h3>
                        <h5>120 swimmers joined</h5>
                    </div>
                </div>
                <p>Complete at least 20 hours swimming multiple activities</p>
                <button>Join</button>
            </div>
            </div>
        </section>

    <script src="js/script.js"></script>
</body>

</html>