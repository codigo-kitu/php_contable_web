//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {dato_general_usuario_constante,dato_general_usuario_constante1} from '../util/dato_general_usuario_constante.js';

class dato_general_usuario_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(dato_general_usuario_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(dato_general_usuario_constante1,"dato_general_usuario");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"dato_general_usuario");
		
		super.procesarInicioProceso(dato_general_usuario_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(dato_general_usuario_constante1,"dato_general_usuario");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"dato_general_usuario");
		
		super.procesarInicioProceso(dato_general_usuario_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(dato_general_usuario_constante1,"dato_general_usuario");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(dato_general_usuario_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(dato_general_usuario_constante1.STR_ES_RELACIONES,dato_general_usuario_constante1.STR_ES_RELACIONADO,dato_general_usuario_constante1.STR_RELATIVE_PATH,"dato_general_usuario");		
		
		if(super.esPaginaForm(dato_general_usuario_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(dato_general_usuario_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"dato_general_usuario");
		
		super.procesarFinalizacionProceso(dato_general_usuario_constante1,"dato_general_usuario");
				
		if(super.esPaginaForm(dato_general_usuario_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		document.frmMantenimientodato_general_usuario.hdnIdActual.value=""
		jQuery('cmbdato_general_usuarioid_pais').val("");
		jQuery('cmbdato_general_usuarioid_provincia').val("");
		jQuery('cmbdato_general_usuarioid_ciudad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodato_general_usuario.txtcedula);
		funcionGeneral.setEmptyControl(document.frmMantenimientodato_general_usuario.txtapellidos);
		funcionGeneral.setEmptyControl(document.frmMantenimientodato_general_usuario.txtnombres);
		funcionGeneral.setEmptyControl(document.frmMantenimientodato_general_usuario.txttelefono);
		funcionGeneral.setEmptyControl(document.frmMantenimientodato_general_usuario.txttelefono_movil);
		funcionGeneral.setEmptyControl(document.frmMantenimientodato_general_usuario.txte_mail);
		funcionGeneral.setEmptyControl(document.frmMantenimientodato_general_usuario.txturl);
		jQuery('dtdato_general_usuariofecha_nacimiento').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodato_general_usuario.txtdireccion);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscardato_general_usuario.txtNumeroRegistrosdato_general_usuario,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'dato_general_usuarios',strNumeroRegistros,document.frmParamsBuscardato_general_usuario.txtNumeroRegistrosdato_general_usuario);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(dato_general_usuario_constante1) {
		
		//VALIDACION
		// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT		
		/*
		jQuery.validator.addMethod(
				"regexpStringMethod",
				function(value, element) {
					return value.match(constantes.STRREGX_STRING_GENERAL);
				},
				"Valor Incorrecto"
		);
		*/
		
		funcionGeneralJQuery.addValidacionesFuncionesGenerales();
		
		var arrRules=null;
		var arrRulesTotales=null;		
		
		
		if(dato_general_usuario_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_provincia": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-cedula": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-apellidos": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form-nombres": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form-telefono": {
					required:true,
					maxlength:200
					,regexpTelefonoMethod:true
				},
					
				"form-telefono_movil": {
					required:true,
					maxlength:200
					,regexpTelefonoMethod:true
				},
					
				"form-e_mail": {
					required:true,
					maxlength:200
				},
					
				"form-url": {
					required:true,
					maxlength:200
				},
					
				"form-fecha_nacimiento": {
					required:true,
					date:true
				},
					
				"form-direccion": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_provincia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cedula": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-apellidos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombres": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-telefono": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-telefono_movil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-e_mail": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form-url": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_URL_INCORRECTO,
					"form-fecha_nacimiento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(dato_general_usuario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}
			
		} else {

			arrRules= {
				
				rules: {
					
				"form_dato_general_usuario-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_dato_general_usuario-id_provincia": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_dato_general_usuario-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_dato_general_usuario-cedula": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_dato_general_usuario-apellidos": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form_dato_general_usuario-nombres": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form_dato_general_usuario-telefono": {
					required:true,
					maxlength:200
					,regexpTelefonoMethod:true
				},
					
				"form_dato_general_usuario-telefono_movil": {
					required:true,
					maxlength:200
					,regexpTelefonoMethod:true
				},
					
				"form_dato_general_usuario-e_mail": {
					required:true,
					maxlength:200
				},
					
				"form_dato_general_usuario-url": {
					required:true,
					maxlength:200
				},
					
				"form_dato_general_usuario-fecha_nacimiento": {
					required:true,
					date:true
				},
					
				"form_dato_general_usuario-direccion": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_dato_general_usuario-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_dato_general_usuario-id_provincia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_dato_general_usuario-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_dato_general_usuario-cedula": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_dato_general_usuario-apellidos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_dato_general_usuario-nombres": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_dato_general_usuario-telefono": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_dato_general_usuario-telefono_movil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_dato_general_usuario-e_mail": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_dato_general_usuario-url": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_URL_INCORRECTO,
					"form_dato_general_usuario-fecha_nacimiento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_dato_general_usuario-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(dato_general_usuario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientodato_general_usuario").validate(arrRules);
		
		if(dato_general_usuario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesdato_general_usuario").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_nacimiento").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			dato_general_usuarioFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"dato_general_usuario");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txtcedula,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txtapellidos,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txtnombres,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txttelefono,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txttelefono_movil,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txte_mail,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txturl,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txtdireccion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txtcedula,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txtapellidos,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txtnombres,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txttelefono,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txttelefono_movil,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txte_mail,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txturl,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodato_general_usuario.txtdireccion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,dato_general_usuario_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,dato_general_usuario_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"dato_general_usuario");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(dato_general_usuario_constante1.STR_RELATIVE_PATH,"dato_general_usuario");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"dato_general_usuario");
		
		super.procesarFinalizacionProceso(dato_general_usuario_constante1,"dato_general_usuario");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(dato_general_usuario_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(dato_general_usuario_constante1,"dato_general_usuario");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(dato_general_usuario_constante1,"dato_general_usuario");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"dato_general_usuario");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(dato_general_usuario_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(dato_general_usuario_constante1,"dato_general_usuario");
	}

	//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,dato_general_usuario_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var dato_general_usuario_funcion1=new dato_general_usuario_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {dato_general_usuario_funcion,dato_general_usuario_funcion1};

//Para ser llamado desde window.opener
window.dato_general_usuario_funcion1 = dato_general_usuario_funcion1;



//</script>
