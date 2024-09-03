//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {grupo_opcion_constante,grupo_opcion_constante1} from '../util/grupo_opcion_constante.js';


class grupo_opcion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(grupo_opcion_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(grupo_opcion_constante1,"grupo_opcion");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"grupo_opcion");		
		super.procesarInicioProceso(grupo_opcion_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(grupo_opcion_constante1,"grupo_opcion"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"grupo_opcion");		
		super.procesarInicioProceso(grupo_opcion_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(grupo_opcion_constante1,"grupo_opcion"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(grupo_opcion_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(grupo_opcion_constante1.STR_ES_RELACIONES,grupo_opcion_constante1.STR_ES_RELACIONADO,grupo_opcion_constante1.STR_RELATIVE_PATH,"grupo_opcion");		
		
		if(super.esPaginaForm(grupo_opcion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(grupo_opcion_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"grupo_opcion");		
		super.procesarFinalizacionProceso(grupo_opcion_constante1,"grupo_opcion");
				
		if(super.esPaginaForm(grupo_opcion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientogrupo_opcion.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbgrupo_opcionid_modulo').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientogrupo_opcion.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientogrupo_opcion.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientogrupo_opcion.txtorden);
		funcionGeneral.setCheckControl(document.frmMantenimientogrupo_opcion.chbestado,false);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscargrupo_opcion.txtNumeroRegistrosgrupo_opcion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'grupo_opcions',strNumeroRegistros,document.frmParamsBuscargrupo_opcion.txtNumeroRegistrosgrupo_opcion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(grupo_opcion_constante1) {
		
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
		
		
		if(grupo_opcion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_modulo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-nombre_principal": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-orden": {
					required:true,
					digits:true
				},
					
				},
				
				messages: {
					"form-id_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_principal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-orden": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
				}		
			};	
		
			
			if(grupo_opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_grupo_opcion-id_modulo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_grupo_opcion-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_grupo_opcion-nombre_principal": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_grupo_opcion-orden": {
					required:true,
					digits:true
				},
					
				},
				
				messages: {
					"form_grupo_opcion-id_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_grupo_opcion-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_grupo_opcion-nombre_principal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_grupo_opcion-orden": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
				}		
			};	



			if(grupo_opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientogrupo_opcion").validate(arrRules);
		
		if(grupo_opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesgrupo_opcion").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			grupo_opcionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"grupo_opcion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientogrupo_opcion.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientogrupo_opcion.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientogrupo_opcion.txtorden,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientogrupo_opcion.chbestado,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientogrupo_opcion.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientogrupo_opcion.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientogrupo_opcion.txtorden,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientogrupo_opcion.chbestado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,grupo_opcion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,grupo_opcion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"grupo_opcion"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(grupo_opcion_constante1.STR_RELATIVE_PATH,"grupo_opcion"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"grupo_opcion");
	
		super.procesarFinalizacionProceso(grupo_opcion_constante1,"grupo_opcion");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(grupo_opcion_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(grupo_opcion_constante1,"grupo_opcion"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(grupo_opcion_constante1,"grupo_opcion"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"grupo_opcion"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(grupo_opcion_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(grupo_opcion_constante1,"grupo_opcion");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
			
			else if(strValueTipoColumna=="A") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Created At") {
				jQuery(".col_created_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Updated At") {
				jQuery(".col_updated_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Modulo") {
				jQuery(".col_id_modulo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_modulo_img').trigger("click" );
				} else {
					jQuery('#form-id_modulo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre Principal") {
				jQuery(".col_nombre_principal").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Orden") {
				jQuery(".col_orden").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Estado") {
				jQuery(".col_estado").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,grupo_opcion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="opcion" || strValueTipoRelacion=="Opcion") {
			grupo_opcion_webcontrol1.registrarSesionParaopciones(idActual);
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

var grupo_opcion_funcion1=new grupo_opcion_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {grupo_opcion_funcion,grupo_opcion_funcion1};

/*Para ser llamado desde window.opener*/
window.grupo_opcion_funcion1 = grupo_opcion_funcion1;



//</script>
