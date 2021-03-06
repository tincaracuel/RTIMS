<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class roadworksManager2 extends CI_Controller {

	/* ADD ROADWORK FUNCTION ONLY*/

	public function index(){

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];

			$this->load->model('incidentAccess');
			$this->load->library('googlemaps');
			$this->load->model('map_model', '', TRUE);
			$this->load->model('roadworkAccess', '', TRUE);
			$config['center'] = '14.1885, 121.12508';
			$config['zoom'] = '13';
			$config['map_type'] = 'ROADMAP';	
			$config['maxzoom'] = 0;
			$config['minzoom'] = 13;
			$config['mapTypeControlStyle'] = "DROPDOWN_MENU";
			$config['map_types_available'] = array("HYBRID", "ROADMAP");

			$config['onclick'] =  $this->getCoordinatesClicked();
		
			$coords = $this->map_model->get_coordinates_rw();
			// Loop through the coordinates we obtained above and add them to the map
			foreach ($coords as $coordinate) {
				$marker = array();
				$marker['draggable'] = FALSE;
				$marker['clickable'] = TRUE;

				$a1 = $coordinate->contract_no;
				$a2 = $coordinate->rwork_name;
				$a3 = $coordinate->street;
				$a4 = $coordinate->barangay;
				$a5 = $coordinate->start_date;
				$a6 = $coordinate->end_date;
				$a8 = $coordinate->latitude;
				$a9 = $coordinate->longitude;
				$a10 = $coordinate->rwork_type;
				$a11 = $coordinate->description;

				$htmlstring =  $this->setInfowindow_rw($a1, $a2, $a3, $a4, $a5, $a6, $a8, $a9, $a10, $a11);
				$marker['infowindow_content'] = $htmlstring;

				$interval = date_diff(date_create($coordinate->end_date), date_create((date("Y-m-d"))));

				$titleString = 'Roadwork # '.$coordinate->map_id.'\n'.$coordinate->rwork_name.'\n'.$coordinate->barangay.', Calamba City';
				$marker['title'] = $titleString;
				
				if ($coordinate->rwork_type == 'Construction'){
					$marker['icon'] = base_url().'styles/img/markers/rw/construction.png';
					$color = '#ac84e0';
				}else if ($coordinate->rwork_type == 'Rehabilitation'){
					$marker['icon'] = base_url().'styles/img/markers/rw/rehabilitation.png';
					$color = '#ffa621';
				}else if ($coordinate->rwork_type == 'Renovation'){
					$marker['icon'] = base_url().'styles/img/markers/rw/renovation.png';
					$color = '#55d7d7';
				}else if ($coordinate->rwork_type == 'Riprapping'){
					$marker['icon'] = base_url().'styles/img/markers/rw/riprapping.png';
					$color = '#00e13c';
				}else if ($coordinate->rwork_type == 'Application'){
					$marker['icon'] = base_url().'styles/img/markers/rw/application.png';
					$color = '#646464';
				}else if ($coordinate->rwork_type == 'Installation'){
					$marker['icon'] = base_url().'styles/img/markers/rw/installation.png';
					$color = '#d16d92';
				}else if ($coordinate->rwork_type == 'Reconstruction'){
					$marker['icon'] = base_url().'styles/img/markers/rw/reconstruction.png';
					$color = '#f34648';
				}else if ($coordinate->rwork_type == 'Concreting/Asphalting'){
					$marker['icon'] = base_url().'styles/img/markers/rw/concreting.png';
					$color = '#9e7151';
				}else if ($coordinate->rwork_type == 'Electrification'){
					$marker['icon'] = base_url().'styles/img/markers/rw/electrification.png';
					$color = '#5680fc';
				}else if ($coordinate->rwork_type == 'Roadway Lighting'){
					$marker['icon'] = base_url().'styles/img/markers/rw/lighting.png';
					$color = '#27b062';
				}

				$marker['position'] = $coordinate->latitude.','.$coordinate->longitude;
				$this->googlemaps->add_marker($marker);

				if($coordinate->arraypts!=""){
					$polyline = array();
					$polyline['strokeOpacity'] = '0.7';
					$polyline['strokeWeight'] = '2';
					$polyline['strokeColor'] = $color;
					$str = $coordinate->arraypts;
					$arrayz = explode(', ', $str);

					$polyline['points'] = $arrayz;
					$this->googlemaps->add_polyline($polyline);
				}
			}

			require("polygons_barangay.php");

			$this->googlemaps->initialize($config);
			$data['map'] = $this->googlemaps->create_map();

			$this->load->model('roadworkAccess');
			$data['query'] = $this->roadworkAccess->roadwork_getAll();


			$this->load->view('roadwork-new', $data);

		}
		else{
		//If no session, redirect to login page
		redirect(base_url());
		}
	}
	
	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function addRoadwork(){
		/*gets the necessary information from the submitted form*/
		$contract_number = $_POST['contract_number'];
		$rwork_name = $_POST['rwork_name'];
		$classification = $_POST['rwork_classification'];
		$desc = $_POST['rwork_desc'];
		$start = $_POST['rwork_start'];
		$end = $_POST['rwork_end'];
		$street = $_POST['rwork_street'];
		$brgy = $_POST['rwork_barangay'];
		$latitude = $_POST['rwork_lat'];
		$longitude = $_POST['rwork_long'];

		$has_line = $_POST['type_line'];
		$line = $_POST['rwork_line'];

		$status = $this->roadworkAccess->addNewRoadwork($contract_number, $rwork_name, $classification, $desc, $street, $brgy, $latitude, $longitude, $start, $end, $has_line, $line);
		if($status == ''){
			header("Location: ".base_url()."index.php/roadworksManager");
		}else{
			$this->load->view("message", array('message'=> 'Error.'));
		}

	}

	
	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function duplicateRWcontractNumberCheck(){
		$cn = $_POST['contract_number'];
		$count = 0;

		$res = $this->roadworkAccess->checkExistingContractNumber($cn);
		foreach ($res as $res) {
			$count += 1;
		}
			echo $count;
	}

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function setInfowindow_rw($contract_no, $rwork_name, $street, $barangay, $start_date, $end_date, $lat, $long, $type, $desc) {
		$infowindow_string = 	'<html><body>'.
								'<div style="min-width: 250px; max-width: 300px; width: 300px;"><p style="margin-top: -2px; border-bottom: 1px solid grey;">'.'Contract # '.$contract_no.'<br />'.
								'<b>'.$rwork_name.'</b><br />'.
								$type.'</p>';

		if($desc != '')
			$infowindow_string = $infowindow_string.'<p>'.$desc.'</p>';

		if($street != '')
			$infowindow_string = $infowindow_string.'<p style="color:grey;">'.$street.', '.$barangay.'<br />'.$start_date;
		else $infowindow_string = $infowindow_string.'<p style="color:grey;">'.$barangay.'<br />'.$start_date;

		if($end_date != '0000-00-00')
			$infowindow_string = $infowindow_string.' to '.$end_date;

		$infowindow_string = $infowindow_string.'</p></div></body></html>';

		return $infowindow_string;

	}

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	public function GetAllRoadworks(){
		$this->load->model('roadworkAccess');
		$data['query'] = $this->roadworkAccess->roadwork_getAll();
		$this->load->view('roadwork', $data);
	}

	public function getCoordinatesClicked(){

		$str = 
			'var rw_lat = document.getElementById("rwork_lat");
			var rw_long = document.getElementById("rwork_long");

			var arrayPts = document.getElementById("rwork_line");

			if(rw_lat.value=="" || rw_long.value==""){
				rw_lat.value = event.latLng.lat();
				rw_long.value = event.latLng.lng();
			}else if(document.getElementById("type_line").checked == true){
				if(/^\s*$/g.test(arrayPts.value) || arrayPts.value.indexOf("\n") != -1) {
					arrayPts.value ="";
					arrayPts.value = event.latLng.lat() + "," + event.latLng.lng();
				}else{
					arrayPts.value = arrayPts.value +", " + event.latLng.lat() + "," + event.latLng.lng();
				}
			}else{
				rw_lat.value = event.latLng.lat();
				rw_long.value = event.latLng.lng();
			}
			createMarker({ map: map, position:event.latLng , draggable: true });';

		return $str;
	
	}
}

