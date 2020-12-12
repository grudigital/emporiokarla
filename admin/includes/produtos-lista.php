<div class="table-rep-plugin">
    <div class="table-responsive mb-0" data-pattern="priority-columns">
        <table id="tech-companies-1" class="table  table-striped">
            <thead>
            <tr>
                <th style="width: 28%; font-size:11px">Título</th>
                <th style="width: 8%; font-size:11px">Categoria</th>
                <th style="width: 3%; font-size:11px">Ordem</th>
                <th style="width: 7%; font-size:11px">Loja 1</th>
                <th style="width: 7%; font-size:11px">Loja 2</th>
                <th style="width: 7%; font-size:11px">Loja 3</th>
                <th style="width: 7%; font-size:11px">Loja 4</th>
                <th style="width: 7%; font-size:11px">Loja 5</th>
                <th style="width: 7%; font-size:11px">Loja 6</th>
                <th style="width: 7%; font-size:11px">Loja 7</th>
                <th style="width: 7%; font-size:11px">Loja 8</th>
                <th style="width: 7%; font-size:11px">Loja 9</th>
                <th style="width: 7%; font-size:11px">Loja 10</th>
                <th style="width: 2%; font-size:11px"></th>
                <th style="width: 2%; font-size:11px"></th>

            </tr>
            </thead>
            <tbody>
            <?php
            require("connections/conn.php");
            $sql = "select i.id iid, i.ordem iordem, i.titulo ititulo, i.categoria icategoria, i.preco ipreco, i.loja1 iloja1,i.loja2 iloja2,i.loja3 iloja3,i.loja4 iloja4, i.loja5 iloja5, i.loja6 iloja6, i.loja7 iloja7, i.loja8 iloja8, i.loja9 iloja9, i.loja10 iloja10, c.id cid, c.categoria ccategoria from itens as i inner join categorias as c on i.categoria = c.id order by i.categoria asc";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td style='font-size: 11px'>$row[ititulo]</td>";
                echo "<td style='font-size: 11px'>$row[ccategoria]</td>";
                echo "<td style='font-size: 11px'>$row[iordem]</td>";

                //loja 1
                if($row['iloja1'] == 1){
                    echo "<td><a href='functions/produtos_loja1_status1.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-success'>Sim</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja1_status2.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-danger'>Não</button></a></td>";
                }

                //loja 2
                if($row['iloja2'] == 1){
                    echo "<td><a href='functions/produtos_loja2_status1.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-success'>Sim</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja2_status2.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-danger'>Não</button></a></td>";
                }

                //loja 3
                if($row['iloja3'] == 1){
                    echo "<td><a href='functions/produtos_loja3_status1.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-success'>Sim</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja3_status2.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-danger'>Não</button></a></td>";
                }

                //loja 4
                if($row['iloja4'] == 1){
                    echo "<td><a href='functions/produtos_loja4_status1.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-success'>Sim</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja4_status2.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-danger'>Não</button></a></td>";
                }

                //loja 5
                if($row['iloja5'] == 1){
                    echo "<td><a href='functions/produtos_loja5_status1.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-success'>Sim</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja5_status2.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-danger'>Não</button></a></td>";
                }

                //loja 6
                if($row['iloja6'] == 1){
                    echo "<td><a href='functions/produtos_loja6_status1.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-success'>Sim</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja6_status2.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-danger'>Não</button></a></td>";
                }

                //loja 7
                if($row['iloja7'] == 1){
                    echo "<td><a href='functions/produtos_loja7_status1.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-success'>Sim</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja7_status2.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-danger'>Não</button></a></td>";
                }

                //loja 8
                if($row['iloja8'] == 1){
                    echo "<td><a href='functions/produtos_loja8_status1.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-success'>Sim</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja8_status2.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-danger'>Não</button></a></td>";
                }

                //loja 9
                if($row['iloja9'] == 1){
                    echo "<td><a href='functions/produtos_loja9_status1.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-success'>Sim</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja9_status2.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-danger'>Não</button></a></td>";
                }

                //loja 10
                if($row['iloja10'] == 1){
                    echo "<td><a href='functions/produtos_loja10_status1.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-success'>Sim</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/produtos_loja10_status2.php?id=$row[iid]'><button style='font-size: 11px' type='button' class='btn btn-danger'>Não</button></a></td>";
                }








                echo "<td><a href='produtos_editar.php?id=$row[iid]'><button type='button' style='font-size: 11px' class='btn btn-warning'>Editar</button></a></td>";
                echo "<td><a href='functions/produtos_excluir.php?id=$row[iid]'><button type='button' style='font-size: 11px' class='btn btn-danger'>Excluir</button></a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>