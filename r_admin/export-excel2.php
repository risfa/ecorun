<?php
/*******EDIT LINES 3-8*******/
$DB_Server = "localhost"; //MySQL Server    
$DB_Username = "dapps"; //MySQL Username     
$DB_Password = "l1m4d1g1t";             //MySQL Password     
$DB_DBName = "dapps_joker_classmild_talkshow";         //MySQL Database Name  
// $DB_TBLName = "tablename"; //MySQL Table Name   
$filename = "Record Transaksi Class Mild";         //File 

/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
//create MySQL connection   
$sql = "SELECT tb_transaksi.tanggal_transaksi AS TANGGAL ,tb_transaksi.penanggung_jawab as SPG,tb_customer.nama_customer as NAMA,tb_customer.email as EMAIL,tb_transaksi.hadiahnya as HADIAH FROM tb_transaksi JOIN tb_spbu ON tb_transaksi.id_spbu = tb_spbu.id_spbu JOIN tb_customer ON tb_transaksi.id_customer = tb_customer.id_customer WHERE hadiahnya != ''";
$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
//select database   
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());   
//execute query 
$result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());    
$file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < mysql_num_fields($result); $i++) {
echo mysql_field_name($result,$i) . "\t";
}
print("\n");    
//end of printing column names  
//start while loop to get data
    while($row = mysql_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysql_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }   
?>