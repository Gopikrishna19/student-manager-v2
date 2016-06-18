<div id="overlay-page-content">
    <div class="title">Departments</div>
    <div style="overflow: auto; border-bottom: 1px solid #333; padding-bottom: 5px; margin-bottom: 5px;">
        <div id="dept-add" style="float: left; height: 24px; width: 72px; background-image: url(../images/add.png);"></div>
        <div id="dept-del" style="float: left; margin-left: 3px; height: 24px; width: 96px; background-image: url(../images/del.png);"></div>
    </div>
    <div class="constraint">
        <?php
            include("../../config.php");
            $query = "SELECT * FROM st_departments";
            $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
            $i = 1;
            echo "<table>";
            while($row = mysqli_fetch_row($result))
            {
                echo "<tr>".
                     "<td style='padding: 0px 5px'>".$row[0]."</td>".
                     "<td style='padding: 0px 5px'>".$row[1]."</td>".
                     "<td><div class='actionbtn del deptDel' data-code='".$row[0]."' data-name='".$row[1]."'></div></td>".
                     "<td><div class='actionbtn edit deptRen' data-code='".$row[0]."' data-name='".$row[1]."'></div></td>".
                     "</td></tr>";
                $i += 1;
            }
            echo "</table>";
        ?>
    </div>
    <span id="script">../scripts/func/dept.js</span>
    <span id="maxHeight"></span>
</div>