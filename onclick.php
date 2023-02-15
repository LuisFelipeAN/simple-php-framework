<!DOCTYPE html>
<html>

<head>
    <title>
        How to call PHP function
        on the click of a Button ?
    </title>
</head>

<body style="text-align:center;">

    <h1 style="color:green;">
        Teste
    </h1>

    <h4>
        How to call PHP function
        on the click of a Button ?
    </h4>

    <?php
        function getCont(){
        		$file = fopen('cont.txt','r');
        		$cont = fgets($file);
        		fclose($file);
        		return $cont;
        }

        function updateCont(int $cont){
          $file = fopen('cont.txt','w');
          fwrite($file,$cont);
          fclose($file);
        }

        if(isset($_POST['button1'])) {
          	$cont=getCont()+1;
            echo "This is Button1 that is selected ".$cont;
            updateCont($cont);
        }
        if(isset($_POST['button2'])) {
            $cont=getCont()+1;
            echo "This is Button2 that is selected ".$cont;
            updateCont($cont);
        }
        if(isset($_POST['zerar'])){
            echo "This is Button2 that is selected 0";
            updateCont(0);
        }

    ?>

    <form method="post">
        <input type="submit" name="button1"
                value="Button1"/>

        <input type="submit" name="button2"
                value="Button2"/>
        <input type="submit" name="zerar"
                value="Zerar"/>
                
        <?php
            for($i=0;$i<10;$i++){
                echo "<p>teste ".$i."</p>";
            }
        ?>

    </form>
</head>

</html>
