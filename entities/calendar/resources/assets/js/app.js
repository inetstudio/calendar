window.moment = require('moment');
require('moment/locale/ru');
window.moment.updateLocale('ru', null);

window.tippy = require('tippy.js');

require('fullcalendar');
require('fullcalendar/dist/locale/ru');

let calendar = require('./package/calendar');
calendar.init();
