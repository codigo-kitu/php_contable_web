//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_devolucion_cliente_constante,imagen_devolucion_cliente_constante1} from '../util/imagen_devolucion_cliente_constante.js';

class imagen_devolucion_cliente_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(imagen_devolucion_cliente_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(imagen_devolucion_cliente_constante1,"imagen_devolucion_cliente");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_devolucion_cliente");
		
		super.procesarInicioProceso(imagen_devolucion_cliente_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(imagen_devolucion_cliente_constante1,"imagen_devolucion_cliente");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_devolucion_cliente");
		
		super.procesarInicioProceso(imagen_devolucion_cliente_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(imagen_devolucion_cliente_constante1,"imagen_devolucion_cliente");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(imagen_devolucion_cliente_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(imagen_devolucion_cliente_constante1.STR_ES_RELACIONES,imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO,imagen_devolucion_cliente_constante1.STR_RELATIVE_PATH,"imagen_devolucion_cliente");		
		
		if(super.esPaginaForm(imagen_devolucion_cliente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(imagen_devolucion_cliente_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"imagen_devolucion_cliente");
		
		super.procesarFinalizacionProceso(imagen_devolucion_cliente_constante1,"imagen_devolucion_cliente");
				
		if(super.esPaginaForm(imagen_devolucion_cliente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_devolucion_cliente.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_devolucion_cliente.txtid_imagen);
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_devolucion_cliente.txtimagen);
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_devolucion_cliente.txtnro_devolucion);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarimagen_devolucion_cliente.txtNumeroRegistrosimagen_devolucion_cliente,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'imagen_devolucion_clientes',strNumeroRegistros,document.frmParamsBuscarimagen_devolucion_cliente.txtNumeroRegistrosimagen_devolucion_cliente);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(imagen_devolucion_cliente_constante1) {
		
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
		
		
		if(imagen_devolucion_cliente_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_imagen": {
					required:true,
					digits:true
				},
					
				"form-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-nro_devolucion": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nro_devolucion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(imagen_devolucion_cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_imagen_devolucion_cliente-id_imagen": {
					required:true,
					digits:true
				},
					
				"form_imagen_devolucion_cliente-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_imagen_devolucion_cliente-nro_devolucion": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_imagen_devolucion_cliente-id_imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_imagen_devolucion_cliente-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_imagen_devolucion_cliente-nro_devolucion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(imagen_devolucion_cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoimagen_devolucion_cliente").validate(arrRules);
		
		if(imagen_devolucion_cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesimagen_devolucion_cliente").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			imagen_devolucion_clienteFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"imagen_devolucion_cliente");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_devolucion_cliente.txtid_imagen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_devolucion_cliente.txtimagen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_devolucion_cliente.txtnro_devolucion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_devolucion_cliente.txtid_imagen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_devolucion_cliente.txtimagen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_devolucion_cliente.txtnro_devolucion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,imagen_devolucion_cliente_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,imagen_devolucion_cliente_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"imagen_devolucion_cliente");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(imagen_devolucion_cliente_constante1.STR_RELATIVE_PATH,"imagen_devolucion_cliente");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"imagen_devolucion_cliente");
		
		super.procesarFinalizacionProceso(imagen_devolucion_cliente_constante1,"imagen_devolucion_cliente");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(imagen_devolucion_cliente_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(imagen_devolucion_cliente_constante1,"imagen_devolucion_cliente");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(imagen_devolucion_cliente_constante1,"imagen_devolucion_cliente");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"imagen_devolucion_cliente");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(imagen_devolucion_cliente_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(imagen_devolucion_cliente_constante1,"imagen_devolucion_cliente");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,imagen_devolucion_cliente_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var imagen_devolucion_cliente_funcion1=new imagen_devolucion_cliente_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {imagen_devolucion_cliente_funcion,imagen_devolucion_cliente_funcion1};

//Para ser llamado desde window.opener
window.imagen_devolucion_cliente_funcion1 = imagen_devolucion_cliente_funcion1;



//</script>
