import Swal from 'sweetalert2';
import tippy from 'tippy.js';
import { v4 as uuidv4 } from 'uuid';

let calendar = {};

calendar.init = function () {
    $('.calendar-package .calendar').each(function () {
        let $calendar = $(this);
        let eventsURL = $calendar.attr('data-events');
        let changeURL = $calendar.attr('data-change');

        let calendarOptions = {
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            navLinks: true,
            weekNumbers: true,
            weekNumbersWithinDays: true,
            eventLimit: true,
            timeFormat: 'H:mm',
            events: {
                url: eventsURL
            },
            eventRender: function(event, element) {
                let eventId = uuidv4();

                element.attr('data-uuid', eventId);
                let content = $(event.tooltip).first().attr('data-uuid', eventId)

                tippy(element.get(), {
                    allowHTML: true,
                    content: content[0].outerHTML,
                    trigger: 'click',
                    interactive: true,
                    arrow: true,
                    theme: 'light',
                    appendTo: window.document.getElementById('eventTooltip')
                });
            }
        };

        if (changeURL) {
            calendarOptions.editable = true;
            calendarOptions.eventDrop = function(event, delta, revertFunc) {
                Swal.fire({
                    title: "Вы уверены?",
                    icon: "info",
                    showCancelButton: true,
                    cancelButtonText: "Отмена",
                    confirmButtonColor: "#1ab394",
                    confirmButtonText: "Да",
                    closeOnConfirm: true
                }).then((result) => {
                    if (result.value) {
                        window.$.ajax({
                            url: changeURL,
                            method: "POST",
                            dataType: "json",
                            data: {
                                id: event.id,
                                type: event.type,
                                time: event.start.format()
                            },
                            success: function (data) {
                                if (data.success === true) {
                                    Swal.fire({
                                        title: data.message,
                                        icon: "success"
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Ошибка",
                                        text: data.message,
                                        icon: "error"
                                    });
                                }
                            }
                        });
                    } else {
                        revertFunc();
                    }
                });
            };
        }

        $(this).fullCalendar(calendarOptions);
    });
};

export default calendar
