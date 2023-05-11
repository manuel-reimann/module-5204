<?php
include 'html/session.php';
include 'config/config.php';
include 'classes/dbh.class.php';

// Create a new database connection object
$db = new DatabaseConnection('localhost', 'root', 'root', 'a_chilli_db');
// Initialize the items array
$items = [];

// If a user is logged in, select all data from the chilli table and join the favourites table and mark them as isLiked to show already liked items
if (isset($_SESSION['userID'])) {
  $userID = $_SESSION['userID'];
  $sql = "SELECT c.*, IF(f.chilli_id IS NULL, 0, 1) as isLiked
  FROM chillis c
  LEFT JOIN favourites f ON c.ID = f.chilli_id AND f.user_id = $userID
  ";
}
//If a user is not logged in, just show all the items
else {
  $sql = "SELECT * FROM chillis";
}

// Prepare and execute the SQL statement
$stmt = $db->prepare($sql);
$stmt->execute();
// Fetch the results into the $items array
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Shuffle the items array randomly
shuffle($items);

?>

<!DOCTYPE html>
<html lang="en">
<!-- Header Start -->
<?php
include 'html/head.php';
?>
<!-- Header End -->

<body class="flex flex-col min-h-full ">
  <!-- Navigation Start -->
  <?php
  include 'html/navi.php'
  ?>
  <!-- Navigation End -->
  <!-- Main Content Start -->
  <section class="grow min-h-96 mt-[15vh]">
    <div class="flex flex-col items-center justify-center ">
      <a id="refresh" class="transition transform cursor-pointer select-none focus:outline-none focus:shadow-outline hover:scale-110">
        <h1 class="p-4 text-2xl text-black bg-white rounded text-bold w-max dark:bg-gray-900 dark:text-white ">Hit me to shuffle <br>
          <p class="text-sm text-center">or use the Search Field</p>
        </h1>
      </a>
      <div class="flex justify-center mt-4">
        <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
          <input type="search" name="search" id="search" onfocusout="focusLost()" class="peer block min-h-[auto] w-96 text-white dark:text-gray-900 rounded-full border-0 bg-gray-900  dark:bg-white py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none  [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="searchI" placeholder="Type query" />
          <label for="search" id="searchLabel" class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.65rem] peer-focus:scale-[0.9] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.3rem] peer-data-[te-input-state-active]:scale-[0.9] motion-reduce:transition-none dark:text-neutral-500 peer-focus:opacity-0 dark:peer-focus:text-neutral-400">e.g. Carolina Reaper</label>
        </div>
      </div>
    </div>

    <!-- Hidden Message Box to display if the user likes a chilli but is not logged in -->
    <div class="fixed inset-0 z-50 flex items-center justify-center hidden" id="messageBox">
      <div class="absolute inset-0 bg-gray-800 opacity-50"></div>
      <div class="relative z-10 w-full max-w-md p-8 bg-white rounded-lg dark:bg-gray-900">
        <div class="absolute top-0 right-0 p-4">
          <button type="button" class="text-black dark:text-white hover:text-orange-500" onclick="closeMessageBox()">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mb-4 text-3xl font-bold text-black dark:text-white">Please log in</div>
        <div class="mb-4 text-lg text-black dark:text-white">You must be logged in to perform this action.</div>
        <button type="button" class="text-white bg-orange-500 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-bg-orange-500 dark:hover:bg-orange-400 dark:focus:ring-orange-300" onclick="window.location.href='login.php'">Log in</button>
      </div>
    </div>
    <!-- Hidden Message Box end -->
  </section>


  <!-- Chilli Card Section Start -->
  <section id="chilli-cards" class="grid items-center justify-center gap-4 mx-4 my-8 mr-8 grid-flow-dense col-1 md:grid-cols-2 lg:grid-cols-5">
    <!-- Check first if items get loaded, display error message if not -->
    <?php if (count($items) > 0) { ?>
      <!-- Initialize for each loop -->
      <?php foreach ($items as $row) { ?>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow chillicard dark:bg-gray-900 dark:border-gray-700">
          <div class="relative block">
            <!-- Check if user is logged in -->
            <?php if (isset($_SESSION['userID'])) { ?>
              <!-- Like div to initialize the like action -->
              <div id="like-<?php echo $row['ID'] ?>" onclick="likeChilli(<?php echo $row['ID'] ?>, <?php echo $_SESSION['userID'] ?>)" class="absolute top-0 right-0 z-40 px-2 py-1 text-xl text-red-500 bg-white rounded cursor-pointer dark:bg-gray-900">
                <!-- Ternary Operators to show user the state of the liked card // for disclosure: ChatGPT helped me with this -->
                <i class='<?php echo $row["isLiked"] ? "hidden fa-regular" : "fa-regular" ?> fa-heart' id="emptyHeart"></i>
                <i class='<?php echo $row["isLiked"] ? "fa-solid" : "hidden fa-solid" ?> fa-heart' id="fullHeart"></i>
              </div>
            <?php } else { ?>
              <!-- If user is not logged in, show empty heart and a message to login first -->
              <div onclick="showLoginMessage()" class="absolute top-0 right-0 z-40 px-2 py-1 text-xl text-red-500 bg-gray-700 rounded cursor-pointer">
                <i class="fa-regular fa-heart"></i>
              </div>
            <?php } ?>
            <img class="object-cover w-full h-48 rounded-t-lg " alt="<?php echo $row['name'] ?>" src="<?php echo IMAGE_PATH . '/' . $row['path']; ?>" />
          </div>
          <div class="p-5 ">
            <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row['name'] ?></h1>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 description">
              <?php echo $row['description'] ?>
            </p>
            <div class="flex flex-row">
              <i class="pt-1 text-orange-500 fa-brands fa-hotjar"></i>
              <p class="pl-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $row['scoville_heat'] ?></p>
            </div>
            <div class="flex flex-row">
              <i class="pt-1 text-green-500 fa-solid fa-seedling"></i>
              <p class="pl-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $row['sow_date'] ?></p>
            </div>
            <div class="flex flex-row">
              <i class="pt-1 text-blue-500 fa-solid fa-earth-americas"></i>
              <p class="pl-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $row['origin'] ?></p>
            </div>
            <div class="flex flex-row">
              <i class="pt-1 text-red-500 fa-solid fa-gauge-high"></i>
              <p class="pl-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $row['cultivation_difficulty'] ?> Difficulty</p>
            </div>
          </div>
        </div>

      <?php } ?>
      <!-- If no items got loaded, show error message -->
    <?php } else {
      echo '<div class="flex justify-center text-center col-span-full my-36">
              <p class="text-2xl text-black "> Something went wrong. Please try again.<br><br><i class="px-4 text-4xl text-red-500 fa-solid fa-pepper-hot"></i></p>
           </div>';
    } ?>

  </section>
  <!-- Chilli Card Section End -->
  <!-- Main Content End -->
  <!-- Footer Start -->
  <?php
  include 'html/footer.php'
  ?>
  <!-- Footer End -->


  <script>
    // Hide search label -- for some reason this will not work if its in the js file, it needs to be here
    let search = document.getElementById("search");
    let searchLabel = document.getElementById("searchLabel");

    function focusLost() {
      searchLabel.classList.add("hidden");
    }
    search.onfocusout = focusLost;

    // Ajax function to initialize the like-handler.php file // For disclosure: ChatGPT helped me with the ajax functions
    let emptyHeart;
    let fullHeart;

    function likeChilli(chilliID, userID) {
      emptyHeart = document.querySelector(`#like-${chilliID} #emptyHeart`);
      fullHeart = document.querySelector(`#like-${chilliID} #fullHeart`);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          emptyHeart.classList.toggle("hidden");
          fullHeart.classList.toggle("hidden");
        }
      };
      xhttp.open("POST", "ajax/like-handler.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("chilliID=" + chilliID + "&userID=" + userID);
    }
  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

</body>

</html>