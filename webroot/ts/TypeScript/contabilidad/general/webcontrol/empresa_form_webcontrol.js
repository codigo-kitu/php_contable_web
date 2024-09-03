//<script type="text/javascript" language="javascript">



//var empresaJQueryPaginaWebInteraccion= function (empresa_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {empresa_constante,empresa_constante1} from '../util/empresa_constante.js';

import {empresa_funcion,empresa_funcion1} from '../util/empresa_form_funcion.js';


class empresa_webcontrol extends GeneralEntityWebControl {
	
	empresa_control=null;
	empresa_controlInicial=null;
	empresa_controlAuxiliar=null;
		
	//if(empresa_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(empresa_control) {
		super();
		
		this.empresa_control=empresa_control;
	}
		
	actualizarVariablesPagina(empresa_control) {
		
		if(empresa_control.action=="index" || empresa_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(empresa_control);
			
		} 
		
		
		
	
		else if(empresa_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(empresa_control);	
		
		} else if(empresa_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(empresa_control);		
		}
	
	
		
		
		else if(empresa_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(empresa_control);
		
		} else if(empresa_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(empresa_control);
		
		} else if(empresa_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(empresa_control);
		
		} else if(empresa_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(empresa_control);
		
		} else if(empresa_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(empresa_control);
		
		} else if(empresa_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(empresa_control);		
		
		} else if(empresa_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(empresa_control);		
		
		} 
		//else if(empresa_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(empresa_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + empresa_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(empresa_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(empresa_control) {
		this.actualizarPaginaAccionesGenerales(empresa_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(empresa_control) {
		
		this.actualizarPaginaCargaGeneral(empresa_control);
		this.actualizarPaginaOrderBy(empresa_control);
		this.actualizarPaginaTablaDatos(empresa_control);
		this.actualizarPaginaCargaGeneralControles(empresa_control);
		//this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(empresa_control);
		this.actualizarPaginaAreaBusquedas(empresa_control);
		this.actualizarPaginaCargaCombosFK(empresa_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(empresa_control) {
		//this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(empresa_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(empresa_control) {
		this.actualizarPaginaTablaDatosAuxiliar(empresa_control);		
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(empresa_control) {
		this.actualizarPaginaTablaDatosAuxiliar(empresa_control);		
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(empresa_control) {
		this.actualizarPaginaTablaDatosAuxiliar(empresa_control);		
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(empresa_control) {
		this.actualizarPaginaCargaGeneralControles(empresa_control);
		this.actualizarPaginaCargaCombosFK(empresa_control);
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(empresa_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(empresa_control) {
		this.actualizarPaginaCargaGeneralControles(empresa_control);
		this.actualizarPaginaCargaCombosFK(empresa_control);
		this.actualizarPaginaFormulario(empresa_control);
		this.onLoadCombosDefectoFK(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(empresa_control) {
		//FORMULARIO
		if(empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(empresa_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(empresa_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		
		//COMBOS FK
		if(empresa_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(empresa_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(empresa_control) {
		//FORMULARIO
		if(empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(empresa_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(empresa_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);	
		
		//COMBOS FK
		if(empresa_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(empresa_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(empresa_control) {
		//FORMULARIO
		if(empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(empresa_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);	
		//COMBOS FK
		if(empresa_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(empresa_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(empresa_control) {
		
		if(empresa_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(empresa_control);
		}
		
		if(empresa_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(empresa_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(empresa_control) {
		if(empresa_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("empresaReturnGeneral",JSON.stringify(empresa_control.empresaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(empresa_control) {
		if(empresa_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && empresa_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(empresa_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(empresa_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(empresa_control, mostrar) {
		
		if(mostrar==true) {
			empresa_funcion1.resaltarRestaurarDivsPagina(false,"empresa");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				empresa_funcion1.resaltarRestaurarDivMantenimiento(false,"empresa");
			}			
			
			empresa_funcion1.mostrarDivMensaje(true,empresa_control.strAuxiliarMensaje,empresa_control.strAuxiliarCssMensaje);
		
		} else {
			empresa_funcion1.mostrarDivMensaje(false,empresa_control.strAuxiliarMensaje,empresa_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(empresa_control) {
		if(empresa_funcion1.esPaginaForm(empresa_constante1)==true) {
			window.opener.empresa_webcontrol1.actualizarPaginaTablaDatos(empresa_control);
		} else {
			this.actualizarPaginaTablaDatos(empresa_control);
		}
	}
	
	actualizarPaginaAbrirLink(empresa_control) {
		empresa_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(empresa_control.strAuxiliarUrlPagina);
				
		empresa_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(empresa_control.strAuxiliarTipo,empresa_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(empresa_control) {
		empresa_funcion1.resaltarRestaurarDivMensaje(true,empresa_control.strAuxiliarMensajeAlert,empresa_control.strAuxiliarCssMensaje);
			
		if(empresa_funcion1.esPaginaForm(empresa_constante1)==true) {
			window.opener.empresa_funcion1.resaltarRestaurarDivMensaje(true,empresa_control.strAuxiliarMensajeAlert,empresa_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(empresa_control) {
		this.empresa_controlInicial=empresa_control;
			
		if(empresa_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(empresa_control.strStyleDivArbol,empresa_control.strStyleDivContent
																,empresa_control.strStyleDivOpcionesBanner,empresa_control.strStyleDivExpandirColapsar
																,empresa_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(empresa_control) {
		this.actualizarCssBotonesPagina(empresa_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(empresa_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(empresa_control.tiposReportes,empresa_control.tiposReporte
															 	,empresa_control.tiposPaginacion,empresa_control.tiposAcciones
																,empresa_control.tiposColumnasSelect,empresa_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(empresa_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(empresa_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(empresa_control);			
	}
	
	actualizarPaginaUsuarioInvitado(empresa_control) {
	
		var indexPosition=empresa_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=empresa_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(empresa_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",empresa_control.strRecargarFkTipos,",")) { 
				empresa_webcontrol1.cargarCombospaissFK(empresa_control);
			}

			if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",empresa_control.strRecargarFkTipos,",")) { 
				empresa_webcontrol1.cargarCombosciudadsFK(empresa_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(empresa_control.strRecargarFkTiposNinguno!=null && empresa_control.strRecargarFkTiposNinguno!='NINGUNO' && empresa_control.strRecargarFkTiposNinguno!='') {
			
				if(empresa_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",empresa_control.strRecargarFkTiposNinguno,",")) { 
					empresa_webcontrol1.cargarCombospaissFK(empresa_control);
				}

				if(empresa_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",empresa_control.strRecargarFkTiposNinguno,",")) { 
					empresa_webcontrol1.cargarCombosciudadsFK(empresa_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablapaisFK(empresa_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,empresa_funcion1,empresa_control.paissFK);
	}

	cargarComboEditarTablaciudadFK(empresa_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,empresa_funcion1,empresa_control.ciudadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(empresa_control) {
		jQuery("#tdempresaNuevo").css("display",empresa_control.strPermisoNuevo);
		jQuery("#trempresaElementos").css("display",empresa_control.strVisibleTablaElementos);
		jQuery("#trempresaAcciones").css("display",empresa_control.strVisibleTablaAcciones);
		jQuery("#trempresaParametrosAcciones").css("display",empresa_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(empresa_control) {
	
		this.actualizarCssBotonesMantenimiento(empresa_control);
				
		if(empresa_control.empresaActual!=null) {//form
			
			this.actualizarCamposFormulario(empresa_control);			
		}
						
		this.actualizarSpanMensajesCampos(empresa_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(empresa_control) {
	
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id").val(empresa_control.empresaActual.id);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-version_row").val(empresa_control.empresaActual.versionRow);
		
		if(empresa_control.empresaActual.id_pais!=null && empresa_control.empresaActual.id_pais>-1){
			if(jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val() != empresa_control.empresaActual.id_pais) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val(empresa_control.empresaActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(empresa_control.empresaActual.id_ciudad!=null && empresa_control.empresaActual.id_ciudad>-1){
			if(jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val() != empresa_control.empresaActual.id_ciudad) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val(empresa_control.empresaActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").select2("val", null);
			if(jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-ruc").val(empresa_control.empresaActual.ruc);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-nombre").val(empresa_control.empresaActual.nombre);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-nombre_comercial").val(empresa_control.empresaActual.nombre_comercial);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-sector").val(empresa_control.empresaActual.sector);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-direccion1").val(empresa_control.empresaActual.direccion1);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-direccion2").val(empresa_control.empresaActual.direccion2);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-direccion3").val(empresa_control.empresaActual.direccion3);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-telefono1").val(empresa_control.empresaActual.telefono1);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-movil").val(empresa_control.empresaActual.movil);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-mail").val(empresa_control.empresaActual.mail);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-sitio_web").val(empresa_control.empresaActual.sitio_web);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-codigo_postal").val(empresa_control.empresaActual.codigo_postal);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-fax").val(empresa_control.empresaActual.fax);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-logo").val(empresa_control.empresaActual.logo);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-icono").val(empresa_control.empresaActual.icono);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+empresa_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("empresa","general","","form_empresa",formulario,"","",paraEventoTabla,idFilaTabla,empresa_funcion1,empresa_webcontrol1,empresa_constante1);
	}
	
	actualizarSpanMensajesCampos(empresa_control) {
		jQuery("#spanstrMensajeid").text(empresa_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(empresa_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_pais").text(empresa_control.strMensajeid_pais);		
		jQuery("#spanstrMensajeid_ciudad").text(empresa_control.strMensajeid_ciudad);		
		jQuery("#spanstrMensajeruc").text(empresa_control.strMensajeruc);		
		jQuery("#spanstrMensajenombre").text(empresa_control.strMensajenombre);		
		jQuery("#spanstrMensajenombre_comercial").text(empresa_control.strMensajenombre_comercial);		
		jQuery("#spanstrMensajesector").text(empresa_control.strMensajesector);		
		jQuery("#spanstrMensajedireccion1").text(empresa_control.strMensajedireccion1);		
		jQuery("#spanstrMensajedireccion2").text(empresa_control.strMensajedireccion2);		
		jQuery("#spanstrMensajedireccion3").text(empresa_control.strMensajedireccion3);		
		jQuery("#spanstrMensajetelefono1").text(empresa_control.strMensajetelefono1);		
		jQuery("#spanstrMensajemovil").text(empresa_control.strMensajemovil);		
		jQuery("#spanstrMensajemail").text(empresa_control.strMensajemail);		
		jQuery("#spanstrMensajesitio_web").text(empresa_control.strMensajesitio_web);		
		jQuery("#spanstrMensajecodigo_postal").text(empresa_control.strMensajecodigo_postal);		
		jQuery("#spanstrMensajefax").text(empresa_control.strMensajefax);		
		jQuery("#spanstrMensajelogo").text(empresa_control.strMensajelogo);		
		jQuery("#spanstrMensajeicono").text(empresa_control.strMensajeicono);		
	}
	
	actualizarCssBotonesMantenimiento(empresa_control) {
		jQuery("#tdbtnNuevoempresa").css("visibility",empresa_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoempresa").css("display",empresa_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarempresa").css("visibility",empresa_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarempresa").css("display",empresa_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarempresa").css("visibility",empresa_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarempresa").css("display",empresa_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarempresa").css("visibility",empresa_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosempresa").css("visibility",empresa_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosempresa").css("display",empresa_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarempresa").css("visibility",empresa_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarempresa").css("visibility",empresa_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarempresa").css("visibility",empresa_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombospaissFK(empresa_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+empresa_constante1.STR_SUFIJO+"-id_pais",empresa_control.paissFK);

		if(empresa_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+empresa_control.idFilaTablaActual+"_2",empresa_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+empresa_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",empresa_control.paissFK);

	};

	cargarCombosciudadsFK(empresa_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad",empresa_control.ciudadsFK);

		if(empresa_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+empresa_control.idFilaTablaActual+"_3",empresa_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+empresa_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",empresa_control.ciudadsFK);

	};

	
	
	registrarComboActionChangeCombospaissFK(empresa_control) {

	};

	registrarComboActionChangeCombosciudadsFK(empresa_control) {

	};

	
	
	setDefectoValorCombospaissFK(empresa_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(empresa_control.idpaisDefaultFK>-1 && jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val() != empresa_control.idpaisDefaultFK) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val(empresa_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(empresa_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(empresa_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(empresa_control.idciudadDefaultFK>-1 && jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val() != empresa_control.idciudadDefaultFK) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val(empresa_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(empresa_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//empresa_control
		
	
	}
	
	onLoadCombosDefectoFK(empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",empresa_control.strRecargarFkTipos,",")) { 
				empresa_webcontrol1.setDefectoValorCombospaissFK(empresa_control);
			}

			if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",empresa_control.strRecargarFkTipos,",")) { 
				empresa_webcontrol1.setDefectoValorCombosciudadsFK(empresa_control);
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
	onLoadCombosEventosFK(empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",empresa_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				empresa_webcontrol1.registrarComboActionChangeCombospaissFK(empresa_control);
			//}

			//if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",empresa_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				empresa_webcontrol1.registrarComboActionChangeCombosciudadsFK(empresa_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(empresa_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("empresa","general","",empresa_funcion1,empresa_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(empresa_constante1.BIT_ES_PAGINA_FORM==true) {
				empresa_funcion1.validarFormularioJQuery(empresa_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("empresa");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("empresa");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(empresa_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("empresa","general","",empresa_funcion1,empresa_webcontrol1,"empresa");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				empresa_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				empresa_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(empresa_control) {
		
		
		
		if(empresa_control.strPermisoActualizar!=null) {
			jQuery("#tdempresaActualizarToolBar").css("display",empresa_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdempresaEliminarToolBar").css("display",empresa_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trempresaElementos").css("display",empresa_control.strVisibleTablaElementos);
		
		jQuery("#trempresaAcciones").css("display",empresa_control.strVisibleTablaAcciones);
		jQuery("#trempresaParametrosAcciones").css("display",empresa_control.strVisibleTablaAcciones);
		
		jQuery("#tdempresaCerrarPagina").css("display",empresa_control.strPermisoPopup);		
		jQuery("#tdempresaCerrarPaginaToolBar").css("display",empresa_control.strPermisoPopup);
		//jQuery("#trempresaAccionesRelaciones").css("display",empresa_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=empresa_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + empresa_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + empresa_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Empresas";
		sTituloBanner+=" - " + empresa_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + empresa_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdempresaRelacionesToolBar").css("display",empresa_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosempresa").css("display",empresa_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("empresa","general","",empresa_funcion1,empresa_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		empresa_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		empresa_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		empresa_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		empresa_webcontrol1.registrarEventosControles();
		
		if(empresa_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(empresa_constante1.STR_ES_RELACIONADO=="false") {
			empresa_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(empresa_constante1.STR_ES_RELACIONES=="true") {
			if(empresa_constante1.BIT_ES_PAGINA_FORM==true) {
				empresa_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(empresa_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(empresa_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(empresa_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(empresa_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
						//empresa_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(empresa_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(empresa_constante1.BIG_ID_ACTUAL,"empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
						//empresa_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			empresa_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);	
	}
}

var empresa_webcontrol1 = new empresa_webcontrol();

//Para ser llamado desde otro archivo (import)
export {empresa_webcontrol,empresa_webcontrol1};

//Para ser llamado desde window.opener
window.empresa_webcontrol1 = empresa_webcontrol1;


if(empresa_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = empresa_webcontrol1.onLoadWindow; 
}

//</script>