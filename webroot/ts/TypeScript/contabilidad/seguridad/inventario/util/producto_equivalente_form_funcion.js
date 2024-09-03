//<script type="text/javascript" language="javascript">


import {producto_equivalente_constante,producto_equivalente_constante1} from '../util/producto_equivalente_constante.js';

class producto_equivalente_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(producto_equivalente_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(producto_equivalente_constante1,"producto_equivalente");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"producto_equivalente");
		
		super.procesarInicioProceso(producto_equivalente_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(producto_equivalente_constante1,"producto_equivalente");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"producto_equivalente");
		
		super.procesarInicioProceso(producto_equivalente_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(producto_equivalente_constante1,"producto_equivalente");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(producto_equivalente_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(producto_equivalente_constante1.STR_ES_RELACIONES,producto_equivalente_constante1.STR_ES_RELACIONADO,producto_equivalente_constante1.STR_RELATIVE_PATH,"producto_equivalente");		
		
		if(super.esPaginaForm(producto_equivalente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(producto_equivalente_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"producto_equivalente");
		
		super.procesarFinalizacionProceso(producto_equivalente_constante1,"producto_equivalente");
				
		if(super.esPaginaForm(producto_equivalente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto_equivalente.hdnIdActual);
		jQuery('cmbproducto_equivalenteid_producto_principal').val("");
		jQuery('cmbproducto_equivalenteid_producto_equivalente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto_equivalente.txtproducto_id_principal);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto_equivalente.txtproducto_id_equivalente);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto_equivalente.txtcomentario);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarproducto_equivalente.txtNumeroRegistrosproducto_equivalente,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'producto_equivalentes',strNumeroRegistros,document.frmParamsBuscarproducto_equivalente.txtNumeroRegistrosproducto_equivalente);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(producto_equivalente_constante1) {
		
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
		
		
		if(producto_equivalente_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_producto_principal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_producto_equivalente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-producto_id_principal": {
					required:true,
					digits:true
				},
					
				"form-producto_id_equivalente": {
					required:true,
					digits:true
				},
					
				"form-comentario": {
					required:true,
					maxlength:400
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_producto_principal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_producto_equivalente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-producto_id_principal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-producto_id_equivalente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-comentario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(producto_equivalente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_producto_equivalente-id_producto_principal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto_equivalente-id_producto_equivalente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto_equivalente-producto_id_principal": {
					required:true,
					digits:true
				},
					
				"form_producto_equivalente-producto_id_equivalente": {
					required:true,
					digits:true
				},
					
				"form_producto_equivalente-comentario": {
					required:true,
					maxlength:400
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_producto_equivalente-id_producto_principal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto_equivalente-id_producto_equivalente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto_equivalente-producto_id_principal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto_equivalente-producto_id_equivalente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto_equivalente-comentario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(producto_equivalente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoproducto_equivalente").validate(arrRules);
		
		if(producto_equivalente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesproducto_equivalente").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			producto_equivalenteFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"producto_equivalente");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto_equivalente.txtproducto_id_principal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto_equivalente.txtproducto_id_equivalente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto_equivalente.txtcomentario,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto_equivalente.txtproducto_id_principal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto_equivalente.txtproducto_id_equivalente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto_equivalente.txtcomentario,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,producto_equivalente_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,producto_equivalente_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"producto_equivalente");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(producto_equivalente_constante1.STR_RELATIVE_PATH,"producto_equivalente");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"producto_equivalente");
		
		super.procesarFinalizacionProceso(producto_equivalente_constante1,"producto_equivalente");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(producto_equivalente_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(producto_equivalente_constante1,"producto_equivalente");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(producto_equivalente_constante1,"producto_equivalente");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"producto_equivalente");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(producto_equivalente_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(producto_equivalente_constante1,"producto_equivalente");
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
			else if(strValueTipoColumna==" Producto Principal") {
				jQuery(".col_id_producto_principal").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_producto_principal_img').trigger("click" );
				} else {
					jQuery('#form-id_producto_principal_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Producto Equivalente") {
				jQuery(".col_id_producto_equivalente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_producto_equivalente_img').trigger("click" );
				} else {
					jQuery('#form-id_producto_equivalente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Producto Id Principal") {
				jQuery(".col_producto_id_principal").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Producto Id Equivalente") {
				jQuery(".col_producto_id_equivalente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Comentario") {
				jQuery(".col_comentario").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,producto_equivalente_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="producto_equivalente" || strValueTipoRelacion=="Producto Equivalentes") {
			producto_equivalente_webcontrol1.registrarSesionParaproducto_equivalentes(idActual);
		}
	}
	
	
	
}

var producto_equivalente_funcion1=new producto_equivalente_funcion(); //var

export {producto_equivalente_funcion,producto_equivalente_funcion1};

//Para ser llamado desde window.opener
window.producto_equivalente_funcion1 = producto_equivalente_funcion1;



//</script>
