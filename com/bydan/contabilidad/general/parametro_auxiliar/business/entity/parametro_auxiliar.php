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
namespace com\bydan\contabilidad\general\parametro_auxiliar\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class parametro_auxiliar extends GeneralEntity {

	/*GENERAL*/
	public static string $class='parametro_auxiliar';
	
	/*AUXILIARES*/
	public ?parametro_auxiliar $parametro_auxiliar_Original=null;	
	public ?GeneralEntity $parametro_auxiliar_Additional=null;
	public array $map_parametro_auxiliar=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public string $nombre_asignado = '';
	public int $siguiente_numero_correlativo = 0;
	public int $incremento = 0;
	public bool $mostrar_solo_costo_producto = false;
	public bool $con_codigo_secuencial_producto = false;
	public int $contador_producto = 0;
	public int $id_tipo_costeo_kardex = -1;
	public string $id_tipo_costeo_kardex_Descripcion = '';

	public bool $con_producto_inactivo = false;
	public bool $con_busqueda_incremental = false;
	public bool $permitir_revisar_asiento = false;
	public int $numero_decimales_unidades = 0;
	public bool $mostrar_documento_anulado = false;
	public int $siguiente_numero_correlativo_cc = 0;
	public bool $con_eliminacion_fisica_asiento = false;
	public int $siguiente_numero_correlativo_asiento = 0;
	public bool $con_asiento_simple_factura = false;
	public bool $con_codigo_secuencial_cliente = false;
	public int $contador_cliente = 0;
	public bool $con_cliente_inactivo = false;
	public bool $con_codigo_secuencial_proveedor = false;
	public int $contador_proveedor = 0;
	public bool $con_proveedor_inactivo = false;
	public string $abreviatura_registro_tributario = '';
	public bool $con_asiento_cheque = false;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?tipo_costeo_kardex $tipo_costeo_kardex = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->parametro_auxiliar_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->nombre_asignado='';
 		$this->siguiente_numero_correlativo=0;
 		$this->incremento=0;
 		$this->mostrar_solo_costo_producto=false;
 		$this->con_codigo_secuencial_producto=false;
 		$this->contador_producto=0;
 		$this->id_tipo_costeo_kardex=-1;
		$this->id_tipo_costeo_kardex_Descripcion='';

 		$this->con_producto_inactivo=false;
 		$this->con_busqueda_incremental=false;
 		$this->permitir_revisar_asiento=false;
 		$this->numero_decimales_unidades=0;
 		$this->mostrar_documento_anulado=false;
 		$this->siguiente_numero_correlativo_cc=0;
 		$this->con_eliminacion_fisica_asiento=false;
 		$this->siguiente_numero_correlativo_asiento=0;
 		$this->con_asiento_simple_factura=false;
 		$this->con_codigo_secuencial_cliente=false;
 		$this->contador_cliente=0;
 		$this->con_cliente_inactivo=false;
 		$this->con_codigo_secuencial_proveedor=false;
 		$this->contador_proveedor=0;
 		$this->con_proveedor_inactivo=false;
 		$this->abreviatura_registro_tributario='';
 		$this->con_asiento_cheque=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->tipo_costeo_kardex=new tipo_costeo_kardex();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_auxiliar_Additional=new parametro_auxiliar_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_parametro_auxiliar() {
		$this->map_parametro_auxiliar = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getnombre_asignado() : ?string {
		return $this->nombre_asignado;
	}
    
	public function  getsiguiente_numero_correlativo() : ?int {
		return $this->siguiente_numero_correlativo;
	}
    
	public function  getincremento() : ?int {
		return $this->incremento;
	}
    
	public function  getmostrar_solo_costo_producto() : ?bool {
		return $this->mostrar_solo_costo_producto;
	}
    
	public function  getcon_codigo_secuencial_producto() : ?bool {
		return $this->con_codigo_secuencial_producto;
	}
    
	public function  getcontador_producto() : ?int {
		return $this->contador_producto;
	}
    
	public function  getid_tipo_costeo_kardex() : ?int {
		return $this->id_tipo_costeo_kardex;
	}
	
	public function  getid_tipo_costeo_kardex_Descripcion() : string {
		return $this->id_tipo_costeo_kardex_Descripcion;
	}
    
	public function  getcon_producto_inactivo() : ?bool {
		return $this->con_producto_inactivo;
	}
    
	public function  getcon_busqueda_incremental() : ?bool {
		return $this->con_busqueda_incremental;
	}
    
	public function  getpermitir_revisar_asiento() : ?bool {
		return $this->permitir_revisar_asiento;
	}
    
	public function  getnumero_decimales_unidades() : ?int {
		return $this->numero_decimales_unidades;
	}
    
	public function  getmostrar_documento_anulado() : ?bool {
		return $this->mostrar_documento_anulado;
	}
    
	public function  getsiguiente_numero_correlativo_cc() : ?int {
		return $this->siguiente_numero_correlativo_cc;
	}
    
	public function  getcon_eliminacion_fisica_asiento() : ?bool {
		return $this->con_eliminacion_fisica_asiento;
	}
    
	public function  getsiguiente_numero_correlativo_asiento() : ?int {
		return $this->siguiente_numero_correlativo_asiento;
	}
    
	public function  getcon_asiento_simple_factura() : ?bool {
		return $this->con_asiento_simple_factura;
	}
    
	public function  getcon_codigo_secuencial_cliente() : ?bool {
		return $this->con_codigo_secuencial_cliente;
	}
    
	public function  getcontador_cliente() : ?int {
		return $this->contador_cliente;
	}
    
	public function  getcon_cliente_inactivo() : ?bool {
		return $this->con_cliente_inactivo;
	}
    
	public function  getcon_codigo_secuencial_proveedor() : ?bool {
		return $this->con_codigo_secuencial_proveedor;
	}
    
	public function  getcontador_proveedor() : ?int {
		return $this->contador_proveedor;
	}
    
	public function  getcon_proveedor_inactivo() : ?bool {
		return $this->con_proveedor_inactivo;
	}
    
	public function  getabreviatura_registro_tributario() : ?string {
		return $this->abreviatura_registro_tributario;
	}
    
	public function  getcon_asiento_cheque() : ?bool {
		return $this->con_asiento_cheque;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_asignado(?string $newnombre_asignado)
	{
		try {
			if($this->nombre_asignado!==$newnombre_asignado) {
				if($newnombre_asignado===null && $newnombre_asignado!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna nombre_asignado');
				}

				if(strlen($newnombre_asignado)>30) {
					throw new Exception('parametro_auxiliar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=30 en columna nombre_asignado');
				}

				if(filter_var($newnombre_asignado,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_auxiliar:Formato incorrecto en columna nombre_asignado='.$newnombre_asignado);
				}

				$this->nombre_asignado=$newnombre_asignado;
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
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna siguiente_numero_correlativo');
				}

				if($newsiguiente_numero_correlativo!==null && filter_var($newsiguiente_numero_correlativo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar:No es numero entero - siguiente_numero_correlativo='.$newsiguiente_numero_correlativo);
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
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna incremento');
				}

				if($newincremento!==null && filter_var($newincremento,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar:No es numero entero - incremento='.$newincremento);
				}

				$this->incremento=$newincremento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmostrar_solo_costo_producto(?bool $newmostrar_solo_costo_producto)
	{
		try {
			if($this->mostrar_solo_costo_producto!==$newmostrar_solo_costo_producto) {
				if($newmostrar_solo_costo_producto===null && $newmostrar_solo_costo_producto!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna mostrar_solo_costo_producto');
				}

				if($newmostrar_solo_costo_producto!==null && filter_var($newmostrar_solo_costo_producto,FILTER_VALIDATE_BOOLEAN)===false && $newmostrar_solo_costo_producto!==0 && $newmostrar_solo_costo_producto!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - mostrar_solo_costo_producto='.$newmostrar_solo_costo_producto);
				}

				$this->mostrar_solo_costo_producto=$newmostrar_solo_costo_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_codigo_secuencial_producto(?bool $newcon_codigo_secuencial_producto)
	{
		try {
			if($this->con_codigo_secuencial_producto!==$newcon_codigo_secuencial_producto) {
				if($newcon_codigo_secuencial_producto===null && $newcon_codigo_secuencial_producto!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna con_codigo_secuencial_producto');
				}

				if($newcon_codigo_secuencial_producto!==null && filter_var($newcon_codigo_secuencial_producto,FILTER_VALIDATE_BOOLEAN)===false && $newcon_codigo_secuencial_producto!==0 && $newcon_codigo_secuencial_producto!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - con_codigo_secuencial_producto='.$newcon_codigo_secuencial_producto);
				}

				$this->con_codigo_secuencial_producto=$newcon_codigo_secuencial_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcontador_producto(?int $newcontador_producto)
	{
		try {
			if($this->contador_producto!==$newcontador_producto) {
				if($newcontador_producto===null && $newcontador_producto!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna contador_producto');
				}

				if($newcontador_producto!==null && filter_var($newcontador_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar:No es numero entero - contador_producto='.$newcontador_producto);
				}

				$this->contador_producto=$newcontador_producto;
				$this->setIsChanged(true);
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
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna id_tipo_costeo_kardex');
				}

				if($newid_tipo_costeo_kardex!==null && filter_var($newid_tipo_costeo_kardex,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar:No es numero entero - id_tipo_costeo_kardex='.$newid_tipo_costeo_kardex);
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
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna id_tipo_costeo_kardex');
				}

				$this->id_tipo_costeo_kardex_Descripcion=$newid_tipo_costeo_kardex_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna con_producto_inactivo');
				}

				if($newcon_producto_inactivo!==null && filter_var($newcon_producto_inactivo,FILTER_VALIDATE_BOOLEAN)===false && $newcon_producto_inactivo!==0 && $newcon_producto_inactivo!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - con_producto_inactivo='.$newcon_producto_inactivo);
				}

				$this->con_producto_inactivo=$newcon_producto_inactivo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_busqueda_incremental(?bool $newcon_busqueda_incremental)
	{
		try {
			if($this->con_busqueda_incremental!==$newcon_busqueda_incremental) {
				if($newcon_busqueda_incremental===null && $newcon_busqueda_incremental!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna con_busqueda_incremental');
				}

				if($newcon_busqueda_incremental!==null && filter_var($newcon_busqueda_incremental,FILTER_VALIDATE_BOOLEAN)===false && $newcon_busqueda_incremental!==0 && $newcon_busqueda_incremental!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - con_busqueda_incremental='.$newcon_busqueda_incremental);
				}

				$this->con_busqueda_incremental=$newcon_busqueda_incremental;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setpermitir_revisar_asiento(?bool $newpermitir_revisar_asiento)
	{
		try {
			if($this->permitir_revisar_asiento!==$newpermitir_revisar_asiento) {
				if($newpermitir_revisar_asiento===null && $newpermitir_revisar_asiento!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna permitir_revisar_asiento');
				}

				if($newpermitir_revisar_asiento!==null && filter_var($newpermitir_revisar_asiento,FILTER_VALIDATE_BOOLEAN)===false && $newpermitir_revisar_asiento!==0 && $newpermitir_revisar_asiento!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - permitir_revisar_asiento='.$newpermitir_revisar_asiento);
				}

				$this->permitir_revisar_asiento=$newpermitir_revisar_asiento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_decimales_unidades(?int $newnumero_decimales_unidades)
	{
		try {
			if($this->numero_decimales_unidades!==$newnumero_decimales_unidades) {
				if($newnumero_decimales_unidades===null && $newnumero_decimales_unidades!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna numero_decimales_unidades');
				}

				if($newnumero_decimales_unidades!==null && filter_var($newnumero_decimales_unidades,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar:No es numero entero - numero_decimales_unidades='.$newnumero_decimales_unidades);
				}

				$this->numero_decimales_unidades=$newnumero_decimales_unidades;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmostrar_documento_anulado(?bool $newmostrar_documento_anulado)
	{
		try {
			if($this->mostrar_documento_anulado!==$newmostrar_documento_anulado) {
				if($newmostrar_documento_anulado===null && $newmostrar_documento_anulado!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna mostrar_documento_anulado');
				}

				if($newmostrar_documento_anulado!==null && filter_var($newmostrar_documento_anulado,FILTER_VALIDATE_BOOLEAN)===false && $newmostrar_documento_anulado!==0 && $newmostrar_documento_anulado!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - mostrar_documento_anulado='.$newmostrar_documento_anulado);
				}

				$this->mostrar_documento_anulado=$newmostrar_documento_anulado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsiguiente_numero_correlativo_cc(?int $newsiguiente_numero_correlativo_cc)
	{
		try {
			if($this->siguiente_numero_correlativo_cc!==$newsiguiente_numero_correlativo_cc) {
				if($newsiguiente_numero_correlativo_cc===null && $newsiguiente_numero_correlativo_cc!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna siguiente_numero_correlativo_cc');
				}

				if($newsiguiente_numero_correlativo_cc!==null && filter_var($newsiguiente_numero_correlativo_cc,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar:No es numero entero - siguiente_numero_correlativo_cc='.$newsiguiente_numero_correlativo_cc);
				}

				$this->siguiente_numero_correlativo_cc=$newsiguiente_numero_correlativo_cc;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_eliminacion_fisica_asiento(?bool $newcon_eliminacion_fisica_asiento)
	{
		try {
			if($this->con_eliminacion_fisica_asiento!==$newcon_eliminacion_fisica_asiento) {
				if($newcon_eliminacion_fisica_asiento===null && $newcon_eliminacion_fisica_asiento!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna con_eliminacion_fisica_asiento');
				}

				if($newcon_eliminacion_fisica_asiento!==null && filter_var($newcon_eliminacion_fisica_asiento,FILTER_VALIDATE_BOOLEAN)===false && $newcon_eliminacion_fisica_asiento!==0 && $newcon_eliminacion_fisica_asiento!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - con_eliminacion_fisica_asiento='.$newcon_eliminacion_fisica_asiento);
				}

				$this->con_eliminacion_fisica_asiento=$newcon_eliminacion_fisica_asiento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsiguiente_numero_correlativo_asiento(?int $newsiguiente_numero_correlativo_asiento)
	{
		try {
			if($this->siguiente_numero_correlativo_asiento!==$newsiguiente_numero_correlativo_asiento) {
				if($newsiguiente_numero_correlativo_asiento===null && $newsiguiente_numero_correlativo_asiento!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna siguiente_numero_correlativo_asiento');
				}

				if($newsiguiente_numero_correlativo_asiento!==null && filter_var($newsiguiente_numero_correlativo_asiento,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar:No es numero entero - siguiente_numero_correlativo_asiento='.$newsiguiente_numero_correlativo_asiento);
				}

				$this->siguiente_numero_correlativo_asiento=$newsiguiente_numero_correlativo_asiento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_asiento_simple_factura(?bool $newcon_asiento_simple_factura)
	{
		try {
			if($this->con_asiento_simple_factura!==$newcon_asiento_simple_factura) {
				if($newcon_asiento_simple_factura===null && $newcon_asiento_simple_factura!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna con_asiento_simple_factura');
				}

				if($newcon_asiento_simple_factura!==null && filter_var($newcon_asiento_simple_factura,FILTER_VALIDATE_BOOLEAN)===false && $newcon_asiento_simple_factura!==0 && $newcon_asiento_simple_factura!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - con_asiento_simple_factura='.$newcon_asiento_simple_factura);
				}

				$this->con_asiento_simple_factura=$newcon_asiento_simple_factura;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_codigo_secuencial_cliente(?bool $newcon_codigo_secuencial_cliente)
	{
		try {
			if($this->con_codigo_secuencial_cliente!==$newcon_codigo_secuencial_cliente) {
				if($newcon_codigo_secuencial_cliente===null && $newcon_codigo_secuencial_cliente!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna con_codigo_secuencial_cliente');
				}

				if($newcon_codigo_secuencial_cliente!==null && filter_var($newcon_codigo_secuencial_cliente,FILTER_VALIDATE_BOOLEAN)===false && $newcon_codigo_secuencial_cliente!==0 && $newcon_codigo_secuencial_cliente!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - con_codigo_secuencial_cliente='.$newcon_codigo_secuencial_cliente);
				}

				$this->con_codigo_secuencial_cliente=$newcon_codigo_secuencial_cliente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcontador_cliente(?int $newcontador_cliente)
	{
		try {
			if($this->contador_cliente!==$newcontador_cliente) {
				if($newcontador_cliente===null && $newcontador_cliente!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna contador_cliente');
				}

				if($newcontador_cliente!==null && filter_var($newcontador_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar:No es numero entero - contador_cliente='.$newcontador_cliente);
				}

				$this->contador_cliente=$newcontador_cliente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_cliente_inactivo(?bool $newcon_cliente_inactivo)
	{
		try {
			if($this->con_cliente_inactivo!==$newcon_cliente_inactivo) {
				if($newcon_cliente_inactivo===null && $newcon_cliente_inactivo!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna con_cliente_inactivo');
				}

				if($newcon_cliente_inactivo!==null && filter_var($newcon_cliente_inactivo,FILTER_VALIDATE_BOOLEAN)===false && $newcon_cliente_inactivo!==0 && $newcon_cliente_inactivo!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - con_cliente_inactivo='.$newcon_cliente_inactivo);
				}

				$this->con_cliente_inactivo=$newcon_cliente_inactivo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_codigo_secuencial_proveedor(?bool $newcon_codigo_secuencial_proveedor)
	{
		try {
			if($this->con_codigo_secuencial_proveedor!==$newcon_codigo_secuencial_proveedor) {
				if($newcon_codigo_secuencial_proveedor===null && $newcon_codigo_secuencial_proveedor!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna con_codigo_secuencial_proveedor');
				}

				if($newcon_codigo_secuencial_proveedor!==null && filter_var($newcon_codigo_secuencial_proveedor,FILTER_VALIDATE_BOOLEAN)===false && $newcon_codigo_secuencial_proveedor!==0 && $newcon_codigo_secuencial_proveedor!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - con_codigo_secuencial_proveedor='.$newcon_codigo_secuencial_proveedor);
				}

				$this->con_codigo_secuencial_proveedor=$newcon_codigo_secuencial_proveedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcontador_proveedor(?int $newcontador_proveedor)
	{
		try {
			if($this->contador_proveedor!==$newcontador_proveedor) {
				if($newcontador_proveedor===null && $newcontador_proveedor!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna contador_proveedor');
				}

				if($newcontador_proveedor!==null && filter_var($newcontador_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_auxiliar:No es numero entero - contador_proveedor='.$newcontador_proveedor);
				}

				$this->contador_proveedor=$newcontador_proveedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_proveedor_inactivo(?bool $newcon_proveedor_inactivo)
	{
		try {
			if($this->con_proveedor_inactivo!==$newcon_proveedor_inactivo) {
				if($newcon_proveedor_inactivo===null && $newcon_proveedor_inactivo!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna con_proveedor_inactivo');
				}

				if($newcon_proveedor_inactivo!==null && filter_var($newcon_proveedor_inactivo,FILTER_VALIDATE_BOOLEAN)===false && $newcon_proveedor_inactivo!==0 && $newcon_proveedor_inactivo!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - con_proveedor_inactivo='.$newcon_proveedor_inactivo);
				}

				$this->con_proveedor_inactivo=$newcon_proveedor_inactivo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setabreviatura_registro_tributario(?string $newabreviatura_registro_tributario)
	{
		try {
			if($this->abreviatura_registro_tributario!==$newabreviatura_registro_tributario) {
				if($newabreviatura_registro_tributario===null && $newabreviatura_registro_tributario!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna abreviatura_registro_tributario');
				}

				if(strlen($newabreviatura_registro_tributario)>20) {
					throw new Exception('parametro_auxiliar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna abreviatura_registro_tributario');
				}

				if(filter_var($newabreviatura_registro_tributario,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_auxiliar:Formato incorrecto en columna abreviatura_registro_tributario='.$newabreviatura_registro_tributario);
				}

				$this->abreviatura_registro_tributario=$newabreviatura_registro_tributario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_asiento_cheque(?bool $newcon_asiento_cheque)
	{
		try {
			if($this->con_asiento_cheque!==$newcon_asiento_cheque) {
				if($newcon_asiento_cheque===null && $newcon_asiento_cheque!='') {
					throw new Exception('parametro_auxiliar:Valor nulo no permitido en columna con_asiento_cheque');
				}

				if($newcon_asiento_cheque!==null && filter_var($newcon_asiento_cheque,FILTER_VALIDATE_BOOLEAN)===false && $newcon_asiento_cheque!==0 && $newcon_asiento_cheque!==false) {
					throw new Exception('parametro_auxiliar:No es valor booleano - con_asiento_cheque='.$newcon_asiento_cheque);
				}

				$this->con_asiento_cheque=$newcon_asiento_cheque;
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

	public function gettipo_costeo_kardex() : ?tipo_costeo_kardex {
		return $this->tipo_costeo_kardex;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
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

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_parametro_auxiliarValue(string $sKey,$oValue) {
		$this->map_parametro_auxiliar[$sKey]=$oValue;
	}
	
	public function getMap_parametro_auxiliarValue(string $sKey) {
		return $this->map_parametro_auxiliar[$sKey];
	}
	
	public function getparametro_auxiliar_Original() : ?parametro_auxiliar {
		return $this->parametro_auxiliar_Original;
	}
	
	public function setparametro_auxiliar_Original(parametro_auxiliar $parametro_auxiliar) {
		try {
			$this->parametro_auxiliar_Original=$parametro_auxiliar;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_parametro_auxiliar() : array {
		return $this->map_parametro_auxiliar;
	}

	public function setMap_parametro_auxiliar(array $map_parametro_auxiliar) {
		$this->map_parametro_auxiliar = $map_parametro_auxiliar;
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
