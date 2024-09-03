//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {categoria_cliente_constante,categoria_cliente_constante1} from '../util/categoria_cliente_constante.js';

class categoria_cliente_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(categoria_cliente_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(categoria_cliente_constante1,"categoria_cliente");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"categoria_cliente");
		
		super.procesarInicioProceso(categoria_cliente_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(categoria_cliente_constante1,"categoria_cliente");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"categoria_cliente");
		
		super.procesarInicioProceso(categoria_cliente_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(categoria_cliente_constante1,"categoria_cliente");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(categoria_cliente_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(categoria_cliente_constante1.STR_ES_RELACIONES,categoria_cliente_constante1.STR_ES_RELACIONADO,categoria_cliente_constante1.STR_RELATIVE_PATH,"categoria_cliente");		
		
		if(super.esPaginaForm(categoria_cliente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(categoria_cliente_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"categoria_cliente");
		
		super.procesarFinalizacionProceso(categoria_cliente_constante1,"categoria_cliente");
				
		if(super.esPaginaForm(categoria_cliente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_cliente.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_cliente.txtnombre);
		funcionGeneral.setCheckControl(document.frmMantenimientocategoria_cliente.chbpredeterminado,false);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcategoria_cliente.txtNumeroRegistroscategoria_cliente,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'categoria_clientes',strNumeroRegistros,document.frmParamsBuscarcategoria_cliente.txtNumeroRegistroscategoria_cliente);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(categoria_cliente_constante1) {
		
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
		
		
		if(categoria_cliente_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-nombre": {
					required:true,
					maxlength:35
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	
		
			
			if(categoria_cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_categoria_cliente-nombre": {
					required:true,
					maxlength:35
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form_categoria_cliente-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	



			if(categoria_cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocategoria_cliente").validate(arrRules);
		
		if(categoria_cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescategoria_cliente").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			categoria_clienteFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"categoria_cliente");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_cliente.txtnombre,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocategoria_cliente.chbpredeterminado,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_cliente.txtnombre,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocategoria_cliente.chbpredeterminado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,categoria_cliente_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,categoria_cliente_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"categoria_cliente");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(categoria_cliente_constante1.STR_RELATIVE_PATH,"categoria_cliente");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"categoria_cliente");
		
		super.procesarFinalizacionProceso(categoria_cliente_constante1,"categoria_cliente");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(categoria_cliente_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(categoria_cliente_constante1,"categoria_cliente");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(categoria_cliente_constante1,"categoria_cliente");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"categoria_cliente");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(categoria_cliente_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(categoria_cliente_constante1,"categoria_cliente");
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
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Predeterminado") {
				jQuery(".col_predeterminado").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,categoria_cliente_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cliente" || strValueTipoRelacion=="Cliente") {
			categoria_cliente_webcontrol1.registrarSesionParaclientes(idActual);
		}
	}
	
	
	
}

var categoria_cliente_funcion1=new categoria_cliente_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {categoria_cliente_funcion,categoria_cliente_funcion1};

//Para ser llamado desde window.opener
window.categoria_cliente_funcion1 = categoria_cliente_funcion1;



//</script>
