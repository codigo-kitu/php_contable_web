//<script type="text/javascript" language="javascript">



//var asiento_predefinidoJQueryPaginaWebInteraccion= function (asiento_predefinido_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {asiento_predefinido_constante,asiento_predefinido_constante1} from '../util/asiento_predefinido_constante.js';

import {asiento_predefinido_funcion,asiento_predefinido_funcion1} from '../util/asiento_predefinido_form_funcion.js';


class asiento_predefinido_webcontrol extends GeneralEntityWebControl {
	
	asiento_predefinido_control=null;
	asiento_predefinido_controlInicial=null;
	asiento_predefinido_controlAuxiliar=null;
		
	//if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_predefinido_control) {
		super();
		
		this.asiento_predefinido_control=asiento_predefinido_control;
	}
		
	actualizarVariablesPagina(asiento_predefinido_control) {
		
		if(asiento_predefinido_control.action=="index" || asiento_predefinido_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_predefinido_control);
			
		} 
		
		
		
	
		else if(asiento_predefinido_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_predefinido_control);	
		
		} else if(asiento_predefinido_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_predefinido_control);		
		}
	
		else if(asiento_predefinido_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_predefinido_control);		
		}
	
		else if(asiento_predefinido_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_predefinido_control);
		}
		
		
		else if(asiento_predefinido_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(asiento_predefinido_control);		
		
		} else if(asiento_predefinido_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_predefinido_control);		
		
		} 
		//else if(asiento_predefinido_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_predefinido_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + asiento_predefinido_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(asiento_predefinido_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(asiento_predefinido_control) {
		this.actualizarPaginaAccionesGenerales(asiento_predefinido_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(asiento_predefinido_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_predefinido_control);
		this.actualizarPaginaOrderBy(asiento_predefinido_control);
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_control);
		//this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_predefinido_control);
		this.actualizarPaginaAreaBusquedas(asiento_predefinido_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_predefinido_control) {
		//this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_predefinido_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_predefinido_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_predefinido_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_predefinido_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);
		this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(asiento_predefinido_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_predefinido_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);
		this.actualizarPaginaFormulario(asiento_predefinido_control);
		this.onLoadCombosDefectoFK(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_predefinido_control) {
		//FORMULARIO
		if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_predefinido_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_predefinido_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		
		//COMBOS FK
		if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_predefinido_control) {
		//FORMULARIO
		if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_predefinido_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_predefinido_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);	
		
		//COMBOS FK
		if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(asiento_predefinido_control) {
		//FORMULARIO
		if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_predefinido_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);	
		//COMBOS FK
		if(asiento_predefinido_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(asiento_predefinido_control) {
		
		if(asiento_predefinido_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_predefinido_control);
		}
		
		if(asiento_predefinido_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(asiento_predefinido_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(asiento_predefinido_control) {
		if(asiento_predefinido_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("asiento_predefinidoReturnGeneral",JSON.stringify(asiento_predefinido_control.asiento_predefinidoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control) {
		if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_predefinido_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_predefinido_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_predefinido_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(asiento_predefinido_control, mostrar) {
		
		if(mostrar==true) {
			asiento_predefinido_funcion1.resaltarRestaurarDivsPagina(false,"asiento_predefinido");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_predefinido_funcion1.resaltarRestaurarDivMantenimiento(false,"asiento_predefinido");
			}			
			
			asiento_predefinido_funcion1.mostrarDivMensaje(true,asiento_predefinido_control.strAuxiliarMensaje,asiento_predefinido_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_predefinido_funcion1.mostrarDivMensaje(false,asiento_predefinido_control.strAuxiliarMensaje,asiento_predefinido_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_control) {
		if(asiento_predefinido_funcion1.esPaginaForm(asiento_predefinido_constante1)==true) {
			window.opener.asiento_predefinido_webcontrol1.actualizarPaginaTablaDatos(asiento_predefinido_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_predefinido_control) {
		asiento_predefinido_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_predefinido_control.strAuxiliarUrlPagina);
				
		asiento_predefinido_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_predefinido_control.strAuxiliarTipo,asiento_predefinido_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_predefinido_control) {
		asiento_predefinido_funcion1.resaltarRestaurarDivMensaje(true,asiento_predefinido_control.strAuxiliarMensajeAlert,asiento_predefinido_control.strAuxiliarCssMensaje);
			
		if(asiento_predefinido_funcion1.esPaginaForm(asiento_predefinido_constante1)==true) {
			window.opener.asiento_predefinido_funcion1.resaltarRestaurarDivMensaje(true,asiento_predefinido_control.strAuxiliarMensajeAlert,asiento_predefinido_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(asiento_predefinido_control) {
		this.asiento_predefinido_controlInicial=asiento_predefinido_control;
			
		if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_predefinido_control.strStyleDivArbol,asiento_predefinido_control.strStyleDivContent
																,asiento_predefinido_control.strStyleDivOpcionesBanner,asiento_predefinido_control.strStyleDivExpandirColapsar
																,asiento_predefinido_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(asiento_predefinido_control) {
		this.actualizarCssBotonesPagina(asiento_predefinido_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_predefinido_control.tiposReportes,asiento_predefinido_control.tiposReporte
															 	,asiento_predefinido_control.tiposPaginacion,asiento_predefinido_control.tiposAcciones
																,asiento_predefinido_control.tiposColumnasSelect,asiento_predefinido_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(asiento_predefinido_control.tiposRelaciones,asiento_predefinido_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_predefinido_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_predefinido_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_predefinido_control);			
	}
	
	actualizarPaginaUsuarioInvitado(asiento_predefinido_control) {
	
		var indexPosition=asiento_predefinido_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_predefinido_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(asiento_predefinido_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosempresasFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombossucursalsFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosejerciciosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosperiodosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosusuariosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosmodulosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosfuentesFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarComboscentro_costosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosdocumento_contablesFK(asiento_predefinido_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_predefinido_control.strRecargarFkTiposNinguno!=null && asiento_predefinido_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_predefinido_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosempresasFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombossucursalsFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosejerciciosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosperiodosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosusuariosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosmodulosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_fuente",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosfuentesFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarComboscentro_costosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosdocumento_contablesFK(asiento_predefinido_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.usuariosFK);
	}

	cargarComboEditarTablamoduloFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.modulosFK);
	}

	cargarComboEditarTablafuenteFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.fuentesFK);
	}

	cargarComboEditarTablalibro_auxiliarFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.libro_auxiliarsFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.centro_costosFK);
	}

	cargarComboEditarTabladocumento_contableFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.documento_contablesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(asiento_predefinido_control) {
		jQuery("#tdasiento_predefinidoNuevo").css("display",asiento_predefinido_control.strPermisoNuevo);
		jQuery("#trasiento_predefinidoElementos").css("display",asiento_predefinido_control.strVisibleTablaElementos);
		jQuery("#trasiento_predefinidoAcciones").css("display",asiento_predefinido_control.strVisibleTablaAcciones);
		jQuery("#trasiento_predefinidoParametrosAcciones").css("display",asiento_predefinido_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(asiento_predefinido_control) {
	
		this.actualizarCssBotonesMantenimiento(asiento_predefinido_control);
				
		if(asiento_predefinido_control.asiento_predefinidoActual!=null) {//form
			
			this.actualizarCamposFormulario(asiento_predefinido_control);			
		}
						
		this.actualizarSpanMensajesCampos(asiento_predefinido_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(asiento_predefinido_control) {
	
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id").val(asiento_predefinido_control.asiento_predefinidoActual.id);
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-created_at").val(asiento_predefinido_control.asiento_predefinidoActual.versionRow);
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-updated_at").val(asiento_predefinido_control.asiento_predefinidoActual.versionRow);
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_empresa!=null && asiento_predefinido_control.asiento_predefinidoActual.id_empresa>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_predefinido_control.asiento_predefinidoActual.id_empresa) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val(asiento_predefinido_control.asiento_predefinidoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_sucursal!=null && asiento_predefinido_control.asiento_predefinidoActual.id_sucursal>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val() != asiento_predefinido_control.asiento_predefinidoActual.id_sucursal) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val(asiento_predefinido_control.asiento_predefinidoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio!=null && asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val() != asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val(asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_periodo!=null && asiento_predefinido_control.asiento_predefinidoActual.id_periodo>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val() != asiento_predefinido_control.asiento_predefinidoActual.id_periodo) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val(asiento_predefinido_control.asiento_predefinidoActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_usuario!=null && asiento_predefinido_control.asiento_predefinidoActual.id_usuario>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val() != asiento_predefinido_control.asiento_predefinidoActual.id_usuario) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val(asiento_predefinido_control.asiento_predefinidoActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_modulo!=null && asiento_predefinido_control.asiento_predefinidoActual.id_modulo>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val() != asiento_predefinido_control.asiento_predefinidoActual.id_modulo) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val(asiento_predefinido_control.asiento_predefinidoActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-codigo").val(asiento_predefinido_control.asiento_predefinidoActual.codigo);
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-nombre").val(asiento_predefinido_control.asiento_predefinidoActual.nombre);
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_fuente!=null && asiento_predefinido_control.asiento_predefinidoActual.id_fuente>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val() != asiento_predefinido_control.asiento_predefinidoActual.id_fuente) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val(asiento_predefinido_control.asiento_predefinidoActual.id_fuente).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar!=null && asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo!=null && asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable!=null && asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable>-1){
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val() != asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val(asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").select2("val", null);
			if(jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-descripcion").val(asiento_predefinido_control.asiento_predefinidoActual.descripcion);
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-nro_nit").val(asiento_predefinido_control.asiento_predefinidoActual.nro_nit);
		jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-referencia").val(asiento_predefinido_control.asiento_predefinidoActual.referencia);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+asiento_predefinido_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("asiento_predefinido","contabilidad","","form_asiento_predefinido",formulario,"","",paraEventoTabla,idFilaTabla,asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}
	
	actualizarSpanMensajesCampos(asiento_predefinido_control) {
		jQuery("#spanstrMensajeid").text(asiento_predefinido_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(asiento_predefinido_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(asiento_predefinido_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(asiento_predefinido_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(asiento_predefinido_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(asiento_predefinido_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(asiento_predefinido_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(asiento_predefinido_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_modulo").text(asiento_predefinido_control.strMensajeid_modulo);		
		jQuery("#spanstrMensajecodigo").text(asiento_predefinido_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(asiento_predefinido_control.strMensajenombre);		
		jQuery("#spanstrMensajeid_fuente").text(asiento_predefinido_control.strMensajeid_fuente);		
		jQuery("#spanstrMensajeid_libro_auxiliar").text(asiento_predefinido_control.strMensajeid_libro_auxiliar);		
		jQuery("#spanstrMensajeid_centro_costo").text(asiento_predefinido_control.strMensajeid_centro_costo);		
		jQuery("#spanstrMensajeid_documento_contable").text(asiento_predefinido_control.strMensajeid_documento_contable);		
		jQuery("#spanstrMensajedescripcion").text(asiento_predefinido_control.strMensajedescripcion);		
		jQuery("#spanstrMensajenro_nit").text(asiento_predefinido_control.strMensajenro_nit);		
		jQuery("#spanstrMensajereferencia").text(asiento_predefinido_control.strMensajereferencia);		
	}
	
	actualizarCssBotonesMantenimiento(asiento_predefinido_control) {
		jQuery("#tdbtnNuevoasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoasiento_predefinido").css("display",asiento_predefinido_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarasiento_predefinido").css("display",asiento_predefinido_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarasiento_predefinido").css("display",asiento_predefinido_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosasiento_predefinido").css("display",asiento_predefinido_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarasiento_predefinido").css("visibility",asiento_predefinido_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa",asiento_predefinido_control.empresasFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_3",asiento_predefinido_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal",asiento_predefinido_control.sucursalsFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_4",asiento_predefinido_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio",asiento_predefinido_control.ejerciciosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_5",asiento_predefinido_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo",asiento_predefinido_control.periodosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_6",asiento_predefinido_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario",asiento_predefinido_control.usuariosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_7",asiento_predefinido_control.usuariosFK);
		}
	};

	cargarCombosmodulosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo",asiento_predefinido_control.modulosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_8",asiento_predefinido_control.modulosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo",asiento_predefinido_control.modulosFK);

	};

	cargarCombosfuentesFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente",asiento_predefinido_control.fuentesFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_11",asiento_predefinido_control.fuentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente",asiento_predefinido_control.fuentesFK);

	};

	cargarComboslibro_auxiliarsFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar",asiento_predefinido_control.libro_auxiliarsFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_12",asiento_predefinido_control.libro_auxiliarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar",asiento_predefinido_control.libro_auxiliarsFK);

	};

	cargarComboscentro_costosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo",asiento_predefinido_control.centro_costosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_13",asiento_predefinido_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_predefinido_control.centro_costosFK);

	};

	cargarCombosdocumento_contablesFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable",asiento_predefinido_control.documento_contablesFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_14",asiento_predefinido_control.documento_contablesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable",asiento_predefinido_control.documento_contablesFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombossucursalsFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosperiodosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosusuariosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosmodulosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosfuentesFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeComboslibro_auxiliarsFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosdocumento_contablesFK(asiento_predefinido_control) {

	};

	
	
	setDefectoValorCombosempresasFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idempresaDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_predefinido_control.idempresaDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val(asiento_predefinido_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idsucursalDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val() != asiento_predefinido_control.idsucursalDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val(asiento_predefinido_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idejercicioDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val() != asiento_predefinido_control.idejercicioDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val(asiento_predefinido_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idperiodoDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val() != asiento_predefinido_control.idperiodoDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val(asiento_predefinido_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idusuarioDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val() != asiento_predefinido_control.idusuarioDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val(asiento_predefinido_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosmodulosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idmoduloDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val() != asiento_predefinido_control.idmoduloDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val(asiento_predefinido_control.idmoduloDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val(asiento_predefinido_control.idmoduloDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosfuentesFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idfuenteDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val() != asiento_predefinido_control.idfuenteDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val(asiento_predefinido_control.idfuenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(asiento_predefinido_control.idfuenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboslibro_auxiliarsFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idlibro_auxiliarDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != asiento_predefinido_control.idlibro_auxiliarDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(asiento_predefinido_control.idlibro_auxiliarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(asiento_predefinido_control.idlibro_auxiliarDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_predefinido_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_predefinido_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_predefinido_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_contablesFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.iddocumento_contableDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val() != asiento_predefinido_control.iddocumento_contableDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val(asiento_predefinido_control.iddocumento_contableDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable").val(asiento_predefinido_control.iddocumento_contableDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_predefinido_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_predefinido_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_predefinido_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosempresasFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombossucursalsFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosejerciciosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosperiodosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosusuariosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosmodulosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosfuentesFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorComboslibro_auxiliarsFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosdocumento_contablesFK(asiento_predefinido_control);
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
	onLoadCombosEventosFK(asiento_predefinido_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_predefinido_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosempresasFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombossucursalsFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosejerciciosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosperiodosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosusuariosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosmodulosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosfuentesFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeComboslibro_auxiliarsFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosdocumento_contablesFK(asiento_predefinido_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_predefinido_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_predefinido_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(asiento_predefinido_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_predefinido_funcion1.validarFormularioJQuery(asiento_predefinido_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento_predefinido");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento_predefinido");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,"asiento_predefinido");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("fuente","id_fuente","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParafuente("id_fuente");
				//alert(jQuery('#form-id_fuente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("libro_auxiliar","id_libro_auxiliar","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParalibro_auxiliar("id_libro_auxiliar");
				//alert(jQuery('#form-id_libro_auxiliar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_contable","id_documento_contable","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParadocumento_contable("id_documento_contable");
				//alert(jQuery('#form-id_documento_contable_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("asiento_predefinido");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_predefinido_control) {
		
		
		
		if(asiento_predefinido_control.strPermisoActualizar!=null) {
			jQuery("#tdasiento_predefinidoActualizarToolBar").css("display",asiento_predefinido_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdasiento_predefinidoEliminarToolBar").css("display",asiento_predefinido_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trasiento_predefinidoElementos").css("display",asiento_predefinido_control.strVisibleTablaElementos);
		
		jQuery("#trasiento_predefinidoAcciones").css("display",asiento_predefinido_control.strVisibleTablaAcciones);
		jQuery("#trasiento_predefinidoParametrosAcciones").css("display",asiento_predefinido_control.strVisibleTablaAcciones);
		
		jQuery("#tdasiento_predefinidoCerrarPagina").css("display",asiento_predefinido_control.strPermisoPopup);		
		jQuery("#tdasiento_predefinidoCerrarPaginaToolBar").css("display",asiento_predefinido_control.strPermisoPopup);
		//jQuery("#trasiento_predefinidoAccionesRelaciones").css("display",asiento_predefinido_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=asiento_predefinido_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_predefinido_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + asiento_predefinido_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Asiento Predefinidos";
		sTituloBanner+=" - " + asiento_predefinido_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_predefinido_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdasiento_predefinidoRelacionesToolBar").css("display",asiento_predefinido_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosasiento_predefinido").css("display",asiento_predefinido_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		asiento_predefinido_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		asiento_predefinido_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_predefinido_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_predefinido_webcontrol1.registrarEventosControles();
		
		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
			asiento_predefinido_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_predefinido_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_predefinido_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_predefinido_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_predefinido_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(asiento_predefinido_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(asiento_predefinido_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(asiento_predefinido_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
						//asiento_predefinido_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(asiento_predefinido_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(asiento_predefinido_constante1.BIG_ID_ACTUAL,"asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
						//asiento_predefinido_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			asiento_predefinido_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);	
	}
	
	/*
		Variables-Pagina: actualizarVariablesPagina
		Variables-Pagina:actualizarVariablesPagina(AccionIndex,AccionCancelar,AccionMostrarEjecutar,AccionesGenerales)
		Variables-Pagina:actualizarVariablesPagina(AccionNuevo,AccionActualizar,AccionEliminar,AccionSeleccionar)
		Variables-Pagina:actualizarVariablesPagina(AccionNuevoPreparar,AccionRecargarFomulario,AccionManejarEventos)
		Pagina: actualizarPagina(AccionesGenerales,GuardarReturnSession,MensajePantallaAuxiliar,MensajePantalla)
		Pagina: actualizarPagina(TablaDatos,AbrirLink,MensajeAlert,CargaGeneral,CargaGeneralControles)
		Pagina: actualizarPagina(CargaCombosFK,UsuarioInvitado)
		Pagina: actualizarPagina(AreaMantenimiento,Formulario)
		Combos-Fk: cargarCombosFK,cargarComboEditarTablaempresaFK,cargarComboEditarTablasucursalFK
		Combos-Fk: cargarCombosempresasFK,cargarCombossucursalsFK
		Combos-Fk: setDefectoValorCombosempresasFK,setDefectoValorCombossucursalsFK
		Combos-Fk: onLoadCombosEventosFK,onLoadCombosDefectoPaginaGeneralControles
		Campos-Recargar: actualizarCamposFormulario,recargarFormularioGeneral
		SpanMensajes-CssBotones: actualizarSpanMensajesCampos,actualizarCssBotonesMantenimiento
		Eventos-CombosFk: onLoadRecargarRelacionado,registrarEventosControles,onLoadCombosDefectoFK
		AccioesEventos-CssBotones: registrarAccionesEventos,actualizarCssBotonesPagina
		PropiedadesPagina-FuncionesPagina: registrarPropiedadesPagina, registrarFuncionesPagina
		Load-Unload-Pagina: onLoad, onUnLoadWindow, onLoadWindow
		Eventos-OnLoad: registrarEventosOnLoadGlobal
	*/
}

var asiento_predefinido_webcontrol1 = new asiento_predefinido_webcontrol();

//Para ser llamado desde otro archivo (import)
export {asiento_predefinido_webcontrol,asiento_predefinido_webcontrol1};

//Para ser llamado desde window.opener
window.asiento_predefinido_webcontrol1 = asiento_predefinido_webcontrol1;


if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_predefinido_webcontrol1.onLoadWindow; 
}

//</script>