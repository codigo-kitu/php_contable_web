//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {unidad_constante,unidad_constante1} from '../util/unidad_constante.js';

class unidad_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(unidad_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"unidad");
		
		super.procesarInicioProceso(unidad_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"unidad");
		
		super.procesarInicioProceso(unidad_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(unidad_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(unidad_constante1.STR_ES_RELACIONES,unidad_constante1.STR_ES_RELACIONADO,unidad_constante1.STR_RELATIVE_PATH,"unidad");		
		
		if(super.esPaginaForm(unidad_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(unidad_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"unidad");
		
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
				
		if(super.esPaginaForm(unidad_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientounidad.hdnIdActual);
		jQuery('cmbunidadid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientounidad.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientounidad.txtnombre);
		funcionGeneral.setCheckControl(document.frmMantenimientounidad.chbdefecto_venta,false);
		funcionGeneral.setCheckControl(document.frmMantenimientounidad.chbdefecto_compra,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientounidad.txtnumero_productos);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarunidad.txtNumeroRegistrosunidad,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'unidades',strNumeroRegistros,document.frmParamsBuscarunidad.txtNumeroRegistrosunidad);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(unidad_constante1) {
		
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
		
		
		if(unidad_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:6
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
					
					
				"form-numero_productos": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					"form-numero_productos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(unidad_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_unidad-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_unidad-codigo": {
					required:true,
					maxlength:6
					,regexpStringMethod:true
				},
					
				"form_unidad-nombre": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
					
					
				"form_unidad-numero_productos": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form_unidad-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_unidad-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_unidad-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					"form_unidad-numero_productos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(unidad_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientounidad").validate(arrRules);
		
		if(unidad_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesunidad").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			unidadFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"unidad");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientounidad.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientounidad.txtnombre,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientounidad.chbdefecto_venta,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientounidad.chbdefecto_compra,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientounidad.txtnumero_productos,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientounidad.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientounidad.txtnombre,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientounidad.chbdefecto_venta,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientounidad.chbdefecto_compra,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientounidad.txtnumero_productos,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,unidad_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,unidad_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"unidad");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(unidad_constante1.STR_RELATIVE_PATH,"unidad");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"unidad");
		
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(unidad_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(unidad_constante1,"unidad");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(unidad_constante1,"unidad");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"unidad");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(unidad_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(unidad_constante1,"unidad");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,unidad_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var unidad_funcion1=new unidad_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {unidad_funcion,unidad_funcion1};

//Para ser llamado desde window.opener
window.unidad_funcion1 = unidad_funcion1;



//</script>
