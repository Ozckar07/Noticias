<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>LISTA DE USUARIOS</h1>
           <a class="btn" href="?c=usuario&a=FormCrear">CREAR USUARIO</a>
        </div>
              <div>
                <table id="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NOMBRE</th>
                      <th>CORREO</th>
                      <th>CONTRASEÑA</th>
                      <th>ROL</th>
                      <th>FECHA</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($this->modelo->Listar() as $r):?>
                    <tr>
                      <td><?=$r->id_usuarios?></td>
                      <td><?=$r->nombre_usuarios?></td>
                      <td><?=$r->correo_usuarios?></td>
                      <td><?=$r->contrasena_usuarios?></td>
                      <td><?=$r->rol_usuarios?></td>
                      <td><?=$r->fecha_registro_usuarios?></td>
                      <td>
                          <a class="btn" href="?c=usuario&a=FormCrear&id=<?=$r->id_usuarios?>">EDITAR</a>

                          <a class="btn btn-warning" href="?c=usuario&a=Borrar&id=<?=$r->id_usuarios?>">BORRAR</a>
                    
                    </td>
                    </tr>
                <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            