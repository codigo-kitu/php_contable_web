//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {asiento_predefinido_constante,asiento_predefinido_constante1} from '../util/asiento_predefinido_constante.js';


class asiento_predefinido_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(asiento_predefinido_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(asiento_predefinido_constante1,"asiento_predefinido");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"asiento_predefinido");		
		super.procesarInicioProceso(asiento_predefinido_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(asiento_predefinido_constante1,"asiento_predefinido"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"asiento_predefinido");		
		super.procesarInicioProceso(asiento_predefinido_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(asiento_predefinido_constante1,"asiento_predefinido"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(asiento_predefinido_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(asiento_predefinido_constante1.STR_ES_RELACIONES,asiento_predefinido_constante1.STR_ES_RELACIONADO,asiento_predefinido_constante1.STR_RELATIVE_PATH,"asiento_predefinido");		
		
		if(super.esPaginaForm(asiento_predefinido_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(asiento_predefinido_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"asiento_predefinido");		
		super.procesarFinalizacionProceso(asiento_predefinido_constante1,"asiento_predefinido");
				
		if(super.esPaginaForm(asiento_predefinido_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_predefinido.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbasiento_predefinidoid_empresa').val("");
		jQuery('cmbasiento_predefinidoid_sucursal').val("");
		jQuery('cmbasiento_predefinidoid_ejercicio').val("");
		jQuery('cmbasiento_predefinidoid_periodo').val("");
		jQuery('cmbasiento_predefinidoid_usuario').val("");
		jQuery('cmbasiento_predefinidoid_modulo').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_predefinido.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_predefinido.txtnombre);
		jQuery('cmbasiento_predefinidoid_fuente').val("");
		jQuery('cmbasiento_predefinidoid_libro_auxiliar').val("");
		jQuery('cmbasiento_predefinidoid_centro_costo').val("");
		jQuery('cmbasiento_predefinidoid_documento_contable').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_predefinido.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_predefinido.txtnro_nit);
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_predefinido.txtreferencia);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarasiento_predefinido.txtNumeroRegistrosasiento_predefinido,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'asiento_predefinidos',strNumeroRegistros,document.frmParamsBuscarasiento_predefinido.txtNumeroRegistrosasiento_predefinido);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(asiento_predefinido_constante1) {
		
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
		
		
		if(asiento_predefinido_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_usuario": {
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
					maxlength:10
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
					
				"form-id_documento_contable": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-descripcion": {
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-nro_nit": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-referencia": {
					maxlength:100
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_fuente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_libro_auxiliar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_centro_costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_documento_contable": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nro_nit": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-referencia": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(asiento_predefinido_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_asiento_predefinido-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido-id_modulo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido-codigo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_asiento_predefinido-nombre": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_asiento_predefinido-id_fuente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido-id_libro_auxiliar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido-id_centro_costo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido-id_documento_contable": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido-descripcion": {
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_asiento_predefinido-nro_nit": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_asiento_predefinido-referencia": {
					maxlength:100
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_asiento_predefinido-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido-id_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_asiento_predefinido-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_asiento_predefinido-id_fuente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido-id_libro_auxiliar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido-id_centro_costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido-id_documento_contable": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_asiento_predefinido-nro_nit": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_asiento_predefinido-referencia": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(asiento_predefinido_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoasiento_predefinido").validate(arrRules);
		
		if(asiento_predefinido_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesasiento_predefinido").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			asiento_predefinidoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"asiento_predefinido");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido.txtnro_nit,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido.txtreferencia,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido.txtnro_nit,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido.txtreferencia,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,asiento_predefinido_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,asiento_predefinido_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"asiento_predefinido"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(asiento_predefinido_constante1.STR_RELATIVE_PATH,"asiento_predefinido"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"asiento_predefinido");
	
		super.procesarFinalizacionProceso(asiento_predefinido_constante1,"asiento_predefinido");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(asiento_predefinido_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(asiento_predefinido_constante1,"asiento_predefinido"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(asiento_predefinido_constante1,"asiento_predefinido"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"asiento_predefinido"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(asiento_predefinido_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(asiento_predefinido_constante1,"asiento_predefinido");	
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
			else if(strValueTipoColumna==" Sucursal") {
				jQuery(".col_id_sucursal").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sucursal_img').trigger("click" );
				} else {
					jQuery('#form-id_sucursal_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Ejercicio") {
				jQuery(".col_id_ejercicio").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_ejercicio_img').trigger("click" );
				} else {
					jQuery('#form-id_ejercicio_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Periodo") {
				jQuery(".col_id_periodo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_periodo_img').trigger("click" );
				} else {
					jQuery('#form-id_periodo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Usuario") {
				jQuery(".col_id_usuario").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_usuario_img').trigger("click" );
				} else {
					jQuery('#form-id_usuario_img_busqueda').trigger("click" );
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
			else if(strValueTipoColumna=="Dcto Contable") {
				jQuery(".col_id_documento_contable").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_documento_contable_img').trigger("click" );
				} else {
					jQuery('#form-id_documento_contable_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Nit") {
				jQuery(".col_nro_nit").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Referencia") {
				jQuery(".col_referencia").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,asiento_predefinido_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="asiento" || strValueTipoRelacion=="Asiento") {
			asiento_predefinido_webcontrol1.registrarSesionParaasientos(idActual);
		}
		else if(strValueTipoRelacion=="asiento_predefinido_detalle" || strValueTipoRelacion=="Detalle Asiento Predefinido") {
			asiento_predefinido_webcontrol1.registrarSesionParaasiento_predefinido_detalles(idActual);
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

var asiento_predefinido_funcion1=new asiento_predefinido_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {asiento_predefinido_funcion,asiento_predefinido_funcion1};

/*Para ser llamado desde window.opener*/
window.asiento_predefinido_funcion1 = asiento_predefinido_funcion1;



//</script>
