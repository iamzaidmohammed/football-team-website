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
