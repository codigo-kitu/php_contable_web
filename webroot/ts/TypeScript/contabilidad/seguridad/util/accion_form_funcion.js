//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {accion_constante,accion_constante1} from '../util/accion_constante.js';

class accion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(accion_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"accion");
		
		super.procesarInicioProceso(accion_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"accion");
		
		super.procesarInicioProceso(accion_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(accion_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(accion_constante1.STR_ES_RELACIONES,accion_constante1.STR_ES_RELACIONADO,accion_constante1.STR_RELATIVE_PATH,"accion");		
		
		if(super.esPaginaForm(accion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(accion_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"accion");
		
		super.procesarFinalizacionProceso(accion_constante1,"accion");
				
		if(super.esPaginaForm(accion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoaccion.hdnIdActual);
		jQuery('cmbaccionid_opcion').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoaccion.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoaccion.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoaccion.txtdescripcion);
		funcionGeneral.setCheckControl(document.frmMantenimientoaccion.chbestado,false);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscaraccion.txtNumeroRegistrosaccion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'acciones',strNumeroRegistros,document.frmParamsBuscaraccion.txtNumeroRegistrosaccion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(accion_constante1) {
		
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
		
		
		if(accion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_opcion": {
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
					
				"form-descripcion": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form-id_opcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	
		
			
			if(accion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_accion-id_opcion": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_accion-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_accion-nombre": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_accion-descripcion": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form_accion-id_opcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_accion-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_accion-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_accion-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	



			if(accion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoaccion").validate(arrRules);
		
		if(accion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesaccion").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			accionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"accion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoaccion.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoaccion.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoaccion.txtdescripcion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoaccion.chbestado,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoaccion.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoaccion.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoaccion.txtdescripcion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoaccion.chbestado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,accion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,accion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"accion");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(accion_constante1.STR_RELATIVE_PATH,"accion");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"accion");
		
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(accion_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(accion_constante1,"accion");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"accion");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(accion_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(accion_constante1,"accion");
	}

	//------------- Formulario-Combo-Accion -------------------

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
			else if(strValueTipoColumna=="A") {
				jQuery(".col_version_row").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Opcion") {
				jQuery(".col_id_opcion").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_opcion_img').trigger("click" );
				} else {
					jQuery('#form-id_opcion_img_busqueda').trigger("click" );
				}
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
			else if(strValueTipoColumna=="Estado") {
				jQuery(".col_estado").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,accion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="perfil_accion" || strValueTipoRelacion=="Perfil Accion") {
			accion_webcontrol1.registrarSesionParaperfil_acciones(idActual);
		}
	}
	
	
	
}

var accion_funcion1=new accion_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {accion_funcion,accion_funcion1};

//Para ser llamado desde window.opener
window.accion_funcion1 = accion_funcion1;



//</script>
