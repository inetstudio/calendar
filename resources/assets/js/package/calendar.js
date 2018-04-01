let calendar = {};

calendar.init = function () {
    $('.calendar-package .calendar').each(function () {
        let eventsURL = $(this).attr('data-events'),
            changeURL = $(this).attr('data-change');

        $(this).fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            navLinks: true,
            weekNumbers: true,
            weekNumbersWithinDays: true,
            eventLimit: true,
            editable: true,
            eventDrop: function(event, delta, revertFunc) {
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
            },
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
        });
    });
};

module.exports = calendar;
