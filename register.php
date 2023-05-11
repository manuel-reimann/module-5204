<?php
include 'html/session.php';
include 'config/config.php';
include 'classes/dbh.class.php';
include 'classes/validate.class.php';

//Create instances of DB Connection and Validation form
$myInstance = new DatabaseConnection($host, $user, $dbpwd, $dbName);
$myValidInst = new ValidateForm();

if (isset($_POST['submit'])) {
  $feedback = "";
  // Validate user input fields using Validation Form object:
  $username = $myValidInst->validateElement($_POST['username'], true, "•", "min_length-3|max_length-8", "Please enter a valid username");
  $email = $myValidInst->validateElement($_POST['email'], true, "•", "email", "Please enter a valid email");
  $pwd = $myValidInst->validateElement($_POST['pwd'], true, "•", "password", "Please enter a valid password");
  $passwordRepeat = $myValidInst->validateElement($_POST['pwd_repeat'], true, "•", "passwordMatch", "Passwords did not match", $_POST['pwd']);
  $firstname = $myValidInst->validateElement($_POST['firstname'], true, "•", "checkNames", "Please enter a valid firstname");
  $lastname = $myValidInst->validateElement($_POST['lastname'], true, "•", "checkNames", "Please enter a valid lastname");

  // check validation state
  if ($myValidInst->validationState) {
    // send data to DB
    $feedback .= $myInstance->registerUser($username, $pwd, $email, $firstname, $lastname);
  } else {
    if (!$myValidInst->validationState) {
      foreach ($myValidInst->feedbackArray as $fieldName => $feedback) {
        // add a line break after
        $feedback = $feedback;
      }
    }
  }
} else {
  // reset form and feedback if site is being reloaded
  $feedback = "";
  $username = "";
  $email = "";
  $pwd = "";
  $passwordRepeat = "";
  $firstname = "";
  $lastname = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include 'html/head.php'
?>

<body class="splash-2">
  <!-- Navigation Start -->
  <?php
  include 'html/navi.php'
  ?>
  <!-- Navigation End -->
  <!-- Main Content Start -->
  <section class="min-h-96 my-[10vh] flex justify-center">
    <div class="p-8 bg-white border-gray-200 shadow-lg shadow-gray-500 dark:bg-gray-900 dark:border-gray-700 rounded-xl shadow-gray-800">
      <div class="max-w-sm p-2 w-96">
        <div class="hidden md:block">
          <div class=" absolute flex items-center justify-center w-16 h-16 dark:bg-white bg-gray-900 rounded-full top-28 left-[48vw] ">
            <i class="hidden text-4xl text-red-500 md:block fa-solid fa-pepper-hot"></i>
          </div>
        </div>
        <h1 class="pb-8 text-4xl text-center text-black text-bold dark:text-white">Register here</h1>
        <!-- Form Start -->
        <form action="register.php" method="post" id="regform" novalidate>
          <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="username" value="<?= $username ?>" id="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
            <label for="username" id="labusername" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-orange-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input type="email" name="email" id="email" value="<?= $email ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
            <label for="email" id="labemail" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-orange-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input type="password" name="pwd" id="pwd" value="<?= $pwd ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
            <label for="pwd" id="labpwd" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-orange-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input type="password" name="pwd_repeat" id="pwd_repeat" value="<?= $passwordRepeat ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
            <label for="pwd_repeat" id="labpwdRepeat" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-orange-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
          </div>
          <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
              <input type="text" name="firstname" id="firstname" value="<?= $firstname ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
              <label for="firstname" id="labfirstname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-orange-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
              <input type="text" name="lastname" id="lastname" value="<?= $lastname ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
              <label for="lastname" id="lablastname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-orange-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
            </div>
          </div>
          <div class="mb-4 text-sm font-medium text-red-500 dark:text-red-500">
            <?= $feedback ?>
          </div>
          <button type="submit" name="submit" class="text-white bg-orange-500 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-orange-500 dark:hover:bg-orange-400 dark:focus:ring-orange-300">Submit</button>
        </form>
        <!-- Form End -->
      </div>
    </div>
  </section>
  <!-- Main Content End -->
  <!-- Footer Start -->
  <?php
  include 'html/footer.php'
  ?>
  <!-- Footer End -->

  <script>
    //---------------------------- Ajax: Username  
    //Ajax async Validation of Username // For disclosure: ChatGPT helped me with all async functions here
    const labusername = document.getElementById("labusername");
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
          let userNameValidationState = 0;
          if (data) {
            labusername.innerHTML = `<i class="text-red-500 fa-solid fa-x"></i> Username is already taken`;
            userNameValidationState = 0;
          } else if (checkInputField.value.length < 3) {
            labusername.innerHTML = `<i class="text-red-500 fa-solid fa-x"></i> Username should contain at least 3 characters`;
            userNameValidationState = 0;
          } else if (checkInputField.value.length > 8) {
            labusername.innerHTML = `<i class="text-red-500 fa-solid fa-x"></i> Username should not exceed 8 characters`;
            userNameValidationState = 0;
          } else {
            labusername.innerHTML = `<i class="text-green-500 fa-solid fa-check"></i> Username is available`;
            userNameValidationState = 0;
          }
        })
        .catch((error) => console.log(error))
    }

    checkInputField.addEventListener('input', checkUserName);

    //---------------------------- Ajax: Email 
    //Ajax async Validation of Email
    const labemail = document.getElementById("labemail");
    const emailInput = document.getElementById("email");

    function checkEmail() {
      const email = emailInput.value;

      // Email validation regular expression
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      let emailInputValidationState = 0;

      if (!emailRegex.test(email)) {
        labemail.innerHTML = `<i class="text-red-500 fa-solid fa-x"></i> Invalid email format`;
        emailInputValidationState = 0;
      } else {
        var formData = new FormData();
        formData.append('email', email);
        fetch('ajax/email.php', {
            method: "post",
            body: formData,
          })
          .then((res) => res.json())
          .then(function(data) {
            console.log(data);
            if (data) {
              labemail.innerHTML = `<i class="text-red-500 fa-solid fa-x"></i> Email is already registered`;
              emailInputValidationState = 0;
            } else {
              labemail.innerHTML = `<i class="text-green-500 fa-solid fa-check"></i> Email not registered`;
              emailInputValidationState = 0;
            }
          })
          .catch((error) => console.log(error))
      }
    }
    emailInput.addEventListener('input', checkEmail);

    //---------------------------- Ajax: Password 
    //Ajax Validation of Password using a regex string
    const labpwd = document.getElementById("labpwd");
    const labpwdRepeat = document.getElementById("labpwdRepeat");
    const pwdInput = document.getElementById("pwd");
    const pwdRepeatInput = document.getElementById("pwd_repeat");

    function checkPassword() {
      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/;
      let asyncState = 0;

      if (!passwordRegex.test(pwdInput.value)) {
        labpwd.innerHTML = `<i class="text-red-500 fa-solid fa-x"></i> 8-20 chars, one capitalized, number, special char.`;
        asyncState = 0;
      } else {
        labpwd.innerHTML = `<i class="text-green-500 fa-solid fa-check"></i> Password meets the requirements`;
        asyncState = 1;
      }
      if (pwdInput.value !== pwdRepeatInput.value) {
        labpwdRepeat.innerHTML = `<i class="text-red-500 fa-solid fa-x"></i> Passwords don't match`;
        asyncState = 0;
      } else {
        labpwdRepeat.innerHTML = `<i class="text-green-500 fa-solid fa-check"></i> Passwords match`;
      }

      return asyncState;
    }

    pwdInput.addEventListener('input', checkPassword);
    pwdRepeatInput.addEventListener('input', checkPassword);

    //---------------------------- Ajax: First and Lastname 
    //Ajax Validation of first and last name
    const labfirstname = document.getElementById("labfirstname");
    const firstnameInput = document.getElementById("firstname");
    const lablastname = document.getElementById("lablastname");
    const lastnameInput = document.getElementById("lastname");
    let touchedLastname = false;

    function checkNameInputs() {
      let nameInputValidationState = 0;
      const nameRegex = /^[a-zA-Z]+$/; // regular expression to match only letters
      const numberRegex = /^[0-9]+$/; // regular expression to match only numbers

      if (firstnameInput.value.trim() === '') {
        labfirstname.innerHTML = '<i class="text-red-500 fa-solid fa-x"></i> First name missing';
        nameInputValidationState = 1;
      } else if (numberRegex.test(firstnameInput.value.trim())) {
        labfirstname.innerHTML = '<i class="text-red-500 fa-solid fa-x"></i> No numbers allowed';
        nameInputValidationState = 1;
      } else if (!nameRegex.test(firstnameInput.value.trim())) {
        labfirstname.innerHTML = '<i class="text-red-500 fa-solid fa-x"></i> Invalid characters';
        nameInputValidationState = 1;
      } else {
        labfirstname.innerHTML = '<i class="text-green-500 fa-solid fa-check"></i> First name';
      }

      if (lastnameInput.value.trim() === '') {
        lablastname.innerHTML = touchedLastname ? '<i class="text-red-500 fa-solid fa-x"></i> Last name missing' : 'Last name';
        nameInputValidationState = 1;
      } else if (numberRegex.test(lastnameInput.value.trim())) {
        lablastname.innerHTML = '<i class="text-red-500 fa-solid fa-x"></i> No numbers allowed';
        nameInputValidationState = 1;
      } else if (!nameRegex.test(lastnameInput.value.trim())) {
        lablastname.innerHTML = '<i class="text-red-500 fa-solid fa-x"></i> Invalid characters';
        nameInputValidationState = 1;
      } else {
        lablastname.innerHTML = '<i class="text-green-500 fa-solid fa-check"></i> Last name';
      }

      return nameInputValidationState;
    }
    //to ensure Feedback is not confusing 
    firstnameInput.addEventListener('input', checkNameInputs);
    lastnameInput.addEventListener('input', () => {
      touchedLastname = true;
      checkNameInputs();
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

</body>

</html>