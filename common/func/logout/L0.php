<div id="overlay-page-content">
    <div class="title">Log Out</div>
    <table>
        <tr>
            <td colspan="2">Are you sure you want to log out?</td>
        </tr>
        <tr>
            <td style="width: 50%"><input type="button" id="logout-y" class="btn" value="Yes"></button></td>
            <td style="width: 50%"><input type="button" id="logout-n" class="btn" value="No"></button></td>
        </tr>
    </table>
    <script>
        $("#logout-y").click(function () {
            window.location.href = "../";
        });
        $("#logout-n").click(function () {
            $("#overlay").fadeOut(250, function () {
                removeOverlay();
            });
        })
    </script>
</div>