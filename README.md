<img align="right" width="371" height="638" src="https://user-images.githubusercontent.com/187449/69426326-24f1f380-0d81-11ea-82e7-0339fe902aee.png">

<a href="https://travis-ci.org/catalyst/moodle-tool_speedtest">
<img src="https://travis-ci.org/catalyst/moodle-tool_speedtest.svg?branch=master">
</a>

# tool_speedtest

A network speed test tool for Moodle

* [What is this?](#what-is-this)
* [Branches](#branches)
* [Installation](#installation)
* [Usage](#usage)
* [Credit & thanks](#credit-and-thanks)
* [Support](#support)

## What is this?

This is a network speed tester, just like many other test pages such as [fast.com](https://fast.com/) by Netflix or the tester [build directly into google](https://www.google.com.au/search?q=internet+speed).

The key difference is it is hosted directly inside your Moodle instance. Speed tests will always be specific to the particular combination of the end users computer, network, and all of the hops in the middle up to and including the actual moodle. No 3rd party test will ever give you a true indication of exactly how fast a user can access your specific moodle site.

In fact using a test tool such as Google's which will likely be hosted on CDN edge servers very close to your end users will almost always give a false and overly optimistic estimate of the true network speed to your moodle instance.


Branches
--------

| Moodle verion     | Branch      | PHP        |
| ----------------- | ----------- | ---------- |
| Moodle 3.5 to 3.8 | master      | 5.5 - 7.0+ |
| Totara 12+        | master      | 7.0+ |


Installation
------------

1. Install the plugin the same as any standard moodle plugin either via the
Moodle plugin directory, or you can use git to clone it into your source:

   ```sh
   git clone git@github.com:catalyst/moodle-tool_speedtest.git admin/tool/speedtest
   ```

   Or install via the Moodle plugin directory:
    
   https://moodle.org/plugins/tool_speedtest

2. Then run the Moodle upgrade

This plugin requires no configuration.

Usage
-----

To run the speed test visit this url on your instance:

/admin/tool/speedtest/

Because this tool is intended to be a diagnostic tool it is pubicly available.

This tool doesn't add itself to any menu's so you will need to add links to it as needed, ie from your support pages.

Credit and thanks
-----------------

This is essentially a wrapper or port of the excellent librespeed project (LGPL3):

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
