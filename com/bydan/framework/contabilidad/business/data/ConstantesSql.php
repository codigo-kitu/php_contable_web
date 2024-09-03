<?php declare(strict_types  =  1);

namespace com\bydan\framework\contabilidad\business\data;

class ConstantesSql {
    
    public  static string $ID = 'id';
    public  static string $ISACTIVE = 'is_active';
    public  static string $ISEXPIRED = 'is_expired';
    public  static string $VERSIONROW = 'updated_at';//'version_row';
	 
    public  static string $INNERJOIN = 'inner join';
    public  static string $WHERE = 'where';
    public  static string $AND = 'and';
    public  static string $SELECT = 'select';
    public  static string $FROM = 'from';
    public  static string $ORDER = 'order';
    public  static string $BY = 'by';
    public  static string $ASC = 'asc';
    public  static string $DESC = 'desc';
    public  static string $MAYOR = 'desc';
}

?>