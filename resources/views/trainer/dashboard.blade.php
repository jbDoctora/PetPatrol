<x-trainer-layout>
    <div class="bg-neutral-700 rounded shadow-md p-6 my-3 h-24 m-5">
        <div class="flex items-center justify-between">
            <div class="text-lg font-bold text-white">Welcome back, Jillbert!</div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 m-5">
        <div class="col-span-12 md:col-span-8 xl:col-span-9">

            <!-- Trainer Rating Card -->
            <div class="bg-gray-200 rounded shadow-md p-6">
                <div class="flex items-center justify-between">
                    <div class="text-lg font-medium text-gray-800">Overall Rating</div>
                    <div class="flex flex-col">
                        <div class="flex items-center justify-end text-4xl font-bold text-gray-800">
                            <i class="fa-solid fa-star fa-sm text-yellow-500 pr-3"></i>
                            <span class="mr-2">4.5</span>
                        </div>
                        <div>
                            <p class="text-right">12 reviews</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bookings Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mt-6">
                <!-- Total Completed Bookings Card -->
                <div class="bg-gray-200 rounded shadow-md p-6">
                    <div class="text-base font-medium text-gray-800"><i
                            class="fa-solid fa-calendar-check pr-3"></i>Total
                        Completed Bookings</div>
                    <div class="mt-4 flex items-center justify-between">
                        <div class="text-4xl font-bold text-gray-800">38</div>
                        <div class="text-sm font-medium text-gray-500">This Month</div>
                    </div>
                </div>

                <!-- Pending Bookings Card -->
                <div class="bg-gray-200 rounded-lg shadow-md p-6">
                    <div class="text-lg font-medium text-gray-800"><i class="fa-solid fa-calendar pr-3"></i>Pending
                        Bookings</div>
                    <div class="mt-4 flex items-center justify-between">
                        <div class="text-4xl font-bold text-gray-800">2</div>
                        <div class="text-sm font-medium text-gray-500">Total</div>
                    </div>
                </div>

                <!-- In Progress Bookings Card -->
                <div class="bg-gray-200 rounded shadow-md p-6">
                    <div class="text-lg font-medium text-gray-800"><i class="fa-solid fa-calendar-days pr-3"></i>In
                        Progress Bookings</div>
                    <div class="mt-4 flex items-center justify-between">
                        <div class="text-4xl font-bold text-gray-800">5</div>
                        <div class="text-sm font-medium text-gray-500">Total</div>
                    </div>
                </div>
            </div>

            <!-- Calendar -->
            <div class="mt-6 bg-gray-200 rounded shadow-md p-6">
                <div id="calendar"></div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="col-span-12 md:col-span-4 xl:col-span-3">
            <div class="bg-gray-200 rounded shadow-md p-6">
                <div class="text-lg font-medium text-gray-800">Recent Bookings</div>
                <div class="mt-4 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-medium text-gray-500">April 14, 2023</div>
                        <div class="text-sm font-medium text-green-500">$120</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-medium text-gray-500">April 12, 2023</div>
                        <div class="text-sm font-medium text-green-500">$80</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-medium text-gray-500">April 10, 2023</div>
                        <div class="text-sm font-medium text-green-500">$50</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-medium text-gray-500">April 8, 2023</div>
                        <div class="text-sm font-medium text-green-500">$90</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-medium text-gray-500">April 6, 2023</div>
                        <div class="text-sm font-medium text-green-500">$75</div>
                    </div>
                    <div class="flex justify-end">
                        <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-700">
                            See all
                        </a>
                    </div>
                </div>
            </div>
            <!-- Total Money Card -->
            <div class="bg-gray-200 rounded shadow-md p-6 mt-6">
                <div class="text-lg font-medium text-gray-800">Total Money to be Collected</div>
                <div class="mt-4 flex items-center justify-between">
                    <div class="text-4xl font-bold text-gray-800">$1,475</div>
                    <div class="text-sm font-medium text-gray-500">This Month</div>
                </div>
            </div>

            <!-- Chart -->
            <div class="bg-gray-200 rounded shadow-md p-6 mt-6">
                <canvas id="chart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Get the context of the chart canvas element
      var ctx = document.getElementById('chart').getContext('2d');
    
      // Define the chart data
      var data = {
        labels: ['Completed', 'Pending', 'In Progress'],
        datasets: [{
          label: 'Bookings',
          data: [38, 2, 5],
          backgroundColor: ['#34d399', '#ff9900', '#ff4532']
        }]
      };
    
      // Define the chart options
      var options = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom',
          },
          title: {
            display: true,
            text: 'Booking Status',
            font: {
              size: 16,
            }
          }
        },
      };
    
      // Create the chart
      var chart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
      });
    </script>
</x-trainer-layout>