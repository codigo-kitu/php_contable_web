//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {categoria_producto_constante,categoria_producto_constante1} from '../util/categoria_producto_constante.js';

class categoria_producto_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(categoria_producto_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(categoria_producto_constante1,"categoria_producto");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"categoria_producto");
		
		super.procesarInicioProceso(categoria_producto_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(categoria_producto_constante1,"categoria_producto");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"categoria_producto");
		
		super.procesarInicioProceso(categoria_producto_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(categoria_producto_constante1,"categoria_producto");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(categoria_producto_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(categoria_producto_constante1.STR_ES_RELACIONES,categoria_producto_constante1.STR_ES_RELACIONADO,categoria_producto_constante1.STR_RELATIVE_PATH,"categoria_producto");		
		
		if(super.esPaginaForm(categoria_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(categoria_producto_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"categoria_producto");
		
		super.procesarFinalizacionProceso(categoria_producto_constante1,"categoria_producto");
				
		if(super.esPaginaForm(categoria_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_producto.hdnIdActual);
		jQuery('cmbcategoria_productoid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_producto.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_producto.txtnombre);
		funcionGeneral.setCheckControl(document.frmMantenimientocategoria_producto.chbpredeterminado,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_producto.txtnumero_productos);
		funcionGeneral.setEmptyControl(document.frmMantenimientocategoria_producto.txtimagen);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcategoria_producto.txtNumeroRegistroscategoria_producto,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'categoria_productos',strNumeroRegistros,document.frmParamsBuscarcategoria_producto.txtNumeroRegistroscategoria_producto);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(categoria_producto_constante1) {
		
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
		
		
		if(categoria_producto_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
					
				"form-numero_productos": {
					required:true,
					digits:true
				},
					
				"form-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-numero_productos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(categoria_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_categoria_producto-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_categoria_producto-codigo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_categoria_producto-nombre": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
					
				"form_categoria_producto-numero_productos": {
					required:true,
					digits:true
				},
					
				"form_categoria_producto-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_categoria_producto-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_categoria_producto-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_categoria_producto-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_categoria_producto-numero_productos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_categoria_producto-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(categoria_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocategoria_producto").validate(arrRules);
		
		if(categoria_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescategoria_producto").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			categoria_productoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"categoria_producto");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_producto.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_producto.txtnombre,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocategoria_producto.chbpredeterminado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_producto.txtnumero_productos,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_producto.txtimagen,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_producto.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_producto.txtnombre,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocategoria_producto.chbpredeterminado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_producto.txtnumero_productos,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocategoria_producto.txtimagen,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,categoria_producto_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,categoria_producto_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"categoria_producto");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(categoria_producto_constante1.STR_RELATIVE_PATH,"categoria_producto");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"categoria_producto");
		
		super.procesarFinalizacionProceso(categoria_producto_constante1,"categoria_producto");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(categoria_producto_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(categoria_producto_constante1,"categoria_producto");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(categoria_producto_constante1,"categoria_producto");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"categoria_producto");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(categoria_producto_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(categoria_producto_constante1,"categoria_producto");
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
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Predeterminado") {
				jQuery(".col_predeterminado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="No Productos") {
				jQuery(".col_numero_productos").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Imagen") {
				jQuery(".col_imagen").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,categoria_producto_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="lista_producto" || strValueTipoRelacion=="Lista Productos") {
			categoria_producto_webcontrol1.registrarSesionParalista_productoes(idActual);
		}
		else if(strValueTipoRelacion=="producto" || strValueTipoRelacion=="Producto") {
			categoria_producto_webcontrol1.registrarSesionParaproductos(idActual);
		}
		else if(strValueTipoRelacion=="sub_categoria_producto" || strValueTipoRelacion=="Sub Categoria Producto") {
			categoria_producto_webcontrol1.registrarSesionParasub_categoria_productos(idActual);
		}
	}
	
	
	
}

var categoria_producto_funcion1=new categoria_producto_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {categoria_producto_funcion,categoria_producto_funcion1};

//Para ser llamado desde window.opener
window.categoria_producto_funcion1 = categoria_producto_funcion1;



//</script>
