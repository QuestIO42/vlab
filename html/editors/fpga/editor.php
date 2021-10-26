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

function loadExample(file, sw = false) {
    function reqListener () {
        //document.getElementById("editorTA").value = "teste";
        //txtinput = this.responseText;
        editor.getDoc().setValue(this.responseText);
    }
    document.getElementById("ASMeditor").style.visibility = sw ? "visible" : "hidden";
    var filePath = "https://vlab.dc.ufscar.br/examples/fpga/" + file + ".txt";
    var oReq = new XMLHttpRequest();
    oReq.onload = reqListener;
    oReq.open("get", filePath, true);
    oReq.send();
}
</script>
</head>

<body>

<button id="save" onclick="savefiles(editorTA, editorTB)">Save</button>
Exemplos:
<button onclick="loadExample('alert');">Alert</button>
<button onclick="loadExample('colors');">Colors</button>
<button onclick="loadExample('traffic_light');">Traffic Light</button>
<button onclick="loadExample('vga');">VGA 640x480</button>
<button onclick="loadExample('up1', true);">uP1 + VGA 7.5x10</button>
<button onclick="loadExample('vgamem');">VGA 20x15 + RAM</button>
<button onclick="loadExample('hexcount');">Hex Count</button>


<table>
  <tr>
    <th>Verilog</th>
    <th>Assembly</th>
  </tr>
  <tr>
    <td>
<textarea id=editorTA name=code>
<?php readfile("top.sv.original"); ?>
</textarea>
    </td>
    <td id=ASMeditor style="visibility: hidden">
<textarea id=editorTB name=asm> 
<?php readfile("top.asm.original"); ?>
</textarea>
    </td>
  </tr>
</table>

<!-- Create a simple CodeMirror instance -->
<link rel="stylesheet" href="../../codemirror-5.58.1/lib/codemirror.css">
<script src="../../codemirror-5.58.1/lib/codemirror.js"></script>
<script src="../../codemirror-5.58.1/mode/verilog/verilog.js"></script>
<script src="../../codemirror-5.58.1/addon/edit/matchbrackets.js"></script>

<script>
  var editor = CodeMirror.fromTextArea(document.getElementById("editorTA"), {
    lineNumbers: true,
    matchBrackets: true,
    mode: {
      name: "verilog",
      noIndentKeywords: ["package"]
    }
  });
  var asmeditor = CodeMirror.fromTextArea(document.getElementById("editorTB"), {
    lineNumbers: true,
    lineWrapping: true,
    mode: {
      name: "Gas",
      noIndentKeywords: ["package"]
    }
  });
</script>

</body>
</html>



