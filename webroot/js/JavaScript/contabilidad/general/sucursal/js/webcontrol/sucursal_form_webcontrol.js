//<script type="text/javascript" language="javascript">



//var sucursalJQueryPaginaWebInteraccion= function (sucursal_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {sucursal_constante,sucursal_constante1} from '../util/sucursal_constante.js';

import {sucursal_funcion,sucursal_funcion1} from '../util/sucursal_form_funcion.js';


class sucursal_webcontrol extends GeneralEntityWebControl {
	
	sucursal_control=null;
	sucursal_controlInicial=null;
	sucursal_controlAuxiliar=null;
		
	//if(sucursal_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(sucursal_control) {
		super();
		
		this.sucursal_control=sucursal_control;
	}
		
	actualizarVariablesPagina(sucursal_control) {
		
		if(sucursal_control.action=="index" || sucursal_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(sucursal_control);
			
		} 
		
		
		
	
		else if(sucursal_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(sucursal_control);	
		
		} else if(sucursal_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(sucursal_control);		
		}
	
	
		
		
		else if(sucursal_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(sucursal_control);
		
		} else if(sucursal_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(sucursal_control);
		
		} else if(sucursal_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(sucursal_control);
		
		} else if(sucursal_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(sucursal_control);
		
		} else if(sucursal_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(sucursal_control);
		
		} else if(sucursal_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(sucursal_control);		
		
		} else if(sucursal_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(sucursal_control);		
		
		} 
		//else if(sucursal_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(sucursal_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + sucursal_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(sucursal_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(sucursal_control) {
		this.actualizarPaginaAccionesGenerales(sucursal_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(sucursal_control) {
		
		this.actualizarPaginaCargaGeneral(sucursal_control);
		this.actualizarPaginaOrderBy(sucursal_control);
		this.actualizarPaginaTablaDatos(sucursal_control);
		this.actualizarPaginaCargaGeneralControles(sucursal_control);
		//this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(sucursal_control);
		this.actualizarPaginaAreaBusquedas(sucursal_control);
		this.actualizarPaginaCargaCombosFK(sucursal_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(sucursal_control) {
		//this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		this.actualizarPaginaAreaMantenimiento(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(sucursal_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(sucursal_control) {
		this.actualizarPaginaTablaDatosAuxiliar(sucursal_control);		
		this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		this.actualizarPaginaAreaMantenimiento(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(sucursal_control) {
		this.actualizarPaginaTablaDatosAuxiliar(sucursal_control);		
		this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		this.actualizarPaginaAreaMantenimiento(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(sucursal_control) {
		this.actualizarPaginaTablaDatosAuxiliar(sucursal_control);		
		this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		this.actualizarPaginaAreaMantenimiento(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(sucursal_control) {
		this.actualizarPaginaCargaGeneralControles(sucursal_control);
		this.actualizarPaginaCargaCombosFK(sucursal_control);
		this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		this.actualizarPaginaAreaMantenimiento(sucursal_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(sucursal_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(sucursal_control) {
		this.actualizarPaginaCargaGeneralControles(sucursal_control);
		this.actualizarPaginaCargaCombosFK(sucursal_control);
		this.actualizarPaginaFormulario(sucursal_control);
		this.onLoadCombosDefectoFK(sucursal_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		this.actualizarPaginaAreaMantenimiento(sucursal_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(sucursal_control) {
		//FORMULARIO
		if(sucursal_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(sucursal_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(sucursal_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		
		//COMBOS FK
		if(sucursal_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(sucursal_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(sucursal_control) {
		//FORMULARIO
		if(sucursal_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(sucursal_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(sucursal_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);	
		
		//COMBOS FK
		if(sucursal_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(sucursal_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(sucursal_control) {
		//FORMULARIO
		if(sucursal_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(sucursal_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);	
		//COMBOS FK
		if(sucursal_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(sucursal_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(sucursal_control) {
		
		if(sucursal_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(sucursal_control);
		}
		
		if(sucursal_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(sucursal_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(sucursal_control) {
		if(sucursal_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("sucursalReturnGeneral",JSON.stringify(sucursal_control.sucursalReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(sucursal_control) {
		if(sucursal_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && sucursal_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(sucursal_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(sucursal_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(sucursal_control, mostrar) {
		
		if(mostrar==true) {
			sucursal_funcion1.resaltarRestaurarDivsPagina(false,"sucursal");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				sucursal_funcion1.resaltarRestaurarDivMantenimiento(false,"sucursal");
			}			
			
			sucursal_funcion1.mostrarDivMensaje(true,sucursal_control.strAuxiliarMensaje,sucursal_control.strAuxiliarCssMensaje);
		
		} else {
			sucursal_funcion1.mostrarDivMensaje(false,sucursal_control.strAuxiliarMensaje,sucursal_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(sucursal_control) {
		if(sucursal_funcion1.esPaginaForm(sucursal_constante1)==true) {
			window.opener.sucursal_webcontrol1.actualizarPaginaTablaDatos(sucursal_control);
		} else {
			this.actualizarPaginaTablaDatos(sucursal_control);
		}
	}
	
	actualizarPaginaAbrirLink(sucursal_control) {
		sucursal_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(sucursal_control.strAuxiliarUrlPagina);
				
		sucursal_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(sucursal_control.strAuxiliarTipo,sucursal_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(sucursal_control) {
		sucursal_funcion1.resaltarRestaurarDivMensaje(true,sucursal_control.strAuxiliarMensajeAlert,sucursal_control.strAuxiliarCssMensaje);
			
		if(sucursal_funcion1.esPaginaForm(sucursal_constante1)==true) {
			window.opener.sucursal_funcion1.resaltarRestaurarDivMensaje(true,sucursal_control.strAuxiliarMensajeAlert,sucursal_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(sucursal_control) {
		this.sucursal_controlInicial=sucursal_control;
			
		if(sucursal_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(sucursal_control.strStyleDivArbol,sucursal_control.strStyleDivContent
																,sucursal_control.strStyleDivOpcionesBanner,sucursal_control.strStyleDivExpandirColapsar
																,sucursal_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(sucursal_control) {
		this.actualizarCssBotonesPagina(sucursal_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(sucursal_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(sucursal_control.tiposReportes,sucursal_control.tiposReporte
															 	,sucursal_control.tiposPaginacion,sucursal_control.tiposAcciones
																,sucursal_control.tiposColumnasSelect,sucursal_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(sucursal_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(sucursal_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(sucursal_control);			
	}
	
	actualizarPaginaUsuarioInvitado(sucursal_control) {
	
		var indexPosition=sucursal_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=sucursal_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(sucursal_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",sucursal_control.strRecargarFkTipos,",")) { 
				sucursal_webcontrol1.cargarCombosempresasFK(sucursal_control);
			}

			if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",sucursal_control.strRecargarFkTipos,",")) { 
				sucursal_webcontrol1.cargarCombospaissFK(sucursal_control);
			}

			if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",sucursal_control.strRecargarFkTipos,",")) { 
				sucursal_webcontrol1.cargarCombosciudadsFK(sucursal_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(sucursal_control.strRecargarFkTiposNinguno!=null && sucursal_control.strRecargarFkTiposNinguno!='NINGUNO' && sucursal_control.strRecargarFkTiposNinguno!='') {
			
				if(sucursal_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",sucursal_control.strRecargarFkTiposNinguno,",")) { 
					sucursal_webcontrol1.cargarCombosempresasFK(sucursal_control);
				}

				if(sucursal_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",sucursal_control.strRecargarFkTiposNinguno,",")) { 
					sucursal_webcontrol1.cargarCombospaissFK(sucursal_control);
				}

				if(sucursal_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",sucursal_control.strRecargarFkTiposNinguno,",")) { 
					sucursal_webcontrol1.cargarCombosciudadsFK(sucursal_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(sucursal_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,sucursal_funcion1,sucursal_control.empresasFK);
	}

	cargarComboEditarTablapaisFK(sucursal_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,sucursal_funcion1,sucursal_control.paissFK);
	}

	cargarComboEditarTablaciudadFK(sucursal_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,sucursal_funcion1,sucursal_control.ciudadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(sucursal_control) {
		jQuery("#tdsucursalNuevo").css("display",sucursal_control.strPermisoNuevo);
		jQuery("#trsucursalElementos").css("display",sucursal_control.strVisibleTablaElementos);
		jQuery("#trsucursalAcciones").css("display",sucursal_control.strVisibleTablaAcciones);
		jQuery("#trsucursalParametrosAcciones").css("display",sucursal_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(sucursal_control) {
	
		this.actualizarCssBotonesMantenimiento(sucursal_control);
				
		if(sucursal_control.sucursalActual!=null) {//form
			
			this.actualizarCamposFormulario(sucursal_control);			
		}
						
		this.actualizarSpanMensajesCampos(sucursal_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(sucursal_control) {
	
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id").val(sucursal_control.sucursalActual.id);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-created_at").val(sucursal_control.sucursalActual.versionRow);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-updated_at").val(sucursal_control.sucursalActual.versionRow);
		
		if(sucursal_control.sucursalActual.id_empresa!=null && sucursal_control.sucursalActual.id_empresa>-1){
			if(jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa").val() != sucursal_control.sucursalActual.id_empresa) {
				jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa").val(sucursal_control.sucursalActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(sucursal_control.sucursalActual.id_pais!=null && sucursal_control.sucursalActual.id_pais>-1){
			if(jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais").val() != sucursal_control.sucursalActual.id_pais) {
				jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais").val(sucursal_control.sucursalActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(sucursal_control.sucursalActual.id_ciudad!=null && sucursal_control.sucursalActual.id_ciudad>-1){
			if(jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad").val() != sucursal_control.sucursalActual.id_ciudad) {
				jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad").val(sucursal_control.sucursalActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad").select2("val", null);
			if(jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-nombre").val(sucursal_control.sucursalActual.nombre);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-registro_tributario").val(sucursal_control.sucursalActual.registro_tributario);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-registro_sucursalrial").val(sucursal_control.sucursalActual.registro_sucursalrial);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-direccion1").val(sucursal_control.sucursalActual.direccion1);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-direccion2").val(sucursal_control.sucursalActual.direccion2);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-direccion3").val(sucursal_control.sucursalActual.direccion3);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-telefono1").val(sucursal_control.sucursalActual.telefono1);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-celular").val(sucursal_control.sucursalActual.celular);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-correo_electronico").val(sucursal_control.sucursalActual.correo_electronico);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-sitio_web").val(sucursal_control.sucursalActual.sitio_web);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-codigo_postal").val(sucursal_control.sucursalActual.codigo_postal);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-fax").val(sucursal_control.sucursalActual.fax);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-barrio_distrito").val(sucursal_control.sucursalActual.barrio_distrito);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-logo").val(sucursal_control.sucursalActual.logo);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-base_de_datos").val(sucursal_control.sucursalActual.base_de_datos);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-condicion").val(sucursal_control.sucursalActual.condicion);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-icono_asociado").val(sucursal_control.sucursalActual.icono_asociado);
		jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-folder_sucursal").val(sucursal_control.sucursalActual.folder_sucursal);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+sucursal_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("sucursal","general","","form_sucursal",formulario,"","",paraEventoTabla,idFilaTabla,sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
	}
	
	actualizarSpanMensajesCampos(sucursal_control) {
		jQuery("#spanstrMensajeid").text(sucursal_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(sucursal_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(sucursal_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(sucursal_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_pais").text(sucursal_control.strMensajeid_pais);		
		jQuery("#spanstrMensajeid_ciudad").text(sucursal_control.strMensajeid_ciudad);		
		jQuery("#spanstrMensajenombre").text(sucursal_control.strMensajenombre);		
		jQuery("#spanstrMensajeregistro_tributario").text(sucursal_control.strMensajeregistro_tributario);		
		jQuery("#spanstrMensajeregistro_sucursalrial").text(sucursal_control.strMensajeregistro_sucursalrial);		
		jQuery("#spanstrMensajedireccion1").text(sucursal_control.strMensajedireccion1);		
		jQuery("#spanstrMensajedireccion2").text(sucursal_control.strMensajedireccion2);		
		jQuery("#spanstrMensajedireccion3").text(sucursal_control.strMensajedireccion3);		
		jQuery("#spanstrMensajetelefono1").text(sucursal_control.strMensajetelefono1);		
		jQuery("#spanstrMensajecelular").text(sucursal_control.strMensajecelular);		
		jQuery("#spanstrMensajecorreo_electronico").text(sucursal_control.strMensajecorreo_electronico);		
		jQuery("#spanstrMensajesitio_web").text(sucursal_control.strMensajesitio_web);		
		jQuery("#spanstrMensajecodigo_postal").text(sucursal_control.strMensajecodigo_postal);		
		jQuery("#spanstrMensajefax").text(sucursal_control.strMensajefax);		
		jQuery("#spanstrMensajebarrio_distrito").text(sucursal_control.strMensajebarrio_distrito);		
		jQuery("#spanstrMensajelogo").text(sucursal_control.strMensajelogo);		
		jQuery("#spanstrMensajebase_de_datos").text(sucursal_control.strMensajebase_de_datos);		
		jQuery("#spanstrMensajecondicion").text(sucursal_control.strMensajecondicion);		
		jQuery("#spanstrMensajeicono_asociado").text(sucursal_control.strMensajeicono_asociado);		
		jQuery("#spanstrMensajefolder_sucursal").text(sucursal_control.strMensajefolder_sucursal);		
	}
	
	actualizarCssBotonesMantenimiento(sucursal_control) {
		jQuery("#tdbtnNuevosucursal").css("visibility",sucursal_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevosucursal").css("display",sucursal_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarsucursal").css("visibility",sucursal_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarsucursal").css("display",sucursal_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarsucursal").css("visibility",sucursal_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarsucursal").css("display",sucursal_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarsucursal").css("visibility",sucursal_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiossucursal").css("visibility",sucursal_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiossucursal").css("display",sucursal_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarsucursal").css("visibility",sucursal_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarsucursal").css("visibility",sucursal_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarsucursal").css("visibility",sucursal_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(sucursal_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa",sucursal_control.empresasFK);

		if(sucursal_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+sucursal_control.idFilaTablaActual+"_3",sucursal_control.empresasFK);
		}
	};

	cargarCombospaissFK(sucursal_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais",sucursal_control.paissFK);

		if(sucursal_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+sucursal_control.idFilaTablaActual+"_4",sucursal_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+sucursal_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",sucursal_control.paissFK);

	};

	cargarCombosciudadsFK(sucursal_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad",sucursal_control.ciudadsFK);

		if(sucursal_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+sucursal_control.idFilaTablaActual+"_5",sucursal_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+sucursal_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",sucursal_control.ciudadsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(sucursal_control) {

	};

	registrarComboActionChangeCombospaissFK(sucursal_control) {

	};

	registrarComboActionChangeCombosciudadsFK(sucursal_control) {

	};

	
	
	setDefectoValorCombosempresasFK(sucursal_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(sucursal_control.idempresaDefaultFK>-1 && jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa").val() != sucursal_control.idempresaDefaultFK) {
				jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa").val(sucursal_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(sucursal_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(sucursal_control.idpaisDefaultFK>-1 && jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais").val() != sucursal_control.idpaisDefaultFK) {
				jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais").val(sucursal_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+sucursal_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(sucursal_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+sucursal_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+sucursal_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(sucursal_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(sucursal_control.idciudadDefaultFK>-1 && jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad").val() != sucursal_control.idciudadDefaultFK) {
				jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad").val(sucursal_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+sucursal_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(sucursal_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+sucursal_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+sucursal_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//sucursal_control
		
	
	}
	
	onLoadCombosDefectoFK(sucursal_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sucursal_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",sucursal_control.strRecargarFkTipos,",")) { 
				sucursal_webcontrol1.setDefectoValorCombosempresasFK(sucursal_control);
			}

			if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",sucursal_control.strRecargarFkTipos,",")) { 
				sucursal_webcontrol1.setDefectoValorCombospaissFK(sucursal_control);
			}

			if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",sucursal_control.strRecargarFkTipos,",")) { 
				sucursal_webcontrol1.setDefectoValorCombosciudadsFK(sucursal_control);
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
	onLoadCombosEventosFK(sucursal_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sucursal_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",sucursal_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				sucursal_webcontrol1.registrarComboActionChangeCombosempresasFK(sucursal_control);
			//}

			//if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",sucursal_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				sucursal_webcontrol1.registrarComboActionChangeCombospaissFK(sucursal_control);
			//}

			//if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",sucursal_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				sucursal_webcontrol1.registrarComboActionChangeCombosciudadsFK(sucursal_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(sucursal_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sucursal_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(sucursal_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(sucursal_constante1.BIT_ES_PAGINA_FORM==true) {
				sucursal_funcion1.validarFormularioJQuery(sucursal_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("sucursal");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("sucursal");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(sucursal_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,"sucursal");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				sucursal_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				sucursal_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				sucursal_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(sucursal_control) {
		
		
		
		if(sucursal_control.strPermisoActualizar!=null) {
			jQuery("#tdsucursalActualizarToolBar").css("display",sucursal_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdsucursalEliminarToolBar").css("display",sucursal_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trsucursalElementos").css("display",sucursal_control.strVisibleTablaElementos);
		
		jQuery("#trsucursalAcciones").css("display",sucursal_control.strVisibleTablaAcciones);
		jQuery("#trsucursalParametrosAcciones").css("display",sucursal_control.strVisibleTablaAcciones);
		
		jQuery("#tdsucursalCerrarPagina").css("display",sucursal_control.strPermisoPopup);		
		jQuery("#tdsucursalCerrarPaginaToolBar").css("display",sucursal_control.strPermisoPopup);
		//jQuery("#trsucursalAccionesRelaciones").css("display",sucursal_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=sucursal_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + sucursal_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + sucursal_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Sucursals";
		sTituloBanner+=" - " + sucursal_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + sucursal_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdsucursalRelacionesToolBar").css("display",sucursal_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultossucursal").css("display",sucursal_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		sucursal_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		sucursal_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		sucursal_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		sucursal_webcontrol1.registrarEventosControles();
		
		if(sucursal_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(sucursal_constante1.STR_ES_RELACIONADO=="false") {
			sucursal_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(sucursal_constante1.STR_ES_RELACIONES=="true") {
			if(sucursal_constante1.BIT_ES_PAGINA_FORM==true) {
				sucursal_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(sucursal_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(sucursal_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(sucursal_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(sucursal_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
						//sucursal_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(sucursal_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(sucursal_constante1.BIG_ID_ACTUAL,"sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
						//sucursal_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			sucursal_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);	
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

var sucursal_webcontrol1 = new sucursal_webcontrol();

//Para ser llamado desde otro archivo (import)
export {sucursal_webcontrol,sucursal_webcontrol1};

//Para ser llamado desde window.opener
window.sucursal_webcontrol1 = sucursal_webcontrol1;


if(sucursal_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = sucursal_webcontrol1.onLoadWindow; 
}

//</script>