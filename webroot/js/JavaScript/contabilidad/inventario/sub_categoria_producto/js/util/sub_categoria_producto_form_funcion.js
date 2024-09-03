//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {sub_categoria_producto_constante,sub_categoria_producto_constante1} from '../util/sub_categoria_producto_constante.js';


class sub_categoria_producto_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(sub_categoria_producto_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(sub_categoria_producto_constante1,"sub_categoria_producto");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"sub_categoria_producto");		
		super.procesarInicioProceso(sub_categoria_producto_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(sub_categoria_producto_constante1,"sub_categoria_producto"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"sub_categoria_producto");		
		super.procesarInicioProceso(sub_categoria_producto_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(sub_categoria_producto_constante1,"sub_categoria_producto"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(sub_categoria_producto_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(sub_categoria_producto_constante1.STR_ES_RELACIONES,sub_categoria_producto_constante1.STR_ES_RELACIONADO,sub_categoria_producto_constante1.STR_RELATIVE_PATH,"sub_categoria_producto");		
		
		if(super.esPaginaForm(sub_categoria_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(sub_categoria_producto_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"sub_categoria_producto");		
		super.procesarFinalizacionProceso(sub_categoria_producto_constante1,"sub_categoria_producto");
				
		if(super.esPaginaForm(sub_categoria_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientosub_categoria_producto.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbsub_categoria_productoid_empresa').val("");
		jQuery('cmbsub_categoria_productoid_categoria_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientosub_categoria_producto.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientosub_categoria_producto.txtnombre);
		funcionGeneral.setCheckControl(document.frmMantenimientosub_categoria_producto.chbpredeterminado,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientosub_categoria_producto.txtimagen);
		funcionGeneral.setEmptyControl(document.frmMantenimientosub_categoria_producto.txtnumero_productos);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarsub_categoria_producto.txtNumeroRegistrossub_categoria_producto,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'sub_categoria_productos',strNumeroRegistros,document.frmParamsBuscarsub_categoria_producto.txtNumeroRegistrossub_categoria_producto);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(sub_categoria_producto_constante1) {
		
		/*VALIDACION*/
		/* NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT */
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
		
		
		if(sub_categoria_producto_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_categoria_producto": {
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
					
					
				"form-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-numero_productos": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-numero_productos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(sub_categoria_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_sub_categoria_producto-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_sub_categoria_producto-id_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_sub_categoria_producto-codigo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_sub_categoria_producto-nombre": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
					
				"form_sub_categoria_producto-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_sub_categoria_producto-numero_productos": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form_sub_categoria_producto-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_sub_categoria_producto-id_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_sub_categoria_producto-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sub_categoria_producto-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_sub_categoria_producto-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sub_categoria_producto-numero_productos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(sub_categoria_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientosub_categoria_producto").validate(arrRules);
		
		if(sub_categoria_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalessub_categoria_producto").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			sub_categoria_productoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"sub_categoria_producto");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosub_categoria_producto.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosub_categoria_producto.txtnombre,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientosub_categoria_producto.chbpredeterminado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosub_categoria_producto.txtimagen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosub_categoria_producto.txtnumero_productos,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosub_categoria_producto.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosub_categoria_producto.txtnombre,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientosub_categoria_producto.chbpredeterminado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosub_categoria_producto.txtimagen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosub_categoria_producto.txtnumero_productos,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,sub_categoria_producto_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,sub_categoria_producto_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"sub_categoria_producto"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(sub_categoria_producto_constante1.STR_RELATIVE_PATH,"sub_categoria_producto"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"sub_categoria_producto");
	
		super.procesarFinalizacionProceso(sub_categoria_producto_constante1,"sub_categoria_producto");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(sub_categoria_producto_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(sub_categoria_producto_constante1,"sub_categoria_producto"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(sub_categoria_producto_constante1,"sub_categoria_producto"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"sub_categoria_producto"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(sub_categoria_producto_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(sub_categoria_producto_constante1,"sub_categoria_producto");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
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
			else if(strValueTipoColumna=="Created At") {
				jQuery(".col_created_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Updated At") {
				jQuery(".col_updated_at").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Categoria Producto") {
				jQuery(".col_id_categoria_producto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_categoria_producto_img').trigger("click" );
				} else {
					jQuery('#form-id_categoria_producto_img_busqueda').trigger("click" );
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
			else if(strValueTipoColumna=="Imagen") {
				jQuery(".col_imagen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="No Productos") {
				jQuery(".col_numero_productos").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,sub_categoria_producto_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="lista_producto" || strValueTipoRelacion=="Lista Productos") {
			sub_categoria_producto_webcontrol1.registrarSesionParalista_productoes(idActual);
		}
		else if(strValueTipoRelacion=="producto" || strValueTipoRelacion=="Producto") {
			sub_categoria_producto_webcontrol1.registrarSesionParaproductos(idActual);
		}
	}
	
		
	
	/*
		Nuevo: nuevoOnClick,nuevoOnComplete,nuevoPrepararPaginaFormOnClick,nuevoPrepararPaginaFormOnComplete
		Seleccionar: seleccionarPaginaFormOnClick,seleccionarPaginaFormOnComplete
		Actualizar: actualizarOnClick,actualizarOnComplete
		Cancelar: cancelarOnClick,cancelarOnComplete,cancelarControles
		Validar-Formulario: validarFormularioParametrosNumeroRegistros,validarFormularioJQuery
		MostrarOcultar-Controles: mostrarOcultarControlesMantenimiento,habilitarDeshabilitarControles
		Estado-Botones: actualizarEstadoBotones
		Eliminar: eliminarOnClick,eliminarOnComplete
		Procesar: procesarOnClicks,procesarOnComplete,procesarFinalizacionProcesoAbrirLink
		Procesar-Simple: procesarInicioProcesoSimple,procesarFinalizacionProcesoSimple
		Combos-Campos-Relaciones: setTipoColumnaAccion,setTipoRelacionAccion
	*/
}

var sub_categoria_producto_funcion1=new sub_categoria_producto_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {sub_categoria_producto_funcion,sub_categoria_producto_funcion1};

/*Para ser llamado desde window.opener*/
window.sub_categoria_producto_funcion1 = sub_categoria_producto_funcion1;



//</script>
