//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {documento_contable_constante,documento_contable_constante1} from '../util/documento_contable_constante.js';


class documento_contable_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(documento_contable_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(documento_contable_constante1,"documento_contable");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"documento_contable");		
		super.procesarInicioProceso(documento_contable_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(documento_contable_constante1,"documento_contable"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"documento_contable");		
		super.procesarInicioProceso(documento_contable_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(documento_contable_constante1,"documento_contable"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(documento_contable_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(documento_contable_constante1.STR_ES_RELACIONES,documento_contable_constante1.STR_ES_RELACIONADO,documento_contable_constante1.STR_RELATIVE_PATH,"documento_contable");		
		
		if(super.esPaginaForm(documento_contable_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(documento_contable_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"documento_contable");		
		super.procesarFinalizacionProceso(documento_contable_constante1,"documento_contable");
				
		if(super.esPaginaForm(documento_contable_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_contable.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbdocumento_contableid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_contable.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_contable.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_contable.txtsecuencial);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_contable.txtincremento);
		funcionGeneral.setCheckControl(document.frmMantenimientodocumento_contable.chbreinicia_secuencial_mes,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_contable.txtgenerado_por);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscardocumento_contable.txtNumeroRegistrosdocumento_contable,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'documento_contables',strNumeroRegistros,document.frmParamsBuscardocumento_contable.txtNumeroRegistrosdocumento_contable);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(documento_contable_constante1) {
		
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
		
		
		if(documento_contable_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-secuencial": {
					required:true,
					number:true
				},
					
				"form-incremento": {
					required:true,
					number:true
				},
					
					
				"form-generado_por": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-secuencial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-incremento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form-generado_por": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(documento_contable_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_documento_contable-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_contable-codigo": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				},
					
				"form_documento_contable-nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_documento_contable-secuencial": {
					required:true,
					number:true
				},
					
				"form_documento_contable-incremento": {
					required:true,
					number:true
				},
					
					
				"form_documento_contable-generado_por": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form_documento_contable-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_contable-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_contable-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_contable-secuencial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_contable-incremento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form_documento_contable-generado_por": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(documento_contable_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientodocumento_contable").validate(arrRules);
		
		if(documento_contable_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesdocumento_contable").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			documento_contableFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"documento_contable");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_contable.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_contable.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_contable.txtsecuencial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_contable.txtincremento,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientodocumento_contable.chbreinicia_secuencial_mes,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_contable.txtgenerado_por,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_contable.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_contable.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_contable.txtsecuencial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_contable.txtincremento,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientodocumento_contable.chbreinicia_secuencial_mes,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_contable.txtgenerado_por,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,documento_contable_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,documento_contable_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"documento_contable"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(documento_contable_constante1.STR_RELATIVE_PATH,"documento_contable"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"documento_contable");
	
		super.procesarFinalizacionProceso(documento_contable_constante1,"documento_contable");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(documento_contable_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(documento_contable_constante1,"documento_contable"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(documento_contable_constante1,"documento_contable"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"documento_contable"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(documento_contable_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(documento_contable_constante1,"documento_contable");	
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
			else if(strValueTipoColumna=="Empresa") {
				jQuery(".col_id_empresa").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_empresa_img').trigger("click" );
				} else {
					jQuery('#form-id_empresa_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Secuencial") {
				jQuery(".col_secuencial").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Incremento") {
				jQuery(".col_incremento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Reinicia Secuencial Mes") {
				jQuery(".col_reinicia_secuencial_mes").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Generado Por") {
				jQuery(".col_generado_por").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,documento_contable_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="asiento" || strValueTipoRelacion=="Asiento") {
			documento_contable_webcontrol1.registrarSesionParaasientos(idActual);
		}
		else if(strValueTipoRelacion=="asiento_predefinido" || strValueTipoRelacion=="Asiento Predefinido") {
			documento_contable_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
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

var documento_contable_funcion1=new documento_contable_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {documento_contable_funcion,documento_contable_funcion1};

/*Para ser llamado desde window.opener*/
window.documento_contable_funcion1 = documento_contable_funcion1;



//</script>
