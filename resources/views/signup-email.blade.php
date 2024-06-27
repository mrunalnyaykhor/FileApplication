Hello {{$email_data['name']}}
<br><br>
Welcome to my Website!
<br>
Please click the below link to verify your email and activate your account!
<br><br>
<a href="{{ route('verify.email', ['code' => $email_data['verification_code']]) }}"><b>Click Here!</b></a>

<br><br>
Thank you!
<br>
