//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {auditoria_constante,auditoria_constante1} from '../util/auditoria_constante.js';


class auditoria_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(auditoria_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(auditoria_constante1,"auditoria");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"auditoria");		
		super.procesarInicioProceso(auditoria_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(auditoria_constante1,"auditoria"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"auditoria");		
		super.procesarInicioProceso(auditoria_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(auditoria_constante1,"auditoria"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(auditoria_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(auditoria_constante1.STR_ES_RELACIONES,auditoria_constante1.STR_ES_RELACIONADO,auditoria_constante1.STR_RELATIVE_PATH,"auditoria");		
		
		if(super.esPaginaForm(auditoria_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(auditoria_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"auditoria");		
		super.procesarFinalizacionProceso(auditoria_constante1,"auditoria");
				
		if(super.esPaginaForm(auditoria_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbauditoriaid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria.txtnombre_tabla);
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria.txtid_fila);
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria.txtaccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria.txtproceso);
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria.txtnombre_pc);
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria.txtip_pc);
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria.txtusuario_pc);
		jQuery('dtauditoriafecha_hora').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria.txtobservacion);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarauditoria.txtNumeroRegistrosauditoria,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'auditorias',strNumeroRegistros,document.frmParamsBuscarauditoria.txtNumeroRegistrosauditoria);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(auditoria_constante1) {
		
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
		
		
		if(auditoria_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nombre_tabla": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-id_fila": {
					required:true,
					digits:true
				},
					
				"form-accion": {
					required:true,
					maxlength:15
					,regexpStringMethod:true
				},
					
				"form-proceso": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-nombre_pc": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-ip_pc": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-usuario_pc": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-fecha_hora": {
					required:true,
					date:true
				},
					
				"form-observacion": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre_tabla": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_fila": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-accion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-proceso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_pc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-ip_pc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-usuario_pc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-observacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(auditoria_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_auditoria-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_auditoria-nombre_tabla": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_auditoria-id_fila": {
					required:true,
					digits:true
				},
					
				"form_auditoria-accion": {
					required:true,
					maxlength:15
					,regexpStringMethod:true
				},
					
				"form_auditoria-proceso": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_auditoria-nombre_pc": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_auditoria-ip_pc": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_auditoria-usuario_pc": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_auditoria-fecha_hora": {
					required:true,
					date:true
				},
					
				"form_auditoria-observacion": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_auditoria-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_auditoria-nombre_tabla": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_auditoria-id_fila": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_auditoria-accion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_auditoria-proceso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_auditoria-nombre_pc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_auditoria-ip_pc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_auditoria-usuario_pc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_auditoria-fecha_hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_auditoria-observacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(auditoria_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoauditoria").validate(arrRules);
		
		if(auditoria_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesauditoria").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorIdUsuarioPorFechaHora-dtfecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorIdUsuarioPorFechaHora-dtfecha_horaFinal").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorIPPCPorFechaHora-dtfecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorIPPCPorFechaHora-dtfecha_horaFinal").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorNombrePCPorFechaHora-dtfecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorNombrePCPorFechaHora-dtfecha_horaFinal").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorNombreTablaPorFechaHora-dtfecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorNombreTablaPorFechaHora-dtfecha_horaFinal").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorObservacionesPorFechaHora-dtfecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorObservacionesPorFechaHora-dtfecha_horaFinal").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorProcesoPorFechaHora-dtfecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorProcesoPorFechaHora-dtfecha_horaFinal").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorUsuarioPCPorFechaHora-dtfecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorUsuarioPCPorFechaHora-dtfecha_horaFinal").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			auditoriaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"auditoria");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtnombre_tabla,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtid_fila,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtaccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtproceso,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtnombre_pc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtip_pc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtusuario_pc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtobservacion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtnombre_tabla,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtid_fila,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtaccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtproceso,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtnombre_pc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtip_pc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtusuario_pc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria.txtobservacion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,auditoria_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,auditoria_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"auditoria"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(auditoria_constante1.STR_RELATIVE_PATH,"auditoria"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"auditoria");
	
		super.procesarFinalizacionProceso(auditoria_constante1,"auditoria");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(auditoria_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(auditoria_constante1,"auditoria"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(auditoria_constante1,"auditoria"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"auditoria"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(auditoria_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(auditoria_constante1,"auditoria");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
			
			else if(strValueTipoColumna=="A") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Created At") {
				jQuery(".col_created_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Updated At") {
				jQuery(".col_updated_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Usuario") {
				jQuery(".col_id_usuario").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_usuario_img').trigger("click" );
				} else {
					jQuery('#form-id_usuario_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Nombre De La Tabla") {
				jQuery(".col_nombre_tabla").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fila") {
				jQuery(".col_id_fila").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Accion") {
				jQuery(".col_accion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Proceso") {
				jQuery(".col_proceso").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre De Pc") {
				jQuery(".col_nombre_pc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ip Del Pc") {
				jQuery(".col_ip_pc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Usuario Del Pc") {
				jQuery(".col_usuario_pc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Y Hora") {
				jQuery(".col_fecha_hora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Observacion") {
				jQuery(".col_observacion").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,auditoria_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="auditoria_detalle" || strValueTipoRelacion=="Auditoria Detalle") {
			auditoria_webcontrol1.registrarSesionParaauditoria_detalles(idActual);
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

var auditoria_funcion1=new auditoria_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {auditoria_funcion,auditoria_funcion1};

/*Para ser llamado desde window.opener*/
window.auditoria_funcion1 = auditoria_funcion1;



//</script>
