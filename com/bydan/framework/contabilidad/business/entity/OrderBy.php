<?php declare(strict_types  =  1);

namespace com\bydan\framework\contabilidad\business\entity;

class OrderBy {
    
	public static string $CODIGO = 'CODIGO';
	public static string $NOMBRE = 'NOMBRE';
	public static string $NOMBREDB = 'DB';
	public static string $DESCRIPCION = 'DESCRIPCION';
	public static string $VALOR = 'VALOR';
	public static string $ESDESC = 'DESC';
	public static string $ISSELECTED = 'SEL';
	
	public int $i = 0;	
	public string $codigo = '';	
	public string $nombre = '';	
	public string $class = '';
	public string $nombreDB = '';
	public string $descripcion = '';
	public string $valor = '';
	public string $prefijoSql = '';
	public bool $esDesc = false;
	public bool $isSelected = false;
	
	public string $valueEsDesc = '';
	public string $valueIsSelected = '';
	
	function __construct() {
		//parent::__construct();		
	}
	
	public static function NewOrderBy(?bool $isSelected,?string $nombre,?string $nombreDB, ?bool $esDesc,?string $prefijoSql) : OrderBy {
		$orderBy  =  new self();
		
		$orderBy->isSelected  =  $isSelected;
		$orderBy->nombre  =  $nombre;
		$orderBy->nombreDB  =  $nombreDB;
		$orderBy->esDesc  =  $esDesc;
		$orderBy->prefijoSql = $prefijoSql;
		$orderBy->i = 0;
		$orderBy->class = '';
		
		$orderBy->valueEsDesc = '';
		$orderBy->valueIsSelected = '';
		
		return $orderBy;
	}
	
	public static function NewOrderBy2(?bool $isSelected,?string $nombre,?string $nombreDB,?bool $esDesc) : OrderBy {
		$orderBy  =  new self();
		
		$orderBy->isSelected  =  $isSelected;
		$orderBy->nombre  =  $nombre;
		$orderBy->nombreDB  =  $nombreDB;
		$orderBy->esDesc  =  $esDesc;
		$orderBy->i = 0;
		$orderBy->class = '';
		
		$orderBy->valueEsDesc = '';
		$orderBy->valueIsSelected = '';
		
		return $orderBy; 
	}
	
	public static function NewOrderBy3(?string $codigo,?string $nombre,?string $nombreDB,?bool $esDesc,?bool $isSelected) : OrderBy {
		
		$orderBy  =  new self();
		
		$orderBy->codigo  =  $codigo;
		$orderBy->nombre  =  $nombre;
		$orderBy->nombreDB  =  $nombreDB;
		$orderBy->esDesc  =  $esDesc;
		$orderBy->isSelected  =  $isSelected;
		$orderBy->i = 0;
		$orderBy->class = '';
		
		$orderBy->valueEsDesc = '';
		$orderBy->valueIsSelected = '';
		
		return $orderBy;
	}
	
	public static function NewOrderBy4(?string $codigo,?string $nombre,?string $nombreDB,?string $descripcion, $valor,?bool $esDesc,?bool $isSelected,$prefijoSql) : OrderBy {
		
		$orderBy  =  new self();
		
		$orderBy->codigo  =  $codigo;
		$orderBy->nombre  =  $nombre;
		$orderBy->nombreDB  =  $nombreDB;
		$orderBy->descripcion  =  $descripcion;
		$orderBy->valor  =  $valor;
		$orderBy->esDesc  =  $esDesc;
		$orderBy->isSelected  =  $isSelected;
		$orderBy->prefijoSql = $prefijoSql;
		$orderBy->i = 0;
		$orderBy->class = '';
		
		$orderBy->valueEsDesc = '';
		$orderBy->valueIsSelected = '';
		
		return $orderBy;
	}
    
	public static function ActualizarInformacion(array $arrOrderBy) : array {
	    $i  =  -1;
	    
	    foreach ($arrOrderBy as $orderBy) {
	        $class  =  null;
	        $i++;
	        
	        $valueIsSelected = 'false';
	        $valueEsDesc = 'false';
	        
	        if ($i % 2  ==  0) {
	            $class  =  'filazebra';
	        } else {
	            $class  =  'filazebraanti';
	        }
	        
	        if($orderBy->isSelected) {
	            $valueIsSelected = 'false';
	        }
	        
	        if($orderBy->esDesc) {
	            $valueEsDesc = 'false';
	        }
	        
	        $orderBy->valueEsDesc = $valueEsDesc;
	        
	        $orderBy->i = $i;
	        $orderBy->class = $class;
	        
	        $orderBy->valueIsSelected = $valueIsSelected;
	        $orderBy->valueIsSelected = $valueIsSelected;
	    }
	    
	    return $arrOrderBy;
	}
	
	/*
	public function getisSelected() {
		return $this->isSelected;
	}

	public function setisSelected($isSelected) {
		$this->isSelected  =  $isSelected;
	}
	
	public function getesDesc() {
		return $this->esDesc;
	}

	public function setesDesc($esDesc) {
		$this->esDesc  =  $esDesc;
	}
	
	public function getprefijoSql() {
		return $this->prefijoSql;
	}

	public function setprefijoSql($prefijoSql) {
		$this->prefijoSql  =  $prefijoSql;
	}
	
	public function getvalor() {
		return $this->valor;
	}

	public function setvalor($valor) {
		$this->valor  =  $valor;
	}

	public function getcodigo() {
		return $this->codigo;
	}

	public function setcodigo($codigo) {
		$this->codigo  =  $codigo;
	}

	public function getnombre() {
		return $this->nombre;
	}

	public function setnombre($nombre) {
		$this->nombre =  $nombre;
	}
	
	public function getnombreDB() {
		return $this->nombreDB;
	}

	public function setnombreDB($nombreDB) {
		$this->nombreDB =  $nombreDB;
	}
	
	public function getdescripcion() {
		return $this->descripcion;
	}

	public function setdescripcion($descripcion) {
		$this->descripcion  =  $descripcion;
	}
	*/
}
?>