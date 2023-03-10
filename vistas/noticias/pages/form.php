<body class="contact-us">

<section class="contact-us">
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('assets/img/illustrations/illustration-signin.jpg'); background-size: cover;" loading="lazy"></div>
          </div>
          <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg p-3">
                  <h3 class="text-white text-primary mb-0"><?=$titulo?> usuario</h3>
                </div>
              </div>
              <div class="card-body">
                <p class="pb-3">
                  Llena los datos y recibe boletines y noticias de ultima hora
                </p>

                <form method="POST" action="?c=usuario&a=Guardar" id="contact-form" autocomplete="off">
                <input class="form-control" name="ID" type="hidden" value="<?=$p->getid_usuarios()?>">
                  <div class="card-body p-0 my-3">
                    <div class="row">  

                      <div class="col-md-6 form-group">
                        <div class="input-group input-group-static mb-4">
                          <label  for="titulo">Nombre</label>
                          <input type="text" class="form-control" name="nombre" placeholder="Nombres Completos" value="<?=$p->getnombre_usuarios()?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="input-group input-group-static mb-4">
                          <label for="correo">correo</label>
                          <input type="email" class="form-control" name="correo" placeholder="correo@email.com" value="<?=$p->getcorreo_usuarios()?>">
                        </div>
                      </div>
                      <div class="col-md-6 form-group">
                        <div class="input-group input-group-static mb-4">
                          <label for="contrasena">Contraseña</label>
                          <input type="text" class="form-control" name="contrasena" placeholder="contrasenas Completos" value="<?=$p->getcontrasena_usuarios()?>">
                        </div>
                      </div>

                      <div class="col-md-6 form-group">
                    <label for="rol">rol</label><br>

                    <select name="rol">
                      <option value="<?=$p->getrol_usuarios()?>"><?=$p->getrol_usuarios()?></option>
                      <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                      <option value="LECTOR">LECTOR</option>
                      <option value="MODERADOR">MODERADOR</option>
                    </select>
                  </div>

                    <div class="row">
                      <div class="col-md-12 text-center">
                        <button class="btn bg-gradient-primary mt-3 mb-0" type="reset">Cancelar</button>
                      <button class="btn bg-gradient-primary mt-3 mb-0" type="submit">Enviar</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>