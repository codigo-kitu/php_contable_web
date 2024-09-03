//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {vendedor_constante,vendedor_constante1} from '../util/vendedor_constante.js';


class vendedor_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(vendedor_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(vendedor_constante1,"vendedor");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"vendedor");		
		super.procesarInicioProceso(vendedor_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(vendedor_constante1,"vendedor"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"vendedor");		
		super.procesarInicioProceso(vendedor_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(vendedor_constante1,"vendedor"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(vendedor_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(vendedor_constante1.STR_ES_RELACIONES,vendedor_constante1.STR_ES_RELACIONADO,vendedor_constante1.STR_RELATIVE_PATH,"vendedor");		
		
		if(super.esPaginaForm(vendedor_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(vendedor_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"vendedor");		
		super.procesarFinalizacionProceso(vendedor_constante1,"vendedor");
				
		if(super.esPaginaForm(vendedor_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientovendedor.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbvendedorid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientovendedor.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientovendedor.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientovendedor.txtdireccion1);
		funcionGeneral.setEmptyControl(document.frmMantenimientovendedor.txtdireccion2);
		funcionGeneral.setEmptyControl(document.frmMantenimientovendedor.txtcomision);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarvendedor.txtNumeroRegistrosvendedor,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'vendedores',strNumeroRegistros,document.frmParamsBuscarvendedor.txtNumeroRegistrosvendedor);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(vendedor_constante1) {
		
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
		
		
		if(vendedor_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:6
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-direccion1": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-direccion2": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-comision": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion1": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-comision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(vendedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_vendedor-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_vendedor-codigo": {
					required:true,
					maxlength:6
					,regexpStringMethod:true
				},
					
				"form_vendedor-nombre": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_vendedor-direccion1": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_vendedor-direccion2": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_vendedor-comision": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_vendedor-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_vendedor-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_vendedor-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_vendedor-direccion1": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_vendedor-direccion2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_vendedor-comision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(vendedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientovendedor").validate(arrRules);
		
		if(vendedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesvendedor").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			vendedorFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"vendedor");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientovendedor.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientovendedor.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientovendedor.txtdireccion1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientovendedor.txtdireccion2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientovendedor.txtcomision,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientovendedor.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientovendedor.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientovendedor.txtdireccion1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientovendedor.txtdireccion2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientovendedor.txtcomision,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,vendedor_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,vendedor_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"vendedor"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(vendedor_constante1.STR_RELATIVE_PATH,"vendedor"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"vendedor");
	
		super.procesarFinalizacionProceso(vendedor_constante1,"vendedor");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(vendedor_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(vendedor_constante1,"vendedor"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(vendedor_constante1,"vendedor"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"vendedor"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(vendedor_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(vendedor_constante1,"vendedor");	
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
			else if(strValueTipoColumna=="Direccion 1") {
				jQuery(".col_direccion1").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion 2") {
				jQuery(".col_direccion2").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Comision") {
				jQuery(".col_comision").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,vendedor_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cliente" || strValueTipoRelacion=="Cliente") {
			vendedor_webcontrol1.registrarSesionParaclientes(idActual);
		}
		else if(strValueTipoRelacion=="consignacion" || strValueTipoRelacion=="Consignacion") {
			vendedor_webcontrol1.registrarSesionParaconsignaciones(idActual);
		}
		else if(strValueTipoRelacion=="cotizacion" || strValueTipoRelacion=="Cotizacion") {
			vendedor_webcontrol1.registrarSesionParacotizaciones(idActual);
		}
		else if(strValueTipoRelacion=="devolucion_factura" || strValueTipoRelacion=="Devolucion Factura") {
			vendedor_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		}
		else if(strValueTipoRelacion=="devolucion" || strValueTipoRelacion=="Devolucion") {
			vendedor_webcontrol1.registrarSesionParadevoluciones(idActual);
		}
		else if(strValueTipoRelacion=="estimado" || strValueTipoRelacion=="Estimado") {
			vendedor_webcontrol1.registrarSesionParaestimados(idActual);
		}
		else if(strValueTipoRelacion=="factura_lote" || strValueTipoRelacion=="Facturas Lotes") {
			vendedor_webcontrol1.registrarSesionParafactura_lotees(idActual);
		}
		else if(strValueTipoRelacion=="factura" || strValueTipoRelacion=="Factura") {
			vendedor_webcontrol1.registrarSesionParafacturas(idActual);
		}
		else if(strValueTipoRelacion=="orden_compra" || strValueTipoRelacion=="Orden Compra") {
			vendedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		}
		else if(strValueTipoRelacion=="proveedor" || strValueTipoRelacion=="Proveedor") {
			vendedor_webcontrol1.registrarSesionParaproveedores(idActual);
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

var vendedor_funcion1=new vendedor_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {vendedor_funcion,vendedor_funcion1};

/*Para ser llamado desde window.opener*/
window.vendedor_funcion1 = vendedor_funcion1;



//</script>
