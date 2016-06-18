<div id="ren">
    <div id="overlay-page-content">
        <div class="title">Change Display Name</div>
        <form>
            <table>
                <tr>
                    <td>New Name</td>
                    <td>:</td>
                    <td><input type="text" id="newname" class="text"></td>
                    <td id="oldNameWrong" style="display: none"><span r></span></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td><button id="btnNameSave" class="btn" g>Save</button></td>
                </tr>
            </table>
        </form>
        <div id="ajax-result" style="display: none; color: #F80; text-align: center; max-width: 300px;"></div>
    </div>
</div>
<div id="rep">
    <div id="overlay-page-content">
        <div class="title">Change Password</div>
        <form>
            <table>
                <tr>
                    <td>Old Password:</td>
                    <td><input type="password" id="oldpass" class="text" style="width: 250px;"></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" id="newpass" class="text" style="width: 250px;"></td>
                </tr>
                <tr>
                    <td>Confirm:</td>
                    <td><input type="password" id="conpass" class="text" style="width: 250px;"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Change Password" class="btn"></td>
                </tr>
            </table>
        </form>
        <div id="ajax-result" style="display: none; color: #F80; text-align: center; max-width: 300px;"></div>
    </div>
</div>
<div id="res">
    <div id="overlay-page-content">
        <div class="title">Reset Application</div>
        <table>
            <tr>
                <td colspan="2">Are you sure you want to delete all Students and Teachers?<br>This action is <i>undoable</i>.</td>
            </tr>
            <tr>
                <td style="width: 50%"><input type="button" id="dall-y" class="btn" value="Yes"></button></td>
                <td style="width: 50%"><input type="button" id="dall-n" class="btn" value="No"></button></td>
            </tr>
        </table>
        <div id="ajax-result" style="display: none; color: #F80; text-align: center; max-width: 300px;"></div>
    </div>
</div>