const fixturesTab = document.querySelector(".fixturesTab");
const resultsTab = document.querySelector(".resultsTab");

fixturesTab.addEventListener("click", () => {
  console.log("clicked");
  fixturesTab.classList.add("active");
  resultsTab.classList.remove("active");
});

resultsTab.addEventListener("click", () => {
  console.log("clicked");
  resultsTab.classList.add("active");
  fixturesTab.classList.remove("active");
});

// const tabs = document.querySelector(".tabs");

// tabs.addEventListener("click", (e) => {
//   if (e.target.classList.contains("tab")) {
//     if (!e.target.classList.contains("active")) {
//       //   e.target.classList.add("active");
//       //   console.log(e.target.nextElementSibling);
//       console.log(e);
//     } else {
//       e.target.classList.remove("active");
//     }
//   }
// });
