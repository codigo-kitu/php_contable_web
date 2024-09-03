//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cliente_constante,cliente_constante1} from '../util/cliente_constante.js';

class cliente_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(cliente_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(cliente_constante1,"cliente");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cliente");
		
		super.procesarInicioProceso(cliente_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(cliente_constante1,"cliente");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cliente");
		
		super.procesarInicioProceso(cliente_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(cliente_constante1,"cliente");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(cliente_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cliente_constante1.STR_ES_RELACIONES,cliente_constante1.STR_ES_RELACIONADO,cliente_constante1.STR_RELATIVE_PATH,"cliente");		
		
		if(super.esPaginaForm(cliente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(cliente_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cliente");
		
		super.procesarFinalizacionProceso(cliente_constante1,"cliente");
				
		if(super.esPaginaForm(cliente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.hdnIdActual);
		jQuery('cmbclienteid_empresa').val("");
		jQuery('cmbclienteid_tipo_persona').val("");
		jQuery('cmbclienteid_categoria_cliente').val("");
		jQuery('cmbclienteid_tipo_precio').val("");
		jQuery('cmbclienteid_giro_negocio_cliente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtruc);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtprimer_apellido);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtsegundo_apellido);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtprimer_nombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtsegundo_nombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtnombre_completo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txttelefono);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txttelefono_movil);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txte_mail);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txte_mail2);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtcomentario);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtimagen);
		funcionGeneral.setCheckControl(document.frmMantenimientocliente.chbactivo,false);
		jQuery('cmbclienteid_pais').val("");
		jQuery('cmbclienteid_provincia').val("");
		jQuery('cmbclienteid_ciudad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtcodigo_postal);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtfax);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtcontacto);
		jQuery('cmbclienteid_vendedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtmaximo_credito);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtmaximo_descuento);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtinteres_anual);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtbalance);
		jQuery('cmbclienteid_termino_pago_cliente').val("");
		jQuery('cmbclienteid_cuenta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtfacturar_con);
		funcionGeneral.setCheckControl(document.frmMantenimientocliente.chbaplica_impuesto_ventas,false);
		jQuery('cmbclienteid_impuesto').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientocliente.chbaplica_retencion_impuesto,false);
		jQuery('cmbclienteid_retencion').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientocliente.chbaplica_retencion_fuente,false);
		jQuery('cmbclienteid_retencion_fuente').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientocliente.chbaplica_retencion_ica,false);
		jQuery('cmbclienteid_retencion_ica').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientocliente.chbaplica_2do_impuesto,false);
		jQuery('cmbclienteid_otro_impuesto').val("");
		jQuery('dtclientecreado').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtmonto_ultima_transaccion);
		jQuery('dtclientefecha_ultima_transaccion').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtdescri_ultima_transaccion);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcliente.txtNumeroRegistroscliente,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'clientes',strNumeroRegistros,document.frmParamsBuscarcliente.txtNumeroRegistroscliente);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(cliente_constante1) {
		
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
		
		
		if(cliente_constante1.STR_SUFIJO=="") {
			
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
					
				"form-id_categoria_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_precio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_giro_negocio_cliente": {
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
					,regexpDirMethod:true
				},
					
				"form-telefono": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form-telefono_movil": {
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
					
				"form-id_termino_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_cuenta": {
					digits:true
				
				},
					
				"form-facturar_con": {
					required:true,
					digits:true
				},
					
					
				"form-id_impuesto": {
					required:true,
					digits:true
					,min:0
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
					maxlength:100
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_persona": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_categoria_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_giro_negocio_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-primer_apellido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-segundo_apellido": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-primer_nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-segundo_nombre": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_completo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_REGEXPDIRMETHOD_INCORRECTO,
					"form-telefono": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-telefono_movil": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
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
					"form-id_termino_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-facturar_con": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
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
		
			
			if(cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cliente-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_tipo_persona": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_categoria_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_tipo_precio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_giro_negocio_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-codigo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_cliente-ruc": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_cliente-primer_apellido": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cliente-segundo_apellido": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cliente-primer_nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cliente-segundo_nombre": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cliente-nombre_completo": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_cliente-direccion": {
					required:true,
					maxlength:150
					,regexpDirMethod:true
				},
					
				"form_cliente-telefono": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form_cliente-telefono_movil": {
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form_cliente-e_mail": {
					required:true,
					maxlength:100
					,email:true
				},
					
				"form_cliente-e_mail2": {
					maxlength:100
					,email:true
				},
					
				"form_cliente-comentario": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_cliente-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form_cliente-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_provincia": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-codigo_postal": {
					maxlength:15
					,regexpPostalMethod:true
				},
					
				"form_cliente-fax": {
					maxlength:20
					,regexpFaxMethod:true
				},
					
				"form_cliente-contacto": {
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_cliente-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-maximo_credito": {
					required:true,
					number:true
				},
					
				"form_cliente-maximo_descuento": {
					required:true,
					number:true
				},
					
				"form_cliente-interes_anual": {
					required:true,
					number:true
				},
					
				"form_cliente-balance": {
					required:true,
					number:true
				},
					
				"form_cliente-id_termino_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_cuenta": {
					digits:true
				
				},
					
				"form_cliente-facturar_con": {
					required:true,
					digits:true
				},
					
					
				"form_cliente-id_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
					
				"form_cliente-id_retencion": {
					digits:true
				
				},
					
					
				"form_cliente-id_retencion_fuente": {
					digits:true
				
				},
					
					
				"form_cliente-id_retencion_ica": {
					digits:true
				
				},
					
					
				"form_cliente-id_otro_impuesto": {
					digits:true
				
				},
					
				"form_cliente-creado": {
					required:true,
					date:true
				},
					
				"form_cliente-monto_ultima_transaccion": {
					number:true
				},
					
				"form_cliente-fecha_ultima_transaccion": {
					required:true,
					date:true
				},
					
				"form_cliente-descripcion_ultima_transaccion": {
					maxlength:100
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_cliente-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_tipo_persona": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_categoria_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_tipo_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_giro_negocio_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-primer_apellido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-segundo_apellido": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-primer_nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-segundo_nombre": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-nombre_completo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_REGEXPDIRMETHOD_INCORRECTO,
					"form_cliente-telefono": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_cliente-telefono_movil": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_cliente-e_mail": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_cliente-e_mail2": ""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_cliente-comentario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_cliente-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_provincia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-codigo_postal": ""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form_cliente-fax": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form_cliente-contacto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-maximo_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cliente-maximo_descuento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cliente-interes_anual": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cliente-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cliente-id_termino_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-facturar_con": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_cliente-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_cliente-id_retencion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_cliente-id_retencion_fuente": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_cliente-id_retencion_ica": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_cliente-id_otro_impuesto": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-creado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cliente-monto_ultima_transaccion": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cliente-fecha_ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cliente-descripcion_ultima_transaccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocliente").validate(arrRules);
		
		if(cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescliente").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-creado").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		jQuery("#form-fecha_ultima_transaccion").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			clienteFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cliente");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtprimer_apellido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtsegundo_apellido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtprimer_nombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtsegundo_nombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtnombre_completo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txttelefono,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txttelefono_movil,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txte_mail,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txte_mail2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcomentario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtimagen,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbactivo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcodigo_postal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtfax,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcontacto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtmaximo_credito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtmaximo_descuento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtinteres_anual,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtbalance,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtfacturar_con,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_impuesto_ventas,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_retencion_impuesto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_retencion_fuente,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_retencion_ica,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_2do_impuesto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtmonto_ultima_transaccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtdescri_ultima_transaccion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtprimer_apellido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtsegundo_apellido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtprimer_nombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtsegundo_nombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtnombre_completo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txttelefono,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txttelefono_movil,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txte_mail,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txte_mail2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcomentario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtimagen,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbactivo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcodigo_postal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtfax,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcontacto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtmaximo_credito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtmaximo_descuento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtinteres_anual,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtbalance,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtfacturar_con,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_impuesto_ventas,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_retencion_impuesto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_retencion_fuente,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_retencion_ica,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_2do_impuesto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtmonto_ultima_transaccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtdescri_ultima_transaccion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cliente_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cliente_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cliente");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(cliente_constante1.STR_RELATIVE_PATH,"cliente");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cliente");
		
		super.procesarFinalizacionProceso(cliente_constante1,"cliente");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(cliente_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(cliente_constante1,"cliente");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(cliente_constante1,"cliente");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cliente");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(cliente_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(cliente_constante1,"cliente");
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
			else if(strValueTipoColumna==" Tipo Persona") {
				jQuery(".col_id_tipo_persona").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_persona_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_persona_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Categorias Cliente") {
				jQuery(".col_id_categoria_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_categoria_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_categoria_cliente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Tipo Precio") {
				jQuery(".col_id_tipo_precio").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_precio_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_precio_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Giro Negocio") {
				jQuery(".col_id_giro_negocio_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_giro_negocio_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_giro_negocio_cliente_img_busqueda').trigger("click" );
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
			else if(strValueTipoColumna=="Terminos Pago") {
				jQuery(".col_id_termino_pago_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_termino_pago_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_termino_pago_cliente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Contable Ventas") {
				jQuery(".col_id_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Facturar Con") {
				jQuery(".col_facturar_con").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Aplica Impuesto Ventas") {
				jQuery(".col_aplica_impuesto_ventas").css({"border-color":"red"});
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
			else if(strValueTipoColumna==" Retencion") {
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

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,cliente_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cheque_cuenta_corriente" || strValueTipoRelacion=="Cheque") {
			cliente_webcontrol1.registrarSesionParacheque_cuenta_corrientes(idActual);
		}
		else if(strValueTipoRelacion=="consignacion" || strValueTipoRelacion=="Consignacion") {
			cliente_webcontrol1.registrarSesionParaconsignaciones(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_cobrar" || strValueTipoRelacion=="Cuenta Cobrar") {
			cliente_webcontrol1.registrarSesionParacuenta_cobrars(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_corriente_detalle" || strValueTipoRelacion=="Cuenta Corriente Detalle") {
			cliente_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		}
		else if(strValueTipoRelacion=="devolucion_factura" || strValueTipoRelacion=="Devolucion Factura") {
			cliente_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		}
		else if(strValueTipoRelacion=="documento_cliente" || strValueTipoRelacion=="Documentos Clientes") {
			cliente_webcontrol1.registrarSesionParadocumento_clientees(idActual);
		}
		else if(strValueTipoRelacion=="documento_cuenta_cobrar" || strValueTipoRelacion=="Documentos Cuentas por Cobrar") {
			cliente_webcontrol1.registrarSesionParadocumento_cuenta_cobrares(idActual);
		}
		else if(strValueTipoRelacion=="estimado" || strValueTipoRelacion=="Estimado") {
			cliente_webcontrol1.registrarSesionParaestimados(idActual);
		}
		else if(strValueTipoRelacion=="factura" || strValueTipoRelacion=="Factura") {
			cliente_webcontrol1.registrarSesionParafacturas(idActual);
		}
		else if(strValueTipoRelacion=="factura_lote" || strValueTipoRelacion=="Facturas Lotes") {
			cliente_webcontrol1.registrarSesionParafactura_lotees(idActual);
		}
		else if(strValueTipoRelacion=="factura_modelo" || strValueTipoRelacion=="Facturas Modelos") {
			cliente_webcontrol1.registrarSesionParafactura_modeloes(idActual);
		}
		else if(strValueTipoRelacion=="imagen_cliente" || strValueTipoRelacion=="Imagenes Cliente") {
			cliente_webcontrol1.registrarSesionParaimagen_clientes(idActual);
		}
		else if(strValueTipoRelacion=="kardex" || strValueTipoRelacion=="Kardex") {
			cliente_webcontrol1.registrarSesionParakardexes(idActual);
		}
		else if(strValueTipoRelacion=="lista_cliente" || strValueTipoRelacion=="Lista Cliente") {
			cliente_webcontrol1.registrarSesionParalista_clientes(idActual);
		}
	}
	
	
	
}

var cliente_funcion1=new cliente_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {cliente_funcion,cliente_funcion1};

//Para ser llamado desde window.opener
window.cliente_funcion1 = cliente_funcion1;



//</script>
