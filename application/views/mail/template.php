<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body,
        p,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'DM Sans', sans-serif !important;
        }

        .wrapper {
            padding: 15px;
        }

        .mail-body {
            max-width: 800px;
            margin: 15px auto;
        }

        .inner-body {
            padding: 30px 40px;
            background-color: #fff;
            border-radius: 5px
        }

        .mail-content p {
            font-size: 1rem;
            text-align: left;
            font-weight: 400;
            line-height: 1.3rem;
            margin: 0px 0px 10px 0px;
        }

        .mail-content .btn {
            display: inline-block;
            -webkit-text-size-adjust: none;
            text-decoration: none;
            text-align: center;
            background-color: #2b2ecf;
            border-radius: 5px;
            padding: 0px 40px;
            line-height: 40px;
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 500;
            border: none;
        }

        @media (max-width: 600px) {
            .mail-title {
                font-size: 1.4rem;
            }

            .inner-body {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="mail-body">
            {BODY}
        </div>
    </div>
</body>

</html>