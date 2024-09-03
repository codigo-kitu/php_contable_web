//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../General/Constantes.js';
import {FuncionGeneral,funcionGeneral} from '../General/FuncionGeneral.js';


class GeneralEntityWebControl {
		
	constructor(termino_pago_control) {	
	
	}
	
	test() {
		//alert("here");
	}
	
	actualizarPaginaFormularioAdd(obj_control) {
		
	}
	
	seleccionarActualPaginaFormularioAdd(obj_control) {
		
	}	
	
	actualizarPaginaEjecutarJavaScript(objetoControl) {
		eval(objetoControl.strFuncionJs);
	}
	
	actualizarPaginaImprimir(objetoControl,name) {
					//alert("GeneralEntityWebControl");
		
		
		funcionGeneral.printWebPartPage(name,objetoControl.htmlTablaReporteAuxiliars);			
			
					//jQuery("#divTablaDatosReporteAuxiliartipo_forma_pagosAjaxWebPart").html(objetoControl.htmlTablaReporteAuxiliars);						
					//funcionGeneral.printWebPartPage("tipo_forma_pago",jQuery("#divTablaDatosReporteAuxiliartipo_forma_pagosAjaxWebPart").html());			
	}
	
	imprimirPaginaImprimirWithStyles(name) {
		
		funcionGeneral.printWebPartPageWithStyles("Datos Tabla",jQuery("#divTablaDatos"+name+"sAjaxWebPart").html(),"center","TABLA",name.toLowerCase(),name);			
	}
	
	imprimirPaginaFormImprimirWithStyles(name) {
		var htmlReport="";
		
		htmlReport=jQuery("#tr"+name+"Elementos").html();	
		//alert("Print formulario");
		// funcionGeneral.printWebPartPageWithStyles("Datos
		// Formulario",jQuery("#divMantenimientoTipoGuiaRemisionAjaxWebPart").html(),"FORMULARIO","tipoguiaremision","TipoGuiaRemision");
		funcionGeneral.printWebPartPageWithStyles("Datos Formulario",htmlReport,"center","FORMULARIO",name.toLowerCase(),name);
					
	}
}

export {GeneralEntityWebControl};

//</script>