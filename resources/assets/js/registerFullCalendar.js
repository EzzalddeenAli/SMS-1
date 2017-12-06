$(function () {

    //RGB TO HEX CONVERTER
    function rgbToHex(color) {
        color = ""+ color;
        if (!color || color.indexOf("rgb") < 0) {
            return;
        }

        if (color.charAt(0) == "#") {
            return color;
        }

        let nums = /(.*?)rgb\((\d+),\s*(\d+),\s*(\d+)\)/i.exec(color),
            r = parseInt(nums[2], 10).toString(16),
            g = parseInt(nums[3], 10).toString(16),
            b = parseInt(nums[4], 10).toString(16);

        return "#"+ (
                (r.length === 1 ? "0"+ r : r) +
                (g.length === 1 ? "0"+ g : g) +
                (b.length === 1 ? "0"+ b : b)
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
    //Date for the calendar events (dummy data)
    let date = new Date();
    let d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
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
        events: [
            {
                title: 'All Day Event',
                start: new Date(y, m, 1),
                backgroundColor: '#f56954', //red
                borderColor: '#f56954' //red
            },
            {
                title: 'Long Event',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2),
                backgroundColor: '#f39c12', //yellow
                borderColor: '#f39c12' //yellow
            },
            {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false,
                backgroundColor: '#0073b7', //Blue
                borderColor: '#0073b7' //Blue
            },
            {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false,
                backgroundColor: '#00c0ef', //Info (aqua)
                borderColor: '#00c0ef' //Info (aqua)
            },
            {
                title: 'Birthday Party',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false,
                backgroundColor: '#00a65a', //Success (green)
                borderColor: '#00a65a' //Success (green)
            },
            {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'http://google.com/',
                backgroundColor: '#3c8dbc', //Primary (light-blue)
                borderColor: '#3c8dbc' //Primary (light-blue)
            }
        ],
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
            console.log(copiedEventObject.title);
            console.log(copiedEventObject.start._d);
            console.log(copiedEventObject.backgroundColor); //make background and border color same

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove()
            }

        },

        //Triggered when the user clicks an event.
        eventClick(calEvent, jsEvent, view) {

            //we get event bordertop property
            let $hex = rgbToHex($(this).css('borderTopColor'));
            //if borderTop is red remove it
            if($hex === '#ff0000') {
                $('#calendar').fullCalendar('removeEvents', calEvent._id );
                console.log('red found');
            }

            //changed border color to red
            //so we have to double click to remove an event
            $(this).css('border-color', '#ff0000');

        },

        //Triggered when dragging stops and the event has moved to a different day/time.
        eventDrop(event, delta, revertFunc) {
            console.log(event);
            if (!confirm("Are you sure about this change?")) {
                revertFunc();
            } else {
                console.log(event.title);
                console.log(event.start._d);
                console.log(event.backgroundColor);
            }

        }
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