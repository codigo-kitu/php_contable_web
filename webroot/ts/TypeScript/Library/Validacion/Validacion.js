//IMPORT JS, NO CON ECHO
//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../General/Constantes.js';


class Validacion {
	
	validacionNinguna() {
	    return "";
	}
	// ******************************************************************
	// Valida el ingreso de campos tipo fecha formato valido ddmmyyyy
	// Modo de uso:
	//
	//               onblur="check_date(this)"
	//
	// ******************************************************************
	
	check_date(field,req) {
		var mensaje="";
		
		var checkstr = "0123456789";
		var DateField = field;
		
		if(field.value==""&&req=='s') {
			 mensaje=constantes.STR_MENSAJE_CAMPO_REQUERIDO;
			 return mensaje;
		}
		
		var Datevalue = "";
		var DateTemp = "";
		var seperator = "/";
		var day;
		var month;
		var year;
		var leap = 0;
		var err = 0;
		var i;
		
		   DateValue = DateField.value;
		   /* Delete all chars except 0..9 */
		   for (i = 0; i < DateValue.length; i++) {
			  if (checkstr.indexOf(DateValue.substr(i,1)) >= 0) {
			     DateTemp = DateTemp + DateValue.substr(i,1);
			  }
		   }
		   
		   DateValue = DateTemp;
		/* por: Gary Rivas */
		/* Lee el mes y el anio actual */
		/* para asimilar el GBS en el ingreso de fechas */
		
			fechahoy = new Date();
			Aniohoy  = fechahoy.getYear();
			Meshoy   = fechahoy.getMonth()+1;
		
		
			/* a�ade un cero a la izquierda cuando el mes es de un solo digito */
			if (("0"+ Meshoy).length == 2) { Meshoy = "0" + Meshoy;	}
			
		   if (DateValue.length == 2) { DateValue = DateValue + Meshoy + Aniohoy ; }
		
		   if (DateValue.length == 4) {	DateValue = DateValue + Aniohoy ; }
		   
		   if (DateValue.length == 6) {	
			   /* Si el a�o es mayor de 50 entonces utilice 1900 */
			   if (DateValue.substr(4,6) > 50) {anio=19;} else {anio=20;}   
			   
			   DateValue = DateValue.substr(0,4) + anio + DateValue.substr(4,6); 
		   }
		   
		   if (DateValue.length != 8) { err = 19; }
		   /* year is wrong if year = 0000 */
		   year = DateValue.substr(4,4);
		   
		   if (year == 0) { err = 20; }
		   /* Validation of month*/
		   month = DateValue.substr(2,2);
		   
		   if ((month < 1) || (month > 12)) { err = 21; }
		   /* Validation of day*/
		   day = DateValue.substr(0,2);
		   
		   if (day < 1) { err = 22; }
		   /* Validation leap-year / february / day */
		   if ((year % 4 == 0) || (year % 100 == 0) || (year % 400 == 0)) { leap = 1; }
		   
		   if ((month == 2) && (leap == 1) && (day > 29)) { err = 23; }
		   
		   if ((month == 2) && (leap != 1) && (day > 28)) { err = 24; }
		   /* Validation of other months */
		   if ((day > 31) && ((month == "01") || (month == "03") || (month == "05") || (month == "07") || (month == "08") || (month == "10") || (month == "12"))) {
		      err = 25;
		   }
		   
		   if ((day > 30) && ((month == "04") || (month == "06") || (month == "09") || (month == "11"))) {
		      err = 26;
		   }
		   /* if 00 ist entered, no error, deleting the entry */
		   if ((day == 0) && (month == 0) && (year == 00)) { err = 0; day = ""; month = ""; year = ""; seperator = ""; }
		   /* if no error, write the completed date to Input-Field (e.g. 13.12.2001) */
		   if (err == 0) { DateField.value = day + seperator +  month + seperator + year ; }
		   /* Error-message if err != 0 */
		   else {		 
		      mensaje=(constantes.STR_MENSAJE_FECHA_INCORRECTA);
		      /*DateField.select();
			  DateField.focus();*/
		   }
		   
	   return mensaje;
	}
	
	check_dateDate(date,req) {
			
		var mensaje="";
		
		var checkstr = "0123456789";
				
		if(date==""&&req=='s') {
			 mensaje=constantes.STR_MENSAJE_CAMPO_REQUERIDO;
			 return mensaje;
		}
		
		var Datevalue = "";
		var DateTemp = "";
		var seperator = "/";
		var day;
		var month;
		var year;
		var leap = 0;
		var err = 0;
		var i;
		
		var anio=date.split(seperator)[2];
		var mes=date.split(seperator)[1];
		var dia=date.split(seperator)[0];
		
		if (("0"+mes).length == 2) { 
			mes = "0" + mes;
		}
		
		if (("0"+dia).length == 2) { 
			dia= "0" + dia;
		}
		
		date=anio+seperator+mes+seperator+dia;
		//alert(date);
	   DateValue = date;
	   /* Delete all chars except 0..9 */
	   for (i = 0; i < DateValue.length; i++) {
		  if (checkstr.indexOf(DateValue.substr(i,1)) >= 0) {
		     DateTemp = DateTemp + DateValue.substr(i,1);
		  }
	   }
	   
	   DateValue = DateTemp;
	/* por: Gary Rivas */
	/* Lee el mes y el anio actual */
	/* para asimilar el GBS en el ingreso de fechas */
	
		fechahoy = new Date();
		Aniohoy  = fechahoy.getYear();
		Meshoy   = fechahoy.getMonth()+1;
	
	
		/* a�ade un cero a la izquierda cuando el mes es de un solo digito */
		if (("0"+ Meshoy).length == 2)  { 
			Meshoy = "0" + Meshoy;
		}
	
	
	   if (DateValue.length == 2) {	
		   DateValue = DateValue + Meshoy + Aniohoy ;	
	   }
	
	   if (DateValue.length == 4) {	   
		   DateValue = DateValue + Aniohoy ;	   
	   }
	   
	   if (DateValue.length == 6) {
		   /* Si el a�o es mayor de 50 entonces utilice 1900 */
		   if (DateValue.substr(4,6) > 50) {anio=19;} else {anio=20;}   
		   
		   DateValue = DateValue.substr(0,4) + anio + DateValue.substr(4,6); 
	   }
	   
	   if (DateValue.length != 8) { err = 19;}
	   /* year is wrong if year = 0000 */
	   year = DateValue.substr(4,4);
	   
	   if (year == 0) { err = 20; }
	   
	   /* Validation of month*/
	   month = DateValue.substr(2,2);
	   
	   if ((month < 1) || (month > 12)) { err = 21; }
	   /* Validation of day*/
	   day = DateValue.substr(0,2);
	   
	   if (day < 1) { err = 22; }
	   /* Validation leap-year / february / day */
	   if ((year % 4 == 0) || (year % 100 == 0) || (year % 400 == 0)) {
	      leap = 1;
	   }
	   
	   if ((month == 2) && (leap == 1) && (day > 29)) { err = 23; }
	  
	   if ((month == 2) && (leap != 1) && (day > 28)) { err = 24; }
	   /* Validation of other months */
	   if ((day > 31) && ((month == "01") || (month == "03") || (month == "05") || (month == "07") || (month == "08") || (month == "10") || (month == "12"))) {
	      err = 25;
	   }
	   
	   if ((day > 30) && ((month == "04") || (month == "06") || (month == "09") || (month == "11"))) {
	      err = 26;
	   }
	   /* if 00 ist entered, no error, deleting the entry */
	   if ((day == 0) && (month == 0) && (year == 00)) {
	      err = 0; day = ""; month = ""; year = ""; seperator = "";
	   }
	   /* if no error, write the completed date to Input-Field (e.g. 13.12.2001) */
	   if (err == 0) {
	      date = day + seperator +  month + seperator + year ;
	   }
	   /* Error-message if err != 0 */
	   else {
		   //alert(err);
	      mensaje=(constantes.STR_MENSAJE_FECHA_INCORRECTA);
	      /*DateField.select();
		  DateField.focus();*/
	   }
	   return mensaje;
	}
	
	// ******************************************************************
	// Transforma a format ###,###,###.00 cualquier numero ingresado
	// devuelve 0.00 cuando no es un numero valido
	//
	// ******************************************************************


	Format_num(num) {
		num = num.toString().replace(/\$|\,/g,'');
		if(isNaN(num))
		num = "0";
		sign = (num == (num = Math.abs(num)));
		num = Math.floor(num*100+0.50000000001);
		cents = num%100;
		num = Math.floor(num/100).toString();
		if(cents<10)
		cents = "0" + cents;
		for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
		num = num.substring(0,num.length-(4*i+3))+','+
		num.substring(num.length-(4*i+3));
		return (((sign)?'':'-') + '' + num + '.' + cents);
	}


	//HOLGER Funci�n que integra la anterior funci�n format_num, pero viendo si quiero que valide 1 decimal o un entero
	//D = Decimal; I = Entero

	Format_numDI(num, tipo) {

		if(tipo=="D") {
			return format_num(num);
		} else if (tipo=="I") {
			if(isNaN(num))
				return 0;
			else if(num.indexOf('.') > 0 ) 
				return 0;
			else 
				return num;
		} else
			return 0;	
	}


	// ******************************************************************
	// Valida el ingreso de campos numericos, se especifica rango valido
	// Modo de uso:
	//
//	               onblur="check_num(this,minimo,maximo)"
	//
	// ******************************************************************

	check_num(field,minimo,maximo,dec,req) {
		var mensaje="";
		var DateField = field;
	
		if(field.value==""&&req=='s') {
			 mensaje=constantes.STR_MENSAJE_CAMPO_REQUERIDO;
			 return mensaje;
		}
	
		var err = 0;
		var i;
		err = 0;
		DateValue = DateField.value;
		var anum='0123456789.';//"/(^\d+$)|(^\d+\.\d+$)/";
	
			if (DateValue.length == 0) {
				return 
			}	
			if(ValContenido(DateValue,anum)){
				err=0;
			} else {
				err=10;
				mensaje=(constantes.STR_MENSAJE_INGRESE_SOLO_NUMEROS);
			}
	
			if (dec=='n') {
				if ((DateValue.indexOf('.')) > 0 ) {
					err=12;
					mensaje=(constantes.STR_MENSAJE_INGRESE_SOLO_NUMEROS_ENTEROS);
				}		
			}
	
			if ((DateValue < minimo) && (err ==0)) {
				err=15;
				mensaje=(constantes.STR_MENSAJE_NUMERO_NODEBE_SERMENOR+ minimo);
			}
				
			if ((DateValue > maximo) && (err ==0)) {
				err=20;
				mensaje=(constantes.STR_MENSAJE_NUMERO_NODEBE_SERMAYOR+ maximo);
			}
				
			if (err > 0) {
				;			
				//DateField.select();
				//DateField.focus();
			}
			
		return mensaje;
	}


	// ******************************************************************
	// Valida el ingreso de campos tipo texto o generales
	// Modo de uso:
	//
	// onblur="check_text(this,longitud,sizefijo,conv,dig,let,esp)"
	//
	// ******************************************************************

	check_text_tipo_sangre(field,longitud,sizefijo,conv, dig,let,esp,req){
		var mensaje="";
		var DateField = field;
	
		if(field.value==""&&req=='s') {
			 mensaje=constantes.STR_MENSAJE_CAMPO_REQUERIDO;
			 return mensaje;
		}	
	
		var err = 0;
		var i;
		err = 0;
	
		var digitos ='0123456789';								// Digitos
		var letrasMin ='abcdefghijklmnopqrstuvwxyz';			// ����� Letras minusculas
		var letrasMay ='ABCDEFGHIJKLMNOPQRSTUVWXYZ';			// ����� Letras mayusculas
		var espacios = '.,:\\ \t\n\r+-';								// whitespace characters
	
		var caractpermitidos='';
		var permite=' ';
	
		DateValue = DateField.value;
	
	
		if (dig=='s') {
			caractpermitidos=caractpermitidos+digitos;
			permite = constantes.STR_MENSAJE_NUMEROS;
		}
		if (let=='s') {
			caractpermitidos=caractpermitidos+letrasMin+letrasMay;
			permite = permite + constantes.STR_MENSAJE_LETRAS;
		}
		if (esp=='s') {
			caractpermitidos=caractpermitidos+espacios;
			permite = permite + constantes.STR_MENSAJE_ESPACIOS;
		}
	
		if(!ValContenido(DateValue,caractpermitidos)){
			mensaje=(constantes.STR_MENSAJE_SOLO_INGRESAR+ permite);
			err = 10;
		}
					
		if ((DateValue.length > longitud) && (err ==0)) {
			err=20;
			mensaje=(constantes.STR_MENSAJE_SOLO_INGRESAR+ longitud+ constantes.STR_MENSAJE_CARACTERES );
		}
	
		if ((DateValue.length < longitud) && (err ==0) &&  (sizefijo == 's')) {
			err=15;
			mensaje=(constantes.STR_MENSAJE_CAMPO_DEBE_CONTENER+ longitud+ constantes.STR_MENSAJE_CARACTERES );
		}
	
		if (conv=='s'){
			DateField.value = DateField.value.toUpperCase();
		}
				
		if (err > 0) {
			;	
			//DateField.select();
			//DateField.focus();		
		}
		
		return mensaje;
	}

	check_text(field,longitud,sizefijo,conv, dig,let,esp,req){
		var mensaje="";
		var DateField = field;
	
		if(field.value==""&&req=='s') {
			 mensaje=constantes.STR_MENSAJE_CAMPO_REQUERIDO;
			 return mensaje;
		}	
	
		var err = 0;
		var i;
		err = 0;
	
		var digitos ='0123456789';								// Digitos
		var letrasMin ='abcdefghijklmn�opqrstuvwxyz����������';			// ����� Letras minusculas
		var letrasMay ='ABCDEFGHIJKLMN�OPQRSTUVWXYZ����������';			// ����� Letras mayusculas
		var espacios = '.,:\\ \t\n\r';								// whitespace characters
	
		var caractpermitidos='';
		var permite=' ';
	
		DateValue = DateField.value;
	
		if (dig=='s') {
			caractpermitidos=caractpermitidos+digitos;
			permite = constantes.STR_MENSAJE_NUMEROS;
		}
		
		if (let=='s') {
			caractpermitidos=caractpermitidos+letrasMin+letrasMay;
			permite = permite + constantes.STR_MENSAJE_LETRAS;
		}
		
		if (esp=='s') {
			caractpermitidos=caractpermitidos+espacios;
			permite = permite + constantes.STR_MENSAJE_ESPACIOS;
		}
		
		if(!ValContenido(DateValue,caractpermitidos)){
			mensaje=(constantes.STR_MENSAJE_SOLO_INGRESAR+ permite);
			err = 10;
			//alert(caractpermitidos);
		}
	
				
		if ((DateValue.length > longitud) && (err ==0)) {
			err=20;
			mensaje=(constantes.STR_MENSAJE_SOLO_INGRESAR+ longitud+ constantes.STR_MENSAJE_CARACTERES );
		}
	
		if ((DateValue.length < longitud) && (err ==0) &&  (sizefijo == 's')) {
			err=15;
			mensaje=(constantes.STR_MENSAJE_CAMPO_DEBE_CONTENER+ longitud+ constantes.STR_MENSAJE_CARACTERES );
		}
	
		if (conv=='s') {
			DateField.value = DateField.value.toUpperCase();
		}
				
		if (err > 0) {
			;	
			//DateField.select();
			//DateField.focus();		
		}
		
		return mensaje;
	}

	ValContenido(str,con){
	    var i;

	    for (i = 0; i < str.length; i++) {   
	        var c = str.charAt(i);
	        if (con.indexOf(c) == -1) return false;
	    }
	    
	    return true;
	}
	
	
	check_mail(addressField,req) {
		mensaje="";
		
		if(req=='s') {
			if(addressField.value=="") {
				mensaje=constantes.STR_MENSAJE_CAMPO_REQUERIDO ;
			}
		}
		
		if(addressField.value!="") {
		    if ( NoAtSign ( addressField.value ) )
		    	mensaje=constanes.STRMENSAJEMAILNOCONTIENEARROBA ;
		    else if ( NothingBeforeAt ( addressField.value ) )
		    	mensaje=constanes.STRMENSAJEMAILCONTIENECARACTER ;
		    else if ( NoLeftBracket ( addressField.value ) )
		    	mensaje= "Error: The E-Mail address contains a right square bracket ']',\nbut no corresponding left square bracket '['" ;
		    else if ( NoRightBracket ( addressField.value ) )
		    	mensaje="Error: The E-Mail address contains a left square bracket '[',\nbut no corresponding right square bracket ']'" ;
		    else if ( NoValidPeriod ( addressField.value ) )
		    	mensaje=constanes.STRMENSAJEMAILCONTIENEPUNTO ;
		    else if ( NoValidSuffix ( addressField.value ) )
		    	mensaje=constanes.STRMENSAJEMAILCONTIENESUFIJOS ;
		}   
	   
	    return mensaje;
	}

	linkCheckValidation ( formField ) {
	    if ( checkValidation ( formField ) == true ) {
	        alert ( constantes.STR_MENSAJE_MAIL_VALIDO );
	    }

	    return (false);
	}

	stringEmpty ( address ) {
	    // CHECK THAT THE STRING IS NOT EMPTY
	    if ( address.length < 1 ) {
	        return ( true );
	    } else {
	        return (false);
	    }
	}

	NoAtSign ( address ) {
	    // CHECK THAT THERE IS AN '@' CHARACTER IN THE STRING
	    if ( address.indexOf ( '@', 0 ) == -1 ) {
	        return ( true );
	    } else {
	        return (false);
	    }
	}

	NothingBeforeAt ( address ) {
	    // CHECK THERE IS AT LEAST ONE CHARACTER BEFORE THE '@' CHARACTER
	    if ( address.indexOf ( '@', 0 ) < 1 ) {
	        return ( true );
	    } else {
	        return (false);
	    }
	}

	NoLeftBracket ( address ) {
	    // IF EMAIL ADDRESS IN FORM 'user@[255,255,255,0]', THEN CHECK FOR LEFT BRACKET
	    if ( address.indexOf ( '[', 0 ) == -1 && address.charAt ( address.length - 1 ) == ']' ) {
	        return ( true );
	    } else {
	        return (false);
	    }
	}

	NoRightBracket ( address ) {
	    // IF EMAIL ADDRESS IN FORM 'user@[255,255,255,0]', THEN CHECK FOR RIGHT BRACKET
	    if ( address.indexOf ( '[', 0 ) > -1 && address.charAt ( address.length - 1 ) != ']' ) {
	        return ( true );
	    } else {
	        return (false);
	    }
	}

	NoValidPeriod ( address ) {
	    // IF EMAIL ADDRESS IN FORM 'user@[255,255,255,0]', THEN WE ARE NOT INTERESTED
	    if ( address.indexOf ( '@', 0 ) > 1 && address.charAt ( address.length - 1 ) == ']' )
	        return (false);

	    // CHECK THAT THERE IS AT LEAST ONE PERIOD IN THE STRING
	    if ( address.indexOf ( '.', 0 ) == -1 )
	        return ( true );

	    return (false);
	}

	NoValidSuffix ( address ) {
	    // IF EMAIL ADDRESS IN FORM 'user@[255,255,255,0]', THEN WE ARE NOT INTERESTED
	    if ( address.indexOf ( '@', 0 ) > 1 && address.charAt ( address.length - 1 ) == ']' )
	        return (false);

	    // CHECK THAT THERE IS A TWO OR THREE CHARACTER SUFFIX AFTER THE LAST PERIOD
	    var len = address.length;
	    var pos = address.lastIndexOf ( '.', len - 1 ) + 1;
	    if ( ( len - pos ) < 2 || ( len - pos ) > 3 ) {
	        return ( true );
	    } else {
	        return ( false );
	    }
	}
}

var validacion=new Validacion();

export {Validacion,validacion};

//</script>