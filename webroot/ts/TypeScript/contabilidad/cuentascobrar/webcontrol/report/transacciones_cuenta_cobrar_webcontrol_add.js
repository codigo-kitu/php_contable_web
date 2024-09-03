<script type="text/javascript" language="javascript">

class transacciones_cuenta_cobrar_webcontrol_add extends GeneralEntityWebControl  {
	
	constructor() {
		super();
	}
	
	onLoadWindowAdditional() {
		let transacciones_cuenta_cobrarReturnGeneral = JSON.parse(sessionStorage.getItem("transacciones_cuenta_cobrarReturnGeneral"));
		
		if(transacciones_cuenta_cobrarReturnGeneral != null) {
			
			sessionStorage.removeItem("transacciones_cuenta_cobrarReturnGeneral");
					
			const divDatos = document.getElementById("divDatos");
			
			let html_template_datos = document.getElementById("datos_template").innerHTML;
			
			let template_datos = Handlebars.compile(html_template_datos);
			
			let html_datos = template_datos(transacciones_cuenta_cobrarReturnGeneral);
			
			divDatos.innerHTML = html_datos;
		}
	}
}

var transacciones_cuenta_cobrar_webcontrol_add1=new transacciones_cuenta_cobrar_webcontrol_add(); //var

if(transacciones_cuenta_cobrar_constante1.BIT_ES_PAGINA_ADDITIONAL) {
	window.onload = transacciones_cuenta_cobrar_webcontrol_add1.onLoadWindowAdditional; 
}

</script>

