<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <style>
        /* Ensure box-sizing includes padding and borders */
        * {
            box-sizing: border-box;
        }

        /* Full page height and no margin/padding */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Container styles */
        .container {
            width: 100%;
            height: 100%;
        }

        /* Left panel styles */
        .leftPanel {
            width: 23%;
            /* Left panel takes 30% of the width */
            padding: 20px;
            color: #484444;
            float: right;
            /* Float the left panel to the left */
            display: block;
            border-left: 2px solid #8e8e8e;

        }

        /* Right panel styles */
        .rightPanel {
            width: 70%;
            /* Right panel takes the remaining 70% */
            padding: 5rem;
            float: left;
            /* Float the right panel to the left */
            display: block;
        }

        .container::after {
            content: "";
            display: table;
            clear: both;
        }

        h1 {
            font-size: 2em;
            margin-top: 0.2cm;
            margin-bottom: 0.2cm;
            text-transform: uppercase;
            font-weight: bold;
        }

        h2 {
            font-size: 1.5em;
            margin-bottom: 0.5cm;
        }

        h3 {
            font-size: 1.2em;
            font-weight: lighter;
        }

        .item {
            padding-bottom: 7px;
            padding-top: 7px;
        }

        .bottomLineSeparator {
            border-bottom: 2px solid white;
            width: 100%;
            margin-bottom: 15px;
        }

        .details {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .smallText {
            font-size: 0.9em;
            text-align: justify;
        }

        .bolded {
            font-weight: bold;
        }

        .workExperience {
            margin-bottom: 3rem;
        }

        .workExperience>ul {
            list-style-type: none;
            padding-left: 0;
        }

        .workExperience>ul>li {
            position: relative;
            margin: 0;
            padding-bottom: 0.5cm;
            padding-left: 0.5cm;
        }

        .workExperience>ul>li:before {
            background-color: #b8abab;
            width: 0.05cm;
            content: '';
            position: absolute;
            top: 0.1cm;
            bottom: -0.2cm;
            left: 0.05cm;
        }

        .workExperience>ul>li::after {
            content: '';
            position: absolute;
            border:1.5px solid #484444;
            width: 0.35cm;
            height: 0.35cm;
            left: -0.4rem;
            top: 0;
            border-radius: 50%;
            background-color: white;
        }

        .competences>ul {
            list-style-type: none;
            padding-left: 0;
        }

        .competences>ul>li {
            position: relative;
            margin: 0;
            padding-bottom: 0.5cm;
            padding-left: 0.5cm;
        }



        .competences>ul>li::after {
            content: '';
            position: absolute;
            background-color: #484444;
            width: 0.35cm;
            height: 0.35cm;
            left: -0.09cm;
            top: 0;
            border-radius: 50%;
        }

        .contact-info p {
            margin: 5px 0;
        }

        .contact-info a {
            color: #bebebe;
            text-decoration: none;
        }

        .aboutText{
            font-size: 0.9em;
            text-align: justify;
            border-left: 1px solid #888;
            border-width: 0.35rem;
            border-color: #3b5ba9;
            padding-left: 1rem;
        }

        .lines{
            display: flex;
            position: absolute;
            z-index:0;
            width: 100%;
            opacity: 0.09;
        }
    </style>
</head>
<body>
    <page size="A4">
        <div class="container">
            <div class="leftPanel">
                <div class="details">
                    <div class="item">
                        <h2 style="padding-left:2rem">EDUCATION</h2>
                        <div class="smallText">
                            <ul style="list-style-type: none;">
                                @foreach($education as $edu)
                                    <li>
                                        <a
                                            style="color:cornflowerblue; page-break-inside: avoid; padding-top:1rem ; font-weight:700">
                                            {{trim($edu[0]) }}
                                        </a>
                                        <a style="white-space: pre-wrap; page-break-inside: avoid; font-weight:700">
                                            {{trim($edu[1]) }}
                                        </a>
                                        <a
                                            style=" color: #8e8e8e;white-space: pre-wrap; page-break-inside: avoid; font-weight:700">
                                            {{trim($edu[2]) }}
                                        </a>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <div class="item bottomLineSeparator">
                        <h2 style="padding-left:2rem">SKILLS</h2>
                        <div class="smallText">
                            <ul style="list-style-type: none;">
                                @foreach($skills as $skill)
                                    <li>
                                        <p style="page-break-inside: avoid; font-weight:700; color:#888">{{trim($skill) }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="item bottomLineSeparator">
                        <h2 style="padding-left:2rem">LANGUAGES</h2>
                        <div class="smallText">
                            <ul style="list-style-type: none;">
                                @foreach($languages as $language)
                                    <li>
                                        <p style="page-break-inside: avoid; font-weight:700; color: #888;">{{trim($language) }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <img class="lines" src="{{ public_path('storage/bgLines.png') }}"
            alt="linesOrnament">
            <!-- Right Panel -->
            <div class="rightPanel">
                <div class="item">
                    <h2>ABOUT THE CANDIDATE</h2>
                    <div class="aboutText">
                        <p style="color:#8e8e8e; font-weight:600">{{ $description }}</p>
                    </div>
                </div>

                <div class="workExperience">
                    <h2>Experience</h2>
                    <ul>
                        @foreach($experience as $job)
                            <li>
                                <div class="jobPosition">
                                    <span style="color:cornflowerblue; font-weight:700">{{ $job[0] }}</span>
                                    <p class="bolded">{{ $job[1] }}</p>
                                    <p style="color:#8e8e8e; font-weight:700">{{ $job[2] }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </page>

</body>

</html>
