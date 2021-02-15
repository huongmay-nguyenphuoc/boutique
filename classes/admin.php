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


    //ENREGISTRER PRODUITS
    function add($reference, $category, $subcat, $title, $description, $shortdesc, $file, $price, $stock)
    {
        $this->pdo->Insert('Insert into products (reference, category, subcat, title, description, shortdesc, file, price, stock) values ( :reference , :category, :subcat, :title, :description, :shortdesc, :file, :price, :stock)',
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
        return $reference;


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


    //RECUPERER HISTORIC
    public function allProducts()
    {
        $allproducts = $this->pdo->Select("SELECT * FROM products ORDER BY products.category DESC");

            return $allproducts;
    }

    //RECUPERER ORDERS
    public function allOrders()
    {
        $all_orders = $this->pdo->Select("SELECT * FROM `order` ORDER BY `order`.state DESC");

        return $all_orders;
    }


//SUPPRIMER PRODUIT

    public function delete()
    {

        $requser = $this->pdo->prepare('DELETE * FROM products WHERE id_product = $this->id_product');
        $requser->execute();

    }


    //UPDATE PRODUIT

    function update($reference, $category, $subcat, $title, $description, $shortdesc, $image, $price, $stock)
    {
        $this->pdo = new database();
        $update = $this->pdo->Update("Update products SET reference = :reference, category = :category, subcat = :subcat, title = :title, description = :description, shortdesc = :shortdesc, image = :image, price = :price, stock = :stock WHERE id_product = $this->id_product ",
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

        return $update;
    }

    //UPDATE COMMANDE

    function updateCommande($id_order, $id_member, $amount, $date_register, $state)
    {
        $this->pdo = new database();
        $update_comm = $this->pdo->UpdateCommande("Update orders SET id_order = :id_order, id_member = :id_member, amount = :amount, date_register = :date_register, state = :state WHERE id_order = $this->id_order ",
            ['id_order' => $id_order,
                'id_member' => $id_member,
                'amount' => $amount,
                'date_register' => $date_register,
                'state' => $state,

            ]);

        return $update_comm;
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




    //RECUPERER TOUS LES MEMBRES

    public function allMembers()
    {
        $allmembers = $this->pdo->Select("Select * from users where 1");

        return $allmembers;
    }



//SUPPRIMER PRODUIT

    public function deleteUser($id_member){
        $delete_user = $this->pdo->Delete("Delete from users WHERE id_member = :id_member",
            ['id_member' => $id_member,
            ]);

        return $delete_user;
    }

}
