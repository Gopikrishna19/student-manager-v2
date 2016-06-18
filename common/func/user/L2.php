<div id="ausr">
    <div id="overlay-page-content">
        <div class="title">Insert Roll Numbers</div>
        <form>
            <table style="width: 300px">
                <tr>
                    <td><input type="text" value="8142" class="text" id="ccode" style="width: 75px; text-align: center" max="4"></td>
                    <td><input type="text" value="13" class="text" id="syear" style="width: 50px; text-align: center" max="2"></td>
                    <td>
                        <select id="dcode" class="text">
                            <?php
                                
                                include_once("../../config.php");
                                $query = "SELECT * FROM st_departments ORDER BY dCode";
                                $result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
                                while($row = mysqli_fetch_row($result))
                                {
                                    echo "<option value=".$row[0].">".$row[0]." - ".$row[1]."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><input type="text" id="ucode" class="text" style="width: 294px"></td>
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" id="btnUserCreate" value="Create" class="btn"></td>
                </tr>
            </table>
            <div id="ajax-result" style="display: none; color: #F80; text-align: center; max-width: 300px;"></div>
        </form>
        <span id="script">../scripts/func/user/cusr.js</span>
        <span id="showHelp"></span>
        <div id="help-content">
            <div class="title">Formats for putting more than one number as input:</div>
            <ul class="hconstraint">
                <li>Set College Code and Department Code: They will be prepended for every Roll Number</li>
                <li><span r>Spaces will be trimmed: Don't enter spaces between numbers; "1 2" will be taken as "12"</span></li>
                <li>Use "<span g>1-45</span>": for creating sequential Roll Numbers from 001 to 045 </li>
                <li>Use "<span g>1,2,5,10...</span>": for creating specific Roll Numbers i.e. 001, 002, 005, 010, ...</li>
                <li>Use "<span g>1-5,10-23</span>": for creating sets of sequential Roll Numbers</li>
                <li>Use "<span g>1-5,7</span>": for the combination of 001, 002 ... 005, 007</li>
                <li>Use "<span g>1</span>": for creating only the Roll Number 001</li>
            </ul>
        </div>
    </div>
</div>
<div id="amod">
    <div id="overlay-page-content">
        <div class="title">Insert Names</div>
        <form>
            <table style="width: 300px">
                <tr>
                    <td><input type="text" id="ucode" class="text" style="width: 294px"></td>
                </tr>
                <tr>
                    <td><input type="submit" id="btnUserCreate" value="Create" class="btn"></td>
                </tr>
            </table>
            <div id="ajax-result" style="display: none; color: #F80; text-align: center; max-width: 300px;"></div>
        </form>
        <span id="script">../scripts/func/user/cmod.js</span>
        <span id="showHelp"></span>
        <div id="help-content">
            <div class="title">Formats for putting more than one name as input:</div>
            <ul>
                <li><span r>Spaces will be trimmed: Don't enter spaces inbetween</span></li>
                <li>Use "<span g>[name],[name]</span>": for creating more than one Moderator</li>
            </ul>
        </div>
    </div>
</div>
<div id="dusr">
    <div id="overlay-page-content">
        <div class="title">Insert Roll Numbers</div>
        <form>
            <table style="width: 300px">
                <tr>
                    <td><input type="text" value="8142" class="text" id="ccode" style="width: 75px; text-align: center" max="4"></td>
                    <td><input type="text" value="13" class="text" id="syear" style="width: 50px; text-align: center" max="2"></td>
                    <td>
                        <select id="dcode" class="text">
                            <?php
                                
                                include_once("../../config.php");
                                $query = "SELECT * FROM st_departments ORDER BY dCode";
                                $result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
                                while($row = mysqli_fetch_row($result))
                                {
                                    echo "<option value=".$row[0].">".$row[0]." - ".$row[1]."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><input type="text" id="ucode" class="text" style="width: 294px"></td>
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" id="btnUserCreate" value="Delete" class="btn"></td>
                </tr>
            </table>
            <div id="ajax-result" style="display: none; color: #F80; text-align: center; max-width: 300px;"></div>
        </form>
        <span id="script">../scripts/func/user/dusr.js</span>
        <span id="showHelp"></span>
        <div id="help-content">
            <div class="title">Formats for putting more than one number as input:</div>
            <ul class="hconstraint">
                <li>Set College Code and Department Code: They will be prepended for every Roll Number</li>
                <li><span r>Spaces will be trimmed: Don't enter spaces between numbers; "1 2" will be taken as "12"</span></li>
                <li>Use "<span g>1-45</span>": for creating sequential Roll Numbers from 001 to 045 </li>
                <li>Use "<span g>1,2,5,10...</span>": for creating specific Roll Numbers i.e. 001, 002, 005, 010, ...</li>
                <li>Use "<span g>1-5,10-23</span>": for creating sets of sequential Roll Numbers</li>
                <li>Use "<span g>1-5,7</span>": for the combination of 001, 002 ... 005, 007</li>
                <li>Use "<span g>1</span>": for creating only the Roll Number 001</li>
            </ul>
        </div>
    </div>
</div>
<div id="dmod">
    <div id="overlay-page-content">
        <div class="title">Insert Names</div>
        <form>
            <table style="width: 300px">
                <tr>
                    <td><input type="text" id="ucode" class="text" style="width: 294px"></td>
                </tr>
                <tr>
                    <td><input type="submit" id="btnUserCreate" value="Delete" class="btn"></td>
                </tr>
            </table>
            <div id="ajax-result" style="display: none; color: #F80; text-align: center; max-width: 300px;"></div>
        </form>
        <span id="script">../scripts/func/user/dmod.js</span>
        <span id="showHelp"></span>
        <div id="help-content">
            <div class="title">Formats for putting more than one name as input:</div>
            <ul>
                <li><span r>Spaces will be trimmed: Don't enter spaces inbetween</span></li>
                <li>Use "<span g>[name],[name]</span>": for creating more than one Moderator</li>
            </ul>
        </div>
    </div>
</div>
<div id="dall">
    <div id="overlay-page-content">
        <div class="title">Delete All</div>
        <table>
            <tr>
                <td colspan="2">Are you sure you want to delete all Students and Teachers?<br>This action is <i>undoable</i>.</td>
            </tr>
            <tr>
                <td style="width: 50%"><input type="button" id="dall-y" class="btn" value="Yes"></button></td>
                <td style="width: 50%"><input type="button" id="dall-n" class="btn" value="No"></button></td>
            </tr>
        </table>
        <div id="ajax-result" style="display: none; color: #F80; text-align: center; max-width: 350px;"></div>
        <span id="script">../scripts/func/user/dall.js</span>
    </div>
</div>
<div id="lusr">
    <div id="overlay-page-content">
        <div class="title">List of Students</div>
        <div class="constraint">
            <table>
                <?php
                    include_once("../../config.php");
                    $query = "SELECT * FROM st_users WHERE privilege = 'U' ORDER BY userId";
                    $result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
                    while($row = mysqli_fetch_row($result))
                    {
                        echo "<tr class='list'><td>".$row[0]."</td><td>".$row[4]."</td></tr>";
                    }
                ?>
            </table>
        </div>
        <span id="script">../scripts/func/user/list.js</span>
        <span id="maxHeight"></span>
    </div>
</div>
<div id="lmod">
    <div id="overlay-page-content">
        <div class="title">List of Moderators</div>
        <div class="constraint">
            <table>                
                <?php
                    include_once("../../config.php");
                    $query = "SELECT * FROM st_users WHERE privilege = 'M' ORDER BY userId";
                    $result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
                    while($row = mysqli_fetch_row($result))
                    {
                        echo "<tr class='list'><td>".$row[0]."</td><td>".$row[4]."</td></tr>";
                    }
                ?>
            </table>
        </div>
        <span id="script">../scripts/func/user/list.js</span>
        <span id="maxHeight"></span>
    </div>
</div>