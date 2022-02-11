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
        <h2 class="name">Hello!</h2>
            <p class="description">User Contact With You.</p>
            <p class="description">Message: {{$message}}</p>
            <p style="margin-left: 60px;">Name: {{$name}}</p>
            <p style="margin-left: 60px;">Email: {{$email}}</p>
            <p style="margin-left: 60px;">Phone: {{$number}}</p>
            <p style="margin-left: 60px;">Thank you for using our application!</p>
            <p style="margin-left: 60px;line-height: 25px;">Regards ,<br> 2easy.cash</p>
    </div>

</body>

</html>
