//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {categoria_cheque_constante,categoria_cheque_constante1} from '../util/categoria_cheque_constante.js';

class categoria_cheque_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(categoria_cheque_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(categoria_cheque_constante1,"categoria_cheque");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"categoria_cheque");
		
		super.procesarInicioProceso(categoria_cheque_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(categoria_cheque_constante1,"categoria_cheque");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"categoria_cheque");
		
		super.procesarInicioProceso(categoria_cheque_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(categoria_cheque_constante1,"categoria_cheque");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(categoria_cheque_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(categoria_cheque_constante1.STR_ES_RELACIONES,categoria_cheque_constante1.STR_ES_RELACIONADO,categoria_cheque_constante1.STR_RELATIVE_PATH,"categoria_cheque");		
		
		if(super.esPaginaForm(categoria_cheque_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(categoria_cheque_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"categoria_cheque");
		
		super.procesarFinalizacionProceso(categoria_cheque_constante1,"categoria_cheque");
				
		if(super.esPaginaForm(categoria_cheque_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_cheque.hdnIdActual);
		jQuery('cmbcategoria_chequeid_empresa').val("");
		jQuery('cmbcategoria_chequeid_cuenta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_cheque.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_cheque.txtcuenta_contable);
		funcionGeneral.setCheckControl(document.frmMantenimientocategoria_cheque.chbpredeterminado,false);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcategoria_cheque.txtNumeroRegistroscategoria_cheque,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'categoria_cheques',strNumeroRegistros,document.frmParamsBuscarcategoria_cheque.txtNumeroRegistroscategoria_cheque);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(categoria_cheque_constante1) {
		
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
		
		
		if(categoria_cheque_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_cuenta": {
					digits:true
				
				},
					
				"form-nombre": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-cuenta_contable": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cuenta_contable": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	
		
			
			if(categoria_cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_categoria_cheque-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_categoria_cheque-id_cuenta": {
					digits:true
				
				},
					
				"form_categoria_cheque-nombre": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_categoria_cheque-cuenta_contable": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form_categoria_cheque-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_categoria_cheque-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_categoria_cheque-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_categoria_cheque-cuenta_contable": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	



			if(categoria_cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocategoria_cheque").validate(arrRules);
		
		if(categoria_cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescategoria_cheque").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			categoria_chequeFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"categoria_cheque");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_cheque.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_cheque.txtcuenta_contable,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocategoria_cheque.chbpredeterminado,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_cheque.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_cheque.txtcuenta_contable,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocategoria_cheque.chbpredeterminado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,categoria_cheque_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,categoria_cheque_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"categoria_cheque");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(categoria_cheque_constante1.STR_RELATIVE_PATH,"categoria_cheque");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"categoria_cheque");
		
		super.procesarFinalizacionProceso(categoria_cheque_constante1,"categoria_cheque");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(categoria_cheque_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(categoria_cheque_constante1,"categoria_cheque");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(categoria_cheque_constante1,"categoria_cheque");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"categoria_cheque");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(categoria_cheque_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(categoria_cheque_constante1,"categoria_cheque");
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
			else if(strValueTipoColumna=="Cuenta") {
				jQuery(".col_id_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cuenta Contable") {
				jQuery(".col_cuenta_contable").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Predeterminado") {
				jQuery(".col_predeterminado").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,categoria_cheque_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cheque_cuenta_corriente" || strValueTipoRelacion=="Cheque") {
			categoria_cheque_webcontrol1.registrarSesionParacheque_cuenta_corrientes(idActual);
		}
		else if(strValueTipoRelacion=="clasificacion_cheque" || strValueTipoRelacion=="Clasificacion Cheque") {
			categoria_cheque_webcontrol1.registrarSesionParaclasificacion_cheques(idActual);
		}
	}
	
	
	
}

var categoria_cheque_funcion1=new categoria_cheque_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {categoria_cheque_funcion,categoria_cheque_funcion1};

//Para ser llamado desde window.opener
window.categoria_cheque_funcion1 = categoria_cheque_funcion1;



//</script>
