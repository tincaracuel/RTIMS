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

			$config['onclick'] =   'var rw_lat = document.getElementById("rwork_lat");
									rw_lat.value = event.latLng.lat();
									var rw_long = document.getElementById("rwork_long");
									rw_long.value = event.latLng.lng();
									createMarker({ map: map, position:event.latLng , draggable: true});';

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
				$a7 = $coordinate->status;
				$a8 = $coordinate->latitude;
				$a9 = $coordinate->longitude;
				$a10 = $coordinate->rwork_type;
				$a11 = $coordinate->description;

				$htmlstring =  $this->setInfowindow_rw($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11);
				$marker['infowindow_content'] = $htmlstring;


				$interval = date_diff(date_create($coordinate->end_date), date_create((date("Y-m-d"))));


				$titleString = 'Roadwork # '.$coordinate->map_id.'\n'.$coordinate->rwork_name.'\n'.$coordinate->barangay.', Calamba City';
				$marker['title'] = $titleString;
				
				if ($coordinate->rwork_type == 'Construction'){
					$marker['icon'] = base_url().'styles/img/markers/rw/construction.png';
				}else if ($coordinate->rwork_type == 'Rehabilitation'){
					$marker['icon'] = base_url().'styles/img/markers/rw/rehabilitation.png';
				}else if ($coordinate->rwork_type == 'Renovation'){
					$marker['icon'] = base_url().'styles/img/markers/rw/renovation.png';
				}else if ($coordinate->rwork_type == 'Riprapping'){
					$marker['icon'] = base_url().'styles/img/markers/rw/riprapping.png';
				}else if ($coordinate->rwork_type == 'Application'){
					$marker['icon'] = base_url().'styles/img/markers/rw/application.png';
				}else if ($coordinate->rwork_type == 'Installation'){
					$marker['icon'] = base_url().'styles/img/markers/rw/installation.png';
				}else if ($coordinate->rwork_type == 'Reconstruction'){
					$marker['icon'] = base_url().'styles/img/markers/rw/reconstruction.png';
				}else if ($coordinate->rwork_type == 'Concreting/Asphalting'){
					$marker['icon'] = base_url().'styles/img/markers/rw/concreting.png';
				}else if ($coordinate->rwork_type == 'Electrification'){
					$marker['icon'] = base_url().'styles/img/markers/rw/electrification.png';
				}else if ($coordinate->rwork_type == 'Roadway Lighting'){
					$marker['icon'] = base_url().'styles/img/markers/rw/lighting.png';
				}

				$marker['position'] = $coordinate->latitude.','.$coordinate->longitude;
				$this->googlemaps->add_marker($marker);
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
		$status = $_POST['rwork_status'];

		
		$status = $this->roadworkAccess->addNewRoadwork($contract_number, $rwork_name, $classification, $desc, $status, $street, $brgy, $latitude, $longitude, $start, $end);
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
	public function setInfowindow_rw($contract_no, $rwork_name, $street, $barangay, $start_date, $end_date, $status, $lat, $long, $type, $desc) {
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

}
