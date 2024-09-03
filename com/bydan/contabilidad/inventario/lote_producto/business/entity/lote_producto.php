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
namespace com\bydan\contabilidad\inventario\lote_producto\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

class lote_producto extends GeneralEntity {

	/*GENERAL*/
	public static string $class='lote_producto';
	
	/*AUXILIARES*/
	public ?lote_producto $lote_producto_Original=null;	
	public ?GeneralEntity $lote_producto_Additional=null;
	public array $map_lote_producto=array();	
		
	/*CAMPOS*/
	public int $id_producto = -1;
	public string $id_producto_Descripcion = '';

	public string $nro_lote = '';
	public string $descripcion = '';
	public int $id_bodega = -1;
	public string $id_bodega_Descripcion = '';

	public string $fecha_ingreso = '';
	public string $fecha_expiracion = '';
	public string $ubicacion = '';
	public float $cantidad = 0.0;
	public string $comentario = '';
	public int $nro_documento = 0;
	public float $disponible = 0.0;
	public string $agotado_en = '';
	public int $nro_item = 0;
	public int $id_proveedor = -1;
	public string $id_proveedor_Descripcion = '';

	
	/*FKs*/
	
	public ?producto $producto = null;
	public ?bodega $bodega = null;
	public ?proveedor $proveedor = null;
	
	/*RELACIONES*/
	
	public array $kardexdetalles = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->lote_producto_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_producto=-1;
		$this->id_producto_Descripcion='';

 		$this->nro_lote='';
 		$this->descripcion='';
 		$this->id_bodega=-1;
		$this->id_bodega_Descripcion='';

 		$this->fecha_ingreso=date('Y-m-d');
 		$this->fecha_expiracion=date('Y-m-d');
 		$this->ubicacion='';
 		$this->cantidad=0.0;
 		$this->comentario='';
 		$this->nro_documento=0;
 		$this->disponible=0.0;
 		$this->agotado_en=date('Y-m-d');
 		$this->nro_item=0;
 		$this->id_proveedor=-1;
		$this->id_proveedor_Descripcion='';

		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->producto=new producto();
			$this->bodega=new bodega();
			$this->proveedor=new proveedor();
		}
		
		/*RELACIONES*/
		
		$this->kardexdetalles=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->lote_producto_Additional=new lote_producto_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_lote_producto() {
		$this->map_lote_producto = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_producto() : ?int {
		return $this->id_producto;
	}
	
	public function  getid_producto_Descripcion() : string {
		return $this->id_producto_Descripcion;
	}
    
	public function  getnro_lote() : ?string {
		return $this->nro_lote;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getid_bodega() : ?int {
		return $this->id_bodega;
	}
	
	public function  getid_bodega_Descripcion() : string {
		return $this->id_bodega_Descripcion;
	}
    
	public function  getfecha_ingreso() : ?string {
		return $this->fecha_ingreso;
	}
    
	public function  getfecha_expiracion() : ?string {
		return $this->fecha_expiracion;
	}
    
	public function  getubicacion() : ?string {
		return $this->ubicacion;
	}
    
	public function  getcantidad() : ?float {
		return $this->cantidad;
	}
    
	public function  getcomentario() : ?string {
		return $this->comentario;
	}
    
	public function  getnro_documento() : ?int {
		return $this->nro_documento;
	}
    
	public function  getdisponible() : ?float {
		return $this->disponible;
	}
    
	public function  getagotado_en() : ?string {
		return $this->agotado_en;
	}
    
	public function  getnro_item() : ?int {
		return $this->nro_item;
	}
    
	public function  getid_proveedor() : ?int {
		return $this->id_proveedor;
	}
	
	public function  getid_proveedor_Descripcion() : string {
		return $this->id_proveedor_Descripcion;
	}
	
    
	public function setid_producto(?int $newid_producto)
	{
		try {
			if($this->id_producto!==$newid_producto) {
				if($newid_producto===null && $newid_producto!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna id_producto');
				}

				if($newid_producto!==null && filter_var($newid_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lote_producto:No es numero entero - id_producto='.$newid_producto);
				}

				$this->id_producto=$newid_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_producto_Descripcion(string $newid_producto_Descripcion)
	{
		try {
			if($this->id_producto_Descripcion!=$newid_producto_Descripcion) {
				if($newid_producto_Descripcion===null && $newid_producto_Descripcion!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna id_producto');
				}

				$this->id_producto_Descripcion=$newid_producto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_lote(?string $newnro_lote)
	{
		try {
			if($this->nro_lote!==$newnro_lote) {
				if($newnro_lote===null && $newnro_lote!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna nro_lote');
				}

				if(strlen($newnro_lote)>50) {
					throw new Exception('lote_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nro_lote');
				}

				if(filter_var($newnro_lote,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lote_producto:Formato incorrecto en columna nro_lote='.$newnro_lote);
				}

				$this->nro_lote=$newnro_lote;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion)
	{
		try {
			if($this->descripcion!==$newdescripcion) {
				if($newdescripcion===null && $newdescripcion!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>30) {
					throw new Exception('lote_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=30 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lote_producto:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_bodega(?int $newid_bodega)
	{
		try {
			if($this->id_bodega!==$newid_bodega) {
				if($newid_bodega===null && $newid_bodega!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna id_bodega');
				}

				if($newid_bodega!==null && filter_var($newid_bodega,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lote_producto:No es numero entero - id_bodega='.$newid_bodega);
				}

				$this->id_bodega=$newid_bodega;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_bodega_Descripcion(string $newid_bodega_Descripcion)
	{
		try {
			if($this->id_bodega_Descripcion!=$newid_bodega_Descripcion) {
				if($newid_bodega_Descripcion===null && $newid_bodega_Descripcion!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna id_bodega');
				}

				$this->id_bodega_Descripcion=$newid_bodega_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_ingreso(?string $newfecha_ingreso)
	{
		try {
			if($this->fecha_ingreso!==$newfecha_ingreso) {
				if($newfecha_ingreso===null && $newfecha_ingreso!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna fecha_ingreso');
				}

				if($newfecha_ingreso!==null && filter_var($newfecha_ingreso,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('lote_producto:No es fecha - fecha_ingreso='.$newfecha_ingreso);
				}

				$this->fecha_ingreso=$newfecha_ingreso;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_expiracion(?string $newfecha_expiracion)
	{
		try {
			if($this->fecha_expiracion!==$newfecha_expiracion) {
				if($newfecha_expiracion===null && $newfecha_expiracion!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna fecha_expiracion');
				}

				if($newfecha_expiracion!==null && filter_var($newfecha_expiracion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('lote_producto:No es fecha - fecha_expiracion='.$newfecha_expiracion);
				}

				$this->fecha_expiracion=$newfecha_expiracion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setubicacion(?string $newubicacion)
	{
		try {
			if($this->ubicacion!==$newubicacion) {
				if($newubicacion===null && $newubicacion!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna ubicacion');
				}

				if(strlen($newubicacion)>20) {
					throw new Exception('lote_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna ubicacion');
				}

				if(filter_var($newubicacion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lote_producto:Formato incorrecto en columna ubicacion='.$newubicacion);
				}

				$this->ubicacion=$newubicacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcantidad(?float $newcantidad)
	{
		try {
			if($this->cantidad!==$newcantidad) {
				if($newcantidad===null && $newcantidad!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna cantidad');
				}

				if($newcantidad!=0) {
					if($newcantidad!==null && filter_var($newcantidad,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lote_producto:No es numero decimal - cantidad='.$newcantidad);
					}
				}

				$this->cantidad=$newcantidad;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcomentario(?string $newcomentario)
	{
		try {
			if($this->comentario!==$newcomentario) {
				if($newcomentario===null && $newcomentario!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna comentario');
				}

				if(strlen($newcomentario)>1000) {
					throw new Exception('lote_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna comentario');
				}

				if(filter_var($newcomentario,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lote_producto:Formato incorrecto en columna comentario='.$newcomentario);
				}

				$this->comentario=$newcomentario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_documento(?int $newnro_documento)
	{
		try {
			if($this->nro_documento!==$newnro_documento) {
				if($newnro_documento===null && $newnro_documento!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna nro_documento');
				}

				if($newnro_documento!==null && filter_var($newnro_documento,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lote_producto:No es numero entero - nro_documento='.$newnro_documento);
				}

				$this->nro_documento=$newnro_documento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdisponible(?float $newdisponible)
	{
		try {
			if($this->disponible!==$newdisponible) {
				if($newdisponible===null && $newdisponible!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna disponible');
				}

				if($newdisponible!=0) {
					if($newdisponible!==null && filter_var($newdisponible,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lote_producto:No es numero decimal - disponible='.$newdisponible);
					}
				}

				$this->disponible=$newdisponible;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setagotado_en(?string $newagotado_en)
	{
		try {
			if($this->agotado_en!==$newagotado_en) {
				if($newagotado_en===null && $newagotado_en!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna agotado_en');
				}

				if($newagotado_en!==null && filter_var($newagotado_en,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('lote_producto:No es fecha - agotado_en='.$newagotado_en);
				}

				$this->agotado_en=$newagotado_en;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_item(?int $newnro_item)
	{
		try {
			if($this->nro_item!==$newnro_item) {
				if($newnro_item===null && $newnro_item!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna nro_item');
				}

				if($newnro_item!==null && filter_var($newnro_item,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lote_producto:No es numero entero - nro_item='.$newnro_item);
				}

				$this->nro_item=$newnro_item;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_proveedor(?int $newid_proveedor)
	{
		try {
			if($this->id_proveedor!==$newid_proveedor) {
				if($newid_proveedor===null && $newid_proveedor!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna id_proveedor');
				}

				if($newid_proveedor!==null && filter_var($newid_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lote_producto:No es numero entero - id_proveedor='.$newid_proveedor);
				}

				$this->id_proveedor=$newid_proveedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_proveedor_Descripcion(string $newid_proveedor_Descripcion)
	{
		try {
			if($this->id_proveedor_Descripcion!=$newid_proveedor_Descripcion) {
				if($newid_proveedor_Descripcion===null && $newid_proveedor_Descripcion!='') {
					throw new Exception('lote_producto:Valor nulo no permitido en columna id_proveedor');
				}

				$this->id_proveedor_Descripcion=$newid_proveedor_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getproducto() : ?producto {
		return $this->producto;
	}

	public function getbodega() : ?bodega {
		return $this->bodega;
	}

	public function getproveedor() : ?proveedor {
		return $this->proveedor;
	}

	
	
	public  function  setproducto(?producto $producto) {
		try {
			$this->producto=$producto;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setbodega(?bodega $bodega) {
		try {
			$this->bodega=$bodega;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setproveedor(?proveedor $proveedor) {
		try {
			$this->proveedor=$proveedor;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getkardex_detalles() : array {
		return $this->kardexdetalles;
	}

	
	
	public  function  setkardex_detalles(array $kardexdetalles) {
		try {
			$this->kardexdetalles=$kardexdetalles;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_lote_productoValue(string $sKey,$oValue) {
		$this->map_lote_producto[$sKey]=$oValue;
	}
	
	public function getMap_lote_productoValue(string $sKey) {
		return $this->map_lote_producto[$sKey];
	}
	
	public function getlote_producto_Original() : ?lote_producto {
		return $this->lote_producto_Original;
	}
	
	public function setlote_producto_Original(lote_producto $lote_producto) {
		try {
			$this->lote_producto_Original=$lote_producto;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_lote_producto() : array {
		return $this->map_lote_producto;
	}

	public function setMap_lote_producto(array $map_lote_producto) {
		$this->map_lote_producto = $map_lote_producto;
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
