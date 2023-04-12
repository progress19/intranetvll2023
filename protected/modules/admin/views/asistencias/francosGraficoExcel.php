<?php
$legajo = $_REQUEST['legajo'];
$ano = $_REQUEST['a'];

$empleado = Personal::getEmpleado($_REQUEST['legajo']);

ini_set('memory_limit', '-1');
ini_set('max_execution_time', 300); //300 seconds = 5 minutes

  Yii::import('ext.phpexcel.XPHPExcel');    
      $objPHPExcel= XPHPExcel::createPHPExcel();
 	  $objPHPExcel->getProperties()->setCreator("Mauricio Lavilla")
                               ->setLastModifiedBy("Mauricio Lavilla")
                               ->setTitle("Domingos Personal - Valle de Las Leñas")
                               ->setSubject("VLL") //Asunto
                               ->setDescription("VLL") //Descripción
                               ->setKeywords("VLL") //Etiquetas
                               ->setCategory("Reporte excel"); //Categorias

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Año : '.$ano)
            ->setCellValue('A2', $empleado['nombre'].' ('.$empleado['legajo'].')')
            ->setCellValue('A3', 'Saldo Francos : '.$empleado['francos'])
            ;
 
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A5', 'Meses')
            ->setCellValue('B5', '1')
            ->setCellValue('C5', '2')
            ->setCellValue('D5', '3')
            ->setCellValue('E5', '4')
            ->setCellValue('F5', '5')
            ->setCellValue('G5', '6')
            ->setCellValue('H5', '7')
            ->setCellValue('I5', '8')
            ->setCellValue('J5', '9')
            ->setCellValue('K5', '10')
            ->setCellValue('L5', '11')
            ->setCellValue('M5', '12')
            ->setCellValue('N5', '13')
            ->setCellValue('O5', '14')
            ->setCellValue('P5', '15')
            ->setCellValue('Q5', '16')
            ->setCellValue('R5', '17')
            ->setCellValue('S5', '18')
            ->setCellValue('T5', '19')
            ->setCellValue('U5', '20')
            ->setCellValue('V5', '21')
            ->setCellValue('W5', '22')
            ->setCellValue('X5', '23')
            ->setCellValue('Y5', '24')
            ->setCellValue('Z5', '25')
            ->setCellValue('AA5', '26')
            ->setCellValue('AB5', '27')
            ->setCellValue('AC5', '28')
            ->setCellValue('AD5', '29')
            ->setCellValue('AE5', '30')
            ->setCellValue('AF5', '31')
                         ;
 
// Miscellaneous glyphs, UTF-8
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A6', 'ENERO')
            ->setCellValue('A7', 'FEBRERO')
            ->setCellValue('A8', 'MARZO')
            ->setCellValue('A9', 'ABRIL')
            ->setCellValue('A10', 'MAYO')
            ->setCellValue('A11', 'JUNIO')
            ->setCellValue('A12', 'JULIO')
            ->setCellValue('A13', 'AGOSTO')
            ->setCellValue('A14', 'SEPTIEMBRE')
            ->setCellValue('A15', 'OCTUBRE')
            ->setCellValue('A16', 'NOVIEMBRE')
            ->setCellValue('A17', 'DICIEMRE');
            
$mes = 1;

for ($i=6; $i < 18; ) { 
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('B'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-01'))
->setCellValue('C'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-02'))
->setCellValue('D'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-03'))
->setCellValue('E'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-04'))
->setCellValue('F'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-05'))
->setCellValue('G'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-06'))
->setCellValue('H'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-07'))
->setCellValue('I'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-08'))
->setCellValue('J'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-09'))
->setCellValue('K'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-10'))
->setCellValue('L'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-11'))
->setCellValue('M'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-12'))
->setCellValue('N'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-13'))
->setCellValue('O'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-14'))
->setCellValue('P'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-15'))
->setCellValue('Q'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-16'))
->setCellValue('R'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-17'))
->setCellValue('S'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-18'))
->setCellValue('T'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-19'))
->setCellValue('U'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-20'))
->setCellValue('V'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-21'))
->setCellValue('W'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-22'))
->setCellValue('X'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-23'))
->setCellValue('Y'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-24'))
->setCellValue('Z'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-25'))
->setCellValue('AA'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-26'))
->setCellValue('AB'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-27'))
->setCellValue('AC'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-28'))
->setCellValue('AD'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-29'))
->setCellValue('AE'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-30'))
->setCellValue('AF'.$i, Asistencias::getGraficoExcel($legajo,$ano.'-'.$mes.'-31'));
	
$i++;$mes++;

}

;  

for($i = 'A'; $i <= 'Z'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}

$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('AA')->setAutoSize(TRUE);

$styleArray = array(
    'font'  => array(
        'size'  => 10,
        'name'  => 'Verdana'
    ));

$objPHPExcel->getActiveSheet()->getStyle('A1:AF17')->applyFromArray($styleArray);

$styleArraya = array(
    'font'  => array(
        'bold'  => true,
        'name'  => 'Verdana'
    ));

$objPHPExcel->getActiveSheet()->getStyle('A5:AF5')->applyFromArray($styleArraya);

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Asistencias');
 
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
  
// Redirect output to a clientâ€™s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="FrancosVLL-'.$empleado['nombre'].'.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
 
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
      Yii::app()->end();



    ?>