<?php
session_start();

if(!isset($_SESSION["user_id"])){
    header('Location: '. URL . 'workouts.php');
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
    <link rel="stylesheet" href="Fonts-6/css/all.css">
    <title>Workout</title>
</head>

<body>
    <header>
        <div class="topHeader">
            <div class="leftIcons">
                <button class="combineIBtn" id="openAddSwim"><i class="fa-solid fa-plus" id="swimPlusBtn">
                    <i class="fa-solid fa-person-swimming" id="perSwim"></i></i>
                </button>
            </div>
            <h1>Workouts</h1>
            <div class="rightIcons">
                <button><i class="bi bi-search"></i></button>
                <button id="openNotification"><i class="bi bi-bell-fill"></i></button>
            </div>
        </div>
    </header>
    <div class="navbar">
        <img src="images/SIS - New Icon.png" alt="">
        <a href="main.php">
            <span class="material-symbols-outlined">
                list_alt
            </span>Feed</a>
        <a href="progress.php">
            <span class="material-symbols-outlined">
                insights
            </span>Progress</a>
        <a href="workouts.php" class="active">
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
        <form action="#" method="get" id="addSwim">
            <button id="closeAddSwim"><i class="bi bi-x-circle"></i></i></button>
            <h1>New Workout</h1>
            <label for="Title">
                <input type="text">
                <span>Title</span>
            </label>
            <label for="Course">
                <span>Course</span>
                <input type="number" maxlength="150" minlength="0">
                <select name="Course" id="Course">
                    <option value="Yards">Yards</option>
                    <option value="Meters">Meters</option>
                </select>
            </label>
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
            <label for="Description">
                <input type="text">
                <span>Description</span>
            </label>
            <label for="Date">
                <input type="date">
                <span>Date</span>
            </label>
            <button id="saveBtn" type="submit">SAVE</button>
        </form>
    </div>
    <div class="workoutOfTheWeek">
        <h2>Workout of the Week</h2>
        <div class="workoutAdvertising">
            <img src="images/SIS - New Icon.png" alt="">
            <h4>Working on Fly!</h4>
            <h6>SIS.com Team</h6>
            <h5>2,200y <span>&#183;</span> 50 min <span>&#183;</span> Advanced</h5>
            <p>This week we are going to continue with some speed work but also work on our Fly. That's right, Fly!</p>
            <h3>
                <span class="material-symbols-outlined" id="swimAd">
                    pool
                </span> <span class="dotAd"></span>1,250y<span class="dotAd1"></span>600y KK<span
                    class="dotAd2"></span>350y S</h3>
            <div class="adLine"></div>
            <div class="adLove"><i class="bi bi-suit-heart-fill" id="likedWorkout"></i> Favorited by 395 Swimmers</div>
        </div>
    </div>
    <div class="browseByCategory">
        <h2>Browse by Category</h2>
        <div class="swimType">
            <div class="container-grid">
                <div class="breast">
                    <img src="images/96233073_865496890613372_8681221068154732544_n.jpg" alt="">
                    <button>
                        <div class="text-block">
                            <h4>Breast</h4>
                            <h6>37 Workouts</h6>
                            <p>Work on your least-swum stroke</p>
                        </div>
                    </button>
                </div>
                <div class="backstroke">
                    <img src="images/brian-matangelo--BUPaAMSOdE-unsplash.jpg" alt="">
                    <button>
                        <div class="text-block">
                            <h4>backstroke</h4>
                            <h6>75 Workouts</h6>
                            <p>Work on your least-swum stroke</p>
                        </div>
                    </button>
                </div>
                <div class="butterfly">
                    <img src="images/gentrit-sylejmani-JjUyjE-oEbM-unsplash.jpg" alt="">
                    <button>
                        <div class="text-block">
                            <h4>Butterfly</h4>
                            <h6>47 Workouts</h6>
                            <p>Work on your least-swum stroke</p>
                        </div>
                    </button>
                </div>
                <div class="freestyle">
                    <img src="images/iStock-620959526.jpg" alt="">
                    <button>
                        <div class="text-block">
                            <h4>Freestyle</h4>
                            <h6>657 Workouts</h6>
                            <p>Work on your least-swum stroke</p>
                        </div>
                    </button>
                </div>
                <div class="kick">
                    <img src="images/pete-wright-yllhGtvj2AE-unsplash.jpg" alt="">
                    <button>
                        <div class="text-block">
                            <h4>Kick</h4>
                            <h6>465 Workouts</h6>
                            <p>Work on your least-swum stroke</p>
                        </div>
                    </button>
                </div>
                <div class="im">
                    <img src="images/pizatas3oAgsaKAgYDNBWj-320-80.jpg" alt="">
                    <button>
                        <div class="text-block">
                            <h4>IM</h4>
                            <h6>147 Workouts</h6>
                            <p>Work on your least-swum stroke</p>
                        </div>
                    </button>
                </div>
                <div class="distance">
                    <img src="images/richard-r-schunemann-2iF_d7INgEg-unsplash.jpg" alt="">
                    <button>
                        <div class="text-block">
                            <h4>Distance</h4>
                            <h6>56 Workouts</h6>
                            <p>Work on your least-swum stroke</p>
                        </div>
                    </button>
                </div>
                <div class="quick-swim">
                    <img src="images/luke-chesser-rCOWMC8qf8A-unsplash.jpg" alt="">
                    <button>
                        <div class="text-block">
                            <h4>Quick swim</h4>
                            <h6>11 Workouts</h6>
                            <p>Work on your least-swum stroke</p>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>