@foreach($customers as $key => $customer)
<tr role="row">
    <td class="text-center">{{ $customers->firstItem() + $key }}</td>
    <td>
        <i class='bx bx-user-circle'></i> {{ $customer->name }} 
        <br/>{{ $customer->get_agency->agency_name ?? 'N/A' }}
        <br/><i class='bx bx-id-card bx-flashing'></i> ID-{{ $customer->code }}
    </td>
    <td class="text-center">
        <a href="#" class="client-info">
            <i class='bx bx-user-voice'></i> {{ $customer->father_name ?? 'N/A' }}
        </a>
    </td>
    <td>
        <a href="tel:{{ $customer->number }}" class="client-info">
            <i class='bx bx-phone-outgoing bx-tada'></i> {{ $customer->number }}
        </a><br/>
        <a href="tel:{{ $customer->contact_number_res ?? $customer->contact_number_res }}" class="client-info">
            <i class='bx bxl-whatsapp bx-tada'></i> {{ $customer->contact_number_res ?? 'N/A' }}
        </a><br/>
        <a href="mailto:{{ $customer->email }}" class="client-info">
            <i class='bx bx-mail-send bx-tada'></i> {{ $customer->email ?? 'N/A' }}
        </a>
    </td>
    <td class="text-center">
        {{ $customer->plot_sale->plot->sector->sector_name ?? 'N/A' }}
        <br/> {{ $customer->plot_sale->plot->road->road_name ?? 'N/A' }}
        <br/> Plot-{{ $customer->plot_sale->plot->plot_name ?? 'N/A' }}
    </td>
    {{-- <td class="text-center">
        {{ $customer->passport_no ?? 'N/A' }}
    </td> --}}
    <td>
        <button class="btn {{ $customer->is_active == 1 ? 'status-box-1' : 'status-box-2' }}">
            {{ $customer->is_active == 1 ? 'Active' : 'Inactive' }}
        </button>
    </td>
    <td>
        <button class="btn btn-label-primary btn-round btn-xs" data-bs-toggle="modal" data-bs-target="#addRowModal-documents">
            <i class='bx bx-cloud-download bx-flashing me-1'></i> Documents
        </button>
    </td>
    <td>
        <div class="form-button-action">
            <a href="{{route('customer.profile.view', $customer->id)}}" class="btn btn-link btn-secondary btn-lg" title="View">
                <i class='bx bx-show'></i>
            </a>
            <a href="{{route('customer.edit', $customer->id)}}" class="btn btn-link  btn-lg" title="Edit">
                <i class='bx bxs-edit'></i>
            </a>
            <form action="{{route('customer.destroy', $customer->id)}}" method="POST" style="display:inline;" class="delete-customer">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-link btn-danger btn-lg">
                    <i class='bx bx-trash-alt'></i>
                </button>
            </form>
        </div>
    </td>
</tr>
@endforeach
