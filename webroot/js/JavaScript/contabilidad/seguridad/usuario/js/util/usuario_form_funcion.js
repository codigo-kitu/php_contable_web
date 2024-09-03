//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {usuario_constante,usuario_constante1} from '../util/usuario_constante.js';


class usuario_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(usuario_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(usuario_constante1,"usuario");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"usuario");		
		super.procesarInicioProceso(usuario_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(usuario_constante1,"usuario"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"usuario");		
		super.procesarInicioProceso(usuario_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(usuario_constante1,"usuario"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(usuario_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(usuario_constante1.STR_ES_RELACIONES,usuario_constante1.STR_ES_RELACIONADO,usuario_constante1.STR_RELATIVE_PATH,"usuario");		
		
		if(super.esPaginaForm(usuario_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(usuario_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"usuario");		
		super.procesarFinalizacionProceso(usuario_constante1,"usuario");
				
		if(super.esPaginaForm(usuario_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientousuario.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientousuario.txtuser_name);
		funcionGeneral.setEmptyControl(document.frmMantenimientousuario.txtclave);
		funcionGeneral.setEmptyControl(document.frmMantenimientousuario.txtconfirmar_clave);
		funcionGeneral.setEmptyControl(document.frmMantenimientousuario.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientousuario.txtcodigo_alterno);
		funcionGeneral.setCheckControl(document.frmMantenimientousuario.chbtipo,false);
		funcionGeneral.setCheckControl(document.frmMantenimientousuario.chbestado,false);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarusuario.txtNumeroRegistrosusuario,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'usuarios',strNumeroRegistros,document.frmParamsBuscarusuario.txtNumeroRegistrosusuario);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(usuario_constante1) {
		
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
		
		
		if(usuario_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-user_name": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-clave": {
					required:true,
					maxlength:500
				},
					
				"form-confirmar_clave": {
					required:true,
					maxlength:500
				},
					
				"form-nombre": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-codigo_alterno": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
					
				},
				
				messages: {
					"form-user_name": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-clave": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-confirmar_clave": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-codigo_alterno": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
				}		
			};	
		
			
			if(usuario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_usuario-user_name": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_usuario-clave": {
					required:true,
					maxlength:500
				},
					
				"form_usuario-confirmar_clave": {
					required:true,
					maxlength:500
				},
					
				"form_usuario-nombre": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_usuario-codigo_alterno": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
					
				},
				
				messages: {
					"form_usuario-user_name": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_usuario-clave": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_usuario-confirmar_clave": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_usuario-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_usuario-codigo_alterno": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
				}		
			};	



			if(usuario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientousuario").validate(arrRules);
		
		if(usuario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesusuario").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			usuarioFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"usuario");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientousuario.txtuser_name,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientousuario.txtclave,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientousuario.txtconfirmar_clave,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientousuario.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientousuario.txtcodigo_alterno,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientousuario.chbtipo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientousuario.chbestado,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientousuario.txtuser_name,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientousuario.txtclave,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientousuario.txtconfirmar_clave,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientousuario.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientousuario.txtcodigo_alterno,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientousuario.chbtipo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientousuario.chbestado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,usuario_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,usuario_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"usuario"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(usuario_constante1.STR_RELATIVE_PATH,"usuario"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"usuario");
	
		super.procesarFinalizacionProceso(usuario_constante1,"usuario");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(usuario_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(usuario_constante1,"usuario"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(usuario_constante1,"usuario"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"usuario"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(usuario_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(usuario_constante1,"usuario");	
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
			else if(strValueTipoColumna=="Nombre De Usuario") {
				jQuery(".col_user_name").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Clave") {
				jQuery(".col_clave").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Confirmar Clave") {
				jQuery(".col_confirmar_clave").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre Completo") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Código Alterno") {
				jQuery(".col_codigo_alterno").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Tipo") {
				jQuery(".col_tipo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Estado") {
				jQuery(".col_estado").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,usuario_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="auditoria" || strValueTipoRelacion=="Auditoria") {
			usuario_webcontrol1.registrarSesionParaauditorias(idActual);
		}
		else if(strValueTipoRelacion=="dato_general_usuario" || strValueTipoRelacion=="Dato General Usuario") {
			usuario_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		}
		else if(strValueTipoRelacion=="historial_cambio_clave" || strValueTipoRelacion=="Historial Cambio Clave") {
			usuario_webcontrol1.registrarSesionParahistorial_cambio_claves(idActual);
		}
		else if(strValueTipoRelacion=="parametro_general_usuario" || strValueTipoRelacion=="Parametro General") {
			usuario_webcontrol1.registrarSesionParaparametro_general_usuarioes(idActual);
		}
		else if(strValueTipoRelacion=="perfil_usuario" || strValueTipoRelacion=="Usuarios Perfiles ") {
			usuario_webcontrol1.registrarSesionParaperfil_usuarios(idActual);
		}
		else if(strValueTipoRelacion=="resumen_usuario" || strValueTipoRelacion=="Resumen Usuario") {
			usuario_webcontrol1.registrarSesionPararesumen_usuarios(idActual);
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

var usuario_funcion1=new usuario_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {usuario_funcion,usuario_funcion1};

/*Para ser llamado desde window.opener*/
window.usuario_funcion1 = usuario_funcion1;



//</script>
