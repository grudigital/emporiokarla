<div class="table-rep-plugin">
    <div class="table-responsive mb-0" data-pattern="priority-columns">
        <table id="tech-companies-1" class="table  table-striped">
            <thead>
            <tr>
                <th style="width: 40%">Nome</th>
                <th style="width: 20%">Telefone</th>
                <th style="width: 20%">Data</th>
                <th style="width: 4%">Visualizar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require("connections/conn.php");
            $sql = "select * FROM sugestoes";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>$row[nome]</td>";
                echo "<td>$row[telefone]</td>";
                echo "<td>$row[dataenvio]</td>";
                echo "<td><a href='sugestoes_visualizar.php?id=$row[id]'><button type='button' class='btn btn-info'>Visualizar</button></a></td>";

                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>