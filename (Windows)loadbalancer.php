<html>
<head>
<TITLE>Using virtual server <?php echo $_SERVER['HTTP_HOST']; ?> and pool member <?php                                                                                                       echo $_SERVER['SERVER_ADDR']; ?> (Node #1)</TITLE>
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

<BODY>


<h2><font face=Arial>Request Details</font></h2>
<font face=Arial>Virtual server address:</font>&nbsp;<font face=Arial size=4><? echo $_SERVER['HTTP_HOST']; ?></font><br>
<font face=Arial>Pool member address/port:</font>&nbsp;<font face=Arial size=4 color="003399"><b><?php echo $_SERVER['LOCAL_ADDR']; ?>:<?php echo $_SERVER['SERVER_PORT']; ?></b></font><br>
<?php 
echo "Client IP address/port: ".$_SERVER['REMOTE_ADDR'].":".$_SERVER['REMOTE_PORT']."<br>";
echo "Client X-Forward IP address/port: ".$_SERVER['HTTP_X_FORWARDED_FOR'].":".$_SERVER['REMOTE_PORT']."<br>";
echo "Requested URI: ".$_SERVER['REQUEST_URI']." </font><br>&nbsp;</p>";
?>

</body>
</html>
