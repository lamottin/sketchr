<div class="columns content-container">
	<div class="large-11 columns">
	    <div class="row">
				<div class="large-12 columns">
					<h5>ADD SKETCH TYPE</h5>
				</div>
		</div>

		<div class="row">
			<form method="post" action="<?php echo base_url(); ?>sketchtype/add/">
				<div class="large-8 columns">
						
					<?php 
					
					//Champ titre
					echo "<label class=\"control-label\" for=\"title\">Title</label>";
					echo "<input type=\"text\" name=\"title\" placeholder=\"Type the title here\" value=\"" .set_value('title')."\" class=\"error\" id=\"title\"/>";	
					$error_title = form_error('title'); //R�cup�re l'erreur si jamais le champ est mal rempli se lon les r�gles d�finies dans le controller
					$label = (!empty($error_title)) ? "<small class=\"error\">".$error_title."</small>" : "" ; //Cr�e une alerte avec l'erreur r�cup�r�e auparavant
					echo $label; //Affiche l'alerte
					
					//Champ Start date
					echo "<label class=\"control-label\" for=\"start_date\">Start date</label>";
					echo "<input type=\"text\" name=\"start_date\" placeholder=\"Please select a start date\" value=\"".set_value('start_date') ."\" class=\"datepicker error\" id=\"start_date\"readonly='true'/>";
					$error_start_date = form_error('start_date');//R�cup�re l'erreur si jamais le champ est mal rempli se lon les r�gles d�finies dans le controller
					$label = (!empty($error_start_date)) ? "<small class=\"error\">".$error_start_date."</small>" : ""; //Cr�e une alerte avec l'erreur r�cup�r�e auparavant
					echo $label;//Affiche l'alerte
					
					//Champ Image
					echo "<label class=\"control-label\" for=\"image\">Image</label>";
					echo "<input type=\"text\" name=\"image\" placeholder=\"Type the URL here\" value=\"". set_value('image') ."\" class=\"error\" id=\"image\"/>";
					$error_image = form_error('image');//R�cup�re l'erreur si jamais le champ est mal rempli se lon les r�gles d�finies dans le controller
					$label = (!empty($error_image)) ? "<small class=\"error\">".$error_image."</small>" : "" ; //Cr�e une alerte avec l'erreur r�cup�r�e auparavant
					echo $label;//Affiche l'alerte
					
					//Champ Synopsis
					echo "<label class=\"control-label\" for=\"synopsis\">Synopsis</label>";
					echo "<textarea rows=\"5\" name=\"synopsis\" class=\"error\" id=\"synopsis\">"; $value = set_value('synopsis'); $value = (!empty($value)) ? $value : "Type the synopsis here"; $value .= "</textarea>";
					echo $value; //Affiche le textarea
					$error_synopsis = form_error('synopsis');//R�cup�re l'erreur si jamais le champ est mal rempli se lon les r�gles d�finies dans le controller
					$label = (!empty($error_synopsis)) ? "<small class=\"error\">".$error_synopsis."</small>" : "" ; //Cr�e une alerte avec l'erreur r�cup�r�e auparavant
					echo $label;//Affiche l'alerte

					//Champ Category					
					echo "<label class=\"control-label\" for=\"category\">Category</label>";
					$value = set_value('category'); //R�cup�re l'ancienne valeur saisie pour res�lectionner la valeur saisie par l'utilisateur si il y a une erreur dans le formulaire.
					$select_category = "<select name=\"category\" class=\"required\" id=\"category\">";
					$select_category .= "<option>Veuillez s&eacute;lectionner une cat&eacute;gorie...</option>";
						foreach($categories as $category):
							if($category->id == $value) //S�lectionne le choix de l'utilisateur. ca l'�vite d'avoir � le refaire.
								$select_category .= "<option selected =\"selected\" value=\"".$category->id ."\">".$category->title ."</option>";
							else //Cas par d�faut
								$select_category .= "<option value=\"".$category->id ."\">".$category->title ."</option>";
						endforeach;
					$select_category .= "</select>";
					echo $select_category;
					
					//Champ Humorists
					echo "<label class=\"control-label\" for=\"humorist\">Humorists</label>";
					$select_humorists = "<select name=\"humorist\" style=\"height: 100px;\" multiple=\"multiple\" class=\"required\">";
						foreach($humorists as $humorist):
							$select_humorists .= "<option value=\"". $humorist->id ."\">". $humorist->last_name ." ".$humorist->first_name ."</option>";								
						endforeach;
					$select_humorists .= "</select>";
					echo $select_humorists;
					?>
					<input type="submit" name="create" class="button" value="Create" /> 
				</div>
			</form>
		</div>
	</div>
</div>