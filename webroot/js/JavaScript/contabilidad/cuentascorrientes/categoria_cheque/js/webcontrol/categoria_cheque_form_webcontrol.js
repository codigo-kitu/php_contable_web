//<script type="text/javascript" language="javascript">



//var categoria_chequeJQueryPaginaWebInteraccion= function (categoria_cheque_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {categoria_cheque_constante,categoria_cheque_constante1} from '../util/categoria_cheque_constante.js';

import {categoria_cheque_funcion,categoria_cheque_funcion1} from '../util/categoria_cheque_form_funcion.js';


class categoria_cheque_webcontrol extends GeneralEntityWebControl {
	
	categoria_cheque_control=null;
	categoria_cheque_controlInicial=null;
	categoria_cheque_controlAuxiliar=null;
		
	//if(categoria_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(categoria_cheque_control) {
		super();
		
		this.categoria_cheque_control=categoria_cheque_control;
	}
		
	actualizarVariablesPagina(categoria_cheque_control) {
		
		if(categoria_cheque_control.action=="index" || categoria_cheque_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(categoria_cheque_control);
			
		} 
		
		
		
	
		else if(categoria_cheque_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(categoria_cheque_control);	
		
		} else if(categoria_cheque_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_cheque_control);		
		}
	
		else if(categoria_cheque_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_cheque_control);		
		}
	
		else if(categoria_cheque_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_cheque_control);
		}
		
		
		else if(categoria_cheque_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_cheque_control);
		
		} else if(categoria_cheque_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(categoria_cheque_control);		
		
		} else if(categoria_cheque_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_cheque_control);		
		
		} 
		//else if(categoria_cheque_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(categoria_cheque_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + categoria_cheque_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(categoria_cheque_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(categoria_cheque_control) {
		this.actualizarPaginaAccionesGenerales(categoria_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(categoria_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_cheque_control);
		this.actualizarPaginaOrderBy(categoria_cheque_control);
		this.actualizarPaginaTablaDatos(categoria_cheque_control);
		this.actualizarPaginaCargaGeneralControles(categoria_cheque_control);
		//this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_cheque_control);
		this.actualizarPaginaAreaBusquedas(categoria_cheque_control);
		this.actualizarPaginaCargaCombosFK(categoria_cheque_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(categoria_cheque_control) {
		//this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_cheque_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_cheque_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_cheque_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(categoria_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(categoria_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(categoria_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_cheque_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_cheque_control);
		this.actualizarPaginaCargaCombosFK(categoria_cheque_control);
		this.actualizarPaginaFormulario(categoria_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(categoria_cheque_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_cheque_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_cheque_control);
		this.actualizarPaginaCargaCombosFK(categoria_cheque_control);
		this.actualizarPaginaFormulario(categoria_cheque_control);
		this.onLoadCombosDefectoFK(categoria_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cheque_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_cheque_control) {
		//FORMULARIO
		if(categoria_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_cheque_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(categoria_cheque_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);		
		
		//COMBOS FK
		if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_cheque_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(categoria_cheque_control) {
		//FORMULARIO
		if(categoria_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_cheque_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(categoria_cheque_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);	
		
		//COMBOS FK
		if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_cheque_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(categoria_cheque_control) {
		//FORMULARIO
		if(categoria_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_cheque_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control);	
		//COMBOS FK
		if(categoria_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_cheque_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(categoria_cheque_control) {
		
		if(categoria_cheque_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(categoria_cheque_control);
		}
		
		if(categoria_cheque_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(categoria_cheque_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(categoria_cheque_control) {
		if(categoria_cheque_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("categoria_chequeReturnGeneral",JSON.stringify(categoria_cheque_control.categoria_chequeReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(categoria_cheque_control) {
		if(categoria_cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_cheque_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(categoria_cheque_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(categoria_cheque_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(categoria_cheque_control, mostrar) {
		
		if(mostrar==true) {
			categoria_cheque_funcion1.resaltarRestaurarDivsPagina(false,"categoria_cheque");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				categoria_cheque_funcion1.resaltarRestaurarDivMantenimiento(false,"categoria_cheque");
			}			
			
			categoria_cheque_funcion1.mostrarDivMensaje(true,categoria_cheque_control.strAuxiliarMensaje,categoria_cheque_control.strAuxiliarCssMensaje);
		
		} else {
			categoria_cheque_funcion1.mostrarDivMensaje(false,categoria_cheque_control.strAuxiliarMensaje,categoria_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(categoria_cheque_control) {
		if(categoria_cheque_funcion1.esPaginaForm(categoria_cheque_constante1)==true) {
			window.opener.categoria_cheque_webcontrol1.actualizarPaginaTablaDatos(categoria_cheque_control);
		} else {
			this.actualizarPaginaTablaDatos(categoria_cheque_control);
		}
	}
	
	actualizarPaginaAbrirLink(categoria_cheque_control) {
		categoria_cheque_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(categoria_cheque_control.strAuxiliarUrlPagina);
				
		categoria_cheque_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(categoria_cheque_control.strAuxiliarTipo,categoria_cheque_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(categoria_cheque_control) {
		categoria_cheque_funcion1.resaltarRestaurarDivMensaje(true,categoria_cheque_control.strAuxiliarMensajeAlert,categoria_cheque_control.strAuxiliarCssMensaje);
			
		if(categoria_cheque_funcion1.esPaginaForm(categoria_cheque_constante1)==true) {
			window.opener.categoria_cheque_funcion1.resaltarRestaurarDivMensaje(true,categoria_cheque_control.strAuxiliarMensajeAlert,categoria_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(categoria_cheque_control) {
		this.categoria_cheque_controlInicial=categoria_cheque_control;
			
		if(categoria_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(categoria_cheque_control.strStyleDivArbol,categoria_cheque_control.strStyleDivContent
																,categoria_cheque_control.strStyleDivOpcionesBanner,categoria_cheque_control.strStyleDivExpandirColapsar
																,categoria_cheque_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(categoria_cheque_control) {
		this.actualizarCssBotonesPagina(categoria_cheque_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(categoria_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(categoria_cheque_control.tiposReportes,categoria_cheque_control.tiposReporte
															 	,categoria_cheque_control.tiposPaginacion,categoria_cheque_control.tiposAcciones
																,categoria_cheque_control.tiposColumnasSelect,categoria_cheque_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(categoria_cheque_control.tiposRelaciones,categoria_cheque_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(categoria_cheque_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(categoria_cheque_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(categoria_cheque_control);			
	}
	
	actualizarPaginaUsuarioInvitado(categoria_cheque_control) {
	
		var indexPosition=categoria_cheque_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=categoria_cheque_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(categoria_cheque_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(categoria_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",categoria_cheque_control.strRecargarFkTipos,",")) { 
				categoria_cheque_webcontrol1.cargarCombosempresasFK(categoria_cheque_control);
			}

			if(categoria_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",categoria_cheque_control.strRecargarFkTipos,",")) { 
				categoria_cheque_webcontrol1.cargarComboscuentasFK(categoria_cheque_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(categoria_cheque_control.strRecargarFkTiposNinguno!=null && categoria_cheque_control.strRecargarFkTiposNinguno!='NINGUNO' && categoria_cheque_control.strRecargarFkTiposNinguno!='') {
			
				if(categoria_cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",categoria_cheque_control.strRecargarFkTiposNinguno,",")) { 
					categoria_cheque_webcontrol1.cargarCombosempresasFK(categoria_cheque_control);
				}

				if(categoria_cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",categoria_cheque_control.strRecargarFkTiposNinguno,",")) { 
					categoria_cheque_webcontrol1.cargarComboscuentasFK(categoria_cheque_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(categoria_cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,categoria_cheque_funcion1,categoria_cheque_control.empresasFK);
	}

	cargarComboEditarTablacuentaFK(categoria_cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,categoria_cheque_funcion1,categoria_cheque_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(categoria_cheque_control) {
		jQuery("#tdcategoria_chequeNuevo").css("display",categoria_cheque_control.strPermisoNuevo);
		jQuery("#trcategoria_chequeElementos").css("display",categoria_cheque_control.strVisibleTablaElementos);
		jQuery("#trcategoria_chequeAcciones").css("display",categoria_cheque_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_chequeParametrosAcciones").css("display",categoria_cheque_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(categoria_cheque_control) {
	
		this.actualizarCssBotonesMantenimiento(categoria_cheque_control);
				
		if(categoria_cheque_control.categoria_chequeActual!=null) {//form
			
			this.actualizarCamposFormulario(categoria_cheque_control);			
		}
						
		this.actualizarSpanMensajesCampos(categoria_cheque_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(categoria_cheque_control) {
	
		jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id").val(categoria_cheque_control.categoria_chequeActual.id);
		jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-created_at").val(categoria_cheque_control.categoria_chequeActual.versionRow);
		jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-updated_at").val(categoria_cheque_control.categoria_chequeActual.versionRow);
		
		if(categoria_cheque_control.categoria_chequeActual.id_empresa!=null && categoria_cheque_control.categoria_chequeActual.id_empresa>-1){
			if(jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").val() != categoria_cheque_control.categoria_chequeActual.id_empresa) {
				jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").val(categoria_cheque_control.categoria_chequeActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(categoria_cheque_control.categoria_chequeActual.id_cuenta!=null && categoria_cheque_control.categoria_chequeActual.id_cuenta>-1){
			if(jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta").val() != categoria_cheque_control.categoria_chequeActual.id_cuenta) {
				jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta").val(categoria_cheque_control.categoria_chequeActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-nombre").val(categoria_cheque_control.categoria_chequeActual.nombre);
		jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-cuenta_contable").val(categoria_cheque_control.categoria_chequeActual.cuenta_contable);
		jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-predeterminado").prop('checked',categoria_cheque_control.categoria_chequeActual.predeterminado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+categoria_cheque_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("categoria_cheque","cuentascorrientes","","form_categoria_cheque",formulario,"","",paraEventoTabla,idFilaTabla,categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
	}
	
	actualizarSpanMensajesCampos(categoria_cheque_control) {
		jQuery("#spanstrMensajeid").text(categoria_cheque_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(categoria_cheque_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(categoria_cheque_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(categoria_cheque_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_cuenta").text(categoria_cheque_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajenombre").text(categoria_cheque_control.strMensajenombre);		
		jQuery("#spanstrMensajecuenta_contable").text(categoria_cheque_control.strMensajecuenta_contable);		
		jQuery("#spanstrMensajepredeterminado").text(categoria_cheque_control.strMensajepredeterminado);		
	}
	
	actualizarCssBotonesMantenimiento(categoria_cheque_control) {
		jQuery("#tdbtnNuevocategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocategoria_cheque").css("display",categoria_cheque_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcategoria_cheque").css("display",categoria_cheque_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcategoria_cheque").css("display",categoria_cheque_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscategoria_cheque").css("display",categoria_cheque_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcategoria_cheque").css("visibility",categoria_cheque_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(categoria_cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa",categoria_cheque_control.empresasFK);

		if(categoria_cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+categoria_cheque_control.idFilaTablaActual+"_3",categoria_cheque_control.empresasFK);
		}
	};

	cargarComboscuentasFK(categoria_cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta",categoria_cheque_control.cuentasFK);

		if(categoria_cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+categoria_cheque_control.idFilaTablaActual+"_4",categoria_cheque_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+categoria_cheque_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",categoria_cheque_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(categoria_cheque_control) {

	};

	registrarComboActionChangeComboscuentasFK(categoria_cheque_control) {

	};

	
	
	setDefectoValorCombosempresasFK(categoria_cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(categoria_cheque_control.idempresaDefaultFK>-1 && jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").val() != categoria_cheque_control.idempresaDefaultFK) {
				jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa").val(categoria_cheque_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(categoria_cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(categoria_cheque_control.idcuentaDefaultFK>-1 && jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta").val() != categoria_cheque_control.idcuentaDefaultFK) {
				jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta").val(categoria_cheque_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+categoria_cheque_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(categoria_cheque_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+categoria_cheque_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+categoria_cheque_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//categoria_cheque_control
		
	
	}
	
	onLoadCombosDefectoFK(categoria_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(categoria_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",categoria_cheque_control.strRecargarFkTipos,",")) { 
				categoria_cheque_webcontrol1.setDefectoValorCombosempresasFK(categoria_cheque_control);
			}

			if(categoria_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",categoria_cheque_control.strRecargarFkTipos,",")) { 
				categoria_cheque_webcontrol1.setDefectoValorComboscuentasFK(categoria_cheque_control);
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
	onLoadCombosEventosFK(categoria_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(categoria_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",categoria_cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				categoria_cheque_webcontrol1.registrarComboActionChangeCombosempresasFK(categoria_cheque_control);
			//}

			//if(categoria_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",categoria_cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				categoria_cheque_webcontrol1.registrarComboActionChangeComboscuentasFK(categoria_cheque_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(categoria_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(categoria_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(categoria_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_cheque_funcion1.validarFormularioJQuery(categoria_cheque_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("categoria_cheque");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("categoria_cheque");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(categoria_cheque_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,"categoria_cheque");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				categoria_cheque_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+categoria_cheque_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				categoria_cheque_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("categoria_cheque");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(categoria_cheque_control) {
		
		
		
		if(categoria_cheque_control.strPermisoActualizar!=null) {
			jQuery("#tdcategoria_chequeActualizarToolBar").css("display",categoria_cheque_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcategoria_chequeEliminarToolBar").css("display",categoria_cheque_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcategoria_chequeElementos").css("display",categoria_cheque_control.strVisibleTablaElementos);
		
		jQuery("#trcategoria_chequeAcciones").css("display",categoria_cheque_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_chequeParametrosAcciones").css("display",categoria_cheque_control.strVisibleTablaAcciones);
		
		jQuery("#tdcategoria_chequeCerrarPagina").css("display",categoria_cheque_control.strPermisoPopup);		
		jQuery("#tdcategoria_chequeCerrarPaginaToolBar").css("display",categoria_cheque_control.strPermisoPopup);
		//jQuery("#trcategoria_chequeAccionesRelaciones").css("display",categoria_cheque_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=categoria_cheque_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + categoria_cheque_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + categoria_cheque_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Categoria Cheques";
		sTituloBanner+=" - " + categoria_cheque_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + categoria_cheque_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcategoria_chequeRelacionesToolBar").css("display",categoria_cheque_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscategoria_cheque").css("display",categoria_cheque_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		categoria_cheque_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		categoria_cheque_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		categoria_cheque_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		categoria_cheque_webcontrol1.registrarEventosControles();
		
		if(categoria_cheque_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(categoria_cheque_constante1.STR_ES_RELACIONADO=="false") {
			categoria_cheque_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(categoria_cheque_constante1.STR_ES_RELACIONES=="true") {
			if(categoria_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_cheque_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(categoria_cheque_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(categoria_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(categoria_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(categoria_cheque_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
						//categoria_cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(categoria_cheque_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(categoria_cheque_constante1.BIG_ID_ACTUAL,"categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);
						//categoria_cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			categoria_cheque_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("categoria_cheque","cuentascorrientes","",categoria_cheque_funcion1,categoria_cheque_webcontrol1,categoria_cheque_constante1);	
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

var categoria_cheque_webcontrol1 = new categoria_cheque_webcontrol();

//Para ser llamado desde otro archivo (import)
export {categoria_cheque_webcontrol,categoria_cheque_webcontrol1};

//Para ser llamado desde window.opener
window.categoria_cheque_webcontrol1 = categoria_cheque_webcontrol1;


if(categoria_cheque_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = categoria_cheque_webcontrol1.onLoadWindow; 
}

//</script>