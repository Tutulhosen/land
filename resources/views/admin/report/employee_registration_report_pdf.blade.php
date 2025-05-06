<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h3 {
            margin: 0;
        }
        .header p {
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3>{{$companyInformation->company_name}}</h3>
        <p>Address: {{$companyInformation->address}}, {{$companyInformation->upazila->name}}, {{$companyInformation->district->name}} - {{$companyInformation->zip_code}}</p>
        <p>Phone: {{$companyInformation->contactInformation->official_contact_number}}, Whatsapp: {{$companyInformation->contactInformation->whatsapp_number}}</p>
        <p>Email: <a href="mailto:{{$companyInformation->contactInformation->email_address}}">{{$companyInformation->contactInformation->email_address}}</a>, Website: <a href="http://{{$companyInformation->contactInformation->website_address}}">{{$companyInformation->contactInformation->website_address}}</a></p>
        <h3>Employee Register Report</h3>
    </div>
    <table>
        <tr>
            <th>SL No</th>
            <th>Employee Name</th>
            <th>Employee Code</th>
            <th>Current Grade</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Project Name</th>
            <th>Branch Name</th>
            <th>Phone Number</th>
            <th>Joining Date</th>
            <th>Father’s Name</th>
            <th>Identification Number</th>
            <th>Current Status</th>
        </tr>
        <tr>
            @foreach ($employees as $index => $employee)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $employee->salutations->name?? '' }} {{ $employee->first_name }} {{ $employee->last_name }}</td>
                <td>{{ $employee->emp_id }}</td>
                <td>{{ $employee->officialInformation->employeeGrade->name ?? '-' }}</td>
                <td>{{ $employee->officialInformation->designation->designation_name ?? '-' }}</td>
                <td>{{ $employee->officialInformation->department->department_name ?? '-' }}</td>
                <td>{{ $employee->officialInformation->employeeProject->name ?? '-' }}</td>
                <td>{{ $employee->officialInformation->branch->name ?? '-' }}</td>
                <td>{{ $employee->contact->contact_number ?? '-' }}</td>
                <td>
                    @if (!empty($employee->payRollInformation->joining_date))
                        {{ \Carbon\Carbon::parse($employee->payRollInformation->joining_date)->format('d M Y') }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $employee->fathers_name }}</td>
                <td>{{ $employee->identification_number }}</td>
                <td>
                    <span class="{{ $employee->status == 1 ? 'text-success fw-bold' : 'text-danger fw-bold' }}">
                        {{ $employee->status == 1 ? 'Active' : 'Inactive' }}
                    </span>
                </td>
            </tr>
        @endforeach
        </tr>
    </table>
</body>
</html>
