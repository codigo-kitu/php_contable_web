//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {modulo_constante,modulo_constante1} from '../util/modulo_constante.js';


class modulo_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(modulo_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(modulo_constante1,"modulo");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"modulo");		
		super.procesarInicioProceso(modulo_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(modulo_constante1,"modulo"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"modulo");		
		super.procesarInicioProceso(modulo_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(modulo_constante1,"modulo"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(modulo_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(modulo_constante1.STR_ES_RELACIONES,modulo_constante1.STR_ES_RELACIONADO,modulo_constante1.STR_RELATIVE_PATH,"modulo");		
		
		if(super.esPaginaForm(modulo_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(modulo_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"modulo");		
		super.procesarFinalizacionProceso(modulo_constante1,"modulo");
				
		if(super.esPaginaForm(modulo_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientomodulo.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbmoduloid_sistema').val("");
		jQuery('cmbmoduloid_paquete').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientomodulo.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientomodulo.txtnombre);
		jQuery('cmbmoduloid_tipo_tecla_mascara').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientomodulo.txttecla);
		funcionGeneral.setCheckControl(document.frmMantenimientomodulo.chbestado,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientomodulo.txtorden);
		funcionGeneral.setEmptyControl(document.frmMantenimientomodulo.txtdescripcion);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarmodulo.txtNumeroRegistrosmodulo,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'modulos',strNumeroRegistros,document.frmParamsBuscarmodulo.txtNumeroRegistrosmodulo);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(modulo_constante1) {
		
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
		
		
		if(modulo_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_sistema": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_paquete": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-id_tipo_tecla_mascara": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-tecla": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
					
				"form-orden": {
					required:true,
					digits:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_paquete": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_tipo_tecla_mascara": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-tecla": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-orden": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(modulo_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_modulo-id_sistema": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_modulo-id_paquete": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_modulo-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_modulo-nombre": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_modulo-id_tipo_tecla_mascara": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_modulo-tecla": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
					
				"form_modulo-orden": {
					required:true,
					digits:true
				},
					
				"form_modulo-descripcion": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_modulo-id_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_modulo-id_paquete": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_modulo-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_modulo-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_modulo-id_tipo_tecla_mascara": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_modulo-tecla": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_modulo-orden": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_modulo-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(modulo_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientomodulo").validate(arrRules);
		
		if(modulo_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesmodulo").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			moduloFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"modulo");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomodulo.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomodulo.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomodulo.txttecla,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientomodulo.chbestado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomodulo.txtorden,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomodulo.txtdescripcion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomodulo.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomodulo.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomodulo.txttecla,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientomodulo.chbestado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomodulo.txtorden,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomodulo.txtdescripcion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,modulo_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,modulo_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"modulo"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(modulo_constante1.STR_RELATIVE_PATH,"modulo"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"modulo");
	
		super.procesarFinalizacionProceso(modulo_constante1,"modulo");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(modulo_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(modulo_constante1,"modulo"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(modulo_constante1,"modulo"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"modulo"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(modulo_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(modulo_constante1,"modulo");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
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
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,modulo_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
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

var modulo_funcion1=new modulo_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {modulo_funcion,modulo_funcion1};

/*Para ser llamado desde window.opener*/
window.modulo_funcion1 = modulo_funcion1;



//</script>
