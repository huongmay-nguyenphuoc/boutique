<?php

require_once('database.php');
require_once('user.php');
require_once('order.php');

class admin
{


    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }
/************************PRODUIT****************************/

    //ENREGISTRER PRODUITS
    function add($reference, $category, $subcat, $title, $description, $shortdesc, $price, $stock, $image)
    {
        $this->pdo->Insert('Insert into `products` (reference, category, subcat, title, description, shortdesc, price, stock, image) values ( :reference , :category, :subcat, :title, :description, :shortdesc, :price, :stock, :image)',
            ['reference' => $reference,
                'category' => $category,
                'subcat' => $subcat,
                'title' => $title,
                'description' => $description,
                'shortdesc' => $shortdesc,
                'price' => $price,
                'stock' => $stock,
                'image' => $image,
            ]);
        return true;
    }

/*
        $this->checkPicture();

//        $this->setPicture();
        $photo = $_POST['title'] . "." . $this->extension;

        if (empty($error)) {
            $add = $this->pdo->Insert('Insert into products(reference, title, category, subcat, description, shortdesc, file, price, stock) VALUES(:reference , :category, :subcat, :title, :description, :shortdesc, :file, :price, :stock) ',
                ['reference' => $reference,
                    'category' => $category,
                    'subcat' => $subcat,
                    'title' => $title,
                    'description' => $description,
                    'shortdesc' => $shortdesc,
                    'file' => $file,
                    'price' => $price,
                    'stock' => $stock,
                ]);

            $idProduct = $this->lastInsertId();

            $arrayTaille = ['S', 'M', 'L', 'XL'];

            foreach ($arrayTaille as $taille) {
                if (empty($_POST[$taille])) {
                    $currentTaille = 0;
                } else {
                    $currentTaille = $_POST[$taille];
                }

                $this->pdo->Insert('Insert into stock(id_product, taille, stock) VALUES(?,?,?) ', [$idProduct, $taille, $currentTaille]);
            }
        } else {
            echo $error;
        }


    }

    public function checkPicture()
    {
        $error = '';
        $extensionsValides = array('jpg', 'jpeg', 'png');
        $this->extension = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));

        if (in_array($this->extension, $extensionsValides)) {
            $chemin = "../photo/picture/" . $_POST['title'] . "." . $this->extension;
            $resultat = move_uploaded_file($_FILES['file']['tmp_name'], $chemin);
        } else {
            $error = 'pas bon format';

        }

        return $error;

    }
*/

    //RECUPERER ALL PRODUCTS
    public function allProducts()
    {
        $allproducts = $this->pdo->Select("SELECT * FROM products ORDER BY products.category DESC");

            return $allproducts;
    }



    //UPDATE PRODUIT

    function update($reference, $category, $subcat, $title, $description, $shortdesc, $image, $price, $stock)
    {
        $this->pdo = new database();
        $update = $this->pdo->Update("Update products SET reference = :reference, category = :category, subcat = :subcat, title = :title, description = :description, shortdesc = :shortdesc, image = :image, price = :price, stock = :stock WHERE id_product = :id_product ",
            ['reference' => $reference,
                'category' => $category,
                'subcat' => $subcat,
                'title' => $title,
                'description' => $description,
                'shortdesc' => $shortdesc,
                'image' => $image,
                'price' => $price,
                'stock' => $stock,
            ]);

        return true;
    }


    //SUPPRIMER PRODUIT

    public function deleteProduct($id_product){
        $delete_product = $this->pdo->Delete("Delete from products WHERE id_product = :id_product",
            ['id_product' => $id_product,
            ]);

        return $delete_product;
    }


    /*VERIFIE EXISTENCE PRODUIT*/

    function productExists($id)
    {
        $product = $this->pdo->Select('SELECT id_product FROM products WHERE id_product ="' . $id . '"');
        if (!empty($product)) {
            return $product;
        } else {
            return false;
        }
    }



    /***********************COMMANDES****************************/
    //RECUPERER ORDERS
    public function allOrders()
    {
        $all_orders = $this->pdo->Select("SELECT * FROM `order` ORDER BY `order`.state DESC");

        return $all_orders;
    }



    //UPDATE STATE
    public function updateState($state, $id_order){

        $this->pdo = new database();
        $update_state = $this->pdo->Update("Update `order` SET state = :state WHERE id_order = :id_order ",
            [
                'state' => $state,
                'id_order' => $id_order,
            ]);

        return $update_state;
    }


    /**************************CATEGORIES*************************/
    //RECUPERER CAT
    public function allCat()
    {
        $all_cat = $this->pdo->Select("SELECT * FROM category ORDER BY category.name DESC");

        return $all_cat;
    }


    //UPDATE CATEGORY

    function updateCat($name)
    {
        $this->pdo = new database();
        $update = $this->pdo->UpdateCat("Update category SET name = :name WHERE id_category = :id_category ",
            [
                'name' => $name,
            ]);

        return $update;
    }


    //ENREGISTRER CAT
    function addCat($name)
    {
        $this->pdo->Insert('Insert into category (name) values ( :name)',
            ['name' => $name,

            ]);
        return $name;
    }



    /***********************SUBCAT**********************************/

    //RECUPERER SUBCAT
    public function allSubcat()
    {
        $all_subcat = $this->pdo->Select("SELECT * FROM subcategory ORDER BY subcat.name DESC");

        return $all_subcat;
    }



    //UPDATE SUBCATEGORY

    function updateSubcat($name)
    {
        $this->pdo = new database();
        $update = $this->pdo->UpdateSubcat("Update subcategory SET name = :name WHERE id_subcat = :id_subcat ",
            [
                'name' => $name,
            ]);

        return $update;
    }




    //ENREGISTRER SUBCAT
    function addSubcat($name)
    {
        $this->pdo->Insert('Insert into subcategory (name) values ( :name)',
            ['name' => $name,

            ]);
        return $name;
    }


    /******************************GET********************************/

    public function getReference()
    {

        return $this->reference;
    }

    public function getCategory()
    {

        return $this->category;
    }

    public function getSubcat()
    {

        return $this->subcat;
    }


    public function getTitle()
    {

        return $this->title;
    }


    public function getDescription()
    {

        return $this->description;
    }


    public function getShortdesc()
    {

        return $this->shortdesc;
    }


    public function getPrice()
    {

        return $this->price;
    }


    public function getStock()
    {

        return $this->stock;
    }

/******************************MEMBRES*********************************/


    //RECUPERER TOUS LES MEMBRES

    public function allMembers()
    {
        $allmembers = $this->pdo->Select("Select * from users where 1");

        return $allmembers;
    }



//SUPPRIMER MEMBER

    public function deleteUser($id_member){
        $delete_user = $this->pdo->Delete("Delete from users WHERE id_member = :id_member",
            ['id_member' => $id_member,
            ]);

        return $delete_user;
    }

}
