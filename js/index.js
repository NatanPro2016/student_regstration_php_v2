const rotate = document.querySelector(".rotate");
const next = document.getElementById("next");
const prv = document.getElementById("prv");
const imgs = document.querySelectorAll(".imgs");
const scroll_ = document.getElementById("scroll");

let value = -90;
let now = 90;
let active = 0;

imgs.forEach((img, index) => {
  if (active == index) {
    img.classList.add("active");
  }
  img.style.rotate = now + "deg";
});

next.addEventListener("click", () => {
  value -= 90;
  now += 90;
  if (active >= 3) {
    active = -1;
  }
  active++;
  if (window.innerWidth > 999) {
    scroll_.style.transform = `translateX(-${active * 50}rem)`;
  } else {
    scroll_.style.transform = `translateX(-${active * 80}vw)`;
  }
  rotate.style.rotate = value + "deg";
  imgs.forEach((img, index) => {
    if (active == index) {
      img.classList.add("active");
    } else {
      img.classList.remove("active");
    }
    img.style.rotate = now + "deg";
  });
});
prv.addEventListener("click", () => {
  value += 90;
  now -= 90;
  if (active <= 0) {
    active = 4;
  }
  active--;
  if (window.innerWidth > 999) {
    scroll_.style.transform = `translateX(-${active * 50}rem)`;
  } else {
    scroll_.style.transform = `translateX(-${active * 80}vw)`;
  }
  rotate.style.rotate = value + "deg";
  imgs.forEach((img, index) => {
    if (active == index) {
      img.classList.add("active");
    } else {
      img.classList.remove("active");
    }
    img.style.rotate = now + "deg";
  });
});

//nav bar

const home_nav = document.getElementById("home-nav");
const about_nav = document.getElementById("about-nav");
const find_nav = document.getElementById("find-nav");

const home = document.getElementById("home");
const about = document.getElementById("about");
const find = document.getElementById("find");
window.addEventListener("scroll", () => {
  if (home.getBoundingClientRect().top >= -799) {
    home_nav.classList.add("active");
  } else {
    home_nav.classList.remove("active");
  }
  if (
    about.getBoundingClientRect().top >= -801 &&
    about.getBoundingClientRect().top <= 100
  ) {
    about_nav.classList.add("active");
  } else {
    about_nav.classList.remove("active");
  }

  if (
    find.getBoundingClientRect().top <= 432 &&
    find.getBoundingClientRect().top >= 90
  ) {
    find_nav.classList.add("active");
  } else {
    find_nav.classList.remove("active");
  }
});
