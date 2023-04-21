<x-admin-layout>
    <div class="stats shadow flex items-center m-5 rounded">

        <div class="stat">
            <div class="stat-figure text-primary">
                <i class="fa-solid fa-users fa-xl"></i>
            </div>
            <div class="stat-title">Total Active Users</div>
            <div class="stat-value text-primary">{{$all_users}}</div>
        </div>

        <div class="stat">
            <div class="stat-figure text-secondary">
                <i class="fa-regular fa-calendar-days fa-xl"></i>
            </div>
            <div class="stat-title">Active Bookings</div>
            <div class="stat-value text-secondary">{{$active_bookings}}</div>
        </div>

        <div class="stat">
            <div class="stat-figure text-yellow-500">
                <i class="fa-solid fa-clipboard-question fa-xl"></i>
            </div>
            <div class="stat-title">Report and Inquiries</div>
            <div class="stat-value text-yellow-500">{{$active_bookings}}</div>
        </div>

    </div>
    <div id="chartContainer" style="height: 400px; width: 1050px;" class="m-5"></div>


    <script>
        window.onload = function () {
        fetch('http://127.0.0.1:8000/api/bookings')
            .then(response => response.json())
            .then(data => {
                const statuses = {
                    pending: 0,
                    inProgress: 0,
                    approved: 0,
                    completed: 0,
                    declined: 0,
                    cancelled: 0
                };
                const currentMonth = new Date().getMonth();
                data.forEach(booking => {
                    const bookingMonth = new Date(booking.start_date).getMonth();
                    if (bookingMonth === currentMonth) {
                        statuses[booking.status]++;
                    }
                });
                const dataPoints = [];
                for (const status in statuses) {
                    if (statuses.hasOwnProperty(status)) {
                        dataPoints.push({
                            y: statuses[status],
                            name: status.charAt(0).toUpperCase() + status.slice(1)
                        });
                    }
                }
                const chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light2",
                    title: {
                        text: "Booking Statuses for Current Month"
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        legendText: "{name}: {y}",
                        indexLabelFontSize: 16,
                        indexLabel: "{name} - {y}",
                        dataPoints: dataPoints
                    }]
                });
                chart.render();
            });
    }
    </script>
</x-admin-layout>