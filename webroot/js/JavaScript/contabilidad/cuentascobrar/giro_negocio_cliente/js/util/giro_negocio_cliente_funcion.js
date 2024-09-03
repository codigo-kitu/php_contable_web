//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {giro_negocio_cliente_constante,giro_negocio_cliente_constante1} from '../util/giro_negocio_cliente_constante.js';


class giro_negocio_cliente_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/
/*---------- Clic-Buscar ----------*/
	buscarOnClick() { 
		this.procesarInicioBusqueda(); 
	}
	
	buscarOnComplete() { 
		this.procesarFinalizacionBusqueda(); 
	}
	
	buscarFksOnClick() { 
		super.procesarInicioProceso(giro_negocio_cliente_constante1); 
	}
	
	
/*---------- Clic-Buscar-Auxiliar ----------*/
	procesarInicioBusqueda() { 
		funcionGeneral.procesarInicioBusquedaPrincipal(giro_negocio_cliente_constante1.STR_RELATIVE_PATH,"giro_negocio_cliente"); 
	}
	
	procesarFinalizacionBusqueda() { 
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(giro_negocio_cliente_constante1.STR_RELATIVE_PATH,giro_negocio_cliente_constante1.STR_NOMBRE_OPCION,"giro_negocio_cliente"); 
	}
/*---------- Clic-Siguiente ----------*/
	siguientesOnClick() { 
		this.procesarInicioBusqueda(); 
	}
	
	siguientesOnComplete() { 
		this.procesarFinalizacionBusqueda(); 
	}
/*----------- Clic-Anteriores ---------*/
	anterioresOnClick() { 
		this.procesarInicioBusqueda(); 
	}
	
	anterioresOnComplete() { 
		this.procesarFinalizacionBusqueda(); 
	}
/*---------- Clic-Seleccionar ----------*/
	seleccionarOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"giro_negocio_cliente");		
		super.procesarInicioProceso(giro_negocio_cliente_constante1);
	}
	
	seleccionarOnComplete() { 
		super.procesarFinalizacionProceso(giro_negocio_cliente_constante1,"giro_negocio_cliente"); 
	}
	
	
	seleccionarMostrarDivAccionesRelacionesActualOnClick() { 
		super.procesarInicioProceso(giro_negocio_cliente_constante1); 
	}
	
	seleccionarMostrarDivAccionesRelacionesActualOnComplete() { 
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("giro_negocio_cliente",this,giro_negocio_cliente_constante1); 
	}
/*---------- Clic-Reporte ----------------*/
	generarReporteOnClick() { 
		this.generarReporteInicio(); 
	}
	
	generarReporteOnComplete() { 
		this.generarReporteFinalizacion(); 
	}
	
	generarReporteInicio() { 
		funcionGeneral.mostrarOcultarProcesando(true,null); 
	}
	
	generarReporteFinalizacion() { 
		funcionGeneral.generarReporteFinalizacion(giro_negocio_cliente_constante1.STR_RELATIVE_PATH,giro_negocio_cliente_constante1.STR_NOMBRE_OPCION); 
	}
/*---------- Clic-Generar-Html -----------*/
	generarHtmlReporteOnClick() { 
		super.procesarInicioProceso(giro_negocio_cliente_constante1); 
	}
	
	generarHtmlReporteOnComplete() { 
		super.procesarFinalizacionProceso(giro_negocio_cliente_constante1,"giro_negocio_cliente"); 
	}
/*------------- Clic-Actualizar -------------	*/
	editarTablaDatosOnClick() { 
		super.procesarInicioProceso(giro_negocio_cliente_constante1); 
	}
	
	editarTablaDatosOnComplete() { 
		super.procesarFinalizacionProceso(giro_negocio_cliente_constante1,"giro_negocio_cliente"); 
	}
/*------------- Clic-Eliminar --------------*/
	eliminarTablaOnClick() {
		/*super.resaltarRestaurarDivMantenimiento(true,"giro_negocio_cliente");*/
		super.procesarInicioProceso(giro_negocio_cliente_constante1);
	}
	
	eliminarTablaOnComplete() { 
		super.procesarFinalizacionProceso(giro_negocio_cliente_constante1,"giro_negocio_cliente"); 
	}
/*------------ Clic-Guardar-Cambios --------------*/
	guardarCambiosOnClick() { 
		super.procesarInicioProceso(giro_negocio_cliente_constante1); 
	}
	
	guardarCambiosOnComplete() { 
		super.procesarFinalizacionProceso(giro_negocio_cliente_constante1,"giro_negocio_cliente"); 
	}
/*------------ Clic-Duplicar --------------------*/
	duplicarOnClick() { 
		super.procesarInicioProceso(giro_negocio_cliente_constante1); 
	}
	
	duplicarOnComplete() { 
		super.procesarFinalizacionProceso(giro_negocio_cliente_constante1,"giro_negocio_cliente"); 
	}
/*-------------- Clic-Copiar -------------------*/
	copiarOnClick() { 
		super.procesarInicioProceso(giro_negocio_cliente_constante1); 
	}
	
	copiarOnComplete() { 
		super.procesarFinalizacionProceso(giro_negocio_cliente_constante1,"giro_negocio_cliente"); 
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
/*------------- Tabla-Validacion -------------------*/
	registrarControlesTableValidacionEdition(giro_negocio_cliente_control,giro_negocio_cliente_webcontrol1,giro_negocio_cliente_constante1) {
		
		var strSuf=giro_negocio_cliente_constante1.STR_SUFIJO;
		
		var maxima_fila = jQuery("#t"+strSuf+"-maxima_fila").val();
		var control_name="";
		var control_name_id="";
		var idActual="";
		
		//VALIDACION
		var strRules="";
		var strRulesMessage="";
		var strRulesTotal="";
		
		strRules="{\r\nrules: {";
		strRulesMessage=",messages: {\r\n";
		
		var esPrimerRule=true;
		//VALIDACION
		
		funcionGeneralJQuery.addValidacionesFuncionesGenerales();
		
		if(maxima_fila!=null && maxima_fila > 0) {
			for (var i = 1; i <= maxima_fila; i++) { 
				/*		
				control_name="t-cel_"+i+"_8";							
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });							
				alert(jQuery("#"+control_name).val());
				*/
				
				//ADD CONTROLES FECHA-HORA
				
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:100';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				
				//FK CHECKBOX EVENTOS FIN
			}					
		}
				
		//VALIDACION
		strRules=strRules+'\r\n}\r\n';
		strRulesMessage=strRulesMessage+'\r\n}\r\n}';		
		strRulesTotal=strRules + strRulesMessage;
		
		var json_rules = {};
		
		//alert(strRulesTotal);		
		
		json_rules = eval ('(' + strRulesTotal + ')');				
						
		//alert(json_rules);
		
		jQuery("#frmTablaDatosgiro_negocio_cliente").validate(json_rules);
		
		//VALIDACION	
	}
	
/*---------- Clic-Nuevo --------------*/
	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"giro_negocio_cliente");		
		super.procesarInicioProceso(giro_negocio_cliente_constante1);
	}
	
	nuevoPrepararOnComplete() { 
		super.procesarFinalizacionProceso(giro_negocio_cliente_constante1,"giro_negocio_cliente"); 
	}
	
	nuevoTablaPrepararOnClick() { 
		super.procesarInicioProceso(giro_negocio_cliente_constante1); 
	}
	
	nuevoTablaPrepararOnComplete() { 
		super.procesarFinalizacionProceso(giro_negocio_cliente_constante1,"giro_negocio_cliente"); 
	}
	




		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(giro_negocio_cliente_constante1.STR_RELATIVE_PATH,"giro_negocio_cliente"); 
	}
	
	eliminarOnComplete() {
	
		super.procesarFinalizacionProceso(giro_negocio_cliente_constante1,"giro_negocio_cliente");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(giro_negocio_cliente_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(giro_negocio_cliente_constante1,"giro_negocio_cliente"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(giro_negocio_cliente_constante1,"giro_negocio_cliente"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"giro_negocio_cliente"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(giro_negocio_cliente_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(giro_negocio_cliente_constante1,"giro_negocio_cliente");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
			
			else if(strValueTipoColumna=="Id") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Created At") {
				jQuery(".col_created_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Updated At") {
				jQuery(".col_updated_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Predeterminado") {
				jQuery(".col_predeterminado").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,giro_negocio_cliente_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cliente" || strValueTipoRelacion=="Cliente") {
			giro_negocio_cliente_webcontrol1.registrarSesionParaclientes(idActual);
		}
	}
	
		
	
	
	/*
		Buscar: buscarOnClick,buscarOnComplete,buscarFksOnClick
		Buscar: procesarInicioBusqueda,procesarFinalizacionBusqueda
		Siguientes: siguientesOnClick,siguientesOnComplete
		Anteriores: anterioresOnClick,anterioresOnComplete
		Seleccionar: seleccionarOnClick,seleccionarOnComplete
		Seleccionar: seleccionarMostrarDivAccionesRelacionesActualOnClick
		Seleccionar: seleccionarMostrarDivAccionesRelacionesActualOnComplete
		Reporte: generarReporteOnClick,generarReporteOnComplete,generarReporteInicio
		Reporte: generarHtmlReporteOnClick,generarHtmlReporteOnComplete
		Editar-Tabla: editarTablaDatosOnClick,editarTablaDatosOnComplete
		Eliminar-Tabla: eliminarTablaOnClick,eliminarTablaOnComplete
		Guardar-Cambios: guardarCambiosOnClick,guardarCambiosOnComplete
		Duplicar: duplicarOnClick,duplicarOnComplete,copiarOnClick,copiarOnComplete
		Tabla-Validacion: registrarControlesTableValidacionEdition
		Nuevo-Preparar: nuevoPrepararOnClick,nuevoPrepararOnComplete,nuevoTablaPrepararOnClick
		Eliminar: eliminarOnClick,eliminarOnComplete
		Procesar: procesarOnClick,procesarOnComplete,procesarFinalizacionProcesoAbrirLink
		Procesar: procesarInicioProcesoSimple,procesarFinalizacionProcesoSimple
		Relaciones: setTipoColumnaAccion,setTipoRelacionAccion
	*/
	
}

var giro_negocio_cliente_funcion1=new giro_negocio_cliente_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {giro_negocio_cliente_funcion,giro_negocio_cliente_funcion1};

/*Para ser llamado desde window.opener*/
window.giro_negocio_cliente_funcion1 = giro_negocio_cliente_funcion1;



//</script>
