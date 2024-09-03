//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {opcion_constante,opcion_constante1} from '../util/opcion_constante.js';

class opcion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(opcion_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(opcion_constante1,"opcion");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"opcion");
		
		super.procesarInicioProceso(opcion_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(opcion_constante1,"opcion");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"opcion");
		
		super.procesarInicioProceso(opcion_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(opcion_constante1,"opcion");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(opcion_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(opcion_constante1.STR_ES_RELACIONES,opcion_constante1.STR_ES_RELACIONADO,opcion_constante1.STR_RELATIVE_PATH,"opcion");		
		
		if(super.esPaginaForm(opcion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(opcion_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"opcion");
		
		super.procesarFinalizacionProceso(opcion_constante1,"opcion");
				
		if(super.esPaginaForm(opcion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.hdnIdActual);
		jQuery('cmbopcionid_sistema').val("");
		jQuery('cmbopcionid_opcion').val("");
		jQuery('cmbopcionid_grupo_opcion').val("");
		jQuery('cmbopcionid_modulo').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtposicion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txticon_name);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtnombre_clase);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtmodulo0);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtsub_modulo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtpaquete);
		funcionGeneral.setCheckControl(document.frmMantenimientoopcion.chbes_para_menu,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoopcion.chbes_guardar_relaciones,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoopcion.chbcon_mostrar_acciones_campo,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoopcion.chbestado,false);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscaropcion.txtNumeroRegistrosopcion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'opciones',strNumeroRegistros,document.frmParamsBuscaropcion.txtNumeroRegistrosopcion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(opcion_constante1) {
		
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
		
		
		if(opcion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_sistema": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_opcion": {
					digits:true
				
				},
					
				"form-id_grupo_opcion": {
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
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-posicion": {
					required:true,
					digits:true
				},
					
				"form-icon_name": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-nombre_clase": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-modulo0": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-sub_modulo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-paquete": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
					
					
					
				},
				
				messages: {
					"form-id_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_opcion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_grupo_opcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-posicion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-icon_name": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_clase": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-modulo0": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-sub_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-paquete": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					
					
				}		
			};	
		
			
			if(opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_opcion-id_sistema": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_opcion-id_opcion": {
					digits:true
				
				},
					
				"form_opcion-id_grupo_opcion": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_opcion-id_modulo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_opcion-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_opcion-nombre": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_opcion-posicion": {
					required:true,
					digits:true
				},
					
				"form_opcion-icon_name": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_opcion-nombre_clase": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_opcion-modulo0": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_opcion-sub_modulo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_opcion-paquete": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
					
					
					
				},
				
				messages: {
					"form_opcion-id_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_opcion-id_opcion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_opcion-id_grupo_opcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_opcion-id_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_opcion-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_opcion-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_opcion-posicion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_opcion-icon_name": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_opcion-nombre_clase": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_opcion-modulo0": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_opcion-sub_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_opcion-paquete": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					
					
				}		
			};	



			if(opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoopcion").validate(arrRules);
		
		if(opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesopcion").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			opcionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"opcion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtposicion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txticon_name,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtnombre_clase,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtmodulo0,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtsub_modulo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtpaquete,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbes_para_menu,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbes_guardar_relaciones,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbcon_mostrar_acciones_campo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbestado,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtposicion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txticon_name,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtnombre_clase,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtmodulo0,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtsub_modulo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtpaquete,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbes_para_menu,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbes_guardar_relaciones,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbcon_mostrar_acciones_campo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbestado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,opcion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,opcion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"opcion");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(opcion_constante1.STR_RELATIVE_PATH,"opcion");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"opcion");
		
		super.procesarFinalizacionProceso(opcion_constante1,"opcion");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(opcion_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(opcion_constante1,"opcion");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(opcion_constante1,"opcion");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"opcion");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(opcion_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(opcion_constante1,"opcion");
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
			else if(strValueTipoColumna=="Sistema") {
				jQuery(".col_id_sistema").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sistema_img').trigger("click" );
				} else {
					jQuery('#form-id_sistema_img_busqueda').trigger("click" );
				}
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
			else if(strValueTipoColumna=="Grupo Opcion") {
				jQuery(".col_id_grupo_opcion").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_grupo_opcion_img').trigger("click" );
				} else {
					jQuery('#form-id_grupo_opcion_img_busqueda').trigger("click" );
				}
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
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Posicion") {
				jQuery(".col_posicion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Path Del Icono") {
				jQuery(".col_icon_name").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre De Clase") {
				jQuery(".col_nombre_clase").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Modulo 0") {
				jQuery(".col_modulo0").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Sub Modulo") {
				jQuery(".col_sub_modulo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Paquete") {
				jQuery(".col_paquete").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Es Para Menu") {
				jQuery(".col_es_para_menu").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Es Guardar Relaciones") {
				jQuery(".col_es_guardar_relaciones").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Mostrar Acciones Campo") {
				jQuery(".col_con_mostrar_acciones_campo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Estado") {
				jQuery(".col_estado").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,opcion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="accion" || strValueTipoRelacion=="Accion") {
			opcion_webcontrol1.registrarSesionParaacciones(idActual);
		}
		else if(strValueTipoRelacion=="campo" || strValueTipoRelacion=="Campo") {
			opcion_webcontrol1.registrarSesionParacampos(idActual);
		}
		else if(strValueTipoRelacion=="opcion" || strValueTipoRelacion=="Opcion") {
			opcion_webcontrol1.registrarSesionParaopciones(idActual);
		}
		else if(strValueTipoRelacion=="perfil_opcion" || strValueTipoRelacion=="Perfil Opcion") {
			opcion_webcontrol1.registrarSesionParaperfil_opciones(idActual);
		}
	}
	
	
	
}

var opcion_funcion1=new opcion_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {opcion_funcion,opcion_funcion1};

//Para ser llamado desde window.opener
window.opcion_funcion1 = opcion_funcion1;



//</script>
