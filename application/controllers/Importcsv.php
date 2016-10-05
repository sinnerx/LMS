<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class ImportCSV extends CI_Controller {
	public $userid;  
  	public $userLevel;

	  public function __construct()
	  {
	    parent::__construct();
	    $this->load->helper('url'); 
	    $this->load->helper('form');
	    $this->load->library( 'nativesession' );     
	    $this->load->library( 'excel' );     
	 	$this->load->model('template_model');
	    $this->userid = $this->nativesession->get( 'userid' );
	    $this->userLevel = $this->nativesession->get( 'userLevel' );    
	  }

	  public function index (){
	  	$data['page_title'] = 'LMS';
	    $data['nav_title'] = 'Import';
	    $data['nav_subtitle'] = 'Import CSV';
	    $data['home'] = 'Home';

	    // var_dump(FCPATH);
	    // var_dump(is_dir(FCPATH.'/application/uploads/'));

	    if($_SERVER['REQUEST_METHOD'] == 'POST'){

 			$config['upload_path']          = FCPATH. '/application/uploads/tmp';
            $config['allowed_types']        = 'gif|jpg|png|xls|xlsx';
            //$config['max_size']             = 100000;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;

            $this->load->library('upload', $config);

		    if (!is_dir(FCPATH. 'application/uploads/tmp'))
		    {
		        mkdir(FCPATH. 'application/uploads/tmp', 0777, true);
		    }            

			$files = $_FILES;
            $cpt = count($_FILES['importfile']['name']);
             for($i=0; $i<$cpt; $i++)
            {
                $_FILES['importfile']['name']= $files['importfile']['name'][$i];
                $_FILES['importfile']['type']= $files['importfile']['type'][$i];
                $_FILES['importfile']['tmp_name']= $files['importfile']['tmp_name'][$i];
                $_FILES['importfile']['error']= $files['importfile']['error'][$i];
                $_FILES['importfile']['size']= $files['importfile']['size'][$i];
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('importfile')):
			      $error = array('error' => $this->upload->display_errors());
			      var_dump($error);
			    else:
			    	if ($this->upload->data('file_ext') == ".xlsx" || $this->upload->data('file_ext') == ".xls"){
			    		$data = array('upload_data' => $this->upload->data());
			    	}
			    endif;
                
          
                // $fileName = $_FILES['importfile']['name'];
                 // $images[] = $fileName;
			}

			// die;

			/////BEFORE MULTIPLE UPLOAD
		    // if (!$this->upload->do_upload('importfile')):
		    //   $error = array('error' => $this->upload->display_errors());
		    //   var_dump($error);
		    // else:
		    //   $data = array('upload_data' => $this->upload->data());
		    // endif;


    		//var_dump($_FILES['importfile']);
			//die; 


	    	//$file = $_FILES['importfile']['name'];
	    	//var_dump($file);
	    	//die;
			//load the excel library
			$this->load->library('excel');
			 
			//read file from path
			if(empty($data['upload_data']))
				return;

			$objPHPExcel = PHPExcel_IOFactory::load($data['upload_data']['full_path']);
			 
			//get only the Cell Collection
			// $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();	
			$cell_collection = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);	
			// var_dump($cell_collection);
			// die;
			// $cell_collection = $objPHPExcel->getActiveSheet()->getDrawingCollection();	

			//extract to a PHP readable array format
			
			// foreach ($cell_collection as $cell) {
			// 	// var_dump($cell);
			// 	// die;
			//     $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			//     // var_dump($column);
			//     $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			//     $objPHPExcel->getActiveSheet()->getCell($cell)->getValue() ? $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue() : $data_value = '';
			 
			//     //header will/should be in row 1 only. of course this can be modified to suit your need.
			//     if ($row == 1) {
			//         $header[$row][$column] = $data_value;
			//     } else {
			//         $arr_data[$row][$column] = $data_value;
			//     }
			// }
			 
			// //send the data in an array format
			// $data['header'] = $header;
			// $data['values'] = $arr_data;   	

			// //var_dump($data['values']);

			// $values = $data['values'];
			array_shift($cell_collection);
			$values = $cell_collection;
			// var_dump($values);
			// die;
			$counter = 0;
			$arrayList = array();


			$this->load->model('questions_data');
			$this->load->model('answer_data');
			$this->load->model('coursedata');


			foreach ($values as $keyQuestion => $valueQuestion) {

				if ($counter == 2)
					break;

				# code...
				# insert into question table
				 // var_dump($valueQuestion);
				$code 		= $valueQuestion['A'];
				$type 		= $valueQuestion['B'];
				$quest 		= $valueQuestion['C'];
				
				isset($valueQuestion['D']) ? $imgpath = $valueQuestion['D'] : $imgpath  = '';
				

				$moduleID = $this->coursedata->get_by_code($code);

				isset($moduleID) ? $moduleID = $moduleID->id : $moduleID = null;
				
				// var_dump($counter. " ". $imgpath);
				// var_dump($moduleID);
				// die;
				$arrayQuestModel = array(
					"id" => $moduleID,
					"type" => $type,
					"q_text" => $quest,
					//"img_path" => $imgpath,
					);
				// var_dump($arrayQuest);
				// die;
				
				$questID = $this->questions_data->insert_question($arrayQuestModel);
				

				$x = 1;

				//$arrayQuestion = array();
				$arrayAnswer = array();
				// var_dump($valueQuestion);
				//die;
				foreach ($valueQuestion as $keyDetails => $valueDetails) {
					
				// 	// var_dump($valueDetails);
				// 	# code...
				// 	$module = $valueQuestion;
				// 	var_dump($module);


					// if($keyDetails == 'E' || $keyDetails == 'F' || $keyDetails == 'G' || $keyDetails == 'H'){
					// 	if ($valueDetails != ''){
					// 		// var_dump($valueDetails);
					// 		# insert into answer table with q_id 
					// 		$arrayAnswerModel = array(
					// 			"q_id" 		=> $questID,
					// 			"a_text" 	=> $valueDetails,
					// 			);

					// 		$answerID = $this->answer_data->insert_answer($arrayAnswerModel);

					// 		$arrayAnswer[$x] = $answerID;
					// 		$x++;
					// 	}
					// }		

					if($keyDetails == 'E' || $keyDetails == 'F' || $keyDetails == 'G' || $keyDetails == 'H'){
						if ($valueDetails != ''){
							if($keyDetails == 'E'){
								$arrayAnswerModel = array(
									"q_id" 		=> $questID,
									"a_text" 	=> $valueDetails,
									//"a_img_path" 	=> $finalImagePathAns,
									);

									$answerID = $this->answer_data->insert_answer($arrayAnswerModel);

									$arrayAnswer[$x] = $answerID;
									$x++;

								if(isset($valueQuestion['J'])){
									$imgPathAns = $valueQuestion['J'];
									

									//move img ans to the correct folder
									$arrayFileRelocate = array(
											'imgPath' 		=> $imgPathAns,
											'code' 			=> $code,
											'questID' 		=> $questID,
											'answerID' 		=> $answerID
										);

									$finalImgPathAnswer = $this->relocateImageFile($arrayFileRelocate);
									// var_dump($finalImgPathAnswer);
									$arrayUpdateImgPathAns = array(
										"imgPath" => $finalImgPathAnswer,
										"answerID" => $answerID,
										);	

									$this->answer_data->update_image_path($arrayUpdateImgPathAns);									
								} 
																
							}
								
							else if($keyDetails == 'F'){
								$arrayAnswerModel = array(
									"q_id" 		=> $questID,
									"a_text" 	=> $valueDetails,
									//"a_img_path" 	=> $finalImagePathAns,
									);

									$answerID = $this->answer_data->insert_answer($arrayAnswerModel);

									$arrayAnswer[$x] = $answerID;
									$x++;
								if(isset($valueQuestion['K'])){
									$imgPathAns = $valueQuestion['K'];
									

									//move img ans to the correct folder
									$arrayFileRelocate = array(
											'imgPath' 		=> $imgPathAns,
											'code' 			=> $code,
											'questID' 		=> $questID,
											'answerID' 		=> $answerID
										);

									$finalImgPathAnswer = $this->relocateImageFile($arrayFileRelocate);
									// var_dump($finalImgPathAnswer);
									$arrayUpdateImgPathAns = array(
										"imgPath" => $finalImgPathAnswer,
										"answerID" => $answerID,
										);	

									$this->answer_data->update_image_path($arrayUpdateImgPathAns);									
									}	
																	
							}
														
							else if($keyDetails == 'G'){
								$arrayAnswerModel = array(
									"q_id" 		=> $questID,
									"a_text" 	=> $valueDetails,
									//"a_img_path" 	=> $finalImagePathAns,
									);

									$answerID = $this->answer_data->insert_answer($arrayAnswerModel);

									$arrayAnswer[$x] = $answerID;
									$x++;
								if(isset($valueQuestion['L'])){
									$imgPathAns = $valueQuestion['L'];
									

									//move img ans to the correct folder
									$arrayFileRelocate = array(
											'imgPath' 		=> $imgPathAns,
											'code' 			=> $code,
											'questID' 		=> $questID,
											'answerID' 		=> $answerID
										);

									$finalImgPathAnswer = $this->relocateImageFile($arrayFileRelocate);
									// var_dump($finalImgPathAnswer);
									$arrayUpdateImgPathAns = array(
										"imgPath" => $finalImgPathAnswer,
										"answerID" => $answerID,
										);	

									$this->answer_data->update_image_path($arrayUpdateImgPathAns);									
									}									
							}
														
							else if($keyDetails == 'H'){
								$arrayAnswerModel = array(
									"q_id" 		=> $questID,
									"a_text" 	=> $valueDetails,
									//"a_img_path" 	=> $finalImagePathAns,
									);

									$answerID = $this->answer_data->insert_answer($arrayAnswerModel);

									$arrayAnswer[$x] = $answerID;
									$x++;
								if(isset($valueQuestion['M'])){
									//var_dump('M field');
									$imgPathAns = $valueQuestion['M'];
									// var_dump($imgPathAns);

									//move img ans to the correct folder
									$arrayFileRelocate = array(
											'imgPath' 		=> $imgPathAns,
											'code' 			=> $code,
											'questID' 		=> $questID,
											'answerID' 		=> $answerID
										);

									$finalImgPathAnswer = $this->relocateImageFile($arrayFileRelocate);
									// var_dump($finalImgPathAnswer);
									$arrayUpdateImgPathAns = array(
										"imgPath" => $finalImgPathAnswer,
										"answerID" => $answerID,
										);	

									$this->answer_data->update_image_path($arrayUpdateImgPathAns);									
								}																
							}
						}//valueDetails != ''

						else if ($valueDetails == ''){
							if($keyDetails == 'E'){
								if(isset($valueQuestion['J']) && !isset($valueQuestion['E'])){
									$imgPathAns = $valueQuestion['J'];

									$answerID = $this->answer_data->insert_answer(array('q_id' => $questID, 'a_text' => ''));

									$arrayAnswer[$x] = $answerID;
									$x++;

									//move img ans to the correct folder
									$arrayFileRelocate = array(
											'imgPath' 		=> $imgPathAns,
											'code' 			=> $code,
											'questID' 		=> $questID,
											'answerID' 		=> $answerID
										);

									$finalImgPathAnswer = $this->relocateImageFile($arrayFileRelocate);
									
									$arrayUpdateImgPathAns = array(
										"imgPath" => $finalImgPathAnswer,
										"answerID" => $answerID,
										);	

									$this->answer_data->update_image_path($arrayUpdateImgPathAns);

								}

							}
							else if ($keyDetails == 'F'){
								if(isset($valueQuestion['K'])){

									$imgPathAns = $valueQuestion['K'];

									$answerID = $this->answer_data->insert_answer(array('q_id' => $questID, 'a_text' => ''));

									$arrayAnswer[$x] = $answerID;
									$x++;

									//move img ans to the correct folder
									$arrayFileRelocate = array(
											'imgPath' 		=> $imgPathAns,
											'code' 			=> $code,
											'questID' 		=> $questID,
											'answerID' 		=> $answerID
										);

									$finalImgPathAnswer = $this->relocateImageFile($arrayFileRelocate);
									
									$arrayUpdateImgPathAns = array(
										"imgPath" => $finalImgPathAnswer,
										"answerID" => $answerID,
										);	

									$this->answer_data->update_image_path($arrayUpdateImgPathAns);									

								}								

							}
							else if ($keyDetails == 'G'){
								if(isset($valueQuestion['L'])){

									$imgPathAns = $valueQuestion['L'];

									$answerID = $this->answer_data->insert_answer(array('q_id' => $questID, 'a_text' => ''));

									$arrayAnswer[$x] = $answerID;
									$x++;

									//move img ans to the correct folder
									$arrayFileRelocate = array(
											'imgPath' 		=> $imgPathAns,
											'code' 			=> $code,
											'questID' 		=> $questID,
											'answerID' 		=> $answerID
										);

									$finalImgPathAnswer = $this->relocateImageFile($arrayFileRelocate);
									
									$arrayUpdateImgPathAns = array(
										"imgPath" => $finalImgPathAnswer,
										"answerID" => $answerID,
										);	

									$this->answer_data->update_image_path($arrayUpdateImgPathAns);									

								}								
								
							}
							else if ($keyDetails == 'H'){
								if(isset($valueQuestion['M'])){

									$imgPathAns = $valueQuestion['M'];

									$answerID = $this->answer_data->insert_answer(array('q_id' => $questID, 'a_text' => ''));

									$arrayAnswer[$x] = $answerID;
									$x++;

									//move img ans to the correct folder
									$arrayFileRelocate = array(
											'imgPath' 		=> $imgPathAns,
											'code' 			=> $code,
											'questID' 		=> $questID,
											'answerID' 		=> $answerID
										);

									$finalImgPathAnswer = $this->relocateImageFile($arrayFileRelocate);
									
									$arrayUpdateImgPathAns = array(
										"imgPath" => $finalImgPathAnswer,
										"answerID" => $answerID,
										);	

									$this->answer_data->update_image_path($arrayUpdateImgPathAns);									

								}								
								
							}														
						}//valueDetails == ''
					}							
					
					
				}//end foreach answer
				// var_dump($arrayAnswer);

				$arrayUpdateCorrectAnswer = array(
					"correctAnswerID" => $arrayAnswer[$valueQuestion['I']],
					"questionID" => $questID,
					);

				

				if ($imgpath != ''){
					$filename = FCPATH. 'application/uploads/tmp/' . $imgpath;

					if (file_exists($filename)) {
						$ext = pathinfo($filename, PATHINFO_EXTENSION);
						if (!is_dir(FCPATH. 'application/uploads/'. $code))
						    {
						        mkdir(FCPATH. 'application/uploads/'. $code, 0777, true);
						    }  					

						$newImagePath = FCPATH . 'application/uploads/' . $code . '/' . 'Q' . $questID . '.' . $ext;
						rename(FCPATH. 'application/uploads/tmp/'. $imgpath , $newImagePath);
						$questImagePath = $code . '/' . 'Q' . $questID . '.' . $ext;
					}					
				}
				else
				{
					$questImagePath = '';
				}
				//var_dump($questImagePath);
				$arrayUpdateImgPath = array(
					"imgPath" => $questImagePath,
					"questionID" => $questID,
					);

				$this->questions_data->update_correct_answer($arrayUpdateCorrectAnswer);
				$this->questions_data->update_image_path($arrayUpdateImgPath);

				// die;
				$counter++;
			}//end foreach question
			  //die;
			// var_dump($arrayList);

			$filesTmp = glob(FCPATH. 'application/uploads/tmp/*'); // get all file names
			foreach($filesTmp as $file){ // iterate files
			  if(is_file($file)){
			  	unlink($file); // delete file
			  }
			   
			}
	    }//END IF POST
		


		// foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		//     $worksheetTitle     = $worksheet->getTitle();
		//     $highestRow         = $worksheet->getHighestRow(); // e.g. 10
		//     $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
		//     $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		//     $nrColumns = ord($highestColumn) - 64;
		//     echo "<br>The worksheet ".$worksheetTitle." has ";
		//     echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
		//     echo ' and ' . $highestRow . ' row.';
		//     echo '<br>Data: <table border="1"><tr>';
		//     for ($row = 1; $row <= $highestRow; ++ $row) {
		//         echo '<tr>';
		//         for ($col = 0; $col < $highestColumnIndex; ++ $col) {
		//             $cell = $worksheet->getCellByColumnAndRow($col, $row);
		//             $val = $cell->getValue();
		//             $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
		//             echo '<td>' . $val . '<br>(Typ ' . $dataType . ')</td>';
		//         }
		//         echo '</tr>';
		//     }
		//     echo '</table>';
		// }

        $data['userid'] = $this->userid;
        $data['userLevel'] = $this->userLevel;
        $data['message'] = 'My Message';

	    $this->load->view('page_view',$data);
	    $this->load->view('import/importcsv', $data);
	  }

	private function reArrayFiles(&$file_post) {

	    $file_ary = array();
	    $file_count = count($file_post['name']);
	    $file_keys = array_keys($file_post);

	    for ($i=0; $i<$file_count; $i++) {
	        foreach ($file_keys as $key) {
	            $file_ary[$i][$key] = $file_post[$key][$i];
	        }
	    }

	    return $file_ary;
	}

	private function relocateImageFile($data){

		$imgPath 	= $data['imgPath'];
		$code 		= $data['code'];
		$questID	= $data['questID'];
		$answerID	= 'A'. $data['answerID'];

		$filename = FCPATH. 'application/uploads/tmp/' . $imgPath;

		if (file_exists($filename)) {
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if (!is_dir(FCPATH. 'application/uploads/'. $code))
			    {
			        mkdir(FCPATH. 'application/uploads/'. $code, 0777, true);
			    }  					

			$newImagePath = FCPATH . 'application/uploads/' . $code . '/' . 'Q' . $questID . $answerID .'.' . $ext;
			rename(FCPATH. 'application/uploads/tmp/'. $imgPath , $newImagePath);
			$finalImagePath = $code . '/' . 'Q' . $questID . $answerID . '.' . $ext;
		}
		else {
			$finalImagePath = "";
		}

		return $finalImagePath;

	}
}
