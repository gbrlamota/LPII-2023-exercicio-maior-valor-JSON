<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        
        <?php

            function maior($vetor){
                $maior = $vetor[0];
                foreach($vetor as $numero){
                    if ($numero > $maior){
                        $maior = $numero;
                    }
                }
                return $maior;
            }

            $nomeArquivo = "arquivo.json";

            //Pergunta primeiro se o arquivo existe.
            if (!file_exists($nomeArquivo)){
                echo "O array está vazio!";
            }else{
                //Recupera o arquivo JSON que foi salvo no servidor e faz o decode
                $arquivo = file_get_contents($nomeArquivo);  
                $numeros = json_decode($arquivo);
                echo "O maior número é ";
                echo maior($numeros);
            }

            
            ?>

        <form action="index.php">
            <input type="submit" value="Voltar">
        </form>

    </body>
</html>