        <section id="galeria-index">
            <h3>GALERÍA</h3>
            <div class="contenedor">
                <?php

                    $fotos = new Galeria();
                    $fotos -> mostrarGaleria();

                ?>
            </div>
        </section>
        <section id="productos-index">
            <h3>PRODUCTOS</h3>
            <div class="contenedor">
                <div class="cont-productos">
                    <article id="productos">
                        <img src="views/img/collar.jpg" alt="">
                        <h4>Collar</h4>
                    </article>
                </div>
                <div class="cont-productos">
                    <article id="productos">
                        <img src="views/img/pelota-perro.jpg" alt="">
                        <h4>Pelota</h4>
                    </article>
                </div>
                <div class="cont-productos">
                    <article id="productos">
                        <img src="views/img/rascador.jpg" alt="">
                        <h4>Rascador</h4>
                    </article>
                </div>
                <div class="cont-productos">
                    <article id="productos">
                        <img src="views/img/perrarina.jpg" alt="">
                        <h4>Perrarina K-NINA</h4>
                    </article>
                </div>
            </div>
        </section>
    </main>