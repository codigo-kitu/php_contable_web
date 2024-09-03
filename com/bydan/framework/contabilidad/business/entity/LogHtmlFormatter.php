<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

//extends Formatter 

class LogHtmlFormatter {
    
	private bool $blnEsPar=false;
    
	// This method is called for every log records
    public function format($rec):string {
        $buf = "";        
        
        if($this->blnEsPar==true) {
        	$this->blnEsPar=false;
        	$buf=$buf."<tr style=\"background-color: rgb(204, 204, 255);\">\n";
        } else {
        	$this->blnEsPar=true;
        	$buf=$buf."<tr>\n";
        }
       
        $buf=$buf."<td>\n";

        // Bold any levels >= WARNING
        
        /*
        if ($rec->getLevel()->intValue() >= $Level->WARNING->intValue()) {
            $buf=$buf."<b>";
            $buf=$buf.$rec->getLevel();
            $buf=$buf."</b>";
        } else {
            $buf=$buf.$rec->getLevel();
        }
        */
        
        $buf=$buf."</td>\n";
        
        /*
        buf=$buf."<td>\n");
        buf=$buf.' ');
        buf=$buf.rec.getMillis());
        buf=$buf."</td>\n");
		*/
		 
        //buf=$buf."<td style=\"color: white; background-color: rgb(102, 102, 204);\">\n");
        //$buf=$buf->formatMessage($rec);
        
        $buf=$buf."</tr>\n";

        return $buf;
    }

   
    // This method is called just after the handler using this
    // formatter is created
    public function getHead($h) :string{
    	 $buf = "";
    	
    	 $buf=$buf."<html><head></head><body>"."(new Date())"."\n";
    	
    	 $buf=$buf."<table width=\"100%\" border=\"0\""+
    	 "cellpadding=\"0\" cellspacing=\"0\">\n";
    	 
    	 $buf=$buf."<tr style=\"color: white; font-weight: bold;background-color: rgb(102, 102, 204);\">\n";
    	 
    	 $buf=$buf."<td>\n";
         $buf=$buf."LEVEL\n";
         $buf=$buf."</td>\n";
         
         $buf=$buf."<td>\n";
         $buf=$buf."NUM\n";
         $buf=$buf."</td>\n";
         
         $buf=$buf."<td>\n";
         $buf=$buf."FILE\n";
         $buf=$buf."</td>\n";
         
         $buf=$buf."<td>\n";
         $buf=$buf."LINE NUM\n";
         $buf=$buf."</td>\n";
         
         $buf=$buf."<td>\n";
         $buf=$buf."METHOD\n";
         $buf=$buf."</td>\n";
         
         $buf=$buf."<td>\n";
         $buf=$buf."PATH\n";
         $buf=$buf."</td>\n";
         
         $buf=$buf."</tr>\n";
         
        return $buf;
    }

    // This method is called just after the handler using this
    // formatter is closed
    public function getTail($h):string {
    	$buf ="";        
    	$buf=$buf."</table>\n";
    	$buf=$buf."</body></html>\n";
    	   	
    	return $buf;
    }
}

?>