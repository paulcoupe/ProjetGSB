<div class="col-md-6">
	<div class="content-box-large">
		<div class="panel-heading">
			<legend>Nouveau Frais Forfait</legend>			
		</div>
            
                
		<div class="panel-body">
			<form class="form-horizontal" role="form" action="index.php?uc=modifierFraisForfait&action=creationFraisForfait" method="post">
				<div class="form-group">
					<div class="form-group">
					<label for="txtDateHF"> ID : </label>
					</br>
					<input class="form-control" type="text" id="txtId" name="idFrais" maxlength="3"/>
					</br></br>
					<label for="txtLibelleHF">Libellé</label>
					</br>
					<input class="form-control" type="text" id="txtLibelle" name="libelle"/>
					</br></br>
					<label for="txtMontantHF">Montant : </label>
					</br>
					<input class="form-control" type="text" id="txtMontant" name="montant"/>
					</br></br>
					</div>
				</div>
			<div class="horizontal-form">
				<input class="btn btn-primary" id="ajouter" type="submit" value="Ajouter"/>
				<input class="btn btn-primary" id="effacer" type="reset" value="Effacer" />    
			</div>
        
			</form>
							
		</div>
	</div>
</div  
