//<script type="text/javascript" language="javascript">



//var costo_productoJQueryPaginaWebInteraccion= function (costo_producto_control) {
//this.,this.,this.

import {costo_producto_constante,costo_producto_constante1} from '../util/costo_producto_constante.js';

import {costo_producto_funcion,costo_producto_funcion1} from '../util/costo_producto_form_funcion.js';


class costo_producto_webcontrol extends GeneralEntityWebControl {
	
	costo_producto_control=null;
	costo_producto_controlInicial=null;
	costo_producto_controlAuxiliar=null;
		
	//if(costo_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(costo_producto_control) {
		super();
		
		this.costo_producto_control=costo_producto_control;
	}
		
	actualizarVariablesPagina(costo_producto_control) {
		
		if(costo_producto_control.action=="index" || costo_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(costo_producto_control);
			
		} 
		
		
		
	
		else if(costo_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(costo_producto_control);	
		
		} else if(costo_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(costo_producto_control);		
		}
	
	
		
		
		else if(costo_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(costo_producto_control);
		
		} else if(costo_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(costo_producto_control);
		
		} else if(costo_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(costo_producto_control);
		
		} else if(costo_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(costo_producto_control);
		
		} else if(costo_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(costo_producto_control);
		
		} else if(costo_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(costo_producto_control);		
		
		} else if(costo_producto_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(costo_producto_control);		
		
		} 
		//else if(costo_producto_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(costo_producto_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + costo_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(costo_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(costo_producto_control) {
		this.actualizarPaginaAccionesGenerales(costo_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(costo_producto_control) {
		
		this.actualizarPaginaCargaGeneral(costo_producto_control);
		this.actualizarPaginaOrderBy(costo_producto_control);
		this.actualizarPaginaTablaDatos(costo_producto_control);
		this.actualizarPaginaCargaGeneralControles(costo_producto_control);
		//this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(costo_producto_control);
		this.actualizarPaginaAreaBusquedas(costo_producto_control);
		this.actualizarPaginaCargaCombosFK(costo_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(costo_producto_control) {
		//this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(costo_producto_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(costo_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(costo_producto_control);		
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(costo_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(costo_producto_control);		
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(costo_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(costo_producto_control);		
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(costo_producto_control) {
		this.actualizarPaginaCargaGeneralControles(costo_producto_control);
		this.actualizarPaginaCargaCombosFK(costo_producto_control);
		this.actualizarPaginaFormulario(costo_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(costo_producto_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(costo_producto_control) {
		this.actualizarPaginaCargaGeneralControles(costo_producto_control);
		this.actualizarPaginaCargaCombosFK(costo_producto_control);
		this.actualizarPaginaFormulario(costo_producto_control);
		this.onLoadCombosDefectoFK(costo_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		this.actualizarPaginaAreaMantenimiento(costo_producto_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(costo_producto_control) {
		//FORMULARIO
		if(costo_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(costo_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(costo_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);		
		
		//COMBOS FK
		if(costo_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(costo_producto_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(costo_producto_control) {
		//FORMULARIO
		if(costo_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(costo_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(costo_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);	
		
		//COMBOS FK
		if(costo_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(costo_producto_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(costo_producto_control) {
		//FORMULARIO
		if(costo_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(costo_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(costo_producto_control);	
		//COMBOS FK
		if(costo_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(costo_producto_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(costo_producto_control) {
		
		if(costo_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(costo_producto_control);
		}
		
		if(costo_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(costo_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(costo_producto_control) {
		if(costo_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("costo_productoReturnGeneral",JSON.stringify(costo_producto_control.costo_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(costo_producto_control) {
		if(costo_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && costo_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(costo_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(costo_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(costo_producto_control, mostrar) {
		
		if(mostrar==true) {
			costo_producto_funcion1.resaltarRestaurarDivsPagina(false,"costo_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				costo_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"costo_producto");
			}			
			
			costo_producto_funcion1.mostrarDivMensaje(true,costo_producto_control.strAuxiliarMensaje,costo_producto_control.strAuxiliarCssMensaje);
		
		} else {
			costo_producto_funcion1.mostrarDivMensaje(false,costo_producto_control.strAuxiliarMensaje,costo_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(costo_producto_control) {
		if(costo_producto_funcion1.esPaginaForm(costo_producto_constante1)==true) {
			window.opener.costo_producto_webcontrol1.actualizarPaginaTablaDatos(costo_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(costo_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(costo_producto_control) {
		costo_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(costo_producto_control.strAuxiliarUrlPagina);
				
		costo_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(costo_producto_control.strAuxiliarTipo,costo_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(costo_producto_control) {
		costo_producto_funcion1.resaltarRestaurarDivMensaje(true,costo_producto_control.strAuxiliarMensajeAlert,costo_producto_control.strAuxiliarCssMensaje);
			
		if(costo_producto_funcion1.esPaginaForm(costo_producto_constante1)==true) {
			window.opener.costo_producto_funcion1.resaltarRestaurarDivMensaje(true,costo_producto_control.strAuxiliarMensajeAlert,costo_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(costo_producto_control) {
		this.costo_producto_controlInicial=costo_producto_control;
			
		if(costo_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(costo_producto_control.strStyleDivArbol,costo_producto_control.strStyleDivContent
																,costo_producto_control.strStyleDivOpcionesBanner,costo_producto_control.strStyleDivExpandirColapsar
																,costo_producto_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(costo_producto_control) {
		this.actualizarCssBotonesPagina(costo_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(costo_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(costo_producto_control.tiposReportes,costo_producto_control.tiposReporte
															 	,costo_producto_control.tiposPaginacion,costo_producto_control.tiposAcciones
																,costo_producto_control.tiposColumnasSelect,costo_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(costo_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(costo_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(costo_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(costo_producto_control) {
	
		var indexPosition=costo_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=costo_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(costo_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombosempresasFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombossucursalsFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombosejerciciosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombosperiodosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombosusuariosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombosproductosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tabla",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.cargarCombostablasFK(costo_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(costo_producto_control.strRecargarFkTiposNinguno!=null && costo_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && costo_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombosempresasFK(costo_producto_control);
				}

				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombossucursalsFK(costo_producto_control);
				}

				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombosejerciciosFK(costo_producto_control);
				}

				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombosperiodosFK(costo_producto_control);
				}

				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombosusuariosFK(costo_producto_control);
				}

				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombosproductosFK(costo_producto_control);
				}

				if(costo_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tabla",costo_producto_control.strRecargarFkTiposNinguno,",")) { 
					costo_producto_webcontrol1.cargarCombostablasFK(costo_producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.usuariosFK);
	}

	cargarComboEditarTablaproductoFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.productosFK);
	}

	cargarComboEditarTablatablaFK(costo_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,costo_producto_funcion1,costo_producto_control.tablasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(costo_producto_control) {
		jQuery("#tdcosto_productoNuevo").css("display",costo_producto_control.strPermisoNuevo);
		jQuery("#trcosto_productoElementos").css("display",costo_producto_control.strVisibleTablaElementos);
		jQuery("#trcosto_productoAcciones").css("display",costo_producto_control.strVisibleTablaAcciones);
		jQuery("#trcosto_productoParametrosAcciones").css("display",costo_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(costo_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(costo_producto_control);
				
		if(costo_producto_control.costo_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(costo_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(costo_producto_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(costo_producto_control) {
	
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id").val(costo_producto_control.costo_productoActual.id);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-version_row").val(costo_producto_control.costo_productoActual.versionRow);
		
		if(costo_producto_control.costo_productoActual.id_empresa!=null && costo_producto_control.costo_productoActual.id_empresa>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").val() != costo_producto_control.costo_productoActual.id_empresa) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").val(costo_producto_control.costo_productoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_sucursal!=null && costo_producto_control.costo_productoActual.id_sucursal>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").val() != costo_producto_control.costo_productoActual.id_sucursal) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").val(costo_producto_control.costo_productoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_ejercicio!=null && costo_producto_control.costo_productoActual.id_ejercicio>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").val() != costo_producto_control.costo_productoActual.id_ejercicio) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").val(costo_producto_control.costo_productoActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_periodo!=null && costo_producto_control.costo_productoActual.id_periodo>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").val() != costo_producto_control.costo_productoActual.id_periodo) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").val(costo_producto_control.costo_productoActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_usuario!=null && costo_producto_control.costo_productoActual.id_usuario>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").val() != costo_producto_control.costo_productoActual.id_usuario) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").val(costo_producto_control.costo_productoActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_producto!=null && costo_producto_control.costo_productoActual.id_producto>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").val() != costo_producto_control.costo_productoActual.id_producto) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").val(costo_producto_control.costo_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(costo_producto_control.costo_productoActual.id_tabla!=null && costo_producto_control.costo_productoActual.id_tabla>-1){
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_tabla").val() != costo_producto_control.costo_productoActual.id_tabla) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_tabla").val(costo_producto_control.costo_productoActual.id_tabla).trigger("change");
			}
		} else { 
			//jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_tabla").select2("val", null);
			if(jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_tabla").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_tabla").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-idn_origen").val(costo_producto_control.costo_productoActual.idn_origen);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-idn_detalle_origen").val(costo_producto_control.costo_productoActual.idn_detalle_origen);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-nro_documento").val(costo_producto_control.costo_productoActual.nro_documento);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-fecha").val(costo_producto_control.costo_productoActual.fecha);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-cantidad").val(costo_producto_control.costo_productoActual.cantidad);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-costo_unitario").val(costo_producto_control.costo_productoActual.costo_unitario);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-costo_total").val(costo_producto_control.costo_productoActual.costo_total);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-cantidad_origen").val(costo_producto_control.costo_productoActual.cantidad_origen);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-costo_unitario_origen").val(costo_producto_control.costo_productoActual.costo_unitario_origen);
		jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-costo_total_origen").val(costo_producto_control.costo_productoActual.costo_total_origen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+costo_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("costo_producto","inventario","","form_costo_producto",formulario,"","",paraEventoTabla,idFilaTabla,costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
	}
	
	actualizarSpanMensajesCampos(costo_producto_control) {
		jQuery("#spanstrMensajeid").text(costo_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(costo_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(costo_producto_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(costo_producto_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(costo_producto_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(costo_producto_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(costo_producto_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_producto").text(costo_producto_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_tabla").text(costo_producto_control.strMensajeid_tabla);		
		jQuery("#spanstrMensajeidn_origen").text(costo_producto_control.strMensajeidn_origen);		
		jQuery("#spanstrMensajeidn_detalle_origen").text(costo_producto_control.strMensajeidn_detalle_origen);		
		jQuery("#spanstrMensajenro_documento").text(costo_producto_control.strMensajenro_documento);		
		jQuery("#spanstrMensajefecha").text(costo_producto_control.strMensajefecha);		
		jQuery("#spanstrMensajecantidad").text(costo_producto_control.strMensajecantidad);		
		jQuery("#spanstrMensajecosto_unitario").text(costo_producto_control.strMensajecosto_unitario);		
		jQuery("#spanstrMensajecosto_total").text(costo_producto_control.strMensajecosto_total);		
		jQuery("#spanstrMensajecantidad_origen").text(costo_producto_control.strMensajecantidad_origen);		
		jQuery("#spanstrMensajecosto_unitario_origen").text(costo_producto_control.strMensajecosto_unitario_origen);		
		jQuery("#spanstrMensajecosto_total_origen").text(costo_producto_control.strMensajecosto_total_origen);		
	}
	
	actualizarCssBotonesMantenimiento(costo_producto_control) {
		jQuery("#tdbtnNuevocosto_producto").css("visibility",costo_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocosto_producto").css("display",costo_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcosto_producto").css("visibility",costo_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcosto_producto").css("display",costo_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcosto_producto").css("visibility",costo_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcosto_producto").css("display",costo_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcosto_producto").css("visibility",costo_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscosto_producto").css("visibility",costo_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscosto_producto").css("display",costo_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcosto_producto").css("visibility",costo_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcosto_producto").css("visibility",costo_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcosto_producto").css("visibility",costo_producto_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa",costo_producto_control.empresasFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_2",costo_producto_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal",costo_producto_control.sucursalsFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_3",costo_producto_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio",costo_producto_control.ejerciciosFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_4",costo_producto_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo",costo_producto_control.periodosFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_5",costo_producto_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario",costo_producto_control.usuariosFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_6",costo_producto_control.usuariosFK);
		}
	};

	cargarCombosproductosFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto",costo_producto_control.productosFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_7",costo_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",costo_producto_control.productosFK);

	};

	cargarCombostablasFK(costo_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+costo_producto_constante1.STR_SUFIJO+"-id_tabla",costo_producto_control.tablasFK);

		if(costo_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+costo_producto_control.idFilaTablaActual+"_8",costo_producto_control.tablasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idtabla-cmbid_tabla",costo_producto_control.tablasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(costo_producto_control) {

	};

	registrarComboActionChangeCombossucursalsFK(costo_producto_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(costo_producto_control) {

	};

	registrarComboActionChangeCombosperiodosFK(costo_producto_control) {

	};

	registrarComboActionChangeCombosusuariosFK(costo_producto_control) {

	};

	registrarComboActionChangeCombosproductosFK(costo_producto_control) {

	};

	registrarComboActionChangeCombostablasFK(costo_producto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idempresaDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").val() != costo_producto_control.idempresaDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa").val(costo_producto_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idsucursalDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").val() != costo_producto_control.idsucursalDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal").val(costo_producto_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idejercicioDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").val() != costo_producto_control.idejercicioDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio").val(costo_producto_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idperiodoDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").val() != costo_producto_control.idperiodoDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo").val(costo_producto_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idusuarioDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").val() != costo_producto_control.idusuarioDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario").val(costo_producto_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").val() != costo_producto_control.idproductoDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto").val(costo_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(costo_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostablasFK(costo_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(costo_producto_control.idtablaDefaultFK>-1 && jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_tabla").val() != costo_producto_control.idtablaDefaultFK) {
				jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_tabla").val(costo_producto_control.idtablaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idtabla-cmbid_tabla").val(costo_producto_control.idtablaDefaultForeignKey).trigger("change");
			if(jQuery("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idtabla-cmbid_tabla").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+costo_producto_constante1.STR_SUFIJO+"FK_Idtabla-cmbid_tabla").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//costo_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(costo_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(costo_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombosempresasFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombossucursalsFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombosejerciciosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombosperiodosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombosusuariosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombosproductosFK(costo_producto_control);
			}

			if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tabla",costo_producto_control.strRecargarFkTipos,",")) { 
				costo_producto_webcontrol1.setDefectoValorCombostablasFK(costo_producto_control);
			}

			
			//CODIGO PARA TOMAR PRIMER VALOR
			/*
			var strPrimerValor='0';
			jQuery("#ParamsBuscar-cmbPaginacion").each(function() {
				//console.log(jQuery(this).val());
				//console.log(jQuery(this).text());
				strPrimerValor=jQuery(this).val();
				return false;
			});
			
			alert(strPrimerValor);
			*/
		}
	}
	
	//VERIFICAR: Creo no se necesita Controller
	onLoadCombosEventosFK(costo_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(costo_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombosempresasFK(costo_producto_control);
			//}

			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombossucursalsFK(costo_producto_control);
			//}

			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombosejerciciosFK(costo_producto_control);
			//}

			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombosperiodosFK(costo_producto_control);
			//}

			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombosusuariosFK(costo_producto_control);
			//}

			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(costo_producto_control);
			//}

			//if(costo_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tabla",costo_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				costo_producto_webcontrol1.registrarComboActionChangeCombostablasFK(costo_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(costo_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(costo_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(costo_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(costo_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				costo_producto_funcion1.validarFormularioJQuery(costo_producto_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("costo_producto");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("costo_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(costo_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,"costo_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tabla","id_tabla","general","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+costo_producto_constante1.STR_SUFIJO+"-id_tabla_img_busqueda").click(function(){
				costo_producto_webcontrol1.abrirBusquedaParatabla("id_tabla");
				//alert(jQuery('#form-id_tabla_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(costo_producto_control) {
		
		
		
		if(costo_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdcosto_productoActualizarToolBar").css("display",costo_producto_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcosto_productoEliminarToolBar").css("display",costo_producto_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcosto_productoElementos").css("display",costo_producto_control.strVisibleTablaElementos);
		
		jQuery("#trcosto_productoAcciones").css("display",costo_producto_control.strVisibleTablaAcciones);
		jQuery("#trcosto_productoParametrosAcciones").css("display",costo_producto_control.strVisibleTablaAcciones);
		
		jQuery("#tdcosto_productoCerrarPagina").css("display",costo_producto_control.strPermisoPopup);		
		jQuery("#tdcosto_productoCerrarPaginaToolBar").css("display",costo_producto_control.strPermisoPopup);
		//jQuery("#trcosto_productoAccionesRelaciones").css("display",costo_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=costo_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + costo_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + costo_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Costo Productos";
		sTituloBanner+=" - " + costo_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + costo_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcosto_productoRelacionesToolBar").css("display",costo_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscosto_producto").css("display",costo_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		costo_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		costo_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		costo_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		costo_producto_webcontrol1.registrarEventosControles();
		
		if(costo_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(costo_producto_constante1.STR_ES_RELACIONADO=="false") {
			costo_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(costo_producto_constante1.STR_ES_RELACIONES=="true") {
			if(costo_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				costo_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(costo_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(costo_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(costo_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(costo_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
						//costo_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(costo_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(costo_producto_constante1.BIG_ID_ACTUAL,"costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);
						//costo_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			costo_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("costo_producto","inventario","",costo_producto_funcion1,costo_producto_webcontrol1,costo_producto_constante1);	
	}
}

var costo_producto_webcontrol1 = new costo_producto_webcontrol();

export {costo_producto_webcontrol,costo_producto_webcontrol1};

//Para ser llamado desde window.opener
window.costo_producto_webcontrol1 = costo_producto_webcontrol1;


if(costo_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = costo_producto_webcontrol1.onLoadWindow; 
}

//</script>