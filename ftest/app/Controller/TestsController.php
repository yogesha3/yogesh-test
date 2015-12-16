<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('Email', 'Lib');
App::import('Vendor', 'mpdf/mpdf');
class TestsController extends AppController
{
    public $helpers = array('Js','Functions');
    public $components = array('Auth', 'Session', 'Encryption', 'Mail', 'Cookie', 'RequestHandler','Common','Businessowner','Functions','Groups','GroupGoals');
    public $uses = array('User', 'BusinessOwner','Subscription','Transaction','Goal','CreditCard','Group');
    public function beforeFilter()
    {
        parent::beforeFilter();        
        $this->Auth->allow('*');
        $this->autoRender = false;
        $this->autoLayout = false;
        $this->layout = false;
        $this->view = false;
        parent::beforeFilter();
        require_once (ROOT.DS.APP_DIR.DS.'Plugin/authorizedotnet/AuthorizeNet.php');
    }
   
    public function index()
    {
        echo $first_day_this_month = date('m-01-Y'); // hard-coded '01' for first day
        echo '<br>';
        echo $last_day_this_month  = date('m-t-Y');
        
        exit;
    }
    public function groupNotChangedMails() 
    {
        $conditions = array('GroupChangeRequest.request_type'=>'cr','GroupChangeRequest.is_moved'=>0);
        $pendingRequests = $this->GroupChangeRequest->find('all',array('conditions'=>$conditions));
        $cuttentTimeStamp = strtotime(date('Y-m-d'));
        if(!empty($pendingRequests)) {
            $count = 0;
            foreach($pendingRequests as $row){
                $timeDiff = round(abs($cuttentTimeStamp - strtotime($row['GroupChangeRequest']['created'])) / (60*60),0);
                if($timeDiff < 48) {
                    //Send Mails
                    $count++;
                    $emailLib = new Email();
                    $to = $userInfo['BusinessOwner']['email'];
                    //$to = 'rohan.julka@a3logics.in';
                    $subject = 'FoxHopr: Group change request status';
                    $template ='group_change_pending';
                    $variable = array('name'=>$row['BusinessOwner']['fname'] . " " . $row['BusinessOwner']['lname']);
                    $success = $emailLib->sendEmail($to,$subject,$variable,$template,'both');
                }
            }            
            echo $count .' Emails Delivered';
            exit;
        }        
    }
    /**
     * Function for sending resetting goals
     * */ 
    public function goalsResetCron()
    {
        $first_day_prev_month = date('Y-m-01 H:i:s',strtotime("-1 months", strtotime(date('Y-m-d H:i:s'))));
        $last_day_prev_month = date('Y-m-t H:i:s',strtotime("-1 months", strtotime(date('Y-m-d H:i:s'))));
        $first_day_third_month = date('Y-m-01 H:i:s',strtotime("-3 months", strtotime(date('Y-m-d H:i:s'))));
        $conditions = array('Goal.created BETWEEN ? AND ?' => array($first_day_prev_month, $last_day_prev_month),'Goal.goal_type IN'=>array('individual_goals', 'group_member_goals'));
        $userGoalData = $this->Goal->find('all', array('conditions'=>$conditions));
        
        $conditions = array('Goal.created BETWEEN ? AND ?' => array($first_day_third_month, $last_day_prev_month),'Goal.goal_type '=>'group_goals');
        $groupGoalData = $this->Goal->find('all', array('conditions'=>$conditions));
        //pr($userGoalData);
        $emailPost = array_merge($userGoalData, $groupGoalData);
        if(!empty($emailPost)) {
            foreach($emailPost as $row) {
                $emailLib = new Email();
                $to = $userInfo['BusinessOwner']['email'];
                $subject = 'FoxHopr: Your Goals have been reset';
                $template ='group_goals_reset';
                $variable = array('name'=>$row['BusinessOwner']['fname'] . " " . $row['BusinessOwner']['lname']);
                $success = $emailLib->sendEmail($to,$subject,$variable,$template,'both');
            }
        }
    }
    public function creditCardSave()
    {
        $card = '4111111111111111';
        $card = $this->Encryption->encode(substr($card,-4,4));     
        $data = array('credit_card_number'=>$card,'user_id'=>1);
        $this->CreditCard->create();
        if($this->CreditCard->save($data)) {
            echo 'saved';
        } else {
            echo 'Failed';
        }
    }
    public function encode()
    {
        
    }
    public function decode($string)
    {
        echo $this->Encryption->decode($string);
    }
    public function testPDF()
    {
        $logoUrl = $this->webroot.'img/logo_black.png';
        $html = '
        <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>FoxHopr</title>
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" class="index">

<style>
.table-responsive {
    min-height: 0.01%;
    overflow-x: auto;
}

table.table > tbody > tr > td, .table > tbody > tr > th, table.table > tfoot > tr > td, table.table > tfoot > tr > th, table.table > thead > tr > td, table.table > thead > tr > th {
    
    border: 0.1mm solid #ddd;
    line-height: 1.42857;
    padding: 8px;
    vertical-align: top; text-align:left;font-family: "Times New Roman", Times, serif; fo
}
.items tbody,.items thead { border-top: 0.1mm solid #000000;}
td { vertical-align: top; }
.items td {
	border-top: 0.1mm solid #ddd;
	
}
table thead td { 
	text-align: center;
	font-variant: small-caps;
}

.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}

</style>

<htmlpageheader name="myheader"> </htmlpageheader>
        
        <htmlpagefooter name="myfooter">
        <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
        Page {PAGENO} of {nb}
        </div>
        </htmlpagefooter>
        
        <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
        <sethtmlpagefooter name="myfooter" value="on" />
        mpdf-->
        <table class="table items">
        <tr>
            <th scope="row" style="border-top:0"><img src="'.$logoUrl.'" style="float:left;display:inline-block;text-align:left;"></th>
           
          </tr>
        </table>
      <table class="table table-bordered items" width="100%" style="width:800px; margin:auto;font-size: 13pt; border-collapse: collapse; ">
        <thead>
  <tr>
            <th style=" border-top:0"></th>
 <td  style=" border-top:0"></td>

            <th  style=" text-align:right; border-top:0;padding-bottom:10px;">Receipt</th>
          </tr>
        
          
        </thead>
        <tbody>
          <tr >
           
            <td style="padding-top:30px;"><strong>Billed to:</strong></td>
            <td style="padding-top:30px;"></td>
            <td style="text-align:right;padding-top:30px;line-height:25px;"><strong>Receipt Date</strong> Sep 10. 2015<br>
Order Total: &15.99  </td>
          
    
          </tr>
          <tr style="border:none;">
           
            <td style="padding-top:20px;"></td>
            <td style="padding-top:20px;"></td>
            <td style="padding-top:20px;"></td>
          
    
          </tr>
          
          <tr style="border:none;"> 
            <td class="bt">tmara@gmail.com<br>
            Tamara Miller<br>
44-61 11th Street
  </td>
            <td class="bt"></td>
            <td class="bt"></td>
            
          </tr>
          
          <tr style="border:none;"> 
            <td style="padding-top:20px;"> </td>
            <td style="padding-top:20px;"></td>
            <td style="padding-top:20px;"></td>
            
          </tr>
          
          <tr style="border:none;border-bottom:1ps solid #ddd;"> 
            <td class="bt" style="padding-bottom:10px;">lic.NY 11101<br>
United States of America
  </td>
            <td class="bt"></td>
            <td class="bt"></td>
            
          </tr>
          <tr>
          <th style="text-align:left;padding-bottom:20px;">Item Number</th>
          <th style="text-align:left;padding-bottom:20px;">Description</th>
          <th style="text-align:right;padding-bottom:20px;">Price</th>
        </tr>
        
        
        <tr> 
            <td style="padding-bottom:40px;">1 </td>
            <td style="padding-bottom:40px;">Pro Plus Account</td>
            <td style="text-align:right;padding-bottom:40px;">$15.99</td>
            
          </tr>
          
           <tr> 
        
            <td></td>
            <td></td>
                <td style="text-align:right;line-height:25px;">Sales Tax: $0.00 <br>
<b>Order Total: $15.99</b> </td>
            
          </tr>
          
        </tbody>
      </table>
</body>
</html>
        ';    
        $mpdf=new mPDF('c','A4','','',20,15,48,25,10,10);
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("FOXHOPR - Invoice");
        $mpdf->SetAuthor("FOXHOPR");
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        $mpdf->Output(); exit;
        
    }
    public function regTest()
    {
        //preg_match('/^[a-z\d_-]{5,20}$/i', 'bhanu-pratap')
        if (preg_match('/^[a-z\d_ .-]{1,20}$/i', 'rohan..julka')) {
         echo 'valid';   
        } else {
            echo 'invalid';
        }
    }
    public function dateTest()
    {
        $first_day_this_month = date('Y-m-01 00:00:00');
        $last_day_this_month  = date('Y-m-t 23:59:59');
        echo 'First Day:'.$first_day_this_month.'<br/>';
        echo 'Last Day:'.$last_day_this_month.'<br/>';
    }
}