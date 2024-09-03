//<script type="text/javascript" language="javascript">
import { constantes } from '../General/Constantes';
class FuncionGeneral {
    constructor() {
        this.STRNOMBREFRAMEMENU = "leftSidebar";
        this.STRNOMBREFRAME_SLIDER_MENU = "divLeftSideSliderAux";
        this.STR_PERMISO_TODO = "TODO";
        this.STR_PERMISO_CONSULTA = "CONSULTA";
        this.STR_PERMISO_INGRESO = "INGRESO";
        this.STR_PERMISO_MODIFICACION = "MODIFICACION";
        this.STR_PERMISO_ELIMINACION = "ELIMINACION";
        this.STR_PERMISO_BUSQUEDA = "BUSQUEDA";
        this.isExpanded = true;
        //OPTIMIZACION CAPA FUNCION_GENERAL FIN
    }
    printWebPage() {
        //this.mostrarOcultarProcesando(true,null);		
        window.print();
        this.mostrarOcultarProcesando(false, null);
    }
    printWebPartPage(title, data) {
        //var window1 = window.open('', title, 'height=400,width=600');
        var window1 = window.open("http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE + "/" + constantes.STR_CARPETA_REPORTE + "/" + constantes.STR_REPORTE_PAGE_JQUERY, "REPORTE" + constantes.STR_HTML, constantes.STR_REPORTE_CONFIGURACION_VENTANA);
        window1.document.open();
        window1.document.write('<html><head><title>' + title + '</title>');
        window1.document.write('<link rel="stylesheet" href="webroot/css/Css/style_report.css" type="text/css" media="print,screen"/>'); //media="print"
        window1.document.write('</head><body>');
        window1.document.write(data);
        //window1.document.write('<input type="button" onclick="window.print();" style="visibility:visible" value="Imprimir" />')
        window1.document.write('</body></html>');
        window1.document.close();
        /*
        window1.document.write('<html><head><title>'+title+'</title>');
        window1.document.write('<link rel="stylesheet" href="webroot/css/Css/style_report.css" type="text/css"/>');//media="print"
        window1.document.write('</head><body>');
        window1.document.write(data);
        //window1.document.write('<input type="button" onclick="window.print();" style="visibility:visible" value="Imprimir" />')
        window1.document.write('</body></html>');

        //window1.print();
        //window1.close();
        */
        return true;
    }
    printWebPartPageWithStyles(title, data, align, tipo, objeto, clase) {
        //var window1 = window.open('', title, 'height=400,width=600');
        //alert("http://"+constantes.STR_IP_SERVIDOR+":"+constantes.STR_PUERTO_SERVIDOR+"/"+constantes.STR_CONTEXTO_APLICACION+"/"+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE+"/"+constantes.STR_CARPETA_REPORTE+"/"+constantes.STR_REPORTE_PAGE_JQUERY);
        //alert(title);
        //alert(data);
        var window1 = window.open("http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE + "/" + constantes.STR_CARPETA_REPORTE + "/" + constantes.STR_REPORTE_PAGE_JQUERY, "REPORTE" + constantes.STR_HTML, constantes.STR_REPORTE_CONFIGURACION_VENTANA);
        window1.document.open();
        window1.document.write('<html><head><title>' + title + '</title>');
        window1.document.write('<' + 'script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/jquery-1.10.2.js"><' + '/script>');
        window1.document.write('<link rel="stylesheet" href="webroot/css/Css/impresion/style_layout.css" type="text/css" media="print,screen"/>'); //media="print"
        window1.document.write('<link rel="stylesheet" href="webroot/css/Css/impresion/style_shared.css" type="text/css" media="print,screen"/>'); //media="print"
        window1.document.write('<link rel="stylesheet" href="webroot/css/Css/impresion/style_defecto.css" type="text/css" media="print,screen"/>'); //media="print"
        window1.document.write('<link rel="stylesheet" href="webroot/css/Css/impresion/style_font_defecto.css" type="text/css" media="print,screen"/>'); //media="print"
        window1.document.write('<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/themes/south-street/jquery-ui.css" type="text/css"/>');
        window1.document.write('<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/themes/south-street/jquery.ui.theme.css" type="text/css"/>');
        window1.document.write('<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/jquery.datetimepicker.css" type="text/css"/>');
        window1.document.write('<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/uploadfile.css" type="text/css"/>');
        window1.document.write('<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/select2.css" type="text/css"/>');
        window1.document.write('<link rel="stylesheet" type="text/css" href="webroot/css/Css/impresion/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/css/jquery.dataTables.css" type="text/css"/>');
        window1.document.write('<link rel="stylesheet" type="text/css" href="webroot/css/Css/impresion/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/css/dataTables.jqueryui.css" type="text/css"/>');
        window1.document.write('<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/jstree3_0/themes/default/style.css" type="text/css"/>');
        window1.document.write('</head><body>');
        //SOLO DIV PARA USAR SCROLL PERO IMPRIME MAL (CON SCROLL)
        window1.document.write('<table border="0" width="100%"><tr><td align="' + align + '">'); //		height: 150px;
        //window1.document.write('<div id="divTablaDatosAuxiliarAjaxWebPart" style="width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;">');//		height: 150px;
        window1.document.write(data);
        //window1.document.write('</div>');
        window1.document.write('</td><tr></table>'); //
        window1.document.write('<' + 'script>');
        window1.document.write('jQuery.noConflict();');
        //window1.document.write('alert(jQuery(".imagen_actualizar"));');
        if (tipo == "FORMULARIO") {
            window1.document.write('jQuery("#divFlechaArribaElementos" ).css( "display", "none");');
            window1.document.write('jQuery(".imagen_actualizar" ).css( "visibility", "hidden");');
        }
        else if (tipo == "TABLA") {
            window1.document.write('jQuery(".imgseleccionar' + objeto + '" ).css( "visibility", "hidden");');
            window1.document.write('jQuery(".imgeliminartabla' + objeto + '" ).css( "visibility", "hidden");');
            window1.document.write('jQuery(".imgseleccionarmostraraccionesrelaciones' + objeto + '" ).css( "visibility", "hidden");');
            window1.document.write('jQuery(".chkb_id" ).css( "visibility", "hidden");');
            window1.document.write('jQuery("#tblTablaDatos' + clase + 's_filter" ).css("display", "none");');
            window1.document.write('jQuery("#tblTablaDatos' + clase + 's_info" ).css("display", "none");');
            window1.document.write('jQuery(".columna_tabla_eli" ).css( "display", "none");');
            window1.document.write('jQuery(".columna_tabla_sel" ).css( "display", "none");');
            window1.document.write('jQuery(".columna_tabla_selrel" ).css( "display", "none");');
        }
        window1.document.write('<' + '/script>');
        //window1.document.write('<input type="button" onclick="window.print();" style="visibility:visible" value="Imprimir" />')
        window1.document.write('</body></html>');
        window1.print();
        //window1.close();
        /*
        window1.document.write('<html><head><title>'+title+'</title>');
        window1.document.write('<link rel="stylesheet" href="webroot/css/Css/style_report.css" type="text/css"/>');//media="print"
        window1.document.write('</head><body>');
        window1.document.write(data);
        //window1.document.write('<input type="button" onclick="window.print();" style="visibility:visible" value="Imprimir" />')
        window1.document.write('</body></html>');

        //window1.print();
        //window1.close();
        */
        return true;
    }
    openWindowAuxiliar(title, url) {
        //alert(url);
        //alert('http://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+'GlobalController.php?'+url);
        var window1 = window.open('http://' + constantes.STR_IP_SERVIDOR + ':' + constantes.STR_PUERTO_SERVIDOR + '/' + constantes.STR_CONTEXTO_APLICACION_SERVICIO + '/' + constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO + '/' + 'GlobalController.php?' + url, title, constantes.STR_REPORTE_CONFIGURACION_VENTANA);
    }
    irWindowAuxiliar(title, url) {
        //alert(url);
        //alert('http://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+'GlobalController.php?'+url);
        //document.location.href=strRelativePath+constantes.STR_DEFAULT_PAGE;
        document.location.href = 'http://' + constantes.STR_IP_SERVIDOR + ':' + constantes.STR_PUERTO_SERVIDOR + '/' + constantes.STR_CONTEXTO_APLICACION_SERVICIO + '/' + constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO + '/' + 'GlobalController.php?' + url, title, constantes.STR_REPORTE_CONFIGURACION_VENTANA;
    }
    getUrlStringPartAuxiliar(nombre_clase) {
        var strUrlPart = "&strTypeOnLoad" + nombre_clase + "=onloadhijos&strTipoPaginaAuxiliar" + nombre_clase + "=none&strTipoUsuarioAuxiliar" + nombre_clase + "=none&ES_POPUP=true"; //&action=index				
        return strUrlPart;
    }
    //UTILIZADO PARA JOOMLA
    cambiarUrlPorServicioTercero(strUrl) {
        //strUrl=strUrl.replace("/medical/app/","/medicalweb/");
        return strUrl;
    }
    resaltarRestaurarDivMensaje(jquery_nombre_control, bitEsResaltar, strMensaje, strTipo, chbPostAccionSinMensaje) {
        var jquery_control = jQuery("#" + jquery_nombre_control);
        //debugger;
        var spanMensajePage = jQuery("#spanMensajePageDialog");
        var spanIcoMensajePage = jQuery("#spanIcoMensajePageDialog");
        if (bitEsResaltar == true) {
            if ((chbPostAccionSinMensaje != null && typeof (chbPostAccionSinMensaje.prop('checked')) == "undefined") || chbPostAccionSinMensaje == null || (chbPostAccionSinMensaje != null && chbPostAccionSinMensaje.prop('checked') == false)) {
                funcionGeneral.irAreaDePagina('Campos');
                /*
                jquery_control.text(strMensaje);
                //jQuery("#divMensaje" ).css("position","absolute");
                */
                if (strTipo == "INFO" || strTipo == "I" || strTipo == "mensajeinfo") {
                    jquery_control.dialog("option", "title", "INFORMACION");
                    jquery_control.attr("class", "ui-state-highlight ui-corner-all");
                    spanIcoMensajePage.attr("class", "ui-icon ui-icon-info");
                }
                else if (strTipo == "ERROR" || strTipo == "E" || strTipo == "mensajeerror") {
                    jquery_control.dialog("option", "title", "ERROR");
                    jquery_control.attr("class", "ui-state-error ui-corner-all");
                    spanIcoMensajePage.attr("class", "ui-icon ui-icon-alert");
                }
                else if (strTipo == "ADVER" || strTipo == "A" || strTipo == "mensajeadvertencia") {
                    jquery_control.dialog("option", "title", "ADVERTENCIA");
                    jquery_control.attr("class", "ui-state-error ui-corner-all");
                    spanIcoMensajePage.attr("class", "ui-icon ui-icon-alert");
                }
                else {
                    jquery_control.dialog("option", "title", "INFORMACION");
                    jquery_control.attr("class", "ui-state-highlight ui-corner-all");
                    spanIcoMensajePage.attr("class", "ui-icon ui-icon-info");
                }
                spanMensajePage.text(strMensaje);
                jquery_control.css("top", "100px");
                jquery_control.css("left", "100px");
                jquery_control.dialog("open");
            }
        }
        else {
            if (jquery_control.dialog("isOpen") == true) {
                jquery_control.dialog("close");
            }
        }
    }
    mostrarDivMensaje(divMensajePage, spanIcoMensajePage, spanMensajePage, chbPostAccionSinMensaje, bitEsResaltar, strMensaje, strTipo) {
        //alert(strTipo);
        if (bitEsResaltar == true) {
            divMensajePage.css("display", "block");
            if (strTipo == "mensajeinfo") {
                divMensajePage.attr("class", "ui-state-highlight ui-corner-all");
                spanIcoMensajePage.attr("class", "ui-icon ui-icon-info");
            }
            else if (strTipo == "mensajeerror") {
                divMensajePage.attr("class", "ui-state-error ui-corner-all");
                spanIcoMensajePage.attr("class", "ui-icon ui-icon-alert");
            }
            else {
                divMensajePage.attr("class", "ui-state-error ui-corner-all");
                spanIcoMensajePage.attr("class", "ui-icon ui-icon-alert");
            }
        }
        else {
            divMensajePage.css("display", "none");
        }
        spanMensajePage.text(strMensaje);
    }
    procesarInicioBusqueda(strOpcion) {
        this.mostrarOcultarProcesando(true, null);
        //this.generarReporte(strOpcion);
    }
    procesarFinalizacionBusqueda(blnProcesarReporte, strOpcion, strRelativePath, strControllerName) {
        //alert("ok="+strControllerName);
        if (blnProcesarReporte == true || blnProcesarReporte == "true") {
            this.generarReporte(strOpcion, strRelativePath, strControllerName);
        }
        this.mostrarOcultarProcesando(false, null);
    }
    procesarInicioProceso() {
        this.mostrarOcultarProcesando(true, null);
        //this.generarReporte(strOpcion);
    }
    procesarFinalizacionProceso() {
        this.mostrarOcultarProcesando(false, null);
    }
    mostrarOcultarProcesando(esMostrar, strTargetId) {
        return this.mostrarOcultarProcesandoInterno(esMostrar, strTargetId, 'NORMAL');
    }
    procesarInicioProcesoSimple() {
        this.mostrarOcultarProcesandoSimple(true, null);
        //this.generarReporte(strOpcion);
    }
    procesarFinalizacionProcesoSimple() {
        this.mostrarOcultarProcesandoSimple(false, null);
    }
    mostrarOcultarProcesandoSimple(esMostrar, strTargetId) {
        return this.mostrarOcultarProcesandoInterno(esMostrar, strTargetId, 'SIMPLE');
    }
    mostrarOcultarProcesandoInterno(esMostrar, strTargetId, strTipo) {
        if (strTargetId == null || strTargetId == undefined) {
            strTargetId = 'outerBorder';
        }
        var opacidad = 70;
        if (strTipo == "NORMAL") {
            opacidad = 70;
        }
        else if (strTipo == "SIMPLE") {
            opacidad = 40;
        }
        if (esMostrar == true) {
            //alert(strTargetId);
            /*
            if(document.frmExpandirColapsar!=null&&document.frmExpandirColapsar!=undefined) {
                document.frmExpandirColapsar.imgEstadoProceso.style.visibility=constantes.STR_VISIBLE;
            }
            */
            window.waiter.show({ speed: 10,
                delay: 20,
                targetId: strTargetId,
                textColor: '#000000',
                background: '#FFFFFF',
                opacity: opacidad,
                message: 'Espere un momento por favor...',
                spinner: { yRadius: 15,
                    xRadius: 75,
                    background: '#2E9AFE'
                }
            });
        }
        else {
            //alert("else");
            /*
            if(document.frmExpandirColapsar!=null&&document.frmExpandirColapsar!=undefined) {
                document.frmExpandirColapsar.imgEstadoProceso.style.visibility=constantes.STR_HIDDEN;
            }
            */
            window.waiter.hide({ targetId: strTargetId });
        }
    }
    generarReporte(strOpcion, strRelativePath, strControllerName) {
        //alert(strOpcion+" "+strControllerName);
        if (strOpcion == constantes.STR_HTML) {
            //alert("http://"+constantes.STR_IP_SERVIDOR+":"+constantes.STR_PUERTO_SERVIDOR+"/"+constantes.STR_CONTEXTO_APLICACION+"/"+constantes.STR_REPORTE_PAGE+"/"+strControllerName+"/"+constantes.STR_REPORTE_FUNCION+"/"+constantes.STR_HTML.toLowerCase(),constantes.STR_HTML,constantes.STR_REPORTE_CONFIGURACION_VENTANA);
            window.open("http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_REPORTE_PAGE + "/" + strControllerName + "/" + constantes.STR_REPORTE_FUNCION + "/" + constantes.STR_HTML.toLowerCase(), constantes.STR_HTML, constantes.STR_REPORTE_CONFIGURACION_VENTANA);
        }
        else if (strOpcion == constantes.STR_PDF) {
            //window.open("http://"+constantes.STR_IP_SERVIDOR+":"+constantes.STR_PUERTO_SERVIDOR+"/"+constantes.STR_CONTEXTO_APLICACION+"/"+constantes.STR_REPORTE_PAGE+"/"+strControllerName+"/"+constantes.STR_REPORTE_FUNCION+"/"+constantes.STR_PDF.toLowerCase(),constantes.STR_PDF,constantes.STR_REPORTE_CONFIGURACION_VENTANA);
            //alert("http://"+constantes.STR_IP_SERVIDOR+":"+constantes.STR_PUERTO_SERVIDOR+"/"+constantes.STR_CONTEXTO_APLICACION+"/"+constantes.STR_REPORTE_PAGE+"/"+strControllerName+"/generarFpdf",constantes.STR_PDF);
            window.open("http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_REPORTE_PAGE + "/" + strControllerName + "/generarFpdf", constantes.STR_PDF, constantes.STR_REPORTE_CONFIGURACION_VENTANA);
        }
        else if (strOpcion == constantes.STR_WORD) {
            window.open("http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_REPORTE_PAGE + "/" + strControllerName + "/" + constantes.STR_REPORTE_FUNCION + "/" + constantes.STR_WORD.toLowerCase(), constantes.STR_WORD, constantes.STR_REPORTE_CONFIGURACION_VENTANA);
        }
        else if (strOpcion == constantes.STR_WORD_OPENOFFICE) {
            window.open("http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_REPORTE_PAGE + "/" + strControllerName + "/" + constantes.STR_REPORTE_FUNCION + "/" + constantes.STR_WORD_OPENOFFICE.toLowerCase(), constantes.STR_WORD_OPENOFFICE, constantes.STR_REPORTE_CONFIGURACION_VENTANA);
        }
        else if (strOpcion == constantes.STR_EXCEL) {
            window.open("http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_REPORTE_PAGE + "/" + strControllerName + "/" + constantes.STR_REPORTE_FUNCION + "/" + constantes.STR_EXCEL.toLowerCase(), constantes.STR_EXCEL, constantes.STR_REPORTE_CONFIGURACION_VENTANA);
        }
        else if (strOpcion == constantes.STR_CSV) {
            window.open("http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_REPORTE_PAGE + "/" + strControllerName + "/" + constantes.STR_REPORTE_FUNCION + "/" + constantes.STR_CSV.toLowerCase(), constantes.STR_CSV, constantes.STR_REPORTE_CONFIGURACION_VENTANA);
        }
        else {
            window.open("http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_REPORTE_PAGE + "/" + strControllerName + "/" + constantes.STR_REPORTE_FUNCION + "/" + constantes.STR_PDF.toLowerCase(), constantes.STR_PDF, constantes.STR_REPORTE_CONFIGURACION_VENTANA);
        }
    }
    traerIdSistema() {
        var idSistema = 1;
        return idSistema;
    }
    cerrarSesion(strRelativePath) {
        this.cerrarSesionUsuario(strRelativePath);
        //document.location.href=strRelativePath+constantes.STRINDEXPAGE;		
    }
    irLogin(strRelativePath) {
        this.cerrarSesionUsuario(strRelativePath);
        //document.location.href=strRelativePath+constantes.STR_DEFAULT_PAGE;		
    }
    irHome(strRelativePath) {
        document.location.href = strRelativePath + constantes.STR_DEFAULT_PAGE;
    }
    cerrarSesionUsuario(strRelativePathParam) {
        funcionGeneral.mostrarOcultarProcesando(true);
        strRelativePath = strRelativePathParam;
        var strParam = "accionAdicional=CerrarSesion";
        var numAleatorio = Math.random();
        jmaki.doAjax({ method: constantes.STR_POST,
            url: strRelativePath + "SistemaServlet?" + strParam + "&aleatorio=" + numAleatorio,
            callback: manejarCerrarSesion
        });
    }
    manejarCerrarSesion(strResponseCerrarSesion) {
        var jsonResponseCerrarSesion = eval('(' + strResponseCerrarSesion.responseText + ')');
        if (jsonResponseCerrarSesion.aplicacion != undefined && jsonResponseCerrarSesion.aplicacion == constantes.STR_MENSAJE_APLICACION_J2EE) {
            document.location.href = constantes.STR_RELATIVE_PATH + constantes.STR_DEFAULT_PAGE;
            funcionGeneral.mostrarOcultarProcesando(false);
        }
        else {
            ajaxFuncionGeneral.crearMensajeGeneralControl(constantes.STR_MENSAJE_TITULO_EXCEPCION, constantes.STR_MENSAJE_TITULO_EXCEPCION_NOCONTROLADA, true, "BLOCK", "OK", true, undefined);
        }
    }
    importJavaScript(pathFile) {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.src = pathFile;
        script.type = 'text/javascript';
        head.appendChild(script);
    }
    mostrarOcultarFilaCambiarImagenConEsMostrar(row, imgImagen, bitEsMostrar) {
        if (bitEsMostrar == true) {
            this.MostrarOcultarFilaInterno(row, true);
            imgImagen.src = constantes.STR_CARPETA_IMAGENES + "/" + constantes.STR_IMAGEN_COLAPSE_FILA;
        }
        else {
            this.MostrarOcultarFilaInterno(row, false);
            imgImagen.src = constantes.STR_CARPETA_IMAGENES + "/" + constantes.STR_IMAGEN_EXPAND_FILA;
        }
    }
    mostrarOcultarFilaCambiarImagen(strFila, strImagen) {
        var row = document.getElementById(strFila);
        if (row.style.display == "none") {
            this.MostrarOcultarFilaInterno(row, true);
            strImagen.src = constantes.STR_CARPETA_IMAGENES + "/" + constantes.STR_IMAGEN_COLAPSE_FILA;
        }
        else {
            this.MostrarOcultarFilaInterno(row, false);
            strImagen.src = constantes.STR_CARPETA_IMAGENES + "/" + constantes.STR_IMAGEN_EXPAND_FILA;
        }
    }
    mostrarOcultarAjaxDivCambiarImagenRelative(strDiv, strFila, strImagen, strRelativePath) {
        var div = document.getElementById(strDiv);
        var row = document.getElementById(strFila);
        //alert(document.getElementById(strDiv).style.display);
        if (div.style.display == "none") {
            Effect.Grow(strDiv);
            this.mostrarOcultarFilaInterno(row, true);
            //strImagen.src=/*strRelativePath+*/constantes.STR_CARPETA_IMAGENES+"/"+constantes.STR_IMAGEN_COLAPSE_FILA;
            strImagen.src = "http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE + "/" + constantes.STR_CARPETA_IMAGENES + "/" + constantes.STR_IMAGEN_COLAPSE_FILA;
            div.style = null;
        }
        else {
            Effect.Shrink(strDiv);
            this.mostrarOcultarFilaInterno(row, false);
            //strImagen.src=/*strRelativePath+*/constantes.STR_CARPETA_IMAGENES+"/"+constantes.STR_IMAGEN_EXPAND_FILA;
            strImagen.src = "http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE + "/" + constantes.STR_CARPETA_IMAGENES + "/" + constantes.STR_IMAGEN_EXPAND_FILA;
        }
        //new Draggable(strDiv);
    }
    mostrarOcultarFilaCambiarImagenRelative(strFila, strImagen, strRelativePath) {
        var row = document.getElementById(strFila);
        if (row.style.display == "none") {
            this.mostrarOcultarFilaInterno(row, true);
            //strImagen.src=/*strRelativePath+*/constantes.STR_CARPETA_IMAGENES+"/"+constantes.STR_IMAGEN_COLAPSE_FILA;
            strImagen.src = "http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE + "/" + constantes.STR_CARPETA_IMAGENES + "/" + constantes.STR_IMAGEN_COLAPSE_FILA;
        }
        else {
            this.mostrarOcultarFilaInterno(row, false);
            //strImagen.src=/*strRelativePath+*/constantes.STR_CARPETA_IMAGENES+"/"+constantes.STR_IMAGEN_EXPAND_FILA;
            strImagen.src = "http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE + "/" + constantes.STR_CARPETA_IMAGENES + "/" + constantes.STR_IMAGEN_EXPAND_FILA;
        }
        //alert(strImagen.src);
    }
    mostrarOcultarVisibleFilaCambiarImagenRelative(strFila, strImagen, strRelativePath) {
        var row = document.getElementById(strFila);
        if (row.style.visibility == "hidden") {
            this.mostrarOcultarVisibleFilaInterno(row, true);
            //strImagen.src=/*strRelativePath+*/constantes.STR_CARPETA_IMAGENES+"/"+constantes.STR_IMAGEN_COLAPSE_FILA;
            strImagen.src = "http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE + "/" + constantes.STR_CARPETA_IMAGENES + "/" + constantes.STR_IMAGEN_COLAPSE_FILA;
        }
        else {
            this.mostrarOcultarVisibleFilaInterno(row, false);
            //strImagen.src=/*strRelativePath+*/constantes.STR_CARPETA_IMAGENES+"/"+constantes.STR_IMAGEN_EXPAND_FILA;
            strImagen.src = "http://" + constantes.STR_IP_SERVIDOR + ":" + constantes.STR_PUERTO_SERVIDOR + "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE + "/" + constantes.STR_CARPETA_IMAGENES + "/" + constantes.STR_IMAGEN_EXPAND_FILA;
        }
        //alert(strImagen.src);
    }
    mostrarOcultarFila(row, bitEsMostrar) {
        this.mostrarOcultarFilaInterno(row, bitEsMostrar);
    }
    mostrarOcultarFilaInterno(row, bitEsMostrar) {
        var strBrowser = navigator.appName;
        if (bitEsMostrar == true || bitEsMostrar == 'true') {
            if (strBrowser == "Microsoft Internet Explorer") {
                row.style.display = "block";
            }
            else {
                row.style.display = "table-row";
            }
        }
        else {
            row.style.display = "none";
        }
        //alert(row.style.display);
    }
    mostrarOcultarVisibleFilaInterno(row, bitEsMostrar) {
        var strBrowser = navigator.appName;
        if (bitEsMostrar == true || bitEsMostrar == 'true') {
            if (strBrowser == "Microsoft Internet Explorer") {
                row.style.visibility = "visible";
            }
            else {
                row.style.visibility = "visible";
            }
        }
        else {
            row.style.visibility = "hidden";
        }
    }
    actualizarEstadoCeldasBotonesEmpresa(strAccion, bitGuardarCambiosEnLote, bitEsMantenimientoRelacionado, tdNuevo, tdActualizar, tdEliminar, tdCancelar, tdGuardar) {
        if (strAccion == "n") {
            tdNuevo.style.visibility = constantes.STR_VISIBLE;
            tdActualizar.style.visibility = constantes.STR_HIDDEN;
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_HIDDEN;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    tdGuardar.style.visibility = constantes.STR_VISIBLE;
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        else if (strAccion == "a") {
            tdNuevo.style.visibility = constantes.STR_HIDDEN;
            tdActualizar.style.visibility = constantes.STR_VISIBLE;
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_VISIBLE;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    tdGuardar.style.visibility = constantes.STR_VISIBLE;
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        else if (strAccion == "ae") {
            tdNuevo.style.visibility = constantes.STR_HIDDEN;
            tdActualizar.style.visibility = constantes.STR_VISIBLE;
            tdEliminar.style.visibility = constantes.STR_VISIBLE;
            tdCancelar.style.visibility = constantes.STR_VISIBLE;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    tdGuardar.style.visibility = constantes.STR_VISIBLE;
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        //Para Mantenimientos de tablas relacionados con mas de columnas minimas
        else if (strAccion == "ae2") {
            tdNuevo.style.visibility = constantes.STR_HIDDEN;
            tdActualizar.style.visibility = constantes.STR_VISIBLE;
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_VISIBLE;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        else if (strAccion == "c") {
            tdNuevo.style.visibility = constantes.STR_VISIBLE;
            tdActualizar.style.visibility = constantes.STR_HIDDEN;
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_HIDDEN;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    tdGuardar.style.visibility = constantes.STR_VISIBLE;
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        else if (strAccion == "t") {
            tdNuevo.style.visibility = constantes.STR_HIDDEN;
            tdActualizar.style.visibility = constantes.STR_HIDDEN;
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_HIDDEN;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        else if (strAccion == "s" || strAccion == "s2") {
            alert(tdNuevo.style.visibility);
            tdNuevo.style.visibility = constantes.STR_HIDDEN;
            tdActualizar.style.visibility = constantes.STR_HIDDEN;
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_HIDDEN;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        //alert(strAccion);
        //alert(tdNuevo.style.visibility);
    }
    exitePermisoConsulta(strPermisos) {
        var blnExiste = false;
        if (this.exitePermiso(strPermisos, STR_PERMISO_CONSULTA) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
            blnExiste = true;
        }
        return blnExiste;
    }
    exitePermisoNuevo(strPermisos) {
        var blnExiste = false;
        if (this.exitePermiso(strPermisos, STR_PERMISO_INGRESO) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
            blnExiste = true;
        }
        return blnExiste;
    }
    exitePermisoBusqueda(strPermisos) {
        var blnExiste = false;
        if (this.exitePermiso(strPermisos, STR_PERMISO_BUSQUEDA) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
            blnExiste = true;
        }
        return blnExiste;
    }
    exitePermiso(strPermisos, strPermiso) {
        var blnExiste = false;
        if (strPermisos != null && strPermisos != undefined && strPermisos != "") {
            var arrPermisos = strPermisos.split(",");
            for (var x = 0, c = arrPermisos.length; x < c; x++) {
                if (arrPermisos[x] == strPermiso) {
                    blnExiste = true;
                }
            }
        }
        else {
            blnExiste = true;
        }
        return blnExiste;
    }
    existeCadenaSplit(strPermiso, strPermisos, strCaracter) {
        var blnExiste = false;
        if (strPermisos != null && strPermisos != undefined && strPermisos != "") {
            var arrPermisos = strPermisos.split(strCaracter);
            for (var x = 0, c = arrPermisos.length; x < c; x++) {
                if (arrPermisos[x] == strPermiso) {
                    blnExiste = true;
                }
            }
        }
        else {
            blnExiste = true;
        }
        return blnExiste;
    }
    actualizarEstadoCeldasBotones(strAccion, bitGuardarCambiosEnLote, bitEsMantenimientoRelacionado, tdNuevo, tdActualizar, tdEliminar, tdCancelar, tdGuardar, tdNuevoPreparar, tdModificarDatos, strPermisos) {
        //alert(strPermisos);
        var blnExisteAccion = false;
        if (strAccion == "n") {
            if (this.exitePermiso(strPermisos, STR_PERMISO_INGRESO) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
                tdNuevo.style.visibility = constantes.STR_VISIBLE;
                tdNuevoPreparar.style.visibility = constantes.STR_VISIBLE;
            }
            else {
                tdNuevo.style.visibility = constantes.STR_HIDDEN;
                tdNuevoPreparar.style.visibility = constantes.STR_HIDDEN;
            }
            tdActualizar.style.visibility = constantes.STR_HIDDEN;
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_HIDDEN;
            tdModificarDatos.style.visibility = constantes.STR_HIDDEN;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    if (this.exitePermiso(strPermisos, STR_PERMISO_INGRESO) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
                        tdGuardar.style.visibility = constantes.STR_VISIBLE;
                    }
                    else {
                        tdGuardar.style.visibility = constantes.STR_HIDDEN;
                    }
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        else if (strAccion == "a") {
            tdNuevo.style.visibility = constantes.STR_HIDDEN;
            tdNuevoPreparar.style.visibility = constantes.STR_HIDDEN;
            tdModificarDatos.style.visibility = constantes.STR_HIDDEN;
            if (this.exitePermiso(strPermisos, STR_PERMISO_MODIFICACION) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
                tdActualizar.style.visibility = constantes.STR_VISIBLE;
            }
            else {
                tdActualizar.style.visibility = constantes.STR_HIDDEN;
            }
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_VISIBLE;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    if (this.exitePermiso(strPermisos, STR_PERMISO_MODIFICACION) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
                        tdGuardar.style.visibility = constantes.STR_VISIBLE;
                    }
                    else {
                        tdGuardar.style.visibility = constantes.STR_HIDDEN;
                    }
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        else if (strAccion == "ae") {
            blnExisteAccion = false;
            tdNuevo.style.visibility = constantes.STR_HIDDEN;
            tdNuevoPreparar.style.visibility = constantes.STR_HIDDEN;
            tdModificarDatos.style.visibility = constantes.STR_HIDDEN;
            if (this.exitePermiso(strPermisos, STR_PERMISO_MODIFICACION) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
                tdActualizar.style.visibility = constantes.STR_VISIBLE;
                blnExisteAccion = true;
            }
            else {
                tdActualizar.style.visibility = constantes.STR_HIDDEN;
            }
            if (this.exitePermiso(strPermisos, STR_PERMISO_ELIMINACION) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
                tdEliminar.style.visibility = constantes.STR_VISIBLE;
                blnExisteAccion = true;
            }
            else {
                tdEliminar.style.visibility = constantes.STR_HIDDEN;
            }
            tdCancelar.style.visibility = constantes.STR_VISIBLE;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    if (blnExisteAccion == true) {
                        tdGuardar.style.visibility = constantes.STR_VISIBLE;
                    }
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        //Para Mantenimientos de tablas relacionados con mas de columnas minimas
        else if (strAccion == "ae2") {
            tdNuevo.style.visibility = constantes.STR_HIDDEN;
            tdNuevoPreparar.style.visibility = constantes.STR_HIDDEN;
            tdModificarDatos.style.visibility = constantes.STR_HIDDEN;
            if (this.exitePermiso(strPermisos, STR_PERMISO_MODIFICACION) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
                tdActualizar.style.visibility = constantes.STR_VISIBLE;
            }
            else {
                tdActualizar.style.visibility = constantes.STR_HIDDEN;
            }
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_VISIBLE;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        else if (strAccion == "c") {
            if (this.exitePermiso(strPermisos, STR_PERMISO_INGRESO) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
                tdNuevo.style.visibility = constantes.STR_VISIBLE;
                tdNuevoPreparar.style.visibility = constantes.STR_VISIBLE;
            }
            else {
                tdNuevo.style.visibility = constantes.STR_HIDDEN;
            }
            tdModificarDatos.style.visibility = constantes.STR_HIDDEN;
            tdActualizar.style.visibility = constantes.STR_HIDDEN;
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_HIDDEN;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    if (this.exitePermiso(strPermisos, STR_PERMISO_INGRESO) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
                        tdGuardar.style.visibility = constantes.STR_VISIBLE;
                    }
                    else {
                        tdGuardar.style.visibility = constantes.STR_VISIBLE;
                    }
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        else if (strAccion == "cc") {
            tdNuevo.style.visibility = constantes.STR_HIDDEN;
            tdActualizar.style.visibility = constantes.STR_HIDDEN;
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_VISIBLE;
            tdNuevoPreparar.style.visibility = constantes.STR_HIDDEN;
            tdModificarDatos.style.visibility = constantes.STR_HIDDEN;
            if (bitEsMantenimientoRelacionado == false) {
                tdGuardar.style.visibility = constantes.STR_HIDDEN;
            }
        }
        else if (strAccion == "g") {
            tdNuevo.style.visibility = constantes.STR_HIDDEN;
            tdActualizar.style.visibility = constantes.STR_HIDDEN;
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_HIDDEN;
            tdNuevoPreparar.style.visibility = constantes.STR_HIDDEN;
            tdModificarDatos.style.visibility = constantes.STR_HIDDEN;
            tdGuardar.style.visibility = constantes.STR_VISIBLE;
        }
        else if (strAccion == "t") {
            tdNuevo.style.visibility = constantes.STR_HIDDEN;
            tdActualizar.style.visibility = constantes.STR_HIDDEN;
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_HIDDEN;
            tdNuevoPreparar.style.visibility = constantes.STR_HIDDEN;
            tdModificarDatos.style.visibility = constantes.STR_HIDDEN;
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
        else if (strAccion == "s" || strAccion == "s2") {
            tdActualizar.style.visibility = constantes.STR_HIDDEN;
            tdEliminar.style.visibility = constantes.STR_HIDDEN;
            tdCancelar.style.visibility = constantes.STR_VISIBLE;
            tdModificarDatos.style.visibility = constantes.STR_VISIBLE;
            if (this.exitePermiso(strPermisos, STR_PERMISO_INGRESO) || exitePermiso(strPermisos, STR_PERMISO_TODO)) {
                tdNuevo.style.visibility = constantes.STR_VISIBLE;
                tdNuevoPreparar.style.visibility = constantes.STR_VISIBLE;
            }
            else {
                tdNuevo.style.visibility = constantes.STR_HIDDEN;
                tdNuevoPreparar.style.visibility = constantes.STR_HIDDEN;
            }
            if (bitEsMantenimientoRelacionado == false) {
                if (bitGuardarCambiosEnLote == true) {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
                else {
                    tdGuardar.style.visibility = constantes.STR_HIDDEN;
                }
            }
        }
    }
    validarCombo(arrData, value) {
        var mensaje = "";
        var encontrado = this.getIdComboInterno(arrData, value);
        if (encontrado == "") {
            mensaje = constantes.STR_MENSAJE_SELECCIONE_ELEMENTO_VALIDO;
        }
        return mensaje;
    }
    getIdCombo(arrData, value) {
        return this.getIdComboInterno(arrData, value);
    }
    getIdComboInterno(arrData, value) {
        //alert("si:"+arrData.length);
        //alert("si:"+value);
        var id = "";
        for (var I = 0; I < arrData.length; I++) {
            if (arrData[I].label == value) {
                id = arrData[I].value;
                encontrado = true;
            }
        }
        return id;
    }
    setCheckControl(control, bitEsTrue) {
        if (bitEsTrue == true) {
            control.checked = true;
        }
        else {
            control.checked = false;
        }
    }
    setEmptyControl(control) {
        control.value = "";
    }
    setReadOnlyControl(control, bitEsReadOnly) {
        if (bitEsReadOnly == true) {
            control.readOnly = true;
        }
        else {
            control.readOnly = false;
        }
    }
    setDisabledControl(control, blnDisabled) {
        if (blnDisabled == true) {
            control.disabled = true;
        }
        else {
            control.disabled = false;
        }
    }
    Trim(cadena) {
        for (i = 0; i < cadena.length; i++) {
            if (cadena.charAt(i) == " ") {
                cadena = cadena.substring(i + 1, cadena.length);
            }
            else {
                break;
            }
        }
        for (i = cadena.length - 1; i >= 0; i = cadena.length - 1) {
            if (cadena.charAt(i) == " ") {
                cadena = cadena.substring(0, i);
            }
            else {
                break;
            }
        }
        return cadena;
    }
    deshabilitarHabilitarControlesTodosOUno(formulario, nombreControl, esHabilitar) {
        for (var i = 0; i < formulario.elements.length; i++) {
            if (formulario.elements[i].type == "text" || formulario.elements[i].type == "textarea") {
                if (formulario.elements[i].name == "") {
                    if (esHabilitar == false) {
                        formulario.elements[i].readOnly = true;
                    }
                    else {
                        formulario.elements[i].readOnly = false;
                    }
                }
                else {
                    if (formulario.elements[i].name == nombreControl) {
                        if (esHabilitar == false) {
                            formulario.elements[i].readOnly = true;
                        }
                        else {
                            formulario.elements[i].readOnly = false;
                        }
                    }
                    else {
                        if (esHabilitar == false) {
                            formulario.elements[i].readOnly = false;
                        }
                        else {
                            formulario.elements[i].readOnly = true;
                        }
                    }
                }
            }
        }
    }
    verificarPermisosMantenimiento(nombrepagina) {
        var req = LibraryAjaxNewXMLHttpRequest();
        req.onreadystatechange = libraryAjaxGetReadyStateHandler(req, ProcesarPermisosMantenimiento);
        req.open("POST", "UsuarioServletAdditional", true);
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req.send("accion=verificarpermisosmantenimiento&nombrepagina=" + nombrepagina);
    }
    asignarPermisosAcciones(permisos) {
        var strBotonNuevo = "btnNuevo";
        var strBotonActualizar = "btnActualizar";
        var strBotonEliminar = "btnEliminar";
        var strBotonCancelar = "btnCancelar";
        var items = permisos.split(",");
        for (var I = 0; I < items.length; I++) {
            var item = items[I];
            if (item == "t") {
                document.getElementById(strBotonNuevo).style.visibility = constantes.STR_VISIBLE;
                document.getElementById(strBotonActualizar).style.visibility = constantes.STR_VISIBLE;
                document.getElementById(strBotonEliminar).style.visibility = constantes.STR_VISIBLE;
                document.getElementById(strBotonCancelar).style.visibility = constantes.STR_VISIBLE;
                break;
            }
            if (item == "gn") {
                document.getElementById(strBotonNuevo).style.visibility = constantes.STR_VISIBLE;
                document.getElementById(strBotonCancelar).style.visibility = constantes.STR_VISIBLE;
            }
            if (item == "ga") {
                document.getElementById(strBotonActualizar).style.visibility = constantes.STR_VISIBLE;
                document.getElementById(strBotonCancelar).style.visibility = constantes.STR_VISIBLE;
            }
            if (item == "ge") {
                document.getElementById(strBotonEliminar).style.visibility = constantes.STR_VISIBLE;
                document.getElementById(strBotonCancelar).style.visibility = constantes.STR_VISIBLE;
            }
        }
    }
    procesarPermisosMantenimiento(validacionusuarioXML) {
        var mensaje = validacionusuarioXML.getElementsByTagName("mensaje")[0];
        var itemMensaje = mensaje.getElementsByTagName("itemMensaje");
        if (itemMensaje != null) {
            var nombremensaje = itemMensaje[0].getElementsByTagName("nombremensaje")[0].firstChild.nodeValue;
            if (nombremensaje != "verificarpermisosmantenimiento") {
                this.ProcesarMensaje(itemMensaje);
                return;
            }
            var mensajeusuario = itemMensaje[0].getElementsByTagName("mensajeusuario")[0].firstChild.nodeValue;
            var tipo = itemMensaje[0].getElementsByTagName("tipo")[0].firstChild.nodeValue;
            var esopcional = itemMensaje[0].getElementsByTagName("esopcional")[0].firstChild.nodeValue;
            var titulo = itemMensaje[0].getElementsByTagName("titulo")[0].firstChild.nodeValue;
            var mensajetecnico;
            if (itemMensaje[0].getElementsByTagName("mensajetecnico")[0].firstChild.nodeValue != "NONE") {
                mensajetecnico = itemMensaje[0].getElementsByTagName("mensajetecnico")[0].firstChild.nodeValue;
            }
            if (mensajetecnico != "NONE") {
                if (mensajetecnico == "true") {
                    this.asignarPermisosAcciones(mensajeusuario);
                }
                else {
                    libraryAjaxFuncionesGeneralesCreateSimpleYahooDialogInfo(titulo, mensajeusuario, YAHOO.widget.SimpleDialog.ICON_BLOCK);
                }
            }
        }
    }
    cambiarNullAVacio(valor) {
        var valorfinal = valor;
        if (valor == "null" || valor == "0") {
            valorfinal = "";
        }
        return valorfinal;
    }
    cambiarNullAVacioSoloNull(valor) {
        var valorfinal = valor;
        if (valor == "null") {
            valorfinal = "";
        }
        return valorfinal;
    }
    cambiarBooleanValueToControl(booleanValue, id) {
        var control = "<input name=\"chb" + id + "\" type=\"checkbox\" disabled=\"true\" ";
        if (booleanValue == "true") {
            control += "checked>";
        }
        else {
            control += ">";
        }
        return control;
    }
    cambiarBooleanValueToControlHabilitadoActivarEmpleado(booleanValue, id) {
        var control = "<input name=\"chb" + id + "\" type=\"checkbox\"" + "onClick=\"seleccionarDeseleccionarEmpleado(this," + id + ")\"";
        if (booleanValue == true) {
            control += "checked>";
        }
        else {
            control += ">";
        }
        return control;
    }
    cambiarBooleanValueToControlHabilitadoActivarEmpleadoTraerDatos(booleanValue, id) {
        var control = "<input name=\"chb" + id + "\" type=\"checkbox\"" + "onClick=\"seleccionarDeseleccionarEmpleado(this," + id + ")\"";
        if (booleanValue == "true") {
            control += "checked>";
        }
        else {
            control += ">";
        }
        return control;
    }
    cambiarBooleanValueToControl2(booleanValue, id) {
        var control = "<input name=\"chb" + id + "\" type=\"checkbox\" disabled=\"true\"";
        if (booleanValue == true) {
            control += " checked>";
        }
        else {
            control += ">";
        }
        return control;
    }
    cambiarBooleanValueToControlHabilitadoCompuesto(booleanValue, id, idTablaRelacionada, strObjetoTabla, strTablaRelacionada) {
        var control = "<input name=\"chb" + id + "\" type=\"checkbox\" onClick=\"" + strObjetoTabla + ".agregarQuitar" + strTablaRelacionada + "(" + id + "," + idTablaRelacionada + ",this)\"";
        if (booleanValue == true) {
            control += " checked>";
        }
        else {
            control += ">";
        }
        return control;
    }
    cambiarBooleanNumeroValueToControl(booleanValue, id) {
        var control = "<input name=\"chb" + id + "\" type=\"checkbox\" disabled=\"true\" ";
        if (booleanValue == "1") {
            control += " checked>";
        }
        else {
            control += ">";
        }
        return control;
    }
    cambiarFechaHoraAFecha(fechahora) {
        var fecha = fechahora.split(" ");
        return fecha[0];
    }
    //FUNCIONES DE NAVEGACION
    mostrarOcultarPaginaAnterior(esMostrar) {
        if (esMostrar) {
            document.getElementById(constantes.STR_IMAGEN_ATRAS).style.visibility = constantes.STR_VISIBLE;
        }
        else {
            document.getElementById(constantes.STR_IMAGEN_ATRAS).style.visibility = constantes.STR_HIDDEN;
        }
    }
    colapsar(strRelativePath) {
        var symbol = "";
        symbol = this.getElementByIds();
        //alert(strRelativePath);
        //alert(document.frmExpandirColapsar.imgExpandirColapsar.src);
        //alert(strRelativePath+constantes.STR_CARPETA_IMAGENES+"/"+symbol);
        //alert(document.frmExpandirColapsar.imgExpandirColapsar);
        document.frmExpandirColapsar.imgExpandirColapsar.src = strRelativePath + symbol;
    }
    getElementByIds() {
        var symbol = "";
        //var frameSetCols=document.getElementById('columnsFrameSet');
        if (isExpanded == true) {
            //document.all.columnsFrameSet.cols="45,*";
            //document.body.cols("45,*");
            //frameSetCols.cols="0,*";
            document.getElementById(STRNOMBREFRAMEMENU).style.width = "0px";
            document.getElementById(STRNOMBREFRAMEMENU).style.height = "0px";
            document.getElementById(STRNOMBREFRAMEMENU).style.visibility = constantes.STR_HIDDEN;
            //ESTO SI VALE PERO EN else NO VUELVE APARECER
            /*
            if(document.getElementById(STRNOMBREFRAME_SLIDER_MENU)!=null) {
                alert(document.getElementById(STRNOMBREFRAME_SLIDER_MENU).style.width);
                alert(document.getElementById(STRNOMBREFRAME_SLIDER_MENU).style.height);
                alert(document.getElementById(STRNOMBREFRAME_SLIDER_MENU).style.visibility);
                
                document.getElementById(STRNOMBREFRAME_SLIDER_MENU).style.width= "0px";
                document.getElementById(STRNOMBREFRAME_SLIDER_MENU).style.height= "0px";
                document.getElementById(STRNOMBREFRAME_SLIDER_MENU).style.visibility = constantes.STR_HIDDEN;
            }
            */
            var intWindowHeight = window.screen.width - 50;
            document.getElementById('content').style.width = intWindowHeight + "px";
            document.getElementById('header').style.display = "none";
            isExpanded = false;
            symbol = constantes.STR_IMAGEN_EXPAND_MENU;
            if (document.getElementById("divContentSliderAux") != null) {
                //document.getElementById('leftSidebar').style.height + 15 =640  								
                document.getElementById("divContentSliderAux").style.marginTop = "-15px";
            }
        }
        else {
            //document.all.columnsFrameSet.cols="200,*";
            //document.body.cols("200,*");
            //frameSetCols.cols="200,*";
            document.getElementById(STRNOMBREFRAMEMENU).style.width = "175px"; //"200px";
            document.getElementById(STRNOMBREFRAMEMENU).style.height = "625px";
            document.getElementById(STRNOMBREFRAMEMENU).style.visibility = constantes.STR_VISIBLE;
            //NO VALE CON SLIDER NO VUELVE APARECER
            /*
            if(document.getElementById(STRNOMBREFRAME_SLIDER_MENU)!=null) {
                alert("here");
                document.getElementById(STRNOMBREFRAME_SLIDER_MENU).style.width= "15%;";//"200px";
                document.getElementById(STRNOMBREFRAME_SLIDER_MENU).style.height= "15px;";
                document.getElementById(STRNOMBREFRAME_SLIDER_MENU).style.visibility = constantes.STR_VISIBLE
                
                alert(document.getElementById(STRNOMBREFRAME_SLIDER_MENU).style.width);
                alert(document.getElementById(STRNOMBREFRAME_SLIDER_MENU).style.height);
                alert(document.getElementById(STRNOMBREFRAME_SLIDER_MENU).style.visibility);
                
            }
            */
            var intWindowHeight = window.screen.width - 250;
            document.getElementById('content').style.width = intWindowHeight + "px";
            document.getElementById('header').style.display = "table-row";
            isExpanded = true;
            symbol = constantes.STR_IMAGEN_COLAPSE_MENU;
            if (document.getElementById("divContentSliderAux") != null) {
                //document.getElementById('leftSidebar').style.height + 15 =640  								
                document.getElementById("divContentSliderAux").style.marginTop = "-640px";
            }
        }
        return symbol;
    }
    cerrarPagina() {
        window.close();
    }
    irAreaDePagina(area) {
        var hrefPagina = document.location.href.split('#')[0];
        if (area == constantes.STR_SECCION_ACCIONES) {
            document.location.href = hrefPagina + '#' + constantes.STR_SECCION_ACCIONES;
        }
        else if (area == constantes.STR_SECCION_CAMPOS) {
            document.location.href = hrefPagina + '#' + constantes.STR_SECCION_CAMPOS;
        }
        else if (area == constantes.STR_SECCION_BUSQUEDAS) {
            document.location.href = hrefPagina + '#' + constantes.STR_SECCION_BUSQUEDAS;
        }
        else if (area == constantes.STR_SECCION_CONTROLES_SECCIONES) {
            document.location.href = hrefPagina + '#' + constantes.STR_SECCION_CONTROLES_SECCIONES;
        }
    }
    activarFilaTabla(trRow) {
        /*
        if(trRow.className=="filazebra") {
            trRow.className="filazebraanti";
        } else {
            trRow.className="filazebra";
        }
        */
        trRow.className = "filaactivo";
    }
    desactivarFilaTabla(trRow, classNameoriginal) {
        /*
        if(trRow.className=="filazebra") {
            trRow.className="filazebraanti";
        } else {
            trRow.className="filazebra";
        }
        */
        trRow.className = classNameoriginal;
    }
    activarBoton(btnGeneral) {
        btnGeneral.className = "botonactivo";
    }
    desactivarBoton(btnGeneral) {
        btnGeneral.className = "botonnormal";
        ;
    }
    activarBotonImagen(btnGeneral) {
        //alert(btnGeneral.src);
        //alert("/"+constantes.STR_CONTEXTO_APLICACION+"/"+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE+"/"+constantes.STR_CARPETA_IMAGENES+"/registreseactivo.gif");
        btnGeneral.src = "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE + "/" + constantes.STR_CARPETA_IMAGENES + "/registreseactivo.gif"; //"/registreseactivo.gif";	
    }
    desactivarBotonImagen(btnGeneral) {
        //alert(btnGeneral.src);
        btnGeneral.src = "/" + constantes.STR_CONTEXTO_APLICACION + "/" + constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE + "/" + constantes.STR_CARPETA_IMAGENES + "/registrese.gif";
    }
    getParamsNewPopupPage(strLink) {
        var params = '';
        if (strLink.indexOf("/files/") === -1) {
            params += 'width=' + window.screen.width * 0.75;
            params += ',height=' + window.screen.height * 0.75;
        }
        else {
            params += 'width=' + window.screen.width * 0.68;
            params += ',height=' + window.screen.height * 0.40;
        }
        params += ',top=' + window.screen.height * 0.13 + ', left=' + window.screen.width * 0.13 + '';
        //params += ',fullscreen=yes';
        params += ',status=yes';
        params += ',resizable=yes';
        params += ',scrollbars=yes';
        //alert(params);
        return params;
    }
    getParamsNewPopupPageJQuery(strLink, strWindowName) {
        var params = {
            width: window.screen.width * 0.75,
            height: window.screen.height * 0.75,
            top: window.screen.height * 0.13,
            left: window.screen.width * 0.13,
            status: "yes", resizable: "yes", scrollbars: "yes",
            windowURL: strLink,
            windowName: strWindowName
        };
        return params;
    }
    openNewPopupPage(strLink, strWindowName, params) {
        var newwin = window.open(strLink, strWindowName, params);
        return newwin;
    }
    getTipoArchivosUpload(strTipo) {
        var strTipoArchivosUpload = '';
        if (strTipo == 'IMAGEN') {
            strTipoArchivosUpload = 'png,gif,jpg,jpeg';
        }
        else if (strTipo == 'ARCHIVO') {
            strTipoArchivosUpload = 'png,gif,jpg,jpeg,txt,doc,docx,xls,xlsx,ppt,pptx,zip,rar';
        }
        else if (strTipo == 'DOCUMENTO') {
            strTipoArchivosUpload = 'txt,doc,docx,xls,xlsx,ppt,pptx';
        }
        return strTipoArchivosUpload;
    }
    esTeclaTipo(e, strTipo) {
        var validado = false;
        if (strTipo == "ENTER") {
            if (e.keyCode == 13) {
                validado = true;
            }
        }
        return validado;
    }
    getTipoHotKey(tipo) {
        var strTipoHotkey = "";
        if (tipo == "NUEVO") {
            strTipoHotkey = "keypress.alt_n";
        }
        else if (tipo == "NUEVO_RELACIONES") {
            strTipoHotkey = "keypress.shift_n";
        }
        else if (tipo == "ACTUALIZAR") {
            strTipoHotkey = "keypress.alt_a";
        }
        else if (tipo == "ELIMINAR") {
            strTipoHotkey = "keypress.alt_e";
        }
        else if (tipo == "CERRAR") {
            strTipoHotkey = "keypress.alt_s";
        }
        else if (tipo == "GUARDAR") {
            strTipoHotkey = "keypress.alt_g";
        }
        else if (tipo == "DUPLICAR") {
            strTipoHotkey = "keypress.alt_d";
        }
        else if (tipo == "COPIAR") {
            strTipoHotkey = "keypress.alt_c";
        }
        else if (tipo == "ORDEN") {
            strTipoHotkey = "keypress.alt_o";
        }
        else if (tipo == "NUEVO_TABLA") {
            strTipoHotkey = "keypress.alt_t";
        }
        else if (tipo == "RECARGAR") {
            strTipoHotkey = "keypress.alt_r";
        }
        else if (tipo == "SIGUIENTES") {
            strTipoHotkey = "keypress.alt_pagDown";
        }
        else if (tipo == "ANTERIORES") {
            strTipoHotkey = "keypress.alt_pagUp";
        }
        return strTipoHotkey;
        /*
        (ALT)
        N->Nuevo
        N->Shift + Nuevo Relaciones (ANTES R)
        A->Actualizar
        E->Eliminar
        S->Cerrar
        C->->Mayus + Cancelar (ANTES Q->Quit)
        G->Guardar Cambios
        D->Duplicar
        C->Alt + Copiar
        O->Orden
        T->Nuevo Tabla
        R->Recargar Informacion Inicial (ANTES I)
        Alt + Pag.Down->Siguientes
        Alt + Pag.Up->Anteriores
        
        NO UTILIZADOS
        M->Modificar
        
        */
    }
    //OPTIMIZACION CAPA FUNCION_GENERAL	
    resaltarRestaurarDivsPagina(bitEsResaltar, sNombreClase) {
        if (bitEsResaltar == true) {
            if (document.getElementById("leftSidebar") != null) {
                document.getElementById("leftSidebar").style.filter = 'alpha(opacity=25)';
                document.getElementById("leftSidebar").style.opacity = '0.25';
            }
            if (document.getElementById("header") != null) {
                document.getElementById("header").style.filter = 'alpha(opacity=25)';
                document.getElementById("header").style.opacity = '0.25';
            }
            if (document.getElementById("divBusqueda" + sNombreClase + "AjaxWebPart") != null) {
                document.getElementById("divBusqueda" + sNombreClase + "AjaxWebPart").style.filter = 'alpha(opacity=25)';
                document.getElementById("divBusqueda" + sNombreClase + "AjaxWebPart").style.opacity = '0.25';
            }
            if (document.getElementById("divBusquedas" + sNombreClase + "AjaxWebPart") != null) {
                document.getElementById("divBusquedas" + sNombreClase + "AjaxWebPart").style.filter = 'alpha(opacity=25)';
                document.getElementById("divBusquedas" + sNombreClase + "AjaxWebPart").style.opacity = '0.25';
            }
            if (document.getElementById("divTablaDatos" + sNombreClase + "sAjaxWebPart") != null) {
                document.getElementById("divTablaDatos" + sNombreClase + "sAjaxWebPart").style.filter = 'alpha(opacity=25)';
                document.getElementById("divTablaDatos" + sNombreClase + "sAjaxWebPart").style.opacity = '0.25';
            }
            if (document.getElementById("div" + sNombreClase + "PaginacionAjaxWebPart") != null) {
                document.getElementById("div" + sNombreClase + "PaginacionAjaxWebPart").style.filter = 'alpha(opacity=25)';
                document.getElementById("div" + sNombreClase + "PaginacionAjaxWebPart").style.opacity = '0.25';
            }
            /*funcionGeneral.irAreaDePagina('Campos');
            
            jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").dialog( "open" );
            
            jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").css("position","absolute");
            jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").css("top", "100px");
            jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").css("left", "100px");
            */
        }
        else {
            //funcionGeneral.irAreaDePagina('Busquedas');
            if (document.getElementById("leftSidebar") != null) {
                document.getElementById("leftSidebar").style.filter = 'alpha(opacity=100)';
                document.getElementById("leftSidebar").style.opacity = '1';
            }
            if (document.getElementById("header") != null) {
                document.getElementById("header").style.filter = 'alpha(opacity=100)';
                document.getElementById("header").style.opacity = '1';
            }
            if (document.getElementById("divBusqueda" + sNombreClase + "AjaxWebPart") != null) {
                document.getElementById("divBusqueda" + sNombreClase + "AjaxWebPart").style.filter = 'alpha(opacity=100)';
                document.getElementById("divBusqueda" + sNombreClase + "AjaxWebPart").style.opacity = '1';
            }
            if (document.getElementById("divBusquedas" + sNombreClase + "AjaxWebPart") != null) {
                document.getElementById("divBusquedas" + sNombreClase + "AjaxWebPart").style.filter = 'alpha(opacity=100)';
                document.getElementById("divBusquedas" + sNombreClase + "AjaxWebPart").style.opacity = '1';
            }
            if (document.getElementById("divTablaDatos" + sNombreClase + "sAjaxWebPart") != null) {
                document.getElementById("divTablaDatos" + sNombreClase + "sAjaxWebPart").style.filter = 'alpha(opacity=100)';
                document.getElementById("divTablaDatos" + sNombreClase + "sAjaxWebPart").style.opacity = '1';
            }
            if (document.getElementById("div" + sNombreClase + "PaginacionAjaxWebPart") != null) {
                document.getElementById("div" + sNombreClase + "PaginacionAjaxWebPart").style.filter = 'alpha(opacity=100)';
                document.getElementById("div" + sNombreClase + "PaginacionAjaxWebPart").style.opacity = '1';
            }
            /*
            if(jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").dialog( "isOpen" )==true) {
                jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").dialog( "close" );
            }
            */
        }
    }
    generarReporteFinalizacion(strRelativePath, StrNombreOpcion) {
        var strTipoReporte = null;
        var blnProcesarReporte = null;
        if (document.getElementById("ParametosBusquedacmbGenerarReporte") != null) {
            strTipoReporte = document.getElementById("ParametosBusquedacmbGenerarReporte").value;
        }
        blnProcesarReporte = true;
        if (strTipoReporte != null && strTipoReporte != "") {
            this.procesarFinalizacionBusqueda(blnProcesarReporte, strTipoReporte, strRelativePath, StrNombreOpcion);
        }
        else {
            this.mostrarOcultarProcesando(false, null);
            alert("ESCOJA UN TIPO DE REPORTE");
        }
    }
    procesarFinalizacionBusquedaPrincipal(strRelativePath, StrNombreOpcion, sNombreClase) {
        var strTipoReporte = null;
        var blnProcesarReporte = null;
        if (document.getElementById("ParametosBusquedacmbGenerarReporte") != null) {
            strTipoReporte = document.getElementById("ParametosBusquedacmbGenerarReporte").value;
        }
        if (document.getElementById("ParamsBuscarChbGenerarReporte") != null) {
            blnProcesarReporte = document.getElementById("ParamsBuscarChbGenerarReporte").checked;
        }
        if (document.getElementById("leftSidebar") != null
            && document.getElementById("leftSidebar").style.opacity != null
            && document.getElementById("leftSidebar").style.opacity != "1") {
            this.resaltarRestaurarDivsPagina(false, sNombreClase);
        }
        this.procesarFinalizacionBusqueda(blnProcesarReporte, strTipoReporte, strRelativePath, StrNombreOpcion);
    }
    procesarInicioBusquedaPrincipal(strRelativePath, sNombreClase) {
        var strTipoReporte = null;
        if (document.getElementById("frmBusqueda" + sNombreClase + ":cmbGenerarReporte") != null) {
            strTipoReporte = document.getElementById("frmBusqueda" + sNombreClase + ":cmbGenerarReporte").value;
        }
        this.procesarInicioBusqueda(strTipoReporte, strRelativePath);
    }
    actualizarEstadoBotones(strAccion, strPermisos, bitGuardarCambiosEnLote, bitEsMantenimientoRelacionado, sNombreClase) {
        this.actualizarEstadoCeldasBotones(strAccion, bitGuardarCambiosEnLote, bitEsMantenimientoRelacionado, document.getElementById("tblAccionesMantenimiento" + sNombreClase + "").rows["trAccionesMantenimiento" + sNombreClase + "Basicos"].cells["tdbtnNuevo" + sNombreClase + ""], document.getElementById("tblAccionesMantenimiento" + sNombreClase + "").rows["trAccionesMantenimiento" + sNombreClase + "Basicos"].cells["tdbtnActualizar" + sNombreClase + ""], document.getElementById("tblAccionesMantenimiento" + sNombreClase + "").rows["trAccionesMantenimiento" + sNombreClase + "Basicos"].cells["tdbtnEliminar" + sNombreClase + ""], document.getElementById("tblAccionesMantenimiento" + sNombreClase + "").rows["trAccionesMantenimiento" + sNombreClase + "Basicos"].cells["tdbtnCancelar" + sNombreClase + ""], document.getElementById("tblAccionesMantenimiento" + sNombreClase + "").rows["trAccionesMantenimiento" + sNombreClase + "Guardar"].cells["tdbtnGuardarCambios" + sNombreClase + ""], document.getElementById("tdbtnNuevoPreparar" + sNombreClase + ""), document.getElementById("tdbtnModificarDatos" + sNombreClase + ""), strPermisos);
    }
    mostrarOcultarControlesMantenimiento(blnEsMostrar, sNombreClase) {
        if (blnEsMostrar == true) {
            //tipoguiaremisionFuncionGeneral.bitEstaEnModoEdicion=true;
        }
        var rowElementos = document.getElementById("tr" + sNombreClase + "Elementos");
        var rowAcciones = document.getElementById("tr" + sNombreClase + "Acciones");
        this.mostrarOcultarFila(rowElementos, blnEsMostrar);
        this.mostrarOcultarFila(rowAcciones, blnEsMostrar);
    }
    eliminarOnClick(strRelativePath, sNombreClase) {
        if (confirm(" Esta seguro de eliminar el actual " + sNombreClase + " ?  ")) {
            //this.procesarInicioProcesoTipoGuiaRemision();
            this.procesarInicioProceso(strRelativePath);
        }
        else {
            //Event es de prototype
            if (Event != null) {
                Event.stop('ELIMINAR');
            }
        }
    }
    seleccionarMostrarDivResumenActualOnComplete(sNombreClase, objetoFuncionGeneral) {
        objetoFuncionGeneral.procesarFinalizacionProceso();
        jQuery("#divResumen" + sNombreClase + "ActualAjaxWebPart").dialog("open");
        funcionGeneral.irAreaDePagina(sNombreClase + "Actual");
        document.getElementById("outerBorder").style.filter = "alpha(opacity=50)";
        document.getElementById("outerBorder").style.opacity = "0.5";
        document.getElementById("divResumen" + sNombreClase + "ActualAjaxWebPart").style.background = "#FFFFFF";
    }
    seleccionarMostrarDivAccionesRelacionesActualOnComplete(sNombreClase, objetoFuncionGeneral, objetoConstante) {
        objetoFuncionGeneral.procesarFinalizacionProceso(objetoConstante, sNombreClase);
        jQuery("#divAccionesRelaciones" + sNombreClase + "AjaxWebPart").dialog("open");
        funcionGeneral.irAreaDePagina(sNombreClase + "Actual");
        document.getElementById("outerBorder").style.filter = "alpha(opacity=50)";
        document.getElementById("outerBorder").style.opacity = "0.5";
        document.getElementById("divAccionesRelaciones" + sNombreClase + "AjaxWebPart").style.background = "#FFFFFF";
    }
    changeUpper(variable1) {
        if ((typeof variable1) === "string") {
            return variable1.toUpperCase();
        }
        else {
            return variable1;
        }
        //return variable1;
    }
    changeTrim(variable1) {
        return variable1.trim();
    }
    getCheckBox(value, nombre, paraReporte) {
        let strCheckBox = "";
        strCheckBox = this.getCheckBoxInterno(value, false, nombre, paraReporte);
        return strCheckBox;
    }
    getCheckBoxEditar(value, nombre, paraReporte) {
        let strCheckBox = "";
        strCheckBox = this.getCheckBoxInterno(value, true, nombre, paraReporte);
        return strCheckBox;
    }
    getCheckBoxInterno(value, editar, nombre, paraReporte) {
        let strCheckBox = "";
        let strDisabled = "disabled='disabled'";
        let strIdName = "";
        let strValue = "false";
        //</body>alert(nombre);
        //alert(value+editar+nombre+paraReporte);
        strIdName = " id='" + nombre + "' name='" + nombre + "'";
        if (editar) {
            strDisabled = "";
        }
        if (value == true || value == "1" || value == "on") {
            strValue = "true";
        }
        if (!paraReporte) {
            if (value == 1) {
                strCheckBox = "<input" + strIdName + " type='checkbox' value='" + strValue + "' " + strDisabled + " checked='checked'>";
            }
            else {
                strCheckBox = "<input" + strIdName + " type='checkbox' value='" + strValue + "' " + strDisabled + ">";
            }
        }
        else {
            if (value == 1) {
                strCheckBox = constantes.S_MENSAJE_ACTIVO;
            }
            else {
                strCheckBox = constantes.S_MENSAJE_NOACTIVO;
            }
        }
        return strCheckBox;
    }
    existeCadenaArrayOrderBy(cadenaBuscar, arrCadenasOrderBy, bitParaReporteOrderBy) {
        //ESTA VERIFICACION VENÌA DE PHP, NO SE APLICA AQUI
        //let existe=false;
        //VERIFICAR RETURN
        //debugger;
        /*
        if(bitParaReporteOrderBy) {
            
            if(arrCadenasOrderBy!=null && arrCadenasOrderBy.length>0) {
                
                for (let orderBy of arrCadenasOrderBy) {
                    if(orderBy.isSelected && cadenaBuscar==orderBy.nombre) {
                        existe=true;
                        break;
                    }
                }
            }
        } else {
            existe=true;
        }
        */
        //return existe;
        return true;
    }
    //FUNCIONES TABLA DATOS
    count(lista) {
        let tamanio = 0;
        if (lista != undefined && lista != null) {
            tamanio = lista.length;
        }
        //alert(tamanio);
        return tamanio;
    }
    ValCol(columna, paraReporte) {
        let retorno = true;
        if (paraReporte) {
            //Faltan los 2 parametros
            //funcionGeneral.existeCadenaArrayOrderBy(columna,arrCadenasOrderBy,bitParaReporteOrderBy);
        }
        return retorno;
    }
    getClassRowTableHtml(i) {
        let class_css = "";
        if (i++ % 2 === 0) {
            class_css = "filazebra";
        }
        else {
            class_css = "filazebraanti";
        }
        //alert(class_css);
        return class_css;
    }
    getOnMouseOverHtml(STR_TIPO_TABLA, i) {
        let onmouse = "";
        let class_css = "";
        class_css = funcionGeneral.getClassRowTableHtml(i);
        if (STR_TIPO_TABLA == "normal") {
            onmouse = ' onmouseover="funcionGeneral.activarFilaTabla(this);" onmouseout="funcionGeneral.desactivarFilaTabla(this,\'' + class_css + '\');" ';
        }
        //alert(onmouse);
        return onmouse;
    }
    getOnMouseOverHtmlReporte(paraReporte, STR_TIPO_TABLA, i) {
        let onmouse = "";
        let class_css = "";
        class_css = funcionGeneral.getClassRowTableHtml(i);
        if (!paraReporte && STR_TIPO_TABLA == "normal") {
            onmouse = ' onmouseover="funcionGeneral.activarFilaTabla(this);" onmouseout="funcionGeneral.desactivarFilaTabla(this,\'' + class_css + '\');" ';
        }
        //alert(onmouse);
        return onmouse;
    }
    Is_List_Exist(list) {
        let retorno = false;
        if (list != null && list.length > 0) {
            retorno = true;
        }
        //alert(list);
        return retorno;
    }
    If_Not(value) {
        //alert(value);
        let retorno = true;
        if (value) {
            retorno = false;
        }
        return retorno;
    }
    If_Yes_AND_Not(value1, value2) {
        let retorno = false;
        if (value1 && !value2) {
            retorno = true;
        }
        return retorno;
    }
    If_Not_AND_Not_AND_Not(value1, value2, value3) {
        let retorno = false;
        if (!value1 && !value2 && !value3) {
            retorno = true;
        }
        return retorno;
    }
    If_Not_AND_Not(value1, value2) {
        let retorno = false;
        if (!value1 && !value2) {
            retorno = true;
        }
        return retorno;
    }
    If_NotText_AND_Not(value1, text, value2) {
        let retorno = false;
        //alert(value1 + "-" + text + "-" + value2);
        if ((value1 != text) && !value2) {
            //alert("here--"+value1 + "-" + text + "-" + value2);
            retorno = true;
        }
        return retorno;
    }
    If_NotText(value1, text) {
        let retorno = false;
        //alert(value1 + "-" + text + "-" + value2);
        if (value1 != text) {
            //alert("here--"+value1 + "-" + text + "-" + value2);
            retorno = true;
        }
        return retorno;
    }
}
var funcionGeneral = new FuncionGeneral();
export { FuncionGeneral, funcionGeneral };
/*
var isLoaded=false;

function onLoadPage(){
    funcionGeneral.procesarFinalizacionProceso();
    isLoaded=true;
}

window.onload=onLoadPage;
*/
//</script>
