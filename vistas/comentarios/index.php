<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>lista de comentarios</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>comentarios</li>
              <li class="active"><a href="?c=comentario&a=FormCrear">COMENTAR</a></li>
            </ul>
         
        </div>
              <div>
                <table id="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>TITULO</th>
                      <th>CONTENIDO</th>
                      <th>ESTADO</th>
                      <th>TITULO DE LA NOTICIA</th>
                      <th>FECHA</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($this->modelo->Listar() as $r):?>
                    <tr>
                      <td><?=$r->id_comentarios?></td>
                      <td><?=$r->titulo_comentarios?></td>
                      <td><?=$r->contenido_comentarios?></td>
                      <td><?=$r->estado_comentarios?></td>
                      <td><?=$r->titulo_noticias?></td>
                      <td><?=$r->fecha_comentarios?></td>
                      <td>
                          <a class="btn" href="?c=comentario&a=FormCrear&id=<?=$r->id_comentarios?>">EDITAR</a>

                          <a class="btn btn-warning" href="?c=comentario&a=Borrar&id=<?=$r->id_comentarios?>">BORRAR</a>
                    
                    </td>
                    </tr>
                <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            