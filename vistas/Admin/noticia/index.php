<div class="content-wrapper blog-author bg-gray-200">
        <div class="page-title">
          <div>
            <h1>LISTA DE PUBLICACIONES</h1>
           <a class="btn" href="?c=noticia&a=FormCrear">REDACTAR</a>
        </div>
              <div>
                <table id="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>TITULO</th>
                      <th>CONTENIDO</th>
                      <th>AUTOR</th>
                      <th>SECCION</th>
                      <th>IMAGEN</th>
                      <th>ESTADO</th>
                      <th>FECHA</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($this->modelo->Listar() as $r):?>
                    <tr>
                      <td><?=$r->id_noticias?></td>
                      <td><?=$r->titulo_noticias?></td>
                      <td><?=$r->contenido_noticias?></td>
                      <td><?=$r->autor_noticias?></td>
                      <td><?=$r->seccion_noticias?></td>
                      <td><?=$r->imagen_noticias?></td>
                      <td><?=$r->estado_noticias?></td>
                      <td><?=$r->fecha_noticias?></td>
                      <td>
                          <a class="btn" href="?c=noticia&a=FormCrear&id=<?=$r->id_noticias?>">EDITAR</a>

                          <a class="btn btn-warning" href="?c=noticia&a=Borrar&id=<?=$r->id_noticias?>">BORRAR</a>
                    
                    </td>
                    </tr>
                <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            