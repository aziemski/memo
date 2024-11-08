import { Timeline } from '@knight-lab/timelinejs';
import '@knight-lab/timelinejs/dist/css/timeline.css';

document.addEventListener("DOMContentLoaded", function() {
    if (typeof timelineData !== "undefined") {
        new Timeline('timeline-embed', timelineData, {
        });
    }
});

