//<script type="text/javascript" language="javascript">



//var tipo_precioJQueryPaginaWebInteraccion= function (tipo_precio_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_precio_constante,tipo_precio_constante1} from '../../util/tipo_precio_constante.js';
import {tipo_precio_funcion,tipo_precio_funcion1} from '../../util/principal/tipo_precio_funcion.js';
import {tipo_precio_actions_webcontrol} from '../../webcontrol/principal/component/tipo_precio_actions_webcontrol.js';

class tipo_precio_webcontrol extends tipo_precio_actions_webcontrol {
			
	constructor() {	
		super(); /*tipo_precio_evento_webcontrol*/
		
		/*this.getThis().tipo_precio_control=tipo_precio_control;*/
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_webcontrol1;/*super*/	
	}	
	
	settipo_precio_constante(tipo_precio_constante2) {
		
		tipo_precio_constante1.STR_NOMBRE_PAGINA = tipo_precio_constante2.STR_NOMBRE_PAGINA;
		tipo_precio_constante1.STR_TYPE_ON_LOADtipo_precio = tipo_precio_constante2.STR_TYPE_ON_LOADtipo_precio;
		tipo_precio_constante1.STR_TIPO_PAGINA_AUXILIAR = tipo_precio_constante2.STR_TIPO_PAGINA_AUXILIAR;
		tipo_precio_constante1.STR_TIPO_USUARIO_AUXILIAR = tipo_precio_constante2.STR_TIPO_USUARIO_AUXILIAR;
		tipo_precio_constante1.STR_ACTION = tipo_precio_constante2.STR_ACTION;
		tipo_precio_constante1.STR_ES_POPUP = tipo_precio_constante2.STR_ES_POPUP;
		tipo_precio_constante1.STR_ES_BUSQUEDA = tipo_precio_constante2.STR_ES_BUSQUEDA;
		tipo_precio_constante1.STR_FUNCION_JS = tipo_precio_constante2.STR_FUNCION_JS;
		tipo_precio_constante1.BIG_ID_ACTUAL = tipo_precio_constante2.BIG_ID_ACTUAL;
		tipo_precio_constante1.BIG_ID_OPCION = tipo_precio_constante2.BIG_ID_OPCION;
		tipo_precio_constante1.STR_OBJETO_JS = tipo_precio_constante2.STR_OBJETO_JS;
		tipo_precio_constante1.STR_ES_RELACIONES = tipo_precio_constante2.STR_ES_RELACIONES;
		tipo_precio_constante1.STR_ES_RELACIONADO = tipo_precio_constante2.STR_ES_RELACIONADO;
		tipo_precio_constante1.STR_ES_SUB_PAGINA = tipo_precio_constante2.STR_ES_SUB_PAGINA;
		tipo_precio_constante1.BIT_ES_PAGINA_PRINCIPAL = tipo_precio_constante2.BIT_ES_PAGINA_PRINCIPAL;
		tipo_precio_constante1.BIT_ES_PAGINA_FORM = tipo_precio_constante2.BIT_ES_PAGINA_FORM;
		tipo_precio_constante1.STR_SUFIJO = tipo_precio_constante2.STR_SUFIJO;
		tipo_precio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS = tipo_precio_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS;
		tipo_precio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA = tipo_precio_constante2.STR_DESCRIPCION_USUARIO_SISTEMA;
		tipo_precio_constante1.STR_NOMBRE_MODULO_ACTUAL = tipo_precio_constante2.STR_NOMBRE_MODULO_ACTUAL;
		tipo_precio_constante1.STR_DESCRIPCION_PERIODO_SISTEMA = tipo_precio_constante2.STR_DESCRIPCION_PERIODO_SISTEMA;
		
		/*DEPENDE DE POST PARA DAR VALOR*/
		tipo_precio_constante1.BIT_ES_LOAD_NORMAL = tipo_precio_constante2.BIT_ES_LOAD_NORMAL;
		tipo_precio_constante1.BIT_ES_PARA_JQUERY = tipo_precio_constante2.BIT_ES_PARA_JQUERY;		
		tipo_precio_constante1.BIT_ES_PAGINA_ADDITIONAL = tipo_precio_constante2.BIT_ES_PAGINA_ADDITIONAL;
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control) {
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_precio_control.strAuxiliarMensaje!=""){
			this.getThis().actualizarPaginaMensajePantalla(tipo_precio_control, true);
		} else {
			this.getThis().actualizarPaginaMensajePantalla(tipo_precio_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_precio_control, mostrar) {
		
		if(mostrar==true) {
			tipo_precio_funcion1.resaltarRestaurarDivsPagina(false,"tipo_precio");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_precio_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_precio");
			}			
			
			tipo_precio_funcion1.mostrarDivMensaje(true,tipo_precio_control.strAuxiliarMensaje,tipo_precio_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_precio_funcion1.mostrarDivMensaje(false,tipo_precio_control.strAuxiliarMensaje,tipo_precio_control.strAuxiliarCssMensaje);
		}
	}
	
	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_precio_control) {
		
		if(tipo_precio_control.strAuxiliarMensajeAlert!=""){
			this.getThis().actualizarPaginaMensajeAlert(tipo_precio_control);
		}
		
		if(tipo_precio_control.bitEsEjecutarFuncionJavaScript==true){
			this.getSuper().actualizarPaginaEjecutarJavaScript(tipo_precio_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_precio_control) {
		tipo_precio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_precio_control.strAuxiliarUrlPagina);
				
		tipo_precio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_precio_control.strAuxiliarTipo,tipo_precio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaCargaGeneral(tipo_precio_control) {
		this.getThis().tipo_precio_controlInicial=tipo_precio_control;
			
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_precio_control.strStyleDivArbol,tipo_precio_control.strStyleDivContent
																,tipo_precio_control.strStyleDivOpcionesBanner,tipo_precio_control.strStyleDivExpandirColapsar
																,tipo_precio_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=tipo_precio_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tipo_precio_control.strPermiteRecargarInformacion);		
			}			
		}
	}
	
	actualizarPaginaCargaGeneralControles(tipo_precio_control) {
		this.getThis().actualizarCssBotonesPagina(tipo_precio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_precio_control.tiposReportes,tipo_precio_control.tiposReporte
															 	,tipo_precio_control.tiposPaginacion,tipo_precio_control.tiposAcciones
																,tipo_precio_control.tiposColumnasSelect,tipo_precio_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_precio_control.tiposRelaciones,tipo_precio_control.tiposRelacionesFormulario);		
			
			this.getThis().onLoadCombosDefectoPaginaGeneralControles(tipo_precio_control);
		}						
	}
	
	actualizarPaginaUsuarioInvitado(tipo_precio_control) {
	
		var indexPosition=tipo_precio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_precio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {

			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tipo_precio_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("tipo_precio","FK_Idempresa","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
		
			
			if(tipo_precio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,window);
			}

			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_precio");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_precio");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tipo_precio_funcion1,tipo_precio_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tipo_precio_funcion1,tipo_precio_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(tipo_precio_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,"tipo_precio");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				tipo_precio_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tipo_precio");
									
			
			
		});
		} else {
			
		}
	}//this.getThis().registrarAccionesEventos
	
	/*---------------------------------- AREA:PAGINA ---------------------------*/
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_precio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_precio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_precio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Precios";
		sTituloBanner+=" - " + tipo_precio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_precio_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_precioRelacionesToolBar").css("display",tipo_precio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_precio").css("display",tipo_precio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);	
	}
}

var tipo_precio_webcontrol1 = new tipo_precio_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tipo_precio_webcontrol,tipo_precio_webcontrol1};

//Para ser llamado desde window.opener
window.tipo_precio_webcontrol1 = tipo_precio_webcontrol1;


if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_precio_webcontrol1.onLoadWindow; 
}

/*
*/

//</script>