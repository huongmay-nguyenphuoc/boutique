<?php

require_once '../classes/admin.php';

require_once '../classes/user.php';

session_start();

/*
if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1){
    exit();
    
}
*/


if(isset($_POST['submit'])){

    $user = new user();


    if (!empty($_POST)) {
        if (!empty($_FILES['image_path'])) {
            $img = $_FILES['image_path'];
            $ext = strtolower(substr($img['name'], -3));
            $allow_ext = ['jpg', 'png', 'gif'];
            if (in_array($ext, $allow_ext)) {
                move_uploaded_file($img['tmp_name'], ROOT . '../photo/picture' . $img['name']);
                $result = $this->Product->create(
                    [
                        'reference' => htmlspecialchars($_POST['reference']),
                        'title' => htmlspecialchars($_POST['title']),
                        'category' => htmlspecialchars($_POST['category']),
                        'description' => htmlspecialchars($_POST['description']),
                        'shortdescription' => htmlspecialchars($_POST['shortdescription']),
                        'image_path' => $img['name'],
                        'price' => htmlspecialchars($_POST['price']),
                        'stock' => htmlspecialchars($_POST['stock']),
                    ]
                );
                $_FILES['image_path'] = '';
                if ($result) {
                    return $this->index();
                }
            } else {
                $errors[] = "Votre fichier n'est pas une image";
            }
        }
    }


if(empty($errors)){
    $admin = new admin();
    $admin->register($reference, $category, $title, $description, $title, $description, $shortdescription, $picture, $price, $stock);
    $success = "Product created. <a href='gestion_produits.php'>Log in</a>";
}

}



?>


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


<html>

<body>



<h1> Products form </h1>

<form method="post" enctype="multipart/form-data" action="gestion_product_form.php">
    <label for="reference">reference</label><br>
    <input type="text" id="reference" name="reference" placeholder="product reference"> <br><br>
 
    <label for="category">category</label><br>
    <input type="text" id="category" name="category" placeholder="product category"><br><br>
 
    <label for="title">title</label><br>
    <input type="text" id="title" name="title" placeholder="product title"> <br><br>
 
    <label for="description">description</label><br>
    <textarea name="description" id="description" placeholder="product description"></textarea><br><br>

    <label for="description">description</label><br>
    <textarea name="shortdescription" id="shortdescription" placeholder="product short description"></textarea><br><br>
     
    <label for="picture">picture</label><br>
    <input type="file" id="picture" name="picture"><br><br>
 
    <label for="price">price</label><br>
    <input type="text" id="price" name="price" placeholder="product price"><br><br>
     
    <label for="stock">stock</label><br>
    <input type="text" id="stock" name="stock" placeholder="product stock"><br><br>
     
    <button class="btn waves-effect waves-light black" type="submit" name="submit">
                <i class="material-icons right">send</i>
            </button>
</form>


</body>

</html>