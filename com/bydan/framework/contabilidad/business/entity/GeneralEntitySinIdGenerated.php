<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

use com\bydan\framework\contabilidad\util\ParametersMaintenance;

class GeneralEntitySinIdGenerated {
	public int $id=-1;
	public int $i=0;
	//private $isActive;
	//private $isExpired;
	public ?string $versionRow='';
	public bool $isNew=false;
	public bool $isChanged=false;
	public bool $isDeleted=false;
	public bool $isSelected=false;
	public bool $isWithSchema=false;
	public bool $isWithIdentity=true;
	protected ?ParametersMaintenance $parametersMaintenance=null;
	
	protected string $orderParameter='';
	protected string $queryInsert='';
	protected string $queryUpdate='';
	protected string $queryDelete='';
	protected string $querySelect='';
	
	protected string $storeProcedureInsert='';
	protected string $storeProcedureUpdate='';
	protected string $storeProcedureDelete='';
	protected string $storeProcedureSelect='';
	
	/*AUXILIAR*/
	/*Mantiene estado isNewPersistente para Additional*/
	public bool $isNewAux=false;
	public bool $isChangedAux=false;
	
	function __construct() {
		$this->id=-1;
		$this->i=0;
		$this->isNew=true;
		//$this->isActive=true;
		$this->isChanged=false;
		$this->isDeleted=false;
		$this->isSelected=false;
		//$this->isExpired=true;	
		$this->isWithSchema=true;
		$this->isWithIdentity=false;
		$this->versionRow=null;
		
		$this->isNewAux=false;
		$this->isChangedAux=false;
	}
	
	public static function getColumnNameId() : string {
		return "id";
	}

	/*
	public static function getColumnNameIsActive() {
		return "isActive";
	}
	
	public static function getColumnNameIsExpired() {
		return "isExpired";
	}
	*/

	public static function getColumnNameVersionRow() : string {
		return "versionRow";
	}
	
	public function getStoreProcedureInsert() : string {
		return $this->storeProcedureInsert;
	}

	public function setStoreProcedureInsert(string $storeProcedureInsert) {
		$this->storeProcedureInsert = $storeProcedureInsert;
	}

	public function getStoreProcedureUpdate() : string {
		return $this->storeProcedureUpdate;
	}

	public function setStoreProcedureUpdate(string $storeProcedureUpdate) {
		$this->storeProcedureUpdate = $storeProcedureUpdate;
	}

	public function getStoreProcedureDelete() : string {
		return $this->storeProcedureDelete;
	}

	public function setStoreProcedureDelete(string $storeProcedureDelete) {
		$this->storeProcedureDelete = $storeProcedureDelete;
	}

	public function getStoreProcedureSelect() : string {
		return $this->storeProcedureSelect;
	}

	public function setStoreProcedureSelect(string $storeProcedureSelect) {
		$this->storeProcedureSelect = $storeProcedureSelect;
	}
/*
	public function getIsExpired() {
		return $this->isExpired;
	}

	public function setIsExpired($isExpired) {
		$this->isExpired = $isExpired;
	}
*/
	public function getOrderParameter() : string {
		return $this->orderParameter;
	}

	public function setOrder(string $newOrderParameter) {
		$this->orderParameter = $newOrderParameter;
	}
	
	public function setParametersMaintenance(string $parametersMaintenance) {
		$this->parametersMaintenance = $parametersMaintenance;
	}
	
	public function getParametersMaintenance(): ParametersMaintenance {
		return $this->parametersMaintenance;
	}

	public function getIsWithSchema() : bool {
		return $this->isWithSchema;
	}

	public function setIsWithSchema(bool $isWithSchema) {
		$this->isWithSchema = $isWithSchema;
	}
	
	public function getIsWithIdentity() : bool {
		return $this->isWithIdentity;
	}

	public function setIsWithIdentity(bool $isWithIdentity) {
		$this->isWithIdentity = $isWithIdentity;
	}
	
	//throws Exception
	public function buildParametersMaintenance(string $parameterDbType,string $parametersType) {
		
	}
	
	public function getQuerySelect() : string {
		return $this->querySelect;
	}

	public function setQuerySelect(string $newQuerySelect) {
		$this->querySelect = $newQuerySelect;
	}
	
	public function getQueryDelete() : string {
		return $this->queryDelete;
	}

	public function setQueryDelete(string $newQueryDelete) {
		$this->queryDelete = $newQueryDelete;
	}

	public function getQueryInsert() : string {
		return $this->queryInsert;
	}

	public function setQueryInsert(string $newQueryInsert) {
		$this->queryInsert = $newQueryInsert;
	}

	public function getQueryUpdate() : string {
		return $this->queryUpdate;
	}

	public function setQueryUpdate(string $newQueryUpdate) {
		$this->queryUpdate = $newQueryUpdate;
	}
	
	
	public function getIsDeleted() : bool {
		return $this->isDeleted;
	}
	
	public function setIsDeleted(bool $newIsDeleted) {
		$this->isDeleted=$newIsDeleted;
	}
	
	public function getIsSelected() : bool {
		return $this->isSelected;
	}
	
	public function setIsSelected(bool $newIsSelected) {
		$this->isSelected=$newIsSelected;
	}
	
	public function setIsNew(bool $newIsNew) {
		$this->isNew=$newIsNew;
	}
	
	public function getIsNew() : bool {
		return $this->isNew;
	}
    
	public function setIsNewAux(bool $newIsNewAux) {
	    $this->isNewAux=$newIsNewAux;
	}
	
	public function setIsChangedAux(bool $newIsChangedAux) {
	    $this->isChangedAux=$newIsChangedAux;
	}
	
	public function getIsNewAux() : bool {
	    return $this->isNewAux;
	}
	
	public function getIsChangedAux() : bool {
	    return $this->isChangedAux;
	}
	
	public function getIsChanged() : bool {
		return $this->isChanged;
	}
	
	public function setIsChanged(bool $newIsChanged) {
		$this->isChanged=$newIsChanged;
	}
	
	public function setId(int $newId) {
		if($this->id!=$newId)	{
			$this->isChanged=true;
		}
		
		$this->id=$newId;
	}
			
	public function getId() : int {
		return $this->id;
	}
	/*
	public function setIsActive($newIsActive) {		
		if($this->isActive!=$newIsActive){
			$this->isChanged=true;
		}
		
		$this->isActive=$newIsActive;
	}
	
	public function getIsActive() {
		return $this->isActive;
	}
	*/
	public function setVersionRow(?string $newVersionRow) {
		if($this->versionRow!=$newVersionRow) {
			$this->isChanged=true;
		}
		
		$this->versionRow=$newVersionRow;
	}
	
	public function getVersionRow() : ?string {
		return $this->versionRow;
	}
	/*
	public static function getTableName()
    {
         return "";
    }
	*/

//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterDbType;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParametersMaintenance;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParametersType;

}

?>