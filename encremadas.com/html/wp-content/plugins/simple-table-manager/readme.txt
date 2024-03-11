﻿=== Simple Table Manager ===
Contributors: Ryo Inoue, Topcode Website Services from v1.3
Donate link: http://www.tokyo-ict.com/en/
Tags: mysql, crud, table, database, simple, export, query
Requires at least: 4.0
Tested up to: 5.2.2
Stable tag: 5.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Enables editing table records and exporting them to CSV files through minimal database interface from your wp-admin page menu.

== Description ==

Simple Table Manager enables editing table records and exporting them to CSV files through minimal database interface from your wp-admin page menu.

* Simply CRUD table contents on your wp-admin screen
* Search and sort table records
* No knowledge on MySQL or PHP required
* Export table records to a CSV file
* Not allow users to change the structure of the table

Unlike 'full featured' database management plugins, it does not allow users to alter the structure of the table but requires no knowledge on MySQL or PHP.

Similar to CakePHP's scaffold feature, Simple Table Manager is an auxiliary tool suited for the initial development phase of a website. It is also ideal when you want to ask someone else with no database expertise to keep track of table records on your website (that was my motivation for developing this plugin at least).

== Installation ==

1. Via theDashboard > Plugins > Add plugin menu page
2. Or upload the entire `simple-table-manager` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. On the plugin's `Settings` page, select the table you want to manage

== Frequently asked questions ==

= How can I add a new table by using the plugin? =

You cannot. Please use 'full featured' plugins or phpMyAdmin if you need full access to the database.

== Screenshots ==

1. View of all the records on a table
2. Detailed view to edit records

== Changelog == 

= Version 1.0 (2015-03-03) =
First release

= Version 1.1 (2015-05-02) =
* Added feature to auto-adjust input text fields according to data type
* Enabled insert and retrieval of data containing special chars
* Rearranged files for a loosely MVC structure
* Fixed a few minor bugs.

= Version 1.2 (2016-01-15) =
* Enabled handling of non-integer primary keys

= Version 1.3 (2019-08-20) =
* Fix error on activation if database prefix is not "wp_"
* Fix CSV Export
* Fix $order not found error
* Make all strings translation-ready
* Cosmetic changes

== Upgrade Notice ==

None
