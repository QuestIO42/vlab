<!DOCTYPE html>
<html>
    <head>
        <title>Lab. Remoto de L&oacute;gica Digital - DC/UFSCar</title>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-2YFMTLKN4V"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-2YFMTLKN4V');
        </script>

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <script type="text/javascript" src="sendContent.js"></script>
        <style>body {background-color: #e0e0e0; color: #2b3856;}</style>
        <head>
        <script src="skins/default.js" type="text/javascript"></script>
        <script src="wavedrom.min.js" type="text/javascript"></script>
</head>

        <script>
function save() {
    savefiles(editor);
}
function changeSrc(loc) {
	//document.getElementById('iframeId').save();
    document.getElementById('iframeId').src = loc;
}
if (typeof XMLHttpRequest === "undefined") {
    XMLHttpRequest = function () {
        try { return new ActiveXObject("Msxml2.XMLHTTP.6.0"); }
        catch (e) {}
        try { return new ActiveXObject("Msxml2.XMLHTTP.3.0"); }
        catch (e) {}
        try { return new ActiveXObject("Microsoft.XMLHTTP"); }
        catch (e) {}
        throw new Error("This browser does not support XMLHttpRequest.");
    };
}

function loadExample(file) {
    function reqListener () {
        editor.getDoc().setValue(this.responseText);
    }
    var filePath = "https://legacy.vlab.dc.ufscar.br/verilog/" + file + ".txt";
    var oReq = new XMLHttpRequest();
    oReq.onload = reqListener;
    oReq.open("get", filePath, true);
    oReq.send();
}
        </script>
    </head>
    <body>
        <center>
            <h1>Lab. Remoto de L&oacute;gica Digital - DC/UFSCar</h1>
        </center>
        <button id="save" onclick="savefiles(editor);changeSrc('simulate.php')">Simulate</button>
        Exemplos:
        <button onclick="loadExample('basic');">Basic</button>
        <button onclick="loadExample('counter');">Counter</button> 
        <p>
            <textarea id=editor name=code rows=22>
<?php readfile("basic.v.original"); ?>
            </textarea>
        </p>
        <link rel="stylesheet" href="../../codemirror-5.58.1/lib/codemirror.css">
        <script src="../../codemirror-5.58.1/lib/codemirror.js"></script>
        <script src="../../codemirror-5.58.1/mode/verilog/verilog.js"></script>
        <script src="../../codemirror-5.58.1/addon/edit/matchbrackets.js"></script>
        <script>
var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
    lineNumbers: true,
    matchBrackets: true,
    mode: {
        name: "verilog",
        noIndentKeywords: ["package"]
    }
});
        </script>
        <iframe id="iframeId" src="result.html" width="100%" height="300" style="border:none;" />
    </body>
</html>
