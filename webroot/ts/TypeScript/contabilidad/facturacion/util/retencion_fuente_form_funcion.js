//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {retencion_fuente_constante,retencion_fuente_constante1} from '../util/retencion_fuente_constante.js';

class retencion_fuente_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(retencion_fuente_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(retencion_fuente_constante1,"retencion_fuente");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"retencion_fuente");
		
		super.procesarInicioProceso(retencion_fuente_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(retencion_fuente_constante1,"retencion_fuente");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"retencion_fuente");
		
		super.procesarInicioProceso(retencion_fuente_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(retencion_fuente_constante1,"retencion_fuente");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(retencion_fuente_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(retencion_fuente_constante1.STR_ES_RELACIONES,retencion_fuente_constante1.STR_ES_RELACIONADO,retencion_fuente_constante1.STR_RELATIVE_PATH,"retencion_fuente");		
		
		if(super.esPaginaForm(retencion_fuente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(retencion_fuente_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"retencion_fuente");
		
		super.procesarFinalizacionProceso(retencion_fuente_constante1,"retencion_fuente");
				
		if(super.esPaginaForm(retencion_fuente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_fuente.hdnIdActual);
		jQuery('cmbretencion_fuenteid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_fuente.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_fuente.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_fuente.txtvalor_fuente);
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_fuente.txtvalor_base);
		funcionGeneral.setCheckControl(document.frmMantenimientoretencion_fuente.chbpredeterminado,false);
		jQuery('cmbretencion_fuenteid_cuenta_ventas').val("");
		jQuery('cmbretencion_fuenteid_cuenta_compras').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_fuente.txtcuenta_contable_ventas);
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_fuente.txtcuenta_contable_compras);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarretencion_fuente.txtNumeroRegistrosretencion_fuente,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'retencion_fuentees',strNumeroRegistros,document.frmParamsBuscarretencion_fuente.txtNumeroRegistrosretencion_fuente);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(retencion_fuente_constante1) {
		
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
		
		
		if(retencion_fuente_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:5
					,regexpStringMethod:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-valor": {
					required:true,
					number:true
				},
					
				"form-valor_base": {
					required:true,
					number:true
				},
					
					
				"form-id_cuenta_ventas": {
					digits:true
				
				},
					
				"form-id_cuenta_compras": {
					digits:true
				
				},
					
				"form-cuenta_contable_ventas": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-cuenta_contable_compras": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-valor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-valor_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form-id_cuenta_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cuenta_contable_ventas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cuenta_contable_compras": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(retencion_fuente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_retencion_fuente-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_retencion_fuente-codigo": {
					required:true,
					maxlength:5
					,regexpStringMethod:true
				},
					
				"form_retencion_fuente-descripcion": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_retencion_fuente-valor": {
					required:true,
					number:true
				},
					
				"form_retencion_fuente-valor_base": {
					required:true,
					number:true
				},
					
					
				"form_retencion_fuente-id_cuenta_ventas": {
					digits:true
				
				},
					
				"form_retencion_fuente-id_cuenta_compras": {
					digits:true
				
				},
					
				"form_retencion_fuente-cuenta_contable_ventas": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_retencion_fuente-cuenta_contable_compras": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_retencion_fuente-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retencion_fuente-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_retencion_fuente-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_retencion_fuente-valor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_retencion_fuente-valor_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form_retencion_fuente-id_cuenta_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retencion_fuente-id_cuenta_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retencion_fuente-cuenta_contable_ventas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_retencion_fuente-cuenta_contable_compras": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(retencion_fuente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoretencion_fuente").validate(arrRules);
		
		if(retencion_fuente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesretencion_fuente").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			retencion_fuenteFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"retencion_fuente");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_fuente.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_fuente.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_fuente.txtvalor_fuente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_fuente.txtvalor_base,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoretencion_fuente.chbpredeterminado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_fuente.txtcuenta_contable_ventas,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_fuente.txtcuenta_contable_compras,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_fuente.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_fuente.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_fuente.txtvalor_fuente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_fuente.txtvalor_base,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoretencion_fuente.chbpredeterminado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_fuente.txtcuenta_contable_ventas,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_fuente.txtcuenta_contable_compras,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,retencion_fuente_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,retencion_fuente_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"retencion_fuente");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(retencion_fuente_constante1.STR_RELATIVE_PATH,"retencion_fuente");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"retencion_fuente");
		
		super.procesarFinalizacionProceso(retencion_fuente_constante1,"retencion_fuente");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(retencion_fuente_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(retencion_fuente_constante1,"retencion_fuente");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(retencion_fuente_constante1,"retencion_fuente");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"retencion_fuente");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(retencion_fuente_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(retencion_fuente_constante1,"retencion_fuente");
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
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Valor") {
				jQuery(".col_valor").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Valor Base") {
				jQuery(".col_valor_base").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Predeterminado") {
				jQuery(".col_predeterminado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Cuentas Ventas") {
				jQuery(".col_id_cuenta_ventas").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_ventas_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_ventas_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Cuentas Compras") {
				jQuery(".col_id_cuenta_compras").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_compras_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_compras_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cta Cont Ventas") {
				jQuery(".col_cuenta_contable_ventas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cta Cont Compras") {
				jQuery(".col_cuenta_contable_compras").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,retencion_fuente_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cliente" || strValueTipoRelacion=="Cliente") {
			retencion_fuente_webcontrol1.registrarSesionParaclientes(idActual);
		}
		else if(strValueTipoRelacion=="proveedor" || strValueTipoRelacion=="Proveedor") {
			retencion_fuente_webcontrol1.registrarSesionParaproveedores(idActual);
		}
	}
	
	
	
}

var retencion_fuente_funcion1=new retencion_fuente_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {retencion_fuente_funcion,retencion_fuente_funcion1};

//Para ser llamado desde window.opener
window.retencion_fuente_funcion1 = retencion_fuente_funcion1;



//</script>
