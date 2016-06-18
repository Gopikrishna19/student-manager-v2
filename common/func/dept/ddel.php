<div>
    <div class="title">Add Department</div>
    <div>
        <form id="ddel-form">
            <table>
                <tr>
                    <td>Are your sure you want to delete <i>"<?php echo $_REQUEST["code"]; ?> - <?php echo $_REQUEST["name"]; ?>" </i>?</i>
                        <input type="hidden" value="<?php echo $_REQUEST["code"]; ?>" id="code">
                        <input type="hidden" value="<?php echo $_REQUEST["name"]; ?>" id="name"></td>
                </tr>
                <tr>
                    <td><input type="submit" class="btn" value="Yes, Delete!"></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="ajax-result" style="display: none; color: #F80; text-align: center; max-width: 300px;"></div>
</div>