//<script type="text/javascript" language="javascript">



//var beneficiario_ocacional_chequeJQueryPaginaWebInteraccion= function (beneficiario_ocacional_cheque_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {beneficiario_ocacional_cheque_constante,beneficiario_ocacional_cheque_constante1} from '../util/beneficiario_ocacional_cheque_constante.js';

import {beneficiario_ocacional_cheque_funcion,beneficiario_ocacional_cheque_funcion1} from '../util/beneficiario_ocacional_cheque_form_funcion.js';


class beneficiario_ocacional_cheque_webcontrol extends GeneralEntityWebControl {
	
	beneficiario_ocacional_cheque_control=null;
	beneficiario_ocacional_cheque_controlInicial=null;
	beneficiario_ocacional_cheque_controlAuxiliar=null;
		
	//if(beneficiario_ocacional_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(beneficiario_ocacional_cheque_control) {
		super();
		
		this.beneficiario_ocacional_cheque_control=beneficiario_ocacional_cheque_control;
	}
		
	actualizarVariablesPagina(beneficiario_ocacional_cheque_control) {
		
		if(beneficiario_ocacional_cheque_control.action=="index" || beneficiario_ocacional_cheque_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(beneficiario_ocacional_cheque_control);
			
		} 
		
		
		
	
		else if(beneficiario_ocacional_cheque_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(beneficiario_ocacional_cheque_control);	
		
		} else if(beneficiario_ocacional_cheque_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(beneficiario_ocacional_cheque_control);		
		}
	
		else if(beneficiario_ocacional_cheque_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(beneficiario_ocacional_cheque_control);		
		}
	
		else if(beneficiario_ocacional_cheque_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(beneficiario_ocacional_cheque_control);
		}
		
		
		else if(beneficiario_ocacional_cheque_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(beneficiario_ocacional_cheque_control);		
		
		} else if(beneficiario_ocacional_cheque_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(beneficiario_ocacional_cheque_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + beneficiario_ocacional_cheque_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(beneficiario_ocacional_cheque_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaAccionesGenerales(beneficiario_ocacional_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(beneficiario_ocacional_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaOrderBy(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control);
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaAreaBusquedas(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(beneficiario_ocacional_cheque_control) {
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(beneficiario_ocacional_cheque_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(beneficiario_ocacional_cheque_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(beneficiario_ocacional_cheque_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		this.onLoadCombosDefectoFK(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(beneficiario_ocacional_cheque_control) {
		//FORMULARIO
		if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(beneficiario_ocacional_cheque_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		
		//COMBOS FK
		if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(beneficiario_ocacional_cheque_control) {
		//FORMULARIO
		if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);	
		//COMBOS FK
		if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(beneficiario_ocacional_cheque_control) {
		
		if(beneficiario_ocacional_cheque_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(beneficiario_ocacional_cheque_control);
		}
		
		if(beneficiario_ocacional_cheque_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(beneficiario_ocacional_cheque_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(beneficiario_ocacional_cheque_control) {
		if(beneficiario_ocacional_cheque_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("beneficiario_ocacional_chequeReturnGeneral",JSON.stringify(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control) {
		if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && beneficiario_ocacional_cheque_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(beneficiario_ocacional_cheque_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(beneficiario_ocacional_cheque_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(beneficiario_ocacional_cheque_control, mostrar) {
		
		if(mostrar==true) {
			beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivsPagina(false,"beneficiario_ocacional_cheque");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivMantenimiento(false,"beneficiario_ocacional_cheque");
			}			
			
			beneficiario_ocacional_cheque_funcion1.mostrarDivMensaje(true,beneficiario_ocacional_cheque_control.strAuxiliarMensaje,beneficiario_ocacional_cheque_control.strAuxiliarCssMensaje);
		
		} else {
			beneficiario_ocacional_cheque_funcion1.mostrarDivMensaje(false,beneficiario_ocacional_cheque_control.strAuxiliarMensaje,beneficiario_ocacional_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(beneficiario_ocacional_cheque_control) {
		if(beneficiario_ocacional_cheque_funcion1.esPaginaForm(beneficiario_ocacional_cheque_constante1)==true) {
			window.opener.beneficiario_ocacional_cheque_webcontrol1.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		} else {
			this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		}
	}
	
	actualizarPaginaAbrirLink(beneficiario_ocacional_cheque_control) {
		beneficiario_ocacional_cheque_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(beneficiario_ocacional_cheque_control.strAuxiliarUrlPagina);
				
		beneficiario_ocacional_cheque_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(beneficiario_ocacional_cheque_control.strAuxiliarTipo,beneficiario_ocacional_cheque_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(beneficiario_ocacional_cheque_control) {
		beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivMensaje(true,beneficiario_ocacional_cheque_control.strAuxiliarMensajeAlert,beneficiario_ocacional_cheque_control.strAuxiliarCssMensaje);
			
		if(beneficiario_ocacional_cheque_funcion1.esPaginaForm(beneficiario_ocacional_cheque_constante1)==true) {
			window.opener.beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivMensaje(true,beneficiario_ocacional_cheque_control.strAuxiliarMensajeAlert,beneficiario_ocacional_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(beneficiario_ocacional_cheque_control) {
		this.beneficiario_ocacional_cheque_controlInicial=beneficiario_ocacional_cheque_control;
			
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(beneficiario_ocacional_cheque_control.strStyleDivArbol,beneficiario_ocacional_cheque_control.strStyleDivContent
																,beneficiario_ocacional_cheque_control.strStyleDivOpcionesBanner,beneficiario_ocacional_cheque_control.strStyleDivExpandirColapsar
																,beneficiario_ocacional_cheque_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control) {
		this.actualizarCssBotonesPagina(beneficiario_ocacional_cheque_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(beneficiario_ocacional_cheque_control.tiposReportes,beneficiario_ocacional_cheque_control.tiposReporte
															 	,beneficiario_ocacional_cheque_control.tiposPaginacion,beneficiario_ocacional_cheque_control.tiposAcciones
																,beneficiario_ocacional_cheque_control.tiposColumnasSelect,beneficiario_ocacional_cheque_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(beneficiario_ocacional_cheque_control.tiposRelaciones,beneficiario_ocacional_cheque_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(beneficiario_ocacional_cheque_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(beneficiario_ocacional_cheque_control);			
	}
	
	actualizarPaginaUsuarioInvitado(beneficiario_ocacional_cheque_control) {
	
		var indexPosition=beneficiario_ocacional_cheque_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=beneficiario_ocacional_cheque_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(beneficiario_ocacional_cheque_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(beneficiario_ocacional_cheque_control.strRecargarFkTiposNinguno!=null && beneficiario_ocacional_cheque_control.strRecargarFkTiposNinguno!='NINGUNO' && beneficiario_ocacional_cheque_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control) {
		jQuery("#tdbeneficiario_ocacional_chequeNuevo").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo);
		jQuery("#trbeneficiario_ocacional_chequeElementos").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaElementos);
		jQuery("#trbeneficiario_ocacional_chequeAcciones").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaAcciones);
		jQuery("#trbeneficiario_ocacional_chequeParametrosAcciones").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(beneficiario_ocacional_cheque_control) {
	
		this.actualizarCssBotonesMantenimiento(beneficiario_ocacional_cheque_control);
				
		if(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual!=null) {//form
			
			this.actualizarCamposFormulario(beneficiario_ocacional_cheque_control);			
		}
						
		this.actualizarSpanMensajesCampos(beneficiario_ocacional_cheque_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(beneficiario_ocacional_cheque_control) {
	
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-id").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.id);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-created_at").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.versionRow);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-updated_at").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.versionRow);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-codigo").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.codigo);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-nombre").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.nombre);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-direccion_1").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.direccion_1);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-direccion_2").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.direccion_2);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-direccion_3").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.direccion_3);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-telefono").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.telefono);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-telefono_movil").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.telefono_movil);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-email").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.email);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-notas").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.notas);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-registro_ocacional").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.registro_ocacional);
		jQuery("#form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO+"-registro_tributario").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.registro_tributario);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+beneficiario_ocacional_cheque_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("beneficiario_ocacional_cheque","cuentascorrientes","","form_beneficiario_ocacional_cheque",formulario,"","",paraEventoTabla,idFilaTabla,beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
	}
	
	actualizarSpanMensajesCampos(beneficiario_ocacional_cheque_control) {
		jQuery("#spanstrMensajeid").text(beneficiario_ocacional_cheque_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(beneficiario_ocacional_cheque_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(beneficiario_ocacional_cheque_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajecodigo").text(beneficiario_ocacional_cheque_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(beneficiario_ocacional_cheque_control.strMensajenombre);		
		jQuery("#spanstrMensajedireccion_1").text(beneficiario_ocacional_cheque_control.strMensajedireccion_1);		
		jQuery("#spanstrMensajedireccion_2").text(beneficiario_ocacional_cheque_control.strMensajedireccion_2);		
		jQuery("#spanstrMensajedireccion_3").text(beneficiario_ocacional_cheque_control.strMensajedireccion_3);		
		jQuery("#spanstrMensajetelefono").text(beneficiario_ocacional_cheque_control.strMensajetelefono);		
		jQuery("#spanstrMensajetelefono_movil").text(beneficiario_ocacional_cheque_control.strMensajetelefono_movil);		
		jQuery("#spanstrMensajeemail").text(beneficiario_ocacional_cheque_control.strMensajeemail);		
		jQuery("#spanstrMensajenotas").text(beneficiario_ocacional_cheque_control.strMensajenotas);		
		jQuery("#spanstrMensajeregistro_ocacional").text(beneficiario_ocacional_cheque_control.strMensajeregistro_ocacional);		
		jQuery("#spanstrMensajeregistro_tributario").text(beneficiario_ocacional_cheque_control.strMensajeregistro_tributario);		
	}
	
	actualizarCssBotonesMantenimiento(beneficiario_ocacional_cheque_control) {
		jQuery("#tdbtnNuevobeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevobeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarbeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarbeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosbeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarbeneficiario_ocacional_cheque").css("visibility",beneficiario_ocacional_cheque_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//beneficiario_ocacional_cheque_control
		
	
	}
	
	onLoadCombosDefectoFK(beneficiario_ocacional_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(beneficiario_ocacional_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			
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
	onLoadCombosEventosFK(beneficiario_ocacional_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(beneficiario_ocacional_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(beneficiario_ocacional_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(beneficiario_ocacional_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(beneficiario_ocacional_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				beneficiario_ocacional_cheque_funcion1.validarFormularioJQuery(beneficiario_ocacional_cheque_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("beneficiario_ocacional_cheque");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("beneficiario_ocacional_cheque");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,"beneficiario_ocacional_cheque");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("beneficiario_ocacional_cheque");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(beneficiario_ocacional_cheque_control) {
		
		
		
		if(beneficiario_ocacional_cheque_control.strPermisoActualizar!=null) {
			jQuery("#tdbeneficiario_ocacional_chequeActualizarToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdbeneficiario_ocacional_chequeEliminarToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trbeneficiario_ocacional_chequeElementos").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaElementos);
		
		jQuery("#trbeneficiario_ocacional_chequeAcciones").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaAcciones);
		jQuery("#trbeneficiario_ocacional_chequeParametrosAcciones").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaAcciones);
		
		jQuery("#tdbeneficiario_ocacional_chequeCerrarPagina").css("display",beneficiario_ocacional_cheque_control.strPermisoPopup);		
		jQuery("#tdbeneficiario_ocacional_chequeCerrarPaginaToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoPopup);
		//jQuery("#trbeneficiario_ocacional_chequeAccionesRelaciones").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=beneficiario_ocacional_cheque_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + beneficiario_ocacional_cheque_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + beneficiario_ocacional_cheque_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Beneficiario Ocacionales";
		sTituloBanner+=" - " + beneficiario_ocacional_cheque_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + beneficiario_ocacional_cheque_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdbeneficiario_ocacional_chequeRelacionesToolBar").css("display",beneficiario_ocacional_cheque_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosbeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		beneficiario_ocacional_cheque_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		beneficiario_ocacional_cheque_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		beneficiario_ocacional_cheque_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		beneficiario_ocacional_cheque_webcontrol1.registrarEventosControles();
		
		if(beneficiario_ocacional_cheque_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
			beneficiario_ocacional_cheque_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONES=="true") {
			if(beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				beneficiario_ocacional_cheque_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(beneficiario_ocacional_cheque_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(beneficiario_ocacional_cheque_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
						//beneficiario_ocacional_cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(beneficiario_ocacional_cheque_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(beneficiario_ocacional_cheque_constante1.BIG_ID_ACTUAL,"beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
						//beneficiario_ocacional_cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			beneficiario_ocacional_cheque_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);	
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

var beneficiario_ocacional_cheque_webcontrol1 = new beneficiario_ocacional_cheque_webcontrol();

//Para ser llamado desde otro archivo (import)
export {beneficiario_ocacional_cheque_webcontrol,beneficiario_ocacional_cheque_webcontrol1};

//Para ser llamado desde window.opener
window.beneficiario_ocacional_cheque_webcontrol1 = beneficiario_ocacional_cheque_webcontrol1;


if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = beneficiario_ocacional_cheque_webcontrol1.onLoadWindow; 
}

//</script>