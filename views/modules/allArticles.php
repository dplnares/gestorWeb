<main id="main" class="main">

  <div class="pagetitle">
    <h1>Noticias / Eventos</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
        <li class="breadcrumb-item">Noticias / Eventos</li>
        <li class="breadcrumb-item active">Todas las Noticias</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Todas las Noticias</h5>

              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha Actualizacion</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $listArticles = ControllerArticles::ctrGetAllArticles();
                  foreach ($listArticles as $key => $value) {
                    echo '
                    <tr>
                      <th scope="row">' . ($key + 1) . '</th>
                      <td>' . ($value["TituloInterno"]) . '</td>
                      <td>' . ($value["DescripcionCategoria"]) . '</td>
                      <td>' . getStateArticles($value["EstadoNoticia"]) . '</td>
                      <td>' . ($value["FechaActualizacion"]) . '</td>
                      <td>
                        <button type="button" class="btn btn-success"><i class="bi bi-search"></i></button>
                        <button type="button" class="btn btn-warning"><i class="bi bi-pencil"></i></button>
                        <button type="button" class="btn btn-primary"><i class="bi bi-arrow-down-up"></i></button>
                        <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                      </td>
                    </tr>
                    ';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>