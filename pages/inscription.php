<?php

//require_once("includes/init.inc.php");

require_once '../classes/user.php';
require_once '../classes/validator.php';

session_start();



if(isset($_POST['submit'])){

    $validator = new validator();

    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $passwordcheck = htmlspecialchars($_POST['passwordcheck']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $city = htmlspecialchars($_POST['city']);
    $zip = htmlspecialchars($_POST['zip']);
    $adress = htmlspecialchars($_POST['adress']);

    if($validator->userExists($login) == 1){

        $errors[] = "This login already exists!";
    }

    if($validator->passwordConfirm($password, $passwordcheck) == 0){
        
        $errors[] = "Problems with the password";
    }

    if($validator->passwordStrenght($password) == 0){

        $errors[] = "Password needs to contain min a number";
    }

    if(empty($errors)){
        $user = new user();
        $user->register($login, $password, $lastname, $firstname, $email, $city, $zip, $adress);
        $success = "Account created. <a href='connexion.php'>Log in</a>";
       
    }

}



?>

<html lang="en">


<main class="valign-wrapper container">
    <article class="row">
        <h3 class="center"><em>Inscription</em></h3>


<!--Alerte (erreur ou succès)-->
<?php if (!empty($errors)): ?>
        <div>
            <?php foreach ($errors as $error) {
                echo '<p class="red-text">' . $error . '</p>';
            }
            ?>
        </div>
    <?php elseif (isset($success)): ?>
        <div>
            <p class="white-text"><?php echo $success; ?></p>
        </div>
    <?php endif; ?>


<body>
    

<form method="post" action="inscription.php">
    <label for="login">Login</label><br>
    <input type="text" id="login" name="login" maxlength="20" placeholder="login" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required" value="<?php if (isset($_POST['login'])) { echo htmlspecialchars($_POST['login']);} ?>"><br><br>
          
    

    <label for="password">Password</label><br>
    <input type="password" id="password" name="password" required="required"><br><br>
    <span class="helper-text">Password needs to contain min a number.</span>

    <label for="passwordcheck">Password check</label><br>
    <input type="password" id="passwordcheck" name="passwordcheck" required="required"><br><br>
          
    <label for="lastname">Lastname</label><br>
    <input type="text" id="lastname" name="lastname" placeholder="lastname"><br><br>
          
    <label for="firstname">Firstname</label><br>
    <input type="text" id="firstname" name="firstname" placeholder="firsrname"><br><br>
  
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com"><br><br>
                  
    <label for="city">City</label><br>
    <input type="text" id="city" name="city" placeholder="city" title="caractères acceptés : a-zA-Z0-9-_."><br><br>
          
    <label for="zip">Zip</label><br>
    <input type="text" id="zip" name="zip" placeholder="zip" pattern="[0-9]{5}" title="5 chiffres requis : 0-9"><br><br>
          
    <label for="adress">Adress</label><br>
    <textarea id="adress" name="adress" placeholder="adress" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_."></textarea><br><br>
 
    <button class="btn waves-effect waves-light black" type="submit" name="submit">
                <i class="material-icons right">send</i>
            </button>
</form>
 

</body>
</html>