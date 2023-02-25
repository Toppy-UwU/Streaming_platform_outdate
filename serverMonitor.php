<?php

function get_server_resource () {
    $url = 'http://192.168.231.203:8900/server_resource/';
    $json = file_get_contents($url);
    $data = json_decode($json);

    ?>

    <table class="table">
        <tr>
            <th>System</th>
            <th>Values</th>
        </tr>
        <tr>
            <th> CPU Used </th>
            <th> <?php echo $data->CPU_Used ?> </th>
        </tr>
        <tr>
            <th> Disk Free Space</th>
            <th> <?php echo $data->Disk_Free ?> </th>
        </tr>
        <tr>
            <th> Disk Used Space</th>
            <th> <?php echo $data->Disk_Used ?> </th>
        </tr>
        <tr>
            <th> Disk Total Space</th>
            <th> <?php echo $data->Disk_Total ?> </th>
        </tr>
        <tr>
            <th> Disk % Used Space</th>
            <th> <?php echo $data->Disk_Used_Percent ?> </th>
        </tr>
        <tr>
            <th> memory used</th>
            <th> <?php echo $data->Memory_Used ?> </th>
        </tr>
        <tr>
            <th> Network Download</th>
            <th> <?php echo $data->Network_Download ?> </th>
        </tr>
        <tr>
            <th> Network Upload</th>
            <th> <?php echo $data->Network_Upload ?> </th>
        </tr>

    </table>

    <?php
}

?>