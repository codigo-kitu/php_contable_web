//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {empresa_constante,empresa_constante1} from '../util/empresa_constante.js';


class empresa_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(empresa_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(empresa_constante1,"empresa");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"empresa");		
		super.procesarInicioProceso(empresa_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(empresa_constante1,"empresa"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"empresa");		
		super.procesarInicioProceso(empresa_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(empresa_constante1,"empresa"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(empresa_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(empresa_constante1.STR_ES_RELACIONES,empresa_constante1.STR_ES_RELACIONADO,empresa_constante1.STR_RELATIVE_PATH,"empresa");		
		
		if(super.esPaginaForm(empresa_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(empresa_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"empresa");		
		super.procesarFinalizacionProceso(empresa_constante1,"empresa");
				
		if(super.esPaginaForm(empresa_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbempresaid_pais').val("");
		jQuery('cmbempresaid_ciudad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtruc);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtnombre_comercial);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtsector);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtdireccion1);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtdireccion2);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtdireccion3);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txttelefono1);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtmovil);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtmail);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtsitio_web);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtcodigo_postal);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtfax);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txtlogo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoempresa.txticono);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarempresa.txtNumeroRegistrosempresa,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'empresas',strNumeroRegistros,document.frmParamsBuscarempresa.txtNumeroRegistrosempresa);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(empresa_constante1) {
		
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
		
		
		if(empresa_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-ruc": {
					required:true,
					maxlength:15
					,digits:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-nombre_comercial": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-sector": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-direccion1": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-direccion2": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-direccion3": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-telefono1": {
					required:true,
					maxlength:40
					,regexpTelefonoMethod:true
				},
					
				"form-movil": {
					maxlength:40
					,regexpTelefonoMethod:true
				},
					
				"form-mail": {
					required:true,
					maxlength:120
					,email:true
				},
					
				"form-sitio_web": {
					maxlength:120
					,url:true
				},
					
				"form-codigo_postal": {
					maxlength:40
					,regexpPostalMethod:true
				},
					
				"form-fax": {
					maxlength:40
					,regexpFaxMethod:true
				},
					
				"form-logo": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-icono": {
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DIGITS_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_comercial": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-sector": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-telefono1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-movil": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-mail": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form-sitio_web": ""+constantes.STR_MENSAJE_URL_INCORRECTO,
					"form-codigo_postal": ""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form-fax": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form-logo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-icono": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(empresa_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_empresa-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_empresa-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_empresa-ruc": {
					required:true,
					maxlength:15
					,digits:true
				},
					
				"form_empresa-nombre": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_empresa-nombre_comercial": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_empresa-sector": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_empresa-direccion1": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_empresa-direccion2": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_empresa-direccion3": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_empresa-telefono1": {
					required:true,
					maxlength:40
					,regexpTelefonoMethod:true
				},
					
				"form_empresa-movil": {
					maxlength:40
					,regexpTelefonoMethod:true
				},
					
				"form_empresa-mail": {
					required:true,
					maxlength:120
					,email:true
				},
					
				"form_empresa-sitio_web": {
					maxlength:120
					,url:true
				},
					
				"form_empresa-codigo_postal": {
					maxlength:40
					,regexpPostalMethod:true
				},
					
				"form_empresa-fax": {
					maxlength:40
					,regexpFaxMethod:true
				},
					
				"form_empresa-logo": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_empresa-icono": {
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_empresa-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_empresa-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_empresa-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DIGITS_INCORRECTO,
					"form_empresa-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_empresa-nombre_comercial": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_empresa-sector": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_empresa-direccion1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_empresa-direccion2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_empresa-direccion3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_empresa-telefono1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_empresa-movil": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_empresa-mail": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_empresa-sitio_web": ""+constantes.STR_MENSAJE_URL_INCORRECTO,
					"form_empresa-codigo_postal": ""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form_empresa-fax": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form_empresa-logo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_empresa-icono": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(empresa_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoempresa").validate(arrRules);
		
		if(empresa_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesempresa").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			empresaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"empresa");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtnombre_comercial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtsector,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtdireccion1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtdireccion2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtdireccion3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txttelefono1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtmovil,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtmail,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtsitio_web,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtcodigo_postal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtfax,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtlogo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txticono,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtnombre_comercial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtsector,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtdireccion1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtdireccion2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtdireccion3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txttelefono1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtmovil,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtmail,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtsitio_web,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtcodigo_postal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtfax,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txtlogo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoempresa.txticono,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,empresa_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,empresa_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"empresa"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(empresa_constante1.STR_RELATIVE_PATH,"empresa"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"empresa");
	
		super.procesarFinalizacionProceso(empresa_constante1,"empresa");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(empresa_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(empresa_constante1,"empresa"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(empresa_constante1,"empresa"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"empresa"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(empresa_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(empresa_constante1,"empresa");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,empresa_webcontrol1) {
	
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

var empresa_funcion1=new empresa_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {empresa_funcion,empresa_funcion1};

/*Para ser llamado desde window.opener*/
window.empresa_funcion1 = empresa_funcion1;



//</script>
