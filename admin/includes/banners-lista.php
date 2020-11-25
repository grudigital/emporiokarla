<div class="table-rep-plugin">
    <div class="table-responsive mb-0" data-pattern="priority-columns">
        <table id="tech-companies-1" class="table  table-striped">
            <thead>
            <tr>
                <th style="width: 74%">Titulo</th>
                <th style="width: 20%">Status</th>
                <th style="width: 2%"></th>
                <th style="width: 2%"></th>
                <th style="width: 2%"></th>

            </tr>
            </thead>
            <tbody>
            <?php
            require("connections/conn.php");
            $sql = "select * from banners";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>$row[titulo]</td>";
                if($row['status'] == 1){
                    echo "<td><a href='functions/banners_status1.php?id=$row[id]'><button type='button' class='btn btn-success'>Publicado</button></a></td>";
                }
                else {
                    echo "<td><a href='functions/banners_status2.php?id=$row[id]'><button type='button' class='btn btn-danger'>Não publicado</button></a></td>";
                }
                echo "<td><a href='banners_editar.php?id=$row[id]'><button type='button' class='btn btn-warning'>Editar</button></a></td>";
                echo "<td><a href='banners_imagem.php?id=$row[id]'><button type='button' class='btn btn-info'>Imagem</button></a></td>";
                echo "<td><a href='functions/banners_excluir.php?id=$row[id]'><button type='button' class='btn btn-danger'>Excluir</button></a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>