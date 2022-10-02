<!-- <form method="post" action="" style="display: inline-block" onsubmit="return confirm('Voulez vous vraiment supprimer ?')">
                                                                    <input type="hidden" name="id" value="<?php echo $row['idPersonne']?>">
                                                                    <input type="submit" value="OUI" class="btn btn-danger">
                                                                
                                                                </form> -->




<?php
    require("connexion.php");
    $message="";
    $id=$_GET['id'];

        $sqlDeleteClient="DELETE From compteclient where idPersonne = :idPersonne";

        $statement=$pdo->prepare($sqlDeleteClient);

        $resultat=$statement->execute(array(":idPersonne"=>$id));
        if ($resultat) 
        {
            $message='<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Suppression effectué avec succès</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            header("location:client.php");
        }
        else 
        {
            $message='<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Une erreur s\'est produite.Veuillez réessayer !!!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
   
?>