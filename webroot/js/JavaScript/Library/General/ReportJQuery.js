//<script type="text/javascript" language="javascript">

class Report {
	//mapaCargado=false;
	
	onLoadWindow() {
		report1.cargarReporte();	
	}
	
	cargarReporte() {
		
		let htmlTablaReporteAuxiliars=sessionStorage.getItem("htmlTablaReporteAuxiliars");
		//alert(htmlTablaReporteAuxiliars);
		
		sessionStorage.removeItem("htmlTablaReporteAuxiliars");
		
		//debugger;
		
		//alert(cuenta_corrienteReturnGeneral.sAuxiliarTipo);
		
		
		const divReporte = document.getElementById("divReporte");

		//let html_template_cuentas = document.getElementById("cuentas_template").innerHTML;
    
	    //let template_cuentas = Handlebars.compile(html_template_cuentas);
	
	    //let html_cuentas = template_cuentas(cuenta_corrienteReturnGeneral);
	
	    divReporte.innerHTML=htmlTablaReporteAuxiliars;
	}
	

	/*
	handleLeftSideSliderChange(e, ui) {
	  var maxScroll = jQuery("#leftSidebar")[0].scrollWidth -  jQuery("#leftSidebar").width();
	  
	  jQuery("#leftSidebar").animate({scrollLeft: ui.value * (maxScroll / 100) }, 1000);
	}
	*/			
}

var report1=new Report();

export {Report,report1};

window.onload = report1.onLoadWindow; 

//</script>