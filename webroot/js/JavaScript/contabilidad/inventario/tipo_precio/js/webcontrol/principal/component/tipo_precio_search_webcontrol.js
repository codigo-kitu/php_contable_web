//<script type="text/javascript" language="javascript">



//var tipo_precioJQueryPaginaWebInteraccion= function (tipo_precio_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../../../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../../../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_precio_constante,tipo_precio_constante1} from '../../../util/tipo_precio_constante.js';
import {tipo_precio_funcion,tipo_precio_funcion1} from '../../../util/principal/tipo_precio_funcion.js';
import {tipo_precio_toolbar_webcontrol} from '../../../webcontrol/principal/component/tipo_precio_toolbar_webcontrol.js';

class tipo_precio_search_webcontrol extends tipo_precio_toolbar_webcontrol {
	
	constructor() {	
		super();
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	cargarCombosFK(tipo_precio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 
				tipo_precio_webcontrol1.cargarCombosempresasFK(tipo_precio_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_precio_control.strRecargarFkTiposNinguno!=null && tipo_precio_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_precio_control.strRecargarFkTiposNinguno!='') {
			
				if(tipo_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTiposNinguno,",")) { 
					tipo_precio_webcontrol1.cargarCombosempresasFK(tipo_precio_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(tipo_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,tipo_precio_funcion1,tipo_precio_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	recargarUltimaInformacionDesdeHijo() {
		this.getThis().recargarUltimaInformaciontipo_precio();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tipo_precio",id,"inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		tipo_precio_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("tipo_precio","empresa","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
	}
	
	
	actualizarVariablesPaginaAccionRecargarInformacion(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarPaginaCargaCombosFK(tipo_precio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.getThis().cargarCombosFK(tipo_precio_control);			
	}
	
	actualizarPaginaAreaBusquedas(tipo_precio_control) {
		jQuery("#divBusquedatipo_precioAjaxWebPart").css("display",tipo_precio_control.strPermisoBusqueda);
		jQuery("#trtipo_precioCabeceraBusquedas").css("display",tipo_precio_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_precio").css("display",tipo_precio_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tipo_precio_control.htmlTablaOrderBy!=null
			&& tipo_precio_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytipo_precioAjaxWebPart").html(tipo_precio_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tipo_precio_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tipo_precio_control.htmlTablaOrderByRel!=null
			&& tipo_precio_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltipo_precioAjaxWebPart").html(tipo_precio_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatipo_precioAjaxWebPart").css("display","none");
			jQuery("#trtipo_precioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatipo_precio").css("display","none");			
		}
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tipo_precio_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.getThis().actualizarCssBusquedas(tipo_precio_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tipo_precio_control) {
		
		if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+tipo_precio_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",tipo_precio_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+tipo_precio_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",tipo_precio_control.strVisibleFK_Idempresa);
		}

	}
}

export {tipo_precio_search_webcontrol};

//</script>