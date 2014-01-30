<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class incidentsManager extends CI_Controller {

	public function index(){

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];

			$this->load->library('googlemaps');
			$this->load->model('map_model', '', TRUE);
			$config['center'] = '14.1876, 121.12508';
			$config['zoom'] = '13';
			$config['map_type'] = 'ROADMAP';
			$config['maxzoom'] = 0;
			$config['minzoom'] = 13;
			$config['mapTypeControlStyle'] = "DROPDOWN_MENU";
			$config['map_types_available'] = array("HYBRID", "ROADMAP");

			/*$config['onclick'] =   'var inc_lat = document.getElementById("inc_lat");
									inc_lat.value = event.latLng.lat();
									var inc_long = document.getElementById("inc_long");
									inc_long.value = event.latLng.lng();
									createMarker({ map: map, position:event.latLng , draggable: true});';*/


			$coords_inc = $this->map_model->get_coordinates_inc();
			// Loop through the coordinates we obtained above and add them to the map
			foreach ($coords_inc as $coordinate) {
				$marker = array();
				$marker['draggable'] = FALSE;
				$marker['clickable'] = TRUE;

				$a1 = $coordinate->inc_id;
				$a2 = $coordinate->inc_type;
				$a3 = $coordinate->street;
				$a4 = $coordinate->barangay;
				$a5 = $coordinate->description;
				$a6 = $coordinate->start_date;
				$a7 = $coordinate->end_date;
				$a8 = $coordinate->latitude;
				$a9 = $coordinate->longitude;

				$htmlstring =  $this->setInfowindow_inc($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9);
				$marker['infowindow_content'] = $htmlstring;


				$marker['title'] = $coordinate->inc_id.','.$coordinate->inc_type.' at '.$coordinate->barangay;
				if ($coordinate->inc_type == 'Accident'){
					$marker['icon'] = base_url().'styles/img/markers/inc/accident.png';
				}else if ($coordinate->inc_type == 'Obstruction'){
					$marker['icon'] = base_url().'styles/img/markers/inc/obstruction.png';
				}else if ($coordinate->inc_type == 'Public Event'){
					$marker['icon'] = base_url().'styles/img/markers/inc/event.png';
				}else if ($coordinate->inc_type == 'Flood'){
					$marker['icon'] = base_url().'styles/img/markers/inc/flood.png';
				}else if ($coordinate->inc_type == 'Strike'){
					$marker['icon'] = base_url().'styles/img/markers/inc/strike.png';
				}else if ($coordinate->inc_type == 'Funeral'){
					$marker['icon'] = base_url().'styles/img/markers/inc/funeral.png';
				}

				
				$marker['position'] = $coordinate->latitude.','.$coordinate->longitude;
				$this->googlemaps->add_marker($marker);
			}


			$this->googlemaps->initialize($config);
			$data['map'] = $this->googlemaps->create_map();

			$this->load->model('incidentAccess');
			$data['query'] = $this->incidentAccess->incident_getAll();

			$this->load->view('incident', $data);

		}
		else{
		//If no session, redirect to login page
		redirect(base_url());
		}
	}

	public function add_incident(){

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
		
			$this->load->library('googlemaps');
			$this->load->model('map_model', '', TRUE);
			$config['center'] = '14.1876, 121.12508';
			$config['zoom'] = '13';
			$config['map_type'] = 'ROADMAP';
			$config['maxzoom'] = 0;
			$config['minzoom'] = 13;
			$config['mapTypeControlStyle'] = "DROPDOWN_MENU";
			$config['map_types_available'] = array("HYBRID", "ROADMAP");

			$config['onclick'] =   'var inc_lat = document.getElementById("inc_lat");
									inc_lat.value = event.latLng.lat();
									var inc_long = document.getElementById("inc_long");
									inc_long.value = event.latLng.lng();
									createMarker({ map: map, position:event.latLng , draggable: true});';


			$coords_inc = $this->map_model->get_coordinates_inc();
			// Loop through the coordinates we obtained above and add them to the map
			foreach ($coords_inc as $coordinate) {
				$marker = array();
				$marker['draggable'] = FALSE;
				$marker['clickable'] = TRUE;

				$a1 = $coordinate->inc_id;
				$a2 = $coordinate->inc_type;
				$a3 = $coordinate->street;
				$a4 = $coordinate->barangay;
				$a5 = $coordinate->description;
				$a6 = $coordinate->start_date;
				$a7 = $coordinate->end_date;
				$a8 = $coordinate->latitude;
				$a9 = $coordinate->longitude;

				$htmlstring =  $this->setInfowindow_inc($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9);
				$marker['infowindow_content'] = $htmlstring;


				$marker['title'] = $coordinate->inc_id.','.$coordinate->inc_type.' at '.$coordinate->barangay;
				if ($coordinate->inc_type == 'Accident'){
					$marker['icon'] = base_url().'styles/img/markers/inc/accident.png';
				}else if ($coordinate->inc_type == 'Obstruction'){
					$marker['icon'] = base_url().'styles/img/markers/inc/obstruction.png';
				}else if ($coordinate->inc_type == 'Public Event'){
					$marker['icon'] = base_url().'styles/img/markers/inc/event.png';
				}else if ($coordinate->inc_type == 'Flood'){
					$marker['icon'] = base_url().'styles/img/markers/inc/flood.png';
				}else if ($coordinate->inc_type == 'Strike'){
					$marker['icon'] = base_url().'styles/img/markers/inc/strike.png';
				}else if ($coordinate->inc_type == 'Funeral'){
					$marker['icon'] = base_url().'styles/img/markers/inc/funeral.png';
				}

				
				$marker['position'] = $coordinate->latitude.','.$coordinate->longitude;
				$this->googlemaps->add_marker($marker);
			}


			$this->googlemaps->initialize($config);
			$data['map'] = $this->googlemaps->create_map();

			$this->load->model('incidentAccess');
			$data['query'] = $this->incidentAccess->incident_getAll();

			$this->load->view('incident-new', $data);
		}
		else{
		//If no session, redirect to login page
		redirect(base_url());
		}
	}


	public function addIncident(){
		/*gets the necessary information from the submitted form*/
		$classification = $_POST['inc_classification'];
		$desc = $_POST['inc_desc'];
		$start = $_POST['inc_start'];
		$end = $_POST['inc_end'];
		$street = $_POST['inc_street'];
		$brgy = $_POST['inc_barangay'];
		$latitude = $_POST['inc_lat'];
		$longitude = $_POST['inc_long'];
		
		$status = $this->incidentAccess->addNewIncident($classification, $desc, $start, $end, $street, $brgy, $latitude, $longitude);
		if($status == ''){
			header("Location: ".base_url()."index.php/incidentsManager");
		}else{
			$this->load->view("message", array('message'=> 'Error.'));
		}

	}

	public function setInfowindow_inc($inc_id, $inc_type, $street, $barangay, $description, $start_date, $end_date, $latitude, $longitude) {
		$infowindow_string = 	'<html><body>'.
								'<div style="min-width: 250px; max-width: 300px; width: 300px;"><p style="margin-top: -2px; border-bottom: 1px solid grey;">'.'Incident # '.$inc_id.'<br />'.
								$inc_type.'</p>';
		if($description != '')
			$infowindow_string = $infowindow_string.'<p>'.$description.'</p>';


		if($street != '')
			$infowindow_string = $infowindow_string.'<p style="color:grey;">'.$street.', '.$barangay.'<br />'.$start_date;
		else $infowindow_string = $infowindow_string.'<p style="color:grey;">'.$barangay.'<br />'.$start_date;

		if($end_date != '0000-00-00')
			$infowindow_string = $infowindow_string.' to '.$end_date;

		$infowindow_string = $infowindow_string.'</p></div></body></html>';

		return $infowindow_string;

	}

	public function GetAllIncidents(){
		$this->load->model('incidentAccess');
		$data['query_inc'] = $this->incidentAccess->incident_getAll();
		$this->load->view('incident', $data);
	}

}
