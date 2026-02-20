<?php 

        if(empty($selecoes)) {
            echo "<p>Nenhuma seleção encontrada!</p>";
            echo "<a href='View/selecoes/cadastrar.php'>Cadastrar</a>";
            return;
        }

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><td><a href='View/selecoes/cadastrar.php'>Cadastrar</a></td></tr>";
        echo "<tr><th>ID</th><th>Nome</th><th>Grupo</th><th>Continente</th><th>Ações</th></tr>";
    

    foreach ($selecoes as $selecao) {
        $id = $selecao['id'];
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$selecao['nome']}</td>";
        echo "<td>{$selecao['grupo']}</td>";
        echo "<td>{$selecao['continente']}</td>";
        echo "<td>
        
                <a href='View/selecoes/editar.php?id={$id}'>Editar</a> | 
                <a href='View/selecoes/deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir esta seleção?')\">Deletar</a> | 
                
              </td>";
        echo "</tr>";
    }
    echo "</table>";
    
?>