<?php

// src/View/Helper/MyHtmlHelper.php
namespace App\View\Helper;
 
use Cake\View\Helper\HtmlHelper;
 
class StringHelper extends HtmlHelper
{
   	public $plUpper = array('Ą','Ć','Ę','Ł','Ń','Ó','Ś','Ż','Ź');
	public $plLower = array('ą','ć','ę','ł','ń','ó','ś','ż','ź');
	
	public $enUpper = array('A','C','E','L','N','O','S','Z','Z');
	public $enLower = array('a','c','e','l','n','o','s','z','z');
	
	
	public function formatNIP($nip) {
		return preg_replace('/([0-9]{3})([0-9]{3})([0-9]{2})([0-9]{2})/i', '$1-$2-$3-$4', $nip);
	}
	
	public function formatPhone($phone) {
		if(strlen($phone) == 7) { // tel. stacjonarny bez kierunkowego 238 14 15
			return preg_replace('/([0-9]{3})([0-9]{2})([0-9]{2})/i', '$1 $2 $3', $phone);
		} elseif(strlen($phone) == 9) { // tel. stacjonarny z kierunkowym 32 238 14 15
			return preg_replace('/([0-9]{2})([0-9]{3})([0-9]{2})([0-9]{2})/i', '($1) $2 $3 $4', $phone);
		} return $phone;
	}
	
	public function formatMobile($phone) {
		if(strlen($phone) == 9) { //po prostu nr telefonu - 502 399 282
			return preg_replace('/([0-9]{3})([0-9]{3})([0-9]{3})/i', '$1 $2 $3', $phone);
		} elseif(strlen($phone) == 10) { //nr telefonu z 0 na poczatku 0 502 399 282 
			return preg_replace('/([0-9]{1})[0-9]{3})([0-9]{3})([0-9]{3})/i', '$1 $2 $3 $4', $phone);
		} elseif(strlen($phone) == 11) { //48 502 399 282 
			return preg_replace('/([0-9]{2})([0-9]{3})([0-9]{3})([0-9]{3})/i', '+$1 $2 $3 $4', $phone);
		} elseif(strlen($phone) == 12) { //0 48 502 399 282 
			return preg_replace('/([0-9]{1})([0-9]{2})([0-9]{3})([0-9]{3})([0-9]{3})/i', '+$1 $2 $3 $4 $5', $phone);
		} else 	return $phone;
	}
	
	public function formatWWW($www,$returnLink = true) {
	
	if(preg_match('/^(http|https)/',$www)) $url = $www; else $url = 'http://'.$www; 
	
	if($returnLink) return '<a target="_blank" href="'.$url.'">'.$url.'</a>';
	
	return $url;	
	}
	
	public function formatDate($date,$format = NULL) {
		$date = explode(' ',$date);
		$date[0] = explode('-',$date[0]);
		if(empty($date[1])) $date[1] = '00:00:00';
		$date[1] = explode(':',$date[1]);
		if(empty($format)) $format = 'd.m.Y @ H:i'; 
		return date($format,mktime($date[1][0],$date[1][1],0,$date[0][1],$date[0][2],$date[0][0]));
	}
	
	public function formatIBAN($iban) {
		return preg_replace('/([0-9]{2})([0-9]{4})([0-9]{4})([0-9]{4})([0-9]{4})([0-9]{4})([0-9]{4})/i', '$1 $2 $3 $4 $5 $6 $7', $iban);
	}

	public function getDayNameByInt($int = 1){
		$name = "";
		if(is_array($int)){
			foreach($int as $wn){
				$name.= $this->getDayName((int)$wn).",";
			}
		}else{
			$name = $this->getDayName((int)$int).",";
		}
		return $name;
	}
	public function getDayName($int){
		switch ($int){
			case 6:
				return 'Sobota';
			case 0:
				return 'Niedziela';
			case 1:
				return 'Poniedziałek';
			case 2:
				return 'Wtorek';
			case 3:
				return 'Środa';
			case 4:
				return 'Czwartek';
			case 5:
				return 'Piątek';
			default:
				return '';
		}
	}
	public function variety($number, $varietyFor1, $varietyFor234, $varietyForOthers) {
        if ($number == 1)
            return $varietyFor1;
        if ($number % 100 >= 10 && $number % 100 <= 20)
            return $varietyForOthers;
        if (in_array($number % 10, array(2, 3, 4)))
            return $varietyFor234;
        return $varietyForOthers;
    }
	public function howLongDate($dateToCalc = null) {
        $dateNow = date('Y-m-d H:i:s'); // data dzisiejsza
        $dateToCalc = date('Y-m-d H:i:s', strtotime($dateToCalc));
        
        if($dateToCalc <= $dateNow){
            
            $result = (strtotime($dateNow) - strtotime($dateToCalc)) - 180; // Odejmuje 3 minuty
            if ($result <= 59) {
                return "Poniżej minuty";
            } elseif ($result <= 3599) {
                return intval(date('i', $result)) . ' ' . $this->variety(intval(date('i', $result)), 'minuta', 'minuty', 'minut') . ' temu';
            } elseif ($result <= 86399) {
                return intval(date('H', $result)) . ' ' . $this->variety(intval(date('H', $result)), 'godzina', 'godziny', 'godzin') . ' temu';
            } elseif ($result <= 2591999) {
                return (intval(date('d', $result)) - 1) . ' ' . $this->variety(intval(date('d', $result)) - 1, 'dzień', 'dni', 'dni') . ' temu';
            } else {
                //return (intval(date('d', $result)) - 1) . ' ' . $this->variety(intval(date('d', $result)) - 1, 'dzień', 'dni', 'dni') . ' temu';
                return '';
            }
        }else{
            return '';
        }
    }

	public function findingTimeDateFormat($created){
		$now = strtotime(date('Y-m-d'));
		$created = strtotime($created);
		$datediff = $created-$now;
		$resDay = floor($datediff / (60 * 60 * 24));
		if($resDay==0){
			echo "dziś ".date('H:i', $created);
		}else if($resDay > 1){
			echo 'Future Date';
		}else if($resDay > 0){
			echo 'tomarrow';
		}else if($resDay < -1){
			echo date('Y-m-d H:i', $created);
		}else{
			echo "wczoraj ".date('H:i', $created);
		}
	}
}