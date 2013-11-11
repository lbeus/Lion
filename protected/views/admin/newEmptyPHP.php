
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="/lion/css/tableDesign.css" />
        <link rel="stylesheet" type="text/css" href="/lion/css/form.css" />
        <link href="http://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet" type="text/css" />
        <link href="/lion/css/default.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="/lion/css/incrementButton.css" />

<!--        <script type="text/javascript" src="/protected/javascript/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="/protected/javascript/jquery.dropotron-1.0.js"></script>
        <script type="text/javascript" src="/protected/javascript/init.js"></script>-->
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
	<script type="text/javascript" src="/lion/protected/javascripts/incrementing.js"></script>
	<script type="text/javascript" src="/lion/protected/javascripts/refreshing_table.js"></script>
        <script language="JavaScript">
            function reload(form){
                var not_type="not_selected";

                var radioButtons = document.getElementsByName('UserNotifications[notification_type]');

                not_type = radioButtons.length;

                for (var x = 0; x < radioButtons.length; x ++) {

                    if (radioButtons[x].type=='radio' && radioButtons[x].checked) {
                        not_type=radioButtons[x].value;
                    }
                }

                self.location = '/lion/index.php/user/userNotifications?notification_type=' + not_type;
            }
	    function reloadWatchdog(form){
                var not_type="not_selected";

                var radioButtons = document.getElementsByName('UserWatchdogTimer[watchdog_type]');

                not_type = radioButtons.length;

                for (var x = 0; x < radioButtons.length; x ++) {

                    if (radioButtons[x].type=='radio' && radioButtons[x].checked) {
                        not_type=radioButtons[x].value;
                    }
                }

                self.location = '/lion/index.php/user/userWatchdogTimer?watchdog_type=' + not_type;
            }
        </script>
	<script type="text/javascript">
	    var auto_refresh = setInterval(
	    function ()
	    {
	    $('#managing').load('http://161.53.67.224/lion/index.php/systemManaging/managingLiveStream').fadeIn("slow");
	    }, 3000); // refresh every 10000 milliseconds

	    $(function() {
		if($("#user_notifications_notification_type_0").is(":checked")){
		    $('#phone').hide();
		    $('#email').hide();
		}else{
		    $('#email').hide();
		    $('#phone').hide();
		}

		$("[name='UserNotifications[notification_type]']").change(function(){
		    if($(this).val()=="1"){
			$('#phone').hide();
			$('#email').show();
		    }else {
			$('#email').hide();
			$('#phone').show();
		    }

		})
	    });
	</script>
        <link rel="stylesheet" type="text/css" href="/lion/assets/24aa60b0/assets/seqimage.css" />
<script type="text/javascript" src="/lion/assets/b5a08fcd/jquery.js"></script>
<title>Lion - GSN managing</title>
    </head>
    <body>
	<div id="header-wrapper">
	    <div id="header">
		<div id="logo">
		    <h1><a href="#">Lion</a></h1>
		    <p>Welcome Luka Postružin</p>
		</div>
	    </div>
	</div>
	<div id="menu-wrapper">
	    <div id="menu-content">
		<ul id="menu">
		    			<li ><a href="/lion/index.php/site/index"><span>Home</span></a></li>
			<li ><a href="/lion/index.php/user/userGsnList"><span>GSN</span></a></li>
			<li ><a href="/lion/index.php/user/userSensors"><span>Sensors</span></a></li>
			<li ><a href="/lion/index.php/user/userNotifications"><span>Notifications</span></a></li>
			<li class="first"><a href="/lion/index.php/systemManaging/heatingControl"><span>System</span></a></li>
			<li ><a href="/lion/index.php/user/userWatchdogTimer"><span>Watchdog</span></a></li>
			<li ><a href="/lion/index.php/reportSubscription/userReportsMain"><span>Reports</span></a></li>
			<li ><a href="/lion/index.php/graphs/graphs"><span>Graphs</span></a></li>
			<li ><a href="/lion/index.php/site/contact"><span>Contact</span></a></li>
			<li ><a href="/lion/index.php/site/logout"><span>Logout</span></a></li>
						    <li><a href="/lion/index.php/admin/index"><span>Admin</span></a></li>
					    		</ul>
	    </div>
	</div>
	<div id="banner-wrapper">
	    <div id="banner">
		<div class="image">
		<div class="nbanner" style="width:900px;"><ul class="slides" style="height:257px;"><li id="image0" class="slide" style="visibility:visible; "><a href="index.php/site/index"><img width="900" height="257" src="/lion/images/presentation_1.png" alt="noimage" /></a></li><li id="image1" class="slide" style=""><img width="900" height="257" src="/lion/images/presentation_2.png" alt="noimage" /></li><li id="image2" class="slide" style=""><img width="900" height="257" src="/lion/images/presentation_3.png" alt="noimage" /></li></ul><ul class="buttons" style="margin: 5px 0 5px 0; float: right; "><li id="button0" class="active">0</li><li id="button1" class="">1</li><li id="button2" class="">2</li></ul><div class="cclear"></div></div>		</div>
		<div class="border">
		</div>
	    </div>
	</div>
	<div id="page">
	    <div class="bgtop"></div>
	    <div class="content-bg">
		<div id="content">

<div class="post">
    <p class="date">May<b>20</b></p>
    <h2 class="title">System managing</h2>
    <p class="posted">Lion development team</p>
    <div class="entry">
	<p>Please choose one of the GSN servers below in order to show all the possibilities in passive heating control system.</p>
		<div class="form">
	    <form id="gsn_system_managing-form" action="/lion/index.php/systemManaging/heatingControl" method="post">	    <div class="row">
		<label for="GsnSystemManaging_GSN server">Gsn Server</label>		<select name="GsnSystemManaging[gsn_id]" id="GsnSystemManaging_gsn_id">
<option value="">Select</option>
<option value="2" selected="selected">ColdWatch - GSN Server</option>
<option value="5">GSN Lenovo</option>
</select>
			    </div>
	    </form>    	    <div id="system_control">
    		<div id="managing">
		    <br/><div style="border-top-style:solid;"><h3><b>Live data overview</b></h3><br/>This is a list of currently active sensors that are taken into consideration when managing this system. If there are no sensors presented, please contact us as soon as possible as this can go on as a potential error.<br/><br/><div class="">hygrometerexternal, last reading: 20/05/2012 17:32:07 +0200<br/>&nbsp&nbsp&nbsphumidity: 59.57480837845208<br/></div><div class="">termometerhygrometermotetube, last reading: 20/05/2012 18:42:18 +0200<br/>&nbsp&nbsp&nbsptemperature: 15<br/>&nbsp&nbsp&nbsphumidity: 60.33400847589113<br/></div><div class="">coldwatchcore, last reading: 20/05/2012 18:42:39 +0200<br/>&nbsp&nbsp&nbspventilator: 0<br/>&nbsp&nbsp&nbspheater: 0<br/></div><div class="">termometarunutarnji1, last reading: 20/05/2012 18:42:54 +0200<br/>&nbsp&nbsp&nbsptemperature: 10<br/></div><div class="">rabbitrasip, last reading: 20/05/2012 18:43:05 +0200<br/>&nbsp&nbsp&nbsptemperature: 26<br/></div><div class="">termometarvanjski, last reading: 20/05/2012 18:42:54 +0200<br/>&nbsp&nbsp&nbsptemperature: -10<br/></div><div class="">yahooweathervasteras, last reading: 20/05/2012 18:39:18 +0200<br/>&nbsp&nbsp&nbsptemperature: 21<br/>&nbsp&nbsp&nbsphumidity: 40<br/></div><div class="">yahooweatherzagreb, last reading: 20/05/2012 18:39:18 +0200<br/>&nbsp&nbsp&nbsptemperature: 25<br/>&nbsp&nbsp&nbsphumidity: 41<br/></div><div class="">termometerinternal, last reading: 20/05/2012 18:42:18 +0200<br/>&nbsp&nbsp&nbsptemperature: 14<br/></div><div class="">temperaturekeyboardvs, last reading: 20/05/2012 18:32:10 +0200<br/>&nbsp&nbsp&nbsptemperature: 23<br/></div><div class="">termometerexternal, last reading: 20/05/2012 18:43:02 +0200<br/>&nbsp&nbsp&nbsptemperature: null<br/></div></div>		</div>
		<br/><div id="control_form" class="control_form">
		    <div style="border-top-style:solid;"><h3><b>System state managment</b></h3><br/><form method="post" action="managingManualControl">Auto-control is currently active!<br/><br/>To take control, simply set the following parameters as you wish and submit your choice. Auto control will automatically be stoped.<br/><div class="control_subsystem"><label class="label_inline" for="name">Fan power: </label><input type="text" name="manual_fan" id="manual_fan" value="3" readonly/><div class="inc button">+</div><div class="dec button">-</div></div><p>Heater status: <input type="radio" name="manual_heater" value="1" checked/>On<input type="radio" name="manual_heater" value="0"/>Off</p><input type="hidden" name="gsn_id" value="2"/><input name="save" type="submit" value="Save configuration" /></form><br/>
			<div style="border-top-style:solid;"><h3><b>Configuration file for auto control</b></h3><br/>Below is a detailed overview on configuration file for auto control on temperature measured on GSN server. This system is specified for research purposes and should be used as such.<br/><form method="post" action="managingConfigFile"><table id="ver-minimalist" summary="Above is the managment system for chosen GSN"><tfoot>
		<td colspan='3'><em>Above is the managment system for chosen GSN</em></td>
		</tfoot><tbody><tr>
		<td style="color:black; font-weight:bold; width:160px;">Temperature states (change according to your needs)</td>
		<td><div class="roundedBox" id="type1"><div class="control_subsystem"><label for="name">External temperature limit<br/></label> <input type="text" name="external_temp_limit" id="external_temp_limit" value="2" readonly/><div class="inc button_temp">+</div><div class="dec button_temp">-</div></div><div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div></div></td>
		<td></td>
	      </tr><tr>
		<td><div class="roundedBox" id="type1"><div class="control_subsystem"><label for="name">Internal temperature limit 1<br/></label> <input type="text" name="internal_temp_limit1" id="internal_temp_limit1" value="8" readonly/><div class="inc button_temp">+</div><div class="dec button_temp">-</div></div><div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div></div></td>
		<td><div class="roundedBox" id="type2"><b>STATE 2</b><div class="control_subsystem"><label for="name">Fan: </label> <input type="text" name="fan_2" id="fan_2" value="0" readonly/><div class="inc button">+</div><div class="dec button">-</div></div>Heater: <input type="radio" name="heater_2" value="1" />On<input type="radio" name="heater_2" value="0" checked/>Off<div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div></div></td>
		<td rowspan='4'><div class="roundedBox" id="type2"><b>STATE 1</b><br/><div class="control_subsystem"><label for="name">Fan: </label> <input type="text" name="fan_1" id="fan_2" value="0" readonly/><div class="inc button">+</div><div class="dec button">-</div></div>Heater: <input type="radio" name="heater_1" value="1" />On<input type="radio" name="heater_1" value="0" checked/>Off<div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div></div></td>
	      </tr><tr>
		<td><div class="roundedBox" id="type1"><div class="control_subsystem"><label for="name">Internal temperature limit 2<br/></label> <input type="text" name="internal_temp_limit2" id="internal_temp_limit2" value="2" readonly/><div class="inc button_temp">+</div><div class="dec button_temp">-</div></div><div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div></div></td>
		<td><div class="roundedBox" id="type2"><b>STATE 3</b><div class="control_subsystem"><label for="name">Fan: </label> <input type="text" name="fan_3" id="fan_3" value="1" readonly/><div class="inc button">+</div><div class="dec button">-</div></div>Heater: <input type="radio" name="heater_3" value="1" />On<input type="radio" name="heater_3" value="0" checked/>Off<div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div></div></td>
		<td></td>
	      </tr><tr>
		<td><div class="roundedBox" id="type1"><div class="control_subsystem"><label for="name">Internal temperature limit 3<br/></label> <input type="text" name="internal_temp_limit3" id="internal_temp_limit3" value="-2" readonly/><div class="inc button_temp">+</div><div class="dec button_temp">-</div></div><div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div></div></td>
		<td><div class="roundedBox" id="type2"><b>STATE 4</b><div class="control_subsystem"><label for="name">Fan: </label> <input type="text" name="fan_4" id="fan_4" value="5" readonly/><div class="inc button">+</div><div class="dec button">-</div></div>Heater: <input type="radio" name="heater_4" value="1" />On<input type="radio" name="heater_4" value="0" checked/>Off<div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div></div></td>
		<td></td>
	      </tr><tr>
		<td></td>
		<td><div class="roundedBox" id="type2"><b>STATE 5</b><div class="control_subsystem"><label for="name">Fan: </label> <input type="text" name="fan_5" id="fan_5" value="5" readonly/><div class="inc button">+</div><div class="dec button">-</div></div>Heater: <input type="radio" name="heater_5" value="1" checked/>On<input type="radio" name="heater_5" value="0"/>Off<div class="corner topLeft"></div><div class="corner topRight"></div><div class="corner bottomLeft"></div><div class="corner bottomRight"></div></div></td>
		<td></td>
	      </tr></tbody></table><input type="hidden" name="rabbit_ip" value="192.168.1.90"/><input type="hidden" name="free_server_port" value="23625"/><input type="hidden" name="auto_control" value="1"/><input type="hidden" name="manual_fan" value="3"/><input type="hidden" name="manual_heater" value="1"/><input type="hidden" name="gsn_id" value="2"/><input type="hidden" name="recipients_emails" value=""/><br/>Current recipients: <br/><br/><input type="button" id="refresh_table_button" name="refresh" value="Refresh"/><input type="submit" name="yt0" value="Save changes" /></form>
			</div>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</div>

	    	    <div id="sidebar">
		<div>
		    <h2 class="title">About Lion</h2>
		    <p>Lion is a project developed under Faculty of Electrical Engineering and Computing. It collects data from all around the world and provides user interface for managing all data sources and actions.</p>
		</div>
		<div>
		    <h2 class="title">Lion team</h2>
		    <p>Lion was developed by students<br/><br/>Matija Renić<br/>Luka Postružin<br/><br/>under supervision of dr.sc.Mario Žagar</p>
		</div>
	    </div>
	    	</div>
	<div class="bgbtm"></div>
	</div>
	<div id="footer-content">
	    <div class="bgtop"></div>
	    <div class="content-bg">
		<div id="column1">
		    <div class="box1">
			<h2>What is GSN?</h2>
			<p><a href ="http://sourceforge.net/apps/trac/gsn/">GSN</a> stands for Global sensor networks project. Basically it is a web server that collects various data from multiple sources.</p>
		    </div>
		    <div class="box2">
			<h2>What is RASIP?</h2>
			<p><a href ="http://www.fer.unizg.hr/rasip/onama">RASIP</a> is a department on FER. It holds many open source courses and  a course about distributed software development.</p>
		    </div>
		</div>
		<div id="column2">
		    <div class="box3">
			<h2>What is FER?</h2>
			<p><a href ="http://www.fer.unizg.hr">FER</a> is a faculty from Zagreb, Croatia. It is a part of University of Zagreb.</p>
		    </div>
		</div>
	    </div>
	    <div class="bgbtm"></div>
	</div>
        <div id="footer">
            <p>Copyright &copy; 2012 by FER, University of Zagreb.</p>
            <p>All Rights Reserved.</p>
        </div><!-- footer -->
    <script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
$('body').on('change','#GsnSystemManaging_gsn_id',function(){jQuery.ajax({'type':'POST','url':'/lion/index.php/systemManaging/managingPartialView','cache':false,'data':jQuery(this).parents("form").serialize(),'success':function(html){jQuery("#system_control").html(html)}});return false;});
var timer;
                function OnLoad(event){
                    clearTimeout(timer);
                    timer = setTimeout(eval("button1_click"),"5000");
                }
                function button0_click(event){
                $(".slide").css("visibility","hidden");
                $("#image0").css("visibility","visible");
                $("#image0").css("opacity","0");
                $("#image0").animate({"opacity":1},300, "linear", null);
                $("ul.buttons li").removeClass("active");
                $("#image0").animate({"opacity":1},300, "linear", null);
                $("#button0").addClass("active");
                clearTimeout(timer);
                timer = setTimeout(eval("button1_click"),"5000");
                $("#image0").animate({"opacity":1},300, "linear", null); } function button1_click(event){
                $(".slide").css("visibility","hidden");
                $("#image1").css("visibility","visible");
                $("#image1").css("opacity","0");
                $("#image1").animate({"opacity":1},300, "linear", null);
                $("ul.buttons li").removeClass("active");
                $("#image1").animate({"opacity":1},300, "linear", null);
                $("#button1").addClass("active");
                clearTimeout(timer);
                timer = setTimeout(eval("button2_click"),"5000");
                $("#image1").animate({"opacity":1},300, "linear", null); } function button2_click(event){
                $(".slide").css("visibility","hidden");
                $("#image2").css("visibility","visible");
                $("#image2").css("opacity","0");
                $("#image2").animate({"opacity":1},300, "linear", null);
                $("ul.buttons li").removeClass("active");
                $("#image2").animate({"opacity":1},300, "linear", null);
                $("#button2").addClass("active");
                clearTimeout(timer);
                timer = setTimeout(eval("button0_click"),"5000");
                $("#image2").animate({"opacity":1},300, "linear", null); }   $("#button0").bind("click", button0_click); $("#button1").bind("click", button1_click); $("#button2").bind("click", button2_click);
                OnLoad();
});
/*]]>*/
</script>
</body>
</html>
