<?php declare(strict_types  =  1);

namespace com\bydan\framework\contabilidad\util;

class Mensaje {
    
	private string $strTitulo = '';
	private string $strMensajeUsuario = '';
	private string $strMensajeTecnico = '';
	private string $mensajeGrupo = '';
	private string $mensajeTipo = '';
	private bool $esOpcional = false;
	private string $strNombreMensaje = '';

	public function getEsOpcional(): bool {
		return $this->esOpcional;
	}
	
	public function setEsOpcional(bool $esOpcional) {
		$this->esOpcional  =  $esOpcional;
	}
	
	public function Mensaje0(string $strNombreMensaje,string $strTitulo,string $strMensajeUsuario,string $strMensajeTecnico,string $mensajeGrupo) { //static
		$this->strNombreMensaje =  $strNombreMensaje;
		$this->strTitulo = $strTitulo;
		$this->strMensajeUsuario = $strMensajeUsuario;
		$this->strMensajeTecnico = $strMensajeTecnico;
		$this->mensajeGrupo = $mensajeGrupo;
		$this->esOpcional = false;
		
		if($this->mensajeGrupo == MensajeGrupo::$EXCEPTION) {
			$this->mensajeTipo = MensajeTipo::$ERROR;
			$this->strNombreMensaje = "excepcion";
		}
	}
	
	public function  Mensaje1(string $strTitulo,string $strMensajeUsuario,string $strMensajeTecnico,string $mensajeGrupo) { //static
		$this->strTitulo = $strTitulo;
		$this->strMensajeUsuario = $strMensajeUsuario;
		$this->strMensajeTecnico = $strMensajeTecnico;
		$this->mensajeGrupo = $mensajeGrupo;
		$this->esOpcional = false;
		
		if($this->mensajeGrupo == MensajeGrupo::$EXCEPTION) {
			$this->mensajeTipo = MensajeTipo::$ERROR;
			$this->strNombreMensaje = "excepcion";
		}
	}
	
	public function Mensaje2(string $strNombreMensaje,string $strTitulo,string $strMensajeUsuario,string $strMensajeTecnico,string $mensajeGrupo,string $mensajeTipo,bool $esOpcional) {//static
		$this->strNombreMensaje = $strNombreMensaje;
		$this->strTitulo = $strTitulo;
		$this->strMensajeUsuario = $strMensajeUsuario;
		$this->strMensajeTecnico = $strMensajeTecnico;
		$this->mensajeGrupo = $mensajeGrupo;
		$this->mensajeTipo = $mensajeTipo;
		$this->esOpcional = $esOpcional;
	}
	
	function __construct() {
		$this->strTitulo = "NONE";
		$this->strMensajeUsuario = "NONE";
		$this->strMensajeTecnico = "NONE";
		$this->strNombreMensaje = "NONE";
		$this->mensajeGrupo = MensajeGrupo::$APLICACION;
		$this->mensajeTipo = MensajeTipo::$INFORMACION;
		$this->esOpcional = true;
	}
	
	public function getMensajeGrupo():string {
		return $this->mensajeGrupo;
	}
	
	public function setMensajeGrupo(string $mensajeGrupo) {
		$this->mensajeGrupo  =  $mensajeGrupo;
	}
	
	public function getMensajeTipo():string {
		return $this->mensajeTipo;
	}
	
	public function setMensajeTipo(string $mensajeTipo) {
		$this->mensajeTipo  =  $mensajeTipo;
	}
	
	public function getStrMensajeTecnico():string {
		return $this->strMensajeTecnico;
	}
	
	public function setStrMensajeTecnico(string $strMensajeTecnico) {
		$this->strMensajeTecnico  =  $strMensajeTecnico;
	}
	
	public function getStrMensajeUsuario():string {
		return $this->strMensajeUsuario;
	}
	
	public function setStrMensajeUsuario(string $strMensajeUsuario) {
		$this->strMensajeUsuario  =  $strMensajeUsuario;
	}
	
	public function getStrTitulo():string {
		return $this->strTitulo;
	}
	
	public function setStrTitulo(string $strTitulo) {
		$this->strTitulo  =  $strTitulo;
	}
	
	public function getStrNombreMensaje():string {
		return $this->strNombreMensaje;
	}
	
	public function setStrNombreMensaje(string $strNombreMensaje) {
		$this->strNombreMensaje  =  $strNombreMensaje;
	}
	
	public static function getMensajeGeneralInformacionProcesoExitoso(string $strNombre,string $strTitulo,string $strMensajeUsuario,string $strMensajeTecnico):string {
		$mensaje = new Mensaje($strNombre, $strTitulo,$strMensajeUsuario,$strMensajeTecnico,MensajeGrupo::$APLICACION,MensajeTipo::$INFORMACION,false);	
		
		return $mensaje->toNewXmlMensaje($strNombre);	
	}
	
	public static function getMensajeGeneraldefault():string {
		$mensaje = new Mensaje("NONE","NONE","NONE","NONE",MensajeGrupo::$NONE,MensajeTipo::$NONE,true);	
		
		return $mensaje->toAppendXmlMensaje('');	
	}
	
	public static function getMensajeGeneralNoExisteBusqueda(string $nombreClase):string {
		$mensaje = new Mensaje("noexistencia","Busqueda de " + $nombreClase + "s","No existen " + $nombreClase + "s en esta busqueda","NONE",MensajeGrupo::$APLICACION,MensajeTipo::$INFORMACION,true);	
		
		return $mensaje->toNewXmlMensaje($nombreClase);	
	}
	
	public static function getMensajeGeneralNuevo(string $nombreClase):string {
		$mensaje = new Mensaje("nuevo","Mantenimiento de " + $nombreClase + "","Nuevo " + $nombreClase + " ingresado correctamente","NONE",MensajeGrupo::$APLICACION,MensajeTipo::$INFORMACION,true);	
		
		return $mensaje->toAppendXmlMensaje($nombreClase);	
	}
	
	public static function getMensajeGeneralActualizar(string $nombreClase):string {
		$mensaje = new Mensaje("actualizar","Mantenimiento de " + $nombreClase + "",$nombreClase + " actualizado correctamente","NONE",MensajeGrupo::$APLICACION,MensajeTipo::$INFORMACION,true);	
		
		return $mensaje->toAppendXmlMensaje($nombreClase);	
	}
	
	public static function getMensajeGeneralEliminar(string $nombreClase) :string {
		$mensaje = new Mensaje("eliminar","Mantenimiento de " + $nombreClase + "",$nombreClase + " eliminado correctamente","NONE",MensajeGrupo::$APLICACION,MensajeTipo::$INFORMACION,true);	
		return $mensaje->toAppendXmlMensaje($nombreClase);	
	}
	
	public static function getMensajeGeneralDeepSave(string $titulo):string {
		$mensaje = new Mensaje("deepsave",$titulo,"Los datos han sido guardados correctamente","NONE",MensajeGrupo::$APLICACION,MensajeTipo::$INFORMACION,false);	
		
		return $mensaje->toAppendXmlMensaje($titulo);	
	}
	
	public static function getMensajeGeneralDeepLoad(string $titulo):string {
		$mensaje = new Mensaje("deepload",$titulo,"Los datos han sido cargados correctamente","NONE",MensajeGrupo::$APLICACION,MensajeTipo::$INFORMACION,true);	
		
		return $mensaje->toAppendXmlMensaje($titulo);	
	}
	
	public function toNewXmlMensaje(string $strNombreClase):string {
		$xml  =  '';
		
		$xml = $xml."<?xml version = \"1.0\"?>\n";
		$xml = $xml."<" + $strNombreClase + " generated = \"\">\n";	    
		 
		$xml = $xml."<itemMensaje code = \"\">\n";
		$xml = $xml."<grupo>";
		$xml = $xml.$this->mensajeGrupo;
		$xml = $xml."</grupo>\n";
	
		$xml = $xml."<tipo>";
		$xml = $xml.$this->mensajeTipo;
		$xml = $xml."</tipo>\n";
	
		$xml = $xml."<nombremensaje>";
		$xml = $xml.$this->strNombreMensaje;
		$xml = $xml."</nombremensaje>\n";
		
		$xml = $xml."<esopcional>";
		$xml = $xml.$this->esOpcional;
		$xml = $xml."</esopcional>\n";
		
		$xml = $xml."<titulo>";
		$xml = $xml.$this->strTitulo;
		$xml = $xml."</titulo>\n";
		
		$xml = $xml."<mensajeusuario>";
		$xml = $xml.$this->strMensajeUsuario;
		$xml = $xml."</mensajeusuario>\n";
		
		$xml = $xml."<mensajetecnico>";
		$xml = $xml.$this->strMensajeTecnico;
		$xml = $xml."</mensajetecnico>\n";
		
		$xml = $xml."</itemMensaje>\n";	
		
		$xml = $xml."</" + $strNombreClase + ">\n";
	 
		return $xml;
	}
	
	public function toNewXmlMensaje1():string {
		$xml  =  '';
		
		$xml = $xml."<?xml version = \"1.0\"?>\n";
		$xml = $xml."<mensaje generated = \"\">\n";	    
		 
		$xml = $xml."<itemMensaje code = \"\">\n";
		$xml = $xml."<grupo>";
		$xml = $xml.$this->mensajeGrupo;
		$xml = $xml."</grupo>\n";
	
		$xml = $xml."<tipo>";
		$xml = $xml.$this->mensajeTipo;
		$xml = $xml."</tipo>\n";
	
		$xml = $xml."<nombremensaje>";
		$xml = $xml.$this->strNombreMensaje;
		$xml = $xml."</nombremensaje>\n";
		
		$xml = $xml."<esopcional>";
		$xml = $xml.$this->esOpcional;
		$xml = $xml."</esopcional>\n";
		
		$xml = $xml."<titulo>";
		$xml = $xml.$this->strTitulo;
		$xml = $xml."</titulo>\n";
		
		$xml = $xml."<mensajeusuario>";
		$xml = $xml.$this->strMensajeUsuario;
		$xml = $xml."</mensajeusuario>\n";
		
		$xml = $xml."<mensajetecnico>";
		$xml = $xml.$this->strMensajeTecnico;
		$xml = $xml."</mensajetecnico>\n";
		
		$xml = $xml."</itemMensaje>\n";	
		
		$xml = $xml."</mensaje>\n";
	   
		return $xml;
	}
	
	public function toAppendXmlMensaje(string $strNombreClase) :string{
		$xml  = '';
		
		$xml = $xml."<?xml version = \"1.0\"?>\n";
		$xml = $xml."<" + $strNombreClase + " generated = \"\">\n";
		 
		$xml = $xml."<itemMensaje code = \"\">\n";
		
		$xml = $xml."<grupo>";
		$xml = $xml.$this->mensajeGrupo;
		$xml = $xml."</grupo>\n";
	
		$xml = $xml."<tipo>";
		$xml = $xml.$this->mensajeTipo;
		$xml = $xml."</tipo>\n";
		
		$xml = $xml."<nombremensaje>";
		$xml = $xml.$this->strNombreMensaje;
		$xml = $xml."</nombremensaje>\n";
		
		$xml = $xml."<esopcional>";
		$xml = $xml.$this->esOpcional;
		$xml = $xml."</esopcional>\n";
		
		$xml = $xml."<titulo>";
		$xml = $xml.$this->strTitulo;
		$xml = $xml."</titulo>\n";
		
		$xml = $xml."<mensajeusuario>";
		$xml = $xml.$this->strMensajeUsuario;
		$xml = $xml."</mensajeusuario>\n";
		
		$xml = $xml."<mensajetecnico>";
		$xml = $xml.$this->strMensajeTecnico;
		$xml = $xml."</mensajetecnico>\n";
		
		$xml = $xml."</itemMensaje>\n";	    
		
		
		$xml = $xml."</" + $strNombreClase + ">\n";
		
		return $xml;
	}
	
	public function toAppendXmlMensaje3():string {
		$xml  = '';   
			
		$xml = $xml."<itemMensaje code = \"\">\n";
		
		$xml = $xml."<grupo>";
		$xml = $xml.$this->mensajeGrupo;
		$xml = $xml."</grupo>\n";
	
		$xml = $xml."<tipo>";
		$xml = $xml.$this->mensajeTipo;
		$xml = $xml."</tipo>\n";
		
		$xml = $xml."<nombremensaje>";
		$xml = $xml.$this->strNombreMensaje;
		$xml = $xml."</nombremensaje>\n";
		
		$xml = $xml."<esopcional>";
		$xml = $xml.$this->esOpcional;
		$xml = $xml."</esopcional>\n";
		
		$xml = $xml."<titulo>";
		$xml = $xml.$this->strTitulo;
		$xml = $xml."</titulo>\n";
		
		$xml = $xml."<mensajeusuario>";
		$xml = $xml.$this->strMensajeUsuario;
		$xml = $xml."</mensajeusuario>\n";
		
		$xml = $xml."<mensajetecnico>";
		$xml = $xml.$this->strMensajeTecnico;
		$xml = $xml."</mensajetecnico>\n";
		
		$xml = $xml."</itemMensaje>\n";	    				
		   
		return $xml;
	}
}

?>