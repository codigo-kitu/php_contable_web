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
namespace com\bydan\contabilidad\inventario\parametro_inventario\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;

class parametro_inventario extends GeneralEntity {

	/*GENERAL*/
	public static string $class='parametro_inventario';
	
	/*AUXILIARES*/
	public ?parametro_inventario $parametro_inventario_Original=null;	
	public ?GeneralEntity $parametro_inventario_Additional=null;
	public array $map_parametro_inventario=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_termino_pago_proveedor = -1;
	public string $id_termino_pago_proveedor_Descripcion = '';

	public int $id_tipo_costeo_kardex = -1;
	public string $id_tipo_costeo_kardex_Descripcion = '';

	public int $id_tipo_kardex = -1;
	public string $id_tipo_kardex_Descripcion = '';

	public int $numero_producto = 0;
	public int $numero_orden_compra = 0;
	public int $numero_devolucion = 0;
	public int $numero_cotizacion = 0;
	public int $numero_kardex = 0;
	public bool $con_producto_inactivo = false;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?termino_pago_proveedor $termino_pago_proveedor = null;
	public ?tipo_costeo_kardex $tipo_costeo_kardex = null;
	public ?tipo_kardex $tipo_kardex = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->parametro_inventario_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_termino_pago_proveedor=-1;
		$this->id_termino_pago_proveedor_Descripcion='';

 		$this->id_tipo_costeo_kardex=-1;
		$this->id_tipo_costeo_kardex_Descripcion='';

 		$this->id_tipo_kardex=-1;
		$this->id_tipo_kardex_Descripcion='';

 		$this->numero_producto=0;
 		$this->numero_orden_compra=0;
 		$this->numero_devolucion=0;
 		$this->numero_cotizacion=0;
 		$this->numero_kardex=0;
 		$this->con_producto_inactivo=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->termino_pago_proveedor=new termino_pago_proveedor();
			$this->tipo_costeo_kardex=new tipo_costeo_kardex();
			$this->tipo_kardex=new tipo_kardex();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_inventario_Additional=new parametro_inventario_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_parametro_inventario() {
		$this->map_parametro_inventario = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_termino_pago_proveedor() : ?int {
		return $this->id_termino_pago_proveedor;
	}
	
	public function  getid_termino_pago_proveedor_Descripcion() : string {
		return $this->id_termino_pago_proveedor_Descripcion;
	}
    
	public function  getid_tipo_costeo_kardex() : ?int {
		return $this->id_tipo_costeo_kardex;
	}
	
	public function  getid_tipo_costeo_kardex_Descripcion() : string {
		return $this->id_tipo_costeo_kardex_Descripcion;
	}
    
	public function  getid_tipo_kardex() : ?int {
		return $this->id_tipo_kardex;
	}
	
	public function  getid_tipo_kardex_Descripcion() : string {
		return $this->id_tipo_kardex_Descripcion;
	}
    
	public function  getnumero_producto() : ?int {
		return $this->numero_producto;
	}
    
	public function  getnumero_orden_compra() : ?int {
		return $this->numero_orden_compra;
	}
    
	public function  getnumero_devolucion() : ?int {
		return $this->numero_devolucion;
	}
    
	public function  getnumero_cotizacion() : ?int {
		return $this->numero_cotizacion;
	}
    
	public function  getnumero_kardex() : ?int {
		return $this->numero_kardex;
	}
    
	public function  getcon_producto_inactivo() : ?bool {
		return $this->con_producto_inactivo;
	}
	
    
	public function setid_empresa(?int $newid_empresa) {
		if($this->id_empresa!==$newid_empresa) {

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_inventario:No es numero entero - id_empresa');
				}

			$this->id_empresa=$newid_empresa;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_empresa_Descripcion(string $newid_empresa_Descripcion) {
		if($this->id_empresa_Descripcion!=$newid_empresa_Descripcion) {

			$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_termino_pago_proveedor(?int $newid_termino_pago_proveedor)
	{
		try {
			if($this->id_termino_pago_proveedor!==$newid_termino_pago_proveedor) {
				if($newid_termino_pago_proveedor===null && $newid_termino_pago_proveedor!='') {
					throw new Exception('parametro_inventario:Valor nulo no permitido en columna id_termino_pago_proveedor');
				}

				if($newid_termino_pago_proveedor!==null && filter_var($newid_termino_pago_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_inventario:No es numero entero - id_termino_pago_proveedor='.$newid_termino_pago_proveedor);
				}

				$this->id_termino_pago_proveedor=$newid_termino_pago_proveedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_termino_pago_proveedor_Descripcion(string $newid_termino_pago_proveedor_Descripcion)
	{
		try {
			if($this->id_termino_pago_proveedor_Descripcion!=$newid_termino_pago_proveedor_Descripcion) {
				if($newid_termino_pago_proveedor_Descripcion===null && $newid_termino_pago_proveedor_Descripcion!='') {
					throw new Exception('parametro_inventario:Valor nulo no permitido en columna id_termino_pago_proveedor');
				}

				$this->id_termino_pago_proveedor_Descripcion=$newid_termino_pago_proveedor_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tipo_costeo_kardex(?int $newid_tipo_costeo_kardex)
	{
		try {
			if($this->id_tipo_costeo_kardex!==$newid_tipo_costeo_kardex) {
				if($newid_tipo_costeo_kardex===null && $newid_tipo_costeo_kardex!='') {
					throw new Exception('parametro_inventario:Valor nulo no permitido en columna id_tipo_costeo_kardex');
				}

				if($newid_tipo_costeo_kardex!==null && filter_var($newid_tipo_costeo_kardex,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_inventario:No es numero entero - id_tipo_costeo_kardex='.$newid_tipo_costeo_kardex);
				}

				$this->id_tipo_costeo_kardex=$newid_tipo_costeo_kardex;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_costeo_kardex_Descripcion(string $newid_tipo_costeo_kardex_Descripcion)
	{
		try {
			if($this->id_tipo_costeo_kardex_Descripcion!=$newid_tipo_costeo_kardex_Descripcion) {
				if($newid_tipo_costeo_kardex_Descripcion===null && $newid_tipo_costeo_kardex_Descripcion!='') {
					throw new Exception('parametro_inventario:Valor nulo no permitido en columna id_tipo_costeo_kardex');
				}

				$this->id_tipo_costeo_kardex_Descripcion=$newid_tipo_costeo_kardex_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tipo_kardex(?int $newid_tipo_kardex)
	{
		try {
			if($this->id_tipo_kardex!==$newid_tipo_kardex) {
				if($newid_tipo_kardex===null && $newid_tipo_kardex!='') {
					throw new Exception('parametro_inventario:Valor nulo no permitido en columna id_tipo_kardex');
				}

				if($newid_tipo_kardex!==null && filter_var($newid_tipo_kardex,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_inventario:No es numero entero - id_tipo_kardex='.$newid_tipo_kardex);
				}

				$this->id_tipo_kardex=$newid_tipo_kardex;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_kardex_Descripcion(string $newid_tipo_kardex_Descripcion)
	{
		try {
			if($this->id_tipo_kardex_Descripcion!=$newid_tipo_kardex_Descripcion) {
				if($newid_tipo_kardex_Descripcion===null && $newid_tipo_kardex_Descripcion!='') {
					throw new Exception('parametro_inventario:Valor nulo no permitido en columna id_tipo_kardex');
				}

				$this->id_tipo_kardex_Descripcion=$newid_tipo_kardex_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_producto(?int $newnumero_producto)
	{
		try {
			if($this->numero_producto!==$newnumero_producto) {
				if($newnumero_producto===null && $newnumero_producto!='') {
					throw new Exception('parametro_inventario:Valor nulo no permitido en columna numero_producto');
				}

				if($newnumero_producto!==null && filter_var($newnumero_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_inventario:No es numero entero - numero_producto='.$newnumero_producto);
				}

				$this->numero_producto=$newnumero_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_orden_compra(?int $newnumero_orden_compra)
	{
		try {
			if($this->numero_orden_compra!==$newnumero_orden_compra) {
				if($newnumero_orden_compra===null && $newnumero_orden_compra!='') {
					throw new Exception('parametro_inventario:Valor nulo no permitido en columna numero_orden_compra');
				}

				if($newnumero_orden_compra!==null && filter_var($newnumero_orden_compra,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_inventario:No es numero entero - numero_orden_compra='.$newnumero_orden_compra);
				}

				$this->numero_orden_compra=$newnumero_orden_compra;
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
					throw new Exception('parametro_inventario:Valor nulo no permitido en columna numero_devolucion');
				}

				if($newnumero_devolucion!==null && filter_var($newnumero_devolucion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_inventario:No es numero entero - numero_devolucion='.$newnumero_devolucion);
				}

				$this->numero_devolucion=$newnumero_devolucion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_cotizacion(?int $newnumero_cotizacion)
	{
		try {
			if($this->numero_cotizacion!==$newnumero_cotizacion) {
				if($newnumero_cotizacion===null && $newnumero_cotizacion!='') {
					throw new Exception('parametro_inventario:Valor nulo no permitido en columna numero_cotizacion');
				}

				if($newnumero_cotizacion!==null && filter_var($newnumero_cotizacion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_inventario:No es numero entero - numero_cotizacion='.$newnumero_cotizacion);
				}

				$this->numero_cotizacion=$newnumero_cotizacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_kardex(?int $newnumero_kardex)
	{
		try {
			if($this->numero_kardex!==$newnumero_kardex) {
				if($newnumero_kardex===null && $newnumero_kardex!='') {
					throw new Exception('parametro_inventario:Valor nulo no permitido en columna numero_kardex');
				}

				if($newnumero_kardex!==null && filter_var($newnumero_kardex,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_inventario:No es numero entero - numero_kardex='.$newnumero_kardex);
				}

				$this->numero_kardex=$newnumero_kardex;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_producto_inactivo(?bool $newcon_producto_inactivo)
	{
		try {
			if($this->con_producto_inactivo!==$newcon_producto_inactivo) {
				if($newcon_producto_inactivo===null && $newcon_producto_inactivo!='') {
					throw new Exception('parametro_inventario:Valor nulo no permitido en columna con_producto_inactivo');
				}

				if($newcon_producto_inactivo!==null && filter_var($newcon_producto_inactivo,FILTER_VALIDATE_BOOLEAN)===false && $newcon_producto_inactivo!==0 && $newcon_producto_inactivo!==false) {
					throw new Exception('parametro_inventario:No es valor booleano - con_producto_inactivo='.$newcon_producto_inactivo);
				}

				$this->con_producto_inactivo=$newcon_producto_inactivo;
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

	public function gettermino_pago_proveedor() : ?termino_pago_proveedor {
		return $this->termino_pago_proveedor;
	}

	public function gettipo_costeo_kardex() : ?tipo_costeo_kardex {
		return $this->tipo_costeo_kardex;
	}

	public function gettipo_kardex() : ?tipo_kardex {
		return $this->tipo_kardex;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settermino_pago_proveedor(?termino_pago_proveedor $termino_pago_proveedor) {
		try {
			$this->termino_pago_proveedor=$termino_pago_proveedor;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settipo_costeo_kardex(?tipo_costeo_kardex $tipo_costeo_kardex) {
		try {
			$this->tipo_costeo_kardex=$tipo_costeo_kardex;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settipo_kardex(?tipo_kardex $tipo_kardex) {
		try {
			$this->tipo_kardex=$tipo_kardex;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_parametro_inventarioValue(string $sKey,$oValue) {
		$this->map_parametro_inventario[$sKey]=$oValue;
	}
	
	public function getMap_parametro_inventarioValue(string $sKey) {
		return $this->map_parametro_inventario[$sKey];
	}
	
	public function getparametro_inventario_Original() : ?parametro_inventario {
		return $this->parametro_inventario_Original;
	}
	
	public function setparametro_inventario_Original(parametro_inventario $parametro_inventario) {
		try {
			$this->parametro_inventario_Original=$parametro_inventario;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_parametro_inventario() : array {
		return $this->map_parametro_inventario;
	}

	public function setMap_parametro_inventario(array $map_parametro_inventario) {
		$this->map_parametro_inventario = $map_parametro_inventario;
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
