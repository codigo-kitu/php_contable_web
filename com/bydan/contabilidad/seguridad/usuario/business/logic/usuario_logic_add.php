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

namespace com\bydan\contabilidad\seguridad\usuario\business\logic;

use Exception;

//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
//use com\bydan\framework\contabilidad\util\DeepLoadType;
//use com\bydan\framework\contabilidad\business\entity\Reporte;
//use com\bydan\framework\contabilidad\business\entity\Classe;
//use com\bydan\framework\contabilidad\business\entity\OrderBy;
//use com\bydan\framework\contabilidad\presentation\report\CellReport;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;

class usuario_logic_add extends usuario_logic{
	/*CONTROL_INICIO*/
	
	function __construct() {
		parent::__construct();
    }	
	/*CONTROL_FUNCION1*/
		
	
	public static function checkusuarioToSave($usuario,$datosCliente,$arrDatoGeneral=null) {	
		//CONTROL_1
	}
	
	public static function checkusuarioToSave2($usuario,$datosCliente,$connexion,$arrDatoGeneral=null) {	
		//CONTROL_2
	}
	
	public static function checkusuarioToSaveAfter($usuario,$datosCliente,$connexion,$arrDatoGeneral=null) {	
		//CONTROL_3
	}
	
	public static function checkusuarioToSaves($usuarios,$datosCliente,$arrDatoGeneral=null) {	
		//CONTROL_4
	}
	
	public static function checkusuarioToSaves2($usuarios,$datosCliente,$connexion,$arrDatoGeneral=null) {	
		//CONTROL_5
	}
	
	public static function checkusuarioToSavesAfter($usuarios,$datosCliente,$connexion,$arrDatoGeneral=null) {	
		//CONTROL_6
	}
	
	public static function checkusuarioToGet($usuario,$datosCliente,$arrDatoGeneral=null) {	
		//CONTROL_7
	}
	
	public static function checkusuarioToGets($usuarios,$datosCliente,$arrDatoGeneral=null) {	
		//CONTROL_8
	}
	
	public static function updateusuarioToSave($usuario,$arrDatoGeneral=null) {	
		//CONTROL_9
	}		
						
	public static function updateusuarioToGet($usuario,$arrDatoGeneral=null) {	
		//CONTROL_10
	}	
	
	//PARA ACCIONES ADDITIONAL
	public function ProcesarAccion($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$sProceso,$usuarios)  {
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
	
	
	public function validarUsuario(string $sLogin,string $sClave) : usuario {
	    $usuario=new Usuario();
	    
	    try	{
	        
	        $sClaveDesencriptada="";
	        
	        $sClaveDesencriptada=$sClave;
	        
	        //$sClaveDesencriptada=SHA1Encrypte::SHA1($sClave);
	        $sClaveDesencriptada=Funciones::getSha1Encryption(Funciones::GetRealScapeString($sClave,$this->connexion));
	        $sFinalQuery=' where user_name=\''.Funciones::GetRealScapeString($sLogin,$this->connexion).'\''.' and clave=\''.$sClaveDesencriptada.'\'';
	        //$sFinalQuery=' where username=\''.$sLogin.'\'';
	        
	        $queryWhereSelectParameters=new QueryWhereSelectParameters();
	        $queryWhereSelectParameters->setInitialQuery("");
	        $queryWhereSelectParameters->setFinalQuery($sFinalQuery);
	        
	        $this->getEntities($queryWhereSelectParameters);
	        
	        foreach($this->getUsuarios() as $usuarioLocal){
	            $usuario=$usuarioLocal;
	            break;
	        }
	        
	    } catch(Exception $e) {
	        //Funciones::logShowExceptionMessages($logger,$e);
	        
	        throw $e;
	    }
	    
	    return $usuario;
	}
}
?>