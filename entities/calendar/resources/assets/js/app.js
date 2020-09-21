import calendar from './package/calendar';

window.moment = require('moment');
require('moment/locale/ru');
window.moment.updateLocale('ru', null);

require('fullcalendar');
require('fullcalendar/dist/locale/ru');

calendar.init();
