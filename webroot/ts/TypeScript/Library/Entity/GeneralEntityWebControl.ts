//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../General/Constantes';
import {FuncionGeneral,funcionGeneral} from '../General/FuncionGeneral';


class GeneralEntityWebControl {
		
	constructor(termino_pago_control:any) {	
	
	}
	
	test() {
		//alert("here");
	}
	
	actualizarPaginaFormularioAdd(obj_control:any) {
		
	}
	
	seleccionarActualPaginaFormularioAdd(obj_control:any) {
		
	}	
	
	actualizarPaginaEjecutarJavaScript(objetoControl:any) {
		eval(objetoControl.strFuncionJs);
	}
	
	actualizarPaginaImprimir(objetoControl:any,name:string) {
					//alert("GeneralEntityWebControl");
		
		
		funcionGeneral.printWebPartPage(name,objetoControl.htmlTablaReporteAuxiliars);			
			
					//jQuery("#divTablaDatosReporteAuxiliartipo_forma_pagosAjaxWebPart").html(objetoControl.htmlTablaReporteAuxiliars);						
					//funcionGeneral.printWebPartPage("tipo_forma_pago",jQuery("#divTablaDatosReporteAuxiliartipo_forma_pagosAjaxWebPart").html());			
	}
	
	imprimirPaginaImprimirWithStyles(name:string) {
		
		funcionGeneral.printWebPartPageWithStyles("Datos Tabla",jQuery("#divTablaDatos"+name+"sAjaxWebPart").html(),"center","TABLA",name.toLowerCase(),name);			
	}
	
	imprimirPaginaFormImprimirWithStyles(name:string) {
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