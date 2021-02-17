<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';


if (isset($_POST['submit'])) {

    $admin = new admin();

    //check if product exists in bdd
    if ($admin->checkProductExists(htmlspecialchars($_POST['reference']), htmlspecialchars($_POST['title']))) {
        $errors[] = "This product already exists.";
    }

    /*Check Image*/
    $target_dir = "../productPics/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (getimagesize($_FILES["fileToUpload"]["tmp_name"]) == false) {
        $errors[] = "This file is not an image.";
    }

// Check if file already exists in repo
    if (file_exists($target_file)) {
        $errors[] = "This picture already exists.";
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

    //If everything is okay
    if (empty($errors)) {

        //move picture in repository : productPics
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $image = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
            $reference = htmlspecialchars($_POST['reference']);
            $title = htmlspecialchars($_POST['title']);
            $category = htmlspecialchars($_POST['category']);
            $subcat = htmlspecialchars($_POST['subcat']);
            $description = htmlspecialchars($_POST['description']);
            $shortdesc = htmlspecialchars($_POST['shortdesc']);
            $price = htmlspecialchars($_POST['price']);
            $stock = htmlspecialchars($_POST['stock']);

            //Add product in BDD
            if ($admin->add($reference, $category, $subcat, $title, $description, $shortdesc, $price, $stock, $image) == true) {
                $success = "Tadaaaam, product added!";
            }
        }
    }
}


?>


<html>

<body>

<!--Alerte (erreur ou succès)-->
<?php if (!empty($errors)): ?>
    <div>
        <?php foreach ($errors as $error) : ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
<?php elseif (isset($success)): ?>
    <div>
        <p><?= $success ?></p>
    </div>
<?php endif; ?>

<main>
    <h1> Product form </h1>
    <form method="post" enctype="multipart/form-data" action="product_form.php">
        <label for="reference">reference</label><br>
        <input type="text" id="reference" name="reference" placeholder="product reference" required
               value="<?php if (isset($_POST['reference'])) {
                   echo htmlspecialchars($_POST['reference']);
               } ?>"> <br><br>

        <label for="category">category</label><br>
        <select name="category" id="category" required>
            <option value=""> ----- Choose -----</option>
            <option value="nintendo"> nintendo</option>
            <option value="xbox"> xbox</option>
            <option value="playstation"> playstation</option>
        </select><br><br>


        <label for="subcat">subcategory</label><br>
        <select name="subcat" id=subcat" required>
            <option value=""> ----- Choose -----</option>
            <option value="games"> games</option>
            <option value="secondhand"> secondhand</option>
            <option value="consoles"> consoles</option>
        </select><br><br>


        <label for="title">title</label><br>
        <input type="text" id="title" name="title" required placeholder="product title" maxlength="50"
               value="<?php if (isset($_POST['title'])) {
                   echo htmlspecialchars($_POST['title']);
               } ?>"> <br><br>

        <label for="description">description</label><br>
        <textarea name="description" id="description" required
                  placeholder="product description"><?php if (isset($_POST['description'])) {
                echo htmlspecialchars($_POST['description']);
            } ?></textarea><br><br>

        <label for="shortdesc">short description</label><br>
        <textarea name="shortdesc" id="shortdesc" required maxlength="300"
                  placeholder="max characters: 300 "><?php if (isset($_POST['shortdesc'])) {
                echo htmlspecialchars($_POST['shortdesc']);
            } ?></textarea><br><br>

        <label for="file">picture</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload" required><br><br>

        <label for="price">price</label><br>
        <input type="text" id="price" name="price" placeholder="product price" required
               value="<?php if (isset($_POST['price'])) {
                   echo htmlspecialchars($_POST['price']);
               } ?>"><br><br>

        <label for="stock">stock</label><br>
        <input type="text" id="stock" name="stock" placeholder="product stock" required
               value="<?php if (isset($_POST['stock'])) {
                   echo htmlspecialchars($_POST['stock']);
               } ?>"><br><br>

        <button type="submit" name="submit">send</button>
    </form>
</main>

</body>

</html>