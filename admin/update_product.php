
<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';
require_once '../classes/product.php';

session_start();


?>



<html>

<body>



<h1> Products form </h1>


<form method="post" enctype="multipart/form-data" action="update_product.php" >
    
    <label for="reference">reference</label><br>
    <input type="text" id="reference" name="reference" placeholder="product reference" value="<?php echo $_SESSION['admin']->getReference(); ?>"> <br><br>

    <label for="category">category</label><br>
    <input type="text" id="category" name="category" placeholder="product category" value="<?php echo $_SESSION['admin']->getCategory(); ?>"><br><br>

    <label for="subcategory">subcategory</label><br>
    <input type="text" id="subcategory" name="subcategory" placeholder="product subcategory" value="<?php echo $_SESSION['admin']->getSubcategory(); ?>"><br><br>

    <label for="title">title</label><br>
    <input type="text" id="title" name="title" placeholder="product title" value="<?php echo $_SESSION['admin']->getTitle(); ?>"> <br><br>

    <label for="description">description</label><br>
    <textarea name="description" id="description" placeholder="product description" value="<?php echo $_SESSION['admin']->getDescription(); ?>"></textarea><br><br>

    <label for="description">description</label><br>
    <textarea name="shortdescription" id="shortdescription" placeholder="product short description" value="<?php echo $_SESSION['admin']->getShortdesc(); ?>"></textarea><br><br>

    <label for="picture">picture</label><br>
    <input type="file" id="picture" name="picture"><br><br>

    <label for="price">price</label><br>
    <input type="text" id="price" name="price" placeholder="product price" value="<?php echo $_SESSION['admin']->getPrice(); ?>"><br><br>

    <label for="stock">stock</label><br>
    <input type="text" id="stock" name="stock" placeholder="product stock" value="<?php echo $_SESSION['admin']->getStock(); ?>"><br><br>

    <button class="btn waves-effect waves-light black" type="submit" name="submit">
        <i class="material-icons right">send</i>
    </button>

</form>


</body>

</html>