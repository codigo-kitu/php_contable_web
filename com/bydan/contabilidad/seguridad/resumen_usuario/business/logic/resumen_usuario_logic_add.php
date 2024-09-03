<?php
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

namespace com\bydan\contabilidad\seguridad\resumen_usuario\business\logic;

use Exception;

//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
//use com\bydan\framework\contabilidad\util\DeepLoadType;
//use com\bydan\framework\contabilidad\business\entity\Reporte;
//use com\bydan\framework\contabilidad\business\entity\Classe;
//use com\bydan\framework\contabilidad\business\entity\OrderBy;
//use com\bydan\framework\contabilidad\presentation\report\CellReport;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\entity\resumen_usuario;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;

class resumen_usuario_logic_add extends resumen_usuario_logic{
	/*CONTROL_INICIO*/
	
	function __construct() {
		parent::__construct();
    }	
	/*CONTROL_FUNCION1*/
		
	
	public static function checkresumen_usuarioToSave($resumen_usuario,$datosCliente,$arrDatoGeneral=null) {	
		//CONTROL_1
	}
	
	public static function checkresumen_usuarioToSave2($resumen_usuario,$datosCliente,$connexion,$arrDatoGeneral=null) {	
		//CONTROL_2
	}
	
	public static function checkresumen_usuarioToSaveAfter($resumen_usuario,$datosCliente,$connexion,$arrDatoGeneral=null) {	
		//CONTROL_3
	}
	
	public static function checkresumen_usuarioToSaves($resumen_usuarios,$datosCliente,$arrDatoGeneral=null) {	
		//CONTROL_4
	}
	
	public static function checkresumen_usuarioToSaves2($resumen_usuarios,$datosCliente,$connexion,$arrDatoGeneral=null) {	
		//CONTROL_5
	}
	
	public static function checkresumen_usuarioToSavesAfter($resumen_usuarios,$datosCliente,$connexion,$arrDatoGeneral=null) {	
		//CONTROL_6
	}
	
	public static function checkresumen_usuarioToGet($resumen_usuario,$datosCliente,$arrDatoGeneral=null) {	
		//CONTROL_7
	}
	
	public static function checkresumen_usuarioToGets($resumen_usuarios,$datosCliente,$arrDatoGeneral=null) {	
		//CONTROL_8
	}
	
	public static function updateresumen_usuarioToSave($resumen_usuario,$arrDatoGeneral=null) {	
		//CONTROL_9
	}		
						
	public static function updateresumen_usuarioToGet($resumen_usuario,$arrDatoGeneral=null) {	
		//CONTROL_10
	}	
	
	//PARA ACCIONES ADDITIONAL
	public function ProcesarAccion($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$sProceso,$resumen_usuarios)  {
		//CONTROL_16
		$esProcesado=true;
		
		try {	
			//$this->connexion=$this->connexion->getNewConnexion($this->connexionType,$this->parameterDbType,$this->entityManagerFactory);$this->connexion->begin();			
		
			$this->connexion->commit();
			
		} catch(Exception $e) {
			$this->connexion->rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
		
		return $esProcesado;
	}		
	
	//PARA ACCIONES NORMALES		
	public static function procesarAccions0($parametroGeneralUsuario,$modulo,$opcion,$usuario,$generalEntityLogic,$sProceso,$objects,$generalEntityParameterGeneral,$generalEntityReturnGeneral){				
		//CONTROL_17
		
		 try {	
			
			
			//GeneralEntityReturnGeneral generalEntityReturnGeneral=new GeneralEntityReturnGeneral();
				
			
			return $generalEntityReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	//ACCION TABLA PROCESO DESDE BUSQUEDA
	public static function ProcesarAccion2($parametroGeneralUsuario,$moduloActual,$opcion,$usuario,$generalEntityLogic,$sProceso,$objects,$generalEntityParameterGeneral,$generalEntityReturnGeneral)  {
		//CONTROL_18
		//GeneralEntityReturnGeneral generalEntityReturnGeneral=new GeneralEntityReturnGeneral();
			
		try {	
			//this.connexion=connexion.getNewConnexion(this.connexionType,this.parameterDbType,this.entityManagerFactory);connexion.begin();			
		
			//this.connexion.commit();
			
		} catch(Exception $e) {
			//this.connexion.rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $generalEntityReturnGeneral;
	}
	
	//PARA EVENTOS GENERALES,QUITAR STATIC Y 2 PARA SOBREESCRIBIR
	public static function procesarEventos2($parametroGeneralUsuario,$modulo,$opcion,$usuario,$generalEntityLogic,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$objects,$object,$generalEntityParameterGeneral,$generalEntityReturnGeneral,$isEsNuevoUpdate,$clases){				
		//CONTROL_19		
		 try {	
				
			
			return $generalEntityReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			
			throw $e;			
      	}
	}
	
	public static function validarSaveRelaciones($generalEntity,$generalEntityLogic) {
		//CONTROL_20
		$validado=true;

		return $validado;	
	}
	
	public static function updateRelacionesToSave($generalEntity,$generalEntityLogic) {	
		//CONTROL_21
	}
	
	public static function updateRelacionesToSaveAfter($generalEntity,$generalEntityLogic) {	
		//CONTROL_22
	}
	
	public function procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$generalEntityLogic,$sProceso,$objects,$generalEntityParameterGeneral,$generalEntityReturnGeneral){
		//CONTROL_23
	
		try {
		
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	
		}
		
		return $generalEntityReturnGeneral;
	}
	
	public function validarResumenUsuario($usuario,$ingreso_nuevo,$esCerrarSesion) {
	    $resumen_usuario=new resumen_usuario();
	    
	    try	{
	        
	        $resumen_usuario=$this->traerResumenUsuarioActual($usuario);
	        
	        /*
	         $sFinalQuery=' where id_usuario=\''.$usuario->getId().'\'';
	         //$sFinalQuery=' where username=\''.$sLogin.'\'';
	         
	         $queryWhereSelectParameters=new QueryWhereSelectParameters();
	         $queryWhereSelectParameters->setInitialQuery("");
	         $queryWhereSelectParameters->setFinalQuery($sFinalQuery);
	         
	         $this->getEntities($queryWhereSelectParameters);
	         
	         foreach($this->getResumenUsuarios() as $resumen_usuarioLocal){
	         $resumen_usuario=$resumen_usuarioLocal;
	         break;
	         }
	         */
	        
	        if($resumen_usuario->getId()<=0 || $resumen_usuario==null) {
	            if($ingreso_nuevo) {
	                $resumen_usuario=new resumen_usuario();
	                
	                if($esCerrarSesion) {
	                    $resumen_usuario->setnumero_ingreso_actual(0);
	                } else {
	                    $resumen_usuario->setnumero_ingreso_actual(1);
	                }
	                
	                $resumen_usuario->setid_usuario($usuario->getId());
	                
	                $this->setresumen_usuario($resumen_usuario);
	                
	                $this->save();
	                
	                $resumen_usuario=$this->traerResumenUsuarioActual($usuario);
	                
	                $resumen_usuario->setnumero_ingreso_actual(0);
	            }
	        } else {
	            if($esCerrarSesion) {
	                $resumen_usuario->setnumero_ingreso_actual(0);
	            } else {
	                $resumen_usuario->setnumero_ingreso_actual($resumen_usuario->getnumero_ingreso_actual() + 1);
	            }
	            
	            $this->setresumen_usuario($resumen_usuario);
	            $this->save();
	            
	            $resumen_usuario=$this->traerResumenUsuarioActual($usuario);
	            
	            if(!$esCerrarSesion) {
	                if($resumen_usuario->getnumero_ingreso_actual()==1) {
	                    $resumen_usuario->setnumero_ingreso_actual(0);
	                }
	            }
	        }
	    } catch(Exception $e) {
	        //Funciones::logShowExceptionMessages($logger,$e);
	        
	        throw $e;
	    }
	    
	    return $resumen_usuario;
	}
	
	public function traerResumenUsuarioActual($usuario) {
	    $resumen_usuario=new resumen_usuario();
	    
	    $sFinalQuery=' where id_usuario=\''.$usuario->getId().'\'';
	    //$sFinalQuery=' where username=\''.$sLogin.'\'';
	    
	    $queryWhereSelectParameters=new QueryWhereSelectParameters();
	    $queryWhereSelectParameters->setInitialQuery("");
	    $queryWhereSelectParameters->setFinalQuery($sFinalQuery);
	    
	    $this->getEntities($queryWhereSelectParameters);
	    
	    foreach($this->getresumen_usuarios() as $resumen_usuarioLocal){
	        $resumen_usuario=$resumen_usuarioLocal;
	        break;
	    }
	    
	    return $resumen_usuario;
	}
	
	public function validarResumenUsuarioController($usuario,$resumenUsuarioActual) {
	    $validado=true;
	    $resumen_usuario=new resumen_usuario();
	    
	    try	{
	        
	        $resumen_usuario=$this->traerResumenUsuarioActual($usuario);
	        
	        /*
	         $sFinalQuery=' where id_usuario=\''.$usuario->getId().'\'';
	         //$sFinalQuery=' where username=\''.$sLogin.'\'';
	         
	         $queryWhereSelectParameters=new QueryWhereSelectParameters();
	         $queryWhereSelectParameters->setInitialQuery("");
	         $queryWhereSelectParameters->setFinalQuery($sFinalQuery);
	         
	         $this->getEntities($queryWhereSelectParameters);
	         
	         foreach($this->getResumenUsuarios() as $resumen_usuarioLocal){
	         $resumen_usuario=$resumen_usuarioLocal;
	         break;
	         }
	         */
	        
	        if($resumen_usuario->getId()<=0 || $resumen_usuario==null) {
	            $resumen_usuario=new resumen_usuario();
	            
	            $resumen_usuario->setnumero_ingreso_actual(1);
	            
	            $resumen_usuario->setid_usuario($usuario->getId());
	            
	            $this->setresumen_usuario($resumen_usuario);
	            
	            $this->save();
	            
	        } else {
	            //if($resumen_usuario->getnumero_ingreso_actual()==0 || $resumen_usuario->getnumero_ingreso_actual()>1) {
	            
	            if($resumenUsuarioActual->getVersionRow() != $resumen_usuario->getVersionRow()) {
	                $validado=false;
	            }
	        }
	    } catch(Exception $e) {
	        //Funciones::logShowExceptionMessages($logger,$e);
	        
	        throw $e;
	    }
	    
	    return $validado;
	}
	
}
?>