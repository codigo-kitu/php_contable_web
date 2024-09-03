//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {ejercicio_constante,ejercicio_constante1} from '../util/ejercicio_constante.js';


class ejercicio_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/
/*---------- Clic-Buscar ----------*/
	buscarOnClick() { 
		this.procesarInicioBusqueda(); 
	}
	
	buscarOnComplete() { 
		this.procesarFinalizacionBusqueda(); 
	}
	
	buscarFksOnClick() { 
		super.procesarInicioProceso(ejercicio_constante1); 
	}
	
	
/*---------- Clic-Buscar-Auxiliar ----------*/
	procesarInicioBusqueda() { 
		funcionGeneral.procesarInicioBusquedaPrincipal(ejercicio_constante1.STR_RELATIVE_PATH,"ejercicio"); 
	}
	
	procesarFinalizacionBusqueda() { 
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(ejercicio_constante1.STR_RELATIVE_PATH,ejercicio_constante1.STR_NOMBRE_OPCION,"ejercicio"); 
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
		super.resaltarRestaurarDivMantenimiento(true,"ejercicio");		
		super.procesarInicioProceso(ejercicio_constante1);
	}
	
	seleccionarOnComplete() { 
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
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
		funcionGeneral.generarReporteFinalizacion(ejercicio_constante1.STR_RELATIVE_PATH,ejercicio_constante1.STR_NOMBRE_OPCION); 
	}
/*---------- Clic-Generar-Html -----------*/
	generarHtmlReporteOnClick() { 
		super.procesarInicioProceso(ejercicio_constante1); 
	}
	
	generarHtmlReporteOnComplete() { 
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
	}
/*------------- Clic-Actualizar -------------	*/
	editarTablaDatosOnClick() { 
		super.procesarInicioProceso(ejercicio_constante1); 
	}
	
	editarTablaDatosOnComplete() { 
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
	}
/*------------- Clic-Eliminar --------------*/
	eliminarTablaOnClick() {
		/*super.resaltarRestaurarDivMantenimiento(true,"ejercicio");*/
		super.procesarInicioProceso(ejercicio_constante1);
	}
	
	eliminarTablaOnComplete() { 
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
	}
/*------------ Clic-Guardar-Cambios --------------*/
	guardarCambiosOnClick() { 
		super.procesarInicioProceso(ejercicio_constante1); 
	}
	
	guardarCambiosOnComplete() { 
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
	}
/*------------ Clic-Duplicar --------------------*/
	duplicarOnClick() { 
		super.procesarInicioProceso(ejercicio_constante1); 
	}
	
	duplicarOnComplete() { 
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
	}
/*-------------- Clic-Copiar -------------------*/
	copiarOnClick() { 
		super.procesarInicioProceso(ejercicio_constante1); 
	}
	
	copiarOnComplete() { 
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
/*------------- Tabla-Validacion -------------------*/
	registrarControlesTableValidacionEdition(ejercicio_control,ejercicio_webcontrol1,ejercicio_constante1) {
		
		var strSuf=ejercicio_constante1.STR_SUFIJO;
		
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
				

				control_name="t"+strSuf+"-cel_"+i+"_3";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });

				control_name="t"+strSuf+"-cel_"+i+"_4";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:100';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
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
		
		jQuery("#frmTablaDatosejercicio").validate(json_rules);
		
		//VALIDACION	
	}
	
/*---------- Clic-Nuevo --------------*/
	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"ejercicio");		
		super.procesarInicioProceso(ejercicio_constante1);
	}
	
	nuevoPrepararOnComplete() { 
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
	}
	
	nuevoTablaPrepararOnClick() { 
		super.procesarInicioProceso(ejercicio_constante1); 
	}
	
	nuevoTablaPrepararOnComplete() { 
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
	}
	




		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(ejercicio_constante1.STR_RELATIVE_PATH,"ejercicio"); 
	}
	
	eliminarOnComplete() {
	
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(ejercicio_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(ejercicio_constante1,"ejercicio"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"ejercicio"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(ejercicio_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(ejercicio_constante1,"ejercicio");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,ejercicio_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
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

var ejercicio_funcion1=new ejercicio_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {ejercicio_funcion,ejercicio_funcion1};

/*Para ser llamado desde window.opener*/
window.ejercicio_funcion1 = ejercicio_funcion1;



//</script>
