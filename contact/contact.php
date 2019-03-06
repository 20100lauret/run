<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_client', 'root', '');

if(isset($_POST['forminscription']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2'])   
     AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
    
    $pseudolenght = strlen($pseudo);
    if($pseudolenght<= 255)
    {
        if($mail==$mail2)

        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
        {

        
           if($mdp==mdp2)
           {
             $insertmbr = ("insert into menbres(pseudo,mail,motdepasse) VALUES(?,?,?)")
           }
           else{
           
             $erreur = "Vos mots de passe corespondent pas!";
           }
         
        }
        else{

            $erreur = "Votre adresse mail n'est pas valide!";
        }
        }
        else{
        
            $erreur = "Vos adresses mail ne coresponde pas!";
        }
    }
    else{
    
        $erreur = "Votre pseudo ne doit pas dépasser 255 caractères!";
    }
    }
    else
    {
        $erreur = "Tous les doivent ètre complétés!";
    }



?>
<html>
    <head>
           <titre></titre>
           <meta charset="utf8">

    </head>
    <body>
        <div align="center">
           <h2>Inscription</h2>
           <br/><br/>
           <form methode="POST" action="" >
              <table>
                <tr>
                    <td align="right">
                     <label for="pseudo">Pseudo:</label>
                    </td>
                    <td>
                     <input type="text" placeholder="Votre
                        pseudo" id="pseudo" name="pseudo"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                     <label for="mail">Mail:</label>
                    </td>
                    <td>
                     <input type="email" placeholder="Votre
                        mail" id="mail" name="mail"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                     <label for="mail2">Confirmation du mail:</label>
                    </td>
                    <td>
                     <input type="email" placeholder="Confirmez votre mail
                        " id="mail2" name="mail2"/>
                    </td>
                </tr>
                 
                <tr>
                    <td align="right">
                     <label for="mdp">Mot de passe:</label>
                    </td>
                    <td>
                     <input type="password" placeholder="votre mot de passe 
                        " id="mdp" name="mdp"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                     <label for="mdp2">Confirmation du mot de passe:</label>
                    </td>
                    <td>
                     <input type="password" placeholder="Confirmez votre mdp
                        " id="mdp2" name="mdp2"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center">
                        <br />
                    <input type="submit" name="forminscription" value="Je m'inscris"/>
                    </td>
                </tr>

              </table>
              

           </form>  
           <?php
               if(isset($erreur))
               {
                   echo '<font color="red">'.$erreur."</font>";
               } 

           ?>    
        </div>
    </body>
</html>