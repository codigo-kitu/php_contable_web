//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {sucursal_constante,sucursal_constante1} from '../util/sucursal_constante.js';


class sucursal_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(sucursal_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(sucursal_constante1,"sucursal");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"sucursal");		
		super.procesarInicioProceso(sucursal_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(sucursal_constante1,"sucursal"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"sucursal");		
		super.procesarInicioProceso(sucursal_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(sucursal_constante1,"sucursal"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(sucursal_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(sucursal_constante1.STR_ES_RELACIONES,sucursal_constante1.STR_ES_RELACIONADO,sucursal_constante1.STR_RELATIVE_PATH,"sucursal");		
		
		if(super.esPaginaForm(sucursal_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(sucursal_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"sucursal");		
		super.procesarFinalizacionProceso(sucursal_constante1,"sucursal");
				
		if(super.esPaginaForm(sucursal_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbsucursalid_empresa').val("");
		jQuery('cmbsucursalid_pais').val("");
		jQuery('cmbsucursalid_ciudad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtregistro_tributario);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtregistro_sucursalrial);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtdireccion1);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtdireccion2);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtdireccion3);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txttelefono1);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtcelular);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtcorreo_electronico);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtsitio_web);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtcodigo_postal);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtfax);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtbarrio_distrito);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtlogo);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtbase_de_datos);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtcondicion);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txticono_asociado);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtfolder_sucursal);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarsucursal.txtNumeroRegistrossucursal,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'sucursals',strNumeroRegistros,document.frmParamsBuscarsucursal.txtNumeroRegistrossucursal);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(sucursal_constante1) {
		
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
		
		
		if(sucursal_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
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
					
				"form-nombre": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-registro_tributario": {
					required:true,
					maxlength:15
					,regexpStringMethod:true
				},
					
				"form-registro_sucursalrial": {
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
					
				"form-celular": {
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-correo_electronico": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
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
					
				"form-barrio_distrito": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-logo": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-base_de_datos": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-condicion": {
					digits:true
				},
					
				"form-icono_asociado": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-folder_sucursal": {
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-registro_tributario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-registro_sucursalrial": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-telefono1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-celular": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-correo_electronico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-sitio_web": ""+constantes.STR_MENSAJE_URL_INCORRECTO,
					"form-codigo_postal": ""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form-fax": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form-barrio_distrito": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-logo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-base_de_datos": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-condicion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-icono_asociado": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-folder_sucursal": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(sucursal_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_sucursal-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_sucursal-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_sucursal-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_sucursal-nombre": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_sucursal-registro_tributario": {
					required:true,
					maxlength:15
					,regexpStringMethod:true
				},
					
				"form_sucursal-registro_sucursalrial": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_sucursal-direccion1": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_sucursal-direccion2": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_sucursal-direccion3": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_sucursal-telefono1": {
					required:true,
					maxlength:40
					,regexpTelefonoMethod:true
				},
					
				"form_sucursal-celular": {
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_sucursal-correo_electronico": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_sucursal-sitio_web": {
					maxlength:120
					,url:true
				},
					
				"form_sucursal-codigo_postal": {
					maxlength:40
					,regexpPostalMethod:true
				},
					
				"form_sucursal-fax": {
					maxlength:40
					,regexpFaxMethod:true
				},
					
				"form_sucursal-barrio_distrito": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_sucursal-logo": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_sucursal-base_de_datos": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_sucursal-condicion": {
					digits:true
				},
					
				"form_sucursal-icono_asociado": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_sucursal-folder_sucursal": {
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_sucursal-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_sucursal-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_sucursal-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_sucursal-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-registro_tributario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-registro_sucursalrial": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-direccion1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-direccion2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-direccion3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-telefono1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_sucursal-celular": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-correo_electronico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-sitio_web": ""+constantes.STR_MENSAJE_URL_INCORRECTO,
					"form_sucursal-codigo_postal": ""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form_sucursal-fax": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form_sucursal-barrio_distrito": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-logo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-base_de_datos": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-condicion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_sucursal-icono_asociado": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-folder_sucursal": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(sucursal_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientosucursal").validate(arrRules);
		
		if(sucursal_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalessucursal").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			sucursalFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"sucursal");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtregistro_tributario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtregistro_sucursalrial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtdireccion1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtdireccion2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtdireccion3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txttelefono1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcelular,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcorreo_electronico,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtsitio_web,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcodigo_postal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtfax,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtbarrio_distrito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtlogo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtbase_de_datos,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcondicion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txticono_asociado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtfolder_sucursal,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtregistro_tributario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtregistro_sucursalrial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtdireccion1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtdireccion2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtdireccion3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txttelefono1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcelular,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcorreo_electronico,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtsitio_web,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcodigo_postal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtfax,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtbarrio_distrito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtlogo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtbase_de_datos,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcondicion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txticono_asociado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtfolder_sucursal,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,sucursal_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,sucursal_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"sucursal"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(sucursal_constante1.STR_RELATIVE_PATH,"sucursal"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"sucursal");
	
		super.procesarFinalizacionProceso(sucursal_constante1,"sucursal");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(sucursal_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(sucursal_constante1,"sucursal"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(sucursal_constante1,"sucursal"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"sucursal"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(sucursal_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(sucursal_constante1,"sucursal");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,sucursal_webcontrol1) {
	
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

var sucursal_funcion1=new sucursal_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {sucursal_funcion,sucursal_funcion1};

/*Para ser llamado desde window.opener*/
window.sucursal_funcion1 = sucursal_funcion1;



//</script>
