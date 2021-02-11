<?php

//require_once("includes/init.inc.php");

require_once '../classes/user.php';
require_once '../classes/validator.php';

session_start();
var_dump($_SESSION['user']);
if (!(isset($_SESSION['user']))) {
    header('location:connexion.php');
}

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

        if ($validator->sameLogin($login, $_SESSION['user']->getLogin()) == 1) {

        $errors[] = "This login already exists!";

        }
    }

    if($validator->passwordConfirm($password, $passwordcheck) == 0){
        
        $errors[] = "Problems with the password";
    }

    if($validator->passwordStrenght($password) == 0){

        $errors[] = "Password needs to contain min a number";
    }

    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
        
        $tailleMax = 2097152;
        $extensionsValides = array('jpg', 'gif', 'jpeg', 'png');

        if($_FILES['avatar']['size'] <= $tailleMax){

            $extensionsUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
            
            if(in_array($extensionsUpload, $extensionsValides)){

                $chemin = "photo/avatar/". $_SESSION['user']->getLogin() . "." . $extensionsUpload;
                $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);             

                if($result){
                       
                    $updateAvatar = $pdo->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                    $updateAvatar->execute(array(
                        'avatar' => $_SESSION['user']->getLogin() . "." . $extensionsUpload,
                        'id' => $_SESSION['user']->getLogin(),
                    ));
                    
                }

                else{

                    $errors[] = "download failed";
                }
                
            }

            else{

                $errors[] = "Wrong formatation";
            }
        }

        else{
            $errors[] = "Picture too big, Max 2Mo!";
        }

    }

    if(empty($errors)){

        $_SESSION['user']->update($login, $password, $lastname, $firstname, $email, $city, $zip, $adress);
        $success = "Account has been udpated<a href='boutique.php'>Continue shopping</a>";

        
    }

}



?>

<html lang="en">


<main>
  
        <h3 class="center"><em>Update</em></h3>

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


    <h3><em>Profil @<?php echo $_SESSION['user']->getLogin(); ?></em></h3>



<form action="update.php" method="post" enctype="multipart/form-data">

    <label>Avatar : </label><br>
    <input type="file" name="avatar" /><br><br>

    <label for="login">New Login</label><br>
    <input placeholder="login" id="login" type="text" name="login" maxlength="20" value="<?php echo $_SESSION['user']->getLogin(); ?>"><br><br>

    <label for="password">New Password</label><br>
    <input id="password" type="password" class="validate white-text" name="password" maxlength="20"><br><br>

    <label for="passwordcheck">Check Password</label><br>
    <input id="passwordcheck" type="password" class="validate white-text" name="passwordcheck" maxlength="20"><br><br>
               
    <label for="lastname">Lastname</label><br>
    <input type="text" id="lastname" name="lastname" placeholder="lastname" value="<?php echo $_SESSION['user']->getLastname(); ?>"><br><br>
          
    <label for="firstname">Firstname</label><br>
    <input type="text" id="firstname" name="firstname" placeholder="firstname"  value="<?php echo $_SESSION['user']->getFirstname(); ?>"><br><br>
  
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com"  value="<?php echo $_SESSION['user']->getEmail(); ?>" ><br><br>
                  
    <label for="city">City</label><br>
    <input type="text" id="city" name="city" placeholder="city" title="caractères acceptés : a-zA-Z0-9-_." value="<?php echo $_SESSION['user']->getCity(); ?>"><br><br>
          
    <label for="zip">Zip</label><br>
    <input type="text" id="zip" name="zip" placeholder="zip" pattern="[0-9]{5}" title="5 chiffres requis : 0-9" value="<?php echo $_SESSION['user']->getZip(); ?>"><br><br>
          
    <label for="adress">Adress</label><br>
    <textarea id="adress" name="adress" placeholder="adress" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_." value="<?php echo $_SESSION['user']->getAdress(); ?>"></textarea><br><br>
 
    

    <button class="btn waves-effect waves-light black" type="submit" name="submit">
                <i class="material-icons right">send</i>
    </button>
</form>


</main>
</html>