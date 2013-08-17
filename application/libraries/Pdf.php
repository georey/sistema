<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
 
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
	
    public function Header() {

    }
    
    public function Footer() {
		// Posisionamieto a -15 mm del eje y
		//$this->SetY(-15);
		// Fondo
		//$this->SetFont('helvetica', 'I', 8);
		// Numero de pagina
		//$this->Cell(0, 10, 'Pagina '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

    }
    
    public function makePDF($output)
    {
        // set document information$titulo,$header,$body,$generado
        $this->setPrintHeader(false);
        $this->SetSubject('Reporte');
        $this->SetKeywords('Reporte, sistema');
        
        // set font
        $this->SetFont('dejavusans', '', 8);
        
        // add a page
        $this->AddPage('','Letter');
        $tbl = '';		
		
		$this->writeHTML($tbl.$output, true, false, false, false, '');
        //$pdf->writeHTML($tbl, true, false, false, false, '');
        
        // print a line using Cell()
        //$this->Cell(0, 12, 'Example 001 - Sapos Ã¨Ã©Ã¬Ã²Ã¹', 1, 1, 'C');
        
        //Close and output PDF document
        ob_end_clean();
        $this->Output('Reporte_'.date('Y-m-d-H-m-s').'.pdf', 'D');
	}

    public function partidaPDF($output,$tabla,$marginaciones='')
        {
        // set document information$titulo,$header,$body,$generado
        $this->setPrintHeader(false);
         $this->setPrintFooter(false);
        $this->SetSubject('Reporte');
        $this->SetKeywords('Reporte, sistema');
        $this->SetMargins (0, 0, -20,false);
        $this->setCellPaddings (-20, -20, -20, -20);
        $this->setFooterMargin (-1000);
        // set font
        $this->SetFont('dejavusans', '', 8);
        $this->SetAutoPageBreak(false);
        // add a page
        $this->AddPage('','Letter');
        $tbl = '';      
        
        $this->writeHTML($tbl.$output);

        if($marginaciones!='')
        {
            $this->SetMargins (20, 20, 20,true);
            $this->AddPage('','Letter');
            $tbl = '';
            $this->writeHTML($tbl.$marginaciones);
        }


        //$pdf->writeHTML($tbl, true, false, false, false, '');
        
        // print a line using Cell()
        //$this->Cell(0, 12, 'Example 001 - Sapos Ã¨Ã©Ã¬Ã²Ã¹', 1, 1, 'C');
        
        //Close and output PDF document
        ob_end_clean();
        $this->Output($tabla.'_'.date('Y-m-d-H-m-s').'.pdf', 'D');
    }

}