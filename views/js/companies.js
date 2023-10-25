//  Consult RUC in SUNAT API
$(".formAddCompany").on("click", ".btnSearchRuc", function () {
  var rucCompany = $('#rucCompany').val();
  if (rucCompany != '') {
    var datos = new FormData();
    datos.append("rucCompany", rucCompany);
    $.ajax({
      url: "ajax/companies.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",

      success: function (response) {
        var values = JSON.parse(response);
        if (values["razonSocial"] != null) {
          addressCompany = values["zonaCodigo"] + ' ' + values["zonaTipo"] + ' ' + values["numero"] + ' ' + values["lote"] + ' ' + values["manzana"] + ' - ' + values["distrito"] + ' - ' + values["provincia"] + ' - ' + values["departamento"];
          $("#nameCompany").val(values["razonSocial"]);
          $("#addressCompany").val(addressCompany);
        }
        else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '¡No se pudo encontrar el RUC!',
          });
          $("#nameCompany").val('');
          $("#addressCompany").val('');
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
      }
    });
  }
  else {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: '¡No se pudo encontrar el RUC!',
    });
    $("#nameCompany").val('');
    $("#addressCompany").val('');
  }
});