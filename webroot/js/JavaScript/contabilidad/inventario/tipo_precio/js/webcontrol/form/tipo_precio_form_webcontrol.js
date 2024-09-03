//<script type="text/javascript" language="javascript">

//var tipo_precioJQueryPaginaWebInteraccion= function (tipo_precio_control) {

import {Constantes,constantes} from '../../../../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_precio_constante,tipo_precio_constante1} from '../../util/tipo_precio_constante.js';
import {tipo_precio_funcion,tipo_precio_funcion1} from '../../util/form/tipo_precio_form_funcion.js';
import {tipo_precio_form_evento_webcontrol} from '../../webcontrol/form/tipo_precio_form_evento_webcontrol.js'; /*evento*/
import {tipo_precio_actions_webcontrol} from '../../webcontrol/form/component/tipo_precio_actions_webcontrol.js';


class tipo_precio_webcontrol extends tipo_precio_actions_webcontrol {
	
		
	constructor() {	
		super(); /*tipo_precio_form_evento_webcontrol*/
		
		/*this.getThis().tipo_precio_control=tipo_precio_control;*/
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
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
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_precio_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_precio_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_precio_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_precio_webcontrol1.registrarEventosControles();
		
		if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			tipo_precio_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_precio_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_precio_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_precio_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_precio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			
			//} else {
				//if(tipo_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(tipo_precio_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
						//tipo_precio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(tipo_precio_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_precio_constante1.BIG_ID_ACTUAL,"tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
						//tipo_precio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			tipo_precio_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);	
	}
	
	/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);	
	}
	
	registrarAccionesEventos() {	
		if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(tipo_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_precio_funcion1.validarFormularioJQuery(tipo_precio_constante1);
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
