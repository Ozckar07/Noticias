<body>
<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1>PUBLICACIONES</h1>
      <p>Ingresar la informacion solicitada</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>noticias</li>
        <li><a href="#">
            <?=$titulo?> noticia
          </a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="row">
          <div class="col-lg-6">
            <div class="well bs-component">
              <form class="form-horizontal" method="POST" action="?c=noticia&a=Guardar">
                <fieldset>

                  <legend>
                    <?=$titulo?> noticia
                  </legend>
                  <div class="form-group">
                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getid_noticias()?>">


                    <label class="col-lg-2 control-label" for="titulo">titulo</label>
                    <div class="col-lg-10">
                      <input required class="form-control" name="titulo" type="text" placeholder="titulo"
                        value="<?=$p->gettitulo_noticias()?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="contenido">contenido</label>
                    <div class="col-lg-10">
                      <input required class="form-control" name="contenido" type="text" placeholder="contenido"
                        value="<?=$p->getcontenido_noticias()?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="autor">autor</label>
                    <div class="col-lg-10">
                      <input required class="form-control" name="autor" type="txt" placeholder="autor"
                        value="<?=$p->getautor_noticias()?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="seccion">seccion</label><br>

                    <select name="seccion">
                      <option value="<?=$p->getseccion_noticias()?>"><?=$p->getseccion_noticias()?></option>
                      <option value="DEPORTE">DEPORTE</option>
                      <option value="ENTRETENIMIENTO">ENTRETENIMIENTO</option>
                      <option value="CIENTIFICO">CIENTIFICO</option>
                      <option value="CLASIFICADOS">CLASIFICADOS</option>
                    </select>
                  </div>



                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="imagen">imagen</label>
                    <div class="col-lg-10">
                      <input required class="form-control" name="imagen" type="text" placeholder="imagen"
                        value="<?=$p->getimagen_noticias()?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="estado">estado</label>
                    <div class="col-lg-10">
                      <input required class="form-control" name="estado" type="checkbox" placeholder="estado"
                        value="<?=$p->getestado_noticias()?>">
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