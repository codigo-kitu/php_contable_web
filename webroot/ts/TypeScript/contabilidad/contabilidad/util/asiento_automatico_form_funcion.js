//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {asiento_automatico_constante,asiento_automatico_constante1} from '../util/asiento_automatico_constante.js';

class asiento_automatico_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(asiento_automatico_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(asiento_automatico_constante1,"asiento_automatico");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"asiento_automatico");
		
		super.procesarInicioProceso(asiento_automatico_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(asiento_automatico_constante1,"asiento_automatico");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"asiento_automatico");
		
		super.procesarInicioProceso(asiento_automatico_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(asiento_automatico_constante1,"asiento_automatico");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(asiento_automatico_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(asiento_automatico_constante1.STR_ES_RELACIONES,asiento_automatico_constante1.STR_ES_RELACIONADO,asiento_automatico_constante1.STR_RELATIVE_PATH,"asiento_automatico");		
		
		if(super.esPaginaForm(asiento_automatico_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(asiento_automatico_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"asiento_automatico");
		
		super.procesarFinalizacionProceso(asiento_automatico_constante1,"asiento_automatico");
				
		if(super.esPaginaForm(asiento_automatico_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_automatico.hdnIdActual);
		jQuery('cmbasiento_automaticoid_empresa').val("");
		jQuery('cmbasiento_automaticoid_modulo').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_automatico.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_automatico.txtnombre);
		jQuery('cmbasiento_automaticoid_fuente').val("");
		jQuery('cmbasiento_automaticoid_libro_auxiliar').val("");
		jQuery('cmbasiento_automaticoid_centro_costo').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_automatico.txtdescipcion);
		funcionGeneral.setCheckControl(document.frmMantenimientoasiento_automatico.chbactivo,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_automatico.txtasignada);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarasiento_automatico.txtNumeroRegistrosasiento_automatico,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'asiento_automaticos',strNumeroRegistros,document.frmParamsBuscarasiento_automatico.txtNumeroRegistrosasiento_automatico);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(asiento_automatico_constante1) {
		
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
		
		
		if(asiento_automatico_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
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
					
				"form-nombre": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-id_fuente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_libro_auxiliar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_centro_costo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-descripcion": {
					maxlength:80
					,regexpStringMethod:true
				},
					
					
				"form-asignada": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_fuente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_libro_auxiliar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_centro_costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-asignada": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(asiento_automatico_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_asiento_automatico-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_automatico-id_modulo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_automatico-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_asiento_automatico-nombre": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_asiento_automatico-id_fuente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_automatico-id_libro_auxiliar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_automatico-id_centro_costo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_automatico-descripcion": {
					maxlength:80
					,regexpStringMethod:true
				},
					
					
				"form_asiento_automatico-asignada": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_asiento_automatico-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_automatico-id_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_automatico-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_asiento_automatico-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_asiento_automatico-id_fuente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_automatico-id_libro_auxiliar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_automatico-id_centro_costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_automatico-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_asiento_automatico-asignada": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(asiento_automatico_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoasiento_automatico").validate(arrRules);
		
		if(asiento_automatico_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesasiento_automatico").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			asiento_automaticoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"asiento_automatico");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_automatico.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_automatico.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_automatico.txtdescipcion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoasiento_automatico.chbactivo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_automatico.txtasignada,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_automatico.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_automatico.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_automatico.txtdescipcion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoasiento_automatico.chbactivo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_automatico.txtasignada,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,asiento_automatico_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,asiento_automatico_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"asiento_automatico");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(asiento_automatico_constante1.STR_RELATIVE_PATH,"asiento_automatico");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"asiento_automatico");
		
		super.procesarFinalizacionProceso(asiento_automatico_constante1,"asiento_automatico");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(asiento_automatico_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(asiento_automatico_constante1,"asiento_automatico");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(asiento_automatico_constante1,"asiento_automatico");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"asiento_automatico");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(asiento_automatico_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(asiento_automatico_constante1,"asiento_automatico");
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
			else if(strValueTipoColumna=="Empresa") {
				jQuery(".col_id_empresa").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_empresa_img').trigger("click" );
				} else {
					jQuery('#form-id_empresa_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Modulo") {
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
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fuente") {
				jQuery(".col_id_fuente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_fuente_img').trigger("click" );
				} else {
					jQuery('#form-id_fuente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Libro Auxiliar") {
				jQuery(".col_id_libro_auxiliar").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_libro_auxiliar_img').trigger("click" );
				} else {
					jQuery('#form-id_libro_auxiliar_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Centro Costo") {
				jQuery(".col_id_centro_costo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_centro_costo_img').trigger("click" );
				} else {
					jQuery('#form-id_centro_costo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Activo") {
				jQuery(".col_activo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Asignada") {
				jQuery(".col_asignada").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,asiento_automatico_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="asiento_automatico_detalle" || strValueTipoRelacion=="Detalle Asiento Automatico") {
			asiento_automatico_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		}
	}
	
	
	
}

var asiento_automatico_funcion1=new asiento_automatico_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {asiento_automatico_funcion,asiento_automatico_funcion1};

//Para ser llamado desde window.opener
window.asiento_automatico_funcion1 = asiento_automatico_funcion1;



//</script>
