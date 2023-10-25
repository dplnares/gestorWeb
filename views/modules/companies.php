<main id="main" class="main">

  <div class="pagetitle">
    <h1>Empresas</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
        <li class="breadcrumb-item">Empresas</li>
        <li class="breadcrumb-item active">Todas las Empresas</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-2">
        <div class="row mb-2">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCompany">Agregar Empresa</button>
        </div>
      </div>
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Todas las Empresas</h5>

              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">RUC</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha Actualizacion</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $listCompanies = ControllerCompanies::ctrGetAllCompanies();
                  foreach ($listCompanies as $key => $value) {
                    echo '
                    <tr>
                      <th scope="row">' . ($key + 1) . '</th>
                      <td>' . ($value["NombreEmpresa"]) . '</td>
                      <td>' . ($value["RucEmpresa"]) . '</td>
                      <td>' . getStateCompanies($value["EstadoEmpresa"]) . '</td>
                      <td>' . ($value["FechaActualizacion"]) . '</td>
                      <td>
                        <button type="button" class="btn btn-success" id="viewCompany" value="' . ($value["IdEmpresa"]) . '"><i class="bi bi-search"></i></button>
                        <button type="button" class="btn btn-warning" id="editCompany" value="' . ($value["IdEmpresa"]) . '"><i class="bi bi-pencil"></i></button>
                        <button type="button" class="btn btn-primary" id="updateCompany" value="' . ($value["IdEmpresa"]) . '"><i class="bi bi-arrow-down-up"></i></button>
                        <button type="button" class="btn btn-danger" id="deleteCompany" value="' . ($value["IdEmpresa"]) . '"><i class="bi bi-trash"></i></button>
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

<div class="modal fade" id="addCompany" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Empresa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" class="formAddCompany" enctype="multipart/form-data">
          <div class="form-group">
            <label for="rucCompany" class="col-form-label">Buscar Por RUC</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary btnSearchRuc" type="button">Consultar</button>
              </div>
              <input type="number" step="1" class="form-control" id="rucCompany" name="rucCompany" aria-label="" aria-describedby="basic-addon1" required>
            </div>
          </div>

          <div class="form-group">
            <label for="nameCompany" class="col-form-label">Razón social:</label>
            <input type="text" class="form-control" id="nameCompany" name="nameCompany" readonly>
          </div>

          <div class="form-group">
            <label for="addressCompany" class="col-form-label">Dirección:</label>
            <input type="text" class="form-control" id="addressCompany" name="addressCompany" readonly>
          </div>

          <div class="form-group">
            <label for="nameContact" class="col-form-label">Nombre Representante:</label>
            <input type="text" class="form-control" id="nameContact" name="nameContact" required>
          </div>

          <div class="form-group">
            <label for="phoneCompany" class="col-form-label">Celular:</label>
            <input type="text" class="form-control" id="phoneCompany" name="phoneCompany">
          </div>

          <div class="form-group">
            <label for="logoCompany" class="col-sm-6 col-form-label">Logo Empresa</label>
            <div class="col-sm-12">
              <input accept=".jpg,.png,.jpeg" class="form-control" type="file" id="logoCompany">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Registrar Empresa</button>
          </div>
          <?php
            $createCompany = new ControllerCompanies();
            $createCompany -> ctrCreateCompany();
          ?>
        </form>
      </div>

    </div>
  </div>
</div>