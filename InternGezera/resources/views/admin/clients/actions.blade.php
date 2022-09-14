<td class="text-center">
    <a class="mr-2 bs-tooltip text-warning" data-toggle="tooltip"
       data-placement="top" title="" data-original-title="Edit"
       href="{{ route('admin.client.edit', $id) }}"><svg
            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-edit-2">
            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
            </path>
        </svg></a>
    <form class="d-inline"  action="{{route('admin.client.delete')}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="client_id" value="{{$id}}">
        <button class="bg-transparent border-0 bs-tooltip text-danger"
           type="submit"data-toggle="tooltip" data-placement="top" title=""
           data-original-title="delete"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x-octagon">
                <polygon
                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                </polygon>
                <line x1="15" y1="9" x2="9" y2="15">
                </line>
                <line x1="9" y1="9" x2="15" y2="15">
                </line>
            </svg></button>
    </form>

</td>
