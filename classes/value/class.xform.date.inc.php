<?php

// TODO: Formatierung optional �nderbar
// Format: 1972-11-19

class rex_xform_date extends rex_xform_abstract
{

	function enterObject(&$email_elements,&$sql_elements,&$warning,&$form_output,$send = 0)
	{

		$day = date("d");
		$month = date("m");
		$year = date("Y");
		
		if (!is_array($this->getValue()) && strlen($this->getValue()) == 8)
		{
			$year = (int) substr($this->value,0,4);
			$month = (int) substr($this->value,4,2);
			$day = (int) substr($this->value,6,2);
			
		}else
		{
			if (isset($_REQUEST["FORM"][$this->params["form_name"]]['el_'.$this->id]["day"])) $day = $_REQUEST["FORM"][$this->params["form_name"]]['el_'.$this->id]["day"];
			if (isset($_REQUEST["FORM"][$this->params["form_name"]]['el_'.$this->id]["month"])) $month = $_REQUEST["FORM"][$this->params["form_name"]]['el_'.$this->id]["month"];
			if (isset($_REQUEST["FORM"][$this->params["form_name"]]['el_'.$this->id]["year"])) $year = $_REQUEST["FORM"][$this->params["form_name"]]['el_'.$this->id]["year"];
		}
		
		$formname = 'FORM['.$this->params["form_name"].'][el_'.$this->id.']';

		$twarning = "";
		if (!checkdate($month,$day,$year) && $send == 1)
		{
			$twarning = 'border:1px solid #f99;background-color:#f9f3f3;';
			$warning[] = "Datum ist falsch";
		}
		
		$isodatum = sprintf ("%04d%02d%02d", $year, $month, $day);

		$email_elements[$this->getName()] = $isodatum;
		$sql_elements[$this->getName()] = $isodatum;
		
		$out = "";
		$out .= '
		<p class="formdate formlabel-'.$this->getName().'" id="'.$this->getHTMLId().'">
					<label class="select" for="'.$this->getFieldId().'" >'.$this->elements[2].'</label>';
					
		$dsel = new rex_select;
		$dsel->setName($formname.'[day]');
		$dsel->setStyle("width:55px;".$twarning);
		$dsel->setId('el_'.$this->id.'_day');
		$dsel->setSize(1);
		$dsel->addOption("TT","0");
		for($i=1;$i<32;$i++)
		{
			$dsel->addOption($i,$i);
		}
		$dsel->setSelected($day);
		$out .= $dsel->get();

		$msel = new rex_select;
		$msel->setName($formname.'[month]');
		$msel->setStyle("width:55px;".$twarning);
		$msel->setId('el_'.$this->id.'_month');
		$msel->setSize(1);
		$msel->addOption("MM","0");
		for($i=1;$i<13;$i++)
		{
			$msel->addOption($i,$i);
		}
		$msel->setSelected($month);
		$out .= $msel->get();

		$year_start = (int) $this->elements[3];
		$year_end = (int) $this->elements[4];
		
		if ($year_start == 0) $year_start = 1980;
		if ($year_end == 0) $year_end = 2010;

		if ($year_end<$year_start) $year_end = $year_start;

		$ysel = new rex_select;
		$ysel->setName($formname.'[year]');
		$ysel->setStyle("width:88px;".$twarning);
		$ysel->setId('el_'.$this->id.'_year');
		$ysel->setSize(1);
		$ysel->addOption("YYYY","0");
		for($i=$year_start;$i<=$year_end;$i++)
		{
			$ysel->addOption($i,$i);
		}
		$ysel->setSelected($year);
		$out .= $ysel->get();

		$out .= '</p>';

		$form_output[] = $out;

	}
	function getDescription()
	{
		return "date -> Beispiel: date|feldname|Text *|jahrstart|jahrend|[format: Y-m-d]";
	}
	
	function getDefinitions()
	{
		return array(
						'type' => 'value',
						'name' => 'date',
						'values' => array(
									array( 'type' => 'name',   'label' => 'Feld' ),
									array( 'type' => 'text',    'label' => 'Bezeichnung'),

									array( 'type' => 'text',    'label' => 'Startjahr'),
									array( 'type' => 'text',    'label' => 'Endjahr'),
									
								),
						'description' => 'Datumsfeld Eingabe',
						'dbtype' => 'text'
						);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

?>