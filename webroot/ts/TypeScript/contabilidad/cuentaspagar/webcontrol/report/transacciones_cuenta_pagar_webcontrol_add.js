<script type="text/javascript" language="javascript">

class transacciones_cuenta_pagar_webcontrol_add extends GeneralEntityWebControl  {
	
	constructor() {
		super();
	}
	
	onLoadWindowAdditional() {
		let transacciones_cuenta_pagarReturnGeneral = JSON.parse(sessionStorage.getItem("transacciones_cuenta_pagarReturnGeneral"));
		
		if(transacciones_cuenta_pagarReturnGeneral != null) {
			
			sessionStorage.removeItem("transacciones_cuenta_pagarReturnGeneral");
					
			const divDatos = document.getElementById("divDatos");
			
			let html_template_datos = document.getElementById("datos_template").innerHTML;
			
			let template_datos = Handlebars.compile(html_template_datos);
			
			let html_datos = template_datos(transacciones_cuenta_pagarReturnGeneral);
			
			divDatos.innerHTML = html_datos;
		}
	}
}

var transacciones_cuenta_pagar_webcontrol_add1=new transacciones_cuenta_pagar_webcontrol_add(); //var

if(transacciones_cuenta_pagar_constante1.BIT_ES_PAGINA_ADDITIONAL) {
	window.onload = transacciones_cuenta_pagar_webcontrol_add1.onLoadWindowAdditional; 
}

</script>

