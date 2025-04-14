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
    var filePath = "https://legacy.vlab.dc.ufscar.br/examples/fpga/quartus/" + file + ".sv";
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
  <select id="examples" onchange="loadExample(document.getElementById('examples').value, document.getElementById('examples').value == 'up1');">
    <optgroup label="Basic">
      <option value="LEDs">LEDs</option>
      <option value="hexcount">Hex Count</option>
    </optgroup>
    <optgroup label="VGA">
      <option value="vga">VGA 640x480</option>
      <option value="vgamem8">VGA 20x15 + RAM (8 bits)</option>
      <option value="vgamem32">VGA 20x15 + RAM (32 bits)</option>
      <option value="conway">Conway's Game of Life</option>
      <option value="worley">Balls</option>
      <option value="starfield">Starfield</option>
    </optgroup>
    <optgroup label="uP1">
      <option value="up1">VGA</option>
    </optgroup>
  </select>

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



