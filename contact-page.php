<?php /* Template Name: Contact Page */ 

// Vérification du formulaire
if(isset($_POST['submit'])) {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);
    
    $to = get_option('ergelenes24@gmail.com');
    $subject = 'Nouveau message de contact de ' . $name;
    $headers = array('From: ' . $email);
    
    $email_content = "Nom: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message";
    
    wp_mail($to, $subject, $email_content, $headers);

    if(wp_mail($to, $subject, $email_content, $headers)) {
        echo "Email envoyé";
    } else {
        echo "Erreur d'envoi";
    }
}

get_header(); ?>

<form method="post" class="contact-form">
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" rows="5" required></textarea>
    </div>

    <button type="submit" name="submit">Envoyer</button>
</form>
 
<?php get_footer(); ?>
