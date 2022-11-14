<?php
session_start();
date_default_timezone_set('Europe/Berlin');

$mode = "occupation";

if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}
if(count($_POST) > 0){
    switch ($mode) {


        case 'occupation':
            $service = $_SESSION["service"];
            if(isset($_POST["saveCheckBoxValues"])){
                $servicearr=$_POST["service"];
                $newValues = implode(",", $servicearr);
                $json = serialize($newValues);
                $_SESSION["services"] = $json;
                header("location: pro-signup.php?mode=general-information");
            }
            die;
        break;


        case 'general-information':
            if(isset($_POST["submitBtn"])){
                // require("process-usr_signup.php");  
            }
            die;
        break;


        case 'mobile-number':

            die;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dienstleister werden - Camiri</title>
    <meta name="description" content="Gewinne mehr Kunden über Camiri. Sag uns einfach welchen Tätigkeiten du nachgehst und wir liefern Dir interresierte, lokale Kunden. Erstelle Dir noch heute einen Account!">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Camiri">
    <link rel="canonical" href="https://www.camiri.de/anmelden">
    <link rel="apple-touch-icon" sizes="180x180" href="production-images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="production-images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="production-images/favicon/favicon-16x16.png" sizes="16x16">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" media="all" href="../stylesheets/libary_one.css">
    <link rel="stylesheet" media="all" href="../stylesheets/libary_two-ab.css">
    <script defer src="javascript\globalHeader_abcd.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&display=swap" rel="stylesheet">
    <script>
        window.global = window;
    </script>  
    <!-- Matomo -->
    <script>
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(["setCookieDomain", "*.camiri.de"]);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="//camiri.de/analytics/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
    </script>
    <noscript><p><img src="//camiri.de/analytics/matomo.php?idsite=1&amp;rec=1" style="border:0;" alt="" /></p></noscript>
    <!-- End Matomo Code -->
    <style>
        ._1jbi4FPQ0uNwDmu1h8ovFN{
            position: absolute;
            opacity: 0;
            z-index: -1;
            width: 1px;
            height: 1px;
        }

        ._2Hv1Eu4qNKI6if_VGBqcS-:focus~._3D8QeGgDAHu98pRp4LYPiE {
            box-shadow: 0 0 0 4px #e9eced
        }

        ._3D8QeGgDAHu98pRp4LYPiE {
            width: 20px;
            height: 20px;
            border-radius: 4px;
            border-width: 2px;
            border-style: solid;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none
        }

        ._1jbi4FPQ0uNwDmu1h8ovFN ._3D8QeGgDAHu98pRp4LYPiE {
            margin-top: 1px
        }
    </style>
</head>
    <div id="app-page-root">
        <div class="flex flex-column">
            <div class="flex flex-column min-vh-100" style="--menu-drawer-height:961px;">
                <div></div>
                <?php
                if(isset($_SESSION["usrId"])){
                    require("camiri_includes/globalHeader-li.php");
                } else {
                    require("camiri_includes/globalHeader.php");
                }         
                switch($mode){
                case "occupation":
                ?>
                <!--  -->
                <div class="_1ov4CPClA075hQusJEQQKL">
                    <div class="s_pv5 m_pa6 pv3 flex-grow-1">
                        <div class="mw7 ma-auto">
                            <div class="tbody-4 b">Wähle alle anderen Dienste aus, die du anbieten willst.</div>
                            <p class="_2ZPksqR_Nj9Uo5rqEURuqQ mt2">Du wirst für die ausgewählten Jobs in den Suchergebnissen angezeigt und erhählst Aufträge.</p>
                            <form action="dienstleister-registrierung.php?mode=occupation" method="post" novalidate>
                                <div class="mt3 mb6">
                                    <ul>
                                        <?php 
                                        $needle = $_SESSION["service"];
                                        $handyman = array("Fenster Reparatur","Gerätereparateur","Handwerker","Möbelmontage","Türeneinbau","Geräteinstallation","Garagentor Reparatur","Fenstereinbau","Bilder Aufhängen","Lichtinstallation","Fernseher-Wandmontage","Regalaufbau","Schweres Heben","Klimaanlage einbauen","Anstreicher","Elektroarbeiten");
                                        $cleaner = array("Grundreinigung","Allgemeine Reinigung","Fenster Putzen","Desinfektion","Hilfe mit der Wäsche");
                                        $roofer = array("Dachsanierung & Dachreparatur","Solaranlagen Installation","Dacheindeckung / Dachdecken","Dachreinigung","Dachziegel klammern");
                                        $events = array("Hüpfburg Vermietung","Hochzeits und Eventsdekoration","Veranstaltungsplanung","Hochzeitsplannung","Hochzeitsflorist","Luftballon Dekorationen","Kalligraphie","Hochzeits und Event-Catering","Gastgeschenke","Süßwarenbuffets");
                                        $plumber = array("Reparatur von Sanitärrohren","Ablauf-Reparatur","Wasseraufbereiter Installation / Wartung","Toiletten-Reparatur","Waschbecken & Wasserhahn-Reparatur","Waschbecken & Wasserhahn-Installation","Duschen & Badewannen-Reparatur / Installtion","Notfall Service","Toiletten-Einbau oder Auswechselung","Abwassersystem-Installation / Reparatur","Installation von Gasleitungen","Schmutzwasserpumpe Installation / Wartung");
                                        $electrician = array("Elektroreparatur","Lampen Installation","Lüftereinbau","Lichtschalter & Steckdoseninstallation","Lichtschalter & Steckdosen-Reparatur","Stromgenerator Reparatur");
                                        $landscaper = array("Landnivellierung","Zaun- und Tormontage","Rasenpflege","Landschaftsbau","Baumschnitt und Baumfällung","Reparatur und Wartung von Bewässerungssystemen","Gartenarbeit","Zaun- und Torreparatur","Schneeräumen","Rollrasen-Verlegung","Jäten","Strauch Schnitt und Entfernung","Entfernen von Baumstümpfen","Installation von Sprinkler- und Bewässerungssystemen","Installation von Kunstrasen","Mulchen","Baum-Pflanzung","Erdarbeiten","Rodung",);
                                        $mover = array("lokaler Umzug","Möbeltransport und schweres Heben","Müll-Entsorgung","Ein- und Auspacken","Umzug über große Entfernungen","Möbellieferung","Abbrechdienste");
                                        $beautican = array("Brautstyling","Haarpflege","Gesichtspflege","Hausfrisör","Fußpflege");
                                        $painter = array("Innenanstriche","Außenanstriche","Tapezieren und Reparatur von Tapeten","Terassenanstrich und Versiegelung","Nachbearbeitung und Reparatur von Schränken","Zaunanstrich","Tapeten-Entfernung","Bodenanstrich & Glasur","Farbentfernung");
                                        
                                        $ab = array_search($needle,$handyman);
                                        if($ab !== false){
                                            foreach($handyman as $a){
                                                echo("<li class='bb b-gray-300'><label class='relative flex items-center' style='cursor: pointer; padding: 14px 0px;'><input name='service[]' value='$a' class='_1jbi4FPQ0uNwDmu1h8ovFN' aria-checked='true' data-test='checklist-checkbox-168391220982882773' type='checkbox' id='168391220982882773' name='occupation-checkbox-group' checked=''><div class='_1jbi4FPQ0uNwDmu1h8ovFN'><svg width='18' height='18' viewBox='0 0 18 18' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><rect x='15.232' y='4.003' width='11.701' height='1.879' rx='.939' transform='rotate(123 15.232 4.003)'></rect><rect x='8.83' y='13.822' width='7.337' height='1.879' rx='.939' transform='rotate(-146 8.83 13.822)'></rect><path d='M8.072 13.306l1.03-1.586.787.512-1.03 1.586z'></path></svg></div><span class='vfBEWK0j58g9tnqnGM_bI' style='color: inherit;'><span class=''>$a</span></span></label></li>");
                                            }
                                        }
                                        $bc = array_search($needle,$cleaner);

                                        if($bc !== false){
                                            foreach($cleaner as $b){
                                                echo("<li class='bb b-gray-300'><label class='relative flex items-center' style='cursor: pointer; padding: 14px 0px;'><input name='service[]' value='$b' class='_1jbi4FPQ0uNwDmu1h8ovFN' aria-checked='true' data-test='checklist-checkbox-168391220982882773' type='checkbox' id='168391220982882773' name='occupation-checkbox-group' checked=''><div class='_1jbi4FPQ0uNwDmu1h8ovFN'><svg width='18' height='18' viewBox='0 0 18 18' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><rect x='15.232' y='4.003' width='11.701' height='1.879' rx='.939' transform='rotate(123 15.232 4.003)'></rect><rect x='8.83' y='13.822' width='7.337' height='1.879' rx='.939' transform='rotate(-146 8.83 13.822)'></rect><path d='M8.072 13.306l1.03-1.586.787.512-1.03 1.586z'></path></svg></div><span class='vfBEWK0j58g9tnqnGM_bI' style='color: inherit;'><span class=''>$b</span></span></label></li>");
                                            }
                                        }
                                        $cd = array_search($needle,$roofer);

                                        if($cd !== false){
                                            foreach($roofer as $c){
                                                echo("<li class='bb b-gray-300'><label class='relative flex items-center' style='cursor: pointer; padding: 14px 0px;'><input name='service[]' value='$c' class='_1jbi4FPQ0uNwDmu1h8ovFN' aria-checked='true' data-test='checklist-checkbox-168391220982882773' type='checkbox' id='168391220982882773' name='occupation-checkbox-group' checked=''><div class='_1jbi4FPQ0uNwDmu1h8ovFN'><svg width='18' height='18' viewBox='0 0 18 18' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><rect x='15.232' y='4.003' width='11.701' height='1.879' rx='.939' transform='rotate(123 15.232 4.003)'></rect><rect x='8.83' y='13.822' width='7.337' height='1.879' rx='.939' transform='rotate(-146 8.83 13.822)'></rect><path d='M8.072 13.306l1.03-1.586.787.512-1.03 1.586z'></path></svg></div><span class='vfBEWK0j58g9tnqnGM_bI' style='color: inherit;'><span class=''>$c</span></span></label></li>");
                                            }
                                        }
                                        $de = array_search($needle,$plumber);

                                        if($de !== false){
                                            foreach($plumber as $d){
                                                echo("<li class='bb b-gray-300'><label class='relative flex items-center' style='cursor: pointer; padding: 14px 0px;'><input name='service[]' value='$d' class='_1jbi4FPQ0uNwDmu1h8ovFN' aria-checked='true' data-test='checklist-checkbox-168391220982882773' type='checkbox' id='168391220982882773' name='occupation-checkbox-group' checked=''><div class='_1jbi4FPQ0uNwDmu1h8ovFN'><svg width='18' height='18' viewBox='0 0 18 18' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><rect x='15.232' y='4.003' width='11.701' height='1.879' rx='.939' transform='rotate(123 15.232 4.003)'></rect><rect x='8.83' y='13.822' width='7.337' height='1.879' rx='.939' transform='rotate(-146 8.83 13.822)'></rect><path d='M8.072 13.306l1.03-1.586.787.512-1.03 1.586z'></path></svg></div><span class='vfBEWK0j58g9tnqnGM_bI' style='color: inherit;'><span class=''>$d</span></span></label></li>");
                                            }
                                        }
                                        $ef = array_search($needle,$events);

                                        if($ef !== false){
                                            foreach($events as $e){
                                                echo("<li class='bb b-gray-300'><label class='relative flex items-center' style='cursor: pointer; padding: 14px 0px;'><input name='service[]' value='$e' class='_1jbi4FPQ0uNwDmu1h8ovFN' aria-checked='true' data-test='checklist-checkbox-168391220982882773' type='checkbox' id='168391220982882773' name='occupation-checkbox-group' checked=''><div class='_1jbi4FPQ0uNwDmu1h8ovFN'><svg width='18' height='18' viewBox='0 0 18 18' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><rect x='15.232' y='4.003' width='11.701' height='1.879' rx='.939' transform='rotate(123 15.232 4.003)'></rect><rect x='8.83' y='13.822' width='7.337' height='1.879' rx='.939' transform='rotate(-146 8.83 13.822)'></rect><path d='M8.072 13.306l1.03-1.586.787.512-1.03 1.586z'></path></svg></div><span class='vfBEWK0j58g9tnqnGM_bI' style='color: inherit;'><span class=''>$e</span></span></label></li>");
                                            }
                                        }
                                        $fg = array_search($needle,$electrician);

                                        if($fg !== false){
                                            foreach($electrician as $f){
                                                echo("<li class='bb b-gray-300'><label class='relative flex items-center' style='cursor: pointer; padding: 14px 0px;'><input name='service[]' value='$f' class='_1jbi4FPQ0uNwDmu1h8ovFN' aria-checked='true' data-test='checklist-checkbox-168391220982882773' type='checkbox' id='168391220982882773' name='occupation-checkbox-group' checked=''><div class='_1jbi4FPQ0uNwDmu1h8ovFN'><svg width='18' height='18' viewBox='0 0 18 18' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><rect x='15.232' y='4.003' width='11.701' height='1.879' rx='.939' transform='rotate(123 15.232 4.003)'></rect><rect x='8.83' y='13.822' width='7.337' height='1.879' rx='.939' transform='rotate(-146 8.83 13.822)'></rect><path d='M8.072 13.306l1.03-1.586.787.512-1.03 1.586z'></path></svg></div><span class='vfBEWK0j58g9tnqnGM_bI' style='color: inherit;'><span class=''>$f</span></span></label></li>");
                                            }
                                        }
                                        $gh = array_search($needle,$landscaper);

                                        if($gh !== false){
                                            foreach($landscaper as $g){
                                                echo("<li class='bb b-gray-300'><label class='relative flex items-center' style='cursor: pointer; padding: 14px 0px;'><input name='service[]' value='$g' class='_1jbi4FPQ0uNwDmu1h8ovFN' aria-checked='true' data-test='checklist-checkbox-168391220982882773' type='checkbox' id='168391220982882773' name='occupation-checkbox-group' checked=''><div class='_1jbi4FPQ0uNwDmu1h8ovFN'><svg width='18' height='18' viewBox='0 0 18 18' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><rect x='15.232' y='4.003' width='11.701' height='1.879' rx='.939' transform='rotate(123 15.232 4.003)'></rect><rect x='8.83' y='13.822' width='7.337' height='1.879' rx='.939' transform='rotate(-146 8.83 13.822)'></rect><path d='M8.072 13.306l1.03-1.586.787.512-1.03 1.586z'></path></svg></div><span class='vfBEWK0j58g9tnqnGM_bI' style='color: inherit;'><span class=''>$g</span></span></label></li>");
                                            }
                                        }
                                        $hi = array_search($needle,$mover);

                                        if($hi !== false){
                                            foreach($mover as $h){
                                                echo("<li class='bb b-gray-300'><label class='relative flex items-center' style='cursor: pointer; padding: 14px 0px;'><input name='service[]' value='$h' class='_1jbi4FPQ0uNwDmu1h8ovFN' aria-checked='true' data-test='checklist-checkbox-168391220982882773' type='checkbox' id='168391220982882773' name='occupation-checkbox-group' checked=''><div class='_1jbi4FPQ0uNwDmu1h8ovFN'><svg width='18' height='18' viewBox='0 0 18 18' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><rect x='15.232' y='4.003' width='11.701' height='1.879' rx='.939' transform='rotate(123 15.232 4.003)'></rect><rect x='8.83' y='13.822' width='7.337' height='1.879' rx='.939' transform='rotate(-146 8.83 13.822)'></rect><path d='M8.072 13.306l1.03-1.586.787.512-1.03 1.586z'></path></svg></div><span class='vfBEWK0j58g9tnqnGM_bI' style='color: inherit;'><span class=''>$h</span></span></label></li>");
                                            }
                                        }
                                        $ij = array_search($needle,$beautican);

                                        if($ij !== false){
                                            foreach($beautican as $i){
                                                echo("<li class='bb b-gray-300'><label class='relative flex items-center' style='cursor: pointer; padding: 14px 0px;'><input name='service[]' value='$i' class='_1jbi4FPQ0uNwDmu1h8ovFN' aria-checked='true' data-test='checklist-checkbox-168391220982882773' type='checkbox' id='168391220982882773' name='occupation-checkbox-group' checked=''><div class='_1jbi4FPQ0uNwDmu1h8ovFN'><svg width='18' height='18' viewBox='0 0 18 18' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><rect x='15.232' y='4.003' width='11.701' height='1.879' rx='.939' transform='rotate(123 15.232 4.003)'></rect><rect x='8.83' y='13.822' width='7.337' height='1.879' rx='.939' transform='rotate(-146 8.83 13.822)'></rect><path d='M8.072 13.306l1.03-1.586.787.512-1.03 1.586z'></path></svg></div><span class='vfBEWK0j58g9tnqnGM_bI' style='color: inherit;'><span class=''>$i</span></span></label></li>");
                                            }
                                        }
                                        $jk = array_search($needle,$painter);

                                        if($jk !== false){
                                            foreach($painter as $j){
                                                echo("<li class='bb b-gray-300'><label class='relative flex items-center' style='cursor: pointer; padding: 14px 0px;'><input name='service[]' value='$j' class='_1jbi4FPQ0uNwDmu1h8ovFN' aria-checked='true' data-test='checklist-checkbox-168391220982882773' type='checkbox' id='168391220982882773' name='occupation-checkbox-group' checked=''><div class='_1jbi4FPQ0uNwDmu1h8ovFN'><svg width='18' height='18' viewBox='0 0 18 18' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><rect x='15.232' y='4.003' width='11.701' height='1.879' rx='.939' transform='rotate(123 15.232 4.003)'></rect><rect x='8.83' y='13.822' width='7.337' height='1.879' rx='.939' transform='rotate(-146 8.83 13.822)'></rect><path d='M8.072 13.306l1.03-1.586.787.512-1.03 1.586z'></path></svg></div><span class='vfBEWK0j58g9tnqnGM_bI' style='color: inherit;'><span class=''>$j</span></span></label></li>");
                                            }
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <div class="flex w-100 fixed bottom0 left0 bg-white justify-center bt b-gray">
                                    <div class="flex mw7 justify-center w-100 m_pa1 m_ph3">
                                        <div class="flex w-100" style="min-height:60px">
                                            <div class="flex items-center relative w-100">
                                                <div class="flex justify-center m_top0 m_bottom0 ph3 pv1 w-100 m_flex-1">
                                                    <div class="w-100 mv2"><button id="saveCheckBoxValues" name="saveCheckBoxValues" class="white bg-blue b-blue w-100 br3 ba pa3 w-100" type="submit"><span class="white nowrap b">Weiter</span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--  -->
                <?php
                break;
                case "general-information":
                ?>
                <!--  -->
                <p>this is the next page for username</p>
                <!--  -->
                <?php
                break;
                case "mobile-number":
                ?>
                <!--  -->
                <!--  -->
                <?php
                }
                ?>
            
        </div>
    </div>
    </div>
</body>
