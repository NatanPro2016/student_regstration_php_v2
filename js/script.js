const delete_forms = document.querySelectorAll("#confirm_form");

delete_forms.forEach((delete_form) => {
  delete_form.addEventListener("submit", (e) => {
    if (confirm("Are you sure to do this task") == false) {
      e.preventDefault();
    }
  });
});
const nav_link = document.querySelectorAll("#nav-link");
const path = window.location.pathname;
const page = path.split("/").pop();

nav_link.forEach((nav) => {
  if (page === "admin_dashboard.php") {
    nav_link[0].classList.add("active");
  } else if (page === "admin_departments.php") {
    nav_link[1].classList.add("active");
  } else if (page === "admin_register_student.php") {
    nav_link[2].classList.add("active");
  } else if (page === "admin_add_admin.php") {
    nav_link[3].classList.add("active");
  } else {
    nav.classList.remove("active");
  }
});

const next = document.getElementById("next");

const nav = document.getElementById("side-nav");
const toggle = document.getElementById("bars");
toggle.addEventListener("click", () => {
  nav.classList.toggle("full-nav");
});
console.log(toggle);
