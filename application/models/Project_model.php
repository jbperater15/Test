<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Project_model extends CI_Model
{

    function insertNewProject($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('projects_monitoring', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function projectListingCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('projects_monitoring as BaseTbl');
        //$this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.projTitle  LIKE '%".$searchText."%'
                            OR  BaseTbl.projCode  LIKE '%".$searchText."%'
                            OR  BaseTbl.projLocation  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        //$this->db->where('BaseTbl.isDeleted', 0);
        //$this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    
    function projectListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('projects_monitoring as BaseTbl');
        //$this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.projTitle  LIKE '%".$searchText."%'
                            OR  BaseTbl.projCode  LIKE '%".$searchText."%'
                            OR  BaseTbl.projLocation  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        //$this->db->where('BaseTbl.isDeleted', 0);
        //$this->db->where('BaseTbl.roleId !=', 1);
        $this->db->order_by('projectId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function projectListing1Count($searchText, $fromDate, $toDate, $projectStatus, $fundStatus, $approvedRequest, $monthyear)
    {
        $this->db->select('*');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.projTitle  LIKE '%".$searchText."%'
                            OR  BaseTbl.projCode  LIKE '%".$searchText."%'
                            OR  BaseTbl.projLocation  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.dateDurFrom, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.dateDurTo, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($monthyear)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.dateDurTo, '%Y-%m' ) = '".date('Y-m', strtotime($monthyear))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($projectStatus)) {
            $likeCriteria = "BaseTbl.projectStatus  = '".$projectStatus."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($fundStatus)) {
            $likeCriteria = "BaseTbl.fundStatus  = '".$fundStatus."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($approvedRequest)) {
            $likeCriteria = "BaseTbl.approvedRequest = '".$approvedRequest."'";
            $this->db->where($likeCriteria);
        }

        $this->db->from('projects_monitoring as BaseTbl');
        $query = $this->db->get();
        
        return $query->num_rows();
    }

    function projectListing1($searchText, $fromDate, $toDate, $page, $segment, $projectStatus, $fundStatus, $approvedRequest, $monthyear)
    {
        $this->db->select('BaseTbl.projectId, BaseTbl.projTitle, BaseTbl.projCode, BaseTbl.projLocation, BaseTbl.province, BaseTbl.beneficiaries, BaseTbl.yearCharged, BaseTbl.yearCharged, BaseTbl.dateReleased, BaseTbl.dateDurFrom, BaseTbl.dateDurTo, BaseTbl.proponent, BaseTbl.budgetdatereleased, BaseTbl.amountReleased, BaseTbl.amountLiquidated, BaseTbl.unliquitedBalance, BaseTbl.amountDueLiquidation, BaseTbl.financialReport, Fund.status as fundStatus, BaseTbl.completionReport, BaseTbl.terminalReport, Project.Status as projectStatus, BaseTbl.quarStatProgRep, ApprovedRequest.status as approvedRequest, BaseTbl.amountDueRefund, BaseTbl.refund, BaseTbl.reques');
        $this->db->from('projects_monitoring as BaseTbl');
        $this->db->join('tbl_fund_status as Fund', 'Fund.fundStatusId = BaseTbl.fundStatus','left');
        $this->db->join('tbl_project_status as Project', 'Project.projectStatusId = BaseTbl.projectStatus','left');
        $this->db->join('tbl_approved_request as ApprovedRequest', 'ApprovedRequest.approvedRequestId = BaseTbl.approvedRequest','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.projTitle  LIKE '%".$searchText."%'
                            OR  BaseTbl.projCode  LIKE '%".$searchText."%'
                            OR  BaseTbl.projLocation  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.dateDurFrom, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.dateDurTo, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($monthyear)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.dateDurTo, '%Y-%m' ) = '".date('Y-m', strtotime($monthyear))."'";
            $this->db->where($likeCriteria);  
        }
        if(!empty($projectStatus)) {
            $likeCriteria = "BaseTbl.projectStatus  = '".$projectStatus."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($fundStatus)) {
            $likeCriteria = "BaseTbl.fundStatus  = '".$fundStatus."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($approvedRequest)) {
            $likeCriteria = "BaseTbl.approvedRequest = '".$approvedRequest."'";
            $this->db->where($likeCriteria);
        }
    
        $this->db->order_by('BaseTbl.projectId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result(); 

        return $result;
    }

     function getNotify($date)
    {   

        $this->db->select('*');
        $this->db->from('projects_monitoring as BaseTbl');
        $this->db->where("dateDurTo LIKE '%".$date."%'" );
        $query = $this->db->get();
        
        $result = $query->num_rows(); 

        return $result;
      
    }

    function getDataToNotify($date)
    {
        $this->db->select('*');
        $this->db->from('projects_monitoring as BaseTbl');
        $this->db->where("dateDurTo LIKE '%".$date."%'" );
        $query = $this->db->get();
        
        $result = $query->result(); 

        return $result;
    }

    function getFundStatus()
    {
        $this->db->select('fundStatusId, status');
        $this->db->from('tbl_fund_status');
        $query = $this->db->get();
        
        return $query->result();
    }

    function insertNewFundStatus($status){

        $this->db->trans_start();
        $this->db->insert('tbl_fund_status', $status);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function getProjectStatus()
    {
        $this->db->select('projectStatusId, status');
        $this->db->from('tbl_project_status');
        $query = $this->db->get();
        
        return $query->result();
    }

    function insertNewProjectStatus($status){

        $this->db->trans_start();
        $this->db->insert('tbl_project_status', $status);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function getApprovedRequest()
    {
        $this->db->select('approvedRequestId, status');
        $this->db->from('tbl_approved_request');
        $query = $this->db->get();
        
        return $query->result();
    }

    function insertApprovedRequest($status){

        $this->db->trans_start();
        $this->db->insert('tbl_approved_request', $status);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    

}

  