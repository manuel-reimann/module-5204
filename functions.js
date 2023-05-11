//------------------Darkmode / Lightmode ------------------------------------------
// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (
  localStorage.getItem("color-theme") === "dark" ||
  (!("color-theme" in localStorage) &&
    window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
  document.documentElement.classList.add("dark");
} else {
  document.documentElement.classList.remove("dark");
}

var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

// Change the icons inside the button based on previous settings
if (
  localStorage.getItem("color-theme") === "dark" ||
  (!("color-theme" in localStorage) &&
    window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
  themeToggleLightIcon.classList.remove("hidden");
} else {
  themeToggleDarkIcon.classList.remove("hidden");
}

var themeToggleBtn = document.getElementById("theme-toggle");

themeToggleBtn.addEventListener("click", function () {
  // toggle icons inside button
  themeToggleDarkIcon.classList.toggle("hidden");
  themeToggleLightIcon.classList.toggle("hidden");

  // if set via local storage previously
  if (localStorage.getItem("color-theme")) {
    if (localStorage.getItem("color-theme") === "light") {
      document.documentElement.classList.add("dark");
      localStorage.setItem("color-theme", "dark");
    } else {
      document.documentElement.classList.remove("dark");
      localStorage.setItem("color-theme", "light");
    }

    // if NOT set via local storage previously
  } else {
    if (document.documentElement.classList.contains("dark")) {
      document.documentElement.classList.remove("dark");
      localStorage.setItem("color-theme", "light");
    } else {
      document.documentElement.classList.add("dark");
      localStorage.setItem("color-theme", "dark");
    }
  }
});
//----------------------Chilli search filter--------------------------
//hide cards greater than the first 5
const chilliCards = document.querySelectorAll(".chillicard");
for (let i = 5; i < chilliCards.length; i++) {
  chilliCards[i].classList.add("hidden");
}

//Search input filter
const chilliItems = document.querySelectorAll(".chillicard");

search.addEventListener("input", function () {
  const searchQuery = this.value.trim().toLowerCase();

  chilliItems.forEach((item, index) => {
    if (index >= 5) {
      item.classList.add("hidden");
    }
    const itemName = item.querySelector("h5").textContent.toLowerCase();
    if (itemName.includes(searchQuery)) {
      item.classList.remove("hidden");
    } else {
      item.classList.add("hidden");
    }
  });
});

//----------------------Chilli search filter---------------------

const link = document.getElementById("refresh");
link.addEventListener("click", (event) => {
  event.preventDefault();
  showRandomItems();
  document.getElementById("search").value = "";
});

function showRandomItems() {
  const listItems = Array.from(document.querySelectorAll(".chillicard"));
  shuffleArray(listItems);

  // Hide all items
  listItems.forEach((item) => {
    item.classList.add("hidden");
  });

  // Show the first 5 items
  for (let i = 0; i < 5; i++) {
    if (listItems[i]) {
      listItems[i].classList.remove("hidden");
    }
  }
}

function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
  return array;
}
//----------------------Expand Text ---------------------
const descriptions = document.querySelectorAll(".chillicard .description");

descriptions.forEach((description) => {
  const text = description.textContent.trim();
  if (text.length > 50) {
    const readMoreButton = document.createElement("button");
    readMoreButton.textContent = "Read More";
    readMoreButton.classList.add(
      "text-red-500",
      "transition",
      "duration-300",
      "ease-in-out",
      "hover:text-red-700"
    );

    const hiddenSpan = document.createElement("span");
    hiddenSpan.classList.add("hidden");
    hiddenSpan.textContent = text;

    readMoreButton.addEventListener("click", () => {
      description.textContent = hiddenSpan.textContent;
    });

    description.textContent = text.substring(0, 50) + "...";
    description.appendChild(readMoreButton);
    description.appendChild(hiddenSpan);
  }
});

//----------------------Register Form ---------------------
// Prevents sending the form if not everything is validated yet
document.getElementById("regform").addEventListener("submit", function (event) {
  if (validationState == 0) {
    event.preventDefault();
  }
});

//----------------------- Message Box Like Heart -------------
// Toggler for login message if like button is clicked
function closeMessageBox() {
  document.getElementById("messageBox").classList.toggle("hidden");
}

function showLoginMessage() {
  document.getElementById("messageBox").classList.toggle("hidden");
}

//--------------------- Message Box Registration Empty Inputs -----------
//if the message box is being closed, this function emptys all the inputs
function closeRegisterBox(clearForm = false) {
  document.getElementById("registBox").classList.toggle("hidden");
  if (clearForm) {
    // Get the form element
    const form = document.getElementById("regform");
    // Get all the input fields within the form
    const inputs = form.querySelectorAll("input");
    // Loop through the input fields and set their values to empty
    inputs.forEach((input) => {
      input.value = "";
    });
  }
}
