<!DOCTYPE html>
<html lang="en">
    <?php include 'header.html'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirements Questionnaire</title>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            text-align: center;
        }

        .title {
            font-size: 2em;
            margin-bottom: 10px;
            color: #333;
        }

        .subtitle {
            font-size: 1.2em;
            margin-bottom: 20px;
            color: #666;
        }

        .button-group {
            margin-bottom: 20px;
        }

        .option-button {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 10px auto;
            padding: 10px;
            background-color: #6c757d;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .option-button:hover {
            background-color: #5a6268;
        }

        .return-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c757d;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .return-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <h1 class="title">Requirements Questionnaire</h1>
    <p class="subtitle">What do you plan to use your computer for?</p>
    <div class="button-group">
        <button class="option-button">Gaming</button>
        <button class="option-button">Office Use (Work, etc.)</button>
        <button class="option-button">Computer Intensive Work (3D Design apps, etc.)</button>
    </div>
    <button class="return-button">RETURN TO HOME</button>
</body>
</html>
