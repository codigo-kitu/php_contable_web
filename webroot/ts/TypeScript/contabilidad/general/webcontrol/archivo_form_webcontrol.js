//<script type="text/javascript" language="javascript">



//var archivoJQueryPaginaWebInteraccion= function (archivo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {archivo_constante,archivo_constante1} from '../util/archivo_constante.js';

import {archivo_funcion,archivo_funcion1} from '../util/archivo_form_funcion.js';


class archivo_webcontrol extends GeneralEntityWebControl {
	
	archivo_control=null;
	archivo_controlInicial=null;
	archivo_controlAuxiliar=null;
		
	//if(archivo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(archivo_control) {
		super();
		
		this.archivo_control=archivo_control;
	}
		
	actualizarVariablesPagina(archivo_control) {
		
		if(archivo_control.action=="index" || archivo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(archivo_control);
			
		} 
		
		
		
	
		else if(archivo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(archivo_control);	
		
		} else if(archivo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(archivo_control);		
		}
	
		else if(archivo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(archivo_control);		
		}
	
		else if(archivo_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(archivo_control);
		}
		
		
		else if(archivo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(archivo_control);
		
		} else if(archivo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(archivo_control);
		
		} else if(archivo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(archivo_control);
		
		} else if(archivo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(archivo_control);
		
		} else if(archivo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(archivo_control);
		
		} else if(archivo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(archivo_control);		
		
		} else if(archivo_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(archivo_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + archivo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(archivo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(archivo_control) {
		this.actualizarPaginaAccionesGenerales(archivo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(archivo_control) {
		
		this.actualizarPaginaCargaGeneral(archivo_control);
		this.actualizarPaginaOrderBy(archivo_control);
		this.actualizarPaginaTablaDatos(archivo_control);
		this.actualizarPaginaCargaGeneralControles(archivo_control);
		//this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(archivo_control);
		this.actualizarPaginaAreaBusquedas(archivo_control);
		this.actualizarPaginaCargaCombosFK(archivo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(archivo_control) {
		//this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(archivo_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(archivo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(archivo_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(archivo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(archivo_control);		
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(archivo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(archivo_control);		
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(archivo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(archivo_control);		
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(archivo_control) {
		this.actualizarPaginaCargaGeneralControles(archivo_control);
		this.actualizarPaginaCargaCombosFK(archivo_control);
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(archivo_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(archivo_control) {
		this.actualizarPaginaCargaGeneralControles(archivo_control);
		this.actualizarPaginaCargaCombosFK(archivo_control);
		this.actualizarPaginaFormulario(archivo_control);
		this.onLoadCombosDefectoFK(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(archivo_control) {
		//FORMULARIO
		if(archivo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(archivo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(archivo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		
		//COMBOS FK
		if(archivo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(archivo_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(archivo_control) {
		//FORMULARIO
		if(archivo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(archivo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);	
		//COMBOS FK
		if(archivo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(archivo_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(archivo_control) {
		
		if(archivo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(archivo_control);
		}
		
		if(archivo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(archivo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(archivo_control) {
		if(archivo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("archivoReturnGeneral",JSON.stringify(archivo_control.archivoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(archivo_control) {
		if(archivo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && archivo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(archivo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(archivo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(archivo_control, mostrar) {
		
		if(mostrar==true) {
			archivo_funcion1.resaltarRestaurarDivsPagina(false,"archivo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				archivo_funcion1.resaltarRestaurarDivMantenimiento(false,"archivo");
			}			
			
			archivo_funcion1.mostrarDivMensaje(true,archivo_control.strAuxiliarMensaje,archivo_control.strAuxiliarCssMensaje);
		
		} else {
			archivo_funcion1.mostrarDivMensaje(false,archivo_control.strAuxiliarMensaje,archivo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(archivo_control) {
		if(archivo_funcion1.esPaginaForm(archivo_constante1)==true) {
			window.opener.archivo_webcontrol1.actualizarPaginaTablaDatos(archivo_control);
		} else {
			this.actualizarPaginaTablaDatos(archivo_control);
		}
	}
	
	actualizarPaginaAbrirLink(archivo_control) {
		archivo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(archivo_control.strAuxiliarUrlPagina);
				
		archivo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(archivo_control.strAuxiliarTipo,archivo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(archivo_control) {
		archivo_funcion1.resaltarRestaurarDivMensaje(true,archivo_control.strAuxiliarMensajeAlert,archivo_control.strAuxiliarCssMensaje);
			
		if(archivo_funcion1.esPaginaForm(archivo_constante1)==true) {
			window.opener.archivo_funcion1.resaltarRestaurarDivMensaje(true,archivo_control.strAuxiliarMensajeAlert,archivo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(archivo_control) {
		this.archivo_controlInicial=archivo_control;
			
		if(archivo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(archivo_control.strStyleDivArbol,archivo_control.strStyleDivContent
																,archivo_control.strStyleDivOpcionesBanner,archivo_control.strStyleDivExpandirColapsar
																,archivo_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(archivo_control) {
		this.actualizarCssBotonesPagina(archivo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(archivo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(archivo_control.tiposReportes,archivo_control.tiposReporte
															 	,archivo_control.tiposPaginacion,archivo_control.tiposAcciones
																,archivo_control.tiposColumnasSelect,archivo_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(archivo_control.tiposRelaciones,archivo_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(archivo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(archivo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(archivo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(archivo_control) {
	
		var indexPosition=archivo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=archivo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(archivo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(archivo_control.strRecargarFkTiposNinguno!=null && archivo_control.strRecargarFkTiposNinguno!='NINGUNO' && archivo_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(archivo_control) {
		jQuery("#tdarchivoNuevo").css("display",archivo_control.strPermisoNuevo);
		jQuery("#trarchivoElementos").css("display",archivo_control.strVisibleTablaElementos);
		jQuery("#trarchivoAcciones").css("display",archivo_control.strVisibleTablaAcciones);
		jQuery("#trarchivoParametrosAcciones").css("display",archivo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(archivo_control) {
	
		this.actualizarCssBotonesMantenimiento(archivo_control);
				
		if(archivo_control.archivoActual!=null) {//form
			
			this.actualizarCamposFormulario(archivo_control);			
		}
						
		this.actualizarSpanMensajesCampos(archivo_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(archivo_control) {
	
		jQuery("#form"+archivo_constante1.STR_SUFIJO+"-id").val(archivo_control.archivoActual.id);
		jQuery("#form"+archivo_constante1.STR_SUFIJO+"-version_row").val(archivo_control.archivoActual.versionRow);
		jQuery("#form"+archivo_constante1.STR_SUFIJO+"-imagen").val(archivo_control.archivoActual.imagen);
		jQuery("#form"+archivo_constante1.STR_SUFIJO+"-nombre").val(archivo_control.archivoActual.nombre);
		jQuery("#form"+archivo_constante1.STR_SUFIJO+"-descripcion").val(archivo_control.archivoActual.descripcion);
		jQuery("#form"+archivo_constante1.STR_SUFIJO+"-archivo").val(archivo_control.archivoActual.archivo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+archivo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("archivo","general","","form_archivo",formulario,"","",paraEventoTabla,idFilaTabla,archivo_funcion1,archivo_webcontrol1,archivo_constante1);
	}
	
	actualizarSpanMensajesCampos(archivo_control) {
		jQuery("#spanstrMensajeid").text(archivo_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(archivo_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeimagen").text(archivo_control.strMensajeimagen);		
		jQuery("#spanstrMensajenombre").text(archivo_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(archivo_control.strMensajedescripcion);		
		jQuery("#spanstrMensajearchivo").text(archivo_control.strMensajearchivo);		
	}
	
	actualizarCssBotonesMantenimiento(archivo_control) {
		jQuery("#tdbtnNuevoarchivo").css("visibility",archivo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoarchivo").css("display",archivo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizararchivo").css("visibility",archivo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizararchivo").css("display",archivo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminararchivo").css("visibility",archivo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminararchivo").css("display",archivo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelararchivo").css("visibility",archivo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosarchivo").css("visibility",archivo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosarchivo").css("display",archivo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBararchivo").css("visibility",archivo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBararchivo").css("visibility",archivo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBararchivo").css("visibility",archivo_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//archivo_control
		
	
	}
	
	onLoadCombosDefectoFK(archivo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(archivo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(archivo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(archivo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(archivo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(archivo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(archivo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("archivo","general","",archivo_funcion1,archivo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(archivo_constante1.BIT_ES_PAGINA_FORM==true) {
				archivo_funcion1.validarFormularioJQuery(archivo_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("archivo");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("archivo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(archivo_funcion1,archivo_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(archivo_funcion1,archivo_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(archivo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("archivo","general","",archivo_funcion1,archivo_webcontrol1,"archivo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("archivo");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(archivo_control) {
		
		
		
		if(archivo_control.strPermisoActualizar!=null) {
			jQuery("#tdarchivoActualizarToolBar").css("display",archivo_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdarchivoEliminarToolBar").css("display",archivo_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trarchivoElementos").css("display",archivo_control.strVisibleTablaElementos);
		
		jQuery("#trarchivoAcciones").css("display",archivo_control.strVisibleTablaAcciones);
		jQuery("#trarchivoParametrosAcciones").css("display",archivo_control.strVisibleTablaAcciones);
		
		jQuery("#tdarchivoCerrarPagina").css("display",archivo_control.strPermisoPopup);		
		jQuery("#tdarchivoCerrarPaginaToolBar").css("display",archivo_control.strPermisoPopup);
		//jQuery("#trarchivoAccionesRelaciones").css("display",archivo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=archivo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + archivo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + archivo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Archivoses";
		sTituloBanner+=" - " + archivo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + archivo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdarchivoRelacionesToolBar").css("display",archivo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosarchivo").css("display",archivo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("archivo","general","",archivo_funcion1,archivo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		archivo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		archivo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		archivo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		archivo_webcontrol1.registrarEventosControles();
		
		if(archivo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(archivo_constante1.STR_ES_RELACIONADO=="false") {
			archivo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(archivo_constante1.STR_ES_RELACIONES=="true") {
			if(archivo_constante1.BIT_ES_PAGINA_FORM==true) {
				archivo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(archivo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(archivo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(archivo_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(archivo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
						//archivo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(archivo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(archivo_constante1.BIG_ID_ACTUAL,"archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
						//archivo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			archivo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);	
	}
}

var archivo_webcontrol1 = new archivo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {archivo_webcontrol,archivo_webcontrol1};

//Para ser llamado desde window.opener
window.archivo_webcontrol1 = archivo_webcontrol1;


if(archivo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = archivo_webcontrol1.onLoadWindow; 
}

//</script>