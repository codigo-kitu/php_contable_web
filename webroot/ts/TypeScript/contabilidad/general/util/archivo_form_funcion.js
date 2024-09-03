//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {archivo_constante,archivo_constante1} from '../util/archivo_constante.js';

class archivo_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(archivo_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(archivo_constante1,"archivo");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"archivo");
		
		super.procesarInicioProceso(archivo_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(archivo_constante1,"archivo");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"archivo");
		
		super.procesarInicioProceso(archivo_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(archivo_constante1,"archivo");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(archivo_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(archivo_constante1.STR_ES_RELACIONES,archivo_constante1.STR_ES_RELACIONADO,archivo_constante1.STR_RELATIVE_PATH,"archivo");		
		
		if(super.esPaginaForm(archivo_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(archivo_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"archivo");
		
		super.procesarFinalizacionProceso(archivo_constante1,"archivo");
				
		if(super.esPaginaForm(archivo_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoarchivo.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientoarchivo.txtimagen);
		funcionGeneral.setEmptyControl(document.frmMantenimientoarchivo.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoarchivo.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoarchivo.txtarchivo);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscararchivo.txtNumeroRegistrosarchivo,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'archivoes',strNumeroRegistros,document.frmParamsBuscararchivo.txtNumeroRegistrosarchivo);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(archivo_constante1) {
		
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
		
		
		if(archivo_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form-archivo": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-archivo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(archivo_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_archivo-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_archivo-nombre": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_archivo-descripcion": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form_archivo-archivo": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_archivo-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_archivo-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_archivo-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_archivo-archivo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(archivo_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoarchivo").validate(arrRules);
		
		if(archivo_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesarchivo").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			archivoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"archivo");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoarchivo.txtimagen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoarchivo.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoarchivo.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoarchivo.txtarchivo,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoarchivo.txtimagen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoarchivo.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoarchivo.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoarchivo.txtarchivo,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,archivo_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,archivo_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"archivo");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(archivo_constante1.STR_RELATIVE_PATH,"archivo");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"archivo");
		
		super.procesarFinalizacionProceso(archivo_constante1,"archivo");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(archivo_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(archivo_constante1,"archivo");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(archivo_constante1,"archivo");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"archivo");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(archivo_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(archivo_constante1,"archivo");
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
			else if(strValueTipoColumna=="Imagen") {
				jQuery(".col_imagen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Archivo") {
				jQuery(".col_archivo").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,archivo_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="otro_documento" || strValueTipoRelacion=="Otros Documentos") {
			archivo_webcontrol1.registrarSesionParaotro_documentoes(idActual);
		}
	}
	
	
	
}

var archivo_funcion1=new archivo_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {archivo_funcion,archivo_funcion1};

//Para ser llamado desde window.opener
window.archivo_funcion1 = archivo_funcion1;



//</script>
