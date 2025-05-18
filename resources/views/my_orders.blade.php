
<div class="max-w-6xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-6">My Orders</h1>

    @if ($orders->count())
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">#</th>
                        <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Order Code</th>
                        <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Event</th>
                        <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Status</th>
                        <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index => $order)
                    <tr class="border-t">
                        <td class="px-6 py-4 text-sm">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm font-mono">{{ $order->order_code }}</td>
                        <td class="px-6 py-4 text-sm">{{ $order->event->title ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if ($order->status === 'pending')
                                <span class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded text-xs">Pending</span>
                            @elseif ($order->status === 'confirmed')
                                <span class="px-2 py-1 bg-green-200 text-green-800 rounded text-xs">Confirmed</span>
                            @elseif ($order->status === 'cancelled')
                                <span class="px-2 py-1 bg-red-200 text-red-800 rounded text-xs">Cancelled</span>
                            @else
                                {{ ucfirst($order->status) }}
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $order->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500 text-center py-10">You have no orders yet.</p>
    @endif
</div>
