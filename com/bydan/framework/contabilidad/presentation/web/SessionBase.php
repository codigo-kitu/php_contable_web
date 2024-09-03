<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\web;

class SessionBase {

    private string $nombre='';
    private string $nombrePrefijo='';
	private bool $esTemporal=true; 
	
	function __construct() {
		$this->nombre='';
		$this->nombrePrefijo='';
		$this->esTemporal=true;
	}	
	
	public function write(string $name='',$objectValue=null) {
		$_SESSION[$name] = $objectValue;
	}
	
	public function remove(string $name='') {
		if(array_key_exists($name,$_SESSION)) {
			unset($_SESSION[$name]);
		}
	}
	
	public function start() {
		//SE LO HACE MANUALMENTE
		//session_start();
	}
	
	public function activate() {
	
	}
	
	public function read(string $name='') {	
		$value='';//null;

		if(array_key_exists($name,$_SESSION)) {
			$value=$_SESSION[$name];
		}
		
		return $value;
	}
	
	public function unserialize(string $name='') {
	    $value=null;
	    
	    $session_value=$this->read($name);
	    
	    if($session_value!='') {
	        $value = unserialize($session_value);
	    }
	    
	    return $value;
	}
	
	//NO SE APLICA, ES PARA CAKEPHP
	public function setFlash(string $value='') {
	
	}

	public function getNombre():string {
		return $this->nombre;
	}
	
	public function setNombre(string $nombre) {
		$this->nombre = $nombre;
	}
	
	public function getNombrePrefijo():string {
		return $this->nombrePrefijo;
	}
	
	public function setNombrePrefijo(string $nombrePrefijo) {
		$this->nombrePrefijo = $nombrePrefijo;
	}
	
	public function getEsTemporal():bool {
		return $this->esTemporal;
	}
	
	public function setEsTemporal(bool $esTemporal) {
		$this->esTemporal = $esTemporal;
	}
	
	public function __toString():string {
		return $this->nombrePrefijo.$this->nombre;
	}
	
	public function addRemoveSessionsBasesPage(string $nombreBase='',string $nombrePrefijoBase='',bool $bitEsRelaciones=false,bool $bitEsRelacionado=false):array {
		$sNombreSessionsBasesPages='ArrSessionsBasesPages';
		$arrSessionBasesLocal=array();
		$arrSessionBasesLocalEliminar=array();
		$arrIndices=array();
		$indice=0;
		$sessionBaseLocal=new SessionBase();
		$existe=false;
		$guardar_sesion=false;
		
		if(array_key_exists($sNombreSessionsBasesPages,$_SESSION)) {
			
			$arrSessionBasesLocal=unserialize($this->read($sNombreSessionsBasesPages));
			
			
			if($arrSessionBasesLocal!=null && count($arrSessionBasesLocal)>0) {
				
				$indice=0;
				$existe=false;
				
				foreach ($arrSessionBasesLocal as $sessionBaseLocal) {
					if($sessionBaseLocal->getNombre()==$nombrePrefijoBase.$nombreBase) {
						$existe=true;
						//$arrIndices[]=$indice;
						$indice++;
						
						continue;	
					}
					
					if($sessionBaseLocal->getEsTemporal() && !$bitEsRelacionado) {
						//$sNombreSessionBaseLocal=$sessionBaseLocal->getNombre();
											
						$this->remove($sessionBaseLocal->getNombre().'ControllerSessionBean');
						$this->remove($sessionBaseLocal->getNombre().'SessionBean');
						$this->remove($sessionBaseLocal->getNombre().'SessionBeanLista');
						$this->remove($sessionBaseLocal->getNombre().'SessionBeanListaEliminados');
						
						$arrSessionBasesLocalEliminar[]=$sessionBaseLocal;
					}
					
					$arrIndices[]=$indice;
					$indice++;
				}
				
				
				if(!$existe) {
					$guardar_sesion=true;
					
					$this->addSessionBasePage($nombreBase,$nombrePrefijoBase,$arrSessionBasesLocal,$sNombreSessionsBasesPages);
				}
				
			} else {
				$guardar_sesion=true;
				
				$this->addSessionBasePage($nombreBase,$nombrePrefijoBase,$arrSessionBasesLocal,$sNombreSessionsBasesPages);
			}
			
			
			/*
			foreach ($arrIndices as $indiceLocal) {
				unset($arrSessionBasesLocal[$indiceLocal]);
			}
			
			$arrSessionBasesLocal = array_values($arrSessionBasesLocal);
			*/
			
			if(count($arrSessionBasesLocalEliminar) > 0) {
				$guardar_sesion=true;
				
				$arrSessionBasesLocal=array_diff($arrSessionBasesLocal, $arrSessionBasesLocalEliminar);
			}
			
			//$_SESSION[$sNombreSessionsBasesPages] = serialize($arrSessionBasesLocal);
			
			
		} else {																		
			
			$guardar_sesion=true;
			
			$this->addSessionBasePage($nombreBase,$nombrePrefijoBase,$arrSessionBasesLocal,$sNombreSessionsBasesPages);
			
			//$_SESSION[$sNombreSessionsBasesPages] = serialize($arrSessionBasesLocal);
		}
		
		
		if($guardar_sesion) {
			$_SESSION[$sNombreSessionsBasesPages] = serialize($arrSessionBasesLocal);
		}
		
		//AUXILIAR PARA QUITAR MENSAJES ADVERTENCIA		
		if(count($arrIndices));
		
		return $arrSessionBasesLocal;
	}
	
	
	public function addSessionBasePage(string $nombreBase='',string $nombrePrefijoBase='',array &$arrSessionBasesLocal=array(),string $sNombreSessionsBasesPages='') {
		$sessionBaseLocal=new SessionBase();
		
		$sessionBaseLocal->setEsTemporal(true);
		$sessionBaseLocal->setNombre($nombreBase);
		$sessionBaseLocal->setNombrePrefijo($nombrePrefijoBase);
			
		$arrSessionBasesLocal[]=$sessionBaseLocal;

		/*
		if($conGuardarSesion) {
			$_SESSION[$sNombreSessionsBasesPages] = serialize($arrSessionBasesLocal);
		}
		*/
	}

//use com\bydan\framework\contabilidad\util\Constantes;

}
?>