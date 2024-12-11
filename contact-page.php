<?php /* Template Name: Contact Page */ get_header(); ?>

<?php
if ( isset($_GET['sent']) ){
	if ( $_GET['sent'] == '1'){
		echo "<p> ✔ Formulario enviado correctamente</p><br>";
	}
	else {
		echo "<p> Hubo un error al enviar</p><br>";
	}
}
?>

  <form method="post" action="<?php echo admin_url( 'admin-post.php' ) ?>" >

      <div class="blockdetexte">
	    <label  for="name">Nom et prénom</label>
	  <input type="text" name="name" id="name" required>
    </div>
	

    <div class="blockdetexte">
	  <label  for="email">E-mail</label>
	  <input type="email" name="email" id="email" required>
    </div>

	
      <div class="blockdetexte">
	  <label for="message">Message</label>
	<textarea name="message" id="message" cols="30" rows="10" required></textarea>
    </div>


	<p><input type="checkbox" id="terms" name="terms" required><a href="#">Accepter les conditions</a></p>

	<br>
	<input type="hidden" name="action" value="process_form">
	<input type="submit" name="submit" value="Envoyer">
</form>



<?php get_footer(); ?>