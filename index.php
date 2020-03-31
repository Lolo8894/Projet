<!---------------------------------------------------------------------------
  ---------------------------------- PHP 7 ----------------------------------
  -------------------------------------------------------------------------->

<?php
  $prenom = $nom = $email = $message ="";
  $prenomError = $nomError = $emailError = $messageError ="";
  $isSuccess = false;
      // isSuccess est un booléen et vérifie si la condition est fausse.
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $prenom = verifyInput($_POST["prenom"]);
      $nom = verifyInput($_POST["nom"]);
      $email = verifyInput($_POST["email"]);
      $message = verifyInput($_POST["message"]);

      // verifyInput est une sécurité du code quant à la saisie des champs.

      if(empty($nom)) {

        $nomError = "Donnes-moi ton nom s'il te plaît ^_^";
        $isSuccess = false;

      }

      if(empty($prenom)) {

        $prenomError = "Donnes-moi ton prénom s'il te plaît ^_^";
        $isSuccess = false;

      }

      if(!isEmail($email)) {

        $emailError = "Donnes-moi ton email pour que je puisse te répondre ^_^";
        $isSuccess = false;

      } // (!) signifie n'est pas un mail valide.

      if(empty($message)) {

        $messageError = "Tu n'es pas très bavard à ce que je vois ! ;-)";
        $isSuccess = false;

      }

      if($isSuccess) {

        // Envoi du mail.

      }
  
    }

  function isEmail($var) {

    return filter_var($var, FILTER_VALIDATE_EMAIL);

  } // vérifie si mail valide.

  function verifyInput($var) {

    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);

    // sécurité du code (ou nettoyage du code) : 
    // trim empêche des ajouts inutiles tels que des espaces dans les champs de saisi.
    // stripslashes enlève tous les \ (antislashes).
    // htmlspecialchars empêche la modif de l'URL et donc le hacking.

    return $var;
  }
?>
  <!-- $_SERVER = Variable Superglobale server -->

<!---------------------------------------------------------------------------
  ---------------------------------- HTML 5 ---------------------------------
  -------------------------------------------------------------------------->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href ="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Les créations de Lyline</title>
</head>
                                  BODY
<body> 
                           <!-- HEADER - NAVIGATION -->
  
  <header class="container">
    <h1 id= "logo"><a href="#image_principale">Les créations de Lyline</a><span class="violet">.</span></h1>
      <nav>
        <ul>
          <li><a class="nav" href="#image_principale"><span class="couleurs">.</span>Accueil</a></li>
          <li><a class="nav" href="#mes_creations"><span class="couleurs">.</span>Mes créations</a></li>
          <li><a class="nav" href="#a_propos"><span class="couleurs">.</span>Qui suis-je ?</a></li>
          <li><a class="nav" href="#formulaire"><span class="couleurs">.</span>Contact</a></li>
        </ul>
      </nav>
  </header>  
                            <!-- IMAGE PRINCIPALE -->
  <section id="image_principale">
      <h2 class="transparent">Bienvenue sur mon site !</h2>   
  </section>

    <br/><br/>
                            <!-- QUI SUIS-JE ? -->
  <section id="a_propos"> 
      <h2>Qui suis-je ?</h2>
      <p>Je suis dynamique, souriante, addicte de handmake, DIY (DoItYourself). 
        <br/><br/>
      <p>Frustrée par la mode proposée en magasins, je me suis prise de passion pour la conception de vêtements 
          réalisés au crochet et/ou au tricot.</p>
      <br/>
      <p>Mon blog vous présente mes créations mais, je fais aussi du sur mesure ! <br/><br/>Proposez-moi une idée à l'aide du formulaire de contact ci-dessous
          et je me ferais une joie de l'étudier. <br/><br/>Un besoin ? Un souhait ? Je ferai tout pour le concrétiser !</p>
      <br/>
      <p>Nous conviendrons ensemble de tous les détails en privée.</p>
      <br/><br/>
      <p class="salutations"> Mes amitiés à vous !</p> 
      <br/>
      <p class="signature">Lyline<span class="violet">.</span></p>
      <br/><br/>
  </section>

    <br/><br/>
                            <!-- CARROUSEL D'IMAGES  -->
    
    <section id="slider">
      <figure>
        <img src="images/borderlands-3-couv.jpg" alt="">
        <img src="images/Borderlands-3-Moxxis-Heist-Key-Art.jpg" alt="">
        <img src="images/Borderlands-3-trailer-Moze.jpg" alt="">
        <img src="images/borderlands-3-couv.jpg" alt="">
      </figure>
    </section>
  

    <br/><br/>
                          <!-- FORMULAIRE DE CONTACT -->  
                          
<section id="formulaire">
    <h3>Intéressé ? Contactez-moi !</h3> <br/>
  <div class="contact">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form"><br/>
    <p class="champs">
      <label for="nom"><span class="rouge">*</span>Nom :</label><br/>
      <input type="text" name="nom" placeholder="Votre nom" value="<?php echo $nom ?>" ></p>
    <p class="commentaires"><?php echo $nomError; ?></p>
    <br/>

    <p class="champs">
      <label for="prenom"><span class="rouge">*</span>Prénom :</label><br/>
      <input type="text" name="prenom" placeholder="Votre prénom" value="<?php echo $prenom ?>" ></p>
    <p class="commentaires"><?php echo $prenomError; ?></p>
    <br/>

    <p class="champs">
      <label for="email"><span class="rouge">*</span>Mail :</label><br/>
      <input type="text" name="email" placeholder="exemple@mail.com" value="<?php echo $email ?>"></p>
      <p class="commentaires"><?php echo $emailError; ?></p>
    <br/>

    <p class="champs">
      <label><span class="rouge">*</span>Votre message :</label><br/>
      <textarea name="message" placeholder="Votre message ici" value="<?php echo $message ?>"></textarea></p>
      <p class="commentaires"><?php echo $messageError; ?></p>  
    <br/>

    <input class="envoyer" value="Envoyer" type="submit">  
    <br/>
    <p class="info-requises"><span class="rouge">*</span>Ces informations sont requises</p>
    <br/>

    <p class="merci" style="display:<?php if($isSuccess) echo 'block'; else echo 'none'; ?>">Votre message a bien été envoyé ! Merci de m'avoir contacté.</p>
    <br/>
  </form>
  </div>
</section>
    <br/><br/>
                <!-- FOOTER -->
  <footer>    
      <h2>Ici il y aura le footer</h2> 
  </footer> 
</body>
</html>