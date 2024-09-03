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


class tipo_precio_evento_webcontrol extends GeneralEntityWebControl {
	
	tipo_precio_control=null;
	tipo_precio_controlInicial=null;
	tipo_precio_controlAuxiliar=null;
	
	constructor() {	
		super(); /*GeneralEntityWebControl*/
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	

	}
	
	/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.getThis().onLoadCombosEventosFK(null);//tipo_precio_control
		
	
	}
	
	actualizarPaginaGuardarReturnSession(tipo_precio_control) {
		if(tipo_precio_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_precioReturnGeneral",JSON.stringify(tipo_precio_control.tipo_precioReturnGeneral));
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_precio_control) {
		if(tipo_precio_funcion1.esPaginaForm(tipo_precio_constante1)==true) {
			window.opener.tipo_precio_webcontrol1.actualizarPaginaTablaDatos(tipo_precio_control);
		} else {
			this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);
		}
	}
	
	actualizarPaginaMensajeAlert(tipo_precio_control) {
		tipo_precio_funcion1.resaltarRestaurarDivMensaje(true,tipo_precio_control.strAuxiliarMensajeAlert,tipo_precio_control.strAuxiliarCssMensaje);
			
		if(tipo_precio_funcion1.esPaginaForm(tipo_precio_constante1)==true) {
			window.opener.tipo_precio_funcion1.resaltarRestaurarDivMensaje(true,tipo_precio_control.strAuxiliarMensajeAlert,tipo_precio_control.strAuxiliarCssMensaje);
		}
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
				tipo_precio_webcontrol1.onLoad();			
			//} else {
				//if(tipo_precio_constante1.BIT_ES_PAGINA_FORM==true) {
								
				//}
			//}
			
		} else {
			tipo_precio_webcontrol1.onLoad();	
		}						
	}
	
	/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);	
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
}

/*var tipo_precio_webcontrol1 = new tipo_precio_webcontrol();*/

//Para ser llamado desde otro archivo (import)
export {tipo_precio_evento_webcontrol};

/*,tipo_precio_webcontrol1*/

//Para ser llamado desde window.opener
/*window.tipo_precio_webcontrol1 = tipo_precio_webcontrol1;*/


if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
	/*window.onload = tipo_precio_webcontrol1.onLoadWindow; */
}

/*
*/

//</script>