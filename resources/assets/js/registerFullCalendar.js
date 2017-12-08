$(function () {

    //RGB TO HEX CONVERTER
    function rgbToHex(color) {
        color = "" + color;
        if (!color || color.indexOf("rgb") < 0) {
            return;
        }

        if (color.charAt(0) === "#") {
            return color;
        }

        let nums = /(.*?)rgb\((\d+),\s*(\d+),\s*(\d+)\)/i.exec(color),
            r = parseInt(nums[2], 10).toString(16),
            g = parseInt(nums[3], 10).toString(16),
            b = parseInt(nums[4], 10).toString(16);

        return "#" + (
                (r.length === 1 ? "0" + r : r) +
                (g.length === 1 ? "0" + g : g) +
                (b.length === 1 ? "0" + b : b)
            );
    }

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
        ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            let eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            })

        })
    }

    init_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    let oldEvent = {};
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
        },
        //Random default events
        displayEventTime: false, //hide time
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop(date, allDay) { // this function is called when something is dropped
            // retrieve the dropped element's stored Event Object
            let originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            let copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css('background-color');
            copiedEventObject.borderColor = $(this).css('border-color');

            /*ADD EVENT*/
            //make a post request to persist event
            axios.post('/resource/events', {
                title: copiedEventObject.title,
                start: copiedEventObject.start._d.getTime() / 1000,
                end: copiedEventObject.start._d.getTime() / 1000,
                backgroundColor: rgbToHex(copiedEventObject.backgroundColor),
                borderColor: rgbToHex(copiedEventObject.backgroundColor),
            }).then(function (response) {
                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove()
                }
            }).catch(function (error) {
                console.log(error);
            });


        },

        /*DELETE EVENT*/
        //Triggered when the user clicks an event.
        eventClick(calEvent, jsEvent, view) {
            //we get event bordertop property
            let $hex = rgbToHex($(this).css('borderTopColor'));
            //if borderTop is red remove it
            if ($hex === '#ff0000') {
                axios.post('/resource/events/', {
                    title: calEvent.title,
                    start: calEvent.start._d.getTime() / 1000,
                    end: calEvent.start._d.getTime() / 1000,
                    backgroundColor: rgbToHex(calEvent.backgroundColor),
                    '_method': 'delete',
                }).then(function (response) {
                    $('#calendar').fullCalendar('removeEvents', calEvent._id);
                    console.log(response);
                }).catch(function (error) {
                    alert('something went wrong, please try again');
                    console.log(error);
                });
            }

            //changed border color to red
            //so we have to double click to remove an event
            $(this).css('border-color', '#ff0000');

        },

        /*EDIT EVENT*/
        //Triggered when dragging stops and the event has moved to a different day/time.
        eventDragStart(event) {
            //store previous event details to oldEvent
            oldEvent.title = event.title;
            oldEvent.start = event.start._d.getTime() / 1000;
            oldEvent.end = event.start._d.getTime() / 1000;
            oldEvent.backgroundColor = event.backgroundColor;
        },

        //make the update request
        eventDrop(event, delta, revertFunc) {
            if (!confirm("Are you sure about this change?")) {
                revertFunc();
            } else {
                axios.post('/resource/events/edit', {
                    _method: 'patch',
                    title: event.title,
                    start: event.start._d.getTime() / 1000,
                    end: event.start._d.getTime() / 1000,
                    backgroundColor: event.backgroundColor,
                    oldEvent: oldEvent,
                }).then(function (response) {
                    console.log(response.status);
                }).catch(function (error) {
                    alert('something went wrong, please try again');
                    //revert the event to it's original position if failed
                    revertFunc();
                    console.log(error);
                });
            }

        }
    });

    /*STATIC CALENDAR*/
    $('#calendar-static').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
        },
        //Random default events
        displayEventTime: false, //hide time

    });

    /*FETCH EVENTS FROM DATABASE*/
    axios.get('/resource/events', {
        headers: {'X-Requested-With': 'XMLHttpRequest'}
    }).then(function (response) {
        for (const datum of response.data) {
            let event = {
                title: datum.title,
                start: new Date(datum.start * 1000),
                end: new Date(datum.end * 1000),
                backgroundColor: datum.background_color,
                borderColor: datum.border_color
            };
            $('#calendar').fullCalendar('renderEvent', event, true);
            $('#calendar-static').fullCalendar('renderEvent', event, true);
        }
    }).catch(function (error) {
        alert('something went wrong, please try again');
        console.log(error);
    });

    /* ADDING EVENTS */
    let currColor = '#3c8dbc'; //Red by default
    //Color chooser button
    let colorChooser = $('#color-chooser-btn');
    $('#color-chooser > li > a').click(function (e) {
        e.preventDefault();
        //Save color
        currColor = $(this).css('color');
        //Add color effect to button
        $('#add-new-event').css({'background-color': currColor, 'border-color': currColor})
    });
    $('#add-new-event').click(function (e) {
        e.preventDefault();
        //Get value and make sure it is not null
        let val = $('#new-event').val();
        if (val.length == 0) {
            return
        }

        //Create events
        let event = $('<div />');
        event.css({
            'background-color': currColor,
            'border-color': currColor,
            'color': '#fff'
        }).addClass('external-event');
        event.html(val);
        $('#external-events').prepend(event);

        //Add draggable funtionality
        init_events(event);

        //Remove event from text input
        $('#new-event').val('')
    })
});