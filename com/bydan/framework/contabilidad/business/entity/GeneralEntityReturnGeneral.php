<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

class GeneralEntityReturnGeneral extends GeneralEntityParameterGeneral {
    
    public bool $conMostrarMensaje=false;
    public bool $conRecargarInformacion=false;
    public bool $conRecargarPropiedades=false;
    public bool $conRecargarFKs=false;
    public bool $conRecargarRelaciones=false;
    public bool $conActualizarPantalla=false;
    public bool $conSeleccionarNinguno=true;
    public bool $conFuncionJs=false;
    public string $sFuncionJs='';
    public string $strRecargarFkTipos='NINGUNO';    
	
    public string $sMensajeProceso='';
    public string $sLabelProceso='';
    public string $sTipoMensaje='';
    public string $htmlTablaReporteAuxiliar='';
	
    public string $sAuxiliarUrlPagina='';
    public string $sAuxiliarTipo='POPUP';
	
    public bool $conRetornoEstaProcesado=false;
    public bool $conRetornoLista=false;
    public bool $conRetornoObjeto=false;
    public bool $conAbrirVentana=false;
    public bool $conAbrirVentanaAuxiliar=false;
    public bool $conReturnJson=true;
    public bool $conGuardarReturnSessionJs=false;
    
    public array $datos=array();
    
	function __construct() { 
	    
	    parent::__construct();
	    
		$this->conMostrarMensaje=false;
		$this->conRecargarInformacion=false;
		$this->conRecargarPropiedades=false;
		$this->conRecargarFKs=false;
		$this->strRecargarFkTipos='NINGUNO';
		$this->conRecargarRelaciones=false;
		$this->conActualizarPantalla=false;
		$this->conSeleccionarNinguno=true;
		
		$this->conRetornoEstaProcesado=false;
		$this->conRetornoLista=false;
		$this->conRetornoObjeto=false;
		$this->sLabelProceso='';
		$this->sMensajeProceso='';
		$this->sTipoMensaje='';
		
		$this->conAbrirVentana=false;
		$this->conAbrirVentanaAuxiliar=false;
		$this->htmlTablaReporteAuxiliar='';
		$this->conReturnJson=true;
		$this->conGuardarReturnSessionJs=false;
		
		$this->sAuxiliarUrlPagina='';
		$this->sAuxiliarTipo='POPUP';
		
		$this->conFuncionJs=false;
		$this->sFuncionJs='';
		
		$this->datos=array();
	} 		

	public function setConMostrarMensaje(bool $conMostrarMensaje) {
		$this->conMostrarMensaje = $conMostrarMensaje;
	}
	
	public function getConMostrarMensaje() : bool {
		return $this->conMostrarMensaje;
	}

	public function getConRecargarInformacion() : bool {
		return $this->conRecargarInformacion;
	}

	public function setConRecargarInformacion(bool $conRecargarInformacion) {
		$this->conRecargarInformacion = $conRecargarInformacion;
	}
	
	public function getConRecargarPropiedades() : bool {
		return $this->conRecargarPropiedades;
	}

	public function getConRecargarFKs() : bool {
	    return $this->conRecargarFKs;
	}
	
	public function getstrRecargarFkTipos() : string {
	    return $this->strRecargarFkTipos;
	}
	
	public function getConRecargarRelaciones() : bool {
		return $this->conRecargarRelaciones;
	}

	public function setConRecargarRelaciones(bool $conRecargarRelaciones) {
		$this->conRecargarRelaciones= $conRecargarRelaciones;
	}
	
	public function setConRecargarPropiedades(bool $conRecargarPropiedades) {
		$this->conRecargarPropiedades= $conRecargarPropiedades;
	}
	
	public function setConRecargarFKs(bool $conRecargarFKs) {
	    $this->conRecargarFKs= $conRecargarFKs;
	}
	
	public function setstrRecargarFkTipos(string $strRecargarFkTipos) {
	    $this->strRecargarFkTipos= $strRecargarFkTipos;
	}
	
	public function getConActualizarPantalla() : bool {
		return $this->conActualizarPantalla;
	}

	public function setConActualizarPantalla(bool $conActualizarPantalla) {
		$this->conActualizarPantalla = $conActualizarPantalla;
	}

	public function getconSeleccionarNinguno() : bool {
		return $this->conSeleccionarNinguno;
	}

	public function setconSeleccionarNinguno(bool $conSeleccionarNinguno) {
		$this->conSeleccionarNinguno = $conSeleccionarNinguno;
	}

	public function getConRetornoEstaProcesado() : bool {
		return $this->conRetornoEstaProcesado;
	}

	public function setConRetornoEstaProcesado(bool $conRetornoEstaProcesado) {
		$this->conRetornoEstaProcesado = $conRetornoEstaProcesado;
	}	
	
	public function getConRetornoLista() : bool {
		return $this->conRetornoLista;
	}

	public function setConRetornoLista(bool $conRetornoLista) {
		$this->conRetornoLista = $conRetornoLista;
	}

	public function getConRetornoObjeto() : bool {
		return $this->conRetornoObjeto;
	}

	public function setConRetornoObjeto(bool $conRetornoObjeto) {
		$this->conRetornoObjeto = $conRetornoObjeto;
	}

	public function getsMensajeProceso() : string {
		return $this->sMensajeProceso;
	}

	public function setsMensajeProceso(string $sMensajeProceso) {
		$this->sMensajeProceso = $sMensajeProceso;
	}
	
	public function getsLabelProceso() : string {
		return $this->sLabelProceso;
	}

	public function setsLabelProceso(string $sLabelProceso) {
		$this->sLabelProceso = $sLabelProceso;
	}
	
	public function getsTipoMensaje() : string {
		return $this->sTipoMensaje;
	}

	public function setsTipoMensaje(string $sTipoMensaje) {
		$this->sTipoMensaje = $sTipoMensaje;
	}	
	
	public static function ConfigurarConMensajeConRecargar(GeneralEntityReturnGeneral $generalEntityReturnGeneral,string $sProceso) {
		
	    $generalEntityReturnGeneral->setConMostrarMensaje(true);
		$generalEntityReturnGeneral->setsLabelProceso("PROCESO ".$sProceso);
		$generalEntityReturnGeneral->setsMensajeProceso("PROCESO ".$sProceso." REALIZADO CORRECTAMENTE");
		$generalEntityReturnGeneral->setsTipoMensaje("INFO");
		
		$generalEntityReturnGeneral->setConRecargarInformacion(true);
	}	
	
	public function getConAbrirVentana() : bool {
		return $this->conAbrirVentana;
	}

	public function setConAbrirVentana(bool $conAbrirVentana) {
		$this->conAbrirVentana = $conAbrirVentana;
	}
	
	public function getConAbrirVentanaAuxiliar() : bool {
		return $this->conAbrirVentanaAuxiliar;
	}
	
	public function setConAbrirVentanaAuxiliar(bool $conAbrirVentanaAuxiliar) {
		$this->conAbrirVentanaAuxiliar = $conAbrirVentanaAuxiliar;
	}
	
	public function getHtmlTablaReporteAuxiliar() : string {
		return $this->htmlTablaReporteAuxiliar;
	}
	
	public function setHtmlTablaReporteAuxiliar(string $htmlTablaReporteAuxiliar) {
		$this->htmlTablaReporteAuxiliar = $htmlTablaReporteAuxiliar;
	}
	
	public function getConReturnJson() : bool {
		return $this->conReturnJson;
	}
	
	public function setConReturnJson(bool $conReturnJson) {
		$this->conReturnJson = $conReturnJson;
	}
	
	public function getConGuardarReturnSessionJs() : bool {
	    return $this->conGuardarReturnSessionJs;
	}
	
	public function setConGuardarReturnSessionJs(bool $conGuardarReturnSessionJs) {
	    $this->conGuardarReturnSessionJs = $conGuardarReturnSessionJs;
	}
	
	
	public function getsAuxiliarUrlPagina() : string {
		return $this->sAuxiliarUrlPagina;
	}
	
	public function setsAuxiliarUrlPagina(string $sAuxiliarUrlPagina) {
		return $this->sAuxiliarUrlPagina=$sAuxiliarUrlPagina;
	}
	
	public function getsAuxiliarTipo() : string {
		return $this->sAuxiliarTipo;
	}
	
	public function setsAuxiliarTipo(string $sAuxiliarTipo) {
		return $this->sAuxiliarTipo=$sAuxiliarTipo;
	}	
	
	public function getConFuncionJs() : bool {
	    return $this->conFuncionJs;
	}
	
	public function setConFuncionJs(bool $conFuncionJs) {
	    $this->conFuncionJs = $conFuncionJs;
	}
	
	public function getsFuncionJs() : string {
	    return $this->sFuncionJs;
	}
	
	public function setsFuncionJs(string $sFuncionJs) {
	    return $this->sFuncionJs=$sFuncionJs;
	}
	
	public function getDatos() : array {
	    return $this->datos;
	}
	
	public function setDatos(array $datos) {
	    return $this->datos=$datos;
	}
}

?>