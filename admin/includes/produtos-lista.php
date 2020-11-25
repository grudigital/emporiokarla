<div class="table-rep-plugin">
    <div class="table-responsive mb-0" data-pattern="priority-columns">
        <table id="tech-companies-1" class="table  table-striped">
            <thead>
            <tr>
                <th style="width: 36%">Título</th>
                <th style="width: 15%">Loja 1</th>
                <th style="width: 15%">Loja 2</th>
                <th style="width: 15%">Loja 3</th>
                <th style="width: 15%">Loja 4</th>
                <th style="width: 2%"></th>
                <th style="width: 2%"></th>

            </tr>
            </thead>
            <tbody>
            <?php
            require("connections/conn.php");
            $sql = "select i.id iid, i.titulo ititulo, i.categoria icategoria, i.preco ipreco, i.loja1 iloja1,i.loja2 iloja2,i.loja3 iloja3,i.loja4 iloja4, c.id cid, c.categoria ccategoria from itens as i inner join categorias as c on i.categoria = c.id";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>$row[ititulo]</td>";

                //loja 1
                if($row['iloja1'] == 1){
                    echo "<td><a href='functions/produtos_loja1_status1.php?id=$row[iid]'><button style='font-size: 12px' type='button' class='btn btn-success'>Disponível</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja1_status2.php?id=$row[iid]'><button style='font-size: 12px' type='button' class='btn btn-danger'>Não disponível</button></a></td>";
                }

                //loja 2
                if($row['iloja2'] == 1){
                    echo "<td><a href='functions/produtos_loja2_status1.php?id=$row[iid]'><button style='font-size: 12px' type='button' class='btn btn-success'>Disponível</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja2_status2.php?id=$row[iid]'><button style='font-size: 12px' type='button' class='btn btn-danger'>Não disponível</button></a></td>";
                }

                //loja 3
                if($row['iloja3'] == 1){
                    echo "<td><a href='functions/produtos_loja3_status1.php?id=$row[iid]'><button style='font-size: 12px' type='button' class='btn btn-success'>Disponível</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja3_status2.php?id=$row[iid]'><button style='font-size: 12px' type='button' class='btn btn-danger'>Não disponível</button></a></td>";
                }

                //loja 4
                if($row['iloja4'] == 1){
                    echo "<td><a href='functions/produtos_loja4_status1.php?id=$row[iid]'><button style='font-size: 12px' type='button' class='btn btn-success'>Disponível</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja4_status2.php?id=$row[iid]'><button style='font-size: 12px' type='button' class='btn btn-danger'>Não disponível</button></a></td>";
                }








                echo "<td><a href='produtos_editar.php?id=$row[iid]'><button type='button' class='btn btn-warning'>Editar</button></a></td>";
                echo "<td><a href='functions/produtos_excluir.php?id=$row[iid]'><button type='button' class='btn btn-danger'>Excluir</button></a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>