<div class="table-rep-plugin">
    <div class="table-responsive mb-0" data-pattern="priority-columns">
        <table id="tech-companies-1" class="table  table-striped">
            <thead>
            <tr>
                <th style="width: 89%">Categoria</th>
                <th style="width: 5%">Ordem</th>
                <th style="width: 2%"></th>
                <th style="width: 2%"></th>
                <th style="width: 2%"></th>

            </tr>
            </thead>
            <tbody>
            <?php
            require("connections/conn.php");
            $sql = "select * FROM categorias";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>$row[categoria]</td>";
                echo "<td>$row[ordem]</td>";
                echo "<td><a href='categorias_imagem.php?id=$row[id]'><button type='button' class='btn btn-info'>Imagem</button></a></td>";
                echo "<td><a href='categorias_editar.php?id=$row[id]'><button type='button' class='btn btn-warning'>Editar</button></a></td>";
                echo "<td><a href='functions/categorias_excluir.php?id=$row[id]'><button type='button' class='btn btn-danger'>Excluir</button></a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>