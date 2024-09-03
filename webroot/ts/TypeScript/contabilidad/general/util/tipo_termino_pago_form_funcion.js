//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_termino_pago_constante,tipo_termino_pago_constante1} from '../util/tipo_termino_pago_constante.js';

class tipo_termino_pago_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(tipo_termino_pago_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(tipo_termino_pago_constante1,"tipo_termino_pago");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"tipo_termino_pago");
		
		super.procesarInicioProceso(tipo_termino_pago_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(tipo_termino_pago_constante1,"tipo_termino_pago");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"tipo_termino_pago");
		
		super.procesarInicioProceso(tipo_termino_pago_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(tipo_termino_pago_constante1,"tipo_termino_pago");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(tipo_termino_pago_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(tipo_termino_pago_constante1.STR_ES_RELACIONES,tipo_termino_pago_constante1.STR_ES_RELACIONADO,tipo_termino_pago_constante1.STR_RELATIVE_PATH,"tipo_termino_pago");		
		
		if(super.esPaginaForm(tipo_termino_pago_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(tipo_termino_pago_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"tipo_termino_pago");
		
		super.procesarFinalizacionProceso(tipo_termino_pago_constante1,"tipo_termino_pago");
				
		if(super.esPaginaForm(tipo_termino_pago_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_termino_pago.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_termino_pago.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_termino_pago.txtnombre);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscartipo_termino_pago.txtNumeroRegistrostipo_termino_pago,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'tipo_termino_pagos',strNumeroRegistros,document.frmParamsBuscartipo_termino_pago.txtNumeroRegistrostipo_termino_pago);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(tipo_termino_pago_constante1) {
		
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
		
		
		if(tipo_termino_pago_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-codigo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(tipo_termino_pago_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_tipo_termino_pago-codigo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_tipo_termino_pago-nombre": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_tipo_termino_pago-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_tipo_termino_pago-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(tipo_termino_pago_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientotipo_termino_pago").validate(arrRules);
		
		if(tipo_termino_pago_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalestipo_termino_pago").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			tipo_termino_pagoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"tipo_termino_pago");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_termino_pago.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_termino_pago.txtnombre,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_termino_pago.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_termino_pago.txtnombre,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,tipo_termino_pago_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,tipo_termino_pago_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"tipo_termino_pago");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(tipo_termino_pago_constante1.STR_RELATIVE_PATH,"tipo_termino_pago");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"tipo_termino_pago");
		
		super.procesarFinalizacionProceso(tipo_termino_pago_constante1,"tipo_termino_pago");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(tipo_termino_pago_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(tipo_termino_pago_constante1,"tipo_termino_pago");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(tipo_termino_pago_constante1,"tipo_termino_pago");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"tipo_termino_pago");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(tipo_termino_pago_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(tipo_termino_pago_constante1,"tipo_termino_pago");
	}

	//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
			
			else if(strValueTipoColumna=="Id") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="VersionRow") {
				jQuery(".col_version_row").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,tipo_termino_pago_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="termino_pago_proveedor" || strValueTipoRelacion=="Terminos Pago Proveedores") {
			tipo_termino_pago_webcontrol1.registrarSesionParatermino_pago_proveedores(idActual);
		}
		else if(strValueTipoRelacion=="termino_pago_cliente" || strValueTipoRelacion=="Terminos Pago Cliente") {
			tipo_termino_pago_webcontrol1.registrarSesionParatermino_pago_clientes(idActual);
		}
	}
	
	
	
}

var tipo_termino_pago_funcion1=new tipo_termino_pago_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {tipo_termino_pago_funcion,tipo_termino_pago_funcion1};

//Para ser llamado desde window.opener
window.tipo_termino_pago_funcion1 = tipo_termino_pago_funcion1;



//</script>
