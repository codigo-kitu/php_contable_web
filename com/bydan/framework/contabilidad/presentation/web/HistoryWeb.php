<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\web;

use com\bydan\framework\contabilidad\util\Constantes;

class HistoryWeb {
    
	public static string $strGeneral='';
	public string $strCodigo='';
	public string $strNombre='';
	public string $strNombreElemento='';
	public int $idActual=0;
	
	function __construct() {
		
	}
	
	public static function Adicionar(HistoryWeb $historyweb=null,array $historyWebs=array()) {
		
	}
	
	public static function Quitar(string $strCodigo=null,array $historyWebs=array()) {
		
	}
	
	public static function GetTituloPaginaCompleto(array $historyWebs=array(),string $sTituloAuxiliar=''):string {
		$titulo='';
		$es_primero=true;
		$path='';
		
		foreach ($historyWebs as $historyWeb) {
			if(!$es_primero) {
				$titulo.='-->';
			}
			
			$path=Constantes::$STR_HTTP_INIT.Constantes::$STR_DNS_NAME_SERVER.':'.Constantes::$STR_PORT_SERVER.'/'.Constantes::$STR_CONTEXT_SERVER.'/'.Constantes::$STR_CARPETA_PAGINAS.'/'.$historyWeb->getStrCodigo().'/index/onload_fk/none/none/index/false/false/none/none';
			
			$titulo.='<a href="'.$path.'">'.$historyWeb->getstrNombre().'</a>';

			if($es_primero) {
				$es_primero=false;
			}
		}
		
		if($sTituloAuxiliar!='') {
			$titulo.='-->'.$sTituloAuxiliar;
		}
		
		return $titulo;
	}
	
	public static function GetTituloElementoActualCompleto(array $historyWebs=array(),?string $sTituloAuxiliar=''):string {
		$titulo='';
		$es_primero=true;
		
		foreach ($historyWebs as $historyWeb) {
			if(!$es_primero) {
				$titulo.='-->';
			}
			
			$titulo.=$historyWeb->getstrNombreElemento();

			if($es_primero) {
				$es_primero=false;
			}
		}
		
		if($sTituloAuxiliar!=null && $sTituloAuxiliar!='') {
			$titulo.='-->'.$sTituloAuxiliar;
		}
		
		return $titulo;
	}
	
	public static function ExisteElemento(string $strCodigo,array $historyWebs=array()):bool {
		$existe=false;
		
		foreach ($historyWebs as $historyWeb) {
			if($historyWeb->getstrCodigo()==$strCodigo) {
				$existe=true;
				break;
			}
		}
		
		return $existe;
	}
	
	public function getstrCodigo():string {
		return $this->strCodigo;
	}
	
	public function getstrNombre():string {
		return $this->strNombre;
	}
	
	public function getstrNombreElemento():string {
		return $this->strNombreElemento;
	}
	
	public function getidActual():int {
		return $this->idActual;
	}
	
	
	public function setstrCodigo(string $strCodigo) {
		$this->strCodigo=$strCodigo;
	}
	
	public function setstrNombre(string $strNombre) {
		$this->strNombre=$strNombre;
	}
	
	public function setstrNombreElemento(string $strNombreElemento) {
		$this->strNombreElemento=$strNombreElemento;
	}
	
	public function setidActual(int $idActual) {
		$this->idActual=$idActual;
	}
}
?>