<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

function email_xml_file_less($input = array(), $sensordata)
{
	$userName = $input['userName'];
	$display_name = $input['display_name'];
	$sensorName = $input['sensorName'];
	$measuringUnit = $input['measuringUnit'];
	$criticalValue = $input['criticalValue']; 
	$resendingInterval = $input['resendingInterval']; 
	$recipients = "'".$input['recipients']."'";
	
	$notificationVSName = "N_" . $userName . "_" . $sensorName ."1_".strtotime(date('m/d/Y h:i:s a', time()));
	$measuringUnitUPP = strtoupper($measuringUnit);
	
	$sensorInformation = "Sensor @ ".$sensordata[0]->gsnName." - ".$sensordata[0]->city. " ".
                       $sensordata[0]->state.", latitude ".$sensordata[0]->location_y.
                             ", longitude ".$sensordata[0]->location_x;
	 
	 $xml= '<?xml version="1.0" encoding="UTF-8"?>' . "\n". 
          '<virtual-sensor name="' . $notificationVSName . '" priority="10">'. "\n" .
          '  <processing-class>'. "\n" .
          '    <class-name>gsn.processor.ScriptletProcessor</class-name>'. "\n" .
          '    <init-params>'. "\n" .
          '      <param name="persistant">false</param>'. "\n" .
          '      <param name="notification-state">0</param>'. "\n" .
          '      <param name="scriptlet"><![CDATA['. "\n" .
          '                    //this is a start of a scriptlet'. "\n" .
          '                    //data definition'. "\n" .
          ''. "\n" .                                                
          '                    def delay = ' . $resendingInterval . '; //time in miliseconds between resending emails'. "\n" .
          '                    def filePath ="virtual-sensors/' . $notificationVSName . '.xml";'. "\n" .
          '                    def recipients = [' . $recipients . ']; // Define one or more recipients'. "\n" .
          '                    def criticalValue = ' . $criticalValue . ';'. "\n" .
          '                    def measuringUnit = "' . $measuringUnit . '";'. "\n" .
          ''. "\n" .                    
          ''. "\n" .                    
          '                    def state = notificationState; //notification state variable is defined in scriptlet from init-params'. "\n" .
          '                    def nodePath ="streams/stream/query";'. "\n" .
          '                    def EmailTitle ="";'. "\n" .
          '                    def emailContent="";'. "\n" .
          '                    def newQuery=""; '. "\n" .
          ' '. "\n" .                   
          '                    //end of data definition'. "\n" .
          ' '. "\n" .                      
          '                    switch(state){'. "\n" .
          ' '. "\n" .                         
          '                          case 0: def delayTime = TIMED + delay;'. "\n" .
          '                                  newQuery = "select "+measuringUnit+", timed from source1 where (("+measuringUnit+"<"+criticalValue+") and (timed >" + delayTime + ")) or ("+measuringUnit+">="+criticalValue+")";'. "\n" .
          '                                  emailTitle = "Warning!";'. "\n" .
          '                                  emailContent = "Dear ' . $display_name . ',\n"+measuringUnit+" measured on ' . $sensorName . ' dropped under "+criticalValue+".\nLast measured value is " + ' . $measuringUnitUPP . ' + "!\n\n ' . $sensorInformation . '";'. "\n" .
          '                                  state++;'. "\n" .
          '                                  break;'. "\n" .
          ''. "\n" .                                
          '                          case 1: if (' . $measuringUnitUPP . '<criticalValue){'. "\n" .
          '                                          def delayTime = TIMED + delay;'. "\n" .
          '                                          newQuery = "select "+measuringUnit+", timed from source1 where (("+measuringUnit+"<"+criticalValue+") and (timed >" + delayTime + ")) or ("+measuringUnit+">="+criticalValue+")";'. "\n" .
          '                                          emailTitle = "Warning again";'. "\n" .
          '                                          emailContent = "Dear ' . $display_name . ',\n"+measuringUnit+" measured on ' . $sensorName . ' still under "+criticalValue+".\nMeasured value is " + ' . $measuringUnitUPP . ' + ".\nDo something!\n\n ' . $sensorInformation . '";'. "\n" .
          '                                  }'. "\n" .
          '                                  else{'. "\n" .
          '                                       newQuery = "select "+measuringUnit+", timed from source1 where "+measuringUnit+"<"+criticalValue;'. "\n" .
          '                                       emailTitle = "Everything OK";'. "\n" .
          '                                       emailContent = "Dear ' . $display_name . ',\n"+measuringUnit+" measured on ' . $sensorName . ' rised over "+criticalValue+".\nMeasured value is " + ' . $measuringUnitUPP . ' + "!!!\nSensor readings are ok.\n\n ' . $sensorInformation . '";'. "\n" .
          '                                       state=0;'. "\n" .
          ''. "\n" .                           
          '                                  }'. "\n" .
          '                                  break;'. "\n" .
          '                    }'. "\n" .
          ''. "\n" .               
          '                    sendEmail(recipients, emailTitle, emailContent);'. "\n" .
          '                    updateNotificationVSXML(filePath,nodePath,newQuery,state);]]></param>' . "\n" .
          '    </init-params>' . "\n" .
          '    <output-structure />' . "\n" .
          '  </processing-class>' . "\n" .
          '  <description>Automatic notification VS (type 1) for sensor ' . $sensorName . ' and user ' . $userName . '. Triggered on less then critical value.</description>' . "\n" .
          '  <addressing />' . "\n" .
          '  <storage history-size="1" />' . "\n" .
          '  <streams>' . "\n" .
          '    <stream name="stream1">' . "\n" .
          '      <source alias="source1" storage-size="1" sampling-rate="1">' . "\n" .
          '        <address wrapper="local">' . "\n" .
          '          <predicate key="query">select * from ' . $sensorName . '</predicate>' . "\n" .
          '        </address>' . "\n" .
          '        <query>select * from wrapper</query>' . "\n" .
          '      </source>' . "\n" .
          '      <query>select ' . $measuringUnit . ', timed from source1 where ' . $measuringUnit . '&lt;' . $criticalValue . '</query>' . "\n" .
          '    </stream>' . "\n" .
          '  </streams>*/' . "\n" .
          '</virtual-sensor>';
  return $xml;
}

function email_xml_file_greater($input = array(),  $sensordata)
{
	$userName = $input['userName'];
	$display_name = $input['display_name'];
	$sensorName = $input['sensorName'];
	$measuringUnit = $input['measuringUnit'];
	$criticalValue = $input['criticalValue']; 
	$resendingInterval = $input['resendingInterval']; 
	$recipients = "'".$input['recipients']."'";
	
	$notificationVSName = "N_" . $userName . "_" . $sensorName ."2_".strtotime(date('m/d/Y h:i:s a', time()));
	$measuringUnitUPP = strtoupper($measuringUnit);
	
	//$sensorInformation = "Sensor 3 @ TestPolygon with latitude 45.855452...";
        
     $sensorInformation = "Sensor @ ".$sensordata[0]->gsnName." - ".$sensordata[0]->city. " ".
                       $sensordata[0]->state.", latitude ".$sensordata[0]->location_y.
                             ", longitude ".$sensordata[0]->location_x;
     
	  $xml= '<?xml version="1.0" encoding="UTF-8"?>' . "\n". 
          '<virtual-sensor name="' . $notificationVSName . '" priority="10">'. "\n" .
          '  <processing-class>'. "\n" .
          '    <class-name>gsn.processor.ScriptletProcessor</class-name>'. "\n" .
          '    <init-params>'. "\n" .
          '      <param name="persistant">false</param>'. "\n" .
          '      <param name="notification-state">0</param>'. "\n" .
          '      <param name="scriptlet"><![CDATA['. "\n" .
          '                    //this is a start of a scriptlet'. "\n" .
          '                    //data definition'. "\n" .
          ''. "\n" .                                                
          '                    def delay = ' . $resendingInterval . '; //time in miliseconds between resending emails'. "\n" .
          '                    def filePath ="virtual-sensors/' . $notificationVSName . '.xml";'. "\n" .
          '                    def recipients = [' . $recipients . ']; // Define one or more recipients'. "\n" .
          '                    def criticalValue = ' . $criticalValue . ';'. "\n" .
          '                    def measuringUnit = "' . $measuringUnit . '";'. "\n" .
          ''. "\n" .                    
          ''. "\n" .                    
          '                    def state = notificationState; //notification state variable is defined in scriptlet from init-params'. "\n" .
          '                    def nodePath ="streams/stream/query";'. "\n" .
          '                    def EmailTitle ="";'. "\n" .
          '                    def emailContent="";'. "\n" .
          '                    def newQuery=""; '. "\n" .
          ' '. "\n" .                   
          '                    //end of data definition'. "\n" .
          ' '. "\n" .                      
          '                    switch(state){'. "\n" .
          ' '. "\n" .                         
          '                          case 0: def delayTime = TIMED + delay;'. "\n" .
          '                                  newQuery = "select "+measuringUnit+", timed from source1 where (("+measuringUnit+">"+criticalValue+") and (timed >" + delayTime + ")) or ("+measuringUnit+"<="+criticalValue+")";'. "\n" .
          '                                  emailTitle = "Warning!";'. "\n" .
          '                                  emailContent = "Dear ' . $display_name . ',\n"+measuringUnit+" measured on ' . $sensorName . ' rised over "+criticalValue+".\nLast measured value is " + ' . $measuringUnitUPP . ' + "!\n\n ' . $sensorInformation . '";'. "\n" .
          '                                  state++;'. "\n" .
          '                                  break;'. "\n" .
          ''. "\n" .                                
          '                          case 1: if (' . $measuringUnitUPP . '>criticalValue){'. "\n" .
          '                                          def delayTime = TIMED + delay;'. "\n" .
          '                                          newQuery = "select "+measuringUnit+", timed from source1 where (("+measuringUnit+">"+criticalValue+") and (timed >" + delayTime + ")) or ("+measuringUnit+"<="+criticalValue+")";'. "\n" .
          '                                          emailTitle = "Warning again";'. "\n" .
          '                                          emailContent = "Dear ' . $display_name . ',\n"+measuringUnit+" measured on ' . $sensorName . ' still over "+criticalValue+".\nMeasured value is " + ' . $measuringUnitUPP . ' + ".\nDo something!\n\n ' . $sensorInformation . '";'. "\n" .
          '                                  }'. "\n" .
          '                                  else{'. "\n" .
          '                                       newQuery = "select "+measuringUnit+", timed from source1 where "+measuringUnit+">"+criticalValue;'. "\n" .
          '                                       emailTitle = "Everything OK";'. "\n" .
          '                                       emailContent = "Dear ' . $display_name . ',\n"+measuringUnit+" measured on ' . $sensorName . ' dropped under "+criticalValue+".\nMeasured value is " + ' . $measuringUnitUPP . ' + "!!!\nSensor readings are ok.\n\n ' . $sensorInformation . '";'. "\n" .
          '                                       state=0;'. "\n" .
          ''. "\n" .                           
          '                                  }'. "\n" .
          '                                  break;'. "\n" .
          '                    }'. "\n" .
          ''. "\n" .               
          '                    sendEmail(recipients, emailTitle, emailContent);'. "\n" .
          '                    updateNotificationVSXML(filePath,nodePath,newQuery,state);]]></param>' . "\n" .
          '    </init-params>' . "\n" .
          '    <output-structure />' . "\n" .
          '  </processing-class>' . "\n" .
          '  <description>Automatic notification VS (type 2) for sensor ' . $sensorName . ' and user ' . $userName . '. Triggered on greater then critical value.</description>' . "\n" .
          '  <addressing />' . "\n" .
          '  <storage history-size="1" />' . "\n" .
          '  <streams>' . "\n" .
          '    <stream name="stream1">' . "\n" .
          '      <source alias="source1" storage-size="1" sampling-rate="1">' . "\n" .
          '        <address wrapper="local">' . "\n" .
          '          <predicate key="query">select * from ' . $sensorName . '</predicate>' . "\n" .
          '        </address>' . "\n" .
          '        <query>select * from wrapper</query>' . "\n" .
          '      </source>' . "\n" .
          '      <query>select ' . $measuringUnit . ', timed from source1 where ' . $measuringUnit . '&gt;' . $criticalValue . '</query>' . "\n" .
          '    </stream>' . "\n" .
          '  </streams>*/' . "\n" .
          '</virtual-sensor>';
return $xml;
}


function sms_xml_file_less($input = array(),  $sensordata)
{
 
  $userName = $input['userName'];
  $sensorName = $input['sensorName'];
  $notificationVSName = "N_" . $userName . "_" . $sensorName ."3_".strtotime(date('m/d/Y h:i:s a', time()));
  $measuringUnit = $input['measuringUnit'];
  $criticalValue = $input['criticalValue']; 
  $resendingInterval = $input['resendingInterval']; 
  $recipients = "'".$input['recipients']."'";
  $measuringUnitUPP = strtoupper($measuringUnit);
  //$sensorInformation = "Sensor 3 @ TestPolygon";
 $sensorInformation = "Sensor @ ".$sensordata[0]->gsnName." - ".$sensordata[0]->city. " ".
                       $sensordata[0]->state.", latitude ".$sensordata[0]->location_y.
                             ", longitude ".$sensordata[0]->location_x;
 
	  $xml= '<?xml version="1.0" encoding="UTF-8"?>' . "\n". 
          '<virtual-sensor name="' . $notificationVSName . '" priority="10">'. "\n" .
          '  <processing-class>'. "\n" .
          '    <class-name>gsn.processor.ScriptletProcessor</class-name>'. "\n" .
          '    <init-params>'. "\n" .
          '      <param name="persistant">false</param>'. "\n" .
          '      <param name="notification-state">0</param>'. "\n" .
          '      <param name="scriptlet"><![CDATA['. "\n" .
          '                    //this is a start of a scriptlet'. "\n" .
          '                    //data definition'. "\n" .
          ''. "\n" .                                                
          '                    def delay = ' . $resendingInterval . '; //time in miliseconds between resending SMS'. "\n" .
          '                    def filePath ="virtual-sensors/' . $notificationVSName . '.xml";'. "\n" .
          '                    def recipients = [' . $recipients . ']; // Define one or more recipients'. "\n" .
          '                    def criticalValue = ' . $criticalValue . ';'. "\n" .
          '                    def measuringUnit = "' . $measuringUnit . '";'. "\n" .
          ''. "\n" .                    
          ''. "\n" .                    
          '                    def state = notificationState; //notification state variable is defined in scriptlet from init-params'. "\n" .
          '                    def nodePath ="streams/stream/query";'. "\n" .
          '                    def emailContent="";'. "\n" .
          '                    def newQuery=""; '. "\n" .
          ' '. "\n" .                   
          '                    //end of data definition'. "\n" .
          ' '. "\n" .                      
          '                    switch(state){'. "\n" .
          ' '. "\n" .                         
          '                          case 0: def delayTime = TIMED + delay;'. "\n" .
          '                                  newQuery = "select "+measuringUnit+", timed from source1 where (("+measuringUnit+"<"+criticalValue+") and (timed >" + delayTime + ")) or ("+measuringUnit+">="+criticalValue+")";'. "\n" .
          '                                  emailContent = "Warning! Measured "+measuringUnit+" dropped under "+criticalValue+".\nLast measured value: " + ' . $measuringUnitUPP . ' + "\n ' . $sensorInformation . '\nColdWatch";'. "\n" .
          '                                  state++;'. "\n" .
          '                                  break;'. "\n" .
          ''. "\n" .                                
          '                          case 1: if (' . $measuringUnitUPP . '<criticalValue){'. "\n" .
          '                                          def delayTime = TIMED + delay;'. "\n" .
          '                                          newQuery = "select "+measuringUnit+", timed from source1 where (("+measuringUnit+"<"+criticalValue+") and (timed >" + delayTime + ")) or ("+measuringUnit+">="+criticalValue+")";'. "\n" .
          '                                          emailContent = "Warning! Measured "+measuringUnit+" still under "+criticalValue+".\nMeasured value: " + ' . $measuringUnitUPP . ' + ".\n ' . $sensorInformation . '\nColdWatch";'. "\n" .
          '                                  }'. "\n" .
          '                                  else{'. "\n" .
          '                                       newQuery = "select "+measuringUnit+", timed from source1 where "+measuringUnit+"<"+criticalValue;'. "\n" .
          '                                       emailContent = "Everything OK! Measured "+measuringUnit+" rised over "+criticalValue+".\nMeasured value: " + ' . $measuringUnitUPP . ' + ". Sensor readings OK!\n ' . $sensorInformation . '\nColdWatch";'. "\n" .
          '                                       state=0;'. "\n" .
          ''. "\n" .                           
          '                                  }'. "\n" .
          '                                  break;'. "\n" .
          '                    }'. "\n" .
          ''. "\n" .               
          '                    sendSMS(recipients, emailContent);'. "\n" .
          '                    updateNotificationVSXML(filePath,nodePath,newQuery,state);]]></param>' . "\n" .
          '    </init-params>' . "\n" .
          '    <output-structure />' . "\n" .
          '  </processing-class>' . "\n" .
          '  <description>Automatic notification VS (type 3) for sensor ' . $sensorName . ' and user ' . $userName . '. Triggered on less then critical value.</description>' . "\n" .
          '  <addressing />' . "\n" .
          '  <storage history-size="1" />' . "\n" .
          '  <streams>' . "\n" .
          '    <stream name="stream1">' . "\n" .
          '      <source alias="source1" storage-size="1" sampling-rate="1">' . "\n" .
          '        <address wrapper="local">' . "\n" .
          '          <predicate key="query">select * from ' . $sensorName . '</predicate>' . "\n" .
          '        </address>' . "\n" .
          '        <query>select * from wrapper</query>' . "\n" .
          '      </source>' . "\n" .
          '      <query>select ' . $measuringUnit . ', timed from source1 where ' . $measuringUnit . '&lt;' . $criticalValue . '</query>' . "\n" .
          '    </stream>' . "\n" .
          '  </streams>*/' . "\n" .
          '</virtual-sensor>';
return $xml;
}


function sms_xml_file_greater($input = array(),  $sensordata)
{
 
  $userName = $input['userName'];
  $sensorName = $input['sensorName'];
  $notificationVSName = "N_" . $userName . "_" . $sensorName ."4_".strtotime(date('m/d/Y h:i:s a', time()));
  $measuringUnit = $input['measuringUnit'];
  $criticalValue = $input['criticalValue']; 
  $resendingInterval = $input['resendingInterval']; 
  $recipients = "'".$input['recipients']."'";
  $measuringUnitUPP = strtoupper($measuringUnit);
  //$sensorInformation = "Sensor 3 @ TestPolygon";
  $sensorInformation = "Sensor @ ".$sensordata[0]->gsnName." - ".$sensordata[0]->city. " ".
                       $sensordata[0]->state.", latitude ".$sensordata[0]->location_y.
                             ", longitude ".$sensordata[0]->location_x;
 
	  $xml= '<?xml version="1.0" encoding="UTF-8"?>' . "\n". 
          '<virtual-sensor name="' . $notificationVSName . '" priority="10">'. "\n" .
          '  <processing-class>'. "\n" .
          '    <class-name>gsn.processor.ScriptletProcessor</class-name>'. "\n" .
          '    <init-params>'. "\n" .
          '      <param name="persistant">false</param>'. "\n" .
          '      <param name="notification-state">0</param>'. "\n" .
          '      <param name="scriptlet"><![CDATA['. "\n" .
          '                    //this is a start of a scriptlet'. "\n" .
          '                    //data definition'. "\n" .
          ''. "\n" .                                                
          '                    def delay = ' . $resendingInterval . '; //time in miliseconds between resending SMS'. "\n" .
          '                    def filePath ="virtual-sensors/' . $notificationVSName . '.xml";'. "\n" .
          '                    def recipients = [' . $recipients . ']; // Define one or more recipients'. "\n" .
          '                    def criticalValue = ' . $criticalValue . ';'. "\n" .
          '                    def measuringUnit = "' . $measuringUnit . '";'. "\n" .
          ''. "\n" .                    
          ''. "\n" .                    
          '                    def state = notificationState; //notification state variable is defined in scriptlet from init-params'. "\n" .
          '                    def nodePath ="streams/stream/query";'. "\n" .
          '                    def emailContent="";'. "\n" .
          '                    def newQuery=""; '. "\n" .
          ' '. "\n" .                   
          '                    //end of data definition'. "\n" .
          ' '. "\n" .                      
          '                    switch(state){'. "\n" .
          ' '. "\n" .                         
          '                          case 0: def delayTime = TIMED + delay;'. "\n" .
          '                                  newQuery = "select "+measuringUnit+", timed from source1 where (("+measuringUnit+">"+criticalValue+") and (timed >" + delayTime + ")) or ("+measuringUnit+"<="+criticalValue+")";'. "\n" .
          '                                  emailContent = "Warning! Measured "+measuringUnit+" rised over "+criticalValue+".\nLast measured value: " + ' . $measuringUnitUPP . ' + "\n ' . $sensorInformation . '\nColdWatch";'. "\n" .
          '                                  state++;'. "\n" .
          '                                  break;'. "\n" .
          ''. "\n" .                                
          '                          case 1: if (' . $measuringUnitUPP . '>criticalValue){'. "\n" .
          '                                          def delayTime = TIMED + delay;'. "\n" .
          '                                          newQuery = "select "+measuringUnit+", timed from source1 where (("+measuringUnit+">"+criticalValue+") and (timed >" + delayTime + ")) or ("+measuringUnit+"<="+criticalValue+")";'. "\n" .
          '                                          emailContent = "Warning! Measured "+measuringUnit+" still over "+criticalValue+".\nMeasured value: " + ' . $measuringUnitUPP . ' + ".\n ' . $sensorInformation . '\nColdWatch";'. "\n" .
          '                                  }'. "\n" .
          '                                  else{'. "\n" .
          '                                       newQuery = "select "+measuringUnit+", timed from source1 where "+measuringUnit+">"+criticalValue;'. "\n" .
          '                                       emailContent = "Everything OK! Measured "+measuringUnit+" dropped under "+criticalValue+".\nMeasured value: " + ' . $measuringUnitUPP . ' + ". Sensor readings OK!\n ' . $sensorInformation . '\nColdWatch";'. "\n" .
          '                                       state=0;'. "\n" .
          ''. "\n" .                           
          '                                  }'. "\n" .
          '                                  break;'. "\n" .
          '                    }'. "\n" .
          ''. "\n" .               
          '                    sendSMS(recipients, emailContent);'. "\n" .
          '                    updateNotificationVSXML(filePath,nodePath,newQuery,state);]]></param>' . "\n" .
          '    </init-params>' . "\n" .
          '    <output-structure />' . "\n" .
          '  </processing-class>' . "\n" .
          '  <description>Automatic notification VS (type 4) for sensor ' . $sensorName . ' and user ' . $userName . '. Triggered on greater than critical value.</description>' . "\n" .
          '  <addressing />' . "\n" .
          '  <storage history-size="1" />' . "\n" .
          '  <streams>' . "\n" .
          '    <stream name="stream1">' . "\n" .
          '      <source alias="source1" storage-size="1" sampling-rate="1">' . "\n" .
          '        <address wrapper="local">' . "\n" .
          '          <predicate key="query">select * from ' . $sensorName . '</predicate>' . "\n" .
          '        </address>' . "\n" .
          '        <query>select * from wrapper</query>' . "\n" .
          '      </source>' . "\n" .
          '      <query>select ' . $measuringUnit . ', timed from source1 where ' . $measuringUnit . '&gt;' . $criticalValue . '</query>' . "\n" .
          '    </stream>' . "\n" .
          '  </streams>*/' . "\n" .
          '</virtual-sensor>';
return $xml;
}

