<?php
$title = 'update Product';
require_once '../classes/admin.php';
require_once '../classes/user.php';
require_once '../classes/product.php';
if (!isset($_SESSION['user']) or $_SESSION['user']->getStatus() != 1) {
    header('location:../pages/connexion.php');
} else {
    if (isset($_GET['id_product'])) {
        $admin = new admin;
        $product = $admin->selectProduct($_GET['id_product']);
    }

    if (isset($_POST['submit'])) {
        $admin = new admin;


        if (isset($_POST['fileToUpload'])) {
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
        } else {
            $image = $product['image'];
        }


//If everything is okay
        if (empty($errors)) {

//move picture in repository : productPics
            if (isset($_POST['fileToUpload'])) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $image = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
                }
            }
            $reference = htmlspecialchars($_POST['reference']);
            $title = htmlspecialchars($_POST['title']);
            $category = htmlspecialchars($_POST['category']);
            $subcat = htmlspecialchars($_POST['subcat']);
            $description = htmlspecialchars($_POST['description']);
            $shortdesc = htmlspecialchars($_POST['shortdesc']);
            $price = htmlspecialchars($_POST['price']);
            $stock = htmlspecialchars($_POST['stock']);
            $id_product = $_POST['id_product'];


            $admin->update($reference, $category, $subcat, $title, $image, $description, $shortdesc, $price, $stock, $id_product);

            $success = "Product has been updated<a href='produits.php'>Tous les produits</a>";


        }

    }
}
?>


<?php include 'includes/header.php'; ?>
    <main>

        <h1> Update form </h1>

        <section class="form">

            <form method="post" enctype="multipart/form-data"
                  action="update_product.php?id_product=<?= $_GET["id_product"] ?>">

                <label for="id_product">id_product</label><br>
                <input name="id_product" value="<?php echo $_GET["id_product"]; ?>" readonly="readonly"><br/><br/>

                <label for="reference">reference</label><br>
                <input type="text" id="reference" name="reference" value="<?= $product['reference'] ?>"> <br><br>


                <label for="category">category</label><br>
                <select name="category" id="category">
                    <option selected value="<?= $product['category'] ?>"> <?= $product['category'] ?> </option>
                    <option value="nintendo"> nintendo</option>
                    <option value="xbox"> xbox</option>
                    <option value="playstation"> playstation</option>
                </select><br><br>

                <label for="subcat">subcategory</label><br>
                <select name="subcat" id=subcat">
                    <option selected value="<?= $product['subcategory'] ?>"> <?= $product['subcategory'] ?> </option>
                    <option value="games"> games</option>
                    <option value="secondhand"> secondhand</option>
                    <option value="consoles"> consoles</option>
                </select><br><br>


                <label for="title">title</label><br>
                <input type="text" id="title" name="title" placeholder="product title" value="<?= $product['title'] ?>">
                <br><br>

                <label for="description">description</label><br>
                <textarea name="description" id="description"
                          placeholder="product description"><?= $product['description'] ?></textarea><br><br>

                <label for="description">Short description</label><br>
                <textarea name="shortdesc" id="shortdesc"
                          placeholder="product short description"><?= $product['shortdesc'] ?></textarea><br><br>

                <label for="file">picture</label><br>
                <input type="file" name="fileToUpload" id="fileToUpload"><br><br>

                <label for="price">price</label><br>

                <input type="text" id="price" name="price" placeholder="product price" pattern="[0-9]{2}"
                       title="2 nombres requis : 0-9" value="<?= $product['price'] ?>"><br><br>

                <label for="stock">stock</label><br>
                <input type="text" id="stock" name="stock" placeholder="product stock" pattern="[0-9]{2}"
                       title="2 nombres requis : 0-9" value="<?= $product['stock'] ?>"><br><br>

                <button class="btn waves-effect waves-light black" type="submit" name="submit">
                    <i class="material-icons right">send</i>
                </button>

            </form>
        </section>

        <section>
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
        </section>
    </main>

<?php include 'includes/footer.php'; ?>