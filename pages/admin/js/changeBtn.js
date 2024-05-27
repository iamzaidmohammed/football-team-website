const editUsernameBtn = document.querySelector(".username > .btn");
const editPasswordBtn = document.querySelector(".password > .btn");
const closeBtn = document.querySelectorAll(".fa-xmark");
const changeUsernameForm = document.querySelector(".change-username");
const changePasswordForm = document.querySelector(".change-password");

editUsernameBtn.addEventListener("click", () => {
  changeUsernameForm.style.display = "initial";
});

editPasswordBtn.addEventListener("click", () => {
  changePasswordForm.style.display = "initial";
});

closeBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    changeUsernameForm.style.display = "none";
    changePasswordForm.style.display = "none";
  });
});
