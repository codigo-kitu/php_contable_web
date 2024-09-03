//<script type="text/javascript" language="javascript">



//var dato_general_usuarioJQueryPaginaWebInteraccion= function (dato_general_usuario_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {dato_general_usuario_constante,dato_general_usuario_constante1} from '../util/dato_general_usuario_constante.js';

import {dato_general_usuario_funcion,dato_general_usuario_funcion1} from '../util/dato_general_usuario_form_funcion.js';


class dato_general_usuario_webcontrol extends GeneralEntityWebControl {
	
	dato_general_usuario_control=null;
	dato_general_usuario_controlInicial=null;
	dato_general_usuario_controlAuxiliar=null;
		
	//if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(dato_general_usuario_control) {
		super();
		
		this.dato_general_usuario_control=dato_general_usuario_control;
	}
		
	actualizarVariablesPagina(dato_general_usuario_control) {
		
		if(dato_general_usuario_control.action=="index" || dato_general_usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(dato_general_usuario_control);
			
		} 
		
		
		
	
		else if(dato_general_usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(dato_general_usuario_control);	
		
		} else if(dato_general_usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(dato_general_usuario_control);		
		}
	
	
		
		
		else if(dato_general_usuario_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(dato_general_usuario_control);		
		
		} else if(dato_general_usuario_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(dato_general_usuario_control);		
		
		} 
		//else if(dato_general_usuario_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(dato_general_usuario_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + dato_general_usuario_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(dato_general_usuario_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(dato_general_usuario_control) {
		this.actualizarPaginaAccionesGenerales(dato_general_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(dato_general_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(dato_general_usuario_control);
		this.actualizarPaginaOrderBy(dato_general_usuario_control);
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		this.actualizarPaginaCargaGeneralControles(dato_general_usuario_control);
		//this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(dato_general_usuario_control);
		this.actualizarPaginaAreaBusquedas(dato_general_usuario_control);
		this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(dato_general_usuario_control) {
		//this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(dato_general_usuario_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(dato_general_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(dato_general_usuario_control);
		this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(dato_general_usuario_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(dato_general_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(dato_general_usuario_control);
		this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);
		this.actualizarPaginaFormulario(dato_general_usuario_control);
		this.onLoadCombosDefectoFK(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(dato_general_usuario_control) {
		//FORMULARIO
		if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(dato_general_usuario_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(dato_general_usuario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		
		//COMBOS FK
		if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(dato_general_usuario_control) {
		//FORMULARIO
		if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(dato_general_usuario_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(dato_general_usuario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);	
		
		//COMBOS FK
		if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(dato_general_usuario_control) {
		//FORMULARIO
		if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(dato_general_usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);	
		//COMBOS FK
		if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(dato_general_usuario_control) {
		
		if(dato_general_usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(dato_general_usuario_control);
		}
		
		if(dato_general_usuario_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(dato_general_usuario_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(dato_general_usuario_control) {
		if(dato_general_usuario_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("dato_general_usuarioReturnGeneral",JSON.stringify(dato_general_usuario_control.dato_general_usuarioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control) {
		if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && dato_general_usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(dato_general_usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(dato_general_usuario_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(dato_general_usuario_control, mostrar) {
		
		if(mostrar==true) {
			dato_general_usuario_funcion1.resaltarRestaurarDivsPagina(false,"dato_general_usuario");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				dato_general_usuario_funcion1.resaltarRestaurarDivMantenimiento(false,"dato_general_usuario");
			}			
			
			dato_general_usuario_funcion1.mostrarDivMensaje(true,dato_general_usuario_control.strAuxiliarMensaje,dato_general_usuario_control.strAuxiliarCssMensaje);
		
		} else {
			dato_general_usuario_funcion1.mostrarDivMensaje(false,dato_general_usuario_control.strAuxiliarMensaje,dato_general_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(dato_general_usuario_control) {
		if(dato_general_usuario_funcion1.esPaginaForm(dato_general_usuario_constante1)==true) {
			window.opener.dato_general_usuario_webcontrol1.actualizarPaginaTablaDatos(dato_general_usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(dato_general_usuario_control) {
		dato_general_usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(dato_general_usuario_control.strAuxiliarUrlPagina);
				
		dato_general_usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(dato_general_usuario_control.strAuxiliarTipo,dato_general_usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(dato_general_usuario_control) {
		dato_general_usuario_funcion1.resaltarRestaurarDivMensaje(true,dato_general_usuario_control.strAuxiliarMensajeAlert,dato_general_usuario_control.strAuxiliarCssMensaje);
			
		if(dato_general_usuario_funcion1.esPaginaForm(dato_general_usuario_constante1)==true) {
			window.opener.dato_general_usuario_funcion1.resaltarRestaurarDivMensaje(true,dato_general_usuario_control.strAuxiliarMensajeAlert,dato_general_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(dato_general_usuario_control) {
		this.dato_general_usuario_controlInicial=dato_general_usuario_control;
			
		if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(dato_general_usuario_control.strStyleDivArbol,dato_general_usuario_control.strStyleDivContent
																,dato_general_usuario_control.strStyleDivOpcionesBanner,dato_general_usuario_control.strStyleDivExpandirColapsar
																,dato_general_usuario_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(dato_general_usuario_control) {
		this.actualizarCssBotonesPagina(dato_general_usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(dato_general_usuario_control.tiposReportes,dato_general_usuario_control.tiposReporte
															 	,dato_general_usuario_control.tiposPaginacion,dato_general_usuario_control.tiposAcciones
																,dato_general_usuario_control.tiposColumnasSelect,dato_general_usuario_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(dato_general_usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(dato_general_usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(dato_general_usuario_control);			
	}
	
	actualizarPaginaUsuarioInvitado(dato_general_usuario_control) {
	
		var indexPosition=dato_general_usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=dato_general_usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(dato_general_usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.cargarCombosusuariosFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.cargarCombospaissFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.cargarCombosprovinciasFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.cargarCombosciudadsFK(dato_general_usuario_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(dato_general_usuario_control.strRecargarFkTiposNinguno!=null && dato_general_usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && dato_general_usuario_control.strRecargarFkTiposNinguno!='') {
			
				if(dato_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id",dato_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					dato_general_usuario_webcontrol1.cargarCombosusuariosFK(dato_general_usuario_control);
				}

				if(dato_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",dato_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					dato_general_usuario_webcontrol1.cargarCombospaissFK(dato_general_usuario_control);
				}

				if(dato_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_provincia",dato_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					dato_general_usuario_webcontrol1.cargarCombosprovinciasFK(dato_general_usuario_control);
				}

				if(dato_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",dato_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					dato_general_usuario_webcontrol1.cargarCombosciudadsFK(dato_general_usuario_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablausuarioFK(dato_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,dato_general_usuario_funcion1,dato_general_usuario_control.usuariosFK);
	}

	cargarComboEditarTablapaisFK(dato_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,dato_general_usuario_funcion1,dato_general_usuario_control.paissFK);
	}

	cargarComboEditarTablaprovinciaFK(dato_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,dato_general_usuario_funcion1,dato_general_usuario_control.provinciasFK);
	}

	cargarComboEditarTablaciudadFK(dato_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,dato_general_usuario_funcion1,dato_general_usuario_control.ciudadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(dato_general_usuario_control) {
		jQuery("#tddato_general_usuarioNuevo").css("display",dato_general_usuario_control.strPermisoNuevo);
		jQuery("#trdato_general_usuarioElementos").css("display",dato_general_usuario_control.strVisibleTablaElementos);
		jQuery("#trdato_general_usuarioAcciones").css("display",dato_general_usuario_control.strVisibleTablaAcciones);
		jQuery("#trdato_general_usuarioParametrosAcciones").css("display",dato_general_usuario_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(dato_general_usuario_control) {
	
		this.actualizarCssBotonesMantenimiento(dato_general_usuario_control);
				
		if(dato_general_usuario_control.dato_general_usuarioActual!=null) {//form
			
			this.actualizarCamposFormulario(dato_general_usuario_control);			
		}
						
		this.actualizarSpanMensajesCampos(dato_general_usuario_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(dato_general_usuario_control) {
	
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id").val(dato_general_usuario_control.dato_general_usuarioActual.id);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-version_row").val(dato_general_usuario_control.dato_general_usuarioActual.versionRow);
		
		if(dato_general_usuario_control.dato_general_usuarioActual.id_pais!=null && dato_general_usuario_control.dato_general_usuarioActual.id_pais>-1){
			if(jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val() != dato_general_usuario_control.dato_general_usuarioActual.id_pais) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val(dato_general_usuario_control.dato_general_usuarioActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(dato_general_usuario_control.dato_general_usuarioActual.id_provincia!=null && dato_general_usuario_control.dato_general_usuarioActual.id_provincia>-1){
			if(jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val() != dato_general_usuario_control.dato_general_usuarioActual.id_provincia) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val(dato_general_usuario_control.dato_general_usuarioActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").select2("val", null);
			if(jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(dato_general_usuario_control.dato_general_usuarioActual.id_ciudad!=null && dato_general_usuario_control.dato_general_usuarioActual.id_ciudad>-1){
			if(jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val() != dato_general_usuario_control.dato_general_usuarioActual.id_ciudad) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val(dato_general_usuario_control.dato_general_usuarioActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").select2("val", null);
			if(jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-cedula").val(dato_general_usuario_control.dato_general_usuarioActual.cedula);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-apellidos").val(dato_general_usuario_control.dato_general_usuarioActual.apellidos);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-nombres").val(dato_general_usuario_control.dato_general_usuarioActual.nombres);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-telefono").val(dato_general_usuario_control.dato_general_usuarioActual.telefono);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-telefono_movil").val(dato_general_usuario_control.dato_general_usuarioActual.telefono_movil);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-e_mail").val(dato_general_usuario_control.dato_general_usuarioActual.e_mail);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-url").val(dato_general_usuario_control.dato_general_usuarioActual.url);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-fecha_nacimiento").val(dato_general_usuario_control.dato_general_usuarioActual.fecha_nacimiento);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-direccion").val(dato_general_usuario_control.dato_general_usuarioActual.direccion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+dato_general_usuario_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("dato_general_usuario","seguridad","","form_dato_general_usuario",formulario,"","",paraEventoTabla,idFilaTabla,dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}
	
	actualizarSpanMensajesCampos(dato_general_usuario_control) {
		jQuery("#spanstrMensajeid").text(dato_general_usuario_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(dato_general_usuario_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_pais").text(dato_general_usuario_control.strMensajeid_pais);		
		jQuery("#spanstrMensajeid_provincia").text(dato_general_usuario_control.strMensajeid_provincia);		
		jQuery("#spanstrMensajeid_ciudad").text(dato_general_usuario_control.strMensajeid_ciudad);		
		jQuery("#spanstrMensajecedula").text(dato_general_usuario_control.strMensajecedula);		
		jQuery("#spanstrMensajeapellidos").text(dato_general_usuario_control.strMensajeapellidos);		
		jQuery("#spanstrMensajenombres").text(dato_general_usuario_control.strMensajenombres);		
		jQuery("#spanstrMensajetelefono").text(dato_general_usuario_control.strMensajetelefono);		
		jQuery("#spanstrMensajetelefono_movil").text(dato_general_usuario_control.strMensajetelefono_movil);		
		jQuery("#spanstrMensajee_mail").text(dato_general_usuario_control.strMensajee_mail);		
		jQuery("#spanstrMensajeurl").text(dato_general_usuario_control.strMensajeurl);		
		jQuery("#spanstrMensajefecha_nacimiento").text(dato_general_usuario_control.strMensajefecha_nacimiento);		
		jQuery("#spanstrMensajedireccion").text(dato_general_usuario_control.strMensajedireccion);		
	}
	
	actualizarCssBotonesMantenimiento(dato_general_usuario_control) {
		jQuery("#tdbtnNuevodato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodato_general_usuario").css("display",dato_general_usuario_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardato_general_usuario").css("display",dato_general_usuario_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardato_general_usuario").css("display",dato_general_usuario_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdato_general_usuario").css("display",dato_general_usuario_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosusuariosFK(dato_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id",dato_general_usuario_control.usuariosFK);

		if(dato_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+dato_general_usuario_control.idFilaTablaActual+"_0",dato_general_usuario_control.usuariosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid",dato_general_usuario_control.usuariosFK);

	};

	cargarCombospaissFK(dato_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais",dato_general_usuario_control.paissFK);

		if(dato_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+dato_general_usuario_control.idFilaTablaActual+"_2",dato_general_usuario_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",dato_general_usuario_control.paissFK);

	};

	cargarCombosprovinciasFK(dato_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia",dato_general_usuario_control.provinciasFK);

		if(dato_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+dato_general_usuario_control.idFilaTablaActual+"_3",dato_general_usuario_control.provinciasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia",dato_general_usuario_control.provinciasFK);

	};

	cargarCombosciudadsFK(dato_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad",dato_general_usuario_control.ciudadsFK);

		if(dato_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+dato_general_usuario_control.idFilaTablaActual+"_4",dato_general_usuario_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",dato_general_usuario_control.ciudadsFK);

	};

	
	
	registrarComboActionChangeCombosusuariosFK(dato_general_usuario_control) {

	};

	registrarComboActionChangeCombospaissFK(dato_general_usuario_control) {

	};

	registrarComboActionChangeCombosprovinciasFK(dato_general_usuario_control) {

	};

	registrarComboActionChangeCombosciudadsFK(dato_general_usuario_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(dato_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(dato_general_usuario_control.idusuarioDefaultFK>-1 && jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id").val() != dato_general_usuario_control.idusuarioDefaultFK) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id").val(dato_general_usuario_control.idusuarioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid").val(dato_general_usuario_control.idusuarioDefaultForeignKey).trigger("change");
			if(jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(dato_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(dato_general_usuario_control.idpaisDefaultFK>-1 && jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val() != dato_general_usuario_control.idpaisDefaultFK) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val(dato_general_usuario_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(dato_general_usuario_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosprovinciasFK(dato_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(dato_general_usuario_control.idprovinciaDefaultFK>-1 && jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val() != dato_general_usuario_control.idprovinciaDefaultFK) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val(dato_general_usuario_control.idprovinciaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(dato_general_usuario_control.idprovinciaDefaultForeignKey).trigger("change");
			if(jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(dato_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(dato_general_usuario_control.idciudadDefaultFK>-1 && jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val() != dato_general_usuario_control.idciudadDefaultFK) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val(dato_general_usuario_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(dato_general_usuario_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//dato_general_usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(dato_general_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(dato_general_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.setDefectoValorCombosusuariosFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.setDefectoValorCombospaissFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.setDefectoValorCombosprovinciasFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.setDefectoValorCombosciudadsFK(dato_general_usuario_control);
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
	onLoadCombosEventosFK(dato_general_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(dato_general_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id",dato_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				dato_general_usuario_webcontrol1.registrarComboActionChangeCombosusuariosFK(dato_general_usuario_control);
			//}

			//if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",dato_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				dato_general_usuario_webcontrol1.registrarComboActionChangeCombospaissFK(dato_general_usuario_control);
			//}

			//if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",dato_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				dato_general_usuario_webcontrol1.registrarComboActionChangeCombosprovinciasFK(dato_general_usuario_control);
			//}

			//if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",dato_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				dato_general_usuario_webcontrol1.registrarComboActionChangeCombosciudadsFK(dato_general_usuario_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(dato_general_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(dato_general_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(dato_general_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				dato_general_usuario_funcion1.validarFormularioJQuery(dato_general_usuario_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("dato_general_usuario");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("dato_general_usuario");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,"dato_general_usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_img_busqueda").click(function(){
				dato_general_usuario_webcontrol1.abrirBusquedaParausuario("id");
				//alert(jQuery('#form-id_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				dato_general_usuario_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("provincia","id_provincia","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia_img_busqueda").click(function(){
				dato_general_usuario_webcontrol1.abrirBusquedaParaprovincia("id_provincia");
				//alert(jQuery('#form-id_provincia_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				dato_general_usuario_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(dato_general_usuario_control) {
		
		
		
		if(dato_general_usuario_control.strPermisoActualizar!=null) {
			jQuery("#tddato_general_usuarioActualizarToolBar").css("display",dato_general_usuario_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tddato_general_usuarioEliminarToolBar").css("display",dato_general_usuario_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trdato_general_usuarioElementos").css("display",dato_general_usuario_control.strVisibleTablaElementos);
		
		jQuery("#trdato_general_usuarioAcciones").css("display",dato_general_usuario_control.strVisibleTablaAcciones);
		jQuery("#trdato_general_usuarioParametrosAcciones").css("display",dato_general_usuario_control.strVisibleTablaAcciones);
		
		jQuery("#tddato_general_usuarioCerrarPagina").css("display",dato_general_usuario_control.strPermisoPopup);		
		jQuery("#tddato_general_usuarioCerrarPaginaToolBar").css("display",dato_general_usuario_control.strPermisoPopup);
		//jQuery("#trdato_general_usuarioAccionesRelaciones").css("display",dato_general_usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=dato_general_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + dato_general_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + dato_general_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Dato General Usuarios";
		sTituloBanner+=" - " + dato_general_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + dato_general_usuario_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddato_general_usuarioRelacionesToolBar").css("display",dato_general_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdato_general_usuario").css("display",dato_general_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		dato_general_usuario_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		dato_general_usuario_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		dato_general_usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		dato_general_usuario_webcontrol1.registrarEventosControles();
		
		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
			dato_general_usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(dato_general_usuario_constante1.STR_ES_RELACIONES=="true") {
			if(dato_general_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				dato_general_usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(dato_general_usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(dato_general_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(dato_general_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(dato_general_usuario_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
						//dato_general_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(dato_general_usuario_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(dato_general_usuario_constante1.BIG_ID_ACTUAL,"dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
						//dato_general_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			dato_general_usuario_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);	
	}
}

var dato_general_usuario_webcontrol1 = new dato_general_usuario_webcontrol();

//Para ser llamado desde otro archivo (import)
export {dato_general_usuario_webcontrol,dato_general_usuario_webcontrol1};

//Para ser llamado desde window.opener
window.dato_general_usuario_webcontrol1 = dato_general_usuario_webcontrol1;


if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = dato_general_usuario_webcontrol1.onLoadWindow; 
}

//</script>