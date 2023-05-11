<?php
include 'html/session.php';
include 'config/config.php';
include 'classes/dbh.class.php';
include 'classes/validate.class.php';
//instanciate DB Conneciton
$myInstance = new DatabaseConnection($host, $user, $dbpwd, $dbName);
//if form is submitted, initiate checkUser Method
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['pwd'];
  $feedback = $myInstance->checkUser($username, $password);
} else {
  //if site is loaded, empty inputs and feedback
  $feedback = "";
  $username = "";
  $password = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include 'html/head.php';
?>

<body class="splash">
  <!-- Navigation Start -->
  <?php
  include 'html/navi.php';
  ?>
  <!-- Navigation End -->
  <!-- Main Content Start -->
  <section class="min-h-96 my-[10vh] flex justify-center">
    <div class="p-8 bg-white border-gray-200 shadow-lg shadow-gray-500 dark:bg-gray-900 dark:border-gray-700 rounded-xl shadow-gray-800">

      <div class="max-w-sm p-2 w-96">
        <div class="absolute flex items-center justify-center w-16 h-16 dark:bg-white bg-gray-900 rounded-full top-28 left-[48vw]">
          <i class="text-4xl text-red-500 fa-solid fa-pepper-hot"></i>
        </div>
        <h1 class="pb-8 text-4xl text-center text-black text-bold dark:text-white">Welcome Back</h1>

        <form method="post" action="login.php" autocomplete="off" novalidate>
          <div class="mb-6">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
            <input type="text" name="username" id="username" value="<?= $username ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lovely_Unicorn_Called_Armando" required>
            <div id="checkUserErr" class="pt-2 text-sm font-medium text-black dark:text-white"></div>
          </div>
          <div class="mb-6">
            <label for="pwd" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
            <input type="password" name="pwd" id="pwd" value="<?= $password ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
          </div>

          <div id="feedback" class="mb-4 text-sm font-medium text-red-500 dark:text-red-500">
            <?= $feedback ?>
          </div>

          <button type="submit" name="submit" class="text-white bg-orange-500 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-bg-orange-500 dark:hover:bg-orange-400 dark:focus:ring-orange-300">Login</button>
        </form>
        <p class="mt-8 text-black dark:text-white text-md">If you have no account yet, please register <a href="register.php" class="underline hover:text-orange-500 text-bold">here</a>.</p>
      </div>
    </div>
  </section>



  <!-- Main Content End -->
  <!-- Footer Start -->
  <?php
  include 'html/footer.php';
  ?>
  <!-- Footer End -->



  <script>
    //Ajax function to check Username input
    const ausgabeCheckUser = document.getElementById("checkUserErr");
    const checkInputField = document.getElementById("username");

    function checkUserName() {
      var formData = new FormData();
      formData.append('username', checkInputField.value);
      fetch('ajax/username.php', {
          method: "post",
          body: formData,
        })
        .then((res) => res.json())
        .then(function(data) {
          console.log(data);
          let validationState = 0;
          if (data) {
            ausgabeCheckUser.innerHTML = `<i class="text-green-500 fa-solid fa-check"></i> Username is valid `;
            checkInputField.style.backgroundColor = "rgba(114, 161, 114, 0.545)";
            checkInputField.style.border = "solid 2px rgb(42, 90, 42)";
            validationState = 0;
          } else {
            ausgabeCheckUser.innerHTML = `<i class="text-red-500 fa-solid fa-x"></i> User is not in our database`;
            checkInputField.style.border = "solid 2px rgb(195, 67, 67)";
            checkInputField.style.backgroundColor = "rgba(195, 67, 67, 0.39)";
            validationState = 0;
          }
        })
        .catch((error) => console.log(error))
    }

    checkInputField.addEventListener('input', checkUserName);
  </script>




  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

</body>

</html>