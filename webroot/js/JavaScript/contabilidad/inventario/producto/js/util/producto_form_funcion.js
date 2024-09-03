//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {producto_constante,producto_constante1} from '../util/producto_constante.js';


class producto_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(producto_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(producto_constante1,"producto");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"producto");		
		super.procesarInicioProceso(producto_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(producto_constante1,"producto"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"producto");		
		super.procesarInicioProceso(producto_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(producto_constante1,"producto"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(producto_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(producto_constante1.STR_ES_RELACIONES,producto_constante1.STR_ES_RELACIONADO,producto_constante1.STR_RELATIVE_PATH,"producto");		
		
		if(super.esPaginaForm(producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(producto_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"producto");		
		super.procesarFinalizacionProceso(producto_constante1,"producto");
				
		if(super.esPaginaForm(producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbproductoid_empresa').val("");
		jQuery('cmbproductoid_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcosto);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbactivo,false);
		jQuery('cmbproductoid_tipo_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcantidad_inicial);
		jQuery('cmbproductoid_impuesto').val("");
		jQuery('cmbproductoid_otro_impuesto').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbimpuesto_ventas,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbotro_impuesto_ventas,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbimpuesto_compras,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbotro_impuesto_compras,false);
		jQuery('cmbproductoid_categoria_producto').val("");
		jQuery('cmbproductoid_sub_categoria_producto').val("");
		jQuery('cmbproductoid_bodega_defecto').val("");
		jQuery('cmbproductoid_unidad_compra').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtequivalencia_compra);
		jQuery('cmbproductoid_unidad_venta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtequivalencia_venta);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtimagen);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtobservacion);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbcomenta_factura,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcodigo_fabricante);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcantidad);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcantidad_minima);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcantidad_maxima);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbfactura_sin_stock,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbmostrar_componente,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbproducto_equivalente,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbavisa_expiracion,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbrequiere_serie,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbacepta_lote,false);
		jQuery('cmbproductoid_cuenta_venta').val("");
		jQuery('cmbproductoid_cuenta_compra').val("");
		jQuery('cmbproductoid_cuenta_costo').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtvalor_inventario);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtproducto_fisico);
		jQuery('dtproductoultima_venta').val(new Date());
		jQuery('dtproductoprecio_actualizado').val(new Date());
		jQuery('cmbproductoid_retencion').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbretencion_ventas,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbretencion_compras,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtfactura_con_precio);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarproducto.txtNumeroRegistrosproducto,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'productos',strNumeroRegistros,document.frmParamsBuscarproducto.txtNumeroRegistrosproducto);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(producto_constante1) {
		
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
		
		
		if(producto_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:26
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:70
					,regexpStringMethod:true
				},
					
				"form-costo": {
					required:true,
					number:true
				},
					
					
				"form-id_tipo_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-cantidad_inicial": {
					required:true,
					number:true
				},
					
				"form-id_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_otro_impuesto": {
					digits:true
				
				},
					
					
					
					
					
				"form-id_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_sub_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_bodega_defecto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_unidad_compra": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-equivalencia_compra": {
					required:true,
					number:true
				},
					
				"form-id_unidad_venta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-equivalencia_venta": {
					required:true,
					number:true
				},
					
				"form-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-observacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form-codigo_fabricante": {
					maxlength:24
					,regexpStringMethod:true
				},
					
				"form-cantidad": {
					number:true
				},
					
				"form-cantidad_minima": {
					required:true,
					number:true
				},
					
				"form-cantidad_maxima": {
					required:true,
					number:true
				},
					
					
					
					
					
					
					
				"form-id_cuenta_venta": {
					digits:true
				
				},
					
				"form-id_cuenta_compra": {
					digits:true
				
				},
					
				"form-id_cuenta_costo": {
					digits:true
				
				},
					
				"form-valor_inventario": {
					required:true,
					number:true
				},
					
				"form-producto_fisico": {
					required:true,
					digits:true
				},
					
				"form-ultima_venta": {
					required:true,
					date:true
				},
					
				"form-precio_actualizado": {
					required:true,
					date:true
				},
					
				"form-id_retencion": {
					digits:true
				
				},
					
					
					
				"form-factura_con_precio": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form-id_tipo_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cantidad_inicial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_otro_impuesto": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					"form-id_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sub_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_bodega_defecto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_unidad_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-equivalencia_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_unidad_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-equivalencia_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-codigo_fabricante": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cantidad": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cantidad_minima": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cantidad_maxima": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					
					
					
					
					
					"form-id_cuenta_venta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_compra": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_costo": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-valor_inventario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-producto_fisico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-ultima_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-precio_actualizado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_retencion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-factura_con_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_producto-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-codigo": {
					required:true,
					maxlength:26
					,regexpStringMethod:true
				},
					
				"form_producto-nombre": {
					required:true,
					maxlength:70
					,regexpStringMethod:true
				},
					
				"form_producto-costo": {
					required:true,
					number:true
				},
					
					
				"form_producto-id_tipo_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-cantidad_inicial": {
					required:true,
					number:true
				},
					
				"form_producto-id_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-id_otro_impuesto": {
					digits:true
				
				},
					
					
					
					
					
				"form_producto-id_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-id_sub_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-id_bodega_defecto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-id_unidad_compra": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-equivalencia_compra": {
					required:true,
					number:true
				},
					
				"form_producto-id_unidad_venta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-equivalencia_venta": {
					required:true,
					number:true
				},
					
				"form_producto-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_producto-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_producto-observacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form_producto-codigo_fabricante": {
					maxlength:24
					,regexpStringMethod:true
				},
					
				"form_producto-cantidad": {
					number:true
				},
					
				"form_producto-cantidad_minima": {
					required:true,
					number:true
				},
					
				"form_producto-cantidad_maxima": {
					required:true,
					number:true
				},
					
					
					
					
					
					
					
				"form_producto-id_cuenta_venta": {
					digits:true
				
				},
					
				"form_producto-id_cuenta_compra": {
					digits:true
				
				},
					
				"form_producto-id_cuenta_costo": {
					digits:true
				
				},
					
				"form_producto-valor_inventario": {
					required:true,
					number:true
				},
					
				"form_producto-producto_fisico": {
					required:true,
					digits:true
				},
					
				"form_producto-ultima_venta": {
					required:true,
					date:true
				},
					
				"form_producto-precio_actualizado": {
					required:true,
					date:true
				},
					
				"form_producto-id_retencion": {
					digits:true
				
				},
					
					
					
				"form_producto-factura_con_precio": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form_producto-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_producto-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_producto-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form_producto-id_tipo_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-cantidad_inicial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_otro_impuesto": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					"form_producto-id_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_sub_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_bodega_defecto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_unidad_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-equivalencia_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-id_unidad_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-equivalencia_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_producto-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_producto-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_producto-codigo_fabricante": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_producto-cantidad": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-cantidad_minima": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-cantidad_maxima": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					
					
					
					
					
					"form_producto-id_cuenta_venta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_cuenta_compra": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_cuenta_costo": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-valor_inventario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-producto_fisico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-ultima_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_producto-precio_actualizado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_producto-id_retencion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_producto-factura_con_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoproducto").validate(arrRules);
		
		if(producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesproducto").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-ultima_venta").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		jQuery("#form-precio_actualizado").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			productoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"producto");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcosto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbactivo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad_inicial,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbimpuesto_ventas,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbotro_impuesto_ventas,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbimpuesto_compras,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbotro_impuesto_compras,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtequivalencia_compra,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtequivalencia_venta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtimagen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtobservacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbcomenta_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcodigo_fabricante,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad_minima,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad_maxima,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbfactura_sin_stock,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbmostrar_componente,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbproducto_equivalente,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbavisa_expiracion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbrequiere_serie,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbacepta_lote,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtvalor_inventario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtproducto_fisico,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbretencion_ventas,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbretencion_compras,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtfactura_con_precio,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcosto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbactivo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad_inicial,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbimpuesto_ventas,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbotro_impuesto_ventas,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbimpuesto_compras,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbotro_impuesto_compras,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtequivalencia_compra,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtequivalencia_venta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtimagen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtobservacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbcomenta_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcodigo_fabricante,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad_minima,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad_maxima,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbfactura_sin_stock,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbmostrar_componente,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbproducto_equivalente,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbavisa_expiracion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbrequiere_serie,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbacepta_lote,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtvalor_inventario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtproducto_fisico,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbretencion_ventas,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbretencion_compras,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtfactura_con_precio,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,producto_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,producto_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"producto"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(producto_constante1.STR_RELATIVE_PATH,"producto"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"producto");
	
		super.procesarFinalizacionProceso(producto_constante1,"producto");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(producto_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(producto_constante1,"producto"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(producto_constante1,"producto"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"producto"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(producto_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(producto_constante1,"producto");	
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
			else if(strValueTipoColumna==" Proveedores") {
				jQuery(".col_id_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Costo") {
				jQuery(".col_costo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Activo") {
				jQuery(".col_activo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Tipo Producto") {
				jQuery(".col_id_tipo_producto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_producto_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_producto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cantidad Inicial") {
				jQuery(".col_cantidad_inicial").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto") {
				jQuery(".col_id_impuesto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_impuesto_img').trigger("click" );
				} else {
					jQuery('#form-id_impuesto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Otro Impuesto") {
				jQuery(".col_id_otro_impuesto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_otro_impuesto_img').trigger("click" );
				} else {
					jQuery('#form-id_otro_impuesto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Impuesto En Ventas") {
				jQuery(".col_impuesto_ventas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Otro Impuesto Ventas") {
				jQuery(".col_otro_impuesto_ventas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto En Compras") {
				jQuery(".col_impuesto_compras").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Otro Impuesto Compras") {
				jQuery(".col_otro_impuesto_compras").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Categoria Producto") {
				jQuery(".col_id_categoria_producto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_categoria_producto_img').trigger("click" );
				} else {
					jQuery('#form-id_categoria_producto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Sub Categoria Producto") {
				jQuery(".col_id_sub_categoria_producto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sub_categoria_producto_img').trigger("click" );
				} else {
					jQuery('#form-id_sub_categoria_producto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Bodega Defecto") {
				jQuery(".col_id_bodega_defecto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_bodega_defecto_img').trigger("click" );
				} else {
					jQuery('#form-id_bodega_defecto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Unidad Compra") {
				jQuery(".col_id_unidad_compra").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_unidad_compra_img').trigger("click" );
				} else {
					jQuery('#form-id_unidad_compra_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Equivalencia En Compra") {
				jQuery(".col_equivalencia_compra").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Unidad Venta") {
				jQuery(".col_id_unidad_venta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_unidad_venta_img').trigger("click" );
				} else {
					jQuery('#form-id_unidad_venta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Equivalencia En Venta") {
				jQuery(".col_equivalencia_venta").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Imagen") {
				jQuery(".col_imagen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Observacion") {
				jQuery(".col_observacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Comenta Factura") {
				jQuery(".col_comenta_factura").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Codigo Fabricante") {
				jQuery(".col_codigo_fabricante").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cantidad") {
				jQuery(".col_cantidad").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cantidad Minima") {
				jQuery(".col_cantidad_minima").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cantidad Maxima") {
				jQuery(".col_cantidad_maxima").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Factura Sin Stock") {
				jQuery(".col_factura_sin_stock").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Mostrar Componente") {
				jQuery(".col_mostrar_componente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Producto Equivalente") {
				jQuery(".col_producto_equivalente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Avisa Expiracion") {
				jQuery(".col_avisa_expiracion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Requiere No Serie") {
				jQuery(".col_requiere_serie").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Acepta Lote") {
				jQuery(".col_acepta_lote").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cuenta Venta/Ingresos") {
				jQuery(".col_id_cuenta_venta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_venta_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_venta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Compra/Activo/Inventario") {
				jQuery(".col_id_cuenta_compra").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_compra_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_compra_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Costo") {
				jQuery(".col_id_cuenta_costo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_costo_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_costo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Valor Inventario") {
				jQuery(".col_valor_inventario").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Producto Fisico") {
				jQuery(".col_producto_fisico").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ultima Venta") {
				jQuery(".col_ultima_venta").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Precio Actualizado") {
				jQuery(".col_precio_actualizado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Retencione") {
				jQuery(".col_id_retencion").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_retencion_img').trigger("click" );
				} else {
					jQuery('#form-id_retencion_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Retencion Ventas") {
				jQuery(".col_retencion_ventas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Retencion Compras") {
				jQuery(".col_retencion_compras").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Factura Con Precio") {
				jQuery(".col_factura_con_precio").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,producto_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="imagen_producto" || strValueTipoRelacion=="Imagenes Producto") {
			producto_webcontrol1.registrarSesionParaimagen_productos(idActual);
		}
		else if(strValueTipoRelacion=="lista_cliente" || strValueTipoRelacion=="Lista Cliente") {
			producto_webcontrol1.registrarSesionParalista_clientes(idActual);
		}
		else if(strValueTipoRelacion=="lista_precio" || strValueTipoRelacion=="Lista Precios") {
			producto_webcontrol1.registrarSesionParalista_precioes(idActual);
		}
		else if(strValueTipoRelacion=="lista_producto" || strValueTipoRelacion=="Lista Productos") {
			producto_webcontrol1.registrarSesionParalista_productoes(idActual);
		}
		else if(strValueTipoRelacion=="otro_suplidor" || strValueTipoRelacion=="Otro Suplidor") {
			producto_webcontrol1.registrarSesionParaotro_suplidores(idActual);
		}
		else if(strValueTipoRelacion=="producto_bodega" || strValueTipoRelacion=="Producto Bodega") {
			producto_webcontrol1.registrarSesionParaproducto_bodegas(idActual);
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

var producto_funcion1=new producto_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {producto_funcion,producto_funcion1};

/*Para ser llamado desde window.opener*/
window.producto_funcion1 = producto_funcion1;



//</script>
