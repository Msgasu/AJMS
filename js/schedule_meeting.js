
    $(document).ready(function() {
        fetchMeetings();

        $('#bookingCalendar').fullCalendar({
            defaultView: 'month',
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                $('#scheduleMeetingModal').modal('show');
                $('#scheduleDate').val(start.format('YYYY-MM-DD'));
            }
        });

        function fetchMeetings() {
            $.ajax({
                url: 'fetch_meetings.php',
                method: 'GET',
                success: function(data) {
                    var meetings = JSON.parse(data);
                    meetings.forEach(function(meeting) {
                        $('#bookingCalendar').fullCalendar('renderEvent', {
                            title: meeting.title,
                            start: meeting.date + 'T' + meeting.time,
                            location: meeting.location
                        });
                    });
                }
            });
        }

        $('#scheduleMeetingForm').submit(function(e) {
            e.preventDefault();
            var title = $('#meetingTitle').val();
            var date = $('#scheduleDate').val();
            var time = $('#meetingTime').val();
            var location = $('#meetingLocation').val();
            var user_id = 1; // You can replace this with the actual user ID

            $.ajax({
                url: 'schedule_meeting.php',
                method: 'POST',
                data: {
                    title: title,
                    user_id: user_id,
                    date: date,
                    time: time,
                    location: location
                },
                success: function(response) {
                    $('#scheduleMeetingModal').modal('hide');
                    $('#bookingCalendar').fullCalendar('refetchEvents');
                    alert(response);
                }
            });
        });
    });

