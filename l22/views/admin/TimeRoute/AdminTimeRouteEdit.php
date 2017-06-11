<?php
require_once ROOT."/views/admin/header.php";
?>
<h1 class="text-center"><?php echo $title;?></h1>
<div class="container">
    <div class="row">
        <div class="col-md-2 col-lg-3"></div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 create-transport content">
            <form class="form-horizontal" role="form" method="post">
                <table>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Назва зупинки
                        </th>
                        <th>
                            Час прибуття
                        </th>
                    </tr>

                <?php

                    foreach($infoTimeRouteStart as $key=>$value){
                        echo "<tr>";
                        $n = $key+1;
                        echo "<td>$n</td><td>{$value['station_name']}</td><td>
                            <input type='time' value='{$value['time']}'>
                        </td>";
                        echo "</tr>";
                    }
                ?>
                </table>
            </form>
        </div>
        <div class="col-md-2 col-lg-3"></div>
    </div>

    <?php
    require_once ROOT."/views/admin/footer.php";
    ?>