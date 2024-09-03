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
import {tipo_precio_params_search_webcontrol} from '../../../webcontrol/principal/component/tipo_precio_params_search_webcontrol.js';

class tipo_precio_table_webcontrol extends tipo_precio_params_search_webcontrol {
	
	constructor() {	
		super();
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tipo_precio_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatostipo_precios").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualtipo_precio");

			tipo_precio_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionprecio_producto").click(function(){
		jQuery("#tblTablaDatostipo_precios").on("click",".imgrelacionprecio_producto", function () {

			var idActual=jQuery(this).attr("idactualtipo_precio");

			tipo_precio_webcontrol1.registrarSesionParaprecio_productos(idActual);
		});				
	}
	
	

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_precio","cliente","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1,"s","");
	}

	registrarSesionParaprecio_productos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_precio","precio_producto","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1,"s","");
	}
	
	registrarControlesTableEdition(tipo_precio_control) {
		tipo_precio_funcion1.registrarControlesTableValidacionEdition(tipo_precio_control,tipo_precio_webcontrol1,tipo_precio_constante1);			
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_precio");

			tipo_precio_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionprecio_producto").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_precio");

			tipo_precio_webcontrol1.registrarSesionParaprecio_productos(idActual);
		});
		
	}
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precioConstante,strParametros);
		
		//tipo_precio_funcion1.cancelarOnComplete();
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tipo_precio_control) {
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_precio_control) {
		this.getThis().actualizarPaginaAbrirLink(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionEliminarTabla(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		//this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);				
	}
	
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(tipo_precio_control) {
		
		if(!tipo_precio_control.bitConEditar) {
			this.getThis().actualizarPaginaTablaDatosJsTemplate(tipo_precio_control);
		} else {
			jQuery("#divTablaDatostipo_preciosAjaxWebPart").html(tipo_precio_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostipo_precios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostipo_precios=jQuery("#tblTablaDatostipo_precios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tipo_precio",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tipo_precio_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tipo_precio_webcontrol1.registrarControlesTableEdition(tipo_precio_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tipo_precio_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(tipo_precio_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("tipo_precio_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tipo_precio_control);
		
		const divTablaDatos = document.getElementById("divTablaDatostipo_preciosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}
	
	actualizarPaginaTablaFilaActual(tipo_precio_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tipo_precio_control.tipo_precioActual!=null) {//form
			
			this.getThis().actualizarCamposFilaTabla(tipo_precio_control);			
		}
	}
	
	actualizarCamposFilaTabla(tipo_precio_control) {
		var i=0;
		
		i=tipo_precio_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tipo_precio_control.tipo_precioActual.id);
		jQuery("#t-version_row_"+i+"").val(tipo_precio_control.tipo_precioActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(tipo_precio_control.tipo_precioActual.versionRow);
		
		if(tipo_precio_control.tipo_precioActual.id_empresa!=null && tipo_precio_control.tipo_precioActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != tipo_precio_control.tipo_precioActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(tipo_precio_control.tipo_precioActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(tipo_precio_control.tipo_precioActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(tipo_precio_control.tipo_precioActual.nombre);
	}
	
	actualizarPaginaAreaAuxiliarResumen(tipo_precio_control) {
		jQuery("#divResumentipo_precioActualAjaxWebPart").html(tipo_precio_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_precio_control) {
		//jQuery("#divAccionesRelacionestipo_precioAjaxWebPart").html(tipo_precio_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("tipo_precio_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tipo_precio_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionestipo_precioAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		tipo_precio_webcontrol1.registrarDivAccionesRelaciones();
	}
}

export {tipo_precio_table_webcontrol};

//</script>