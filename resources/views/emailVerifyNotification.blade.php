<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>globelgri</title>
</head>
<style>
    div {
        background-color: white;
        height: auto;
        margin-top: 100px;
        width: 65%;
        margin-left: auto;
        margin-right: auto;
        padding-bottom: 20px;

    }

    .name {
        margin-left: 60px;
        padding-top: 20px;
    }
    .title {
        text-align: center;
        top: 10px;
    }

    .description {
        margin-left: 60px;
        margin-right: 60px;
    }

    


</style>

<body style="background-color: #edf2f7;">
    <div>
        <h2 class="name">Hello {{$first_name}}</h2>
            <p class="description">Thank you for singing up with 2easy.cash </p>
            <p class="description">As an extra security precaution please verify your mail by using the following Verification code.</p>
            <p style="margin-left: 60px;">Email Verification Code is. {{$email_verification_code}}</p>
            <p style="margin-left: 60px;">Thank you for using our application!</p>
            <p style="margin-left: 60px;line-height: 25px;">Regards ,<br> 2easy.cash</p>
            <p style="margin-left: 60px;">Anitra Brown</p>
    </div>

</body>

</html>
