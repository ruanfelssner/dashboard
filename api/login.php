<?php

include("config.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $postdata = json_decode(file_get_contents("php://input"));    
    $email = $postdata->email;
    $result = $conn->query("SELECT * FROM usuarios WHERE email='$email'");
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){            
            $data = array(
                "mensagem" => "Login efetuado com sucesso!", 
                "token" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE0NzA2MDczMDAsImlzcyI6ImRvdWdsYXNwYXNxdWEuY29tIiwiZXhwIjoxNDcwNjEwOTAwLCJuYmYiOjE0NzA2MDcyOTksImRhdGEiOnsiaWQiOjEsIm5hbWUiOiJEb3VnbGFzIFBhc3F1YSJ9fQ.WuT3TRLqUkzOgDdEr1YiQdXhz0OvwMDTzYpeKDDFDAY",
                "login" => true,
                "user" => array(
                    "id" => $row['id'],
                    "nome" => $row['nome'],
                    "email" => $row['email'],
                    "senha" => $row['senha']
                ),
            );
        }
    }else{
        $data = "Nenhum usuario encontrado com esse email";
    }
}else{

    $result = $conn->query("SELECT * FROM usuarios");

    $data = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data = $row;
        }
    } else {
        $data = "Verifique o IF não está bom!";
    }

}

echo json_encode($data);

$conn->close();

?>