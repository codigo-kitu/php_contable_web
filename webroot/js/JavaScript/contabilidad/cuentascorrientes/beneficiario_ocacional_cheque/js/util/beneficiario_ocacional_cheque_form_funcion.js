//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {beneficiario_ocacional_cheque_constante,beneficiario_ocacional_cheque_constante1} from '../util/beneficiario_ocacional_cheque_constante.js';


class beneficiario_ocacional_cheque_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(beneficiario_ocacional_cheque_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(beneficiario_ocacional_cheque_constante1,"beneficiario_ocacional_cheque");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"beneficiario_ocacional_cheque");		
		super.procesarInicioProceso(beneficiario_ocacional_cheque_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(beneficiario_ocacional_cheque_constante1,"beneficiario_ocacional_cheque"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"beneficiario_ocacional_cheque");		
		super.procesarInicioProceso(beneficiario_ocacional_cheque_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(beneficiario_ocacional_cheque_constante1,"beneficiario_ocacional_cheque"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(beneficiario_ocacional_cheque_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONES,beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO,beneficiario_ocacional_cheque_constante1.STR_RELATIVE_PATH,"beneficiario_ocacional_cheque");		
		
		if(super.esPaginaForm(beneficiario_ocacional_cheque_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(beneficiario_ocacional_cheque_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"beneficiario_ocacional_cheque");		
		super.procesarFinalizacionProceso(beneficiario_ocacional_cheque_constante1,"beneficiario_ocacional_cheque");
				
		if(super.esPaginaForm(beneficiario_ocacional_cheque_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_1);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_2);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_3);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txttelefono);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txttelefono_movil);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtemail);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtnotas);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtregistro_ocacional);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtregistro_tributario);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarbeneficiario_ocacional_cheque.txtNumeroRegistrosbeneficiario_ocacional_cheque,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'beneficiario_ocacional_chequees',strNumeroRegistros,document.frmParamsBuscarbeneficiario_ocacional_cheque.txtNumeroRegistrosbeneficiario_ocacional_cheque);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(beneficiario_ocacional_cheque_constante1) {
		
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
		
		
		if(beneficiario_ocacional_cheque_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-codigo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-direccion_1": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-direccion_2": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-direccion_3": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-telefono": {
					maxlength:15
					,regexpTelefonoMethod:true
				},
					
				"form-telefono_movil": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form-email": {
					required:true,
					maxlength:60
					,email:true
				},
					
				"form-notas": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-registro_ocacional": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-registro_tributario": {
					maxlength:30
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion_1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion_2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion_3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-telefono": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-telefono_movil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-email": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form-notas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-registro_ocacional": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-registro_tributario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(beneficiario_ocacional_cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_beneficiario_ocacional_cheque-codigo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-direccion_1": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-direccion_2": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-direccion_3": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-telefono": {
					maxlength:15
					,regexpTelefonoMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-telefono_movil": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-email": {
					required:true,
					maxlength:60
					,email:true
				},
					
				"form_beneficiario_ocacional_cheque-notas": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-registro_ocacional": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-registro_tributario": {
					maxlength:30
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_beneficiario_ocacional_cheque-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-direccion_1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-direccion_2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-direccion_3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-telefono": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-telefono_movil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-email": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_beneficiario_ocacional_cheque-notas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-registro_ocacional": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-registro_tributario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(beneficiario_ocacional_cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientobeneficiario_ocacional_cheque").validate(arrRules);
		
		if(beneficiario_ocacional_cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesbeneficiario_ocacional_cheque").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			beneficiario_ocacional_chequeFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"beneficiario_ocacional_cheque");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txttelefono,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txttelefono_movil,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtemail,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtnotas,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtregistro_ocacional,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtregistro_tributario,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txttelefono,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txttelefono_movil,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtemail,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtnotas,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtregistro_ocacional,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtregistro_tributario,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,beneficiario_ocacional_cheque_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,beneficiario_ocacional_cheque_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"beneficiario_ocacional_cheque"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(beneficiario_ocacional_cheque_constante1.STR_RELATIVE_PATH,"beneficiario_ocacional_cheque"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"beneficiario_ocacional_cheque");
	
		super.procesarFinalizacionProceso(beneficiario_ocacional_cheque_constante1,"beneficiario_ocacional_cheque");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(beneficiario_ocacional_cheque_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(beneficiario_ocacional_cheque_constante1,"beneficiario_ocacional_cheque"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(beneficiario_ocacional_cheque_constante1,"beneficiario_ocacional_cheque"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"beneficiario_ocacional_cheque"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(beneficiario_ocacional_cheque_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(beneficiario_ocacional_cheque_constante1,"beneficiario_ocacional_cheque");	
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
			else if(strValueTipoColumna=="Codigo Beneficiario") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion 1") {
				jQuery(".col_direccion_1").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion 2") {
				jQuery(".col_direccion_2").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion 3") {
				jQuery(".col_direccion_3").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Telefono") {
				jQuery(".col_telefono").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Telefono Movil") {
				jQuery(".col_telefono_movil").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Email") {
				jQuery(".col_email").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Notas") {
				jQuery(".col_notas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Registro Ocacional") {
				jQuery(".col_registro_ocacional").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Registro Tributario") {
				jQuery(".col_registro_tributario").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,beneficiario_ocacional_cheque_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cheque_cuenta_corriente" || strValueTipoRelacion=="Cheque") {
			beneficiario_ocacional_cheque_webcontrol1.registrarSesionParacheque_cuenta_corrientes(idActual);
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

var beneficiario_ocacional_cheque_funcion1=new beneficiario_ocacional_cheque_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {beneficiario_ocacional_cheque_funcion,beneficiario_ocacional_cheque_funcion1};

/*Para ser llamado desde window.opener*/
window.beneficiario_ocacional_cheque_funcion1 = beneficiario_ocacional_cheque_funcion1;



//</script>
