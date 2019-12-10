<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


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
        
        $this->loadViews("project/addNewProject1", $this->global, NULL , NULL);
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
            
            // $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            //$this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            // $this->form_validation->set_rules('password','Password','required|max_length[20]');
            // $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('yApproved','Year Approved','trim|required|numeric');
            //$this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewProject();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                //$email = strtolower($this->security->xss_clean($this->input->post('email')));
                $title = $this->input->post('title');
                $code = $this->input->post('code');
                $projectLoc = $this->input->post('projectLoc');
                $yApproved = $this->input->post('yApproved');
                $dateReleased = $this->input->post('dateReleased');
                $projectDurFrom = $this->input->post('projectDurFrom');
                $projectDurTo = $this->input->post('projectDurTo');
                $proponent = $this->input->post('proponent');
                $beneficiries = $this->input->post('beneficiries');
                $province = $this->input->post('province');
                $Dreleased = $this->input->post('Dreleased');
                $Areleased = $this->input->post('Areleased');
                $amountLiquidated = $this->input->post('aLiquidated');
                $unliquatedbal = $this->input->post('unliquatedbal');
                $amountDueLiq = $this->input->post('amountDueLiq');
                $finanreport = $this->input->post('finanreport');
                $fundstatus = $this->input->post('fundstatus');
                $complereport = $this->input->post('complereport');
                $terreport = $this->input->post('terreport');
                $prostatus = $this->input->post('prostatus');
                $quarstatus = $this->input->post('quarstatus');
                $amountToRefund = $this->input->post('amountToRefund');
                $refund = $this->input->post('refund');
                $request = $this->input->post('request');

                $userInfo = array('projTitle'=>$title, 
                                'projCode'=>$code,
                                'projLocation'=>$projectLoc,
                                'yearCharged'=>$yApproved,
                                'dateReleased'=> $dateReleased,
                                'dateDurFrom'=>$projectDurFrom, 
                                'dateDurTo'=>$projectDurTo,
                                'proponent'=>$proponent, 
                                'beneficiaries'=>$beneficiries, 
                                'province'=>$province, 
                                'budgetdatereleased'=>$Dreleased, 
                                'amountReleased'=>$Areleased,
                                'amountLiquidated'=>$amountLiquidated,
                                'unliquitedBalance'=>$unliquatedbal, 
                                'amountDueLiquidation'=>$amountDueLiq, 
                                'financialreport'=>$finanreport, 
                                'fundstatus'=>$fundstatus, 
                                'completionreport'=>$complereport, 
                                'terminalReport'=>$terreport, 
                                'projectstatus'=>$prostatus, 
                                'quarstatProgRep'=>$quarstatus, 
                                'amountDueRefund'=>$amountToRefund, 
                                'refund'=>$refund, 
                                'reques'=>$request);
            
                var_dump($userInfo);
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
    
}

?>