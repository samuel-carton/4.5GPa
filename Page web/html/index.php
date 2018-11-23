<!DOCTYPE html>
<html dir="ltr" lang="fr-FR">
    <head>
        <meta charset="utf-8"/>
        <title>Survey</title>

        <link rel="icon" type="image/png" href="picture/logoMini.png" />
    </head> 
    <body>
        <h1>Presentation of the questionnaire</h1>

        With the support of ADEME, the Ministry of Ecology, Energy and the Sea and the Ministry of Economy and Finance, the association AGIT (Alliance for Green IT) and the eco-organizations of the recycling network of Waste Electrical and Electronic Equipment (WEEE) organize a survey to assess the deposits of computer and office equipment present in companies and more generally on the maturity of companies in France in the use of eco-responsible digital services.
        The duration of the questionnaire is estimated at 15 minutes if you are able to answer questions directly.
        You can return at any time on the questionnaire, answer in several times, your previous answers are recorded. In case of modification, only the last answer will be taken into account.
        You can submit this questionnaire to several people in your organization. All you have to do is simply share the link to the questionnaire.
        Thank you for participating in this survey. Your answer is invaluable to us to constitute the most representative sample of the companies in France.

        <h1>Questionnaire</h1>
        <?php
        if(isset($_GET['id']))
        {
            echo "test";
                
            $line = file($_GET['id'].'.csv');
            $ar=array();
            foreach($line as $lineNumber=> $lineContent)
            {   
                $values = explode(",",$lineContent);
                if(isset($values[1]))
                {
                $ar[]=$values;
                }
            }
            foreach($ar as $ard)
            {
               print_r(array_values($ard));
               echo '<br/>';
            }

        }
        else
        {
            include 'Form.php';
        } 
        ?> 



    </body> 

</html>
<script>
    
     var resultTable = <?php echo $ar; ?>                        //[[4,"yes"],[6,"yes"]];

    for(var a = 0;a < resultTable.length; a++){
        var t = resultTable[a];
        var e = document.getElementsByName(t[0]);
        for(var b = 1; b < e.length ; b++){
            var ElementId = String(t[0])+"."+String(b);
            var h = document.getElementById(ElementId);
            if (h.value == t[1]){
                if(h.type == "radio" || h.type == "checkbox"){
                    document.getElementById(ElementId).disabled = false;
                    document.getElementById(ElementId).checked = true;
                }
            }
        }

    }
    
    /*----------------------*/
    
    var primaryQuestion = [4.1,12.2,13.2,39.1,62.1];
    var questionTable = [  [5.1,6.1,6.2,6.3,7.1,7.2,7.3,8.1,8.2,8.3,9.1,9.2,9.3,10.1,10.2,10.3,11.1,11.2,11.3,11.4],
                         [13.1,13.2],            [14.1,14.2,14.3,15.1,15.2,15.3,16.1,16.2,16.3,16.4,17.1,17.2,17.3,17.4,18.1,18.2,18.3,19.1,19.2,19.3,20.1,20.2,20.3,21.1,21.2,21.3,22.1,22.2,22.3,23.1,23.2,23.3,24.1,24.2,24.3,25.1,25.2,25.3,26.1,26.2,26.3,27.1,27.2,27.3,28.1,28.2,28.3,29.1,29.2,29.3,30.1,30.2,30.3],
                         [40.1,41.1,42.1,42.2,42.3,42.4,43.1,43.2,43.3,43.4,44.1,44.2,44.3,45.1,45.2,45.3,46.1,46.2,46.3,47.1,47.2,47.3,47.4,48.1,48.2,48.3,49.1,49.2,49.3],
                         [64.1,64.2,64.3,65.1,65.2,65.3,66.1,66.2,66.3,67.1,67.2,67.3,68.1,68.2,68.3,69.1,69.2,69.3]];
    var listenerTable=[];
    for(var i = 0; i < primaryQuestion.length; i++){
        listenerTable.push(document.getElementById(primaryQuestion[i]));
        listenerTable[i].addEventListener("change",function(){
            i=0;
            while(i<primaryQuestion.length){
                if(primaryQuestion[i]== this.id){
                    break;
                }
                i++;
            }
            enabler(primaryQuestion[i],questionTable[i])
        });
    }
    function enabler(elementId,tableResponses){
        for(var i = 0; i < tableResponses.length; i++){
            document.getElementById(String(tableResponses[i])).disabled = false;//!this.checked;
        }
    }
	var r_primaryQuestion = [4.2,12.1,13.1,39.1,62.2];
	var r_questionTable = [ [5.1,6.1,6.2,6.3,7.1,7.2,7.3,8.1,8.2,8.3,9.1,9.2,9.3,10.1,10.2,10.3,11.1,11.2,11.3,11.4],
							[13.1,13.2,14.1,14.2,14.3,15.1,15.2,15.3,16.1,16.2,16.3,16.4,17.1,17.2,17.3,17.4,18.1,18.2,18.3,19.1,19.2,19.3,20.1,20.2,20.3,21.1,21.2,21.3,22.1,22.2,22.3,23.1,
							 23.2,23.3,24.1,24.2,24.3,25.1,25.2,25.3,26.1,26.2,26.3,27.1,27.2,27.3,28.1,28.2,28.3,29.1,29.2,29.3,30.1,30.2,30.3,31.1,31.2,31.3,32.1,32.2,32.3,33.1,33.2,33.3,
							 34.1,34.2,34.3,35.1,35.2,35.3,36.1,36.2,36.3,37.1,37.2,37.3,38.1,38.2,38.3,39.1,39.2,39.3],
							[14.1,14.2,14.3,15.1,15.2,15.3,16.1,16.2,16.3,16.4,17.1,17.2,17.3,17.4,18.1,18.2,18.3,19.1,19.2,19.3,20.1,20.2,20.3,21.1,21.2,21.3,22.1,22.2,22.3,23.1,
							 23.2,23.3,24.1,24.2,24.3,25.1,25.2,25.3,26.1,26.2,26.3,27.1,27.2,27.3,28.1,28.2,28.3,29.1,29.2,29.3,30.1,30.2,30.3],
							[40.1,41.1,42.1,42.2,42.3,42.4,43.1,43.2,43.3,43.4,44.1,44.2,44.3,45.1,45.2,45.3,46.1,46.2,46.3,47.1,47.2,47.3,47.4,48.1,48.2,48.3,49.1,49.2,49.3],
							[64.1,64.2,64.3,65.1,65.2,65.3,66.1,66.2,66.3,67.1,67.2,67.3,68.1,68.2,68.3,69.1,69.2,69.3]];
	r_listenerTable=[]
	for(var i = 0; i < r_primaryQuestion.length; i++){
        r_listenerTable.push(document.getElementById(r_primaryQuestion[i]));//ajoute elem fin tableau et retourne nvelle taille listenerTable
        r_listenerTable[i].addEventListener("change",function(){
            i=0;
            while(i<primaryQuestion.length){//while sert à vérifier la validité de i
                if(r_primaryQuestion[i]== this.id){ //role this.id id de eventListener
                    break;//sortie du while
                }
                i++;
            }
            //r_enabler(r_primaryQuestion[i],questionTable[i]); //cause problèmes : appel for (enabler) puis directement for (r_enabler)
        });
    }
	
	function r_enabler(elementId,tableResponses){
		for (var i = 0; i < tableResponses.length; i++){
			document.getElementById(String(tableResponses[i])).disabled = true;
		}
	}
	
	//activation champs de texte 70/72/87
	var a = document.getElementById("70.1");
	a.addEventListener("change", function(){
		document.getElementById("70.2").disabled=false;
	});
	var b = document.getElementById("87.5");
	b.addEventListener("change", function(){
		document.getElementById("87.6").disabled=false;
	});
	var c = document.getElementById("72.1");
	c.addEventListener("change", function(){
		document.getElementById("72.2").disabled=false;
	});
	var g = document.getElementById("15.3");
	g.addEventListener("change", function(){
		document.getElementById("15.4").disabled=false;
	});
	//vider et desactiver champs de texte 70/72/87
	var d =document.getElementById("70.3");
	d.addEventListener("change", function(){
		document.getElementById("70.2").value = null;
		document.getElementById("70.2").disabled = true;
	});
	var e =document.getElementById("87.7");
	e.addEventListener("change", function(){
		document.getElementById("87.6").value = null;
		document.getElementById("87.6").disabled = true;
	});
	var f =document.getElementById("72.3");
	f.addEventListener("change", function(){
		document.getElementById("72.2").value = null;
		document.getElementById("72.2").disabled = true;
	});
	var h =document.getElementById("15.1");
	f.addEventListener("change", function(){
		document.getElementById("15.4").value = null;
		document.getElementById("15.4").disabled = true;
	});
	var l =document.getElementById("15.2");
	l.addEventListener("change", function(){
		document.getElementById("15.4").value = null;
		document.getElementById("15.4").disabled = true;
	});
</script>
<?php 
if(isset($_POST['save']))
{
    $num=uniqid();
    $file = fopen($num.".csv","w");
    fputcsv($file,array('Question','Reponse'));
    fwrite($file,"\n");

    for($i=1; $i<=88; $i++)
    {
        if(isset($_POST[$i])){
            if(($i>=51 && $i<=61) || ($i>=64 && $i<=69) ||$i==86||$i==87)
            {
                if(!empty($_POST[$i]."[]"))
                {
                    foreach($_POST[$i] as $selected)
                    {
                        fputcsv($file,array($i,$selected));
                        fwrite($file,"\n");
                    }
                }
            }
            else {
                if( substr($_POST[$i],0,3) === $i."_") 
                {
                    fputcsv($file,array( $_POST[$i],$_POST[$_POST[$i]]));
                    fwrite($file,"\n");
                }
                else{
                    fputcsv($file,array($i,$_POST[$i]));
                    fwrite($file,"\n");
                } 
            }
        }
        }
        fclose($file);
        }
        echo "51.75.249.195/?id=".$num;
?>

<style>
    html {
        font-family: helvetica;
        line-height: 1.15;
        color : #595959;
    }

    body{
        width: 80%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    .form-control {

        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .form-control::-ms-expand {
        background-color: transparent;
        border: 0;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    } 

    .infrastructure {
        border-style : solid;
        border-color : #0c5984;
        border-width : 2px;
    }

    .datacenter {
        border-style : solid;
        border-color : #2c87c1;
        border-width : 2px;
    }

    .impression {
        border-style : solid;
        border-color : #efc22e;
        border-width : 2px;
    }

    .fin_de_vie {
        border-style : solid;
        border-color : #f05847;
        border-width : 2px;
    }

    .achats {
        border-style : solid;
        border-color : #00bdd3;
        border-width : 2px;
    }

    .gouvernance {
        border-style : solid;
        border-color : #8d61a9;
        border-width : 2px;
    }

    .poste_de_travail {
        border-style : solid;
        border-color : #e6822e;
        border-width : 2px;
    }

    .application {
        border-style : solid;
        border-color : #e75995;
        border-width : 2px;
    }
    datacenter (14 to 43)
    impression (74 to 82)
    fin de vie (70 to 73)
    achats (83 to 88)
    gouvernance (44 to 49)
    poste de travail (50 to 69)
    application (6, 7, 8, 9, 10,)

    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }
    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }
    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }
    .table .table {
        background-color: #fff;
    }
</style>
