<?php

require_once '../classes/user.php';
require_once '../classes/validator.php';


$title = "Update";
$bodyname = "bodyuser";

session_start();


if (!isset($_SESSION['user'])) {
    header('location:connexion.php');
}

if (isset($_POST['submit'])) {
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


    if ($validator->userExists($login) == 1) {
        if ($validator->sameLogin($login, $_SESSION['user']->getLogin()) == 1) {
            $errors[] = "This login already exists!";
        }
    }

    if ($validator->emailExists($email) == 1) {
        if ($validator->sameEmail($email, $_SESSION['user']->getEmail()) == 1) {
            $errors[] = "This email already exists!";
        }
    }

    if ($validator->passwordConfirm($password, $passwordcheck) == 0) {
        $errors[] = "Problems with the password";
    }

    if ($validator->passwordStrenght($password) == 0) {
        $errors[] = "Password needs to contain at least one number";
    }


    if (isset($_FILES)) {
        /*Check Image*/
        $target_dir = "../avatars/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (getimagesize($_FILES["fileToUpload"]["tmp_name"]) == false) {
            $errors[] = "This file is not an image.";
        }


// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $errors[] = "This picture is too large.";
        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $errors[] = "Only JPG, JPEG, PNG & GIF pictures are allowed.";
        }
    }

    //If everything is okay
    if (empty($errors)) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $image = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
        $_SESSION['user']->update($login, $password, $lastname, $firstname, $email, $city, $zip, $adress, $image);
        $success = "Account has been updated<a href='categorie.php'>Continue shopping</a>";
    }
    }

}


?>

<?php include '../includes/header_user.php'; ?>
<main>
    <h1 class="center"><em>Update</em></h1>
    <h2><em>Profil @<?php echo $_SESSION['user']->getLogin(); ?></em></h2>

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




    <form action="update.php" method="post" enctype="multipart/form-data">
        <div class="form">
            <fieldset class="formupdate">
                <legend><em><b>Update</b></em></legend>
        <label for="file">Avatar : </label><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>

        <label for="login">New Login</label><br>
        <input placeholder="login" id="login" type="text" name="login" maxlength="20"
               value="<?php echo $_SESSION['user']->getLogin(); ?>"><br><br>

        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" placeholder="exemple@gmail.com"
               value="<?php echo $_SESSION['user']->getEmail(); ?>"><br><br>

        <label for="password">New Password</label><br>
        <input id="password" type="password" class="validate white-text" name="password" maxlength="20"><br><br>

        <label for="passwordcheck">Check Password</label><br>
        <input id="passwordcheck" type="password" class="validate white-text" name="passwordcheck"
               maxlength="20"><br><br>
            </fieldset>

            <fieldset class="formplusinfos">
                <legend><em><b>Plus d'infos</b></em></legend>
        <label for="lastname">Lastname</label><br>
        <input type="text" id="lastname" name="lastname" placeholder="lastname"
               value="<?php echo $_SESSION['user']->getLastname(); ?>"><br><br>

        <label for="firstname">Firstname</label><br>
        <input type="text" id="firstname" name="firstname" placeholder="firstname"
               value="<?php echo $_SESSION['user']->getFirstname(); ?>"><br><br>


        <label for="city">City</label><br>
        <input type="text" id="city" name="city" placeholder="city" title="caractères acceptés : a-zA-Z0-9-_."
               value="<?php echo $_SESSION['user']->getCity(); ?>"><br><br>

        <label for="zip">Zip</label><br>
        <input type="text" id="zip" name="zip" placeholder="zip" pattern="[0-9]{5}" title="5 chiffres requis : 0-9"
               value="<?php echo $_SESSION['user']->getZip(); ?>"><br><br>

        <label for="adress">Adress</label><br>
        <textarea id="adress" name="adress" placeholder="adress" pattern="[a-zA-Z0-9-_.]{5,15}"
                  title="caractères acceptés :  a-zA-Z0-9-_."><?php echo $_SESSION['user']->getAdress(); ?></textarea><br><br>

            </fieldset>
        </div>
        <button class="btn waves-effect waves-light black" type="submit" name="submit">
            <i class="material-icons right">send</i>
        </button>
    </form>
</main>
<?php include '../includes/footer.php'; ?>