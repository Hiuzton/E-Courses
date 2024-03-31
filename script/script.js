const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
const plus = document.querySelector(".plus");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
});

document.querySelectorAll(".nav-link").forEach((n) =>
  n.addEventListener("click", () => {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
  })
);

document.querySelectorAll(".plus").forEach((plus) =>
  plus.addEventListener("click", () => {
    const quesAns = plus.parentNode.parentNode;
    const answer = quesAns.querySelector(".answer");
    plus.classList.toggle("active");
    answer.classList.toggle("active");
  })
);


