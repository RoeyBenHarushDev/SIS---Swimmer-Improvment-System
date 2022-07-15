let loginForm = document.querySelector(".loginSection");
let registerForm = document.querySelector(".registerSection");
let signUp = document.querySelector(".signUp");
let backToLogin = document.querySelector(".BackToLogin");
if (signUp) {
  signUp.addEventListener('click', () => {
    loginForm.style.display = "none";
    registerForm.style.display = "block";
  })
}
if (backToLogin) {
  backToLogin.addEventListener('click', () => {
    loginForm.style.display = "block";
    registerForm.style.display = "none";
  })
}

let userIcon = document.getElementById("userIconMobile");
let dropDown = document.querySelector(".dropdown-content");

if(userIcon){
  userIcon.addEventListener('click', ()=>{
    dropDown.style.display = 'block';
  })
}

let following = document.getElementById('following');
let swimmersPage = document.querySelector('.swimmersPage');
let followingPage = document.querySelector('#followingPage');

function ShowHideFollowingDiv(following) {
  if (followingPage.style.display == "block") {
    followingPage.style.display = "none";
    swimmersPage.style.display = "block";
  } else {
    followingPage.style.display = "block";
    swimmersPage.style.display = "none";
  }
  following.classList.toggle('active');
}


let addSwimmer = document.querySelector(".addSwimmer");
let openSwimerForm = document.querySelector(".openSwimerForm");
if (openSwimerForm) {
  openSwimerForm.addEventListener('click', () => {
    addSwimmer.style.display = 'block';
    console.log("add cloickes");
  })
}
if (addSwimmer) {
  closeFormBtn.addEventListener('click', () => {
    addSwimmer.style.display = 'none';
  })
}


let settings = document.querySelector('.settings');

if (settings) {
  openSettings.addEventListener('click', () => {
    settings.style.display = 'block';
  })
}
if (settings) {
  exitSetting.addEventListener('click', () => {
    settings.style.display = 'none';
  })
}
let notification = document.querySelector('.notification');

if (notification) {
  openNotification.addEventListener('click', () => {
    notification.style.display = 'block';
  })
}
if (notification) {
  exitNotification.addEventListener('click', () => {
    notification.style.display = 'none';
  })
}



let workoutLike = document.querySelector('.bi-suit-heart-fill');

if (workoutLike) {
  likedWorkout.addEventListener('click', () => {
    if (workoutLike.style.color != 'red') {
      workoutLike.style.color = 'red';
    } else {
      workoutLike.style.color = 'gray';
    }
  })
}


let addSwim = document.querySelector('.addSwim');
let openAddSwim = document.getElementById('openAddSwim');
let closeAddSwim = document.getElementById('closeAddSwim');

if (openAddSwim) {
  openAddSwim.addEventListener('click', () => {
    addSwim.style.display = 'block';
  })
}
if (closeAddSwim) {
  closeAddSwim.addEventListener('click', () => {
    addSwim.style.display = 'none';
  })
}

let logASwim = document.getElementById('logASwim');
if (logASwim) {
  logASwim.addEventListener('click', () => {
    addSwim.style.display = 'block';
  })
}


let openSwimerForm2 = document.querySelector(".openSwimerForm2");
if (openSwimerForm2) {
  openSwimerForm2.addEventListener('click', () => {
    addSwimmer.style.display = 'block';
  })
}
if (addSwimmer) {
  closeFormBtn.addEventListener('click', () => {
    addSwimmer.style.display = 'none';
  })
}


let openButtons = document.getElementById("edit");
let showEdit = document.getElementsByClassName("editSwimmer");
let showDelete = document.getElementsByClassName("deleteSwimmer");
let swimmerDetails = document.getElementsByClassName("swimmerDetails");

function ShowHideAddEditButtons(openButtons) {
  for (let i = 0; i < swimmerDetails.length; i++) {
    if (showEdit[i].style.display == "inline-block" && showDelete[i].style.display == "inline-block") {
      showEdit[i].style.display = "none";
      showDelete[i].style.display = "none";
    } else {
      showEdit[i].style.display = "inline-block";
      showDelete[i].style.display = "inline-block";
    }
  }
}

// fill the goals circle in progress page
let fillCircle = document.querySelector('.circle-chart__circle');
if (fillCircle)
  fillCircle.style.transform = 'rotate(-90deg)';
// end of circle bar


// change xValue to date with SQL
const dateObj = new Date("5-21-2021");
const monthNameShort = dateObj.toLocaleString("en-US", { month: "short" });

let days =new Date();


var xValues = [days.getDate()-8 + '\n' + monthNameShort, days.getDate()-6 + monthNameShort, days.getDate()-3 + monthNameShort, days.getDate()-2 + monthNameShort, days.getDate()-1 +'\n' + monthNameShort];
var yValues = [1000, 1500, 1900, 500, 536];
var barColors = ["#0a7488","#0a3388","#23e2f1","#00acc1","#0e5459"];
var myChart = document.getElementById('myChart');

if (myChart) {
  new Chart("myChart", {
    type: "bar",
    data: {
      labels: xValues,
      borderRadius: 20,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {
        display: false
      },
    },
  });
}

function search_swimmer() {
  let input = document.getElementById('searchSwimmer').value
  input=input.toLowerCase();
  let x = document.getElementsByClassName('swimmerName');
  let y = document.getElementsByClassName('swimmerLi');
    
  for (i = 0; i < x.length; i++) { 
      if (!x[i].innerHTML.toLowerCase().startsWith(input)) {
          y[i].style.display="none";
      }
      else {
          y[i].style.display="list-item";                 
      }
  }
}



fetch("js/carousel.json")
    .then((response) => response.json())
    .then((data) => showData(data));