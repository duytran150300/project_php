const signUpBtnLink = document.querySelector(".SignUpBtn-link");
const signInBtnLink = document.querySelector(".SignInBtn-link");
const wrapper = document.querySelector(".wrapper");

signUpBtnLink.addEventListener("click", () => {
  wrapper.classList.toggle("active");
});

signInBtnLink.addEventListener("click", () => {
  wrapper.classList.toggle("active");
});
const input = document.getElementById("input");

input.addEventListener("input", function () {
  if (this.value !== "") {
    this.classList.add("not-empty");
  } else {
    this.classList.remove("not-empty");
  }
});
