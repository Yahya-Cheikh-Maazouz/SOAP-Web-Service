<?php
    $mt=0;
    if(isset($_POST['action'])){
    $action=$_POST['action'];
    if($action=="OK"){
        $mt=$_POST['montant'];
        $client=new SoapClient("http://127.0.0.1:9000/BanqueWS?wsdl");
        $param=new stdClass();
        $param->montant=$mt;
        $rep=$client->__soapCall("ConversionEuroToDh",array($param));
        $res=$rep->return;
    }
    elseif($action=="listComptes"){
        $client=new SoapClient("http://127.0.0.1:9000/BanqueWS?wsdl");
        $res2=$client->__soapCall("getComptes",array());
    }
    }
?>


<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
    <body class="container mt-5 bg-light">
        <form method="post" action="client.php">
            Montant:<input type="text" name="montant" value="<?php echo($mt)?>">
            <input type="submit" value="OK" name="action">
            <input type="submit" value="listComptes" name="action">
        </form>
            Rsultat:
        <?php if (isset($res)){
            echo($res);
        }
        ?>
        <?php if(isset($res2)){?>
            <table class="table table-sm" border="1" >
                <tr>
                <th>CODE</th><th>SOLDE</th>
                </tr>
                <?php foreach($res2->return as $cp) {?>
                <tr>
                <td><?php echo($cp->code)?></td>
                <td><?php echo($cp->solde)?></td>
                </tr>
                <?php }?>
            </table>
        <?php }?>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
</html>