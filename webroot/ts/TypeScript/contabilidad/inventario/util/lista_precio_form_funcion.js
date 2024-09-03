//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {lista_precio_constante,lista_precio_constante1} from '../util/lista_precio_constante.js';

class lista_precio_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(lista_precio_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(lista_precio_constante1,"lista_precio");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"lista_precio");
		
		super.procesarInicioProceso(lista_precio_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(lista_precio_constante1,"lista_precio");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"lista_precio");
		
		super.procesarInicioProceso(lista_precio_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(lista_precio_constante1,"lista_precio");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(lista_precio_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(lista_precio_constante1.STR_ES_RELACIONES,lista_precio_constante1.STR_ES_RELACIONADO,lista_precio_constante1.STR_RELATIVE_PATH,"lista_precio");		
		
		if(super.esPaginaForm(lista_precio_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(lista_precio_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"lista_precio");
		
		super.procesarFinalizacionProceso(lista_precio_constante1,"lista_precio");
				
		if(super.esPaginaForm(lista_precio_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_precio.hdnIdActual);
		jQuery('cmblista_precioid_empresa').val("");
		jQuery('cmblista_precioid_bodega').val("");
		jQuery('cmblista_precioid_producto').val("");
		jQuery('cmblista_precioid_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_precio.txtprecio_compra);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_precio.txtrango_inicial);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_precio.txtrango_final);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_precio.txtprecio_dolar);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_precio.txtprecio_compra2);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_precio.txtprecio_dolar2);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_precio.txtrango_inicial2);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_precio.txtrango_final2);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarlista_precio.txtNumeroRegistroslista_precio,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'lista_precioes',strNumeroRegistros,document.frmParamsBuscarlista_precio.txtNumeroRegistroslista_precio);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(lista_precio_constante1) {
		
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
		
		
		if(lista_precio_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-precio_compra": {
					required:true,
					number:true
				},
					
				"form-rango_inicial": {
					required:true,
					number:true
				},
					
				"form-rango_final": {
					required:true,
					number:true
				},
					
				"form-precio_dolar": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-precio_compra2": {
					required:true,
					number:true
				},
					
				"form-precio_dolar2": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-rango_inicial2": {
					required:true,
					number:true
				},
					
				"form-rango_final2": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-precio_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-rango_inicial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-rango_final": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio_dolar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-precio_compra2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio_dolar2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-rango_inicial2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-rango_final2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(lista_precio_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_lista_precio-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_precio-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_precio-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_precio-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_precio-precio_compra": {
					required:true,
					number:true
				},
					
				"form_lista_precio-rango_inicial": {
					required:true,
					number:true
				},
					
				"form_lista_precio-rango_final": {
					required:true,
					number:true
				},
					
				"form_lista_precio-precio_dolar": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_lista_precio-precio_compra2": {
					required:true,
					number:true
				},
					
				"form_lista_precio-precio_dolar2": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_lista_precio-rango_inicial2": {
					required:true,
					number:true
				},
					
				"form_lista_precio-rango_final2": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_lista_precio-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_precio-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_precio-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_precio-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_precio-precio_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_precio-rango_inicial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_precio-rango_final": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_precio-precio_dolar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_precio-precio_compra2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_precio-precio_dolar2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_precio-rango_inicial2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_precio-rango_final2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(lista_precio_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientolista_precio").validate(arrRules);
		
		if(lista_precio_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotaleslista_precio").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			lista_precioFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"lista_precio");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtprecio_compra,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtrango_inicial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtrango_final,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtprecio_dolar,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtprecio_compra2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtprecio_dolar2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtrango_inicial2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtrango_final2,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtprecio_compra,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtrango_inicial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtrango_final,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtprecio_dolar,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtprecio_compra2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtprecio_dolar2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtrango_inicial2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_precio.txtrango_final2,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,lista_precio_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,lista_precio_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"lista_precio");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(lista_precio_constante1.STR_RELATIVE_PATH,"lista_precio");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"lista_precio");
		
		super.procesarFinalizacionProceso(lista_precio_constante1,"lista_precio");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(lista_precio_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(lista_precio_constante1,"lista_precio");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(lista_precio_constante1,"lista_precio");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"lista_precio");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(lista_precio_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(lista_precio_constante1,"lista_precio");
	}

	//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,lista_precio_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var lista_precio_funcion1=new lista_precio_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {lista_precio_funcion,lista_precio_funcion1};

//Para ser llamado desde window.opener
window.lista_precio_funcion1 = lista_precio_funcion1;



//</script>
