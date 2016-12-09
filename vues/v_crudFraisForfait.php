<div class="col-md-6">
	<div class="content-box-large">
		<div class="panel-heading">
                    
			<div class="panel-title"><h2></h2></div>
                            </br></br>
                        <legend>CRUD Frais Forfait</legend>			
		</div>
            
		<div class="panel-body">
                    <table class="table">                      
                        <tr>
                            <th class="id">ID</th>
                            <th class="libelle">Libellé</th>  
                            <th class="montant">Montant</th> 
                            <th class="vide"></th> 
                        </tr>
                                         
                    <?php    
			foreach( $lesFraisForfait as $unFraisForfait) 
			{
                            $id = $unFraisForfait['id'];
                            $libelle = $unFraisForfait['libelle'];
                            $montant=$unFraisForfait['montant'];			
                    ?>	
                    
                    <tr>
			<td><?php echo $id ?></td>
			<td><?php echo $libelle ?></td>
			<td><?php echo $montant ?></td>
                        <td>
                            <?php 
                                echo '<a href="index.php?uc=modifierFraisForfait&action=supprimerFraisForfait&idSupprimer='.$id.'"'
                                        . 'onclick="return confirm(\'Voulez-vous vraiment supprimer ce frais?\');">Supprimer ce frais</a></td>';
				
                                ?>
                        </td>
                        <td>
                            <?php 
                                echo '<a href="index.php?uc=modifierFraisForfait&action=afficheModification&id='.$id.'"'
                                        . 'onclick="return confirm(\'Voulez-vous vraiment modifier ce frais?\');">Modifier</a></td>';
				
                                ?>
                        </td>
                    </tr> 
                        <?php		 
                                }  
                        ?>
                                                           
                    </table>
                </div>
	</div>
</div>