<a href="https://travis-ci.org/catalyst/moodle-tool_speedtest">
<img src="https://travis-ci.org/catalyst/moodle-tool_speedtest.svg?branch=master">
</a>

# tool_speedtest

A speed test tool for Moodle

* [What is this?](#what-is-this)
* [Branches](#branches)
* [Installation](#installation)
* [Warm thanks](#warm-thanks)
* [Support](#support)

## What is this?

Speed tests will always be specific to the particular combination of the end
users computer, network, and all of the hops in the middle up to and including
the actual moodle. No 3rd party test will ever give you a true indication of
exactly how fast a user can access this specific moodle site.

Branches
--------

| Moodle verion     | Branch      | PHP        |
| ----------------- | ----------- | ---------- |
| Moodle 3.5 to 3.8 | master      | 5.5 - 7.0+ |
| Totara 12+        | master      | 7.0+ |


Installaton
-----------

1. Install the plugin the same as any standard moodle plugin either via the
Moodle plugin directory, or you can use git to clone it into your source:

   ```sh
   git clone git@github.com:catalyst/moodle-auth_saml2.git auth/saml2
   ```

   Or install via the Moodle plugin directory:
    
   https://moodle.org/plugins/auth_saml2

2. Then run the Moodle upgrade

This plugin requires no configuration.


Warm thanks
-----------

This is essentially a wrapper or port of the excellent librespeed project:

https://github.com/librespeed/speedtest

<a href="https://github.com/librespeed/speedtest">
<img src="https://raw.githubusercontent.com/librespeed/speedtest/master/.logo/logo3.png">
</a>

Support
-------

If you have issues please log them in github here

https://github.com/catalyst/moodle-tool_speedtest/issues

Please note our time is limited, so if you need urgent support or want to
sponsor a new feature then please contact Catalyst IT Australia:

https://www.catalyst-au.net/contact-us


This plugin was developed by Catalyst IT Australia:

https://www.catalyst-au.net/

<img alt="Catalyst IT" src="https://cdn.rawgit.com/CatalystIT-AU/moodle-auth_saml2/master/pix/catalyst-logo.svg" width="400">
