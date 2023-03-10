
          <div class="col-lg-3 col-sm-6">
            <div class="card card-plain">
              <div class="card-header p-0 position-relative">
                <a class="d-block blur-shadow-image">
                  <img src="assets/img/examples/testimonial-6-2.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
                </a>
              </div>
                
              <div class="card-body px-0">
                <h5>
                  <a href="javascript:;" class="text-dark font-weight-bold"><?=$p->titulo_noticias?></a>
                </h5>
                <p>
                <?=$p->contenido_noticias?>
                </p>
                <div class="col-auto">
                    <span class="h6"><?=$p->autor_noticias?></span>
                    <br>
                    <span><?=$p->fecha_noticias?></span>
                  </div>
                <a href="?c=noticia&a=comentarios" class="text-info text-sm icon-move-right">Read More
                  <i class="fas fa-arrow-right text-xs ms-1"></i>
                </a>
              </div>
            </div>
          </div>

          <?php foreach($this->modelo->ObtenerNoticiaComentario() as $r):?>
            <li>
      <p><?php echo $r->contenido_comentarios ?></p>
      <p>Escrito por: <?php echo $r->id_usuarios ?></p>
    </li>
          <?php endforeach;?>