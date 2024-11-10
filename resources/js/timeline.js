import {Timeline} from '@knight-lab/timelinejs';
import '@knight-lab/timelinejs/dist/css/timeline.css';

document.addEventListener("DOMContentLoaded", function () {
    if (typeof timelineData !== "undefined") {
        new Timeline('timeline-embed', timelineData, {
            // timenav_position: 'top',
        });
    }

    const toggleViewBtn = document.getElementById("toggleViewBtn");
    const timelineView = document.getElementById("timeline-embed");
    const listView = document.getElementById("list-view");

    toggleViewBtn.addEventListener("click", function () {
        if (timelineView.classList.contains("d-none")) {
            timelineView.classList.remove("d-none");
            listView.classList.add("d-none");
            toggleViewBtn.textContent = "List";
        } else {
            timelineView.classList.add("d-none");
            listView.classList.remove("d-none");
            toggleViewBtn.textContent = "Timeline";
        }
    });
});

