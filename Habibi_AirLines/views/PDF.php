<?php
/**
 * Created by PhpSt
 * User: hx
 * Date: 06/01/2018
 * Time: 10:40
 */

require '../source files/fpdf/fpdf.php';


class PDF extends FPDF
{
    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';
// Page header
    function Header()
    {
        $this->Image('../templates/images/logo.png',80,10);
    }
// Page footer
    function Footer()
    {
        $this->Cell(0,0,$this->WriteHTML('<br><br><br><br><i>Habibi Airlines vous souhiate un bon voyage</i>'),0,0,'C');
        $this->SetY(-30);
        $this->SetX(80);
        $this->Image('../templates/images/logo.png');
    }

    function WriteHTML($html)
    {
        // Parseur HTML
        $html = str_replace("\n",' ',$html);
        $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                // Texte
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                else
                    $this->Write(5,$e);
            }
            else
            {
                // Balise
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    // Extraction des attributs
                    $a2 = explode(' ',$e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag,$attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr)
    {
        // Balise ouvrante
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF = $attr['HREF'];
        if($tag=='BR')
            $this->Ln(5);
    }

    function CloseTag($tag)
    {
        // Balise fermante
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF = '';
    }

    function SetStyle($tag, $enable)
    {
        // Modifie le style et sélectionne la police correspondante
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach(array('B', 'I', 'U') as $s)
        {
            if($this->$s>0)
                $style .= $s;
        }
        $this->SetFont('',$style);
    }

    function PutLink($URL, $txt)
    {
        // Place un hyperlien
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }
}

$html = utf8_decode('<br><br>
Numéro Client : <b><i>'.$_REQUEST["num_client"].'</i></b><br>
Nom Client : <b><i>'.strtoupper($_REQUEST["nom"]).'</i></b><br>
Prenom Client : <b><i>'.$_REQUEST["prenom"].'</i></b><br>
Adresse Mail Client : <b><i>'.$_REQUEST["mail"].'</i></b><br>
Place(s) Réservée(s) : <b><i>'.$_REQUEST["nbr"].'</i></b><br>
<br><br><br>');
$html2 = utf8_decode('<br><br>
Au départ de : <b>'.$_REQUEST["villeD"]." - ".$_REQUEST["nom_aeroD"]." ".$_REQUEST["num_aeroD"].'</b><br>
Le <b>'.$_REQUEST["dateD"].'</b> à <b>'.$_REQUEST["heureD"].'</b><br><br>
Arrivée à : <b>'.$_REQUEST["villeA"]." - ".$_REQUEST["nom_aeroA"]." ".$_REQUEST["num_aeroA"].'</b><br>
Le <b>'.$_REQUEST["dateA"].'</b> à <b>'.$_REQUEST["heureD"].'</b><br><br>');


//var_dump($_REQUEST);
// Instanciation of inherited class
$pdf = new PDF();
$pdf->SetMargins(10,60,10);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times','',12);
$pdf->Write(5, utf8_decode('Réservation n°'.$_REQUEST["num_resa"]));
$pdf->WriteHTML("<br><br><br><br>");
$pdf->SetFont('Times','',20);
$pdf->Write(5, 'Informations Client :');

$pdf->SetFont('Times','',12);
$pdf->WriteHTML($html);

$pdf->SetFont('Times','',20);
$pdf->Write(5,'Informations Vol :');

$pdf->SetFont('Times','',12);
$pdf->WriteHTML($html2);

$pdf->Image("../templates/images/qr_code.png");
$pdf->Output();


?>

