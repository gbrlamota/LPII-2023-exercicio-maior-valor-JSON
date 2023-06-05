<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            $numTexto = $_POST["numero"];
            $numInt = intval($numTexto);
            $existe = False;
            $nomeArquivo = "arquivo.json";

            //Pergunta primeiro se o arquivo existe.
            if (file_exists($nomeArquivo)){
                $existe=True;
            }      
            
            if (!$existe){
                //Se não existe, cria um array vazio
                $numeros = array();
            }else{
                //Se existe, pega o conteúdo e decodifica o JSON para um array
                $arquivo = file_get_contents($nomeArquivo);                   
                $numeros = json_decode($arquivo);
            } 
                
            
            //Adiciona o novo numero no array
            array_push($numeros, $numInt);
            //Codifica o array novamente para o formato JSON
            $arquivo = json_encode($numeros);
             
            //Abre o arquivo JSON que está salvo no servidor ou cria um novo caso não exista
            //O parâmetro "w" indica que o conteudo do arquivo será sobrescrito
            //Se fosse "a" daria um append
            $arquivoGravar = fopen($nomeArquivo, "w"); 
            // Escreve o conteúdo JSON no arquivo
            $escreve = fwrite($arquivoGravar, $arquivo); //$escreve pode ser usada para lan;ar um erro de escrita
 
            // Fecha o arquivo
            fclose($arquivoGravar);
        ?>
        <form action="index.php">
            <p>O número <?php echo $numInt ?> foi adicionado com sucesso ao array 
                <?php echo $arquivo ?>!<br>
            <input type="submit" value="Voltar">
        </form>
    </body>
</html>