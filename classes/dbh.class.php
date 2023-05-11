<?php

// this class inherits from superclass pdo
class DatabaseConnection extends PDO
{

  // construct method: connect the DB
  public function __construct($host, $user, $dbpwd, $dbName)
  {
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName . ';charset=utf8';
    // array for pdo options
    $options = array(
      // error reporting
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      // getting the results as associative array
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    try {
      // call constructor of pdo superclass
      parent::__construct($dsn, $user, $dbpwd, $options);
    } catch (PDOException $e) {
      //display errors
      die("Connection to Database failed: " . $e->getMessage());
    }
  }

  //Method for login users
  public function checkUser($username, $password)
  {
    //safe query with binded parameters
    $query = "SELECT * FROM users WHERE Username = :username";
    $stmt = $this->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch();

    // User not found -> $result = false
    // user found -> array filled with data
    if ($result) {
      // check hashed password with the one stored in the DB
      if (password_verify($password, $result['password'])) {
        $_SESSION['loginstate'] = "loggedin";
        $_SESSION['userID'] =  $result['ID'];
        // send user to front pagee
        header('Location: index.php');
      } else {
        //wrong password
        return "Wrong Username or Password (Password)";
      }
    } else {
      //wrong username
      return "Wrong Username or Password (Username)";
    }
  }



  //Method to register users
  public function registerUser($username, $pwd, $email, $firstname, $lastname)
  {
    // Enable error reporting for PDO
    $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //safe query with binded parameters
    $query = "SELECT * FROM users WHERE username = :username OR email = :email";
    $stmt = $this->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch();

    // username or email exists already in DB
    if ($result) {
      return "• Username or Email already exists.";
    }
    //username and email are unique
    else {
      // hash password first
      $pwHash = password_hash($pwd, PASSWORD_DEFAULT);
      //insert query to add user safely
      $query = "INSERT INTO users (username, password, email, firstname, lastname) VALUES (:username, :password, :email, :firstname, :lastname)";
      $stmt = $this->prepare($query);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':password', $pwHash);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':firstname', $firstname);
      $stmt->bindParam(':lastname', $lastname);
      $stmt->execute();


      //return a nice looking message for a direct login or empty form to register another user
      return '
      <div class="fixed inset-0 z-50 flex items-center justify-center" id="registBox">
      <div class="absolute inset-0 bg-gray-800 opacity-50"></div>
      <div class="relative z-10 w-full max-w-md p-8 bg-white rounded-lg dark:bg-gray-900">
        <div class="absolute top-0 right-0 p-4">
          <button type="button" class="text-black dark:text-white hover:text-orange-500" onclick="closeRegisterBox(true)">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mb-4 text-3xl font-bold text-black dark:text-white">Account registered.</div>
        <div class="mb-4 text-lg text-black dark:text-white">Welcome to the Spicy Stuff Family!</div>
        <a href="login.php">
        <button type="button" class="text-white bg-orange-500 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-bg-orange-500 dark:hover:bg-orange-400 dark:focus:ring-orange-300" >Log in</button>
        </a>
        </div>
    </div>
      
      ';
    }
  }

  //method to change Details of the user
  public function changeDetails($userId, $username, $email, $firstname, $lastname)
  {
    //query for a safe DB insert
    $query = "UPDATE users SET username = :username, email = :email, firstname = :firstname, lastname = :lastname WHERE id = :userId";
    $stmt = $this->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    //Message box
    return '
      <div class="fixed inset-0 z-50 flex items-center justify-center" id="registBox">
      <div class="absolute inset-0 bg-gray-800 opacity-50"></div>
      <div class="relative z-10 w-full max-w-md p-8 bg-white rounded-lg dark:bg-gray-900">
        <div class="absolute top-0 right-0 p-4">
        <a href="profile.php">
          <button type="button" class="text-black dark:text-white hover:text-orange-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
          </a>
        </div>
        <div class="mb-4 text-3xl font-bold text-black dark:text-white">Details changed.</div>
        <div class="mb-4 text-lg text-black dark:text-white">Thank you for updating your details.</div>
        <a href="profile.php">
        <button type="button" class="text-white bg-orange-500 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-bg-orange-500 dark:hover:bg-orange-400 dark:focus:ring-orange-300" >Close</button>
        </a>
        </div>
    </div>
      
      ';
  }

  //method to delete account perminently and drop all liked cards associated to the account (DB setting)
  public function deleteAccount($userId)
  {
    //query for a safe DB change
    $query = "DELETE FROM `users` WHERE id = :userId";
    $stmt = $this->prepare($query);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    //destroy user session to display the correct outputs and send to the startpage
    session_unset();
    session_destroy();
    header("location: index.php");
  }
}
