<?php

namespace SendMail;

use DateTime;
use DateTimeZone;
use Error;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

require './system/libraries/libphp-phpmailer/src/PHPMailer.php';

require './system/libraries/libphp-phpmailer/src/SMTP.php';

// require './application/controller/EmailController.php';


class ConfigMail
{

    public $email;
    public $Subject_title;
    public $context_body;
    public $message = '';

    function __construct($email, $Subject_title)
    {
        $this->email = $email;
        $this->Subject_title = $Subject_title;
        // $this->context_body = $context_body;
    }

    // templte ApprovalMail
    function ApproveEamil($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta "Content-Type: text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
        
            <div class="card mb-3">
                <img style="width: 20px; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_logo23.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>
                            <h4>Requester name: ' . $value->requester_name . '</h4>
                            <h4 style="font-family:Phetsarath OT">Car: ' . $value->carname . '</h4>
                            <div><b>Location:</b> ' . $value->location . '</div>
                            <div style="margin-top: 10px;"><b>Submit date:</b> ' . $value->daterequest . '</div>
                            <div style="margin-top: 10px;"><b>Start date:</b> ' . $value->depdate . '</div>
                            <div style="margin-top: 10px;"><b>Return date:</b> ' . $value->redate . '</div>
                            <div style="margin-top: 10px;"><b>Approval line:</b> ' . $value->getapprover_name . '</div>


                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">Approve link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        ';
        return $body;
    }
    // templte Linemanager approve Mail template
    function LineManager_Approvevehicle_Eamil_template($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
        <meta "Content-Type: text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
  
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_logo23.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
        <div>
            <h4>Requester name: ' . $value->requester_name . '</h4>
            <h4 style="font-family:Phetsarath OT">Car name: ' . $value->carname . '</h4>
            <div><b>Location:</b> ' . $value->location . '</div>
            <div style="margin-top: 10px;"><b>Submit date:</b> ' . $value->dateRequest . '</div>
            <div style="margin-top: 10px;"><b>Purpose:</b> ' . $value->purpose . '</div>
        
        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">View link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        ';
        return $body;
    }
    // templte ApprovalMail
    function Rejected_vehicle_Eamail_template($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
    
            <meta "Content-Type: text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
        
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_logo23.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>
                            <h4>Requester name: ' . $value->requester_name . '</h4>
                            <h4 style="font-family:Phetsarath OT">Car: ' . $value->carname . '</h4>
                            <div><b>Location:</b> ' . $value->location . '</div>
                            <div style="margin-top: 10px;"><b>Submit date:</b> ' . $value->daterequest . '</div>
                            <div style="margin-top: 10px;"><b>Start date:</b> ' . $value->purpose . '</div>
                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">View rejected link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        ';
        return $body;
    }
    function ApproveEamil_Stationary($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
        <meta "Content-Type: text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
      
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_logo23.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>
                        <h4><b>Product Name:</b> ' . $value->product_name . '</h4>
                        <div style="font-family:Phetsarath OT"><b>Requester name:</b> ' . $value->requester_name . '</div>
                        <div style="margin-top: 10px;font-family:Phetsarath OT;"><b>Date need:</b> ' . $value->dateneed . '</div>
                        <div style="margin-top: 10px;"><b>Quantity requested:</b> ' . $value->quantity . '</div>



                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">Approve link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        ';
        return $body;
    }

    // Request Mail
    function RequestEamil($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
        <meta "Content-Type: text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
    
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_logo23.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>
                            <h4>requester_name: ' . $value->requester_name . '</h4>
                            <h4 style="font-family:Phetsarath OT">Car: ' . $value->carname . '</h4>
                            <div style="font-family:Phetsarath OT"><b>location:</b> ' . $value->location . '</div>
                            <div style="margin-top: 10px;"><b>Requested date:</b> ' . $value->daterequest . '</div>
                            <div style="margin-top: 10px;"><b>Start date:</b> ' . $value->depdate . '</div>
                            <div style="margin-top: 10px;"><b>Return date:</b> ' . $value->redate . '</div>

                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">Approve link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        ';
        return $body;
    }
    // Request Mail
    function RequestEamil_stationary($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
        <meta "Content-Type: text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
        
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_logo23.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>
                        <h4><b>Product Name:</b> ' . $value->product_name . '</h4>
                        <div style="font-family:Phetsarath OT"><b>Requester name:</b> ' . $value->requester_name . '</div>
                        <div style="margin-top: 10px;font-family:Phetsarath OT;"><b>Date need:</b> ' . $value->dateneed . '</div>
                        <div style="margin-top: 10px;"><b>Quantity requested:</b> ' . $value->quantity . '</div>


                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">Approve link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        ';
        return $body;
    }

    // Submit Mail
    function SubmitEamil($value)
    {
        $daterequest = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
            <!DOCTYPE html>
            <html lang="en">

            <head>
            <meta "Content-Type: text/html; charset=UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Email</title>
            </head>
            <body>
            
                <div class="card mb-3">
                    <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_logo23.png" alt="AIF-Group">
                    <div>
                        <div style="margin-top: 10px;">
                            <h2>' . $value->msg . '</h2>
                            <div>
                                <h4>Requester name: ' . $value->requester_name . '</h4>
                                <h4 style="font-family:Phetsarath OT">Car: ' . $value->carname . '</h4>
                                <div style="font-family:Phetsarath OT"><b>Destination:</b> ' . $value->location . '</div>
                                <div style="margin-top: 10px;"><b>Requested date:</b> ' . $value->daterequest . '</div>
                                <div style="margin-top: 10px;"><b>Start date:</b> ' . $value->depdate . '</div>
                                <div style="margin-top: 10px;"><b>Return date:</b> ' . $value->redate . '</div>

                            </div>
                            <div style="margin-top: 30px;">
                                <a href="' . $value->url . '" class="btn btn-success">Approve link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </body>

            </html>
            ';
        return $body;
    }
    // Submit Mail stationary
    function SubmitEamil_stationary($value)
    {
        $daterequest = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
            <!DOCTYPE html>
            <html lang="en">

            <head>
            <meta "Content-Type: text/html; charset=UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Email</title>
            </head>
            <body>
           
                <div class="card mb-3">
                    <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_logo23.png" alt="AIF-Group">
                    <div>
                        <div style="margin-top: 10px;">
                            <h2>' . $value->msg . '</h2>
                            <div>

                                <h4><b>Product Name:</b> ' . $value->product_name . '</h4>
                                <div style="font-family:Phetsarath OT"><b>Requester name:</b> ' . $value->requester_name . '</div>
                                <div style="margin-top: 10px;font-family:Phetsarath OT;"><b>Date need:</b> ' . $value->dateneed . '</div>
                                <div style="margin-top: 10px;"><b>Quantity requested:</b> ' . $value->quantity . '</div>

                                public $product_name;
                                public $requester_name;
                                public $dateneed;
                                public $quantity;
                            </div>
                            <div style="margin-top: 30px;">
                                <a href="' . $value->url . '" class="btn btn-success">Approve link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </body>

            </html>
            ';
        return $body;
    }

    // Reject the request
    function RejectionEamil($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
        <meta "Content-Type: text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
       
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_logo23.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>

                            <div><b>Requester Name:</b> ' . $value->requester_name . '</div>
                            <div style="font-family:Phetsarath OT"><b>Car:</b> ' . $value->carname . '</div>
                            <div style="margin-top: 10px;font-family:Phetsarath OT;"><b>Location:</b> ' . $value->location . '</div>
                            <div style="margin-top: 10px;"><b>Requested date:</b> ' . $value->daterequest . '</div>
                            <div style="margin-top: 10px;"><b>Start date:</b> ' . $value->depdate . '</div>
                            <div style="margin-top: 10px;"><b>Return date:</b> ' . $value->redate . '</div>

                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">Approve link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>




        ';
        return $body;
    }
    // Reject the request stationary
    function RejectionEamil_stationary($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
        <meta "Content-Type: text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
       
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_logo23.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>

                            <div><b>Product Name:</b> ' . $value->product_name . '</div>
                            <div style="font-family:Phetsarath OT"><b>Requester name:</b> ' . $value->requester_name . '</div>
                            <div style="margin-top: 10px;font-family:Phetsarath OT;"><b>Date need:</b> ' . $value->dateneed . '</div>
                            <div style="margin-top: 10px;"><b>Quantity requested:</b> ' . $value->quantity . '</div>





                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">Approve link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>




        ';
        return $body;
    }

    function getSendEamil($body)
    {
        // Config Mail
        $conn = new PHPMailer();
        $conn->isSMTP();
        $conn->SMTPAuth = true;
        $conn->SMTPSecure = SMTP_ENCRYPTION;
        $conn->Host = SMTP_HOST;
        $conn->Port = SMTP_PORT;
        $conn->Username = SMTP_USERNAME;
        $conn->Password = SMTP_PASS;

        // from email address
        $conn->setFrom(SMTP_USERNAME);
        $conn->Subject = $this->Subject_title;

        //   Receipt eamil Adress
        $conn->AddAddress($this->email);

        $conn->isHTML(true);

        // ====================

        // ====================

        // Context Body
        $conn->Body = $body;
        $msg = '';

        try {
            $conn->send();
        } catch (Exception  $e) {
            $msg = 'Not Found';
        }
        return $msg;
    }
}

// Object User
class RequestUser
{

    public $msg;
    public $carname;
    public $requester_name;
    public $location;
    public $daterequest;
    public $depdate;
    public $redate;
    public $getapprover_name;
    public $URL;
 

    function __construct($url, $title, $carname, $requester_name, $location, $daterequest, $depdate, $redate, $getapprover_name)
    {
        $this->URL = $url;
        $this->msg = $title;
        $this->carname = $carname;
        $this->requester_name = $requester_name;
        $this->location = $location;
        $this->daterequest = $daterequest;
        $this->depdate = $depdate;
        $this->redate = $redate;

        $this->getapprover_name = $getapprover_name;
    }
    public function getUser()
    {
        $obj = (object)[
            'url' => $this->URL,
            'msg' => $this->msg,
            'carname' => $this->carname,
            'requester_name' => $this->requester_name,
            'getapprover_name' => $this->getapprover_name,
            'location' => $this->location,
            'daterequest' => $this->daterequest,
            'daterequest' => $this->daterequest,
            'depdate' => $this->depdate,
            'redate' => $this->redate,

        ];
        return $obj;
    }
}
class RequestUser_by_linemanager
{

    public $msg;
    public $requester_name;
    public $carname;
    public $location;
    public $purpose;
    public $dateRequest;
    public $URL;


    function __construct($url, $title,$requester_name,$carname, $location, $purpose,$dateRequest)
    {
        $this->URL = $url;
        $this->msg = $title;
        $this->carname = $carname;
        $this->requester_name = $requester_name;
        $this->location = $location;
        $this->purpose = $purpose;
        $this->dateRequest = $dateRequest;
    }
    public function getUser()
    {
        $obj = (object)[
            'url' => $this->URL,
            'msg' => $this->msg,
            'requester_name' => $this->requester_name,
            'carname' => $this->carname,
            'location' => $this->location,
            'purpose' => $this->purpose,
            'dateRequest' => $this->dateRequest,
           

        ];
        return $obj;
    }
}
class RequestUser_wascancel_vehicle
{

    public $msg;
    public $carname;
    public $requester_name;
    public $location;
    public $daterequest;
    public $purpose;
    public $URL;


    function __construct($url, $title, $requester_name,$carname, $location,$purpose, $daterequest)
    {
        $this->URL = $url;
        $this->msg = $title;
        $this->carname = $carname;
        $this->requester_name = $requester_name;
        $this->location = $location;
        $this->daterequest = $daterequest;
        $this->purpose = $purpose;
    }
    public function getUser_request()
    {
        $obj = (object)[
            'url' => $this->URL,
            'msg' => $this->msg,
            'carname' => $this->carname,
            'requester_name' => $this->requester_name,
            'location' => $this->location,
            'daterequest' => $this->daterequest,
            'purpose' => $this->purpose,
       

        ];
        return $obj;
    }
}
class RequestUser_stationary
{

    public $msg;
    public $product_name;
    public $requester_name;
    public $dateneed;
    public $quantity;
    public $URL;


    function __construct($url, $title, $product_name, $requester_name, $dateneed, $quantity)
    {
        $this->URL = $url;
        $this->msg = $title;
        $this->product_name = $product_name;
        $this->requester_name = $requester_name;
        $this->dateneed = $dateneed;
        $this->quantity = $quantity;
    }
    public function getUser_stationary()
    {
        $obj = (object)[
            'url' => $this->URL,
            'msg' => $this->msg,
            'product_name' => $this->product_name,
            'requester_name' => $this->requester_name,
            'dateneed' => $this->dateneed,
            'quantity' => $this->quantity,

        ];
        return $obj;
    }
}
