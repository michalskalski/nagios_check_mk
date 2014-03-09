<?php

$colors=array(
        "FF0000", "00FF00", "0000FF", "FFFF00", "FF00FF", "00FFFF", "000000", 
        "800000", "008000", "000080", "808000", "800080", "008080", "808080", 
        "C00000", "00C000", "0000C0", "C0C000", "C000C0", "00C0C0", "C0C0C0", 
        "400000", "004000", "000040", "404000", "400040", "004040", "404040", 
        "200000", "002000", "000020", "202000", "200020", "002020", "202020", 
        "600000", "006000", "000060", "606000", "600060", "006060", "606060", 
        "A00000", "00A000", "0000A0", "A0A000", "A000A0", "00A0A0", "A0A0A0", 
        "E00000", "00E000", "0000E0", "E0E000", "E000E0", "00E0E0", "E0E0E0",);



$col_f=0;
$col_t=0;

foreach($DS as $KEY => $VAL){
    if(preg_match('/^num\.query\.type/',$NAME[$KEY])){
        $ds_name[1] = "Query Type";
        $opt[1] = "--title \"Number of queries by type\" ";
      if(!isset($def[1])){
      $def[1] = "";
    }
        $name = substr($NAME[$KEY],15);
        $def[1] .= "DEF:var$KEY=$RRDFILE[$KEY]:$DS[$KEY]:AVERAGE " ;
        $def[1] .= "LINE:var$KEY#".$colors[$col_f].":\"$name\" " ;
        $def[1] .= "GPRINT:var$KEY:LAST:\"%6.0lf LAST \" ";
        $def[1] .= "GPRINT:var$KEY:MAX:\"%6.0lf MAX \" ";
        $def[1] .= "GPRINT:var$KEY:AVERAGE:\"%6.2lf AVERAGE \\n\" ";
  $col_f++;
    }
    
    if(preg_match('/^total\.num/',$NAME[$KEY])){
        $ds_name[2] = "Total number";
        $opt[2] = "--title \"Unbound stats\" ";
      if(!isset($def[2])){
      $def[2] = "";
    }
        $name = substr($NAME[$KEY],10);
        $def[2] .= "DEF:var$KEY=$RRDFILE[$KEY]:$DS[$KEY]:AVERAGE " ;
        $def[2] .= "LINE:var$KEY#".$colors[$col_f].":\"$name\" " ;
        $def[2] .= "GPRINT:var$KEY:LAST:\"%6.0lf LAST \" ";
        $def[2] .= "GPRINT:var$KEY:MAX:\"%6.0lf MAX \" ";
        $def[2] .= "GPRINT:var$KEY:AVERAGE:\"%6.2lf AVERAGE \\n\" ";
  $col_f++;
    }

    if(preg_match('/^unwanted/',$NAME[$KEY])){
        $ds_name[3] = "Unwonted";
        $opt[3] = "--title \"Unwanted\" ";
      if(!isset($def[3])){
      $def[3] = "";
    }
        $def[3] .= "DEF:var$KEY=$RRDFILE[$KEY]:$DS[$KEY]:AVERAGE " ;
        $def[3] .= "LINE:var$KEY#".$colors[$col_f].":\"$NAME[$KEY]\" " ;
        $def[3] .= "GPRINT:var$KEY:LAST:\"%6.0lf LAST \" ";
        $def[3] .= "GPRINT:var$KEY:MAX:\"%6.0lf MAX \" ";
        $def[3] .= "GPRINT:var$KEY:AVERAGE:\"%6.2lf AVERAGE \\n\" ";
  $col_f++;
    }
}

?>
