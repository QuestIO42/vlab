<?php
/* LuxCal PDF Print Upcoming Events - A5 class
Copyright 2009-2020 LuxSoft www.LuxSoft.eu
-------------------------------------------------------------------
This file is part of the LuxCal Calendar and is distributed WITHOUT 
ANY WARRANTY. See the GNU General Public License for details.
*/

require('./pdfs/fpdf.php');

class PDF extends FPDF 
{
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';
protected $col = 0; //current column
protected $col2L = 148; //column offset
protected $body = 0; //body being printed
protected $pageNr = 1; //page number

function Header() { //page header
	global $logo, $link, $title, $cHEAD, $bHEAD;

	$title = iconv('UTF-8','windows-1252',$title);
	$logo = ltrim($logo,"/\\");
	$this->SetFont('Arial','B',12);
	list($r,$g,$b) = sscanf($cHEAD,"#%02x%02x%02x");
	$this->SetTextColor($r,$g,$b);
	list($r,$g,$b) = sscanf($bHEAD,"#%02x%02x%02x");
	$this->SetFillColor($r,$g,$b);
	$w = $this->GetStringWidth($title)+4;
	if (!empty($logo)) {
		$this->Image($logo,10,6,14,0,'',$link);
		$this->Image($logo,$this->col2L + 10 ,6,14,0,'',$link);
		$titleX = 81 - $w/2;
	} else {
		$titleX = 74 - $w/2;
	}
	$this->SetX($titleX);
	$this->Cell($w,6,$title,0,0,'C',true,$link);
	$this->SetX($titleX + $this->col2L);
	$this->Cell($w,6,$title,0,0,'C',true,$link);
	$this->SetY(24);
	$this->SetLeftMargin(10);
	$this->SetRightMargin($this->col2L + 10);
	$this->SetAutoPageBreak(true,12);
}

function Footer() { //page footer
	global $footer;

	$this->SetFont('Arial','I',8);
	$this->SetTextColor(128);
	$this->SetY(-10);
	$off = 0;
	while ($off <= $this->col2L) { //print footer for two A5 pages
		$ftrText = str_replace('#',$this->pageNr++, $footer);
		$ftrText = iconv('UTF-8','windows-1252',$ftrText);
		$ftrArr = explode('>',$ftrText);
		if (!empty($ftrArr[0])) {
			$w = $this->GetStringWidth($ftrArr[0]);
			$this->SetX($off + 10);
			$this->Cell($w,6,$ftrArr[0],0,0);
		}
		if (!empty($ftrArr[1])) {
			$w = $this->GetStringWidth($ftrArr[1]);
			$this->SetX($off + 74 - $w/2);
			$this->Cell($w,6,$ftrArr[1],0,0);
		}
		if (!empty($ftrArr[2])) {
			$w = $this->GetStringWidth($ftrArr[2]);
			$this->SetX($off + 137 - $w);
			$this->Cell($w,6,$ftrArr[2],0,0);
		}
		$off += $this->col2L;
	}
}

function AcceptPageBreak() { //method accepting or not automatic page break
	if($this->col < 1) { //go to column 2
		$this->col = 1;
		$this->SetLeftMargin($this->col2L + 10 + $this->body * 35);
		$this->SetRightMargin(10);
		$this->SetY(24);
		return false; //keep on page
	} else { //go back to column 1
		$this->col = 0;
		$this->SetLeftMargin(10 + $this->body * 35); //set abscissa to left of column 1
		$this->SetRightMargin($this->col2L + 10);
		$this->Ln(0);
		return true; //page break
	}
}

function writeHTML($html) { //HTML parser
	$html = str_replace("\n",' ',$html);
	$a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
	foreach($a as $i=>$e) {
		if ($i%2==0) { //text
			if ($this->HREF)
				$this->PutLink($this->HREF,$e);
			else
				$this->Write(5,$e);
		} else { //tag
			if($e[0]=='/') {
				$this->CloseTag(strtoupper(substr($e,1)));
			} else { //extract attributes
				$a2 = explode(' ',$e);
				$tag = strtoupper(array_shift($a2));
				$attr = array();
				foreach($a2 as $v) {
					if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3)) {
						$attr[strtoupper($a3[1])] = $a3[2];
					}
				}
				$this->OpenTag($tag,$attr);
			}
		}
	}
}

function OpenTag($tag, $attr) { //opening tag
	if ($tag=='B' || $tag=='I' || $tag=='U')
		$this->SetStyle($tag,true);
	if ($tag=='A')
		$this->HREF = $attr['HREF'];
	if ($tag=='BR')
		$this->Ln(5);
		$this->SetLeftMargin($this->col * $this->col2L + 10 + 35); //set abscissa to left of column. important
}

function CloseTag($tag) { //closing tag
	if ($tag=='B' || $tag=='I' || $tag=='U')
		$this->SetStyle($tag,false);
	if ($tag=='A')
		$this->HREF = '';
}

function SetStyle($tag, $enable) { //modify style and select corresponding font
	$this->$tag += ($enable ? 1 : -1);
	$style = '';
	foreach(array('B', 'I', 'U') as $s) {
		if ($this->$s > 0)
			$style .= $s;
	}
	$this->SetFont('',$style);
}

function PutLink($URL, $txt) { //put a hyperlink
	$this->SetTextColor(0,0,255);
	$this->SetStyle('U',true);
	$this->Write(5,$txt,$URL);
	$this->SetStyle('U',false);
	$this->SetTextColor(80,80,80);
}

function printMonth($monthTitle) { //month title
	global $cMOYE, $bMOYE;

	$monthTitle = iconv('UTF-8','windows-1252',$monthTitle);
	if ($this->GetY() > 25) { //no nl at the top
		$this->Ln(4);
	}
	$this->SetFont('Arial','B',11);
	list($r,$g,$b) = sscanf($cMOYE,"#%02x%02x%02x");
	$this->SetTextColor($r,$g,$b);
	list($r,$g,$b) = sscanf($bMOYE,"#%02x%02x%02x");
	$this->SetFillColor($r,$g,$b);
	$this->SetX($this->col * $this->col2L + 10);
	$this->Cell(128,5,$monthTitle,'0',1,'L',true);
}

function printDay($wDay) { //week day + day
	global $cDATE, $bDATE;

	$wDay = iconv('UTF-8','windows-1252',$wDay);
	$this->Ln(1);
	$this->SetFont('Arial','B',10);
	list($r,$g,$b) = sscanf($cDATE,"#%02x%02x%02x");
	$this->SetTextColor($r,$g,$b);
	list($r,$g,$b) = sscanf($bDATE,"#%02x%02x%02x");
	$this->SetFillColor($r,$g,$b);
	$w = $this->GetStringWidth($wDay)+2;
	$this->SetX($this->col * $this->col2L + 10);
	$this->Cell($w,4,$wDay,0,1,'C',true);
}

function printEvent($evtTime,$evtTitle,$evtBody,$hdStyle,$tColor='#505050',$tBgrnd='#FFFFFF') { //event details
	$evtTitle = iconv('UTF-8','windows-1252',$evtTitle);
	$evtBody = iconv('UTF-8','windows-1252',$evtBody);
	$this->SetFont('Arial','',10);
	$this->SetTextColor(80,80,80);
	$this->SetFillColor(255,255,255);
	$this->SetX($this->col * $this->col2L + 10);
	$this->Cell(35,4,$evtTime,0,0,'L');
	list($r,$g,$b) = sscanf($tColor,"#%02x%02x%02x");
	$this->SetTextColor($r,$g,$b);
	list($r,$g,$b) = sscanf($tBgrnd,"#%02x%02x%02x");
	$this->SetFont('',$hdStyle);
	$this->SetFillColor($r,$g,$b);
	$this->SetLeftMargin($this->col * $this->col2L + 45);
	$this->SetX($this->col * $this->col2L + 45);
	$this->MultiCell(93,4,$evtTitle,0,'L',true);
	$this->SetFont('','');
	if (!empty($evtBody)) {
		$this->SetTextColor(80,80,80);
		$this->body = 1; //start of event body
		$this->writeHTML($evtBody);
		$this->body = 0; //end of event body
		$this->Ln(7);
	}
	$this->SetLeftMargin($this->col * $this->col2L + 10);
}
}
//start a new PDF
$pdf = new PDF('L');
?>
