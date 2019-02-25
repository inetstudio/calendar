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
                tippy(element.get(), {
                    onShow: function () {
                        const content = this.querySelector('.tippy-content');

                        content.innerHTML = event.tooltip;
                    },
                    html: '#eventTooltip',
                    trigger: 'click',
                    interactive: true,
                    arrow: true,
                    theme: 'light'
                });
            }
        };

        if (changeURL) {
            calendarOptions.editable = true;
            calendarOptions.eventDrop = function(event, delta, revertFunc) {
                swal({
                    title: "Вы уверены?",
                    type: "info",
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
                                    swal({
                                        title: data.message,
                                        type: "success"
                                    });
                                } else {
                                    swal({
                                        title: "Ошибка",
                                        text: data.message,
                                        type: "error"
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

module.exports = calendar;
