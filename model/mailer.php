<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require "PHPMailer-master/PHPMailer/src/PHPMailer.php";
require "PHPMailer-master/PHPMailer/src/SMTP.php";
require 'PHPMailer-master/PHPMailer/src/Exception.php';

//Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'cutephuc1140@Gmail.com';                     //SMTP username
//     $mail->Password   = 'ngofwnyzbqxuvdjj';                               //SMTP password
//     $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom('cutephuc1140@Gmail.com', 'Lê Hoàng Phúc');
//     // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
//     $mail->addAddress('phuclhps31715@fpt.edu.vn');               //Name is optional
//     $mail->addReplyTo('info@example.com', 'Information');
//     $mail->addCC('cc@example.com');
//     $mail->addBCC('bcc@example.com');

//     //Attachments
//     // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Here is the subject';
//     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }

function sendMail($mailTo, $title, $context)
{

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'cutephuc1140@gmail.com'; //SMTP username
        $mail->Password = 'ngofwnyzbqxuvdjj'; //SMTP password
        $mail->SMTPSecure = "ssl"; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('cutephuc1140@gmail.com', 'Phuc');
        //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($mailTo); //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body = $context;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
};
// sendMail('lhphuc2k4@gmail.com','Đặt lại mật khẩu','link: ');
function guimailkichhoattaikhoan($hoten, $email)
{
    $html =
        '<section>
    <center style="width:100%;margin:4px auto 0 auto">

        <table border="0" cellpadding="0" cellspacing="0"
            style="     width: 500px; margin: 0 auto; border: 1px solid #e8eaed; border-radius: 8px;margin:0 auto;padding:0;table-layout:fixed">
            <tbody style="    width: 502px;    margin: 0 auto;    border: 1px solid #e8eaed;    border-radius: 8px;">
                <tr>
                    <td width="100%"
                        style="width:100%;text-align:center;padding-top:21px;padding-bottom:10px;padding-left:44px;padding-right:44px"
                        align="center">
                        <img src="https://goodapartment.click/uploads/logo1.jpg"
                            width="88" style="width:88px;outline:0;border:0">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:0px;padding-bottom:6px;width:100%;padding-left:15px;padding-right:15px;font-family:Google Sans,Roboto,San-Francisco,Helvetica,Arial;font-size:22px;line-height:28px;color:#202124;text-align:center;font-weight:500;background-color:#ffffff;direction:ltr;padding:10px 44px 0px 44px;font-size:28px;line-height:36px;font-weight:normal"
                        width="100%">
                        Chào ' . $hoten . '!
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:0px;padding-bottom:6px;width:100%;padding-left:15px;padding-right:15px;font-family:Google Sans,Roboto,San-Francisco,Helvetica,Arial;font-size:22px;line-height:28px;color:#202124;font-weight:500;background-color:#ffffff;direction:ltr;padding:20px 44px 10px 44px;font-size:28px;line-height:36px;font-weight:normal;"
                        width="100%">
                        Xác Minh Tài Khoản Của Bạn
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:0px;padding-bottom:20px;width:100%;font-weight:500;padding-left:35px;padding-right:35px;font-family:Google Sans,Roboto,San-Francisco,Helvetica,Arial;font-size:18px;color:#202124;background-color:#ffffff;text-align: justify;line-height:27px;direction:ltr;padding:0px 40px 10px 44px;font-weight:normal"
                        width="100%">Bạn đã tạo tài khoản Goodapartment liên kết với địa chỉ email
                        sau: ' . $email . '. Vui lòng xác minh địa chỉ email của bạn bằng cách nhấp vào
                        nút
                        bên dưới.
                    </td>
                </tr>
                <tr>
                    <td style="border-radius:8px;direction:ltr;padding:10px 0 30px 0;padding:10px 44px 30px 44px"
                        dir="ltr">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align:center;padding:0">
                                                        <a href="http://localhost:3000/DuAn1Nhom2update%20(1)/index.php?mod=user&act=kichhoat&email=' . $email . '">
                                                            <table align="center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="display: inline-block; background-color:#1a73e8;border:1px solid #1a73e8;border-radius:4px; color:#ffffff;font-family:Google Sans,Roboto,San-Francisco,Helvetica,Arial;font-size:14px;line-height:21px;text-decoration:none;padding:7px 22px 7px 22px;font-weight:500;text-align:center;">
                                                                            Kích Hoạt Tài Khoản Của Bạn
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</section>';
    sendMail($email, 'Kich Hoat Tai Khoan Cua Ban', $html);
    return true;
}
function guimailthaydoimatkhau($email)
{
    $html =
        '<section>
    <center style="width:100%;margin:4px auto 0 auto">

        <table border="0" cellpadding="0" cellspacing="0"
            style="     width: 500px; margin: 0 auto; border: 1px solid #e8eaed; border-radius: 8px;margin:0 auto;padding:0;table-layout:fixed">
            <tbody style="    width: 502px;    margin: 0 auto;    border: 1px solid #e8eaed;    border-radius: 8px;">
                <tr>
                    <td width="100%"
                        style="width:100%;text-align:center;padding-top:21px;padding-bottom:10px;padding-left:44px;padding-right:44px"
                        align="center">
                        <img src="https://goodapartment.click/uploads/logo1.jpg"
                            width="88" style="width:88px;outline:0;border:0">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:0px;padding-bottom:6px;width:100%;padding-left:15px;padding-right:15px;font-family:Google Sans,Roboto,San-Francisco,Helvetica,Arial;font-size:22px;line-height:28px;color:#202124;text-align:center;font-weight:500;background-color:#ffffff;direction:ltr;padding:10px 44px 0px 44px;font-size:28px;line-height:36px;font-weight:normal"
                        width="100%">
                        Chào Bạn!
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:0px;padding-bottom:6px;width:100%;padding-left:15px;padding-right:15px;font-family:Google Sans,Roboto,San-Francisco,Helvetica,Arial;font-size:22px;line-height:28px;color:#202124;font-weight:500;background-color:#ffffff;direction:ltr;padding:20px 44px 10px 44px;font-size:28px;line-height:36px;font-weight:normal;"
                        width="100%">
                        Thay Đổi Mật Khẩu
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:0px;padding-bottom:20px;width:100%;font-weight:500;padding-left:35px;padding-right:35px;font-family:Google Sans,Roboto,San-Francisco,Helvetica,Arial;font-size:18px;color:#202124;background-color:#ffffff;text-align: justify;line-height:27px;direction:ltr;padding:0px 40px 10px 44px;font-weight:normal"
                        width="100%">Bạn vừa gữi 1 yêu cầu cấp lại mật khẩu. Để thay đổi mật khẩu của bạn bằng cách nhấn vào nút bên dưới.
                    </td>
                </tr>
                <tr>
                    <td style="border-radius:8px;direction:ltr;padding:10px 0 30px 0;padding:10px 44px 30px 44px"
                        dir="ltr">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align:center;padding:0">
                                                        <a href="http://localhost:3000/DuAn1Nhom2update%20(1)/index.php?mod=user&act=setpass&email=' . $email . '">
                                                            <table align="center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="display: inline-block; background-color:#1a73e8;border:1px solid #1a73e8;border-radius:4px; color:#ffffff;font-family:Google Sans,Roboto,San-Francisco,Helvetica,Arial;font-size:14px;line-height:21px;text-decoration:none;padding:7px 22px 7px 22px;font-weight:500;text-align:center;">
                                                                            Thay Đổi
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</section>';
    sendMail($email, 'Thay Doi Mat KHau', $html);
    return true;
}
