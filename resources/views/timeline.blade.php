<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Timeline</title>
</head>
<body>
    <main>
        <div id="timeline-embed"></div>
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

                const timeline = new Timeline("timeline-embed", timelineData);

                timeline.on("loaded",function () {
                    addEventClickHandlers();
                });
            });

            function addEventClickHandlers() {
                const timelineEvents = document.querySelectorAll(".tl-slide-content");

                timelineEvents.forEach((eventElement, index) => {
                    eventElement.addEventListener("click", function() {
                        handleEventClick(index);
                    });
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
</main>
</body>
</html>
