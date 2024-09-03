//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {asiento_constante,asiento_constante1} from '../util/asiento_constante.js';


class asiento_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(asiento_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(asiento_constante1,"asiento");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"asiento");		
		super.procesarInicioProceso(asiento_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(asiento_constante1,"asiento"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"asiento");		
		super.procesarInicioProceso(asiento_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(asiento_constante1,"asiento"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(asiento_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(asiento_constante1.STR_ES_RELACIONES,asiento_constante1.STR_ES_RELACIONADO,asiento_constante1.STR_RELATIVE_PATH,"asiento");		
		
		if(super.esPaginaForm(asiento_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(asiento_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"asiento");		
		super.procesarFinalizacionProceso(asiento_constante1,"asiento");
				
		if(super.esPaginaForm(asiento_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbasientoid_empresa').val("");
		jQuery('cmbasientoid_sucursal').val("");
		jQuery('cmbasientoid_ejercicio').val("");
		jQuery('cmbasientoid_periodo').val("");
		jQuery('cmbasientoid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento.txtnumero);
		jQuery('dtasientofecha').val(new Date());
		jQuery('cmbasientoid_asiento_predefinido').val("");
		jQuery('cmbasientoid_documento_contable').val("");
		jQuery('cmbasientoid_libro_auxiliar').val("");
		jQuery('cmbasientoid_fuente').val("");
		jQuery('cmbasientoid_centro_costo').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento.txttotal_debito);
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento.txttotal_credito);
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento.txtdiferencia);
		jQuery('cmbasientoid_estado').val("");
		jQuery('cmbasientoid_documento_contable_origen').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento.txtvalor);
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento.txtnro_nit);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarasiento.txtNumeroRegistrosasiento,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'asientos',strNumeroRegistros,document.frmParamsBuscarasiento.txtNumeroRegistrosasiento);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(asiento_constante1) {
		
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
		
		
		if(asiento_constante1.STR_SUFIJO=="") {
			
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
					
				"form-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-fecha": {
					required:true,
					date:true
				},
					
				"form-id_asiento_predefinido": {
					digits:true
				
				},
					
				"form-id_documento_contable": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_libro_auxiliar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_fuente": {
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
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-total_debito": {
					required:true,
					number:true
				},
					
				"form-total_credito": {
					required:true,
					number:true
				},
					
				"form-diferencia": {
					required:true,
					number:true
				},
					
				"form-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_documento_contable_origen": {
					digits:true
				
				},
					
				"form-valor": {
					required:true,
					number:true
				},
					
				"form-nro_nit": {
					maxlength:30
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_asiento_predefinido": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_documento_contable": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_libro_auxiliar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_fuente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_centro_costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-total_debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-diferencia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_documento_contable_origen": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-valor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-nro_nit": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(asiento_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_asiento-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_asiento-fecha": {
					required:true,
					date:true
				},
					
				"form_asiento-id_asiento_predefinido": {
					digits:true
				
				},
					
				"form_asiento-id_documento_contable": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento-id_libro_auxiliar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento-id_fuente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento-id_centro_costo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento-descripcion": {
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_asiento-total_debito": {
					required:true,
					number:true
				},
					
				"form_asiento-total_credito": {
					required:true,
					number:true
				},
					
				"form_asiento-diferencia": {
					required:true,
					number:true
				},
					
				"form_asiento-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento-id_documento_contable_origen": {
					digits:true
				
				},
					
				"form_asiento-valor": {
					required:true,
					number:true
				},
					
				"form_asiento-nro_nit": {
					maxlength:30
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_asiento-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_asiento-fecha": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_asiento-id_asiento_predefinido": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento-id_documento_contable": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento-id_libro_auxiliar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento-id_fuente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento-id_centro_costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_asiento-total_debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_asiento-total_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_asiento-diferencia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_asiento-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento-id_documento_contable_origen": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento-valor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_asiento-nro_nit": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(asiento_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoasiento").validate(arrRules);
		
		if(asiento_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesasiento").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			asientoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"asiento");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txttotal_debito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txttotal_credito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txtdiferencia,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txtvalor,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txtnro_nit,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txttotal_debito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txttotal_credito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txtdiferencia,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txtvalor,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento.txtnro_nit,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,asiento_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,asiento_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"asiento"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(asiento_constante1.STR_RELATIVE_PATH,"asiento"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"asiento");
	
		super.procesarFinalizacionProceso(asiento_constante1,"asiento");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(asiento_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(asiento_constante1,"asiento"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(asiento_constante1,"asiento"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"asiento"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(asiento_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(asiento_constante1,"asiento");	
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
			else if(strValueTipoColumna==" Empresa") {
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
			else if(strValueTipoColumna=="Numero") {
				jQuery(".col_numero").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha") {
				jQuery(".col_fecha").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Asiento Predefinido") {
				jQuery(".col_id_asiento_predefinido").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_asiento_predefinido_img').trigger("click" );
				} else {
					jQuery('#form-id_asiento_predefinido_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Documento Contable") {
				jQuery(".col_id_documento_contable").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_documento_contable_img').trigger("click" );
				} else {
					jQuery('#form-id_documento_contable_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Libro Auxiliar") {
				jQuery(".col_id_libro_auxiliar").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_libro_auxiliar_img').trigger("click" );
				} else {
					jQuery('#form-id_libro_auxiliar_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Fuente") {
				jQuery(".col_id_fuente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_fuente_img').trigger("click" );
				} else {
					jQuery('#form-id_fuente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Centro Costo") {
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
			else if(strValueTipoColumna=="Total Debito") {
				jQuery(".col_total_debito").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Total Credito") {
				jQuery(".col_total_credito").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Diferencia") {
				jQuery(".col_diferencia").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Estado") {
				jQuery(".col_id_estado").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_estado_img').trigger("click" );
				} else {
					jQuery('#form-id_estado_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Documento Contable Origen") {
				jQuery(".col_id_documento_contable_origen").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_documento_contable_origen_img').trigger("click" );
				} else {
					jQuery('#form-id_documento_contable_origen_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Valor") {
				jQuery(".col_valor").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Nit") {
				jQuery(".col_nro_nit").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,asiento_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="asiento_detalle" || strValueTipoRelacion=="Detalle Asiento") {
			asiento_webcontrol1.registrarSesionParaasiento_detallees(idActual);
		}
		else if(strValueTipoRelacion=="consignacion" || strValueTipoRelacion=="Consignacion") {
			asiento_webcontrol1.registrarSesionParaconsignaciones(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_corriente_detalle" || strValueTipoRelacion=="Cuenta Corriente Detalle") {
			asiento_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		}
		else if(strValueTipoRelacion=="devolucion" || strValueTipoRelacion=="Devolucion") {
			asiento_webcontrol1.registrarSesionParadevoluciones(idActual);
		}
		else if(strValueTipoRelacion=="devolucion_factura" || strValueTipoRelacion=="Devolucion Factura") {
			asiento_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		}
		else if(strValueTipoRelacion=="factura" || strValueTipoRelacion=="Factura") {
			asiento_webcontrol1.registrarSesionParafacturas(idActual);
		}
		else if(strValueTipoRelacion=="factura_lote" || strValueTipoRelacion=="Facturas Lotes") {
			asiento_webcontrol1.registrarSesionParafactura_lotees(idActual);
		}
		else if(strValueTipoRelacion=="imagen_asiento" || strValueTipoRelacion=="Imagenes Asientos") {
			asiento_webcontrol1.registrarSesionParaimagen_asientoes(idActual);
		}
		else if(strValueTipoRelacion=="orden_compra" || strValueTipoRelacion=="Orden Compra") {
			asiento_webcontrol1.registrarSesionParaorden_compras(idActual);
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

var asiento_funcion1=new asiento_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {asiento_funcion,asiento_funcion1};

/*Para ser llamado desde window.opener*/
window.asiento_funcion1 = asiento_funcion1;



//</script>
