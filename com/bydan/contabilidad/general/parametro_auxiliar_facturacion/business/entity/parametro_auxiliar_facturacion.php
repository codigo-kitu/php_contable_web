<?php declare(strict_types = 1);
 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/
namespace com\bydan\contabilidad\general\parametro_auxiliar_facturacion\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class parametro_auxiliar_facturacion extends GeneralEntity {

	/*GENERAL*/
	public static string $class='parametro_auxiliar_facturacion';
	
	/*AUXILIARES*/
	public ?parametro_auxiliar_facturacion $parametro_auxiliar_facturacion_Original=null;	
	public ?GeneralEntity $parametro_auxiliar_facturacion_Additional=null;
	public array $map_parametro_auxiliar_facturacion=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public string $nombre_tipo_factura = '';
	public int $siguiente_numero_correlativo = 0;
	public int $incremento = 0;
	public bool $con_creacion_rapida_producto = false;
	public bool $con_busqueda_producto_fabricante = false;
	public bool $con_solo_costo_producto = false;
	public bool $con_recibo = false;
	public string $nombre_tipo_factura_recibo = '';
	public int $siguiente_numero_correlativo_recibo = 0;
	public int $incremento_recibo = 0;
	public bool $con_impuesto_final_boleta = false;
	public bool $con_ticket = false;
	public string $nombre_tipo_factura_ticket = '';
	public int $siguiente_numero_correlativo_ticket = 0;
	public int $incremento_ticket = 0;
	public bool $con_impuesto_final_ticket = false;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->parametro_auxiliar_facturacion_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->nombre_tipo_factura='';
 		$this->siguiente_numero_correlativo=0;
 		$this->incremento=0;
 		$this->con_creacion_rapida_producto=false;
 		$this->con_busqueda_producto_fabricante=false;
 		$this->con_solo_costo_producto=false;
 		$this->con_recibo=false;
 		$this->nombre_tipo_factura_recibo='';
 		$this->siguiente_numero_correlativo_recibo=0;
 		$this->incremento_recibo=0;
 		$this->con_impuesto_final_boleta=false;
 		$this->con_ticket=false;
 		$this->nombre_tipo_factura_ticket='';
 		$this->siguiente_numero_correlativo_ticket=0;
 		$this->incremento_ticket=0;
 		$this->con_impuesto_final_ticket=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_auxiliar_facturacion_Additional=new parametro_auxiliar_facturacion_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_parametro_auxiliar_facturacion() {
		$this->map_parametro_auxiliar_facturacion = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getnombre_tipo_factura() : ?string {
		return $this->nombre_tipo_factura;
	}
    
	public function  getsiguiente_numero_correlativo() : ?int {
		return $this->siguiente_numero_correlativo;
	}
    
	public function  getincremento() : ?int {
		return $this->incremento;
	}
    
	public function  getcon_creacion_rapida_producto() : ?bool {
		return $this->con_creacion_rapida_producto;
	}
    
	public function  getcon_busqueda_producto_fabricante() : ?bool {
		return $this->con_busqueda_producto_fabricante;
	}
    
	public function  getcon_solo_costo_producto() : ?bool {
		return $this->con_solo_costo_producto;
	}
    
	public function  getcon_recibo() : ?bool {
		return $this->con_recibo;
	}
    
	public function  getnombre_tipo_factura_recibo() : ?string {
		return $this->nombre_tipo_factura_recibo;
	}
    
	public function  getsiguiente_numero_correlativo_recibo() : ?int {
		return $this->siguiente_numero_correlativo_recibo;
	}
    
	public function  getincremento_recibo() : ?int {
		return $this->incremento_recibo;
	}
    
	public function  getcon_impuesto_final_boleta() : ?bool {
		return $this->con_impuesto_final_boleta;
	}
    
	public function  getcon_ticket() : ?bool {
		return $this->con_ticket;
	}
    
	public function  getnombre_tipo_factura_ticket() : ?string {
		return $this->nombre_tipo_factura_ticket;
	}
    
	public function  getsiguiente_numero_correlativo_ticket() : ?int {
		return $this->siguiente_numero_correlativo_ticket;
	}
    
	public function  getincremento_ticket() : ?int {
		return $this->incremento_ticket;
	}
    
	public function  getcon_impuesto_final_ticket() : ?bool {
		return $this->con_impuesto_final_ticket;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar_facturacion:No es numero entero - id_empresa='.$newid_empresa);
				}

				$this->id_empresa=$newid_empresa;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_empresa_Descripcion(string $newid_empresa_Descripcion)
	{
		try {
			if($this->id_empresa_Descripcion!=$newid_empresa_Descripcion) {
				if($newid_empresa_Descripcion===null && $newid_empresa_Descripcion!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_tipo_factura(?string $newnombre_tipo_factura)
	{
		try {
			if($this->nombre_tipo_factura!==$newnombre_tipo_factura) {
				if($newnombre_tipo_factura===null && $newnombre_tipo_factura!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna nombre_tipo_factura');
				}

				if(strlen($newnombre_tipo_factura)>25) {
					throw new Exception('parametro_auxiliar_facturacion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=25 en columna nombre_tipo_factura');
				}

				if(filter_var($newnombre_tipo_factura,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_auxiliar_facturacion:Formato incorrecto en columna nombre_tipo_factura='.$newnombre_tipo_factura);
				}

				$this->nombre_tipo_factura=$newnombre_tipo_factura;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsiguiente_numero_correlativo(?int $newsiguiente_numero_correlativo)
	{
		try {
			if($this->siguiente_numero_correlativo!==$newsiguiente_numero_correlativo) {
				if($newsiguiente_numero_correlativo===null && $newsiguiente_numero_correlativo!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna siguiente_numero_correlativo');
				}

				if($newsiguiente_numero_correlativo!==null && filter_var($newsiguiente_numero_correlativo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar_facturacion:No es numero entero - siguiente_numero_correlativo='.$newsiguiente_numero_correlativo);
				}

				$this->siguiente_numero_correlativo=$newsiguiente_numero_correlativo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento(?int $newincremento)
	{
		try {
			if($this->incremento!==$newincremento) {
				if($newincremento===null && $newincremento!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna incremento');
				}

				if($newincremento!==null && filter_var($newincremento,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar_facturacion:No es numero entero - incremento='.$newincremento);
				}

				$this->incremento=$newincremento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_creacion_rapida_producto(?bool $newcon_creacion_rapida_producto)
	{
		try {
			if($this->con_creacion_rapida_producto!==$newcon_creacion_rapida_producto) {
				if($newcon_creacion_rapida_producto===null && $newcon_creacion_rapida_producto!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna con_creacion_rapida_producto');
				}

				if($newcon_creacion_rapida_producto!==null && filter_var($newcon_creacion_rapida_producto,FILTER_VALIDATE_BOOLEAN)===false && $newcon_creacion_rapida_producto!==0 && $newcon_creacion_rapida_producto!==false) {
					throw new Exception('parametro_auxiliar_facturacion:No es valor booleano - con_creacion_rapida_producto='.$newcon_creacion_rapida_producto);
				}

				$this->con_creacion_rapida_producto=$newcon_creacion_rapida_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_busqueda_producto_fabricante(?bool $newcon_busqueda_producto_fabricante)
	{
		try {
			if($this->con_busqueda_producto_fabricante!==$newcon_busqueda_producto_fabricante) {
				if($newcon_busqueda_producto_fabricante===null && $newcon_busqueda_producto_fabricante!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna con_busqueda_producto_fabricante');
				}

				if($newcon_busqueda_producto_fabricante!==null && filter_var($newcon_busqueda_producto_fabricante,FILTER_VALIDATE_BOOLEAN)===false && $newcon_busqueda_producto_fabricante!==0 && $newcon_busqueda_producto_fabricante!==false) {
					throw new Exception('parametro_auxiliar_facturacion:No es valor booleano - con_busqueda_producto_fabricante='.$newcon_busqueda_producto_fabricante);
				}

				$this->con_busqueda_producto_fabricante=$newcon_busqueda_producto_fabricante;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_solo_costo_producto(?bool $newcon_solo_costo_producto)
	{
		try {
			if($this->con_solo_costo_producto!==$newcon_solo_costo_producto) {
				if($newcon_solo_costo_producto===null && $newcon_solo_costo_producto!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna con_solo_costo_producto');
				}

				if($newcon_solo_costo_producto!==null && filter_var($newcon_solo_costo_producto,FILTER_VALIDATE_BOOLEAN)===false && $newcon_solo_costo_producto!==0 && $newcon_solo_costo_producto!==false) {
					throw new Exception('parametro_auxiliar_facturacion:No es valor booleano - con_solo_costo_producto='.$newcon_solo_costo_producto);
				}

				$this->con_solo_costo_producto=$newcon_solo_costo_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_recibo(?bool $newcon_recibo)
	{
		try {
			if($this->con_recibo!==$newcon_recibo) {
				if($newcon_recibo===null && $newcon_recibo!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna con_recibo');
				}

				if($newcon_recibo!==null && filter_var($newcon_recibo,FILTER_VALIDATE_BOOLEAN)===false && $newcon_recibo!==0 && $newcon_recibo!==false) {
					throw new Exception('parametro_auxiliar_facturacion:No es valor booleano - con_recibo='.$newcon_recibo);
				}

				$this->con_recibo=$newcon_recibo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_tipo_factura_recibo(?string $newnombre_tipo_factura_recibo)
	{
		try {
			if($this->nombre_tipo_factura_recibo!==$newnombre_tipo_factura_recibo) {
				if($newnombre_tipo_factura_recibo===null && $newnombre_tipo_factura_recibo!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna nombre_tipo_factura_recibo');
				}

				if(strlen($newnombre_tipo_factura_recibo)>25) {
					throw new Exception('parametro_auxiliar_facturacion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=25 en columna nombre_tipo_factura_recibo');
				}

				if(filter_var($newnombre_tipo_factura_recibo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_auxiliar_facturacion:Formato incorrecto en columna nombre_tipo_factura_recibo='.$newnombre_tipo_factura_recibo);
				}

				$this->nombre_tipo_factura_recibo=$newnombre_tipo_factura_recibo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsiguiente_numero_correlativo_recibo(?int $newsiguiente_numero_correlativo_recibo)
	{
		try {
			if($this->siguiente_numero_correlativo_recibo!==$newsiguiente_numero_correlativo_recibo) {
				if($newsiguiente_numero_correlativo_recibo===null && $newsiguiente_numero_correlativo_recibo!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna siguiente_numero_correlativo_recibo');
				}

				if($newsiguiente_numero_correlativo_recibo!==null && filter_var($newsiguiente_numero_correlativo_recibo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar_facturacion:No es numero entero - siguiente_numero_correlativo_recibo='.$newsiguiente_numero_correlativo_recibo);
				}

				$this->siguiente_numero_correlativo_recibo=$newsiguiente_numero_correlativo_recibo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento_recibo(?int $newincremento_recibo)
	{
		try {
			if($this->incremento_recibo!==$newincremento_recibo) {
				if($newincremento_recibo===null && $newincremento_recibo!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna incremento_recibo');
				}

				if($newincremento_recibo!==null && filter_var($newincremento_recibo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar_facturacion:No es numero entero - incremento_recibo='.$newincremento_recibo);
				}

				$this->incremento_recibo=$newincremento_recibo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_impuesto_final_boleta(?bool $newcon_impuesto_final_boleta)
	{
		try {
			if($this->con_impuesto_final_boleta!==$newcon_impuesto_final_boleta) {
				if($newcon_impuesto_final_boleta===null && $newcon_impuesto_final_boleta!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna con_impuesto_final_boleta');
				}

				if($newcon_impuesto_final_boleta!==null && filter_var($newcon_impuesto_final_boleta,FILTER_VALIDATE_BOOLEAN)===false && $newcon_impuesto_final_boleta!==0 && $newcon_impuesto_final_boleta!==false) {
					throw new Exception('parametro_auxiliar_facturacion:No es valor booleano - con_impuesto_final_boleta='.$newcon_impuesto_final_boleta);
				}

				$this->con_impuesto_final_boleta=$newcon_impuesto_final_boleta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_ticket(?bool $newcon_ticket)
	{
		try {
			if($this->con_ticket!==$newcon_ticket) {
				if($newcon_ticket===null && $newcon_ticket!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna con_ticket');
				}

				if($newcon_ticket!==null && filter_var($newcon_ticket,FILTER_VALIDATE_BOOLEAN)===false && $newcon_ticket!==0 && $newcon_ticket!==false) {
					throw new Exception('parametro_auxiliar_facturacion:No es valor booleano - con_ticket='.$newcon_ticket);
				}

				$this->con_ticket=$newcon_ticket;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_tipo_factura_ticket(?string $newnombre_tipo_factura_ticket)
	{
		try {
			if($this->nombre_tipo_factura_ticket!==$newnombre_tipo_factura_ticket) {
				if($newnombre_tipo_factura_ticket===null && $newnombre_tipo_factura_ticket!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna nombre_tipo_factura_ticket');
				}

				if(strlen($newnombre_tipo_factura_ticket)>25) {
					throw new Exception('parametro_auxiliar_facturacion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=25 en columna nombre_tipo_factura_ticket');
				}

				if(filter_var($newnombre_tipo_factura_ticket,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_auxiliar_facturacion:Formato incorrecto en columna nombre_tipo_factura_ticket='.$newnombre_tipo_factura_ticket);
				}

				$this->nombre_tipo_factura_ticket=$newnombre_tipo_factura_ticket;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsiguiente_numero_correlativo_ticket(?int $newsiguiente_numero_correlativo_ticket)
	{
		try {
			if($this->siguiente_numero_correlativo_ticket!==$newsiguiente_numero_correlativo_ticket) {
				if($newsiguiente_numero_correlativo_ticket===null && $newsiguiente_numero_correlativo_ticket!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna siguiente_numero_correlativo_ticket');
				}

				if($newsiguiente_numero_correlativo_ticket!==null && filter_var($newsiguiente_numero_correlativo_ticket,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar_facturacion:No es numero entero - siguiente_numero_correlativo_ticket='.$newsiguiente_numero_correlativo_ticket);
				}

				$this->siguiente_numero_correlativo_ticket=$newsiguiente_numero_correlativo_ticket;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento_ticket(?int $newincremento_ticket)
	{
		try {
			if($this->incremento_ticket!==$newincremento_ticket) {
				if($newincremento_ticket===null && $newincremento_ticket!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna incremento_ticket');
				}

				if($newincremento_ticket!==null && filter_var($newincremento_ticket,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar_facturacion:No es numero entero - incremento_ticket='.$newincremento_ticket);
				}

				$this->incremento_ticket=$newincremento_ticket;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_impuesto_final_ticket(?bool $newcon_impuesto_final_ticket)
	{
		try {
			if($this->con_impuesto_final_ticket!==$newcon_impuesto_final_ticket) {
				if($newcon_impuesto_final_ticket===null && $newcon_impuesto_final_ticket!='') {
					throw new Exception('parametro_auxiliar_facturacion:Valor nulo no permitido en columna con_impuesto_final_ticket');
				}

				if($newcon_impuesto_final_ticket!==null && filter_var($newcon_impuesto_final_ticket,FILTER_VALIDATE_BOOLEAN)===false && $newcon_impuesto_final_ticket!==0 && $newcon_impuesto_final_ticket!==false) {
					throw new Exception('parametro_auxiliar_facturacion:No es valor booleano - con_impuesto_final_ticket='.$newcon_impuesto_final_ticket);
				}

				$this->con_impuesto_final_ticket=$newcon_impuesto_final_ticket;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_parametro_auxiliar_facturacionValue(string $sKey,$oValue) {
		$this->map_parametro_auxiliar_facturacion[$sKey]=$oValue;
	}
	
	public function getMap_parametro_auxiliar_facturacionValue(string $sKey) {
		return $this->map_parametro_auxiliar_facturacion[$sKey];
	}
	
	public function getparametro_auxiliar_facturacion_Original() : ?parametro_auxiliar_facturacion {
		return $this->parametro_auxiliar_facturacion_Original;
	}
	
	public function setparametro_auxiliar_facturacion_Original(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion) {
		try {
			$this->parametro_auxiliar_facturacion_Original=$parametro_auxiliar_facturacion;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_parametro_auxiliar_facturacion() : array {
		return $this->map_parametro_auxiliar_facturacion;
	}

	public function setMap_parametro_auxiliar_facturacion(array $map_parametro_auxiliar_facturacion) {
		$this->map_parametro_auxiliar_facturacion = $map_parametro_auxiliar_facturacion;
	}
	
	/*
		campo1,campo2,campo3
		tabla1,tabla2,tabla3
		tablas1,tablas2,tablas3
		getcampo1,getcampo2,getcampo3
		settabla1,settabla2,settabla3
	*/
}
?>
