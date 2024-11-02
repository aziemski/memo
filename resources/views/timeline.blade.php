<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Timeline</title>
</head>
<body>
<nav class="navbar">
    <a href="#">Home</a>
    <a href="#" class="btn ">+ Add Event</a>

    <div class="dropdown">
        <button class="btn outline">Filter</button>
        <div class="dropdown-menu">
            <label class="dropdown-item">
                <input type="checkbox" name="categories" value="all"> All
            </label>
            <label class="dropdown-item">
                <input type="checkbox" name="categories" value="technology"> Technology
            </label>
            <label class="dropdown-item">
                <input type="checkbox" name="categories" value="health"> Health
            </label>
            <label class="dropdown-item">
                <input type="checkbox" name="categories" value="science"> Science
            </label>
            <label class="dropdown-item">
                <input type="checkbox" name="categories" value="business"> Business
            </label>
        </div>
    </div>


    <a href="/login" class="btn outline right">Login</a>
</nav>
    <main>
        <div id="timeline-embed"></div>
        <script>
            const timelineData = {
                "title": {
                    "text": {
                        "headline": "My Timeline",
                        "text": "This is a sample timeline."
                    }
                },
                "events": @json($events)
            };
        </script>
</main>
    @vite(['resources/js/timeline.js'])
</body>
</html>
