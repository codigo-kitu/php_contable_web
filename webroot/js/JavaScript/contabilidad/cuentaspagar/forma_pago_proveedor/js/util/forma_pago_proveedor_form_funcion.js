//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {forma_pago_proveedor_constante,forma_pago_proveedor_constante1} from '../util/forma_pago_proveedor_constante.js';


class forma_pago_proveedor_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(forma_pago_proveedor_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(forma_pago_proveedor_constante1,"forma_pago_proveedor");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"forma_pago_proveedor");		
		super.procesarInicioProceso(forma_pago_proveedor_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(forma_pago_proveedor_constante1,"forma_pago_proveedor"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"forma_pago_proveedor");		
		super.procesarInicioProceso(forma_pago_proveedor_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(forma_pago_proveedor_constante1,"forma_pago_proveedor"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(forma_pago_proveedor_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(forma_pago_proveedor_constante1.STR_ES_RELACIONES,forma_pago_proveedor_constante1.STR_ES_RELACIONADO,forma_pago_proveedor_constante1.STR_RELATIVE_PATH,"forma_pago_proveedor");		
		
		if(super.esPaginaForm(forma_pago_proveedor_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(forma_pago_proveedor_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"forma_pago_proveedor");		
		super.procesarFinalizacionProceso(forma_pago_proveedor_constante1,"forma_pago_proveedor");
				
		if(super.esPaginaForm(forma_pago_proveedor_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoforma_pago_proveedor.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbforma_pago_proveedorid_empresa').val("");
		jQuery('cmbforma_pago_proveedorid_tipo_forma_pago').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoforma_pago_proveedor.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoforma_pago_proveedor.txtnombre);
		funcionGeneral.setCheckControl(document.frmMantenimientoforma_pago_proveedor.chbpredeterminado,false);
		jQuery('cmbforma_pago_proveedorid_cuenta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoforma_pago_proveedor.txtcuenta_contable);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarforma_pago_proveedor.txtNumeroRegistrosforma_pago_proveedor,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'forma_pago_proveedores',strNumeroRegistros,document.frmParamsBuscarforma_pago_proveedor.txtNumeroRegistrosforma_pago_proveedor);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(forma_pago_proveedor_constante1) {
		
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
		
		
		if(forma_pago_proveedor_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_forma_pago": {
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
					maxlength:50
					,regexpStringMethod:true
				},
					
					
				"form-id_cuenta": {
					digits:true
				
				},
					
				"form-cuenta_contable": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_forma_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cuenta_contable": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(forma_pago_proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_forma_pago_proveedor-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_forma_pago_proveedor-id_tipo_forma_pago": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_forma_pago_proveedor-codigo": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				},
					
				"form_forma_pago_proveedor-nombre": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
					
				"form_forma_pago_proveedor-id_cuenta": {
					digits:true
				
				},
					
				"form_forma_pago_proveedor-cuenta_contable": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_forma_pago_proveedor-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_forma_pago_proveedor-id_tipo_forma_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_forma_pago_proveedor-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_forma_pago_proveedor-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_forma_pago_proveedor-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_forma_pago_proveedor-cuenta_contable": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(forma_pago_proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoforma_pago_proveedor").validate(arrRules);
		
		if(forma_pago_proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesforma_pago_proveedor").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			forma_pago_proveedorFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"forma_pago_proveedor");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoforma_pago_proveedor.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoforma_pago_proveedor.txtnombre,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoforma_pago_proveedor.chbpredeterminado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoforma_pago_proveedor.txtcuenta_contable,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoforma_pago_proveedor.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoforma_pago_proveedor.txtnombre,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoforma_pago_proveedor.chbpredeterminado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoforma_pago_proveedor.txtcuenta_contable,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,forma_pago_proveedor_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,forma_pago_proveedor_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"forma_pago_proveedor"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(forma_pago_proveedor_constante1.STR_RELATIVE_PATH,"forma_pago_proveedor"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"forma_pago_proveedor");
	
		super.procesarFinalizacionProceso(forma_pago_proveedor_constante1,"forma_pago_proveedor");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(forma_pago_proveedor_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(forma_pago_proveedor_constante1,"forma_pago_proveedor"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(forma_pago_proveedor_constante1,"forma_pago_proveedor"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"forma_pago_proveedor"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(forma_pago_proveedor_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(forma_pago_proveedor_constante1,"forma_pago_proveedor");	
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
			else if(strValueTipoColumna=="Tipo Forma Pago") {
				jQuery(".col_id_tipo_forma_pago").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_forma_pago_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_forma_pago_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Predeterminado") {
				jQuery(".col_predeterminado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Cuentas") {
				jQuery(".col_id_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Contable") {
				jQuery(".col_cuenta_contable").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,forma_pago_proveedor_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="debito_cuenta_pagar" || strValueTipoRelacion=="Debito Cuenta Pagar") {
			forma_pago_proveedor_webcontrol1.registrarSesionParadebito_cuenta_pagars(idActual);
		}
		else if(strValueTipoRelacion=="documento_cuenta_pagar" || strValueTipoRelacion=="Documentos Cuentas por Pagar") {
			forma_pago_proveedor_webcontrol1.registrarSesionParadocumento_cuenta_pagares(idActual);
		}
		else if(strValueTipoRelacion=="pago_cuenta_pagar" || strValueTipoRelacion=="Pago Cuenta Pagar") {
			forma_pago_proveedor_webcontrol1.registrarSesionParapago_cuenta_pagars(idActual);
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

var forma_pago_proveedor_funcion1=new forma_pago_proveedor_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {forma_pago_proveedor_funcion,forma_pago_proveedor_funcion1};

/*Para ser llamado desde window.opener*/
window.forma_pago_proveedor_funcion1 = forma_pago_proveedor_funcion1;



//</script>
