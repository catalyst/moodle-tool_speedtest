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

// phpcs:ignore moodle.Files.RequireLogin.Missing
require_once(dirname(__FILE__) . '/../../../config.php');
require_once($CFG->dirroot . '/iplookup/lib.php');

$url = new moodle_url('/admin/tool/speedtest/');
$PAGE->set_url($url);
$PAGE->set_pagelayout('report');
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('pluginname', 'tool_speedtest'));
$PAGE->set_heading(get_string('pluginname', 'tool_speedtest'));
$PAGE->navbar->add(get_string('pluginname', 'tool_speedtest'), $url);

$ip = getremoteaddr();
$iplookup = new moodle_url('/iplookup/', ['ip' => $ip]);
$info = iplookup_find_location($ip);

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('tool_speedtest/index', [
    'ip' => $ip,
    'iplookup' => html_writer::link($iplookup, $ip),
    'location' => $info['country'] . ' - ' . $info['city'],
]);
echo $OUTPUT->footer();

$event = \tool_speedtest\event\speedtest_result::create(array(
    'other' => array(
        'ip' => $ip,
        'location' => $location,
        'network' => 'unknown',
    ),
));
$event->trigger();
