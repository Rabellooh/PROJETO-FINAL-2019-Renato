<?php
    function titulo(){
        return 'Precisamos de mais algumas informações';
    }
    function corpo(){
        $mat = 5;
        return <<<EOL
        <div>
            <table>
                <tr>
                    <th>Aluno</th>
                    <th>Matricula</th>
                    <th>Situacao</th>
                </tr>
                <tr>
                    <td>xxxxx xx xxxxxx</td>
                    <td>12345678</td>
                    <td>yyyyy yy yyyyy</td>
                    <td><a href="./painel?id={$mat}" id="edit">selecionar</a></td>
                </tr>
            </table> 
        </div>
EOL;
    }
    require 'default.php';
?>