<?php
    $oldId = $fraisAModif['id'];
    $oldLibelle = $fraisAModif['libelle'];
    $oldMontant = $fraisAModif['montant'];
?>

<div class="col-md-6">
	<div class="content-box-large">
		<div class="panel-heading">
			<legend>Modifier Frais Forfait</legend>			
		</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" action="index.php?uc=modifierFraisForfait&action=modifierFraisForfait" method="post">
                                        
                                
				<div class="form-group">
					<div class="form-group">
                                        <input type="hidden" name="oldId" <?php echo'value="'.$oldId.'"' ?> /> 
					<label for="txtDateHF"> ID : </label>
					</br>
					<input class="form-control" type="text" id="txtId" name="idFrais" <?php echo'placeholder="'.$oldId.'"' ?> />
					</br></br>
					<label for="txtLibelleHF">Libellé</label>
					</br>
					<input class="form-control" type="text" id="txtLibelleHF" name="libelle" <?php echo'placeholder="'.$oldLibelle.'"' ?> />
					</br></br>
					<label for="txtMontantHF">Montant : </label>
					</br>
					<input class="form-control" type="text" id="txtMontantHF" name="montant" <?php echo'placeholder="'.$oldMontant.'"' ?> />
					</br></br>
					</div>
				</div>
			<div class="horizontal-form">
				<input class="btn btn-primary" id="ajouter" type="submit" value="Modifier"/>
				<input class="btn btn-primary" id="effacer" type="reset" value="Effacer" />    
			</div>
        
			</form>
							
		</div>
	</div>
</div>





