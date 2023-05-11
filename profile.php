<?php
include 'html/session.php';
include 'config/config.php';
include 'classes/dbh.class.php';
include 'classes/validate.class.php';

// Create a new database connection object
$db = new DatabaseConnection('localhost', 'root', 'root', 'a_chilli_db');
$myValidInst = new ValidateForm();
// Initialize the users array
$users = [];

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $query = "SELECT `username`, `email`, `firstname`, `lastname` FROM `users` WHERE `ID` = :userID";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();
    // Fetch the results into the $users array
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($users)) {
        $user = $users[0];
    }
} //If a user is not logged in, we still need a query here that would show all the data because otherwise we get an error
else {
    $query = "SELECT * FROM users";
}


//If save changes is clicked, submit user details 
if (isset($_POST['submit'])) {
    $feedback = "";
    // Validate user input fields using Validation Form object:
    $username = $myValidInst->validateElement($_POST['username'], true, "•", "min_length-3|max_length-8", "Please enter a valid username");
    $email = $myValidInst->validateElement($_POST['email'], true, "•", "email", "Please enter a valid email");
    $firstname = $myValidInst->validateElement($_POST['firstname'], true, "•", "checkNames", "Please enter a valid firstname");
    $lastname = $myValidInst->validateElement($_POST['lastname'], true, "•", "checkNames", "Please enter a valid lastname");

    // check validation state
    if ($myValidInst->validationState) {
        // send data to DB
        $feedback .= $db->changeDetails($userID, $username, $email, $firstname, $lastname);
    } else {
        if (!$myValidInst->validationState) {
            foreach ($myValidInst->feedbackArray as $fieldName => $feedback) {
                // add a line break after
                $feedback = $feedback;
            }
        }
    }
} else if (isset($_POST['deleteUser'])) {

    $feedback .= $db->deleteAccount($userID);
} else {
    // reset form and feedback if site is being reloaded
    $feedback = "";
}


?>

<!DOCTYPE html>
<html lang="en">
<?php
include 'html/head.php'
?>

<body class="splash-3">
    <!-- Navigation Start -->
    <?php
    include 'html/navi.php'
    ?>
    <!-- Navigation End -->
    <!-- Check if the User is logged in -->
    <?php if (isset($_SESSION['userID'])) { ?>
        <!-- Main Content Start -->
        <section class="min-h-96 my-[10vh] flex justify-center">
            <div class="p-8 bg-white border-gray-200 shadow-lg shadow-gray-500 dark:bg-gray-900 dark:border-gray-700 rounded-xl shadow-gray-800">
                <div class="max-w-sm p-2 w-96">
                    <div class="hidden md:block">
                        <div class=" absolute flex items-center justify-center w-16 h-16 dark:bg-white bg-gray-900 rounded-full top-28 left-[48vw] ">
                            <i class="hidden text-4xl text-red-500 md:block fa-solid fa-pepper-hot"></i>
                        </div>
                    </div>
                    <h1 class="pb-8 text-4xl text-center text-black text-bold dark:text-white">Profile settings</h1>
                    <!-- Form Start -->
                    <form action="profile.php" method="post" id="profileform" novalidate>
                        <div class="relative z-0 w-full mb-6 group">
                            <!-- Ternary Operators that show the new changed username if the submission fails and the old one if nothing was changed // For disclosure: ChatGPT helped me with this -->
                            <input type="text" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : $user['username']; ?>" id="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                            <label for="username" id="labusername" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-orange-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="email" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : $user['email']; ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                            <label for="email" id="labemail" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-orange-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="firstname" id="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : $user['firstname']; ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                                <label for="firstname" id="labfirstname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-orange-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="lastname" id="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : $user['lastname']; ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                                <label for="lastname" id="lablastname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-orange-600 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
                            </div>
                        </div>
                        <div class="mb-4 text-sm font-medium text-red-500 dark:text-red-500">
                            <?= $feedback ?>
                        </div>
                        <div class="relative w-full mb-6 group md:gap-6">
                            <button type="submit" name="submit" class="text-white bg-orange-500 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-orange-500 dark:hover:bg-orange-400 dark:focus:ring-orange-300">Submit Changes</button>
                            <button onclick="showLoginMessage()" type="button" name="openDioalog" class="md:ml-4 ml-0 mt-2 md:md-0 text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-400 dark:focus:ring-red-300">Terminate Account</button>
                        </div>
                    </form>
                    <!-- Form End -->
                </div>
            </div>

            <!-- Hidden Warning Box to display if the user wants to delete his Account -->
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
                    <form method="post" action="">
                        <div class="mb-4 text-3xl font-bold text-black dark:text-white">Are you sure?</div>
                        <div class="mb-4 text-lg text-black dark:text-white">This action can't be undone. All saved bookmarks will be deleted aswell.</div>

                        <button type="submit" name="deleteUser" class="md:ml-4 ml-0 mt-2 md:md-0 text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-400 dark:focus:ring-red-300">Terminate Account</button>
                    </form>
                </div>
            </div>
            <!-- Hidden Message Box end -->
        </section>
        <!-- If user accesses page before login show this message -->
    <?php } else {
        echo '         <div class="flex items-center justify-center w-full my-64 flex-column ">
                         <div class="flex justify-center p-8 text-center bg-white dark:bg-gray-900 col-span-full rounded-xl">
                            <p class="text-2xl text-black dark:text-white "> Not logged in. Please login to change your profile details<br><br> 
                                <a href="login.php">
                                    <button type="button" class="text-white bg-orange-500 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-bg-orange-500 dark:hover:bg-orange-400 dark:focus:ring-orange-300" >Log in</button>
                                </a>
                            </p>
                         </div>
                       </div>';
    } ?>
    <!-- Main Content End -->
    <!-- Footer Start -->
    <?php
    include 'html/footer.php'
    ?>
    <!-- Footer End -->

    <script>
        //---------------------------- Ajax: Username
        //Ajax async Validation of Username // For disclosure: ChatGPT helped me with the ajax functions
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



        //---------------------------- Ajax: First and lastname
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