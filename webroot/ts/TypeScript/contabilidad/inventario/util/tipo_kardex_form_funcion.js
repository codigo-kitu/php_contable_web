//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_kardex_constante,tipo_kardex_constante1} from '../util/tipo_kardex_constante.js';

class tipo_kardex_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(tipo_kardex_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(tipo_kardex_constante1,"tipo_kardex");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"tipo_kardex");
		
		super.procesarInicioProceso(tipo_kardex_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(tipo_kardex_constante1,"tipo_kardex");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"tipo_kardex");
		
		super.procesarInicioProceso(tipo_kardex_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(tipo_kardex_constante1,"tipo_kardex");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(tipo_kardex_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(tipo_kardex_constante1.STR_ES_RELACIONES,tipo_kardex_constante1.STR_ES_RELACIONADO,tipo_kardex_constante1.STR_RELATIVE_PATH,"tipo_kardex");		
		
		if(super.esPaginaForm(tipo_kardex_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(tipo_kardex_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"tipo_kardex");
		
		super.procesarFinalizacionProceso(tipo_kardex_constante1,"tipo_kardex");
				
		if(super.esPaginaForm(tipo_kardex_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_kardex.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_kardex.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_kardex.txtnombre);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscartipo_kardex.txtNumeroRegistrostipo_kardex,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'tipo_kardexs',strNumeroRegistros,document.frmParamsBuscartipo_kardex.txtNumeroRegistrostipo_kardex);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(tipo_kardex_constante1) {
		
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
		
		
		if(tipo_kardex_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-codigo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(tipo_kardex_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_tipo_kardex-codigo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_tipo_kardex-nombre": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_tipo_kardex-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_tipo_kardex-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(tipo_kardex_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientotipo_kardex").validate(arrRules);
		
		if(tipo_kardex_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalestipo_kardex").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			tipo_kardexFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"tipo_kardex");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_kardex.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_kardex.txtnombre,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_kardex.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_kardex.txtnombre,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,tipo_kardex_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,tipo_kardex_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"tipo_kardex");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(tipo_kardex_constante1.STR_RELATIVE_PATH,"tipo_kardex");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"tipo_kardex");
		
		super.procesarFinalizacionProceso(tipo_kardex_constante1,"tipo_kardex");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(tipo_kardex_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(tipo_kardex_constante1,"tipo_kardex");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(tipo_kardex_constante1,"tipo_kardex");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"tipo_kardex");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(tipo_kardex_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(tipo_kardex_constante1,"tipo_kardex");
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
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,tipo_kardex_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="kardex" || strValueTipoRelacion=="Kardex") {
			tipo_kardex_webcontrol1.registrarSesionParakardexes(idActual);
		}
		else if(strValueTipoRelacion=="parametro_inventario" || strValueTipoRelacion=="Parametro Inventario") {
			tipo_kardex_webcontrol1.registrarSesionParaparametro_inventarios(idActual);
		}
	}
	
	
	
}

var tipo_kardex_funcion1=new tipo_kardex_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {tipo_kardex_funcion,tipo_kardex_funcion1};

//Para ser llamado desde window.opener
window.tipo_kardex_funcion1 = tipo_kardex_funcion1;



//</script>
