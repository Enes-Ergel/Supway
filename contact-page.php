<?php
/* Template Name: Contact Page */

// Fonction pour afficher les messages
function display_message($message, $type = 'success') {
    return "<div class='message $type'>$message</div>";
}

// Variables pour stocker les messages d'erreur/succès
$form_message = '';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Vérification du nonce
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form')) {
        $form_message = display_message('Erreur de sécurité', 'error');
    } else {
        // Récupération et nettoyage des données
        $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
        $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
        $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';
        
        // Validation des données
        if (empty($name) || empty($email) || empty($message)) {
            $form_message = display_message('Veuillez remplir tous les champs', 'error');
        } elseif (!is_email($email)) {
            $form_message = display_message('Veuillez entrer une adresse email valide', 'error');
        } else {
            // Préparation de l'email
            $to = 'ergelenes24@gmail.com';
            $subject = 'Nouveau message de contact de ' . $name;
            $headers = array(
                'Content-Type: text/html; charset=UTF-8',
                'From: ' . $email,
                'Reply-To: ' . $email
            );
            
            $email_content = "
                <html>
                <head><title>Nouveau message de contact</title></head>
                <body>
                    <h2>Nouveau message de contact</h2>
                    <p><strong>Nom:</strong> {$name}</p>
                    <p><strong>Email:</strong> {$email}</p>
                    <p><strong>Message:</strong></p>
                    <p>{$message}</p>
                </body>
                </html>
            ";
            
            // Envoi de l'email
            $sent = wp_mail($to, $subject, $email_content, $headers);
            
            if ($sent) {
                $form_message = display_message('Message envoyé avec succès !');
            } else {
                $form_message = display_message('Erreur lors de l\'envoi du message.', 'error');
            }
        }
    }
}

// Début du template
get_header();
?>

<div class="contact-page-wrapper">
    <?php if ($form_message) : ?>
        <?php echo $form_message; ?>
    <?php endif; ?>

    <form method="post" class="contact-form" action="<?php echo esc_url(get_permalink()); ?>">
        <?php wp_nonce_field('contact_form', 'contact_nonce'); ?>
        
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="<?php echo isset($_POST['name']) ? esc_attr($_POST['name']) : ''; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" rows="5" required><?php echo isset($_POST['message']) ? esc_textarea($_POST['message']) : ''; ?></textarea>
        </div>
        
        <button type="submit" name="submit">Envoyer</button>
    </form>
</div>

<?php get_footer(); ?>