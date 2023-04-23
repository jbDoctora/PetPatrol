<x-trainer-layout>
    <div class="bg-white m-5 h-full rounded">
        <div class="flex justify-between">
            <div class="p-5">
                <h3 class="text-2xl text-blue-700 font-bold">Report</h3>
            </div>
        </div>
        {{-- <div class="flex gap-5 m-5">
            <div class="card w-96 bg-gray-200 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Card title!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                </div>
            </div>
        </div> --}}

        <div class="mt-2 overflow-hidden rounded-none mx-6">
            <table class="w-full border border-gray-300 mb-5" id="reportTable">
                <thead class="table-auto">
                    <tr class="font-normal text-sm text-slate-100 bg-blue-700">
                        <th>
                            <div class="my-2 mx-0">
                                Reference Code
                            </div>
                        </th>
                        <th>Client Name</th>
                        <th>Gcash Reference Number</th>
                        <th>Date</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($request as $req)
                    <tr class="text-xs text-center">
                        <td>
                            <div class="my-4 mx-0">{{$req->code}}</div>
                        </td>
                        <td>{{$req->client_name}}</td>
                        <td>
                            @if($req->gcash_refnum == 0)
                            payment not uploaded
                            @else
                            {{$req->gcash_refnum}}
                            @endif
                        </td>
                        <td>{{$req->start_date}} - {{$req->end_date}}</td>
                        <td>₱ {{$req->price}}</td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-trainer-layout>