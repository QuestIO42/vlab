<html>
<head>
    <script type="text/javascript" src="sendContent.js"></script>
<script>
function save() {
savefiles(editor, asmeditor);
}
</script>

<script>
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
        //document.getElementById("editorTA").value = "teste";
        //txtinput = this.responseText;
        editor.getDoc().setValue(this.responseText);
    }
    var filePath = "https://vlab.dc.ufscar.br/examples/arduino_mega/" + file + ".txt";
    var oReq = new XMLHttpRequest();
    oReq.onload = reqListener;
    oReq.open("get", filePath, true);
    oReq.send();
}
</script>
</head>

<body>

<button id="save" onclick="savefiles(editorTA)">Save</button>
Exemplos:
<button onclick="loadExample('blink');">Blink</button>
<button onclick="loadExample('hello');">Hello</button>
<button onclick="loadExample('fade');">Fade</button>
<button onclick="loadExample('light');">Light</button>
<button onclick="loadExample('temp');">Temp</button>
<button onclick="loadExample('web');">Web LED</button>

<textarea id=editorTA name=code>
<?php readfile("blink.ino.original"); ?>
</textarea>

<!-- Create a simple CodeMirror instance -->
<link rel="stylesheet" href="../../codemirror-5.58.1/lib/codemirror.css">
<script src="../../codemirror-5.58.1/lib/codemirror.js"></script>
<script src="../../codemirror-5.58.1/mode/clike/clike.js"></script>
<script src="../../codemirror-5.58.1/addon/edit/matchbrackets.js"></script>

<script>
  var editor = CodeMirror.fromTextArea(document.getElementById("editorTA"), {
    lineNumbers: true,
    matchBrackets: true,
    mode: "text/x-c++src"
  });
</script>

</body>
</html>



