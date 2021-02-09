<?php

require_once('database.php');
class admin extends user{

    private $reference;
    private $category;
    private $title;
    private $desciption;
    private $shortdescription;
    private $picture;
    private $price;
    private $stock;

    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }


    public function __construct()
{
    parent::__construct();
    $this->loadModel('Product');
    $this->loadModel('Category');
    $this->loadModel('Subcategory');
}

public function index()
{
    $products = $this->Product->all();
    $categories = $this->Category->all();
    $subcategories = $this->Subcategory->all();
    $this->render('admin.products.index', compact('products', 'categories', 'subcategories'));
}


    //ENREFISTRER PRODUITS
    function register($reference, $category, $title, $description, $shortdescription, $picture, $price, $stock)
    {
        $this->pdo->Insert('Insert into products (reference, category, title, description, shortdescription, picture, price, stock) values ( :reference , :category, :title, :description, :shortdescription, :picture, :price, :stock )',
            ['reference' => $reference,
            'category' => $category,
            'title' => $title,
            'description' => $description,
            'shortdescription' => $shortdescription,
            'picture' =>$picture,
            'price' => $price,
            'stock' => $stock,
            ]);
        return $reference;
    }

function pictureUpload($picture){
    if(isset($_FILES['picture']) AND !empty($_FILES['picture']['name'])){
        
        $tailleMax = 2097152;
        $extensionsValides = array('jpg', 'gif', 'jpeg', 'png');

        if($_FILES['picture']['size'] <= $tailleMax){

            $extensionsUpload = strtolower(substr(strrchr($_FILES['picture']['name'], '.'), 1));
            
            if(in_array($extensionsUpload, $extensionsValides)){

                $chemin = "../photo/picture/". $_SESSION['user']->getLogin() . "." . $extensionsUpload;
                $result = move_uploaded_file($_FILES['picture']['tmp_name'], $chemin);             

                if($result){
                       
                    $updateAvatar = $this->pdo->prepare('UPDATE users SET picture = :picture WHERE id = :id');
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


}



public function add()
{
    $erreur = '';
    if (!empty($_POST)) {
        if (!empty($_FILES['image_path'])) {
            $img = $_FILES['image_path'];
            $ext = strtolower(substr($img['name'], -3));
            $allow_ext = ['jpg', 'png', 'gif'];
            if (in_array($ext, $allow_ext)) {
                move_uploaded_file($img['tmp_name'], ROOT . '\app\src\images\\' . $img['name']);
                $result = $this->Product->create(
                    [
                        'title' => $_POST['title'],
                        'id_sous_categories' => $_POST['id_sous_categories'],
                        'description' => $_POST['description'],
                        'image_path' => $img['name'],
                        'price' => $_POST['price'],
                        'stock' => $_POST['stock']
                    ]
                );
                $_FILES['image_path'] = '';
                if ($result) {
                    return $this->index();
                }
            } else {
                $erreur = "Votre fichier n'est pas une image";
            }
        }
    }
    
}





/****** Gestion des produits ******/
public function ajouter_produit($nom, $prix, $description, $image, $stock, $valorisation, $id_categorie, $id_sous_categorie, $date_ajout){
  # Ajoute un produit dans le site sans nécessairement le mettre dans une catégorie
  $produit = $this->db->query("INSERT INTO produits(nom, prix, description, image, date_ajout, stock, valorisation, id_categorie, id_sous_categorie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ", 
  [$nom,
  $prix,
  $description,
  $image,
  $date_ajout,
  $stock,
  $valorisation,
  $id_categorie,
  $id_sous_categorie]);
}

public function delete($id_client){
  $supp = $this->db->query("DELETE FROM utilisateurs WHERE id = ?", [$id_client]);
  $location = App::redirect('admin.php');
}

public function change_admin($boleen, $id_client){
  $change = $this->db->query("UPDATE utilisateurs SET admin = ? WHERE id = ?", [$boleen, $id_client]);
  $location = App::redirect('admin.php');
}

public function creer_categorie($new_categorie){
  $new_categorie = $this->db->query("INSERT INTO categorie(nom, nom_header) VALUES ?, ?", [$new_categorie, $new_categorie]);
}




}