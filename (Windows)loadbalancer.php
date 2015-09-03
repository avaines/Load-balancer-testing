<html>
<head>
<TITLE>Using virtual server <?php echo $_SERVER['HTTP_HOST']; ?> and pool member <?php echo $_SERVER['SERVER_ADDR']; ?> (Node #1)</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
 <script language="javascript">
  function showCookieLink() {
    var ele = document.getElementById("CookieLink");
    ele.style.display = "block";
  }
 </script>

<meta http-equiv="pragma" content="no-cache" />
<script language="JavaScript" type="text/javascript">
<!--
function loadInfo() {
        var http;
        if(window.ActiveXObject){
                http = new ActiveXObject("Microsoft.XMLHTTP");
        }else if(window.XMLHttpRequest){
                http = new XMLHttpRequest();
        }
        // display headers of current document:
        http.open('HEAD', location.href, false);
        http.send();

        var hstring = '<p><font face=Arial size=2 color=black>';
        var headerarray = http.getAllResponseHeaders().split("\n");
        for(i = 0; i < headerarray.length; i++){
           hstring = hstring+"-&nbsp;"+headerarray[i]+"<br>";
        }
        hstring = hstring+'</p>';
        var rhdiv = document.getElementById('responseheaders');
        rhdiv.innerHTML = hstring;
}

</script>


</head>
<body onload='loadInfo()'>

<?php
$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

#call the url with http://127.0.0.1/?return=script
#where var is: 	vserver, for the virtual server address)
#				pmbr, for pool member
#				cli, for client IP
#				xfwd, for x-forward IP


switch($_GET['return']){
	case "script":     
		echo "STARTVSERVER".$protocol."//".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]."ENDVSERVER<br>";
		echo "STARTPOOLMBR".$_SERVER['LOCAL_ADDR'].":".$_SERVER['SERVER_PORT']."ENDPOOLMBR<br>";
		echo "STARTCLIIP".$_SERVER['REMOTE_ADDR'].":".$_SERVER['REMOTE_PORT']."ENDCLIIP<br>";
		echo "STARTXFWD".$_SERVER['HTTP_X_FORWARDED_FOR'].":".$_SERVER['REMOTE_PORT']."ENDXFWD<br>";
		break;		
	default:
		echo "<h2><font face=Arial>Request Details</font></h2>";
		echo "<b>Virtual server address:</b> " .$protocol."//".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]."<br>";
		echo "<b>Pool member address/port:</b> " .$_SERVER['LOCAL_ADDR'].":".$_SERVER['SERVER_PORT']."<br>";
		echo "<b>Client IP address/port:</b> ".$_SERVER['REMOTE_ADDR'].":".$_SERVER['REMOTE_PORT']."<br>";
		echo "<b>Client X-Forward IP address/port:</b> ".$_SERVER['HTTP_X_FORWARDED_FOR'].":".$_SERVER['REMOTE_PORT']."<br>";
		break;
    } 
?>

</body>
</html>
