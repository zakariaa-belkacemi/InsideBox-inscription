<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="shortcut icon" type="image/x-icon"  href="/images/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="styles/style.css"> 
   
   
</head>
<body>
    <main> 
        <div class="container">
            <div class="im-div">
                <img class="main-img"   src="images/4396ac48f8c94c5f39b725ed7d750b2f.jpg" alt="">
            </div>
        <div class="inscription-div">
        <img class="brand-logo" src="images\1715127850-insidebox 1-01.webp" alt="brand logo">
        <h2>sign up to InsideBox</h2>
        <p class="head-paragraph">Formulaire d'inscription</p>
        <form id="form" method="get" >
            
        <?php
        $valide=false;
        $host="localhost";
        $user = "root"; 
        $password = "";
        $dbname = "inscription";
        $conn =  mysqli_connect ($host, $user, $password, $dbname);
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
    //   echo "Connected Succefully";
 $nomError = "";
        $nomValide ="";
        $prenom = "";
        $emailValide = "";
        $emailError = "";
        $ageValide = "";
        $ageError = "";
        $mdpError = "";
        $mdpValide = "";
        $confirmMdpError= "";
        $confirmMdpValide= "";



        function traiter_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }

 if (isset($_GET['button'] )) {
$nom = traiter_input(($_GET ['nom']));
$prenom = traiter_input(($_GET ['prenom']));
$email =  traiter_input( ($_GET ['email']));
$age =  traiter_input( ($_GET ['age']));
$mdp =  traiter_input( ($_GET ['mdp']));
$confirmmdp =  traiter_input( ($_GET ['confirmmdp']));


if (empty($nom)) {
  $nomError = "*Nom obligatoire <br>";
  $valide=false;

}else
{
  $nomValide =  "Le nom:  $nom  <br>";
  $valide=true;
  }
  if (!empty($prenom)) {
  $prenom =  $prenom ;
  $valide=true;
} 
if (empty($email)) {
  $emailError="*Email obligatoire <br> ";
   $valide=false;
   }elseif (filter_var($email,FILTER_VALIDATE_EMAIL) == false) {
    $emailError= "L'email doit etre correct ";
     $valide=false;
} 
   else {
    $emailValide= "L'email:  $email  <br>";
     $valide=true;
   } 
 
if (!is_numeric($age)) {
    $ageError = "*L'âge doit être un nombre <br>";
}
elseif ($age<0 ) {
    $ageError = "*L'âge doit être un nombre positif <br>";
}
else{
$ageValide ="L'âge:  $age  <br>";
}


if (empty($mdp) ){
    $mdpError = "*Champ obligatoire <br>";
     }
     elseif(  strlen($mdp) < 6) {
        $mdpError  = "*Le mot de passe doit contenir <br> au moins 6 caractères <br>";
    }
     else {
        $mdpValide  =  "Le mot de passe est valide <br>";
     }


if (($mdp != $confirmmdp) && !empty($confirmmdp) ) {
    $confirmMdpError= "*Les mots de passe ne correspondent pas <br>";
}
else if(!empty($confirmmdp)) {
    $confirmMdpValide= "Les mots de passe correspondent <br>";
}elseif (empty($confirmmdp)) {
    $confirmMdpError= "*veuillez confirmer votre mot <br> de passe <br>";
}
 }
 if ($valide==true) {
 mysqli_query($conn, "SELECT * FROM `register`");
 mysqli_query($conn,"INSERT INTO register (nom, prenom, email) VALUES ('$nom', '$prenom', '$email')");
 mysqli_close($conn);
  header("Location: redirection.php?nom=$nom&prenom=$prenom&email=$email&age=$age");
 exit();
 
 }

?>
              <div class="div">
                    <label for="nom">Nom* :</label>
                    <input  name="nom" id="nom"  type="text" placeholder="entrer votre nom" > 
                    <span id="error-name"><?php echo $nomError ?></span> 
                    <span class="valide"> <?php  echo $nomValide?></span>
                   </div>

                   <div class="div">
                    <label for="prenom">Prenom :</label>
                    <input  name="prenom" id="prenom"  type="text" placeholder="entrer votre prenom">
                    <span class="prenom-valide" name="prenom"><?php echo $prenom ?></span> 
                    
                   </div>


                   <div class="div">
                    <label for="email">Email* :</label>
                    <input  name="email" id="email"  type="text" placeholder="exemple@gmail.com"> 
                    <span id="error-email"> <?php echo $emailError  ?></span>
                    <span class="valide"> <?php  echo $emailValide?></span>
                   </div>

                   <div class="div">
                    <label for="age">Age :</label>
                    <input  name="age" id="age"  type="text" placeholder="entrer votre age"> 
                    <span id="error-age"> <?php echo $ageError ?></span>
                    <span class="valide"> <?php echo $ageValide ?></span>
                   </div>
                
                  <div class="div">
                    <label  for="mdp">mot de passe* :</label>
                    <input name="mdp" id="mdp" placeholder="entrer un mot de passe" type="password">
                    <span class="material-icons" id="toggleMdp">visibility_off</span>
                    <span id="error-mdp"> <?php echo $mdpError ?></span>
                    <span class="valide"><?php echo $mdpValide ?></span>
                </div>
                <div class="div">
                    <label class="text-mdp"  for="confirmmdp">Confirmation du mot <br> de passe* :</label>
                    <input name="confirmmdp" id="confirmmdp" placeholder="confirmer le mot de passe" type="password">
                    <span class="material-icons" id="toggleMdp">visibility_off</span>
                    <span id="error-confirmmdp"> <?php echo $confirmMdpError ?></span>
                    <span class="valide-confirm"> <?php echo $confirmMdpValide ?></span>
                </div>
                
                <input class="button" name="button" type="submit" value="s'inscrire" >
                
                
        </div>

        </div>
    </form>
    </main>
  

</body>
</html>