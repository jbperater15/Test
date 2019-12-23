<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

//require APPPATH . '/vendor/PhpOffice/PhpSpreadsheet/src/Bootstrap.php';




class Project extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('user_model');
        $this->load->model('project_model');
        $this->load->library('excel');
        $this->load->helper('date');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    function addNewProject()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';

        $data['fundStatus'] = $this->project_model->getFundStatus();
        $data['projectStatus'] = $this->project_model->getProjectStatus();
        $data['approvedRequest'] = $this->project_model->getApprovedRequest();
        $this->loadViews("project/addNewProject1", $this->global, $data , NULL);
    }

    function editOldProject($projectId = NULL){

        if($projectId == null)
            {
                redirect('projectListing');
            }
            
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');
            $projectStatus = $this->input->post('projectStatus');
            $fundStatus = $this->input->post('fundStatus');
            $approvedRequest = $this->input->post('approvedRequest');
            $monthyear = $this->input->post('monthyear');
            
            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
            $data['monthyear'] = $monthyear;
           
            $data['fundStatus2'] = $this->project_model->getFundStatus();
            

            $data['projectStatus2'] = $this->project_model->getProjectStatus();
            $data['approvedRequest2'] = $this->project_model->getApprovedRequest();
            $data['projectData'] = $this->project_model->getProjectData($projectId);

            $this->global['pageTitle'] = 'CodeInsect : Edit User';
            
            $this->loadViews("project/editOldProject", $this->global, $data, NULL);
    }

    function updateProject()
    {
        $projectId = $this->input->post('projectId');
        $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
        $title = $this->input->post('title');
        $code = $this->input->post('code');
        $projectLoc = $this->input->post('projectLoc');
        $yApproved = $this->input->post('yearApproved');
        $dateReleased = $this->input->post('dateReleased');
        $projectDurFrom = $this->input->post('projectDurFrom');
        $projectDurTo = $this->input->post('projectDurTo');
        $proponent = $this->input->post('proponent');
        $gender = $this->input->post('gender');
        $beneficiaries = $this->input->post('beneficiaries');
        $province = $this->input->post('province');
        $Dreleased = $this->input->post('Dreleased');
        $Areleased = $this->input->post('Areleased');
        $amountLiquidated = $this->input->post('aLiquidated');
        $unliquatedbal = $this->input->post('unliquatedbal');
        $amountDueLiq = $this->input->post('amountDueLiq');
        $finanreport = $this->input->post('finanreport');
        $fundStatus = $this->input->post('fundStatus');
        $complereport = $this->input->post('complereport');
        $terreport = $this->input->post('terreport');
        $projectStatus = $this->input->post('projectStatus');
        $quarstatus = $this->input->post('quarstatus');
        $amountToRefund = $this->input->post('amountToRefund');
        $refund = $this->input->post('refund');
        $request = $this->input->post('request');
        $approvedRequest = $this->input->post('approvedRequest');

        $projectInfo = array();

        $projectInfo = array('projTitle'=>$title, 
                        'projCode'=>$code,
                        'projLocation'=>$projectLoc,
                        'yearCharged'=>$yApproved,
                        'dateReleased'=> $dateReleased,
                        'dateDurFrom'=>$projectDurFrom, 
                        'dateDurTo'=>$projectDurTo,
                        'proponent'=>$proponent,
                        'proponentGender'=>$gender,
                        'beneficiaries'=>$beneficiaries, 
                        'province'=>$province, 
                        'budgetdatereleased'=>$Dreleased, 
                        'amountReleased'=>$Areleased,
                        'amountLiquidated'=>$amountLiquidated,
                        'unliquitedBalance'=>$unliquatedbal, 
                        'amountDueLiquidation'=>$amountDueLiq, 
                        'financialreport'=>$finanreport, 
                        'fundStatus'=>$fundStatus, 
                        'completionreport'=>$complereport, 
                        'terminalReport'=>$terreport, 
                        'projectStatus'=>$projectStatus, 
                        'quarstatProgRep'=>$quarstatus, 
                        'amountDueRefund'=>$amountToRefund, 
                        'refund'=>$refund, 
                        'reques'=>$request,
                        'approvedRequest' => $approvedRequest)
        ;
        //exit();
        $this->load->model('project_model');

       

        $result = $this->project_model->editProject($projectInfo, $projectId);
        
        if($result == true)
        {
            $this->session->set_flashdata('success', 'Project added Success Fully');
        }
        else
        {
            $this->session->set_flashdata('error', 'Project failed to Add');
        }
        
        redirect('projectListing2');
    }

    function deleteProject()
    {
        $id = $this->input->post('userId');
        $this->project_model->deleteProject($id);
        //redirect('projectListing2');
    }

    function insertNewProject()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Full Name','trim|required|max_length[128]');
            //$this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            // $this->form_validation->set_rules('password','Password','required|max_length[20]');
            // $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            // $this->form_validation->set_rules('yApproved','Year Approved','trim|required|numeric');
            //$this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewProject();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $title = $this->input->post('title');
                $code = $this->input->post('code');
                $projectLoc = $this->input->post('projectLoc');
                $yApproved = $this->input->post('yearApproved');
                $dateReleased = $this->input->post('dateReleased');
                $projectDurFrom = $this->input->post('projectDurFrom');
                $projectDurTo = $this->input->post('projectDurTo');
                $proponent = $this->input->post('proponent');
                $gender = $this->input->post('gender');
                $beneficiaries = $this->input->post('beneficiaries');
                $province = $this->input->post('province');
                $Dreleased = $this->input->post('Dreleased');
                $Areleased = $this->input->post('Areleased');
                $amountLiquidated = $this->input->post('aLiquidated');
                $unliquatedbal = $this->input->post('unliquatedbal');
                $amountDueLiquidation = $this->input->post('amountDueLiquidation');
                $finanreport = $this->input->post('finanreport');
                $fundStatus = $this->input->post('fundStatus');
                $complereport = $this->input->post('complereport');
                $terreport = $this->input->post('terreport');
                $projectStatus = $this->input->post('projectStatus');
                $quarstatus = $this->input->post('quarstatus');
                $amountToRefund = $this->input->post('amountToRefund');
                $refund = $this->input->post('refund');
                $request = $this->input->post('request');
                $approvedRequest = $this->input->post('approvedRequest');
                
                $userInfo = array('projTitle'=>$title, 
                                'projCode'=>$code,
                                'projLocation'=>$projectLoc,
                                'yearCharged'=>$yApproved,
                                'dateReleased'=> $dateReleased,
                                'dateDurFrom'=>$projectDurFrom, 
                                'dateDurTo'=>$projectDurTo,
                                'proponent'=>$proponent,
                                'proponentGender'=>$gender,
                                'beneficiaries'=>$beneficiaries, 
                                'province'=>$province, 
                                'budgetdatereleased'=>$Dreleased, 
                                'amountReleased'=>$Areleased,
                                'amountLiquidated'=>$amountLiquidated,
                                'unliquitedBalance'=>$unliquatedbal, 
                                'amountDueLiquidation'=>$amountDueLiquidation, 
                                'financialreport'=>$finanreport, 
                                'fundStatus'=>$fundStatus, 
                                'completionreport'=>$complereport, 
                                'terminalReport'=>$terreport, 
                                'projectstatus'=>$projectStatus, 
                                'quarstatProgRep'=>$quarstatus, 
                                'amountDueRefund'=>$amountToRefund, 
                                'refund'=>$refund, 
                                'reques'=>$request,
                                'approvedRequest'=>$approvedRequest,
                            );
                //exit();
                $this->load->model('project_model');
                $result = $this->project_model->insertNewProject($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Project added Success Fully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Project failed to Add');
                }
                
                redirect('addNewProject');
            }
        }
    }

    function projectListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->project_model->projectListingCount($searchText);

            $returns = $this->paginationCompress ( "projectListing/", $count, 10 );
            
            $data['userRecords'] = $this->project_model->projectListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Project Listing';
            
            $this->loadViews("project/projects", $this->global, $data, NULL);
        }
    }

    function projectListing1()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');
            $projectStatus = $this->input->post('projectStatus');
            $fundStatus = $this->input->post('fundStatus');
            $approvedRequest = $this->input->post('approvedRequest');
            $monthyear = $this->input->post('monthyear');
            
            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
            $data['monthyear'] = $monthyear;
           
            $data['fundStatus'] = $this->project_model->getFundStatus();
            $data['projectStatus'] = $this->project_model->getProjectStatus();
            $data['approvedRequest'] = $this->project_model->getApprovedRequest();
            
            $this->load->library('pagination');
            
            $count = $this->project_model->projectListing1Count($searchText,$fromDate,$toDate,$projectStatus,$fundStatus,$approvedRequest,$monthyear);

            $returns = $this->paginationCompress ( "projectListing1/", $count, 10 );
            
            $data['userRecords'] = $this->project_model->projectListing1($searchText, $fromDate, $toDate, $returns["page"], $returns["segment"], $projectStatus, $fundStatus, $approvedRequest, $monthyear);

            $this->global['pageTitle'] = 'Project Listing';
            $this->global['count'] = $count;
            
            $this->loadViews("project/projects1", $this->global, $data, NULL);
        }
    }

    function getProjectlisting(){

        // $search=  $this->input->get('id');
        // $query= $this->project_model->getProjectListing($search);
        // echo json_encode ($query);

        if(is_null($this->input->get('id')))
        {

        $this->load->view('input');    
        
        
        }
        else
        {
        
        
        $data['userRecords']=$this->project_model->getProjectListing($this->input->get('id')); 
        $this->global['pageTitle'] = 'Project Listing';

        $this->loadViews("project/projects1", $this->global, $data, NULL);
        
        }
    }

    function projectListing2()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');
            $projectStatus = $this->input->post('projectStatus');
            $fundStatus = $this->input->post('fundStatus');
            $approvedRequest = $this->input->post('approvedRequest');
            $monthyear = $this->input->post('monthyear');
            
            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
            $data['monthyear'] = $monthyear;
           
            $data['fundStatus'] = $this->project_model->getFundStatus();
            $data['projectStatus'] = $this->project_model->getProjectStatus();
            $data['approvedRequest'] = $this->project_model->getApprovedRequest();
            
            $data['userRecords'] = $this->project_model->projectListing2($searchText, $fromDate, $toDate, $projectStatus, $fundStatus, $approvedRequest, $monthyear);

            $this->global['pageTitle'] = 'Project Listing';
            
            $this->loadViews("project/projects2", $this->global, $data, NULL);
        }
    }

    public function books_page()
     {

          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $record = $this->project_model->projectListing2();

          $data = array();

          foreach($record->result() as $r) {

               $data[] = array(
                    $r->projTitle,
                    $r->projCode,
                    $r->proponent,
                    $r->yearCharged,
                    $r->projLocation,
                    $r->province,
                    $r->dateDurFrom,
                    $r->dateDurTo,
                    $r->fundStatus,
                    $r->amountReleased,
                    $r->amountDueRefund,
                    $r->amountLiquidated,
                    $r->approvedRequest,
                    $r->projectStatus
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $record->num_rows(),
                 "recordsFiltered" => $record->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
     }

    function getNotify()
    {   
        $year = '%Y';
        $year= (int)mdate($year);

        $month = '%m';
        $month= (int)mdate($month);
        $day = '%d';
        $dday= mdate($day);

        if($month >= 1)
        {
            if($month == 12)
            {
                $month = 3 ;
                $year = $year + 1;
            }
            elseif ($month == 11) 
            {
                $month = 2 ;
                $year = $year + 1;
            }
            elseif ($month == 10) 
            {
                $month = 1 ;
                $year = $year + 1;
            }
            else{
                $month = $month + 3;
            }
        }

        if($month >= 10)
        {
            $date = $year."-".$month."-".$dday ;
        }else{
            $date = $year."-0".$month."-".$dday ;
        }



        $count = $this->project_model->getNotify($date);
        $result['count'] = $count;
        // $result1 = json_encode($count);
        // var_dump($count);
        // var_dump($result1);
        echo json_encode($result);
    }

    function getDate()
    {
        $year = '%Y';
        $year= (int)mdate($year);

        $month = '%m';
        $month= (int)mdate($month);
        $day = '%d';
        $dday= mdate($day);

        if($month >= 1)
        {
            if($month == 12)
            {
                $month = 3 ;
                $year = $year + 1;
            }
            elseif ($month == 11) 
            {
                $month = 2 ;
                $year = $year + 1;
            }
            elseif ($month == 10) 
            {
                $month = 1 ;
                $year = $year + 1;
            }
            else{
                $month = $month + 3;
            }
        }

        if($month >= 10)
        {
            $date = $year."-".$month."-".$dday ;
        }else{
            $date = $year."-0".$month."-".$dday ;
        }


        

        $result = $this->project_model->getDataToNotify($date);

        $result['projectId'] = $result;

        echo json_encode($result);

        /*$format = 'DATE_RFC822';
        $time = time();
        echo standard_date();
        $date = DateTime::createFromFormat('j-M-Y', '15-Feb-2009');
        $new_date_format = $date->format('m-d');
        echo date_format($date, 'Y-m-d');*/
    }

     function addNewProjectStatusView()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';

        $status = $this->input->post('status');
        
        $this->loadViews("project/addNewProjectStatus", $this->global, NULL , NULL);
    }

    function addNewProjectStatus()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('status','Project Status','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewProjectStatus();
            }
            else
            {
                $status = ucwords(strtolower($this->security->xss_clean($this->input->post('status'))));
    
                $status = array('status'=>$status );
                $this->load->model('project_model');
                $result = $this->project_model->insertNewProjectStatus($status);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Project Status added Success Fully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Project Status failed to Add');
                }
                
                redirect('addNewProjectStatus');
            }
        }
    }
    
    function addNewFundStatusView()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';

        $status = $this->input->post('status');
        
        $this->loadViews("project/addNewFundStatus", $this->global, NULL , NULL);
    }

    function addNewFundStatus()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('status','Fund Status','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewFundStatusView();
            }
            else
            {
                $status = ucwords(strtolower($this->security->xss_clean($this->input->post('status'))));
    
                $status = array('status'=>$status );
                $this->load->model('project_model');
                $result = $this->project_model->insertNewFundStatus($status);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Fund Status added Success Fully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Fund Status failed to Add');
                }
                
                redirect('addNewFundStatus');
            }
        }
    }

    public function createExcel() {
        $fileName = 'employee.xlsx';  
        $employeeData = $this->project_model->getApprovedRequest();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'approvedRequestId');
        $sheet->setCellValue('B1', 'status');
        // $sheet->setCellValue('C1', 'Skills');
        // $sheet->setCellValue('D1', 'Address');
        // $sheet->setCellValue('E1', 'Age');
        // $sheet->setCellValue('F1', 'Designation');       
        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val['approvedRequestId']);
            $sheet->setCellValue('B' . $rows, $val['status']);
            // $sheet->setCellValue('C' . $rows, $val['skills']);
            // $sheet->setCellValue('D' . $rows, $val['address']);
            // $sheet->setCellValue('E' . $rows, $val['age']);
            // $sheet->setCellValue('F' . $rows, $val['designation']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/".$fileName);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);              
    }    

    public function createXLS() {
    // create file name
        $fileName = 'data-'.time().'.xlsx';  
    // load excel library
        $this->load->library('excel');
        $data = $this->project_model->projectListing1(null,null,null,null,null,null,null,null,null,);

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'First Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Last Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'DOB');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact_No');       
        // set Row
        $rowCount = 2;
        foreach ($data as $record) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $record->projTitle );
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $record->projCode );
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $record->proponent );
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $record->yearCharged );
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $record->fundStatus );
            $rowCount++;
        }
        $filename = "Data". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');      
    }
    
}

?>