const validarFormulario = (idFormulario) => {
  const listaCampos = document.querySelectorAll(
    `#${idFormulario} [data-validate]`
  );
  let validacion = true;

  if (listaCampos.length > 0) {
    listaCampos.forEach((elemento) => {
      const tipoElemento = elemento.getAttribute("type");
      //validamos campos con value
      if (elemento.value === "") {
        validacion = false;
        elemento.style.setProperty("border", "1px solid red");
        setTimeout(() => {
          elemento.style.setProperty("border", "");
        }, 2000);
      }

      //validamos campos tipo checkbox
      if (tipoElemento === "checkbox" && !elemento.checked) {
        validacion = false;
        elemento.style.setProperty("border", "1px solid red");
        setTimeout(() => {
          elemento.style.setProperty("border", "");
        }, 2000);
      }

      //validamos campos tipo radio
      if (tipoElemento === "radio") {
        const name = elemento.getAttribute("name");
        const inputsRadio = document.querySelectorAll(
          `input[type="radio"][name="${name}"]`
        );
        let checked = false;

        inputsRadio.forEach((radio) => {
          if (radio.checked) {
            checked = true;
          }
        });

        if (!checked) {
          validacion = false;
        }
      }
    });
  }
  return validacion;
};

document.addEventListener("DOMContentLoaded", () => {
  //obtenerTablaOrdenesCompra();
});

const obtenerDataOrdenCompra = (idSelect = false, isUpdate = false) => {
  let idOrdenCompra = false;
  let idEntradalogistica = false;
  if (idSelect) {
    idOrdenCompra = document.getElementById(idSelect).value;
  }
  if (isUpdate) {
    idEntradalogistica = document.getElementById("idEntradalog").value;
  }
  let data = `idOrdenCompra=${idOrdenCompra}&idEntradalogistica=${idEntradalogistica}`;
  console.log("data :>> ", data);
  $.ajax({
    url: "web/ajax/ajxOrdenCompra.php",
    type: "POST",
    data: data,
    dataType: "json",
    success: function (response) {
      console.log("response :>> ", response);
      if (document.getElementById("tbodyEntradaLog") !== null) {
        document.getElementById("tbodyEntradaLog").innerHTML = "";
      }
      // Manejar la respuesta exitosa aquí
      let selectCliente = document.getElementById("selectClienteRegLog");
      let selectTipoCompra = document.getElementById("selectTipoCompraRegLog");
      if (response.detalle.length > 0) {
        const { id_cliente, tipo_compra } = response.detalle[0];

        $("#selectTipoCompraRegLog").val(tipo_compra).trigger("change");
        $("#selectClienteRegLog").val(id_cliente).trigger("change");

        selectTipoCompra.setAttribute("disabled", "true");
        selectCliente.setAttribute("disabled", "true");

        //damos valor a los campos ocultos
        document.getElementById("selectClienteRegLog2").value = id_cliente;
        document.getElementById("selectTipoCompraRegLog2").value = tipo_compra;
        if (document.getElementById("addProductoEntradaLog") !== null ) {
          document.getElementById("addProductoEntradaLog").style.display = "none";
        }
      }
      else if (!isUpdate) {
        $("#selectTipoCompraRegLog").val("");
        $("#selectClienteRegLog").val("").trigger("change");
        selectTipoCompra.removeAttribute("disabled");
        selectCliente.removeAttribute("disabled");
        document.getElementById("addProductoEntradaLog").style.display =
          "block";
      }

      if (response.productos.length > 0) {
        //agregamos todos los productos

        let tBody = document.getElementById("tbodyEntradaLog");
        response.productos.forEach((producto) => {
          const {
            codigo_producto,
            id_producto,
            descripcion_producto,
            nombre_proveedor,
          } = producto;
          let tr = `<tr>
                    <td style="display:none">${id_producto}</td>
                    <td>${codigo_producto}</td>
                    <td>${descripcion_producto}</td>
                    <td>${nombre_proveedor}</td>
                    <td style="display:${isUpdate ? 'none' : 'block' }"> <a class="btn btn-danger p-0" href="javascript:;" onclick="removerElemento(this)">
                    <i class="fa fa-plus">-</i>
                  </a></td>
                  </tr>`;
          tBody.insertAdjacentHTML("beforeend", tr);
        });
      }
    },
  });
};

const obtenerClientes = () => {
  $.ajax({
    url: "controller/Cliente_controller.php",
    type: "POST",
    data: { idOrdenCompra: data },

    success: function (response) {
      // Manejar la respuesta exitosa aquí
      $("#containerTableOC").html(response);
    },
  });
};

const obtenerListaEntradasPorVenta = (idVenta) => {
  $.ajax({
    url: "web/ajax/reloadTablaVentaslog.php",
    type: "POST",
    data: { idVenta: idVenta },
    success: function (response) {
      // Manejar la respuesta exitosa aquí
      $("#llegaTablaVentalog").html(response);
    },
  });
};

const obtenerListaSalidasPorVenta = (idVenta) => {
  $.ajax({
    url: "web/ajax/reloadTablaSalidaslog.php",
    type: "POST",
    data: { idVenta: idVenta },
    success: function (response) {
      // Manejar la respuesta exitosa aquí
      $("#llegaTablaSalidaslog").html(response);
    },
  });
};

const obtenerDetalleProducto = (idProducto) => {
  $.ajax({
    url: "web/ajax/ajxproductos.php",
    type: "POST",
    data: { idProducto: idProducto },
    dataType: "json",
    success: function (response) {
      // Manejar la respuesta exitosa aquí
      const {
        codigo_producto,
        id_producto,
        descripcion_producto,
        nombre_proveedor,
      } = response[0];
      let tBody = document.getElementById("tbodyEntradaLog");
      let tr = `<tr>
      <td style="display:none">${id_producto}</td>
      <td>${codigo_producto}</td>
      <td>${descripcion_producto}</td>
      <td>${nombre_proveedor}</td>
      <td> <a class="btn btn-danger p-0" href="javascript:;" onclick="removerElemento(this)">
      <i class="fa fa-plus">-</i>
    </a></td>
      </tr>`;
      tBody.insertAdjacentHTML("beforeend", tr);
    },
  });
};

const clonarElemento = (idElemento, valor = "") => {
  let elemento = document.getElementById(idElemento);
  let clone = elemento.cloneNode(true);
  clone.querySelectorAll("input").forEach((e) => (e.value = valor));
  elemento.parentElement.insertAdjacentElement("beforeend", clone);
};
const QuitarElemento = (elemento) => {
  let cloneElement = elemento.parentElement.parentElement.parentElement;
  let numeroInputs =
    cloneElement.parentElement.querySelectorAll(".row[data-clone]");
  //console.log(cloneElement, numeroInputs);
  if (numeroInputs.length > 1) {
    cloneElement.remove();
  }
};

const removerElemento = (elemento) => {
  let tr = elemento.parentNode.parentNode;
  tr.remove();
};

function sumarInputs(idInput1, idInput2, idResultado) {
  let input1 = document.getElementById(idInput1);
  let input2 = document.getElementById(idInput2);
  let resultadoElement = document.getElementById(idResultado);

  // Obtener los valores de los inputs o considerarlos como 0 si están vacíos
  let valor1 = input1.value || 0;
  let valor2 = input2.value || 0;

  // Calcular la suma
  let suma = Number(valor1) + Number(valor2);

  // Mostrar la suma en el elemento de resultado
  resultadoElement.value = suma;
}

const enviarRegistroLog = () => {
  if (!validarFormulario("formRegistroCompraLog")) {
    sweetAlert({
      icon: "success", // Puedes usar 'success', 'error', 'warning', 'info', etc.
      title: "error",
      type: "error",
      text: "Complete todos los campos requeridos",
      showConfirmButton: false, // No mostrar el botón de confirmación
      timer: 1000, // El tiempo en milisegundos antes de que la notificación se cierre automáticamente
    });
    return;
  }
  let tbody = document.querySelectorAll("#tbodyEntradaLog tr");
  let formData = $("#formRegistroCompraLog").serialize();
  let id_cliente = null;
  let tipo_entrada = null;

  if ($("#selectOCompraRegLog").val() === "") {
    id_cliente = $("#selectClienteRegLog").val();
    tipo_entrada = $("#selectTipoCompraRegLog").val();

    if (tbody.length <= 0) {
      sweetAlert({
        icon: "success", // Puedes usar 'success', 'error', 'warning', 'info', etc.
        title: "error",
        type: "error",
        text: "Agregue Productos",
        showConfirmButton: false, // No mostrar el botón de confirmación
        timer: 1000, // El tiempo en milisegundos antes de que la notificación se cierre automáticamente
      });
      return;
    }
  } else {
    id_cliente = $("#selectClienteRegLog2").val();
    tipo_entrada = $("#selectTipoCompraRegLog2").val();
  }
  let idsProducto = "";
  tbody.forEach((element) => {
    let idProducto = element.querySelector("td").textContent;
    idsProducto += idProducto + "|";
  });

  idsProducto = idsProducto.slice(0, -1);
  formData += `&id_cliente=${id_cliente}&tipo_entrada=${tipo_entrada}&idsProducto=${idsProducto}&proceso=Registro`;
  $.ajax({
    url: "web/ajax/entradaLogistica.php",
    type: "POST",
    data: formData,
    dataType: "json",
    success: function (response) {
      // Manejar la respuesta exitosa aquí
      console.log("response :>> ", response);
      if (response === "Validado") {
        swal({
          title: "Exito!",
          text: "Entrada registrada",
          confirmButtonColor: "#66BB6A",
          type: "success",
        });
        $("#formRegistroCompraLog")[0].reset();
        $("#selectOCompraRegLog").val(null).trigger("change");
        $("#selectClienteRegLog").val(null).trigger("change");
        document.getElementById("tbodyEntradaLog").innerHTML = "";
      }
    },
    error: function () {
      swal({
        title: "Lo sentimos...",
        text: "Algo sucedio mal!",
        confirmButtonColor: "#EF5350",
        type: "error",
      });
    },
  });
};

const actualizarRegistroLog = () => {
  if (!validarFormulario("formRegistroCompraLogAct")) {
    sweetAlert({
      icon: "success", // Puedes usar 'success', 'error', 'warning', 'info', etc.
      title: "error",
      type: "error",
      text: "Complete todos los campos requeridos",
      showConfirmButton: false, // No mostrar el botón de confirmación
      timer: 1000, // El tiempo en milisegundos antes de que la notificación se cierre automáticamente
    });
    return;
  }
  let formData = $("#formRegistroCompraLogAct").serialize();
  let id_cliente = null;
  let tipo_entrada = null;

  if ($("#selectOCompraRegLog").val() === "") {
    id_cliente = $("#selectClienteRegLog").val();
    tipo_entrada = $("#selectTipoCompraRegLog").val();
  } else {
    id_cliente = $("#selectClienteRegLog2").val();
    tipo_entrada = $("#selectTipoCompraRegLog2").val();
  }

  formData += `&id_cliente=${id_cliente}&tipo_entrada=${tipo_entrada}&proceso=Edicion`;

  $.ajax({
    url: "web/ajax/entradaLogistica.php",
    type: "POST",
    data: formData,
    dataType: "json",
    success: function (response) {
      // Manejar la respuesta exitosa aquí
      console.log("response :>> ", response);
      if (response === "Validado") {
        swal({
          title: "Exito!",
          text: "Entrada Actualizada",
          confirmButtonColor: "#66BB6A",
          type: "success",
        });
      }
    },
    error: function () {
      swal({
        title: "Lo sentimos...",
        text: "Algo sucedio mal!",
        confirmButtonColor: "#EF5350",
        type: "error",
      });
    },
  });
};

function limpiarform() {
  var form = $("#frmModal").validate();
  form.resetForm();
}

function setSwitchery(switchElement, checkedBool) {
  if (
    (checkedBool && !switchElement.isChecked()) ||
    (!checkedBool && switchElement.isChecked())
  ) {
    switchElement.setPosition(true);
    switchElement.handleOnchange(true);
  }
}

// Styled checkboxes, radios
$(".styled, .multiselect-container input").uniform({ radioClass: "choice" });

function newLibrodiario() {
  openLibrodiario(
    "nuevo",
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null
  );
  $("#modal_iconified").modal("show");
}
function openLibrodiario(
  action,
  id_librodiario,
  codigo_librodiario,
  fecha,
  nombre_cuentaderegistro,
  ingreso,
  egreso,
  saldo,
  observaciones,
  nombre_cuentaacumulativa,
  nombre_cuentadebanco,
  id_deregistroR,
  id_debancosL,
  id_acumulativa,
  naturalezaL,
  estado
) {
  //alert('holaopenLibrodiario()');
  //alert(action);
  var mySwitch = new Switchery($("#chkEstado")[0], {
    size: "small",
    color: "#0D74E9",
  });

  $("#modal_iconified").off("shown.bs.modal"); //JCV IMPORTANTISIMO APAGAR O REINICIAR EL EVENTO HANDLER O CHANGE PARA QUE NO SE REPITAN LOS VALORES CADA VEZ QUE SE EJECUNTA EL EVENTO
  // CHANGE, ESO ME PUEDE OCASIONAR QUE NO BUSQUE LA CUENTA ACUMULATICA CORRECTA
  $("#modal_iconified").on("shown.bs.modal", function () {
    var modal = $(this);
    if (action == "nuevo") {
      $("#txtProceso").val("Registro");
      $("#txtID").val("");
      $("#txtCodigo").val("");
      $("#txtF1").val("");
      $("#txtIngreso").val("");
      /*$('#txtRegistro').val('');*/
      $("#txtEgreso").val("");
      $("#txtSaldo").val("");
      $("#txtObservaciones").val("");
      $("#txtAcumulativa").val("");
      $("#txtidderegistroR").val("");
      $("#txtNaturaleza").val("");

      $("#txtiddebancosL").val("");
      $("#txtidacumulativa").val("");

      /*JCV PARA LLENAR COMBOBOX*/

      $("#cbDeregistro").select2("val", "All");
      $("#cbDebanco").select2("val", "All");

      $("#sel_departamento").select2("val", "All");

      setSwitchery(mySwitch, true);

      $("#txtF1").prop("disabled", false);
      $("#txtIngreso").prop("disabled", false);
      /*JCV $('#txtRegistro').prop( "disabled" , false);*/
      $("#txtEgreso").prop("disabled", false);
      $("#txtSaldo").prop("disabled", false);
      $("#txtObservaciones").prop("disabled", false);
      $("#txtAcumulativa").prop("disabled", true);
      $("#txtNaturaleza").prop("disabled", true);
      $("#txtidderegistroR").prop("disabled", true);
      $("#txtiddebancosL").prop("disabled", true);
      $("#txtidacumulativa").prop("disabled", true);

      $("#cbDeregistro").prop("disabled", false);
      $("#cbDebanco").prop("disabled", false);

      $("#chkEstado").prop("disabled", true);

      $("#btnEditar").hide();
      $("#btnGuardar").show();
      limpiarform();

      modal.find(".title-form").text("Ingresar Movimiento");
    } else if (action == "editar") {
      $("#modal_iconified").modal("show");

      $("#txtProceso").val("Edicion");
      //alert('editar cuenta acumulativa '+ nombre_cuentaacumulativa);

      $("#txtidderegistroR").val(id_deregistroR);
      // $("#cbDeregistro").val(id_deregistroR).trigger("change");  //JCV EL TRIGGER(CHANGE) PARA QUE ACTIVE EL EVNTO CHANGE agarramos el id_deregistro de la taba y al ACTIVAR EL CHANGE BUSCA EL NOMBRE DE LA CUENTA DE REGISTRO, ACUMULATIVA Y NATURALEZA

      $("#txtID").val(id_librodiario);
      $("#txtCodigo").val(codigo_librodiario);
      $("#txtF1").val(fecha);

      //$('#txtIngreso').val(ingreso);

      /* JCV $('#txtRegistro').val(nombre_cuentaderegistro);*/
      /* $('#txtDireccion').val(direccion);*/
      //$('#txtEgreso').val(egreso);
      $("#txtSaldo").val(saldo);

      $("#txtObservaciones").val(observaciones);
      //alert('id de bancos l   '+id_debancosL);
      $("#txtiddebancosL").val(id_debancosL);
      $("#txtidacumulativa").val(id_acumulativa);
      $("#txtNaturaleza").val(naturalezaL);

      $("#sel_departamento").val(id_deregistroR).trigger("change");
      //alert('cta de registro de editar   '+nombre_cuentaderegistro);

      //alert('el val de dbregistro es:  ' +$("#cbDeregistro").val());
      //alert('Modo editar. El nombre de la cuenta de registro:  '+ nombre_cuentaderegistro);

      //$("#cbDeregistro").val(nombre_cuentaderegistro).trigger("change");  //JCV EL TRIGGER(CHANGE) PARA QUE ACTIVE EL EVNTO CHANGE
      $("#cbDeregistro").val(id_deregistroR).trigger("change"); //JCV EL TRIGGER(CHANGE) PARA QUE ACTIVE EL EVNTO CHANGE agarramos el id_deregistro de la taba y al ACTIVAR EL CHANGE BUSCA EL NOMBRE DE LA CUENTA DE REGISTRO, ACUMULATIVA Y NATURALEZA

      //alert('naturaleza en .js en edicion 1: '+ $("#txtNaturaleza").val());
      //alert('ide de registro cuenta de banco R en js: ' + id_deregistroR);
      //jcv ok alert('el val de dbregistro es:  ' +$("#cbDeregistro").val());
      // alert('el val de nombre_cuentadebanco  '+nombre_cuentadebanco );
      $("#cbDebanco").val(id_debancosL).trigger("change");
      //alert('despues de evento change editar, cuenta acumulativa '+ nombre_cuentaacumulativa);
      $("#txtAcumulativa").val(nombre_cuentaacumulativa);
      //$("#cbDeregistro").val(id_deregistroR).trigger("change");
      //listar_campo(id_deregistroR);
      //alert('naturaleza en .js en edicion 2: '+ $("#txtNaturaleza").val());

      /* if($("#txtNaturaleza").val()=="EGRESO"){
         $("#txtIngreso").val(egreso);
        
      }else{
         $("#txtIngreso").val(ingreso);
        
        } 
       
*/

      if (ingreso == 0) {
        $("#txtIngreso").val(egreso);
      } else {
        $("#txtIngreso").val(ingreso);
      }

      if (estado == "1") {
        $("#chkEstado").val(true);
        setSwitchery(mySwitch, true);
        document.getElementById("chkEstado").checked = true;
        document.getElementById("lblchk").innerHTML = "VIGENTE";
      } else {
        $("#chkEstado").val(false);
        setSwitchery(mySwitch, false);
        document.getElementById("chkEstado").checked = false;
        document.getElementById("lblchk").innerHTML = "DESCONTINUADO";
      }

      $("#txtF1").prop("disabled", false);
      $("#txtIngreso").prop("disabled", false);
      /*JCV $('#txtRegistro').prop( "disabled" , false);*/
      $("#txtEgreso").prop("disabled", false);
      $("#txtSaldo").prop("disabled", false);
      $("#txtObservaciones").prop("disabled", false);
      $("#txtAcumulativa").prop("disabled", true);
      $("#txtNaturaleza").prop("disabled", true);
      $("#txtidderegistroR").prop("disabled", true);
      $("#txtiddebancosL").prop("disabled", true);
      $("#txtidacumulativa").prop("disabled", true);

      $("#cbDeregistro").prop("disabled", false);
      $("#cbDebanco").prop("disabled", false);

      $("#chkEstado").prop("disabled", false);

      $("#btnEditar").show();
      $("#btnGuardar").hide();

      modal.find(".title-form").text("Actualizar Movimiento");
    } else if (action == "ver") {
      $("#txtProceso").val("");
      $("#txtID").val(id_librodiario);
      $("#txtCodigo").val(codigo_librodiario);
      $("#txtF1").val(fecha);
      //$('#txtIngreso').val(ingreso);
      /*JCV$('#txtRegistro').val(nombre_cuentaderegistro);*/
      //$('#txtEgreso').val(egreso);
      //$('#txtSaldo').val(saldo);
      $("#txtObservaciones").val(observaciones);
      $("#txtAcumulativa").val(nombre_cuentaacumulativa);
      $("#txtidderegistroR").val(id_deregistroR);
      $("#txtiddebancosL").val(id_debancosL);
      $("#txtidacumulativa").val(id_acumulativa);

      $("#txtNaturaleza").val(naturalezaL);

      $("#cbDeregistro").val(id_deregistroR).trigger("change"); //JCV EL TRIGGER(CHANGE) PARA QUE ACTIVE EL EVNTO CHANGE agarramos el id_deregistro de la taba y al ACTIVAR EL CHANGE BUSCA EL NOMBRE DE LA CUENTA DE REGISTRO, ACUMULATIVA Y NATURALEZA
      //$("#cbDeregistro").val(nombre_cuentaderegistro).trigger("change");
      //$("#cbDeregistro").val(id_deregistroR).trigger("change");  //JCV EL TRIGGER(CHANGE) PARA QUE ACTIVE EL EVNTO CHANGE agarramos el id_deregistro de la taba y al ACTIVAR EL CHANGE BUSCA EL NOMBRE DE LA CUENTA DE REGISTRO, ACUMULATIVA Y NATURALEZA
      //  alert('el val de dbregistro es:  ' +$("#cbDeregistro").val());
      //$("#cbDeregistro").val(id_deregistroR).trigger("change");
      //$("#cbDebanco").val(nombre_cuentadebanco).trigger("change");
      $("#cbDebanco").val(id_debancosL).trigger("change");

      if (ingreso == 0) {
        $("#txtIngreso").val(egreso);
      } else {
        $("#txtIngreso").val(ingreso);
      }

      if (estado == "1") {
        $("#chkEstado").val(true);
        setSwitchery(mySwitch, true);
        document.getElementById("chkEstado").checked = true;
        document.getElementById("lblchk").innerHTML = "VIGENTE";
      } else {
        $("#chkEstado").val(false);
        setSwitchery(mySwitch, false);
        document.getElementById("chkEstado").checked = false;
        document.getElementById("lblchk").innerHTML = "DESCONTINUADO";
      }

      $("#txtF1").prop("disabled", true);
      $("#txtIngreso").prop("disabled", true);
      /* $('#txtRegistro').prop( "disabled" , true);*/
      $("#txtEgreso").prop("disabled", true);
      $("#txtSaldo").prop("disabled", true);
      $("#txtObservaciones").prop("disabled", true);
      $("#txtAcumulativa").prop("disabled", true);
      $("#txtNaturaleza").prop("disabled", true);
      $("#txtidderegistroR").prop("disabled", true);
      $("#txtiddebancosL").prop("disabled", true);
      $("#txtidacumulativa").prop("disabled", true);

      $("#cbDeregistro").prop("disabled", true);
      $("#cbDebanco").prop("disabled", true);

      $("#chkEstado").prop("disabled", true);

      $("#btnEditar").hide();
      $("#btnGuardar").hide();

      modal.find(".title-form").text("Ver Movimiento");
    }
  });
}

function enviar_frm() {
  //limpiarhoja();
  limpiarsaldototal();
  $("#cbDecuentabanco").val("").trigger("change");
  var urlprocess = "web/ajax/ajxlibrodiario.php";
  var proceso = $("#txtProceso").val();
  var id_librodiario = $("#txtID").val();
  var fecha = $("#txtF1").val();
  var ingreso = 0;
  var egreso = 0;
  //alert('NATURALEZA: '+ $("#txtNaturaleza").val() );
  if ($("#txtNaturaleza").val() == "EGRESO") {
    egreso = $("#txtIngreso").val();
    ingreso = 0;
  } else {
    ingreso = $("#txtIngreso").val();
    egreso = 0;
  }

  //var ingreso =$('#txtIngreso').val();
  //var egreso =$('#txtEgreso').val();
  //var saldo =$('#txtSaldo').val();

  var saldo = 0;

  /*JCV ORIG ANTES DEL COMBO BOXvar nombre_cuentaderegistro =$("#txtRegistro").val();*/
  var nombre_cuentaderegistro = $(
    'select[name="cbDeregistro"] option:selected'
  ).text();
  //var nombre_cuentaderegistro =$("#cbDeregistro").val();  //JCV AQUI DA DE ALTA EL VAL QUE ES EL NUMERO DE LA CUENTA CON LA LINEA DE ARRIBA DA DE ALTA EL TEXTO QUE APARECE EN EL SELECT
  //var saldo =$("#txtSaldo").val();

  var observaciones = $("#txtObservaciones").val();
  var estado = $("#chkEstado").is(":checked") ? 1 : 0;
  var nombre_cuentaacumulativa = $("#txtAcumulativa").val();
  //var nombre_cuentadebanco =$("#cbDebanco").val();
  var naturalezaL = $("#txtNaturaleza").val();

  var nombre_cuentadebanco = $(
    'select[name="cbDebanco"] option:selected'
  ).text();

  var id_deregistroR = $("#txtidderegistroR").val();

  //    var id_debancosL =$("#txtiddebancosL").val();
  var id_debancosL = $("#cbDebanco").val();
  var id_acumulativa = $("#txtidacumulativa").val();

  var dataString =
    "proceso=" +
    proceso +
    "&id_librodiario=" +
    id_librodiario +
    "&fecha=" +
    fecha +
    "&ingreso=" +
    ingreso +
    "&egreso=" +
    egreso +
    "&estado=" +
    estado;
  dataString +=
    "&nombre_cuentaderegistro=" +
    nombre_cuentaderegistro +
    "&saldo=" +
    saldo +
    "&nombre_cuentaacumulativa=" +
    nombre_cuentaacumulativa +
    "&observaciones=" +
    observaciones +
    "&nombre_cuentadebanco=" +
    nombre_cuentadebanco +
    "&id_deregistroR=" +
    id_deregistroR +
    "&id_debancosL=" +
    id_debancosL +
    "&naturalezaL=" +
    naturalezaL +
    "&id_acumulativa=" +
    id_acumulativa;
  //alert('holaenviarfrm');
  $.ajax({
    type: "POST",
    url: urlprocess,
    data: dataString,
    dataType: "json",
    success: function (data) {
      if (data == "Validado") {
        if (proceso == "Registro") {
          swal({
            title: "Exito!",
            text: "Movimiento registrado",
            confirmButtonColor: "#66BB6A",
            type: "success",
          });

          $("#modal_iconified").modal("toggle");

          cargarDiv("#reload-div", "web/ajax/reload-librodiario.php");
          limpiarform();
        } else if (proceso == "Edicion") {
          swal({
            title: "Exito!",
            text: "Movimiento modificado",
            confirmButtonColor: "#2196F3",
            type: "info",
          });
          $("#modal_iconified").modal("toggle");
          cargarDiv("#reload-div", "web/ajax/reload-librodiario.php");
        }
      } else if (data == "Duplicado") {
        swal({
          title: "Ops!",
          text: "El dato que ingresaste ya existe",
          confirmButtonColor: "#EF5350",
          type: "warning",
        });
      } else if (data == "Error") {
        swal({
          title: "Lo sentimos...",
          text: "No procesamos bien tus datos!",
          confirmButtonColor: "#EF5350",
          type: "error",
        });
      }
    },
    error: function () {
      swal({
        title: "Lo sentimos...",
        text: "Algo sucedio mal!",
        confirmButtonColor: "#EF5350",
        type: "error",
      });
    },
  });
}

function cargarDiv(div, url) {
  $(div).load(url);
}

function Print_Report(Criterio) {
  if (Criterio == "Activos") {
    window.open(
      "reportes/Librodiario_Activos.php",
      "win2",
      "status=yes,toolbar=yes,scrollbars=yes,titlebar=yes,menubar=yes," +
        "resizable=yes,width=800,height=800,directories=no,location=no" +
        "fullscreen=yes"
    );
  } else if (Criterio == "Inactivos") {
    window.open(
      "reportes/Librodiario_Inactivos.php",
      "win2",
      "status=yes,toolbar=yes,scrollbars=yes,titlebar=yes,menubar=yes," +
        "resizable=yes,width=600,height=600,directories=no,location=no" +
        "fullscreen=yes"
    );
  }
}

/*JCV PARA BORRAR*/

function SwalDelete(productId) {
  swal(
    {
      title: "¿Está seguro que desea borrar el movimiento?",
      text: "Este proceso es irreversible!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#EF5350",
      confirmButtonText: "Si, Eliminar",
      cancelButtonText: "No, volver atras",
      closeOnConfirm: false,
      closeOnCancel: false,
    },
    function (isConfirm) {
      if (isConfirm) {
        return new Promise(function (resolve) {
          $.ajax({
            url: "web/ajax/ajxlibrodiario.php",
            type: "POST",
            data: "proceso=Borrar&numero_transaccion=" + productId,
            dataType: "json",
          })
            .done(function (response) {
              swal("Borrada!", response.message, response.status);
              //JCV ORIG buscar_datos();
              //limpiarhoja();
              limpiarsaldototal();
              $("#cbDecuentabanco").val("").trigger("change");
              cargarDiv("#reload-div", "web/ajax/reload-librodiario.php"); // JCV PARA QUE RECARGUE LOS DATOS ACTUALIZADOS
            })
            .fail(function () {
              swal(
                "Oops...",
                "Algo salio mal al procesar tu peticion!",
                "error"
              );
            });
        });
      } else {
        swal({
          title: "Esta bien",
          text: "Puedes seguir donde te quedaste",
          confirmButtonColor: "#2196F3",
          type: "info",
        });
      }
    }
  );
}

function limpiarhoja() {
  //var form = $( "#inicialpagina" ).validate();
  //form.resetForm();
  // "#inicialpagina".innerHTML="";
  //alert('hola');
  var inicialpagina = document.getElementById("inicialpagina");

  while (inicialpagina.hasChildNodes())
    inicialpagina.removeChild(inicialpagina.firstChild);
}

function limpiarsaldototal() {
  //var form = $( "#inicialpagina" ).validate();
  //form.resetForm();
  // "#inicialpagina".innerHTML="";
  //alert('hola');
  var saldototal = document.getElementById("saldototal");

  while (saldototal.hasChildNodes())
    saldototal.removeChild(saldototal.firstChild);
}

function formato(n) {
  //var sep = (0).toFixed(1)[1];

  /*      sep = sep || "."; // Default to period as decimal separator 
      alert ('sep  '+sep);
    decimals = decimals || 2; // Default to 2 decimals 
    return n.toLocaleString().split(sep)[0] + sep + n.toFixed(decimals).split(sep)[1]; 
  */

  //return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")

  //var numeri = n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  var numerito = n.toFixed(2); //JCV PRIMERO LE PONGO Y AJUSTO LOS DECIMALES
  // return numerito
  return numerito.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); //JCV Y ENSEGUIDA LE PONGO SEPARADOR DE MILES
}

//También puedes buscar el separador decimal de la configuración regional con:
// var sep = (0).toFixed(1)[1];

//Fuente: https://www.iteramos.com/pregunta/106380/agregar-un-separador-de-miles-a-un-total-con-javascript-o-jquery

//JCV PARA QUE AL SELECCIONAR EL COMBO SELECT UNA CUENTA DE BANCO EJECUTE LA FUNCIÓN QUE NO ES OTRA COSA
// QUE HACER UNA CONSULTA CON EL NUMERO DE CUENTA DE BANCO EN LA TABLA LIBRODIARIO
function buscar_datos() {
  var fecha1 = $("#txtF1A").val();
  var fecha2 = $("#txtF2").val();
  var id_debancosL = $("#cbDecuentabanco").val();
  //alert ('fecha 1 ' + fecha1);
  //alert('de buscar datos valor de id_debancosL  '+ id_debancosL);
  if (fecha1 == "" || fecha2 == "") {
    //JCV POR SI PONEN FECHAS UNA U OTRA SE ASUME DE TODO LO QUE VA DEL AÑO DESDE PRIMER DÍA HASTA LA FECHA

    var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();

    fecha1 = d.getFullYear() + "-" + "01" + "-" + "01"; //JCV PRIMER DIA DEL AÑO EN CURSO
    fecha2 =
      d.getFullYear() +
      "-" +
      (month < 10 ? "0" : "") +
      month +
      "-" +
      (day < 10 ? "0" : "") +
      day; //FECHA ACTUAL

    // alert ('primer dia del año   ' + fecha1);
    //alert ('fecha actual   ' + fecha2);
  }

  if (id_debancosL != "") {
    var vacio = 1;
    limpiarsaldototal();
    $.ajax({
      type: "GET",
      //DEL DE VENTAS url:"web/ajax/reload-ventas_fecha.php?fecha1="+fecha1+"&fecha2="+fecha2,
      //JCV OK SI FUNCIONA SIN FECHAS url:"web/ajax/reload-librodiariobancos.php?id_debancosL="+id_debancosL,
      url:
        "web/ajax/reload-librodiariobancos.php?id_debancosL=" +
        id_debancosL +
        "&fecha1=" +
        fecha1 +
        "&fecha2=" +
        fecha2 +
        "&vacio=" +
        vacio,
      beforeSend: function (objeto) {
        $("#loader").html('<img src="img/ajax-loaderOKJCV.gif"> ');
      },

      success: function (data) {
        $("#loader").html("");
        $("#reload-div").html(data);
      },
    });
  } else {
    var vacio = 0;

    id_debancosL = 0;
    limpiarsaldototal();
    //alert('no:  '+ id_debancosL );
    $.ajax({
      type: "GET",
      // JCV SI FUNCIONA SIN FECHAS url:"web/ajax/reload-librodiariobancos.php?id_debancosL="+id_debancosL,
      url:
        "web/ajax/reload-librodiariobancos.php?id_debancosL=" +
        id_debancosL +
        "&fecha1=" +
        fecha1 +
        "&fecha2=" +
        fecha2 +
        "&vacio=" +
        vacio,
      beforeSend: function (objeto) {
        $("#loader").html('<img src="img/ajax-loaderOKJCV.gif"> ');
      },
      success: function (data) {
        $("#loader").html("");
        $("#reload-div").html(data);
      },
    });
  }
}
