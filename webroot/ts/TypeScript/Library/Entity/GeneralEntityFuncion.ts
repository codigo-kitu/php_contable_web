//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../General/Constantes';
import {FuncionGeneral,funcionGeneral} from '../General/FuncionGeneral';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../General/FuncionGeneralJQuery';

class GeneralEntityFuncion {
		
	constructor(termino_pago_funcion:any) {	
	
	}
	
	test() {
		//alert("here");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/
	
	procesarInicioProceso(objetoConstante:any) {		
		funcionGeneral.procesarInicioProceso(); //objetoConstante.STR_RELATIVE_PATH
	}
	
	procesarFinalizacionProceso(objetoConstante:any,name:string) {
		funcionGeneralJQuery.procesarFinalizacionProceso(objetoConstante.STR_RELATIVE_PATH,name);		
	}
	
	//------------- Procesar-Link -------------------
	
	procesarFinalizacionProcesoAbrirLink(objetoConstante:any,name:string) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(objetoConstante.STR_RELATIVE_PATH,name);		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo:string,strLink:string,name:string) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,name);
	}
	
	//------------- Procesar-Simple -------------------
	
	procesarInicioProcesoSimple(objetoConstante:any) {		
		funcionGeneral.procesarInicioProcesoSimple(); //objetoConstante.STR_RELATIVE_PATH
	}
	
	procesarFinalizacionProcesoSimple(objetoConstante:any,name:string) {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(objetoConstante.STR_RELATIVE_PATH,name);
	}
	
	/*---------------------------------- AREA:AUXILIAR-GENERAL ---------------------------*/
	
	esPaginaForm(objetoConstante:any) {
		var bitRetorno =false;
		
		if(objetoConstante.BIT_CON_PAGINA_FORM==true && objetoConstante.BIT_ES_PAGINA_FORM==true) {
			bitRetorno =true;
		}
		
		return bitRetorno;
	}
	
	resaltarRestaurarDivMantenimiento(bitEsResaltar:boolean,name:string) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,name);
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar:boolean,name:string) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,name);
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar:boolean,name:string) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,name);
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar:boolean,strMensaje:string,strTipo:string) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	//------------- Auxiliar-Mostrar-Mensaje -------------------
	
	mostrarDivMensaje(bitEsResaltar:boolean,strMensaje:string,strTipo:string) {
		funcionGeneral.mostrarDivMensaje(jQuery("#divMensajePage"),jQuery("#spanIcoMensajePage"),jQuery("#spanMensajePage"),jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"),bitEsResaltar,strMensaje,strTipo);	
	}
	
	mostrarMensaje(bitEsResaltar:boolean,strMensaje:string,strTipo:string) {
		this.resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo);
		this.mostrarDivMensaje(bitEsResaltar,strMensaje,strTipo);
	}
}

export {GeneralEntityFuncion};

//</script>