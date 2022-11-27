<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../includes/kiolvas.js"></script>
    <title>Felsőfokú intézmények</title>
    <style>
        #informaciosdiv {
            width: 80%;
            float: center;
            margin-left: auto;
            margin-right: auto;
        }

        #cim {
            margin-left: auto;
            margin-right: auto;
            max-width: 80%;
            text-align: center;
            padding-bottom: 100px;
        }

        #osvenyinfo {
            float: center;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid black;
            border-radius: 15px;
            box-shadow: 5px 5px 15px grey;
            width: 80%;
        }

        #sel {
            margin-left: auto;
            margin-right: auto;
            width: fit-content;
            height: fit-content;
            padding-bottom: 100px;
        }

        .cimke {
            display: inline-block;
            width: 60px;
            text-align: right;
        }

        span {
            margin: 3px 5px;
        }

        label {
            display: inline-block;
            width: 200px;
            text-align: center;
        }

        select {
            display: inline-block;
            width: 200px;
            text-align: center;
            box-shadow: 5px 5px 15px grey;
        }
    </style>
</head>

<body>
<h1 id="cim">Tanösvények adatai:</h1>
<div id='informaciosdiv'>

    <div id='sel'>
        <label for='orszagcimke'>Nemzei park igazgatóság:</label>
        <br><br>
        <select id='parkselect'></select>
        <br><br>
        <label for='varoscimke'>Város:</label>
        <br><br>
        <select id='varosselect'></select>
        <br><br>
        <label for='varoscimke'>Tanösvény:</label>
        <br><br>
        <select id='utselect'></select>
        <br><br>
    </div>
    <div id='osvenyinfo'>
        <span class="cimke">Név:</span><span id="nev" class="adat"></span><br>
        <span class="cimke">Hossz:</span><span id="hossz" class="adat"></span><br>
        <span class="cimke">Állomás:</span><span id="allomas" class="adat"></span><br>
        <span class="cimke">Idő:</span><span id="ido" class="adat"></span><br>
        <span class="cimke">Vezetés:</span><span id="vezetes" class="adat"></span><br>

    </div>
    <br><br>
</div>


</body>

</html>