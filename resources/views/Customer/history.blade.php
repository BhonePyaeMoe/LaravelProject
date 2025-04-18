

    @include('navigation')
    @include('errorhandling')

    <h1>Appointment History</h1>

    <table style="width:100%">
        <tr style="text-align: center;">
            <th>Consultant Name</th>
            <th>Date</th>
            <th>StartTime</th>
            <th>EndTime</th>
            <th>Notes</th>
            <th>Status</th>
            <th>Action</th> 
        </tr>
        @foreach($appointments as $appointment)
            <tr style="text-align: center;">
                <td>{{ $appointment->consultant->Consultant_Name }}</td>
                <td>{{ $appointment->AppointmentDate }}</td>
                <td>{{ $appointment->Appointment_StartTime }}</td>
                <td>{{ $appointment->Appointment_EndTime }}</td>
                <td>{{ !empty($appointment->Notes) ? $appointment->Notes : 'Nothing...' }}</td>
                <td>{{ $appointment->Status }}</td>
                <td>
                    @if($appointment->Status == 'Pending')
                        {{-- <form action="{{ route('cancelappointment', $appointment->Appointment_ID) }}" method="POST"> --}}
                            @csrf
                            <button type="submit" style="background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">Cancel</button>
                        </form>
                    @else
                        <p>Cancelled</p>
                    @endif
            </tr>
        @endforeach
    </table>
