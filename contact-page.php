<?php /* Template Name: Contact Page */ 



// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez le nonce pour la sécurité
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form')) {
        die('Erreur : vérification de sécurité échouée.');
    }

    // Récupérer et sécuriser les données
    $prenom = sanitize_text_field($_POST['prenom']);
    $nom = sanitize_text_field($_POST['nom']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    // Vérifier que tous les champs sont remplis
    if ($prenom && $nom && $email && $message) {
        // Préparer et envoyer l'email
        $to = 'votre-email@domaine.com'; // Remplacez par votre adresse email
        $subject = "Nouvelle demande de contact";
        $body = "
            Prénom : $prenom
            Nom : $nom
            Email : $email

            Message :
            $message
        ";
        $headers = ['Content-Type: text/html; charset=UTF-8', 'From: Mon Site <noreply@domaine.com>'];

        // Envoyer l'email
        if (wp_mail($to, $subject, nl2br($body), $headers)) {
            $notification = "Merci de nous avoir contactés, nous allons traiter votre demande dans les plus brefs délais.";
        } else {
            $notification = "Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer.";
        }
    } else {
        $notification = "Veuillez remplir tous les champs obligatoires.";
    }
}

get_header(); ?>

<div class="container my-5">
    <div class="text-center">
        <h2>Contact</h2>
        <p>Vous avez une question ou une demande ? Remplissez le formulaire ci-dessous et nous vous répondrons rapidement.</p>
    </div>

    <!-- Notification -->
    <?php if (!empty($notification)): ?>
        <div class="alert alert-info text-center">
            <?php echo esc_html($notification); ?>
        </div>
    <?php endif; ?>

    <!-- Formulaire de contact -->
    <form method="POST" action="" class="formulaire-contact-form mx-auto" style="max-width: 600px;">
        <?php wp_nonce_field('contact_form', 'contact_nonce'); ?>

        <!-- Prénom et Nom -->
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom *</label>
            <input type="text" id="prenom" name="prenom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom *</label>
            <input type="text" id="nom" name="nom" class="form-control" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email *</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <!-- Message -->
        <div class="mb-3">
            <label for="message" class="form-label">Message *</label>
            <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
        </div>

        <!-- Bouton Envoyer -->
        <button type="submit" class="btn btn-primary w-100">Envoyer</button>
    </form>
</div>

<?php get_footer(); ?>
