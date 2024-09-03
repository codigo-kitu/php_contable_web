//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {documento_proveedor_constante,documento_proveedor_constante1} from '../util/documento_proveedor_constante.js';

class documento_proveedor_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(documento_proveedor_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(documento_proveedor_constante1,"documento_proveedor");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"documento_proveedor");
		
		super.procesarInicioProceso(documento_proveedor_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(documento_proveedor_constante1,"documento_proveedor");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"documento_proveedor");
		
		super.procesarInicioProceso(documento_proveedor_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(documento_proveedor_constante1,"documento_proveedor");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(documento_proveedor_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(documento_proveedor_constante1.STR_ES_RELACIONES,documento_proveedor_constante1.STR_ES_RELACIONADO,documento_proveedor_constante1.STR_RELATIVE_PATH,"documento_proveedor");		
		
		if(super.esPaginaForm(documento_proveedor_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(documento_proveedor_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"documento_proveedor");
		
		super.procesarFinalizacionProceso(documento_proveedor_constante1,"documento_proveedor");
				
		if(super.esPaginaForm(documento_proveedor_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_proveedor.hdnIdActual);
		jQuery('cmbdocumento_proveedorid_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_proveedor.txtdocumento);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscardocumento_proveedor.txtNumeroRegistrosdocumento_proveedor,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'documento_proveedores',strNumeroRegistros,document.frmParamsBuscardocumento_proveedor.txtNumeroRegistrosdocumento_proveedor);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(documento_proveedor_constante1) {
		
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
		
		
		if(documento_proveedor_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-documento": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(documento_proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_documento_proveedor-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_proveedor-documento": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_documento_proveedor-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_proveedor-documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(documento_proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientodocumento_proveedor").validate(arrRules);
		
		if(documento_proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesdocumento_proveedor").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			documento_proveedorFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"documento_proveedor");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_proveedor.txtdocumento,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_proveedor.txtdocumento,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,documento_proveedor_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,documento_proveedor_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"documento_proveedor");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(documento_proveedor_constante1.STR_RELATIVE_PATH,"documento_proveedor");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"documento_proveedor");
		
		super.procesarFinalizacionProceso(documento_proveedor_constante1,"documento_proveedor");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(documento_proveedor_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(documento_proveedor_constante1,"documento_proveedor");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(documento_proveedor_constante1,"documento_proveedor");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"documento_proveedor");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(documento_proveedor_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(documento_proveedor_constante1,"documento_proveedor");
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
			else if(strValueTipoColumna=="Proveedor") {
				jQuery(".col_id_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Documento") {
				jQuery(".col_documento").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,documento_proveedor_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="documento_cliente" || strValueTipoRelacion=="Documentos Clientes") {
			documento_proveedor_webcontrol1.registrarSesionParadocumento_clientees(idActual);
		}
	}
	
	
	
}

var documento_proveedor_funcion1=new documento_proveedor_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {documento_proveedor_funcion,documento_proveedor_funcion1};

//Para ser llamado desde window.opener
window.documento_proveedor_funcion1 = documento_proveedor_funcion1;



//</script>
