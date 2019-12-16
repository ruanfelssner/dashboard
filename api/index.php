<?php

include("config.php");

if($acao == "contas"){
    $sql = "SELECT * FROM contas ORDER BY vencimento DESC";
}elseif($acao == "portfolio"){    
    $sql = "SELECT * FROM portfolio ORDER BY id DESC";
}elseif($acao == "agenda"){    
    $sql = "SELECT * FROM agenda ORDER BY data DESC";
}elseif($acao == "rendas"){    
    $sql = "SELECT * FROM rendas ORDER BY data DESC";
}else{    
    $sql = "Nada a declarar";
}

$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data = $row;
    }
} else {
    echo "Verifique o IF não está bom!";
}
echo json_encode($data);
$conn->close();

?>