<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Page</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9258502939818184"
     crossorigin="anonymous"></script>
    
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3LRKVSP175"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-3LRKVSP175');
</script>

<body>
    <table>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Email</td>
            <td>Maps</td>
        </tr>

        <?php
        require 'connection.php';
        $rows = mysqli_query($conn, "SELECT * FROM `tb_data` ORDER BY `id` DESC");
        $i = 1;

        foreach ($rows as $row) :
        ?>
            <tr>
                <td>
                    <?php
                    echo $i++;
                    ?>
                </td>
                <td>
                    <?php
                    echo $row['name'];
                    ?>
                </td>
                <td>
                    <?php
                    echo $row['email'];
                    ?>
                </td>
                <?php
                $MapsSource = ("https://www.google.com/maps?q=" . $row['latitude'] . "," . $row['longitude'] . "&hl=es;z=14&output=embed");
                ?>
                <td style="width: 450px; height: 450px;"> <iframe src="<?php echo $MapsSource; ?>" style="width: 100%; height: 100%;"></iframe> </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
        <br>
        <a href="index.php">Index Page</a>
</body>

</html>