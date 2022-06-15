<?php

class Personne{
    //1 class personne
    private $login;
    private $titre;
    private $nom;
    private $prenom;


    // 2 method bienvenu
    public function bienvenu(){
        echo "Bienvenu ".$this->prenom." ".$this->nom."<br>";

    }
     static public function authentifiler(){
        if(isset($_SESSION['login']) AND isset( $_SESSION['password'])){
            echo "Vous etes authentifier";

    }}
    public function save_session(){
        $_SESSION['login']=$this->login;
        $_SESSION['password']=$this->password;
    }
    
    static public function findAll(){
        $sql="SELECT * FROM personne";
        $result=mysqli_query($GLOBALS['conn'],$sql);
        $personnes=array();
        while($row=mysqli_fetch_assoc($result)){
            $personnes[]=new Personne($row['login'],$row['password']);
        }
        return $personnes;

    }





}

echo "<h1>Formulaire de saisie de login et mot de passe</h1>";
echo "<form action='' method='POST'>";
echo "<label>Login</label>";
echo "<input type='text' name='login'><br>";
echo "<label>Password</label>";
echo "<input type='password' name='password'><br>";
echo "<input type='submit' value='Login'>";
echo "<input type='reset' value='annlez'>";
echo "</form>";

$login=$_POST['login'];
$password=$_POST['password'];
if(isset($login) AND isset($password)){
    $personne=new Personne($login,$password);
    $personne->save_session();
    $personne->bienvenu();
    $personne->authentifiler();
}

?>
