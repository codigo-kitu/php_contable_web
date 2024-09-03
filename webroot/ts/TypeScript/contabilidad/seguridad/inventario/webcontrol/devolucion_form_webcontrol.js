//<script type="text/javascript" language="javascript">



//var devolucionJQueryPaginaWebInteraccion= function (devolucion_control) {
//this.,this.,this.

import {devolucion_constante,devolucion_constante1} from '../util/devolucion_constante.js';

import {devolucion_funcion,devolucion_funcion1} from '../util/devolucion_form_funcion.js';


class devolucion_webcontrol extends GeneralEntityWebControl {
	
	devolucion_control=null;
	devolucion_controlInicial=null;
	devolucion_controlAuxiliar=null;
		
	//if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(devolucion_control) {
		super();
		
		this.devolucion_control=devolucion_control;
	}
		
	actualizarVariablesPagina(devolucion_control) {
		
		if(devolucion_control.action=="index" || devolucion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(devolucion_control);
			
		} 
		
		
		
	
		else if(devolucion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(devolucion_control);	
		
		} else if(devolucion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_control);		
		}
	
		else if(devolucion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(devolucion_control);		
		}
	
		else if(devolucion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(devolucion_control);
		}
		
		
		else if(devolucion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(devolucion_control);
		
		} else if(devolucion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(devolucion_control);
		
		} else if(devolucion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(devolucion_control);
		
		} else if(devolucion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(devolucion_control);
		
		} else if(devolucion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(devolucion_control);
		
		} else if(devolucion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(devolucion_control);		
		
		} else if(devolucion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(devolucion_control);		
		
		} 
		//else if(devolucion_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(devolucion_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + devolucion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(devolucion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(devolucion_control) {
		this.actualizarPaginaAccionesGenerales(devolucion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(devolucion_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_control);
		this.actualizarPaginaOrderBy(devolucion_control);
		this.actualizarPaginaTablaDatos(devolucion_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_control);
		//this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_control);
		this.actualizarPaginaAreaBusquedas(devolucion_control);
		this.actualizarPaginaCargaCombosFK(devolucion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(devolucion_control) {
		//this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(devolucion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(devolucion_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(devolucion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_control);		
		this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(devolucion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_control);		
		this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(devolucion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_control);		
		this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(devolucion_control) {
		this.actualizarPaginaCargaGeneralControles(devolucion_control);
		this.actualizarPaginaCargaCombosFK(devolucion_control);
		this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(devolucion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(devolucion_control) {
		this.actualizarPaginaCargaGeneralControles(devolucion_control);
		this.actualizarPaginaCargaCombosFK(devolucion_control);
		this.actualizarPaginaFormulario(devolucion_control);
		this.onLoadCombosDefectoFK(devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(devolucion_control) {
		//FORMULARIO
		if(devolucion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(devolucion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		
		//COMBOS FK
		if(devolucion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(devolucion_control) {
		//FORMULARIO
		if(devolucion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(devolucion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);	
		
		//COMBOS FK
		if(devolucion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(devolucion_control) {
		//FORMULARIO
		if(devolucion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);	
		//COMBOS FK
		if(devolucion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(devolucion_control) {
		
		if(devolucion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(devolucion_control);
		}
		
		if(devolucion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(devolucion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(devolucion_control) {
		if(devolucion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("devolucionReturnGeneral",JSON.stringify(devolucion_control.devolucionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(devolucion_control) {
		if(devolucion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && devolucion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(devolucion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(devolucion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(devolucion_control, mostrar) {
		
		if(mostrar==true) {
			devolucion_funcion1.resaltarRestaurarDivsPagina(false,"devolucion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				devolucion_funcion1.resaltarRestaurarDivMantenimiento(false,"devolucion");
			}			
			
			devolucion_funcion1.mostrarDivMensaje(true,devolucion_control.strAuxiliarMensaje,devolucion_control.strAuxiliarCssMensaje);
		
		} else {
			devolucion_funcion1.mostrarDivMensaje(false,devolucion_control.strAuxiliarMensaje,devolucion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(devolucion_control) {
		if(devolucion_funcion1.esPaginaForm(devolucion_constante1)==true) {
			window.opener.devolucion_webcontrol1.actualizarPaginaTablaDatos(devolucion_control);
		} else {
			this.actualizarPaginaTablaDatos(devolucion_control);
		}
	}
	
	actualizarPaginaAbrirLink(devolucion_control) {
		devolucion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(devolucion_control.strAuxiliarUrlPagina);
				
		devolucion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(devolucion_control.strAuxiliarTipo,devolucion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(devolucion_control) {
		devolucion_funcion1.resaltarRestaurarDivMensaje(true,devolucion_control.strAuxiliarMensajeAlert,devolucion_control.strAuxiliarCssMensaje);
			
		if(devolucion_funcion1.esPaginaForm(devolucion_constante1)==true) {
			window.opener.devolucion_funcion1.resaltarRestaurarDivMensaje(true,devolucion_control.strAuxiliarMensajeAlert,devolucion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(devolucion_control) {
		this.devolucion_controlInicial=devolucion_control;
			
		if(devolucion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(devolucion_control.strStyleDivArbol,devolucion_control.strStyleDivContent
																,devolucion_control.strStyleDivOpcionesBanner,devolucion_control.strStyleDivExpandirColapsar
																,devolucion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(devolucion_control) {
		this.actualizarCssBotonesPagina(devolucion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(devolucion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(devolucion_control.tiposReportes,devolucion_control.tiposReporte
															 	,devolucion_control.tiposPaginacion,devolucion_control.tiposAcciones
																,devolucion_control.tiposColumnasSelect,devolucion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(devolucion_control.tiposRelaciones,devolucion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(devolucion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(devolucion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(devolucion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(devolucion_control) {
	
		var indexPosition=devolucion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=devolucion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(devolucion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosempresasFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombossucursalsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosejerciciosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosperiodosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosusuariosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosproveedorsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosvendedorsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombostermino_pago_proveedorsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosmonedasFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosestadosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosasientosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosdocumento_cuenta_pagarsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarComboskardexsFK(devolucion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(devolucion_control.strRecargarFkTiposNinguno!=null && devolucion_control.strRecargarFkTiposNinguno!='NINGUNO' && devolucion_control.strRecargarFkTiposNinguno!='') {
			
				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosempresasFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombossucursalsFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosejerciciosFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosperiodosFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosusuariosFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosproveedorsFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosvendedorsFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombostermino_pago_proveedorsFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_moneda",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosmonedasFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosestadosFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosasientosFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosdocumento_cuenta_pagarsFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarComboskardexsFK(devolucion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_proveedor") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.devolucionActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.devolucionActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.devolucionActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.usuariosFK);
	}

	cargarComboEditarTablaproveedorFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.proveedorsFK);
	}

	cargarComboEditarTablavendedorFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_proveedorFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.termino_pago_proveedorsFK);
	}

	cargarComboEditarTablamonedaFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.monedasFK);
	}

	cargarComboEditarTablaestadoFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.asientosFK);
	}

	cargarComboEditarTabladocumento_cuenta_pagarFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.documento_cuenta_pagarsFK);
	}

	cargarComboEditarTablakardexFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(devolucion_control) {
		jQuery("#tddevolucionNuevo").css("display",devolucion_control.strPermisoNuevo);
		jQuery("#trdevolucionElementos").css("display",devolucion_control.strVisibleTablaElementos);
		jQuery("#trdevolucionAcciones").css("display",devolucion_control.strVisibleTablaAcciones);
		jQuery("#trdevolucionParametrosAcciones").css("display",devolucion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(devolucion_control) {
	
		this.actualizarCssBotonesMantenimiento(devolucion_control);
				
		if(devolucion_control.devolucionActual!=null) {//form
			
			this.actualizarCamposFormulario(devolucion_control);			
		}
						
		this.actualizarSpanMensajesCampos(devolucion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(devolucion_control) {
	
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id").val(devolucion_control.devolucionActual.id);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-version_row").val(devolucion_control.devolucionActual.versionRow);
		
		if(devolucion_control.devolucionActual.id_empresa!=null && devolucion_control.devolucionActual.id_empresa>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa").val() != devolucion_control.devolucionActual.id_empresa) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa").val(devolucion_control.devolucionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_sucursal!=null && devolucion_control.devolucionActual.id_sucursal>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal").val() != devolucion_control.devolucionActual.id_sucursal) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal").val(devolucion_control.devolucionActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_ejercicio!=null && devolucion_control.devolucionActual.id_ejercicio>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio").val() != devolucion_control.devolucionActual.id_ejercicio) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio").val(devolucion_control.devolucionActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_periodo!=null && devolucion_control.devolucionActual.id_periodo>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo").val() != devolucion_control.devolucionActual.id_periodo) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo").val(devolucion_control.devolucionActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_usuario!=null && devolucion_control.devolucionActual.id_usuario>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario").val() != devolucion_control.devolucionActual.id_usuario) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario").val(devolucion_control.devolucionActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-numero").val(devolucion_control.devolucionActual.numero);
		
		if(devolucion_control.devolucionActual.id_proveedor!=null && devolucion_control.devolucionActual.id_proveedor>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor").val() != devolucion_control.devolucionActual.id_proveedor) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor").val(devolucion_control.devolucionActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_vendedor!=null && devolucion_control.devolucionActual.id_vendedor>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor").val() != devolucion_control.devolucionActual.id_vendedor) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor").val(devolucion_control.devolucionActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-ruc").val(devolucion_control.devolucionActual.ruc);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-fecha_emision").val(devolucion_control.devolucionActual.fecha_emision);
		
		if(devolucion_control.devolucionActual.id_termino_pago_proveedor!=null && devolucion_control.devolucionActual.id_termino_pago_proveedor>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != devolucion_control.devolucionActual.id_termino_pago_proveedor) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(devolucion_control.devolucionActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").select2("val", null);
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-fecha_vence").val(devolucion_control.devolucionActual.fecha_vence);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-cotizacion").val(devolucion_control.devolucionActual.cotizacion);
		
		if(devolucion_control.devolucionActual.id_moneda!=null && devolucion_control.devolucionActual.id_moneda>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda").val() != devolucion_control.devolucionActual.id_moneda) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda").val(devolucion_control.devolucionActual.id_moneda).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda").select2("val", null);
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_estado!=null && devolucion_control.devolucionActual.id_estado>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado").val() != devolucion_control.devolucionActual.id_estado) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado").val(devolucion_control.devolucionActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-direccion").val(devolucion_control.devolucionActual.direccion);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-envia").val(devolucion_control.devolucionActual.envia);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-observacion").val(devolucion_control.devolucionActual.observacion);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-impuesto_en_precio").prop('checked',devolucion_control.devolucionActual.impuesto_en_precio);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-sub_total").val(devolucion_control.devolucionActual.sub_total);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-descuento_monto").val(devolucion_control.devolucionActual.descuento_monto);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-descuento_porciento").val(devolucion_control.devolucionActual.descuento_porciento);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-iva_monto").val(devolucion_control.devolucionActual.iva_monto);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-iva_porciento").val(devolucion_control.devolucionActual.iva_porciento);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-total").val(devolucion_control.devolucionActual.total);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-otro_monto").val(devolucion_control.devolucionActual.otro_monto);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-otro_porciento").val(devolucion_control.devolucionActual.otro_porciento);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-factura_proveedor").val(devolucion_control.devolucionActual.factura_proveedor);
		jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-pago").val(devolucion_control.devolucionActual.pago);
		
		if(devolucion_control.devolucionActual.id_asiento!=null && devolucion_control.devolucionActual.id_asiento>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_asiento").val() != devolucion_control.devolucionActual.id_asiento) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_asiento").val(devolucion_control.devolucionActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_asiento").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_documento_cuenta_pagar!=null && devolucion_control.devolucionActual.id_documento_cuenta_pagar>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val() != devolucion_control.devolucionActual.id_documento_cuenta_pagar) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val(devolucion_control.devolucionActual.id_documento_cuenta_pagar).trigger("change");
			}
		} else { 
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_kardex!=null && devolucion_control.devolucionActual.id_kardex>-1){
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_kardex").val() != devolucion_control.devolucionActual.id_kardex) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_kardex").val(devolucion_control.devolucionActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_kardex").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+devolucion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("devolucion","inventario","","form_devolucion",formulario,"","",paraEventoTabla,idFilaTabla,devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}
	
	actualizarSpanMensajesCampos(devolucion_control) {
		jQuery("#spanstrMensajeid").text(devolucion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(devolucion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(devolucion_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(devolucion_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(devolucion_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(devolucion_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(devolucion_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenumero").text(devolucion_control.strMensajenumero);		
		jQuery("#spanstrMensajeid_proveedor").text(devolucion_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajeid_vendedor").text(devolucion_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajeruc").text(devolucion_control.strMensajeruc);		
		jQuery("#spanstrMensajefecha_emision").text(devolucion_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajeid_termino_pago_proveedor").text(devolucion_control.strMensajeid_termino_pago_proveedor);		
		jQuery("#spanstrMensajefecha_vence").text(devolucion_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajecotizacion").text(devolucion_control.strMensajecotizacion);		
		jQuery("#spanstrMensajeid_moneda").text(devolucion_control.strMensajeid_moneda);		
		jQuery("#spanstrMensajeid_estado").text(devolucion_control.strMensajeid_estado);		
		jQuery("#spanstrMensajedireccion").text(devolucion_control.strMensajedireccion);		
		jQuery("#spanstrMensajeenvia").text(devolucion_control.strMensajeenvia);		
		jQuery("#spanstrMensajeobservacion").text(devolucion_control.strMensajeobservacion);		
		jQuery("#spanstrMensajeimpuesto_en_precio").text(devolucion_control.strMensajeimpuesto_en_precio);		
		jQuery("#spanstrMensajesub_total").text(devolucion_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_monto").text(devolucion_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajedescuento_porciento").text(devolucion_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(devolucion_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(devolucion_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajetotal").text(devolucion_control.strMensajetotal);		
		jQuery("#spanstrMensajeotro_monto").text(devolucion_control.strMensajeotro_monto);		
		jQuery("#spanstrMensajeotro_porciento").text(devolucion_control.strMensajeotro_porciento);		
		jQuery("#spanstrMensajefactura_proveedor").text(devolucion_control.strMensajefactura_proveedor);		
		jQuery("#spanstrMensajepago").text(devolucion_control.strMensajepago);		
		jQuery("#spanstrMensajeid_asiento").text(devolucion_control.strMensajeid_asiento);		
		jQuery("#spanstrMensajeid_documento_cuenta_pagar").text(devolucion_control.strMensajeid_documento_cuenta_pagar);		
		jQuery("#spanstrMensajeid_kardex").text(devolucion_control.strMensajeid_kardex);		
	}
	
	actualizarCssBotonesMantenimiento(devolucion_control) {
		jQuery("#tdbtnNuevodevolucion").css("visibility",devolucion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodevolucion").css("display",devolucion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardevolucion").css("visibility",devolucion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardevolucion").css("display",devolucion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardevolucion").css("visibility",devolucion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardevolucion").css("display",devolucion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardevolucion").css("visibility",devolucion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdevolucion").css("visibility",devolucion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdevolucion").css("display",devolucion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardevolucion").css("visibility",devolucion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardevolucion").css("visibility",devolucion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardevolucion").css("visibility",devolucion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa",devolucion_control.empresasFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_2",devolucion_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal",devolucion_control.sucursalsFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_3",devolucion_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio",devolucion_control.ejerciciosFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_4",devolucion_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo",devolucion_control.periodosFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_5",devolucion_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario",devolucion_control.usuariosFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_6",devolucion_control.usuariosFK);
		}
	};

	cargarCombosproveedorsFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor",devolucion_control.proveedorsFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_8",devolucion_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",devolucion_control.proveedorsFK);

	};

	cargarCombosvendedorsFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor",devolucion_control.vendedorsFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_9",devolucion_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",devolucion_control.vendedorsFK);

	};

	cargarCombostermino_pago_proveedorsFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor",devolucion_control.termino_pago_proveedorsFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_12",devolucion_control.termino_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor",devolucion_control.termino_pago_proveedorsFK);

	};

	cargarCombosmonedasFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda",devolucion_control.monedasFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_15",devolucion_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda",devolucion_control.monedasFK);

	};

	cargarCombosestadosFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado",devolucion_control.estadosFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_16",devolucion_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",devolucion_control.estadosFK);

	};

	cargarCombosasientosFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_asiento",devolucion_control.asientosFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_31",devolucion_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",devolucion_control.asientosFK);

	};

	cargarCombosdocumento_cuenta_pagarsFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar",devolucion_control.documento_cuenta_pagarsFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_32",devolucion_control.documento_cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar",devolucion_control.documento_cuenta_pagarsFK);

	};

	cargarComboskardexsFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_kardex",devolucion_control.kardexsFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_33",devolucion_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",devolucion_control.kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(devolucion_control) {

	};

	registrarComboActionChangeCombossucursalsFK(devolucion_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(devolucion_control) {

	};

	registrarComboActionChangeCombosperiodosFK(devolucion_control) {

	};

	registrarComboActionChangeCombosusuariosFK(devolucion_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(devolucion_control) {
		this.registrarComboActionChangeid_proveedor("form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor",false,0);


		this.registrarComboActionChangeid_proveedor(""+devolucion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(devolucion_control) {

	};

	registrarComboActionChangeCombostermino_pago_proveedorsFK(devolucion_control) {

	};

	registrarComboActionChangeCombosmonedasFK(devolucion_control) {

	};

	registrarComboActionChangeCombosestadosFK(devolucion_control) {

	};

	registrarComboActionChangeCombosasientosFK(devolucion_control) {

	};

	registrarComboActionChangeCombosdocumento_cuenta_pagarsFK(devolucion_control) {

	};

	registrarComboActionChangeComboskardexsFK(devolucion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idempresaDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa").val() != devolucion_control.idempresaDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa").val(devolucion_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idsucursalDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal").val() != devolucion_control.idsucursalDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal").val(devolucion_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idejercicioDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio").val() != devolucion_control.idejercicioDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio").val(devolucion_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idperiodoDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo").val() != devolucion_control.idperiodoDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo").val(devolucion_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idusuarioDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario").val() != devolucion_control.idusuarioDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario").val(devolucion_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idproveedorDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor").val() != devolucion_control.idproveedorDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor").val(devolucion_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(devolucion_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idvendedorDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor").val() != devolucion_control.idvendedorDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor").val(devolucion_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(devolucion_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_proveedorsFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idtermino_pago_proveedorDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != devolucion_control.idtermino_pago_proveedorDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(devolucion_control.idtermino_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor").val(devolucion_control.idtermino_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idmonedaDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda").val() != devolucion_control.idmonedaDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda").val(devolucion_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(devolucion_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idestadoDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado").val() != devolucion_control.idestadoDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado").val(devolucion_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(devolucion_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idasientoDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_asiento").val() != devolucion_control.idasientoDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_asiento").val(devolucion_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(devolucion_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_cuenta_pagarsFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.iddocumento_cuenta_pagarDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val() != devolucion_control.iddocumento_cuenta_pagarDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val(devolucion_control.iddocumento_cuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val(devolucion_control.iddocumento_cuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idkardexDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_kardex").val() != devolucion_control.idkardexDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_kardex").val(devolucion_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(devolucion_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_proveedor(id_proveedor,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("devolucion","inventario","","id_proveedor",id_proveedor,"NINGUNO","",paraEventoTabla,idFilaTabla,devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







		jQuery("#form-id_moneda").prop("disabled", habilitarDeshabilitar);
		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
			
							devolucion_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
			
		devolucion_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//devolucion_control
		
	
	}
	
	onLoadCombosDefectoFK(devolucion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosempresasFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombossucursalsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosejerciciosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosperiodosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosusuariosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosproveedorsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosvendedorsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombostermino_pago_proveedorsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosmonedasFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosestadosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosasientosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosdocumento_cuenta_pagarsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorComboskardexsFK(devolucion_control);
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
	onLoadCombosEventosFK(devolucion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosempresasFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombossucursalsFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosejerciciosFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosperiodosFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosusuariosFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosproveedorsFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosvendedorsFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombostermino_pago_proveedorsFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosmonedasFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosestadosFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosasientosFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_pagarsFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeComboskardexsFK(devolucion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(devolucion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
				devolucion_funcion1.validarFormularioJQuery(devolucion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("devolucion");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("devolucion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(devolucion_funcion1,devolucion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(devolucion_funcion1,devolucion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(devolucion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,"devolucion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_proveedor","id_termino_pago_proveedor","cuentaspagar","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParatermino_pago_proveedor("id_termino_pago_proveedor");
				//alert(jQuery('#form-id_termino_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_moneda","contabilidad","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParamoneda("id_moneda");
				//alert(jQuery('#form-id_moneda_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_pagar","id_documento_cuenta_pagar","cuentaspagar","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParadocumento_cuenta_pagar("id_documento_cuenta_pagar");
				//alert(jQuery('#form-id_documento_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("devolucion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(devolucion_control) {
		
		
		
		if(devolucion_control.strPermisoActualizar!=null) {
			jQuery("#tddevolucionActualizarToolBar").css("display",devolucion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tddevolucionEliminarToolBar").css("display",devolucion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trdevolucionElementos").css("display",devolucion_control.strVisibleTablaElementos);
		
		jQuery("#trdevolucionAcciones").css("display",devolucion_control.strVisibleTablaAcciones);
		jQuery("#trdevolucionParametrosAcciones").css("display",devolucion_control.strVisibleTablaAcciones);
		
		jQuery("#tddevolucionCerrarPagina").css("display",devolucion_control.strPermisoPopup);		
		jQuery("#tddevolucionCerrarPaginaToolBar").css("display",devolucion_control.strPermisoPopup);
		//jQuery("#trdevolucionAccionesRelaciones").css("display",devolucion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=devolucion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + devolucion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + devolucion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Devoluciones";
		sTituloBanner+=" - " + devolucion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + devolucion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddevolucionRelacionesToolBar").css("display",devolucion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdevolucion").css("display",devolucion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		devolucion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		devolucion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		devolucion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		devolucion_webcontrol1.registrarEventosControles();
		
		if(devolucion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(devolucion_constante1.STR_ES_RELACIONADO=="false") {
			devolucion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(devolucion_constante1.STR_ES_RELACIONES=="true") {
			if(devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
				devolucion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(devolucion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(devolucion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(devolucion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
						//devolucion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(devolucion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(devolucion_constante1.BIG_ID_ACTUAL,"devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
						//devolucion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			devolucion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);	
	}
}

var devolucion_webcontrol1 = new devolucion_webcontrol();

export {devolucion_webcontrol,devolucion_webcontrol1};

//Para ser llamado desde window.opener
window.devolucion_webcontrol1 = devolucion_webcontrol1;


if(devolucion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = devolucion_webcontrol1.onLoadWindow; 
}

//</script>