<?php
include 'html/session.php';
include 'config/config.php';
include 'classes/dbh.class.php';

// Create a new database connection object
$db = new DatabaseConnection('localhost', 'root', 'root', 'a_chilli_db');
// Initialize the items array
$items = [];

// If user session is active, select all data from chilli which have the criteria isLiked from joined table favourites
if (isset($_SESSION['userID'])) {
  $userID = $_SESSION['userID'];
  $sql = "SELECT c.*, IF(f.chilli_id IS NULL, 0, 1) as isLiked
  FROM chillis c
  INNER JOIN favourites f ON f.chilli_id = c.ID
  WHERE f.user_id = $userID";
}
//If a user is not logged in, we still need a query here that would show all the data because otherwise we get an error
else {
  $sql = "SELECT * FROM chillis";
}

// Prepare and execute the SQL statement
$stmt = $db->prepare($sql);
$stmt->execute();
// Fetch the results into the $items array
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'html/head.php'
?>

<body>
  <!-- Navigation Start -->
  <?php
  include 'html/navi.php'
  ?>
  <!-- Navigation End -->
  <!-- Main Content Start -->

  <!-- Check if the User is logged in -->
  <?php if (isset($_SESSION['userID'])) { ?>
    <section class="min-h-96 my-[10vh] flex justify-center">
      <div class="flex flex-col items-center">
        <h1 class="text-4xl font-bold text-center text-black ">Saved Bookmarks</h1>
      </div>
    </section>
    <!-- Chilli Card Section Start -->
    <section id="chilli-cards" class="grid items-center justify-center gap-4 mx-4 my-8 mr-8 grid-flow-dense col-1 md:grid-cols-2 lg:grid-cols-5">

      <!-- Check first if items get loaded, display error message if not -->
      <?php if (count($items) > 0) { ?>
        <!-- Initialize for each loop -->
        <?php foreach ($items as $row) { ?>

          <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow likedcard dark:bg-gray-900 dark:border-gray-700" data-id="<?php echo $row['ID'] ?>">
            <div class="relative block">
              <!-- Like div to initialize the dislike action -->
              <div id="like-<?php echo $row['ID'] ?>" onclick="likeChilli(<?php echo $row['ID'] ?>, <?php echo $_SESSION['userID'] ?>)" class="absolute top-0 right-0 z-40 px-2 py-1 text-xl text-red-500 bg-white rounded cursor-pointer dark:bg-gray-900">
                <!-- Ternary Operators to show user the state of the liked card -->
                <i class='<?php echo $row["isLiked"] ? "hidden fa-regular" : "fa-regular" ?> fa-heart' id="emptyHeart"></i>
                <i class='<?php echo $row["isLiked"] ? "fa-solid" : "hidden fa-solid" ?> fa-heart' id="fullHeart"></i>
              </div>
              <img class="object-cover w-full h-48 rounded-t-lg " alt="<?php echo $row['name'] ?>" src="<?php echo IMAGE_PATH . '/' . $row['path']; ?>" />
            </div>
            <div class="p-5 ">
              <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row['name'] ?></h1>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 desc">
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
        <!-- If no chilli is liked yet show this message -->
      <?php } else {
        echo '<div class="flex justify-center text-center col-span-full my-36">
                     <p class="text-2xl text-black "> No Bookmarks saved so far. Please visit the main page.<br><br><i class="px-4 text-4xl text-red-500 fa-solid fa-pepper-hot"></i></p>
                     </div>';
      } ?>
      <!-- If user accesses page before login show this message -->

    </section>
  <?php } else {
    echo '
      <div class="flex items-center justify-center w-full my-64 flex-column ">
                         <div class="flex justify-center p-8 text-center bg-white dark:bg-gray-900 col-span-full rounded-xl">
                            <p class="text-2xl text-black dark:text-white "> Not logged in. Please login to save chillicards as bookmarks<br><br> 
                                <a href="login.php">
                                    <button type="button" class="text-white bg-orange-500 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-bg-orange-500 dark:hover:bg-orange-400 dark:focus:ring-orange-300" >Log in</button>
                                </a>
                            </p>
                         </div>
                       </div>
      
      ';
  } ?>
  <!-- Main Content End -->
  <!-- Footer Start -->
  <?php
  include 'html/footer.php'
  ?>
  <!-- Footer End -->

  <script>
    // Ajax function to initialize the like-handler.php file // For disclosure: ChatGPT helped me with the Ajax functions
    let emptyHeart;
    let fullHeart;

    function likeChilli(chilliID, userID) {
      emptyHeart = document.querySelector(`#like-${chilliID} #emptyHeart`);
      fullHeart = document.querySelector(`#like-${chilliID} #fullHeart`);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          if (this.responseText == "removed") {
            const likedCard = document.querySelector(`.likedcard[data-id="${chilliID}"]`);
            likedCard.remove();
          } else {
            emptyHeart.classList.toggle("hidden");
            fullHeart.classList.toggle("hidden");
          }
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