//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {propiedad_empresa_constante,propiedad_empresa_constante1} from '../util/propiedad_empresa_constante.js';

class propiedad_empresa_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(propiedad_empresa_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(propiedad_empresa_constante1,"propiedad_empresa");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"propiedad_empresa");
		
		super.procesarInicioProceso(propiedad_empresa_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(propiedad_empresa_constante1,"propiedad_empresa");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"propiedad_empresa");
		
		super.procesarInicioProceso(propiedad_empresa_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(propiedad_empresa_constante1,"propiedad_empresa");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(propiedad_empresa_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(propiedad_empresa_constante1.STR_ES_RELACIONES,propiedad_empresa_constante1.STR_ES_RELACIONADO,propiedad_empresa_constante1.STR_RELATIVE_PATH,"propiedad_empresa");		
		
		if(super.esPaginaForm(propiedad_empresa_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(propiedad_empresa_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"propiedad_empresa");
		
		super.procesarFinalizacionProceso(propiedad_empresa_constante1,"propiedad_empresa");
				
		if(super.esPaginaForm(propiedad_empresa_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientopropiedad_empresa.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientopropiedad_empresa.txtnombre_empresa);
		funcionGeneral.setEmptyControl(document.frmMantenimientopropiedad_empresa.txtcalle_1);
		funcionGeneral.setEmptyControl(document.frmMantenimientopropiedad_empresa.txtcalle_2);
		funcionGeneral.setEmptyControl(document.frmMantenimientopropiedad_empresa.txtcalle_3);
		funcionGeneral.setEmptyControl(document.frmMantenimientopropiedad_empresa.txtbarrio);
		funcionGeneral.setEmptyControl(document.frmMantenimientopropiedad_empresa.txtciudad);
		funcionGeneral.setEmptyControl(document.frmMantenimientopropiedad_empresa.txtestado);
		funcionGeneral.setEmptyControl(document.frmMantenimientopropiedad_empresa.txtcodigo_postal);
		funcionGeneral.setEmptyControl(document.frmMantenimientopropiedad_empresa.txtcodigo_pais);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarpropiedad_empresa.txtNumeroRegistrospropiedad_empresa,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'propiedad_empresas',strNumeroRegistros,document.frmParamsBuscarpropiedad_empresa.txtNumeroRegistrospropiedad_empresa);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(propiedad_empresa_constante1) {
		
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
		
		
		if(propiedad_empresa_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-nombre_empresa": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-calle_1": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-calle_2": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-calle_3": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-barrio": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-ciudad": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-estado": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-codigo_postal": {
					required:true,
					maxlength:20
					,regexpPostalMethod:true
				},
					
				"form-codigo_pais": {
					required:true,
					maxlength:5
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-nombre_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-calle_1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-calle_2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-calle_3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-barrio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-codigo_postal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form-codigo_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(propiedad_empresa_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_propiedad_empresa-nombre_empresa": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_propiedad_empresa-calle_1": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_propiedad_empresa-calle_2": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_propiedad_empresa-calle_3": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_propiedad_empresa-barrio": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_propiedad_empresa-ciudad": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_propiedad_empresa-estado": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_propiedad_empresa-codigo_postal": {
					required:true,
					maxlength:20
					,regexpPostalMethod:true
				},
					
				"form_propiedad_empresa-codigo_pais": {
					required:true,
					maxlength:5
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_propiedad_empresa-nombre_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_propiedad_empresa-calle_1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_propiedad_empresa-calle_2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_propiedad_empresa-calle_3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_propiedad_empresa-barrio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_propiedad_empresa-ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_propiedad_empresa-estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_propiedad_empresa-codigo_postal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form_propiedad_empresa-codigo_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(propiedad_empresa_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientopropiedad_empresa").validate(arrRules);
		
		if(propiedad_empresa_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalespropiedad_empresa").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			propiedad_empresaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"propiedad_empresa");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtnombre_empresa,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtcalle_1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtcalle_2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtcalle_3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtbarrio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtciudad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtestado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtcodigo_postal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtcodigo_pais,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtnombre_empresa,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtcalle_1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtcalle_2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtcalle_3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtbarrio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtciudad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtestado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtcodigo_postal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientopropiedad_empresa.txtcodigo_pais,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,propiedad_empresa_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,propiedad_empresa_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"propiedad_empresa");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(propiedad_empresa_constante1.STR_RELATIVE_PATH,"propiedad_empresa");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"propiedad_empresa");
		
		super.procesarFinalizacionProceso(propiedad_empresa_constante1,"propiedad_empresa");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(propiedad_empresa_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(propiedad_empresa_constante1,"propiedad_empresa");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(propiedad_empresa_constante1,"propiedad_empresa");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"propiedad_empresa");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(propiedad_empresa_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(propiedad_empresa_constante1,"propiedad_empresa");
	}

	//------------- Formulario-Combo-Accion -------------------

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

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,propiedad_empresa_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var propiedad_empresa_funcion1=new propiedad_empresa_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {propiedad_empresa_funcion,propiedad_empresa_funcion1};

//Para ser llamado desde window.opener
window.propiedad_empresa_funcion1 = propiedad_empresa_funcion1;



//</script>
