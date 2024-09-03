//<script type="text/javascript" language="javascript">



//var vendedorJQueryPaginaWebInteraccion= function (vendedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {vendedor_constante,vendedor_constante1} from '../util/vendedor_constante.js';

import {vendedor_funcion,vendedor_funcion1} from '../util/vendedor_form_funcion.js';


class vendedor_webcontrol extends GeneralEntityWebControl {
	
	vendedor_control=null;
	vendedor_controlInicial=null;
	vendedor_controlAuxiliar=null;
		
	//if(vendedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(vendedor_control) {
		super();
		
		this.vendedor_control=vendedor_control;
	}
		
	actualizarVariablesPagina(vendedor_control) {
		
		if(vendedor_control.action=="index" || vendedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(vendedor_control);
			
		} 
		
		
		
	
		else if(vendedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(vendedor_control);	
		
		} else if(vendedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(vendedor_control);		
		}
	
		else if(vendedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(vendedor_control);		
		}
	
		else if(vendedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(vendedor_control);
		}
		
		
		else if(vendedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(vendedor_control);
		
		} else if(vendedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(vendedor_control);
		
		} else if(vendedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(vendedor_control);
		
		} else if(vendedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(vendedor_control);
		
		} else if(vendedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(vendedor_control);
		
		} else if(vendedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(vendedor_control);		
		
		} else if(vendedor_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(vendedor_control);		
		
		} 
		//else if(vendedor_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(vendedor_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + vendedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(vendedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(vendedor_control) {
		this.actualizarPaginaAccionesGenerales(vendedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(vendedor_control) {
		
		this.actualizarPaginaCargaGeneral(vendedor_control);
		this.actualizarPaginaOrderBy(vendedor_control);
		this.actualizarPaginaTablaDatos(vendedor_control);
		this.actualizarPaginaCargaGeneralControles(vendedor_control);
		//this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(vendedor_control);
		this.actualizarPaginaAreaBusquedas(vendedor_control);
		this.actualizarPaginaCargaCombosFK(vendedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(vendedor_control) {
		//this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(vendedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(vendedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(vendedor_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(vendedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(vendedor_control);		
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(vendedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(vendedor_control);		
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(vendedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(vendedor_control);		
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(vendedor_control) {
		this.actualizarPaginaCargaGeneralControles(vendedor_control);
		this.actualizarPaginaCargaCombosFK(vendedor_control);
		this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(vendedor_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(vendedor_control) {
		this.actualizarPaginaCargaGeneralControles(vendedor_control);
		this.actualizarPaginaCargaCombosFK(vendedor_control);
		this.actualizarPaginaFormulario(vendedor_control);
		this.onLoadCombosDefectoFK(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(vendedor_control) {
		//FORMULARIO
		if(vendedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(vendedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(vendedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		
		//COMBOS FK
		if(vendedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(vendedor_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(vendedor_control) {
		//FORMULARIO
		if(vendedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(vendedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(vendedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);	
		
		//COMBOS FK
		if(vendedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(vendedor_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(vendedor_control) {
		//FORMULARIO
		if(vendedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(vendedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);	
		//COMBOS FK
		if(vendedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(vendedor_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(vendedor_control) {
		
		if(vendedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(vendedor_control);
		}
		
		if(vendedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(vendedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(vendedor_control) {
		if(vendedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("vendedorReturnGeneral",JSON.stringify(vendedor_control.vendedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(vendedor_control) {
		if(vendedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && vendedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(vendedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(vendedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(vendedor_control, mostrar) {
		
		if(mostrar==true) {
			vendedor_funcion1.resaltarRestaurarDivsPagina(false,"vendedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				vendedor_funcion1.resaltarRestaurarDivMantenimiento(false,"vendedor");
			}			
			
			vendedor_funcion1.mostrarDivMensaje(true,vendedor_control.strAuxiliarMensaje,vendedor_control.strAuxiliarCssMensaje);
		
		} else {
			vendedor_funcion1.mostrarDivMensaje(false,vendedor_control.strAuxiliarMensaje,vendedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(vendedor_control) {
		if(vendedor_funcion1.esPaginaForm(vendedor_constante1)==true) {
			window.opener.vendedor_webcontrol1.actualizarPaginaTablaDatos(vendedor_control);
		} else {
			this.actualizarPaginaTablaDatos(vendedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(vendedor_control) {
		vendedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(vendedor_control.strAuxiliarUrlPagina);
				
		vendedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(vendedor_control.strAuxiliarTipo,vendedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(vendedor_control) {
		vendedor_funcion1.resaltarRestaurarDivMensaje(true,vendedor_control.strAuxiliarMensajeAlert,vendedor_control.strAuxiliarCssMensaje);
			
		if(vendedor_funcion1.esPaginaForm(vendedor_constante1)==true) {
			window.opener.vendedor_funcion1.resaltarRestaurarDivMensaje(true,vendedor_control.strAuxiliarMensajeAlert,vendedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(vendedor_control) {
		this.vendedor_controlInicial=vendedor_control;
			
		if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(vendedor_control.strStyleDivArbol,vendedor_control.strStyleDivContent
																,vendedor_control.strStyleDivOpcionesBanner,vendedor_control.strStyleDivExpandirColapsar
																,vendedor_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(vendedor_control) {
		this.actualizarCssBotonesPagina(vendedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(vendedor_control.tiposReportes,vendedor_control.tiposReporte
															 	,vendedor_control.tiposPaginacion,vendedor_control.tiposAcciones
																,vendedor_control.tiposColumnasSelect,vendedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(vendedor_control.tiposRelaciones,vendedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(vendedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(vendedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(vendedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(vendedor_control) {
	
		var indexPosition=vendedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=vendedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(vendedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(vendedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",vendedor_control.strRecargarFkTipos,",")) { 
				vendedor_webcontrol1.cargarCombosempresasFK(vendedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(vendedor_control.strRecargarFkTiposNinguno!=null && vendedor_control.strRecargarFkTiposNinguno!='NINGUNO' && vendedor_control.strRecargarFkTiposNinguno!='') {
			
				if(vendedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",vendedor_control.strRecargarFkTiposNinguno,",")) { 
					vendedor_webcontrol1.cargarCombosempresasFK(vendedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(vendedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,vendedor_funcion1,vendedor_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(vendedor_control) {
		jQuery("#tdvendedorNuevo").css("display",vendedor_control.strPermisoNuevo);
		jQuery("#trvendedorElementos").css("display",vendedor_control.strVisibleTablaElementos);
		jQuery("#trvendedorAcciones").css("display",vendedor_control.strVisibleTablaAcciones);
		jQuery("#trvendedorParametrosAcciones").css("display",vendedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(vendedor_control) {
	
		this.actualizarCssBotonesMantenimiento(vendedor_control);
				
		if(vendedor_control.vendedorActual!=null) {//form
			
			this.actualizarCamposFormulario(vendedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(vendedor_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(vendedor_control) {
	
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id").val(vendedor_control.vendedorActual.id);
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-version_row").val(vendedor_control.vendedorActual.versionRow);
		
		if(vendedor_control.vendedorActual.id_empresa!=null && vendedor_control.vendedorActual.id_empresa>-1){
			if(jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val() != vendedor_control.vendedorActual.id_empresa) {
				jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val(vendedor_control.vendedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-codigo").val(vendedor_control.vendedorActual.codigo);
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-nombre").val(vendedor_control.vendedorActual.nombre);
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-direccion1").val(vendedor_control.vendedorActual.direccion1);
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-direccion2").val(vendedor_control.vendedorActual.direccion2);
		jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-comision").val(vendedor_control.vendedorActual.comision);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+vendedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("vendedor","facturacion","","form_vendedor",formulario,"","",paraEventoTabla,idFilaTabla,vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
	}
	
	actualizarSpanMensajesCampos(vendedor_control) {
		jQuery("#spanstrMensajeid").text(vendedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(vendedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(vendedor_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(vendedor_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(vendedor_control.strMensajenombre);		
		jQuery("#spanstrMensajedireccion1").text(vendedor_control.strMensajedireccion1);		
		jQuery("#spanstrMensajedireccion2").text(vendedor_control.strMensajedireccion2);		
		jQuery("#spanstrMensajecomision").text(vendedor_control.strMensajecomision);		
	}
	
	actualizarCssBotonesMantenimiento(vendedor_control) {
		jQuery("#tdbtnNuevovendedor").css("visibility",vendedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevovendedor").css("display",vendedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarvendedor").css("visibility",vendedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarvendedor").css("display",vendedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarvendedor").css("visibility",vendedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarvendedor").css("display",vendedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarvendedor").css("visibility",vendedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosvendedor").css("visibility",vendedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosvendedor").css("display",vendedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarvendedor").css("visibility",vendedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarvendedor").css("visibility",vendedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarvendedor").css("visibility",vendedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(vendedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa",vendedor_control.empresasFK);

		if(vendedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+vendedor_control.idFilaTablaActual+"_2",vendedor_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(vendedor_control) {

	};

	
	
	setDefectoValorCombosempresasFK(vendedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(vendedor_control.idempresaDefaultFK>-1 && jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val() != vendedor_control.idempresaDefaultFK) {
				jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val(vendedor_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//vendedor_control
		
	
	}
	
	onLoadCombosDefectoFK(vendedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(vendedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(vendedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",vendedor_control.strRecargarFkTipos,",")) { 
				vendedor_webcontrol1.setDefectoValorCombosempresasFK(vendedor_control);
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
	onLoadCombosEventosFK(vendedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(vendedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(vendedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",vendedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				vendedor_webcontrol1.registrarComboActionChangeCombosempresasFK(vendedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(vendedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(vendedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(vendedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(vendedor_constante1.BIT_ES_PAGINA_FORM==true) {
				vendedor_funcion1.validarFormularioJQuery(vendedor_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("vendedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("vendedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(vendedor_funcion1,vendedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(vendedor_funcion1,vendedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(vendedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"vendedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				vendedor_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("vendedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(vendedor_control) {
		
		
		
		if(vendedor_control.strPermisoActualizar!=null) {
			jQuery("#tdvendedorActualizarToolBar").css("display",vendedor_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdvendedorEliminarToolBar").css("display",vendedor_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trvendedorElementos").css("display",vendedor_control.strVisibleTablaElementos);
		
		jQuery("#trvendedorAcciones").css("display",vendedor_control.strVisibleTablaAcciones);
		jQuery("#trvendedorParametrosAcciones").css("display",vendedor_control.strVisibleTablaAcciones);
		
		jQuery("#tdvendedorCerrarPagina").css("display",vendedor_control.strPermisoPopup);		
		jQuery("#tdvendedorCerrarPaginaToolBar").css("display",vendedor_control.strPermisoPopup);
		//jQuery("#trvendedorAccionesRelaciones").css("display",vendedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=vendedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + vendedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + vendedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Vendedores";
		sTituloBanner+=" - " + vendedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + vendedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdvendedorRelacionesToolBar").css("display",vendedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosvendedor").css("display",vendedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		vendedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		vendedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		vendedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		vendedor_webcontrol1.registrarEventosControles();
		
		if(vendedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
			vendedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(vendedor_constante1.STR_ES_RELACIONES=="true") {
			if(vendedor_constante1.BIT_ES_PAGINA_FORM==true) {
				vendedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(vendedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(vendedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(vendedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(vendedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
						//vendedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(vendedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(vendedor_constante1.BIG_ID_ACTUAL,"vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
						//vendedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			vendedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);	
	}
}

var vendedor_webcontrol1 = new vendedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {vendedor_webcontrol,vendedor_webcontrol1};

//Para ser llamado desde window.opener
window.vendedor_webcontrol1 = vendedor_webcontrol1;


if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = vendedor_webcontrol1.onLoadWindow; 
}

//</script>