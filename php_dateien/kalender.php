<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professioneller Terminplaner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css" media="print" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #calendar {
            max-width: 800px;
            margin: 0 auto;
        }

        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .close-btn {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div id="calendar"></div>

    <div id="eventModal" class="modal">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2 id="eventTitle"></h2>
        <p id="eventDescription"></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                selectable: true,
                select: function(start, end) {
                    openModal(start, end);
                },
                eventRender: function(event, element) {
                    element.attr('data-toggle', 'tooltip');
                    element.attr('title', event.title);
                },
                eventClick: function(event, jsEvent, view) {
                    openEventModal(event);
                }
            });
        });

        function openModal(start, end) {
            var title = prompt('Terminbezeichnung:');
            if (title) {
                $('#calendar').fullCalendar('renderEvent', {
                    title: title,
                    start: start,
                    end: end,
                    allDay: true
                }, true);
            }
        }

        function openEventModal(event) {
            $('#eventTitle').text(event.title);
            $('#eventDescription').text('Bemerkung: ' + event.title);
            $('#eventModal').show();
        }

        function closeModal() {
            $('#eventModal').hide();
        }
    </script>
</body>
</html>
