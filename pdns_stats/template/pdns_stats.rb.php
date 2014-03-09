<?php
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2012             mk@mathias-kettner.de |
# +------------------------------------------------------------------+
#
# This file is part of Check_MK.
# The official homepage is at http://mathias-kettner.de/check_mk.
#
# check_mk is free software;  you can redistribute it and/or modify it
# under the  terms of the  GNU General Public License  as published by
# the Free Software Foundation in version 2.  check_mk is  distributed
# in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# ails.  You should have  received  a copy of the  GNU  General Public
# License along with GNU Make; see the file  COPYING.  If  not,  write
# to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# Boston, MA 02110-1301 USA.

$opt[1] = "--vertical-label Queries -l0  -u 1 --title \"Avg queries per sec\" ";

$def[1] =  "DEF:var1=$RRDFILE[1]:$DS[2]:AVERAGE " ;
$def[1] .= "DEF:var2=$RRDFILE[1]:$DS[3]:AVERAGE " ;
$def[1] .= "DEF:var3=$RRDFILE[1]:$DS[4]:AVERAGE " ;
$def[1] .= "AREA:var1#7B68EE:\"Queries/sec average  1 min \" " ;
$def[1] .= "GPRINT:var1:LAST:\"%6.2lf last\" " ;
$def[1] .= "GPRINT:var1:AVERAGE:\"%6.2lf avg\" " ;
$def[1] .= "GPRINT:var1:MAX:\"%6.2lf max\\n\" ";
$def[1] .= "LINE:var3#483D8B:\"Queries/sec average 10 min \" " ;
$def[1] .= "GPRINT:var3:LAST:\"%6.2lf last\" " ;
$def[1] .= "GPRINT:var3:AVERAGE:\"%6.2lf avg\" " ;
$def[1] .= "GPRINT:var3:MAX:\"%6.2lf max\\n\" " ;

$opt[2] = "--vertical-label Queries -l0  -u 1 --title \"Backend query load\" ";

$def[2] =  "DEF:var1=$RRDFILE[1]:$DS[11]:AVERAGE " ;
$def[2] .= "DEF:var2=$RRDFILE[1]:$DS[12]:AVERAGE " ;
$def[2] .= "DEF:var3=$RRDFILE[1]:$DS[13]:AVERAGE " ;
$def[2] .= "AREA:var1#7B68EE:\"Queries/sec average  1 min \" " ;
$def[2] .= "GPRINT:var1:LAST:\"%6.2lf last\" " ;
$def[2] .= "GPRINT:var1:AVERAGE:\"%6.2lf avg\" " ;
$def[2] .= "GPRINT:var1:MAX:\"%6.2lf max\\n\" ";
$def[2] .= "LINE:var3#483D8B:\"Queries/sec average 10 min \" " ;
$def[2] .= "GPRINT:var3:LAST:\"%6.2lf last\" " ;
$def[2] .= "GPRINT:var3:AVERAGE:\"%6.2lf avg\" " ;
$def[2] .= "GPRINT:var3:MAX:\"%6.2lf max\\n\" " ;

$opt[3] = "--vertical-label \"hits %\" -l0 -u 1 --title \"Cache hitrate\" ";
  
$def[3] =  "DEF:var1=$RRDFILE[1]:$DS[5]:AVERAGE " ;
$def[3] .= "DEF:var2=$RRDFILE[1]:$DS[6]:AVERAGE " ;
$def[3] .= "DEF:var3=$RRDFILE[1]:$DS[7]:AVERAGE " ;
$def[3] .= "AREA:var1#FF8C00:\"Cache hitrate average  1 min \" " ;
$def[3] .= "GPRINT:var1:LAST:\"%6.2lf%s$UNIT[5] last\" " ;
$def[3] .= "GPRINT:var1:AVERAGE:\"%6.2lf%s$UNIT[5] avg\" " ;
$def[3] .= "GPRINT:var1:MAX:\"%6.2lf%s$UNIT[5] max\\n\" ";
$def[3] .= "LINE:var3#FF4500:\"Cache hitrate average 10 min \" " ;
$def[3] .= "GPRINT:var3:LAST:\"%6.2lf%s$UNIT[7]last\" " ;
$def[3] .= "GPRINT:var3:AVERAGE:\"%6.2lf%s$UNIT[7] avg\" " ;
$def[3] .= "GPRINT:var3:MAX:\"%6.2lf%s$UNIT[7] max\\n\" " ;

$opt[4] = "--vertical-label \"hits %\" -l0 -u 1 --title \"Backend query cache hitrate\" ";
  
$def[4] =  "DEF:var1=$RRDFILE[1]:$DS[8]:AVERAGE " ;
$def[4] .= "DEF:var2=$RRDFILE[1]:$DS[9]:AVERAGE " ;
$def[4] .= "DEF:var3=$RRDFILE[1]:$DS[10]:AVERAGE " ;
$def[4] .= "AREA:var1#DAA520:\"Cache hitrate average  1 min \" " ;
$def[4] .= "GPRINT:var1:LAST:\"%6.2lf%s$UNIT[8] last\" " ;
$def[4] .= "GPRINT:var1:AVERAGE:\"%6.2lf%s$UNIT[8] avg\" " ;
$def[4] .= "GPRINT:var1:MAX:\"%6.2lf%s$UNIT[8] max\\n\" ";
$def[4] .= "LINE:var3#B8860B:\"Cache hitrate average 10 min \" " ;
$def[4] .= "GPRINT:var3:LAST:\"%6.2lf%s$UNIT[10]last\" " ;
$def[4] .= "GPRINT:var3:AVERAGE:\"%6.2lf%s$UNIT[10] avg\" " ;
$def[4] .= "GPRINT:var3:MAX:\"%6.2lf%s$UNIT[10] max\\n\" " ;

$opt[5] = "--vertical-label \"latency ms\" -l0 -u 1 --title \"Question/answer latency\" ";

$def[5] = "DEF:var1=$RRDFILE[1]:$DS[14]:AVERAGE " ;
$def[5] .= rrd::gradient('var1', "#ffefcf", "#ff9d00", "Latency");
$def[5] .= "GPRINT:var1:LAST:\"%6.2lf last\" " ;
$def[5] .= "GPRINT:var1:AVERAGE:\"%6.2lf avg\" " ;
$def[5] .= "GPRINT:var1:MAX:\"%6.2lf max\\n\" ";
?>

