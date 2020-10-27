<section id="bienvenidos">
    <h2>BIENVENIDOS A NUESTRA PÁGINA OFICIAL</h2>
    <p style="width: 70%; margin: auto;">En el Centro Veterinario AVIERM contamos con un equipo de veterinarios con una larga trayectoria profesional, también contamos con la colaboración de especialistas veterinarios, que complementan nuestros servicios, para ofrecer a tu mascota un diagnóstico y un tratamiento adecuado sea cual sea su patología.</p>
</section>
<section id="noticias-index">
    <h3>NOTICIAS</h3>
    <div class="contenedor">
        
        <?php

            $noticia = new Noticia();
            $noticia -> mostrarNoticia();

        ?>
        
    </div>
</section>