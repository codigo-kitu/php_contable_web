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
import {tipo_precio_search_webcontrol} from '../../../webcontrol/principal/component/tipo_precio_search_webcontrol.js';

class tipo_precio_params_search_webcontrol extends tipo_precio_search_webcontrol {
		
	constructor() {	
		super();
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(tipo_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa",tipo_precio_control.empresasFK);

		if(tipo_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+tipo_precio_control.idFilaTablaActual+"_3",tipo_precio_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(tipo_precio_control) {

	};

	
	
	setDefectoValorCombosempresasFK(tipo_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(tipo_precio_control.idempresaDefaultFK>-1 && jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val() != tipo_precio_control.idempresaDefaultFK) {
				jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val(tipo_precio_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	onLoadCombosDefectoFK(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 
				tipo_precio_webcontrol1.setDefectoValorCombosempresasFK(tipo_precio_control);
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
	onLoadCombosEventosFK(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				tipo_precio_webcontrol1.registrarComboActionChangeCombosempresasFK(tipo_precio_control);
			//}

		}
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);				
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);		
	}	
	
	actualizarVariablesPaginaAccionEditarTablaDatos(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_precio_control) {
					//this.getThis().getSuper().actualizarPaginaImprimir(tipo_precio_control,"tipo_precio");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_precio_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("tipo_precio_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tipo_precio_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.getThis().actualizarPaginaAbrirLink(tipo_precio_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_precio_control) {
		//this.getSuper().actualizarPaginaImprimir(tipo_precio_control,"tipo_precio");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("tipo_precio_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(tipo_precio_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_precio_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.getThis().actualizarPaginaAbrirLink(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tipo_precio_control) {
		//this.getSuper().actualizarPaginaImprimir(tipo_precio_control,"tipo_precio");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("tipo_precio_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tipo_precio_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_precio_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.getThis().actualizarPaginaAbrirLink(tipo_precio_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(tipo_precio_control) {
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tipo_precio_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.getThis().actualizarPaginaGuardarReturnSession(tipo_precio_control);
			
		this.getThis().actualizarPaginaAbrirLink(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);
		this.getThis().actualizarPaginaFormulario(tipo_precio_control);
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarPaginaOrderBy(tipo_precio_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(tipo_precio_control);
		
		const divOrderBy = document.getElementById("divOrderBytipo_precioAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(tipo_precio_control);
		
		const divOrderByRel = document.getElementById("divOrderByReltipo_precioAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
}

export {tipo_precio_params_search_webcontrol};

//</script>