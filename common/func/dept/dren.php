<div>
    <div class="title">Add Department</div>
    <div>
        <form id="dren-form">
            <table>
                <tr>
                    <td>Code:</td>
                    <td><input type="text" value="<?php echo $_REQUEST["code"]; ?>" class="text" id="code" style="width: 250px">
                        <input type="hidden" value="<?php echo $_REQUEST["code"]; ?>" id="ocode"></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" value="<?php echo $_REQUEST["name"]; ?>" class="text" id="name" style="width: 250px">
                        <input type="hidden" value="<?php echo $_REQUEST["name"]; ?>" id="oname"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" class="btn" value="Rename"></td>
                </tr>
            </table>
        </form>
        <div id="ajax-result" style="display: none; color: #F80; text-align: center; max-width: 300px;"></div>
    </div>
</div>