//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {lista_producto_constante,lista_producto_constante1} from '../util/lista_producto_constante.js';


class lista_producto_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(lista_producto_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(lista_producto_constante1,"lista_producto");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"lista_producto");		
		super.procesarInicioProceso(lista_producto_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(lista_producto_constante1,"lista_producto"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"lista_producto");		
		super.procesarInicioProceso(lista_producto_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(lista_producto_constante1,"lista_producto"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(lista_producto_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(lista_producto_constante1.STR_ES_RELACIONES,lista_producto_constante1.STR_ES_RELACIONADO,lista_producto_constante1.STR_RELATIVE_PATH,"lista_producto");		
		
		if(super.esPaginaForm(lista_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(lista_producto_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"lista_producto");		
		super.procesarFinalizacionProceso(lista_producto_constante1,"lista_producto");
				
		if(super.esPaginaForm(lista_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmblista_productoid_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcodigo_producto);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtdescripcion_producto);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtprecio1);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtprecio2);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtprecio3);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtprecio4);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcosto);
		jQuery('cmblista_productoid_unidad_compra').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtunidad_en_compra);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtequivalencia_en_compra);
		jQuery('cmblista_productoid_unidad_venta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtunidad_en_venta);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtequivalencia_en_venta);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcantidad_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcantidad_minima);
		jQuery('cmblista_productoid_categoria_producto').val("");
		jQuery('cmblista_productoid_sub_categoria_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtacepta_lote);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtvalor_inventario);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtimagen);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtincremento1);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtincremento2);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtincremento3);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtincremento4);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcodigo_fabricante);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtproducto_fisico);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtsituacion_producto);
		jQuery('cmblista_productoid_tipo_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txttipo_producto_codigo);
		jQuery('cmblista_productoid_bodega').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtmostrar_componente);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtfactura_sin_stock);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtavisa_expiracion);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtfactura_con_precio);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtproducto_equivalente);
		jQuery('cmblista_productoid_cuenta_compra').val("");
		jQuery('cmblista_productoid_cuenta_venta').val("");
		jQuery('cmblista_productoid_cuenta_inventario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcuenta_compra_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcuenta_venta_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcuenta_inventario_codigo);
		jQuery('cmblista_productoid_otro_suplidor').val("");
		jQuery('cmblista_productoid_impuesto').val("");
		jQuery('cmblista_productoid_impuesto_ventas').val("");
		jQuery('cmblista_productoid_impuesto_compras').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtimpuesto1_en_ventas);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtimpuesto1_en_compras);
		jQuery('dtlista_productoultima_venta').val(new Date());
		jQuery('cmblista_productoid_otro_impuesto').val("");
		jQuery('cmblista_productoid_otro_impuesto_ventas').val("");
		jQuery('cmblista_productoid_otro_impuesto_compras').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtotro_impuesto_ventas_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtotro_impuesto_compras_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtprecio_de_compra_0);
		jQuery('dtlista_productoprecio_actualizado').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtrequiere_nro_serie);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcosto_dolar);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcomentario);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcomenta_factura);
		jQuery('cmblista_productoid_retencion').val("");
		jQuery('cmblista_productoid_retencion_ventas').val("");
		jQuery('cmblista_productoid_retencion_compras').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtretencion_ventas_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtretencion_compras_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtnotas);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarlista_producto.txtNumeroRegistroslista_producto,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'lista_productoes',strNumeroRegistros,document.frmParamsBuscarlista_producto.txtNumeroRegistroslista_producto);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(lista_producto_constante1) {
		
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
		
		
		if(lista_producto_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo_producto": {
					required:true,
					maxlength:26
					,regexpStringMethod:true
				},
					
				"form-descripcion_producto": {
					required:true,
					maxlength:70
					,regexpStringMethod:true
				},
					
				"form-precio1": {
					required:true,
					number:true
				},
					
				"form-precio2": {
					required:true,
					number:true
				},
					
				"form-precio3": {
					required:true,
					number:true
				},
					
				"form-precio4": {
					required:true,
					number:true
				},
					
				"form-costo": {
					required:true,
					number:true
				},
					
				"form-id_unidad_compra": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-unidad_en_compra": {
					required:true,
					digits:true
				},
					
				"form-equivalencia_en_compra": {
					required:true,
					number:true
				},
					
				"form-id_unidad_venta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-unidad_en_venta": {
					required:true,
					digits:true
				},
					
				"form-equivalencia_en_venta": {
					required:true,
					number:true
				},
					
				"form-cantidad_total": {
					required:true,
					number:true
				},
					
				"form-cantidad_minima": {
					required:true,
					number:true
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
					
				"form-acepta_lote": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-valor_inventario": {
					required:true,
					number:true
				},
					
				"form-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-incremento1": {
					required:true,
					number:true
				},
					
				"form-incremento2": {
					required:true,
					number:true
				},
					
				"form-incremento3": {
					required:true,
					number:true
				},
					
				"form-incremento4": {
					required:true,
					number:true
				},
					
				"form-codigo_fabricante": {
					required:true,
					maxlength:24
					,regexpStringMethod:true
				},
					
				"form-producto_fisico": {
					required:true,
					digits:true
				},
					
				"form-situacion_producto": {
					required:true,
					digits:true
				},
					
				"form-id_tipo_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-tipo_producto_codigo": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-mostrar_componente": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form-factura_sin_stock": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-avisa_expiracion": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-factura_con_precio": {
					required:true,
					digits:true
				},
					
				"form-producto_equivalente": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-id_cuenta_compra": {
					digits:true
				
				},
					
				"form-id_cuenta_venta": {
					digits:true
				
				},
					
				"form-id_cuenta_inventario": {
					digits:true
				
				},
					
				"form-cuenta_compra_codigo": {
					required:true,
					maxlength:14
					,regexpStringMethod:true
				},
					
				"form-cuenta_venta_codigo": {
					required:true,
					maxlength:14
					,regexpStringMethod:true
				},
					
				"form-cuenta_inventario_codigo": {
					required:true,
					maxlength:14
					,regexpStringMethod:true
				},
					
				"form-id_otro_suplidor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_impuesto_ventas": {
					digits:true
				
				},
					
				"form-id_impuesto_compras": {
					digits:true
				
				},
					
				"form-impuesto1_en_ventas": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-impuesto1_en_compras": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-ultima_venta": {
					required:true,
					date:true
				},
					
				"form-id_otro_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_otro_impuesto_ventas": {
					digits:true
				
				},
					
				"form-id_otro_impuesto_compras": {
					digits:true
				
				},
					
				"form-otro_impuesto_ventas_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-otro_impuesto_compras_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-precio_de_compra_0": {
					required:true,
					number:true
				},
					
				"form-precio_actualizado": {
					required:true,
					date:true
				},
					
				"form-requiere_nro_serie": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form-costo_dolar": {
					required:true,
					number:true
				},
					
				"form-comentario": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-comenta_factura": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-id_retencion": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_retencion_ventas": {
					digits:true
				
				},
					
				"form-id_retencion_compras": {
					digits:true
				
				},
					
				"form-retencion_ventas_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-retencion_compras_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-notas": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-precio1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio4": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_unidad_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-unidad_en_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-equivalencia_en_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_unidad_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-unidad_en_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-equivalencia_en_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cantidad_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cantidad_minima": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sub_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-acepta_lote": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-valor_inventario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-incremento1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-incremento2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-incremento3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-incremento4": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-codigo_fabricante": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-producto_fisico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-situacion_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-tipo_producto_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-mostrar_componente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-factura_sin_stock": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-avisa_expiracion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-factura_con_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-producto_equivalente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_cuenta_compra": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_venta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_inventario": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cuenta_compra_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cuenta_venta_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cuenta_inventario_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_otro_suplidor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_impuesto_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_impuesto_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-impuesto1_en_ventas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-impuesto1_en_compras": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-ultima_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_otro_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_otro_impuesto_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_otro_impuesto_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-otro_impuesto_ventas_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-otro_impuesto_compras_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-precio_de_compra_0": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio_actualizado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-requiere_nro_serie": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-costo_dolar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-comentario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-comenta_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_retencion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_retencion_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_retencion_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-retencion_ventas_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-retencion_compras_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-notas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(lista_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_lista_producto-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-codigo_producto": {
					required:true,
					maxlength:26
					,regexpStringMethod:true
				},
					
				"form_lista_producto-descripcion_producto": {
					required:true,
					maxlength:70
					,regexpStringMethod:true
				},
					
				"form_lista_producto-precio1": {
					required:true,
					number:true
				},
					
				"form_lista_producto-precio2": {
					required:true,
					number:true
				},
					
				"form_lista_producto-precio3": {
					required:true,
					number:true
				},
					
				"form_lista_producto-precio4": {
					required:true,
					number:true
				},
					
				"form_lista_producto-costo": {
					required:true,
					number:true
				},
					
				"form_lista_producto-id_unidad_compra": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-unidad_en_compra": {
					required:true,
					digits:true
				},
					
				"form_lista_producto-equivalencia_en_compra": {
					required:true,
					number:true
				},
					
				"form_lista_producto-id_unidad_venta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-unidad_en_venta": {
					required:true,
					digits:true
				},
					
				"form_lista_producto-equivalencia_en_venta": {
					required:true,
					number:true
				},
					
				"form_lista_producto-cantidad_total": {
					required:true,
					number:true
				},
					
				"form_lista_producto-cantidad_minima": {
					required:true,
					number:true
				},
					
				"form_lista_producto-id_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-id_sub_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-acepta_lote": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-valor_inventario": {
					required:true,
					number:true
				},
					
				"form_lista_producto-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_lista_producto-incremento1": {
					required:true,
					number:true
				},
					
				"form_lista_producto-incremento2": {
					required:true,
					number:true
				},
					
				"form_lista_producto-incremento3": {
					required:true,
					number:true
				},
					
				"form_lista_producto-incremento4": {
					required:true,
					number:true
				},
					
				"form_lista_producto-codigo_fabricante": {
					required:true,
					maxlength:24
					,regexpStringMethod:true
				},
					
				"form_lista_producto-producto_fisico": {
					required:true,
					digits:true
				},
					
				"form_lista_producto-situacion_producto": {
					required:true,
					digits:true
				},
					
				"form_lista_producto-id_tipo_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-tipo_producto_codigo": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form_lista_producto-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-mostrar_componente": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form_lista_producto-factura_sin_stock": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-avisa_expiracion": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-factura_con_precio": {
					required:true,
					digits:true
				},
					
				"form_lista_producto-producto_equivalente": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-id_cuenta_compra": {
					digits:true
				
				},
					
				"form_lista_producto-id_cuenta_venta": {
					digits:true
				
				},
					
				"form_lista_producto-id_cuenta_inventario": {
					digits:true
				
				},
					
				"form_lista_producto-cuenta_compra_codigo": {
					required:true,
					maxlength:14
					,regexpStringMethod:true
				},
					
				"form_lista_producto-cuenta_venta_codigo": {
					required:true,
					maxlength:14
					,regexpStringMethod:true
				},
					
				"form_lista_producto-cuenta_inventario_codigo": {
					required:true,
					maxlength:14
					,regexpStringMethod:true
				},
					
				"form_lista_producto-id_otro_suplidor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-id_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-id_impuesto_ventas": {
					digits:true
				
				},
					
				"form_lista_producto-id_impuesto_compras": {
					digits:true
				
				},
					
				"form_lista_producto-impuesto1_en_ventas": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-impuesto1_en_compras": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-ultima_venta": {
					required:true,
					date:true
				},
					
				"form_lista_producto-id_otro_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-id_otro_impuesto_ventas": {
					digits:true
				
				},
					
				"form_lista_producto-id_otro_impuesto_compras": {
					digits:true
				
				},
					
				"form_lista_producto-otro_impuesto_ventas_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-otro_impuesto_compras_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-precio_de_compra_0": {
					required:true,
					number:true
				},
					
				"form_lista_producto-precio_actualizado": {
					required:true,
					date:true
				},
					
				"form_lista_producto-requiere_nro_serie": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form_lista_producto-costo_dolar": {
					required:true,
					number:true
				},
					
				"form_lista_producto-comentario": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_lista_producto-comenta_factura": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-id_retencion": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-id_retencion_ventas": {
					digits:true
				
				},
					
				"form_lista_producto-id_retencion_compras": {
					digits:true
				
				},
					
				"form_lista_producto-retencion_ventas_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-retencion_compras_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-notas": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_lista_producto-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-codigo_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-descripcion_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-precio1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-precio2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-precio3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-precio4": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-id_unidad_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-unidad_en_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-equivalencia_en_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-id_unidad_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-unidad_en_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-equivalencia_en_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-cantidad_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-cantidad_minima": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-id_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_sub_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-acepta_lote": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-valor_inventario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-incremento1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-incremento2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-incremento3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-incremento4": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-codigo_fabricante": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-producto_fisico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-situacion_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_tipo_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-tipo_producto_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-mostrar_componente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-factura_sin_stock": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-avisa_expiracion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-factura_con_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-producto_equivalente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-id_cuenta_compra": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_cuenta_venta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_cuenta_inventario": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-cuenta_compra_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-cuenta_venta_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-cuenta_inventario_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-id_otro_suplidor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_impuesto_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_impuesto_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-impuesto1_en_ventas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-impuesto1_en_compras": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-ultima_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_lista_producto-id_otro_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_otro_impuesto_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_otro_impuesto_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-otro_impuesto_ventas_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-otro_impuesto_compras_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-precio_de_compra_0": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-precio_actualizado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_lista_producto-requiere_nro_serie": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-costo_dolar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-comentario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-comenta_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-id_retencion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_retencion_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_retencion_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-retencion_ventas_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-retencion_compras_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-notas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(lista_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientolista_producto").validate(arrRules);
		
		if(lista_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotaleslista_producto").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-ultima_venta").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-precio_actualizado").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			lista_productoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"lista_producto");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcodigo_producto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtdescripcion_producto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio4,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcosto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtunidad_en_compra,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtequivalencia_en_compra,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtunidad_en_venta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtequivalencia_en_venta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcantidad_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcantidad_minima,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtacepta_lote,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtvalor_inventario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtimagen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento4,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcodigo_fabricante,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtproducto_fisico,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtsituacion_producto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txttipo_producto_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtmostrar_componente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtfactura_sin_stock,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtavisa_expiracion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtfactura_con_precio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtproducto_equivalente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcuenta_compra_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcuenta_venta_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcuenta_inventario_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtimpuesto1_en_ventas,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtimpuesto1_en_compras,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtotro_impuesto_ventas_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtotro_impuesto_compras_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio_de_compra_0,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtrequiere_nro_serie,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcosto_dolar,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcomentario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcomenta_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtretencion_ventas_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtretencion_compras_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtnotas,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcodigo_producto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtdescripcion_producto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio4,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcosto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtunidad_en_compra,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtequivalencia_en_compra,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtunidad_en_venta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtequivalencia_en_venta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcantidad_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcantidad_minima,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtacepta_lote,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtvalor_inventario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtimagen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento4,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcodigo_fabricante,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtproducto_fisico,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtsituacion_producto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txttipo_producto_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtmostrar_componente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtfactura_sin_stock,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtavisa_expiracion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtfactura_con_precio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtproducto_equivalente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcuenta_compra_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcuenta_venta_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcuenta_inventario_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtimpuesto1_en_ventas,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtimpuesto1_en_compras,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtotro_impuesto_ventas_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtotro_impuesto_compras_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio_de_compra_0,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtrequiere_nro_serie,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcosto_dolar,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcomentario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcomenta_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtretencion_ventas_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtretencion_compras_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtnotas,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,lista_producto_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,lista_producto_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"lista_producto"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(lista_producto_constante1.STR_RELATIVE_PATH,"lista_producto"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"lista_producto");
	
		super.procesarFinalizacionProceso(lista_producto_constante1,"lista_producto");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(lista_producto_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(lista_producto_constante1,"lista_producto"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(lista_producto_constante1,"lista_producto"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"lista_producto"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(lista_producto_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(lista_producto_constante1,"lista_producto");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
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
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,lista_producto_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
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

var lista_producto_funcion1=new lista_producto_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {lista_producto_funcion,lista_producto_funcion1};

/*Para ser llamado desde window.opener*/
window.lista_producto_funcion1 = lista_producto_funcion1;



//</script>
