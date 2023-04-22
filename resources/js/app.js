import "./bootstrap";

// import { Calendar } from "@fullcalendar/core";
// import dayGridPlugin from "@fullcalendar/daygrid";
// import timeGridPlugin from "@fullcalendar/timegrid";
// import interactionPlugin from "@fullcalendar/interaction";

// document.addEventListener("DOMContentLoaded", function () {
//     var calendarEl = document.getElementById("trainer-calendar");
//     var calendar = new FullCalendar.Calendar(calendarEl, {
//         initialView: "dayGridMonth",
//         allDaySlot: true,
//         slotEventOverlap: false,
//         timeFormat: "", // remove the time when viewing all-day events
//         events: {
//             url: "/events",
//             method: "GET",
//             extraParams: {
//                 _token: "{{ csrf_token() }}",
//                 trainer_id: "{{ auth()->user()->id }}",
//             },
//         },
//         eventRender: function (info) {
//             var tooltip = new Tooltip(info.el, {
//                 title: info.event.title,
//                 placement: "top",
//                 trigger: "hover",
//                 container: "body",
//                 "z-index": 99999,
//             });
//         },
//         eventClick: function (info) {
//             // handle click event here
//             alert(info.event.title);
//         },
//     });

//     calendar.render();
// });
$(document).on(
    "click",
    ".dropdown-content.menu .dropdown-item",
    function (event) {
        event.preventDefault();
        var notificationId = $(this).data("id");
        var notificationUrl = $(this).data("url");
        $.ajax({
            url: notificationUrl,
            type: "PUT",
            data: {
                id: notificationId,
            },
            success: function () {
                window.location.href = $(this).data("booking-url");
            },
            error: function () {
                alert("Failed to mark notification as read.");
            },
        });
    }
);
