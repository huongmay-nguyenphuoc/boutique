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

    $admin = new admin();


    if (!empty($_POST)) {

        $reference = htmlspecialchars($_POST['reference']);
        $title = htmlspecialchars($_POST['title']);
        $category = htmlspecialchars($_POST['category']);
        $subcat = htmlspecialchars($_POST['subcat']);
        $description = htmlspecialchars($_POST['description']);
        $shortdesc = htmlspecialchars($_POST['shortdesc']);
        $file = $_FILES['file'];
        $price = htmlspecialchars($_POST['price']);
        $stock = htmlspecialchars($_POST['stock']);


    }


if(empty($errors)){

    $admin->add($reference, $category, $subcat, $title, $description, $shortdesc, $file, $price, $stock);
    $success = "Product created. <a href='produits.php'>Log in</a>";

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





<html>

<body>



<h1> Products form </h1>

<form method="post" enctype="multipart/form-data" action="product_form.php">
    <label for="reference">reference</label><br>
    <input type="text" id="reference" name="reference" placeholder="product reference" value="<?php if (isset($_POST['reference'])) { echo htmlspecialchars($_POST['reference']);} ?>"> <br><br>

    <label for="category">category</label><br>
    <select name="category" id="category">
        <option value=""> ----- Choose ----- </option>
        <option value="nintendo"> nintendo </option>
        <option value="xbox"> xbox </option>
        <option value="playstation"> playstation </option>
    </select><br><br>


    <label for="subcat">subcategory</label><br>
    <select name="subcat"  id=subcat">
        <option value=""> ----- Choose ----- </option>
        <option value="games"> games </option>
        <option value="secondhand"> secondhand </option>
        <option value="consoles"> consoles </option>
    </select><br><br>

 
    <label for="title">title</label><br>
    <input type="text" id="title" name="title" placeholder="product title" value="<?php if (isset($_POST['title'])) { echo htmlspecialchars($_POST['title']);} ?>"> <br><br>
 
    <label for="description">description</label><br>
    <textarea name="description" id="description" placeholder="product description" value="<?php if (isset($_POST['description'])) { echo htmlspecialchars($_POST['description']);} ?>"></textarea><br><br>

    <label for="description">description</label><br>
    <textarea name="shortdesc" id="shortdesc" placeholder="product short description" value="<?php if (isset($_POST['shortdesc'])) { echo htmlspecialchars($_POST['shortdesc']);} ?>"></textarea><br><br>
     
    <label for="file">picture</label><br>
    <input type="file" id="file" name="file[]" multiple ><br><br>
 
    <label for="price">price</label><br>
    <input type="text" id="price" name="price" placeholder="product price" value="<?php if (isset($_POST['price'])) { echo htmlspecialchars($_POST['price']);} ?>"><br><br>
     
    <label for="stock">stock</label><br>
    <input type="text" id="stock" name="stock" placeholder="product stock" value="<?php if (isset($_POST['stock'])) { echo htmlspecialchars($_POST['stock']);} ?>"><br><br>
     
    <button class="btn waves-effect waves-light black" type="submit" name="submit">
                <i class="material-icons right">send</i>
            </button>
</form>


</body>

</html>