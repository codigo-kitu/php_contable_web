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
namespace com\bydan\contabilidad\facturacion\parametro_facturacion\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;

class parametro_facturacion extends GeneralEntity {

	/*GENERAL*/
	public static string $class='parametro_facturacion';
	
	/*AUXILIARES*/
	public ?parametro_facturacion $parametro_facturacion_Original=null;	
	public ?GeneralEntity $parametro_facturacion_Additional=null;
	public array $map_parametro_facturacion=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public string $nombre_factura = '';
	public int $numero_factura = 0;
	public int $incremento_factura = 0;
	public bool $solo_costo_producto = false;
	public int $numero_factura_lote = 0;
	public int $incremento_factura_lote = 0;
	public int $numero_devolucion = 0;
	public int $incremento_devolucion = 0;
	public int $id_termino_pago_cliente = -1;
	public string $id_termino_pago_cliente_Descripcion = '';

	public string $nombre_estimado = '';
	public int $numero_estimado = 0;
	public int $incremento_estimado = 0;
	public bool $solo_costo_producto_estimado = false;
	public string $nombre_consignacion = '';
	public int $numero_consignacion = 0;
	public int $incremento_consignacion = 0;
	public bool $solo_costo_producto_consignacion = false;
	public bool $con_recibo = false;
	public string $nombre_recibo = '';
	public int $numero_recibo = 0;
	public int $incremento_recibo = 0;
	public bool $con_impuesto_recibo = false;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?termino_pago_cliente $termino_pago_cliente = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->parametro_facturacion_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->nombre_factura='';
 		$this->numero_factura=0;
 		$this->incremento_factura=0;
 		$this->solo_costo_producto=false;
 		$this->numero_factura_lote=0;
 		$this->incremento_factura_lote=0;
 		$this->numero_devolucion=0;
 		$this->incremento_devolucion=0;
 		$this->id_termino_pago_cliente=-1;
		$this->id_termino_pago_cliente_Descripcion='';

 		$this->nombre_estimado='';
 		$this->numero_estimado=0;
 		$this->incremento_estimado=0;
 		$this->solo_costo_producto_estimado=false;
 		$this->nombre_consignacion='';
 		$this->numero_consignacion=0;
 		$this->incremento_consignacion=0;
 		$this->solo_costo_producto_consignacion=false;
 		$this->con_recibo=false;
 		$this->nombre_recibo='';
 		$this->numero_recibo=0;
 		$this->incremento_recibo=0;
 		$this->con_impuesto_recibo=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->termino_pago_cliente=new termino_pago_cliente();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_facturacion_Additional=new parametro_facturacion_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_parametro_facturacion() {
		$this->map_parametro_facturacion = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getnombre_factura() : ?string {
		return $this->nombre_factura;
	}
    
	public function  getnumero_factura() : ?int {
		return $this->numero_factura;
	}
    
	public function  getincremento_factura() : ?int {
		return $this->incremento_factura;
	}
    
	public function  getsolo_costo_producto() : ?bool {
		return $this->solo_costo_producto;
	}
    
	public function  getnumero_factura_lote() : ?int {
		return $this->numero_factura_lote;
	}
    
	public function  getincremento_factura_lote() : ?int {
		return $this->incremento_factura_lote;
	}
    
	public function  getnumero_devolucion() : ?int {
		return $this->numero_devolucion;
	}
    
	public function  getincremento_devolucion() : ?int {
		return $this->incremento_devolucion;
	}
    
	public function  getid_termino_pago_cliente() : ?int {
		return $this->id_termino_pago_cliente;
	}
	
	public function  getid_termino_pago_cliente_Descripcion() : string {
		return $this->id_termino_pago_cliente_Descripcion;
	}
    
	public function  getnombre_estimado() : ?string {
		return $this->nombre_estimado;
	}
    
	public function  getnumero_estimado() : ?int {
		return $this->numero_estimado;
	}
    
	public function  getincremento_estimado() : ?int {
		return $this->incremento_estimado;
	}
    
	public function  getsolo_costo_producto_estimado() : ?bool {
		return $this->solo_costo_producto_estimado;
	}
    
	public function  getnombre_consignacion() : ?string {
		return $this->nombre_consignacion;
	}
    
	public function  getnumero_consignacion() : ?int {
		return $this->numero_consignacion;
	}
    
	public function  getincremento_consignacion() : ?int {
		return $this->incremento_consignacion;
	}
    
	public function  getsolo_costo_producto_consignacion() : ?bool {
		return $this->solo_costo_producto_consignacion;
	}
    
	public function  getcon_recibo() : ?bool {
		return $this->con_recibo;
	}
    
	public function  getnombre_recibo() : ?string {
		return $this->nombre_recibo;
	}
    
	public function  getnumero_recibo() : ?int {
		return $this->numero_recibo;
	}
    
	public function  getincremento_recibo() : ?int {
		return $this->incremento_recibo;
	}
    
	public function  getcon_impuesto_recibo() : ?bool {
		return $this->con_impuesto_recibo;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_factura(?string $newnombre_factura)
	{
		try {
			if($this->nombre_factura!==$newnombre_factura) {
				if($newnombre_factura===null && $newnombre_factura!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna nombre_factura');
				}

				if(strlen($newnombre_factura)>50) {
					throw new Exception('parametro_facturacion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre_factura');
				}

				if(filter_var($newnombre_factura,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_facturacion:Formato incorrecto en columna nombre_factura='.$newnombre_factura);
				}

				$this->nombre_factura=$newnombre_factura;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_factura(?int $newnumero_factura)
	{
		try {
			if($this->numero_factura!==$newnumero_factura) {
				if($newnumero_factura===null && $newnumero_factura!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna numero_factura');
				}

				if($newnumero_factura!==null && filter_var($newnumero_factura,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - numero_factura='.$newnumero_factura);
				}

				$this->numero_factura=$newnumero_factura;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento_factura(?int $newincremento_factura)
	{
		try {
			if($this->incremento_factura!==$newincremento_factura) {
				if($newincremento_factura===null && $newincremento_factura!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna incremento_factura');
				}

				if($newincremento_factura!==null && filter_var($newincremento_factura,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - incremento_factura='.$newincremento_factura);
				}

				$this->incremento_factura=$newincremento_factura;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsolo_costo_producto(?bool $newsolo_costo_producto)
	{
		try {
			if($this->solo_costo_producto!==$newsolo_costo_producto) {
				if($newsolo_costo_producto===null && $newsolo_costo_producto!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna solo_costo_producto');
				}

				if($newsolo_costo_producto!==null && filter_var($newsolo_costo_producto,FILTER_VALIDATE_BOOLEAN)===false && $newsolo_costo_producto!==0 && $newsolo_costo_producto!==false) {
					throw new Exception('parametro_facturacion:No es valor booleano - solo_costo_producto='.$newsolo_costo_producto);
				}

				$this->solo_costo_producto=$newsolo_costo_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_factura_lote(?int $newnumero_factura_lote)
	{
		try {
			if($this->numero_factura_lote!==$newnumero_factura_lote) {
				if($newnumero_factura_lote===null && $newnumero_factura_lote!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna numero_factura_lote');
				}

				if($newnumero_factura_lote!==null && filter_var($newnumero_factura_lote,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - numero_factura_lote='.$newnumero_factura_lote);
				}

				$this->numero_factura_lote=$newnumero_factura_lote;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento_factura_lote(?int $newincremento_factura_lote)
	{
		try {
			if($this->incremento_factura_lote!==$newincremento_factura_lote) {
				if($newincremento_factura_lote===null && $newincremento_factura_lote!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna incremento_factura_lote');
				}

				if($newincremento_factura_lote!==null && filter_var($newincremento_factura_lote,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - incremento_factura_lote='.$newincremento_factura_lote);
				}

				$this->incremento_factura_lote=$newincremento_factura_lote;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_devolucion(?int $newnumero_devolucion)
	{
		try {
			if($this->numero_devolucion!==$newnumero_devolucion) {
				if($newnumero_devolucion===null && $newnumero_devolucion!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna numero_devolucion');
				}

				if($newnumero_devolucion!==null && filter_var($newnumero_devolucion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - numero_devolucion='.$newnumero_devolucion);
				}

				$this->numero_devolucion=$newnumero_devolucion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento_devolucion(?int $newincremento_devolucion)
	{
		try {
			if($this->incremento_devolucion!==$newincremento_devolucion) {
				if($newincremento_devolucion===null && $newincremento_devolucion!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna incremento_devolucion');
				}

				if($newincremento_devolucion!==null && filter_var($newincremento_devolucion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - incremento_devolucion='.$newincremento_devolucion);
				}

				$this->incremento_devolucion=$newincremento_devolucion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_termino_pago_cliente(?int $newid_termino_pago_cliente)
	{
		try {
			if($this->id_termino_pago_cliente!==$newid_termino_pago_cliente) {
				if($newid_termino_pago_cliente===null && $newid_termino_pago_cliente!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna id_termino_pago_cliente');
				}

				if($newid_termino_pago_cliente!==null && filter_var($newid_termino_pago_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - id_termino_pago_cliente='.$newid_termino_pago_cliente);
				}

				$this->id_termino_pago_cliente=$newid_termino_pago_cliente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_termino_pago_cliente_Descripcion(string $newid_termino_pago_cliente_Descripcion)
	{
		try {
			if($this->id_termino_pago_cliente_Descripcion!=$newid_termino_pago_cliente_Descripcion) {
				if($newid_termino_pago_cliente_Descripcion===null && $newid_termino_pago_cliente_Descripcion!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna id_termino_pago_cliente');
				}

				$this->id_termino_pago_cliente_Descripcion=$newid_termino_pago_cliente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_estimado(?string $newnombre_estimado)
	{
		try {
			if($this->nombre_estimado!==$newnombre_estimado) {
				if($newnombre_estimado===null && $newnombre_estimado!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna nombre_estimado');
				}

				if(strlen($newnombre_estimado)>50) {
					throw new Exception('parametro_facturacion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre_estimado');
				}

				if(filter_var($newnombre_estimado,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_facturacion:Formato incorrecto en columna nombre_estimado='.$newnombre_estimado);
				}

				$this->nombre_estimado=$newnombre_estimado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_estimado(?int $newnumero_estimado)
	{
		try {
			if($this->numero_estimado!==$newnumero_estimado) {
				if($newnumero_estimado===null && $newnumero_estimado!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna numero_estimado');
				}

				if($newnumero_estimado!==null && filter_var($newnumero_estimado,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - numero_estimado='.$newnumero_estimado);
				}

				$this->numero_estimado=$newnumero_estimado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento_estimado(?int $newincremento_estimado)
	{
		try {
			if($this->incremento_estimado!==$newincremento_estimado) {
				if($newincremento_estimado===null && $newincremento_estimado!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna incremento_estimado');
				}

				if($newincremento_estimado!==null && filter_var($newincremento_estimado,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - incremento_estimado='.$newincremento_estimado);
				}

				$this->incremento_estimado=$newincremento_estimado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsolo_costo_producto_estimado(?bool $newsolo_costo_producto_estimado)
	{
		try {
			if($this->solo_costo_producto_estimado!==$newsolo_costo_producto_estimado) {
				if($newsolo_costo_producto_estimado===null && $newsolo_costo_producto_estimado!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna solo_costo_producto_estimado');
				}

				if($newsolo_costo_producto_estimado!==null && filter_var($newsolo_costo_producto_estimado,FILTER_VALIDATE_BOOLEAN)===false && $newsolo_costo_producto_estimado!==0 && $newsolo_costo_producto_estimado!==false) {
					throw new Exception('parametro_facturacion:No es valor booleano - solo_costo_producto_estimado='.$newsolo_costo_producto_estimado);
				}

				$this->solo_costo_producto_estimado=$newsolo_costo_producto_estimado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_consignacion(?string $newnombre_consignacion)
	{
		try {
			if($this->nombre_consignacion!==$newnombre_consignacion) {
				if($newnombre_consignacion===null && $newnombre_consignacion!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna nombre_consignacion');
				}

				if(strlen($newnombre_consignacion)>50) {
					throw new Exception('parametro_facturacion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre_consignacion');
				}

				if(filter_var($newnombre_consignacion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_facturacion:Formato incorrecto en columna nombre_consignacion='.$newnombre_consignacion);
				}

				$this->nombre_consignacion=$newnombre_consignacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_consignacion(?int $newnumero_consignacion)
	{
		try {
			if($this->numero_consignacion!==$newnumero_consignacion) {
				if($newnumero_consignacion===null && $newnumero_consignacion!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna numero_consignacion');
				}

				if($newnumero_consignacion!==null && filter_var($newnumero_consignacion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - numero_consignacion='.$newnumero_consignacion);
				}

				$this->numero_consignacion=$newnumero_consignacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento_consignacion(?int $newincremento_consignacion)
	{
		try {
			if($this->incremento_consignacion!==$newincremento_consignacion) {
				if($newincremento_consignacion===null && $newincremento_consignacion!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna incremento_consignacion');
				}

				if($newincremento_consignacion!==null && filter_var($newincremento_consignacion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - incremento_consignacion='.$newincremento_consignacion);
				}

				$this->incremento_consignacion=$newincremento_consignacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsolo_costo_producto_consignacion(?bool $newsolo_costo_producto_consignacion)
	{
		try {
			if($this->solo_costo_producto_consignacion!==$newsolo_costo_producto_consignacion) {
				if($newsolo_costo_producto_consignacion===null && $newsolo_costo_producto_consignacion!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna solo_costo_producto_consignacion');
				}

				if($newsolo_costo_producto_consignacion!==null && filter_var($newsolo_costo_producto_consignacion,FILTER_VALIDATE_BOOLEAN)===false && $newsolo_costo_producto_consignacion!==0 && $newsolo_costo_producto_consignacion!==false) {
					throw new Exception('parametro_facturacion:No es valor booleano - solo_costo_producto_consignacion='.$newsolo_costo_producto_consignacion);
				}

				$this->solo_costo_producto_consignacion=$newsolo_costo_producto_consignacion;
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
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna con_recibo');
				}

				if($newcon_recibo!==null && filter_var($newcon_recibo,FILTER_VALIDATE_BOOLEAN)===false && $newcon_recibo!==0 && $newcon_recibo!==false) {
					throw new Exception('parametro_facturacion:No es valor booleano - con_recibo='.$newcon_recibo);
				}

				$this->con_recibo=$newcon_recibo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_recibo(?string $newnombre_recibo)
	{
		try {
			if($this->nombre_recibo!==$newnombre_recibo) {
				if($newnombre_recibo===null && $newnombre_recibo!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna nombre_recibo');
				}

				if(strlen($newnombre_recibo)>50) {
					throw new Exception('parametro_facturacion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre_recibo');
				}

				if(filter_var($newnombre_recibo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_facturacion:Formato incorrecto en columna nombre_recibo='.$newnombre_recibo);
				}

				$this->nombre_recibo=$newnombre_recibo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_recibo(?int $newnumero_recibo)
	{
		try {
			if($this->numero_recibo!==$newnumero_recibo) {
				if($newnumero_recibo===null && $newnumero_recibo!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna numero_recibo');
				}

				if($newnumero_recibo!==null && filter_var($newnumero_recibo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - numero_recibo='.$newnumero_recibo);
				}

				$this->numero_recibo=$newnumero_recibo;
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
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna incremento_recibo');
				}

				if($newincremento_recibo!==null && filter_var($newincremento_recibo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_facturacion:No es numero entero - incremento_recibo='.$newincremento_recibo);
				}

				$this->incremento_recibo=$newincremento_recibo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_impuesto_recibo(?bool $newcon_impuesto_recibo)
	{
		try {
			if($this->con_impuesto_recibo!==$newcon_impuesto_recibo) {
				if($newcon_impuesto_recibo===null && $newcon_impuesto_recibo!='') {
					throw new Exception('parametro_facturacion:Valor nulo no permitido en columna con_impuesto_recibo');
				}

				if($newcon_impuesto_recibo!==null && filter_var($newcon_impuesto_recibo,FILTER_VALIDATE_BOOLEAN)===false && $newcon_impuesto_recibo!==0 && $newcon_impuesto_recibo!==false) {
					throw new Exception('parametro_facturacion:No es valor booleano - con_impuesto_recibo='.$newcon_impuesto_recibo);
				}

				$this->con_impuesto_recibo=$newcon_impuesto_recibo;
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

	public function gettermino_pago_cliente() : ?termino_pago_cliente {
		return $this->termino_pago_cliente;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settermino_pago_cliente(?termino_pago_cliente $termino_pago_cliente) {
		try {
			$this->termino_pago_cliente=$termino_pago_cliente;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_parametro_facturacionValue(string $sKey,$oValue) {
		$this->map_parametro_facturacion[$sKey]=$oValue;
	}
	
	public function getMap_parametro_facturacionValue(string $sKey) {
		return $this->map_parametro_facturacion[$sKey];
	}
	
	public function getparametro_facturacion_Original() : ?parametro_facturacion {
		return $this->parametro_facturacion_Original;
	}
	
	public function setparametro_facturacion_Original(parametro_facturacion $parametro_facturacion) {
		try {
			$this->parametro_facturacion_Original=$parametro_facturacion;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_parametro_facturacion() : array {
		return $this->map_parametro_facturacion;
	}

	public function setMap_parametro_facturacion(array $map_parametro_facturacion) {
		$this->map_parametro_facturacion = $map_parametro_facturacion;
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
