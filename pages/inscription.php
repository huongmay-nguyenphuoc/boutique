<?php

require_once '../classes/user.php';
require_once '../classes/validator.php';

session_start();

if(isset($_POST['submit'])){

    $validator = new validator();
    var_dump($_POST);
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

    if($validator->emailExists($email) == 1){
        $errors[] = "This email already exists!";
    }

    if($validator->passwordConfirm($password, $passwordcheck) == 0){
        $errors[] = "The two passwords are not the same.";
    }

    if($validator->passwordStrenght($password) == 0){
        $errors[] = "Password needs to contain at least 1 number";
    }

    if(empty($errors)){
        $user = new user();
       var_dump($user->register($login, $password, $lastname, $firstname, $email, $city, $zip, $adress));
        $success = "Account created. <a href='connexion.php'>Log in</a>";
       var_dump($user);
    }

}



?>

<html lang="en">


<main>
        <h3><em>Inscription</em></h3>


<!--Alerte (erreur ou succès)-->
<?php if (!empty($errors)): ?>
        <div>
            <?php foreach ($errors as $error) :?>
                <p><?= $error?></p>
            <?php endforeach;?>
        </div>
    <?php elseif (isset($success)): ?>
        <div>
           <p><?= $success ?></p>
        </div>
    <?php endif; ?>


<body>
    

<form method="post" action="inscription.php">
    <label for="login">Login</label><br>
    <input type="text" id="login" name="login" maxlength="20" placeholder="login" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required" value="<?php if (isset($_POST['login'])) { echo htmlspecialchars($_POST['login']);} ?>"><br><br>
          
    

    <label for="password">Password</label><br>
    <input type="password" id="password" name="password" required="required"><br>
    <span>Password needs to contain at least one number.</span><br><br>

    <label for="passwordcheck">Password check</label><br>
    <input type="password" id="passwordcheck" name="passwordcheck" required="required"><br><br>
          
    <label for="lastname">Lastname</label><br>
    <input type="text" id="lastname" name="lastname" placeholder="lastname" value="<?php if (isset($_POST['lastname'])) { echo htmlspecialchars($_POST['lastname']);} ?>"><br><br>
          
    <label for="firstname">Firstname</label><br>
    <input type="text" id="firstname" name="firstname" placeholder="firstname" value="<?php if (isset($_POST['firstname'])) { echo htmlspecialchars($_POST['firstname']);} ?>"><br><br>
  
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com" value="<?php if (isset($_POST['email'])) { echo htmlspecialchars($_POST['email']);} ?>"><br><br>
                  
    <label for="city">City</label><br>
    <input type="text" id="city" name="city" placeholder="city" title="caractères acceptés : a-zA-Z0-9-_." value="<?php if (isset($_POST['city'])) { echo htmlspecialchars($_POST['city']);} ?>"><br><br>
          
    <label for="zip">Zip</label><br>
    <input type="text" id="zip" name="zip" placeholder="zip" pattern="[0-9]{5}" title="5 chiffres requis : 0-9" value="<?php if (isset($_POST['zip'])) { echo htmlspecialchars($_POST['zip']);} ?>"><br><br>
          
    <label for="adress">Adress</label><br>
    <textarea id="adress" name="adress" placeholder="adress" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_."><?php if (isset($_POST['adress'])) { echo htmlspecialchars($_POST['adress']);} ?></textarea><br><br>
 
    <button type="submit" name="submit">send</button>
</form>
 

</body>
</html>