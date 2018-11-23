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
                /*    $row = 1;
            if(($handle=fopen("5bf73e8f1cfda.csv","r"))!==FALSE):
              WHILE(($data=fgetcsv($handle))!==FALSE):
               $i =count($data);
            echo "<br/><hr/><p>$i champs à la ligne $row:</p>";
             $row++;      
            for($c=0;$c<$i;$c++):
            echo $data."|";
            endfor;
           endwhile;
             fclose($handle);
           endif; */
                    
          $line = file('5bf7558ba7769.csv');
            foreach($line as $lineNumber=> $lineContent)
            {
                echo $lineContent; 
                echo "<br/>";
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
    var primaryQuestion = [4.1,12.2,13.2,39.1,62.1];
    var questionTable = [  [5.1,6.1,6.2,6.3,7.1,7.2,7.3,8.1,8.2,8.3,9.1,9.2,9.3,10.1,10.2,10.3,11.1,11.2,11.3,11.4],
                         [13.1,13.2],            [14.1,14.2,14.3,15.1,15.2,15.3,16.1,16.2,16.3,16.4,17.1,17.2,17.3,17.4,18.1,18.2,18.3,19.1,19.2,19.3,20.1,20.2,20.3,21.1,21.2,21.3,22.1,22.2,22.3,23.1,23.2,23.3,24.1,24.2,24.3,25.1,25.2,25.3,26.1,26.2,26.3,27.1,27.2,27.3,28.1,28.2,28.3,29.1,29.2,29.3,30.1,30.2,30.3],
                         [40.1,41.1,42.1,42.2,42.3,42.4,43.1,43.2,43.3,43.4,44.1,44.2,44.3,45.1,45.2,45.3,46.1,46.2,46.3,47.1,47.2,47.3,47.4,48.1,48.2,48.3,49.1,49.2,49.3],
                         [64.1,64.2,64.3,65.1,65.2,65.3,66.1,66.2,66.3,67.1,67.2,67.3,68.1,68.2,68.3,69.1,69.2,69.3]];
    var listenerTable=[];
    for(var i = 0; i < primaryQuestion.length; i++){
        listenerTable.push(document.getElementById(primaryQuestion[i]));//ajoute elem fin tableau et retourne nvelle taille listenerTable
        listenerTable[i].addEventListener("change",function(){
            i=0;
            while(i<primaryQuestion.length){//while sert à vérifier la validité de i
                if(primaryQuestion[i]== this.id){ //role this.id id de eventListener
                    break;//sortie du while
                }
                i++;
            }
            //enabler(primaryQuestion[i],questionTable[i]);
			enabler(questionTable[i]);
        });
    }
    //function enabler(elementId,tableResponses){
	function enabler(tableResponses){
        for(var i = 0; i < tableResponses.length; i++){
            document.getElementById(String(tableResponses[i])).disabled = false;//!this.checked;
        }
    }
	//reverse function : passe d'activé à désactivé si chgt de bouton
	for(var i = 0; i < primaryQuestion.length; i++){
        listenerTable.push(document.getElementById(primaryQuestion[i]));//ajoute elem fin tableau et retourne nvelle taille listenerTable
        listenerTable[i].addEventListener("change",function(){
            i=0;
            while(i<primaryQuestion.length){//while sert à vérifier la validité de i
                if(primaryQuestion[i]== this.id){ //role this.id id de eventListener
                    break;//sortie du while
                }
                i++;
            }
            //enabler(primaryQuestion[i],questionTable[i]);
			r_enabler(questionTable[i]);
        });
    }
	
	function r_enabler(tableResponses){
		for (var i = 0; i < tableResponses.length; i++){
			document.getElementById(String(tableResponses[i])).disabled = true;
		}
	}
	
	//activation champs de texte 70/87
	var a = document.getElementById("70.1");
	a.addEventListener("change", function(){
		document.getElementById("70.2").disabled=false;
	});
	var b = document.getElementById("87.5");
	b.addEventListener("change", function(){
		document.getElementById("87.6").disabled=false;
	});
	//vider et desactiver chmaps de texte 70/87
	var c =document.getElementById("70.3");
	c.addEventListener("change", function(){
		document.getElementById("70.2").value = null;
		document.getElementById("70.2").disabled = true;
	});
	var d =document.getElementById("87.7");
	d.addEventListener("change", function(){
		document.getElementById("87.6").value = null;
		document.getElementById("87.6").disabled = true;
	});
</script>
<?php 
if(isset($_POST['save']))
{
    $num=uniqid();
    $file = fopen($num.".csv","w");
    fputcsv($file,array('Question','Reponse'));
    fwrite($file,"\r\n");

    for($i=1; $i<=88; $i++)
    {
        if(($i>=51 && $i<=61) || ($i>=64 && $i<=69) ||$i==86||$i==87)
        {
            if(!empty($_POST[$i]."[]"))
            {
                foreach($_POST[$i] as $selected)
                {
                    fputcsv($file,array($i,$selected));
                    fwrite($file,"\r\n");
                }
            }
        }
        else {
            if( substr($_POST[$i],0,3) === $i."_") 
            {
                fputcsv($file,array( $_POST[$i],$_POST[$_POST[$i]]));
                fwrite($file,"\r\n");
            }
            else{
                fputcsv($file,array($i,$_POST[$i]));
                fwrite($file,"\r\n");
            } 
        }
    }
    fclose($file);
}
echo "51.75.249.195/?id=".$num;
?>

<style>
    html {
  font-family: sans-serif;
  line-height: 1.15;
}

body{
  width: 80%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

.form-control {
  display: block;
  width: 100%;
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
