<?php
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

    case 'create' :
        create();
        break;

    case 'clientRequest' :
        clientRequest();
        break;

    case 'submitResume' :
        submitResume();
        break;

    case 'submitApplication' :
        submitApplication();
        break;

    case 'sendInquiry' :
        sendInquiry();
        break;

    default :
}

function create()
{
    $jobFunctionId = $_POST['jobFunctionId'];

    $refNum = bin2hex(openssl_random_pseudo_bytes(4));

    $email = $_POST['workEmail'];

    $job = job();
    $job->obj = $_POST;
    $job->obj['position'] = htmlspecialchars($_POST['position'], ENT_QUOTES);
    $job->obj['comment'] = htmlspecialchars($_POST['comment'], ENT_QUOTES);
    $job->obj['contactName'] = htmlspecialchars($_POST['contactName'], ENT_QUOTES);
    $job->obj['company'] = htmlspecialchars($_POST['company'], ENT_QUOTES);
    $job->obj['jobTitle'] = htmlspecialchars($_POST['jobTitle'], ENT_QUOTES);
    $job->obj['address'] = htmlspecialchars($_POST['address'], ENT_QUOTES);
    $job->obj['keySkills'] = htmlspecialchars($_POST['keySkills'], ENT_QUOTES);
    $job->obj['refNum'] = strtoupper($refNum);
    $job->obj['createDate'] = "NOW()";
    $job->create();

    $hrList = admin()->list("jobFunctionId='$jobFunctionId'");
    $adminList = admin()->list("level='admin'");

    // Send email
    $content = __talentRequestEmailMessage();
    $hrmessage = __hrTalentMessage();
    $adminmessage = __adminTalentMessage();

    sendEmail($job->obj['workEmail'], $content);
    //for HR
    foreach ($hrList as $row) {
        sendEmail($row->email, $hrmessage);
    }
    //for admin
    foreach ($adminList as $row) {
        sendEmail($row->email, $adminmessage);
    }

    header('Location: ../home/?view=requestSuccess&email=' . $email);
}

function clientRequest()
{
    if ($_POST['jobFunctionId'] == null) {
        $msg = "Please select from the Job Category dropdown";
        header('Location: ../home?view=clientForm&error=' . $msg);
    } else {
        $email = $_POST['email'];
        $jobFunctionId = $_POST['jobFunctionId'];
        $refNum = bin2hex(openssl_random_pseudo_bytes(4));
        $checkEmail = company()->get("email='$email'");

        if ($checkEmail) {
            header('Location: ../home?view=clientForm&error=Email already exist!');
        } else {
            $comp = company();
            $comp->obj = $_POST;
            $comp->obj['refNum'] = strtoupper($refNum);
            $comp->obj['department'] = htmlspecialchars($_POST['department'], ENT_QUOTES);
            $comp->obj['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES);
            $comp->obj['contactPerson'] = htmlspecialchars($_POST['contactPerson'], ENT_QUOTES);
            $comp->obj['address'] = htmlspecialchars($_POST['address'], ENT_QUOTES);
            $comp->obj['description'] = htmlspecialchars($_POST['description'], ENT_QUOTES);
            $comp->obj['isApproved '] = "1";
            $comp->create();

            $company = company()->get("email='$email'");

            __createClientLogin($company->Id);

            $hrList = admin()->list("jobFunctionId='$jobFunctionId'");
            $adminList = admin()->list("level='admin'");

            // Send email
            $hrmessage = __hrClientMessage();
            $adminmessage = __adminClientMessage();

            //for HR
            foreach ($hrList as $row) {
                sendEmail($row->email, $hrmessage);
            }
            //for admin
            foreach ($adminList as $row) {
                sendEmail($row->email, $adminmessage);
            }

            header('Location: ../home/?view=success&email=' . $email);
        }
    }
}

function __createClientLogin($Id)
{
    // This is if you want to get the last 6 digits
    /*
    substr(round(microtime(true)), -6)
    */
    // Get Detail
    $company = company()->get("Id='$Id'");

    // Create account
    $user = user();
    $user->obj['username'] = "C" . round(microtime(true));
    $user->obj['password'] = sha1("temppassword");
    $user->obj['firstName'] = $company->contactPerson;
    $user->obj['lastName'] = $company->name;
    $user->obj['level'] = "company";
    $user->create();

    // Update Company
    $comp = company();
    $comp->obj['username'] = $user->obj['username'];
    $comp->update("Id='$Id'");

    // Send email
    $content = "Thank you for considering Teamire as your prospect to search for your contingent workforce.<br>
							Your new account has been activated which means you can now login with the below credentials and<br>
							view your personalized dashboard.<br><br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Username: " . $user->obj['username'] . "<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Temporary Password: temppassword<br><br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To login, visit <a href='http://www.teamire.com/company/?view=login'>www.teamire.com/company/</a><br><br><br>" .
        "<img src='http://ictadmin.com.au/images/page_art/fa-phone_256_20_0077bb_none.png' style='width:15px;height:15px;'>" . " +61 452 364 793<br>" .
        "<img src='http://www.myiconfinder.com/uploads/iconsets/256-256-791373a6801d994466b6c7e8bd45289d-email.png' style='width:15px;height:15px;'>" . " hrmanager@teamire.com";

    sendEmail($company->email, $content);
}

function submitResume()
{

    $email = $_POST["email"];
    $jobFunctionId = $_POST['jobFunctionId'];
    $refNum = bin2hex(openssl_random_pseudo_bytes(4));
    $checkEmail = candidate()->get("email='$email'");

    $uploadFile = uploadFile($_FILES['upload_file']);
    $uploadList = uploadMultipleFile($_FILES["upload_certs"]);

    if ($uploadFile) {
        $can = candidate();
        $can->obj = $_POST;
        $can->obj['firstName'] = htmlspecialchars($_POST['firstName'], ENT_QUOTES);
        $can->obj['lastName'] = htmlspecialchars($_POST['lastName'], ENT_QUOTES);
        $can->obj['address1'] = htmlspecialchars($_POST['address1'], ENT_QUOTES);
        $can->obj['address2'] = htmlspecialchars($_POST['address2'], ENT_QUOTES);
        $can->obj['speedtest'] = htmlspecialchars($_POST['speedtest'], ENT_QUOTES);
        $can->obj['coverLetter'] = htmlspecialchars($_POST['coverLetter'], ENT_QUOTES);
        $can->obj['keySkills'] = htmlspecialchars($_POST['keySkills'], ENT_QUOTES);
        $can->obj['refNum'] = strtoupper($refNum);
        $can->obj['uploadedResume'] = $uploadFile;
        $can->obj['uploadedSpecs'] = $_FILES["upload_specs"]['name'] ? uploadFile($_FILES["upload_specs"]) : "";
        $can->create();

        $candidate = candidate()->get("email='$email'");

        if ($uploadList && !$uploadList['error']) {
            foreach ($uploadList as $file) {
                $certs = certificates();
                $certs->obj['resumeId'] = $candidate->Id;
                $certs->obj['uploadedCerts'] = $file;
                $certs->create();
            }
        }

        $hrList = admin()->list("jobFunctionId='$jobFunctionId'");
        $adminList = admin()->list("level='admin'");

        // Send email
        $content = __submitResumeEmailMessage();
        $hrmessage = __hrResumeMessage();
        $adminmessage = __adminResumeMessage();

        //for candidate
        sendEmail($can->obj['email'], $content);
        //for HR
        foreach ($hrList as $row) {
            sendEmail($row->email, $hrmessage);
        }
        //for admin
        foreach ($adminList as $row) {
            sendEmail($row->email, $adminmessage);
        }

        header('Location: ../home/?view=success&email=' . $email);
    } else if ($checkEmail) {
        header('Location: ../?view=submitResume&error=Email already exist!');
    } else {
        header('Location: ../?view=submitResume&error=Not uploaded');
    }
}

function submitApplication()
{
    $email = $_POST["email"];
    $jobFunctionId = $_POST['jobFunctionId'];
    $jobId = $_POST['jobId'];
    $refNum = bin2hex(openssl_random_pseudo_bytes(4));

    $job = job()->get("Id='$jobId'");

    $uploadFile = uploadFile($_FILES['upload_file']);
    $uploadList = uploadMultipleFile($_FILES["upload_certs"]);

    if ($uploadFile) {
        $app = application();
        $app->obj['jobId'] = $_POST["jobId"];
        $app->obj['jobFunctionId'] = $_POST["jobFunctionId"];
        $app->obj['refNum'] = strtoupper($refNum);
        $app->obj['firstName'] = htmlspecialchars($_POST["firstName"], ENT_QUOTES);
        $app->obj['lastName'] = htmlspecialchars($_POST["lastName"], ENT_QUOTES);
        $app->obj['birthdate'] = $_POST["birthdate"];
        $app->obj['abn'] = $_POST["abn"];
        $app->obj['taxNumber'] = $_POST["taxNumber"];
        $app->obj['email'] = $_POST["email"];
        $app->obj['phoneNumber'] = $_POST["phoneNumber"];
        $app->obj['address1'] = htmlspecialchars($_POST["address1"], ENT_QUOTES);
        $app->obj['address2'] = htmlspecialchars($_POST["address2"], ENT_QUOTES);
        $app->obj['city'] = $_POST["city"];
        $app->obj['state'] = $_POST["state"];
        $app->obj['zipCode'] = $_POST["zipCode"];
        $app->obj['speedtest'] = htmlspecialchars($_POST["speedtest"], ENT_QUOTES);
        $app->obj['coverLetter'] = htmlspecialchars($_POST["coverLetter"], ENT_QUOTES);
        $app->obj['keySkills'] = htmlspecialchars($_POST["keySkills"], ENT_QUOTES);
        $app->obj['uploadedResume'] = $uploadFile;
        $app->obj['uploadedSpecs'] = $_FILES["upload_specs"]['name'] ? uploadFile($_FILES["upload_specs"]) : "";
        $app->create();

        $application = application()->get("email='$email'");


        if ($uploadList && !$uploadList['error']) {
            foreach ($uploadList as $file) {
                $certs = certificates();
                $certs->obj['resumeId'] = $application->Id;
                $certs->obj['uploadedCerts'] = $file;
                $certs->create();
            }
        }

        $hrList = admin()->list("jobFunctionId='$jobFunctionId'");
        $adminList = admin()->list("level='admin'");

        // Send Email
        $hrmessage = __hrApplicationMessage();
        $adminmessage = __adminApplicationMessage();

        //for candidate
        $content = "Thank you for applying and showing interest in our company and responding to our advertisement for<br>
									(" . $job->position . " with reference number " . $job->refNum . ").<br><br>
									At this stage in employment prospect we usually make this one very significant statement to everyone<br>
									who is looking for an opportunity with our organisation, and that is “if your career profile truly reflects<br>
									who you are, then you definitely stand a fighting chance in landing a suitable position with our business.<br><br>
									For your application to proceed to the next stage of the interview process, with a well-structured<br>
									resume we also need you to provide us with copies of your academic achievements for factual<br>
									verification. This may include other work-related training certificates, awards, and transcripts of exams<br>
									and marks scored in university and college that you wish to share with us in support of your application.<br><br><br>" .
            "<img src='http://ictadmin.com.au/images/page_art/fa-phone_256_20_0077bb_none.png' style='width:15px;height:15px;'>" . " +61 452 364 793<br>" .
            "<img src='http://www.myiconfinder.com/uploads/iconsets/256-256-791373a6801d994466b6c7e8bd45289d-email.png' style='width:15px;height:15px;'>" . " hrmanager@teamire.com";
        sendEmail($application->email, $content);
        //for HR
        foreach ($hrList as $row) {
            sendEmail($row->email, $hrmessage);
        }
        //for admin
        foreach ($adminList as $row) {
            sendEmail($row->email, $adminmessage);
        }
        header('Location: ../home/?view=success&email=' . $email);
    } else {
        header('Location: ../home/?view=application&id=' . $_POST['jobId'] . '&error=Not uploaded');
    }
}

function sendInquiry()
{
    $message = $_POST['message'];
    $email = $_POST['workEmail'];

    $inq = inquiries();
    $inq->obj['firstName'] = htmlspecialchars($_POST["firstName"], ENT_QUOTES);
    $inq->obj['lastName'] = htmlspecialchars($_POST["lastName"], ENT_QUOTES);
    $inq->obj['phoneNumber'] = $_POST["phoneNumber"];
    $inq->obj['jobFunctionId'] = $_POST["jobFunctionId"];
    $inq->obj['workEmail'] = $_POST["workEmail"];
    $inq->obj['zipCode'] = $_POST["zipCode"];
    $inq->obj['message'] = htmlspecialchars($message, ENT_QUOTES);
    $inq->create();

    $content = "From: $email<br><br>
								Message: $message";

    $adminList = admin()->list("level='admin'");

    //send email to admin
    foreach ($adminList as $row) {
        sendEmail($row->email, $content);
    }

    header('Location: ../home/?view=success');
}


/* ======================== Email Messages ==============================*/

function __talentRequestEmailMessage()
{
    return "Thank you for submitting your request. Our HR team will now contact you within 2 business<br>
					days to further review and help with processing of your application.<br><br><br>" .
        "<img src='http://ictadmin.com.au/images/page_art/fa-phone_256_20_0077bb_none.png' style='width:15px;height:15px;'>" . " +61 452 364 793<br>" .
        "<img src='http://www.myiconfinder.com/uploads/iconsets/256-256-791373a6801d994466b6c7e8bd45289d-email.png' style='width:15px;height:15px;'>" . " hrmanager@teamire.com";
}

function __submitResumeEmailMessage()
{
    return "We have received you resume with regards to employment opportunities with Teamire. An HR team<br>
					member will be in touch should a suitable position become available matching your skills and<br>
					qualifications.<br><br>
					Thank you for contacting Teamire Employment Services<br><br><br>" .
        "<img src='http://ictadmin.com.au/images/page_art/fa-phone_256_20_0077bb_none.png' style='width:15px;height:15px;'>" . " +61 452 364 793<br>" .
        "<img src='http://www.myiconfinder.com/uploads/iconsets/256-256-791373a6801d994466b6c7e8bd45289d-email.png' style='width:15px;height:15px;'>" . " hrmanager@teamire.com";
}

function __hrTalentMessage()
{
    return "A new talent request has been created. Please login to <a href='http://www.teamire.com/hr/index.php?view=login'>www.teamire.com/hr/</a><br>
					and check the new talent request.<br><br>
					Teamire";
}

function __adminTalentMessage()
{
    return "A new talent request has been created. Please login to <a href='http://www.teamire.com/admin/index.php?view=login'>www.teamire.com/admin/</a><br>
					and check the new talent request.<br><br>
					Teamire";
}

function __hrClientMessage()
{
    return "A new client has registered. Please login to <a href='http://www.teamire.com/hr/index.php?view=login'>www.teamire.com/hr/</a><br>
					and check the new client.<br><br>
					Teamire";
}

function __adminClientMessage()
{
    return "A new client has registered. Please login to <a href='http://www.teamire.com/admin/index.php?view=login'>www.teamire.com/admin/</a><br>
					and check the new client.<br><br>
					Teamire";
}

function __hrResumeMessage()
{
    return "A new resume has been submitted. Please login to <a href='http://www.teamire.com/hr/index.php?view=login'>www.teamire.com/hr/</a><br>
					and check the new resume.<br><br>
					Teamire";
}

function __adminResumeMessage()
{
    return "A new resume has been submitted. Please login to <a href='http://www.teamire.com/admin/index.php?view=login'>www.teamire.com/admin/</a><br>
					and check the new resume.<br><br>
					Teamire";
}

function __hrApplicationMessage()
{
    return "A new application has been submitted. Please login to <a href='http://www.teamire.com/hr/index.php?view=login'>www.teamire.com/hr/</a><br>
					and check the new application.<br><br>
					Teamire";
}

function __adminApplicationMessage()
{
    return "A new application has been submitted. Please login to <a href='http://www.teamire.com/admin/index.php?view=login'>www.teamire.com/admin/</a><br>
					and check the new application.<br><br>
					Teamire";
}

?>
