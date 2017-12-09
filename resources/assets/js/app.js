
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
//sparkline for generating line graphs
window.Sparkline = require('jquery-sparkline');
//chart.js for generating charts
window.Chart = require('chart.js');

require('./pie-chart');
require('moment');
require('fullcalendar');
require( 'datatables.net-bs' );
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./registerVue');
require('./registerFullCalendar');
require('./registerDataTables');