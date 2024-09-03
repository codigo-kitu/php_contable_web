<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\cierre_contable\business\data;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\FuncionesSql;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\data\GetEntitiesDataAccessHelper;

/*use com\bydan\framework\contabilidad\business\entity\GeneralEntity;*/
use com\bydan\framework\contabilidad\business\entity\DatoGeneral;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMaximo;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\data\DataAccessHelper;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\ParametersType;

use com\bydan\contabilidad\contabilidad\cierre_contable\business\entity\cierre_contable;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;

use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;

//REL

use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\data\cierre_contable_detalle_data;


interface cierre_contable_dataI {	
	
	/*MANTENIMIENTO*/
	public static function save(cierre_contable $cierre_contable,Connexion $connexion);	
	public static function savePrepared(cierre_contable $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function insert(cierre_contable $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function update(cierre_contable $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function delete(cierre_contable $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);
	
	/*EJECUTAR QUERY*/
	public function executeQuery(Connexion $connexion, string $sQueryExecute);	
	public function executeQueryValor(Connexion $connexion, string $sQueryExecuteValor,string $sNombreCampo);
	
	/*TRAER ENTITY*/
	public function getEntity(Connexion $connexion, ?int $id) : ?cierre_contable;	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?cierre_contable;
	 
	/*TRAER ENTITIES*/
	public function getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesConnexionQuerySelectQueryWhere(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesSimpleQueryBuild(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;
	
	/*----------------------- SELECT COUNT ------------------------*/	
	public function getCountSelect(Connexion $connexion) : int;	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,cierre_contable $entity,Connexion $connexion);
		
	/*-------------------------------- AUXILIARES --------------------------------*/	
	public function getEntityBaseResult(string $strPrefijo,cierre_contable $entity,$resultSet) : cierre_contable;	
	public static function addPrepareStatementParams(string $type,cierre_contable $cierre_contable,$prepare_statement,Connexion $connexion);	
	public static function getPrepareStatementParamsArray(string $type,cierre_contable $cierre_contable,$prepare_statement,Connexion $connexion) : array;	
	public static function preparedQuery(string $sql,array $params) : string;
	
}
?>
