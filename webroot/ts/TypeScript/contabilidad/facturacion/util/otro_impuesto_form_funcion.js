//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {otro_impuesto_constante,otro_impuesto_constante1} from '../util/otro_impuesto_constante.js';

class otro_impuesto_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(otro_impuesto_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(otro_impuesto_constante1,"otro_impuesto");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"otro_impuesto");
		
		super.procesarInicioProceso(otro_impuesto_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(otro_impuesto_constante1,"otro_impuesto");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"otro_impuesto");
		
		super.procesarInicioProceso(otro_impuesto_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(otro_impuesto_constante1,"otro_impuesto");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(otro_impuesto_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(otro_impuesto_constante1.STR_ES_RELACIONES,otro_impuesto_constante1.STR_ES_RELACIONADO,otro_impuesto_constante1.STR_RELATIVE_PATH,"otro_impuesto");		
		
		if(super.esPaginaForm(otro_impuesto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(otro_impuesto_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"otro_impuesto");
		
		super.procesarFinalizacionProceso(otro_impuesto_constante1,"otro_impuesto");
				
		if(super.esPaginaForm(otro_impuesto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_impuesto.hdnIdActual);
		jQuery('cmbotro_impuestoid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_impuesto.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_impuesto.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_impuesto.txtvalor);
		funcionGeneral.setCheckControl(document.frmMantenimientootro_impuesto.chbpredeterminado,false);
		jQuery('cmbotro_impuestoid_cuenta_ventas').val("");
		jQuery('cmbotro_impuestoid_cuenta_compras').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_impuesto.txtcuenta_contable_ventas);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_impuesto.txtcuenta_contable_compras);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarotro_impuesto.txtNumeroRegistrosotro_impuesto,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'otro_impuestos',strNumeroRegistros,document.frmParamsBuscarotro_impuesto.txtNumeroRegistrosotro_impuesto);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(otro_impuesto_constante1) {
		
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
		
		
		if(otro_impuesto_constante1.STR_SUFIJO=="") {
			
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
					
					"form-id_cuenta_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cuenta_contable_ventas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cuenta_contable_compras": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(otro_impuesto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_otro_impuesto-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_otro_impuesto-codigo": {
					required:true,
					maxlength:5
					,regexpStringMethod:true
				},
					
				"form_otro_impuesto-descripcion": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_otro_impuesto-valor": {
					required:true,
					number:true
				},
					
					
				"form_otro_impuesto-id_cuenta_ventas": {
					digits:true
				
				},
					
				"form_otro_impuesto-id_cuenta_compras": {
					digits:true
				
				},
					
				"form_otro_impuesto-cuenta_contable_ventas": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_otro_impuesto-cuenta_contable_compras": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_otro_impuesto-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_otro_impuesto-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_otro_impuesto-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_otro_impuesto-valor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form_otro_impuesto-id_cuenta_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_otro_impuesto-id_cuenta_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_otro_impuesto-cuenta_contable_ventas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_otro_impuesto-cuenta_contable_compras": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(otro_impuesto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientootro_impuesto").validate(arrRules);
		
		if(otro_impuesto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesotro_impuesto").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			otro_impuestoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"otro_impuesto");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_impuesto.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_impuesto.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_impuesto.txtvalor,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientootro_impuesto.chbpredeterminado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_impuesto.txtcuenta_contable_ventas,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_impuesto.txtcuenta_contable_compras,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_impuesto.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_impuesto.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_impuesto.txtvalor,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientootro_impuesto.chbpredeterminado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_impuesto.txtcuenta_contable_ventas,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_impuesto.txtcuenta_contable_compras,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,otro_impuesto_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,otro_impuesto_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"otro_impuesto");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(otro_impuesto_constante1.STR_RELATIVE_PATH,"otro_impuesto");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"otro_impuesto");
		
		super.procesarFinalizacionProceso(otro_impuesto_constante1,"otro_impuesto");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(otro_impuesto_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(otro_impuesto_constante1,"otro_impuesto");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(otro_impuesto_constante1,"otro_impuesto");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"otro_impuesto");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(otro_impuesto_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(otro_impuesto_constante1,"otro_impuesto");
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
			else if(strValueTipoColumna=="Cuenta Contable Ventas") {
				jQuery(".col_cuenta_contable_ventas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cuenta Contable Compras") {
				jQuery(".col_cuenta_contable_compras").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,otro_impuesto_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cliente" || strValueTipoRelacion=="Cliente") {
			otro_impuesto_webcontrol1.registrarSesionParaclientes(idActual);
		}
		else if(strValueTipoRelacion=="lista_producto" || strValueTipoRelacion=="Lista Productos") {
			otro_impuesto_webcontrol1.registrarSesionParalista_productoes(idActual);
		}
		else if(strValueTipoRelacion=="producto" || strValueTipoRelacion=="Producto") {
			otro_impuesto_webcontrol1.registrarSesionParaproductos(idActual);
		}
		else if(strValueTipoRelacion=="proveedor" || strValueTipoRelacion=="Proveedor") {
			otro_impuesto_webcontrol1.registrarSesionParaproveedores(idActual);
		}
	}
	
	
	
}

var otro_impuesto_funcion1=new otro_impuesto_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {otro_impuesto_funcion,otro_impuesto_funcion1};

//Para ser llamado desde window.opener
window.otro_impuesto_funcion1 = otro_impuesto_funcion1;



//</script>
