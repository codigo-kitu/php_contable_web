<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\logic\DatosCliente;
use com\bydan\framework\contabilidad\business\logic\DatosDeep;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterDbType;
use com\bydan\framework\contabilidad\util\ConnexionType;
use com\bydan\framework\contabilidad\util\Constantes;

class GeneralEntityLogic {
    
	public static $logger;
	
	protected array $arrDatoGeneral=array();
	protected ?Connexion $connexion=null;
	protected ?DatosCliente $datosCliente=null;
	protected string $connexionType='';
	protected string $parameterDbType='';
	
	protected ?DatosDeep $datosDeep=null;	
	protected bool $isConDeep=false;
	public bool $isForFKData=false;	
	public bool $isConDeepLoad=false;
	protected bool $isConRefrescarForeignKeys=false;				
	
	function __construct () {
			
		try	{
			
			$this->connexion=new Connexion();
			$this->datosCliente=new DatosCliente();
			$this->arrDatoGeneral= array();						
			
			$this->parameterDbType=ParameterDbType::$MYSQL;
			$this->datosCliente=new DatosCliente();
			$this->datosDeep=new DatosDeep();

			$this->isConDeep=false;
			$this->isConRefrescarForeignKeys=false;

			$this->isForFKData=false;	
			$this->isConDeep=false;
			$this->isConDeepLoad=false;

		} catch(Exception $e) {
			throw $e;
		}	 
	} 		
	
	public function setDatosDeepParametros(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje) {
		$this->datosDeep->setIsDeep($isDeep);
		$this->datosDeep->setDeepLoadType($deepLoadType);
		$this->datosDeep->setClases($clases);
		$this->datosDeep->setStrTituloMensaje($strTituloMensaje);
	}
	
	public function cargarDatosCliente() {
		$this->datosCliente=new DatosCliente();
		
		/*if($this->bigIdUsuarioSesion!=null){$this->datosCliente->setIdUsuario($this->bigIdUsuarioSesion);}*/			
		/*if(httpServletRequest.getRemoteUser()!=null){*/

		$this->datosCliente->setstrUsuarioPC('');
		$this->datosCliente->setstrNamePC(array_key_exists('REMOTE_HOST',$_SERVER)? $_SERVER['REMOTE_HOST']:'');
		$this->datosCliente->setstrIPPC(array_key_exists('REMOTE_ADDR',$_SERVER)? $_SERVER['REMOTE_ADDR']:'');		
	}

	/*CONEXION*/
	public function getNewConnexionToDeep() {
		try	{
			$this->connexion=Connexion::getNewConnexion();
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	public function commitNewConnexionToDeep() {
		try	{
			$this->connexion->getConnection()->commit();
			
		}  catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	public function rollbackNewConnexionToDeep() {
		try	{
			$this->connexion->getConnection()->rollback();

		}  catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	public function closeNewConnexionToDeep() {
		try	{
			$this->connexion->getConnection()->close();
			
		}  catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
		
	public function NewGeneralEntityLogic(Connexion $newConnexion)  {			
		try	{
			$this->connexion=$newConnexion;
			
			$this->datosCliente=new DatosCliente();
			$this->arrDatoGeneral= array();						

			$this->datosDeep=new DatosDeep();
			$this->isConDeep=false;
			$this->isConRefrescarForeignKeys=false;
			
		} catch(Exception $e) {
			throw $e;
	  	}	 
	}
	
	public function getConnexion() : Connexion {
		return $this->connexion;		
	}
	
	public function setConnexion(Connexion $newConnexion) {
		$this->connexion=$newConnexion;		
	}
	
	public function getDatosCliente() : DatosCliente {
		return $this->datosCliente;
	}

	public function setDatosCliente(DatosCliente $datosCliente) {		
		$this->datosCliente = $datosCliente;
	}
	
	public function getDatosDeep() : DatosDeep {
		return $this->datosDeep;
	}

	public function setDatosDeep(DatosDeep $datosDeep) {
		$this->datosDeep = $datosDeep;
	}
	
	public function setDatosDeepFromDatosCliente() {
		$this->datosDeep = $this->datosCliente->getDatosDeep();
		$this->isConDeep = $this->datosCliente->getIsConDeep();
	}
	
	public function getIsConDeep() : bool {
		return $this->isConDeep;
	}

	public function setIsConDeep(bool $isConDeep) {
		$this->isConDeep = $isConDeep;
	}
	
	public function getIsConRefrescarForeignKeys() : bool {
		return $this->isConRefrescarForeignKeys;
	}

	public function setIsConRefrescarForeignKeys(bool $isConRefrescarForeignKeys) {
		$this->isConRefrescarForeignKeys = $isConRefrescarForeignKeys;
	}
	
	public function getArrDatoGeneral() : array {
		return $this->arrDatoGeneral;
	}

	public function setArrDatoGeneral(array $arrDatoGeneral) {
		$this->arrDatoGeneral = $arrDatoGeneral;
	}
	
	public function getConnexionType() : string {
		return $this->connexionType;
	}

	public function setConnexionType(string $connexionType) {
		$this->connexionType = $connexionType;
	}

	public function getParameterDbType() : string {
		return $this->parameterDbType;
	}

	public function setParameterDbType(string $parameterDbType) {
		$this->parameterDbType = $parameterDbType;
	}
	
	public function getIsForFKData() : bool {
		return $this->isForFKData;
	}

	public function setIsForFKData(bool $isForFKData) {
		$this->isForFKData = $isForFKData;
	}

	public function getIsConDeepLoad() : bool {
		return $this->isConDeepLoad;
	}

	public function setIsConDeepLoad(bool $isConDeepLoad) {
		$this->isConDeepLoad = $isConDeepLoad;
	}
	
	//BYDAN_ADDITIONAL
	//PARA EVENTOS GENERALES
	//procesarEventos-->procesarEventosGeneral(
	public function procesarEventosGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$generalEntityLogic,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$objects,$object,$generalEntityParameterGeneral,$generalEntityReturnGeneral,$isEsNuevoUpdate,$clases){				
		//CONTROL_19		
		 try {	
				
			
			return $generalEntityReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			
			throw $e;			
      	}
	}
	
	public function procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$generalEntityLogic,$sProceso,$objects,$generalEntityParameterGeneral,$generalEntityReturnGeneral){
		//CONTROL_23
	
		try {
				
				
			//GeneralEntityReturnGeneral generalEntityReturnGeneral=new GeneralEntityReturnGeneral();
	
				
			return $generalEntityReturnGeneral;
				
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
				
		}
	}
	
	//BYDAN_ADDITIONAL
	//PARA EVENTOS GENERALES
	public function procesarPostAccionGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$generalEntityLogic,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$objects,$object,$generalEntityParameterGeneral,$generalEntityReturnGeneral,$isEsNuevoUpdate,$clases){
	    //CONTROL_19
	    try {
	        
	        
	        return $generalEntityReturnGeneral;
	        
	    } catch(Exception $e) {
	        Funciones::logShowExceptionMessages($e);
	        
	        throw $e;
	    }
	}
	
	//BYDAN_ADDITIONAL_FIN
	
	public function checkGeneralEntityToSave($generalEntityLogic,$entity,$datosCliente,$connexion) {
	
	}
	
	public function checkGeneralEntityToSaveAfter($generalEntityLogic,$entity,$datosCliente,$connexion) {
	
	}
	
	public function checkGeneralEntitiesToSaves($generalEntityLogic,$entities,$datosCliente,$connexion) {
	
	}
	
	public function checkGeneralEntitiesToSavesAfter($generalEntityLogic,$entities,$datosCliente,$connexion) {
	   
	}
	
	public function updateToGets($entities,$generalEntityLogic) {
		
	}
	
	public function updateToGetsReferencia(&$entities,$generalEntityLogic) {
	
	}

//import com\bydan\erp\puntoventa\business\dataaccess\MesaDataAccess;
//import com\bydan\erp\puntoventa\business\entity\Mesa;
//import com\bydan\erp\puntoventa\business\logic\MesaLogic;
//import com\bydan\framework\ConstantesCommon;
//import com\bydan\framework\erp\business\logic\DatosCliente;
//import com\bydan\framework\erp\business\logic\DatosDeep;
//import com\bydan\framework\erp\util\Connexion;
//import com\bydan\framework\erp\util\ConnexionType;
//import com\bydan\framework\erp\util\Constantes;
//import com\bydan\framework\erp\util\Funciones;
//import com\bydan\framework\erp\util\ParameterDbType;


//protected $entityManagerFactory;
	
/*AUXILIAR*/
/*
public ?Connexion $connexion=null;
public string $parameterDbType;
public ?DatosCliente $datosCliente=null;
public ?DatosDeep $datosDeep=null;
*/

/*PARAMETROS*/
/*public bool $isConDeep=false;*/

/*CONSTRUCT*/
//INICIALIZA PARAMETROS CONEXION
/*
$this->connexionType=Constantes::$CONNEXIONTYPE;
$this->parameterDbType=Constantes::$PARAMETERDBTYPE;

if(Constantes::$CONNEXIONTYPE==ConnexionType::$HIBERNATE) {
	//$this->entityManagerFactory=ConstantesCommon::$JPAENTITYMANAGERFACTORY;
}			
*/


//INICIALIZA PARAMETROS CONEXION
		/*
		$this->connexionType=Constantes::$CONNEXIONTYPE;
		$this->parameterDbType=Constantes::$PARAMETERDBTYPE;
		
		if(Constantes::$CONNEXIONTYPE==ConnexionType::$HIBERNATE) {
			//$this->entityManagerFactory=ConstantesCommon->JPAENTITYMANAGERFACTORY;
		}
		*/

	/*
	public function getDatosCliente() : DatosCliente {
		return $this->datosCliente;
	}

	public function setDatosCliente(DatosCliente $datosCliente) {
		$this->datosCliente = $datosCliente;
	}	
		
	public function getDatosDeep() : DatosDeep {
		return $this->datosDeep;
	}

	public function setDatosDeep(DatosDeep $datosDeep) {
		$this->datosDeep = $datosDeep;
	}
	*/
	/*
	public function getIsConDeep() : bool {
		return $this->isConDeep;
	}

	public function setIsConDeep(bool $isConDeep) {
		$this->isConDeep = $isConDeep;
	}
	*/
	
	/*
	public function getEntityManagerFactory() {
		return $this->entityManagerFactory;
	}

	public function setEntityManagerFactory($entityManagerFactory) {
		$this->entityManagerFactory = $entityManagerFactory;
	}
	*/

}
?>