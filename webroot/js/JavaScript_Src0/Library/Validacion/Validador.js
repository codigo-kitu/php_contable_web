//<script type="text/javascript" language="javascript">

//<!--
class Validador() {
	formulario=null;
	
	constructor(formulario) {
		this.formulario = formulario;
	}		
	
	Expresiones() {
		for (var i=0; i<arguments.length; i+=3) {
			try {
				this.formulario[arguments[i]].setAttribute("expresion", arguments[i+1]);
				this.formulario[arguments[i]].setAttribute("nombre", arguments[i+2]);
			} catch(e) {
				this.formulario[arguments[i]][0].setAttribute("expresion", arguments[i+1]);
				this.formulario[arguments[i]][0].setAttribute("nombre", arguments[i+2]);
			}
		}
	}
	
	SinExpresiones() {
		for (var i=0; i<arguments.length; i++) {
			this.formulario[arguments[i]].setAttribute("expresion", "");
			this.formulario[arguments[i]].setAttribute("nombre", "");
		}
	}
	
	emailValido(email) {
		if (window.RegExp) {
			var reg1str = "(@.*@)|(\\.\\.)|(@\\.)|(\\.@)|(^\\.)";
			var reg2str = "^.+\\@(\\[?)[a-zA-Z0-9\\-\\.]+\\.([a-zA-Z]{2,3}|[0-9]{1,3})(\\]?)$";
			var reg1 = new RegExp(reg1str);
			var reg2 = new RegExp(reg2str);
			if (!reg1.test(email) && reg2.test(email)) {
				return true;
			} else {
				return false;
			};
		} else if(email.indexOf("@") >= 0) {
			return true;
		} else {
			return false;
		}
	}

	fechaValida(fecha) {
		var s = fecha.split("-");
		if (s.length != 3) return false;
		
		var d=s[2]*1;
		var m=s[1];
		var a=s[0];
		
		var dia = parseInt(d);
		var mes = parseInt(m);
		var anio = parseInt(a);
		
		//alert(dia+"-"+mes+"-"+anio)
		var d = new Date(anio, mes-1, dia);
		if (anio != d.getFullYear() || mes-1 != d.getMonth() || dia != d.getDate()) {
			return false;
		} else {
			return true;
		}
	}
	
	CumpleRegExp(patron, valor) {
		//alert(patron+valor)
		var regularExpresion = new RegExp(patron);
		//	alert(regularExpresion)
		var resultado = regularExpresion.exec(valor);
		if (resultado == null) return false;
		return (resultado.length == 1);
	}
	
	cedulaValida(cedula) {
		//Valida que la c�dula sea de la forma ddddddddd-d
		//if (! this.CumpleRegExp(/\d{9}-\d{1}/, cedula)) return false;
		//Valida que el # formado por los dos primeros d�gitos est� entre 1 y 21
		var dosPrimerosDigitos = parseInt(cedula.substr(0, 2), 10);
		if (dosPrimerosDigitos < 1 || dosPrimerosDigitos > 21) return false;

		//Valida que el valor acumulado entre los primeros 9 n�meros coincida con el �ltimo
		var acumulado = 0, digito, aux;
		for (var i=1; i<=9; i++) {
			digito = parseInt(cedula.charAt(i-1));
			if (i % 2 == 0) { //si est� en una posici�n par
				acumulado += digito;
			} else { //si est� en una posici�n impar
				aux = 2 * digito;
				if (aux > 9) aux -= 9;
				acumulado += aux;
			}
		}

		acumulado = 10 - (acumulado % 10);
		if (acumulado == 10 ) acumulado = 0;

		var ultimoDigito = parseInt(cedula.charAt(9));
		if (ultimoDigito != acumulado) return false;
		
		//La c�dula es v�lida
		return true;
	}
	
	validar() {
		var elemento, expresion, nombre, otroNombre, atomos, subAtomos, i;
		
		for (var e=0; e<this.formulario.length; e++) {
			elemento = this.formulario.elements.item(e);
			expresion = elemento.getAttribute("expresion");
			nombre = elemento.getAttribute("nombre");
			if (expresion != null) {
				atomos = expresion.split("|");
				for (i=0; i<atomos.length; i++) {
					switch(atomos[i]) {
						case "v":
							if (!elemento.value) {
								alert("- Ingresa un valor para " + nombre + ".");
								elemento.focus();
								return false;
							}
							break;
						case "hb":
							if (elemento.value == -1) {
								alert("- Debes seleccionar por lo menos un " + nombre + ".");
								return false;
							}
							break;

						case "e":
							if (! this.EmailValido(elemento.value)) {
								alert(constantes.STR_MENSAJE_VALOR_INGRESASTE + nombre + constantes.STR_MENSAJE_NOES_VALIDO);
								elemento.focus();
								elemento.select();
								return false;
							}
							break;
						case "f":
							if (! this.FechaValida(elemento.value)) {
								alert(constantes.STR_MENSAJE_VALOR_INGRESASTE + nombre + constantes.STR_MENSAJE_NOES_VALIDO);
								elemento.focus();
								elemento.select();
								return false;
							}
							break;					
						case "c":
							if (! this.CedulaValida(elemento.value)) {
								alert(constantes.STR_MENSAJE_VALOR_INGRESASTE + nombre + constantes.STR_MENSAJE_NOES_VALIDO);
								elemento.focus();
								elemento.select();
								return false;
							}
							break;
						case "nn": //N�mero natural
							var esNatural = true;
							if (isNaN(elemento.value)) {
								esNatural = false;
							} else if (parseInt(elemento.value) < 0) {
								esNatural = false;
							} else if (elemento.value.indexOf(".") >= 0) {
								esNatural = false;
							}
							if (! esNatural) {
								alert(constantes.STR_MENSAJE_VALOR_INGRESASTE + nombre + constantes.STR_MENSAJE_NOES_VALIDO);
								elemento.focus();
								elemento.select();
								return false;
							}
							break;
						case "nep": //N�mero entero positivo
							var esEnteroPositivo = true;
							if (isNaN(elemento.value)) {
								esEnteroPositivo = false;
							} else if (parseFloat(elemento.value) < 0) {
								esEnteroPositivo = false;
							}
							if (! esEnteroPositivo) {
								alert(constantes.STR_MENSAJE_VALOR_INGRESASTE + nombre + constantes.STR_MENSAJE_NOES_VALIDOS);
								elemento.focus();
								elemento.select();
								return false;
							}
							break;
						case "ch": //Alg�n valor seleccionado (checked) para radio o checkbox
							elemento = this.formulario[elemento.name];
							var seleccionado = false;
							if (elemento.length == null) {
								seleccionado = elemento.checked;
							} else {
								for (var j = 0; j < elemento.length; j++) {
									if (elemento[j].checked) {
										seleccionado = true;
										break;
									}
								}
							}
							if (! seleccionado) {
								alert("- Por favor selecciona un " + nombre + ".");
								return false;
							}
						default:
							subAtomos = atomos[i].split(":");							
							switch(subAtomos[0]) {
								case "i":
									otroElemento = this.formulario[subAtomos[1]];
									otroNombre = otroElemento.getAttribute("nombre");
									if (elemento.value != otroElemento.value) {
										alert("Los valores de " + otroNombre + " y " + nombre + " deben coincidir.");
										elemento.focus();
										elemento.select();
										return false;
									}
									break;
									//evalua una expresion
								case "re":
								//alert(subAtomos[1])
									if (! this.CumpleRegExp(subAtomos[1], elemento.value)) {
										alert(constantes.STR_MENSAJE_VALOR_INGRESASTE + nombre + constantes.STR_MENSAJE_NOES_VALIDO);
										elemento.focus();
										elemento.select();
										return false;
									}
									break;
									//verifica que el valor sea maximo al dado
								case "mx":
									var tope = parseFloat(subAtomos[1]);
									if (parseFloat(elemento.value) > tope) {
										alert(constantes.STR_MENSAJE_VALOR_INGRESASTE + nombre + " debe ser menor o igual que " + subAtomos[1] + ".");
										elemento.focus();
										elemento.select();
										return false;
									}
									break;
									//verifica que el valor sea menor al dado
								case "mn":
									var tope = parseFloat(subAtomos[1]);
									if (parseFloat(elemento.value) < tope) {
										alert(nombre);
										
										return false;
									}
									break;							
							}
					}
				}
			}
		}
		
		return true;
	}
}

var validador=new Validador(null);
//-->

//</script>