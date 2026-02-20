<?php 

        if(empty($usuarios)) {
            echo "<p>Nenhum usuário encontrado!</p>";
            echo "<a href='View/usuarios/cadastrar.php'>Cadastrar</a>";
            return;
        }

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><td><a href='View/usuarios/cadastrar.php'>Cadastrar</a></td></tr>";
        echo "<tr><th>ID</th><th>Nome</th><th>Grupo</th><th>Continente</th><th>Ações</th></tr>";
    

    foreach ($usuarios as $usuario) {
        $id = $usuario['id'];
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$usuario['nome']}</td>";
        echo "<td>{$usuario['idade']}</td>";
        echo "<td>{$usuario['selecao']}</td>";
        echo "<td>{$usuario['cargo']}</td>";
        echo "<td>
        
                <a href='View/usuarios/editar.php?id={$id}'>Editar</a> | 
                <a href='View/usuarios/deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir este usuário?')\">Deletar</a> | 
                
              </td>";
        echo "</tr>";
    }
    echo "</table>";
    
?>