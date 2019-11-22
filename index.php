<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *  A speed test page
 *
 * @package    tool_speedtest
 * @copyright  2019 Brendan Heywood <brendan@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__) . '/../../../config.php');

require_login();
$PAGE->set_url('/admin/tool/speedtest/');
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Speed test');
$PAGE->set_heading('Speed test');
echo $OUTPUT->header();
?>
<script type="text/javascript" src="speedtest.js"></script>
<script type="text/javascript" src="run.js"></script>

<style type="text/css">
#test{
    margin-top:2em;
    margin-bottom:12em;
}
div.testArea{
    display:inline-block;
    width:14em;
    height:9em;
    position:relative;
    box-sizing:border-box;
}
div.testName{
    position:absolute;
    top:0.1em; left:0;
    width:100%;
    font-size:1.4em;
    z-index:9;
}
div.meterText{
    position:absolute;
    bottom:1.5em; left:0;
    width:100%;
    font-size:2.5em;
    z-index:9;
}
#dlText{
    color:#6060AA;
}
#ulText{
    color:#309030;
}
#pingText,#jitText{
    color:#AA6060;
}
div.meterText:empty:before{
    color:#505050 !important;
    content:"0.00";
}
div.unit{
    position:absolute;
    bottom:2em; left:0;
    width:100%;
    z-index:9;
}
div.testGroup{
    display:inline-block;
}
@media all and (max-width:40em){
    div.testGroup{
        display:block;
        margin: 0 auto;
    }
}
</style>
</head>
<body>
<button id="startStopBtn" class="btn btn-primary" onclick="startStop()">Start</button>
<div id="test">
    <div class="testGroup">
        <div class="testArea">
            <div class="testName">Download</div>
            <div id="dlText" class="meterText"></div>
            <div class="unit">Mbps</div>
        </div>
        <div class="testArea">
            <div class="testName">Upload</div>
            <div id="ulText" class="meterText"></div>
            <div class="unit">Mbps</div>
    </div>
    </div>
    <div class="testGroup">
        <div class="testArea">
            <div class="testName">Ping</div>
            <div id="pingText" class="meterText"></div>
            <div class="unit">ms</div>
        </div>
        <div class="testArea">
            <div class="testName">Jitter</div>
            <div id="jitText" class="meterText"></div>
            <div class="unit">ms</div>
        </div>
    </div>
    <div id="ipArea">
        IP Address: <span id="ip"></span>
    </div>
</div>
<script type="text/javascript">
    initUI();
</script>
<?php
echo $OUTPUT->footer();
