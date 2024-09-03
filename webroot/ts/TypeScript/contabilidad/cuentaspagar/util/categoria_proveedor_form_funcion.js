//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {categoria_proveedor_constante,categoria_proveedor_constante1} from '../util/categoria_proveedor_constante.js';

class categoria_proveedor_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(categoria_proveedor_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(categoria_proveedor_constante1,"categoria_proveedor");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"categoria_proveedor");
		
		super.procesarInicioProceso(categoria_proveedor_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(categoria_proveedor_constante1,"categoria_proveedor");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"categoria_proveedor");
		
		super.procesarInicioProceso(categoria_proveedor_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(categoria_proveedor_constante1,"categoria_proveedor");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(categoria_proveedor_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(categoria_proveedor_constante1.STR_ES_RELACIONES,categoria_proveedor_constante1.STR_ES_RELACIONADO,categoria_proveedor_constante1.STR_RELATIVE_PATH,"categoria_proveedor");		
		
		if(super.esPaginaForm(categoria_proveedor_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(categoria_proveedor_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"categoria_proveedor");
		
		super.procesarFinalizacionProceso(categoria_proveedor_constante1,"categoria_proveedor");
				
		if(super.esPaginaForm(categoria_proveedor_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_proveedor.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_proveedor.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_proveedor.txtpredeterminado);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcategoria_proveedor.txtNumeroRegistroscategoria_proveedor,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'categoria_proveedores',strNumeroRegistros,document.frmParamsBuscarcategoria_proveedor.txtNumeroRegistroscategoria_proveedor);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(categoria_proveedor_constante1) {
		
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
		
		
		if(categoria_proveedor_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-nombre": {
					required:true,
					maxlength:35
					,regexpStringMethod:true
				},
					
				"form-predeterminado": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-predeterminado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(categoria_proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_categoria_proveedor-nombre": {
					required:true,
					maxlength:35
					,regexpStringMethod:true
				},
					
				"form_categoria_proveedor-predeterminado": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form_categoria_proveedor-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_categoria_proveedor-predeterminado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(categoria_proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocategoria_proveedor").validate(arrRules);
		
		if(categoria_proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescategoria_proveedor").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			categoria_proveedorFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"categoria_proveedor");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_proveedor.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_proveedor.txtpredeterminado,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_proveedor.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_proveedor.txtpredeterminado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,categoria_proveedor_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,categoria_proveedor_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"categoria_proveedor");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(categoria_proveedor_constante1.STR_RELATIVE_PATH,"categoria_proveedor");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"categoria_proveedor");
		
		super.procesarFinalizacionProceso(categoria_proveedor_constante1,"categoria_proveedor");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(categoria_proveedor_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(categoria_proveedor_constante1,"categoria_proveedor");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(categoria_proveedor_constante1,"categoria_proveedor");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"categoria_proveedor");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(categoria_proveedor_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(categoria_proveedor_constante1,"categoria_proveedor");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,categoria_proveedor_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="proveedor" || strValueTipoRelacion=="Proveedor") {
			categoria_proveedor_webcontrol1.registrarSesionParaproveedores(idActual);
		}
	}
	
	
	
}

var categoria_proveedor_funcion1=new categoria_proveedor_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {categoria_proveedor_funcion,categoria_proveedor_funcion1};

//Para ser llamado desde window.opener
window.categoria_proveedor_funcion1 = categoria_proveedor_funcion1;



//</script>
