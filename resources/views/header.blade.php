<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .logo-container {
            position: relative;
            padding-left: 0.5rem;
            width: 20%;
            height: 18rem;
            margin-bottom: 2rem;
        }

        .black-bar {
            position: absolute;
            display: flex;
            width: 77%;
            height: 80%;
            border-width: 2px;
            border-right-style: solid;
            border-bottom-style: solid;
            border-top-style: solid;
            border-left: none;
            margin-right: 40%;
            bottom: 40px;
            z-index: 1;
            left: 0;
        }

        .logo-image {
            position: fixed;
            z-index: 2;
            padding-top: 1rem;
            width: auto;
            height: 50px;
            padding-left: 2.2rem;
        }

        .logo-background {
            position: relative;
            z-index: 1;
            height: 17rem;
            width: 14rem;
        }

        .contact-info {
            position: absolute;
            top: 20%;
            left: 42rem;
            width: 15rem;
            text-align: left;
            z-index: 3;
            background-color: white;
            padding-top: 1rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            line-height: 1rem;
        }

        .contact-item img {
            height: 2rem;
            width: 2rem;
            margin-right: 10px;
            display: inline-block;
        }

        .contact-text {
            display: inline-block;
            font-size: 14px;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .contact-text strong {
            margin-right: 10px;
        }

        .contact-text a {
            text-decoration: none;
            color: #333;
        }

        ul.no-bullets {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .name-container {
            text-align: left;
            font-family: Arial, sans-serif;
            position: absolute;
            top: 20%;
            left: 19rem;
            width: 18rem;
            text-align: left;
        }

        .first-name {
            font-size: 4rem; /* Adjust size as needed */
            font-weight: bold;
            color: #3b5ba9; /* Blue color */
            text-transform: uppercase; /* Ensure the text is uppercase */
        }

        .last-name {
            font-size: 2.5rem; /* Adjust size as needed */
            font-weight: normal;
            color: #333333; /* Black or dark grey */
            text-transform: uppercase;
            font-weight: 700;
        }

        .nameSeparator{
            position: absolute;
            top: 60%;
            left: 19rem;
            z-index: 4;
            width: 4rem;
            padding-top: 1rem;
            border-bottom: 1px solid #888;
            border-width: 0.35rem;
            border-color: #3b5ba9;
        }

        .identificationDetails{
            text-align: left;
            font-family: Arial, sans-serif;
            position: absolute;
            top: 75%;
            left: 19rem;
            width: 18rem;
            text-align: left;
        }

        .identificationDetails span{
            color: #565656;
            font-weight: 400;
        }

    </style>
</head>

<body>
    <div class="black-bar"></div>
    <div style="padding-left: 4rem; padding-bottom: 2rem;">
        <div class="logo-container">
            <img class="logo-image" src="{{ public_path('storage/Logo-Neurony-White.png') }}"
                alt="Neurony Solutions Logo">
            <img class="logo-background" src="{{ public_path('storage/logoBackgroud.jpg') }}" alt="logo background">
            <div class="name-container">
                <span class="first-name">{{ $firstName }}</span><br>
               @if ( $showFullName == "True")
               <span class="last-name">{{ $lastName }}</span>
               @endif
            </div>
            <a class="nameSeparator"></a>
            <div class="identificationDetails">
                <span >{{ $position }}</span><br>
                <span >Code: {{ $code }}</span>
            </div>
            <div class="contact-info">
                @if ($phone != "N/A")
                    <div class="contact-item">
                        <img src="{{ public_path('storage/phone.png') }}"  style="width: 1.8rem; height: 1.8rem;" alt="Phone Icon">
                        <span class="contact-text">
                            <ul class="no-bullets">
                                <li><strong>Phone:</strong></li>
                                <li><a>{{ $phone ?? ""}}</a></li>
                            </ul>
                        </span>
                    </div>
                @endif
                @if ($email != "N")
                    <div class="contact-item">
                        <img src="{{ public_path('storage/mail.png') }}" style="width: 1.8rem; height: 1.8rem;"  alt="Email Icon">
                        <span class="contact-text">
                            <ul class="no-bullets">
                                <li><strong>Email:</strong></li>
                                <a>{{ $email ?? ""}}</a>
                            </ul>
                        </span>
                    </div>
                @endif
                <div class="contact-item">
                    <img src="{{ public_path('storage/location.png') }}" style="width: 1.8rem; height: 1.8rem;"  alt="Location Icon">
                    <span class="contact-text">
                        <ul class="no-bullets">
                            <li><strong>Address:</strong></li>
                            <li><a>123 Main Street, City, Country</a></li>
                        </ul>
                    </span>
                </div>
                <div class="contact-item">
                    <img src="{{ public_path('storage/linkdin.png') }}"style="width: 1.8rem; height: 1.8rem;"   alt="LinkedIn Icon">
                    <span class="contact-text">
                        <ul class="no-bullets">
                            <li><strong>LinkedIn:</strong></li>
                            <li><a href="#">linkedin.com/in/your-profile</a></li>
                        </ul>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
