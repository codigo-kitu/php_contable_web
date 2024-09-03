//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {lote_producto_constante,lote_producto_constante1} from '../util/lote_producto_constante.js';


class lote_producto_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(lote_producto_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(lote_producto_constante1,"lote_producto");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"lote_producto");		
		super.procesarInicioProceso(lote_producto_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(lote_producto_constante1,"lote_producto"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"lote_producto");		
		super.procesarInicioProceso(lote_producto_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(lote_producto_constante1,"lote_producto"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(lote_producto_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(lote_producto_constante1.STR_ES_RELACIONES,lote_producto_constante1.STR_ES_RELACIONADO,lote_producto_constante1.STR_RELATIVE_PATH,"lote_producto");		
		
		if(super.esPaginaForm(lote_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(lote_producto_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"lote_producto");		
		super.procesarFinalizacionProceso(lote_producto_constante1,"lote_producto");
				
		if(super.esPaginaForm(lote_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmblote_productoid_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtnro_lote);
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtdescripcion);
		jQuery('cmblote_productoid_bodega').val("");
		jQuery('dtlote_productofecha_ingreso').val(new Date());
		jQuery('dtlote_productofecha_expiracion').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtubicacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtcantidad);
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtcomentario);
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtnro_documento);
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtdisponible);
		jQuery('dtlote_productoagotado_en').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtnro_item);
		jQuery('cmblote_productoid_proveedor').val("");	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarlote_producto.txtNumeroRegistroslote_producto,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'lote_productoes',strNumeroRegistros,document.frmParamsBuscarlote_producto.txtNumeroRegistroslote_producto);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(lote_producto_constante1) {
		
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
		
		
		if(lote_producto_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nro_lote": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-fecha_ingreso": {
					required:true,
					date:true
				},
					
				"form-fecha_expiracion": {
					required:true,
					date:true
				},
					
				"form-ubicacion": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-cantidad": {
					required:true,
					number:true
				},
					
				"form-comentario": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-nro_documento": {
					required:true,
					digits:true
				},
					
				"form-disponible": {
					required:true,
					number:true
				},
					
				"form-agotado_en": {
					required:true,
					date:true
				},
					
				"form-nro_item": {
					required:true,
					digits:true
				},
					
				"form-id_proveedor": {
					required:true,
					digits:true
					,min:0
				}
				},
				
				messages: {
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nro_lote": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_expiracion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-ubicacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-comentario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nro_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-disponible": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-agotado_en": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-nro_item": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(lote_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_lote_producto-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lote_producto-nro_lote": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_lote_producto-descripcion": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_lote_producto-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lote_producto-fecha_ingreso": {
					required:true,
					date:true
				},
					
				"form_lote_producto-fecha_expiracion": {
					required:true,
					date:true
				},
					
				"form_lote_producto-ubicacion": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_lote_producto-cantidad": {
					required:true,
					number:true
				},
					
				"form_lote_producto-comentario": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_lote_producto-nro_documento": {
					required:true,
					digits:true
				},
					
				"form_lote_producto-disponible": {
					required:true,
					number:true
				},
					
				"form_lote_producto-agotado_en": {
					required:true,
					date:true
				},
					
				"form_lote_producto-nro_item": {
					required:true,
					digits:true
				},
					
				"form_lote_producto-id_proveedor": {
					required:true,
					digits:true
					,min:0
				}
				},
				
				messages: {
					"form_lote_producto-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lote_producto-nro_lote": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lote_producto-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lote_producto-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lote_producto-fecha_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_lote_producto-fecha_expiracion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_lote_producto-ubicacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lote_producto-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lote_producto-comentario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lote_producto-nro_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lote_producto-disponible": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lote_producto-agotado_en": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_lote_producto-nro_item": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lote_producto-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(lote_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientolote_producto").validate(arrRules);
		
		if(lote_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotaleslote_producto").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha_ingreso").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_expiracion").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-agotado_en").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			lote_productoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"lote_producto");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtnro_lote,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtubicacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtcantidad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtcomentario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtnro_documento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtdisponible,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtnro_item,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtnro_lote,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtubicacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtcantidad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtcomentario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtnro_documento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtdisponible,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtnro_item,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,lote_producto_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,lote_producto_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"lote_producto"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(lote_producto_constante1.STR_RELATIVE_PATH,"lote_producto"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"lote_producto");
	
		super.procesarFinalizacionProceso(lote_producto_constante1,"lote_producto");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(lote_producto_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(lote_producto_constante1,"lote_producto"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(lote_producto_constante1,"lote_producto"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"lote_producto"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(lote_producto_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(lote_producto_constante1,"lote_producto");	
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
			else if(strValueTipoColumna=="Producto") {
				jQuery(".col_id_producto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_producto_img').trigger("click" );
				} else {
					jQuery('#form-id_producto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Nro Lote") {
				jQuery(".col_nro_lote").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Bodega") {
				jQuery(".col_id_bodega").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_bodega_img').trigger("click" );
				} else {
					jQuery('#form-id_bodega_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Fecha Ingreso") {
				jQuery(".col_fecha_ingreso").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Expiracion") {
				jQuery(".col_fecha_expiracion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ubicacion") {
				jQuery(".col_ubicacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cantidad") {
				jQuery(".col_cantidad").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Comentario") {
				jQuery(".col_comentario").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Documento") {
				jQuery(".col_nro_documento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Disponible") {
				jQuery(".col_disponible").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Agotado En") {
				jQuery(".col_agotado_en").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Item") {
				jQuery(".col_nro_item").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Proveedor") {
				jQuery(".col_id_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_proveedor_img_busqueda').trigger("click" );
				}
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,lote_producto_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="kardex_detalle" || strValueTipoRelacion=="Detalle") {
			lote_producto_webcontrol1.registrarSesionParakardex_detalles(idActual);
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

var lote_producto_funcion1=new lote_producto_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {lote_producto_funcion,lote_producto_funcion1};

/*Para ser llamado desde window.opener*/
window.lote_producto_funcion1 = lote_producto_funcion1;



//</script>
