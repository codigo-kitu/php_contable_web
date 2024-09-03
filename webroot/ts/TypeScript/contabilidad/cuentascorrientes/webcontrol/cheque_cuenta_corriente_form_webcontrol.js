//<script type="text/javascript" language="javascript">



//var cheque_cuenta_corrienteJQueryPaginaWebInteraccion= function (cheque_cuenta_corriente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cheque_cuenta_corriente_constante,cheque_cuenta_corriente_constante1} from '../util/cheque_cuenta_corriente_constante.js';

import {cheque_cuenta_corriente_funcion,cheque_cuenta_corriente_funcion1} from '../util/cheque_cuenta_corriente_form_funcion.js';


class cheque_cuenta_corriente_webcontrol extends GeneralEntityWebControl {
	
	cheque_cuenta_corriente_control=null;
	cheque_cuenta_corriente_controlInicial=null;
	cheque_cuenta_corriente_controlAuxiliar=null;
		
	//if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cheque_cuenta_corriente_control) {
		super();
		
		this.cheque_cuenta_corriente_control=cheque_cuenta_corriente_control;
	}
		
	actualizarVariablesPagina(cheque_cuenta_corriente_control) {
		
		if(cheque_cuenta_corriente_control.action=="index" || cheque_cuenta_corriente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cheque_cuenta_corriente_control);
			
		} 
		
		
		
	
		else if(cheque_cuenta_corriente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cheque_cuenta_corriente_control);	
		
		} else if(cheque_cuenta_corriente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cheque_cuenta_corriente_control);		
		}
	
	
		
		
		else if(cheque_cuenta_corriente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cheque_cuenta_corriente_control);		
		
		} else if(cheque_cuenta_corriente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cheque_cuenta_corriente_control);		
		
		} 
		//else if(cheque_cuenta_corriente_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cheque_cuenta_corriente_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cheque_cuenta_corriente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cheque_cuenta_corriente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cheque_cuenta_corriente_control) {
		this.actualizarPaginaAccionesGenerales(cheque_cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cheque_cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(cheque_cuenta_corriente_control);
		this.actualizarPaginaOrderBy(cheque_cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(cheque_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cheque_cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(cheque_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cheque_cuenta_corriente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cheque_cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cheque_cuenta_corriente_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cheque_cuenta_corriente_control) {
		this.actualizarPaginaCargaGeneralControles(cheque_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cheque_cuenta_corriente_control);
		this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cheque_cuenta_corriente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cheque_cuenta_corriente_control) {
		this.actualizarPaginaCargaGeneralControles(cheque_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cheque_cuenta_corriente_control);
		this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);
		this.onLoadCombosDefectoFK(cheque_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cheque_cuenta_corriente_control) {
		//FORMULARIO
		if(cheque_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cheque_cuenta_corriente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		
		//COMBOS FK
		if(cheque_cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cheque_cuenta_corriente_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cheque_cuenta_corriente_control) {
		//FORMULARIO
		if(cheque_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cheque_cuenta_corriente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);	
		
		//COMBOS FK
		if(cheque_cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cheque_cuenta_corriente_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cheque_cuenta_corriente_control) {
		//FORMULARIO
		if(cheque_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);	
		//COMBOS FK
		if(cheque_cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cheque_cuenta_corriente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cheque_cuenta_corriente_control) {
		
		if(cheque_cuenta_corriente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cheque_cuenta_corriente_control);
		}
		
		if(cheque_cuenta_corriente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cheque_cuenta_corriente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cheque_cuenta_corriente_control) {
		if(cheque_cuenta_corriente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cheque_cuenta_corrienteReturnGeneral",JSON.stringify(cheque_cuenta_corriente_control.cheque_cuenta_corrienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control) {
		if(cheque_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cheque_cuenta_corriente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cheque_cuenta_corriente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cheque_cuenta_corriente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cheque_cuenta_corriente_control, mostrar) {
		
		if(mostrar==true) {
			cheque_cuenta_corriente_funcion1.resaltarRestaurarDivsPagina(false,"cheque_cuenta_corriente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cheque_cuenta_corriente_funcion1.resaltarRestaurarDivMantenimiento(false,"cheque_cuenta_corriente");
			}			
			
			cheque_cuenta_corriente_funcion1.mostrarDivMensaje(true,cheque_cuenta_corriente_control.strAuxiliarMensaje,cheque_cuenta_corriente_control.strAuxiliarCssMensaje);
		
		} else {
			cheque_cuenta_corriente_funcion1.mostrarDivMensaje(false,cheque_cuenta_corriente_control.strAuxiliarMensaje,cheque_cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cheque_cuenta_corriente_control) {
		if(cheque_cuenta_corriente_funcion1.esPaginaForm(cheque_cuenta_corriente_constante1)==true) {
			window.opener.cheque_cuenta_corriente_webcontrol1.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);
		} else {
			this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);
		}
	}
	
	actualizarPaginaAbrirLink(cheque_cuenta_corriente_control) {
		cheque_cuenta_corriente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cheque_cuenta_corriente_control.strAuxiliarUrlPagina);
				
		cheque_cuenta_corriente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cheque_cuenta_corriente_control.strAuxiliarTipo,cheque_cuenta_corriente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cheque_cuenta_corriente_control) {
		cheque_cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,cheque_cuenta_corriente_control.strAuxiliarMensajeAlert,cheque_cuenta_corriente_control.strAuxiliarCssMensaje);
			
		if(cheque_cuenta_corriente_funcion1.esPaginaForm(cheque_cuenta_corriente_constante1)==true) {
			window.opener.cheque_cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,cheque_cuenta_corriente_control.strAuxiliarMensajeAlert,cheque_cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cheque_cuenta_corriente_control) {
		this.cheque_cuenta_corriente_controlInicial=cheque_cuenta_corriente_control;
			
		if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cheque_cuenta_corriente_control.strStyleDivArbol,cheque_cuenta_corriente_control.strStyleDivContent
																,cheque_cuenta_corriente_control.strStyleDivOpcionesBanner,cheque_cuenta_corriente_control.strStyleDivExpandirColapsar
																,cheque_cuenta_corriente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cheque_cuenta_corriente_control) {
		this.actualizarCssBotonesPagina(cheque_cuenta_corriente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cheque_cuenta_corriente_control.tiposReportes,cheque_cuenta_corriente_control.tiposReporte
															 	,cheque_cuenta_corriente_control.tiposPaginacion,cheque_cuenta_corriente_control.tiposAcciones
																,cheque_cuenta_corriente_control.tiposColumnasSelect,cheque_cuenta_corriente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cheque_cuenta_corriente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cheque_cuenta_corriente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cheque_cuenta_corriente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cheque_cuenta_corriente_control) {
	
		var indexPosition=cheque_cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cheque_cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cheque_cuenta_corriente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosempresasFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombossucursalsFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosperiodosFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosusuariosFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarComboscuenta_corrientesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarComboscategoria_chequesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosclientesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosproveedorsFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_beneficiario_ocacional_cheque",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!=null && cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!='NINGUNO' && cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!='') {
			
				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosempresasFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombossucursalsFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosperiodosFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosusuariosFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarComboscuenta_corrientesFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_cheque",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarComboscategoria_chequesFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosclientesFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosproveedorsFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_beneficiario_ocacional_cheque",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.cuenta_corrientesFK);
	}

	cargarComboEditarTablacategoria_chequeFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.categoria_chequesFK);
	}

	cargarComboEditarTablaclienteFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.clientesFK);
	}

	cargarComboEditarTablaproveedorFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.proveedorsFK);
	}

	cargarComboEditarTablabeneficiario_ocacional_chequeFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.beneficiario_ocacional_chequesFK);
	}

	cargarComboEditarTablaestado_deposito_retiroFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.estado_deposito_retirosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control) {
		jQuery("#tdcheque_cuenta_corrienteNuevo").css("display",cheque_cuenta_corriente_control.strPermisoNuevo);
		jQuery("#trcheque_cuenta_corrienteElementos").css("display",cheque_cuenta_corriente_control.strVisibleTablaElementos);
		jQuery("#trcheque_cuenta_corrienteAcciones").css("display",cheque_cuenta_corriente_control.strVisibleTablaAcciones);
		jQuery("#trcheque_cuenta_corrienteParametrosAcciones").css("display",cheque_cuenta_corriente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cheque_cuenta_corriente_control) {
	
		this.actualizarCssBotonesMantenimiento(cheque_cuenta_corriente_control);
				
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual!=null) {//form
			
			this.actualizarCamposFormulario(cheque_cuenta_corriente_control);			
		}
						
		this.actualizarSpanMensajesCampos(cheque_cuenta_corriente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cheque_cuenta_corriente_control) {
	
		jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id);
		jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-version_row").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.versionRow);
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_empresa!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_empresa>-1){
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_empresa) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_sucursal!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_sucursal>-1){
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_sucursal) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_ejercicio!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_ejercicio>-1){
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_ejercicio) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_periodo!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_periodo>-1){
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_periodo) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_usuario!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_usuario>-1){
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_usuario) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cuenta_corriente!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cuenta_corriente>-1){
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cuenta_corriente) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").select2("val", null);
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_categoria_cheque!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_categoria_cheque>-1){
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_categoria_cheque) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_categoria_cheque).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque").select2("val", null);
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cliente!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cliente>-1){
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cliente").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cliente) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cliente").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cliente").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_proveedor!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_proveedor>-1){
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_proveedor").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_proveedor) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_proveedor").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_proveedor").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_beneficiario_ocacional_cheque!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_beneficiario_ocacional_cheque>-1){
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_beneficiario_ocacional_cheque) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_beneficiario_ocacional_cheque).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-numero_cheque").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.numero_cheque);
		jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-fecha_emision").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.fecha_emision);
		jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-monto").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.monto);
		jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-monto_texto").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.monto_texto);
		jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-saldo").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.saldo);
		jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-descripcion").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.descripcion);
		jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-cobrado").prop('checked',cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.cobrado);
		jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-impreso").prop('checked',cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.impreso);
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_estado_deposito_retiro!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_estado_deposito_retiro>-1){
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_estado_deposito_retiro) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_estado_deposito_retiro).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").select2("val", null);
			if(jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-debito").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.debito);
		jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-credito").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.credito);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cheque_cuenta_corriente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cheque_cuenta_corriente","cuentascorrientes","","form_cheque_cuenta_corriente",formulario,"","",paraEventoTabla,idFilaTabla,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}
	
	actualizarSpanMensajesCampos(cheque_cuenta_corriente_control) {
		jQuery("#spanstrMensajeid").text(cheque_cuenta_corriente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cheque_cuenta_corriente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cheque_cuenta_corriente_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(cheque_cuenta_corriente_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(cheque_cuenta_corriente_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cheque_cuenta_corriente_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(cheque_cuenta_corriente_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_cuenta_corriente").text(cheque_cuenta_corriente_control.strMensajeid_cuenta_corriente);		
		jQuery("#spanstrMensajeid_categoria_cheque").text(cheque_cuenta_corriente_control.strMensajeid_categoria_cheque);		
		jQuery("#spanstrMensajeid_cliente").text(cheque_cuenta_corriente_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajeid_proveedor").text(cheque_cuenta_corriente_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajeid_beneficiario_ocacional_cheque").text(cheque_cuenta_corriente_control.strMensajeid_beneficiario_ocacional_cheque);		
		jQuery("#spanstrMensajenumero_cheque").text(cheque_cuenta_corriente_control.strMensajenumero_cheque);		
		jQuery("#spanstrMensajefecha_emision").text(cheque_cuenta_corriente_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajemonto").text(cheque_cuenta_corriente_control.strMensajemonto);		
		jQuery("#spanstrMensajemonto_texto").text(cheque_cuenta_corriente_control.strMensajemonto_texto);		
		jQuery("#spanstrMensajesaldo").text(cheque_cuenta_corriente_control.strMensajesaldo);		
		jQuery("#spanstrMensajedescripcion").text(cheque_cuenta_corriente_control.strMensajedescripcion);		
		jQuery("#spanstrMensajecobrado").text(cheque_cuenta_corriente_control.strMensajecobrado);		
		jQuery("#spanstrMensajeimpreso").text(cheque_cuenta_corriente_control.strMensajeimpreso);		
		jQuery("#spanstrMensajeid_estado_deposito_retiro").text(cheque_cuenta_corriente_control.strMensajeid_estado_deposito_retiro);		
		jQuery("#spanstrMensajedebito").text(cheque_cuenta_corriente_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(cheque_cuenta_corriente_control.strMensajecredito);		
	}
	
	actualizarCssBotonesMantenimiento(cheque_cuenta_corriente_control) {
		jQuery("#tdbtnNuevocheque_cuenta_corriente").css("visibility",cheque_cuenta_corriente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocheque_cuenta_corriente").css("display",cheque_cuenta_corriente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcheque_cuenta_corriente").css("visibility",cheque_cuenta_corriente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcheque_cuenta_corriente").css("display",cheque_cuenta_corriente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcheque_cuenta_corriente").css("visibility",cheque_cuenta_corriente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcheque_cuenta_corriente").css("display",cheque_cuenta_corriente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcheque_cuenta_corriente").css("visibility",cheque_cuenta_corriente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscheque_cuenta_corriente").css("visibility",cheque_cuenta_corriente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscheque_cuenta_corriente").css("display",cheque_cuenta_corriente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcheque_cuenta_corriente").css("visibility",cheque_cuenta_corriente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcheque_cuenta_corriente").css("visibility",cheque_cuenta_corriente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcheque_cuenta_corriente").css("visibility",cheque_cuenta_corriente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa",cheque_cuenta_corriente_control.empresasFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_2",cheque_cuenta_corriente_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal",cheque_cuenta_corriente_control.sucursalsFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_3",cheque_cuenta_corriente_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio",cheque_cuenta_corriente_control.ejerciciosFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_4",cheque_cuenta_corriente_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo",cheque_cuenta_corriente_control.periodosFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_5",cheque_cuenta_corriente_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario",cheque_cuenta_corriente_control.usuariosFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_6",cheque_cuenta_corriente_control.usuariosFK);
		}
	};

	cargarComboscuenta_corrientesFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente",cheque_cuenta_corriente_control.cuenta_corrientesFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_7",cheque_cuenta_corriente_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",cheque_cuenta_corriente_control.cuenta_corrientesFK);

	};

	cargarComboscategoria_chequesFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque",cheque_cuenta_corriente_control.categoria_chequesFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_8",cheque_cuenta_corriente_control.categoria_chequesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque",cheque_cuenta_corriente_control.categoria_chequesFK);

	};

	cargarCombosclientesFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cliente",cheque_cuenta_corriente_control.clientesFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_9",cheque_cuenta_corriente_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",cheque_cuenta_corriente_control.clientesFK);

	};

	cargarCombosproveedorsFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_proveedor",cheque_cuenta_corriente_control.proveedorsFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_10",cheque_cuenta_corriente_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",cheque_cuenta_corriente_control.proveedorsFK);

	};

	cargarCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque",cheque_cuenta_corriente_control.beneficiario_ocacional_chequesFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_11",cheque_cuenta_corriente_control.beneficiario_ocacional_chequesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque",cheque_cuenta_corriente_control.beneficiario_ocacional_chequesFK);

	};

	cargarCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro",cheque_cuenta_corriente_control.estado_deposito_retirosFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_20",cheque_cuenta_corriente_control.estado_deposito_retirosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro",cheque_cuenta_corriente_control.estado_deposito_retirosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombossucursalsFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeComboscategoria_chequesFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosclientesFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idempresaDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != cheque_cuenta_corriente_control.idempresaDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(cheque_cuenta_corriente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idsucursalDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val() != cheque_cuenta_corriente_control.idsucursalDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val(cheque_cuenta_corriente_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idejercicioDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != cheque_cuenta_corriente_control.idejercicioDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(cheque_cuenta_corriente_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idperiodoDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != cheque_cuenta_corriente_control.idperiodoDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(cheque_cuenta_corriente_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idusuarioDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != cheque_cuenta_corriente_control.idusuarioDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(cheque_cuenta_corriente_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != cheque_cuenta_corriente_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(cheque_cuenta_corriente_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(cheque_cuenta_corriente_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_chequesFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idcategoria_chequeDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != cheque_cuenta_corriente_control.idcategoria_chequeDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque").val(cheque_cuenta_corriente_control.idcategoria_chequeDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val(cheque_cuenta_corriente_control.idcategoria_chequeDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idclienteDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cliente").val() != cheque_cuenta_corriente_control.idclienteDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cliente").val(cheque_cuenta_corriente_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(cheque_cuenta_corriente_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idproveedorDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_proveedor").val() != cheque_cuenta_corriente_control.idproveedorDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_proveedor").val(cheque_cuenta_corriente_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(cheque_cuenta_corriente_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idbeneficiario_ocacional_chequeDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val() != cheque_cuenta_corriente_control.idbeneficiario_ocacional_chequeDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val(cheque_cuenta_corriente_control.idbeneficiario_ocacional_chequeDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque").val(cheque_cuenta_corriente_control.idbeneficiario_ocacional_chequeDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idestado_deposito_retiroDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != cheque_cuenta_corriente_control.idestado_deposito_retiroDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(cheque_cuenta_corriente_control.idestado_deposito_retiroDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(cheque_cuenta_corriente_control.idestado_deposito_retiroDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	









		jQuery("#form-id_estado_deposito_retiro").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cheque_cuenta_corriente_control
		
	
	}
	
	onLoadCombosDefectoFK(cheque_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cheque_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosempresasFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombossucursalsFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosejerciciosFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosperiodosFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosusuariosFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorComboscuenta_corrientesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorComboscategoria_chequesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosclientesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosproveedorsFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_beneficiario_ocacional_cheque",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control);
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
	onLoadCombosEventosFK(cheque_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cheque_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosempresasFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombossucursalsFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosperiodosFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosusuariosFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeComboscategoria_chequesFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosclientesFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosproveedorsFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_beneficiario_ocacional_cheque",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cheque_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cheque_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cheque_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				cheque_cuenta_corriente_funcion1.validarFormularioJQuery(cheque_cuenta_corriente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cheque_cuenta_corriente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cheque_cuenta_corriente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,"cheque_cuenta_corriente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_cheque","id_categoria_cheque","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParacategoria_cheque("id_categoria_cheque");
				//alert(jQuery('#form-id_categoria_cheque_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("beneficiario_ocacional_cheque","id_beneficiario_ocacional_cheque","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParabeneficiario_ocacional_cheque("id_beneficiario_ocacional_cheque");
				//alert(jQuery('#form-id_beneficiario_ocacional_cheque_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_deposito_retiro","id_estado_deposito_retiro","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaestado_deposito_retiro("id_estado_deposito_retiro");
				//alert(jQuery('#form-id_estado_deposito_retiro_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cheque_cuenta_corriente_control) {
		
		
		
		if(cheque_cuenta_corriente_control.strPermisoActualizar!=null) {
			jQuery("#tdcheque_cuenta_corrienteActualizarToolBar").css("display",cheque_cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcheque_cuenta_corrienteEliminarToolBar").css("display",cheque_cuenta_corriente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcheque_cuenta_corrienteElementos").css("display",cheque_cuenta_corriente_control.strVisibleTablaElementos);
		
		jQuery("#trcheque_cuenta_corrienteAcciones").css("display",cheque_cuenta_corriente_control.strVisibleTablaAcciones);
		jQuery("#trcheque_cuenta_corrienteParametrosAcciones").css("display",cheque_cuenta_corriente_control.strVisibleTablaAcciones);
		
		jQuery("#tdcheque_cuenta_corrienteCerrarPagina").css("display",cheque_cuenta_corriente_control.strPermisoPopup);		
		jQuery("#tdcheque_cuenta_corrienteCerrarPaginaToolBar").css("display",cheque_cuenta_corriente_control.strPermisoPopup);
		//jQuery("#trcheque_cuenta_corrienteAccionesRelaciones").css("display",cheque_cuenta_corriente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cheque_cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cheque_cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cheque_cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cheques";
		sTituloBanner+=" - " + cheque_cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cheque_cuenta_corriente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcheque_cuenta_corrienteRelacionesToolBar").css("display",cheque_cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscheque_cuenta_corriente").css("display",cheque_cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cheque_cuenta_corriente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cheque_cuenta_corriente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cheque_cuenta_corriente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cheque_cuenta_corriente_webcontrol1.registrarEventosControles();
		
		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			cheque_cuenta_corriente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONES=="true") {
			if(cheque_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				cheque_cuenta_corriente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cheque_cuenta_corriente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cheque_cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cheque_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cheque_cuenta_corriente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
						//cheque_cuenta_corriente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cheque_cuenta_corriente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cheque_cuenta_corriente_constante1.BIG_ID_ACTUAL,"cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
						//cheque_cuenta_corriente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cheque_cuenta_corriente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);	
	}
}

var cheque_cuenta_corriente_webcontrol1 = new cheque_cuenta_corriente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cheque_cuenta_corriente_webcontrol,cheque_cuenta_corriente_webcontrol1};

//Para ser llamado desde window.opener
window.cheque_cuenta_corriente_webcontrol1 = cheque_cuenta_corriente_webcontrol1;


if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cheque_cuenta_corriente_webcontrol1.onLoadWindow; 
}

//</script>