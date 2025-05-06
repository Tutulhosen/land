<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px !important;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .section {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-table {
    border: none;
    padding-bottom: 10px;
    width: 100%;
}

.profile-image {
    float: right;
}


        h2 {
            background: #48caf5cc;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        h3 {
            background: #d6d6d6;
            color: rgb(0, 0, 0);
            padding: 10px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="container">
        <h2>Profile</h2>
        <table class="profile-table" style="border: none; padding-bottom: 10px;">
            <tr style="border-collapse: collapse; width: 100%; border: none;">
                <td style="vertical-align: top; border: none;">
                    <div class="profile-section">
                        <div class="profile-info">
                            <p style="margin-top: 10px; margin-bottom: 10px; font-size: 10px;"><strong> {{$employeePersonal->salutations ? $employeePersonal->salutations->name: "N/A"}}{{ $employeePersonal->first_name . ' ' . $employeePersonal->last_name }}</strong></p>
                            <br>
                            <p style="margin-top: 10px; margin-bottom: 10px; font-size: 10px;">{{$employeePersonal->officialInformation ? $employeePersonal->officialInformation->designation ? $employeePersonal->officialInformation->designation->designation_name : "N/A" : "N/A" }}, {{ $employeePersonal->officialInformation ? $employeePersonal->officialInformation->department ? $employeePersonal->officialInformation->department->department_name : "N/A" : "N/A" }}</p>
                            <br>
                            <p style="margin-top: 10px; margin-bottom: 10px; font-size: 10px;"><strong>Phone:</strong> {{$employeePersonal->contact->contact_number ?? ''}}</p>
                            <br>
                            <p style="margin-top: 10px; margin-bottom: 10px; font-size: 10px;"><strong>E-mail:</strong> {{$employeePersonal->contact->email ?? ''}}</p>
                            <br>
                            <p style="margin-top: 10px; margin-bottom: 10px; font-size: 10px;"><strong>Address:</strong> {{$employeePersonal->contact->pres_add ?? ''}},
                                {{$employeePersonal->contact->district ?? ''}} -
                                {{$employeePersonal->contact->postal_code ?? ''}}</p>
                        </div>
                    </div>
                </td>
                <td style="text-align: center; border: none; vertical-align: top; width: 100px;">
                    @if (isset($employeePersonal->employeeDocument->profile_picture))
                        <img src="{{ public_path('storage/' . $employeePersonal->employeeDocument->profile_picture) }}"
                            width="100" alt="Profile Image" class="profile-image">
                    @else
                        <img src="{{ public_path('admin/assets/img/demo-user.jpg') }}"
                            width="100" alt="Profile Image" class="profile-image">
                    @endif


                         <br>
                         <br>
                         <p style="margin-top: 10px; margin-bottom: 10px; font-size: 10px;"><strong>ID:</strong> {{$employeePersonal->emp_id ? $employeePersonal->emp_id: "N/A"}}</p>
                </td>

            </tr>
        </table>

        <div class="section">
            <h3>Work Experience</h3>
            <table width="100%" cellspacing="0" cellpadding="5">
                <tr>
                    <th>Company</th>
                    <th>Job Position</th>
                    <th>Department</th>
                    <th>Responsibilities</th>
                    <th>Duration</th>
                </tr>
                @if($employeePersonal->employeeExperiences->isEmpty())
                <tr>
                    <td colspan="5" style="text-align:center;">--</td>
                </tr>
                @else
                @foreach ($employeePersonal->employeeExperiences as $employeeExperience)
                <tr>
                    <td>{{$employeeExperience->company_name ?? '--'}}</td>
                    <td>{{$employeeExperience->job_position ?? '--'}}</td>
                    <td>{{$employeeExperience->department ?? '--'}}</td>
                    <td>{{$employeeExperience->job_respons ?? '--'}}</td>
                    <td>{{ $employeeExperience->duration}}</td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>


        <div class="section">
            <h3>Professional Training</h3>
            <table>
                <tr>
                    <th>Organization</th>
                    <th>Course Title</th>
                    <th>Course Type</th>
                    <th>Duration</th>
                    <th>Result</th>
                    <th>Year</th>
                </tr>
                @if($employeePersonal->employeeTrainings->isEmpty())
                <tr>
                    <td colspan="5" style="text-align:center;">--</td>
                </tr>
                @else
                @foreach ($employeePersonal->employeeTrainings as $employeeTraining)
                <tr>
                    <td>{{$employeeTraining->institute_name ?? '--'}}</td>
                    <td>{{$employeeTraining->course_title ?? '--'}}</td>
                    <td>{{$employeeTraining->train_type ?? '--'}}</td>
                    <td>{{$employeeTraining->course_duration}}</td>
                    <td>{{$employeeTraining->result ?? '--'}}</td>
                    <td>{{$employeeTraining->year ?? '--'}}</td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>


        <div class="section">
            <h3>Educational Qualification</h3>
            <table>
                <tr>
                    <th>Institute</th>
                    <th>Degree</th>
                    <th>Board / University</th>
                    <th>Result</th>
                    <th>Passing Year</th>
                </tr>
                @if($employeePersonal->employeeEducations->isEmpty())
                <tr>
                    <td colspan="6" style="text-align:center;">--</td>
                </tr>
                @else
                @foreach ($employeePersonal->employeeEducations as $employeeEducation)
                <tr>
                    <td>{{$employeeEducation->institute_name ?? '--'}}</td>
                    <td>{{$employeeEducation->educationLevel->name ?? '--'}} -
                        {{$employeeEducation->group_major_subject ?? '--'}}
                        [{{$employeeEducation->educationType->name ?? '--'}}]</td>
                    <td>{{$employeeEducation->board_university ?? '--'}}</td>
                    <td>{{$employeeEducation->result_university ?? '--'}}</td>
                    <td>{{$employeeEducation->passing_year ?? '--'}}</td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>


        <div class="section">
            <h3>Reference Information</h3>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Relation</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                </tr>
                @if($employeePersonal->employeeReferences->isEmpty())
                <tr>
                    <td colspan="6" style="text-align:center;">--</td>
                </tr>
                @else
                @foreach ($employeePersonal->employeeReferences as $employeeReference)
                <tr>
                    <td>{{$employeeReference->reference_name ?? '--'}}</td>
                    <td>{{$employeeReference->relations ? $employeeReference->relations->name: '--'}}</td>
                    <td>{{$employeeReference->reference_contact_number ?? '--'}}</td>
                    <td>{{$employeeReference->reference_address ?? '--'}}</td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>

        {{-- <div class="section">
            <h3>Granter Information</h3>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Relation</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                </tr>
                @if($employeePersonal->employeeGranters->isEmpty())
                <tr>
                    <td colspan="6" style="text-align:center;">--</td>
                </tr>
                @else
                @foreach ($employeePersonal->employeeGranters as $employeeGranter)
                <tr>
                    <td>{{$employeeGranter->granter_name ?? '--'}}</td>
                    <td>{{$employeeGranter->relations ? $employeeGranter->relations->name: '--'}}</td>
                    <td>{{$employeeGranter->granter_contact_number ?? '--'}}</td>
                    <td>{{$employeeGranter->granter_address ?? '--'}}</td>
                </tr>
                @endforeach
                @endif
            </table>
        </div> --}}

        <div class="section">
            <h3>Personal Information</h3>
            <p><strong>Name:</strong>{{$employeePersonal->salutations ? $employeePersonal->salutations->name: "N/A"}}{{ $employeePersonal->first_name . ' ' . $employeePersonal->last_name }}</p>
            <p><strong>Phone:</strong> {{$employeePersonal->contact->contact_number ?? ''}}</p>
            <p><strong>Email:</strong> {{$employeePersonal->contact->email ?? ''}}</p>
            <p><strong>Address:</strong> {{$employeePersonal->contact->pres_add ?? ''}},
                {{$employeePersonal->contact->district ?? ''}} -
                {{$employeePersonal->contact->postal_code ?? ''}}</p>
            <p><strong>Date of Joining:</strong> {{ $employeePersonal->payRollInformation->joining_date ? \Carbon\Carbon::parse($employeePersonal->payRollInformation->joining_date)->format('d M Y') : '' }}</p>
            <p><strong>Date of Birth:</strong> {{ $employeePersonal->dob ? \Carbon\Carbon::parse($employeePersonal->dob)->format('d M Y') : '' }}</p>
            <p><strong>Gender:</strong> {{$employeePersonal->genders ? $employeePersonal->genders->name: "N/A"}}</p>
            <p><strong>Religion:</strong> {{$employeePersonal->religions ? $employeePersonal->religions->name: "N/A"}}</p>
            <p><strong>Marital Status:</strong> {{$employeePersonal->marital_status ?? "N/A"}}</p>
        </div>



    </div>
</body>

</html>
