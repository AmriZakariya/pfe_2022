<?php
function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="ecommerce";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     /* echo "Connected successfully";*/
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
//selection des categories
   function getAllcategories(){
    $conn=connect();
    $req="select * from categories";
    $res=$conn->query($req);
    $categories=$res->fetchall();
    return $categories;
 }
//selection des produits
function getAllproducts(){
    $conn = connect();
    $req="select * from produits";
    $res=$conn->query($req);
    $produits=$res->fetchall();
    return $produits;

}
//recherche d'un produit
function searchproduit($keyword){
    $conn=connect();
    $req="select * from produits where nom like '%$keyword%'";
    $res=$conn->query($req);
    $produits=$res->fetchall();
    return $produits;
}
//selection des infos produit
function getproduitByid($id)
{
    $conn=connect();
    $req="select * from produits where id=$id";
    $res=$conn->query($req);
    $produit=$res->fetch();//un seul_produit
    return $produit;
}
 function AddUser($data){
    $conn=connect();
 //cryptage du mp par la fonction du cryptage md5();
 $mphash=md5($data['mp']);
 $req="INSERT INTO utilisateur(nom,prenom,telephone,email,mp)
 VALUES('".$data['nom']."','".$data['prenom']."'
 ,'".$data['tel']."','".$data['mail']."','".$mphash."')";
$res=$conn->query($req);
if($res) return true;
else return false;
 }
//verification des infos de connexion
function ConnectUser($data)
{
    $conn=connect();
$mail=$data['email'];
$mp=md5($data['mp']);
$req="SELECT * FROM utilisateur WHERE email='$mail' AND mp='$mp'";
$res=$conn->query($req);
$user=$res->fetch();
return $user;
}

function ConnectAdmin($data)
{
    $conn=connect();
    $mail=$data['email'];
    $mp=md5($data['mp']);
    $req="SELECT * FROM administrateur WHERE email='$mail' AND mp='$mp'";
    $res=$conn->query($req);
    $user=$res->fetch();
    return $user; 
}















 ?>