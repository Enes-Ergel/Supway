<?php wp_footer(); ?>

<footer clas = "row row-col-5 py-5 border-top"style="background-color: #cae9eb">
    <div class="col">
       <div class="mt-auto container-fluid m-O p-0">
       <a href="<?php echo esc_url(get_permalink(get_page_by_path('/contact'))); ?>" class="nouscontacter">Nous contacter</a>
    </div>
    <div class="col">
       <a href="<?php echo esc_url(get_permalink(get_page_by_path('/mentions-legales'))); ?>" class="">Mentions légales</a>
    </div>
</footer>
</div>
</body>
</html>