$(document).ready(function () {
  $("#example").DataTable({
    order: [0, "desc"],
  });
});

function alerta_eliminar(id) {
  const datos = {
    eliminar: true,
    id: id,
  };
  Swal.fire({
    title: "Estás segur@?",
    text: "Una vez echa la eliminción no se oodra revertir",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "green",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "post",
        url: "server/delete.php",
        dataType: "json",
        data: datos,
        success: function (response) {
          console.log(response);

          switch (response.mensaje) {
            case "se elimino correctamente":
              Swal.fire("Eliminado!", response.mensaje, "success").then(
                (resultado) => {
                  if (resultado) {
                    window.location.reload();
                  }
                }
              );
              break;
            case "error al eliminar":
              Swal.fire("error!", response.mensaje, "error");
            default:
              break;
          }
        },
      });
    }
  });
}

$("#formulario_animes").on("submit", insertar_valores);

function insertar_valores(e) {
  e.preventDefault();
  const titulo = $("#titulo");
  const descripcion = $("#descripcion");
  const fecha = $("#fecha");
  const temporada = $("#temporada");
  const estado = $("#estado :selected").val();

  if (
    titulo.val() === "" ||
    descripcion.val() === "" ||
    fecha.val() === "" ||
    temporada.val() === ""
  ) {
    titulo.addClass("is-invalid");
    descripcion.addClass("is-invalid");
    fecha.addClass("is-invalid");
    temporada.addClass("is-invalid");
    return;
  }
  const datos = {
    insertar: true,
    titulo: titulo.val(),
    descripcion: descripcion.val(),
    fecha: fecha.val(),
    estado: estado,
    temporada: temporada.val(),
  };
  $.ajax({
    type: "POST",
    url: "insertar.php",
    dataType: "json",
    data: datos,
    success: function (respuesta) {
      switch (respuesta.mensaje) {
        case "los datos se insertarón correctamente":
          Swal.fire("Se Insertó!", respuesta.mensaje, "success").then(
            (resultado) => {
              if (resultado) {
                $("#formulario_animes")[0].reset();
                window.location.reload();
              }
            }
          );
          break;
        case "los datos no se insertarón correctamente":
          Swal.fire("Eroor!", respuesta.mensaje, "error");
          break;
        default:
          break;
      }
    },
  });
}
