//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {libro_auxiliar_constante,libro_auxiliar_constante1} from '../util/libro_auxiliar_constante.js';

class libro_auxiliar_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(libro_auxiliar_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(libro_auxiliar_constante1,"libro_auxiliar");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"libro_auxiliar");
		
		super.procesarInicioProceso(libro_auxiliar_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(libro_auxiliar_constante1,"libro_auxiliar");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"libro_auxiliar");
		
		super.procesarInicioProceso(libro_auxiliar_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(libro_auxiliar_constante1,"libro_auxiliar");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(libro_auxiliar_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(libro_auxiliar_constante1.STR_ES_RELACIONES,libro_auxiliar_constante1.STR_ES_RELACIONADO,libro_auxiliar_constante1.STR_RELATIVE_PATH,"libro_auxiliar");		
		
		if(super.esPaginaForm(libro_auxiliar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(libro_auxiliar_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"libro_auxiliar");
		
		super.procesarFinalizacionProceso(libro_auxiliar_constante1,"libro_auxiliar");
				
		if(super.esPaginaForm(libro_auxiliar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientolibro_auxiliar.hdnIdActual);
		jQuery('cmblibro_auxiliarid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolibro_auxiliar.txtiniciales);
		funcionGeneral.setEmptyControl(document.frmMantenimientolibro_auxiliar.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientolibro_auxiliar.txtsecuencial);
		funcionGeneral.setEmptyControl(document.frmMantenimientolibro_auxiliar.txtincremento);
		funcionGeneral.setCheckControl(document.frmMantenimientolibro_auxiliar.chbreinicia_secuencial_mes,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientolibro_auxiliar.txtgenerado_por);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarlibro_auxiliar.txtNumeroRegistroslibro_auxiliar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'libro_auxiliares',strNumeroRegistros,document.frmParamsBuscarlibro_auxiliar.txtNumeroRegistroslibro_auxiliar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(libro_auxiliar_constante1) {
		
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
		
		
		if(libro_auxiliar_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-iniciales": {
					required:true,
					maxlength:3
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-secuencial": {
					required:true,
					digits:true
				},
					
				"form-incremento": {
					required:true,
					digits:true
				},
					
					
				"form-generado_por": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-iniciales": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-secuencial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-generado_por": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(libro_auxiliar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_libro_auxiliar-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_libro_auxiliar-iniciales": {
					required:true,
					maxlength:3
					,regexpStringMethod:true
				},
					
				"form_libro_auxiliar-nombre": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_libro_auxiliar-secuencial": {
					required:true,
					digits:true
				},
					
				"form_libro_auxiliar-incremento": {
					required:true,
					digits:true
				},
					
					
				"form_libro_auxiliar-generado_por": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form_libro_auxiliar-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_libro_auxiliar-iniciales": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_libro_auxiliar-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_libro_auxiliar-secuencial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_libro_auxiliar-incremento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_libro_auxiliar-generado_por": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(libro_auxiliar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientolibro_auxiliar").validate(arrRules);
		
		if(libro_auxiliar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotaleslibro_auxiliar").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			libro_auxiliarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"libro_auxiliar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolibro_auxiliar.txtiniciales,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolibro_auxiliar.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolibro_auxiliar.txtsecuencial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolibro_auxiliar.txtincremento,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientolibro_auxiliar.chbreinicia_secuencial_mes,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolibro_auxiliar.txtgenerado_por,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolibro_auxiliar.txtiniciales,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolibro_auxiliar.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolibro_auxiliar.txtsecuencial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolibro_auxiliar.txtincremento,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientolibro_auxiliar.chbreinicia_secuencial_mes,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolibro_auxiliar.txtgenerado_por,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,libro_auxiliar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,libro_auxiliar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"libro_auxiliar");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(libro_auxiliar_constante1.STR_RELATIVE_PATH,"libro_auxiliar");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"libro_auxiliar");
		
		super.procesarFinalizacionProceso(libro_auxiliar_constante1,"libro_auxiliar");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(libro_auxiliar_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(libro_auxiliar_constante1,"libro_auxiliar");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(libro_auxiliar_constante1,"libro_auxiliar");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"libro_auxiliar");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(libro_auxiliar_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(libro_auxiliar_constante1,"libro_auxiliar");
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
			else if(strValueTipoColumna=="Iniciales") {
				jQuery(".col_iniciales").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Secuencial") {
				jQuery(".col_secuencial").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Incremento") {
				jQuery(".col_incremento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Reinicia Secuencial Mes") {
				jQuery(".col_reinicia_secuencial_mes").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Generado Por") {
				jQuery(".col_generado_por").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,libro_auxiliar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="asiento_automatico" || strValueTipoRelacion=="Asiento Automatico") {
			libro_auxiliar_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		}
		else if(strValueTipoRelacion=="asiento" || strValueTipoRelacion=="Asiento") {
			libro_auxiliar_webcontrol1.registrarSesionParaasientos(idActual);
		}
		else if(strValueTipoRelacion=="asiento_predefinido" || strValueTipoRelacion=="Asiento Predefinido") {
			libro_auxiliar_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		}
		else if(strValueTipoRelacion=="contador_auxiliar" || strValueTipoRelacion=="Contadores Auxiliares") {
			libro_auxiliar_webcontrol1.registrarSesionParacontador_auxiliares(idActual);
		}
	}
	
	
	
}

var libro_auxiliar_funcion1=new libro_auxiliar_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {libro_auxiliar_funcion,libro_auxiliar_funcion1};

//Para ser llamado desde window.opener
window.libro_auxiliar_funcion1 = libro_auxiliar_funcion1;



//</script>
