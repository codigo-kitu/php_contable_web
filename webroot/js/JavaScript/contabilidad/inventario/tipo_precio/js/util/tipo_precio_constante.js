//<script type="text/javascript" language="javascript">

//var tipo_precioConstante= function () {

import {GeneralEntityConstante} from '../../../../../Library/Entity/GeneralEntityConstante.js';

class tipo_precio_constante extends GeneralEntityConstante {
	
	STR_TYPE_ON_LOADtipo_precio="onload";
	STR_TIPO_PAGINA_AUXILIARtipo_precio="none";
	STR_TIPO_USUARIO_AUXILIARtipo_precio="none";
	TIPO_PRECIO="tipo_precio";
	
	constructor() {
		
		super();
		
		this.BIT_TIENE_CAMPOS_TOTALES=false;
		this.STR_RELATIVE_PATH="../";
		this.STR_NOMBRE_PAGINA="tipo_precioView";
		this.STR_NOMBRE_OPCION="inventario.tipo_precios";
		this.BIT_CON_PAGINA_FORM=true;//Funcionalidad Pagina Formulario
		this.SERVLET="tipo_precioServlet";
	}
}	

var tipo_precio_constante1=new tipo_precio_constante(); //var

//Para ser llamado desde otro archivo (import)
export {tipo_precio_constante,tipo_precio_constante1};

//</script>

