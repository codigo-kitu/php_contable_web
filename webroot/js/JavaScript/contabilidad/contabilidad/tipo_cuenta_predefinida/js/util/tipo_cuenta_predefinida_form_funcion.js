//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {tipo_cuenta_predefinida_constante,tipo_cuenta_predefinida_constante1} from '../util/tipo_cuenta_predefinida_constante.js';


class tipo_cuenta_predefinida_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"tipo_cuenta_predefinida");		
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"tipo_cuenta_predefinida");		
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONES,tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO,tipo_cuenta_predefinida_constante1.STR_RELATIVE_PATH,"tipo_cuenta_predefinida");		
		
		if(super.esPaginaForm(tipo_cuenta_predefinida_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"tipo_cuenta_predefinida");		
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
				
		if(super.esPaginaForm(tipo_cuenta_predefinida_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_cuenta_predefinida.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_cuenta_predefinida.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_cuenta_predefinida.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_cuenta_predefinida.txtdescripcion);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscartipo_cuenta_predefinida.txtNumeroRegistrostipo_cuenta_predefinida,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'tipo_cuenta_predefinidas',strNumeroRegistros,document.frmParamsBuscartipo_cuenta_predefinida.txtNumeroRegistrostipo_cuenta_predefinida);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(tipo_cuenta_predefinida_constante1) {
		
		/*VALIDACION*/
		/* NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT */
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
		
		
		if(tipo_cuenta_predefinida_constante1.STR_SUFIJO=="") {
			
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
				},
					
				"form-descripcion": {
					maxlength:150
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(tipo_cuenta_predefinida_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_tipo_cuenta_predefinida-codigo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_tipo_cuenta_predefinida-nombre": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_tipo_cuenta_predefinida-descripcion": {
					maxlength:150
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_tipo_cuenta_predefinida-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_tipo_cuenta_predefinida-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_tipo_cuenta_predefinida-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(tipo_cuenta_predefinida_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientotipo_cuenta_predefinida").validate(arrRules);
		
		if(tipo_cuenta_predefinida_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalestipo_cuenta_predefinida").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			tipo_cuenta_predefinidaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"tipo_cuenta_predefinida");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_cuenta_predefinida.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_cuenta_predefinida.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_cuenta_predefinida.txtdescripcion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_cuenta_predefinida.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_cuenta_predefinida.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_cuenta_predefinida.txtdescripcion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,tipo_cuenta_predefinida_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,tipo_cuenta_predefinida_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"tipo_cuenta_predefinida"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(tipo_cuenta_predefinida_constante1.STR_RELATIVE_PATH,"tipo_cuenta_predefinida"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"tipo_cuenta_predefinida");
	
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(tipo_cuenta_predefinida_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"tipo_cuenta_predefinida"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(tipo_cuenta_predefinida_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(tipo_cuenta_predefinida_constante1,"tipo_cuenta_predefinida");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
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
			else if(strValueTipoColumna=="Created At") {
				jQuery(".col_created_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Updated At") {
				jQuery(".col_updated_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,tipo_cuenta_predefinida_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cuenta_predefinida" || strValueTipoRelacion=="Cuentas Predefinidas") {
			tipo_cuenta_predefinida_webcontrol1.registrarSesionParacuenta_predefinidaes(idActual);
		}
	}
	
		
	
	/*
		Nuevo: nuevoOnClick,nuevoOnComplete,nuevoPrepararPaginaFormOnClick,nuevoPrepararPaginaFormOnComplete
		Seleccionar: seleccionarPaginaFormOnClick,seleccionarPaginaFormOnComplete
		Actualizar: actualizarOnClick,actualizarOnComplete
		Cancelar: cancelarOnClick,cancelarOnComplete,cancelarControles
		Validar-Formulario: validarFormularioParametrosNumeroRegistros,validarFormularioJQuery
		MostrarOcultar-Controles: mostrarOcultarControlesMantenimiento,habilitarDeshabilitarControles
		Estado-Botones: actualizarEstadoBotones
		Eliminar: eliminarOnClick,eliminarOnComplete
		Procesar: procesarOnClicks,procesarOnComplete,procesarFinalizacionProcesoAbrirLink
		Procesar-Simple: procesarInicioProcesoSimple,procesarFinalizacionProcesoSimple
		Combos-Campos-Relaciones: setTipoColumnaAccion,setTipoRelacionAccion
	*/
}

var tipo_cuenta_predefinida_funcion1=new tipo_cuenta_predefinida_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {tipo_cuenta_predefinida_funcion,tipo_cuenta_predefinida_funcion1};

/*Para ser llamado desde window.opener*/
window.tipo_cuenta_predefinida_funcion1 = tipo_cuenta_predefinida_funcion1;



//</script>
