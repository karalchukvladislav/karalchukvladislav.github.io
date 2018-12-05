<?php
require_once '/includes/headerLine.php';
require_once '/includes/header.php';

?>
<div id="mainContent">
    <?php require_once '/includes/catalogBar.php'; ?>
    <div id="mainContentRight">
        <div id="addProduct">
            <form action="addCase.php" method="POST">
                <h1>Добавление</h1>
                <table>
                    <tbody>
                        <tr>
                            <td>бренд:</td>
                            <td>
                                <input type="text" name="brand" value="" class="" placeholder="Sumsung" required>
                            </td>
                        </tr>                    
                        <tr>
                            <td>модель:</td>
                            <td>
                                <input type="text" name="model" value="" class="" placeholder="Galaxy S8" required>
                            </td>
                        </tr>
                        <tr>
                            <td>цвет:</td>
                            <td>
                                <input type="text" name="color" value="" class="" placeholder="Черный" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Тип чехла:</td>
                            <td>
                                <input type="text" name="caseType" value="" class="" placeholder="Задняя накладка" required>
                            </td>
                        </tr>
                        <tr>
                            <td>материал:</td>
                            <td>
                                <input type="text" name="material" value="" class="" placeholder="Пластик" required>
                            </td>
                        </tr>
                        <tr>
                            <td>производитель:</td>
                            <td>
                                <input type="text" name="manufacturer" value="" class="" placeholder="Experts" required>
                            </td>
                        </tr>
                        <tr>
                            <td>серия:</td>
                            <td>
                                <input type="text" name="series" value="" class="" placeholder="Deep Matte" required>
                            </td>
                        </tr>
                        <tr>
                            <td>количество:</td>
                            <td>
                                <input type="text" name="count" value="" class="" placeholder="count" required>
                            </td>
                        </tr>
                        <tr>
                            <td>цена:</td>
                            <td>
                                <input type="text" name="price" value="" class="" placeholder="10.5" required>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <button type="submit">Добавить</button>
                            </td>
                        </tr>
                    </tfoot>         
                    
                </table>
                
            </form>
        </div>
    </div>
</div>
<?php require_once '/includes/footer.php';?>

