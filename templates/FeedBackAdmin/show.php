<table class="table table-striped table-dark">
<?php 


foreach ($data as $id => $row) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>$value</td>";
    }
    echo "<td><a class='btn btn-info btn-sm' href='$delURL$id'>DELETE</a></td></tr>";
}

?>
</table>
