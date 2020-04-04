<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	สวัสดี {{$name}}<br>
	เราได้รับคำขอตั้งรหัสผ่าน New JSM <br>
	คุณสามารถเปลี่ยนรหัสผ่านของคุณได้ <a href="{{ url('/resetPassword/'.$gen_token)}}" target="_blank">ที่นี่</a>
</body>
</html>
