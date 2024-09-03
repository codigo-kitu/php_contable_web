<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\data;

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

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity\cuenta_predefinida;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\data\tipo_cuenta_predefinida_data;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\data\tipo_cuenta_data;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;

use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\data\tipo_nivel_cuenta_data;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity\tipo_nivel_cuenta;

//REL



interface cuenta_predefinida_dataI {	
	
	/*MANTENIMIENTO*/
	public static function save(cuenta_predefinida $cuenta_predefinida,Connexion $connexion);	
	public static function savePrepared(cuenta_predefinida $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function insert(cuenta_predefinida $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function update(cuenta_predefinida $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);	
	public static function delete(cuenta_predefinida $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures);
	
	/*EJECUTAR QUERY*/
	public function executeQuery(Connexion $connexion, string $sQueryExecute);	
	public function executeQueryValor(Connexion $connexion, string $sQueryExecuteValor,string $sNombreCampo);
	
	/*TRAER ENTITY*/
	public function getEntity(Connexion $connexion, ?int $id) : ?cuenta_predefinida;	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?cuenta_predefinida;
	 
	/*TRAER ENTITIES*/
	public function getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesConnexionQuerySelectQueryWhere(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;	
	public function getEntitiesSimpleQueryBuild(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array;
	
	/*----------------------- SELECT COUNT ------------------------*/	
	public function getCountSelect(Connexion $connexion) : int;	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,cuenta_predefinida $entity,Connexion $connexion);
		
	/*-------------------------------- AUXILIARES --------------------------------*/	
	public function getEntityBaseResult(string $strPrefijo,cuenta_predefinida $entity,$resultSet) : cuenta_predefinida;	
	public static function addPrepareStatementParams(string $type,cuenta_predefinida $cuenta_predefinida,$prepare_statement,Connexion $connexion);	
	public static function getPrepareStatementParamsArray(string $type,cuenta_predefinida $cuenta_predefinida,$prepare_statement,Connexion $connexion) : array;	
	public static function preparedQuery(string $sql,array $params) : string;
	
}
?>
