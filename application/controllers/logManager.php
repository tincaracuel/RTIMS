<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class logManager extends CI_Controller {

	public function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			header("Location: ".base_url()."index.php/mapsManager");
		}
		else{
			$this->load->library('googlemaps');
			$this->load->model('map_model', '', TRUE);
			$config['center'] = '14.1885, 121.12508';
			$config['zoom'] = '13';
			$config['map_type'] = 'ROADMAP';
			$config['maxzoom'] = 0;
			$config['minzoom'] = 13;
			$config['mapTypeControlStyle'] = "DROPDOWN_MENU";
			$config['map_types_available'] = array("HYBRID", "ROADMAP");

			$coords_rw = $this->map_model->get_coordinates_rw();
			// Loop through the coordinates we obtained above and add them to the map

			$data['rctr0'] = $data['rctr1'] = $data['rctr2'] = $data['rctr3'] = $data['rctr4'] = $data['rctr5'] = $data['rctr6'] = $data['rctr7'] = $data['rctr8'] = $data['rctr9'] = 0;
			foreach ($coords_rw as $coordinate) {
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
				if ($coordinate->rwork_type == 'Construction'){
					$marker['icon'] = 'styles/img/markers/rw/construction.png';
					$marker['id'] = "rwCat0[".$data['rctr0']."]";
					$data['rctr0']++;
					$color = '#ac84e0';
				}else if ($coordinate->rwork_type == 'Rehabilitation'){
					$marker['icon'] = 'styles/img/markers/rw/rehabilitation.png';
					$marker['id'] = "rwCat1[".$data['rctr1']."]";
					$data['rctr1']++;
					$color = '#ffa621';
				}else if ($coordinate->rwork_type == 'Renovation'){
					$marker['icon'] = 'styles/img/markers/rw/renovation.png';
					$marker['id'] = "rwCat2[".$data['rctr2']."]";
					$data['rctr2']++;
					$color = '#55d7d7';
				}else if ($coordinate->rwork_type == 'Riprapping'){
					$marker['icon'] = 'styles/img/markers/rw/riprapping.png';
					$marker['id'] = "rwCat3[".$data['rctr3']."]";
					$data['rctr3']++;
					$color = '#00e13c';
				}else if ($coordinate->rwork_type == 'Application'){
					$marker['icon'] = 'styles/img/markers/rw/application.png';
					$marker['id'] = "rwCat4[".$data['rctr4']."]";
					$data['rctr4']++;
					$color = '#646464';
				}else if ($coordinate->rwork_type == 'Installation'){
					$marker['icon'] = 'styles/img/markers/rw/installation.png';
					$marker['id'] = "rwCat5[".$data['rctr5']."]";
					$data['rctr5']++;
					$color = '#d16d92';
				}else if ($coordinate->rwork_type == 'Reconstruction'){
					$marker['icon'] = 'styles/img/markers/rw/reconstruction.png';
					$marker['id'] = "rwCat6[".$data['rctr6']."]";
					$data['rctr6']++;
					$color = '#f34648';
				}else if ($coordinate->rwork_type == 'Concreting/Asphalting'){
					$marker['icon'] = 'styles/img/markers/rw/concreting.png';
					$marker['id'] = "rwCat7[".$data['rctr7']."]";
					$data['rctr7']++;
					$color = '#9e7151';
				}else if ($coordinate->rwork_type == 'Electrification'){
					$marker['icon'] = 'styles/img/markers/rw/electrification.png';
					$marker['id'] = "rwCat8[".$data['rctr8']."]";
					$data['rctr8']++;
					$color = '#5680fc';
				}else if ($coordinate->rwork_type == 'Roadway Lighting'){
					$marker['icon'] = 'styles/img/markers/rw/lighting.png';
					$marker['id'] = "rwCat9[".$data['rctr9']."]";
					$data['rctr9']++;
					$color = '#27b062';
				}

				$titleString = 'Roadwork # '.$coordinate->map_id.'\n'.$coordinate->rwork_name.'\n'.$coordinate->barangay.', Calamba City';
				$marker['title'] = $titleString;
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

			$coords_inc = $this->map_model->get_coordinates_inc();
			// Loop through the coordinates we obtained above and add them to the map
			$data['ictr0'] = $data['ictr1'] = $data['ictr2'] = $data['ictr3'] = $data['ictr4'] = $data['ictr5'] = 0;
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
				
				$marker['title'] = $coordinate->inc_type.'\n'.$coordinate->barangay.', Calamba City';
				if ($coordinate->inc_type == 'Accident'){
					$marker['icon'] = 'styles/img/markers/inc/accident.png';
					$marker['id'] = "incCat0[".$data['ictr0']."]";
					$data['ictr0']++;
					$color = '#ff2424';
				}else if ($coordinate->inc_type == 'Obstruction'){
					$marker['icon'] = 'styles/img/markers/inc/obstruction.png';
					$marker['id'] = "incCat1[".$data['ictr1']."]";
					$data['ictr1']++;
					$color = '#9d7050';
				}else if ($coordinate->inc_type == 'Public Event'){
					$marker['icon'] = 'styles/img/markers/inc/event.png';
					$marker['id'] = "incCat2[".$data['ictr2']."]";
					$data['ictr2']++;
					$color = '#e14f9e';
				}else if ($coordinate->inc_type == 'Funeral'){
					$marker['icon'] = 'styles/img/markers/inc/funeral.png';
					$marker['id'] = "incCat3[".$data['ictr3']."]";
					$data['ictr3']++;
					$color = '#1142d6';
				}else if ($coordinate->inc_type == 'Flood'){
					$marker['icon'] = 'styles/img/markers/inc/flood.png';
					$marker['id'] = "incCat4[".$data['ictr4']."]";
					$data['ictr4']++;
					$color = '#595959';
				}else if ($coordinate->inc_type == 'Strike'){
					$marker['icon'] = 'styles/img/markers/inc/strike.png';
					$marker['id'] = "incCat5[".$data['ictr5']."]";
					$data['ictr5']++;
					$color = '#00e13c';
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



			$polygon = array();
			$polygon['strokeOpacity'] = '0.3';
			$polygon['strokeWeight'] = '1.5';
			$polygon['strokeColor'] = '#080808';

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
			$this->googlemaps->add_polygon($polygon);

			//$this->roadworkAccess->getLatLng();


			$this->googlemaps->initialize($config);
			$data['map'] = $this->googlemaps->create_map();
			$data['ongoing_rw'] = $this->roadworkAccess->roadwork_getAllOngoing();
			$data['ongoing_inc'] = $this->incidentAccess->incident_getAllOngoing();
			$this->load->view('rtims', $data);						//this function directly go to log in page
		}
	}

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function logout(){								//destroy all the sessions when the user logged out
		$this->session->unset_userdata('logged_in');
    	session_destroy();
		redirect(base_url());
	}

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function checkUser(){
		$name = $_POST['username'];
		$password = $_POST['password'];
		$result = $this->logAccess->loginAdmin($name,$password);

		if($result){
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
				'username' => $row->admin_username,
				'pw' => $row->admin_password
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			header("Location: ".base_url()."index.php/mapsManager");
			return TRUE;
		}
		else{
			$this->session->set_flashdata('logInError', 'No match found for administrator!');
			redirect(base_url());
			return FALSE;
		}
	}

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function editAccount(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['pw'] = $session_data['pw'];

			//get password

			$this->load->view('account-edit', $data);

		}
		else{
		//If no session, redirect to login page
		redirect(base_url());
		}
	}

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function updateAccount(){
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];

		$username = $data['username'];
		$new_pw = $_POST['new_password'];
				
		$status = $this->logAccess->updateAccount($username, md5($new_pw));
		if($status == ''){
			header("Location: ".base_url()."index.php/mapsManager");
		}else{
			$this->load->view("message", array('message'=> 'Error.'));
		}
	}

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
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
	public function submitRoadworkReport(){
		/*gets the necessary information from the submitted form*/
		$name = $_POST['sender_name'];
		$email = $_POST['sender_email'];
		$contact = $_POST['sender_contact'];
		$contract_number = $_POST['rwork_cn'];
		$report = $_POST['rw_report'];
		
		$status = $this->reportAccess->addNewRoadworkReport($name, $email, $contact, $contract_number, $report);
		if($status == ''){
			header("Location: ".base_url()."");
		}else{
			$this->load->view("message", array('message'=> 'Error.'));
		}
	}

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function submitIncidentReport(){
		/*gets the necessary information from the submitted form*/
		$name = $_POST['sender_name'];
		$email = $_POST['sender_email'];
		$contact = $_POST['sender_contact'];
		$inc_id = $_POST['inc_id'];
		$report = $_POST['inc_report'];
		
		$status = $this->reportAccess->addNewIncidentReport($name, $email, $contact, $inc_id, $report);
		if($status == ''){
			header("Location: ".base_url()."");
		}else{
			$this->load->view("message", array('message'=> 'Error.'));
		}
	}

	/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function submitNewReport(){
		/*gets the necessary information from the submitted form*/
		$name = $_POST['sender_name'];
		$email = $_POST['sender_email'];
		$contact = $_POST['sender_contact'];
		$subject = $_POST['subject'];
		$report = $_POST['report'];
		
		$status = $this->reportAccess->addNewReport($name, $email, $contact, $subject, $report);
		if($status == ''){
			header("Location: ".base_url()."");
		}else{
			$this->load->view("message", array('message'=> 'Error.'));
		}
	}

}
