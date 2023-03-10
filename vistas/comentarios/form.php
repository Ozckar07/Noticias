<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> comentarios</h1>
            <p>Ingresa los datos para registrar un comentario nuevo</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>comentarios</li>
              <li><a href="#"><?=$titulo?> comentario</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=comentario&a=Guardar">
                      <fieldset>
                        <legend><?=$titulo?>  comentario</legend>
                        <div class="form-group">
                            <input class="form-control" name="ID" type="hidden" value="<?=$p->getid_comentarios()?>">
                            <input class="form-control" name="usuarios" type="hidden" value="<?=$p->getid_noticias()?>">
                            <input class="form-control" name="noticias" type="hidden" value="<?=$p->getid_usuarios()?>">
                  
                            <label class="col-lg-2 control-label" for="titulo">titulo</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="titulo" type="text" placeholder="titulo comentario" value="<?=$p->gettitulo_comentarios()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="contenido">contenido</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="contenido" type="text" placeholder="contenido" value="<?=$p->getcontenido_comentarios()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="estado">estado</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="estado" type="checkbox" placeholder="estado" value="<?=$p->getestado_comentarios()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" type="reset">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>