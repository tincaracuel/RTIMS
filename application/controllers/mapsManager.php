<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class mapsManager extends CI_Controller {

	public function index(){
		$this->load->library('googlemaps');
		$config['center'] = '14.1876, 121.12508';
		$config['zoom'] = '13';
		$config['map_type'] = 'HYBRID';
		$config['maxzoom'] = 0;
		$config['minzoom'] = 13;
		$config['mapTypeControlStyle'] = "DROPDOWN_MENU";
		$config['map_types_available'] = array("HYBRID", "ROADMAP");

		$config['onclick'] =   'var rw_lat = document.getElementById("rw_lat");
								rw_lat.value = event.latLng.lat();
								var rw_long = document.getElementById("rw_long");
								rw_long.value = event.latLng.lng();

								var inc_lat = document.getElementById("inc_lat");
								inc_lat.value = event.latLng.lat();
								var inc_long = document.getElementById("inc_long");
								inc_long.value = event.latLng.lng();';
		$polygon = array();



		$polygon['points'] = array(
			'14.232854,121.189964', '14.232854,121.189921', '14.237887,121.175673', '14.224909,121.134947', 
	        '14.225699,121.133831', '14.228694,121.134217', '14.229942,121.134818', '14.231356,121.133009', 
	        '14.231772,121.131206', '14.234601,121.12949', '14.233936,121.122795', '14.235267,121.118246', 
	        '14.237097,121.118081', '14.237762,121.11645', '14.236681,121.113275', '14.234767,121.113017', 
	        '14.232812,121.109498', '14.228278,121.10038', '14.228736,121.099241', '14.228278,121.095415', 
	        '14.226531,121.09387', '14.226781,121.090351', '14.224285,121.088806', '14.223203,121.083914', 
	        '14.222371,121.083485', '14.220374,121.080481', '14.218294,121.075674', '14.217545,121.067863', 
	        '14.206646,121.053543', '14.20365,121.044933', '14.201237,121.041342', '14.195662,121.036693', 
	        '14.174526,121.033359', '14.166787,121.032844', '14.158298,121.030441', '14.153887,121.030956', 
	        '14.149809,121.033617', '14.146147,121.038595', '14.146813,121.05044', '14.153305,121.059195', 
	        '14.154803,121.072848', '14.152306,121.074307', '14.151307,121.076367', '14.150558,121.082504',
	        '14.144815,121.091559', '14.144815,121.091559', '14.138656,121.103747', '14.138615,121.109155', 
	        '14.140446,121.109884', '14.141986,121.114004', '14.1439,121.114133', '14.145689,121.118339', 
	        '14.144774,121.122544', '14.144108,121.123445', '14.145023,121.126192', '14.145773,121.127394', 
	        '14.147936,121.128467', '14.144815,121.130827', '14.143192,121.131471', '14.142152,121.133445', 
	        '14.142485,121.135505', '14.143192,121.136148', '14.144233,121.136106', '14.144899,121.136749', 
	        '14.144524,121.14177', '14.1439,121.143101', '14.143733,121.14589', '14.143068,121.147221', 
	        '14.142443,121.152285', '14.142818,121.154731', '14.138906,121.171768', '14.142152,121.173914', 
	        '14.145315,121.177304', '14.152888,121.182154', '14.163749,121.191037', '14.172404,121.199534',
	        '14.18472,121.201981', '14.183638,121.200479', '14.182015,121.199406', '14.182556,121.198118',
	        '14.18239,121.197603', '14.181766,121.196444', '14.181766,121.194642', '14.183805,121.192925', 
	        '14.184678,121.190694', '14.18551,121.189878', '14.1873,121.189278', '14.186925,121.184986', 
	        '14.186051,121.182754', '14.186883,121.181639', '14.189629,121.180137', '14.191377,121.180051',
	        '14.197202,121.1849', '14.203234,121.183398', '14.207977,121.183784', '14.211804,121.184857', 
	        '14.213843,121.188462',' 14.215757,121.190007', '14.225907,121.189063', '14.230067,121.18902', 
        	'14.232937,121.19005');

		$polygon['clickable'] = 'TRUE';
		$polygon['fillColor'] = 'transparent';

		$polygon['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		
		//$this->googlemaps->add_polygon($polygon);




		$this->googlemaps->initialize($config);
		
		$groundOverlay = array();
		$groundOverlay['image'] = 'http://maps.google.com/intl/en_ALL/images/logos/maps_logo.gif';
		$groundOverlay['positionSW'] = '14.232,121.19';
		$groundOverlay['positionNE'] = '14.1876, 121.12508';
		$this->googlemaps->add_ground_overlay($groundOverlay);


		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('maps', $data);	
	}


	public function addMarker(){
		//
	}

	public function addRoadwork(){
	/*gets the necessary information from the submitted form*/
	$contract_number = $_POST['contract_number'];
	$rwork_name = $_POST['rwork_name'];
	$classification = $_POST['classification'];
	$rw_start = $_POST['rw_start'];
	$rw_end = $_POST['rw_end'];
	$street = $_POST['street'];
	$barangay = $_POST['barangay'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$status = $_POST['status'];



	/*	calls the addNewCashier function in cashierAccess.php (in models) to add the new account
	and it will return a status which will determine if the new account was successfully added */
	$this->roadworkAccess->addNewRoadwork($contract_number, $rwork_name, $classification, $rw_start, $rw_end, $street, $barangay, $latitude, $longitude, $status);
	if($status == ''){
		header("Location: ".base_url()."");
	}else{
		header("Location: ".base_url()."index.php/mapsManager");
	}

	}
}
