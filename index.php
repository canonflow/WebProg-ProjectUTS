<?php
    if (isset($_POST['btnChoose'])) {
        if (isset($_POST['theme'])) {
            $t = $_POST['theme'];
            $bgColor = $_COOKIE[$t]['bgColor'];
            $headingColor = $_COOKIE[$t]['headingColor'];
            $headingAlign = $_COOKIE[$t]['headingAlign'];
            $paragraphColor = $_COOKIE[$t]['paragraphColor'];
            $fontSize = $_COOKIE[$t]['fontSize'];

            // Create Heading Style
            $pageBgColor = "background-color: $bgColor;";
            $headingStyle = "color: $headingColor; text-align: $headingAlign;";
            $paragraphStyle = "color: $paragraphColor; font-size: $fontSize"."px;";

            $themeStyle = "#content {
            background-color: $bgColor;
        }
        
        #content h1 {
            color: $headingColor;
            text-align: $headingAlign;
        }
        
        #content p {
            color: $paragraphColor;
            font-size: $fontSize"."px;
        }";
        }
    }

    if (isset($_POST['btnEdit'])) {
        if (isset($_POST['theme'])) {
            header("Location: edit.php?theme={$_POST['theme']}");
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Programming | Project UTS </title>
    <link rel="icon" href="./assets/icons/icon-2.svg" type="image/png">
    <style>
        * {
            box-sizing: border-box;
            font-family: Hauora, sans-serif;
        }

        body {
            background-color: #31363F;
        }

        header {
            display: flex;
            justify-content: center;
            color: #222831;
        }

        #action {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 0.3rem solid #222831;
            border-radius: 0.35rem;
            padding: 1.35rem 7rem;
            background-color: #F0F3FF;
        }

        #form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.375rem;
        }

        #btn-group {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        button {
            cursor: pointer;
            padding: 0.4rem 1rem;
            border-radius: 0.25rem;
            border: none;
            transition: all ease-in-out 0.3s;
            font-weight: bold;
            font-size: 0.875rem;
        }

        button:active {
            transform: scale(0.93);
        }

        .btn-primary {
            background-color: #10b981;
            color: #d1fae5;
        }

        .btn-primary:hover {
            background-color: #34d399;
        }

        .btn-primary:active {
            background-color: #059669;
        }

        .btn-secondary {
            background-color: #f59e0b;
            color: #fef3c7;
        }

        .btn-secondary:hover {
            background-color: #fbbf24;
        }

        .btn-secondary:active {
            background-color: #d97706;
        }

        select {
            background-color: #bae6fd;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.2rem;
            font-weight: bold;
            color: #1f2937;
            font-size: 1rem;
        }

        select:focus {
            border: none;
            outline: none;
        }

        option {
            background-color: #e5e7eb;
        }

        #add {
            margin: 0.75rem 0 0 0;
            padding: 0.3rem 1rem;
            border-radius: 0.175rem;
            text-decoration: none;
            color: #FFF7F1;
            background-color: #76ABAE;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 3rem 5rem 0;
        }

        #content {
            width: 100%;
            height: 20%;
            border: 1px solid black;
            border-radius: 0.375rem;
            padding: 0.75rem;
            background-color: white;
        }

        footer {
            display: flex;
            justify-content: center;
        }

        #credit {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            background-color: #ECF8F9;
            margin-top: 2rem;
            padding: 1rem 2rem;
            width: 40%;
            border-radius: 0.2rem;
        }

        #credit p {
            margin: 0;
        }


        <?php
        if (isset($themeStyle)) {
            echo $themeStyle;
        }
        ?>
    </style>
</head>
<body>
    <header>
        <div id="action">
            <form action="index.php" method="POST" id="form">
                <label for="theme">Theme Generator</label>
                <select name="theme" id="theme" required>
                    <option value="" selected disabled>---- Choose Theme ----</option>
                    <?php
                    if (isset($_COOKIE)) {
                        foreach ($_COOKIE as $theme => $value) {
                            $selected = '';
                            if (isset($t)) {
                                if ($t == $theme) {
                                    $selected = 'selected';
                                }
                            }
                            echo "<option value='$theme' $selected>$theme</option>";
                        }
                    }
                    ?>
                </select>
                <div id="btn-group">
                    <button type="submit" name="btnChoose" class="btn-primary">Choose the Theme</button>
                    <button type="submit" name="btnEdit" class="btn-secondary">Edit the Theme</button>
                </div>
            </form>
            <a href="add.php" id="add">Add New Theme</a>
        </div>
    </header>
    <main>
<!--        <div id="content" style="--><?php //echo (isset($pageBgColor)) ? $pageBgColor : '' ?><!--">-->
<!--            <h1 style="--><?php //echo (isset($headingStyle)) ? $headingStyle : '' ?><!--">Heading 1</h1>-->
<!--            <p style="--><?php //echo (isset($paragraphStyle)) ? $paragraphStyle : '' ?><!--">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid asperiores blanditiis commodi corporis dolore dolorem ducimus eligendi facilis illo inventore, nihil nobis obcaecati officia possimus quis voluptates. Qui, ut? Ab aliquid aperiam at deleniti dolor dolorum ducimus ea exercitationem itaque laborum molestiae molestias mollitia necessitatibus nesciunt omnis pariatur placeat quasi quibusdam quisquam quos repellendus repudiandae sapiente sit, totam veniam!Animi asperiores aspernatur autem delectus dolore modi nobis optio ratione rem veritatis? Accusamus et nemo possimus rerum sequi? Aperiam eaque enim, error fuga impedit ipsam non quibusdam repellendus sunt velit?</p>-->
<!--            <p style="--><?php //echo (isset($paragraphStyle)) ? $paragraphStyle : '' ?><!--">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, assumenda consequuntur cum eaque eos eum harum libero natus neque, numquam obcaecati perferendis porro qui quisquam quod quos repellendus sint velit. Delectus dolores fuga in iure neque nesciunt nostrum, quidem rem tempore veritatis. Blanditiis dolores eos, est eum natus saepe voluptatibus voluptatum. A delectus ea eos iste itaque nam nihil voluptate?</p>-->
<!--        </div>-->
        <div id="content">
            <h1>Heading 1</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid asperiores blanditiis commodi corporis dolore dolorem ducimus eligendi facilis illo inventore, nihil nobis obcaecati officia possimus quis voluptates. Qui, ut? Ab aliquid aperiam at deleniti dolor dolorum ducimus ea exercitationem itaque laborum molestiae molestias mollitia necessitatibus nesciunt omnis pariatur placeat quasi quibusdam quisquam quos repellendus repudiandae sapiente sit, totam veniam!Animi asperiores aspernatur autem delectus dolore modi nobis optio ratione rem veritatis? Accusamus et nemo possimus rerum sequi? Aperiam eaque enim, error fuga impedit ipsam non quibusdam repellendus sunt velit?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, assumenda consequuntur cum eaque eos eum harum libero natus neque, numquam obcaecati perferendis porro qui quisquam quod quos repellendus sint velit. Delectus dolores fuga in iure neque nesciunt nostrum, quidem rem tempore veritatis. Blanditiis dolores eos, est eum natus saepe voluptatibus voluptatum. A delectus ea eos iste itaque nam nihil voluptate?</p>
        </div>
    </main>
    <footer>
        <div id="credit">
            <p>Developed By</p>
            <table>
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>NRP</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Nathan Garzya Santoso</td>
                    <td>160422041</td>
                </tr>
                <tr>
                    <td>Janet Deby Marlien Manoach</td>
                    <td>160422062</td>
                </tr>
                <tr>
                    <td>Antonius Kustiono Putra</td>
                    <td>160422065</td>
                </tr>
                </tbody>
            </table>
        </div>
    </footer>
</body>
</html>
