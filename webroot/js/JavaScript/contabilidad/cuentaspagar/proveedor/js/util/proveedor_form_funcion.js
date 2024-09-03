//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {proveedor_constante,proveedor_constante1} from '../util/proveedor_constante.js';


class proveedor_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(proveedor_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(proveedor_constante1,"proveedor");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"proveedor");		
		super.procesarInicioProceso(proveedor_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(proveedor_constante1,"proveedor"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"proveedor");		
		super.procesarInicioProceso(proveedor_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(proveedor_constante1,"proveedor"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(proveedor_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(proveedor_constante1.STR_ES_RELACIONES,proveedor_constante1.STR_ES_RELACIONADO,proveedor_constante1.STR_RELATIVE_PATH,"proveedor");		
		
		if(super.esPaginaForm(proveedor_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(proveedor_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"proveedor");		
		super.procesarFinalizacionProceso(proveedor_constante1,"proveedor");
				
		if(super.esPaginaForm(proveedor_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbproveedorid_empresa').val("");
		jQuery('cmbproveedorid_tipo_persona').val("");
		jQuery('cmbproveedorid_categoria_proveedor').val("");
		jQuery('cmbproveedorid_giro_negocio_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtruc);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtprimer_apellido);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtsegundo_apellido);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtprimer_nombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtsegundo_nombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtnombre_completo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txttelefono);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txttelefono_movil);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txte_mail);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txte_mail2);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtcomentario);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtimagen);
		funcionGeneral.setCheckControl(document.frmMantenimientoproveedor.chbactivo,false);
		jQuery('cmbproveedorid_pais').val("");
		jQuery('cmbproveedorid_provincia').val("");
		jQuery('cmbproveedorid_ciudad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtcodigo_postal);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtfax);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtcontacto);
		jQuery('cmbproveedorid_vendedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtmaximo_credito);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtmaximo_descuento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtinteres_anual);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtbalance);
		jQuery('cmbproveedorid_termino_pago_proveedor').val("");
		jQuery('cmbproveedorid_cuenta').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoproveedor.chbaplica_impuesto_compras,false);
		jQuery('cmbproveedorid_impuesto').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoproveedor.chbaplica_retencion_impuesto,false);
		jQuery('cmbproveedorid_retencion').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoproveedor.chbaplica_retencion_fuente,false);
		jQuery('cmbproveedorid_retencion_fuente').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoproveedor.chbaplica_retencion_ica,false);
		jQuery('cmbproveedorid_retencion_ica').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoproveedor.chbaplica_2do_impuesto,false);
		jQuery('cmbproveedorid_otro_impuesto').val("");
		jQuery('dtproveedorcreado').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtmonto_ultima_transaccion);
		jQuery('dtproveedorfecha_ultima_transaccion').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtdescripcion_ultima_transaccion);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarproveedor.txtNumeroRegistrosproveedor,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'proveedores',strNumeroRegistros,document.frmParamsBuscarproveedor.txtNumeroRegistrosproveedor);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(proveedor_constante1) {
		
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
		
		
		if(proveedor_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_persona": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_categoria_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_giro_negocio_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-ruc": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-primer_apellido": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-segundo_apellido": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-primer_nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-segundo_nombre": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-nombre_completo": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-direccion": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-telefono": {
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form-telefono_movil": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form-e_mail": {
					required:true,
					maxlength:100
					,email:true
				},
					
				"form-e_mail2": {
					maxlength:100
					,email:true
				},
					
				"form-comentario": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_provincia": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo_postal": {
					maxlength:15
					,regexpPostalMethod:true
				},
					
				"form-fax": {
					maxlength:20
					,regexpFaxMethod:true
				},
					
				"form-contacto": {
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-maximo_credito": {
					required:true,
					number:true
				},
					
				"form-maximo_descuento": {
					required:true,
					number:true
				},
					
				"form-interes_anual": {
					required:true,
					number:true
				},
					
				"form-balance": {
					required:true,
					number:true
				},
					
				"form-id_termino_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_cuenta": {
					digits:true
				
				},
					
					
				"form-id_impuesto": {
					digits:true
				
				},
					
					
				"form-id_retencion": {
					digits:true
				
				},
					
					
				"form-id_retencion_fuente": {
					digits:true
				
				},
					
					
				"form-id_retencion_ica": {
					digits:true
				
				},
					
					
				"form-id_otro_impuesto": {
					digits:true
				
				},
					
				"form-creado": {
					required:true,
					date:true
				},
					
				"form-monto_ultima_transaccion": {
					number:true
				},
					
				"form-fecha_ultima_transaccion": {
					required:true,
					date:true
				},
					
				"form-descripcion_ultima_transaccion": {
					maxlength:80
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_persona": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_categoria_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_giro_negocio_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-primer_apellido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-segundo_apellido": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-primer_nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-segundo_nombre": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_completo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-telefono": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-telefono_movil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-e_mail": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form-e_mail2": ""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form-comentario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_provincia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo_postal": ""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form-fax": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form-contacto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-maximo_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-maximo_descuento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-interes_anual": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-id_impuesto": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-id_retencion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-id_retencion_fuente": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-id_retencion_ica": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-id_otro_impuesto": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-creado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-monto_ultima_transaccion": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-fecha_ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-descripcion_ultima_transaccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_proveedor-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-id_tipo_persona": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-id_categoria_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-id_giro_negocio_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-codigo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_proveedor-ruc": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_proveedor-primer_apellido": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_proveedor-segundo_apellido": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_proveedor-primer_nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_proveedor-segundo_nombre": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_proveedor-nombre_completo": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_proveedor-direccion": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_proveedor-telefono": {
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form_proveedor-telefono_movil": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form_proveedor-e_mail": {
					required:true,
					maxlength:100
					,email:true
				},
					
				"form_proveedor-e_mail2": {
					maxlength:100
					,email:true
				},
					
				"form_proveedor-comentario": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_proveedor-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form_proveedor-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-id_provincia": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-codigo_postal": {
					maxlength:15
					,regexpPostalMethod:true
				},
					
				"form_proveedor-fax": {
					maxlength:20
					,regexpFaxMethod:true
				},
					
				"form_proveedor-contacto": {
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_proveedor-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-maximo_credito": {
					required:true,
					number:true
				},
					
				"form_proveedor-maximo_descuento": {
					required:true,
					number:true
				},
					
				"form_proveedor-interes_anual": {
					required:true,
					number:true
				},
					
				"form_proveedor-balance": {
					required:true,
					number:true
				},
					
				"form_proveedor-id_termino_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-id_cuenta": {
					digits:true
				
				},
					
					
				"form_proveedor-id_impuesto": {
					digits:true
				
				},
					
					
				"form_proveedor-id_retencion": {
					digits:true
				
				},
					
					
				"form_proveedor-id_retencion_fuente": {
					digits:true
				
				},
					
					
				"form_proveedor-id_retencion_ica": {
					digits:true
				
				},
					
					
				"form_proveedor-id_otro_impuesto": {
					digits:true
				
				},
					
				"form_proveedor-creado": {
					required:true,
					date:true
				},
					
				"form_proveedor-monto_ultima_transaccion": {
					number:true
				},
					
				"form_proveedor-fecha_ultima_transaccion": {
					required:true,
					date:true
				},
					
				"form_proveedor-descripcion_ultima_transaccion": {
					maxlength:80
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_proveedor-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-id_tipo_persona": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-id_categoria_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-id_giro_negocio_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-primer_apellido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-segundo_apellido": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-primer_nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-segundo_nombre": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-nombre_completo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-telefono": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_proveedor-telefono_movil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_proveedor-e_mail": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_proveedor-e_mail2": ""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_proveedor-comentario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_proveedor-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-id_provincia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-codigo_postal": ""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form_proveedor-fax": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form_proveedor-contacto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-maximo_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_proveedor-maximo_descuento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_proveedor-interes_anual": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_proveedor-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_proveedor-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_proveedor-id_impuesto": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_proveedor-id_retencion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_proveedor-id_retencion_fuente": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_proveedor-id_retencion_ica": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_proveedor-id_otro_impuesto": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-creado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_proveedor-monto_ultima_transaccion": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_proveedor-fecha_ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_proveedor-descripcion_ultima_transaccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoproveedor").validate(arrRules);
		
		if(proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesproveedor").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-creado").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		jQuery("#form-fecha_ultima_transaccion").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			proveedorFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"proveedor");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtprimer_apellido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtsegundo_apellido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtprimer_nombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtsegundo_nombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtnombre_completo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txttelefono,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txttelefono_movil,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txte_mail,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txte_mail2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcomentario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtimagen,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbactivo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcodigo_postal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtfax,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcontacto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtmaximo_credito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtmaximo_descuento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtinteres_anual,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtbalance,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_impuesto_compras,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_retencion_impuesto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_retencion_fuente,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_retencion_ica,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_2do_impuesto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtmonto_ultima_transaccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtdescripcion_ultima_transaccion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtprimer_apellido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtsegundo_apellido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtprimer_nombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtsegundo_nombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtnombre_completo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txttelefono,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txttelefono_movil,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txte_mail,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txte_mail2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcomentario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtimagen,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbactivo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcodigo_postal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtfax,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcontacto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtmaximo_credito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtmaximo_descuento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtinteres_anual,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtbalance,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_impuesto_compras,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_retencion_impuesto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_retencion_fuente,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_retencion_ica,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_2do_impuesto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtmonto_ultima_transaccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtdescripcion_ultima_transaccion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,proveedor_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,proveedor_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"proveedor"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(proveedor_constante1.STR_RELATIVE_PATH,"proveedor"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"proveedor");
	
		super.procesarFinalizacionProceso(proveedor_constante1,"proveedor");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(proveedor_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(proveedor_constante1,"proveedor"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(proveedor_constante1,"proveedor"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"proveedor"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(proveedor_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(proveedor_constante1,"proveedor");	
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
			else if(strValueTipoColumna==" Tipo Persona") {
				jQuery(".col_id_tipo_persona").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_persona_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_persona_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Categoria") {
				jQuery(".col_id_categoria_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_categoria_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_categoria_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Giro Negocio") {
				jQuery(".col_id_giro_negocio_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_giro_negocio_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_giro_negocio_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ruc") {
				jQuery(".col_ruc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Primer Apellido") {
				jQuery(".col_primer_apellido").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Segundo Apellido") {
				jQuery(".col_segundo_apellido").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Primer Nombre") {
				jQuery(".col_primer_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Segundo Nombre") {
				jQuery(".col_segundo_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre Completo") {
				jQuery(".col_nombre_completo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion") {
				jQuery(".col_direccion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Telefono") {
				jQuery(".col_telefono").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Telefono Movil") {
				jQuery(".col_telefono_movil").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="E Mail") {
				jQuery(".col_e_mail").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="E Mail2") {
				jQuery(".col_e_mail2").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Comentario") {
				jQuery(".col_comentario").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Imagen") {
				jQuery(".col_imagen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Activo") {
				jQuery(".col_activo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Pais") {
				jQuery(".col_id_pais").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_pais_img').trigger("click" );
				} else {
					jQuery('#form-id_pais_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Provincia") {
				jQuery(".col_id_provincia").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_provincia_img').trigger("click" );
				} else {
					jQuery('#form-id_provincia_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Ciudad") {
				jQuery(".col_id_ciudad").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_ciudad_img').trigger("click" );
				} else {
					jQuery('#form-id_ciudad_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo Postal") {
				jQuery(".col_codigo_postal").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fax") {
				jQuery(".col_fax").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Contacto") {
				jQuery(".col_contacto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Vendedor") {
				jQuery(".col_id_vendedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_vendedor_img').trigger("click" );
				} else {
					jQuery('#form-id_vendedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Maximo Credito") {
				jQuery(".col_maximo_credito").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Maximo Descuento") {
				jQuery(".col_maximo_descuento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Interes Anual") {
				jQuery(".col_interes_anual").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Balance") {
				jQuery(".col_balance").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Termino Pago") {
				jQuery(".col_id_termino_pago_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_termino_pago_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_termino_pago_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta") {
				jQuery(".col_id_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Aplica Impuesto Compras") {
				jQuery(".col_aplica_impuesto_compras").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Aplica Retencion Impuesto") {
				jQuery(".col_aplica_retencion_impuesto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Retencion") {
				jQuery(".col_id_retencion").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_retencion_img').trigger("click" );
				} else {
					jQuery('#form-id_retencion_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Aplica Retencion Fuente") {
				jQuery(".col_aplica_retencion_fuente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Retencion Fuente") {
				jQuery(".col_id_retencion_fuente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_retencion_fuente_img').trigger("click" );
				} else {
					jQuery('#form-id_retencion_fuente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Aplica Retencion Ica") {
				jQuery(".col_aplica_retencion_ica").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Retencion Ica") {
				jQuery(".col_id_retencion_ica").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_retencion_ica_img').trigger("click" );
				} else {
					jQuery('#form-id_retencion_ica_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Aplica 2do Impuesto") {
				jQuery(".col_aplica_2do_impuesto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Otro Impuesto") {
				jQuery(".col_id_otro_impuesto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_otro_impuesto_img').trigger("click" );
				} else {
					jQuery('#form-id_otro_impuesto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Creado") {
				jQuery(".col_creado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto Ultima Transaccion") {
				jQuery(".col_monto_ultima_transaccion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Ultima Transaccion") {
				jQuery(".col_fecha_ultima_transaccion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion Ultima Transaccion") {
				jQuery(".col_descripcion_ultima_transaccion").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,proveedor_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cheque_cuenta_corriente" || strValueTipoRelacion=="Cheque") {
			proveedor_webcontrol1.registrarSesionParacheque_cuenta_corrientes(idActual);
		}
		else if(strValueTipoRelacion=="cotizacion" || strValueTipoRelacion=="Cotizacion") {
			proveedor_webcontrol1.registrarSesionParacotizaciones(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_corriente_detalle" || strValueTipoRelacion=="Cuenta Corriente Detalle") {
			proveedor_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_pagar" || strValueTipoRelacion=="Cuenta Pagar") {
			proveedor_webcontrol1.registrarSesionParacuenta_pagars(idActual);
		}
		else if(strValueTipoRelacion=="devolucion" || strValueTipoRelacion=="Devolucion") {
			proveedor_webcontrol1.registrarSesionParadevoluciones(idActual);
		}
		else if(strValueTipoRelacion=="documento_cuenta_pagar" || strValueTipoRelacion=="Documentos Cuentas por Pagar") {
			proveedor_webcontrol1.registrarSesionParadocumento_cuenta_pagares(idActual);
		}
		else if(strValueTipoRelacion=="documento_proveedor" || strValueTipoRelacion=="Documentos Proveedores") {
			proveedor_webcontrol1.registrarSesionParadocumento_proveedores(idActual);
		}
		else if(strValueTipoRelacion=="estimado" || strValueTipoRelacion=="Estimado") {
			proveedor_webcontrol1.registrarSesionParaestimados(idActual);
		}
		else if(strValueTipoRelacion=="imagen_proveedor" || strValueTipoRelacion=="Imagenes Proveedores") {
			proveedor_webcontrol1.registrarSesionParaimagen_proveedores(idActual);
		}
		else if(strValueTipoRelacion=="kardex" || strValueTipoRelacion=="Kardex") {
			proveedor_webcontrol1.registrarSesionParakardexes(idActual);
		}
		else if(strValueTipoRelacion=="lista_precio" || strValueTipoRelacion=="Lista Precios") {
			proveedor_webcontrol1.registrarSesionParalista_precioes(idActual);
		}
		else if(strValueTipoRelacion=="lote_producto" || strValueTipoRelacion=="Lotes Producto") {
			proveedor_webcontrol1.registrarSesionParalote_productoes(idActual);
		}
		else if(strValueTipoRelacion=="orden_compra" || strValueTipoRelacion=="Orden Compra") {
			proveedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		}
		else if(strValueTipoRelacion=="otro_suplidor" || strValueTipoRelacion=="Otro Suplidor") {
			proveedor_webcontrol1.registrarSesionParaotro_suplidores(idActual);
		}
		else if(strValueTipoRelacion=="producto" || strValueTipoRelacion=="Producto") {
			proveedor_webcontrol1.registrarSesionParaproductos(idActual);
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

var proveedor_funcion1=new proveedor_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {proveedor_funcion,proveedor_funcion1};

/*Para ser llamado desde window.opener*/
window.proveedor_funcion1 = proveedor_funcion1;



//</script>
