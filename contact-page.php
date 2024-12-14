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
	<div class="container-fluid">
	<h1 class="titrenouscontacter">Nous contacter</h1>
	<div class="row">
	<div class="col-12 col-lg-6 order-2 order-lg-1">
		<img class="image-nouscontacter img-fluid ms-2 pt-0" src="<?php echo get_template_directory_uri();?>/assets/img/image-nouscontacter 1.svg">
	</div>
	<div class="col-12 col-lg-6 order-1 order-lg-2">
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

	<div class="d-flex justify-content-center align-items-center h-100 mb-5">
	<input type="hidden" name="action" value="process_form">
	<input type="submit" name="submit" value="Envoyer">
	</div>
</form>
		
</div>
</div>
</div>

<?php get_footer(); ?>