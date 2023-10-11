 

<p>

    Donnez votre idée de recette de tacos.
    <form method='post' action=''>
        <div class="form-group"> 
            <input placeholder="Adresse mail" name="email" size=50></input>
       </div> 
       <div class="form-group">
	    <input placeholder="Idée" name="idee" size=50></input><button class="btn btn-default" type="submit" name='submit'>Soumettre </button>
       </div>
   </form>
 

<?php
include('vendor/twig/twig/lib/Twig/Autoloader.php');
if (isset($_POST['email']) and isset($_POST['idee'] ) ) {
    $email=$_POST['email'];
    $idee=$_POST['idee'];
    Twig_Autoloader::register();
    try {
        $loader = new Twig_Loader_String();
        $twig = new Twig_Environment($loader);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){  
        $result= $twig->render("Merci {$email} votre idée de {$idee} à été envoyées\n");
	echo $result;
	}
	else{
		echo("Ce n'est pas un mail valide\n");
	}

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

/*if (isset($_POST['idee']) ) {
    $idee=$_POST['idee'];

    Twig_Autoloader::register();
    try {
        $loader = new Twig_Loader_String();
        $twig = new Twig_Environment($loader);

        $result= $twig->render("\nMerci, votre idée de {$idee} a été enregistrée");
        echo $result;

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}*/


?>
</p>

