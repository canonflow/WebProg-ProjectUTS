<?php
    if (isset($_POST['btnSave'])) {
        $theme = $_POST['theme'];
        $bgColor = $_POST['bgColor'];
        $headingColor = $_POST['headingColor'];
        $headingAlign = $_POST['headingAlign'];
        $paragraphColor = $_POST['paragraphColor'];
        $fontSize = $_POST['fontSize'];

        setcookie("$theme"."[bgColor]", $bgColor);
        setcookie("$theme"."[headingColor]", $headingColor);
        setcookie("$theme"."[headingAlign]", $headingAlign);
        setcookie("$theme"."[paragraphColor]", $paragraphColor);
        setcookie("$theme"."[fontSize]", $fontSize);
        header("Location: index.php");
    }

    if (isset($_GET['theme'])) {
        if (isset($_COOKIE[$_GET['theme']])) {
            $t = $_GET['theme'];
            $bgColor = $_COOKIE[$t]['bgColor'];
            $headingColor = $_COOKIE[$t]['headingColor'];
            $headingAlign = $_COOKIE[$t]['headingAlign'];
            $paragraphColor = $_COOKIE[$t]['paragraphColor'];
            $fontSize = $_COOKIE[$t]['fontSize'];
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
    <title>Edit Theme</title>
    <link rel="icon" href="./assets/icons/icon-2.svg" type="image/png">
    <style>
        * {
            box-sizing: border-box;
            font-family: Hauora, sans-serif;
        }

        body {
            background-color: #31363F;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10rem;
        }

        main {
            width: 80%;
            height: 100%;
            border: 2px solid #111827;
            border-radius: 0.75rem;
            background-color: #F0F3FF;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            color: #111827;
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

        #form-action {
            display: flex;
            justify-content: end;
            margin-top: 0.4rem;
        }

        a {
            margin: 0.75rem 0 0.75rem 0;
            padding: 0.3rem 1rem;
            border-radius: 0.175rem;
            text-decoration: none;
            color: #FFF7F1;
            background-color: #222831;
        }
    </style>
</head>
<body>
    <main>
        <h1>Edit Theme</h1>
        <form action="edit.php" method="POST">
            <table>
                <tbody>
                <tr>
                    <td><label for="theme">Name of your theme</label></td>
                    <td><input type="text" name="theme" id="theme" value="<?php echo (isset($t)) ? $t : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="bgColor">Color of Page Background</label></td>
                    <td><input type="color" name="bgColor" id="bgColor" value="<?php echo (isset($bgColor)) ? $bgColor : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="headingColor">Color of Heading 1</label></td>
                    <td><input type="color" name="headingColor" id="headingColor" value="<?php echo (isset($headingColor)) ? $headingColor : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="headingAlign">Alignment of Heading 1</label></td>
                    <td>
                        <select name="headingAlign" id="headingAlign" required>
                            <option value="" selected disabled>---- Choose the Alignment ----</option>
                            <?php
                            $aligns = ['left', 'center', 'right'];
                            foreach ($aligns as $align) {
                                $selected = '';
                                $val = ucfirst($align);
                                if ($align == $headingAlign) {
                                    $selected = 'selected';
                                }

                                echo "<option value='$align' $selected>$val</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="paragraphColor">Color of Paragraph</label></td>
                    <td><input type="color" name="paragraphColor" id="paragraphColor" value="<?php echo (isset($paragraphColor)) ? $paragraphColor : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="fontSize">Font Size of Paragraph</label></td>
                    <td><input type="number" name="fontSize" id="fontSize" min="0" value="<?php echo (isset($fontSize)) ? $fontSize : ''; ?>" required><strong style="margin-left: 4px;">px</strong></td>
                </tr>
                </tbody>
            </table>
            <div id="form-action">
                <button type="submit" name="btnSave" class="btn-primary">Save</button>
            </div>
        </form>
        <br />
        <a href="index.php"><< Back to Main Page</a>
    </main>
</body>
</html>
