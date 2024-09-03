//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {documento_cuenta_cobrar_constante,documento_cuenta_cobrar_constante1} from '../util/documento_cuenta_cobrar_constante.js';

class documento_cuenta_cobrar_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(documento_cuenta_cobrar_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(documento_cuenta_cobrar_constante1,"documento_cuenta_cobrar");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"documento_cuenta_cobrar");
		
		super.procesarInicioProceso(documento_cuenta_cobrar_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(documento_cuenta_cobrar_constante1,"documento_cuenta_cobrar");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"documento_cuenta_cobrar");
		
		super.procesarInicioProceso(documento_cuenta_cobrar_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(documento_cuenta_cobrar_constante1,"documento_cuenta_cobrar");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(documento_cuenta_cobrar_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(documento_cuenta_cobrar_constante1.STR_ES_RELACIONES,documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO,documento_cuenta_cobrar_constante1.STR_RELATIVE_PATH,"documento_cuenta_cobrar");		
		
		if(super.esPaginaForm(documento_cuenta_cobrar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(documento_cuenta_cobrar_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"documento_cuenta_cobrar");
		
		super.procesarFinalizacionProceso(documento_cuenta_cobrar_constante1,"documento_cuenta_cobrar");
				
		if(super.esPaginaForm(documento_cuenta_cobrar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.hdnIdActual);
		jQuery('cmbdocumento_cuenta_cobrarid_empresa').val("");
		jQuery('cmbdocumento_cuenta_cobrarid_sucursal').val("");
		jQuery('cmbdocumento_cuenta_cobrarid_ejercicio').val("");
		jQuery('cmbdocumento_cuenta_cobrarid_periodo').val("");
		jQuery('cmbdocumento_cuenta_cobrarid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnumero);
		jQuery('cmbdocumento_cuenta_cobrarid_cliente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txttipo);
		jQuery('dtdocumento_cuenta_cobrarfecha_emision').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmonto_parcial);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmoneda);
		jQuery('dtdocumento_cuenta_cobrarfecha_vence').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnumero_de_pagos);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtbalance);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnumero_pagado);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtid_pagado);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmodulo_origen);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtid_origen);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmodulo_destino);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtid_destino);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnombre_pc);
		jQuery('dtdocumento_cuenta_cobrarhora').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmonto_mora);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtinteres_mora);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtdias_gracia_mora);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtinstrumento_pago);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txttipo_cambio);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnumero_cliente);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtclase_registro);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtestado_registro);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmotivo_anulacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtimpuesto_1);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtimpuesto_2);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtimpuesto_incluido);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtobservaciones);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtgrupo_pago);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txttermino_idpv);
		jQuery('cmbdocumento_cuenta_cobrarid_forma_pago_cliente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnro_pago);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtref_pago);
		jQuery('dtdocumento_cuenta_cobrarfecha_hora').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtid_base);
		jQuery('cmbdocumento_cuenta_cobrarid_cuenta_corriente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtncf);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscardocumento_cuenta_cobrar.txtNumeroRegistrosdocumento_cuenta_cobrar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'documento_cuenta_cobrares',strNumeroRegistros,document.frmParamsBuscardocumento_cuenta_cobrar.txtNumeroRegistrosdocumento_cuenta_cobrar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(documento_cuenta_cobrar_constante1) {
		
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
		
		
		if(documento_cuenta_cobrar_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-numero": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form-id_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-tipo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-monto": {
					required:true,
					number:true
				},
					
				"form-monto_parcial": {
					required:true,
					number:true
				},
					
				"form-moneda": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form-fecha_vence": {
					required:true,
					date:true
				},
					
				"form-numero_de_pagos": {
					required:true,
					digits:true
				},
					
				"form-balance": {
					required:true,
					number:true
				},
					
				"form-numero_pagado": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-id_pagado": {
					required:true,
					digits:true
				},
					
				"form-modulo_origen": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-id_origen": {
					required:true,
					digits:true
				},
					
				"form-modulo_destino": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-id_destino": {
					required:true,
					digits:true
				},
					
				"form-nombre_pc": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-hora": {
					required:true,
					date:true
				},
					
				"form-monto_mora": {
					required:true,
					number:true
				},
					
				"form-interes_mora": {
					required:true,
					number:true
				},
					
				"form-dias_gracia_mora": {
					required:true,
					digits:true
				},
					
				"form-instrumento_pago": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-tipo_cambio": {
					required:true,
					number:true
				},
					
				"form-numero_cliente": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-clase_registro": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-estado_registro": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-motivo_anulacion": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-impuesto_1": {
					required:true,
					number:true
				},
					
				"form-impuesto_2": {
					required:true,
					number:true
				},
					
				"form-impuesto_incluido": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-observaciones": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-grupo_pago": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-termino_idpv": {
					required:true,
					digits:true
				},
					
				"form-id_forma_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nro_pago": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-ref_pago": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-fecha_hora": {
					required:true,
					date:true
				},
					
				"form-id_base": {
					required:true,
					digits:true
				},
					
				"form-id_cuenta_corriente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-ncf": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-tipo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-monto_parcial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-numero_de_pagos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-numero_pagado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_pagado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-modulo_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-modulo_destino": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_destino": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre_pc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-monto_mora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-interes_mora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-dias_gracia_mora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-instrumento_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-tipo_cambio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-numero_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-clase_registro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-estado_registro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-motivo_anulacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-impuesto_1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-impuesto_2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-impuesto_incluido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-observaciones": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-grupo_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-termino_idpv": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_forma_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nro_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-ref_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-ncf": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(documento_cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_documento_cuenta_cobrar-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_cobrar-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_cobrar-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_cobrar-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_cobrar-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_cobrar-numero": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-id_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_cobrar-tipo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_documento_cuenta_cobrar-descripcion": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-monto": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_cobrar-monto_parcial": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_cobrar-moneda": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_documento_cuenta_cobrar-numero_de_pagos": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_cobrar-balance": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_cobrar-numero_pagado": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-id_pagado": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_cobrar-modulo_origen": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-id_origen": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_cobrar-modulo_destino": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-id_destino": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_cobrar-nombre_pc": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-hora": {
					required:true,
					date:true
				},
					
				"form_documento_cuenta_cobrar-monto_mora": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_cobrar-interes_mora": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_cobrar-dias_gracia_mora": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_cobrar-instrumento_pago": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-tipo_cambio": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_cobrar-numero_cliente": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-clase_registro": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-estado_registro": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-motivo_anulacion": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-impuesto_1": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_cobrar-impuesto_2": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_cobrar-impuesto_incluido": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-observaciones": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-grupo_pago": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-termino_idpv": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_cobrar-id_forma_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_cobrar-nro_pago": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-ref_pago": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_cobrar-fecha_hora": {
					required:true,
					date:true
				},
					
				"form_documento_cuenta_cobrar-id_base": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_cobrar-id_cuenta_corriente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_cobrar-ncf": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_documento_cuenta_cobrar-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-id_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-tipo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_documento_cuenta_cobrar-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_cobrar-monto_parcial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_cobrar-moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_documento_cuenta_cobrar-numero_de_pagos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_cobrar-numero_pagado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-id_pagado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-modulo_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-id_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-modulo_destino": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-id_destino": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-nombre_pc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_documento_cuenta_cobrar-monto_mora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_cobrar-interes_mora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_cobrar-dias_gracia_mora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-instrumento_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-tipo_cambio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_cobrar-numero_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-clase_registro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-estado_registro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-motivo_anulacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-impuesto_1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_cobrar-impuesto_2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_cobrar-impuesto_incluido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-observaciones": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-grupo_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-termino_idpv": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-id_forma_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-nro_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-ref_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_cobrar-fecha_hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_documento_cuenta_cobrar-id_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_cobrar-ncf": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(documento_cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientodocumento_cuenta_cobrar").validate(arrRules);
		
		if(documento_cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesdocumento_cuenta_cobrar").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-hora").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			documento_cuenta_cobrarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"documento_cuenta_cobrar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txttipo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmonto_parcial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmoneda,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnumero_de_pagos,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtbalance,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnumero_pagado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtid_pagado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmodulo_origen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtid_origen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmodulo_destino,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtid_destino,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnombre_pc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmonto_mora,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtinteres_mora,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtdias_gracia_mora,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtinstrumento_pago,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txttipo_cambio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnumero_cliente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtclase_registro,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtestado_registro,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmotivo_anulacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtimpuesto_1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtimpuesto_2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtimpuesto_incluido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtobservaciones,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtgrupo_pago,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txttermino_idpv,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnro_pago,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtref_pago,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtid_base,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtncf,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txttipo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmonto_parcial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmoneda,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnumero_de_pagos,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtbalance,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnumero_pagado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtid_pagado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmodulo_origen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtid_origen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmodulo_destino,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtid_destino,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnombre_pc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmonto_mora,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtinteres_mora,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtdias_gracia_mora,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtinstrumento_pago,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txttipo_cambio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnumero_cliente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtclase_registro,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtestado_registro,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtmotivo_anulacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtimpuesto_1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtimpuesto_2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtimpuesto_incluido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtobservaciones,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtgrupo_pago,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txttermino_idpv,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtnro_pago,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtref_pago,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtid_base,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_cobrar.txtncf,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,documento_cuenta_cobrar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,documento_cuenta_cobrar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"documento_cuenta_cobrar");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(documento_cuenta_cobrar_constante1.STR_RELATIVE_PATH,"documento_cuenta_cobrar");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"documento_cuenta_cobrar");
		
		super.procesarFinalizacionProceso(documento_cuenta_cobrar_constante1,"documento_cuenta_cobrar");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(documento_cuenta_cobrar_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(documento_cuenta_cobrar_constante1,"documento_cuenta_cobrar");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(documento_cuenta_cobrar_constante1,"documento_cuenta_cobrar");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"documento_cuenta_cobrar");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(documento_cuenta_cobrar_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(documento_cuenta_cobrar_constante1,"documento_cuenta_cobrar");
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
			else if(strValueTipoColumna=="Sucursal") {
				jQuery(".col_id_sucursal").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sucursal_img').trigger("click" );
				} else {
					jQuery('#form-id_sucursal_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Ejercicio") {
				jQuery(".col_id_ejercicio").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_ejercicio_img').trigger("click" );
				} else {
					jQuery('#form-id_ejercicio_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Periodo") {
				jQuery(".col_id_periodo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_periodo_img').trigger("click" );
				} else {
					jQuery('#form-id_periodo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Usuario") {
				jQuery(".col_id_usuario").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_usuario_img').trigger("click" );
				} else {
					jQuery('#form-id_usuario_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Numero") {
				jQuery(".col_numero").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cliente") {
				jQuery(".col_id_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_cliente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Tipo") {
				jQuery(".col_tipo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Emision") {
				jQuery(".col_fecha_emision").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto") {
				jQuery(".col_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto Parcial") {
				jQuery(".col_monto_parcial").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Moneda") {
				jQuery(".col_moneda").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Vencimiento") {
				jQuery(".col_fecha_vence").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro De Pagos") {
				jQuery(".col_numero_de_pagos").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Balance") {
				jQuery(".col_balance").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Documento Pagado") {
				jQuery(".col_numero_pagado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Id Pagado") {
				jQuery(".col_id_pagado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Modulo Origen") {
				jQuery(".col_modulo_origen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Id Origen") {
				jQuery(".col_id_origen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Modulo Destino") {
				jQuery(".col_modulo_destino").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Id Destino") {
				jQuery(".col_id_destino").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre Pc") {
				jQuery(".col_nombre_pc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Hora") {
				jQuery(".col_hora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto Mora") {
				jQuery(".col_monto_mora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Interes Mora") {
				jQuery(".col_interes_mora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Dias Gracia Mora") {
				jQuery(".col_dias_gracia_mora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Instrumento Pago") {
				jQuery(".col_instrumento_pago").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Tipo Cambio") {
				jQuery(".col_tipo_cambio").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Documento Cliente") {
				jQuery(".col_numero_cliente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Clase Registro") {
				jQuery(".col_clase_registro").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Estado Registro") {
				jQuery(".col_estado_registro").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Motivo Anulacion") {
				jQuery(".col_motivo_anulacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto 1") {
				jQuery(".col_impuesto_1").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto 2") {
				jQuery(".col_impuesto_2").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto Incluido") {
				jQuery(".col_impuesto_incluido").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Observaciones") {
				jQuery(".col_observaciones").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Grupo Pago") {
				jQuery(".col_grupo_pago").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Termino Idpv") {
				jQuery(".col_termino_idpv").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Forma Pago Cliente") {
				jQuery(".col_id_forma_pago_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_forma_pago_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_forma_pago_cliente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Nro Pago") {
				jQuery(".col_nro_pago").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Referencia Pago") {
				jQuery(".col_ref_pago").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Hora") {
				jQuery(".col_fecha_hora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Id Base") {
				jQuery(".col_id_base").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cuenta Cliente") {
				jQuery(".col_id_cuenta_corriente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_corriente_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_corriente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Ncf") {
				jQuery(".col_ncf").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,documento_cuenta_cobrar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="devolucion_factura" || strValueTipoRelacion=="Devolucion Factura") {
			documento_cuenta_cobrar_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		}
		else if(strValueTipoRelacion=="factura" || strValueTipoRelacion=="Factura") {
			documento_cuenta_cobrar_webcontrol1.registrarSesionParafacturas(idActual);
		}
		else if(strValueTipoRelacion=="factura_lote" || strValueTipoRelacion=="Facturas Lotes") {
			documento_cuenta_cobrar_webcontrol1.registrarSesionParafactura_lotees(idActual);
		}
		else if(strValueTipoRelacion=="imagen_documento_cuenta_cobrar" || strValueTipoRelacion=="Imagenes Documentos Cuentas por Cobrar") {
			documento_cuenta_cobrar_webcontrol1.registrarSesionParaimagen_documento_cuenta_cobrares(idActual);
		}
	}
	
	
	
}

var documento_cuenta_cobrar_funcion1=new documento_cuenta_cobrar_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {documento_cuenta_cobrar_funcion,documento_cuenta_cobrar_funcion1};

//Para ser llamado desde window.opener
window.documento_cuenta_cobrar_funcion1 = documento_cuenta_cobrar_funcion1;



//</script>
