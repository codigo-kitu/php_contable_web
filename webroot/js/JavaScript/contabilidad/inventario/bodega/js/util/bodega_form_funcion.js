//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {bodega_constante,bodega_constante1} from '../util/bodega_constante.js';


class bodega_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(bodega_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(bodega_constante1,"bodega");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"bodega");		
		super.procesarInicioProceso(bodega_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(bodega_constante1,"bodega"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"bodega");		
		super.procesarInicioProceso(bodega_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(bodega_constante1,"bodega"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(bodega_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(bodega_constante1.STR_ES_RELACIONES,bodega_constante1.STR_ES_RELACIONADO,bodega_constante1.STR_RELATIVE_PATH,"bodega");		
		
		if(super.esPaginaForm(bodega_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(bodega_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"bodega");		
		super.procesarFinalizacionProceso(bodega_constante1,"bodega");
				
		if(super.esPaginaForm(bodega_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientobodega.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbbodegaid_empresa').val("");
		jQuery('cmbbodegaid_sucursal').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientobodega.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientobodega.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientobodega.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientobodega.txttelefono);
		funcionGeneral.setEmptyControl(document.frmMantenimientobodega.txtnumero_productos);
		funcionGeneral.setCheckControl(document.frmMantenimientobodega.chbdefecto,false);
		funcionGeneral.setCheckControl(document.frmMantenimientobodega.chbactivo,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientobodega.txtdireccion2);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarbodega.txtNumeroRegistrosbodega,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'bodegas',strNumeroRegistros,document.frmParamsBuscarbodega.txtNumeroRegistrosbodega);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(bodega_constante1) {
		
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
		
		
		if(bodega_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-direccion": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form-telefono": {
					maxlength:30
					,regexpTelefonoMethod:true
				},
					
				"form-numero_productos": {
					required:true,
					digits:true
				},
					
					
					
				"form-direccion2": {
					maxlength:100
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-telefono": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-numero_productos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-direccion2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(bodega_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_bodega-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_bodega-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_bodega-codigo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_bodega-nombre": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_bodega-direccion": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_bodega-telefono": {
					maxlength:30
					,regexpTelefonoMethod:true
				},
					
				"form_bodega-numero_productos": {
					required:true,
					digits:true
				},
					
					
					
				"form_bodega-direccion2": {
					maxlength:100
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_bodega-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_bodega-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_bodega-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_bodega-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_bodega-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_bodega-telefono": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_bodega-numero_productos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_bodega-direccion2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(bodega_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientobodega").validate(arrRules);
		
		if(bodega_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesbodega").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			bodegaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"bodega");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobodega.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobodega.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobodega.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobodega.txttelefono,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobodega.txtnumero_productos,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientobodega.chbdefecto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientobodega.chbactivo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobodega.txtdireccion2,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobodega.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobodega.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobodega.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobodega.txttelefono,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobodega.txtnumero_productos,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientobodega.chbdefecto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientobodega.chbactivo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobodega.txtdireccion2,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,bodega_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,bodega_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"bodega"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(bodega_constante1.STR_RELATIVE_PATH,"bodega"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"bodega");
	
		super.procesarFinalizacionProceso(bodega_constante1,"bodega");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(bodega_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(bodega_constante1,"bodega"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(bodega_constante1,"bodega"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"bodega"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(bodega_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(bodega_constante1,"bodega");	
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
			else if(strValueTipoColumna=="Sucursal") {
				jQuery(".col_id_sucursal").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sucursal_img').trigger("click" );
				} else {
					jQuery('#form-id_sucursal_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion") {
				jQuery(".col_direccion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Telefono") {
				jQuery(".col_telefono").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="No Productos") {
				jQuery(".col_numero_productos").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Predeterminado") {
				jQuery(".col_defecto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Activo") {
				jQuery(".col_activo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion2") {
				jQuery(".col_direccion2").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,bodega_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="producto" || strValueTipoRelacion=="Producto") {
			bodega_webcontrol1.registrarSesionParaproductos(idActual);
		}
		else if(strValueTipoRelacion=="producto_bodega" || strValueTipoRelacion=="Producto Bodega") {
			bodega_webcontrol1.registrarSesionParaproducto_bodegas(idActual);
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

var bodega_funcion1=new bodega_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {bodega_funcion,bodega_funcion1};

/*Para ser llamado desde window.opener*/
window.bodega_funcion1 = bodega_funcion1;



//</script>
