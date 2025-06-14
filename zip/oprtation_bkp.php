<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
require_once("../vendor/phpmailer/phpmailer/src/Exception.php");
require_once("../vendor/phpmailer/phpmailer/src/PHPMailer.php");
require_once("../vendor/phpmailer/phpmailer/src/SMTP.php");

     
// Load Composer's autoloader
//require_once '../vendor/autoload.php';

include_once("dbConnect.php");
include_once ("url.php");
include_once("passwordHash.php");

$url = new URL();
$site_url = $url->getUrl();


$code = $_POST['code'];
$companyId = 0;  
//print_r($_POST['code']);
if(isset($_SESSION['companyId'])){
    $companyId = $_SESSION['companyId'];
} 

$p = new passwordHash();
$db = new dbConnect();

$conn = $db->connect();
$operations = new operations();

if($conn == null){
    $data['code'] = 0;
    $data['message'] ='Server Not Avilable.';
    print_r(json_encode($data));
    exit(0);
}
if ($code == 1) {

    $operations->login_user($conn, $p);

}

if ($code == 2) {

    $operations->add_new_company($conn,$p);

}

if ($code == 3) {

    $operations->logout($site_url, $conn);

}

if ($code == 4) {

    $operations->checkProduct($conn);

}

if ($code == 5) {

    $operations->search_product($conn);

}

if ($code == 6) {

    $operations->search_User($conn);

}

if ($code == 17) {

    $operations->get_system_status($conn);

}

if ($code == 19) {

    $operations->add_new_customer($conn, $p);

}



if ($code == 21) {

    $operations->updateStatusTimeLine($conn);

}



if ($code == 24) {

    $operations->getStatusProgress($conn);

}

if ($code == 25) {

    $operations->getDashBoard($conn); //web

}



if ($code == 28) {

    $operations->create_contract_service($conn);

}

if ($code == 30) {

    $operations->add_new_Engineer($conn, $p);

}

if ($code == 31) {

    $operations->add_ContractType($conn);

}

if ($code == 32) {

    $operations->get_ServiceType($conn);

}

if ($code == 33) {

    $operations->get_CustomerList($conn);

}

if ($code == 34) {

    $operations->get_CustomerDetails($conn);

}

if ($code == 35) {

    $operations->create_new_contract($conn);

}

if ($code == 36) {

    $operations->getContractTypeDetails($conn);

}

if ($code == 37) {

    $operations->getContractDetails($conn);

}

if ($code == 38) {

    $operations->getContractDetailsById($conn);

}

if ($code == 39) {

    $operations->addServiceCall($conn);

}

if ($code == 40) {

    $operations->getContractProduct($conn);

}

if ($code == 41) {

    $operations->updatePayment($conn);

}

if ($code == 42) {

    $operations->updateCallAssignedEngineer($conn);

}

if ($code == 43) {

    $operations->addNewSpareProduct($conn);

}

if ($code == 44) {

    $operations->updatePaymentDetails($conn);

}

if ($code == 45) {

    $operations->DeletePaymentDetails($conn);

}

if ($code == 46) {

    $operations->getInstallmentDetails($conn);

}

if ($code == 47) {

    $operations->getServiceDetailsById($conn);

}



if ($code == 48) {

    $operations->updateInward($conn);

}

if ($code == 49) {



    $operations->getProductDetailsById($conn);

}

if ($code == 50) {



    $operations->addServiceCallSpare($conn);

}



if ($code == 51) {



    $operations->allContractStatus($conn);

}



if ($code == 52) {



    $operations->getProductDetailC($conn);

}
if ($code == 999) {
    $operations->getProductDetails($conn);
}

if ($code == 53) {



    $operations->getProductByType($conn);

}

if ($code == 54) {



    $operations->create_contract_serviceMultiple($conn);

}

if ($code == 55) {

    $operations->updatePaymentManual($conn);

}

if ($code == 56) {

    $operations->settingFuntion($conn);

}

if ($code == 57) {

    $operations->updateServiceCallToClose($conn);

}

if ($code == 58) {

    $operations->getAllCustomerContratList($conn);

}

if ($code == 59) {

    $operations->deleteContractSheduleService($conn);

}



if ($code == 60) {

    $operations->addNewCProduct($conn);

}



if ($code == 61) {

    $operations->deleteCProduct($conn);

}

if ($code == 62) {

    $operations->updateRenewal($conn);

}

if ($code == 63) {

    $operations->updateOutward($conn);

}



if ($code == 64) {

    $operations->updateOnline($conn);

}



if ($code == 65) {

    $operations->updateUserData($conn);

}

if ($code == 66) {

    $operations->deleteOperation($conn);

}

if ($code == 67) {

    $operations->addUpEmailSetting($conn);

}

if ($code == 68) {

    $operations->sendTestMail($conn);

}

if ($code == 69) {

    $produt_id = $_POST['productId'];

    $x = $operations->getProductCount($conn, $companyId, $produt_id);

    print_r($x);

}

if($code == 70){

    $operations->updatePassword($conn, $p);

}

if($code == 71){

    $operations->deleteOut($conn,$companyId);

}

if($code == 72){

    $operations->deleteInward($conn,$companyId);

}

if($code == 73){

    $operations->deleteProduct($conn,$companyId);

}

if($code == 74){

    $operations->updateCallReadStatus($conn);

}

if($code == 75){

    $operations->updatePasswordCompany($conn, $p);

}

if($code == 76){

    $operations->addRMA($conn);

}

if($code == 77){

    $operations->updateStatusTimeLineRMA($conn);

}

if($code == 78){

    $operations->updateProductSent($conn);

}

if($code == 79){

    $operations->updateProductRescive($conn);

}

if ($code == 80) {

    $operations->addVendor($conn, $p);

}

if ($code == 81) {
    $operations->addProductSpare($conn);
}
if ($code == 82) {
    $operations->getProductSpareDetailsById($conn);
}
if ($code == 83) {
    $operations->saveStandBy($conn);
}
if ($code == 84) {
     $operations->getSpareProductByType($conn);
}
if ($code == 85) {
    $operations->deleteSpareProduct($conn);
}
if ($code == 86) {
    $operations->updateStandByStatus($conn);
}
if ($code == 87) {
    $operations->deleteStandBy($conn);
}
if($code == 88){
    $operations->getProductSerialNos($conn);
}
if($code == 89){
    $operations->AddCheckList($conn);
}

if($code == 90){
    $operations->DeleteServices($conn);
}
if($code == 91){
    $operations->getCallStatusCountEngg($conn);
}
if($code == 92){
    $operations->changeCallStatus($conn);
}
if($code == 93){
    $operations->deleteProductMain($conn);
}
class operations {
    
    function deleteProductMain($conn){
        
        $id = $_POST['id'];
        $companyId = $_SESSION['companyId'];
        $delete  = "delete from spare_product where id='$id' and companyId='$companyId'";
        $deleteR = mysqli_query($conn,$delete);
        if($deleteR){
            $data['code'] = 1;
            $data['message'] = "Product Deleted";
            print_r(json_encode($data));
        } else {
            $data['code'] = 0;
            $data['message'] = "Action Failed, Try Again";
            print_r(json_encode($data));
        }
        
    }
    
    function changeCallStatus($conn) {
        
        $callId = $_POST['callId'];
        $actionId = $_POST['actionCode'];
        $companyId = $_SESSION['companyId'];
        $UserId = $_SESSION['userId'];
        $userRole = $_SESSION['userRole'];
        $status = 0;
        $call_assigned_to = 0;
        $today = date("Y-m-d H:i:s");
        $message = "";
        if($actionId == 1) {
            $call_assigned_to=$UserId;
            $status = 4;    
            $message ="Engineer Service Call Accepted";
        }else
        if($actionId == 2){
            $call_assigned_to=0;
            $status = 2;    
            $message ="Engineer Service Call Rejected";
        }
        $data = array();
        if($status!=0) {
                //$today = date("Y-m-d h:i:s");
                $stmt = "insert into service_call_action_history(company_id,service_call_id,action_id,action_reason,action_note,action_by,datetime,active,userRole) values('$companyId','$callId','$status',1,'$message','$UserId','$today',1,'$userRole')";
                mysqli_query($conn,$stmt);
                if (mysqli_insert_id($conn) > 0) {
                    $inserId = mysqli_insert_id($conn);
                    $stmtup = "update contract_service_call set call_assigned_to='$call_assigned_to',isRead='1',modify_date='$today',modify_id='$inserId',call_status='$status' where id='$callId' and companyId='$companyId'";
                   // $stmtup->bind_param("siii",$today,$inserId, $callId, $companyId);
                    $result = mysqli_query($conn,$stmtup);
                    
                    if ($result) {
                        $data['code'] = 1;
                        $data['message'] = 'Updated successfully';
                    } else {
                        $data['code'] = 0;
                        $data['message'] = "No changes.";
                    }
                } else {
                    $data['code'] = 0;
                    $data['message'] = 'Action Failed Try again';
                }
        } else {
             $data['code'] = 0;
             $data['message'] = 'Unknow call status, try again';
        }
        print_r(json_encode($data));
    }
    function getCallStatusCountEngg($link){
        
        
           //  $data = array();

        $newCall = 0;

        $engineers = 0;

        $openCall = 0;

        $pendingCall = 0;

        $resolvedCall = 0;
        $closedCallClosed =0;

        $companyId = $_SESSION['companyId'];
        $UserId = $_SESSION['userId'];

        $getBatteryCount = "SELECT COUNT(*) as newCall FROM contract_service_call where call_Status='3' and call_assigned_to='$UserId' and companyId='$companyId'";
        
        $getBatteryCountR = mysqli_query($link, $getBatteryCount);

        if ($getBatteryCountR) {

            $row_bat = mysqli_fetch_assoc($getBatteryCountR);

            $newCall = $row_bat['newCall'];

        }

        $getBankCount = "SELECT COUNT(*) as openCall FROM contract_service_call where call_Status='4' and call_assigned_to='$UserId' and companyId='$companyId'";

        $getBankCountR = mysqli_query($link, $getBankCount);

        if ($getBankCountR) {

            $row_bank = mysqli_fetch_assoc($getBankCountR);

            $openCall = $row_bank['openCall'];

        }

        $getCCount = "SELECT COUNT(*) as pending_call FROM contract_service_call where call_Status='5' and call_assigned_to='$UserId'  and companyId='$companyId'";

        $getCCountR = mysqli_query($link, $getCCount);

        if ($getCCountR) {
            $row_C = mysqli_fetch_assoc($getCCountR);
            $pendingCall = $row_C['pending_call'];
        }

        $getCSCount = "SELECT COUNT(*) as resolvedCall FROM contract_service_call where call_Status='6' and call_assigned_to='$UserId'  and companyId='$companyId'";
        $getCSCountR = mysqli_query($link, $getCSCount);
        if ($getCSCountR) {
            $row_CS = mysqli_fetch_assoc($getCSCountR);
            $resolvedCall = $row_CS['resolvedCall'];
        }
        
        $getCSCountClosed = "SELECT COUNT(*) as closedCall FROM contract_service_call where call_Status='7' and call_assigned_to='$UserId'  and companyId='$companyId'";
        $getCSCountRClosed = mysqli_query($link, $getCSCountClosed);
        if ($getCSCountRClosed) {
            $row_CSClosed = mysqli_fetch_assoc($getCSCountRClosed);
            $closedCallClosed = $row_CSClosed['closedCall'];
        }
        
        
        $data['newCall'] = $newCall;
        $data['openCall'] = $openCall;
        $data['pendingCall'] = $pendingCall;
        $data['resolvedCall'] = $resolvedCall;
        $data['closedCall'] = $closedCallClosed;
        print_r(json_encode($data));
        
        
    }
    function DeleteServices($conn){
        $contractId= $_POST['contractNo'];
        $companyId = $_SESSION['companyId'];
        $delete = "delete from contract_service where contactId='$contractId' and service_call_ref_id=0 and companyId='$companyId'";
        $dl = mysqli_query($conn,$delete);
        if($dl){
            $data['code'] = 1;
            $data['message'] = "Deleted";
            print_r(json_encode($data));
        } else {
            $data['code'] = 0;
            $data['message'] = "Unable to delete, try again";
            print_r(json_encode($data));
        }
        
        
    }
    function AddCheckList($conn){
        $cotractId = $_POST['contractId'];
        $note = $_POST['note'];
        
        $insert = "insert into checklist values(DEFAULT,'$note','$cotractId',DEFAULT)";
        mysqli_query($conn,$insert);
        if(mysqli_insert_id($conn)>0){
            $data['code'] =1;
            $data['message'] = "";
            print_r(json_encode($data));
        } else {
            $data['code'] =0;
            $data['message'] = "something went wrong, try again";
            print_r(json_encode($data));
        }
    }
    function getProductSerialNos($conn){

        

        $productId = $_POST['productId'];

        $companyId = $_SESSION['companyId'];

        $get = "select * from spare_product_serialno where spare_product_serialno.serialNoStatus=1 and  productId = '$productId' and companyId = '$companyId'";

        $getR = mysqli_query($conn,$get);

        $data = array();

        if($getR){

            while ($row = mysqli_fetch_assoc($getR)){

                $data[] =$row;

            }

            

        }

        

        print_r(json_encode($data));

        

    }

    function deleteStandBy($conn){

        

        $standbyId = $_POST['sbId'];

        $companyId = $_SESSION['companyId'];

        $select = "select * from standby where id='$standbyId'";

        $selectR = mysqli_query($conn,$select);

        if($selectR){

            $row = mysqli_fetch_assoc($selectR);

            $productId = $row['sbproductid'];

            $srno = $row['sbproductserialno'];

            $update = "update spare_product_serialno set sbproductserialno=1 where ";

            

            

        }

        

        

    }

    function updateStandByStatus($conn){

        

       $date = $_POST['date'];

       $date = preg_split("#-#",$date);

       $date = $date[2]."-".$date[1]."-".$date[0];

       $note = $_POST['note'];

       $standById = $_POST['standbyId'];

       $companyId = $_SESSION['companyId'];	 

       $userId = $_SESSION['userId'];

       $today = date("Y-m-d H:i:s");

       $role = $_SESSION['userRole'];

       $history = "insert into standbyhistory values(DEFAULT,'$standById','1','$note','$date','$userId','$role','$today','$companyId','4')";

        mysqli_query($conn,$history);

        $hId = mysqli_insert_id($conn);

        if(mysqli_insert_id($conn)>0){

            $update = "update standby set sbstatus = 4 where id='$standById'";

            $updateR = mysqli_query($conn,$update);

            if($updateR){

                $data['code'] =  1;

                $data['message'] =  "Status updated.";

                print_r(json_encode($data));

            } else {

                $delete = "delete from standbyhistory where id='$hId'";

                mysqli_query($conn,$delete);

                

                $data['code'] =  0;

                $data['message'] =  "Status not updated.";

                print_r(json_encode($data));

            }

        } else {

                $data['code'] =  0;

                $data['message'] =  "Status not updated, Error:".mysqli_error($conn);

                print_r(json_encode($data));

        }

    }

    function deleteSpareProduct($conn){

        
       
        $productId = $_POST['productId'];
        $delete = "DELETE FROM spare_product WHERE id='$productId'";
        $deleteR = mysqli_query($conn, $delete);
        
        if ($deleteR) {
            $data['code'] = 1;
            $data['message'] = "Product deleted successfully";
            echo json_encode($data);
        } else {
            $data['code'] = 0;
            $data['message'] = "Unable to delete product.";
            echo json_encode($data);
        }
        
        

    }

    function getSpareProductByType($conn){

        

        $typeId = $_POST['productTypeId'];

        $companyId = $_SESSION['companyId'];	

        $data = array();

        

        $get = "select *,spare_product.id as pId from spare_product where spare_product.productType='$typeId' and spare_product.companyId='$companyId'";

        $getR = mysqli_query($conn,$get);

        if($getR){

            while($row = mysqli_fetch_assoc($getR)){

                $productId = $row['pId'];
                $count = $this->getSerialNumberCount($conn,$productId);
                $productDetails = $row['productName']."/".$row['serialNo'];

                $row['productDetails'] = $productDetails;
                if($count>0){
                    $data[] = $row;    
                }
                

            } 

            

            }

           print_r(json_encode($data)); 

    } 
    function getSerialNumberCount($conn,$productId) {


$count = 0;
        $companyId = $_SESSION['companyId'];

        $data = array();

            $select = "select count(*) as count from  spare_product_serialno where productId='$productId' and companyId='$companyId' and serialNoStatus=1";

        $selectR = mysqli_query($conn, $select);

        if ($selectR) {

            $row = mysqli_fetch_array($selectR);

            $count = $row['count'];

        }

        return $count;

    }
    function saveStandBy($conn){

        

        $companyId = $_SESSION['companyId'];

        $userId = $_SESSION['userId'];

        $standby_date = $_POST['standby_date'];

        $standbycust = $_POST['standbycust'];

        $standbyType = $_POST['standbyType'];

        $call_ref_no = $_POST['call_ref_no'];

        $tableData = stripcslashes($_POST['tableData']);

        $tableData = json_decode($tableData, TRUE);

        $today = date("Y-m-d H:i:s");

        $today1 = date("Y-m-d");

        $data1 = "";

        $status = 0;

        $sbStatus = 0;

        if($standbyType == 1){

            $sbStatus = 3;

        } elseif($standbyType == 2){

            $sbStatus = 4;

        } elseif($standbyType == 3){

            $sbStatus = 5;

        }

        if (sizeof($tableData) > 0 && $companyId != 0) {

            for ($i = 0; $i < sizeof($tableData); $i++) {

                $productType = $tableData[$i]['productType'];   

                $produt_id = $tableData[$i]['product_Id'];

                $serialNo = $tableData[$i]['serialNo'];

                $amount = $tableData[$i]['amount'];

                $other_details = $tableData[$i]['other_details'];

                $role = $_SESSION['userRole'];

                //$df = "0000-00-00"; 

                $x=0;

                $note="";    

               // $data1 = $productType."--".$produt_id."--".$serialNo."--".$amount;

                $insert = "insert into standby values(DEFAULT,'$standby_date','$standbycust','$call_ref_no','$standbyType','$productType',

				'$produt_id','$serialNo','$amount','$standbyType','$companyId','$other_details','$today','$userId',0)";

                mysqli_query($conn, $insert);

                $standById = mysqli_insert_id($conn);

                if (mysqli_insert_id($conn) > 0) {

                      

                    $update = "update spare_product_serialno set serialNoStatus='$sbStatus' where serialNo='$serialNo' and productId='$produt_id' and companyId='$companyId'";

                    $isUpdate = mysqli_query($conn,$update);

                    if($isUpdate){

                        $status = 1;

                        if($standbyType == 1){

                            $x = 1;

                            $note ="New standby created.";

                        } else if($standbyType == 2){

                            $x = 2;

                            $note ="New replacement created.";

                        }  else if($standbyType == 3){

                            $x =3;

                            $note ="New chargeable created.";

                        }

                        $history = "insert into standbyhistory values(DEFAULT,'$standById','1','$note','$today1','$userId','$role','$today','$companyId','$x')";

                        mysqli_query($conn,$history);

                    } else {

                        $status = 2;

                    }

                    

                } else {

                    $status = 0;

                }

            }

            if ($status == 1) {

                $data['code'] = 1;

                $data['message'] = "standby updated sucessfully.";

                print_r(json_encode($data));

            } else if($status == 2){

                $data['code'] = 0;

                $data['message'] = "standby updated sucessfully. Unable to update serial number status.";

                print_r(json_encode($data));

            }else {

                $data['code'] = 0;

                $data['message'] = "Unable to update standby. " . mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 0;

            $data['message'] = "Unable to get company details";

            print_r(json_encode($data));

        }

        

    }

    function getProductSpareDetailsById($conn) {



        $productId = $_POST['productId'];

        $companyId = $_SESSION['companyId'];

        $data = array();

            $select = "select * from  spare_product where id='$productId' and companyId='$companyId'";

        $selectR = mysqli_query($conn, $select);

        if ($selectR) {

            $row = mysqli_fetch_array($selectR);

            $data[] = $row;

        }

        print_r(json_encode($data));

    }
    
    
    function addProductSpare($conn) {
        $productName = $_POST['productName'];
        $productType = $_POST['productType'];
        $productPrice = $_POST['productPrice'];

        $serialNo = $_POST['serialNo'];
        $num_code  = $_POST['num_code'];
        $hsn = $_POST['hsn'];
        $account_group = $_POST['account_group'];
        $classification =  $_POST['classification'];
        $serial_number = $_POST['serial_number'];
        $other_details = $_POST['other_details'];
        $product_details = $_POST['product_details'];
        $srId = $_POST['srId'];
        $userId = $_SESSION['userId'];
        $companyId = $_SESSION['companyId'];
        $update = $_POST['update'];
        $productId = $_POST['productId'];
        $contract_id = $_POST['contract_id'];
        $pid =  $_POST['product_update'];
        $productStatus  = $_POST['productStatus']; // Ensure this is being retrieved correctly
        $today = date("Y-m-d H:i:s");
    
        $insertC = 0;
        $insertF = 0;
        $insertD = 0;         
        $insertUp = 0;
    
        if ($update == 1) {
            // $select = "SELECT * FROM spare_product 
            //            WHERE productName='$productName' 
            //            AND productPrice = '$productPrice' 
            //            AND productStatus='$productStatus' 
            //            AND num_code = '$num_code' 
            //            AND hsn = '$hsn' 
            //            AND account_group = '$account_group' 
            //            AND classification = '$classification' 
            //            AND other_details = '$other_details' 
            //            AND product_details = '$product_details' 
            //            AND productType='$productType' 
            //            AND id='$productId' 
            //            AND companyId='$companyId'";
                       
            // $updateR = mysqli_query($conn, $select);
            
            // if (mysqli_num_rows($updateR) > 0) {
            //     if ($serialNo[0] != "") {
            //         $checkP = "SELECT * FROM spare_product_serialno WHERE spare_product_serialno.id='$srId' AND productId='$productId'";
            //         $checkPR = mysqli_query($conn, $checkP);
                    
                    // if (mysqli_num_rows($checkPR) > 0) {
                       $updatesr = "UPDATE spare_product
                                     SET productName='$productName',productType='$productType',productPrice='$productPrice',num_code='$num_code',hsn='$hsn',account_group='$account_group',classification='$classification',serial_number = '$serial_number' ,other_details='$other_details',product_details='$product_details',serialNoStatus='$productStatus',contract_id='$contract_id' WHERE id='$productId'";
                                     
                        $updatesrR = mysqli_query($conn, $updatesr);
                        
                        if ($updatesrR) {
                            $data['code'] = 1;
                            $data['message'] = "Product successfully Updated";

                            print_r(json_encode($data));
                            exit(0);
                        } else {
                            $data['code'] = 0;
                            $data['message'] = "Update Failed, Try Again.";
                            print_r(json_encode($data));
                            exit(0);
                        }
                    // } else {
                    //     $data['code'] = 0;
                    //     $data['message'] = "Serial No. Not Found.";
                    //     print_r(json_encode($data));
                    //     exit(0);
                    // }
                // } else {
                //     $data['code'] = 0;
                //     $data['message'] = "Unable To Read Serial No, Try Again.";
                //     print_r(json_encode($data));
                //     exit(0);
                // }
            // } else {
            //     $data['code'] = 0;
            //     $data['message'] = "Product Not Found";
            //     print_r(json_encode($data));
            //     exit(0);
            // }
        } else {
            $checkName = "SELECT * FROM spare_product 
                          WHERE productName='$productName' 
                          AND productType='$productType' 
                          AND productPrice='$productPrice' 
                          AND serialNoStatus='$serialNoStatus' 
                          AND num_code='$num_code' 
                          AND hsn='$hsn' 
                          AND account_group='$account_group' 
                          AND classification='$classification' 
                          AND serial_number = '$serial_number'
                          AND other_details='$other_details' 
                          AND product_details='$product_details' 
                          AND contract_id = '$contract_id'
                          AND companyId='$companyId'";
                          
             $checkNameR = mysqli_query($conn, $checkName);
            
            if (mysqli_num_rows($checkNameR) == 0) {
                $insert = "INSERT INTO spare_product 
                           VALUES (DEFAULT, '$companyId', '$productName', '$productType', '$userId', '$today', '0', '$productPrice', '$num_code', '$hsn', '$account_group', '$classification', '$serial_number', '$other_details', '$product_details', '$productStatus','$contract_id')";
                  
                mysqli_query($conn, $insert);
                
                $data['code'] = 1;
                $data['message'] = "Product successfully Created";
                print_r(json_encode($data));
                exit(0);
                
                // if (mysqli_insert_id($conn) > 0) {
                //     $pId = mysqli_insert_id($conn);
                    
                //     if (sizeof($serialNo) > 0) {
                //         for ($i = 0; $i < sizeof($serialNo); $i++) {
                //             $srno = $serialNo[$i];
                //             if ($srno != "" && $srno != null) {
                //                 $checkP = "SELECT * FROM spare_product_serialno WHERE serialNo='$srno' AND productId='$pId'";
                //                 $checkPR = mysqli_query($conn, $checkP);
                //                 if (mysqli_num_rows($checkPR) == 0) {
                //                     $insertSr = "INSERT INTO spare_product_serialno 
                //                                  VALUES (DEFAULT, '$pId', '$srno', '$companyId', '$today')";
                                                 
                //                     mysqli_query($conn, $insertSr);
                //                     $insertSrId = mysqli_insert_id($conn);
                //                     if ($insertSrId > 0) {
                //                         $insertC++;
                //                     } else {
                //                         $insertF++;
                //                     }
                //                 } else {
                //                     $insertD++;
                //                 }
                //             } else {
                //                 $data['code'] = 0;
                //                 $data['message'] = "Unable To Read Serial No, Try Again.";
                //                 print_r(json_encode($data));
                //                 exit(0);
                //             }
                //         }
                //     } else {
                //         $data['code'] = 1;
                //         $data['message'] = "Product Created Without Serial No.";
                //         print_r(json_encode($data));
                //         exit(0);
                //     }
                // } else {
                //     $data['code'] = 0;
                //     $data['message'] = "Product Creation Failed, Try Again.";
                //     print_r(json_encode($data));
                //     exit(0);
                // }
            } else {
                $res = mysqli_fetch_assoc($checkNameR);
                $pid = $res['id'];
                
                if (sizeof($serialNo) > 0) {
                    for ($i = 0; $i < sizeof($serialNo); $i++) {
                        $srno = $serialNo[$i];
                        if ($srno != "" && $srno != null) {
                            $checkP = "SELECT * FROM spare_product_serialno WHERE serialNo='$srno' AND productId='$pid'";
                            $checkPR = mysqli_query($conn, $checkP);
                            if (mysqli_num_rows($checkPR) == 0) {
                                $insertSr = "INSERT INTO spare_product_serialno 
                                             VALUES (DEFAULT, '$pid', '$srno','$companyId','$today')";
                                             
                                mysqli_query($conn, $insertSr);
                                $insertSrId = mysqli_insert_id($conn);
                                if ($insertSrId > 0) {
                                    $insertC++;
                                } else {
                                    $insertF++;
                                }
                            } else {
                                $insertD++;
                            }
                        } else {
                            $data['code'] = 0;
                            $data['message'] = "Unable To Read Serial No, Try Again.";
                            print_r(json_encode($data));
                            exit(0);
                        }
                    }
                } else {
                    $data['code'] = 0;
                    $data['message'] = "Product Name Duplicate";
                    print_r(json_encode($data));
                    exit(0);
                }
            }
        }
    
        if ($insertC == sizeof($serialNo) || $insertC > 0) {
            $data['code'] = 1;
            $data['message'] = $insertC . " Product Added, " . $insertD . " Product Duplicates";
            print_r(json_encode($data));
        } else if ($insertUp > 0) {
            $data['code'] = 1;
            $data['message'] = $insertC . " Product Added, " . $insertD . " Product Duplicates and " . $insertUp . " Product Updated";
            print_r(json_encode($data));
        } else if ($insertF > 0) {
            $data['code'] = 1;
            $data['message'] = $insertF . " products failed to add, " . $insertC . " Product Added, " . $insertD . " Product Duplicates";
            print_r(json_encode($data));
        } else if ($insertF == 0) {
            $data['code'] = 0;
            $data['message'] = "Product Creation Failed, Try Again.";
            print_r(json_encode($data));
        } else {
            $data['code'] = 0;
            $data['message'] = "Product Creation Failed, Try Again";
            print_r(json_encode($data));
        }
 }


function addVendor($conn) {

        $isUpdate = $_POST['isUpdate'];

        $vendor_name = $_POST['vendor_name'];

        $vendor_phone = $_POST['vendor_phone'];

        $vendor_address = $_POST['vendor_address'];

        $userId = $_SESSION['userId'];

        $companyId = $_SESSION['companyId'];

        $xx = "0000-00-00";

		$today = date("Y-m-d H:i:s");

        if ($isUpdate == 0) {

			$check_Query = "select * from servicecenter where (name='$vendor_name' or  phone='$vendor_phone') and companyId='$companyId' and isDeleted=0";

            $check_QueryR = mysqli_query($conn, $check_Query);

            if (mysqli_num_rows($check_QueryR) > 0) {

                $data['code'] = 0;

                $data['message'] = 'Vendor alreday registed width name or phone number.';

                print_r(json_encode($data));

            } else {

					$query = "insert into servicecenter values(DEFAULT,'$vendor_name','$vendor_phone','$vendor_address','$companyId','$today','$userId','$today',0)";

                $queryR = mysqli_query($conn, $query);

                if ($queryR) {

                    if (mysqli_insert_id($conn)) {

                        $data['code'] = 1;

                        $data['message'] = 'Vendor Registed';

                        print_r(json_encode($data));

                    } else {

                        $data['code'] = 2;

                        $data['message'] = 'Vendor not registed :' . mysqli_error($conn);

                        print_r(json_encode($data));

                    }

                } else {

                    $data['code'] = 2;

                    $data['message'] = 'Vendor not registed :' . mysqli_error($conn);

                    print_r(json_encode($data));

                }

                

            }

			

			

        } else if ($isUpdate > 0) {

            $check_Query = "select * from servicecenter where id='$isUpdate'  and companyId='$companyId' and isDeleted=0 limit 1";

            $check_QueryR = mysqli_query($conn, $check_Query);

            if (mysqli_num_rows($check_QueryR) > 0) {

                

                $update = "update servicecenter set name='$vendor_name',phone='$vendor_phone',address='$vendor_address' where id='$isUpdate' and companyId='$companyId'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $data['code'] = 1;

                    $data['message'] = 'Vendor details updated';

                    print_r(json_encode($data));

                } else {

                    $data['code'] = 2;

                    $data['message'] = 'Vendor details not updated';

                    print_r(json_encode($data));

                }

            } else {

                $data['code'] = 0;

                $data['message'] = 'Vendor not found in system';

                print_r(json_encode($data));

            }

        }

    }



function updateProductRescive($conn) {//update the status of the bank and maintain the time line;

     

		$rmaId = $_POST['rmaId'];

        $product_rescive_status = $_POST['product_rescive_status'];

        $product_rescive_statusName = $_POST['product_rescive_statusName'];

        $serviceCenterAmount = $_POST['serviceCenterAmount'];

		$company_email = $_POST['company_email'];

        $company_id = $_SESSION['companyId'];

        $recived_action_note = $_POST['recived_action_note'];

        $userId = $_SESSION['userId'];

        $userRole = $_SESSION['userRole'];

		$today = date("Y-m-d H:i:s");

                $recived_action_note = "Product Status:".$product_rescive_statusName."\n Amount:".$serviceCenterAmount."\n".$recived_action_note;

        $insert = "insert into ramhistory values(DEFAULT,'$recived_action_note','$userId','$today','$rmaId',"

		."'4','$userRole','$company_id',0)";

        mysqli_query($conn, $insert);

        if (mysqli_insert_id($conn) > 0) {

            $inserId = mysqli_insert_id($conn);

            $update = "update rma set rmaProductStatus='$product_rescive_status',serviceCenterAmount='$serviceCenterAmount',serviceCenterNote='$recived_action_note',isRead=1,rmaStatus='4',updateId='$inserId',updatedAt='$today' where id='$rmaId' and companyId='$company_id'";

            $updateR = mysqli_query($conn, $update);

            if ($updateR) {

                $data['code'] = 1;

                $data['message'] = 'action applied';

                print_r(json_encode($data));

            } else {

                $delete = "delete from ramhistory where id='$inserId'"; 

                $deleteR = mysqli_query($conn, $delete);

                $data['code'] = 0;

                $data['$deleteR'] = $deleteR;

                $data['message'] = "Unable to apply action, try again. Error:". mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 0;

            $data['message'] = "Unable to apply action, try again. Error:". mysqli_error($conn);

            print_r(json_encode($data));

        }

    }

	

function updateProductSent($conn) {//update the status of the bank and maintain the time line;

     

		$rmaId = $_POST['rmaId'];

        $retain_c_status = $_POST['retain_c_status'];

        $retain_c_statusName = $_POST['retain_c_statusName'];

        $retain_action_note = $_POST['retain_action_note'];

		$company_email = $_POST['company_email'];

        $company_id = $_SESSION['companyId'];

        $customerAmount = $_POST['customerAmount'];

        $userId = $_SESSION['userId'];

        $userRole = $_SESSION['userRole'];

		$today = date("Y-m-d H:i:s");

                $retain_action_note = "Product status:".$retain_c_statusName."\nCustomer Charges:".$customerAmount."\n".$retain_action_note;

        $insert = "insert into ramhistory values(DEFAULT,'$retain_action_note','$userId','$today','$rmaId',"

		."'5','$userRole','$company_id',0)";

        mysqli_query($conn, $insert);

        if (mysqli_insert_id($conn) > 0) {

            $inserId = mysqli_insert_id($conn);

            $update = "update rma set rmaProductStatus='$retain_c_status',customerAmount='$customerAmount',serviceCenterNote='$retain_action_note',isRead=1,rmaStatus='5',updateId='$inserId',updatedAt='$today' where id='$rmaId' and companyId='$company_id'";

            $updateR = mysqli_query($conn, $update);

            if ($updateR) {

                $data['code'] = 1;

                $data['message'] = 'action applied';

                print_r(json_encode($data));

            } else {

                $delete = "delete from ramhistory where id='$inserId'"; 

                $deleteR = mysqli_query($conn, $delete);

                $data['code'] = 0;

                $data['$deleteR'] = $deleteR;

                $data['message'] = "Unable to apply action, try again. Error:". mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 0;

            $data['message'] = "Unable to apply action, try again. Error:". mysqli_error($conn);

            print_r(json_encode($data));

        }

    }

function updateStatusTimeLineRMA($conn) {//update the status of the bank and maintain the time line;

     

		$rmaId = $_POST['rmaId'];

        $action_status = $_POST['action_status'];

        $call_note = $_POST['call_note'];

		$company_email = $_POST['company_email'];

        $company_id = $_POST['company_id'];

        $servicecenter = $_POST['servicecenter'];

        $userId = $_SESSION['userId'];

        $userRole = $_SESSION['userRole'];

		$today = date("Y-m-d H:i:s");

                

        $insert = "insert into ramhistory values(DEFAULT,'$call_note','$userId','$today','$rmaId',"

		."'$action_status','$userRole','$company_id','$servicecenter')";

        mysqli_query($conn, $insert);

        if (mysqli_insert_id($conn) > 0) {

            $inserId = mysqli_insert_id($conn);

            $update = "update rma set serviceCenterId='$servicecenter',isRead=1,rmaStatus='$action_status',updateId='$inserId',updatedAt='$today' where id='$rmaId' and companyId='$company_id'";

            $updateR = mysqli_query($conn, $update);

            if ($updateR) {

                $data['code'] = 1;

                $data['message'] = 'action applied';

                print_r(json_encode($data));

            } else {

                $delete = "delete from ramhistory where id='$inserId'"; 

                $deleteR = mysqli_query($conn, $delete);

                $data['code'] = 0;

                $data['$deleteR'] = $deleteR;

                $data['message'] = "Unable to apply action, try again. Error:". mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 0;

            $data['message'] = "Unable to apply action, try again. Error:". mysqli_error($conn);

            print_r(json_encode($data));

        }

    }

	function addRMA($conn){

	

			$rmaDate = $_POST['rmaDate'];

			$rma_cust_name = $_POST['rma_cust_name'];

			$service_type = $_POST['service_type'];

			$call_ref_no = $_POST['call_ref_no'];

			$rma_product_type = $_POST['rma_product_type'];

			$rma_product = $_POST['rma_product'];

			$product_srno = $_POST['product_srno'];

			$product_value = $_POST['product_value'];

			$rma_issue_type = $_POST['rma_issue_type'];

			$product_description = $_POST['product_description'];

			$product_issue = $_POST['product_issue'];

			$today = date("Y-m-d H:i:s");

			$companyId = $_SESSION['companyId'];

			$UserId = $_SESSION['userId'];

			$data = array();

                        $isUpdate = $_POST['isUpdate'];

                        $rmaId = $_POST['rmaId'];

                                

			$d = preg_split("#-#",$rmaDate);

			$nrmaDate = $d[2]."-".$d[1]."-".$d[0];

			$id = $this->getMaxRMA($conn);

			$id = $id +1; 

                        if($isUpdate == 0 && $rmaId == 0){

                            

			if($id != 0){

				$query = "insert into rma values(DEFAULT,'$id','$companyId','$nrmaDate','$rma_cust_name','$call_ref_no','$service_type','$rma_product_type','$rma_product',"

					."'$product_srno','$product_value','$rma_issue_type','$product_description','$product_issue','1','$today','$today','$UserId',0,0,1,0,0,0,0,'','',0)";

				mysqli_query($conn,$query);

				if(mysqli_insert_id($conn)>0){

					$rmaid = mysqli_insert_id($conn);

					$message = "New RMA Registered";

					$this->addRMAAction($conn, $companyId,$message,$UserId,$today,$rmaid,1);

					$data['code'] = 1;

					$data['message'] = "created successfully.";

				} else {

					$data['code'] = 0;

					$data['message'] = "Error:".mysqli_error($conn);

					

				}

			} else {

				$data['code'] = 0;

				$data['message'] = "unable get rma no.";

			}

                        } else {

                            $update = "update rma set rmaType='$service_type',productType='$rma_product_type',productName='$rma_product',serialNo='$product_srno',productPrice='$product_value',issueType='$rma_issue_type',productDescription='$product_description',productIssue='$product_issue' where id='$rmaId'";

                            $updateR = mysqli_query($conn,$update);

                            if($updateR){

                                $data['code'] = 1;

				$data['message'] = "Rma updated successfully.";

                            	$message = "Rma updated successfully.";

				$this->addRMAAction($conn, $companyId,$message,$UserId,$today,$rmaid,1);

			

                            } else {

                                $data['code'] = 0;

				$data['message'] = "unable able to update rma details.";

                            }

                            

                        }

			print_r(json_encode($data));

	}

	function addRMAAction($conn, $companyId,$message,$userId,$today,$rmaid,$status){

		$id = 0;

		$role = $_SESSION['userRole'];

		$query = "insert into ramhistory values(DEFAULT,'$message','$userId','$today','$rmaid','$status','$role','$companyId',0)";

		$queryR = mysqli_query($conn,$query); 

		if($queryR && mysqli_insert_id($conn)>0){

			$id = 1;

		}

		return $id;

	

	}

	function getMaxRMA($conn){

		$id = 0;

		$query = "select max(rmaNo) as maxId  from rma";

		$queryR = mysqli_query($conn,$query);

		if($queryR){

			$row = mysqli_fetch_assoc($queryR);

			$id = $row['maxId'];

		}

		return $id;

	}

	

    function updatePasswordCompany($conn, $p){

        $email = $_SESSION['loginEmail'];

        $newPass = $_POST['newPass'];

		$companyId = $_SESSION['companyId'];

		$phash = $p->hash($newPass);

        

        $update = "update company_user set islock=0,loginPassword='$phash',tempPass='',isTempPass=0 where companyId='$companyId' and loginEmail='$email'";

        $updateR = mysqli_query($conn,$update);

        if($updateR){

            $subject = "Password Change Notification.";

            $body = "Dear ".$email.",<br/><br/> Your password has been changed. Below is new login details,<br/>

					Email:&nbsp;".$email."<br/>Password:&nbsp;".$newPass."<br/><br/> If not you please contact your service provider.";

            $mail = $this->sendMail($conn,$body,$email,$subject,$companyId);

            $data['mail'] =$mail;

            $data['code'] = 1;

            $_SESSION['tempPass'] = 0;

            $data['message'] = "Password changed";

            $actionNote = "Company User Password changed";

            $this->updateLog($conn, $companyId,0, $actionNote, 0);

            print_r(json_encode($data));

        } else {

            $data['code'] = 0;

            $data['message'] = "Password not changed";

            $actionNote = "Password not changed";

            $this->updateLog($conn, $companyId, 0, $actionNote, 0);

            print_r(json_encode($data));

        }



    }

    function addUpEmailSettingSupper($conn) {

        $email_smtp_host = $_POST['email_smtp_host'];

        $email_smtp_port = $_POST['email_smtp_port'];

        $email_sender = $_POST['email_sender'];

        $email_host_username = $_POST['email_host_username'];

        $email_host_password = $_POST['email_host_password'];

        $companyId = $_SESSION['companyId'];
        $ssl = $_POST['ssl'];
        $enabled = $_POST['enabled'];

        $checkSetting = "select * from emailsetting where companyid='$companyId' limit 1";

        $checkSettingR = mysqli_query($conn, $checkSetting);

        if (mysqli_num_rows($checkSettingR) > 0) {

            $update = "update emailsetting set isssl='$ssl',enabled='$enabled',smtp_host='$email_smtp_host',smtp_port ='$email_smtp_port',smtp_username ='$email_host_username',smtp_password ='$email_host_password',sender_mail='$email_sender' where companyid='$companyId'";

            $updateR = mysqli_query($conn, $update);

            if ($updateR) {

                $data['code'] = 1;

                $data['message'] = "Setting updated";

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Setting not updated,Error:" . mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else {

            $insert = "insert into emailsetting values(DEFAULT,'$email_smtp_host','$email_smtp_port','$email_host_username','$email_host_password','$email_sender','$companyId','$ssl','$enabled')";

            $insertR = mysqli_query($conn, $insert);

            if (mysqli_insert_id($conn) > 0) {

                $data['code'] = 1;

                $data['message'] = "Setting updated";

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Setting not updated";

                print_r(json_encode($data));

            }

        }

    }

    function updateCallReadStatus($conn){

        $callId = $_POST['callId'];

        $companyId = $_SESSION['companyId'];

        if(isset($_POST['opCode']) && $_POST['opCode'] == 1){

            $update = "update rma set isRead=0 where id='$callId' and companyId='$companyId'";

            $updateR = mysqli_query($conn, $update);

            print_r($update);

        } else {

            

        $update = "update contract_service_call set isRead=0 where id='$callId' and companyId='$companyId'";

        $updateR = mysqli_query($conn, $update);

        print_r($update);

        }

        

    }

    function deleteProduct($conn,$companyId){

        $data = array();    

        $productId = $_POST['productId'];

        $UserId = $_SESSION['userId'];

        $delete = "update productspare set isDeleted='1' where id='$productId' and company_id='$companyId'";

        $deleteR = mysqli_query($conn,$delete);

        if($deleteR){

            $data['code'] =1;

            $actionNote ="Product Id:".$productId." marked as deleted.";

            $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

        } else {

            $data['code'] =0;

        }

        print_r(json_encode($data));

    }

     function deleteInward($conn,$companyId){

        $inward = $_POST['inward'];

        $UserId = $_SESSION['userId'];

        $get = "select refNo,company_id,productQty,productId from productinward where refNo='$inward' and company_id='$companyId'";

        $queryR = mysqli_query($conn,$get);

        if($queryR){

                $rowCount = mysqli_num_rows($queryR);

				if($rowCount>0){

				$i=0;

				while($row = mysqli_fetch_assoc($queryR)){

                    $qty = $row['productQty'];

                    $product_id = $row['productId'];

                    $oldPCount = $this->getProductCount($conn, $companyId, $product_id);

                    $newCount = $oldPCount-$qty;

                    $updateProductQty = "update productspare set productQty='$newCount' where company_id='$companyId' and id='$product_id'";

                    $updateProductQtyR = mysqli_query($conn, $updateProductQty);

                    if ($updateProductQtyR) {

                        $delete = "delete from productinward where refNo='$inward' and company_id='$companyId' and productId='$product_id'";

                        $deleteR = mysqli_query($conn,$delete);

                        if($delete){

                            $i = $i+1;

                            $actionNote = "Product qty - and inward product deleted. product_id:".$product_id ."from call ref.".$inward;

                            $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                        } else {

                            $actionNote = "Product qty  and inward product not deleted. product_id:".$product_id ."from call ref.".$inward;

                            $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                        }

                    } else {

                        $actionNote = "Product qty not - and inward product not deleted. product_id:".$product_id ."from call ref.".$inward;

                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                    }

                }

                if($i == $rowCount){

                    $deleteOutWard = "delete from reference_bill where reference_number='$inward'";

                    $deleteOutWardR = mysqli_query($conn,$deleteOutWard);

                    if($deleteOutWardR){

                        $data['code']  = 1;

                        $data['message'] = "Inward delete.";

                        $actionNote = "Inward delete. reference_number=".$inward;

                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                        print_r(json_encode($data));

                    } else {

                        $data['code']  = 0;

                        $data['message'] = "Inward not delete.";

                        $actionNote = "Inward not delete. reference_number=".$inward;

                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                    }

                } else {

                    $data['code']  = 0;

                    $data['message'] = "Inward not found.Row:".$rowss;

                    $data['query'] = $get;

                    print_r(json_encode($data));

                }	

				} else {

					$deleteOutWard = "delete from reference_bill where reference_number='$inward'";

                    $deleteOutWardR = mysqli_query($conn,$deleteOutWard);

                    if($deleteOutWardR){

                        $data['code']  = 1;

                        $data['message'] = "Inward delete.";

                        $actionNote = "Inward delete. RefNO.".$inward;

                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                        print_r(json_encode($data));

                    } else {

                        $data['code']  = 0;

                        $data['message'] = "Inward not delete.";

                        $actionNote = "Inward not delete. RefNO.".$inward;

                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                    }

				}

        } else {

            $data['code'] =0;

			$data['query'] = $get;

            $data['message'] = "Query Error:".mysqli_error($conn);

            print_r(json_encode($data));

        }

    }

    function deleteOut($conn,$companyId){

        $inward = $_POST['inward'];

        $UserId = $_SESSION['userId'];

        $get = "select refNo,company_id,productQty,productId from productoutward where refNo='$inward' and company_id='$companyId'";

        $queryR = mysqli_query($conn,$get);

        if($queryR){

                $rowCount = mysqli_num_rows($queryR);

				if($rowCount>0){

				$i=0;

				while($row = mysqli_fetch_assoc($queryR)){

                    $qty = $row['productQty'];

                    $product_id = $row['productId'];

                    $oldPCount = $this->getProductCount($conn, $companyId, $product_id);

                    $newCount = $oldPCount+$qty;

                    $updateProductQty = "update productspare set productQty='$newCount' where company_id='$companyId' and id='$product_id'";

                    $updateProductQtyR = mysqli_query($conn, $updateProductQty);

                    if ($updateProductQtyR) {

                        $delete = "delete from productoutward where refNo='$inward' and company_id='$companyId' and productId='$product_id'";

                        $deleteR = mysqli_query($conn,$delete);

                        if($delete){

                            $i = $i+1;

                            $actionNote = "Product qty + and out product deleted. product_id:".$product_id ."from call ref.".$inward;

                            $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                        } else {

                            $actionNote = "Product qty + and out product not deleted. product_id:".$product_id ."from call ref.".$inward;

                            $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                        }

                    } else {

                        $actionNote = "Product qty not + and out product not deleted. product_id:".$product_id ."from call ref.".$inward;

                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                    }

                }

                if($i == $rowCount){

                    $deleteOutWard = "delete from outward where callRef='$inward'";

                    $deleteOutWardR = mysqli_query($conn,$deleteOutWard);

                    if($deleteOutWardR){

                        $data['code']  = 1;

                        $data['message'] = "Outward delete.";

                        $actionNote = "Outward delete. callRef=".$inward;

                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                        print_r(json_encode($data));

                    } else {

                        $data['code']  = 0;

                        $data['message'] = "Outward not delete.";

                        $actionNote = "Outward not delete. callRef=".$inward;

                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                    }

                } else {

                    $data['code']  = 0;

                    $data['message'] = "Outward not found.Row:".$rowss;

                    $data['query'] = $get;

                    print_r(json_encode($data));

                }	

				} else {

					$deleteOutWard = "delete from outward where callRef='$inward'";

                    $deleteOutWardR = mysqli_query($conn,$deleteOutWard);

                    if($deleteOutWardR){

                        $data['code']  = 1;

                        $data['message'] = "Outward delete.";

                        $actionNote = "Outward delete. RefNO.".$inward;

                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                        print_r(json_encode($data));

                    } else {

                        $data['code']  = 0;

                        $data['message'] = "Outward not delete.";

                        $actionNote = "Outward not delete. RefNO.".$inward;

                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                    }

				}

        } else {

            $data['code'] =0;

			$data['query'] = $get;

            $data['message'] = "Query Error:".mysqli_error($conn);

            print_r(json_encode($data));

        }

    }

	function getCurrentPassword($conn,$userId,$companyId){

				$cp="";
                $userRole = $_SESSION['userRole'];
                if($userRole == 3){
                    
                    $select = "select loginPassword from employee_usres where id='$userId' and companyId='$companyId'";
    				$selectR = mysqli_query($conn,$select);
    				if($selectR){
            				$row = mysqli_fetch_assoc($selectR);
            				$cp = $row['loginPassword'];
                    }
                    
                } else {
                        $select = "select loginPassword from company_user where id='$userId' and companyId='$companyId'";
    
    				$selectR = mysqli_query($conn,$select);
    
    				if($selectR){
    
        				$row = mysqli_fetch_assoc($selectR);
        
        				$cp = $row['loginPassword'];    
                    }
				

				}

				return $cp;

	}

    function updatePassword($conn, $p){

        $userId = $_POST['userId'];

        $email = $_SESSION['loginEmail'];
        $role = $_SESSION['userRole'];
        $newPass = $_POST['newPass'];

		$currentP = $_POST['currentP'];

		$companyId = $_SESSION['companyId'];

		$dbcp = $this->getCurrentPassword($conn,$userId,$companyId);

		$p_hash = $p->check_password($dbcp, $currentP);

		if($p_hash){

		

        $phash = $p->hash($newPass);
        
        if($role == 3){
            $update = "update employee_usres set loginPassword='$phash',tempPass='',isTempPass=0,islock=0 where id='$userId' and companyId='$companyId'";

        $updateR = mysqli_query($conn,$update);

        if($updateR){

            $subject = "Password Change Notification.";

            $body = "Dear ".$email.",<br/><br/> Your password has been changed. Below is new login details,<br/>

					Email:&nbsp;".$email."<br/>Password:&nbsp;".$newPass."<br/><br/> If not you please contact your service provider.";

            $mail = $this->sendMail($conn,$body,$email,$subject,$companyId);

            $data['mail'] =$mail;

            $data['code'] = 1;

            $_SESSION['tempPass'] = 0;

            $data['message'] = "Password changed";

            $actionNote = "Password changed";

            $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

            print_r(json_encode($data));

        } else {

            $data['code'] = 0;

            $data['message'] = "Password not changed";

            $actionNote = "Password not changed";

            $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

            print_r(json_encode($data));

        }
        }   else {
                $update = "update company_user set loginPassword='$phash',tempPass='',isTempPass=0 where id='$userId' and companyId='$companyId'";

        $updateR = mysqli_query($conn,$update);

        if($updateR){

            $subject = "Password Change Notification.";

            $body = "Dear ".$email.",<br/><br/> Your password has been changed. Below is new login details,<br/>

					Email:&nbsp;".$email."<br/>Password:&nbsp;".$newPass."<br/><br/> If not you please contact your service provider.";

            $mail = $this->sendMail($conn,$body,$email,$subject,$companyId);

            $data['mail'] =$mail;

            $data['code'] = 1;

            $_SESSION['tempPass'] = 0;

            $data['message'] = "Password changed";

            $actionNote = "Password changed";

            $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

            print_r(json_encode($data));

        } else {

            $data['code'] = 0;

            $data['message'] = "Password not changed";

            $actionNote = "Password not changed";

            $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

            print_r(json_encode($data));

        }
        }  
        

        

		} else {

			$data['code'] = 0;

            $data['message'] = "Invalid current password, try again.";

            $actionNote = "Password not changed,Invalid current password, try again.";

            $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

            print_r(json_encode($data));

		}



    }

	function checkLoginName($c_login_email,$conn){

		$r = 0;

		$select = "select * from company_user where company_user.loginEmail='$c_login_email'";

		$selectR = mysqli_query($conn,$select);

		if($selectR && mysqli_num_rows($selectR) == 0){

			$r=1;

		}

		return $r;

	}

	

    function add_new_company($conn,$p) {

        $UserId = $_SESSION['userId'];

        $c_email = $_POST['c_email'];

        $c_name=$_POST['c_name'];

        $c_phone=$_POST['c_phone'];

        $c_c_person=$_POST['c_c_person'];

        $c_person_email=$_POST['c_person_email'];

        $c_address=$_POST['c_address'];

        $c_plan=$_POST['c_plan'];

        $contract_limit = $_POST['c_contract_limit'];

        $customer_limit = $_POST['c_customr_limit'];

        $engineer_limit	 = $_POST['c_engineer_limit'];

        $newed = $_POST['newed'];

        $c_person_phone = $_POST['c_person_phone'];

        $c_login_email=$_POST['c_login_email'];

        $c_login_password = $_POST['c_login_password'];

        $c_company_status=$_POST['c_company_status'];

        $phash = $p->hash($c_login_password);

        $today =date("Y-m-d H:i:s");

        $isUpdate = $_POST['isUpdate'];

        $c_login_state = $_POST['c_login_state'];

        if($isUpdate>0){

            $sql = "select * from company where company_id='$isUpdate'";
 
            $query = mysqli_query($conn, $sql);

            $rows = mysqli_num_rows($query);

            if ($rows > 0) {

                $update  = "update company set company_name='$c_name',company_email='$c_email',comapny_address='$c_name',

						contact_person_name='$c_c_person',contact_person_email='$c_person_email',contact_person_phone='$c_person_phone',

						company_phone='$c_address',endDate='$newed',contract_limit='$contract_limit',customer_limit='$customer_limit',engineer_limit='$engineer_limit',company_status='$c_company_status',subscription_id='$c_plan' where company_id='$isUpdate'";

                $updateR = mysqli_query($conn,$update);

                if($updateR){

                    $data['code'] = 2;

                    $data['message'] = "Company details updated.";

                    $actionNote = "Company details updated.";

                    $this->updateLog($conn, 0, $UserId, $actionNote, $UserId);

                    print_r(json_encode($data));



                } else {

                    $data['code'] =0;

                    $data['message'] = "Action failed, Error:".mysqli_error($conn);

                    $actionNote = "Action failed, Error:".mysqli_error($conn);

                    $this->updateLog($conn, 0, $UserId, $actionNote, $UserId);

                    print_r(json_encode($data));

                }

            } else {

                $data['code'] = 0;

                $data['message'] = "Company not found.";

                print_r(json_encode($data));

            }

        } else {



            $sql = "select * from company where company_email='$c_email'";

            $query = mysqli_query($conn, $sql);

            $rows = mysqli_num_rows($query);

            if ($rows > 0) {

                $data['code'] = 0;



                $data['message'] = "Company with the details alreday created.";



                print_r(json_encode($data));



            } else {

				$checkLoginName = $this->checkLoginName($c_login_email,$conn);

				if($checkLoginName == 0){

					$data['code'] = 0;

					$data['message'] = "login email already taken, try different one.";

					print_r(json_encode($data));

				} else {

					$sql = "INSERT INTO company VALUES (DEFAULT,'$c_name','$c_email','$c_address','$c_c_person','$c_person_email','$c_person_phone','$c_phone'"

                    . ",'$contract_limit','$customer_limit','$engineer_limit','$c_company_status','$c_plan','$today','$UserId',0,'$newed')";

					$query = mysqli_query($conn, $sql);

                if ($query && mysqli_insert_id($conn)>0) {

                    $cId = mysqli_insert_id($conn);

                    if($cId>0){

                        if($c_login_state == 1){

							$createLogin = "insert into company_user values(DEFAULT,'1','$c_name','$c_login_email','$phash',2,'$cId',

								'$c_company_status',DEFAULT,'$UserId',0,0,0,'$c_phone',0)";

                            $createLoginR = mysqli_query($conn, $createLogin);

                            if($createLoginR && mysqli_insert_id($conn)>0 ){



                                $subject = "Login mail details";

                                $body = "Dear ".$c_name.",<br/>"." Your account has been created, Below is loagin details,<br/>".

                                    "Login Name: ".$c_login_email."<br/> Login Password: ".$c_login_password."<br/><br/>".

                                    "Contract Limit:".$contract_limit."<br/>Customer Limit:".$customer_limit."<br/>Engineer Limit:".$engineer_limit."</br/> Service Call Limit:".$service_call_limit."<br/><br/><br/>Please login for more details<br/><br/>Regards,<br/>Service CRM";

                                $mail = $this->sendMailSupperAdmin($conn,$body,$c_email,$subject);

                                if($mail == 1){

                                    $data['message'] = "Company created successfully, Login created and mail sent.";

                                } else {

                                    $data['message'] = "Company created successfully, Login created, Unable to send mail.";

                                }

                                $data['mail'] = $mail;

                            } else {

                                $data['message'] = "Company created successfully, Unable to create login.".mysqli_query($conn);

                            }

                        } else {

                            $data['message'] = "Company created successfully";

                        }

                        $actionNote = "New Company created, and details shared with company";

                        $this->updateLog($conn, 0, $UserId, $actionNote, $UserId);

                        $data['code'] = 1;

                        print_r(json_encode($data));

                    } else {

                        $data['code'] = 0;

                        $data['message'] = "Company created successfully, Unable to assing user. Error:". mysqli_error($conn);

                        $actionNote = "Company created successfully, Unable to assing user. Error:". mysqli_error($conn);

                        $this->updateLog($conn, 0, $UserId, $actionNote, $UserId);

                        print_r(json_encode($data));



                    }



                } else {



                    $data['code'] = 0;



                    $data['message'] = "Unable to company created, Error:". mysqli_error($conn);



                    print_r(json_encode($data));



                }

				}

                

            }

        }



    }

    function isMail($conn){
        $companyId = $_SESSION['companyId'];
        $checkMail = "select * from emailsetting where companyid ='$companyId' and enabled=1";
        $checkMailR = mysqli_query($conn, $checkMail);
        if(mysqli_num_rows($checkMailR)>0){
            return true;
        }
        return false;
    }

    function sendMailSupperAdmin($conn,$body,$toMail,$subject){


        $isMail = $this->isMail($conn);
        if($isMail){
            try{
                $email_smtp_host ='mail.amcdesk.com';// $row['smtp_host'];
        $email_smtp_port = '25';//$row['smtp_port'];
        $email_sender = 'info@amcdesk.com';//$row['sender_mail'];
        $email_host_username = 'info@amcdesk.com';//$row['smtp_username'];
        $email_host_password = '123456';//$row['smtp_password'];
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = $email_smtp_host;//"mail.amcdesk.com";
        $mail->Port = $email_smtp_port;//"25";
        //$mail->SMTPDebug = 2;
        $mail->Username =  $email_host_username;
        $mail->Password = $email_host_password;
        $mail->SMTPSecure = true;
        $mail->SMTPAutoTLS = true;
        $mail->SMTPAuth = true;
        $mail->From = $email_sender;
        $mail->FromName = "AMC  Service System";
        $mail->addAddress($toMail, $toMail);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        //$mail->Body = $body;
        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
        $html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Automatic Email</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        </head>
        <body style="margin:0; padding:10px 0 0 0;" bgcolor="#F8F8F8">
        <table align="center" border="1" cellpadding="0" cellspacing="0" width="800"
                   style="border-collapse: separate; border-spacing: 2px 5px; box-shadow: 1px 0 1px 1px #B8B8B8;"
                   bgcolor="#FFFFFF">
				   <tr>
                    <td style="padding: 5px 5px 5px 5px;">
							<strong>'.$subject.'</strong>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px 5px 5px 5px;">
                        '.$body.'
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#66989c" style="padding: 15px 15px 15px 15px;color: #fff;">
                        <table cellpadding="0" cellspacing="0" width="100%%">
                            <tr>
                                <td>
                                    <strong>Note: This mail is system generated, don\'t reply on it.</strong>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table></body>
</html>';
            $z = $html;
			 $mail->MsgHTML($z);
        $mail1 = $mail->send();
        if ($mail1) {
            $actionNote = "Mail sent to user from supper admin";
            $this->updateLog($conn, 0, 0, $actionNote, 0);
            return 1;
        } else {
            $actionNote = "Mail not sent to user from supper admin";
            $this->updateLog($conn, 0, 0, $actionNote, 0);
            return 0;
        } 
            }catch(Exception $e){
                return 0;
            }
        } else {
            return 0;   
        }
      
    }

    function sendMail($conn,$body,$toMail,$subject,$companyId){

        $isMail = $this->isMail($conn);
        if($isMail){
            try{
                $checkSetting = "select * from emailsetting where companyid='$companyId' limit 1";

        $checkSettingR = mysqli_query($conn, $checkSetting);

        if (mysqli_num_rows($checkSettingR) > 0) {

            $row = mysqli_fetch_assoc($checkSettingR);


            
            $isssl = $row['isssl'];
            $ssl=false;
            if($isssl == 1){
                $ssl = true;
            }

            $email_smtp_host = $row['smtp_host'];

            $email_smtp_port = $row['smtp_port'];

            $email_sender = $row['sender_mail'];

            $email_host_username = $row['smtp_username'];

            $email_host_password = $row['smtp_password'];





            $mail = new PHPMailer\PHPMailer\PHPMailer(true);

            $mail->isSMTP();

            $mail->Host = $email_smtp_host;//"mail.amcdesk.com";

            $mail->Port = $email_smtp_port;//"25";

          // $mail->SMTPDebug = 4;

            $mail->SMTPAuth = true;

            $mail->Username =  $email_host_username;

            $mail->Password = $email_host_password;

            $mail->SMTPSecure = true;

            $mail->SMTPAutoTLS = $ssl;
            $mail->SMTPKeepAlive = true;
            $mail->Timeout       =   15; // set the timeout (seconds)

            $mail->From = $email_sender;

            $mail->FromName = "AMC  Service System";

            $mail->addAddress($toMail, $toMail);

            $mail->isHTML(true);

            $mail->Subject = $subject;

           // $mail->Body = $body;

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

  

$html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <title>Automatic Email</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body style="margin:0; padding:10px 0 0 0;" bgcolor="#F8F8F8">



<table align="center" border="1" cellpadding="0" cellspacing="0" width="800"

                   style="border-collapse: separate; border-spacing: 2px 5px; box-shadow: 1px 0 1px 1px #B8B8B8;"

                   bgcolor="#FFFFFF">

				   <tr>

                    <td style="padding: 5px 5px 5px 5px;">

                        	<strong>'.$subject.'</strong>

					</td>

                </tr>

                <tr>

                    <td style="padding: 5px 5px 5px 5px;">

                       '.$body.'

                            

                    </td>

                </tr>

                <tr>

                    <td bgcolor="#66989c" style="padding: 15px 15px 15px 15px;color: #fff;">

                        <table cellpadding="0" cellspacing="0" width="100%%">

                            <tr>

                                <td>

                                    <strong>Note: This mail is system generated, don\'t reply on it.</strong>

                                </td>

                            </tr>

                        </table>

                    </td>

                </tr>

            </table></body>

</html>';

			

            $z = $html;

			//print_r($z);

			

			 $mail->MsgHTML($z);
            try{
                  $mail1 = $mail->send();

            if ($mail1) {

                $actionNote = "Mail sent ".$subject;

                $this->updateLog($conn, $companyId, 0, $actionNote, 0);

                return 1;

            } else {

                $actionNote = "Mail not sent ".$subject;

                $this->updateLog($conn, $companyId,0, $actionNote, 0);

                return 0;

            }
            $mail->smtpClose();
            }catch(Exception $e){
                                $actionNote = "Mail not sent ".$subject;

                $this->updateLog($conn, $companyId,0, $actionNote, 0);

                return 0;
            }
          

        } else {

            $actionNote = "Mail setting missing. ".$subject;

            $this->updateLog($conn, $companyId, 0, $actionNote, 0);

            return 0;

        }
            }catch(Exception $e){
                return 0;
            }
        } else {
          return 0;  
        }
        

    }

    function sendTestMail($conn) {
        try { 
             $test_email_id = $_POST['test_email_id'];
        $companyId = $_SESSION['companyId'];
        $checkSetting = "select * from emailsetting where companyid='$companyId' limit 1";
        $checkSettingR = mysqli_query($conn, $checkSetting);
        if (mysqli_num_rows($checkSettingR) > 0) {
            $row = mysqli_fetch_assoc($checkSettingR);
            $email_smtp_host = $row['smtp_host'];
            $email_smtp_port = $row['smtp_port'];
            $email_sender = $row['sender_mail'];
            $email_host_username = $row['smtp_username'];
            $email_host_password = $row['smtp_password'];
            $isEmail = $row['enabled'];
            
            $isssl = $row['isssl'];
            $ssl=false;
            if($isssl == 1){
                $ssl = true;
            }
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->Host = $email_smtp_host;//"mail.amcdesk.com";
            $mail->Port = $email_smtp_port;//"25";
            //$mail->SMTPDebug = 0;
            $mail->SMTPKeepAlive = true;
            $mail->SMTPAuth = true;
            $mail->Username =  $email_host_username;
            $mail->Password = $email_host_password;
            $mail->SMTPSecure = $ssl;
            $mail->SMTPAutoTLS = true;
             $mail->Timeout       =   30; // set the timeout (seconds)
    
            //From email address and name
            $mail->From = $email_sender;
            $mail->FromName = "Test Mail";
            //To address and name
            $mail->addAddress($test_email_id, $test_email_id);
            //  $mail->addAddress("recepient1@example.com"); //Recipient name is optional
                    //Address to which recipient will reply
            //$mail->addReplyTo("reply@yourdomain.com", "Reply");
            //CC and BCC
            // $mail->addCC("cc@example.com");
            //$mail->addBCC("bcc@example.com");
            //Send HTML or Plain Text email
            $mail->isHTML(true);
            $mail->Subject = "Test Mail";
            $mail->Body = "<i>This is a test mail </i>";
            $mail->AltBody = "This is a test mail";
            try{
                
            $mail1 = $mail->send();
            if ($mail1) {
                $data['code'] = 1;
                $data['message'] = "Message successfully sent!";
                print_r(json_encode($data));
            } else {
                $data['code'] = 0;
                $data['message'] = "Test Email Not Sent!";
                print_r(json_encode($data));
            }
            }catch(Exception $e){
                $data['code'] = 0;
                $data['message'] = "Test Email Not Sent!";
                print_r(json_encode($data));
            }
            $mail->smtpClose();

        } else {
            $data['code'] = 0;
            $data['message'] = "Email send setting missing";
            print_r(json_encode($data));
        }
        } catch(Exception $e){
            $data['code'] = 0;
            $data['message'] = "Email operation failed.";
            print_r(json_encode($data));
        }
       

    }



    function addUpEmailSetting($conn) {

        $email_smtp_host = $_POST['email_smtp_host'];

        $email_smtp_port = $_POST['email_smtp_port'];

        $email_sender = $_POST['email_sender'];

        $email_host_username = $_POST['email_host_username'];

        $email_host_password = $_POST['email_host_password'];

        $companyId = $_SESSION['companyId'];
        $ssl = $_POST['ssl'];
        $enabled = $_POST['enabled'];

        $checkSetting = "select * from emailsetting where companyid='$companyId' limit 1";

        $checkSettingR = mysqli_query($conn, $checkSetting);

        if (mysqli_num_rows($checkSettingR) > 0) {

            $update = "update emailsetting set  isssl='$ssl',enabled='$enabled', smtp_host='$email_smtp_host',smtp_port ='$email_smtp_port',smtp_username ='$email_host_username',smtp_password ='$email_host_password',sender_mail='$email_sender' where companyid='$companyId'";

            $updateR = mysqli_query($conn, $update);

            if ($updateR) {

                $data['code'] = 1;

                $data['message'] = "Setting updated";

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Setting not updated,Error:" . mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else {

            $insert = "insert into emailsetting values(DEFAULT,'$email_smtp_host','$email_smtp_port','$email_host_username','$email_host_password','$email_sender','$companyId','$ssl','$enabled')";

            $insertR = mysqli_query($conn, $insert);

            if (mysqli_insert_id($conn) > 0) {

                $data['code'] = 1;

                $data['message'] = "Setting updated";

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Setting not updated";

                print_r(json_encode($data));

            }

        }

    }



    function deleteOperation($conn) {

        $deleteCode = $_POST['deleteCode'];

        $contractId = $_POST['contractId'];

        $companyId = $_SESSION['companyId'];

        $UserId = $_SESSION['userId'];

        if ($deleteCode == 1) { // contract

            $delete = "update service_contract set isDeleted=1 where id='$contractId' and companyId='$companyId'";

            $deleteR = mysqli_query($conn, $delete);

            if ($deleteR) {

                $data['code'] = 1;

                $data['message'] = "Deleted";

                $actionNote = 'Service Contract deleted, ContractId:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Query Error try again";

                $actionNote = 'Query Error try again, Contract not deleted. ContractId:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            }

        }

        if ($deleteCode == 2) { // delete customer

            $checkC = "select * from service_contract where isDeleted=0 and customerId='$contractId' and companyId='$companyId' ";

            $checkCR = mysqli_query($conn, $checkC);

            if (mysqli_num_rows($checkCR) == 0) {

                $delete = "update company_customer set isDeleted=1 where id='$contractId' and company_id='$companyId'";

                $deleteR = mysqli_query($conn, $delete);

                if ($deleteR) {

                    $data['code'] = 1;

                    $data['message'] = "Deleted";

                    $actionNote = 'Customer deteleted. Customer:'.$contractId;

                    $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                    print_r(json_encode($data));

                } else {

                    $data['code'] = 0;

                    $data['message'] = "Query Error try again";

                    $actionNote = 'Query Error try again, Customer not deleted. Customer Id:'.$contractId;

                    $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                    print_r(json_encode($data));

                }

            } else {

                $data['code'] = 0;

                $data['message'] = "Customer have active contract, Please check.";

                $actionNote = 'Customer have active contract, Please check. Customer Id:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            }

        }

        if ($deleteCode == 3) { //mark eng as deleted.

            $delete = "update employee_usres set isDeleted=1 where id='$contractId'  and companyId='$companyId'";

            $deleteR = mysqli_query($conn, $delete);

            if ($deleteR) {

                $data['code'] = 1;

                $data['message'] = "Deleted";

                $actionNote = 'Employee deleted, Employee Id:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actonNote, $UserId);

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Query Error try again";

                $actionNote = 'Employee not deleted, Employee Id:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            }

        }
        if ($deleteCode == 7) { //mark eng as deleted.

            $delete = "update servicecenter set isDeleted=1 where id='$contractId'  and companyId='$companyId'";

            $deleteR = mysqli_query($conn, $delete);

            if ($deleteR) {

                $data['code'] = 1;

                $data['message'] = "Deleted";

                $actionNote = 'Vendor deleted, Vendor Id:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Query Error try again";

                $actionNote = 'Employee not deleted, Employee Id:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            }

        }

        if ($deleteCode == 4) { //mark servicecall as deleted.

            $delete = "delete from contract_service_call where id='$contractId' and companyId='$companyId'";

            $deleteR = mysqli_query($conn, $delete);

            if ($deleteR) {

                $data['code'] = 1;

                $data['message'] = "Deleted";

                $actionNote = 'Contract service call deleted, Call Id:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Query Error try again";

                $actionNote = 'Contract service call not deleted, Call Id:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            }

        }

        if ($deleteCode == 5) { // contract deactive

            $statusCode = $_POST['statusCode'];

            if ($statusCode == 0) {

                $delete = "update service_contract set status=4,isActive=0 where id='$contractId' and companyId='$companyId'";

            } else if ($statusCode == 1) {

                $delete = "update service_contract set status=1,isActive=1 where id='$contractId'  and companyId='$companyId'";

            }



            $deleteR = mysqli_query($conn, $delete);

            if ($deleteR) {

                $data['code'] = 1;

                $data['message'] = "Updated";

                $actionNote = "";

                if($statusCode == 4){

                    $actionNote = 'Contract status changed to deactive, Constract Id:'.$contractId;

                } else if($statusCode == 1){

                    $actionNote = 'Contract status changed to active, Constract Id:'.$contractId;

                }



                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Query Error try again";

                $actionNote = 'Contract not status updated, Call Id:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            }

        }

        if ($deleteCode == 6) { //mark servicecall as unassigned.

            $delete = "update contract_service_call set call_assigned_to='0',call_status='2' where id='$contractId' and companyId='$companyId'";

            $deleteR = mysqli_query($conn, $delete);

            if ($deleteR) {

                $data['code'] = 1;

                $data['message'] = "Deleted";

                $actionNote = 'Contract service call unassigned, Call Id:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Query Error try again";

                $actionNote = 'Contract service call not unassigned, Call Id:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            }

        }
        if ($deleteCode == 8) { //mark servicecall as unassigned.

            $delete = "update rma set isDeleted=1 where id='$contractId' and companyId='$companyId'";

            $deleteR = mysqli_query($conn, $delete);

            if ($deleteR) {

                $data['code'] = 1;

                $data['message'] = "Deleted";

                $actionNote = 'ram updated to deleted rma Id:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Query Error try again";

                $actionNote = 'rma not updated to delete, rma Id:'.$contractId;

                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);

                print_r(json_encode($data));

            }

        }
          if ($deleteCode == 9) { //delete checklist.

            $delete = "delete from  checklist where id ='$contractId'";

            $deleteR = mysqli_query($conn, $delete);

            if ($deleteR) {

                $data['code'] = 1;

                $data['message'] = "Deleted";

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Query Error try again";
                print_r(json_encode($data));

            }

        }



    }



    function updateUserData($conn) {

        $companyId = $_SESSION['companyId'];

        $userId = $_POST['userId'];
        $role = $_SESSION['userRole'];
    

        $userFullName = $_POST['userFullName'];

        $userContact = $_POST['userContact'];

        $userEmail = $_POST['userEmail'];

        $address = $_POST['address'];
        $latlang =0;
        if($role == 3){
         $update = "update employee_usres  set Name = '$userFullName',address='$address' where id='$userId' and companyId='$companyId'";
        $updateR = mysqli_query($conn, $update);

        if ($updateR) {

            $latlang = 1;

        } else {
                  $latlang = $update;
        }

        print_r($latlang);
        } else {
             $update = "update company set comapny_address='$address' where company_id='$companyId'";

        $updateR = mysqli_query($conn, $update);

        if ($updateR) {

            $latlang = 1;

        }

        print_r($latlang);     
        }
       

    }



    function updateOnline($conn) {

        $companyId = $_SESSION['companyId'];

        $getEng = "select *,TIMESTAMPDIFF(MINUTE,lastDateTimeOnline,NOW()) as dayDiffC from employee_usres where companyId='$companyId' and (isOnline=1 or isOnline=2)";

        $getEngR = mysqli_query($conn, $getEng);

        if ($getEngR) {

            while ($row = mysqli_fetch_assoc($getEngR)) {

                $today = date("Y-m-d H:i:s");

                $lastup = $row['lastDateTimeOnline'];

                $to_time = strtotime($lastup);

                $id = $row['id'];

                $from_time = strtotime($today);

                $time = abs($row['dayDiffC']);

                //$minutes = (strtotime($lastup) - time()) / 60;

                $minutes = $this->dateDifference($lastup, $today);

                if ($minutes > 5) {

                    $update = "update employee_usres set isOnline=0 where id='$id' and companyId='$companyId'";

                    $updateR = mysqli_query($conn, $update);

                    if ($updateR) {

                        print_r($minutes);

                    } else {

                        print_r($minutes);

                    }

                } else {

                    print_r($minutes);

                }

            }

        } else {

            print_r("10");

        }

    }



    function dateDifference($date1, $date2) {

        $date1 = strtotime($date1);

        $date2 = strtotime($date2);

        $diff = abs($date1 - $date2);



        $day = $diff / (60 * 60 * 24); // in day

        $dayFix = floor($day);

        $dayPen = $day - $dayFix;

        if ($dayPen > 0) {

            $hour = $dayPen * (24); // in hour (1 day = 24 hour)

            $hourFix = floor($hour);

            $hourPen = $hour - $hourFix;

            if ($hourPen > 0) {

                $min = $hourPen * (60); // in hour (1 hour = 60 min)

                $minFix = floor($min);

                $minPen = $min - $minFix;

                if ($minPen > 0) {

                    $sec = $minPen * (60); // in sec (1 min = 60 sec)

                    $secFix = floor($sec);

                }

            }

        }

        $str = "";

        if ($dayFix > 0)

            $str .= $dayFix . " day ";

        if ($hourFix > 0)

            $str .= $hourFix . " hour ";

        if ($minFix > 0)

            $str .= $minFix . " min ";

        if ($secFix > 0)

            $str .= $secFix . " sec ";

        return $minFix;

    }



    function updateRenewal($conn) {



        $companyId = $_SESSION['companyId'];

        $contractId = $_POST['contractId'];

        $userId = $_SESSION['loginName'];

        $c_c_type = $_POST['c_c_type'];

        $re_sd = $_POST['re_sd'];

        $re_sd_1 = preg_split("#-#", $re_sd);

        $re_sd_2 = $re_sd_1['2'] . "-" . $re_sd_1['1'] . "-" . $re_sd_1[0];

        $re_ed = $_POST['re_ed'];

        $re_ed_1 = preg_split("#-#", $re_ed);

        $re_ed_2 = $re_ed_1['2'] . "-" . $re_ed_1['1'] . "-" . $re_ed_1[0];

        $re_ch = $_POST['re_ch'];

        $re_note = $_POST['re_note'];

        $contractId = $_POST['contractId'];

        $current_start_date = $_POST['current_start_date'];

        $current_end_date = $_POST['current_end_date'];

        $today = date("Y-m-d H:i:s");

        $contract_service_type = $_POST['contract_service_type'];

        $current_charges = $_POST['current_charges'];





        if ($contractId != 0 && $contractId != "" && $current_start_date != "" && $current_start_date != "") {



            $insert = "insert into renewalhistory values(DEFAULT,'$current_start_date','$current_end_date','$re_sd_2','$re_ed_2','$re_ch','$re_note','$today','$userId','$contractId','$companyId','$contract_service_type','$current_charges','$c_c_type')";

            $insertR = mysqli_query($conn, $insert);

            if (mysqli_insert_id($conn) > 0) {

                $insertId = mysqli_insert_id($conn);
//totalAmount='$re_ch',balanceAmount='$re_ch',
                $update = "update service_contract set contractCharges='$re_ch',taxPercent=0,taxAmount=0,installment=0,contractType='$contract_service_type', status='1',startDate='$re_sd_2',endDate='$re_ed_2',renewalId='$insertId' where service_contract.id='$contractId' and companyId='$companyId'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $updateService = "update contract_service set isclosed=1 where contract_service.id='$contractId' and companyId='$companyId'";

                    $updateServiceR = mysqli_query($conn, $updateService);

                    $updatePayment = "update contract_payment_schedule set isclosed=1 where contract_id='$contractId' and company_id='$companyId'";

                    $updatePaymentR = mysqli_query($conn, $updatePayment);

                    $data['code'] = 1;

                    $data['updatePaymentR'] = $updatePaymentR;

                    $data['updateServiceR'] = $updateServiceR;

                    $data['message'] = "renewal details updated";

                } else {

                    $data['code'] = 0;

                    $data['message'] = "Unable to update renewal details";

                }

            } else {

                $data['code'] = 0;

                $data['message'] = "Unable to update renewal details";

            }

        } else {

            $data['code'] = 0;

            $data['message'] = "Contract details missing";

        }



        print_r(json_encode($data));

    }



    function deleteCProduct($conn) {



        $cId = $_POST['contractId'];

        $pId = $_POST['productId'];

        $companyId = $_SESSION['companyId'];

        $data = array();

        $delete = "delete from contract_product where contract_id='$cId' and product_id='$pId' and companyId='$companyId'";

        $deleteR = mysqli_query($conn, $delete);

        if ($deleteR) {

            $data['code'] = 1;

            $data['message'] = 'action applied';

        } else {

            $data['code'] = 0;

            $data['message'] = 'action not applied';

        }

        print_r(json_encode($data));

    }








    
    function addNewCProduct($conn) {



        $contract_number = $_POST['contractId'];

        $productType = $_POST['productType'];

        $productName = $_POST['productName'];

        $serial_number = $_POST['serial_number'];

        $other_details = $_POST['other_details'];


        $companyId = $_SESSION['companyId'];

        $data = array();

        for($i=0;$i<sizeof($serial_number);$i++){

            $srno = $serial_number[$i];

            //$check ="select * from contract_product where ";

            $inquery =  "INSERT INTO spare_product 
                           VALUES (DEFAULT, '$companyId', '$productName', '$productType', '$userId', '$today', '0', '$productPrice', '$num_code', '$hsn', '$account_group', '$classification', '$serial_number', '$other_details', '$product_details', '$productStatus')";

            $inresult = mysqli_query($conn, $inquery);

            if (mysqli_insert_id($conn) > 0) {

                $data['code'] = 1;

                $data['message'] = "product added";

            } else {

                $data['code'] = 2;

                $data['message'] = "product not added";

            }

        }

        print_r(json_encode($data));

    }



    function deleteContractSheduleService($conn) {



        $companyId = $_SESSION['companyId'];

        $serviveId = $_POST['serviveId'];

        $contractId = $_POST['contractId'];

        $userId = $_SESSION['userId'];

        $actionNote = "";

        $data = array();

        $delete = "delete from contract_service where contactId='$contractId' and id='$serviveId' and companyId='$companyId'";

        $deleteR = mysqli_query($conn, $delete);

        if ($deleteR) {

            $data['code'] = 1;

            $data['message'] = 'service deleted';

            $actionNote = "service :" . $serviveId . " of contract no." . $contractId . " deleted";

        } else {

            $data['code'] = 0;

            $data['message'] = 'service not deleted.';

            $actionNote = "service :" . $serviveId . " of contract no." . $contractId . " not deleted. Error" . mysqli_error($conn);

        }

        $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

        print_r(json_encode($data));

    }



    function getAllCustomerContratList($conn) {



        $custId = $_POST['customerId'];

        $companyId = $_SESSION['companyId'];

        $data = array();

        $select = "SELECT *,DATEDIFF(startDate,endDate) as dayDiff,DATEDIFF(startDate,NOW()) as dayDiffC,service_contract.id as contract_id, date_format(endDate,'%d-%b-%Y') as EndDate FROM

 service_contract,company_customer,contract_type,contract_status WHERE contract_status.status_id = service_contract.status

 and  company_customer.company_id = service_contract.companyId and service_contract.customerId= company_customer.id and

 contract_type.id = service_contract.contractType and service_contract.companyId='$companyId' and  service_contract.customerId='$custId' order by service_contract.contractId ASC";

        $selectR = mysqli_query($conn, $select);

        if ($selectR) {

            if (mysqli_num_rows($selectR) > 0) {

                while ($row = mysqli_fetch_assoc($selectR)) {

                    $data[] = $row;

                }

            }

        }

        print_r(json_encode($data));

    }



    function getCurrentStatus($conn, $callId) {

        $companyId = $_SESSION['companyId'];

        $statusId = 0;

        $getStatus = "select call_status from contract_service_call where id='$callId' and contract_service_call.companyId='$companyId' limit 1";

        $getStatusR = mysqli_query($conn, $getStatus);

        if ($getStatusR && mysqli_num_rows($getStatusR) > 0) {

            $row = mysqli_fetch_assoc($getStatusR);

            $statusId = $row['call_status'];

        }

        return $statusId;

    }



    function updateServiceCallToClose($conn) {



        $service_expan = $_POST['service_expan'];

        $service_type = $_POST['service_type'];

        $totalCustCharges = $_POST['totalCustCharges'];

        $callCloseRemark = $_POST['callCloseRemark'];
        $serviceId = $_POST['serviceId'];

        $companyId = $_SESSION['companyId'];

        $userId = $_SESSION['userId'];

		$company_email = $_POST['company_email'];

        $data = array();

        $today = date("Y-m-d H:i:s");

        $statusId = $this->getCurrentStatus($conn, $serviceId);

        if ($statusId == 6) {

            $update = "update contract_service_call set isRead=1,modify_date='$today',finalclosedatetime='$today',call_status=7,isfinalclosed=1,service_expan='$service_expan',"

                . "service_type='$service_type',custCharges='$totalCustCharges',closeRemark='$callCloseRemark' where id='$serviceId' and contract_service_call.companyId='$companyId'";

            $updateR = mysqli_query($conn, $update);

            if ($updateR) {
                            
                
						$subject = "Call has been closed.";

						$body = "Dear ".$company_email.",<br/><br/> Your call has been closed. <br/> Below is the details,<br/>

						Call Expences: ".$service_expan."<br/>Total Customer Charges: ".$totalCustCharges."<br/>**Close Note**<br/>".$callCloseRemark."

						<br/><br/>If you have any query please contact your service provider.";

						$actionNote = "Call has been closed. Email:".$company_email;

                        $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

				$mail = $this->sendMail($conn,$body,$company_email,$subject,$companyId);

                $this->add_service_call_action($conn, $companyId, $serviceId, 7, 3, $callCloseRemark, $userId);

            } else {

                $data['code'] = 0;

                $data['message'] = 'unable to update, Error:' . mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else if ($statusId == 3) {

            $data['code'] = 0;

            $data['message'] = 'call not proccess yet';

            print_r(json_encode($data));

        } else {

            $data['code'] = 0;

            $data['message'] = 'Call must be resolved first';

            print_r(json_encode($data));

        }

    }



   
    function settingFuntion($conn) {



        $action = $_POST['fCode'];

        $companyId = $_SESSION['companyId'];

        $data = array();

        if ($action == 1) {//contract type

            $typeName = $_POST['typeName'];

            $typeId = $_POST['typeId'];

            $typeStatus = $_POST['typeStatus'];

            if ($typeId == "") {

                $checkName = "select * from contract_type where contract_type_name='$typeName' and (company_id=0 or company_id='$companyId')";

                $checkNameR = mysqli_query($conn, $checkName);

                if ($checkNameR && mysqli_num_rows($checkNameR) == 0) {

                    $insert = mysqli_query($conn, "insert into contract_type values(DEFAULT,'$typeName','$companyId','$typeStatus')");

                    if (mysqli_insert_id($conn) > 0) {

                        $data['message'] = "Contract type added";
                        $data['code'] = 1;
                        print_r(json_encode($data));

                    } else {

                        $data['message'] = "Failed to add contract type, Error:" . mysqli_error($conn);
                        $data['code'] = 0;
                        print_r(json_encode($data));

                    }

                } else {

                    $data['message'] = "Contract type already added";
                    $data['code'] = 0;
                    print_r(json_encode($data));

                }

            } else if ($typeId > 0) {

                $update = "update contract_type set contract_type_name='$typeName',status='$typeStatus' where id='$typeId' and company_id='$companyId'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $data['message'] = "Contract type updated";

                    $data['qury'] = $update;
                    $data['code'] = 1;
                    print_r(json_encode($data));

                } else {

                    $data['message'] = "Failed to update contract type, Error:" . mysqli_error($conn);
                    $data['code'] = 0;
                    print_r(json_encode($data));

                }

            } else {

                $data['message'] = "Unknow action, try again";
                $data['code'] = 0;
                print_r(json_encode($data));

            }

            

        }

        if ($action == 2) {//product type

            $typeName = $_POST['typeName'];

            $typeId = $_POST['typeId'];

            $typeStatus = $_POST['typeStatus'];

            if ($typeId == "") {

                $checkName = "select * from product_type where name='$typeName' and (companyId=0 or companyId='$companyId')";

                $checkNameR = mysqli_query($conn, $checkName);

                if ($checkNameR && mysqli_num_rows($checkNameR) == 0) {

                    $insert = mysqli_query($conn, "insert into product_type values(DEFAULT,'$typeName','$companyId','$typeStatus')");

                    if (mysqli_insert_id($conn) > 0) {

                        $data['message'] = "Product type added";
                        $data['code'] = 1;
                        print_r(json_encode($data));

                    } else {

                        $data['message'] = "Failed to add Product type, Error:" . mysqli_error($conn);
                        $data['code'] = 0;
                        print_r(json_encode($data));

                    }

                } else {

                    $data['message'] = "Product type already added";
                    $data['code'] = 0;
                    print_r(json_encode($data));

                }

            } else if ($typeId > 0) {

                $update = "update product_type set name='$typeName',status='$typeStatus' where id='$typeId' and companyId='$companyId'";
                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $data['message'] = "Product type updated";
                    $data['code'] = 1;
                    print_r(json_encode($data));

                } else {

                    $data['message'] = "Failed to update Product type, Error:" . mysqli_error($conn);
                    $data['code'] = 0;
                    print_r(json_encode($data));

                }

            } else {

                $data['message'] = "Unknow action, try again";
                $data['code'] = 0;
                print_r(json_encode($data));

            }

            

        }

        if ($action == 3) {//service type

            $typeName = $_POST['typeName'];

            $typeId = $_POST['typeId'];

            $typeStatus = $_POST['typeStatus'];

            if ($typeId == "") {

                $checkName = "select * from servicetype where service_type_name='$typeName' and (company_id='0' or company_id='$companyId' )";

                $checkNameR = mysqli_query($conn, $checkName);

                if ($checkNameR && mysqli_num_rows($checkNameR) == 0) {

                    $insert = mysqli_query($conn, "insert into servicetype values(DEFAULT,'$typeName','$companyId','$typeStatus')");

                    if (mysqli_insert_id($conn) > 0) {

                        $data['message'] = "Service type added";
                        $data['code'] = 1;
                        print_r(json_encode($data));

                    } else {

                        $data['message'] = "Failed to add Service type, Error:" . mysqli_error($conn);
                        $data['code'] = 0;
                        print_r(json_encode($data));

                    }

                } else {

                    $data['message'] = "Product type already added";
                    $data['code'] = 0;
                    print_r(json_encode($data));

                }

            } else if ($typeId > 0) {

                $update = "update servicetype set service_type_name='$typeName',status='$typeStatus' where id='$typeId' and company_id='$companyId'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $data['message'] = "Service type updated";
                    $data['code'] = 1;
                    print_r(json_encode($data));

                } else {

                    $data['message'] = "Failed to update Service type, Error:" . mysqli_error($conn);
                    $data['code'] = 0;
                    print_r(json_encode($data));

                }

            } else {

                $data['message'] = "Unknow action, try again";
                $data['code'] = 0;
                print_r(json_encode($data));

            }

            

        }

        if ($action == 4) {//issue type

            $typeName = $_POST['typeName'];

            $typeId = $_POST['typeId'];

            $typeStatus = $_POST['typeStatus'];

            if ($typeId == "") {

                $checkName = "select * from issuetype where issue_name='$typeName' and (companyId='0' or companyId='$companyId')";

                $checkNameR = mysqli_query($conn, $checkName);

                if ($checkNameR && mysqli_num_rows($checkNameR) == 0) {

                    $insert = mysqli_query($conn, "insert into issuetype values(DEFAULT,'$typeName','$typeStatus','$companyId')");

                    if (mysqli_insert_id($conn) > 0) {

                        $data['message'] = "Issue type added";
                        $data['code'] = 1;
                        print_r(json_encode($data));

                    } else {

                        $data['message'] = "Failed to add Issue type, Error:" . mysqli_error($conn);
                        $data['code'] = 0;
                        print_r(json_encode($data));

                    }

                } else {

                    $data['message'] = "Issue type already added";

                    $data['code'] = 0;
                    print_r(json_encode($data));

                }

            } else if ($typeId > 0) {

                $update = "update issuetype set issue_name='$typeName',status='$typeStatus' where issue_id='$typeId' and companyId='$companyId'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $data['message'] = "Issue type updated";

                    $data['code'] = 1;
                    print_r(json_encode($data));

                } else {

                    $data['message'] = "Failed to update Issue type, Error:" . mysqli_error($conn);

                    $data['code'] = 0;
                    print_r(json_encode($data));

                }

            } else {

                $data['message'] = "Unknow action, try again";

                $data['code'] = 0;
                print_r(json_encode($data));

            }

            

        }

        if ($action == 5) {//reason

            $typeName = $_POST['typeName'];

            $typeId = $_POST['typeId'];

            $description = $_POST['typeDescription'];

            if ($typeId == "") {

                $checkName = "select * from call_action_reason where reason_name='$typeName' and (company_id='0' or company_id='$companyId')";

                $checkNameR = mysqli_query($conn, $checkName);

                if ($checkNameR && mysqli_num_rows($checkNameR) == 0) {

                    $insert = mysqli_query($conn, "insert into call_action_reason values(DEFAULT,'$typeName','$description','$companyId')");

                    if (mysqli_insert_id($conn) > 0) {

                        $data['message'] = "Reason added";
                        $data['code'] = 1;
                        print_r(json_encode($data));

                    } else {

                        $data['message'] = "Failed to add Reason, Error:" . mysqli_error($conn);

                        $data['code'] = 0;
                        print_r(json_encode($data));

                    }

                } else {

                    $data['message'] = "Reason already added";

                    $data['code'] = 0;
                    print_r(json_encode($data));

                }

            } else if ($typeId > 0) {

                $update = "update call_action_reason set reason_name='$typeName',reason_description='$description' where id='$typeId' and company_id='$companyId'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $data['message'] = "Reason updated";

                    $data['code'] = 1;
                    print_r(json_encode($data));

                } else {

                    $data['message'] = "Failed to Reason type, Error:" . mysqli_error($conn);

                    $data['code'] = 0;
                    print_r(json_encode($data));

                }

            } else {

                $data['message'] = "Unknow action, try again";
                $data['code'] = 0;
                print_r(json_encode($data));

            }

            

        }

        if ($action == 6) { //systemAlert

            $typeId = $_POST['alertTypeId'];

            $dayNumber = $_POST['dayNumber'];

            if ($typeId > 0) {

                $update = "update system_alert_days set no_of_days='$dayNumber' where alert_id='$typeId'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $data['message'] = "Alert days updated";

                    $data['code'] = 1;
                    print_r(json_encode($data));
                } else {
                    $data['message'] = "Failed to Alert days, Error:" . mysqli_error($conn);
                    $data['code'] = 0;
                    print_r(json_encode($data));
                }
            } else {
                $data['message'] = "Unknow action, try again";
                $data['code'] = 0;
                print_r(json_encode($data));
            }

        }

    }

	function getMaxIdCCService($conn,$companyId){

		$maxId=0;

		$get = "select max(cs_id) as Sid from contract_service where companyId ='$companyId'";

		$getR = mysqli_query($conn,$get);

		if($getR && mysqli_num_rows($getR)>0){

			$row = mysqli_fetch_assoc($getR);

			$maxId = $row['Sid'];

			if($maxId == "" || $maxId==null || $maxId == 0){

				$maxId = 1;

			} else {

				$maxId = $maxId+1;

			

			}

		}

		

		return $maxId;

	

	

	}

    function create_contract_serviceMultiple($conn) {



        $contract_number = $_POST['contract_number'];

        $companyId = $_SESSION['companyId'];

        $dataArray = $_POST['dataArray'];

        $inId = 0;

        if (sizeof($dataArray) > 0) {

            foreach ($dataArray as $item) {

                $serviceType = $item["serviceType"];

                $issueType = $item["issueType"];

                $serviceCallDate = $item["serviceCallDate"];

                $serviceDetailsDesc = $item["serviceDetailsDesc"];

                $service_call_date = preg_split("#-#", $serviceCallDate);

                $service_call_date = $service_call_date[2] . "-" . $service_call_date[1] . "-" . $service_call_date[0];

                $xx = "0000-00-00";

				$sId = $this->getMaxIdCCService($conn,$companyId);

				if($sId>0){

					$insert = "insert into contract_service values(DEFAULT,'$sId','$contract_number','$companyId',

						'$serviceType','$issueType','$service_call_date','$serviceDetailsDesc',DEFAULT,'0','1','1','0','$xx',0)";

                $insertR = mysqli_query($conn, $insert);

                if (mysqli_insert_id($conn) > 0) {

                    $inId = $inId + 1;

                }

				}

                

            }

            if ($inId > 0) {

                $data['code'] = 1;

                $data['message'] = "Service Added";

                $data['dataArray'] = $dataArray;

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['dataArray'] = $dataArray;

                $data['message'] = "Error in add service" . mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 0;

            $data['dataArray'] = $dataArray;

            $data['message'] = "Error in add service" . mysqli_error($conn);

            print_r(json_encode($data));

        }

    }



    function getProductByType($conn) {

        $productTypeId = $_POST['productTypeId'];

        $companyId = $_SESSION['companyId'];

        $data = array();

        $getDetails = "select *, productspare.id as projectId from productspare where productspare.productType='$productTypeId' and productspare.company_id='$companyId'";

        // $data['xxx'] = $getDetails;

        $getDetailsR = mysqli_query($conn, $getDetails);

        while ($row = mysqli_fetch_assoc($getDetailsR)) {

            
            $data[] = $row;

        }

        print_r(json_encode($data));

    }



    function getProductDetailC($conn) {



        $productId = $_POST['productId'];

        $companyId = $_SESSION['companyId'];

        $getDetails = "select * from spare_product,product_type where product_type.id=spare_product.productType and id='$productId' and spare_product.companyId='$companyId' limit 1";

        $getDetailsR = mysqli_query($conn, $getDetails);

        $row = mysqli_fetch_assoc($getDetailsR);

        $data[] = $row;

        print_r(json_encode($data));

    }

    function getProductDetails($conn) {
        $custId = $_POST['custId'];
    
        // Step 1: Fetch the customer name using the provided customer ID
        $getCustomerQuery = "SELECT customer_name FROM company_customer WHERE id = ? AND isDeleted = 0";
        $stmt1 = $conn->prepare($getCustomerQuery);
        $stmt1->bind_param("i", $custId);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
    
        if ($result1->num_rows > 0) {
            $customer = $result1->fetch_assoc();
            $customerName = $customer['customer_name'];
    
            // Step 2: Fetch product details using the retrieved customer name
            $query = "
                SELECT sp.productName, sod.serialNo, sod.warranty_start_date, sod.warranty_end_date
                FROM stockoutward_details sod
                INNER JOIN spare_product sp ON sod.productId = sp.id
                WHERE sod.contact_name = ?
            ";
    
            $stmt2 = $conn->prepare($query);
            $stmt2->bind_param("s", $customerName);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
    
            $productDetails = [];
            while ($row = $result2->fetch_assoc()) {
                $productDetails[] = [
                    'productName' => $row['productName'],
                    'serialNo' => $row['serialNo'],
                    'warranty_start_date' => $row['warranty_start_date'],
                    'warranty_end_date' => $row['warranty_end_date']
                ];
            }
    
            echo json_encode($productDetails);
    
            $stmt2->close();
        } else {
            // If no customer is found with the given ID
            echo json_encode(['error' => 'Customer not found']);
        }
    
        $stmt1->close();
        $conn->close();
    }
    

    function allContractStatus($conn) {



        $companyId = $_SESSION['companyId'];



        $getStatus = "select * from contract_status where company_id='$companyId' or company_id=0";

        $getStatusR = mysqli_query($conn, $getStatus);

        $data = array();

        while ($row = mysqli_fetch_assoc($getStatusR)) {

            $statusId = $row['status_id'];

            $getBCQuery = "select count(*) as count from service_contract where status='$statusId' and companyId='$companyId'";

            $getBCQueryR = mysqli_query($conn, $getBCQuery);

            $cRow = mysqli_fetch_array($getBCQueryR);

            $d['label'] = $row['c_status_name'];

            $d['y'] = $cRow['count'];

            $d['legendText'] = $row['c_status_name'];



            array_push($data, $d);

        }

        print_r(json_encode($data));

    }



    function addServiceCallSpare($conn) {



        $call_add_product = $_POST['call_add_product'];

        $pQty = $_POST['pQty'];

        $callId = $_POST['callId'];

        $spareNote = $_POST['spareNote'];

        $companyId = $_SESSION['companyId'];

        $userId = $_SESSION['userId'];

        $insert = "insert into service_call_spare values(DEFAULT,'$companyId','$callId','$call_add_product','$pQty','$spareNote','$userId',DEFAULT)";

        $insertR = mysqli_query($conn, $insert);

        if ($insertR) {

            $insertId = mysqli_insert_id($conn);

            if ($insertId > 0) {



                $cCount = $this->getProductCount($conn, $companyId, $call_add_product);

                $newCount = $cCount - $pQty;

                $updateProductQty = "update productspare set productQty='$newCount' where company_id='$companyId' and id='$call_add_product'";

                $updateProductQtyR = mysqli_query($conn, $updateProductQty);

                if ($updateProductQtyR) {

                    $data['code'] = 1;

                    $data['message'] = "Spare added, Do you want add more?";

                    print_r(json_encode($data));

                } else {

                    $data['code'] = 0;

                    $data['message'] = "Unable to update product quntity." . mysqli_query($conn);

                    print_r(json_encode($data));

                }

            } else {

                $data['code'] = 0;

                $data['message'] = "Error in query:" . mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 0;

            $data['message'] = "Error in query:" . mysqli_error($conn);

            print_r(json_encode($data));

        }

    }



    function getProductDetailsById($conn) {



        $productId = $_POST['productId'];

        $companyId = $_SESSION['companyId'];

        $data = array();

        $select = "select * from productspare where id='$productId' and company_id='$companyId' limit 1";

        $selectR = mysqli_query($conn, $select);

        if ($selectR) {

            $row = mysqli_fetch_array($selectR);

            $data[] = $row;

        }

        print_r(json_encode($data));

    }



    function updateOutward($conn) {

        $reference_bill = $_POST["callRfNo"];

        $inward_date = $_POST["outward_date"];

        $outType = $_POST['outType'];

        $product_supplier_id = $_POST["product_supplier_id"];

        $tableData = stripcslashes($_POST['tableData']);

        $tableData = json_decode($tableData, TRUE);

        $status = 0;

        $companyId = $_SESSION['companyId'];

        $userId = $_SESSION['userId'];

        $check = "select * from outward where callRef ='$reference_bill' and company_id ='$companyId'";

        $checkR = mysqli_query($conn, $check);

        if (mysqli_num_rows($checkR) > 0) {

            $this->insertOutwardItem($conn, $tableData, $product_supplier_id, $inward_date, $companyId);

        } else {

            $insert = "insert into outward values(DEFAULT,'$reference_bill','$companyId','$inward_date','$userId','$product_supplier_id','$outType')";

            $insertR = mysqli_query($conn, $insert);

            if (mysqli_insert_id($conn) > 0) {

                $this->insertOutwardItem($conn, $tableData, $product_supplier_id, $inward_date, $companyId);

            } else {

                $data['code'] = 0;

                $data['message'] = "Unable to create new outward" . mysqli_error($conn);

                print_r(json_encode($data));

            }

        }

    }



    function insertOutwardItem($conn, $tableData, $product_supplier_id, $inward_date, $companyId) {



        $companyId = $_SESSION['companyId'];

        $userId = $_SESSION['userId'];

        $status = 0;

        if (sizeof($tableData) > 0 && $companyId != 0) {

            for ($i = 0; $i < sizeof($tableData); $i++) {

                $bill_reference = $tableData[$i]['callRef'];

                $qty = $tableData[$i]['qty'];

                $rate = $tableData[$i]['rate'];

                $produt_id = $tableData[$i]['product_Id'];

                $total_amount = $tableData[$i]['total_amount'];

                $insert = "insert into productoutward values(DEFAULT,'$companyId','$bill_reference','$product_supplier_id','$produt_id','$qty',

				'$rate','$total_amount','$inward_date','$userId',NOW())";

                mysqli_query($conn, $insert);

                if (mysqli_insert_id($conn)) {

                    $oldPCount = $this->getProductCount($conn, $companyId, $produt_id);

                    $newCount = $oldPCount - $qty;

                    $updateProductQty = "update productspare set productQty='$newCount' where company_id='$companyId' and id='$produt_id'";

                    $updateProductQtyR = mysqli_query($conn, $updateProductQty);

                    if ($updateProductQtyR) {

                        $status = 1;

                    } else {

                        $status = 0;

                    }

                } else {

                    $status = 0;

                }

            }

            if ($status == 1) {

                $data['code'] = 1;

                $data['message'] = "outWard updated sucessfully";

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Inward created, Unable to update Inward items";

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 0;

            $data['message'] = "Unable to get company details";

            print_r(json_encode($data));

        }

    }



    function updateInward($conn) {

        $reference_bill = $_POST["reference_bill"];

        $inward_date = $_POST["inward_date"];

        $product_supplier_id = $_POST["product_supplier_name"];

        $tableData = stripcslashes($_POST['tableData']);

        $tableData = json_decode($tableData, TRUE);

        $status = 0;

        $companyId = $_SESSION['companyId'];

        $userId = $_SESSION['userId'];

        $check = "select * from reference_bill where reference_number ='$reference_bill' and supplier_id ='$product_supplier_id' and company_id ='$companyId'";

        $checkR = mysqli_query($conn, $check);

        if (mysqli_num_rows($checkR) > 0) {

            $this->insertInwardItem($conn, $tableData, $product_supplier_id);

        } else {

            $insert = "insert into reference_bill values(DEFAULT,'$inward_date','$reference_bill','$product_supplier_id','$userId','$companyId',NOW())";

            $insertR = mysqli_query($conn, $insert);

            if (mysqli_insert_id($conn) > 0) {

                $this->insertInwardItem($conn, $tableData, $product_supplier_id);

            } else {

                $data['code'] = 0;

                $data['message'] = "Unable to create new bill" . mysqli_error($conn);

                print_r(json_encode($data));

            }

        }

    }



    function insertInwardItem($conn, $tableData, $product_supplier_id) {



        $companyId = $_SESSION['companyId'];

        $userId = $_SESSION['userId'];

        $status = 0;

        if (sizeof($tableData) > 0 && $companyId != 0) {

            for ($i = 0; $i < sizeof($tableData); $i++) {

                $bill_reference = $tableData[$i]['bill_reference'];

                $billDate = $tableData[$i]['bill_date'];

                $paymentDate = preg_split("#-#", $billDate);

                $billDate = $paymentDate[2] . "-" . $paymentDate[1] . "-" . $paymentDate[0];

                $qty = $tableData[$i]['qty'];

                $rate = $tableData[$i]['rate'];

                $produt_id = $tableData[$i]['product_Id'];

                $total_amount = $tableData[$i]['total_amount'];

                $df = "0000-00-00";

                $insert = "insert into productinward values(DEFAULT,'$companyId','$bill_reference','$product_supplier_id','$produt_id','$qty',

				'$rate','$total_amount','$billDate','$df','$userId',NOW())";

                mysqli_query($conn, $insert);

                if (mysqli_insert_id($conn) > 0) {

                    $oldPCount = $this->getProductCount($conn, $companyId, $produt_id);

                    $newCount = $oldPCount + $qty;

                    $updateProductQty = "update productspare set productQty='$newCount' where company_id='$companyId' and id='$produt_id'";

                    $updateProductQtyR = mysqli_query($conn, $updateProductQty);

                    if ($updateProductQtyR) {

                        $status = 1;

                    } else {

                        $status = 0;

                    }

                } else {

                    $status = 0;

                }

            }

            if ($status == 1) {

                $data['code'] = 1;

                $data['message'] = "Inward updated sucessfully";

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Inward created, Unable to update Inward items" . mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 0;

            $data['message'] = "Unable to get company details";

            print_r(json_encode($data));

        }

    }



    function getProductCount($conn, $companyId, $produt_id) {

        $pQty = 0;

        $getCount = "select * from productspare where company_id='$companyId'and id='$produt_id'";

        $getCountR = mysqli_query($conn, $getCount);

        $row = mysqli_fetch_assoc($getCountR);

        $pQty = $row['productQty'];

        return $pQty;

    }



    function getServiceDetailsById($conn) {

        $serviceId = $_POST['serviceId'];

        $contractId = $_POST['contractId'];

        $companyId = $_SESSION['companyId'];

        $data = array();

        $getDetails = "select *,DATE_FORMAT(contract_service.serviceDate,'%d-%m-%Y') as sDate from contract_service where contactId='$contractId' and id='$serviceId' and companyId='$companyId' limit 1";

        $getDetailsR = mysqli_query($conn, $getDetails);

        if ($getDetailsR) {

            while ($row = mysqli_fetch_assoc($getDetailsR)) {

                $data[] = $row;

            }

        }

        print_r(json_encode($data));

    }



    function getInstallmentDetails($conn) {



        $inst_id = $_POST['inst_id'];

        $contractId = $_POST['contractId'];

        $companyId = $_SESSION['companyId'];

        $data = array();

        $getData = "select *,date_format(payment_date,'%d-%m-%Y') as payment_date from contract_payment_schedule where contract_id='$contractId' and id='$inst_id'  and company_id='$companyId' limit 1";

        $getDataR = mysqli_query($conn, $getData);

        while ($row = mysqli_fetch_assoc($getDataR)) {

            $data[] = $row;

        }

        print_r(json_encode($data));

    }



    function DeletePaymentDetails($conn) {



        $contractId = $_POST['contractNo'];

        $companyId = $_SESSION['companyId'];

        $deleteQ = "delete from contract_payment_schedule where contract_id='$contractId'  and company_id='$companyId'";

        $deleteQR = mysqli_query($conn, $deleteQ);

        if ($deleteQR) {
            $totalCharges = $this->getTotalCharges($conn, $contractId);
            $update = "update service_contract set balanceAmount='$totalCharges',totalAmount=0 where id='$contractId' and companyId='$companyId'";
            $updateR = mysqli_query($conn, $update);
            $data['code'] = 1;
            $data['message'] = "Details deleted successfully";
            print_r(json_encode($data));

        } else {

            $data['code'] = 0;
            $data['message'] = "Unable to delete Details, Error:" . mysqli_error($conn);
            print_r(json_encode($data));

        }

    }



    function updatePaymentDetails($conn) {



        $installment_id = $_POST['installment_id'];

        $installment_c_id = $_POST['installment_c_id'];

        $installment_date = $_POST['installment_date'];

        $installment_status = $_POST['installment_status'];

        $installment_description = $_POST['installment_description'];

        $installment_amount = $_POST['installment_amount'];

        $installment_date = preg_split("#-#", $installment_date);

        $companyId = $_SESSION['companyId'];



        $installment_date = $installment_date[2] . "-" . $installment_date[1] . "-" . $installment_date[0];

        $currentBalance = $this->getCurrentBalanceTotal($conn, $installment_c_id);

        $update = "update contract_payment_schedule set payment_note='$installment_description',payment_date='$installment_date',payment_status='$installment_status' where

							id='$installment_id' and contract_id='$installment_c_id' and company_id='$companyId'";

        $up = mysqli_query($conn, $update);

        if ($up) {

            if ($installment_status == 2) {

                
                $currentBalance = $currentBalance - $installment_amount;

                $update = "update service_contract set balanceAmount='$currentBalance' where id='$installment_c_id' and companyId='$companyId'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $data['code'] = 1;

                    $data['dlt'] = 0;

                    $data['message'] = "Payment details saved and updated in contract ";

                    print_r(json_encode($data));

                } else {

                    $data['code'] = 1;

                    $data['dlt'] = 0;

                    $data['message'] = "Payment details saved and unable to updated in contract";

                    print_r(json_encode($data));

                }

            } else {

                $data['code'] = 1;

                $data['message'] = "Details update";

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 0;

            $data['message'] = "unable update details " . mysqli_error($conn);

            print_r(json_encode($data));

        }

    }

	function getProductSpareLastId($conn,$companyId){

		$maxId=0;

		$get = "select max(sp_id) as Sid from productspare where company_id ='$companyId'";

		$getR = mysqli_query($conn,$get);

		if($getR && mysqli_num_rows($getR)>0){

			$row = mysqli_fetch_assoc($getR);

			$maxId = $row['Sid'];

			if($maxId == "" || $maxId==null || $maxId == 0){

				$maxId = 1;

			} else {

				$maxId = $maxId+1;

			

			}

		}

		

		return $maxId;

	

	}

    function addNewSpareProduct($conn) {



        $productType = $_POST['productType'];

        $productCode = $_POST['productCode'];

        $productName = $_POST['productName'];

        $productBrand = $_POST['productBrand'];

        $productModelNo = $_POST['productModelNo'];

        $productQty = $_POST['productQty'];

        $productMRP = $_POST['productMRP'];

        $productTax = $_POST['productTax'];

        $productDescription = $_POST['productDescription'];

        $isUpdate = $_POST['isUpdate'];

        $companyId = $_SESSION['companyId'];

        $product_id = $_POST['product_id'];

        if ($isUpdate == 0) {



            $check = "select * from productspare where  productName='$productName' and company_id='$companyId'  and isDeleted=0";

            $checkR = mysqli_query($conn, $check);

            if ($checkR) {

                if (mysqli_num_rows($checkR) > 0) {

                    $data['code'] = 0;

                    $data['message'] = "Dublicate product name.";

                    print_r(json_encode($data));

                } else {

					$mId = $this->getProductSpareLastId($conn,$companyId);

					if($mId>0){

						

                    $insertQuery = "insert into productspare values(DEFAULT,'$mId','$companyId','$productCode','$productType','$productBrand','$productName',"

                        . "'$productModelNo','$productMRP','$productQty','$productTax','$productDescription',NOW(),0,0)";

                    $insertQueryR = mysqli_query($conn, $insertQuery);

                    if ($insertQueryR) {

                        if (mysqli_insert_id($conn) > 0) {///insert new product log

                            $data['code'] = 1;

                            $data['message'] = "Product added successfully";

                            print_r(json_encode($data));

                        } else {

                            $data['code'] = 0;

                            $data['message'] = "Error in query: " . mysqli_error($conn);

                            print_r(json_encode($data));

                        }

					} else {

						$data['code'] = 0;

                        $data['message'] = "Failed to add Product. " . mysqli_error($conn);

                        print_r(json_encode($data));

					}

                    } else {

                        $data['code'] = 0;

                        $data['message'] = "Error in query: " . mysqli_error($conn);

                        print_r(json_encode($data));

                    }

                }

            } else {

                $data['code'] = 0;

                $data['message'] = "Error in query: " . mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else if ($isUpdate == 1) {



            $checkU = "select * from productspare where id='$product_id' and company_id='$companyId'";

            $checkR = mysqli_query($conn, $checkU);

            if (mysqli_num_rows($checkR) > 0) {

                $update = "update productspare set productType='$productType',productName='$productName',

						productModelNo='$productModelNo',productMRP='$productMRP',productQty='$productQty',

						taxId='$productTax',productDescription='$productDescription' where id='$product_id' and company_id='$companyId'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {



                    $data['code'] = 1;

                    $data['message'] = "Product updated successfully";

                    print_r(json_encode($data));

                } else {

                    $data['code'] = 0;

                    $data['message'] = "Error in query: " . mysqli_error($conn);

                    print_r(json_encode($data));

                }

            } else {

                $data['code'] = 0;

                $data['message'] = "Product not found. 3" . $checkU;

                print_r(json_encode($data));

            }

        } else {



            $data['code'] = 0;

            $data['message'] = "Product not found. 2" . $isUpdate;

            print_r(json_encode($data));

        }

    }

	function getEmployeeDetails($conn,$engId,$companyId){

		$data = "";

		$query = "select Name,phone,email from employee_usres where id='$engId' and companyId='$companyId'";

		$queryR = mysqli_query($conn,$query);

		$row = mysqli_fetch_assoc($queryR);

		$name = $row['Name'];

		$phone = $row['phone'];

		$email = $row['email'];

		$data = $name."_".$phone."_".$email;

		return $data;

		

	}

    function updateCallAssignedEngineer($conn) {



        $selected_engg = $_POST['selected_engg'];

        $call_id = $_POST['call_id'];

        $company_id = $_POST['company_id'];

        $userId = $_SESSION['userId'];

        $today = date("Y-m-d H:i:s");

        $userRole = $_SESSION['userRole'];

		$company_email = $_POST['company_email'];

        $z = 0;

		$eng = $this->getEmployeeDetails($conn,$selected_engg,$company_id);

		$eng1 = explode("_",$eng);

		$name = $eng1[0];//$row['Name'];

		$phone =$eng1[1];// $row['phone'];

		$email = $eng1[2];//$row['email'];

        $activeEng = "select * from call_assign_history where status='1' and call_id='$call__id' and companyId='$company_id'";

        $activeEngR = mysqli_query($conn, $activeEng);

        if ($activeEngR && mysqli_num_rows($activeEngR) > 0) {

            while ($row = mysqli_fetch_assoc($activeEngR)) {

                $rowId = $row['id'];

                $update = "update call_assign_history set status='1' where id='$rowId' and companyId='$company_id'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $z = 1;

                }

            }

        }

        $updateENU = "update contract_service_call set isRead=1,modify_date='$today',call_assigned_to='$selected_engg',call_status='3',modify_id='$userId',modify_date='$today',isNotified='1' where id='$call_id' and companyId='$company_id'";

        $updateENUR = mysqli_query($conn, $updateENU);

        if ($updateENUR) {

            $insertNAE = "insert into call_assign_history values(DEFAULT,'$call_id','$selected_engg',1,'$company_id')";

            $insertNAER = mysqli_query($conn, $insertNAE);

            if ($insertNAER && mysqli_insert_id($conn) > 0) {

                $reasonCode = 1;

            $subject = "Service Forwared to Engineer.";

            $body = "Dear ".$company_email.",<br/><br/> Your call has been forwarded. Below is the details,<br/>

					Engineer Name:&nbsp;".$name."<br/>Contact No.:&nbsp;".$phone."<br/><br/>Email.:&nbsp;".$email."<br/><br/> If you have any query please contact your service provider.";

            $mail = $this->sendMail($conn,$body,$company_email,$subject,$company_id);

            $data['mail'] =$mail;

            $data['code'] = 1;

            $_SESSION['tempPass'] = 0;

            

            $actionNote = "Service Assigned to user";

            $this->updateLog($conn, $company_id, $userId, $actionNote, $userId);

	

                $note = "Service Assigned to user";

                $insertCAH = "insert into service_call_action_history values(DEFAULT,'$company_id','$call_id',3,'1',

				'$note','$userId','$today',1,'$userRole')";

                $hi = mysqli_query($conn, $insertCAH);

                if ($hi && mysqli_insert_id($conn) > 0) {

                    $data['code'] = 1;

                    $data['message'] = 'Details updated';

					$actionNote = "Engineer assigned, Saved History";

					$this->updateLog($conn, $company_id, $userId, $actionNote, $userId);

                    print_r(json_encode($data));

                } else {

                    $data['code'] = 1;

                    $data['message'] = 'Engineer assigned, unable to save history'.mysqli_error($conn);

					$actionNote = "Engineer assigned, unable to save history";

					$this->updateLog($conn, $company_id, $userId, $actionNote, $userId);

                    print_r(json_encode($data));

                }

            }

        }

    }



    function getCurrentBalanceTotal($conn, $contract_number) {

        $c = 0;

        $companyId = $_SESSION['companyId'];

        $query = "select balanceAmount from service_contract where service_contract.id='$contract_number' and service_contract.companyId='$companyId'";

        $queryR = mysqli_query($conn, $query);

        if ($queryR) {

            $row = mysqli_fetch_assoc($queryR);

            $c = $row['balanceAmount'];

        }

        return $c;

    }



    function getTotalCharges($conn, $contract_number) {

        $c = 0;

        $companyId = $_SESSION['companyId'];

        $query = "select contractCharges from service_contract where service_contract.id='$contract_number' and service_contract.companyId='$companyId'";

        $queryR = mysqli_query($conn, $query);

        if ($queryR) {

            $row = mysqli_fetch_assoc($queryR);

            $c = $row['contractCharges'];

        }

        return $c;

    }

    function getPaidAmount($DB,$companyId,$contractId){
        
        $paidAmount =0;
        
        $sql = "SELECT sum(contract_payment_schedule.installment_amount) as totalAmount FROM contract_payment_schedule WHERE company_id='$companyId' and contract_payment_schedule.contract_id='$contractId' and payment_status=2";
       // echo $sql;
        try {
            $stmt = mysqli_query($DB,$sql);
            $row = mysqli_fetch_assoc($stmt);
        } catch (Exception $ex) {
            //echo($ex->getMessage());
        }
        
        $paidAmount = $row['totalAmount'];
        
        return $paidAmount;
        
    }

    function updatePaymentManual($conn) {

        $amt_tax = $_POST["amt_tax"];

        $tax_amt = $_POST["tax_amt"];

        $total_amt = $_POST["total_amt"];

        $contract_number = $_POST["contract_number"];

        $installment_statusM = $_POST['installment_statusM'];

        $status = 0;

        $dlt = 0;

        //$companyId = $this->getCompanyId($conn, $contract_number);

        $companyId = $_SESSION['companyId'];

        $currentBalance = $this->getCurrentBalanceTotal($conn, $contract_number);

        $totalCharges = $this->getTotalCharges($conn, $contract_number);

        if ($companyId != 0) {

            $paymentDate = $_POST['inst_date'];

            $paymentDate = preg_split("#-#", $paymentDate);

            $paymentDate = $paymentDate[2] . "-" . $paymentDate[1] . "-" . $paymentDate[0];

            $inst_amt = $_POST['inst_amt'];

            $description = $_POST['description'];

            $insert = "insert into contract_payment_schedule values(DEFAULT,'$companyId','$contract_number','$paymentDate','$inst_amt','$description','$installment_statusM',DEFAULT,'0',0)";

            mysqli_query($conn, $insert);

            if (mysqli_insert_id($conn)) {

                $status = 1;

            }
            if ($status == 1) {
                
                if ($installment_statusM == 2) {
                    $paid = $this->getPaidAmount($conn,$companyId,$contract_number);
                    $currentBalance = $totalCharges - $paid;    
                    
                }
                
                $update = "update service_contract set totalAmount='$totalCharges', taxPercent='$amt_tax',balanceAmount='$currentBalance',taxAmount='$tax_amt',installment='0' where id='$contract_number'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $data['code'] = 1;

                    $data['dlt'] = $dlt;

                    $data['message'] = "Payment details saved and updated in contract ";

                    print_r(json_encode($data));

                } else {

                    $data['code'] = 1;

                    $data['dlt'] = $dlt;

                    $data['message'] = "Payment details saved and unable to updated in contract";

                    print_r(json_encode($data));

                }

            } else {

                $data['code'] = 0;

                $data['message'] = "Unable to get payment structure ";

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 0;

            $data['message'] = "Unable to get payment structure  or company id missing";

            print_r(json_encode($data));

        }

    }



    function updatePayment($conn) {



        $amt_tax = $_POST["amt_tax"];

        $tax_amt = $_POST["tax_amt"];

        $total_amt = $_POST["total_amt"];

        $contract_number = $_POST["contract_number"];

        $tableData = stripcslashes($_POST['tableData']);

        $tableData = json_decode($tableData, TRUE);

        $status = 0;

        $dlt = 0;

        $companyId = $this->getCompanyId($conn, $contract_number);

        if (sizeof($tableData) > 0 && $companyId != 0) {

            for ($i = 0; $i < sizeof($tableData); $i++) {

                $paymentDate = $tableData[$i]['inst_date'];

                $paymentDate = preg_split("#-#", $paymentDate);

                $paymentDate = $paymentDate[2] . "-" . $paymentDate[1] . "-" . $paymentDate[0];

                $inst_amt = $tableData[$i]['inst_amt'];

                $description = $tableData[$i]['description'];

                $inst_no = $i + 1;

                $insert = "insert into contract_payment_schedule values(DEFAULT,'$companyId','$contract_number','$paymentDate','$inst_amt','$description',1,DEFAULT,'$inst_no')";

                mysqli_query($conn, $insert);

                if (mysqli_insert_id($conn)) {

                    $status = 1;

                }

            }

            if ($status) {

                $ti = sizeof($tableData);

                $update = "update service_contract set taxPercent='$amt_tax',taxAmount='$tax_amt',installment='$ti',totalAmount='$total_amt' where id ='$contract_number'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $data['code'] = 1;

                    $data['dlt'] = $dlt;

                    $data['message'] = "Payment details saved and updated in contract ";

                    print_r(json_encode($data));

                } else {

                    $data['code'] = 1;

                    $data['dlt'] = $dlt;

                    $data['message'] = "Payment details saved and unable to updated in contract";

                    print_r(json_encode($data));

                }

            } else {

                $data['code'] = 0;

                $data['message'] = "Unable to get payment structure ";

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 0;

            $data['message'] = "Unable to get payment structure  or company id missing";

            print_r(json_encode($data));

        }

    }



    function getCompanyId($conn, $contractId) {

        $compId = 0;

        $queryR = mysqli_query($conn, "select * from service_contract where service_contract.id='$contractId' limit 1");

        if ($queryR) {

            $row = mysqli_fetch_assoc($queryR);

            $compId = $row['companyId'];

        }

        return $compId;

    }



    function getContractProduct($conn) {



        $contrcatId = $_POST['contractId'];

        $companyId = $_SESSION['companyId'];

        $data = array();

        $query = "select * from contract_product,product_type where contract_id='$contrcatId' and product_type.id= contract_product.product_type_id and contract_product.companyId='$companyId'";

        $queryResult = mysqli_query($conn, $query);

        if (mysqli_num_rows($queryResult) > 0) {

            while ($row = mysqli_fetch_assoc($queryResult)) {

                $row['code'] = 1;

                $data[] = $row;

            }

        } else {

            $data['code'] = 0;

            $data['query'] = $query;

            $data['error'] = "No contract";

        }

        print_r(json_encode($data));

    }


    
    function addServiceCall($conn) {

        $callId = $_POST['callId'];
        $UserId = $_SESSION['userId'];
        $companyId = $_SESSION['companyId'];
        $serviceId = $_POST['serviceId'];
        $call_id = $_POST['call_id'];
        $isSchedule = $_POST['isSchedule'];
        $call_date = $_POST['call_date'];
        $sc_contract_product = $_POST['sc_contract_product'];
        $cust_id = $_POST['cust_id'];
        $email_id = $_POST['email_id'];
        $alt_contact_no = $_POST['alt_contact_no'];
        $contact_no = $_POST['contact_no'];
        $contact_person = $_POST['contact_person'];
        $customer_contract_id = $_POST['customer_contract_id'];
        $contract_no = $_POST['contract_no'];
        $contractId = $_POST['contractId'];
        $contract_type = $_POST['contract_type'];
        $contract_status = $_POST['contract_status'];
        $sc_description = $_POST['sc_description'];
        $service_type = $_POST['service_type'];
		$service_typeTxt = $_POST['service_typeTxt'];
        $service_issue_type = $_POST['service_issue_type'];
		$service_issue_typeTxt = $_POST['service_issue_typeTxt'];
        $service_priority = $_POST['service_priority'];
        $call_status = $_POST['call_status'];
        $call_product_type = $_POST['call_product_type'];
        $call_product_no = $_POST['call_product_no']; 
        $call_product = $_POST['call_product'];
        $call_product_description = $_POST['call_product_description'];
        $location = $_POST['location'];
        $locationlbl = $_POST['locationlbl'];
        $contract_ex_date = $_POST['contract_ex_date']; 
        if ($call_product_type == "") {
            $call_product_type = 0;
        }
        $data = array();
        $isUpdate = $_POST['isUpdate'];
        $checkCall = "select * from contract_service_call where call_id='$callId' and contract_service_call.companyId='$companyId'";
        $checkCallR = mysqli_query($conn, $checkCall);
        $today = date("Y-m-d H:i:s");
        $isSCS = 0;
        $xx = "0000-00-00";
        if ($contract_ex_date != "") {
            $ced = preg_split("#-#", $contract_ex_date);
            $nced = $ced[2] . "-" . $ced[1] . "-" . $ced[0];
        } else {
            $nced = $xx;
        }
        if ($call_date != "") {
            $cd = preg_split("#-#", $call_date);
            $ncd = $cd[2] . "-" . $cd[1] . "-" . $cd[0];
        } else {
            $ncd = $xx;
        }
        if (mysqli_num_rows($checkCallR) == 0 && $isUpdate ==0) {
            if($customer_contract_id == "" || $customer_contract_id == NULL){
                $customer_contract_id = 0;
                $contract_no = 0;
                $contract_type = 0;
                $contract_status =0;
            }
            $query = "insert into contract_service_call values(DEFAULT,'$call_id','$companyId','$ncd','$cust_id','$customer_contract_id','$contract_type','$contract_no',"
                . "'$contract_status','$call_status','$nced','$contact_person','$contact_no','$email_id','$service_issue_type','$service_priority','$service_type','$sc_description',"
                . "'$UserId','$today','0','$sc_contract_product','$alt_contact_no','$today',0,'$serviceId','$call_product_type','$call_product_no','$call_product','$call_product_description','0','','0','',0,'$xx','$xx','$location','','0',0,'0000-00-00 00:00:00','$locationlbl',0)";
            mysqli_query($conn, $query);
            if (mysqli_insert_id($conn) > 0) {
                $inId = mysqli_insert_id($conn);
                if ($isSchedule == 1) {
                    $updateContractService = "update contract_service set service_call_ref_id='$inId',serviceStatus=4,call_lock_date='$today' where contract_service.id='$serviceId' "
                        . "  and contract_service.contactId='$contractId' and contract_service.companyId='$companyId'";
                    $updateContractServiceR = mysqli_query($conn, $updateContractService);
                    if ($updateContractServiceR) {
                        ///some stuff here
                        $actionNote = 'New Service created successfully';
                        $subject = "New Service created successfully";
                        $body = "Dear ".$contact_person.",<br/> Your service has been created for below details.<br/><br/>
						Call Date: ".$call_date."<br/>Contact No.:".$contact_no."<br/> Issue Type: ".$service_issue_typeTxt."<br/>Service Type: ".$service_typeTxt."
						<br/>**Call Description**<br/>".$sc_description."<br/><br/>If any query contact your service provider.";
						try{
						    $mail = $this->sendMail($conn,$body,$email_id,$subject,$companyId);    
						} catch(Exception $e){
						    $data['email_error'] = "mail sending error";
						}
						
						
                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);
                        $this->add_service_call_action($conn, $companyId, $inId, $call_status, 1, 'New Service created successfully', $UserId);
                    } else {
                        $data['code'] = 0;
                        $data['query'] = $query;
                        $data['perschedule'] = $isSCS;
                        $data['message'] = 'Unable to lock call, Try again';
                        $data['mysql_error'] = mysqli_error($conn);
                        $actionNote = 'Unable to lock call, Try again'.mysqli_error($conn);
                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);
                        print_r(json_encode($data));
                    }
                } else {
			$actionNote = 'New Service created successfully';
                        $subject = "New Service created successfully";
                        $body = "Dear ".$contact_person.",<br/> Your service has been created for below details.<br/><br/>
			Call Date: ".$call_date."<br/>Contact No.:".$contact_no."<br/> Issue Type: ".$service_issue_typeTxt."<br/>Service Type: ".$service_typeTxt."
			<br/>**Call Description**<br/>".$sc_description."<br/><br/>If any query contact your service provider.";
			try{
                 $mail = $this->sendMail($conn,$body,$email_id,$subject,$companyId);    
			}catch(Exception $e){
			    $data['mail_error'] = "mail sending error.";
			}
			
                        $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);
                        $this->add_service_call_action($conn, $companyId, $inId, $call_status, 1, 'New Service created successfully', $UserId);
                }
            } else {
                $data['code'] = 0;
                $data['perschedule'] = $isSCS;
                $data['query'] = $query;
                $data['message'] = 'Unable to lock call, Try again';
                $actionNote = 'Unable to lock call, Try again'.mysqli_error($conn);
                $this->updateLog($conn, $companyId, $UserId, $actionNote, $UserId);
                $data['mysql_error'] = mysqli_error($conn);
                print_r(json_encode($data));
            }
        } else {
            if ($isUpdate == 1) {
                $update = "update contract_service_call set closeLocation='$location',service_area_location='$locationlbl',isRead=1,contact_person='$contact_person',contact_no='$contact_no',email_id='$email_id',issue_type='$service_issue_type',"
                    . "call_priority='$service_priority',service_type='$service_type',description='$sc_description',productId='0',productType='$call_product_type',"
                    . "productNo='$call_product_no',productName='$call_product',productDesc='$call_product_description', alt_contact_no='$alt_contact_no',modify_date='$today' where id='$callId' "
                    . " and contract_service_call.companyId='$companyId'";
                $updateR = mysqli_query($conn, $update);
                if ($updateR) {
                    $this->add_service_call_action($conn, $companyId, $callId, $call_status, 1, 'Service details updated', $UserId);
                } else {
                    $data['code'] = 0;
                    $data['message'] = 'Unable to update details.';
                    $data['mysql_error'] = mysqli_error($conn);
                    print_r(json_encode($data));
                }
            } else {
                $data['code'] = 0;
                $data['message'] = 'Dublicate call number';
                $data['mysql_error'] = mysqli_error($conn);

                print_r(json_encode($data));
            }

        }
        mysqli_close($conn);    
    }


    function add_service_call_action($conn, $companyId, $callId, $action, $actionReason, $action_note, $UserId) {

        $data = array();

        $userRole = $_SESSION['userRole'];
        $today = date("Y-m-d H:i:s");

        $insert = "insert into service_call_action_history values(DEFAULT,'$companyId','$callId','$action','$actionReason',

		'$action_note','$UserId','$today',1,'$userRole')";

        $insertR = mysqli_query($conn, $insert);

        $today = date("Y-m-d H:i:s");

        if ($insertR && mysqli_insert_id($conn) > 0) {

            $inserId = mysqli_insert_id($conn);

            $update = "update contract_service_call set isRead=1,modify_date='$today',modify_id='$inserId' where id='$callId' and companyId='$companyId'";

            $updateR = mysqli_query($conn, $update);

            if ($updateR) {

                $data['code'] = 1;

                $data['message'] = $action_note;

             //   $data['update'] = $update1;

                print_r(json_encode($data));

            } else {

                $data['code'] = 1;

                $data['message'] = $action_note . ' Unable to update log' . mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 1;

            $data['message'] = $action_note . ' Unable to update log ' . mysqli_error($conn);

            print_r(json_encode($data));

        }

    }



    function getContractDetailsById($conn) {

        $contract_Id = $_POST['contract_Id'];

        $company_id = $_SESSION['companyId'];

        $data = array();

        $query = "SELECT *,service_contract.id as contract_id, date_format(endDate,'%d-%m-%Y') as EndDate FROM service_contract,"

            . "company_customer,contract_type,contract_status WHERE contract_status.status_id = service_contract.status and "

            . " company_customer.company_id = service_contract.companyId and service_contract.customerId= company_customer.id and "

            . "contract_type.id = service_contract.contractType and service_contract.id='$contract_Id' and service_contract.companyId='$company_id' and service_contract.isDeleted=0 limit 1";

        $queryResult = mysqli_query($conn, $query);

        if (mysqli_num_rows($queryResult) > 0) {

            while ($row = mysqli_fetch_assoc($queryResult)) {

                $row['query'] = $queryResult;

                $row['code'] = 1;

                $data[] = $row;

            }

        } else {

            $data['code'] = 0;

            $data['query'] = $query;

            $data['error'] = "No contract";

        }

        print_r(json_encode($data));

    }



    function getContractDetails($conn) {

        $custId = $_POST['custId'];

        $company_id = $_SESSION['companyId'];

        $data = array();

        $query = "SELECT *,contract_type_name,service_contract.id as contract_id, date_format(endDate,'%d-%b-%Y') as EndDate FROM service_contract,"

            . "company_customer,contract_type,contract_status WHERE contract_status.status_id = service_contract.status and  "

            . "company_customer.company_id = service_contract.companyId and service_contract.customerId= company_customer.id and "

            . "contract_type.id = service_contract.contractType and service_contract.customerId='$custId' and (service_contract.status=2 or service_contract.status=1 ) and service_contract.companyId='$company_id' and service_contract.isDeleted=0";

        $queryResult = mysqli_query($conn, $query);

        if (mysqli_num_rows($queryResult) > 0) {

            while ($row = mysqli_fetch_assoc($queryResult)) {



                $contrcat_id = $row['contractId'];

                $productType = $row['contract_type_name'];

                $siteLocation = $row['siteLocation'];

                $name = $contrcat_id . " / " . $productType . " / " . $siteLocation;

                $row['contractNameN'] = $name;

                $data[] = $row;

            }

        } else {

            $data['code'] = 0;

            $data['error'] = "No contract";

        }

        print_r(json_encode($data));

    }



    function getContractTypeDetails($conn) {

        $data = array();

        $company_id = $_SESSION['companyId'];

        $c_type_name = $_POST['c_type_name'];

        $getId = "select * from contract_type where contract_type_name='$c_type_name' and company_id=0 or company_id='$company_id'";

        $getIdR = mysqli_query($conn, $getId);

        if ($getIdR) {

            $data['code'] = 1;

            $row = mysqli_fetch_assoc($getIdR);

            $data['c_type_id'] = $row['id'];

        } else {

            $data['code'] = 0;

            $data['message'] = "unable to get Id " . mysqli_error($conn);

        }

        print_r(json_encode($data));

    }
    function create_new_contract($conn) {
        $contract_number = $_POST['contract_number'];

        $customer_id = $_POST['customer_id'];
        $contract_id = $_POST['contract_id'];

        $contract_date = $_POST['contract_date'];

        $cDate = preg_split("#-#", $contract_date);

        $c_date = $cDate[2] . "-" . $cDate[1] . "-" . $cDate[0];

        $contract_date = $c_date;

        $contract_service_type = $_POST['contract_service_type'];

        $contcat_c_address = $_POST['contcat_c_address'];

        $contact_person = $_POST['contact_person'];

        $contact_number = $_POST['contact_number'];

        $contract_site_location = $_POST['contract_site_location'];
        $contract_site_locationlatlng = $_POST['site_locationlatlng'];

        $contcat_c_email = $_POST['contcat_c_email'];

        $contract_service_limit = $_POST['contract_service_limit'];

        $contract_start_date = $_POST['contract_start_date'];

        $contract_start_date1 = $_POST['contract_start_date'];

        $startDate = preg_split("#-#", $contract_start_date);

        $contract_start_date = $startDate[2] . "-" . $startDate[1] . "-" . $startDate[0];

        $contract_end_date = $_POST['contract_end_date'];

        $contract_end_date1 = $_POST['contract_end_date'];

        $endDate = preg_split("#-#", $contract_end_date);

        $contract_end_date = $endDate[2] . "-" . $endDate[1] . "-" . $endDate[0];

        $contract_charges = $_POST['contract_charges'];

        $contract_service_information = $_POST['contract_service_information'];

        $contract_service_description = $_POST['contract_service_description'];

        $companyId = $_SESSION['companyId'];

        $userId = $_SESSION['userId'];
        $product_type = $_POST['product_type'];

        $product_name = $_POST['product_name'];

        $product_number = $_POST['product_number'];

        $product_desc = $_POST['product_desc'];

        $isUpdate = $_POST['isUpdate'];

        if ($isUpdate == 1) {

            $checkC = "select * from service_contract where service_contract.id = '$contract_id' and companyId='$companyId' limit 1";

            $checkCR = mysqli_query($conn, $checkC);

            if (mysqli_num_rows($checkCR) > 0) {



                $updateQurey = "update service_contract set Date='$contract_date',contractType='$contract_service_type',contactPerson='$contact_person',contactPhone='$contact_person',"

                    . "contractEmail='$contcat_c_email',contractAddress='$contcat_c_address',siteLocation='$contract_site_location',startDate='$contract_start_date',"

                    . " endDate='$contract_end_date',contractCharges='$contract_charges',serviceCallLimit='$contract_service_limit',updateId='$userId',description='$contract_service_description',siteLocationlatlng='$contract_site_locationlatlng'"

                    . " where service_contract.id='$contract_id' and companyId='$companyId'";

                $updateQureyR = mysqli_query($conn, $updateQurey);

                if ($updateQureyR) {

                    $data['code'] = 1;

                    $data['message'] = 'constract updated successfully';

                    $actionNote = "constract updated successfully, contract_number:".$contract_number;

                    $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

                    print_r(json_encode($data));

                } else {

                    $data['code'] = 0;

                    $data['message'] = 'Unable to update contract, Try Again. Error:' . mysqli_error($conn);

                    $actionNote = 'Unable to update contract, Try Again. contract_number:'.$contract_number."Error:" . mysqli_error($conn);

                    $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

                    print_r(json_encode($data));

                }

            } else {

                $data['code'] = 0;

                $data['message'] = 'constract not found';

                print_r(json_encode($data));

            }

        } else {

            $checkC = "select * from service_contract where service_contract.contractId  = '$contract_number' and companyId='$companyId'";

            $checkCR = mysqli_query($conn, $checkC);

            if (mysqli_num_rows($checkCR) == 0) {

                $createQuery = "insert into service_contract values(DEFAULT,'$contract_number','$companyId','$customer_id','$contract_date','$contract_service_type','$contact_person','$contact_number',"

                    . "'$contcat_c_email','$contcat_c_address','$contract_site_location','$contract_start_date','$contract_end_date','$contract_charges','0','0','0','$contract_charges','$contract_charges','$contract_service_limit',"

                    . "'$contract_service_information','$contract_service_description',NOW(),'$userId',0,'1','1','0',0,0,'$contract_site_locationlatlng')";

                $createQueryR = mysqli_query($conn, $createQuery);

                if (mysqli_insert_id($conn) > 0) {



                    $data['code'] = 1;

                    $data['$c_date'] = $c_date;

                    $data['$contract_start_date'] = $contract_start_date1;

                    $data['$contract_end_date'] = $contract_end_date1;
                    $data['contractId'] = mysqli_insert_id($conn);
                    $data['message'] = 'constract created successfully';

                    $body = "Dear ".$contact_person.", <br/> <br/> Your new  service contract has been created."

                        ." Below is the details.<br/> Start Date:".$contract_start_date."<br/> "

                        ." End Date:".$contract_end_date."<br/> Contract Charges:".$contract_charges."<br/> Service Call Limit:".$contract_service_limit."<br/> For more details contact service provider. <br/></br>Regards,<br/></br> Service CRM.";

                    $subject = "Service Constract Details";

                    //$toMail = "shekhar.khise@gmail.com";

                   $mail = $this->sendMail($conn,$body,$contcat_c_email,$subject,$companyId);

                    $data['mail'] = $mail;



                    $actionNote = 'contract created successfully, contract_number:'.$contract_number." main status:";

                    $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

                    print_r(json_encode($data));

                    /* if ($product_type != "" && $product_name != "" && $product_number != "") {

                         $inquery = "insert into contract_product values(DEFAULT,'$contract_number','$product_type','$product_name','$product_number','$product_desc',DEFAULT)";

                         $inresult = mysqli_query($conn, $inquery);

                         if ($inresult) {

                             if (mysqli_insert_id($conn) > 0) {



                             } else {

                                 $data['code'] = 1;

                                 $data['$c_date'] = $c_date;

                                 $data['$contract_start_date'] = $contract_start_date;

                                 $data['$contract_end_date'] = $contract_end_date;

                                 $data['message'] = 'constract created successfully, Unable to update product details';



                                 $actionNote = 'constract created successfully, Unable to update product details';

                                 $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

                                 print_r(json_encode($data));

                             }

                         } else {

                             $data['code'] = 1;

                             $data['$c_date'] = $c_date;

                             $data['$contract_start_date'] = $contract_start_date;

                             $data['$contract_end_date'] = $contract_end_date;

                             $data['message'] = 'Constract created successfully, Unable to update product details';

                             $actionNote = 'Constract created successfully, Unable to update product details';

                             $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

                             print_r(json_encode($data));

                         }

                     } else {

                         $data['code'] = 1;

                         $data['$c_date'] = $c_date;

                         $data['$contract_start_date'] = $contract_start_date;

                         $data['$contract_end_date'] = $contract_end_date;

                         $data['message'] = 'Constract created successfully, missing product details';

                         $actionNote = 'Constract created successfully, missing product details';

                         $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

                         print_r(json_encode($data));

                     }*/

                } else {

                    $data['code'] = 0;

                    $data['message'] = 'constract created failed' . mysqli_insert_id($conn) . "/" . mysqli_error($conn);

                    $actionNote = 'constract created failed' . mysqli_insert_id($conn) . "/" . mysqli_error($conn);

                    $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

                    print_r(json_encode($data));

                }

            } else {

                $data['code'] = 0;

                $data['message'] = 'constract alreday exits';

                print_r(json_encode($data));

            }

        }
        mysqli_close($conn);
    }



    function get_CustomerDetails($conn) {

        $custName = $_POST['customeName'];

        $companyId = $_SESSION['companyId'];

        $data = array();

        $getCust = "select * from company_customer where company_id = '$companyId' and id='$custName' and isDeleted=0";

        $getCustR = mysqli_query($conn, $getCust);

        if ($getCustR) {

            while ($row = mysqli_fetch_assoc($getCustR)) {

                $data[] = $row;

            }

        }

        print_r(json_encode($data));

    }



    function get_CustomerList($conn) {

        $companyId = $_SESSION['companyId'];

        $get = "select * from company_customer where company_id = '$companyId' and isDeleted=0 order by id DESC";

        $data = array();

        $getR = mysqli_query($conn, $get);

        if ($getR) {

            while ($row = mysqli_fetch_assoc($getR)) {

                $data[] = $row;

            }

        }

        print_r(json_encode($data));

    }



    function get_ServiceType($conn) {

        $companyId = $_SESSION['companyId'];

        $get = "select * from contract_type where (company_id=0 or company_id='$companyId') order by id ASC";

        $data = array();

        $getR = mysqli_query($conn, $get);

        if ($getR) {

            while ($row = mysqli_fetch_assoc($getR)) {

                $data[] = $row;

            }

        }

        print_r(json_encode($data));

    }



    function add_ContractType($conn) {

        $service_name = $_POST['service_name'];

        $companyId = $_SESSION['companyId'];

        $insert = "insert into contract_type values(DEFAULT,'$service_name','$companyId',1)";

        $insertR = mysqli_query($conn, $insert);

        if (mysqli_insert_id($conn)>0) {

            $data['code'] = 1;

            $data['message'] = "Successfully added";

            print_r(json_encode($data));

        } else {

            $data['code'] = 0;

            $data['message'] = "Failed to add" + mysqli_error($conn);

            print_r(json_encode($data));

        }

    }



    function create_contract_service($conn) {

        $contract_service_name = $_POST['contract_service_name'];

        $contract_number = $_POST['contract_number'];

        $companyId = $_SESSION['companyId'];

        $isUpdate = $_POST['isUpdate'];

        $selectedServiceId = $_POST['selectedServiceId'];



        $service_type = $_POST['service_type'];

        $service_call_date = $_POST['service_call_date'];

        $service_call_date = preg_split("#-#", $service_call_date);

        $service_call_date = $service_call_date[2] . "-" . $service_call_date[1] . "-" . $service_call_date[0];

        $service_action_note = $_POST['service_action_note'];



        if ($isUpdate == 1) {

            $update = "update contract_service set serviceName='$contract_service_name',serviceType='$service_type',serviceDate='$service_call_date',description='$service_action_note'"

                . " where id='$selectedServiceId' and contactId='$contract_number'";

            $updateR = mysqli_query($conn, $update);

            if ($updateR) {



                $data['code'] = 1;

                $data['message'] = "Service Updated";

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Error in service update" . mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else {

            $xx = "0000-00-00";

			$sId = $this->getMaxIdCCService($conn,$companyId);

			if($sId>0){

				

            $insert = "insert into contract_service values(DEFAULT,'$sId','$contract_number','$companyId',

		 '$contract_service_name','$service_type','$service_call_date','$service_action_note',DEFAULT,'0','1','1','0','$xx',0)";

            mysqli_query($conn, $insert);

            if (mysqli_insert_id($conn) > 0) {

                $data['code'] = 1;

                $data['message'] = "Service Added";

                print_r(json_encode($data));

            } else {

                $data['code'] = 0;

                $data['message'] = "Error in add service" . mysqli_error($conn);

                print_r(json_encode($data));

            }

			} else {

			

                $data['code'] = 0;

                $data['message'] = "Error in add service" . mysqli_error($conn);

                print_r(json_encode($data));

			}

        }

    }



    function deleteData($conn, $tableName) {

        $insertR = mysqli_query($conn, $tableName);

        if ($insertR) {

            return 1;

        } else {

            return 0;

        }

    }
    function updateLog($conn, $companyId, $updatedBy, $actionNote, $userId) {

        $insert = "insert into updatelog values(DEFAULT,'$companyId','$updatedBy','$actionNote',DEFAULT,'$userId')";

        $insertR = mysqli_query($conn, $insert);

        if ($insertR) {

            $insertId = mysqli_insert_id($conn);

            return $insertId;

        } else {

            return mysqli_error($conn) . " " . $insert;

        }

    }



    function getDashBoard($link) {



        //  $data = array();

        $customers = 0;

        $engineers = 0;

        $contract = 0;

        $serviceCall = 0;

        $totalCompany = 0;
        $contract_product = 0;

        $companyId = $_SESSION['companyId'];

        $getBatteryCount = "SELECT COUNT(*) as company_customer  FROM `company_customer` where company_id='$companyId' and isDeleted=0";

        $getBatteryCountR = mysqli_query($link, $getBatteryCount);

        if ($getBatteryCountR) {

            $row_bat = mysqli_fetch_assoc($getBatteryCountR);

            $customers = $row_bat['company_customer'];

        }

        $getBankCount = "SELECT COUNT(*) as employee_usres FROM `employee_usres` where companyId='$companyId' and isDeleted=0";

        $getBankCountR = mysqli_query($link, $getBankCount);

        if ($getBankCountR) {

            $row_bank = mysqli_fetch_assoc($getBankCountR);

            $engineers = $row_bank['employee_usres'];

        }

        $getCCount = "SELECT COUNT(*) as service_contract FROM `service_contract` where companyId='$companyId' and isDeleted=0";

        $getCCountR = mysqli_query($link, $getCCount);

        if ($getCCountR) {

            $row_C = mysqli_fetch_assoc($getCCountR);

            $contract = $row_C['service_contract'];

        }

        $getCSCount = "SELECT COUNT(*) as contract_service_call FROM `contract_service_call` where companyId='$companyId'";

        $getCSCountR = mysqli_query($link, $getCSCount);

        if ($getCSCountR) {

            $row_CS = mysqli_fetch_assoc($getCSCountR);

            $serviceCall = $row_CS['contract_service_call'];

        }
        $getCPCount = "SELECT COUNT(*) as contract_product FROM `contract_product` where companyId='$companyId'";

        $getCPCountR = mysqli_query($link, $getCPCount);

        if ($getCPCountR) {

            $row_CP = mysqli_fetch_assoc($getCPCountR);

            $contract_product = $row_CP['contract_product'];

        }

		$getCSCount1 = "SELECT count(*) as count FROM company";

        $getCSCountR1 = mysqli_query($link, $getCSCount1);

        if ($getCSCountR1) {

            $row_CS1 = mysqli_fetch_assoc($getCSCountR1);

            $totalCompany = $row_CS1['count'];

        }

        $data['customers'] = $customers;

        $data['engineers'] = $engineers;

        $data['contract'] = $contract;

        $data['totalCompany'] = $totalCompany;

        $data['serviceCall'] = $serviceCall;
        $data['contract_product'] = $contract_product;

        print_r(json_encode($data));

    }



    function getStatusProgress($conn) { /* for both */

        $contractId = $_POST['contractId'];

        $totalDays = 0;

        $totalDaysC = 0;

        $getStartTime = "SELECT *,DATEDIFF(startDate,endDate) as dayDiff,DATEDIFF(startDate,NOW()) as dayDiffC,

		DATE_FORMAT(service_contract.startDate,'%d-%m-%Y') as startDate,DATE_FORMAT(service_contract.endDate,'%d-%m-%Y') as endDate,

		DATE_FORMAT(service_contract.createdAt,'%d-%m-%Y') as createdAt FROM service_contract WHERE service_contract.id='$contractId' ";

        $getStartTimeR = mysqli_query($conn, $getStartTime);

        if ($getStartTimeR) {

            $row = mysqli_fetch_array($getStartTimeR);

            $totalDays = $row['dayDiff'];

            $totalDaysC = $row['dayDiffC'];

        }

        $dayRemained = ($totalDays - $totalDaysC);

        $dayRemained = $dayRemained * -1;

        $persent = (($dayRemained / $totalDays) * 100) * -1;

        $data['persent'] = round($persent);

        if ($dayRemained < 0) {

            $dayRemained = $dayRemained * -1;

            if ($dayRemained == 1) {

                $fmin = "Expired " . $dayRemained . '&nbsp; day';

            } else {

                $fmin = "Expired " . $dayRemained . '&nbsp;days';

            }

            $status = " <span>" . $fmin . "</span>";

            $time = '&nbsp;&nbsp;<small class="label label-danger"><i class="fa fa-clock-o"></i>&nbsp;' . $status . '</small>';

            $data['time'] = $time;

        } else if ($dayRemained > 0) {

            $overFlow = ($totalDays - $totalDaysC) * -1;

            if ($overFlow == 1) {

                $fmin = $overFlow . '&nbsp;day remained';

            } else {

                $fmin = $overFlow . '&nbsp;days remained';

            }

            $status = "<span>" . trim($fmin) . "</span>";

            $time = '&nbsp;&nbsp;<small class="label label-success"><i class="fa fa-clock-o"></i>&nbsp;' . $status . '</small>';

            $data['time'] = $time;

        }

        $data['p_status_id'] = $row['status'];

        print_r(json_encode($data));

    }



    function getStatusHours($conn, $statusId) {

        $getH = "select statusHours from system_status where system_status.statusId='$statusId'";

        $getHR = mysqli_query($conn, $getH);

        $row = mysqli_fetch_assoc($getHR);

        $h = $row['statusHours'];

        return $h;

    }



    function updateStatusTimeLine($conn) {//update the status of the bank and maintain the time line;

        $call_id = $_POST['call_id'];

        $action_call_status = $_POST['action_call_status'];

        $action_call_reason = $_POST['action_call_reason'];

        $call_action_note = $_POST['call_action_note'];

		$company_email = $_POST['company_email'];

        $company_id = $_POST['company_id'];

        $userId = $_SESSION['userId'];
        $call_distance = $_POST['call_distance'];
        $userRole = $_SESSION['userRole'];
$today = date("Y-m-d H:i:s");
        $insert = "insert into service_call_action_history values(DEFAULT,'$company_id','$call_id','$action_call_status','$action_call_reason',

		'$call_action_note','$userId','$today',1,'$userRole')";

        mysqli_query($conn, $insert);

        if (mysqli_insert_id($conn) > 0) {

            $inserId = mysqli_insert_id($conn);

            $today = date("Y-m-d H:i:s");

            $update = "update contract_service_call set isRead=1,call_status='$action_call_status',modify_id='$inserId',modify_date='$today' where id='$call_id' and companyId='$company_id'";

            $updateR = mysqli_query($conn, $update);

            if ($updateR) {

                if ($action_call_status == 6) {

                    $updateRD = "update contract_service_call set isRead=1,modify_date='$today',resolvedDate='$today',call_distance='$call_distance' where id='$call_id' and companyId='$company_id'";

                    $updateRDR = mysqli_query($conn, $updateRD);

                    if ($updateRDR) {

                        $data['rdUpdate'] = 1;

						$subject = "Call has been resolved.";

						$body = "Dear ".$company_email.",<br/><br/> Your call has been resolved. <br/>**Resolve Note**<br/>".$call_action_note."

						<br/><br/>If you have any query please contact your service provider.";

            $mail = $this->sendMail($conn,$body,$company_email,$subject,$company_id);

            $data['mail'] =$mail;

            $data['code'] = 1;

            $_SESSION['tempPass'] = 0;

            

            $actionNote = "Call Assigned to user";

            $this->updateLog($conn, $company_id, $userId, $actionNote, $userId);

	

                    }

                }

                $data['code'] = 1;

                $data['message'] = 'action applied';

                print_r(json_encode($data));

            } else {

                $delete = "delete from service_call_action_history where id='$inserId'";

                $deleteR = mysqli_query($conn, $delete);

                $data['code'] = 0;

                $data['$deleteR'] = $deleteR;

                $data['message'] = 'Unable to apply action, try again. Error:' . mysqli_error($conn);

                print_r(json_encode($data));

            }

        } else {

            $data['code'] = 0;

            $data['message'] = 'Unable to apply action, try again. Error:' . mysqli_error($conn);

            print_r(json_encode($data));

        }

    }

	function checkLoginNameEngineer($conn,$loginEmail){

		$r=0;

		$select ="select * from employee_usres where loginName='$loginEmail' and isDeleted=0";

		$selectR = mysqli_query($conn,$select);

		if($selectR && mysqli_num_rows($selectR) == 0){

			$r=1;

		}

		return $r;

	

	}

	

	function getMaxIdCEmployee($conn,$companyId){

		$maxId=0;

		$get = "select max(c_emp_id	) as Sid from employee_usres where companyId ='$companyId'";

		$getR = mysqli_query($conn,$get);

		if($getR && mysqli_num_rows($getR)>0){

			$row = mysqli_fetch_assoc($getR);

			$maxId = $row['Sid'];

			if($maxId == "" || $maxId==null || $maxId == 0){

				$maxId = 1;

			} else {

				$maxId = $maxId+1;

			

			}

		}

		

		return $maxId;

	

	

	}

	function checkEngineerLimit($conn,$companyId){

	

		$limit = 0;

		$check ="select engineer_limit from company where company_id='$companyId'";

		$checkR = mysqli_query($conn,$check);

		if($checkR){

		$row = mysqli_fetch_assoc($checkR);

		$limit = $row['engineer_limit'];

		}

		return $limit;

	}

	

	function checkContractLimit($conn,$companyId){

	

		$limit = 0;

		$check ="select contract_limit from company where company_id='$companyId'";

		$checkR = mysqli_query($conn,$check);

		if($checkR){

		$row = mysqli_fetch_assoc($checkR);

		$limit = $row['contract_limit'];

		}

		return $limit;

	}

	

	function checkCustomerLimit($conn,$companyId){

	

		$limit = 0;

		$check ="select customer_limit from company where company_id='$companyId'";

		$checkR = mysqli_query($conn,$check);

		if($checkR){

		$row = mysqli_fetch_assoc($checkR);

		$limit = $row['customer_limit'];

		}

		return $limit;

	}

	function getCurrentEngCount($conn,$companyId){

		$count = 0;

		$check ="SELECT count(*) as egCount FROM employee_usres WHERE companyId='$companyId'";

		$checkR = mysqli_query($conn,$check);

		if($checkR){

		$row = mysqli_fetch_assoc($checkR);

		$count = $row['egCount'];

		}

		return $count;

	

	}

    function add_new_Engineer($conn, $p) {

        $isUpdate = $_POST['isUpdate'];
    
        $engi_name = $_POST['engi_name'];
        $engi_phone = $_POST['engi_phone'];
        $engi_email = $_POST['engi_email'];
        $engi_password = $_POST['engi_password'];
        $engineer_status = $_POST['engineer_status'];
        $engi_designation = $_POST['engi_designation'];
        $c_address = $_POST['c_address'];
        $engi_role = $_POST['engi_role'];
        $userId = $_SESSION['userId'];
        $companyId = $_SESSION['companyId'];
        
        $emp_Id = $_POST['empId'];
        $qualification = $_POST['qualification'];
        $engi_phone2 = $_POST['engi_phone2'];
        $other_details = $_POST['other_details'];
        $technical_abilities = $_POST['technical_abilities'];
        $joiningdate = $_POST['joiningdate'];
        $experience = $_POST['experience'];
        $bloodgroup = $_POST['bloodgroup'];
        $licensenum = $_POST['licensenum'];
        $homenum = $_POST['homenum'];
        $cost_per_hour = $_POST['cost_per_hour'];
        $report_to = $_POST['report_to'];
        $assigned_role = $_POST['assigned_role'];
        $toolkit = $_POST['toolkit'];
        $teamleader = $_POST['teamleader'];
        $empcategory = isset($_POST['empcategory']) ? $_POST['empcategory'] : [];  // handle as an array
        $xx = "0000-00-00";
    
        $limit = $this->checkEngineerLimit($conn,$companyId);
        $cCount = $this->getCurrentEngCount($conn,$companyId);
    
        if ($isUpdate == 0) {
    
            if($cCount >= $limit){
                $data['code'] = 0;
                $data['limit'] = $limit;
                $data['cCount'] = $cCount;
                $data['message'] = "Engineer Limit Over, Contact Service Provider.";
                print_r(json_encode($data));
            } else {
    
                $isTaken = $this->checkLoginNameEngineer($conn,$engi_email);
                if($isTaken == 0){
                    $data['code'] = 0;
                    $data['message'] = 'Login email already taken, try different one.';
                    print_r(json_encode($data));
                } else {
    
                    $check_Query = "SELECT * FROM employee_usres WHERE (loginName='$engi_email' OR phone='$engi_phone') AND companyId='$companyId' AND isDeleted=0";
                    if ($engi_password != "") {
                        $engi_password = $p->hash($engi_password);
                    }
    
                    $check_QueryR = mysqli_query($conn, $check_Query);
    
                    if (mysqli_num_rows($check_QueryR) > 0) {
                        $data['code'] = 0;
                        $data['message'] = 'Engineer already registered with this email or phone number.';
                        print_r(json_encode($data));
                    } else {
    
                        $empId = $this->getMaxIdCEmployee($conn,$companyId);
    
                        if($empId > 0){
    
                            $empcategoryString = implode(',', $empcategory);  // Convert array to comma-separated string
                           

                            $query = "INSERT INTO employee_usres VALUES (
                                DEFAULT,
                                '$empId',
                                '$engi_name',
                                '$engi_phone',
                                '$c_address',
                                '$engi_email',
                                '$engi_password',
                                '$engi_email',
                                '$engi_designation',
                                '$engi_role',
                                '$companyId',
                                '$engineer_status',
                                NOW(),
                                '0',
                                '',
                                0,
                                '$xx',
                                '',
                                0,
                                '',
                                0,
                                0,
                                0,
                                '$emp_Id',
                                '$qualification',
                                '$engi_phone2',
                                '$technical_abilities',
                                '$other_details',
                                '$joiningdate',
                                '$experience',
                                '$bloodgroup',
                                '$licensenum',
                                '$homenum',
                                '$cost_per_hour',
                                '$report_to',
                                '$assigned_role',
                                '$toolkit',
                                '$teamleader',
                                '$empcategoryString'
                            )";
                            
                            $queryR = mysqli_query($conn, $query);
    
                            if ($queryR) {
                                if (mysqli_insert_id($conn)) {
                                    $data['code'] = 1;
                                    $data['limit'] = $limit;
                                    $data['cCount'] = $cCount;
                                    $data['message'] = 'Engineer Registered';
                                    print_r(json_encode($data));
                                } else {
                                    $data['code'] = 2;
                                    $data['limit'] = $limit;
                                    $data['cCount'] = $cCount;
                                    $data['message'] = 'Engineer not registered: ' . mysqli_error($conn);
                                    print_r(json_encode($data));
                                }
                            } else {
                                $data['code'] = 2;
                                $data['message'] = 'Engineer not registered: ' . mysqli_error($conn);
                                print_r(json_encode($data));
                            }
    
                        } else {
                            $data['code'] = 2;
                            $data['message'] = 'Unable to get Max Id: ' . mysqli_error($conn);
                            print_r(json_encode($data));
                        }
                    }
                }
            }
        } else if ($isUpdate > 0) {
            $check_Query = "SELECT * FROM employee_usres WHERE id='$isUpdate' AND companyId='$companyId' AND isDeleted=0 LIMIT 1";
            $check_QueryR = mysqli_query($conn, $check_Query);
    
            if (mysqli_num_rows($check_QueryR) > 0) {
                $row = mysqli_fetch_array($check_QueryR);
    
                if ($row['loginPassword'] != $engi_password) {
                    $engi_password = $p->hash($engi_password);
                }
    
                $empcategoryString = implode(',', $empcategory);  // Convert array to comma-separated string
    
                $update = "UPDATE employee_usres SET
                    Name='$engi_name',
                    phone='$engi_phone',
                    address='$c_address',
                    loginName='$engi_email',
                    loginPassword='$engi_password',
                    email='$engi_email',
                    designation='$engi_designation',
                    role='$engi_role',
                    isActive='$engineer_status',
                    employeeId='$emp_Id',
                    qualification='$qualification',
                    joiningdate='$joiningdate',
                    experience='$experience',
                    bloodgroup='$bloodgroup',
                    licensenum='$licensenum',
                    homenum='$homenum',
                    cost_per_hour='$cost_per_hour',
                    report_to='$report_to',
                    assigned_role='$assigned_role',
                    toolkit='$toolkit',
                    teamleader = '$teamleader',
                    empcategory='$empcategoryString',
                    mobile2='$engi_phone2',
                    technical_abilities='$technical_abilities',
                    other_details='$other_details',
                    
                    islock=0
                    WHERE id='$isUpdate' AND companyId='$companyId'";
    
                $updateR = mysqli_query($conn, $update); 
    
                if ($updateR) {
                    $data['code'] = 1;
                    $data['message'] = 'Engineer details updated';
                    print_r(json_encode($data)); 
                } else {
                    $data['code'] = 2;
                    $data['message'] = 'Engineer details not updated';
                    print_r(json_encode($data));
                }
            } else {
                $data['code'] = 0;
                $data['message'] = 'User not found in system';
                print_r(json_encode($data));
            }
        }
    }
    

    function add_new_customer($conn, $p) {



        $isUpdate = $_POST['isUpdate'];

        if ($isUpdate == 0) {



            $cust_name = $_POST['cust_name'];

            $cust_email = $_POST['cust_email'];

            $cust_phone = $_POST['cust_phone'];



            $c_cust_person = $_POST['c_cust_person'];

            $cust_person_email = $_POST['cust_person_email'];

            $c_person_phone = $_POST['c_person_phone'];

            $c_cust_location = $_POST['cust_location'];

            $cust_other_info = $_POST['c_other_info'];

            $cust_address = $_POST['cust_address'];

            $c_login_email = $_POST['c_login_email'];

            $c_login_password = $_POST['c_login_password'];

            $c_cust_app_status = $_POST['c_cust_app_status'];

            $isActive = $_POST['cust_status'];
            $cust_phone2 = $_POST['cust_phone2'];
            $cust_website = $_POST['cust_website'];
            $cust_caccess = $_POST['cust_caccess'];
            $userId = $_SESSION['userId'];

            $companyId = $_SESSION['companyId'];

			$lastCustId = $_POST['lastCustId'];

            $isLogin = $_POST['ischecked'];

            $check_Query = "select * from company_customer where customer_name='$cust_name' and company_id ='$companyId' and isDeleted=0";

            if ($c_login_password != "") {

                $c_login_password = $p->hash($c_login_password);

            }

            $check_QueryR = mysqli_query($conn, $check_Query);

            if (mysqli_num_rows($check_QueryR) > 0) {

                $data['code'] = 0;

                $data['message'] = 'User alreday registed';

                print_r(json_encode($data));

            } else {

                $query = "insert into company_customer values(DEFAULT,'$lastCustId','$companyId','$cust_name','$cust_phone','$cust_email','$cust_address','$c_cust_location','$c_cust_person'"

                    . ",'$cust_person_email','$c_person_phone','$cust_other_info','$c_login_email','$c_login_password','$isActive','$isLogin','$c_cust_app_status',NOW(),'$userId','0',0,'$cust_phone2','$cust_website','$cust_caccess')";

                $queryR = mysqli_query($conn, $query);

                if (mysqli_insert_id($conn)) {

                    $data['code'] = 1;

                    $data['message'] = 'New customer Registed';

                    $actionNote = "New customer Registed";

                    $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

                    print_r(json_encode($data));

                } else {

                    $data['code'] = 2;

                    $data['message'] = 'User not registed :' . mysqli_error($conn);

                    $actionNote = 'User not registed :' . mysqli_error($conn);

                    $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

                    print_r(json_encode($data));

                }

            }

        } else if ($isUpdate == 1) {



            $cust_name = $_POST['cust_name'];

            $cust_email = $_POST['cust_email'];

            $cust_phone = $_POST['cust_phone'];

            $c_cust_person = $_POST['c_cust_person'];

            $cust_person_email = $_POST['cust_person_email'];

            $c_person_phone = $_POST['c_person_phone'];

            $c_cust_location = $_POST['cust_location'];

            $cust_other_info = $_POST['c_other_info'];

            $cust_address = $_POST['cust_address'];

            $c_login_email = $_POST['c_login_email'];

            $c_login_password = $_POST['c_login_password'];

            $c_cust_app_status = $_POST['c_cust_app_status'];

            $isActive = $_POST['cust_status'];

            $userId = $_SESSION['userId'];

            $companyId = $_SESSION['companyId'];

            $custId = $_POST['custId'];
            $cust_phone2 = $_POST['cust_phone2'];
            $cust_website = $_POST['cust_website'];
            $checkCust = "select * from company_customer where id='$custId' and company_id ='$companyId' and isDeleted=0";

            $checkCustR = mysqli_query($conn, $checkCust);

            if (mysqli_num_rows($checkCustR) > 0) {



                $update = "update company_customer set  customer_name='$cust_name', contact_number ='$cust_phone', customer_email ='$cust_email',

			customer_address='$cust_address',customer_location='$c_cust_location', contact_person ='$c_cust_person',

			contact_person_email ='$cust_person_email', contact_person_phone ='$c_person_phone', other_info ='$cust_other_info',

			isAppAllow ='$c_cust_app_status',isActive='$isActive',phone2='$cust_phone2',website='$cust_website' where id='$custId' and company_id ='$companyId'";

                $updateR = mysqli_query($conn, $update);

                if ($updateR) {

                    $data['code'] = 1;

                    $data['message'] = 'Details updated.';

                    $actionNote = 'Details updated company user :';

                    $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

                    print_r(json_encode($data));

                } else {

                    $data['code'] = 2;

                    $data['message'] = 'Unable to update details, try again. Error:' . mysqli_error($conn);

                    $actionNote = 'Unable to update details, try again. Error:' . mysqli_error($conn);

                    $this->updateLog($conn, $companyId, $userId, $actionNote, $userId);

                    print_r(json_encode($data));

                }

            } else {

                $data['code'] = 2;

                $data['message'] = 'Customer not found' . $checkCust;

                print_r(json_encode($data));

            }

        }

    }



    function get_system_status($conn) {



        $query = "select * from system_status";

        $queryR = mysqli_query($conn, $query);

        $data = array();

        if ($queryR) {

            if (mysqli_num_rows($queryR)) {

                while ($row = mysqli_fetch_assoc($queryR)) {

                    $data[] = $row;

                }

            }

        }

        print_r(json_encode($data));

    }



    function logout($url, $conn) {

        $data = array();
        if (isset($_SESSION['userId']) && isset($_SESSION['userRole'])) {

            $this->userSession(0, $_SESSION['userId'], 0, 'Success', 0, $conn);
            $user = $_SESSION['userId'];
            session_destroy();
            $info = 'info';
            if (isset($_COOKIE[$info])) {
               setcookie($info, '', time() - 1);
            }

            $data['msg'] = "Logged out successfully...";
            $data['code'] = 1;
           $data['url'] = $url;
        
        } else {
            $data['code'] = 0;
            $data['msg'] = "Not logged in...";
        }
        print_r(json_encode($data));

    }



    function update_log($userId, $code, $conn) {

        if ($code == 1) {//user login log

        }

        if ($code == 2) {//user logout log

        }

    }





    function search_User($conn) {

        $searchKey = $_POST['search'];

        if ($searchKey != "") {

            $query = mysqli_query($conn, "SELECT * FROM system_users WHERE (userId like '%" . $searchKey . "%' or userName like '%" . $searchKey . "%' or userEmail like '%" . $searchKey . "%'  or UserPhone like '%" . $searchKey . "%')  ORDER BY userId ASC");

            if ($query) {

                if (mysqli_num_rows($query) > 0) {

                    while ($row = mysqli_fetch_assoc($query)) {

                        $data[] = $row;

                    }



                    print_r(json_encode($data));

                } else {

                    $data = '';

                    print_r(json_encode($data));

                }

            } else {

                $data = '';

                print_r(json_encode($data));

            }

        } else {

            $data = '';

            print_r(json_encode($data));

        }

    }





    function login_User($conn, $p) {

        $name = $_POST['name'];

        $password = $_POST['password'];
        $clicked = $_POST['clicked'];
        $get_User = "select * from supper_admin where supper_admin.loginEmail='$name'";

        $get_User_R = mysqli_query($conn, $get_User);

        if ($get_User_R) {

            if (mysqli_num_rows($get_User_R) > 0) {

                $row = mysqli_fetch_assoc($get_User_R);

                $db_password = $row['loginPassword'];
                

                $p_hash = $p->check_password($db_password, $password);

                //$phash = $p->hash($password);
                if($clicked == 10){
                    $update = "update supper_admin set islock =1 where loginEmail='$name'";
                    $updateR = mysqli_query($conn,$update);
                }
                $islock = $row['islock'];
                if($islock == 1){
                    
                    $data['code'] = 4;
                    $data['message'] = 'Your account has been locked multiple invalid password tryo. Reset your password to unlock.';
                    print_r(json_encode($data));
                    
                }else
                if ($p_hash) {

                    $data['code'] = 1;

                    $data['userId'] = $row['id'];

                    $data['message'] = 'Login Success';

                    $data['userRole'] = $row['loginRole'];

                    $_SESSION['userRole'] = $row['loginRole'];

                    $datacompanyId = $row['companyId'];

                    $_SESSION['userId'] = $row['id'];

                    $_SESSION['loginName'] = $row['loginName'];

                    $actionNote = "user login successfully,Login:".$_SESSION['loginName'];

                    $this->updateLog($conn, $datacompanyId, $row['id'], $actionNote, $row['id']);



                    $this->userSession(1, $row['id'], $row['loginName'], 'Success', $row['loginRole'], $conn);

                    print_r(json_encode($data));

                } else {

                    $this->userSession(1, 0, $name, 'Failed', 0, $conn);

                    $data['code'] = 0;

                    $data['message'] = 'check user login details';

                    $actionNote = "check user login details,Login:".$_SESSION['loginName'];

                    $this->updateLog($conn, 0, 0, $actionNote,0);



                    print_r(json_encode($data));



                }

            } else {

                $isActive = 0;

                $get_User_C = "select * from company_user,company where company_user.loginEmail='$name' and company.company_id = company_user.companyId";

                $get_User_CR = mysqli_query($conn, $get_User_C);

                if ($get_User_CR) {

                    if (mysqli_num_rows($get_User_CR) > 0) {

                        $row_admin = mysqli_fetch_assoc($get_User_CR);

                        $db_passwordAdmin = $row_admin['loginPassword'];

                        $db_tempPass = $row_admin['tempPass'];

                        $p_hash_C = $p->check_password($db_passwordAdmin, $password);

                        $p_hash_CTP = $p->check_password($db_tempPass, $password);

                        $phash = $p->hash($password);
                        if($clicked ==10){
                            $update = "update company_user set islock =1 where loginEmail='$name'";
                            $updateR = mysqli_query($conn,$update);
                        }
                        $islock = $row_admin['islock'];
                        if($islock == 1){
                            
                            $data['code'] = 4;
                            $data['message'] = 'Your account has been locked. Reset your password to unlock.';
                            print_r(json_encode($data));
                            
                        }else
                        if ($p_hash_C || $p_hash_CTP) {

                            $datacompanyId = $row_admin['companyId'];

                            if ($datacompanyId > 0) {

                                $companyActive = $row_admin['company_status'];

                                if($companyActive == 1){

                                     $isActive = $row_admin['isActive'];

                                if ($isActive == 1) {

                                    $data['code'] = 1;

                                    $data['message'] = 'Login Success';

                                    $actionNote = "check user login details,Login:".$name;

                                    $this->updateLog($conn, $datacompanyId, $row_admin['id'], $actionNote,$row_admin['id']);

                                    $data['userId'] = $row_admin['id'];

                                    $data['userRole'] = $row_admin['loginRole'];

                                    $_SESSION['companyId'] = $datacompanyId;

                                    $_SESSION['userRole'] = $row_admin['loginRole'];

                                    $_SESSION['loginName'] = $row_admin['loginName'];

                                    $_SESSION['loginEmail'] = $row_admin['loginEmail'];

                                    $_SESSION['tempPass'] = $row_admin['isTempPass'];

                                    $_SESSION['userId'] = $row_admin['id'];

                                    $msg = $this->userSession(1, $row_admin['id'], $row_admin['loginName'], 'Success', $row_admin['loginRole'], $conn);

                                    $data['sessionMsg'] = $msg;

                                    print_r(json_encode($data));

                                } else {

                                    $this->userSession(1, 0, $name, 'Failed', 0, $conn);

                                    $data['code'] = 2;

                                    $data['$isActive'] = $isActive;

                                    $data['message'] = 'account not activated, contact service provider';

                                    $actionNote = "account not activated, contact service provider,Login:".$name;

                                    $this->updateLog($conn,0, 0, $actionNote,0);

                                    print_r(json_encode($data));

                                }

                                } else {

                                    $this->userSession(1, 0, $name, 'Failed', 0, $conn);

                                    $data['code'] = 2;

                                    $data['$isActive'] = $isActive;

                                    $data['message'] = 'Your account has be terminated, contact service provider.';

                                    $actionNote = "Your account has be terminated, contact service provider.,Login:".$name;

                                    $this->updateLog($conn,0, 0, $actionNote,0);

                                    print_r(json_encode($data));

                                }

                               

                            } else {

                                $this->userSession(1, 0, $name, 'Failed', 0, $conn);

                                $data['code'] = 3;

                                $data['$isActive'] = 0;

                                $data['message'] = 'Company not assigned to user';

                                $actionNote = "Company not assigned to user,Login:".$name;

                                $this->updateLog($conn,0, 0, $actionNote,0);

                                print_r(json_encode($data));

                            }

                        } else {

                            $this->userSession(1, 0, $name, 'Failed:Incorrect password', 0, $conn);

                            $data['code'] = 0;

                            $data['query'] = $get_User_C;

                            $data['$password'] = $password;

                            $data['message'] = 'Incorrect password';

                            $actionNote = "Incorrect password,Login:".$name;

                            $this->updateLog($conn,0, 0, $actionNote,0);

                            print_r(json_encode($data));

                        }

                    } else {

                           /* $this->userSession(1, 0, $name, 'Failed:Invalid login details', 0, $conn);

                            $data['code'] = 0;

                            $data['message'] = 'Invalid login details';

                            $actionNote = "Invalid login details,Login:".$name;

                            $this->updateLog($conn,0, 0, $actionNote,0);

                            print_r(json_encode($data));*/
                            $isActive = 0;

                $get_User_C = "select * from employee_usres,company where employee_usres.loginName='$name' and company.company_id = employee_usres.companyId and employee_usres.isDeleted=0";

                $get_User_CR = mysqli_query($conn, $get_User_C);

                if ($get_User_CR) {

                    if (mysqli_num_rows($get_User_CR) > 0) {

                        $row_admin = mysqli_fetch_assoc($get_User_CR);

                        $db_passwordAdmin = $row_admin['loginPassword'];

                        $db_tempPass = $row_admin['tempPass'];

                        $p_hash_C = $p->check_password($db_passwordAdmin, $password);

                        $p_hash_CTP = $p->check_password($db_tempPass, $password);

                        $phash = $p->hash($password);
                        if($clicked ==10){
                            $update = "update employee_usres set islock =1 where loginName='$name'";
                            $updateR = mysqli_query($conn,$update);
                        }
                        $islock = $row_admin['islock'];
                        if($islock == 1){
                            
                            $data['code'] = 4;
                            $data['message'] = 'Your account has been locked. Reset your password to unlock.';
                            print_r(json_encode($data));
                            
                        }else
                        if ($p_hash_C || $p_hash_CTP) {

                            $datacompanyId = $row_admin['companyId'];

                            if ($datacompanyId > 0) {

                                $companyActive = $row_admin['company_status'];

                                if($companyActive == 1){

                                     $isActive = $row_admin['isActive'];

                                if ($isActive == 1) {

                                    $data['code'] = 1;

                                    $data['message'] = 'Login Success';

                                    $actionNote = "check user login details,Login:".$name;

                                    $this->updateLog($conn, $datacompanyId, $row_admin['id'], $actionNote,$row_admin['id']);

                                    $data['userId'] = $row_admin['id'];

                                    $data['userRole'] = $row_admin['role'];

                                    $_SESSION['companyId'] = $datacompanyId;

                                    $_SESSION['userRole'] = $row_admin['role'];

                                    $_SESSION['loginName'] = $row_admin['Name'];

                                    $_SESSION['loginEmail'] = $row_admin['loginName'];

                                    $_SESSION['tempPass'] = $row_admin['isTempPass'];

                                    $_SESSION['userId'] = $row_admin['id'];

                                    $msg = $this->userSession(1, $row_admin['id'], $row_admin['loginName'], 'Success', $row_admin['role'], $conn);

                                    $data['sessionMsg'] = $msg;

                                    print_r(json_encode($data));

                                } else {

                                    $this->userSession(1, 0, $name, 'Failed', 0, $conn);

                                    $data['code'] = 2;

                                    $data['$isActive'] = $isActive;

                                    $data['message'] = 'account not activated, contact service provider';

                                    $actionNote = "account not activated, contact service provider,Login:".$name;

                                    $this->updateLog($conn,0, 0, $actionNote,0);

                                    print_r(json_encode($data));

                                }

                                } else {

                                    $this->userSession(1, 0, $name, 'Failed', 0, $conn);

                                    $data['code'] = 2;

                                    $data['$isActive'] = $isActive;

                                    $data['message'] = 'Your account has be terminated, contact service provider.';

                                    $actionNote = "Your account has be terminated, contact service provider.,Login:".$name;

                                    $this->updateLog($conn,0, 0, $actionNote,0);

                                    print_r(json_encode($data));

                                }

                               

                            } else {

                                $this->userSession(1, 0, $name, 'Failed', 0, $conn);

                                $data['code'] = 3;

                                $data['$isActive'] = 0;

                                $data['message'] = 'Company not assigned to user';

                                $actionNote = "Company not assigned to user,Login:".$name;

                                $this->updateLog($conn,0, 0, $actionNote,0);

                                print_r(json_encode($data));

                            }

                        } else {

                            $this->userSession(1, 0, $name, 'Failed:Incorrect password', 0, $conn);

                            $data['code'] = 0;

                            $data['query'] = $get_User_C;

                            $data['$password'] = $password;

                            $data['message'] = 'Incorrect password';

                            $actionNote = "Incorrect password,Login:".$name;

                            $this->updateLog($conn,0, 0, $actionNote,0);

                            print_r(json_encode($data));

                        }

                    } else {

                            $this->userSession(1, 0, $name, 'Failed:Invalid login details', 0, $conn);

                            $data['code'] = 0;

                            $data['message'] = 'Invalid login details';

                            $actionNote = "Invalid login details,Login:".$name;

                            $this->updateLog($conn,0, 0, $actionNote,0);

                            print_r(json_encode($data));

                    }

                } else {

                    $this->userSession(1, 0, $name, 'Failed' . mysqli_error($conn), 0, $conn);

                    $data['code'] = 0;

                    $data['message'] = 'Query error: ' . mysqli_error($conn);

                    print_r(json_encode($data));

                }

                    }

                } else {

                    $this->userSession(1, 0, $name, 'Failed' . mysqli_error($conn), 0, $conn);

                    $data['code'] = 0;

                    $data['message'] = 'Query error: ' . mysqli_error($conn);

                    print_r(json_encode($data));

                }

            }

        } else {



            $data['code'] = 0;

            $data['message'] = 'Query error: ' . mysqli_error($conn);

            print_r(json_encode($data));

        }

    }



    function getUserIpAddr() {

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            //ip from share internet

            $ip = $_SERVER['HTTP_CLIENT_IP'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            //ip pass from proxy

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        } else {

            $ip = $_SERVER['REMOTE_ADDR'];

        }

        return $ip;

    }



    function userSession($code, $userId, $userName, $status, $role, $conn) {

        $today = date("Y-m-d H:i:s");

        $ip = $this->getUserIpAddr();
        $companyId = 0;
        if(isset($_SESSION['companyId'])){
            $companyId = $_SESSION['companyId'];    
        }
        

        if ($code == 1) {

            $insert = "insert into loginsession values(DEFAULT,'$userId','$userName','$role','$today','0000-00-00','$status','$ip','$companyId')";

            $insertR = mysqli_query($conn, $insert);

            if (mysqli_insert_id($conn) > 0) {

                $_SESSION['sessionId'] = mysqli_insert_id($conn);

                return 1;

            } else {

                $msg = mysqli_error($conn);

                return $msg . ":insert";

            }

        } else if ($code == 0) {

            $sessionId = $_SESSION['sessionId'];

            $update = "update loginsession set logoutdatetime='$today' where userId='$userId' and id='$sessionId'";

            $updateR = mysqli_query($conn, $update);

            if ($updateR) {

                return 1;

            } else {

                $msg = mysqli_error($conn);

                return $msg . ":update";

            }

        }

    }



}



?>






