const detalleCuentasCobro = [];

$(function() {
    $('#btnagregar').click(function(e) {
        e.preventDefault();
        numeroCuenta = $('#numero_cuenta').val();
        nit = $('#nit').val()
        slcusuario_inmueble = $('#slcusuario_inmueble').val();
        var nombreSelect = $("select#slcusuario_inmueble option:selected").attr("nombre");
        slcmonth = $('#slcmonth').val();
        var mesSlect = $("select#slcmonth option:selected").attr("fecha");
        fecha = $('#fecha').val()
        monto_por_cancelar = $('#monto_por_cancelar').val();
        if (numeroCuenta == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar El Numero De La Cuenta!',
            })
            return false;
        } else if (numeroCuenta <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Numero De Cuenta No Debe Tener Caracteres Negativos',
            })
            return false;
        } else if (numeroCuenta.length <= 5 || numeroCuenta.length >= 13) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Numero De Cuenta Debe Tener 6 A 13 Caracteres',
            })
            return false;
        } else if (nit == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar El Nit!',
            })
            return false;
        } else if (nit.length <= 7 || nit.length >= 25) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Nit Debe Tener 8 A 24 Caracteres',
            })
            return false;
        } else if (slcusuario_inmueble == undefined || slcusuario_inmueble == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar Los Datos De La Cuenta!',
            })
            return false;
        } else if (slcmonth == undefined || slcmonth == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar El Mes Y Tarifa De La Cuenta!',
            })
            return false;
        } else if (monto_por_cancelar == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar El Monto!',
            })
            return false;
        } else if (monto_por_cancelar <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Monto No Debe Tener Caracteres Negativos',
            })
            return false;
        } else if (monto_por_cancelar.length <= 5 && monto_por_cancelar.length >= 9) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Monto Debe Tener 6 A 8 Caracteres',
            })
            return false;
        } else {
            detalleCuentasCobro.push({
                nombre: nombreSelect,
                mes: mesSlect,
                numero_cuenta: numero_cuenta.value,
                nit,
                slcusuario_inmueble,
                slcmonth,
                monto_por_cancelar
            });
            actualizar();

        }

    });
});
const actualizar = () => {
    let todo = '<br><br><div class="container justify-content-left"><div class="row">  ';
    for (const [index, cuenta] of detalleCuentasCobro.entries()) {
        todo +=
            `
            <div class = "col-6 izquierda"   >
            <br>
                <div class="card carta">
                  <div class="card-body">
                    <div class="col-sm-8 ">
                        <div class="hijo">
                            <h5 class="card-title tituloM  justify-content-right">Cuenta Cobro</h5>
                            <button class="btn btn-outline-danger botoncito" onClick="eliminarCuenta(${index})"><i class="zmdi zmdi-close-circle"></i></button>
                        </div>
                        <div></div>
                        <p class="card-text">Datos: ${cuenta.nombre} </p>
                        <p class="card-text" hidden>${cuenta.slcusuario_inmueble} </p>
                        <div>------</div>
                    </div> 
                    <div class="col-sm-8">
                        <p class="card-text">Cuenta:  ${cuenta.numero_cuenta}</p>
                        <p class="card-text">Nit:  ${cuenta.nit}</p>
                        <div>------</div>
                        <p class="card-text">Mes:  ${cuenta.mes}</p>
                        <p  class="card-text" hidden >${cuenta.slcmonth} </p>
                        <div> ------ </div>
                        <p class="card-text">Pagar:  ${cuenta.monto_por_cancelar}</p>
                    </div>    
                   </div>
                </div>
            </div>
            
         `
    }
    todo += '</div></div> '
    todo += '<div class="row"><div class="col-12"></div></div > '
    $("#detalle_cuenta_cobro").html(todo)
}

function eliminar_detalle(cantidad_detalles) {
    $("#detalle_cuenta_cobro" + cantidad_detalles).remove();
}
const eliminarCuenta = (id) => {
    detalleCuentasCobro.splice(id, 1)
    actualizar();
};
$(function() {
    $('#btnguardar').click(function(e) {
        datos = {
            cuenta_cobro: 'cuenta_cobro',
            detalleCuentasCobro: JSON.stringify(detalleCuentasCobro)
        }
        $.ajax({
            type: 'POST',
            url: 'Controladores/Cuenta_cobro_Controlador.php',
            datatype: "json",
            data: datos,
            success: function(data) {
                swal.fire({
                    title: "Hecho!",
                    text: "Se Ha Registrado Correctamente",
                    icon: "success",
                    button: "Continuar",
                });
            }

        });
    })
})