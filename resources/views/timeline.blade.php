<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.knightlab.com/libs/timeline3/latest/css/timeline.css">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #timeline-container {
            width: 100%;
            height: 100vh;
        }
    </style>
    <title>Timeline</title>
</head>
<body>

<div id="timeline-embed"></div>
<script src="https://cdn.knightlab.com/libs/timeline3/latest/js/timeline.js"></script>
<script>
    let timelineData;

    document.addEventListener("DOMContentLoaded", function() {
        timelineData = {
            "title": {
                "text": {
                    "headline": "My Timeline",
                    "text": "This is a sample timeline."
                }
            },
            "events": @json($events)
        };

        var timeline = new TL.Timeline("timeline-embed", timelineData
        );

        timeline.on("loaded",function () {
            addEventClickHandlers();
        });
    });

    function addEventClickHandlers() {
        const timelineEvents = document.querySelectorAll(".tl-slide-content");

        timelineEvents.forEach((eventElement, index) => {
            // eventElement.addEventListener("click", function() {
            //     // handleEventClick(index);
            // });
        });
    };

    function handleEventClick(eventIndex) {
        const event = timelineData.events[eventIndex];
        console.log("Clicked on event:", event.text.headline);
        alert("You clicked on: " + event.id + ", unique_id: "  + event.unique_id);
    }

    function viewDetails(eventId) {
        const event = timelineData.events[eventIndex];
        console.log("ddddClicked on event:", event.text.headline);
        window.location.href = '/events/' + eventId +'/edit';
    };

</script>

</body>
</html>
