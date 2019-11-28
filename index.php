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
require_once($CFG->dirroot . '/iplookup/lib.php');

$url = new moodle_url('/admin/tool/speedtest/');
$PAGE->set_url($url);
$PAGE->set_pagelayout('report');
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('pluginname', 'tool_speedtest'));
$PAGE->set_heading(get_string('pluginname', 'tool_speedtest'));
$PAGE->navbar->add(get_string('pluginname', 'tool_speedtest'), $url);

echo $OUTPUT->header();
?>
<script type="text/javascript" src="speedtest.js"></script>
<script type="text/javascript" src="run.js"></script>
<style type="text/css" src="styles.css"></style>
<div id="test">
    <div>
        <button id="startStopBtn" class="btn btn-primary" onclick="startStop()"
 data-start="<?php echo get_string('testrerun' , 'tool_speedtest') ?>"
 data-abort="<?php echo get_string('testabort' , 'tool_speedtest') ?>">
<?php echo get_string('teststart' , 'tool_speedtest') ?></button>
    </div>
    <div class="testGroup">
        <div class="testArea">
            <div class="testName"><?php echo get_string('download' , 'tool_speedtest') ?></div>
            <div id="dlText" class="meterText"></div>
            <div class="unit">Mbps</div>
        </div>
        <div class="testArea">
            <div class="testName"><?php echo get_string('upload' , 'tool_speedtest') ?></div>
            <div id="ulText" class="meterText"></div>
            <div class="unit">Mbps</div>
        </div>
    </div>
    <div class="testGroup">
        <div class="testArea">
            <div class="testName"><?php echo get_string('ping' , 'tool_speedtest') ?></div>
            <div id="pingText" class="meterText"></div>
            <div class="unit">ms</div>
        </div>
        <div class="testArea">
            <div class="testName"><?php echo get_string('jitter' , 'tool_speedtest') ?></div>
            <div id="jitText" class="meterText"></div>
            <div class="unit">ms</div>
        </div>
    </div>
<?php
$ip = getremoteaddr();
$iplookup = new moodle_url('/iplookup/', array('ip' => $ip));
$info = iplookup_find_location($ip);
$location = $info['country'] . ' - ' . $info['city'];
?>
    <div><?php echo get_string('ipaddress', 'tool_speedtest') ?>: <span id="ip"><?php echo html_writer::link($iplookup, $ip) ?></span></div>
    <div><?php echo get_string('location', 'tool_speedtest') ?>: <span id="location"><?php echo $location ?></span></div>
    <div><?php echo get_string('network', 'tool_speedtest') ?>: <span id="network">-</span></div>
</div>
<?php
echo $OUTPUT->footer();
